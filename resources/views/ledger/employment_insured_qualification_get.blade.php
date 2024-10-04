<!-- 4950008680033000 -->
<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

            <style type="text/css"></style>
        @endslot
        <h1>{{ $procedureName }}</h1>
        <p>申請・届出に関する事項を入力してください。
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
                                <x-ledger-attachment :file_original_names="[
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
                                <x-form.employment_insured_qualification_get :residentials="$residentials" :countries="$countries"/>
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
                        <x-form.employment_insured_qualification_get :residentials="$residentials" :countries="$countries"/>
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
                $('#J24_005F_944E_8D86').val('{{ old('insured_date_era', $today['era']) }}');
                $('#J65_005F_944E_8D86').val('{{ old('notification_era', $today['era']) }}');
                $('#J66_005F_944E').val('{{ old('notification_year', $today['year']) }}');
                $('#J67_005F_8C8E').val('{{ old('notification_month', $today['month']) }}');
                $('#J68_005F_93FA').val('{{ old('notification_day', $today['date']) }}');

                $('#J56_005F_8E81_96BC').val(
                    '{{ old('employer_company_managerial_position_name', $company->name) }}' + '　' + '{{ $company->representative }}'
                );
                @if ($current_employee->role_id === 500)
                    $('#J71_005F_944E_8D86').val('{{ old('create_era', $today['era']) }}');
                    $('#J71_005F_944E_8D86').find('option').not(`[value="{{ old('create_era', $today['era']) }}"]`)
                        .prop('disabled', true);
                    $('#J72_005F_944E').val('{{ old('create_year', $today['year']) }}');
                    $('#J73_005F_8C8E').val('{{ old('create_month', $today['month']) }}');
                    $('#J74_005F_93FA').val('{{ old('create_day', $today['date']) }}');
                    $('#J77_005F_8E73_8A4F_8BC7_94D4').val(
                        '{{ old('labor_consultant_tel_area_code', $current_branch->tel_area_code) }}');
                    $('#J78_005F_8E73_93E0_8BC7_94D4').val(
                        '{{ old('labor_consultant_tel_city_code', $current_branch->tel_city_code) }}');
                    $('#J79_005F_89C1_93FC_8ED2_94D4_8D86').val(
                        '{{ old('labor_consultant_tel_subscriber_code', $current_branch->tel_subscriber_code) }}');
                @else
                    $('#J72_005F_944E, #J73_005F_8C8E, #J74_005F_93FA, \
                                                            #J75_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6, #J76_005F_8E81_96BC,\
                                                            #J77_005F_8E73_8A4F_8BC7_94D4, #J78_005F_8E73_93E0_8BC7_94D4, \
                                                            #J79_005F_89C1_93FC_8ED2_94D4_8D86, #J80_005F_9574_8B4C_9793, #J80_005F_9574_8B4C_9793')
                        .prop(
                            'readonly', true);
                @endif
                $('#J33_005F_8C5F_96F1_8AFA_8AD4_82CC_92E8_82DF_1,#J33_005F_8C5F_96F1_8AFA_8AD4_82CC_92E8_82DF_2')
                    .change(function() {
                        if ($("input[name='contract_period_flg']").eq(0).is(":checked")) {
                            $('#J35_005F_944E_8D86, #J36_005F_944E, #J36_005F_944E, #J37_005F_8C8E, #J38_005F_93FA, #J40_005F_944E_8D86,\
                                                                                                                                    #J41_005F_944E, #J42_005F_8C8E, #J43_005F_93FA, #J44_005F_8C5F_96F1_8D58_9056_8FF0_8D80_974C_96B3')
                                .prop('disabled', false);
                        } else if ($("input[name='contract_period_flg']").eq(1).is(":checked")) {
                            $('#J35_005F_944E_8D86').val('').prop('disabled', true);
                            $('#J36_005F_944E').val('').prop('disabled', true);
                            $('#J37_005F_8C8E').val('').prop('disabled', true);
                            $('#J38_005F_93FA').val('').prop('disabled', true);
                            $('#J40_005F_944E_8D86').val('').prop('disabled', true);
                            $('#J41_005F_944E').val('').prop('disabled', true);
                            $('#J42_005F_8C8E').val('').prop('disabled', true);
                            $('#J43_005F_93FA').val('').prop('disabled', true);
                            $('#J44_005F_8C5F_96F1_8D58_9056_8FF0_8D80_974C_96B3').val('').prop('disabled', true);
                        }
                    });
                $('#J6_005F_8EE6_93BE').change(function() {
                    var selectedOption = $(this).val();
                    if (selectedOption === '1') {
                        $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val('').prop('disabled', true);
                        $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val('').prop('disabled', true);
                        $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val('').prop('disabled', true);
                    } else {
                        $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').prop('disabled', false);
                        $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').prop('disabled', false);
                        $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').prop('disabled', false);
                    }
                });
            })
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
                $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val('');
                $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val('');
                $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val('');
                const employee = data['employee'];
                const branch = data['branch'];
                const company = data['company'];
                const hello_work = data['hello_work'];
                const branch_prefecture_data = data['branch_prefecture_data'];
                const birthdayConvertJapan = data['birthday_convert_japan'];
                const headquarters = data['headquarters'];
                const headquarters_prefecture_data = data['headquarters_prefecture_data'];
                const country_value = data['country_value'];
                const residential_status_value = data['residential_status_value'];
                const employmentInsuredConvertDate = data['employment_insured_convert_date'];
                const contract_start_convert_date = data['contract_start_convert_date'];
                const contract_end_convert_date = data['contract_end_convert_date'];
                $('#J2_005F_8CC2_906C_94D4_8D86').val(employee.mynumber_card_no ?? '');
                if (employee.employment_insured_no != null) {
                    $('#J6_005F_8EE6_93BE').off('change').on('change', function() {
                        var selectedOption = $(this).val();
                        if (selectedOption === '1') {
                            $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val('').prop('disabled', true);
                            $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val('').prop('disabled', true);
                            $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val('').prop('disabled', true);
                        } else if(selectedOption === '2'){
                            $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no
                                .substring(0, 4)).prop('disabled', false);
                            $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no
                                .substring(4, 10)).prop('disabled', false);
                            $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.substring(
                                10, 11)).prop('disabled', false);
                        }
                    });
                }
                $('#J7_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val((employee.last_name ? employee.last_name + '　' : '') + (employee
                    .first_name ?? ''));
                $('#J8_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').val((employee.last_name_kana ? employee
                    .last_name_kana + '　' : '') + (employee.first_name_kana ?? ''));
                $('#J11_005F_90AB_95CA').val((employee.sex === 1) ? '1' : '2');
                $('#J13_005F_944E_8D86').val(birthdayConvertJapan['era'] ?? "");
                $('#J14_005F_944E').val(birthdayConvertJapan['year'] ?? "");
                $('#J15_005F_8C8E').val(birthdayConvertJapan['month'] ?? "");
                $('#J16_005F_93FA').val(birthdayConvertJapan['day'] ?? "");
                if (branch.employment_insurance_office_no != null) {
                    $('#J17_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.employment_insurance_office_no.substring(0, 4));
                    $('#J18_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.employment_insurance_office_no.substring(4, 10));
                    $('#J19_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.employment_insurance_office_no.substring(10, 11));
                }
                $('#J20_005F_94ED_95DB_8CAF_8ED2_82C6_82C8_82C1_82BD_82B1_82C6_82CC_8CB4_88F6').val(employee.insured_reason ??
                    '');
                $('#J21_005F_8E78_95A5_82CC_91D4_976C').val(employee.salary_payment_system ?? '');
                if (employmentInsuredConvertDate != null) {
                    $('#J24_005F_944E_8D86').val(employmentInsuredConvertDate['era']);
                    $('#J25_005F_944E').val(employmentInsuredConvertDate['year']);
                    $('#J26_005F_8C8E').val(employmentInsuredConvertDate['month']);
                    $('#J27_005F_93FA').val(employmentInsuredConvertDate['day']);
                } else {
                    $('#J24_005F_944E_8D86').val("");
                    $('#J25_005F_944E').val("");
                    $('#J26_005F_8C8E').val("");
                    $('#J27_005F_93FA').val("");
                }
                $('#J29_005F_9045_8EED').val(employee.occupation_type ?? '');
                $('#J30_005F_8F41_9045_8C6F_9848').val(employee.employment_route ?? '');
                if (branch.agreed_hours_week_h != null) {
                    $('#J31_005F_8E9E_8AD4').val(branch.agreed_hours_week_h);
                } else {
                    $('#J31_005F_8E9E_8AD4').val('');
                }
                if (branch.agreed_hours_week_m != null) {
                    $('#J32_005F_95AA').val(branch.agreed_hours_week_m);
                } else {
                    $('#J32_005F_95AA').val('');
                }
                if (branch.agreed_hours_week_h && branch.agreed_hours_week_m == null) {
                    $('#J31_005F_8E9E_8AD4').val(branch.agreed_hours_week_h);
                    $('#J32_005F_95AA').val(0);
                }
                if (employee.contract_period_flg === 1) {
                    $("input[name='contract_period_flg']").eq(0).prop("checked", true);
                    $('#J35_005F_944E_8D86, #J36_005F_944E, #J36_005F_944E, #J37_005F_8C8E, #J38_005F_93FA, #J40_005F_944E_8D86,\
                        #J41_005F_944E, #J42_005F_8C8E, #J43_005F_93FA, #J44_005F_8C5F_96F1_8D58_9056_8FF0_8D80_974C_96B3')
                        .prop('disabled', false);
                    $('#J35_005F_944E_8D86').val(contract_start_convert_date['era'] ?? "");
                    $('#J36_005F_944E').val(contract_start_convert_date['year'] ?? "");
                    $('#J37_005F_8C8E').val(contract_start_convert_date['month'] ?? "");
                    $('#J38_005F_93FA').val(contract_start_convert_date['day'] ?? "");
                    $('#J40_005F_944E_8D86').val(contract_end_convert_date['era'] ?? "");
                    $('#J41_005F_944E').val(contract_end_convert_date['year'] ?? "");
                    $('#J42_005F_8C8E').val(contract_end_convert_date['month'] ?? "");
                    $('#J43_005F_93FA').val(contract_end_convert_date['day'] ?? "");
                    $('#J44_005F_8C5F_96F1_8D58_9056_8FF0_8D80_974C_96B3').val((employee.contract_renewal_flg === 1) ? '有' :
                        '無');
                    $('#J28_005F_8CD9_9770_8C60_91D4').val('');
                } else if (employee.contract_period_flg === 0) {
                    $("input[name='contract_period_flg']").eq(1).prop("checked", true);
                    $('#J35_005F_944E_8D86').val('').prop('disabled', true);
                    $('#J36_005F_944E').val('').prop('disabled', true);
                    $('#J37_005F_8C8E').val('').prop('disabled', true);
                    $('#J38_005F_93FA').val('').prop('disabled', true);
                    $('#J40_005F_944E_8D86').val('').prop('disabled', true);
                    $('#J41_005F_944E').val('').prop('disabled', true);
                    $('#J42_005F_8C8E').val('').prop('disabled', true);
                    $('#J43_005F_93FA').val('').prop('disabled', true);
                    $('#J44_005F_8C5F_96F1_8D58_9056_8FF0_8D80_974C_96B3').val('').prop('disabled', true);
                    $('#J28_005F_8CD9_9770_8C60_91D4').val('7');
                }
                $('#J45_005F_8E96_8BC6_8F8A_96BC_8FCC').val(company.name);
                $('#J46_005F_94F5_8D6C').val(employee.insured_reason_details);
                if (employee.country_id !== null) {
                    $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A').val((employee.first_name_alphabet ?
                        employee.first_name_alphabet + ' ' : '') + (employee.last_name_alphabet ?? '').toUpperCase());
                    $('#J87_005F_8DDD_97AF_834A_815B_8368_94D4_8D86').val(employee.residence_card_no ?? '');
                    if (employee.stay_date_period != null) {
                        const stayDatePeriod = employee.stay_date_period.split('-');
                        $('#J52_005F_944E').val(stayDatePeriod[0].replace(/^0+/, ''));
                        $('#J53_005F_8C8E').val(stayDatePeriod[1].replace(/^0+/, ''));
                        $('#J54_005F_93FA').val(stayDatePeriod[2].replace(/^0+/, ''));
                    }
                    if (employee.unauthorized_activities_permission_flg == 1) {
                        $('#J55_005F_8E91_8A69_8A4F_8A88_93AE_8B96_89C2_82CC_974C_96B3').val('有');
                    } else {
                        $('#J55_005F_8E91_8A69_8A4F_8A88_93AE_8B96_89C2_82CC_974C_96B3').val('無');
                    }
                    if (employee.dispatch_contract_completion != '' && employee.dispatch_contract_completion != null) {
                        $('#J56_005F_9468_8CAD_005F_90BF_9589_8F41_984A_8BE6_95AA').val(employee.dispatch_contract_completion);
                    } else {
                        $('#J56_005F_9468_8CAD_005F_90BF_9589_8F41_984A_8BE6_95AA').val('1');
                    }
                    $('#J48_005F_8D91_90D0_005F_926E_88E6').val(country_value ?? '');
                    $('#J49_005F_8DDD_97AF_8E91_8A69').val(residential_status_value ?? '');
                    $('#J50_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752').val(employee
                        .residential_status_unknown_reason ?? '');
                    $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A, #J87_005F_8DDD_97AF_834A_815B_8368_94D4_8D86,\
                        #J52_005F_944E, #J53_005F_8C8E, #J54_005F_93FA, #J55_005F_8E91_8A69_8A4F_8A88_93AE_8B96_89C2_82CC_974C_96B3,\
                        #J56_005F_9468_8CAD_005F_90BF_9589_8F41_984A_8BE6_95AA, #J48_005F_8D91_90D0_005F_926E_88E6, \
                        #J49_005F_8DDD_97AF_8E91_8A69, #J50_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752')
                        .prop('disabled', false);
                }else{
                    $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A, #J87_005F_8DDD_97AF_834A_815B_8368_94D4_8D86,\
                        #J52_005F_944E, #J53_005F_8C8E, #J54_005F_93FA, #J55_005F_8E91_8A69_8A4F_8A88_93AE_8B96_89C2_82CC_974C_96B3,\
                        #J56_005F_9468_8CAD_005F_90BF_9589_8F41_984A_8BE6_95AA, #J48_005F_8D91_90D0_005F_926E_88E6, \
                        #J49_005F_8DDD_97AF_8E91_8A69, #J50_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752')
                        .val('').prop('disabled', true);
                }
                $('#J59_005F_8F5A_8F8A').val((branch_prefecture_data.name ?? '') + (branch.address_city ?? '') + (
                    branch.address_ward ?? '') + (branch.address_apartment ?? ''));
                $('#J61_005F_8E73_8A4F_8BC7_94D4').val(branch.tel_area_code ?? '');
                $('#J62_005F_8E73_93E0_8BC7_94D4').val(branch.tel_city_code ?? '');
                $('#J63_005F_89C1_93FC_8ED2_94D4_8D86').val(branch.tel_subscriber_code ?? '');
                $('#J69_005F_82A0_82C4_90E6').val(hello_work);
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
        </script>
    </section>
</x-layout>
