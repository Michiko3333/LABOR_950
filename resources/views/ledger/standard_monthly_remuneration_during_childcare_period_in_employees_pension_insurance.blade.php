<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
        <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">
        <style type="text/css"></style>
        @endslot
        <section class="content">
            @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

            <style type="text/css"></style>
            @endslot
            <h1>{{ $procedureName }}</h1>
            <p>申請・届出に関する事項を入力してください。</p>
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
                                    'certificate_of_family_register' => '戸籍謄(抄)本または戸籍記載事項証明書',
                                    'certificate_of_residence' => '住民票',
                                    'other' => 'その他の添付書類' 
                                    ]" 
                                    :extensions="'.doc,.docx,.jpg,.jpeg,.pdf,.xls,.xlsx'" 
                                    :separateDisabled="true"/>
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
                                    <x-form.standard_monthly_remuneration_during_childcare_period_in_employees_pension_insurance :dataUri="$dataUri"/>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="query_parameter" id="queryParameter">
                    </div>
                    <div class="prevew-btn">
                        <a id="ledger-back" class="ui button negative basic" type="button" style="width: 200px;" href="{{ route('ledger.index') }}">戻る</a>
                        <button id="ledger-preview-btn" class="ui button primary" type="button" style="width: 200px;">確認</button>
                    </div>
                </form>
            </div>
            <div id="ledger-step2" class="step-view my-2">
                <h2 style="text-align: center;">プレビュー</h2>
                <div class="preview-area">
                    <div class="ui card card-shadow ledger-card">
                        <div class="content" preview-component>
                            <x-form.standard_monthly_remuneration_during_childcare_period_in_employees_pension_insurance :dataUri="$dataUri"/>
                        </div>
                    </div>
                </div>
                <div class="submit-btn py-2">
                    <button id="ledger-edit-btn" class="ui button" type="button" style="width: 200px;">修正</button>
                    <button id="ledger-submit-btn" class="ui button yellow" type="button" style="width: 200px;">申請</button>
                </div>
            </div>
            <script type="module">
                $(document).ready(() => {
                    const today = @json($today);
                    const submissionYear = document.getElementById('submission_year');
                    const submissionMonth = document.getElementById('submission_month');
                    const submissionDay = document.getElementById('submission_day');

                    submissionYear.value = "{{ old('submission_year', '') }}" || today.year;
                    submissionMonth.value = "{{ old('submission_month', '') }}" || today.month;
                    submissionDay.value = "{{ old('submission_day', '') }}" || today.day;

                    submissionYear.readonly = true;
                    submissionMonth.readonly = true;
                    submissionDay.readonly = true; 
                    submissionYear.style.cursor = 'not-allowed';
                    submissionMonth.style.cursor = 'not-allowed';
                    submissionDay.style.cursor = 'not-allowed';
                    submissionYear.style.pointerEvents = 'none';
                    submissionMonth.style.pointerEvents = 'none';
                    submissionDay.style.pointerEvents = 'none';
                    submissionYear.style.backgroundColor = '#ffffff';
                    submissionMonth.style.backgroundColor = '#ffffff';
                    submissionDay.style.backgroundColor = '#ffffff';

                    $('textarea').each((index, element) => {
                        const text = $(element).val();
                        const trimmedText = text.trim();
                        $(element).val(trimmedText);
                        $(element).on('focus', () => {
                            element.setSelectionRange(0, 0);
                        });
                    });

                    $('#str_representative_name').val(
                        '{{ old('employer_company_managerial_position_name ') }}' ? '{{ old('employer_company_managerial_position_name ') }}' : '{{ $company->representative }}');
                    @if($current_employee->role_id === 500)
                    $('#labor_and_social_security_attorney_name').prop('disabled', false).css('background-color', '#ddeeff');
                    @else
                    $('#labor_and_social_security_attorney_name').prop('disabled', true).css('background-color', '#ffffff');
                    @endif
                });

                function insertDataFromEmployee(data) {
                    const employee = data['employee'];
                    const branch = data['branch'];
                    const company = data['company'];
                    const branch_prefecture_data = data['branch_prefecture_data'];
                    const birthdayConvertJapan = data['birthday_convert_japan'];
                    const employmentInsuredConvertDate = data['employment_insured_convert_date'];
                    const employmentRetirementConvertDate = data['employment_retirement_convert_date'];
                    const headquarters = data['headquarters'];
                    const employee_prefecture_data = data['employee_prefecture_data'];
                    const headquarters_prefecture_data = data['headquarters_prefecture_data'];
                    const insured_age_type_data = data['insured_age_type_data'];
                    const pensionOffice = data['pensionOffice'];
                    const employeeName = (employee.last_name ? employee.last_name + '　' : "") + (employee.first_name ?? "");
                    const employeeNameKana = (employee.last_name_kana ? employee.last_name_kana + '　' : "") + (employee.first_name_kana ?? "");
                    const headquartersAddress = (branch_prefecture_data.name ?? "") + (branch.address_city ?? "") + (branch.address_ward ?? "") + (branch.address_apartment ?? "");
                    const employeeAddress = (employee_prefecture_data.name ?? "") + (employee.address_city ?? "") + (employee.address_ward ?? "") + (employee.address_apartment ?? "");

                    $('#office_reference_code_prefecture').val(branch.pension_office_reference_prefecture);
                    $('#office_reference_code_city').val(branch.pension_office_reference_no_cities);
                    $('#office_reference_code_office').val(branch.pension_office_reference_no_office);
                    $('#pension_office_number').val(branch.pension_office_no);
                    if (branch.post_code != null) {
                        $('#postcode_office_parent').val(branch.post_code.substring(0, 3));
                        $('#postcode_office_child').val(branch.post_code.substring(3, 7));
                    }
                    $('#str_company_address').val((branch_prefecture_data.name ?? '') + (branch.address_city ?? '') + (branch.address_ward ?? '') + (branch.address_apartment ?? ''));
                    $('#str_company_name').val(company.name ?? '');
                    $('#tel_area_code').val(branch.tel_area_code ?? "");
                    $('#tel_city_code').val(branch.tel_city_code ?? "");
                    $('#tel_subscriber_code').val(branch.tel_subscriber_code ?? "");
                    $('#insurer_reference_num').val(employee.insurer_reference_no ?? '');
                    if (employee.mynumber_card_no != null) {
                        $('#emp_mynumber_or_pension_num').val(employee.mynumber_card_no);
                    } else {
                        $('#emp_mynumber_or_pension_num').val(employee.pension_no);
                    }
                    $('#employee_name_kana').val(employeeNameKana);
                    $('#employee_name_kanji').val(employeeName);
                    if (birthdayConvertJapan['era'] === '昭和') {
                        $('#employee_birth_era').val('5').prop("selected", true);
                    } else if (birthdayConvertJapan['era'] === '平成') {
                        $('#employee_birth_era').val('7').prop("selected", true);
                    } else {
                        $('#employee_birth_era').val('9').prop("selected", true);
                    };
                    $('#employee_birth_year').val(birthdayConvertJapan['year']);
                    $('#employee_birth_month').val(birthdayConvertJapan['month']);
                    $('#employee_birth_day').val(birthdayConvertJapan['day']);
                    if (employee.sex == 1) {
                        $('#employee_sex_man').prop("checked", true);
                    } else {
                        $('#employee_sex_woman').prop("checked", true);
                    }

                    const prefectureSelect = document.querySelector('select[name="selected_prefecture"]');
                    const helloWorkSelect = document.querySelector('select[name="selected_pension_office"]');

                    if(pensionOffice){
                        prefectureSelect.addEventListener('change', function () {
                        setTimeout(()=>{
                                helloWorkSelect.value = pensionOffice.id;
                            },500);
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

                Livewire.on('onSelectEmployee', ({
                    data
                }) => {
                    insertDataFromEmployee(data);
                });
            </script>

            <script>
                document.addEventListener('DOMContentLoaded', () => {

                    const branchConfirmYes = document.getElementById('branch_confirm_0');
                    const branchConfirmNo = document.getElementById('branch_confirm_1');
                    const textAreas = [
                        document.getElementById('branch_postcode_parent'),
                        document.getElementById('branch_postcode_child'),
                        document.getElementById('branch_address'),
                        document.getElementById('branch_name')
                    ];

                    const updateTextAreas = () => {
                        if (branchConfirmYes.checked) {
                            textAreas.forEach(area => {
                                area.value = "";
                                area.disabled = true;
                                area.style.backgroundColor = '#ffffff';
                            });
                        } else if (branchConfirmNo.checked) {
                            textAreas.forEach(area => {
                                area.disabled = false;
                                area.style.backgroundColor = '#ddeeff';
                            });
                        }
                    };
                    updateTextAreas();

                    branchConfirmYes.addEventListener('change', updateTextAreas);
                    branchConfirmNo.addEventListener('change', updateTextAreas);
                });
            </script>

            @slot('footer')
            <script src="{{ asset('/js/ledger-form.js') }}" type="module"></script>
            @endslot
        </section>
</x-layout>
