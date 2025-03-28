<!-- 4950013520991000 -->
<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

            <style type="text/css"></style>
        @endslot
        <h1>{{ $procedureName }}</h1>
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
                                <h2>書類・データの添付</h2>
                                <x-ledger-attachment :file_original_names="[
                                    'wage_ledger' => '健康保険　標準賞与額累計申出書',
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
                                <x-form.health_and_pension_insured_bonus_payment_notification :dataUri="$dataUri" />
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
                        <x-form.health_and_pension_insured_bonus_payment_notification :dataUri="$dataUri" />
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
                $('#N6_005F_93FA').val('{{ old('today_year', $todaySet['year']) }}');
                $('#N7_005F_944E_8D86').val('{{ old('today_month', $todaySet['month']) }}');
                $('#N8_005F_944E').val('{{ old('today_date', $todaySet['date']) }}');

                @if (isset($businessOwner))
                    $('#N17_005F_985A_8F5C_8DCE_82C9').val(
                        '{{ old('employer_company_managerial_position_name', ($businessOwner->last_name ? $businessOwner->last_name . '　' : '') . ($businessOwner->first_name ?? '')) }}'
                    );
                @endif

                @if ($current_employee->role_id === 500)
                    $('#N21_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val('{{ $current_employee->last_name }}' + '　' +
                        '{{ $current_employee->first_name }}');
                    $('#N19_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C851').val(
                        '{{ $current_employee->labor_and_social_security_attorney_registration_no }}');
                @else
                    $('#N21_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').prop('disabled', true);
                @endif

                checkOver70();
                remarksAndPartTimeWorker();
                $('#over_70_check').change(function() {
                    checkOver70();
                });
                $('#N40_905C_90BF_8ED2').change(function() {
                    checkOver70_2();
                });
                $('#N42_005F_8F8A_8DDD_926E').change(function() {
                    remarksAndPartTimeWorker();
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
                    if ($('#N40_905C_90BF_8ED2').prop('checked')) {
                        $('#personal_number, #basic_pension_number').prop('disabled', false);
                    } else {
                        $('#personal_number, #basic_pension_number').prop('disabled', true);
                        $('#personal_number, #basic_pension_number').val('');
                    }
                }

                function remarksAndPartTimeWorker() {
                    if ($('#N42_005F_8F8A_8DDD_926E').prop('checked')) {
                        $('#N43_947A_9242_8BC7_94D4').prop('disabled', false);
                    } else {
                        $('#N43_947A_9242_8BC7_94D4').prop('disabled', true);
                        $('#N43_947A_9242_8BC7_94D4').val('');
                    }
                }
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
                var cb1 = $('#over_70_check');
                var cb2 = $('#N40_905C_90BF_8ED2');
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
                $('#N9_005F_8C8E').val(branch.pension_office_reference_prefecture ?? '');
                $('#N10_005F_93FA').val(branch.pension_office_reference_no_cities ?? '');
                $('#N11_005F_94ED_95DB_8CAF_8ED2_8E81').val(branch.pension_office_reference_no_office ?? '');
                $('#N9_005F_8C8E0').val(branch.insurance_office_no ?? '');
                if (branch.post_code !== null && branch.post_code.length == 7) {
                    $('#N12_005F_905C_90BF_8ED2_8E81').val(branch.post_code.substring(0, 3));
                    $('#N13_005F_8374_838A_834B_8369').val(branch.post_code.substring(3, 7));
                }
                const branchAddress = (branch_prefecture_data.name || "") + (branch.address_city || "") + (
                    branch.address_ward || "") + (branch.address_apartment || "");
                $('#N15_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(branchAddress);
                $('#N16_005F_905C_90BF').val(company.name || '');
                $('#N18_005F_8CC2_906C_94D4').val(branch.tel_area_code || '');
                $('#N19_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(branch.tel_city_code || '');
                $('#N20_005F_94ED_95DB_8CAF_8ED2_94D4_8D866').val(branch.tel_subscriber_code || '');
                const employeeNameKana = (employee.last_name_kana ? employee.last_name_kana + '　' : "") + (employee
                    .first_name_kana || "");
                const employeeName = (employee.last_name ? employee.last_name + '　' : "") + (employee.first_name || "");
                $('#N23_005F_94ED').val(employee.insurer_reference_no);
                $('#N24_005F_8E96_8BC6').val(employeeNameKana);
                $('#N25_005F_8E96_8BC6_8F8A').val(employeeName);
                $('#N26_005F_8E96_8BC6_8F8A_94D4').val(birthdayEra);
                $('#N28_8D864_8C85').val(birthdayConvertJapan['year'] ?? "");
                $('#N29_005F_8E73').val(birthdayConvertJapan['month'] ?? "");
                $('#N30_93E0_8BC7_94D4').val(birthdayConvertJapan['day'] ?? "");

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

            Livewire.on('onSelectEmployee', ({
                data
            }) => {
                insertDataFromEmployee(data)
            });
        </script>
        <script type="module">
            $(document).ready(function() {
            function calculateTotal() {
                var nullFlg = true;

                var valueA = parseFloat($('#N36_005F_8E96_8BC6_8F8A').val()) || 0;
                var valueB = parseFloat($('#N37_96BC_005F_8F8A_8DDD_926E').val()) || 0;

                var val = valueA + valueB;
                var truncatedSum = Math.floor(val / 1000);

                if ($('#N36_005F_8E96_8BC6_8F8A').val() == "" && $('#N37_96BC_005F_8F8A_8DDD_926E').val() == "") {
                    nullFlg = false;
                }

                if (!isNaN(val) && nullFlg) {
                    $('#N38_8F8A_96BC_005F_8F8A_8DDD_926E').val(truncatedSum);
                } else {
                    $('#N38_8F8A_96BC_005F_8F8A_8DDD_926E').val("");
                }
            }

            $('#N36_005F_8E96_8BC6_8F8A, #N37_96BC_005F_8F8A_8DDD_926E').on('input', calculateTotal);
        });
        </script>
        @slot('footer')
            <script src="{{ asset('/js/ledger-form.js') }}" type="module"></script>
        @endslot
    </section>
</x-layout>
