<!-- 4950013520990000 -->
<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

            <style type="text/css"></style>
        @endslot
        <h1>{{ $procedureName }}</h1>
        <p>
            申請・届出に関する事項を入力してください。
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
                        <div class="ui card card-shadow mb-1">
                            <div class="content">
                                <div style="display: flex; justify-content: space-between;">
                                    <h2>70歳以上</h2>
                                    <div class="field four wide" style="margin-top: 5px;">
                                        <div class="ui toggle checkbox">
                                            <input id="over_70_check" type="checkbox" name="over_70_check"
                                                {{ old('over_70_check') ? 'checked' : '' }}>
                                            <label></label>
                                        </div>
                                    </div>
                                </div>
                                <p style="font-size: 12px; font-weight: 700;">70歳以上の方は下記のいずれかが必須です</p>
                                <div id="over_70" style="display: flex;">
                                    <div class="ui input"
                                        style="display: flex; flex-direction: column; width: 49%; margin-right: 2%;">
                                        <label style="font-size: 11.2px;">個人番号</label>
                                        <input id="personal_number" maxlength="12" type="text" placeholder=""
                                            name="mynumber_no_or_pension_no"
                                            value="{{ old('mynumber_no_or_pension_no') }}" value="" autocomplete="off">
                                    </div>
                                    <div class="ui input" style="display: flex; flex-direction: column; width: 49%;">
                                        <label style="font-size: 11.2px;">基礎年金番号</label>
                                        <input id="basic_pension_number" maxlength="10" type="text" placeholder=""
                                            name="basic_pension_number" value="{{ old('basic_pension_number') }}"
                                            value="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>添付ファイル</h2>
                                <x-ledger-attachment :file_original_names="[
                                    'wage_ledger' => '（様式1）年間報酬の平均で算定することの申立書（随時改定用）',
                                    'attendance_record' =>
                                        '（様式2）健康保険厚生年金保険被保険者報酬月額変更届・保険者算定申立に係る例年の状況、標準報酬月額の比較及び被保険者の同意書（随時改定用）',
                                    'other' => 'その他の添付書類',
                                ]" :extensions="'.csv,.jpg,.jpeg,.pdf'" :separateDisabled="true" />
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
                                <x-form.health_insurance_employee_pension_insurance_monthly_remuneration_change_notification
                                    :dataUri="$dataUri" />
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
                        <x-form.health_insurance_employee_pension_insurance_monthly_remuneration_change_notification
                            :dataUri="$dataUri" />
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
                document.getElementById("N7_005F_944E_8D86").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N8_005F_944E").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N9_005F_8C8E0").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N10_005F_93FA").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N11_005F_94ED_95DB_8CAF_8ED2_8E81").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N16_005F_905C_90BF").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N17_005F_985A_8F5C_8DCE_82C9").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N18_005F_8CC2_906C_94D4").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N20_005F_94ED_95DB_8CAF_8ED2_94D4_8D866").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N25_005F_8E96_8BC6_8F8A").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N26_005F_8E96_8BC6_8F8A_94D4").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N28_8D864_8C85").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N30_93E0_8BC7_94D4").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N31__005F_89C1_93FC").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N33_005F_8E73_8A4F").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N34_93E0_8BC7_94D4").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N35_94D4_8D86").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N36_005F_8E96_8BC6_8F8A").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N37_96BC_005F_8F8A_8DDD_926E").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N39_005F_905C_90BF").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N40_905C_90BF_8ED2").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N41_005F_96BC_8FCC").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N42_005F_8F8A_8DDD_926E").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N43_947A_9242_8BC7_94D4").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N44_005F_92AC_88E6").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N45__005F_8E73_8A4F_8BC7_94D4").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N46__005F_8E73_93E0_8BC7_94D4").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N47_005F_89C1_93FC_8ED2_94D4_8D86").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N48_005F_8E73_8A4F_8BC7").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N49_005F_8E73_8A4F_8BC8").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N50_005F_8E73_8A4F_8BC9").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N51_005F_8E73_8A4F_8BC7").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("N52_005F_8E73_8A4F").addEventListener("input", function () {
                    this.value = toHalfWidth(this.value);
                });

                $('#N4_005F_944E').val('{{ old('today_year', $todaySet['year']) }}');
                $('#N5_005F_8C8E').val('{{ old('today_month', $todaySet['month']) }}');
                $('#N6_005F_93FA').val('{{ old('today_date', $todaySet['date']) }}');

                @if (isset($businessOwner))
                    $('#N15_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(
                        '{{ old('employer_company_managerial_position_name', ($businessOwner->last_name ? $businessOwner->last_name . '　' : '') . ($businessOwner->first_name ?? '')) }}'
                    );
                @endif

                @if ($current_employee->role_id === 500)
                    $('#N19_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val('{{ $current_employee->last_name }}' +
                        '{{ $current_employee->first_name }}');
                    $('#N19_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C851').val(
                        '{{ $current_employee->labor_and_social_security_attorney_registration_no }}');
                @else
                    $('#N19_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').prop('disabled', true);
                @endif

                checkOver70();
                $('#over_70_check').change(function() {
                    checkOver70();
                });
                $('#N60_005F_8E73_8A4F_8BC7_9432').change(function() {
                    checkOver70_2();
                });

                function checkOver70() {
                    if ($('#over_70_check').prop('checked')) {
                        $('#personal_number, #basic_pension_number').prop('disabled', false);
                    } else {
                        $('#personal_number, #basic_pension_number').prop('disabled', true);
                        $('#personal_number, #basic_pension_number').val('');
                    }
                }

                function checkOver70_2() {
                    if ($('#N60_005F_8E73_8A4F_8BC7_9432').prop('checked')) {
                        $('#personal_number, #basic_pension_number').prop('disabled', false);
                    } else {
                        $('#personal_number, #basic_pension_number').prop('disabled', true);
                        $('#personal_number, #basic_pension_number').val('');
                    }
                }
            });
            document.addEventListener('DOMContentLoaded', function() {
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

            $(function() {
                $('#personal_number').change(function() {
                    $('#basic_pension_number').val('');
                });
                $('#basic_pension_number').change(function() {
                    $('#personal_number').val('');
                });
            });
            $(function() {
                let cb1 = $('#over_70_check');
                let cb2 = $('#N60_005F_8E73_8A4F_8BC7_9432');
                cb1.change(function() {
                    if (cb1.prop('checked')) {
                        cb2.prop('checked', true);
                    } else {
                        cb2.prop('checked', false);
                    }
                });
                cb2.change(function() {
                    if (cb2.prop('checked')) {
                        cb1.prop('checked', true);
                    } else {
                        cb1.prop('checked', false);
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
                let eraMapping = {
                    '明治': '1',
                    '大正': '3',
                    '昭和': '5',
                    '平成': '7',
                    '令和': '9',
                };
                let birthdayEraValue = birthdayConvertJapan['era'] ?? "";
                let birthdayEra = eraMapping[birthdayEraValue] ?? "";
                $('#N7_005F_944E_8D86').val(branch.pension_office_reference_prefecture || '');
                $('#N8_005F_944E').val(branch.pension_office_reference_no_cities || '');
                $('#N9_005F_8C8E').val(branch.pension_office_reference_no_office || '');
                $('#N9_005F_8C8E0').val(branch.insurance_office_no || '');
                if (branch.post_code !== null && branch.post_code.length == 7) {
                    $('#N10_005F_93FA').val(branch.post_code.substring(0, 3));
                    $('#N11_005F_94ED_95DB_8CAF_8ED2_8E81').val(branch.post_code.substring(3, 7));
                }
                const branchAddress = (branch_prefecture_data.name || "") + (branch.address_city || "") + (
                    branch.address_ward || "") + (branch.address_apartment || "");
                $('#N12_005F_905C_90BF_8ED2_8E81').val(branchAddress);
                $('#N13_005F_8374_838A_834B_8369').val(company.name || '');
                $('#N16_005F_905C_90BF').val(branch.tel_area_code || '');
                $('#N17_005F_985A_8F5C_8DCE_82C9').val(branch.tel_city_code || '');
                $('#N18_005F_8CC2_906C_94D4').val(branch.tel_subscriber_code || '');
                const employeeNameKana = (employee.last_name_kana ? employee.last_name_kana + '　' : "") + (employee
                    .first_name_kana || "");
                const employeeName = (employee.last_name ? employee.last_name + '　' : "") + (employee.first_name || "");
                $('#N20_005F_94ED_95DB_8CAF_8ED2_94D4_8D866').val(employee.insurer_reference_no || '');
                $('#N21_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employeeNameKana);
                $('#N23__005F_94ED').val(employeeName);
                $('#N24_005F_8E96_8BC6').val(birthdayEra);
                $('#N25_005F_8E96_8BC6_8F8A').val(birthdayConvertJapan['year'] ?? "");
                $('#N26_005F_8E96_8BC6_8F8A_94D4').val(birthdayConvertJapan['month'] ?? "");
                $('#N28_8D864_8C85').val(birthdayConvertJapan['day'] ?? "");
            }
            Livewire.on('onSelectEmployee', ({
                data
            }) => {
                insertDataFromEmployee(data)
            });
        </script>


        <script type="module">
            $(document).ready(function() {
                function cal1() {
                    let nullFlg = true;

                    let valueA = parseFloat($('#N47_005F_89C1_93FC_8ED2_94D4_8D86').val()) || 0;
                    let valueB = parseFloat($('#N50_005F_8E73_8A4F_8BC9').val()) || 0;

                    let val = valueA + valueB;

                    if ($('#N47_005F_89C1_93FC_8ED2_94D4_8D86').val() == "" && $('#N50_005F_8E73_8A4F_8BC9').val() == "") {
                        nullFlg = false;
                    }

                    if (!isNaN(val) && nullFlg) {
                        $('#N53_005F_8E73_93E0').val(val);
                    } else {
                        $('#N53_005F_8E73_93E0').val("");
                    }
                }
                function cal2() {
                    let nullFlg = true;

                    let valueA = parseFloat($('#N48_005F_8E73_8A4F_8BC7').val()) || 0;
                    let valueB = parseFloat($('#N51_005F_8E73_8A4F_8BC7').val()) || 0;

                    let val = valueA + valueB;

                    if ($('#N48_005F_8E73_8A4F_8BC7').val() == "" && $('#N51_005F_8E73_8A4F_8BC7').val() == "") {
                        nullFlg = false;
                    }

                    if (!isNaN(val) && nullFlg) {
                        $('#N54_005F_89C1_93FC_8ED2_94D4_8D86').val(val);
                    } else {
                        $('#N54_005F_89C1_93FC_8ED2_94D4_8D86').val("");
                    }
                }
                function cal3() {
                    let nullFlg = true;

                    let valueA = parseFloat($('#N49_005F_8E73_8A4F_8BC8').val()) || 0;
                    let valueB = parseFloat($('#N52_005F_8E73_8A4F').val()) || 0;

                    let val = valueA + valueB;

                    if ($('#N49_005F_8E73_8A4F_8BC8').val() == "" && $('#N52_005F_8E73_8A4F').val() == "") {
                        nullFlg = false;
                    }

                    if (!isNaN(val) && nullFlg) {
                        $('#N55_005F_8E73_8A4F_8BC7_94D4').val(val);
                    } else {
                        $('#N55_005F_8E73_8A4F_8BC7_94D4').val("");
                    }
                }
                function cal4() {
                    let nullFlg = true;

                    let valueA = parseFloat($('#N53_005F_8E73_93E0').val()) || 0;
                    let valueB = parseFloat($('#N54_005F_89C1_93FC_8ED2_94D4_8D86').val()) || 0;
                    let valueC = parseFloat($('#N55_005F_8E73_8A4F_8BC7_94D4').val()) || 0;
                    let valueD = parseFloat($('#N44_005F_92AC_88E6').val()) || 0;
                    let valueE = parseFloat($('#N45__005F_8E73_8A4F_8BC7_94D4').val()) || 0;
                    let valueF = parseFloat($('#N46__005F_8E73_93E0_8BC7_94D4').val()) || 0;

                    valueA = (valueD >= 17) ? valueA : 0;
                    valueB = (valueE >= 17) ? valueB : 0;
                    valueC = (valueF >= 17) ? valueC : 0;
                    let val = valueA + valueB + valueC;

                    if ($('#N53_005F_8E73_93E0').val() == "" && $('#N54_005F_89C1_93FC_8ED2_94D4_8D86').val() == "" && $('#N55_005F_8E73_8A4F_8BC7_94D4').val() === "") {
                        nullFlg = false;
                    }

                    if (!isNaN(val) && nullFlg) {
                        $('#N56_005F_8E73_8A4F_8BC7_94D7').val(val);
                    } else {
                        $('#N56_005F_8E73_8A4F_8BC7_94D7').val("");
                    }                
                }
                function cal5() {
                    let sum = 0;
                    let count = 0;

                    let valueA = parseFloat($('#N53_005F_8E73_93E0').val());
                    let valueB = parseFloat($('#N54_005F_89C1_93FC_8ED2_94D4_8D86').val());
                    let valueC = parseFloat($('#N55_005F_8E73_8A4F_8BC7_94D4').val());
                    let valueD = parseFloat($('#N44_005F_92AC_88E6').val()) || 0;
                    let valueE = parseFloat($('#N45__005F_8E73_8A4F_8BC7_94D4').val()) || 0;
                    let valueF = parseFloat($('#N46__005F_8E73_93E0_8BC7_94D4').val()) || 0;

                    valueA = (valueD >= 17) ? valueA : 0;
                    valueB = (valueE >= 17) ? valueB : 0;
                    valueC = (valueF >= 17) ? valueC : 0;

                    if (valueA !== 0) {
                        let parsedA = parseFloat(valueA);
                        if (!isNaN(parsedA)) {
                            sum += parsedA;
                            count++;
                        }
                    }

                    if (valueB !== 0) {
                        let parsedB = parseFloat(valueB);
                        if (!isNaN(parsedB)) {
                            sum += parsedB;
                            count++;
                        }
                    }

                    if (valueC !== 0) {
                        let parsedC = parseFloat(valueC);
                        if (!isNaN(parsedC)) {
                            sum += parsedC;
                            count++;
                        }
                    }

                    let val = (count > 0) ? Math.floor(sum / count) : null;

                    if (val !== null && !isNaN(val)) {
                        $('#N57_005F_8E73_8A4F_8BC7_94D9').val(val);
                    } else {
                        $('#N57_005F_8E73_8A4F_8BC7_94D9').val("");
                    }
                }
                function cal6() {
                    let sum = 0;
                    let count = 0;

                    let valueA = parseFloat($('#N56_005F_8E73_8A4F_8BC7_94D7').val());
                    let valueB = parseFloat($('#N40_905C_90BF_8ED2').val());


                    if (!valueA || isNaN(parseFloat(valueA)) || !valueB || isNaN(parseFloat(valueB))) {
                                $('#N58_005F_8E73_8A4F_8BC7_9410').val("");
                                return;
                            }
                    
                    valueA = parseFloat(valueA);
                    valueB = parseFloat(valueB);
                    let valueC = (valueA - valueB) / 3;
                    valueC = valueC < 0 ? 0 : valueC;

                    if (!isNaN(valueC)) {
                        $('#N58_005F_8E73_8A4F_8BC7_9410').val(Math.floor(valueC));
                    } else {
                        $('#N58_005F_8E73_8A4F_8BC7_9410').val("");
                    }
                }


                $('#N47_005F_89C1_93FC_8ED2_94D4_8D86, #N50_005F_8E73_8A4F_8BC9').on('input', cal1);
                $('#N48_005F_8E73_8A4F_8BC7, #N51_005F_8E73_8A4F_8BC7').on('input', cal2);
                $('#N49_005F_8E73_8A4F_8BC8, #N52_005F_8E73_8A4F').on('input', cal3);
                $('#N47_005F_89C1_93FC_8ED2_94D4_8D86, #N50_005F_8E73_8A4F_8BC9, #N48_005F_8E73_8A4F_8BC7, #N51_005F_8E73_8A4F_8BC7, #N49_005F_8E73_8A4F_8BC8, #N52_005F_8E73_8A4F,#N44_005F_92AC_88E6,#N45__005F_8E73_8A4F_8BC7_94D4,#N46__005F_8E73_93E0_8BC7_94D4').on('input', cal4);
                $('#N47_005F_89C1_93FC_8ED2_94D4_8D86, #N50_005F_8E73_8A4F_8BC9, #N48_005F_8E73_8A4F_8BC7, #N51_005F_8E73_8A4F_8BC7, #N49_005F_8E73_8A4F_8BC8, #N52_005F_8E73_8A4F,#N44_005F_92AC_88E6,#N45__005F_8E73_8A4F_8BC7_94D4,#N46__005F_8E73_93E0_8BC7_94D4').on('input', cal5);
                $('#N40_905C_90BF_8ED2, #N47_005F_89C1_93FC_8ED2_94D4_8D86, #N50_005F_8E73_8A4F_8BC9, #N48_005F_8E73_8A4F_8BC7, #N51_005F_8E73_8A4F_8BC7, #N49_005F_8E73_8A4F_8BC8, #N52_005F_8E73_8A4F,#N44_005F_92AC_88E6,#N45__005F_8E73_8A4F_8BC7_94D4,#N46__005F_8E73_93E0_8BC7_94D4').on('input', cal6);
            });
        </script>

        @slot('footer')
            <script src="{{ asset('/js/ledger-form.js') }}" type="module"></script>
        @endslot
    </section>
</x-layout>
