
<!-- 4950008680045000 -->
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
                                <h2>書類・データの添付</h2>
                                <x-ledger-attachment :required_list="[
                                        'wage_payment_status' =>
                                            '六十歳到達時等賃金証明書に記載された賃金支払い状況の内容が確認できる書類',
                                    ]"
                                    :file_original_names="[
                                        'insured_age' => '被保険者の年齢が確認できる書類',
                                        'separation_form' =>
                                            '直前の被保険者資格喪失の日前の賃金支払い状況を記した雇用保険被保険者離職票－２',
                                        'insured_period' => '被保険者期間等証明書',
                                        'passbook' => '払渡希望金融機関の口座に係る被保険者名義の通帳',
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
                                <div class="ui top attached tabular menu">
                                    <a class="item active" data-tab="sample">
                                        高年齢雇用継続給付受給資格確認票・<br>
                                        （初回）高年齢雇用継続給付支給申請書
                                    </a>
                                    <a class="item" data-tab="sample2">
                                        雇用保険被保険者<br>
                                        六十歳到達時等賃金証明書(安定所提出用)
                                    </a>
                                </div>
                                <div class="ui bottom attached segment" data-tab="sample">
                                    <x-form.first_senior_employment_continuation_benefit_claim_form />
                                </div>
                                <div class="ui bottom attached segment" data-tab="sample2"
                                    style="display: none; overflow-x: auto;">
                                    <x-form.employment_insurance_insured_person_wage_certificate_at_sixty />
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

                <input type="hidden" name="query_parameter" id="queryParameter">
            </form>
        </div>

        <div id="ledger-step2" class="step-view my-2">
            <h2 style="text-align: center;">プレビュー</h2>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component>
                        <x-form.first_senior_employment_continuation_benefit_claim_form />
                    </div>
                    <div class="content" preview-component>
                        <x-form.employment_insurance_insured_person_wage_certificate_at_sixty />
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
                $('#J63_005F_944E_8D86').val('{{ $todaySet['japanEra'] }}');
                $('#J64_005F_944E').val('{{ $todaySet['japanEraYear'] }}');
                $('#J65_005F_8C8E').val('{{ $todaySet['month'] }}');
                $('#J66_005F_93FA').val('{{ $todaySet['day'] }}');
                $('#J73_005F_944E_8D86').val('{{ $todaySet['japanEra'] }}');
                $('#J74_005F_944E').val('{{ $todaySet['japanEraYear'] }}');
                $('#J75_005F_8C8E').val('{{ $todaySet['month'] }}');
                $('#J76_005F_93FA').val('{{ $todaySet['day'] }}');

                $('#J71_005F_8E96_8BC6_8EE5_8E81_96BC').val(
                    '{{ old('employer_company_managerial_position_name') }}' ? '{{ old('employer_company_managerial_position_name') }}' : '{{ $company->name }}'+ '　' + '{{ $company->representative }}');
                $('#J30_005F_8E81_96BC').val(
                    '{{ old('employer_company_managerial_position_name') }}' ? '{{ old('employer_company_managerial_position_name') }}' : '{{ $company->name }}'+ '　' + '{{ $company->representative }}');

                @if ($current_employee->role_id === 500)
                    $('#J114_005F_8E73_8A4F_8BC7_94D4').val(
                        '{{ old('laborConsultantTelAreaCode', $current_branch->tel_area_code) }}');
                    $('#J115_005F_8E73_93E0_8BC7_94D4').val(
                        '{{ old('laborConsultantTelCityCode', $current_branch->tel_city_code) }}');
                    $('#J116_005F_89C1_93FC_8ED2_94D4_8D86').val(
                        '{{ old('laborConsultantTelSubscriberCode', $current_branch->tel_subscriber_code) }}');
                    $('#J64_005F_944E_8D86').val('{{ old('laborConsultantJapanEra', $todaySet['japanEra']) }}');
                    $('#J65_005F_944E').val('{{ old('laborConsultantJapanEraYear', $todaySet['japanEraYear']) }}');
                    $('#J66_005F_8C8E').val('{{ old('laborConsultantMonth', $todaySet['month']) }}');
                    $('#J67_005F_93FA').val('{{ old('laborConsultantDay', $todaySet['day']) }}');
                    $('#J70_005F_8E73_8A4F_8BC7_94D4').val(
                        '{{ old('laborConsultantTelAreaCode', $current_branch->tel_area_code) }}');
                    $('#J71_005F_8E73_93E0_8BC7_94D4').val(
                        '{{ old('laborConsultantTelCityCode', $current_branch->tel_city_code) }}');
                    $('#J72_005F_89C1_93FC_8ED2_94D4_8D86').val(
                        '{{ old('laborConsultantTelSubscriberCode', $current_branch->tel_subscriber_code) }}');
                @else
                    $('#J64_005F_944E_8D86').prop('disabled', true);
                    $('#J112_005F_8DEC_90AC_944E_8C8E_93FA_005F_92F1_8F6F_91E3_8D73_8ED2,\
                                                                                                #J113_005F_8E81_96BC, #J114_005F_8E73_8A4F_8BC7_94D4, #J115_005F_8E73_93E0_8BC7_94D4, #J116_005F_89C1_93FC_8ED2_94D4_8D86')
                        .prop('readonly', true);
                    $('#J65_005F_944E,#J66_005F_8C8E, #J67_005F_93FA, #J68_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6,\
                                                                                #J69_005F_8E81_96BC,#J70_005F_8E73_8A4F_8BC7_94D4,#J71_005F_8E73_93E0_8BC7_94D4,#J72_005F_89C1_93FC_8ED2_94D4_8D86,#J73_005F_9574_8B4C_9793')
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
                const birthdayConvertJapan = data['birthday_convert_japan'];
                const sixty_convert_japan = data['sixty_convert_japan'];
                const day_after_sixty_convert_japan = data['day_after_sixty_convert_japan'];
                const employee_prefecture_data = data['employee_prefecture_data'];
                const headquarters_prefecture_data = data['headquarters_prefecture_data'];
                const branch_prefecture_data = data['branch_prefecture_data'];
                const employmentInsuredConvertDate = data['employment_insured_convert_date'];
                const helloWork = data['helloWork'];
                if (employee.employment_insured_no !== null && employee.employment_insured_no.length == 11) {
                    $('#J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.substring(0, 4));
                    $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.substring(4, 10));
                    $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.substring(10, 11));
                    $('#J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85_2nd').val(employee.employment_insured_no.substring(0, 4));
                    $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85_2nd').val(employee.employment_insured_no.substring(4, 10));
                    $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD_2nd').val(employee.employment_insured_no.substring(10, 11));
                } else {
                    $('#J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val("");
                    $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val("");
                    $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val("");
                    $('#J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85_2nd').val("");
                    $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85_2nd').val("");
                    $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD_2nd').val("");
                }
                if (employmentInsuredConvertDate != null) {
                    $('#J6_005F_944E_8D86').val(employmentInsuredConvertDate['era']);
                    $('#J7_005F_944E').val(employmentInsuredConvertDate['year']);
                    $('#J8_005F_8C8E').val(employmentInsuredConvertDate['month']);
                    $('#J9_005F_93FA').val(employmentInsuredConvertDate['day']);
                } else {
                    $('#J6_005F_944E_8D86').val("");
                    $('#J7_005F_944E').val("");
                    $('#J8_005F_8C8E').val("");
                    $('#J9_005F_93FA').val("");
                }
                if (branch.employment_insurance_office_no !== null && branch.employment_insurance_office_no.length == 11) {
                    $('#J10_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.employment_insurance_office_no.substring(0, 4));
                    $('#J11_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.employment_insurance_office_no.substring(4, 10));
                    $('#J12_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.employment_insurance_office_no.substring(10, 11));
                    $('#J5_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.employment_insurance_office_no.substring(0, 4));
                    $('#J6_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.employment_insurance_office_no.substring(4, 10));
                    $('#J7_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.employment_insurance_office_no.substring(10, 11));
                } else {
                    $('#J10_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val("");
                    $('#J11_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val("");
                    $('#J12_005F_8E96_8BC6_8F8A_94D4_8D86CD').val("");
                    $('#J5_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val("");
                    $('#J6_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val("");
                    $('#J7_005F_8E96_8BC6_8F8A_94D4_8D86CD').val("");
                }
                if (employee.post_code !== null && employee.post_code.length == 7) {
                    $('#J15_005F_947A_9242_8BC7_94D4_8D86').val(employee.post_code.substring(0, 3));
                    $('#J16_005F_92AC_88E6_94D4_8D86').val(employee.post_code.substring(3, 7));
                } else {
                    $('#J15_005F_947A_9242_8BC7_94D4_8D86').val("");
                    $('#J16_005F_92AC_88E6_94D4_8D86').val("");
                }
                $('#birthdayEra').val(birthdayConvertJapan['era'] ?? "");
                $('#J26_005F_944E').val(birthdayConvertJapan['year'] ?? "");
                $('#J27_005F_8C8E').val(birthdayConvertJapan['month'] ?? "");
                $('#J28_005F_93FA').val(birthdayConvertJapan['day'] ?? "");
                $('#J21_005F_944E_8D86').val(sixty_convert_japan['era'] ?? "");
                $('#J22_005F_944E').val(sixty_convert_japan['year'] ?? "");
                $('#J23_005F_8C8E').val(sixty_convert_japan['month'] ?? "");
                $('#J24_005F_93FA').val(sixty_convert_japan['day'] ?? "");
                $('#J31_005F_8C8E_month').val(day_after_sixty_convert_japan['month'] ?? "");
                $('#J32_005F_93FA').val(day_after_sixty_convert_japan['day'] ?? "");
                $('#J119_005F_8CC2_906C_94D4_8D86').val(employee.mynumber_card_no || '');
                $('#J68_005F_8E73_8A4F_8BC7_94D4').val(branch.tel_area_code || '');
                $('#J69_005F_8E73_93E0_8BC7_94D4').val(branch.tel_city_code || '');
                $('#J70_005F_89C1_93FC_8ED2_94D4_8D86').val(branch.tel_subscriber_code || '');
                $('#J10_005F_96BC_8FCC').val(branch.name || '');
                $('#J12_005F_8E73_8A4F_8BC7_94D4').val(branch.tel_area_code || '');
                $('#J13_005F_8E73_93E0_8BC7_94D4').val(branch.tel_city_code || '');
                $('#J14_005F_89C1_93FC_8ED2_94D4_8D86').val(branch.tel_subscriber_code || '');
                $('#J18_005F_8E73_8A4F_8BC7_94D4').val(employee.tel_area_code || '');
                $('#J19_005F_8E73_93E0_8BC7_94D4').val(employee.tel_city_code || '');
                $('#J20_005F_89C1_93FC_8ED2_94D4_8D86').val(employee.tel_subscriber_code || '');
                const employeeAddress = (employee_prefecture_data.name || "") + (employee.address_city || "") + (employee
                    .address_ward || "");
                $('#J120_005F_905C_90BF_8ED2_8F5A_8F8A').val(employeeAddress);
                $('#J17_005F_8F5A_8F8A').val(employeeAddress);
                const headquartersAddress = (branch_prefecture_data.name || "") + (branch.address_city || "") + (
                    branch.address_ward || "") + (branch.address_apartment || "");
                $('#J67_005F_8E96_8BC6_8F8A_96BC_005F_8F8A_8DDD_926E').val(headquartersAddress);
                $('#J29_005F_8F5A_8F8A').val(headquartersAddress);
                const branchAddress = (branch_prefecture_data.name || "") + (branch.address_city || "") + (branch
                    .address_ward ||
                    "") + (branch.address_apartment || "");
                $('#J11_005F_8F8A_8DDD_926E').val(branchAddress);
                const fullname = (employee.last_name || "") + "　" + (employee.first_name || "");
                $('#J121_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(fullname);
                $('#J79_005F_905C_90BF_8ED2_8E81_96BC').val(fullname);
                $('#J8_005F_8374_838A_834B_8369').val(fullname);
                const fullnameKana = (employee.last_name_kana || "") + "　" + (employee.first_name_kana || "");
                $('#J122_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').val(fullnameKana);
                $('#J78_005F_905C_90BF_8ED2_8E81_96BC_005F_8374_838A_834B_8369').val(fullnameKana);
                $('#J9_005F_985A_8F5C_8DCE_82C9_9242_82B5_82BD_8ED2_82CC_8E81_96BC').val(fullnameKana);
                $('#J77_005F_82A0_82C4_90E6').val(hello_work);

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
                $('#financialInstitutionNameKanaId').val(employee.bank_name_kana || "");
                $('#J81_005F_8BE0_975A_8B40_8AD6_96BC').val(employee.bank_name || "");
                if(employee.head_office_or_branch_office == 0) {
                    $('input[name="headquartersOrBranch"][value="本店"]').prop('checked', true);
                } else if(employee.head_office_or_branch_office == 1) {
                    $('input[name="headquartersOrBranch"][value="支店"]').prop('checked', true);
                }
                $('#J83_005F_8BE0_975A_8B40_8AD6_8352_815B_8368').val(employee.financial_institution_code || "");
                $('#J84_005F_9358_95DC_8352_815B_8368').val(employee.store_code || "");
                $('#J85_005F_9761_8BE0_92CA_92A0_82CC_8CFB_8DC0_94D4_8D86').val(employee.bank_account_no || "");
                if(employee.japan_post_bank_code_no) {
                    $('#J117_005F_8B4C_8D86_94D4_8D86').val(employee.japan_post_bank_code_no.slice(0, 5) || "");
                    $('#J118_005F_8CFB_8DC0_94D4_8D86').val(employee.japan_post_bank_code_no.slice(5) || "");
                } else {
                    $('#J117_005F_8B4C_8D86_94D4_8D86').val("");
                    $('#J118_005F_8CFB_8DC0_94D4_8D86').val("");
                }
            }
            document.getElementById('J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').addEventListener('input', function() {
                document.getElementById('J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85_2nd').value = this.value;
            });
            document.getElementById('J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').addEventListener('input', function() {
                document.getElementById('J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85_2nd').value = this.value;
            });
            document.getElementById('J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').addEventListener('input', function() {
                document.getElementById('J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD_2nd').value = this.value;
            });
            document.getElementById('J121_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').addEventListener('input', function() {
                document.getElementById('J9_005F_985A_8F5C_8DCE_82C9_9242_82B5_82BD_8ED2_82CC_8E81_96BC').value = this
                    .value;
                document.getElementById('J79_005F_905C_90BF_8ED2_8E81_96BC').value = this.value;
            });
            document.getElementById('J122_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').addEventListener('input',
                function() {
                    document.getElementById('J8_005F_8374_838A_834B_8369').value = this.value;
                    document.getElementById('J78_005F_905C_90BF_8ED2_8E81_96BC_005F_8374_838A_834B_8369').value = this
                        .value;
                });
            document.getElementById('J10_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').addEventListener('input', function() {
                document.getElementById('J5_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').value = this.value;
            });
            document.getElementById('J11_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').addEventListener('input', function() {
                document.getElementById('J6_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').value = this.value;
            });
            document.getElementById('J12_005F_8E96_8BC6_8F8A_94D4_8D86CD').addEventListener('input', function() {
                document.getElementById('J7_005F_8E96_8BC6_8F8A_94D4_8D86CD').value = this.value;
            });
            document.getElementById('J67_005F_8E96_8BC6_8F8A_96BC_005F_8F8A_8DDD_926E').addEventListener('input', function() {
                document.getElementById('J29_005F_8F5A_8F8A').value = this.value;
            });
            document.getElementById('J71_005F_8E96_8BC6_8EE5_8E81_96BC').addEventListener('input', function() {
                document.getElementById('J30_005F_8E81_96BC').value = this.value;
            });
            document.getElementById('J120_005F_905C_90BF_8ED2_8F5A_8F8A').addEventListener('input', function() {
                document.getElementById('J17_005F_8F5A_8F8A').value = this.value;
            });
            document.getElementById('J113_005F_8E81_96BC').addEventListener('input', function() {
                document.getElementById('J69_005F_8E81_96BC').value = this.value;
            });
            document.getElementById('J114_005F_8E73_8A4F_8BC7_94D4').addEventListener('input', function() {
                document.getElementById('J70_005F_8E73_8A4F_8BC7_94D4').value = this.value;
            });
            document.getElementById('J115_005F_8E73_93E0_8BC7_94D4').addEventListener('input', function() {
                document.getElementById('J71_005F_8E73_93E0_8BC7_94D4').value = this.value;
            });
            document.getElementById('J116_005F_89C1_93FC_8ED2_94D4_8D86').addEventListener('input', function() {
                document.getElementById('J72_005F_89C1_93FC_8ED2_94D4_8D86').value = this.value;
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
