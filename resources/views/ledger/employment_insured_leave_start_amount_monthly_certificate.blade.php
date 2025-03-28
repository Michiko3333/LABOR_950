<!-- 4950008680048000 -->
<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

            <style type="text/css"></style>
        @endslot
        <h1>{{ $procedureName }}</h1>
        <p>
            申請・届出に関する事項を入力してください。
        </p>
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
                                <x-ledger-attachment :required_list="['required_wage_certificate_or_payment_status']" :file_original_names="[
                                        'wage_certificate_or_payment_status' =>
                                            '賃金月額証明書 又は 賃金証明書に記載された賃金支払い状況の内容が確認できる書類',
                                        'childcare' => '育児の事実が確認できる書類',
                                        'nursing_care' => '介護の事実が確認できる書類',
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
                            <div class="content" style="overflow-y: auto;">
                                <x-form.employment_insured_leave_start_amount_monthly_certificate />
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

                <input type="hidden" name="query_parameter" id="queryParameter">
            </form>
        </div>

        <div id="ledger-step2" class="step-view my-2">
            <h2 style="text-align: center;">プレビュー</h2>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component
                        style="overflow-x: auto; overflow-y: auto; max-height: 650px;">
                        <x-form.employment_insured_leave_start_amount_monthly_certificate />
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
                $('#J28_005F_8E81_96BC').val('{{ old('headquarters_employee_name') }}' ? '{{ old('headquarters_employee_name') }}' : '{{ $company->name }}'+ '　' + '{{ $company->representative }}');

                @if ($current_employee->role_id === 500)
                    $('#J74_005F_944E_8D86').val('{{ old('labor_consultant_japan_era', $today['era']) }}');
                    $('#J75_005F_944E').val('{{ old('labor_consultant_japan_era_year', $today['year']) }}');
                    $('#J76_005F_8C8E').val('{{ old('labor_consultant_month', $today['month']) }}');
                    $('#J77_005F_93FA').val('{{ old('labor_consultant_day', $today['date']) }}');
                    $('#J80_005F_8E73_8A4F_8BC7_94D4').val(
                        '{{ old('labor_consultant_tel_area_code', $current_branch->tel_area_code) }}');
                    $('#J81_005F_8E73_93E0_8BC7_94D4').val(
                        '{{ old('labor_consultant_tel_city_code', $current_branch->tel_city_code) }}');
                    $('#J82_005F_89C1_93FC_8ED2_94D4_8D86').val(
                        '{{ old('labor_consultant_tel_subscriber_code', $current_branch->tel_subscriber_code) }}');
                @else
                    $('#J74_005F_944E_8D86').prop('disabled', true);
                    $('#J75_005F_944E, #J76_005F_8C8E, #J77_005F_93FA, #J78_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6,\
                                                                                                    #J79_005F_8E81_96BC, #J80_005F_8E73_8A4F_8BC7_94D4, #J81_005F_8E73_93E0_8BC7_94D4, #J82_005F_89C1_93FC_8ED2_94D4_8D86,\
                                                                                                    #J83_005F_9574_8B4C_9793')
                        .prop(
                            'readonly',
                            true);
                @endif
            });
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
                const employee = data['employee'];
                const branch = data['branch'];
                const company = data['company'];
                const headquarters = data['headquarters'];
                const employee_prefecture_data = data['employee_prefecture_data'];
                const headquarters_prefecture_data = data['headquarters_prefecture_data'];
                const branch_prefecture_data = data['branch_prefecture_data'];
                const helloWork = data['helloWork'];
                if (employee.employment_insured_no !== null) {
                    $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.substring(0, 4));
                    $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.substring(4, 10));
                    $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.substring(10));
                } else {
                    $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val("");
                    $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val("");
                    $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val("");
                }
                if (branch.employment_insurance_office_no !== null) {
                    $('#J6_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.employment_insurance_office_no.substring(0, 4));
                    $('#J7_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.employment_insurance_office_no.substring(4, 10));
                    $('#J8_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.employment_insurance_office_no.substring(10));
                } else {
                    $('#J6_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val("");
                    $('#J7_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val("");
                    $('#J8_005F_8E96_8BC6_8F8A_94D4_8D86CD').val("");
                }
                const employeeName = (employee.last_name || "") + '　' + (employee.first_name || "");
                const employeeNameKana = (employee.last_name_kana || "") + '　' + (employee.first_name_kana || "");
                $('#J10_005F_8B78_8BC6_9399_82F0_8A4A_8E6E_82B5_82BD_8ED2_82CC_8E81_96BC').val(employeeName);
                $('#J9_005F_8374_838A_834B_8369').val(employeeNameKana);
                $('#J16_005F_96BC_8FCC').val(company.name);
                const branchAddress = (branch_prefecture_data.name || "") + (branch.address_city || "") + (branch
                    .address_ward || "") + (branch.address_apartment || "");
                $('#J17_005F_8F8A_8DDD_926E').val(branchAddress);
                $('#J18_005F_8E73_8A4F_8BC7_94D4').val(branch.tel_area_code || '');
                $('#J19_005F_8E73_93E0_8BC7_94D4').val(branch.tel_city_code || '');
                $('#J20_005F_89C1_93FC_8ED2_94D4_8D86').val(branch.tel_subscriber_code || '');
                if (employee.post_code !== null && employee.post_code.length == 7) {
                    $('#J21_005F_947A_9242_8BC7_94D4_8D86').val(employee.post_code.substring(0, 3));
                    $('#J22_005F_92AC_88E6_94D4_8D86').val(employee.post_code.substring(3, 7));
                } else {
                    $('#J21_005F_947A_9242_8BC7_94D4_8D86').val("");
                    $('#J22_005F_92AC_88E6_94D4_8D86').val("");
                }
                const employeeAddress = (employee_prefecture_data.name || "") + (employee.address_city || "") + (
                    employee.address_ward || "");
                $('#J23_005F_8F5A_8F8A').val(employeeAddress);
                $('#J24_005F_8E73_8A4F_8BC7_94D4').val(employee.tel_area_code);
                $('#J25_005F_8E73_93E0_8BC7_94D4').val(employee.tel_city_code);
                $('#J26_005F_89C1_93FC_8ED2_94D4_8D86').val(employee.tel_subscriber_code);
                const headquarterAddress = (branch_prefecture_data.name || "") + (branch.address_city || "") 
                + (branch.address_ward || "") + (branch.address_apartment || "");
                $('#J27_005F_8F5A_8F8A').val(headquarterAddress);

                const prefectureSelect = document.querySelector('select[name="selected_prefecture"]');
                const helloWorkSelect = document.querySelector('select[name="selected_hello_work"]');

                if(helloWork){
                    prefectureSelect.addEventListener('change', function () {
                    setTimeout(()=>{
                            helloWorkSelect.value = helloWork.id;
                        },700);
                    });
                    prefectureSelect.value = helloWork.address_prefecture;
                    prefectureSelect.dispatchEvent(new Event('change', { bubbles: true }));
                    document.querySelector('input[name="apply_to_code"]').value = helloWork.identifier_d;
                    document.querySelector('input[name="apply_to_code"]').dispatchEvent(new Event('input'));
                    document.querySelector('input[name="apply_to_name"]').value = helloWork.submit_union_name_d;
                    document.querySelector('input[name="apply_to_name"]').dispatchEvent(new Event('input'));
                }else{
                    $("select[name='selected_prefecture']").val('');
                    $("select[name='selected_hello_work']").val('');
                    $("input[name='apply_to_name']").val('');
                    $("input[name='apply_to_code']").val('');
                }
            }
            $('#J14_005F_8C8E').on('change', function() {
                $('#J29_005F_8C8E').val($(this).val());
            });
            $('#J15_005F_93FA').on('change', function() {
                $('#J30_005F_93FA').val($(this).val());
            });
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
