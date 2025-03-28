<!-- 4950013521035000 -->
<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">
            <style type="text/css"></style>
        @endslot
        <h1>{{ $procedureName }}</h1>
        <p>申請・届出に関する事項を入力してください。<br>
            複数の様式を提出する場合は、タブから様式を切り替えてください。
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
                                <h2>書類・データの添付</h2>
                                <x-ledger-attachment :file_original_names="[
                                        'basic_pension' => '基礎年金番号通知書 または 基礎年金番号を確認できる書類',
                                        'livelihood_maintenance' => '生計維持を確認できる書類',
                                        'business_owner' => '事業主等証明書',
                                        'medical_insurer' => '医療保険者証明書',
                                        'other' => 'その他の添付書類'
                                    ]" :extensions="'.jpg,.pdf'"
                                    :separateDisabled='true' />
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
                            <div class="content">
                                <div class="ui top attached tabular menu">
                                    <a class="item active" data-tab="sample">
                                        国民年金第3号被保険者関係届
                                    </a>
                                    <a class="item" data-tab="sample2">
                                        国民年金第3号被保険者関係届<br>
                                        事業主等証明書
                                    </a>
                                    <a class="item" data-tab="sample3">
                                        国民年金第3号被保険者関係届<br>
                                        医療保険者証明書
                                    </a>
                                </div>
                                <div class="ui bottom attached segment" data-tab="sample">
                                    <x-form.national_pension_category_3_insured_person_notice :dataUri="$dataUri1"/>
                                </div>
                                <div class="ui bottom attached segment" data-tab="sample2" style="display: none;">
                                    <x-form.national_pension_category_3_insured_person_employer_certificate :dataUri="$dataUri2"/>
                                </div>
                                <div class="ui bottom attached segment" data-tab="sample3" style="display: none;">
                                    <x-form.national_pension_category_3_insured_person_health_insurance_certificate :dataUri="$dataUri3"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="query_parameter" id="queryParameter">
                </div>
                <div class="prevew-btn">
                    <a id="ledger-back" class="ui button negative basic" type="button" style="width: 200px;"
                        href="{{ route('ledger.index') }}">戻る
                    </a>
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
                    <div class="content" preview-component style="margin-top: 1rem;">
                        <x-form.national_pension_category_3_insured_person_notice :dataUri="$dataUri1"/>
                    </div>
                </div>
            </div>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component style="margin-top: 1rem;">
                        <x-form.national_pension_category_3_insured_person_employer_certificate :dataUri="$dataUri2"/>
                    </div>
                </div>
            </div>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component style="margin-top: 1rem;">
                        <x-form.national_pension_category_3_insured_person_health_insurance_certificate :dataUri="$dataUri3"/>
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
                $('#A1_1').val('{{ old('npc3ipn_1_submission_year') ?? $todaySet['year'] }}').css('background-color', '#ffffff').prop('readonly', true);
                $('#A1_2').val('{{ old('npc3ipn_1_submission_month') ?? $todaySet['month'] }}').css('background-color', '#ffffff').prop('readonly', true);
                $('#A1_3').val('{{ old('npc3ipn_1_submission_day') ?? $todaySet['day'] }}').css('background-color', '#ffffff').prop('readonly', true);

                $('#A3_3').val('{{ $company->representative }}' ?? '');
                $('#E2_3').val('{{ $company->representative }}' ?? '');
                $('#G9_3').val('{{ $company->representative }}' ?? '');

                @if ($yesterdaySet['era'] == '令和')
                    $('#A5_1').val('{{ old('npc3ipn_1_date_of_receipt_era') ?? 9 }}');
                @else
                    $('#A5_1').val('{{ old('npc3ipn_1_date_of_receipt_era') ?? null }}');
                @endif
                $('#A5_2').val('{{ old('npc3ipn_1_date_of_receipt_year') ?? $yesterdaySet['year'] }}');
                $('#A5_3').val('{{ old('npc3ipn_1_date_of_receipt_month') ?? $yesterdaySet['month'] }}');
                $('#A5_4').val('{{ old('npc3ipn_1_date_of_receipt_day') ?? $yesterdaySet['day'] }}');

                @if ($current_employee->role_id === 500)
                    $('#A6_1').val('{{ $current_employee->last_name }}' + '　' + '{{ $current_employee->first_name }}').css('background-color', '#ddeeff').prop('readonly', false);
                    $('#A6_2').val('{{ $current_employee->labor_and_social_security_attorney_registration_no }}');
                    $('#F2').val('{{ $current_employee->last_name }}' + '　' + '{{ $current_employee->first_name }}').css('background-color', '#ffffff').prop('readonly', true);
                    $('#G12').val('{{ $current_employee->last_name }}' + '　' + '{{ $current_employee->first_name }}').css('background-color', '#ffffff').prop('readonly', true);
                @else
                    $('#A6_1').prop('disabled', true).css('background-color', '#e6eaed').prop('readonly', true);
                    $('#F2').prop('disabled', true).css('background-color', '#e6eaed').prop('readonly', true);
                    $('#G12').prop('disabled', true).css('background-color', '#e6eaed').prop('readonly', true);
                @endif

                $('#C1_1').val('{{ old('npc3ipn_1_notification_date_year') ?? $todaySet['year'] }}').css('background-color', '#ffffff').prop('readonly', true);
                $('#C1_2').val('{{ old('npc3ipn_1_notification_date_month') ?? $todaySet['month'] }}').css('background-color', '#ffffff').prop('readonly', true);
                $('#C1_3').val('{{ old('npc3ipn_1_notification_date_day') ?? $todaySet['day'] }}').css('background-color', '#ffffff').prop('readonly', true);

                $('#F1_1').val('{{ old('npc3ipn_2_date_of_submission_year') ?? $todaySet['year'] }}').css('background-color', '#ffffff').prop('readonly', true);
                $('#F1_2').val('{{ old('npc3ipn_2_date_of_submission_month') ?? $todaySet['month'] }}').css('background-color', '#ffffff').prop('readonly', true);
                $('#F1_3').val('{{ old('npc3ipn_2_date_of_submission_day') ?? $todaySet['day'] }}').css('background-color', '#ffffff').prop('readonly', true);

                $('#D1').css('background-color', '#ffffff').prop('readonly', true);
                $('#D2').css('background-color', '#ffffff').prop('readonly', true);
                $('#D3_1').css('background-color', '#ffffff').prop('readonly', true);
                $('#D3_2').css('background-color', '#ffffff').prop('readonly', true);
                $('#D3_3').css('background-color', '#ffffff').prop('readonly', true);
                $('#D3_4').css('background-color', '#ffffff').prop('readonly', true);
                $('#D4').css('background-color', '#ffffff').prop('readonly', true);
                $('#D5_1').css('background-color', '#ffffff').prop('readonly', true);
                $('#D5_2').css('background-color', '#ffffff').prop('readonly', true);
                $('#D6_1').css('background-color', '#ffffff').prop('readonly', true);
                $('#D6_2').css('background-color', '#ffffff').prop('readonly', true);
                $('#D6_3').css('background-color', '#ffffff').prop('readonly', true);
                $('#D6_4').css('background-color', '#ffffff').prop('readonly', true);
                $('#E1_1').css('background-color', '#ffffff').prop('readonly', true);
                $('#E1_2').css('background-color', '#ffffff').prop('readonly', true);
                $('#E2_1').css('background-color', '#ffffff').prop('readonly', true);
                $('#E2_2').css('background-color', '#ffffff').prop('readonly', true);
                $('#E2_3').css('background-color', '#ffffff').prop('readonly', true);
                $('#E3_1').css('background-color', '#ffffff').prop('readonly', true);
                $('#E3_2').css('background-color', '#ffffff').prop('readonly', true);
                $('#E3_3').css('background-color', '#ffffff').prop('readonly', true);

                $('#G11_1').val('{{ old('npc3ipn_3_date_of_submission_year') ?? $todaySet['year'] }}').css('background-color', '#ffffff').prop('readonly', true);
                $('#G11_2').val('{{ old('npc3ipn_3_date_of_submission_month') ?? $todaySet['month'] }}').css('background-color', '#ffffff').prop('readonly', true);
                $('#G11_3').val('{{ old('npc3ipn_3_date_of_submission_day') ?? $todaySet['day'] }}').css('background-color', '#ffffff').prop('readonly', true);

                $('#G1').css('background-color', '#ffffff').prop('readonly', true);
                $('#G2').css('background-color', '#ffffff').prop('readonly', true);
                $('#G3_1').css('background-color', '#ffffff').prop('readonly', true);
                $('#G3_2').css('background-color', '#ffffff').prop('readonly', true);
                $('#G3_3').css('background-color', '#ffffff').prop('readonly', true);
                $('#G3_4').css('background-color', '#ffffff').prop('readonly', true);
                $('#G4').css('background-color', '#ffffff').prop('readonly', true);
                $('#G5_1').css('background-color', '#ffffff').prop('readonly', true);
                $('#G5_2').css('background-color', '#ffffff').prop('readonly', true);
                $('#G6_1').css('background-color', '#ffffff').prop('readonly', true);
                $('#G6_2').css('background-color', '#ffffff').prop('readonly', true);
                $('#G6_3').css('background-color', '#ffffff').prop('readonly', true);
                $('#G6_4').css('background-color', '#ffffff').prop('readonly', true);
            });
            document.addEventListener('DOMContentLoaded', function() {
                const eraMap = {
                    5: "昭和",
                    7: "平成",
                    9: "令和"
                };
                const birthdayOfNo3Era = document.getElementById('C4_1').value;
                document.getElementById('D3_1').value = eraMap[birthdayOfNo3Era];
                document.getElementById('G3_1').value = eraMap[birthdayOfNo3Era];
                const birthdayOfNo2Era = document.getElementById('B2_1').value;
                document.getElementById('D6_1').value = eraMap[birthdayOfNo2Era];
                document.getElementById('G6_1').value = eraMap[birthdayOfNo2Era];

                const tabs = document.querySelectorAll('.ui.tabular.menu .item');
                const contents = document.querySelectorAll('.ui.bottom.attached.segment');
                tabs.forEach((tab, index) => {
                    tab.addEventListener('click', function() {
                        tabs.forEach((t) => t.classList.remove('active'));
                        tab.classList.add('active');
                        contents.forEach((c) => c.style.display = 'none');
                        contents[index].style.display = 'block';
                    });
                });
            });
        </script>

        <script type="module">
            function toHalfWidth(value) {
                return value.replace(/[０-９]/g, function(ch) {
                    return String.fromCharCode(ch.charCodeAt(0) - 0xFEE0);
                });
            }

            function insertDataFromEmployee(data) {
                const birthdayConvertJapan = data['birthday_convert_japan'];
                const branch = data['branch'];
                const branch_prefecture_data = data['branch_prefecture_data'];
                const company = data['company'];
                const date_of_authorisation_convert = data['date_of_authorisation_convert'];
                const date_of_expiry_convert = data['date_of_expiry_convert'];
                const employee = data['employee'];
                const employee_prefecture_data = data['employee_prefecture_data'];
                const spouse = data['spouse'];
                const spouse_birthday_convert_japan = data['spouse_birthday_convert_japan'];
                const spouse_prefecture_data = data['spouse_prefecture_data'];
                const pensionOffice = data['pensionOffice'];

                $('#A3_2').val(company.name);
                $('#E2_2').val(company.name);
                $('#G9_2').val(company.name);

                if (branch.post_code != null && branch.post_code.length == 7) {
                    $('#A2_1').val(branch.post_code.substring(0, 3));
                    $('#A2_2').val(branch.post_code.substring(3, 7));
                    $('#E1_1').val(branch.post_code.substring(0, 3));
                    $('#E1_2').val(branch.post_code.substring(3, 7));
                    $('#G8_1').val(branch.post_code.substring(0, 3));
                    $('#G8_2').val(branch.post_code.substring(3, 7));
                }

                $('#A3_1').val(
                    (branch_prefecture_data.name ?? '')
                    +(branch.address_city ?? '')
                    +(branch.address_ward ?? '')
                    +(branch.address_apartment ?? '')
                );

                $('#A4_1').val(branch.tel_area_code || '');
                $('#E3_1').val(branch.tel_area_code || '');
                $('#G10_1').val(branch.tel_area_code || '');
                $('#A4_2').val(branch.tel_city_code || '');
                $('#E3_2').val(branch.tel_city_code || '');
                $('#G10_2').val(branch.tel_city_code || '');
                $('#A4_3').val(branch.tel_subscriber_code || '');
                $('#E3_3').val(branch.tel_subscriber_code || '');
                $('#G10_3').val(branch.tel_subscriber_code || '');

                $('#B1_1').val((employee.last_name_kana ?? '') + '　' + (employee.first_name_kana ?? ''));
                $('#D5_1').val((employee.last_name_kana ?? '') + '　' + (employee.first_name_kana ?? ''));
                $('#G5_1').val((employee.last_name_kana ?? '') + '　' + (employee.first_name_kana ?? ''));
                $('#B1_2').val((employee.last_name ?? '') + '　' + (employee.first_name ?? ''));
                $('#D5_2').val((employee.last_name ?? '') + '　' + (employee.first_name ?? ''));
                $('#G5_2').val((employee.last_name ?? '') + '　' + (employee.first_name ?? ''));

                var eraMapping = {'昭和': '5', '平成': '7', '令和': '9',};
                var birthdayEraValue = birthdayConvertJapan['era'] ?? "";
                var birthdayEra = eraMapping[birthdayEraValue] ?? "";
                $('#B2_1').val(birthdayEra);
                $('#B2_2').val(birthdayConvertJapan['year'] ?? "");
                $('#D6_2').val(birthdayConvertJapan['year'] ?? "");
                $('#G6_2').val(birthdayConvertJapan['year'] ?? "");
                $('#B2_3').val(birthdayConvertJapan['month'] ?? "");
                $('#D6_3').val(birthdayConvertJapan['month'] ?? "");
                $('#G6_3').val(birthdayConvertJapan['month'] ?? "");
                $('#B2_4').val(birthdayConvertJapan['day'] ?? "");
                $('#D6_4').val(birthdayConvertJapan['day'] ?? "");
                $('#G6_4').val(birthdayConvertJapan['day'] ?? "");

                switch (birthdayEra) {
                    case '1' :
                        $('#D6_1').val('明治');
                        $('#G6_1').val('明治');
                        break;
                    case '3' :
                        $('#D6_1').val('大正');
                        $('#G6_1').val('大正');
                        break;
                    case '5' :
                        $('#D6_1').val('昭和');
                        $('#G6_1').val('昭和');
                        break;
                    case '7' :
                        $('#D6_1').val('平成');
                        $('#G6_1').val('平成');
                        break;
                    case '9' :
                        $('#D6_1').val('令和');
                        $('#G6_1').val('令和');
                        break;
                }

                if (employee.sex === 1) {
                    $('#B3_1').prop("checked", true);
                } else if (employee.sex === 2) {
                    $('#B3_2').prop("checked", true);
                }

                if (employee.mynumber_card_no) {
                    var employee_mynumber_card_no = employee.mynumber_card_no;
                } else if (employee.pension_no) {
                    var employee_mynumber_card_no = employee.pension_no;
                }
                $('#B4').val(employee_mynumber_card_no ?? '');
                $('#D4').val(employee_mynumber_card_no ?? '');
                $('#G4').val(employee_mynumber_card_no ?? '');

                if (employee.post_code != null && employee.post_code.length == 7) {
                    $('#B5_1').val(employee.post_code.substring(0, 3));
                    $('#B5_2').val(employee.post_code.substring(3, 7));
                }

                $('#B6').val(
                    (employee_prefecture_data.name ?? '')
                    +(employee.address_city ?? '')
                    +(employee.address_ward ?? '')
                    +(employee.address_apartment ?? '')
                );

                $('#E2_1').val(
                    (branch_prefecture_data.name ?? '')
                    +(branch.address_city ?? '')
                    +(branch.address_ward ?? '')
                    +(branch.address_apartment ?? '')
                );

                $('#G9_1').val(
                    (branch_prefecture_data.name ?? '')
                    +(branch.address_city ?? '')
                    +(branch.address_ward ?? '')
                    +(branch.address_apartment ?? '')
                );

                if (spouse !== undefined && spouse !== null) {
                    $('#C2_1').val((spouse.last_name_kana ? spouse.last_name_kana + '　' : '') + (spouse.first_name_kana ?? ''));
                    $('#C2_2').val((spouse.last_name ? spouse.last_name + '　' : '') + (spouse.first_name ?? ''));
                    $('#D2').val((spouse.last_name ? spouse.last_name + '　' : '') + (spouse.first_name ?? ''));
                    $('#G2').val((spouse.last_name ? spouse.last_name + '　' : '') + (spouse.first_name ?? ''));

                    var spouseBirthdayEraValue = spouse_birthday_convert_japan['era'] ?? "";
                    var spouseBirthdayEra = eraMapping[spouseBirthdayEraValue] ?? "";

                    if (spouseBirthdayEra) {
                        $('#C4_1').val(spouseBirthdayEra);

                        switch (spouseBirthdayEra) {
                            case '1' :
                                $('#D3_1').val('明治');
                                $('#G3_1').val('明治');
                                break;
                            case '3' :
                                $('#D3_1').val('大正');
                                $('#G3_1').val('大正');
                                break;
                            case '5' :
                                $('#D3_1').val('昭和');
                                $('#G3_1').val('昭和');
                                break;
                            case '7' :
                                $('#D3_1').val('平成');
                                $('#G3_1').val('平成');
                                break;
                            case '9' :
                                $('#D3_1').val('令和');
                                $('#G3_1').val('令和');
                                break;
                        }
                    }

                    if (spouse_birthday_convert_japan['year']) {
                        $('#C4_2').val(spouse_birthday_convert_japan['year'] ?? "");
                        $('#D3_2').val(spouse_birthday_convert_japan['year'] ?? "");
                        $('#G3_2').val(spouse_birthday_convert_japan['year'] ?? "");
                    }
                    if (spouse_birthday_convert_japan['month']) {
                        $('#C4_3').val(spouse_birthday_convert_japan['month'] ?? "");
                        $('#D3_3').val(spouse_birthday_convert_japan['month'] ?? "");
                        $('#G3_3').val(spouse_birthday_convert_japan['month'] ?? "");
                    }
                    if (spouse_birthday_convert_japan['day']) {
                        $('#C4_4').val(spouse_birthday_convert_japan['day'] ?? "");
                        $('#D3_4').val(spouse_birthday_convert_japan['day'] ?? "");
                        $('#G3_4').val(spouse_birthday_convert_japan['day'] ?? "");
                    }

                    if (spouse.sex === 1) {
                        $('#C5_1').prop("checked", true);
                    } else if (spouse.sex === 2) {
                        $('#C5_2').prop("checked", true);
                    } else if (spouse.sex === 3) {
                        $('#C5_3').prop("checked", true);
                    } else if (spouse.sex === 4) {
                        $('#C5_4').prop("checked", true);
                    }

                    if (spouse.mynumber_card_no) {
                        var spouse_mynumber_card_no = spouse.mynumber_card_no;
                    } else if (spouse.pension_no) {
                        var spouse_mynumber_card_no = spouse.pension_no;
                    }
                    $('#C6').val(spouse_mynumber_card_no ?? '');
                    $('#D1').val(spouse_mynumber_card_no ?? '');
                    $('#G1').val(spouse_mynumber_card_no ?? '');

                    if (spouse.post_code && spouse.post_code.length === 7) {
                        $('#C9_1').val(spouse.post_code.substring(0, 3));
                        $('#C9_2').val(spouse.post_code.substring(3, 7));
                    } else {
                        $('#C9_1').val('');
                        $('#C9_2').val('');
                    }

                    if (spouse.country_name || spouse.address_city || spouse.address_ward || spouse.address_apartment) {
                        const combinedAddress = [
                            spouse.country_name,
                            spouse.address_city,
                            spouse.address_ward,
                            spouse.address_apartment
                        ].filter(Boolean).join(' ');
                        $('#C10').val(combinedAddress);

                        const b6Value = $('#B6').val();
                        if (combinedAddress === b6Value) {
                            $('#C8_1').val('同居');
                            $('#C8_1').prop('checked', true);
                        } else {
                            $('#C8_2').val('別居');
                            $('#C8_2').prop('checked', true);
                        }
                    }

                    var spouse_doa_EraValue = date_of_authorisation_convert['era'] ?? "";
                    var spouse_doa_Era = eraMapping[spouse_doa_EraValue] ?? "";
                    $('#C13_1').val(spouse_doa_Era);
                    $('#C13_2').val(date_of_authorisation_convert['year'] ?? "");
                    $('#C13_3').val(date_of_authorisation_convert['month'] ?? "");
                    $('#C13_4').val(date_of_authorisation_convert['day'] ?? "");

                    var spouse_doe_EraValue = date_of_expiry_convert['era'] ?? "";
                    var spouse_doe_Era = eraMapping[spouse_doe_EraValue] ?? "";
                    $('#C15_1').val(spouse_doe_Era);
                    $('#C15_2').val(date_of_expiry_convert['year'] ?? "");
                    $('#C15_3').val(date_of_expiry_convert['month'] ?? "");
                    $('#C15_4').val(date_of_expiry_convert['day'] ?? "");
                }

                const prefectureSelect = document.querySelector('select[name="selected_prefecture"]');
                const helloWorkSelect = document.querySelector('select[name="selected_pension_office"]');

                if(pensionOffice){
                    prefectureSelect.addEventListener('change', function () {
                    setTimeout(()=>{
                            helloWorkSelect.value = pensionOffice.id;
                        },700);
                    });
                    prefectureSelect.value = pensionOffice.address_prefecture;
                    prefectureSelect.dispatchEvent(new Event('change', { bubbles: true }));
                    document.querySelector('input[name="apply_to_code"]').value = pensionOffice.identifier_e;
                    document.querySelector('input[name="apply_to_code"]').dispatchEvent(new Event('input'));
                    document.querySelector('input[name="apply_to_name"]').value = pensionOffice.submit_union_name_e;
                    document.querySelector('input[name="apply_to_name"]').dispatchEvent(new Event('input'));
                }else{
                    $("select[name='selected_prefecture']").val('');
                    $("select[name='selected_pension_office']").val('');
                    $("input[name='apply_to_name']").val('');
                    $("input[name='apply_to_code']").val('');
                }
            }
            document.getElementById('C6').addEventListener('input', function() {
                document.getElementById('D1').value = this.value;
                document.getElementById('G1').value = this.value;
            });
            document.getElementById('C2_2').addEventListener('input', function() {
                document.getElementById('D2').value = this.value;
                document.getElementById('G2').value = this.value;
            });
            document.getElementById('C4_1').addEventListener('input', function() {
                var C4_1_era = this.value;
                switch (C4_1_era) {
                    case '1' :
                        document.getElementById('D3_1').value = '明治';
                        document.getElementById('G3_1').value = '明治';
                        break;
                    case '3' :
                        document.getElementById('D3_1').value = '大正';
                        document.getElementById('G3_1').value = '大正';
                        break;
                    case '5' :
                        document.getElementById('D3_1').value = '昭和';
                        document.getElementById('G3_1').value = '昭和';
                        break;
                    case '7' :
                        document.getElementById('D3_1').value = '平成';
                        document.getElementById('G3_1').value = '平成';
                        break;
                    case '9' :
                        document.getElementById('D3_1').value = '令和';
                        document.getElementById('G3_1').value = '令和';
                        break;
                }
            });
            document.getElementById('C4_2').addEventListener('input', function() {
                const inputValue = this.value;
                const halfWidthValue = toHalfWidth(inputValue);
                document.getElementById('D3_2').value = halfWidthValue;
                document.getElementById('G3_2').value = halfWidthValue;
            });
            document.getElementById('C4_3').addEventListener('input', function() {
                const inputValue = this.value;
                const halfWidthValue = toHalfWidth(inputValue);
                document.getElementById('D3_3').value = halfWidthValue;
                document.getElementById('G3_3').value = halfWidthValue;
            });
            document.getElementById('C4_4').addEventListener('input', function() {
                const inputValue = this.value;
                const halfWidthValue = toHalfWidth(inputValue);
                document.getElementById('D3_4').value = halfWidthValue;
                document.getElementById('G3_4').value = halfWidthValue;
            });

            document.getElementById('B4').addEventListener('input', function() {
                const inputValue = this.value;
                const halfWidthValue = toHalfWidth(inputValue);
                document.getElementById('D4').value = halfWidthValue;
                document.getElementById('G4').value = halfWidthValue;
            });
            document.getElementById('B1_1').addEventListener('input', function() {
                document.getElementById('D5_1').value = this.value;
                document.getElementById('G5_1').value = this.value;
            });
            document.getElementById('B1_2').addEventListener('input', function() {
                document.getElementById('D5_2').value = this.value;
                document.getElementById('G5_2').value = this.value;
            });
            document.getElementById('B2_1').addEventListener('input', function() {
                var B2_1_era = this.value;
                switch (B2_1_era) {
                    case '1' :
                        document.getElementById('D6_1').value = '明治';
                        document.getElementById('G6_1').value = '明治';
                        break;
                    case '3' :
                        document.getElementById('D6_1').value = '大正';
                        document.getElementById('G6_1').value = '大正';
                        break;
                    case '5' :
                        document.getElementById('D6_1').value = '昭和';
                        document.getElementById('G6_1').value = '昭和';
                        break;
                    case '7' :
                        document.getElementById('D6_1').value = '平成';
                        document.getElementById('G6_1').value = '平成';
                        break;
                    case '9' :
                        document.getElementById('D6_1').value = '令和';
                        document.getElementById('G6_1').value = '令和';
                        break;
                }
            });
            document.getElementById('B2_2').addEventListener('input', function() {
                const inputValue = this.value;
                const halfWidthValue = toHalfWidth(inputValue);
                document.getElementById('D6_2').value = halfWidthValue;
                document.getElementById('G6_2').value = halfWidthValue;
            });
            document.getElementById('B2_3').addEventListener('input', function() {
                const inputValue = this.value;
                const halfWidthValue = toHalfWidth(inputValue);
                document.getElementById('D6_3').value = halfWidthValue;
                document.getElementById('G6_3').value = halfWidthValue;
            });
            document.getElementById('B2_4').addEventListener('input', function() {
                const inputValue = this.value;
                const halfWidthValue = toHalfWidth(inputValue);
                document.getElementById('D6_4').value = halfWidthValue;
                document.getElementById('G6_4').value = halfWidthValue;
            });

            document.getElementById('A2_1').addEventListener('input', function() {
                const inputValue = this.value;
                const halfWidthValue = toHalfWidth(inputValue);
                document.getElementById('E1_1').value = halfWidthValue;
                document.getElementById('G8_1').value = halfWidthValue;
            });
            document.getElementById('A2_2').addEventListener('input', function() {
                const inputValue = this.value;
                const halfWidthValue = toHalfWidth(inputValue);
                document.getElementById('E1_2').value = halfWidthValue;
                document.getElementById('G8_2').value = halfWidthValue;
            });
            document.getElementById('A3_1').addEventListener('input', function() {
                document.getElementById('E2_1').value = this.value;
                document.getElementById('G9_1').value = this.value;
            });
            document.getElementById('A3_2').addEventListener('input', function() {
                document.getElementById('E2_2').value = this.value;
                document.getElementById('G9_2').value = this.value;
            });
            document.getElementById('A3_3').addEventListener('input', function() {
                document.getElementById('E2_3').value = this.value;
                document.getElementById('G9_3').value = this.value;
            });
            document.getElementById('A4_1').addEventListener('input', function() {
                const inputValue = this.value;
                const halfWidthValue = toHalfWidth(inputValue);
                document.getElementById('E3_1').value = halfWidthValue;
                document.getElementById('G10_1').value = halfWidthValue;
            });
            document.getElementById('A4_2').addEventListener('input', function() {
                const inputValue = this.value;
                const halfWidthValue = toHalfWidth(inputValue);
                document.getElementById('E3_2').value = halfWidthValue;
                document.getElementById('G10_2').value = halfWidthValue;
            });
            document.getElementById('A4_3').addEventListener('input', function() {
                const inputValue = this.value;
                const halfWidthValue = toHalfWidth(inputValue);
                document.getElementById('E3_3').value = halfWidthValue;
                document.getElementById('G10_3').value = halfWidthValue;
            });

            document.getElementById('A1_1').addEventListener('input', function() {
                document.getElementById('F1_1').value = this.value;
                document.getElementById('G11_1').value = this.value;
            });
            document.getElementById('A1_2').addEventListener('input', function() {
                document.getElementById('F1_2').value = this.value;
                document.getElementById('G11_2').value = this.value;
            });
            document.getElementById('A1_3').addEventListener('input', function() {
                document.getElementById('F1_3').value = this.value;
                document.getElementById('G11_3').value = this.value;
            });

            document.getElementById('A6_1').addEventListener('input', function() {
                document.getElementById('F2').value = this.value;
                document.getElementById('G12').value = this.value;
            });

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

