<!-- 4950013521029000 -->
<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

            <style type="text/css"></style>
        @endslot
        <h1>{{ $procedureName }}</h1>
        <p>申請・届出に関する事項を入力してください。
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
                                <h2>添付ファイル</h2>
                                <x-ledger-attachment :file_original_names="['other' => 'その他の添付書類']"
                                                    :extensions="'.jpg,.pdf'" :separateDisabled="true"/>
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
                                <x-form.childcare_leave_application_or_extension_end_notice :dataUri="$dataUri"/>
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
                        <x-form.childcare_leave_application_or_extension_end_notice :dataUri="$dataUri" />
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
                function toHalfWidth(str) {
                    return str.replace(/[０-９]/g, function (match) {
                        const halfWidthChar = String.fromCharCode(match.charCodeAt(0) - 65248);
                        return halfWidthChar;
                    });
                }
                checkDateAndEnableFields();
                $('#submission_year').val('{{ old('today_japan_era_year', $todaySet['year']) }}');
                $('#submission_month').val('{{ old('today_japan_era_month', $todaySet['month']) }}');
                $('#submission_day').val('{{ old('today_japan_era_day', $todaySet['date']) }}');

                @if (isset($businessOwner))
                    $('#employer_company_managerial_position_name').val(
                        '{{ old('employer_company_managerial_position_name', ($businessOwner->last_name ? $businessOwner->last_name . '　' : '') . ($businessOwner->first_name ?? '')) }}'
                    );
                @endif

                @if ($current_employee->role_id === 500)
                    $('#labor_consultant_name').val('{{ $current_employee->last_name }}' + '　' + '{{ $current_employee->first_name }}');
                    $('#labor_and_social_security_attorney_registration_no').val('{{ $current_employee->labor_and_social_security_attorney_registration_no }}');
                @else
                    $('#labor_consultant_name').prop('disabled', true).css('background-color', '#ffffff');
                @endif

                function convertToGregorian(year) {
                    const gengouStartYear = 2019;
                    return gengouStartYear + year - 1;
                }

                function checkDateAndEnableFields() {
                    let startYear13 = parseInt(toHalfWidth(document.getElementById('childcare_start_date_japane_era_year').value));
                    let startMonth13 = parseInt(toHalfWidth(document.getElementById('childcare_start_date_month').value));
                    let startDay13 = parseInt(toHalfWidth(document.getElementById('childcare_start_date_day').value));
                    let endYear14 = parseInt(toHalfWidth(document.getElementById('childcare_end_date_japane_era_year').value));
                    let endMonth14 = parseInt(toHalfWidth(document.getElementById('childcare_end_date_month').value));
                    let endDay14 = parseInt(toHalfWidth(document.getElementById('childcare_end_date_day').value));
                    let endYear19 = parseInt(toHalfWidth(document.getElementById('childcare_extension_scheduled_end_date_japane_era_year').value));
                    let endMonth19 = parseInt(toHalfWidth(document.getElementById('childcare_extension_scheduled_end_date_month').value));
                    let endDay19 = parseInt(toHalfWidth(document.getElementById('childcare_extension_scheduled_end_date_day').value));
                    let endYear21 = parseInt(toHalfWidth(document.getElementById('childcare_extension_end_date_japane_era_year').value));
                    let endMonth21 = parseInt(toHalfWidth(document.getElementById('childcare_extension_end_date_month').value));
                    let endDay21 = parseInt(toHalfWidth(document.getElementById('childcare_extension_end_date_day').value));
                    let startYear23 = parseInt(toHalfWidth(document.getElementById('childcare_start_date_japane_era_year1').value));
                    let startMonth23 = parseInt(toHalfWidth(document.getElementById('childcare_start_date_month1').value));
                    let startDay23 = parseInt(toHalfWidth(document.getElementById('childcare_start_date_day1').value));
                    let endYear24 = parseInt(toHalfWidth(document.getElementById('childcare_end_date_japane_era_year1').value));
                    let endMonth24 = parseInt(toHalfWidth(document.getElementById('childcare_end_date_month1').value));
                    let endDay24 = parseInt(toHalfWidth(document.getElementById('childcare_end_date_day1').value));
                    let startYear27 = parseInt(toHalfWidth(document.getElementById('childcare_start_date_japane_era_year2').value));
                    let startMonth27 = parseInt(toHalfWidth(document.getElementById('childcare_start_date_month2').value));
                    let startDay27 = parseInt(toHalfWidth(document.getElementById('childcare_start_date_day2').value));
                    let endYear28 = parseInt(toHalfWidth(document.getElementById('childcare_end_date_japane_era_year2').value));
                    let endMonth28 = parseInt(toHalfWidth(document.getElementById('childcare_end_date_month2').value));
                    let endDay28 = parseInt(toHalfWidth(document.getElementById('childcare_end_date_day2').value));
                    let startYear31 = parseInt(toHalfWidth(document.getElementById('childcare_start_date_japane_era_year3').value));
                    let startMonth31 = parseInt(toHalfWidth(document.getElementById('childcare_start_date_month3').value));
                    let startDay31 = parseInt(toHalfWidth(document.getElementById('childcare_start_date_day3').value));
                    let endYear32 = parseInt(toHalfWidth(document.getElementById('childcare_end_date_japane_era_year3').value));
                    let endMonth32 = parseInt(toHalfWidth(document.getElementById('childcare_end_date_month3').value));
                    let endDay32 = parseInt(toHalfWidth(document.getElementById('childcare_end_date_day3').value));
                    let startYear35 = parseInt(toHalfWidth(document.getElementById('childcare_start_date_japane_era_year4').value));
                    let startMonth35 = parseInt(toHalfWidth(document.getElementById('childcare_start_date_month4').value));
                    let startDay35 = parseInt(toHalfWidth(document.getElementById('childcare_start_date_day4').value));
                    let endYear36 = parseInt(toHalfWidth(document.getElementById('childcare_end_date_japane_era_year4').value));
                    let endMonth36 = parseInt(toHalfWidth(document.getElementById('childcare_end_date_month4').value));
                    let endDay36 = parseInt(toHalfWidth(document.getElementById('childcare_end_date_day4').value));
                    console.log(endDay14);
                    let yearStartGregorian13 = convertToGregorian(startYear13);
                    let yearEndGregorian14 = convertToGregorian(endYear14);
                    let yearEndGregorian19 = convertToGregorian(endYear19);
                    let yearEndGregorian21 = convertToGregorian(endYear21);
                    let yearStartGregorian23 = convertToGregorian(startYear23);
                    let yearStartGregorian27 = convertToGregorian(startYear27);
                    let yearStartGregorian31 = convertToGregorian(startYear31);
                    let yearStartGregorian35 = convertToGregorian(startYear35);
                    let yearEndGregorian24 = convertToGregorian(endYear24);
                    let yearEndGregorian28 = convertToGregorian(endYear28);
                    let yearEndGregorian32 = convertToGregorian(endYear32);
                    let yearEndGregorian36 = convertToGregorian(endYear36);

                    let currentDate13 = new Date(yearStartGregorian13, startMonth13 - 1, startDay13);
                    let currentYear13 = currentDate13.getFullYear();
                    let currentMonth13 = currentDate13.getMonth() + 1;
                    let currentDate23 = new Date(yearStartGregorian23, startMonth23 - 1, startDay23);
                    let currentYear23 = currentDate23.getFullYear();
                    let currentMonth23 = currentDate23.getMonth() + 1;
                    let currentDate27 = new Date(yearStartGregorian27, startMonth27 - 1, startDay27);
                    let currentYear27 = currentDate27.getFullYear();
                    let currentMonth27 = currentDate27.getMonth() + 1;
                    let currentDate31 = new Date(yearStartGregorian31, startMonth31 - 1, startDay31);
                    let currentYear31 = currentDate31.getFullYear();
                    let currentMonth31 = currentDate31.getMonth() + 1;
                    let currentDate35 = new Date(yearStartGregorian35, startMonth35 - 1, startDay35);
                    let currentYear35 = currentDate35.getFullYear();
                    let currentMonth35 = currentDate35.getMonth() + 1;

                    let nextDate14 = new Date(yearEndGregorian14, endMonth14 - 1, endDay14);
                    let nextDate19 = new Date(yearEndGregorian19, endMonth19 - 1, endDay19);
                    let nextDate21 = new Date(yearEndGregorian21, endMonth21 - 1, endDay21);
                    let nextDate24 = new Date(yearEndGregorian24, endMonth24 - 1, endDay24);
                    let nextDate28 = new Date(yearEndGregorian28, endMonth28 - 1, endDay28);
                    let nextDate32 = new Date(yearEndGregorian32, endMonth32 - 1, endDay32);
                    let nextDate36 = new Date(yearEndGregorian36, endMonth36 - 1, endDay36);

                    let timeDifference15 = nextDate14 - currentDate13;
                    let dayDifference15 = timeDifference15 / (1000 * 60 * 60 * 24);

                    let timeDifference20 = nextDate19 - currentDate13;
                    let dayDifference20 = timeDifference20 / (1000 * 60 * 60 * 24);

                    let timeDifference22 = nextDate21 - currentDate13;
                    let dayDifference22 = timeDifference22 / (1000 * 60 * 60 * 24);

                    let timeDifference25 = nextDate24 - currentDate23;
                    let dayDifference25 = timeDifference25 / (1000 * 60 * 60 * 24);

                    let timeDifference29 = nextDate28 - currentDate27;
                    let dayDifference29 = timeDifference29 / (1000 * 60 * 60 * 24);

                    let timeDifference33 = nextDate32 - currentDate31;
                    let dayDifference33 = timeDifference33 / (1000 * 60 * 60 * 24);

                    let timeDifference37 = nextDate36 - currentDate35;
                    let dayDifference37 = timeDifference37 / (1000 * 60 * 60 * 24);

                    let nextDayDate14 = new Date(nextDate14);
                    nextDayDate14.setDate(nextDate14.getDate() + 1);
                    let nextDayYear14 = nextDayDate14.getFullYear();
                    let nextDayMonth14 = nextDayDate14.getMonth() + 1;

                    let nextDayDate19 = new Date(nextDate19);
                    nextDayDate19.setDate(nextDate19.getDate() + 1);
                    let nextDayYear19 = nextDayDate19.getFullYear();
                    let nextDayMonth19 = nextDayDate19.getMonth() + 1;

                    let nextDayDate21 = new Date(nextDate21);
                    nextDayDate21.setDate(nextDate21.getDate() + 1);
                    let nextDayYear21 = nextDayDate21.getFullYear();
                    let nextDayMonth21 = nextDayDate21.getMonth() + 1;

                    let nextDayDate24 = new Date(nextDate24);
                    nextDayDate24.setDate(nextDate24.getDate() + 1);
                    let nextDayYear24 = nextDayDate24.getFullYear();
                    let nextDayMonth24 = nextDayDate24.getMonth() + 1;

                    let nextDayDate28 = new Date(nextDate28);
                    nextDayDate28.setDate(nextDate28.getDate() + 1);
                    let nextDayYear28 = nextDayDate28.getFullYear();
                    let nextDayMonth28 = nextDayDate28.getMonth() + 1;

                    let nextDayDate32 = new Date(nextDate32);
                    nextDayDate32.setDate(nextDate32.getDate() + 1);
                    let nextDayYear32 = nextDayDate32.getFullYear();
                    let nextDayMonth32 = nextDayDate32.getMonth() + 1;

                    let nextDayDate36 = new Date(nextDate36);
                    nextDayDate36.setDate(nextDate36.getDate() + 1);
                    let nextDayYear36 = nextDayDate36.getFullYear();
                    let nextDayMonth36 = nextDayDate36.getMonth() + 1;

                    if (currentYear13 === nextDayYear14 && currentMonth13 === nextDayMonth14 && Number(startDay13) < Number(endDay14)) {
                        $('#parental_leave_count').val(dayDifference15).prop('readOnly', false).css('background-color', '#ddeeff');
                        if ($('#workday_count').val() === '') {
                            $('#workday_count').val('{{ old('workday_count') }}').prop('readOnly', false).css('background-color', '#ddeeff');
                        } else {
                            $('#workday_count').prop('readOnly', false).css('background-color', '#ddeeff');
                        }
                    } else {
                        $('#parental_leave_count').val('').prop('readOnly', true).css('background-color', '#ffffff');
                        $('#workday_count').val('').prop('readOnly', true).css('background-color', '#ffffff');
                    }

                    if (currentYear13 === nextDayYear19 && currentMonth13 === nextDayMonth19 && Number(startDay13) < Number(endDay19)) {
                        $('#after_parental_leave_count_20').val(dayDifference20).prop('readOnly', false).css('background-color', '#ddeeff');
                    } else {
                        $('#after_parental_leave_count_20').val('').prop('readOnly', true).css('background-color', '#ffffff');
                    }

                    if (currentYear13 === nextDayYear21 && currentMonth13 === nextDayMonth21 && Number(startDay13) < Number(endDay21)) {
                        $('#after_parental_leave_count_22').val(dayDifference22).prop('readOnly', false).css('background-color', '#ddeeff');
                    } else {
                        $('#after_parental_leave_count_22').val('').prop('readOnly', true).css('background-color', '#ffffff');
                    }

                    if (currentYear23 === nextDayYear24 && currentMonth23 === nextDayMonth24 && Number(startDay23) < Number(endDay24)) {
                        $('#parental_leave_count1').val(dayDifference25).prop('readOnly', false).css('background-color', '#ddeeff');
                        if ($('#workday_count1').val() === '') {
                            $('#workday_count1').val('{{ old('workday_count1') }}').prop('readOnly', false).css('background-color', '#ddeeff');
                        } else {
                            $('#workday_count1').prop('readOnly', false).css('background-color', '#ddeeff');
                        }
                    } else {
                        $('#parental_leave_count1').val('').prop('readOnly', true).css('background-color', '#ffffff');
                        $('#workday_count1').val('').prop('readOnly', true).css('background-color', '#ffffff');
                    }

                    if (currentYear27 === nextDayYear28 && currentMonth27 === nextDayMonth28 && Number(startDay27) < Number(endDay28)) {
                        $('#parental_leave_count2').val(dayDifference29).prop('readOnly', false).css('background-color', '#ddeeff');
                        if ($('#workday_count2').val() === '') {
                            $('#workday_count2').val('{{ old('workday_count2') }}').prop('readOnly', false).css('background-color', '#ddeeff');
                        } else {
                            $('#workday_count2').prop('readOnly', false).css('background-color', '#ddeeff');
                        }
                    } else {
                        $('#parental_leave_count2').val('').prop('readOnly', true).css('background-color', '#ffffff');
                        $('#workday_count2').val('').prop('readOnly', true).css('background-color', '#ffffff');
                    }

                    if (currentYear31 === nextDayYear32 && currentMonth31 === nextDayMonth32  && Number(startDay31) < Number(endDay32)) {
                        $('#parental_leave_count3').val(dayDifference33).prop('readOnly', false).css('background-color', '#ddeeff');
                    } else {
                        $('#parental_leave_count3').val('').prop('readOnly', true).css('background-color', '#ffffff');
                    }

                    if (currentYear35 === nextDayYear36 && currentMonth35 === nextDayMonth36  && Number(startDay35) < Number(endDay36)) {
                        $('#parental_leave_count4').val(dayDifference37).prop('readOnly', false).css('background-color', '#ddeeff');
                    } else {
                        $('#parental_leave_count4').val('').prop('readOnly', true).css('background-color', '#ffffff');
                    }
                }

                $('#childcare_start_date_japane_era_year, #childcare_start_date_month, #childcare_start_date_day,#childcare_end_date_japane_era_year, #childcare_end_date_month, #childcare_end_date_day,#childcare_extension_scheduled_end_date_japane_era_year, #childcare_extension_scheduled_end_date_month, #childcare_extension_scheduled_end_date_day,#childcare_extension_end_date_japane_era_year, #childcare_extension_end_date_month, #childcare_extension_end_date_day,#childcare_start_date_japane_era_year1, #childcare_start_date_month1, #childcare_start_date_day1,#childcare_end_date_japane_era_year1, #childcare_end_date_month1, #childcare_end_date_day1,#childcare_start_date_japane_era_year2, #childcare_start_date_month2, #childcare_start_date_day2,#childcare_end_date_japane_era_year2, #childcare_end_date_month2, #childcare_end_date_day2,#childcare_start_date_japane_era_year3, #childcare_start_date_month3, #childcare_start_date_day3,#childcare_end_date_japane_era_year3, #childcare_end_date_month3, #childcare_end_date_day3,#childcare_start_date_japane_era_year4, #childcare_start_date_month4, #childcare_start_date_day4,#childcare_end_date_japane_era_year4, #childcare_end_date_month4, #childcare_end_date_day4').on('input',function() {
                    checkDateAndEnableFields();
                });

                $('#classification.field_other').change(function() {
                    var selectedOption = $(this).val();
                    if (selectedOption === '2') {
                        $('#child_raising_start_dete_year').val('').prop('readOnly', false).css('background-color', '#ddeeff');
                        $('#child_raising_start_dete_month').val('').prop('readOnly', false).css('background-color', '#ddeeff');
                        $('#child_raising_start_dete_day').val('').prop('readOnly', false).css('background-color', '#ddeeff');
                    } else {
                        $('#child_raising_start_dete_year').val('').prop('readOnly', true).css('background-color', '#ffffff');
                        $('#child_raising_start_dete_month').val('').prop('readOnly', true).css('background-color', '#ffffff');
                        $('#child_raising_start_dete_day').val('').prop('readOnly', true).css('background-color', '#ffffff');
                    }
                });
            });
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
                const employee = data['employee'];
                const branch = data['branch'];
                const company = data['company'];
                const headquarters = data['headquarters'];
                const birthdayConvertJapan = data['birthday_convert_japan'];
                const branch_prefecture_data = data['branch_prefecture_data'];
                const pensionOffice = data['pensionOffice'];
                var eraMapping = {
                    '明治': '1',
                    '大正': '3',
                    '昭和': '5',
                    '平成': '7',
                    '令和': '9',
                };
                var birthdayEraValue = birthdayConvertJapan['era'] ?? "";
                var birthdayEra = eraMapping[birthdayEraValue] ?? "";
                $('#business_establishment_code_prefecture_code').val(branch.pension_office_reference_prefecture || '');
                $('#office_arrangement_code_county_city_ward_code').val(branch.pension_office_reference_no_cities || '');
                $('#office_reference_symbol_office_symbol').val(branch.pension_office_reference_no_office || '');
                $('#csv_pension_office_no').val(branch.pension_office_no || '');

                if (branch.post_code !== null && branch.post_code.length == 7) {
                    $('#post_code_former').val(branch.post_code.substring(0, 3));
                    $('#post_code_latter').val(branch.post_code.substring(3, 7));
                }
                const branchAddress = (branch_prefecture_data.name || "") + (branch.address_city || "") + (
                    branch.address_ward || "") + (branch.address_apartment || "");
                $('#branch_address').val(branchAddress);
                $('#branch_office_name').val(company.name || '');
                $('#branch_tel_area_code').val(branch.tel_area_code || '');
                $('#branch_tel_city_code').val(branch.tel_city_code || '');
                $('#branch_tel_subscriber_code').val(branch.tel_subscriber_code || '');
                const employeeNameKana = (employee.last_name_kana ? employee.last_name_kana + '　' : "") + (employee.first_name_kana || "");
                const employeeName = (employee.last_name ? employee.last_name + '　' : "") + (employee.first_name || "");
                $('#insured_person_reference_number').val(employee.insurer_reference_no || '');
                $('#mynumber_card_no').val(employee.mynumber_card_no || '');
                $('#basic_pension_number').val(employee.pension_no || '');
                $('#fullname_kana').val(employeeNameKana);
                $('#fullname').val(employeeName);
                $('#year_of_birth_era').val(birthdayEra);
                $('#year_of_birth').val(birthdayConvertJapan['year'] ?? "");
                $('#month_of_birth').val(birthdayConvertJapan['month'] ?? "");
                $('#date_of_birth').val(birthdayConvertJapan['day'] ?? "");

                if (employee.sex == '1') {
                    $('#sex_male').prop('checked', true);
                } else if (employee.sex == '2') {
                    $('#sex_female').prop('checked', true);
                }

                const startDateSet = data['start_date_of_closed_4950013521029000'];
                const endDateSet = data['end_date_of_losed_4950013521029000'];

                if (startDateSet) {
                    $('#childcare_start_date_japane_era_year').val(startDateSet['year']);
                    $('#childcare_start_date_month').val(startDateSet['month']);
                    $('#childcare_start_date_day').val(startDateSet['day']);
                    $('#childcare_start_date_japane_era_year').trigger('input');
                    $('#childcare_start_date_month').trigger('input');
                    $('#childcare_start_date_day').trigger('input');
                }

                if (endDateSet) {
                    $('#childcare_end_date_japane_era_year').val(endDateSet['year']);
                    $('#childcare_end_date_month').val(endDateSet['month']);
                    $('#childcare_end_date_day').val(endDateSet['day']);
                    $('#childcare_end_date_japane_era_year').trigger('input');
                    $('#childcare_end_date_month').trigger('input');
                    $('#childcare_end_date_day').trigger('input');
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
            Livewire.on('onSelectEmployee', ({data}) => {insertDataFromEmployee(data)});
        </script>
        @slot('footer')
            <script src="{{ asset('/js/ledger-form.js') }}" type="module"></script>
        @endslot
    </section>
</x-layout>
