<x-layout title="帳票作成：雇用保険被保険者資格取得届">
<section class="content">
    @slot('header')
    <link rel="stylesheet" href="{{asset('/css/ledger-form.css')}}">

    <style type="text/css"></style>
    @endslot
    <h1>雇用保険被保険者資格取得届</h1>
    <p>申請・届出に関する事項を入力してください。
    </p>

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
                </div>
                <div class="right-col">
                    <div class="ui card card-shadow">
                        <div class="content">
                            <x-form.employment_insured_qualification_get :residentials="$residentials"
                                :countries="$countries" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="prevew-btn">
                <a id="ledger-back" class="ui button negative basic" type="button"
                    style="width: 200px;" href="{{ route('ledger.index') }}">戻る</a>
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
                    <x-form.employment_insured_qualification_get :residentials="$residentials"
                        :countries="$countries" />
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
            $('#J24_005F_944E_8D86').val( '{{ old("insured_date_era", $today["era"]) }}' );
            $('#J25_005F_944E').val( '{{ old("insured_date_year", $today["year"]) }}' );
            $('#J26_005F_8C8E').val( '{{ old("insured_date_month", $today["month"]) }}' );
            $('#J27_005F_93FA').val( '{{ old("insured_date_date", $today["date"]) }}' );
            $('#J65_005F_944E_8D86').val( '{{ old("notification_era", $today["era"]) }}' );
            $('#J66_005F_944E').val( '{{ old("notification_year", $today["year"]) }}' );
            $('#J67_005F_8C8E').val( '{{ old("notification_month", $today["month"]) }}' );
            $('#J68_005F_93FA').val( '{{ old("notification_date", $today["date"]) }}' );

            @if($current_employee->role_id === 500)
                $('#J71_005F_944E_8D86').val( '{{ old("create_era", $today["era"]) }}' );
                $('#J71_005F_944E_8D86').find('option').not(`[value="{{ old("create_era", $today["era"]) }}"]`).prop('disabled', true);
                $('#J72_005F_944E').val( '{{ old("create_year", $today["year"]) }}' );
                $('#J73_005F_8C8E').val( '{{ old("create_month", $today["month"]) }}' );
                $('#J74_005F_93FA').val( '{{ old("create_day", $today["date"]) }}' );
                $('#J75_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6').val( '{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
                $('#J76_005F_8E81_96BC').val('{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
                $('#J77_005F_8E73_8A4F_8BC7_94D4').val('{{$current_branch->tel_area_code}}');
                $('#J78_005F_8E73_93E0_8BC7_94D4').val('{{$current_branch->tel_city_code}}');
                $('#J79_005F_89C1_93FC_8ED2_94D4_8D86').val('{{$current_branch->tel_subscriber_code}}');
                $('#J72_005F_944E, #J73_005F_8C8E, #J74_005F_93FA, \
                    #J75_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6, #J76_005F_8E81_96BC,\
                    #J77_005F_8E73_8A4F_8BC7_94D4, #J78_005F_8E73_93E0_8BC7_94D4, \
                    #J79_005F_89C1_93FC_8ED2_94D4_8D86, #J80_005F_9574_8B4C_9793').prop('readonly', true);
            @else
                $('#J72_005F_944E, #J73_005F_8C8E, #J74_005F_93FA, \
                    #J75_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6, #J76_005F_8E81_96BC,\
                    #J77_005F_8E73_8A4F_8BC7_94D4, #J78_005F_8E73_93E0_8BC7_94D4, \
                    #J79_005F_89C1_93FC_8ED2_94D4_8D86, #J80_005F_9574_8B4C_9793').prop('readonly', false);
            @endif
        });
    </script>

    <script type="module">
        function insertDataFromEmployee(data) {
            const employee = data['employee'];
            const branch = data['branch'];
            const headquarters = data['headquarters'];

            $('#J2_005F_8CC2_906C_94D4_8D86').val(employee.mynumber_card_no ?? '');
            $('#J6_005F_8EE6_93BE').change(function() {
                var selectedOption = $(this).val();
                if (selectedOption === '1') {
                    $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val('').prop('disabled', true);
                    $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val('').prop('disabled', true);
                    $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val('').prop('disabled', true);
                } else {
                    if(employee.employment_insured_no != null){
                        $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.substring(0, 4));
                        $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.substring(4, 10));
                        $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.substring(10, 11));
                    }
                }
            });
            $('#J7_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val((employee.last_name ? employee.last_name + '　' : '') + (employee.first_name ?? ''));
            $('#J8_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').val((employee.last_name_kana ? employee.last_name_kana + '　' : '')  + (employee.first_name_kana ?? ''));
            $('#J11_005F_90AB_95CA').val((employee.sex === 1) ? '1' : '2');
            if(branch.insurance_office_no != null){
                $('#J17_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.insurance_office_no.substring(0, 4));
                $('#J18_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.insurance_office_no.substring(4, 10));
                $('#J19_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.insurance_office_no.substring(10, 11));
            }
            $('#J20_005F_94ED_95DB_8CAF_8ED2_82C6_82C8_82C1_82BD_82B1_82C6_82CC_8CB4_88F6').val(employee.insured_reason ?? '');
            $('#J21_005F_8E78_95A5_82CC_91D4_976C').val(employee.salary_payment_system ?? '');
            $('#J28_005F_8CD9_9770_8C60_91D4').val(employee.employment_status ?? '');
            $('#J29_005F_9045_8EED').val(employee.occupation_type ?? '');
            $('#J30_005F_8F41_9045_8C6F_9848').val(employee.employment_route ?? '');
            if(branch.agreed_hours_week != null){
                $('#J31_005F_8E9E_8AD4').val(branch.agreed_hours_week.split(':')[0]);
                $('#J32_005F_95AA').val(branch.agreed_hours_week.split(':')[1]);
            }
            if(employee.contract_period_flg === 1){
                $("input[name='contract_period_flg']").eq(0).prop("checked", true);
                $('#J35_005F_944E_8D86, #J36_005F_944E, #J36_005F_944E, #J37_005F_8C8E, #J38_005F_93FA, #J40_005F_944E_8D86,\
                    #J41_005F_944E, #J42_005F_8C8E, #J43_005F_93FA, #J44_005F_8C5F_96F1_8D58_9056_8FF0_8D80_974C_96B3').prop('disabled', false);
                $('#J44_005F_8C5F_96F1_8D58_9056_8FF0_8D80_974C_96B3').val((employee.contract_renewal_flg === 1) ? '有' : '無');
            } else {
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
            }
            $('#J45_005F_8E96_8BC6_8F8A_96BC_8FCC').val(branch.name);
            $('#J46_005F_94F5_8D6C').val(employee.insured_reason_details);
            if(employee.country_id !== null){
                $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A').val((employee.first_name_alphabet ? employee.first_name_alphabet +'　' : '') + (employee.last_name_alphabet ?? '').toUpperCase());
                $('#J87_005F_8DDD_97AF_834A_815B_8368_94D4_8D86').val(employee.residence_card_no ?? '');
                if(employee.stay_date_period != null){
                    $('#J52_005F_944E').val(employee.stay_date_period.split('-')[0]);
                    $('#J53_005F_8C8E').val(employee.stay_date_period.split('-')[1]);
                    $('#J54_005F_93FA').val(employee.stay_date_period.split('-')[2]);
                }
                $('#J55_005F_8E91_8A69_8A4F_8A88_93AE_8B96_89C2_82CC_974C_96B3').val(employee.unauthorized_activities_permission_flg ?? '');
                $('#J56_005F_9468_8CAD_005F_90BF_9589_8F41_984A_8BE6_95AA').val(employee.employment_type ?? '');
                $('#J48_005F_8D91_90D0_005F_926E_88E6').val(employee.country_id ?? '');
                $('#J49_005F_8DDD_97AF_8E91_8A69').val(employee.residential_status_id ?? '');
                $('#J50_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752').val(employee.residential_status_unknown_reason ?? '');
                $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A, #J87_005F_8DDD_97AF_834A_815B_8368_94D4_8D86,\
                    #J52_005F_944E, #J53_005F_8C8E, #J54_005F_93FA, #J55_005F_8E91_8A69_8A4F_8A88_93AE_8B96_89C2_82CC_974C_96B3,\
                    #J56_005F_9468_8CAD_005F_90BF_9589_8F41_984A_8BE6_95AA, #J48_005F_8D91_90D0_005F_926E_88E6, \
                    #J49_005F_8DDD_97AF_8E91_8A69, #J50_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752').prop('disabled', false);
            } else {
                $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A').val('').prop('disabled', true);
                $('#J87_005F_8DDD_97AF_834A_815B_8368_94D4_8D86').val('').prop('disabled', true);
                $('#J52_005F_944E').val('').prop('disabled', true);
                $('#J53_005F_8C8E').val('').prop('disabled', true);
                $('#J54_005F_93FA').val('').prop('disabled', true);
                $('#J55_005F_8E91_8A69_8A4F_8A88_93AE_8B96_89C2_82CC_974C_96B3').val('').prop('disabled', true);
                $('#J56_005F_9468_8CAD_005F_90BF_9589_8F41_984A_8BE6_95AA').val('').prop('disabled', true);
                $('#J48_005F_8D91_90D0_005F_926E_88E6').val('').prop('disabled', true);
                $('#J49_005F_8DDD_97AF_8E91_8A69').val('').prop('disabled', true);
                $('#J50_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752').val('').prop('disabled', true);
            }
            if(headquarters.address_prefecture && headquarters.address_city && headquarters.address_ward !== null){
                if(headquarters.address_apartment  !== null){
                $('#J59_005F_8F5A_8F8A').val((headquarters.address_prefecture ?? '') + (headquarters.address_city ?? '') + (headquarters.address_ward ?? '') + (headquarters.address_apartment ?? ''));
                }else {
                    $('#J59_005F_8F5A_8F8A').val((headquarters.address_prefecture ?? '') + (headquarters.address_city ?? '') + (headquarters.address_ward ?? ''));
                }
            }
            $('#J61_005F_8E73_8A4F_8BC7_94D4').val(headquarters.tel_area_code ?? '');
            $('#J62_005F_8E73_93E0_8BC7_94D4').val(headquarters.tel_city_code ?? '');
            $('#J63_005F_89C1_93FC_8ED2_94D4_8D86').val(headquarters.tel_subscriber_code ?? '');
        }
        Livewire.on('onSelectEmployee', ({ data }) => {insertDataFromEmployee(data)});
    </script>

    @slot('footer')
    <script src="{{asset('/js/ledger-form.js')}}" type="module"></script>
    @endslot
    </script>
</section>
</x-layout>