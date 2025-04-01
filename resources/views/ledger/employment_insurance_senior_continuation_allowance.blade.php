<!-- 4950008680046000 -->
<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

            <style type="text/css"></style>
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
                                <h2>賃金支払状況</h2>
                                <div class="employee-select-area ui form">
                                    <p>1）社員選択から社員を選択してください。</p>
                                    <div class="ui warning message 60 hidden">
                                        <div class="header">選択された社員は申請対象の条件に合いません（対象：60歳〜65歳）</div>
                                    </div>
                                    <div class="ui warning message hidden">
                                        <div class="header">選択された社員の賃金情報のデータがありません</div>
                                    </div>
                                </div>
                                <!-- 社員が選択されるまで非表示 -->
                                <div id="wage-payment-status-onoff" class="wage-payment-status-onoff" style="display: none;">
                                    <p>2）反映にチェックを入れて『連携する』ボタンを押すと帳票画面に反映されます。</p>
                                    <p>　※下記のフォームに入力されている数値は、申請可能な直近の賃金支払状況です。</p>
                                    <p>　※別の支給対象年月に変更したい場合は、『別の支給対象年月を参照する』ボタンより変更可能です。</p>
                                    <div class="field" style="min-width: 80px; text-align: right;">
                                        <button type="button" class="ui button small" id="another_payment_month_btn">別の支給対象年月を参照する</button>
                                    </div>
                                    <x-another-payment-month/>
                                    <livewire:wage-payment-status />
                                </div>
                            </div>
                        </div>
                        
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>書類・データの添付</h2>
                                <x-ledger-attachment :required_list="[
                                    'wage_amount' => '支給申請書に記載した賃金額等記載内容を確認できる書類',
                                ]" :file_original_names="[
                                    'written_consent' => '支給申請に係る承諾書',
                                    'other' => 'その他の添付書類',
                                ]" :extensions="'.doc,.docx,.jpg,.jpeg,.pdf,.xls,.xlsx'" />
                            </div>
                        </div>
                    </div>
                    <div class="submission-card">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>提出先選択</h2>
                                <livewire:submission-selector :mode="0" />
                            </div>
                        </div>
                    </div>
                    <div class="qualification-card">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <x-form.senior_employment_continuation_benefit_claim_form />
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

                <input type="hidden" name="query_parameter" id="queryParameter">
            </form>
        </div>

        <div id="ledger-step2" class="step-view my-2">
            <h2 style="text-align: center;">プレビュー</h2>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component>
                        <x-form.senior_employment_continuation_benefit_claim_form />
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
                    return str.replace(/[０-９]/g, function(match) {
                        const halfWidthChar = String.fromCharCode(match.charCodeAt(0) - 65248);
                        return halfWidthChar;
                    });
                }
                document.getElementById("J4_005F_8E96_8BC6_8F8A_94D4_8D864_8C85").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J5_005F_8E96_8BC6_8F8A_94D4_8D866_8C85").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J6_005F_8E96_8BC6_8F8A_94D4_8D86CD").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J7_005F_8AC7_8A8D_8BE6_95AA").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J8_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85").addEventListener("input",
                    function() {
                        this.value = toHalfWidth(this.value);
                    });
                document.getElementById("J9_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85").addEventListener("input",
                    function() {
                        this.value = toHalfWidth(this.value);
                    });
                document.getElementById("J10_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD").addEventListener("input",
                    function() {
                        this.value = toHalfWidth(this.value);
                    });
                document.getElementById("J13_005F_944E").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J14_005F_8C8E").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J15_005F_93FA").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J26_005F_944E_005F1").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J27_005F_8C8E_005F1").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById(
                        "J28_005F_8E78_8B8B_91CE_8FDB_944E_8C8E_82C9_8E78_95A5_82ED_82EA_82BD_92C0_8BE0_8A7A_005F1")
                    .addEventListener("input", function() {
                        this.value = toHalfWidth(this.value);
                    });
                document.getElementById("J29_005F_92C0_8BE0_82CC_8CB8_8A7A_82CC_82A0_82C1_82BD_93FA_9094_005F1")
                    .addEventListener("input", function() {
                        this.value = toHalfWidth(this.value);
                    });
                document.getElementById("J33_005F_944E_005F2").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J34_005F_8C8E_005F2").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById(
                        "J35_005F_8E78_8B8B_91CE_8FDB_944E_8C8E_82C9_8E78_95A5_82ED_82EA_82BD_92C0_8BE0_8A7A_005F2")
                    .addEventListener("input", function() {
                        this.value = toHalfWidth(this.value);
                    });
                document.getElementById("J36_005F_92C0_8BE0_82CC_8CB8_8A7A_82CC_82A0_82C1_82BD_93FA_9094_005F2")
                    .addEventListener("input", function() {
                        this.value = toHalfWidth(this.value);
                    });
                document.getElementById("J33_005F_944E_005F3").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J34_005F_8C8E_005F3").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById(
                        "J35_005F_8E78_8B8B_91CE_8FDB_944E_8C8E_82C9_8E78_95A5_82ED_82EA_82BD_92C0_8BE0_8A7A_005F3")
                    .addEventListener("input", function() {
                        this.value = toHalfWidth(this.value);
                    });
                document.getElementById("J36_005F_92C0_8BE0_82CC_8CB8_8A7A_82CC_82A0_82C1_82BD_93FA_9094_005F3")
                    .addEventListener("input", function() {
                        this.value = toHalfWidth(this.value);
                    });
                document.getElementById("J68_005F_92C0_8BE0_92F7_90D8_93FA").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J70_005F_92C0_8BE0_8E78_95A5_93FA").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J73_005F_8F8A_92E8_984A_93AD_93FA_9094_005F1").addEventListener("input",
                    function() {
                        this.value = toHalfWidth(this.value);
                    });
                document.getElementById("J73_005F_8F8A_92E8_984A_93AD_93FA_9094_005F2").addEventListener("input",
                    function() {
                        this.value = toHalfWidth(this.value);
                    });
                document.getElementById("J73_005F_8F8A_92E8_984A_93AD_93FA_9094_005F3").addEventListener("input",
                    function() {
                        this.value = toHalfWidth(this.value);
                    });
                document.getElementById("J51_005F_8E73_8A4F_8BC7_94D4").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J52_005F_8E73_93E0_8BC7_94D4").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J53_005F_89C1_93FC_8ED2_94D4_8D86").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J65_005F_8E73_8A4F_8BC7_94D4").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J66_005F_8E73_93E0_8BC7_94D4").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                document.getElementById("J67_005F_89C1_93FC_8ED2_94D4_8D86").addEventListener("input", function() {
                    this.value = toHalfWidth(this.value);
                });
                $('#J46_005F_944E_8D86').val('{{ $todaySet['japanEra'] }}');
                $('#J47_005F_944E').val('{{ $todaySet['japanEraYear'] }}');
                $('#J48_005F_8C8E').val('{{ $todaySet['month'] }}');
                $('#J49_005F_93FA').val('{{ $todaySet['day'] }}');
                $('#J56_005F_944E_8D86').val('{{ $todaySet['japanEra'] }}');
                $('#J57_005F_944E').val('{{ $todaySet['japanEraYear'] }}');
                $('#J58_005F_8C8E').val('{{ $todaySet['month'] }}');
                $('#J59_005F_93FA').val('{{ $todaySet['day'] }}');

                $('#J54_005F_8E96_8BC6_8EE5_8E81_96BC').val('{{ old('employer_name') }}' ?
                    '{{ old('employer_name') }}' : '{{ $company->name }}' + '　' +
                    '{{ $company->representative }}');

                @if ($current_employee->role_id === 500)
                    $('#J63_005F_8DEC_90AC_944E_8C8E_93FA_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2').val(
                        '{{ $todaySet['japanEra'] . $todaySet['japanEraYear'] .'年'. $todaySet['month'] .'月'. $todaySet['day'] .'日'. '\n' . $current_employee->indication_of_agent }}'
                    );
                    $('#J64_005F_8ED0_89EF_95DB_8CAF_984A_96B1_8E6D_005F_8E81_96BC').val(
                        '{{ $current_employee->indication_of_labor . '(' . $current_employee->labor_and_social_security_association . '社会保険労務士会)' . '\n' . $current_employee->last_name . '　' . $current_employee->first_name }}'
                    );
                    $('#J65_005F_8E73_8A4F_8BC7_94D4').val(
                        '{{ old('labor_consultant_tel_area_code', $current_branch->tel_area_code) }}');
                    $('#J66_005F_8E73_93E0_8BC7_94D4').val(
                        '{{ old('labor_consultant_tel_city_code', $current_branch->tel_city_code) }}');
                    $('#J67_005F_89C1_93FC_8ED2_94D4_8D86').val(
                        '{{ old('labor_consultant_tel_subscriber_code', $current_branch->tel_subscriber_code) }}');
                @else
                    $('#J63_005F_8DEC_90AC_944E_8C8E_93FA_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2,\
                                        #J64_005F_8ED0_89EF_95DB_8CAF_984A_96B1_8E6D_005F_8E81_96BC, #J65_005F_8E73_8A4F_8BC7_94D4,\
                                        #J66_005F_8E73_93E0_8BC7_94D4, #J67_005F_89C1_93FC_8ED2_94D4_8D86')
                        .prop(
                            'readonly',
                            true);
                @endif
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
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
                const employee = data['employee'];
                const branch = data['branch'];
                const headquarters = data['headquarters'];
                const company = data['company'];
                const hello_work = data['hello_work'];
                const todaySet = data['todaySet'];
                const headquarters_prefecture_data = data['headquarters_prefecture_data'];
                const branch_prefecture_data = data['branch_prefecture_data'];
                const employmentInsuredConvertDate = data['employment_insured_convert_date'];
                const employee_prefecture_data = data['employee_prefecture_data'];
                const helloWork = data['helloWork'];
                employeeData = employee;
                var employmentInsuredNo = employee.employment_insured_no;
                if (employmentInsuredNo && employmentInsuredNo.length === 11) {
                    var employmentInsuredNo4digit = employmentInsuredNo.substring(0, 4);
                    var employmentInsuredNo6digit = employmentInsuredNo.substring(4, 10);
                    var employmentInsuredNoCD = employmentInsuredNo.substring(10, 11);
                    $('#J8_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employmentInsuredNo4digit);
                    $('#J9_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employmentInsuredNo6digit);
                    $('#J10_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employmentInsuredNoCD);
                } else {
                    $('#J8_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val("");
                    $('#J9_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val("");
                    $('#J10_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val("");
                }
                if (employmentInsuredConvertDate != null) {
                    $('#J12_005F_944E_8D86').val(employmentInsuredConvertDate['era']);
                    $('#J13_005F_944E').val(employmentInsuredConvertDate['year']);
                    $('#J14_005F_8C8E').val(employmentInsuredConvertDate['month']);
                    $('#J15_005F_93FA').val(employmentInsuredConvertDate['day']);
                } else {
                    $('#J12_005F_944E_8D86').val("");
                    $('#J13_005F_944E').val("");
                    $('#J14_005F_8C8E').val("");
                    $('#J15_005F_93FA').val("");
                }
                var branchInsuranceOfficeNo = branch.employment_insurance_office_no;
                if (branchInsuranceOfficeNo && branchInsuranceOfficeNo.length === 11) {
                    var branchInsuranceOfficeNo4digit = branchInsuranceOfficeNo.substring(0, 4);
                    var branchInsuranceOfficeNo6digit = branchInsuranceOfficeNo.substring(4, 10);
                    var branchInsuranceOfficeNoCD = branchInsuranceOfficeNo.substring(10, 11);
                    $('#J4_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branchInsuranceOfficeNo4digit);
                    $('#J5_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branchInsuranceOfficeNo6digit);
                    $('#J6_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branchInsuranceOfficeNoCD);
                } else {
                    $('#J4_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val("");
                    $('#J5_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val("");
                    $('#J6_005F_8E96_8BC6_8F8A_94D4_8D86CD').val("");
                }
                if (employee.last_name_kana && employee.first_name_kana) {
                    $('#J2_005F_8E81_96BC').val(employee.last_name_kana + '　' + employee.first_name_kana);
                    $('#J84_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').val(employee.last_name_kana + '　' +
                        employee.first_name_kana);
                } else {
                    $('#J2_005F_8E81_96BC').val(employee.last_name_kana + '　' + employee.first_name_kana);
                    $('#J84_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').val(employee.last_name_kana + '　' +
                        employee.first_name_kana);
                }
                const employeeAddress = (employee_prefecture_data.name || "") + (employee.address_city || "") + (
                    employee.address_ward || "") + (employee.address_apartment || "");
                if (employee.last_name && employee.first_name) {
                    $('#J83_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(employee.last_name + '　' + employee.first_name);
                    $('#J61_005F_905C_90BF_8ED2_8E81_96BC').val(employeeAddress + '\n' + employee.last_name + '　' + employee
                        .first_name);
                } else {
                    $('#J83_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val("");
                    $('#J61_005F_905C_90BF_8ED2_8E81_96BC').val("");
                }
                if (branch.tel_area_code && branch.tel_city_code && branch.tel_subscriber_code) {
                    $('#J51_005F_8E73_8A4F_8BC7_94D4').val(branch.tel_area_code);
                    $('#J52_005F_8E73_93E0_8BC7_94D4').val(branch.tel_city_code);
                    $('#J53_005F_89C1_93FC_8ED2_94D4_8D86').val(branch.tel_subscriber_code);
                } else {
                    $('#J51_005F_8E73_8A4F_8BC7_94D4').val("");
                    $('#J52_005F_8E73_93E0_8BC7_94D4').val("");
                    $('#J53_005F_89C1_93FC_8ED2_94D4_8D86').val("");
                }
                $('#J50_005F_8E96_8BC6_8F8A_96BC_005F_8F8A_8DDD_926E').val((branch_prefecture_data.name ?? '') + (
                    branch.address_city ?? '') + (branch.address_ward ?? '') + (branch
                    .address_apartment ?? ''));
                $('#J60_005F_82A0_82C4_90E6').val(hello_work);

                const prefectureSelect = document.querySelector('select[name="selected_prefecture"]');
                const helloWorkSelect = document.querySelector('select[name="selected_hello_work"]');

                if (helloWork) {
                    prefectureSelect.addEventListener('change', function() {
                        setTimeout(() => {
                            helloWorkSelect.value = helloWork.id;
                        }, 700);
                    });
                    prefectureSelect.value = helloWork.address_prefecture;
                    prefectureSelect.dispatchEvent(new Event('change', {
                        bubbles: true
                    }));
                    document.querySelector('input[name="apply_to_code"]').value = helloWork.identifier_d;
                    document.querySelector('input[name="apply_to_code"]').dispatchEvent(new Event('input'));
                    document.querySelector('input[name="apply_to_name"]').value = helloWork.submit_union_name_d;
                    document.querySelector('input[name="apply_to_name"]').dispatchEvent(new Event('input'));
                } else {
                    $("select[name='selected_prefecture']").val('');
                    $("select[name='selected_hello_work']").val('');
                    $("input[name='apply_to_name']").val('');
                    $("input[name='apply_to_code']").val('');
                }
            }

            setTimeout(() => {
                $('#J84_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').on('input', function() {
                    $('#J2_005F_8E81_96BC').val($(this).val());
                });
            }, 0);

            Livewire.on('onSelectEmployee', ({
                data
            }) => {
                reset_form(); 
                insertDataFromEmployee(data);
            });

            window.modal24 = $('#another_payment_month').modal({
                blurring: true 
            });

            function reset_form() {
            $('.employee-select-area .ui.warning.60.message').addClass('hidden');
            $('.employee-select-area .ui.warning.message').addClass('hidden');
            $('#wage-payment-status-onoff').hide();
            $('#J25_005F_944E_8D86_005F1').val("");
            $('#J26_005F_944E_005F1').val("");
            $('#J27_005F_8C8E_005F1').val("");
            $('#J28_005F_8E78_8B8B_91CE_8FDB_944E_8C8E_82C9_8E78_95A5_82ED_82EA_82BD_92C0_8BE0_8A7A_005F1').val("");
            $('#J29_005F_92C0_8BE0_82CC_8CB8_8A7A_82CC_82A0_82C1_82BD_93FA_9094_005F1').val("");
            $('#J32_005F_944E_8D86_005F2').val("");
            $('#J33_005F_944E_005F2').val("");
            $('#J34_005F_8C8E_005F2').val("");
            $('#J35_005F_8E78_8B8B_91CE_8FDB_944E_8C8E_82C9_8E78_95A5_82ED_82EA_82BD_92C0_8BE0_8A7A_005F2').val("");
            $('#J36_005F_92C0_8BE0_82CC_8CB8_8A7A_82CC_82A0_82C1_82BD_93FA_9094_005F2').val("");
            $('#J32_005F_944E_8D86_005F3').val("");
            $('#J33_005F_944E_005F3').val("");
            $('#J34_005F_8C8E_005F3').val("");
            $('#J35_005F_8E78_8B8B_91CE_8FDB_944E_8C8E_82C9_8E78_95A5_82ED_82EA_82BD_92C0_8BE0_8A7A_005F3').val("");
            $('#J36_005F_92C0_8BE0_82CC_8CB8_8A7A_82CC_82A0_82C1_82BD_93FA_9094_005F3').val("")
            };

            Livewire.on('show_form', () => {
                $('.employee-select-area .ui.warning.60.message').addClass('hidden');
                $('.employee-select-area .ui.warning.message').addClass('hidden');
                $('#wage-payment-status-onoff').show();
            });

            Livewire.on('show_error', () => {
                $('.employee-select-area .ui.warning.message').removeClass('hidden');
                $('.employee-select-area .ui.warning.60.message').addClass('hidden');
                $('#wage-payment-status-onoff').hide();
            });

            Livewire.on('show_error_60', () => {
                $('.employee-select-area .ui.warning.60.message').removeClass('hidden');
                $('#wage-payment-status-onoff').hide();
            });

            let employeeData;

            $('#another_payment_month_btn').on('click', () => {
                modal24.modal('show');
                Livewire.dispatch('select_payment_status_after60', { employeeData: employeeData });
            });

            Livewire.on('sendCheckedIndexes', function($checkedIndexes) {
                const checkedIndexes = $checkedIndexes.flat();

                const idSets = [
                    {
                        era: "J25_005F_944E_8D86_005F1",
                        year: "J26_005F_944E_005F1",
                        month: "J27_005F_8C8E_005F1",
                        amount: "J28_005F_8E78_8B8B_91CE_8FDB_944E_8C8E_82C9_8E78_95A5_82ED_82EA_82BD_92C0_8BE0_8A7A_005F1",
                        days: "J29_005F_92C0_8BE0_82CC_8CB8_8A7A_82CC_82A0_82C1_82BD_93FA_9094_005F1"
                    },
                    {
                        era: "J32_005F_944E_8D86_005F2",
                        year: "J33_005F_944E_005F2",
                        month: "J34_005F_8C8E_005F2",
                        amount: "J35_005F_8E78_8B8B_91CE_8FDB_944E_8C8E_82C9_8E78_95A5_82ED_82EA_82BD_92C0_8BE0_8A7A_005F2",
                        days: "J36_005F_92C0_8BE0_82CC_8CB8_8A7A_82CC_82A0_82C1_82BD_93FA_9094_005F2"
                    },
                    {
                        era: "J32_005F_944E_8D86_005F3",
                        year: "J33_005F_944E_005F3",
                        month: "J34_005F_8C8E_005F3",
                        amount: "J35_005F_8E78_8B8B_91CE_8FDB_944E_8C8E_82C9_8E78_95A5_82ED_82EA_82BD_92C0_8BE0_8A7A_005F3",
                        days: "J36_005F_92C0_8BE0_82CC_8CB8_8A7A_82CC_82A0_82C1_82BD_93FA_9094_005F3"
                    }
                ];

                checkedIndexes.forEach((num, displayIndex) => {
                    let year = document.querySelector(`[name="payment_year_${num}"]`)?.value || "";
                    let month = document.querySelector(`[name="payment_month_${num}"]`)?.value || "";
                    let amount = document.querySelector(`[name="payment_amount_${num}"]`)?.value || "";
                    let days = document.querySelector(`[name="reduced_days_${num}"]`)?.value || "";

                    let ids = idSets[displayIndex];

                    if (document.getElementById(ids.era)) document.getElementById(ids.era).value = 9;
                    if (document.getElementById(ids.year)) document.getElementById(ids.year).value = year;
                    if (document.getElementById(ids.month)) document.getElementById(ids.month).value = month;
                    if (document.getElementById(ids.amount)) document.getElementById(ids.amount).value = amount;
                    if (document.getElementById(ids.days)) document.getElementById(ids.days).value = days;
                });

                for (let i = checkedIndexes.length; i < idSets.length; i++) {
                    if (document.getElementById(idSets[i].era)) document.getElementById(idSets[i].era).value = "";
                    if (document.getElementById(idSets[i].year)) document.getElementById(idSets[i].year).value = "";
                    if (document.getElementById(idSets[i].month)) document.getElementById(idSets[i].month).value = "";
                    if (document.getElementById(idSets[i].amount)) document.getElementById(idSets[i].amount).value = "";
                    if (document.getElementById(idSets[i].days)) document.getElementById(idSets[i].days).value = "";
                }
            });

        </script>

        @slot('footer')
            <script src="{{ asset('/js/ledger-form.js') }}" type="module"></script>
        @endslot
    </section>
</x-layout>
