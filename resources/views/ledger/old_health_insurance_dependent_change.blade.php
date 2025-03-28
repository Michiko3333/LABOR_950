<!-- 4950013520996000 -->
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
                                <h2>書類・データの添付</h2>
                                <x-ledger-attachment :file_original_names="[
                                    'insurance' => '被保険者証',
                                    'dependent' => '被扶養者証',
                                    'tax_exempt' => '非課税証明書',
                                    'currently_enrolled' => '在学証明書など',
                                    'basic_pension' => '基礎年金番号通知書 又は 基礎年金番号を確認できる書類',
                                    'livelihood_maintenance' => '生計維持を確認できる書類',
                                    'business_owner' => '事業主等証明書',
                                    'medical_insurer' => '医療保険者証明書',
                                    'other' => 'その他の添付書類',
                                ]" :extensions="'.jpg,.jpeg,.pdf'" :separateDisabled='true' />
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
                                        健康保険被扶養者（異動）届／国民年金第３号被保険者関係届
                                    </a>
                                    <a class="item" data-tab="sample2">
                                        事業主等証明書
                                    </a>
                                    <a class="item" data-tab="sample3">
                                        医療保険者証明書
                                    </a>
                                </div>
                                <div class="ui bottom attached segment" data-tab="sample">
                                    <x-form.old_health_insurance_dependent_change :dataUri="$dataUri1" />
                                </div>
                                <div class="ui bottom attached segment" data-tab="sample1" style="display: none">
                                    <x-form.employer_certificate_etc :dataUri="$dataUri2" />
                                </div>
                                <div class="ui bottom attached segment" data-tab="sample2" style="display: none">
                                    <x-form.medical_insurer_certificate :dataUri="$dataUri3" />
                                </div>
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
                        <x-form.health_insurance_dependent_change :dataUri="$dataUri1" />
                    </div>
                </div>
            </div>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component>
                        <x-form.employer_certificate_etc :dataUri="$dataUri2" />
                    </div>
                </div>
            </div>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component>
                        <x-form.medical_insurer_certificate :dataUri="$dataUri3" />
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
                $('#N4_P1').val('{{ old('submission_year', $today['year']) }}');
                $('#N5_P1').val('{{ old('submission_month', $today['month']) }}');
                $('#N6_P1').val('{{ old('submission_date', $today['date']) }}');
                $('#N22_P1').val('{{ old('accepted_year', $yesterday['year']) }}');
                $('#N23_P1').val('{{ old('accepted_month', $yesterday['month']) }}');
                $('#N24_P1').val('{{ old('accepted_day', $yesterday['date']) }}');
                $('#N27').val('{{ old('submission_year', $today['year']) }}');
                $('#N28').val('{{ old('submission_month', $today['month']) }}');
                $('#N29').val('{{ old('submission_date', $today['date']) }}');
                $('#N31_1').val('{{ old('submission_year', $today['year']) }}');
                $('#N32_1').val('{{ old('submission_month', $today['month']) }}');
                $('#N33_1').val('{{ old('submission_date', $today['date']) }}');

                $('#N14_P1').val('{{ old('headquarters_representative') }}' ? '{{ old('headquarters_representative') }}' : '{{ $company->name }}'+ '　' + '{{ $company->representative }}');
                $('#N21').val('{{ old('headquarters_representative') }}' ? '{{ old('headquarters_representative') }}' : '{{ $company->name }}'+ '　' + '{{ $company->representative }}');
                $('#N25_1').val('{{ old('headquarters_representative') }}' ? '{{ old('headquarters_representative') }}' : '{{ $company->name }}'+ '　' + '{{ $company->representative }}');

                @if ($current_employee->role_id === 500)
                @else
                    $('#N22_P1').prop('readonly', false);
                    $('#N30').prop('readonly', false);
                    $('#N34_1').prop('readonly', false);
                @endif
            });
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
                const employee = data['employee'];
                const branch = data['branch'];
                const spouse = data['spouse'];
                const company = data['company'];
                const spouse_birthday_convert_japan = data['spouse_birthday_convert_japan'];
                const birthdayConvertJapan = data['birthday_convert_japan'];
                const headquarters = data['headquarters'];
                const employee_prefecture_data = data['employee_prefecture_data'];
                const headquarters_prefecture_data = data['headquarters_prefecture_data'];
                const branch_prefecture_data = data['branch_prefecture_data'];
                const spouse_prefecture_data = data['spouse_prefecture_data'];
                const date_of_authorisation_convert = data['date_of_authorisation_convert'];
                const date_of_expiry_convert = data['date_of_expiry_convert'];
                var eraMapping = {
                    '昭和': '5',
                    '平成': '7',
                    '令和': '9',
                };
                var birthdayEraValue = birthdayConvertJapan['era'] ?? "";
                var birthdayEra = eraMapping[birthdayEraValue] ?? "";
                var spouseBirthdayEraValue = spouse_birthday_convert_japan['era'] ?? "";
                var spouseBirthdayEra = eraMapping[spouseBirthdayEraValue] ?? "";
                var authorisationEraValue = date_of_authorisation_convert['era'] ?? "";
                var authorisationEra = eraMapping[authorisationEraValue] ?? "";
                var expiryEraValue = date_of_expiry_convert['era'] ?? "";
                var expiryEra = eraMapping[expiryEraValue] ?? "";
                $('#N7_P1').val(branch.pension_office_reference_prefecture ?? '');
                $('#N8_P1').val(branch.pension_office_reference_no_cities ?? '');
                $('#N9_P1').val(branch.pension_office_reference_no_office ?? '');
                if (branch.post_code != null) {
                    $('#N10_P1').val(branch.post_code.substring(0, 3));
                    $('#N11_P1').val(branch.post_code.substring(3, 7));
                }
                $('#N12_P1').val((branch_prefecture_data.name ?? '') + (branch.address_city ?? '') + (branch
                    .address_ward ?? '') + (branch.address_apartment ?? ''));
                $('#N13_P1').val(company.name ?? '');
                $('#N16_P1').val(branch.tel_area_code ?? '');
                $('#N17_P1').val(branch.tel_city_code ?? '');
                $('#N18_P1').val(branch.tel_subscriber_code ?? '');
                $('#N26_P1').val(employee.insurer_reference_no ?? '');
                $('#N28_P1').val((employee.last_name ? employee.last_name + '　' : '') + (employee.first_name ?? ''));
                $('#N27_P1').val((employee.last_name_kana ? employee.last_name_kana + '　' : '') + (employee.first_name_kana ??
                    ''));
                $('#N30_P1').val(birthdayEra);
                $('#N31_P1').val(birthdayConvertJapan['year'] ?? "");
                $('#N32_P1').val(birthdayConvertJapan['month'] ?? "");
                $('#N33_P1').val(birthdayConvertJapan['day'] ?? "");
                if (employee.sex === 1) {
                    $('#N34_P1_0').prop("checked", true);
                } else {
                    $('#N34_P1_1').prop("checked", true);
                }
                $('#N35_P1').val(employee.mynumber_card_no ?? '');
                if (employee.post_code != null) {
                    $('#N42_P1').val(employee.post_code.substring(0, 3));
                    $('#N43_P1').val(employee.post_code.substring(3, 7));
                }
                $('#N44_P1').val((employee_prefecture_data.name ?? '') + (employee.address_city ?? '') + (employee
                    .address_ward ?? ''));
                if (spouse !== undefined && spouse !== null) {
                    $('#N50_P1').val((spouse.last_name ? spouse.last_name + '　' : '') + (spouse.first_name ?? ''));
                    $('#N49_P1').val((spouse.last_name_kana ? spouse.last_name_kana + '　' : '') + (spouse.first_name_kana ??
                        ''));
                    $('#N53_P1').val(spouseBirthdayEra);
                    $('#N54_P1').val(spouse_birthday_convert_japan['year'] ?? "");
                    $('#N55_P1').val(spouse_birthday_convert_japan['month'] ?? "");
                    $('#N56_P1').val(spouse_birthday_convert_japan['day'] ?? "");
                    if (spouse.relationship_sex === 1) {
                        $('#N57_P1').val('1');
                    } else if (spouse.relationship_sex === 2) {
                        $('#N57_P1').val('2');
                    } else if (spouse.relationship_sex === 3) {
                        $('#N57_P1').val('3');
                    } else if (spouse.relationship_sex === 4) {
                        $('#N57_P1').val('4');
                    }
                    $('#N58_P1').val(spouse.mynumber_card_no ?? '');
                    if (spouse.country_id !== null) {
                        $('#N59_P1').val(spouse.country_name);
                        $('#N60_P1').val((spouse.last_name_kana ? spouse.last_name_kana + '　' : '') + (spouse.first_name_kana ??
                            ''));
                        $('#N61_P1').val((spouse.last_name ? spouse.last_name + '　' : '') + (spouse.first_name ?? ''));
                    }
                    if (spouse.living_type === 1) {
                        $('#N62_P1').val('同居');
                    } else if (spouse.living_type === 2) {
                        $('#N62_P1').val('別居');
                    }
                    if (spouse.post_code != null) {
                        $('#N63_P1').val(spouse.post_code.substring(0, 3));
                        $('#N64_P1').val(spouse.post_code.substring(3, 7));
                    }
                    $('#N65_P1').val((spouse_prefecture_data.name ?? '') + (spouse.address_city ?? '') + (spouse.address_ward ??
                        '') + (spouse.address_apartment ?? ''));
                    if (spouse.tel_type === 1) {
                        $('#N66_P1').val('自宅');
                    } else if (spouse.tel_type === 2) {
                        $('#N66_P1').val('携帯');
                    } else if (spouse.tel_type === 3) {
                        $('#N66_P1').val('勤務先');
                    } else if (spouse.tel_type === 4) {
                        $('#N66_P1').val('その他');
                    }
                    $('#N68_P1').val(spouse.tel_area_code ?? '');
                    $('#N69_P1').val(spouse.tel_city_code ?? '');
                    $('#N70_P1').val(spouse.tel_subscriber_code ?? '');
                    $('#N73_P1').val(authorisationEra);
                    $('#N74_P1').val(date_of_authorisation_convert['year'] ?? "");
                    $('#N75_P1').val(date_of_authorisation_convert['month'] ?? "");
                    $('#N76_P1').val(date_of_authorisation_convert['day'] ?? "");
                    $('#N78_P1').val(expiryEra);
                    $('#N79_P1').val(date_of_expiry_convert['year'] ?? "");
                    $('#N80_P1').val(date_of_expiry_convert['month'] ?? "");
                    $('#N81_P1').val(date_of_expiry_convert['day'] ?? "");
                    if (spouse.dependent_reason_type === 1) {
                        $('#N82_P1').val('配偶者の就職');
                    } else if (spouse.dependent_reason_type === 2) {
                        $('#N82_P1').val('婚姻');
                    } else if (spouse.dependent_reason_type === 3) {
                        $('#N82_P1').val('離婚');
                    } else if (spouse.dependent_reason_type === 4) {
                        $('#N82_P1').val('収入減少');
                    } else if (spouse.dependent_reason_type === 5) {
                        $('#N82_P1').val('その他');
                    }
                    if (spouse.category3_insured_occupation_type === 1) {
                        $('#N88_P1').val('無職');
                    } else if (spouse.category3_insured_occupation_type === 2) {
                        $('#N88_P1').val('パート');
                    } else if (spouse.category3_insured_occupation_type === 3) {
                        $('#N88_P1').val('年金受給者');
                    } else if (spouse.category3_insured_occupation_type === 4) {
                        $('#N88_P1').val('その他');
                    }
                    $('#N89_P1').val(spouse.category3_insured_occupation ?? '');
                    $('#N90_P1').val(spouse.annual_income ?? '');
                    if (spouse.special_requirements_applicable_flg === 0) {
                        $('#N91_P1').val('2');
                    } else {
                        $('#N91_P1').val('1');
                    }
                    if (spouse.special_requirements_applicable_reason_type === 1) {
                        $('#N97_P1').val('1');
                    } else if (spouse.special_requirements_applicable_reason_type === 2) {
                        $('#N97_P1').val('2');
                    } else if (spouse.special_requirements_applicable_reason_type === 3) {
                        $('#N97_P1').val('3');
                    } else if (spouse.special_requirements_applicable_reason_type === 4) {
                        $('#N97_P1').val('4');
                    } else if (spouse.special_requirements_applicable_reason_type === 5) {
                        $('#N97_P1').val('5');
                    }
                    $('#N98_P1').val(spouse.special_requirements_applicable_reason ?? '');
                    if (spouse.special_requirements_non_applicable_reason_type === 1) {
                        $('#N104_P1').val('1');
                    } else {
                        $('#N104_P1').val('2');
                    }
                    $('#N109_P1').val(spouse.special_requirements_non_applicable_reason ?? '');
                }

                if (spouse !== undefined && spouse !== null) {
                    $('#N2').val(spouse.mynumber_card_no ?? '');
                    $('#N3').val((spouse.last_name ? spouse.last_name + '　' : '') + (spouse.first_name ?? ''));
                    $('#N5').val(spouseBirthdayEra);
                    $('#N6').val(spouse_birthday_convert_japan['year'] ?? "");
                    $('#N7').val(spouse_birthday_convert_japan['month'] ?? "");
                    $('#N8').val(spouse_birthday_convert_japan['day'] ?? "");
                    $('#N57_P1').val(spouse.relationship_spouse ?? "");
                }
                $('#N9').val(employee.mynumber_card_no ?? '');
                $('#N10').val((employee.last_name_kana ? employee.last_name_kana + '　' : '') + (employee.first_name_kana ??
                    ''));
                $('#N11').val((employee.last_name ? employee.last_name + '　' : '') + (employee.first_name ??
                    ''));
                $('#N13').val(birthdayEra);
                $('#N14').val(birthdayConvertJapan['year'] ?? "");
                $('#N15').val(birthdayConvertJapan['month'] ?? "");
                $('#N16').val(birthdayConvertJapan['day'] ?? "");
                if (branch.post_code != null) {
                    $('#N17').val(branch.post_code.substring(0, 3));
                    $('#N18').val(branch.post_code.substring(3, 7));
                }
                $('#N19').val((branch_prefecture_data.name ?? '') + (branch.address_city ?? '') + (branch
                    .address_ward ?? '') + (branch.address_apartment ?? ''));
                $('#N20').val(company.name ?? '');
                $('#N23').val(branch.tel_area_code ?? '');
                $('#N24').val(branch.tel_city_code ?? '');
                $('#N25').val(branch.tel_subscriber_code ?? '');

                if (spouse !== undefined && spouse !== null) {
                    $('#N2_1').val(spouse.mynumber_card_no ?? '');
                    $('#N3_1').val((spouse.last_name ? spouse.last_name + '　' : '') + (spouse.first_name ?? ''));
                    $('#N5_1').val(spouseBirthdayEra);
                    $('#N6_1').val(spouse_birthday_convert_japan['year'] ?? "");
                    $('#N7_1').val(spouse_birthday_convert_japan['month'] ?? "");
                    $('#N8_1').val(spouse_birthday_convert_japan['day'] ?? "");
                }
                $('#N9_1').val(employee.mynumber_card_no ?? '');
                $('#N10_1').val((employee.last_name_kana ? employee.last_name_kana + '　' : '') + (employee.first_name_kana ??
                    ''));
                $('#N11_1').val((employee.last_name ? employee.last_name + '　' : '') + (employee.first_name ?? ''));
                $('#N13_1').val(birthdayEra);
                $('#N14_1').val(birthdayConvertJapan['year'] ?? "");
                $('#N15_1').val(birthdayConvertJapan['month'] ?? "");
                $('#N16_1').val(birthdayConvertJapan['day'] ?? "");
                if (branch.post_code != null) {
                    $('#N21_1').val(branch.post_code.substring(0, 3));
                    $('#N22_1').val(branch.post_code.substring(3, 7));
                }
                $('#N23_1').val((branch_prefecture_data.name ?? '') + (branch.address_city ?? '') + (branch
                    .address_ward ?? '') + (branch.address_apartment ?? ''));
                $('#N24_1').val(company.name ?? '');
                $('#N27_1').val(branch.tel_area_code ?? '');
                $('#N28_1').val(branch.tel_city_code ?? '');
                $('#N29_1').val(branch.tel_subscriber_code ?? '');
            }

            Livewire.on('onSelectEmployee', ({
                data
            }) => {
                insertDataFromEmployee(data)
            });
            $('#N14_P1').on('input', function() {
                $('#N21').val($(this).val());
            });
            $('#N58_P1').on('input', function() {
                $('#N2').val($(this).val());
            });
            $('#N50_P1').on('input', function() {
                $('#N3').val($(this).val());
            });
            $('#N53_P1').on('change', function() {
                $('#N5').val($(this).val());
            });
            $('#N54_P1').on('input', function() {
                $('#N6').val($(this).val());
            });
            $('#N55_P1').on('input', function() {
                $('#N7').val($(this).val());
            });
            $('#N56_P1').on('input', function() {
                $('#N8').val($(this).val());
            });
            $('#N35_P1').on('input', function() {
                $('#N9').val($(this).val());
            });
            $('#N27_P1').on('input', function() {
                $('#N10').val($(this).val());
            });
            $('#N28_P1').on('input', function() {
                $('#N11').val($(this).val());
            });
            $('#N30_P1').on('change', function() {
                $('#N13').val($(this).val());
            });
            $('#N31_P1').on('input', function() {
                $('#N14').val($(this).val());
            });
            $('#N32_P1').on('input', function() {
                $('#N15').val($(this).val());
            });
            $('#N33_P1').on('input', function() {
                $('#N16').val($(this).val());
            });
            $('#N10_P1').on('input', function() {
                $('#N17').val($(this).val());
            });
            $('#N11_P1').on('input', function() {
                $('#N18').val($(this).val());
            });
            $('#N12_P1').on('input', function() {
                $('#N19').val($(this).val());
            });
            $('#N13_P1').on('input', function() {
                $('#N20').val($(this).val());
            });
            $('#N14_P1').on('input', function() {
                $('#N21').val($(this).val());
            });
            $('#N16_P1').on('input', function() {
                $('#N23').val($(this).val());
            });
            $('#N17_P1').on('input', function() {
                $('#N24').val($(this).val());
            });
            $('#N18_P1').on('input', function() {
                $('#N25').val($(this).val());
            });
            $('#N58_P1').on('input', function() {
                $('#N2_1').val($(this).val());
            });
            $('#N50_P1').on('input', function() {
                $('#N3_1').val($(this).val());
            });
            $('#N53_P1').on('change', function() {
                $('#N5_1').val($(this).val());
            });
            $('#N54_P1').on('input', function() {
                $('#N6_1').val($(this).val());
            });
            $('#N55_P1').on('input', function() {
                $('#N7_1').val($(this).val());
            });
            $('#N56_P1').on('input', function() {
                $('#N8_1').val($(this).val());
            });
            $('#N35_P1').on('input', function() {
                $('#N9_1').val($(this).val());
            });
            $('#N27_P1').on('input', function() {
                $('#N10_1').val($(this).val());
            });
            $('#N28_P1').on('input', function() {
                $('#N11_1').val($(this).val());
            });
            $('#N30_P1').on('change', function() {
                $('#N13_1').val($(this).val());
            });
            $('#N31_P1').on('input', function() {
                $('#N14_1').val($(this).val());
            });
            $('#N32_P1').on('input', function() {
                $('#N15_1').val($(this).val());
            });
            $('#N33_P1').on('input', function() {
                $('#N16_1').val($(this).val());
            });
            $('#N10_P1').on('input', function() {
                $('#N21_1').val($(this).val());
            });
            $('#N11_P1').on('input', function() {
                $('#N22_1').val($(this).val());
            });
            $('#N12_P1').on('input', function() {
                $('#N23_1').val($(this).val());
            });
            $('#N13_P1').on('input', function() {
                $('#N24_1').val($(this).val());
            });
            $('#N14_P1').on('input', function() {
                $('#N25_1').val($(this).val());
            });
            $('#N16_P1').on('input', function() {
                $('#N27_1').val($(this).val());
            });
            $('#N17_P1').on('input', function() {
                $('#N28_1').val($(this).val());
            });
            $('#N18_P1').on('input', function() {
                $('#N29_1').val($(this).val());
            });
            $('#N19_P1').on('input', function() {
                $('#N34_1').val($(this).val());
            });
            $('#N19_P1').on('input', function() {
                $('#N30').val($(this).val());
            });
        </script>

        @slot('footer')
            <script src="{{ asset('/js/ledger-form.js') }}" type="module"></script>
            <script>
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
                $(document).ready(function() {
                    $("#ledger-form").submit(function(event) {
                        if (!$("#certificate_checkbox_1").prop("checked")) {
                            $("#sample1 input").removeAttr("name");
                            $("#sample1 select").removeAttr("name");
                        }
                        if (!$("#certificate_checkbox_2").prop("checked")) {
                            $("#sample2 input").removeAttr("name");
                            $("#sample2 select").removeAttr("name");
                        }
                    });
                });
            </script>
        @endslot
    </section>
</x-layout>
