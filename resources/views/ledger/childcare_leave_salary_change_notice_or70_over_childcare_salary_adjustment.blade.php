<!-- 4950013520602000 -->
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
                                <x-ledger-attachment :file_original_names="[
                                    'other' => 'その他の添付書類',
                                ]" :extensions="'.jpg,.pdf'" />
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
                                <x-form.childcare_leave_salary_change_notice_or70_over_childcare_salary_adjustment :residentials="$residentials" :countries="$countries"/>
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
                        <x-form.childcare_leave_salary_change_notice_or70_over_childcare_salary_adjustment :residentials="$residentials" :countries="$countries"/>
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
                $('#_92F1_8F6F_944E_8C8E_93FAx_944E_002E1').val('{{ old('notification_year', $today['year']) }}');
                $('#_92F1_8F6F_944E_8C8E_93FAx_8C8E_002E2').val('{{ old('notification_month', $today['month']) }}');
                $('#_92F1_8F6F_944E_8C8E_93FAx_93FA_002E3').val('{{ old('notification_day', $today['date']) }}');;

                $('#_8E96_8BC6_8EE5_8E81_96BC_002E10').val('{{ old('company.representative') }}' ? '{{ old('company.representative') }}' : '{{ $company->representative }}');

                @if ($current_employee->role_id === 500)
                    $('#_8ED0_89EF_95DB_8CAF_984A_96B1_8E6D_82CC_92F1_8F6F_91E3_8D73_8ED2_96BC_002E14').val(
                        '{{ old('labor_consultant_name') }}'
                    ).css('background-color', '#ddeeff')
                    .prop('readonly', false);
                @else
                    $('#_8ED0_89EF_95DB_8CAF_984A_96B1_8E6D_82CC_92F1_8F6F_91E3_8D73_8ED2_96BC_002E14').val(
                        '{{ old('labor_consultant_name') }}'
                    ).css('background-color', '#ffffff')
                    .prop('readonly', true);
                @endif

            });
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
                const employee = data['employee'];
                const branch = data['branch'];
                const company = data['company'];
                const hello_work = data['hello_work'];
                const branch_prefecture_data = data['branch_prefecture_data'];
                const birthdayConvertJapan = data['birthday_convert_japan'];
                const headquarters = data['headquarters'];
                const headquarters_prefecture_data = data['headquarters_prefecture_data'];
                const country_value = data['country_value'];
                const residential_status_value = data['residential_status_value'];
                const employmentInsuredConvertDate = data['employment_insured_convert_date'];
                const contract_start_convert_date = data['contract_start_convert_date'];
                const contract_end_convert_date = data['contract_end_convert_date'];

                $('#_8E96_8BC6_8F8A_90AE_979D_8B4C_8D86x_8C53_8E73_8BE6_8B4C_8D86_002E4').val(branch.pension_office_reference_no_cities ?? '');
                $('#_8E96_8BC6_8F8A_90AE_979D_8B4C_8D86x_8E96_8BC6_8F8A_8B4C_8D86_002E5').val(branch.pension_office_reference_no_office ?? '');
                if (branch.post_code !== null) {
                    $('#_8E96_8BC6_8F8A_8F8A_8DDD_926Ex_9758_95D6_94D4_8D86x_9065_94D4_8D86_002E6').val(branch.post_code.slice(0, 3));
                    $('#_8E96_8BC6_8F8A_8F8A_8DDD_926Ex_9758_95D6_94D4_8D86x_8E71_94D4_8D86_002E7').val(branch.post_code.slice(3, 7));
                } else {
                    $('#_8E96_8BC6_8F8A_8F8A_8DDD_926Ex_9758_95D6_94D4_8D86x_9065_94D4_8D86_002E6').val("");
                    $('#_8E96_8BC6_8F8A_8F8A_8DDD_926Ex_9758_95D6_94D4_8D86x_8E71_94D4_8D86_002E7').val("");
                }

                $('#_8E96_8BC6_8F8A_8F8A_8DDD_926E_002E8').val((branch_prefecture_data.name ?? '') + (branch.address_city ?? '') + (branch
                    .address_ward ?? '') + (branch.address_apartment ?? ''));
                $('#_8E96_8BC6_8F8A_96BC_8FCC_002E9').val(company.name || '');

                const branch_tel_area_code = branch.tel_area_code;
                const branch_tel_city_code = branch.tel_city_code;
                const branch_tel_subscriber_code = branch.tel_subscriber_code;
                const employee_last_name_kana = employee.last_name_kana;
                const employee_first_name_kana = employee.first_name_kana;
                const employee_last_name = employee.last_name;
                const employee_first_name = employee.first_name;

                if (branch.tel_area_code && branch.tel_city_code && branch.tel_subscriber_code) {
                    $('#_9364_9862_94D4_8D86x_8E73_8A4F_8BC7_94D4_002E11').val(branch.tel_area_code);
                    $('#_9364_9862_94D4_8D86x_8BC7_94D4_002E12').val(branch.tel_city_code);
                    $('#_9364_9862_94D4_8D86x_94D4_8D86_002E13').val(branch.tel_subscriber_code);
                } else {
                    $('#_9364_9862_94D4_8D86x_8E73_8A4F_8BC7_94D4_002E11').val("");
                    $('#_9364_9862_94D4_8D86x_8BC7_94D4_002E12').val("");
                    $('#_9364_9862_94D4_8D86x_94D4_8D86_002E13').val("");
                }
                $('#_94ED_95DB_8CAF_8ED2_90AE_979D_94D4_8D86_002E15').val(employee.insurer_reference_no);
                let employee_mynumber_card_no = "";
                if (employee.mynumber_card_no) {
                    employee_mynumber_card_no = employee.mynumber_card_no;
                } else if (employee.pension_no) {
                    employee_mynumber_card_no = employee.pension_no;
                }
                $('#_8CC2_906C_94D4_8D86_82DC_82BD_82CD_8AEE_9162_944E_8BE0_94D4_8D86_002E16').val(employee_mynumber_card_no ?? '');

                $('#_94ED_95DB_8CAF_8ED2_8E81_96BCx_834A_8369_8E81_96BC_002E17').val((employee_last_name_kana ? employee_last_name_kana + '　' : '') + (employee_first_name_kana ?? ''));
                $('#_94ED_95DB_8CAF_8ED2_8E81_96BCx_8ABF_8E9A_8E81_96BC_002E18').val((employee_last_name ? employee_last_name + '　' : '') + (employee_first_name ?? ''));

                let eraMapping = {
                    '昭和': '5',
                    '平成': '7',
                    '令和': '9',
                };
                let birthdayEraValue = birthdayConvertJapan['era'] ?? "";
                let birthdayEra = eraMapping[birthdayEraValue] ?? "";
                $('#_94ED_95DB_8CAF_8ED2_90B6_944E_8C8E_93FAx_8CB3_8D86_002E19').val(birthdayEra);
                $('#_94ED_95DB_8CAF_8ED2_90B6_944E_8C8E_93FAx_944E_002E20').val(birthdayConvertJapan['year'] ?? "");
                $('#_94ED_95DB_8CAF_8ED2_90B6_944E_8C8E_93FAx_8C8E_002E21').val(birthdayConvertJapan['month'] ?? "");
                $('#_94ED_95DB_8CAF_8ED2_90B6_944E_8C8E_93FAx_93FA_002E22').val(birthdayConvertJapan['day'] ?? "");

            }

            Livewire.on('onSelectEmployee', ({
                data
            }) => {
                insertDataFromEmployee(data)
            });
        </script>

        <script type="module">
            $(document).ready(function() {
                function toHalfWidth(str) {
                return str.replace(/[！＃＄％＆’（）＊＋，－．／０１２３４５６７８９]/g, function(match) {
                    return String.fromCharCode(match.charCodeAt(0) - 0xFEE0);
                });
                }
                $('#_8E78_8B8B_8C8E3x_8C8E_002E43').on('input', function() {
                let payMonth3 = $(this).val();
                payMonth3 = toHalfWidth(payMonth3);
                if (!payMonth3) {
                $('#_89FC_92E8_944E_8C8Ex_8C8E_002E59').val('');
                return;
                }
                let monthNum = parseInt(payMonth3, 10);
                if (!isNaN(monthNum) && monthNum >= 1 && monthNum <= 12) {
                    monthNum = monthNum + 1;
                    if (monthNum === 13) {
                        monthNum = 1;
                    }
                    $('#_89FC_92E8_944E_8C8Ex_8C8E_002E59').val(monthNum);
                } else {
                    $('#_89FC_92E8_944E_8C8Ex_8C8E_002E59').val('');
                }
                });
            });
        </script>

       <script type="module">
            $(document).ready(function() {
                    function calcTotal(num1, num2, numTotal) {
                        let nullFlg = true;
                        function toHalfWidth(value) {
                            return value.replace(/[０-９]/g, function(s) {
                                return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
                            });
                        }
                        let valueA = $(num1).val();
                        let valueB = $(num2).val();
                        valueA = toHalfWidth(valueA || "0");
                        valueB = toHalfWidth(valueB || "0");
                        let total = parseFloat(valueA) + parseFloat(valueB);
                        nullFlg = ($(num1).val() === "" && $(num2).val() === "") ? false : nullFlg;
                        $(numTotal).val(!isNaN(total) && nullFlg ? total : "");
                    }

                    function calcGrandtotal() {
                        let nullFlg = true;
                        let valueA = parseFloat($('#_8D87_8C761_002E37').val()) || 0;
                        let valueB = parseFloat($('#_8D87_8C762_002E42').val()) || 0;
                        let valueC = parseFloat($('#_8D87_8C763_002E47').val()) || 0;
                        let valueD = parseFloat($('#_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90941x_93FA_002E34').val()) || 0;
                        let valueE = parseFloat($('#_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90942x_93FA_002E39').val()) || 0;
                        let valueF = parseFloat($('#_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90943x_93FA_002E44').val()) || 0;

                        valueA = (valueD >= 17) ? valueA : 0;
                        valueB = (valueE >= 17) ? valueB : 0;
                        valueC = (valueF >= 17) ? valueC : 0;
                        let val = valueA + valueB + valueC;
                        nullFlg = ($('#_8D87_8C761_002E37').val() === "" && $('#_8D87_8C762_002E42').val() === "" && $('#_8D87_8C763_002E47').val() === "") ? false : nullFlg;
                        $('#_918D_8C76_002E48').val(!isNaN(val) && nullFlg ? val : "");
                    }

                    function calcAverageTotal() {
                        let sum = 0;
                        let count = 0;
                        let valueA = parseFloat($('#_8D87_8C761_002E37').val()) || 0;
                        let valueB = parseFloat($('#_8D87_8C762_002E42').val()) || 0;
                        let valueC = parseFloat($('#_8D87_8C763_002E47').val()) || 0;
                        let valueD = parseFloat($('#_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90941x_93FA_002E34').val()) || 0;
                        let valueE = parseFloat($('#_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90942x_93FA_002E39').val()) || 0;
                        let valueF = parseFloat($('#_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90943x_93FA_002E44').val()) || 0;

                        valueA = (valueD >= 17) ? valueA : 0;
                        valueB = (valueE >= 17) ? valueB : 0;
                        valueC = (valueF >= 17) ? valueC : 0;

                        if (valueA !== "") {
                            let parsedA = parseFloat(valueA);
                            if (!isNaN(parsedA)) {
                                sum += parsedA;
                                count++;
                            }
                        }

                        if (valueB !== "") {
                            let parsedB = parseFloat(valueB);
                            if (!isNaN(parsedB)) {
                                sum += parsedB;
                                count++;
                            }
                        }

                        if (valueC !== "") {
                            let parsedC = parseFloat(valueC);
                            if (!isNaN(parsedC)) {
                                sum += parsedC;
                                count++;
                            }
                        }

                        let val = (count > 0) ? Math.floor(sum / count) : null;
                        $('#_95BD_8BCF_8A7A_002E49').val(val !== null && !isNaN(val) ? val : "");
                    }

                    function calcAdjustedAverageTotal() {
                        let sum = 0;
                        let count = 0;

                        function toHalfWidth(value) {
                            if (value) {
                                return value.replace(/[０-９]/g, function (s) {
                                    return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
                                });
                            }
                            return value;
                        }

                        let valueA = toHalfWidth($('#_918D_8C76_002E48').val());
                        let valueB = toHalfWidth($('#_916B_8B79_8E78_95A5_8A7A_002E56').val());

                        if (!valueA || isNaN(parseFloat(valueA)) || !valueB || isNaN(parseFloat(valueB))) {
                            $('#_8F43_90B3_95BD_8BCF_8A7A_002E50').val("");
                            return;
                        }

                        valueA = parseFloat(valueA);
                        valueB = parseFloat(valueB);
                        let valueC = (valueA - valueB) / 3;
                        valueC = valueC < 0 ? 0 : valueC;

                        if (!isNaN(valueC)) {
                            $('#_8F43_90B3_95BD_8BCF_8A7A_002E50').val(Math.floor(valueC));
                        } else {
                            $('#_8F43_90B3_95BD_8BCF_8A7A_002E50').val("");
                        }
                    }

                    function setRevisionDate() {
                        let valueA = $('#_8E78_8B8B_8C8E3x_8C8E_002E43').val();
                        let nullFlg = true;
                        valueA = valueA.replace(/[０-９]/g, function(s) {
                            return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
                        });

                        valueA = (valueA >= 1 && valueA <= 12) ? valueA : "";
                        nullFlg = (valueA === "") ? false : nullFlg;
                        valueA = parseFloat(valueA) || 0;

                        if (!isNaN(valueA) && nullFlg) {
                            if (valueA === 12) {
                                $('#_89FC_92E8_944E_8C8Ex_8C8E_002E59').val(1);
                            } else {
                                $('#_89FC_92E8_944E_8C8Ex_8C8E_002E59').val(valueA + 1);
                            }
                        } else {
                            $('#_89FC_92E8_944E_8C8Ex_8C8E_002E59').val("");
                        }
                    }

                    $('#_92CA_89DD1_002E35,#_8CBB_95A81_002E36').on('input', () => {
                        calcTotal('#_92CA_89DD1_002E35', '#_8CBB_95A81_002E36', '#_8D87_8C761_002E37');
                    });
                    $('#_92CA_89DD2_002E40, #_8CBB_95A82_002E41').on('input', () => {
                        calcTotal('#_92CA_89DD2_002E40', '#_8CBB_95A82_002E41', '#_8D87_8C762_002E42');
                    });
                    $('#_92CA_89DD3_002E45,#_8CBB_95A83_002E46').on('input', () => {
                        calcTotal('#_92CA_89DD3_002E45', '#_8CBB_95A83_002E46', '#_8D87_8C763_002E47');
                    });
                    $('#_92CA_89DD1_002E35, #_8CBB_95A81_002E36, #_92CA_89DD2_002E40, #_8CBB_95A82_002E41, #_92CA_89DD3_002E45, #_8CBB_95A83_002E46, #_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90941x_93FA_002E34, #_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90942x_93FA_002E39, #_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90943x_93FA_002E44').on('input', calcGrandtotal);
                    $('#_92CA_89DD1_002E35, #_8CBB_95A81_002E36, #_92CA_89DD2_002E40, #_8CBB_95A82_002E41, #_92CA_89DD3_002E45, #_8CBB_95A83_002E46, #_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90941x_93FA_002E34, #_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90942x_93FA_002E39, #_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90943x_93FA_002E44').on('input', calcAverageTotal);
                    $('#_92CA_89DD1_002E35, #_8CBB_95A81_002E36, #_92CA_89DD2_002E40, #_8CBB_95A82_002E41, #_92CA_89DD3_002E45, #_8CBB_95A83_002E46, #_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90941x_93FA_002E34, #_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90942x_93FA_002E39, #_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90943x_93FA_002E44, #_916B_8B79_8E78_95A5_8A7A_002E56').on('input', calcAdjustedAverageTotal);
                    $('#_8E78_8B8B_8C8E3x_8C8E_002E43').on('input',setRevisionDate);
            });
        </script>
        @slot('footer')
            <script src="{{ asset('/js/ledger-form.js') }}" type="module"></script>
        @endslot
    </section>
</x-layout>