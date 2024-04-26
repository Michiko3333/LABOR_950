<!-- 4950008680048000 -->
<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

            <style type="text/css"></style>
        @endslot
        <h1 class="mt-2">{{ $procedureName }}</h1>
        @if ($certificate == false)
            <div class="ui warning message" style="margin: 0;">
                <div class="header">
                    電子証明書が登録されていません
                </div>
            </div>
        @endif
        @if($egovAcount == false)
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
                                <x-ledger-attachment :required_list="['required_wage_certificate_or_payment_status']" :file_original_names="[
                                    'wage_certificate_or_payment_status' =>
                                        '賃金月額証明書 又は 賃金証明書に記載された賃金支払い状況の内容が確認できる書類',
                                    'childcare' => '育児の事実が確認できる書類',
                                    'nursing_care' => '介護の事実が確認できる書類',
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
                            <div class="content" style="overflow-x: auto; overflow-y: auto; max-height: 650px;">
                                <x-form.employment_insured_leave_start_amount_monthly_certificate />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="prevew-btn">
                    <a id="ledger-back" class="ui button negative basic" type="button" style="width: 200px;"
                        href="{{ route('ledger.index') }}">戻る</a>
                    @if($certificate == false || $egovAcount == false)
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
                @if ($current_employee->role_id === 500)
                    $('#J74_005F_944E_8D86').val('{{ old('labor_consultant_today_era', $today['era']) }}');
                    $('#J75_005F_944E').val('{{ old('labor_consultant_today_year', $today['year']) }}');
                    $('#J76_005F_8C8E').val('{{ old('labor_consultant_today_month', $today['month']) }}');
                    $('#J77_005F_93FA').val('{{ old('labor_consultant_today_date', $today['date']) }}');
                    // $('#J78_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6').val('{{ $current_employee->last_name }}' + '　' + '{{ $current_employee->first_name }}');
                    $('#J79_005F_8E81_96BC').val('{{ $current_employee->last_name }}' + '　' +
                        '{{ $current_employee->first_name }}');
                    $('#J80_005F_8E73_8A4F_8BC7_94D4').val('{{ $current_employee->tel_area_code }}');
                    $('#J81_005F_8E73_93E0_8BC7_94D4').val('{{ $current_employee->tel_city_code }}');
                    $('#J82_005F_89C1_93FC_8ED2_94D4_8D86').val('{{ $current_employee->tel_subscriber_code }}');
                    $('#J75_005F_944E, #J76_005F_8C8E, #J77_005F_93FA, #J78_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6,\
                                    #J79_005F_8E81_96BC, #J80_005F_8E73_8A4F_8BC7_94D4, #J81_005F_8E73_93E0_8BC7_94D4, #J82_005F_89C1_93FC_8ED2_94D4_8D86')
                        .prop('readonly', true);
                @else
                    $('#J74_005F_944E_8D86').prop('disabled', true);
                    $('#J75_005F_944E, #J76_005F_8C8E, #J77_005F_93FA, #J78_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6,\
                                    #J79_005F_8E81_96BC, #J80_005F_8E73_8A4F_8BC7_94D4, #J81_005F_8E73_93E0_8BC7_94D4, #J82_005F_89C1_93FC_8ED2_94D4_8D86,\
                                    #J83_005F_9574_8B4C_9793').prop('readonly', true);
                @endif
            });
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
                const employee = data['employee'];
                const branch = data['branch'];
                const headquarters = data['headquarters'];

                if (employee.employment_insured_no !== null) {
                    $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.substring(0, 4));
                    $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.substring(4, 10));
                    $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.substring(10));
                }
                if (branch.employment_insurance_office_no !== null) {
                    $('#J6_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.employment_insurance_office_no.substring(0, 4));
                    $('#J7_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.employment_insurance_office_no.substring(4, 10));
                    $('#J8_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.employment_insurance_office_no.substring(10));
                }
                const employeeName = (employee.last_name || "") + '　' + (employee.first_name || "");
                const employeeNameKana = (employee.last_name_kana || "") + '　' + (employee.first_name_kana || "");
                $('#J10_005F_8B78_8BC6_9399_82F0_8A4A_8E6E_82B5_82BD_8ED2_82CC_8E81_96BC').val(employeeName);
                $('#J9_005F_8374_838A_834B_8369').val(employeeNameKana);
                $('#J16_005F_96BC_8FCC').val(branch.name);
                const branchAddress = (branch.address_prefecture || "") + ' ' + (branch.address_city || "") + ' ' + (branch
                    .address_ward || "") + ' ' + (branch.address_apartment || "");
                $('#J17_005F_8F8A_8DDD_926E').val(branchAddress);
                $('#J18_005F_8E73_8A4F_8BC7_94D4').val(branch.tel_area_code || '');
                $('#J19_005F_8E73_93E0_8BC7_94D4').val(branch.tel_city_code || '');
                $('#J20_005F_89C1_93FC_8ED2_94D4_8D86').val(branch.tel_subscriber_code || '');
                if (employee.post_code !== null && employee.post_code.length == 7) {
                    $('#J21_005F_947A_9242_8BC7_94D4_8D86').val(employee.post_code.substring(0, 3));
                    $('#J22_005F_92AC_88E6_94D4_8D86').val(employee.post_code.substring(3, 7));
                }
                const employeeAddress = (employee.address_prefecture || "") + ' ' + (employee.address_city || "") + ' ' + (
                    employee.address_ward || "") + ' ' + (employee.address_apartment || "");
                $('#J23_005F_8F5A_8F8A').val(employeeAddress);
                $('#J24_005F_8E73_8A4F_8BC7_94D4').val(employee.tel_area_code);
                $('#J25_005F_8E73_93E0_8BC7_94D4').val(employee.tel_city_code);
                $('#J26_005F_89C1_93FC_8ED2_94D4_8D86').val(employee.tel_subscriber_code);
                const headquarterAddress = (headquarters.address_prefecture || "") + ' ' + (headquarters.address_city || "") +
                    ' ' + (headquarters.address_ward || "") + ' ' + (headquarters.address_apartment || "");
                $('#J27_005F_8F5A_8F8A').val(headquarterAddress);
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
