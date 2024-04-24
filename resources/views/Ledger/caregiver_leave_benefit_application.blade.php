<x-layout title="帳票作成：介護休業給付（介護休業給付金）の申請 / 雇用保険介護休業給付（介護休業給付金）の申請">
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
                                        'required_nursing_facts',
                                        'required_nursing_care_recipient']"
                                    :file_original_names="[
                                        'nursing_facts' => '介護の事実が確認できる書類',
                                        'nursing_care_recipient' => '介護対象家族の氏名、申請者本人との続柄、性別、生年月日が確認できる書類',
                                        'wage_payment_status' => '休業開始時賃金月額証明書に記載された賃金支払い状況の内容が確認できる書類',
                                        'closing_starts' => '雇用保険被保険者休業開始時賃金月額証明票',
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
                                        介護休業給付金支給申請書
                                    </a>
                                    <a class="item" data-tab="sample2">
                                        雇用保険被保険者休業開始時賃金月額証明書<br>
                                        所定労働時間短縮開始時賃金証明書
                                    </a>
                                </div>
                                <div class="ui bottom attached segment active mb-0" data-tab="sample">
                                    <x-form.caregiver_leave_benefit_application />
                                </div>
                                <div class="ui bottom attached segment" data-tab="sample2"
                                    style="display: none; overflow-x: auto;">
                                    <x-form.wage_monthly_certificate_on_employment_insurance_insured_leave_start />
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
                        <x-form.caregiver_leave_benefit_application />
                    </div>
                </div>
            </div>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component style="overflow-x: auto;">
                        <x-form.wage_monthly_certificate_on_employment_insurance_insured_leave_start />
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
            $('#J70_005F_944E_8D86').val( '{{ old("notification_era", $today["era"]) }}' );
            $('#J71_005F_944E').val( '{{ old("notification_year", $today["year"]) }}' );
            $('#J72_005F_8C8E').val( '{{ old("notification_month", $today["month"]) }}' );
            $('#J73_005F_93FA').val( '{{ old("notification_date", $today["date"]) }}' );
            $('#J79_005F_944E_8D86').val( '{{ old("notification_era", $today["era"]) }}' );
            $('#J80_005F_944E').val( '{{ old("notification_year", $today["year"]) }}' );
            $('#J81_005F_8C8E').val( '{{ old("notification_month", $today["month"]) }}' );
            $('#J82_005F_93FA').val( '{{ old("notification_date", $today["date"]) }}' );
            @if($current_employee->role_id === 500)
                $('#J113_005F_8DEC_90AC_944E_8C8E_93FA_005F_92F1_8F6F_91E3_8D73_8ED2').val( '{{$today["era"]}}' + '{{$today["year"]}}' + "年" + '{{$today["month"]}}' + "月" + '{{$today["date"]}}' + "日\n" + '{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
                $('#J114_005F_8E81_96BC').val( '{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}' );
                $('#J75_005F_944E').val( '{{ old("creation_date_year", $today["year"]) }}' );
                $('#J76_005F_8C8E').val( '{{ old("creation_date_month", $today["month"]) }}' );
                $('#J77_005F_93FA').val( '{{ old("creation_date_day", $today["date"]) }}' );
                $('#J76_005F_8E73_8A4F_8BC7_94D4').val('{{$current_branch->tel_area_code}}');
                $('#J77_005F_8E73_93E0_8BC7_94D4').val('{{$current_branch->tel_city_code}}');
                $('#J78_005F_89C1_93FC_8ED2_94D4_8D86').val('{{$current_branch->tel_subscriber_code}}');
                $('#J74_005F_944E_8D86').val( '{{ old("creation_date_japan_era", $today["era"]) }}' );
                $('#J74_005F_944E_8D86').find('option').not(`[value="{{ old("creation_date_japan_era", $today["era"]) }}"]`).prop('disabled', true);
                $('#J75_005F_944E').val( '{{ old("creation_date_year", $today["year"]) }}' );
                $('#J76_005F_8C8E').val( '{{ old("creation_date_month", $today["month"]) }}' );
                $('#J77_005F_93FA').val( '{{ old("creation_date_day", $today["date"]) }}' );
                $('#J78_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6').val('{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
                $('#J79_005F_8E81_96BC').val('{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
                $('#J80_005F_8E73_8A4F_8BC7_94D4').val('{{$current_branch->tel_area_code}}');
                $('#J81_005F_8E73_93E0_8BC7_94D4').val('{{$current_branch->tel_city_code}}');
                $('#J82_005F_89C1_93FC_8ED2_94D4_8D86').val('{{$current_branch->tel_subscriber_code}}');
                $('#J113_005F_8DEC_90AC_944E_8C8E_93FA_005F_92F1_8F6F_91E3_8D73_8ED2,\
                    #J114_005F_8E81_96BC, #J75_005F_944E, #J76_005F_8C8E, #J77_005F_8E73_93E0_8BC7_94D4,\
                    #J76_005F_8E73_8A4F_8BC7_94D4, #J77_005F_8E73_93E0_8BC7_94D4, #J78_005F_89C1_93FC_8ED2_94D4_8D86,\
                    #J78_005F_89C1_93FC_8ED2_94D4_8D86, #J75_005F_944E, #J76_005F_8C8E, #J77_005F_93FA,\
                    #J78_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6, #J79_005F_8E81_96BC,\
                    #J80_005F_8E73_8A4F_8BC7_94D4, #J81_005F_8E73_93E0_8BC7_94D4, #J82_005F_89C1_93FC_8ED2_94D4_8D86').prop('readonly', true);
            @else
                $('#J113_005F_8DEC_90AC_944E_8C8E_93FA_005F_92F1_8F6F_91E3_8D73_8ED2,\
                    #J114_005F_8E81_96BC, #J75_005F_944E, #J76_005F_8C8E, #J77_005F_8E73_93E0_8BC7_94D4\
                    #J78_005F_89C1_93FC_8ED2_94D4_8D86, #J75_005F_944E, #J76_005F_8C8E, #J77_005F_93FA\
                    #J78_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6, #J79_005F_8E81_96BC\
                    #J80_005F_8E73_8A4F_8BC7_94D4, #J81_005F_8E73_93E0_8BC7_94D4, #J82_005F_89C1_93FC_8ED2_94D4_8D86').prop('readonly', false);
            @endif
        });

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
        <script type="module">
            function insertDataFromEmployee(data) {
            const employee = data['employee'];
            const branch = data['branch'];
            const headquarters = data['headquarters'];
            const employeeName = (employee.last_name || "") + '　' + (employee.first_name || "");
            const employeeNameKana = (employee.last_name_kana || "") + '　' + (employee.first_name_kana || "");
            const headquartersAddress = (headquarters.address_prefecture || "") + (headquarters.address_city || "") + (headquarters.address_ward || "") + (headquarters.address_apartment || "");
            const employeeAddress = (employee.address_prefecture || "") + (employee.address_city || "") + (employee.address_ward || "") + (employee.address_apartment || "");

            $('#J120_005F_89EE_8CEC_8B78_8BC6_94ED_95DB_8CAF_8ED2_82CC_8CC2_906C_94D4_8D86').val(employee.mynumber_card_no || "");
            if (employee.employment_insured_no !== null) {
                $('#J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.slice(0, 4));
                $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.slice(4, 10));
                $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.slice(-1));
            }
            $('#J123_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(employeeName);
            $('#J124_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').val(employeeNameKana);
            if (branch.employment_insurance_office_no !== null) {
                $('#J9_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.employment_insurance_office_no.slice(0, 4));
                $('#J10_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.employment_insurance_office_no.slice(4, 10));
                $('#J11_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.employment_insurance_office_no.slice(-1));
            }
            $('#J12_005F_94ED_95DB_8CAF_8ED2_82CC_90A9').val(employee.last_name || "");
            $('#J13_005F_94ED_95DB_8CAF_8ED2_82CC_96BC').val(employee.first_name || "");
            $('#J77_005F_8E96_8BC6_8F8A_96BC_005F_8F8A_8DDD_926E').val(headquartersAddress);
            $('#J93_005F_9761_8BE0_92CA_92A0_82CC_8CFB_8DC0_94D4_8D86').val(employee.bank_account_no || "");
            $('#J118_005F_8B4C_8D86_94D4_8D86').val(employee.japan_post_bank_code_no || "");
            $('#J119_005F_8CFB_8DC0_94D4_8D86').val(employee.japan_post_bank_account_no || "");

            if (employee.employment_insured_no !== null) {
                $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.slice(0, 4));
                $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.slice(4, 10));
                $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.slice(-1));
            }
            if (branch.employment_insurance_office_no !== null) {
                $('#J6_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.employment_insurance_office_no.slice(0, 4));
                $('#J7_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.employment_insurance_office_no.slice(4, 10));
                $('#J8_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.employment_insurance_office_no.slice(-1));
            }
            $('#J9_005F_8374_838A_834B_8369').val(employeeNameKana);
            $('#J10_005F_8B78_8BC6_9399_82F0_8A4A_8E6E_82B5_82BD_8ED2_82CC_8E81_96BC').val(employeeName);
            $('#J16_005F_96BC_8FCC').val(branch.name || "");
            $('#J17_005F_8F8A_8DDD_926E').val(headquartersAddress);
            $('#J18_005F_8E73_8A4F_8BC7_94D4').val(headquarters.tel_area_code || "");
            $('#J19_005F_8E73_93E0_8BC7_94D4').val(headquarters.tel_city_code || "");
            $('#J20_005F_89C1_93FC_8ED2_94D4_8D86').val(headquarters.tel_subscriber_code || "");
            if (employee.post_code !== null) {
                $('#J21_005F_947A_9242_8BC7_94D4_8D86').val(employee.post_code.slice(0, 3));
                $('#J22_005F_92AC_88E6_94D4_8D86').val(employee.post_code.slice(3, 7));
            }

            $('#J23_005F_8F5A_8F8A').val(employeeAddress);
            $('#J24_005F_8E73_8A4F_8BC7_94D4').val(employee.tel_area_code || "");
            $('#J25_005F_8E73_93E0_8BC7_94D4').val(employee.tel_city_code || "");
            $('#J26_005F_89C1_93FC_8ED2_94D4_8D86').val(employee.tel_subscriber_code || "");
        }

        Livewire.on('onSelectEmployee', ({ data }) => {insertDataFromEmployee(data)});
        </script>

        @slot('footer')
        <script src="{{asset('/js/ledger-form.js')}}" type="module"></script>
        @endslot
    </section>
</x-layout>
