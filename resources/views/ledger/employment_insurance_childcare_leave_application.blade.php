<!-- 4950008680050000 -->
<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

            <style>
                .preview-area .ledger-card .content {
                    padding: 14px;
                }
            </style>
        @endslot
        <h1> {{ $procedureName }}</h1>
        <p>申請・届出に関する事項を入力してください。</p>
        @if ($existPresident == false)
            <x-representative-alert />
        @endif
        @if ($certificate == false)
            <div class="ui warning message" style="margin: 0;">
                <div class="header">
                    電子証明書が登録されていません
                </div>
            </div>
        @endif
        @if ($egovAcount == false)
            <div class="ui warning message" style="margin: 0;">
                <div class="header">
                    e-Govアカウントが連携されていません
                </div>
            </div>
        @endif

        <div id="ledger-step1" class="step-view active mb-2">
            <form id="ledger-form" action="" method="post" enctype="multipart/form-data">
                @csrf
                @if (session('errors'))
                    <div class="ui error message">
                        <div class="header">入力エラー</div>
                        <ul class="list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="ledger-grid my-2">
                    <div class="employee-card">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>社員選択</h2>
                                <livewire:ledger-employee-list />
                            </div>
                        </div>
                    </div>
                    <div class="attachment-card">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>添付ファイル</h2>
                                <x-ledger-attachment :required_list="['required_amount_days_time']" :file_original_names="[
                                        'amount_days_time' =>
                                            '支給申請書に記載した賃金額、就業した日数及び時間等記載内容を確認できる書類',
                                        'written_consent' => '支給申請に係る承諾書',
                                        'extension_reason' => '延長事由に該当することを確認できる書類',
                                        'spouse' => '被保険者の配偶者であることを確認できる書類',
                                        'spouse_childcare_leave' => '被保険者の配偶者の育児休業の取得を確認できる書類',
                                        'other' => 'その他の添付書類',
                                    ]" :extensions="'.doc,.docx,.jpg,.jpeg,.pdf,.xls,.xlsx'" />
                            </div>
                        </div>
                    </div>
                    <div class="submission-card">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>提出先選択</h2>
                                <livewire:submission-selector :mode="0" />
                            </div>
                        </div>
                    </div>
                    <div class="qualification-card">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <x-form.childcare_leave_allowance_application_form />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="prevew-btn">
                    <a id="ledger-back" class="ui button negative basic" type="button" style="width: 200px;"
                        href="{{ route('ledger.index') }}">戻る</a>
                    @if ($certificate == false || $egovAcount == false || $existPresident == false)
                        <button id="ledger-preview-btn" class="ui button primary" type="button" style="width: 200px;"
                            disabled>確認</button>
                    @else
                        <button id="ledger-preview-btn" class="ui button primary" type="button"
                            style="width: 200px;">確認</button>
                    @endif
                </div>
            </form>
        </div>

        <div id="ledger-step2" class="step-view my-2 aaa">
            <h2 style="text-align: center;">プレビュー</h2>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component>
                        <x-form.childcare_leave_allowance_application_form />
                    </div>
                </div>
            </div>
            <div class="submit-btn py-2">
                <button id="ledger-edit-btn" class="ui button" type="button" style="width: 200px;">修正</button>
                <button id="ledger-submit-btn" class="ui button yellow" type="button" style="width: 200px;">申請</button>
            </div>
        </div>

        <script type="module">
            $(document).ready(function() {
                $('#J87_005F_944E_8D86').val('{{ $todaySet['japanEra'] }}');
                $('#J88_005F_944E').val('{{ $todaySet['japanEraYear'] }}');
                $('#J89_005F_8C8E').val('{{ $todaySet['month'] }}');
                $('#J90_005F_93FA').val('{{ $todaySet['day'] }}');
                $('#J97_005F_944E_8D86').val('{{ $todaySet['japanEra'] }}');
                $('#J98_005F_944E').val('{{ $todaySet['japanEraYear'] }}');
                $('#J99_005F_8C8E').val('{{ $todaySet['month'] }}');
                $('#J100_005F_93FA').val('{{ $todaySet['day'] }}');

                $('#J95_005F_8E96_8BC6_8EE5_8E81_96BC').val(
                    '{{ old('employer_company_managerial_position_name') }}' ? '{{ old('employer_company_managerial_position_name') }}' : '{{ $company->name }}'+ '　' + '{{ $company->representative }}');

                @if ($current_employee->role_id === 500)
                    $('#J107_005F_8E73_8A4F_8BC7_94D4').val(
                        '{{ old('labor_consultant_tel_treacode', $current_branch->tel_area_code) }}');
                    $('#J108_005F_8E73_93E0_8BC7_94D4').val(
                        '{{ old('labor_consultant_tel_city_code', $current_branch->tel_city_code) }}');
                    $('#J109_005F_89C1_93FC_8ED2_94D4_8D86').val(
                        '{{ old('labor_consultant_tel_subscriber_code', $current_branch->tel_subscriber_code) }}');
                @else
                    $('#J105_005F_8DEC_90AC_944E_8C8E_93FA_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2,\
                                                                                            #J106_005F_8ED0_89EF_95DB_8CAF_984A_96B1_8E6D_005F_8E81_96BC, #J107_005F_8E73_8A4F_8BC7_94D4, #J108_005F_8E73_93E0_8BC7_94D4, #J109_005F_89C1_93FC_8ED2_94D4_8D86')
                        .prop('readonly', true);
                @endif
            });
            document.addEventListener('DOMContentLoaded', function() {
                const tabs = document.querySelectorAll('.ui.tabular.menu .item');
                const contents = document.querySelectorAll('.ui.bottom.attached.segment');
                tabs.forEach((tab, index) => {
                    tab.addEventListener('click', function() {
                        tabs.forEach((t) => t.classList.remove('active'));
                        tab.classList.add('active');
                        contents.forEach((c) => c.style.display = 'none');
                        contents[index].style.display = 'block';
                    });
                });
            });
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
                const employee = data['employee'];
                const branch = data['branch'];
                const headquarters = data['headquarters'];
                const company = data['company'];
                const hello_work = data['hello_work'];
                const spouse = data['spouse'];
                const todaySet = data['todaySet'];
                const headquarters_prefecture_data = data['headquarters_prefecture_data'];
                const branch_prefecture_data = data['branch_prefecture_data'];
                const employmentInsuredConvertDate = data['employment_insured_convert_date'];
                const employee_prefecture_data = data['employee_prefecture_data'];
                if (employee.last_name_kana && employee.first_name_kana) {
                    $('#J8_005F_8E81_96BC').val(employee.last_name_kana + '　' + employee.first_name_kana);
                    $('#J78_005F_905C_90BF_8ED2_8E81_96BC_005F_8374_838A_834B_8369').val(employee.last_name_kana + '　' +
                        employee.first_name_kana);
                    $('#J132_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').val(employee.last_name_kana + '　' +
                        employee.first_name_kana);
                } else {
                    $('#J8_005F_8E81_96BC').val('');
                    $('#J78_005F_905C_90BF_8ED2_8E81_96BC_005F_8374_838A_834B_8369').val('');
                    $('#J132_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').val('');
                }
                var employmentInsuredNo = employee.employment_insured_no;
                if (employmentInsuredNo && employmentInsuredNo.length === 11) {
                    var employmentInsuredNo4digit = employmentInsuredNo.substring(0, 4);
                    var employmentInsuredNo6digit = employmentInsuredNo.substring(4, 10);
                    var employmentInsuredNoCD = employmentInsuredNo.substring(10, 11);
                    $('#J9_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employmentInsuredNo4digit);
                    $('#J10_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employmentInsuredNo6digit);
                    $('#J11_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employmentInsuredNoCD);
                } else {
                    $('#J9_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val('');
                    $('#J10_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val('');
                    $('#J11_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val('');
                }
                if (employmentInsuredConvertDate != null) {
                    $('#J13_005F_944E_8D86').val(employmentInsuredConvertDate['era']);
                    $('#J14_005F_944E').val(employmentInsuredConvertDate['year']);
                    $('#J15_005F_8C8E').val(employmentInsuredConvertDate['month']);
                    $('#J16_005F_93FA').val(employmentInsuredConvertDate['day']);
                } else {
                    $('#J13_005F_944E_8D86').val("");
                    $('#J14_005F_944E').val("");
                    $('#J15_005F_8C8E').val("");
                    $('#J16_005F_93FA').val("");
                }
                var branchInsuranceOfficeNo = branch.employment_insurance_office_no;
                if (branchInsuranceOfficeNo && branchInsuranceOfficeNo.length === 11) {
                    var branchInsuranceOfficeNo4digit = branchInsuranceOfficeNo.substring(0, 4);
                    var branchInsuranceOfficeNo6digit = branchInsuranceOfficeNo.substring(4, 10);
                    var branchInsuranceOfficeNoCD = branchInsuranceOfficeNo.substring(10, 11);
                    $('#J22_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branchInsuranceOfficeNo4digit);
                    $('#J23_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branchInsuranceOfficeNo6digit);
                    $('#J24_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branchInsuranceOfficeNoCD);
                } else {
                    $('#J22_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val('');
                    $('#J23_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val('');
                    $('#J24_005F_8E96_8BC6_8F8A_94D4_8D86CD').val('');
                }
                const employeeAddress = (employee_prefecture_data.name || "") + (employee.address_city || "") + (
                    employee.address_ward || "") + (employee.address_apartment || "");
                if (employee.last_name && employee.first_name) {
                    $('#J102_005F_905C_90BF_8ED2_8E81_96BC').val(employeeAddress + '　' + employee.last_name + '　' + employee.first_name);
                    $('#J131_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(employee.last_name + '　' + employee.first_name);
                } else {
                    $('#J102_005F_905C_90BF_8ED2_8E81_96BC').val('');
                    $('#J131_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val('');
                }
                if (branch.tel_area_code && branch.tel_city_code && branch.tel_subscriber_code) {
                    $('#J92_005F_8E73_8A4F_8BC7_94D4').val(branch.tel_area_code);
                    $('#J93_005F_8E73_93E0_8BC7_94D4').val(branch.tel_city_code);
                    $('#J94_005F_89C1_93FC_8ED2_94D4_8D86').val(branch.tel_subscriber_code);
                } else {
                    $('#J92_005F_8E73_8A4F_8BC7_94D4').val('');
                    $('#J93_005F_8E73_93E0_8BC7_94D4').val('');
                    $('#J94_005F_89C1_93FC_8ED2_94D4_8D86').val('');
                }
                $('#J91_005F_8E96_8BC6_8F8A_96BC_005F_8F8A_8DDD_926E').val((branch_prefecture_data.name ?? '') + (
                    branch.address_city ?? '') + (branch.address_ward ?? '') + (branch
                    .address_apartment ?? ''));
                $('#J8_005F_8E81_96BC').on('input', function() {
                    $('#J132_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').val($(this).val());
                });
                $('#J101_005F_82A0_82C4_90E6').val(hello_work);
            }
            Livewire.on('onSelectEmployee', ({
                data
            }) => {
                insertDataFromEmployee(data)
            });
        </script>

        @slot('footer')
            <script src="{{ asset('/js/ledger-form.js') }}" type="module"></script>
        @endslot
    </section>
</x-layout>
