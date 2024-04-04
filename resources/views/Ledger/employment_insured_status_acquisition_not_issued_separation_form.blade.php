<x-layout title="雇用保険被保険者資格喪失届（離職票交付なし）">
    @slot('header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link rel="stylesheet" href="{{asset('/css/ledger-form.css')}}">

    <style type="text/css"></style>
    @endslot
    <h1>雇用保険被保険者資格喪失届（離職票交付なし）</h1>
    <p>申請・届出に関する事項を入力してください。</p>

    <div id="ledger-step1" class="step-view active my-2">
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
                    <div class="right-col">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <x-form.employment_insured_status_acquisition_not_issued_separation_form />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="prevew-btn">
                    <a id="ledger-back" class="ui button negative basic" type="button" style="width: 200px;"
                        href="{{ route('ledger.index') }}">戻る</a>
                    <button id="ledger-preview-btn" class="ui button primary" type="button"
                        style="width: 200px;">確認</button>
                </div>
        </form>
    </div>

    <div id="ledger-step2" class="step-view my-2">
        <h2 style="text-align: center;">プレビュー</h2>
        <div class="preview-area">
            <div class="ui card card-shadow ledger-card">
                <div class="content" preview-component>
                    <x-form.employment_insured_status_acquisition_not_issued_separation_form />
                </div>
            </div>
            <div class="submit-btn py-2">
                <button id="ledger-edit-btn" class="ui button" type="button" style="width: 200px;">修正</button>
                <button id="ledger-submit-btn" class="ui button yellow" type="button" style="width: 200px;">申請</button>
            </div>
        </div>

        <script type="module">
            $(document).ready(function () {
            $('#J44_005F_8E96_8BC6_8F8A_96BC_97AA_8FCC').val('{{$company->name_abbreviation}}');
            $('#J59_005F_944E_8D86').val( '{{ old("insured_date_era", $today["era"]) }}' );
            $('#J60_005F_944E').val( '{{ old("insured_date_year", $today["year"]) }}' );
            $('#J61_005F_8C8E').val( '{{ old("insured_date_month", $today["month"]) }}' );
            $('#J62_005F_93FA').val( '{{ old("insured_date_day", $today["date"]) }}' );
            @if($current_employee->role_id === 500)
                $('#J70_005F_944E_8D86').val( '{{ old("labor_consultant_japan_era", $today["era"]) }}' );
                $('#J70_005F_944E_8D86').find('option').not(`[value="{{ old("labor_consultant_japan_era", $today["era"]) }}"]`).prop('disabled', true);
                $('#J71_005F_944E').val( '{{ old("labor_consultant_japan_era_year", $today["year"]) }}' );
                $('#J72_005F_8C8E').val( '{{ old("labor_consultant_month", $today["month"]) }}' );
                $('#J73_005F_93FA').val( '{{ old("labor_consultant_day", $today["date"]) }}' );
                $('#J74_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6').val('{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
                $('#J75_005F_8E81_96BC').val('{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
                $('#J76_005F_8E73_8A4F_8BC7_94D4').val('{{$current_branch->tel_area_code}}');
                $('#J77_005F_8E73_93E0_8BC7_94D4').val('{{$current_branch->tel_city_code}}');
                $('#J78_005F_89C1_93FC_8ED2_94D4_8D86').val('{{$current_branch->tel_subscriber_code}}');
                $('#J71_005F_944E, #J72_005F_8C8E, #J73_005F_93FA,\
                    #J74_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6,\
                    #J75_005F_8E81_96BC, #J76_005F_8E73_8A4F_8BC7_94D4, #J77_005F_8E73_93E0_8BC7_94D4\
                    #J78_005F_89C1_93FC_8ED2_94D4_8D86').prop('readonly', true);
            @else
                $('#J71_005F_944E, #J72_005F_8C8E, #J73_005F_93FA,\
                    #J74_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6,\
                    #J75_005F_8E81_96BC, #J76_005F_8E73_8A4F_8BC7_94D4, #J77_005F_8E73_93E0_8BC7_94D4\
                    #J78_005F_89C1_93FC_8ED2_94D4_8D86').prop('readonly', false);
            @endif
        });
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
            const employee = data['employee'];
            const branch = data['branch'];
            const employeeName = (employee.last_name || "") + '　' + (employee.first_name || "");
            const employeeNameKana = (employee.last_name_kana || "") + '　' + (employee.first_name_kana || "");
            const employeeNameAlphabet = (employee.last_name_alphabet || "") + ' ' + (employee.first_name_alphabet || "");
            const branchAddress = (branch.address_prefecture || "") + (branch.address_city || "") + (branch.address_ward || "") + ' ' + (branch.address_apartment || "");
            const employeeAddress = (employee.address_prefecture || "") + (employee.address_city || "") + (employee.address_ward || "") + ' ' + (employee.address_apartment || "");

                let stay_date_period = new Date(employee.stay_date_period);

            if (employee.employment_insured_no !== null) {
                $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.substring(0, 4));
                $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.substring(4, 10));
                $('#J6_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.substring(10));
            }
            if (branch.employment_insurance_office_no !== null) {
                $('#J7_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.employment_insurance_office_no.substring(0, 4));
                $('#J8_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.employment_insurance_office_no.substring(4, 10));
                $('#J9_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.employment_insurance_office_no.substring(10));
            }
            if (branch.agreed_hours_week !== null) {
                let momentAgreedHoursWeek = moment(branch.agreed_hours_week, 'HH:mm:ss');
                $('#J22_005F_8E9E_8AD4').val(momentAgreedHoursWeek.hours());
                $('#J23_005F_95AA').val(momentAgreedHoursWeek.minutes());
            }
            $('#J27_005F_8CC2_906C_94D4_8D86').val(employee.mynumber_card_no || "");
            $('#J29_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(employeeName);
            $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A').val(employeeNameAlphabet);
            $('#J86_005F_8DDD_97AF_834A_815B_8368_94D4_8D86').val(employee.residence_card_no || "");
            if (stay_date_period !== null) {
                $('#J49_005F_944E').val(stay_date_period.getFullYear());
                $('#J50_005F_8C8E').val(stay_date_period.getMonth() + 1);
                $('#J51_005F_93FA').val(stay_date_period.getDate());
            }
            $('#J55_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752').val(employee.residential_status_id || "");
            $('#J55_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752').val(employee.residential_status_unknown_reason || "");
            $('#J45_005F_8F5A_8F8A_9694_82CD_8B8F_8F8A').val(employeeAddress);
            $('#J63_005F_8F5A_8F8A').val(branchAddress);
            $('#J65_005F_8E73_8A4F_8BC7_94D4').val(branch.tel_area_code || "");
            $('#J66_005F_8E73_93E0_8BC7_94D4').val(branch.tel_city_code || "");
            $('#J67_005F_89C1_93FC_8ED2_94D4_8D86').val(branch.tel_subscriber_code || "");
        }

        Livewire.on('onSelectEmployee', ({ data }) => {insertDataFromEmployee(data)});
        </script>

        @slot('footer')
        <script src="{{asset('/js/ledger-form.js')}}" type="module"></script>
        @endslot
</x-layout>