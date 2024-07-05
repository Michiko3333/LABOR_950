<!-- 4950008680034000 -->
<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

            <style type="text/css"></style>
        @endslot
        <h1>{{ $procedureName }}</h1>
        <p>申請・届出に関する事項を入力してください。<br>
        </p>
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
                                <x-ledger-attachment :required_list="['required_disqualification_status']" :file_original_names="[
                                    'disqualification_status' =>
                                        '資格喪失の事実、資格喪失日及び資格喪失の状況が確認できる書類',
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
                                <x-form.employment_insured_status_acquisition_not_issued_separation_form
                                    :residentials="$residentials" :countries="$countries" :employmentStatuses="$employmentStatuses" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="prevew-btn">
                    <a id="ledger-back" class="ui button negative basic" type="button" style="width: 200px;"
                        href="{{ route('ledger.index') }}">戻る</a>
                    @if ($certificate == false || $egovAcount == false)
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
                        <x-form.employment_insured_status_acquisition_not_issued_separation_form :residentials="$residentials"
                            :countries="$countries" :employmentStatuses="$employmentStatuses" />
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
                $('#J60_005F_944E').val('{{ old('notification_date_year', $today['year']) }}');
                $('#J61_005F_8C8E').val('{{ old('notification_date_month', $today['month']) }}');
                $('#J62_005F_93FA').val('{{ old('notification_date_day', $today['date']) }}');
                @if ($current_employee->role_id === 500)
                    $('#J70_005F_944E_8D86').val('{{ old('labor_consultant_japan_era', $today['era']) }}');
                    $('#J70_005F_944E_8D86').find('option').not(
                        `[value="{{ old('labor_consultant_japan_era', $today['era']) }}"]`).prop('disabled', true);
                    $('#J71_005F_944E').val('{{ old('labor_consultant_japan_era_year', $today['year']) }}');
                    $('#J72_005F_8C8E').val('{{ old('labor_consultant_month', $today['month']) }}');
                    $('#J73_005F_93FA').val('{{ old('labor_consultant_day', $today['date']) }}');
                    $('#J76_005F_8E73_8A4F_8BC7_94D4').val(
                        '{{ old('labor_consultant_tel_area_code', $current_branch->tel_area_code) }}');
                    $('#J77_005F_8E73_93E0_8BC7_94D4').val(
                        '{{ old('labor_consultant_tel_city_code', $current_branch->tel_city_code) }}');
                    $('#J78_005F_89C1_93FC_8ED2_94D4_8D86').val(
                        '{{ old('labor_consultant_tel_subscriber_code', $current_branch->tel_subscriber_code) }}');
                @else
                    $('#J70_005F_944E_8D86').prop('disabled', true);
                    $('#J71_005F_944E, #J72_005F_8C8E, \
                                                #J73_005F_93FA, #J74_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6, \
                                                #J75_005F_8E81_96BC, #J76_005F_8E73_8A4F_8BC7_94D4, #J77_005F_8E73_93E0_8BC7_94D4, #J78_005F_89C1_93FC_8ED2_94D4_8D86,#J79_005F_9574_8B4C_9793')
                        .prop('readonly', true);
                @endif
            });
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
                $('#J12_005F_944E').val("");
                $('#J13_005F_8C8E').val("");
                $('#J14_005F_93FA').val("");
                $('#J17_005F_944E').val("");
                $('#J18_005F_8C8E').val("");
                $('#J19_005F_93FA').val("");
                $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A').val("");
                $('#J49_005F_944E').val("");
                $('#J50_005F_8C8E').val("");
                $('#J51_005F_93FA').val("");
                $('#J86_005F_8DDD_97AF_834A_815B_8368_94D4_8D86').val("");
                $('#J49_005F_944E').val("");
                $('#J50_005F_8C8E').val("");
                $('#J51_005F_93FA').val("");
                $('#J53_005F_8D91_90D0_005F_926E_88E6').val("");
                $('#J54_005F_8DDD_97AF_8E91_8A69').val("");
                $('#J55_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752').val("");

                const employee = data['employee'];
                const branch = data['branch'];
                const branch_prefecture_data = data['branch_prefecture_data'];
                const countryValue = data['country_value'];
                const residentialStatusValue = data['residential_status_value'];
                const birthdayConvertJapan = data['birthday_convert_japan'];
                const employmentInsuredConvertDate = data['employment_insured_convert_date'];
                const employmentRetirementConvertDate = data['employment_retirement_convert_date'];
                const headquarters = data['headquarters'];
                const employee_prefecture_data = data['employee_prefecture_data'];
                const headquarters_prefecture_data = data['headquarters_prefecture_data'];
                const insured_age_type_data = data['insured_age_type_data'];
                const employeeName = (employee.last_name ? employee.last_name + '　' : "") + (employee.first_name ?? "");
                const employeeNameKana = (employee.last_name_kana ? employee.last_name_kana + '　' : "") + (employee
                    .first_name_kana ?? "");
                const employeeNameAlphabet = (employee.last_name_alphabet ? employee.last_name_alphabet + ' ' : "") + (employee
                    .first_name_alphabet ?? "");
                const headquartersAddress = (branch_prefecture_data.name ?? "") + (branch.address_city ?? "") + (
                    branch.address_ward ?? "") + (branch.address_apartment ?? "");
                const employeeAddress = (employee_prefecture_data.name ?? "") + (employee.address_city ?? "") + (employee
                    .address_ward ?? "") + (employee.address_apartment ?? "");

                if (employee.employment_insured_no && employee.employment_insured_no.length == 11) {
                    $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.substring(0, 4));
                    $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.substring(4, 10));
                    $('#J6_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.substring(10));
                } else {
                    $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val("");
                    $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val("");
                    $('#J6_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val("");
                }
                if (branch.insurance_office_no && branch.insurance_office_no.length == 11) {
                    $('#J7_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.insurance_office_no.substring(0, 4));
                    $('#J8_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.insurance_office_no.substring(4, 10));
                    $('#J9_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.insurance_office_no.substring(10));
                } else {
                    $('#J7_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val("");
                    $('#J8_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val("");
                    $('#J9_005F_8E96_8BC6_8F8A_94D4_8D86CD').val("");
                }
                if (employmentInsuredConvertDate != null) {
                    $('#J11_005F_944E_8D86').val(employmentInsuredConvertDate['era']);
                    $('#J12_005F_944E').val(employmentInsuredConvertDate['year']);
                    $('#J13_005F_8C8E').val(employmentInsuredConvertDate['month']);
                    $('#J14_005F_93FA').val(employmentInsuredConvertDate['day']);
                } else {
                    $('#J11_005F_944E_8D86').val("");
                    $('#J12_005F_944E').val("");
                    $('#J13_005F_8C8E').val("");
                    $('#J14_005F_93FA').val("");
                }
                if (employmentRetirementConvertDate != null) {
                    $('#J16_005F_944E_8D86').val(employmentRetirementConvertDate['era'] ?? "");
                    $('#J17_005F_944E').val(employmentRetirementConvertDate['year'] ?? "");
                    $('#J18_005F_8C8E').val(employmentRetirementConvertDate['month'] ?? "");
                    $('#J19_005F_93FA').val(employmentRetirementConvertDate['day'] ?? "");
                } else {
                    $('#J16_005F_944E_8D86').val(employmentRetirementConvertDate['era'] ?? "");
                    $('#J17_005F_944E').val(employmentRetirementConvertDate['year'] ?? "");
                    $('#J18_005F_8C8E').val(employmentRetirementConvertDate['month'] ?? "");
                    $('#J19_005F_93FA').val(employmentRetirementConvertDate['day'] ?? "");
                }
                if (branch.agreed_hours_week_h != null) {
                    $('#J22_005F_8E9E_8AD4').val(parseInt(branch.agreed_hours_week_h));
                } else {
                    $('#J22_005F_8E9E_8AD4').val("");
                }
                if (branch.agreed_hours_week_m != null) {
                    $('#J23_005F_95AA').val(parseInt(branch.agreed_hours_week_m));
                } else {
                    $('#J23_005F_95AA').val("");
                }
                if (branch.agreed_hours_week_h && branch.agreed_hours_week_m == null) {
                    $('#J22_005F_8E9E_8AD4').val(parseInt(branch.agreed_hours_week_h));
                    $('#J23_005F_95AA').val(0);
                }
                $('#J27_005F_8CC2_906C_94D4_8D86').val(employee.mynumber_card_no ?? "");
                $('#J29_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(employeeNameKana);
                $('#J30_005F_90AB_95CA').val(employee.sex);
                $('#J32_005F_944E_8D86').val(birthdayConvertJapan['era'] ?? "");
                $('#J33_005F_944E').val(birthdayConvertJapan['year'] ?? "");
                $('#J34_005F_8C8E').val(birthdayConvertJapan['month'] ?? "");
                $('#J35_005F_93FA').val(birthdayConvertJapan['day'] ?? "");
                $('#J36_005F_8EE6_93BE_8E9E_94ED_95DB_8CAF_8ED2_8EED_97DE').val(insured_age_type_data ?? "");
                $('#J41_005F_8CD9_9770_8C60_91D4').val(employee.employment_status ?? "");
                if (employee.country_id) {
                    $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A').val(employeeNameAlphabet);
                    $('#J86_005F_8DDD_97AF_834A_815B_8368_94D4_8D86').val(employee.residence_card_no ?? "");
                    if (employee.stay_date_period !== null) {
                        const stay_date_period = new Date(employee.stay_date_period);
                        $('#J49_005F_944E').val(stay_date_period.getFullYear());
                        $('#J50_005F_8C8E').val(stay_date_period.getMonth() + 1);
                        $('#J51_005F_93FA').val(stay_date_period.getDate());
                    }
                    $('#J53_005F_8D91_90D0_005F_926E_88E6').val(countryValue ?? "")
                    $('#J54_005F_8DDD_97AF_8E91_8A69').val(residentialStatusValue ?? "");
                    $('#J55_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752').val(employee
                        .residential_status_unknown_reason ?? "");
                    $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A, #J86_005F_8DDD_97AF_834A_815B_8368_94D4_8D86,\
                                                                                                                                        #J49_005F_944E, #J50_005F_8C8E, #J51_005F_93FA, #J53_005F_8D91_90D0_005F_926E_88E6, #J54_005F_8DDD_97AF_8E91_8A69,\
                                                                                                                                        #J55_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752')
                        .prop('disabled', false);
                } else {
                    $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A, #J86_005F_8DDD_97AF_834A_815B_8368_94D4_8D86,\
                                                                                                                                        #J49_005F_944E, #J50_005F_8C8E, #J51_005F_93FA, #J53_005F_8D91_90D0_005F_926E_88E6, #J54_005F_8DDD_97AF_8E91_8A69,\
                                                                                                                                        #J55_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752')
                        .prop('disabled', true);
                }
                $('#J44_005F_8E96_8BC6_8F8A_96BC_97AA_8FCC').val(branch.name);
                $('#J45_005F_8F5A_8F8A_9694_82CD_8B8F_8F8A').val(employeeAddress);
                $('#J63_005F_8F5A_8F8A').val(headquartersAddress);
                $('#J65_005F_8E73_8A4F_8BC7_94D4').val(branch.tel_area_code ?? "");
                $('#J66_005F_8E73_93E0_8BC7_94D4').val(branch.tel_city_code ?? "");
                $('#J67_005F_89C1_93FC_8ED2_94D4_8D86').val(branch.tel_subscriber_code ?? "");
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
