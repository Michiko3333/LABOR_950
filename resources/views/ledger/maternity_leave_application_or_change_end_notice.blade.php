<!-- 4950013521030000 -->
<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">
            <style type="text/css"></style>
        @endslot
        <h1>{{ $procedureName }}</h1>
        <p>申請・届出に関する事項を入力してください。</p>
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
                <div class="ledger-grid my-2">
                    <div class="employee-card">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>社員選択</h2>
                                <livewire:ledger-employee-list />
                            </div>
                        </div>
                    </div>
                    <div class="attachment-card">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>添付ファイル</h2>
                                <x-ledger-attachment :file_original_names="[
                                    'other' => 'その他の添付書類',
                                    ]" :extensions="'.jpg,.pdf'"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="submission-card">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>提出先選択</h2>
                                <livewire:submission-selector :mode="1" />
                            </div>
                        </div>
                    </div>
                    <div class="qualification-card">
                        <div class="ui card card-shadow">
                            <div class="content" style="margin-bottom: 20px;">
                                <x-form.maternity_leave_application_or_change_end_notice :dataUri="$dataUri"/>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="query_parameter" id="queryParameter">
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
                        <x-form.maternity_leave_application_or_change_end_notice :dataUri="$dataUri"/>
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
                $('#A1_1').val('{{ old('submission_year') ?? $todaySet['year'] }}').css('background-color', '#ffffff').prop('readonly', true);
                $('#A1_2').val('{{ old('submission_month') ?? $todaySet['month'] }}').css('background-color', '#ffffff').prop('readonly', true);
                $('#A1_3').val('{{ old('submission_day') ?? $todaySet['day'] }}').css('background-color', '#ffffff').prop('readonly', true);

                @if (isset($businessOwner))
                    $('#A4_3').val(
                        '{{ old('employer_company_managerial_position_name', ($businessOwner->last_name ? $businessOwner->last_name . '　' : '') . ($businessOwner->first_name ?? '')) }}'
                    );
                @endif

                @if ($current_employee->role_id === 500)
                    $('#A5_1').val('{{ $current_employee->last_name }}' + '　' + '{{ $current_employee->first_name }}').css('background-color', '#ddeeff').prop('readonly', false);
                    $('#A5_2').val('{{ $current_employee->labor_and_social_security_attorney_registration_no }}').prop('readonly', true);
                @else
                    $('#A5_1').css('background-color', '#ffffff').prop('readonly', true);
                    $('#A5_2').css('background-color', '#ffffff').prop('readonly', true);
                @endif
            })
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
                const birthdayConvertJapan = data['birthday_convert_japan'];
                const branch = data['branch'];
                const branch_prefecture_data = data['branch_prefecture_data'];
                const company = data['company'];
                const employee = data['employee'];
                const due_date_ConvertJapan = data['due_date_4950013521030000'];
                const start_date_of_closed_ConvertJapan = data['start_date_of_closed_4950013521030000'];
                const planned_end_date_of_closure_ConvertJapan = data['planned_end_date_of_closure_4950013521030000'];
                const date_of_birth_ConvertJapan = data['date_of_birth_4950013521030000'];
                const end_date_of_losed_ConvertJapan = data['end_date_of_losed_4950013521030000'];

                $('#A2_1').val(branch.pension_office_reference_prefecture || '');
                $('#A2_2').val(branch.pension_office_reference_no_cities || '');
                $('#A2_3').val(branch.pension_office_reference_no_office || '');
                $('#A19').val(branch.pension_office_no || '');

                if (branch.post_code != null && employee.post_code.length == 7) {
                    $('#A3_1').val(branch.post_code.substring(0, 3));
                    $('#A3_2').val(branch.post_code.substring(3, 7));
                } else {
                    $('#A3_1').val("");
                    $('#A3_2').val("");
                }

                $('#A4_1').val((branch_prefecture_data.name ?? '') + (branch.address_city ?? '') + (branch.address_ward ?? '') + (branch.address_apartment ?? ''));
                $('#A4_2').val(company.name || '');
                $('#A4_4_1').val(branch.tel_area_code || '');
                $('#A4_4_2').val(branch.tel_city_code || '');
                $('#A4_4_3').val(branch.tel_subscriber_code || '');

                $('#A6_1').val(employee.insurer_reference_no || '');
                $('#A6_2_1').val(employee.mynumber_card_no || '');
                $('#A6_2_2').val(employee.pension_no || '');

                $('#A6_3').val((employee.last_name_kana ?? '') + '　' + (employee.first_name_kana ?? ''));
                $('#A6_4').val((employee.last_name ?? '') + '　' + (employee.first_name ?? ''));

                var eraMapping = {'昭和': '5', '平成': '7', '令和': '9',};
                var birthdayEraValue = birthdayConvertJapan['era'] ?? "";
                var birthdayEra = eraMapping[birthdayEraValue] ?? "";
                $('#A6_5_1').val(birthdayEra);
                $('#A6_5_2').val(birthdayConvertJapan['year'] ?? "");
                $('#A6_5_3').val(birthdayConvertJapan['month'] ?? "");
                $('#A6_5_4').val(birthdayConvertJapan['day'] ?? "");

                $('#A7_1').val(due_date_ConvertJapan['year'] ?? "");
                $('#A7_2').val(due_date_ConvertJapan['month'] ?? "");
                $('#A7_3').val(due_date_ConvertJapan['day'] ?? "");

                $('#A9_1').val(start_date_of_closed_ConvertJapan['year'] ?? "");
                $('#A9_2').val(start_date_of_closed_ConvertJapan['month'] ?? "");
                $('#A9_3').val(start_date_of_closed_ConvertJapan['day'] ?? "");

                $('#A10_1').val(planned_end_date_of_closure_ConvertJapan['year'] ?? "");
                $('#A10_2').val(planned_end_date_of_closure_ConvertJapan['month'] ?? "");
                $('#A10_3').val(planned_end_date_of_closure_ConvertJapan['day'] ?? "");

                $('#A11_1').val(date_of_birth_ConvertJapan['year'] ?? "");
                $('#A11_2').val(date_of_birth_ConvertJapan['month'] ?? "");
                $('#A11_3').val(date_of_birth_ConvertJapan['day'] ?? "");

                $('#A17_1').val(end_date_of_losed_ConvertJapan['year'] ?? "");
                $('#A17_2').val(end_date_of_losed_ConvertJapan['month'] ?? "");
                $('#A17_3').val(end_date_of_losed_ConvertJapan['day'] ?? "");

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
