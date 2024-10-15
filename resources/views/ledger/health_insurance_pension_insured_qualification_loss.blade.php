<!-- 4950013520714000 -->
<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

            <style type="text/css">
                .preview-area input.checkboxs {
                    background-color: rgb(255, 255, 255) !important;
                }
            </style>
        @endslot
        <h1>{{ $procedureName }}</h1>
        <p>申請・届出に関する事項を入力してください。<br>
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
                                    'insurance' => '被保険者証',
                                    'dependent' => '被扶養者証',
                                    'remote_dependent' => '遠隔地被扶養者証',
                                    'other' => 'その他の添付書類',
                                ]" :extensions="'.jpg,.jpeg,.pdf'"
                                    :separateDisabled='true' />
                            </div>
                        </div>
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>提出先選択</h2>
                                <livewire:submission-selector :mode="1" />
                            </div>
                        </div>
                    </div>
                    <div class="right-col">
                        <div class="ui card card-shadow">
                            <div class="content" style="margin-bottom: 20px;">
                                <x-form.health_insurance_pension_insured_qualification_loss :dataUri="$dataUri" />
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
                        <x-form.health_insurance_pension_insured_qualification_loss :dataUri="$dataUri" />
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
                $('#N6_P1').val('{{ old('submission_year') ?? $todaySet['year'] }}');
                $('#N7_P1').val('{{ old('submission_month') ?? $todaySet['month'] }}');
                $('#N8_P1').val('{{ old('submission_day') ?? $todaySet['day'] }}');

                $('#N17_P1').val('{{ old('entrepreneur_name') }}' ? '{{ old('entrepreneur_name') }}' : '{{ $company->name }}'+ '　' + '{{ $company->representative }}');

                @if ($current_employee->role_id === 500)
                @else
                    $('#N22_P1').prop('readonly', false);
                @endif
            });
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
                const employee = data['employee'];
                const branch = data['branch'];
                const company = data['company'];
                const birthdayConvertJapan = data['birthday_convert_japan'];
                const insurance_loss_convert_date = data['insurance_loss_convert_date'];
                const over_70_non_applicable_convert_date = data['over_70_non_applicable_convert_date'];
                const employment_retirement_convert_date = data['employment_retirement_convert_date'];
                const passed_away_convert_date = data['passed_away_convert_date'];
                const branch_prefecture_data = data['branch_prefecture_data'];
                const loss_convert_date = data['loss_convert_date'];
                var eraMapping = {
                    '昭和': '5',
                    '平成': '7',
                    '令和': '9',
                };
                var birthdayEraValue = birthdayConvertJapan['era'] ?? "";
                var birthdayEra = eraMapping[birthdayEraValue] ?? "";
                $('#N27_P1').val(birthdayEra);
                $('#N28_P1').val(birthdayConvertJapan['year'] ?? "");
                $('#N29_P1').val(birthdayConvertJapan['month'] ?? "");
                $('#N30_P1').val(birthdayConvertJapan['day'] ?? "");
                $('#N33_P1').val(loss_convert_date['era'] ?? "");
                $('#N34_P1').val(loss_convert_date['year'] ?? "");
                $('#N35_P1').val(loss_convert_date['month'] ?? "");
                $('#N36_P1').val(loss_convert_date['day'] ?? "");
                $('#N9_P1').val(branch.pension_office_reference_prefecture || '');
                $('#N10_P1').val(branch.pension_office_reference_no_cities || '');
                $('#N11_P1').val(branch.pension_office_reference_no_office || '');
                $('#N12_P1').val(branch.pension_office_no || '');

                if (branch.post_code != null && employee.post_code.length == 7) {
                    $('#N13_P1').val(branch.post_code.substring(0, 3));
                    $('#N14_P1').val(branch.post_code.substring(3, 7));
                } else {
                    $('#N13_P1').val("");
                    $('#N14_P1').val("");
                }
                $('#N15_P1').val((branch_prefecture_data.name ?? '') + (branch.address_city ?? '') + (branch.address_ward ??
                    '') + (branch.address_apartment ?? ''));
                $('#N16_P1').val(company.name || '');
                $('#N19_P1').val(branch.tel_area_code || '');
                $('#N20_P1').val(branch.tel_city_code || '');
                $('#N21_P1').val(branch.tel_subscriber_code || '');
                const employeeNameKana = (employee.last_name_kana || "") + '　' + (employee.first_name_kana || "");
                const employeeName = (employee.last_name || "") + '　' + (employee.first_name || "");
                $('#N23_P1').val(employee.insurer_reference_no || '');
                $('#N24_P1').val(employeeNameKana);
                $('#N25_P1').val(employeeName);
                $('#N31_P1').val(employee.mynumber_card_no || '');

                if (employee.over_retired_insurance_loss_reason === 4) {
                    $('#N37_P1_0').prop("checked", true);
                    $('#N39_P1').val(employment_retirement_convert_date['era'] ?? "");
                    $('#N40_P1').val(employment_retirement_convert_date['year'] ?? "");
                    $('#N41_P1').val(employment_retirement_convert_date['month'] ?? "");
                    $('#N42_P1').val(employment_retirement_convert_date['day'] ?? "");
                } else if (employee.over_retired_insurance_loss_reason === 5) {
                    $('#N37_P1_1').prop("checked", true);
                    $('#N44_P1').val(passed_away_convert_date['era'] ?? "");
                    $('#N45_P1').val(passed_away_convert_date['year'] ?? "");
                    $('#N46_P1').val(passed_away_convert_date['month'] ?? "");
                    $('#N47_P1').val(passed_away_convert_date['day'] ?? "");
                } else if (employee.over_retired_insurance_loss_reason === 7) {
                    $('#N37_P1_2').prop("checked", true);
                } else if (employee.over_retired_insurance_loss_reason === 9) {
                    $('#N37_P1_3').prop("checked", true);
                } else if (employee.over_retired_insurance_loss_reason === 11) {
                    $('#N37_P1_4').prop("checked", true);
                }
                if (employee.over_70_applicable_flg === 1) {
                    $('#N54_P1').prop("checked", true);
                    $('#N56_P1').val(over_70_non_applicable_convert_date['era'] ?? "").prop("disabled", false);
                    $('#N57_P1').val(over_70_non_applicable_convert_date['year'] ?? "").prop("disabled", false);
                    $('#N58_P1').val(over_70_non_applicable_convert_date['month'] ?? "").prop("disabled", false);
                    $('#N59_P1').val(over_70_non_applicable_convert_date['day'] ?? "").prop("disabled", false);
                }
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
