<!-- 4950008680040000 -->
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
                                <x-form.employment_insured_transfer_notification />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="prevew-btn">
                    <a id="ledger-back" class="ui button negative basic" type="button" style="width: 200px;"
                        href="{{ route('ledger.index') }}">戻る</a>
                    @if ($certificate == false)
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
                        <x-form.employment_insured_transfer_notification />
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
                $('#J36_005F_944E_8D86').val('{{ old('today_era', $today['era']) }}');
                $('#J37_005F_944E').val('{{ old('today_year', $today['year']) }}');
                $('#J38_005F_8C8E').val('{{ old('today_month', $today['month']) }}');
                $('#J39_005F_93FA').val('{{ old('today_date', $today['date']) }}');
                @if ($current_employee->role_id === 500)
                    $('#J42_005F_944E_8D86').val('{{ old('labor_consultant_today_era', $today['era']) }}');
                    $('#J43_005F_944E').val('{{ old('labor_consultant_today_year', $today['year']) }}');
                    $('#J44_005F_8C8E').val('{{ old('labor_consultant_today_month', $today['month']) }}');
                    $('#J45_005F_93FA').val('{{ old('labor_consultant_today_date', $today['date']) }}');
                    // $('#J46_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6').val('{{ $current_employee->last_name }}' + '　' + '{{ $current_employee->first_name }}');
                    $('#J47_005F_8E81_96BC').val('{{ $current_employee->last_name }}' + '　' +
                        '{{ $current_employee->first_name }}');
                    $('#J48_005F_8E73_8A4F_8BC7_94D4').val('{{ $current_employee->tel_area_code }}');
                    $('#J49_005F_8E73_93E0_8BC7_94D4').val('{{ $current_employee->tel_city_code }}');
                    $('#J50_005F_89C1_93FC_8ED2_94D4_8D86').val('{{ $current_employee->tel_subscriber_code }}');
                    $('#J43_005F_944E, #J44_005F_8C8E, #J45_005F_93FA, #J46_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6,\
                                    #J47_005F_8E81_96BC, #J48_005F_8E73_8A4F_8BC7_94D4, #J49_005F_8E73_93E0_8BC7_94D4, #J50_005F_89C1_93FC_8ED2_94D4_8D86')
                        .prop('readonly', true);
                @else
                    $('#J42_005F_944E_8D86').prop('disabled', true);
                    $('#J43_005F_944E, #J44_005F_8C8E, #J45_005F_93FA, #J46_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6,\
                                    #J47_005F_8E81_96BC, #J48_005F_8E73_8A4F_8BC7_94D4, #J49_005F_8E73_93E0_8BC7_94D4, #J50_005F_89C1_93FC_8ED2_94D4_8D86,\
                                    #J51_005F_9574_8B4C_9793').prop('readonly', true);
                @endif
            });
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
                const employee = data['employee'];
                const branch = data['branch'];
                const headquarters = data['headquarters'];
                const birthdayConvertJapan = data['birthday_convert_japan'];
                const employeeName = (employee.last_name || '') + '　' + (employee.first_name || '');
                const employeeNameKana = (employee.last_name_kana || '') + '　' + (employee.first_name_kana || '');
                const employeeNameAlphabet = (employee.last_name_alphabet || '') + ' ' + (employee.first_name_alphabet || '');
                $('#J10_005F_94ED_95DB_8CAF_8ED2_8ABF_8E9A_8E81_96BC').val(employeeName);
                $('#J11_005F_94ED_95DB_8CAF_8ED2_834A_8369_8E81_96BC').val(employeeNameKana);
                if (employee.country_id !== null) {
                    $('#J58_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A').val(employeeNameAlphabet);
                    $('#J58_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A').prop('disabled', false);
                } else {
                    $('#J58_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A').prop('disabled', true);
                }
                if (employee.employment_insured_no !== null) {
                    $('#J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.substring(0, 4));
                    $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.substring(4, 10));
                    $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.substring(10));
                }
                $('#J6_005F_944E_8D86').val(birthdayConvertJapan['era'] ?? "");
                $('#J7_005F_944E').val(birthdayConvertJapan['year'] ?? "");
                $('#J8_005F_8C8E').val(birthdayConvertJapan['month'] ?? "");
                $('#J9_005F_93FA').val(birthdayConvertJapan['day'] ?? "");
                if (employee.employment_insurance_office_no !== null) {
                    $('#J20_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(employee.employment_insurance_office_no.substring(0, 4));
                    $('#J21_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(employee.employment_insurance_office_no.substring(4, 10));
                    $('#J22_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(employee.employment_insurance_office_no.substring(10));
                }
                const branchInfo = (branch.name || '') + ' ' + (branch.address_prefecture || '') + ' ' + (headquarters
                    .address_city || '') + ' ' + (headquarters.address_ward || '') + ' ' + (headquarters
                    .address_apartment || '');
                const headquartersAddress = (headquarters.address_prefecture || '') + ' ' + (headquarters.address_city || '') +
                    ' ' + (headquarters.address_ward || '') + ' ' + (headquarters.address_apartment || '');
                $('#J28_005F_935D_8BCE_914F_8E96_8BC6_8F8A_96BC_8FCC_8F8A_8DDD_926E').val(branchInfo);
                $('#J60_005F_95CF_8D58_914F_8E81_96BC').val(employeeName);
                $('#J59_005F_95CF_8D58_914F_8E81_96BC_8374_838A_834B_8369').val(employeeNameKana);
                $('#J30_005F_8F5A_8F8A').val(headquartersAddress);
                $('#J32_005F_8E73_8A4F_8BC7_94D4').val(headquarters.tel_area_code);
                $('#J33_005F_8E73_93E0_8BC7_94D4').val(headquarters.tel_city_code);
                $('#J34_005F_89C1_93FC_8ED2_94D4_8D86').val(headquarters.tel_subscriber_code);
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
