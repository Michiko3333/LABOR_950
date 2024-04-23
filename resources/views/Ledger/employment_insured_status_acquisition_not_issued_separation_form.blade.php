<x-layout title="雇用保険被保険者資格喪失届（離職票交付なし）（令和４年６月以降手続き）">
    <section class="content">
        @slot('header')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

        <link rel="stylesheet" href="{{asset('/css/ledger-form.css')}}">

        <style type="text/css"></style>
        @endslot
        <h1 class="mt-2">雇用保険被保険者資格喪失届（離職票交付なし）（令和４年６月以降手続き）</h1>
        @if($certificate == false)
        <div class="ui warning message" style="margin: 0;">
            <div class="header">
                電子証明書が登録されていません
            </div>
        </div>
        @endif

        <div id="ledger-step1" class="step-view active mb-2">
            <form id="ledger-form" action="" method="post">
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
                    </div>
                    <div class="right-col">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <x-form.employment_insured_status_acquisition_not_issued_separation_form
                                    :residentials="$residentials" :countries="$countries"
                                    :employmentStatuses="$employmentStatuses" />
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
                        <x-form.employment_insured_status_acquisition_not_issued_separation_form
                            :residentials="$residentials" :countries="$countries"
                            :employmentStatuses="$employmentStatuses" />
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
                $('#J60_005F_944E').val('{{$today["year"]}}');
                $('#J61_005F_8C8E').val('{{$today["month"]}}');
                $('#J62_005F_93FA').val('{{$today["date"]}}');
                @if($current_employee->role_id === 500)
                    $('#J70_005F_944E_8D86').val( '{{ old("labor_consultant_japan_era", $today["era"]) }}' );
                    $('#J70_005F_944E_8D86').find('option').not(`[value="{{ old("labor_consultant_japan_era", $today["era"]) }}"]`).prop('disabled', true);
                    $('#J71_005F_944E').val( '{{ $today["year"]}}' );
                    $('#J72_005F_8C8E').val( '{{ $today["month"] }}' );
                    $('#J73_005F_93FA').val( '{{ $today["date"]}}' );
                    $('#J74_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6').val('{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
                    $('#J75_005F_8E81_96BC').val('{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
                    $('#J76_005F_8E73_8A4F_8BC7_94D4').val('{{$current_employee->tel_area_code}}');
                    $('#J77_005F_8E73_93E0_8BC7_94D4').val('{{$current_employee->tel_city_code}}');
                    $('#J78_005F_89C1_93FC_8ED2_94D4_8D86').val('{{$current_employee->tel_subscriber_code}}');
                    $('#J70_005F_944E_8D86, #J71_005F_944E, #J72_005F_8C8E, \
                        #J73_005F_93FA, #J74_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6, \
                        #J75_005F_8E81_96BC').prop('readonly', true);
                @else
                $('#J70_005F_944E_8D86').prop('disabled', true);
                    $('#J71_005F_944E, #J72_005F_8C8E, \
                        #J73_005F_93FA, #J74_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6, \
                        #J75_005F_8E81_96BC, #J76_005F_8E73_8A4F_8BC7_94D4, #J77_005F_8E73_93E0_8BC7_94D4, #J78_005F_89C1_93FC_8ED2_94D4_8D86').prop('readonly', true);
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
                const headquarters = data['headquarters'];
                const employeeName = (employee.last_name ? employee.last_name + '　' : "") + (employee.first_name ?? "");
                const employeeNameKana = (employee.last_name_kana ? employee.last_name_kana + '　' : "") + (employee.first_name_kana ?? "");
                const employeeNameAlphabet = (employee.last_name_alphabet ? employee.last_name_alphabet + ' ' : "") + (employee.first_name_alphabet ?? "");
                const headquartersAddress = (headquarters.address_prefecture ?? "") + (headquarters.address_city ?? "") + (headquarters.address_ward ?? "") + (headquarters.address_apartment ?? "");
                const employeeAddress = (employee.address_prefecture ?? "") + (employee.address_city ?? "") + (employee.address_ward ?? "") + (employee.address_apartment ?? "");

                if (employee.employment_insured_no && employee.employment_insured_no.length == 11) {
                    $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.substring(0, 4));
                    $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.substring(4, 10));
                    $('#J6_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.substring(10));
                }
                if (branch.insurance_office_no && branch.insurance_office_no.length == 11) {
                    $('#J7_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.insurance_office_no.substring(0, 4));
                    $('#J8_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.insurance_office_no.substring(4, 10));
                    $('#J9_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.insurance_office_no.substring(10));
                }
                if(employee.employment_insured_date !== null) {
                    const employment_insured_date = new Date(employee.employment_insured_date);
                    $('#J12_005F_944E').val((employment_insured_date.getFullYear()) ?? "");
                    $('#J13_005F_8C8E').val(employment_insured_date.getMonth() + 1);
                    $('#J14_005F_93FA').val(employment_insured_date.getDate());
                }
                if(employee.intended_retirement_date !== null) {
                    const intended_retirement_date = new Date(employee.intended_retirement_date);
                    $('#J17_005F_944E').val(intended_retirement_date.getFullYear());
                    $('#J18_005F_8C8E').val(intended_retirement_date.getMonth() + 1);
                    $('#J19_005F_93FA').val(intended_retirement_date.getDate());
                }
                if (branch.agreed_hours_week !== null) {
                    let momentAgreedHoursWeek = branch.agreed_hours_week;
                    $('#J22_005F_8E9E_8AD4').val(momentAgreedHoursWeek.substring(0,2));
                    $('#J23_005F_95AA').val(momentAgreedHoursWeek.substring(3,5));
                }
                $('#J27_005F_8CC2_906C_94D4_8D86').val(employee.mynumber_card_no ?? "");
                $('#J29_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(employeeName);
                $('#J30_005F_90AB_95CA').val(employee.sex);
                // 生年月日
                $('#J41_005F_8CD9_9770_8C60_91D4').val(employee.employment_status ?? "");
                if(employee.country_id) {
                    $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A').val(employeeNameAlphabet);
                    $('#J86_005F_8DDD_97AF_834A_815B_8368_94D4_8D86').val(employee.residence_card_no ?? "");
                    if (employee.stay_date_period !== null) {
                        const stay_date_period = new Date(employee.stay_date_period);
                        $('#J49_005F_944E').val(stay_date_period.getFullYear());
                        $('#J50_005F_8C8E').val(stay_date_period.getMonth() + 1);
                        $('#J51_005F_93FA').val(stay_date_period.getDate());
                    }
                    $('#J53_005F_8D91_90D0_005F_926E_88E6').val(employee.country_id ?? "")
                    $('#J54_005F_8DDD_97AF_8E91_8A69').val(employee.residential_status_id ?? "");
                    $('#J55_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752').val(employee.residential_status_unknown_reason ?? "");
                    $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A, #J86_005F_8DDD_97AF_834A_815B_8368_94D4_8D86,\
                    #J49_005F_944E, #J50_005F_8C8E, #J51_005F_93FA, #J53_005F_8D91_90D0_005F_926E_88E6, #J54_005F_8DDD_97AF_8E91_8A69,\
                    #J55_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752').prop('disabled', false);
                } else {
                    $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A, #J86_005F_8DDD_97AF_834A_815B_8368_94D4_8D86,\
                    #J49_005F_944E, #J50_005F_8C8E, #J51_005F_93FA, #J53_005F_8D91_90D0_005F_926E_88E6, #J54_005F_8DDD_97AF_8E91_8A69,\
                    #J55_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752').prop('disabled', true);
                }
                $('#J44_005F_8E96_8BC6_8F8A_96BC_97AA_8FCC').val(headquarters.name);
                $('#J45_005F_8F5A_8F8A_9694_82CD_8B8F_8F8A').val(employeeAddress);
                $('#J63_005F_8F5A_8F8A').val(headquartersAddress);
                $('#J65_005F_8E73_8A4F_8BC7_94D4').val(headquarters.tel_area_code ?? "");
                $('#J66_005F_8E73_93E0_8BC7_94D4').val(headquarters.tel_city_code ?? "");
                $('#J67_005F_89C1_93FC_8ED2_94D4_8D86').val(headquarters.tel_subscriber_code ?? "");
            }
            Livewire.on('onSelectEmployee', ({ data }) => {insertDataFromEmployee(data)});
        </script>

        @slot('footer')
        <script src="{{asset('/js/ledger-form.js')}}" type="module"></script>
        @endslot
    </section>
</x-layout>
