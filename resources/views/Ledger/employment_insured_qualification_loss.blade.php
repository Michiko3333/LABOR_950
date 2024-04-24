<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
        <link rel="stylesheet" href="{{asset('/css/ledger-form.css')}}">

        <style type="text/css"></style>
        @endslot
        <h1 class="mt-2">{{ $procedureName }}</h1>
        <p>申請・届出に関する事項を入力してください。<br>
            複数の様式を提出する場合は、タブから様式を切り替えてください。
        </p>
        @if($certificate == false)
        <div class="ui warning message" style="margin: 0;">
            <div class="header">
                電子証明書が登録されていません
            </div>
        </div>
        @endif

        <div id="ledger-step1" class="step-view active mb-2">
            <form id="ledger-form" action="" method="post" enctype="multipart/form-data">
                @csrf
                @if(session('errors'))
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
                                <x-ledger-attachment 
                                    :required_list="[
                                        'required_disqualification_status']"
                                    :file_original_names="[
                                        'disqualification_status' => '資格喪失の事実、資格喪失日及び資格喪失の状況が確認できる書類',
                                        'other' => 'その他の添付書類']"
                                    :extensions="'.doc,.docx,.jpg,.jpeg,.pdf,.xls,.xlsx'" />
                            </div>
                        </div>
                    </div>
                    <div class="right-col">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <div class="ui top attached tabular menu">
                                    <a class="item active" data-tab="sample">
                                        雇用保険被保険者資格喪失届
                                    </a>
                                    <a class="item" data-tab="sample2">
                                        雇用保険被保険者離職証明書
                                    </a>
                                </div>
                                <div class="ui bottom attached segment" data-tab="sample">
                                    <x-form.employment_insured_qualification_loss :residentials="$residentials"
                                        :countries="$countries" :insuredAgeTypes="$insuredAgeTypes"
                                        :employmentStatuses="$employmentStatuses" />
                                </div>
                                <div class="ui bottom attached segment" data-tab="sample2"
                                    style="display: none; overflow-x: auto;">
                                    <x-form.employment_insured_retirement_certificate />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="prevew-btn">
                    <a id="ledger-back" class="ui button negative basic" type="button" style="width: 200px;"
                        href="{{ route('ledger.index') }}">戻る</a>
                    @if($certificate == false)
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
                        <x-form.employment_insured_qualification_loss :residentials="$residentials"
                            :countries="$countries" :insuredAgeTypes="$insuredAgeTypes"
                            :employmentStatuses="$employmentStatuses" />
                    </div>
                </div>
            </div>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component style="overflow-x: auto;">
                        <x-form.employment_insured_retirement_certificate />
                    </div>
                </div>
            </div>
            <div class="submit-btn py-2">
                <button id="ledger-edit-btn" class="ui button" type="button" style="width: 200px;">修正</button>
                <button id="ledger-submit-btn" class="ui button yellow" type="button" style="width: 200px;">申請</button>
            </div>
        </div>

        <script type="module">
            $(document).ready(function () {
            $('#J59_005F_944E_8D86').val( '{{ $today["era"] }}' );
            $('#J60_005F_944E').val( '{{ $today["year"] }}' );
            $('#J61_005F_8C8E').val( '{{ $today["month"] }}' );
            $('#J62_005F_93FA').val( '{{ $today["date"] }}' );
            @if($current_employee->role_id === 500)
                $('#J70_005F_944E_8D86').val( '{{ old("labor_consultant_japan_era", $today["era"]) }}' );
                $('#J70_005F_944E_8D86').find('option').not(`[value="{{ old("labor_consultant_japan_era", $today["era"]) }}"]`).prop('disabled', true);
                $('#J71_005F_944E').val( '{{ old("labor_consultant_japan_era_year", $today["year"]) }}' );
                $('#J72_005F_8C8E').val( '{{ old("labor_consultant_month", $today["month"]) }}' );
                $('#J73_005F_93FA').val( '{{ old("labor_consultant_day", $today["date"]) }}' );
                // $('#J74_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6').val('{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
                $('#J75_005F_8E81_96BC').val('{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
                $('#J76_005F_8E73_8A4F_8BC7_94D4').val('{{$current_employee->tel_area_code}}');
                $('#J77_005F_8E73_93E0_8BC7_94D4').val('{{$current_employee->tel_city_code}}');
                $('#J78_005F_89C1_93FC_8ED2_94D4_8D86').val('{{$current_employee->tel_subscriber_code}}');
                $('#J72_005F_944E_8D86').val( '{{ old("labor_consultant_japan_era", $today["era"]) }}' );
                $('#J72_005F_944E_8D86').find('option').not(`[value="{{ old("labor_consultant_japan_era", $today["era"]) }}"]`).prop('disabled', true);
                $('#J73_005F_944E').val( '{{ old("labor_consultant_japan_era_year", $today["year"]) }}' );
                $('#J74_005F_8C8E').val( '{{ old("labor_consultant_month", $today["month"]) }}' );
                $('#J75_005F_93FA').val( '{{ old("labor_consultant_day", $today["date"]) }}' );
                // $('#J76_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6').val('{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
                $('#J77_005F_8E81_96BC').val('{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
                $('#J78_005F_8E73_8A4F_8BC7_94D4').val('{{$current_employee->tel_area_code}}');
                $('#J79_005F_8E73_93E0_8BC7_94D4').val('{{$current_employee->tel_city_code}}');
                $('#J80_005F_89C1_93FC_8ED2_94D4_8D86').val('{{$current_employee->tel_subscriber_code}}');
                $('#J71_005F_944E, #J72_005F_8C8E, #J73_005F_93FA, \
                    #J74_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6, #J75_005F_8E81_96BC').prop('readonly', true);
            @else
            $('#J70_005F_944E_8D86').prop('disabled', true);
                $('#J71_005F_944E, #J72_005F_8C8E, #J73_005F_93FA, #J74_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6,\
                    #J75_005F_8E81_96BC, #J76_005F_8E73_8A4F_8BC7_94D4, #J77_005F_8E73_93E0_8BC7_94D4, #J78_005F_89C1_93FC_8ED2_94D4_8D86,\
                    #J79_005F_9574_8B4C_9793').prop('readonly', true);
            @endif
        });
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
            const employee = data['employee'];
            const branch = data['branch'];
            const countryValue = data['country_value'];
            const residentialStatusValue = data['residential_status_value'];
            const birthdayConvertJapan = data['birthday_convert_japan'];
            const employmentInsuredConvertDate = data['employment_insured_convert_date'];
            const employmentRetirementConvertDate = data['employment_retirement_convert_date'];
            const headquarters = data['headquarters'];
            const company = data['company'];

            $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val('');
            $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val('');
            $('#J6_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val('');
            $('#J35_005F_8C8E').val('');
            $('#J36_005F_93FA').val('');
            $('#J20_005F_947A_9242_8BC7_94D4_8D86').val('');
            $('#J21_005F_92AC_88E6_94D4_8D86').val('');
            $('#J22_005F_8F5A_8F8A').val('');
            $('#J23_005F_8E73_8A4F_8BC7_94D4').val('');
            $('#J24_005F_8E73_93E0_8BC7_94D4').val('');
            $('#J25_005F_89C1_93FC_8ED2_94D4_8D86').val('');
            const retirement_reason_age = data['retirement_reason_age'];
            const retirement_reason_contract_period_reached_limit = data['retirement_reason_contract_period_reached_limit'];
            const retirement_reason_contract_period_expired_eternal_hire = data['retirement_reason_contract_period_expired_eternal_hire'];
            const retirement_reason_contract_period_expired_except_eternal_hire = data['retirement_reason_contract_period_expired_except_eternal_hire'];
            const retirement_reason_business_owner_suggestion = data['retirement_reason_business_owner_suggestion'];
            const retirement_reason_employee_decision_change_job_type = data['retirement_reason_employee_decision_change_job_type'];
            const retirement_reason_employee_decision_change_office = data['retirement_reason_employee_decision_change_office'];
            const retirement_reason_employee_decision_reasons = data['retirement_reason_employee_decision_reasons'];
            var retirement_date_nextday_month;
            var retirement_date_nextday_day;
            if(employee.retirement_date !== null) {
                var retirement_date = new Date(employee.retirement_date);
                var nextday = new Date(retirement_date);
                nextday.setDate(retirement_date.getDate() + 1);
                var retirement_date_nextday_month = ('0' + (nextday.getMonth() + 1)).slice(-2);
                var retirement_date_nextday_day = ('0' + nextday.getDate()).slice(-2);
            }

            if(employee.employment_insured_no != null && employee.insurance_office_no.length == 11){
                $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.substring(0, 4));
                $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.substring(4, 10));
                $('#J6_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.substring(10, 11));
            } else {
                $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val('');
                $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val('');
                $('#J6_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val('');
            }
            if(branch.insurance_office_no != null && branch.insurance_office_no.length == 11){
                $('#J7_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.insurance_office_no.substring(0, 4));
                $('#J8_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.insurance_office_no.substring(4, 10));
                $('#J9_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.insurance_office_no.substring(10, 11));
                $('#J5_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.insurance_office_no.substring(0, 4));
                $('#J6_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.insurance_office_no.substring(4, 10));
                $('#J7_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.insurance_office_no.substring(10, 11));
            } else {
                $('#J7_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val('');
                $('#J8_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val('');
                $('#J9_005F_8E96_8BC6_8F8A_94D4_8D86CD').val('');
            }
            $('#J11_005F_944E_8D86').val(employmentInsuredConvertDate['era'] ?? "");
            $('#J12_005F_944E').val(employmentInsuredConvertDate['year'] ?? "");
            $('#J13_005F_8C8E').val(employmentInsuredConvertDate['month'] ?? "");
            $('#J14_005F_93FA').val(employmentInsuredConvertDate['day'] ?? "");
            $('#J16_005F_944E_8D86').val(employmentRetirementConvertDate['era'] ?? "");
            $('#J17_005F_944E').val(employmentRetirementConvertDate['year'] ?? "");
            $('#J18_005F_8C8E').val(employmentRetirementConvertDate['month'] ?? "");
            $('#J19_005F_93FA').val(employmentRetirementConvertDate['day'] ?? "");
            $('#J20_005F_9172_8EB8_8CB4_88F6').val(employee.insurance_loss_reason);
            if(branch.agreed_hours_week != null){
                const agreed_hours_week = branch.agreed_hours_week.split(':');
                $('#J22_005F_8E9E_8AD4').val(parseInt(agreed_hours_week[0], 10));
                $('#J23_005F_95AA').val(parseInt(agreed_hours_week[1], 10));
            }
            $('#J27_005F_8CC2_906C_94D4_8D86').val(employee.mynumber_card_no ?? '');
            $('#J29_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val((employee.last_name ? employee.last_name + '　' : '') + (employee.first_name ?? ''));
            $('#J30_005F_90AB_95CA').val((employee.sex === 1) ? '1' : '2');
            $('#J32_005F_944E_8D86').val(birthdayConvertJapan['era'] ?? "");
            $('#J33_005F_944E').val(birthdayConvertJapan['year'] ?? "");
            $('#J34_005F_8C8E').val(birthdayConvertJapan['month'] ?? "");
            $('#J35_005F_93FA').val(birthdayConvertJapan['day'] ?? "");
            $('#J36_005F_8EE6_93BE_8E9E_94ED_95DB_8CAF_8ED2_8EED_97DE').val(employee.insured_age_type ?? '');
            $('#J41_005F_8CD9_9770_8C60_91D4').val(employee.employment_status);
            $('#J44_005F_8E96_8BC6_8F8A_96BC_97AA_8FCC').val(branch.name);
            $('#J45_005F_8F5A_8F8A_9694_82CD_8B8F_8F8A').val((employee.address_prefecture ?? '') + (employee.address_city ?? '') + (employee.address_ward ?? '') + (employee.address_apartment ?? ''));
            if(employee.country_id !== null){
                $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A').val((employee.first_name_alphabet ? employee.first_name_alphabet + ' ' : '') + (employee.last_name_alphabet ?? ''));
                $('#J86_005F_8DDD_97AF_834A_815B_8368_94D4_8D86').val(employee.residence_card_no ?? '');
                if(employee.stay_date_period != null){
                    const stay_date_period = employee.stay_date_period.split('-');
                    $('#J49_005F_944E').val(parseInt(stay_date_period[0], 10));
                    $('#J50_005F_8C8E').val(parseInt(stay_date_period[1], 10));
                    $('#J51_005F_93FA').val(parseInt(stay_date_period[2], 10));
                }
                $('#J52_005F_9468_8CAD_005F_90BF_9589_8F41_984A_8BE6_95AA').val(employee.employment_type ?? '');
                $('#J53_005F_8D91_90D0_005F_926E_88E6').val(countryValue ?? "");
                $('#J54_005F_8DDD_97AF_8E91_8A69').val(residentialStatusValue ?? "");
                $('#J55_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752').val(employee.residential_status_unknown_reason ?? '');
            } else {
                $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A').val('').prop('disabled', true);
                $('#J86_005F_8DDD_97AF_834A_815B_8368_94D4_8D86').val('').prop('disabled', true);
                $('#J49_005F_944E').val('').prop('disabled', true);
                $('#J50_005F_8C8E').val('').prop('disabled', true);
                $('#J51_005F_93FA').val('').prop('disabled', true);
                $('#J52_005F_9468_8CAD_005F_90BF_9589_8F41_984A_8BE6_95AA').val('').prop('disabled', true);
                $('#J53_005F_8D91_90D0_005F_926E_88E6').val('').prop('disabled', true);
                $('#J54_005F_8DDD_97AF_8E91_8A69').val('').prop('disabled', true);
                $('#J55_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752').val('').prop('disabled', true);
            }
            $('#J63_005F_8F5A_8F8A').val((headquarters.address_prefecture ?? '') + (headquarters.address_city ?? '') + (headquarters.address_ward ?? '') + (headquarters.address_apartment ?? ''));
            $('#J65_005F_8E73_8A4F_8BC7_94D4').val(headquarters.tel_area_code ?? '');
            $('#J66_005F_8E73_93E0_8BC7_94D4').val(headquarters.tel_city_code ?? '');
            $('#J67_005F_89C1_93FC_8ED2_94D4_8D86').val(headquarters.tel_subscriber_code ?? '');

            // 帳票2枚目
            if(employee.employment_insured_no && employee.employment_insured_no.length == 11){
                $('#J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.substring(0, 4));
                $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.substring(4, 10));
                $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.substring(10, 11));
            } else {
                $('#J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val('');
                $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val('');
                $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val('');
            }
            if(branch.insurance_office_no && branch.insurance_office_no.length == 11){
                $('#J5_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.insurance_office_no.substring(0, 4));
                $('#J6_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.insurance_office_no.substring(4, 10));
                $('#J7_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.insurance_office_no.substring(10, 11));
            } else {
                $('#J5_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val('');
                $('#J6_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val('');
                $('#J7_005F_8E96_8BC6_8F8A_94D4_8D86CD').val('');
            }
            $('#J8_005F_97A3_9045_8ED2_8E81_96BC_005F_8374_838A_834B_8369').val((employee.last_name_kana ? employee.last_name_kana + '　' : '') + (employee.first_name_kana ?? ''));
            $('#J9_005F_97A3_9045_8ED2_8E81_96BC').val((employee.last_name ? employee.last_name + '　' : '') + (employee.first_name ?? ''));
            $('#J12_005F_944').val(intended_retirement_date_year);
            $('#J13_005F_8C8').val(intended_retirement_date_month);
            $('#J14_005F_93F').val(intended_retirement_date_day);
            $('#J15_005F_96BC_8FCC').val(branch.name ?? '');
            $('#J16_005F_8F8A_8DDD_926E').val((branch.address_prefecture ?? '') + (branch.address_city ?? '') + (branch.address_ward ?? '') + (branch.address_apartment ?? ''));
            $('#J17_005F_8E73_8A4F_8BC7_94D4').val(branch.tel_area_code ?? '');
            $('#J18_005F_8E73_93E0_8BC7_94D4').val(branch.tel_city_code ?? '');
            $('#J19_005F_89C1_93FC_8ED2_94D4_8D86').val(branch.tel_subscriber_code ?? '');
            if(employee.post_code && employee.post_code.length == 7) {
                $('#J20_005F_947A_9242_8BC7_94D4_8D86').val(employee.post_code.substring(0, 3));
                $('#J21_005F_92AC_88E6_94D4_8D86').val(employee.post_code.substring(3, 7));
            } else {
                $('#J20_005F_947A_9242_8BC7_94D4_8D86').val();
                $('#J21_005F_92AC_88E6_94D4_8D86').val();
            }
            $('#J22_005F_8F5A_8F8A').val((employee.address_prefecture  ?? '') + (employee.address_city ?? '') + (employee.address_ward ?? '') + (employee.address_apartment ?? ''));
            $('#J23_005F_8E73_8A4F_8BC7_94D4').val(employee.tel_area_code ?? '');
            $('#J24_005F_8E73_93E0_8BC7_94D4').val(employee.tel_city_code ?? '');
            $('#J25_005F_89C1_93FC_8ED2_94D4_8D86').val(employee.tel_subscriber_code ?? '');
            $('#J26_005F_8F5A_8F8A').val((headquarters.address_prefecture ?? '') + (headquarters.address_city ?? '') + (headquarters.address_ward ?? '') + (headquarters.address_apartment ?? ''));
            $('#J63_005F_97A3_9045_8ED2_8F90_96BC').val((employee.last_name ? employee.last_name + '　' : '') + (employee.first_name ?? ''));
            $('#J35_005F_8C8E').val(isNaN(parseInt(retirement_date_nextday_month, 10)) ? '' : parseInt(retirement_date_nextday_month, 10));
            $('#J36_005F_93FA').val(isNaN(parseInt(retirement_date_nextday_day, 10)) ? '' : parseInt(retirement_date_nextday_day, 10));
            $('#J86_005F_9149_91F02').on('change', function() {
                if($(this).prop('checked')){
                    if(!retirement_reason_age.retirement_age) {
                        $('#J103_005F_92E8_944E_005F_944E_97EE').val(retirement_reason_age.retirement_age ?? '');
                    }
                    if(retirement_reason_age.reemployment_request_flg === 0){
                        $('#J104_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J104_005F_Radio1').prop('checked', true);
                    }
                    if(retirement_reason_age.retirement_reason_type === 'a'){
                        $('#J105_005F_Radio1').prop('checked', true);
                    } else if(retirement_reason_age.retirement_reason_type === 'b'){
                        $('#J105_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J105_005F_Radio3').prop('checked', true);
                        $('#J106_005F_8C70_91B1_8CD9_9770_8AF3_965D_8ED2_005F_97A3_9045_979D_9752_005F_82BB_82CC_91BC_005F_8BEF_91CC_9349_979D_9752').val(retirement_reason_age.retirement_reason  ?? '');
                    }
                }
            });
            $('#J87_005F_9149_91F03_005F1').on('change', function() {
                if($(this).prop('checked')){
                    $('#J194_005F_8CD9_9770_8AFA_8AD4_939E_9788_005F_31_89F1_82CC_8C5F_96F1_8AFA_8AD4').val(retirement_reason_contract_period_reached_limit.contract_period_once  ?? '');
                    $('#J195_005F_8CD9_9770_8AFA_8AD4_939E_9788_005F_92CA_8E5A_8C5F_96F1_8AFA_8AD4').val(retirement_reason_contract_period_reached_limit.contract_period_total  ?? '');
                    $('#J196_005F_8CD9_9770_8AFA_8AD4_939E_9788_005F_8C5F_96F1_8D58_9056_89F1_9094').val(retirement_reason_contract_period_reached_limit.contract_renewal_count  ?? '');
                    if(retirement_reason_contract_period_reached_limit.shortened_contract_renewal_reached_limit_flg === 0){
                        $('#J197_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J197_005F_Radio1').prop('checked', true);
                    }
                    if(retirement_reason_contract_period_reached_limit.contract_renewal_reached_limit_flg === 0){
                        $('#J198_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J198_005F_Radio1').prop('checked', true);
                    }
                    if(retirement_reason_contract_period_reached_limit.rehire_contract_renewal_reached_limit_flg === 0){
                        $('#J199_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J199_005F_Radio1').prop('checked', true);
                    }
                    if(retirement_reason_contract_period_reached_limit.contract_period_total_reached_limit_flg === 0){
                        $('#J200_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J200_005F_Radio1').prop('checked', true);
                    }
                    if(retirement_reason_contract_period_reached_limit.contract_period_total_established_before_law_amendment_flg === 0){
                        $('#J201_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J201_005F_Radio1').prop('checked', true);
                    }
                }
            });
            $('#J107_005F_Radio1').on('change', function() {
                if($('#J107_005F_Radio1').prop('checked')){
                    $('#J108_005F_8FED_9770_984A_93AD_8ED2_005F1_89F1_82CC_8C5F_96F1_8AFA_8AD4').val(retirement_reason_contract_period_expired_eternal_hire.contract_period_once  ?? '');
                    $('#J109_005F_8FED_9770_984A_93AD_8ED2_005F_92CA_8E5A_8C5F_96F1_8AFA_8AD4').val(retirement_reason_contract_period_expired_eternal_hire.contract_period_total  ?? '');
                    $('#J110_005F_8FED_9770_984A_93AD_8ED2_005F_8C5F_96F1_8D58_9056_89F1_9094').val(retirement_reason_contract_period_expired_eternal_hire.contract_renewal_count  ?? '');
                    if(retirement_reason_contract_period_expired_eternal_hire.contract_renewal_guarantee_agreement_flg === 0){
                        $('#J111_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J111_005F_Radio1').prop('checked', true);
                    }
                    if(retirement_reason_contract_period_expired_eternal_hire.contract_non_renewal_flg === 0){
                        $('#J112_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J112_005F_Radio1').prop('checked', true);
                    }
                    if(retirement_reason_contract_period_expired_eternal_hire.employment_termination_notice_flg === 0){
                        $('#J113_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J113_005F_Radio1').prop('checked', true);
                    }
                    if(retirement_reason_contract_period_expired_eternal_hire.non_renewal_clause_addition_flg === 0){
                        $('#J202_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J202_005F_Radio1').prop('checked', true);
                    }
                    if(retirement_reason_contract_period_expired_eternal_hire.contract_renewal_request_type === 'a'){
                        $('#J114_005F_Radio2').prop('checked', true);
                    } else if(retirement_reason_contract_period_expired_eternal_hire.contract_renewal_request_type === 'b'){
                        $('#J114_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J114_005F_Radio3').prop('checked', true);
                    }
                }
            });
            $('#J107_005F_Radio2').on('change', function() {
                if($('#J107_005F_Radio2').prop('checked')){
                    $('#J115_005F_8FED_9770_984A_93AD_8ED2_88C8_8A4F_005F1_89F1_82CC_8C5F_96F1_8AFA_8AD4').val(retirement_reason_contract_period_expired_except_eternal_hire.contract_period_once  ?? '');
                    $('#J116_005F_8FED_9770_984A_93AD_8ED2_005F_92CA_8E5A_8C5F_96F1_8AFA_8AD4').val(retirement_reason_contract_period_expired_except_eternal_hire.contract_period_total  ?? '');
                    $('#J117_005F_8FED_9770_984A_93AD_8ED2_005F_8C5F_96F1_8D58_9056_89F1_9094').val(retirement_reason_contract_period_expired_except_eternal_hire.contract_renewal_count  ?? '');
                    if(retirement_reason_contract_period_expired_except_eternal_hire.contract_renewal_guarantee_agreement_flg === 0){
                        $('#J118_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J118_005F_Radio1').prop('checked', true);
                    }
                    if(retirement_reason_contract_period_expired_except_eternal_hire.no_contract_renewal_flg === 0){
                        $('#J119_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J119_005F_Radio1').prop('checked', true);
                    }
                    if(retirement_reason_contract_period_expired_except_eternal_hire.contract_renewal_request_type === 'a'){
                        $('#J120_005F_Radio2').prop('checked', true);
                    } else if(retirement_reason_contract_period_expired_except_eternal_hire.contract_renewal_request_type === 'b'){
                        $('#J120_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J120_005F_Radio3').prop('checked', true);
                    }
                    if(retirement_reason_contract_period_expired_except_eternal_hire.employment_instructions_type === 'a'){
                        $('#J121_005F_Radio2').prop('checked', true);
                    } else{
                        $('#J121_005F_Radio3').prop('checked', true);
                    }
                }
            });
            $('#J94_005F_9149_91F04_005F3_005F2').on('change', function() {
                if($('#J94_005F_9149_91F04_005F3_005F2').prop('checked')){
                    $('#J122_005F_8AF3_965D_91DE_9045_9694_82CD_91DE_9045_8AA9_8FA7_005F_82BB_82CC_91BC_005F_8BEF_91CC_9349_979D_9752').val(retirement_reason_business_owner_suggestion.retirement_recommendation_reason  ?? '');
                }
            });
            $('#J98_005F_9149_91F05_005F1_005F5').on('change', function() {
                if($('#J98_005F_9149_91F05_005F1_005F5').prop('checked')){
                    if(retirement_reason_employee_decision_change_job_type.education_training_flg === 0){
                            $('#J123_005F_Radio2').prop('checked', true);
                        } else{
                            $('#J123_005F_Radio1').prop('checked', true);
                        }
                }
            });
            $('#J99_005F_9149_91F05_005F1_005F6').on('change', function() {
                if($('#J99_005F_9149_91F05_005F1_005F6').prop('checked')){
                    $('#J124_005F_8E96_8BC6_8F8A_88DA_935D_82C9_82E6_82E8_92CA_8BCE_8DA2_93EF_005F_8F8A_8DDD_926E').val(retirement_reason_employee_decision_change_office.place  ?? '');
                }
            });
            $('#J100_005F_9149_91F05_005F1_005F7').on('change', function() {
                if($('#J100_005F_9149_91F05_005F1_005F7').prop('checked')){
                    $('#J125_005F_82BB_82CC_91BC_005F_8BEF_91CC_9349_979D_9752').val(retirement_reason_employee_decision_reasons.reason  ?? '');
                }
            });
            $('#J102_005F_9149_91F06').on('change', function() {
                if($('#J102_005F_9149_91F06').prop('checked')){
                    $('#J126_005F_82BB_82CC_91BC_005F_8BEF_91CC_9349_979D_9752').val(retirement_reason_other_reasons.reason  ?? '');
                }
            });
        }
        Livewire.on('onSelectEmployee', ({ data }) => {insertDataFromEmployee(data)});
        $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').on('input', function() {
            $('#J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val($(this).val());
        });
        $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').on('input', function() {
            $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val($(this).val());
        });
        $('#J6_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').on('input', function() {
            $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val($(this).val());
        });
        $('#J7_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').on('input', function() {
            $('#J5_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val($(this).val());
        });
        $('#J8_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').on('input', function() {
            $('#J6_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val($(this).val());
        });
        $('#J9_005F_8E96_8BC6_8F8A_94D4_8D86CD').on('input', function() {
            $('#J7_005F_8E96_8BC6_8F8A_94D4_8D86CD').val($(this).val());
        });
        $('#J16_005F_944E_8D86').on('input', function() {
            $('#J11_005F_944E_8D86').val($(this).val());
        });
        $('#J17_005F_944E').on('input', function() {
            $('#J12_005F_944').val($(this).val());
        });
        $('#J18_005F_8C8E').on('input', function() {
            $('#J13_005F_8C8').val($(this).val());
        });
        $('#J19_005F_93FA').on('input', function() {
            $('#J14_005F_93F').val($(this).val());
        });
        $('#J29_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').on('input', function() {
            $('#J9_005F_97A3_9045_8ED2_8E81_96BC').val($(this).val());
        });
        $('#J45_005F_8F5A_8F8A_9694_82CD_8B8F_8F8A').on('input', function() {
            $('#J22_005F_8F5A_8F8A').val($(this).val());
        });
        $('#J63_005F_8F5A_8F8A').on('input', function() {
            $('#J26_005F_8F5A_8F8A').val($(this).val());
        });
        </script>

        @slot('footer')
        <script src="{{asset('/js/ledger-form.js')}}" type="module"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.ui.tabular.menu .item');
            const contents = document.querySelectorAll('.ui.bottom.attached.segment');
            tabs.forEach((tab, index) => {
                tab.addEventListener('click', function () {
                    tabs.forEach((t) => t.classList.remove('active'));
                    tab.classList.add('active');
                    contents.forEach((c) => c.style.display = 'none');
                    contents[index].style.display = 'block';
                });
            });
        });
        </script>
        @endslot
    </section>
</x-layout>
