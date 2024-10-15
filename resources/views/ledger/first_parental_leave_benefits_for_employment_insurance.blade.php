<!-- 4950008680182000 -->
<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

            <style type="text/css"></style>
        @endslot
        <h1>{{ $procedureName }}</h1>
        <p>申請・届出に関する事項を入力してください。<br>
            複数の様式を提出する場合は、タブから様式を切り替えてください。
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
                <div class="ledger-twocol my-2">
                    <div class="left-col">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>社員選択</h2>
                                <livewire:ledger-employee-list />
                            </div>
                        </div>
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>添付ファイル</h2>
                                <x-ledger-attachment :required_list="['required_childcare']" :file_original_names="[
                                    'childcare' => '育児の事実が確認できる書類',
                                    'wage_amount' =>
                                        '休業開始時賃金月額証明書に記載された育児休業を開始した日及びその日前の賃金の額が確認できる書類',
                                    'wage_certificate' => '雇用保険被保険者休業開始時賃金月額証明票',
                                    'confirmation_document' =>
                                        '支給申請書に記載した賃金額、就業した日数及び時間、出産予定日、出産日、育児休業開始日、育児休業終了日等記載内容を確認できる書類',
                                    'passbook' => '払渡希望金融機関の口座に係る被保険者名義の通帳',
                                    'extension_reason' => '延長事由に該当することを確認できる書類',
                                    'spouse' => '被保険者の配偶者であることを確認できる書類',
                                    'spouse_childcare_leave' => '被保険者の配偶者の育児休業の取得を確認できる書類',
                                    'other' => 'その他の添付書類',
                                ]" :extensions="'.doc,.docx,.jpg,.jpeg,.pdf,.xls,.xlsx'" />
                            </div>
                        </div>
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>提出先選択</h2>
                                <livewire:submission-selector :mode="0" />
                            </div>
                        </div>
                    </div>
                    <div class="right-col">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <div class="ui top attached tabular menu">
                                    <a class="item active" data-tab="sample">
                                        育児休業給付受給資格確認票・<br>
                                        （初回）育児休業給付金支給申請書
                                    </a>
                                    <a class="item" data-tab="sample2">
                                        雇用保険被保険者休業開始時賃金月額証明書／<br>
                                        所定労働時間短縮開始時賃金証明書
                                    </a>
                                </div>
                                <div class="ui bottom attached segment" data-tab="sample">
                                    <x-form.parental_leave_benefits_claim_form />
                                </div>
                                <div class="ui bottom attached segment" data-tab="sample2" style="display: none;">
                                    <x-form.employment_insurance_insured_person_leave_start_wage_monthly_certificate />
                                </div>
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

        <div id="ledger-step2" class="step-view my-2">
            <h2 style="text-align: center;">プレビュー</h2>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component>
                        <x-form.parental_leave_benefits_claim_form />
                    </div>
                </div>
            </div>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component>
                        <x-form.employment_insurance_insured_person_leave_start_wage_monthly_certificate />
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
                $('#J145_005F_944E_8D86').val('{{ $todaySet['japanEra'] }}');
                $('#J146_005F_944E').val('{{ $todaySet['japanEraYear'] }}');
                $('#J147_005F_8C8E').val('{{ $todaySet['month'] }}');
                $('#J148_005F_93FA').val('{{ $todaySet['day'] }}');
                $('#J157_005F_944E_8D86').val('{{ $todaySet['japanEra'] }}');
                $('#J158_005F_944E').val('{{ $todaySet['japanEraYear'] }}');
                $('#J159_005F_8C8E').val('{{ $todaySet['month'] }}');
                $('#J160_005F_93FA').val('{{ $todaySet['day'] }}');

                $('#J154_005F_8E96_8BC6_8EE5_8E81_96BC').val(
                    '{{ old('employer_company_managerial_position_name') }}' ? '{{ old('employer_company_managerial_position_name') }}' : '{{ $company->name }}'+ '　' + '{{ $company->representative }}');
                $('#J28_005F_8E81_96BC').val(
                    '{{ old('employer_company_managerial_position_name') }}' ? '{{ old('employer_company_managerial_position_name') }}' : '{{ $company->name }}'+ '　' + '{{ $company->representative }}');

                @if ($current_employee->role_id === 500)
                    $('#J198_005F_8E73_8A4F_8BC7_94D4').val(
                        '{{ old('labor_consultant_tel_treacode', $current_branch->tel_area_code) }}');
                    $('#J199_005F_8E73_93E0_8BC7_94D4').val(
                        '{{ old('labor_consultant_tel_city_code', $current_branch->tel_city_code) }}');
                    $('#J200_005F_89C1_93FC_8ED2_94D4_8D86').val(
                        '{{ old('labor_consultant_tel_subscriber_code', $current_branch->tel_subscriber_code) }}');
                    $('#J74_005F_944E_8D86').val('{{ $todaySet['japanEra'] }}');
                    $('#J75_005F_944E').val('{{ old('labor_consultant_japan_era_year', $todaySet['japanEraYear']) }}');
                    $('#J76_005F_8C8E').val('{{ old('labor_consultant_month', $todaySet['month']) }}');
                    $('#J77_005F_93FA').val('{{ old('labor_consultant_month', $todaySet['day']) }}');
                    $('#J80_005F_8E73_8A4F_8BC7_94D4').val(
                        '{{ old('labor_consultant_tel_treacode', $current_branch->tel_area_code) }}');
                    $('#J81_005F_8E73_93E0_8BC7_94D4').val(
                        '{{ old('labor_consultant_tel_city_code', $current_branch->tel_city_code) }}');
                    $('#J82_005F_89C1_93FC_8ED2_94D4_8D86').val(
                        '{{ old('labor_consultant_tel_subscriber_code', $current_branch->tel_subscriber_code) }}');
                @else
                    $('#J195_005F_8DEC_90AC_944E_8C8E_93FA_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2,\
                                                                                                        #J196_005F_8ED0_89EF_95DB_8CAF_984A_96B1_8E6D_005F_8E81_96BC, #J198_005F_8E73_8A4F_8BC7_94D4, #J199_005F_8E73_93E0_8BC7_94D4, #J200_005F_89C1_93FC_8ED2_94D4_8D86,\
                                                                                                        #J74_005F_944E_8D86,#J75_005F_944E,#J76_005F_8C8E,#J77_005F_93FA,#J78_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6,#J79_005F_8E81_96BC,\
                                                                                                        #J80_005F_8E73_8A4F_8BC7_94D4,#J81_005F_8E73_93E0_8BC7_94D4,#J82_005F_89C1_93FC_8ED2_94D4_8D86')
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
                const todaySet = data['todaySet'];
                const employee_prefecture_data = data['employee_prefecture_data'];
                const headquarters_prefecture_data = data['headquarters_prefecture_data'];
                const branch_prefecture_data = data['branch_prefecture_data'];
                const employmentInsuredConvertDate = data['employment_insured_convert_date'];
                if (employee.employment_insured_no !== null && employee.employment_insured_no.length == 11) {
                    $('#J12_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.substring(0, 4));
                    $('#J13_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.substring(4, 10));
                    $('#J14_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.substring(10, 11));
                    $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.substring(0, 4));
                    $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.substring(4, 10));
                    $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.substring(10, 11));
                } else {
                    $('#J12_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val("");
                    $('#J13_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val("");
                    $('#J14_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val("");
                    $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val("");
                    $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val("");
                    $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val("");
                }
                if (employmentInsuredConvertDate != null) {
                    $('#J16_005F_944E_8D86').val(employmentInsuredConvertDate['era']);
                    $('#J17_005F_944E').val(employmentInsuredConvertDate['year']);
                    $('#J18_005F_8C8E').val(employmentInsuredConvertDate['month']);
                    $('#J19_005F_93FA').val(employmentInsuredConvertDate['day']);
                } else {
                    $('#J16_005F_944E_8D86').val("");
                    $('#J17_005F_944E').val("");
                    $('#J18_005F_8C8E').val("");
                    $('#J19_005F_93FA').val("");
                }

                const employeeNameKana = (employee.last_name_kana || "") + '　' + (employee.first_name_kana || "");
                const employeeName = (employee.last_name || "") + '　' + (employee.first_name || "");
                const employeeAddress = (employee_prefecture_data.name || "") + (employee.address_city || "") + (
                    employee.address_ward || "");
                $('#J21_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').val(employeeNameKana);
                $('#J20_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(employeeName);
                $('#J162_005F_905C_90BF_8ED2_8E81_96BC_005F_8374_838A_834B_8369').val(employeeNameKana);
                $('#J163_005F_905C_90BF_8ED2_8E81_96BC').val(employeeAddress + '　' + employeeName);
                $('#J9_005F_8374_838A_834B_8369').val(employeeNameKana);
                $('#J10_005F_8B78_8BC6_9399_82F0_8A4A_8E6E_82B5_82BD_8ED2_82CC_8E81_96BC').val(employeeName);

                if (branch.employment_insurance_office_no !== null && branch.employment_insurance_office_no.length == 11) {
                    $('#J23_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.employment_insurance_office_no.substring(0, 4));
                    $('#J24_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.employment_insurance_office_no.substring(4, 10));
                    $('#J25_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.employment_insurance_office_no.substring(10, 11));
                    $('#J6_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.employment_insurance_office_no.substring(0, 4));
                    $('#J7_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.employment_insurance_office_no.substring(4, 10));
                    $('#J8_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.employment_insurance_office_no.substring(10, 11));
                } else {
                    $('#J23_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val("");
                    $('#J24_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val("");
                    $('#J25_005F_8E96_8BC6_8F8A_94D4_8D86CD').val("");
                    $('#J6_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val("");
                    $('#J7_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val("");
                    $('#J8_005F_8E96_8BC6_8F8A_94D4_8D86CD').val("");
                }

                if (employee.post_code !== null && employee.post_code.length == 7) {
                    $('#J44_005F_947A_9242_8BC7_94D4_8D86').val(employee.post_code.substring(0, 3));
                    $('#J45_005F_92AC_88E6_94D4_8D86').val(employee.post_code.substring(3, 7));
                    $('#J21_005F_947A_9242_8BC7_94D4_8D86').val(employee.post_code.substring(0, 3));
                    $('#J22_005F_92AC_88E6_94D4_8D86').val(employee.post_code.substring(3, 7));
                } else {
                    $('#J44_005F_947A_9242_8BC7_94D4_8D86').val("");
                    $('#J45_005F_92AC_88E6_94D4_8D86').val("");
                    $('#J21_005F_947A_9242_8BC7_94D4_8D86').val("");
                    $('#J22_005F_92AC_88E6_94D4_8D86').val("");
                }

                $('#J42_005F_8CC2_906C_94D4_8D86').val(employee.mynumber_card_no || '');
                $('#J50_005F_8E73_8A4F_8BC7_94D4').val(employee.tel_area_code || '');
                $('#J51_005F_8E73_93E0_8BC7_94D4').val(employee.tel_city_code || '');
                $('#J52_005F_89C1_93FC_8ED2_94D4_8D86').val(employee.tel_subscriber_code || '');
                $('#J46_005F_94ED_95DB_8CAF_8ED2_82CC_8F5A_8F8A_005F_8ABF_8E9A_005F_8E73_8BE6_8C53_8B79_82D1_92AC_91BA_96BC')
                    .val((employee_prefecture_data.name || "") + (employee.address_city || ""));
                $('#J47_005F_94ED_95DB_8CAF_8ED2_82CC_8F5A_8F8A_005F_8ABF_8E9A_005F_929A_96DA_005F_94D4_926E').val(employee
                    .address_ward || '');
                $('#J48_005F_94ED_95DB_8CAF_8ED2_82CC_8F5A_8F8A_005F_8ABF_8E9A_005F_8341_8370_815B_8367_005F_837D_8393_8356_8387_8393_96BC_9399')
                    .val(employee.address_apartment || '');
                $('#J149_005F_8E96_8BC6_8F8A_96BC_005F_8F8A_8DDD_926E').val((branch_prefecture_data.name || "") + (
                    branch.address_city || "") + (branch.address_ward || "") + (branch
                    .address_apartment || ""));
                $('#J151_005F_8E73_8A4F_8BC7_94D4').val(branch.tel_area_code || '');
                $('#J152_005F_8E73_93E0_8BC7_94D4').val(branch.tel_city_code || '');
                $('#J153_005F_89C1_93FC_8ED2_94D4_8D86').val(branch.tel_subscriber_code || '');
                $('#J16_005F_96BC_8FCC').val(company.name || '');
                $('#J17_005F_8F8A_8DDD_926E').val((branch_prefecture_data.name || "") + (branch.address_city || "") + (branch
                    .address_ward || "") + (branch.address_apartment || ""));
                $('#J18_005F_8E73_8A4F_8BC7_94D4').val(branch.tel_area_code || '');
                $('#J19_005F_8E73_93E0_8BC7_94D4').val(branch.tel_city_code || '');
                $('#J20_005F_89C1_93FC_8ED2_94D4_8D86').val(branch.tel_subscriber_code || '');
                $('#J23_005F_8F5A_8F8A').val((employee_prefecture_data.name || "") + (employee.address_city || "") + (employee
                    .address_ward || ""));
                $('#J24_005F_8E73_8A4F_8BC7_94D4').val(employee.tel_area_code || '');
                $('#J25_005F_8E73_93E0_8BC7_94D4').val(employee.tel_city_code || '');
                $('#J26_005F_89C1_93FC_8ED2_94D4_8D86').val(employee.tel_subscriber_code || '');
                $('#J27_005F_8F5A_8F8A').val((branch_prefecture_data.name || "") + (branch.address_city || "") + (
                    branch.address_ward || "") + (branch.address_apartment || ""));
                $('#J161_005F_82A0_82C4_90E6').val(hello_work);
                }
            document.getElementById('J12_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').addEventListener('input', function() {
                document.getElementById('J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').value = this.value;
            });
            document.getElementById('J13_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').addEventListener('input', function() {
                document.getElementById('J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').value = this.value;
            });
            document.getElementById('J14_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').addEventListener('input', function() {
                document.getElementById('J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').value = this.value;
            });
            document.getElementById('J23_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').addEventListener('input', function() {
                document.getElementById('J6_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').value = this.value;
            });
            document.getElementById('J24_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').addEventListener('input', function() {
                document.getElementById('J7_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').value = this.value;
            });
            document.getElementById('J25_005F_8E96_8BC6_8F8A_94D4_8D86CD').addEventListener('input', function() {
                document.getElementById('J8_005F_8E96_8BC6_8F8A_94D4_8D86CD').value = this.value;
            });
            document.getElementById('J27_005F_944E_8D86').addEventListener('input', function() {
                document.getElementById('J12_005F_944E_8D86').value = this.value;
            });
            document.getElementById('J28_005F_944E').addEventListener('input', function() {
                document.getElementById('J13_005F_944E').value = this.value;
            });
            document.getElementById('J29_005F_8C8E').addEventListener('input', function() {
                document.getElementById('J14_005F_8C8E').value = this.value;
                document.getElementById('J29_005F_8C8E1').value = this.value;
            });
            document.getElementById('J30_005F_93FA').addEventListener('input', function() {
                document.getElementById('J15_005F_93FA').value = this.value;
                document.getElementById('J30_005F_93FA1').value = this.value;
            });
            document.getElementById('J20_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').addEventListener('input', function() {
                document.getElementById('J10_005F_8B78_8BC6_9399_82F0_8A4A_8E6E_82B5_82BD_8ED2_82CC_8E81_96BC').value =
                    this.value;
            });
            document.getElementById('J21_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').addEventListener('input',
                function() {
                    document.getElementById('J162_005F_905C_90BF_8ED2_8E81_96BC_005F_8374_838A_834B_8369').value = this
                        .value;
                    document.getElementById('J9_005F_8374_838A_834B_8369').value = this.value;
                });
            document.getElementById('J50_005F_8E73_8A4F_8BC7_94D4').addEventListener('input', function() {
                document.getElementById('J24_005F_8E73_8A4F_8BC7_94D4').value = this.value;
            });
            document.getElementById('J51_005F_8E73_93E0_8BC7_94D4').addEventListener('input', function() {
                document.getElementById('J25_005F_8E73_93E0_8BC7_94D4').value = this.value;
            });
            document.getElementById('J52_005F_89C1_93FC_8ED2_94D4_8D86').addEventListener('input', function() {
                document.getElementById('J26_005F_89C1_93FC_8ED2_94D4_8D86').value = this.value;
            });
            // document.getElementById('J149_005F_8E96_8BC6_8F8A_96BC_005F_8F8A_8DDD_926E').addEventListener('input', function() {
            //     document.getElementById('J17_005F_8F8A_8DDD_926E').value = this.value;
            // });
            document.getElementById('J149_005F_8E96_8BC6_8F8A_96BC_005F_8F8A_8DDD_926E').addEventListener('input', function() {
                document.getElementById('J27_005F_8F5A_8F8A').value = this.value;
            });
            document.getElementById('J154_005F_8E96_8BC6_8EE5_8E81_96BC').addEventListener('input', function() {
                document.getElementById('J28_005F_8E81_96BC').value = this.value;
            });
            document.getElementById('J44_005F_947A_9242_8BC7_94D4_8D86').addEventListener('input', function() {
                document.getElementById('J21_005F_947A_9242_8BC7_94D4_8D86').value = this.value;
            });
            document.getElementById('J45_005F_92AC_88E6_94D4_8D86').addEventListener('input', function() {
                document.getElementById('J22_005F_92AC_88E6_94D4_8D86').value = this.value;
            });
            document.getElementById('J196_005F_8ED0_89EF_95DB_8CAF_984A_96B1_8E6D_005F_8E81_96BC').addEventListener('input',
                function() {
                    document.getElementById('J79_005F_8E81_96BC').value = this.value;
                });
            document.getElementById('J198_005F_8E73_8A4F_8BC7_94D4').addEventListener('input', function() {
                document.getElementById('J80_005F_8E73_8A4F_8BC7_94D4').value = this.value;
            });
            document.getElementById('J199_005F_8E73_93E0_8BC7_94D4').addEventListener('input', function() {
                document.getElementById('J81_005F_8E73_93E0_8BC7_94D4').value = this.value;
            });
            document.getElementById('J200_005F_89C1_93FC_8ED2_94D4_8D86').addEventListener('input', function() {
                document.getElementById('J82_005F_89C1_93FC_8ED2_94D4_8D86').value = this.value;
            });



            document.getElementById(
                    'J46_005F_94ED_95DB_8CAF_8ED2_82CC_8F5A_8F8A_005F_8ABF_8E9A_005F_8E73_8BE6_8C53_8B79_82D1_92AC_91BA_96BC')
                .addEventListener('input', addressPlus);
            document.getElementById('J47_005F_94ED_95DB_8CAF_8ED2_82CC_8F5A_8F8A_005F_8ABF_8E9A_005F_929A_96DA_005F_94D4_926E')
                .addEventListener('input', addressPlus);
            document.getElementById(
                'J48_005F_94ED_95DB_8CAF_8ED2_82CC_8F5A_8F8A_005F_8ABF_8E9A_005F_8341_8370_815B_8367_005F_837D_8393_8356_8387_8393_96BC_9399'
            ).addEventListener('input', addressPlus);

            function addressPlus() {
                const prefectureCity = document.getElementById(
                    'J46_005F_94ED_95DB_8CAF_8ED2_82CC_8F5A_8F8A_005F_8ABF_8E9A_005F_8E73_8BE6_8C53_8B79_82D1_92AC_91BA_96BC'
                ).value;
                const addressWard = document.getElementById(
                    'J47_005F_94ED_95DB_8CAF_8ED2_82CC_8F5A_8F8A_005F_8ABF_8E9A_005F_929A_96DA_005F_94D4_926E').value;
                const addressApartment = document.getElementById(
                    'J48_005F_94ED_95DB_8CAF_8ED2_82CC_8F5A_8F8A_005F_8ABF_8E9A_005F_8341_8370_815B_8367_005F_837D_8393_8356_8387_8393_96BC_9399'
                ).value;
                const address = prefectureCity + addressWard + addressApartment;
                document.getElementById('J23_005F_8F5A_8F8A').value = address;
                document.getElementById('J23_005F_8F5A_8F8A').setAttribute('value', address);
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
