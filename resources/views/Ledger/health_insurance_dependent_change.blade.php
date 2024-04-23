<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<x-layout title="健康保険被扶養者（異動）・国民年金第３号被保険者関係届（２０２２年１０月以降手続き）">
    <section class="content">
        @slot('header')
        <link rel="stylesheet" href="{{asset('/css/ledger-form.css')}}">

        <style type="text/css"></style>
        @endslot
        <h1 class="mt-2">健康保険被扶養者（異動）・国民年金第３号被保険者関係届（２０２２年１０月以降手続き）</h1>
        <p>申請・届出に関する事項を入力してください。
        </p>
        @if($certificate == false)
        <div class="ui warning message" style="margin: 0;">
            <div class="header">
                電子証明書が登録されていません
            </div>
        </div>
        @endif

        <div id="ledger-step1" class="step-view active mb-2">
            <form id="ledger-form" action="" method="post">
                @csrf
                @if(session('errors'))
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
                    </div>
                    <div class="right-col">
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
                                    <x-form.health_insurance_dependent_change :dataUri="$dataUri1" />
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
                    @if($certificate == false)
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


        <!-- 会社情報のセット ここから -->
        <script type="module">
            $(document).ready(function () {
            $('#N4_P1').val( '{{ old("submission_year", $today["year"]) }}' );
            $('#N5_P1').val( '{{ old("submission_month", $today["month"]) }}' );
            $('#N6_P1').val( '{{ old("submission_date", $today["date"]) }}' );
            $('#N22_P1').val( '{{ old("accepted_year", $yesterday["year"]) }}' );
            $('#N23_P1').val( '{{ old("accepted_month", $yesterday["month"]) }}' );
            $('#N24_P1').val( '{{ old("accepted_date", $yesterday["date"]) }}' );
            $('#N27').val( '{{ old("submission_year", $today["year"]) }}' );
            $('#N28').val( '{{ old("submission_month", $today["month"]) }}' );
            $('#N29').val( '{{ old("submission_date", $today["date"]) }}' );
            $('#N31_1').val( '{{ old("submission_year", $today["year"]) }}' );
            $('#N32_1').val( '{{ old("submission_month", $today["month"]) }}' );
            $('#N33_1').val( '{{ old("submission_date", $today["date"]) }}' );
        });
        </script>
        <!-- 会社情報のセット ここまで -->

        <!-- 従業員・支店情報のセット ここから -->
        <script type="module">
            function insertDataFromEmployee(data) {
            const employee = data['employee'];
            const branch = data['branch'];
            const spouse = data['spouse'];
            const headquarters = data['headquarters'];

            // ここに従業員と紐づく支店情報をinputに入れる処理
            // 例：
            $('#N7_P1').val(headquarters.pension_office_reference_prefecture ?? '');
            $('#N8_P1').val(headquarters.pension_office_reference_no_cities ?? '');
            $('#N9_P1').val(headquarters.pension_office_reference_no_office ?? '');
            if(headquarters.post_code != null){
                $('#N10_P1').val(headquarters.post_code.substring(0, 3));
                $('#N11_P1').val(headquarters.post_code.substring(3, 7));
            }
            if(headquarters.address_prefecture  !== null){
                if(headquarters.address_apartment  !== null){
                    $('#N12_P1').val((headquarters.address_prefecture ?? '') + (headquarters.address_city ?? '') + (headquarters.address_ward ?? '') + (headquarters.address_apartment ?? ''));
                }else {
                    $('#N12_P1').val((headquarters.address_prefecture ?? '') + (headquarters.address_city ?? '') + (headquarters.address_ward ?? ''));
                }
            }
            $('#N13_P1').val(headquarters.name ?? '');
            $('#N16_P1').val(headquarters.tel_area_code ?? '');
            $('#N17_P1').val(headquarters.tel_city_code ?? '');
            $('#N18_P1').val(headquarters.tel_subscriber_code ?? '');
            $('#N28_P1').val((employee.last_name ? employee.last_name + '　' : '') + (employee.first_name ?? ''));
            $('#N27_P1').val((employee.last_name_kana ? employee.last_name_kana + '　' : '')  + (employee.first_name_kana ?? ''));
            if(employee.sex === 1){
                $('#N34_P1_0').prop("checked", true);
            } else {
                $('#N34_P1_1').prop("checked", true);
            }
            $('#N35_P1').val(employee.mynumber_card_no ?? '');
            if(employee.post_code != null){
                $('#N42_P1').val(employee.post_code.substring(0, 3));
                $('#N43_P1').val(employee.post_code.substring(3, 7));
            }
            if(employee.address_prefecture  !== null){
                if(employee.address_apartment  !== null){
                    $('#N44_P1').val((employee.address_prefecture ?? '') + (employee.address_city ?? '') + (employee.address_ward ?? '') + (employee.address_apartment ?? ''));
                }else {
                    $('#N44_P1').val((employee.address_prefecture ?? '') + (employee.address_city ?? '') + (employee.address_ward ?? ''));
                }
            }
            if (spouse !== undefined && spouse !== null){
                $('#N50_P1').val((spouse.last_name ? spouse.last_name + '　' : '') + (spouse.first_name ?? ''));
                $('#N49_P1').val((spouse.last_name_kana ? spouse.last_name_kana + '　' : '')  + (spouse.first_name_kana ?? ''));
                if(spouse.relationship_sex === 1){
                    $('#N57_P1').val('1');
                } else if(spouse.relationship_sex === 2){
                    $('#N57_P1').val('2');
                } else if(spouse.relationship_sex === 3){
                    $('#N57_P1').val('3');
                } else if(spouse.relationship_sex === 4){
                    $('#N57_P1').val('4');
                }
                $('#N58_P1').val(spouse.mynumber_card_no ?? '');
                if(spouse.country_id !== null){
                    $('#N59_P1').val(spouse.country_name);
                    $('#N60_P1').val((spouse.last_name_kana ? spouse.last_name_kana + '　' : '')  + (spouse.first_name_kana ?? ''));
                    $('#N61_P1').val((spouse.last_name ? spouse.last_name + '　' : '') + (spouse.first_name ?? ''));
                }
                if(spouse.living_type === 1){
                    $('#N62_P1').val('同居');
                } else if(spouse.living_type === 2){
                    $('#N62_P1').val('別居');
                }
                if(spouse.post_code != null){
                    $('#N63_P1').val(spouse.post_code.substring(0, 3));
                    $('#N64_P1').val(spouse.post_code.substring(3, 7));
                }
                if(spouse.address_prefecture  !== null){
                    if(spouse.address_apartment  !== null){
                        $('#N65_P1').val(spouse.address_prefecture+spouse.address_city+spouse.address_ward+spouse.address_apartment);
                    }else {
                        $('#N65_P1').val(spouse.address_prefecture+spouse.address_city+spouse.address_ward);
                    }
                }
                if(spouse.tel_type === 1){
                    $('#N66_P1').val('自宅');
                } else if(spouse.tel_type === 2){
                    $('#N66_P1').val('携帯');
                } else if(spouse.tel_type === 3){
                    $('#N66_P1').val('勤務先');
                } else if(spouse.tel_type === 4){
                    $('#N66_P1').val('その他');
                }
                $('#N68_P1').val(spouse.tel_area_code ?? '');
                $('#N69_P1').val(spouse.tel_city_code ?? '');
                $('#N70_P1').val(spouse.tel_subscriber_code ?? '');
                if(spouse.dependent_reason_type === 1){
                    $('#N82_P1').val('配偶者の就職');
                } else if(spouse.dependent_reason_type === 2){
                    $('#N82_P1').val('婚姻');
                } else if(spouse.dependent_reason_type === 3){
                    $('#N82_P1').val('離婚');
                } else if(spouse.dependent_reason_type === 4){
                    $('#N82_P1').val('収入減少');
                } else if(spouse.dependent_reason_type === 5){
                    $('#N82_P1').val('その他');
                }
                if(spouse.category3_insured_occupation_type === 1){
                    $('#N88_P1').val('無職');
                } else if(spouse.category3_insured_occupation_type === 2){
                    $('#N88_P1').val('パート');
                } else if(spouse.category3_insured_occupation_type === 3){
                    $('#N88_P1').val('年金受給者');
                } else if(spouse.category3_insured_occupation_type === 4){
                    $('#N88_P1').val('その他');
                }
                $('#N89_P1').val(spouse.category3_insured_occupation ?? '');
                $('#N90_P1').val(spouse.annual_income ?? '');
                if(spouse.special_requirements_applicable_flg === 0){
                    $('#N91_P1').val('2');
                } else {
                    $('#N91_P1').val('1');
                }
                if(spouse.special_requirements_applicable_reason_type === 1){
                    $('#N97_P1').val('1');
                } else if(spouse.special_requirements_applicable_reason_type === 2){
                    $('#N97_P1').val('2');
                } else if(spouse.special_requirements_applicable_reason_type === 3){
                    $('#N97_P1').val('3');
                } else if(spouse.special_requirements_applicable_reason_type === 4){
                    $('#N97_P1').val('4');
                } else if(spouse.special_requirements_applicable_reason_type === 5){
                    $('#N97_P1').val('5');
                }
                $('#N98_P1').val(spouse.special_requirements_applicable_reason ?? '');
                if(spouse.special_requirements_non_applicable_reason_type === 1){
                    $('#N104_P1').val('1');
                } else {
                    $('#N104_P1').val('2');
                }
                $('#N109_P1').val(spouse.special_requirements_non_applicable_reason ?? '');
            }

            // 帳票2枚目
            if (spouse !== undefined && spouse !== null){
                $('#N2').val(spouse.mynumber_card_no ?? '');
                $('#N3').val((spouse.last_name ? spouse.last_name + '　' : '') + (spouse.first_name ?? ''));
            }
            $('#N9').val(employee.mynumber_card_no ?? '');
            $('#N10').val((employee.last_name ? employee.last_name + '　' : '') + (employee.first_name ?? ''));
            $('#N11').val((employee.last_name_kana ? employee.last_name_kana + '　' : '') + (employee.first_name_kana ?? ''));
            if(headquarters.post_code != null){
                $('#N17').val(headquarters.post_code.substring(0, 3));
                $('#N18').val(headquarters.post_code.substring(3, 7));
            }
            if(headquarters.address_prefecture  !== null){
                if(headquarters.address_apartment  !== null){
                    $('#N19').val((headquarters.address_prefecture ?? '') + (headquarters.address_city ?? '') + (headquarters.address_ward ?? '') + (headquarters.address_apartment ?? ''));
                }else {
                    $('#N19').val((headquarters.address_prefecture ?? '') + (headquarters.address_city ?? '') + (headquarters.address_ward ?? ''));
                }
            }
            $('#N20').val(headquarters.name ?? '');
            $('#N23').val(headquarters.tel_area_code ?? '');
            $('#N24').val(headquarters.tel_city_code ?? '');
            $('#N25').val(headquarters.tel_subscriber_code ?? '');

            // 帳票3枚目
            if (spouse !== undefined && spouse !== null){
                $('#N2_1').val(spouse.mynumber_card_no ?? '');
                $('#N3_1').val((spouse.last_name ? spouse.last_name + '　' : '') + (spouse.first_name ?? ''));
            }
            $('#N9_1').val(employee.mynumber_card_no ?? '');
            $('#N10_1').val((employee.last_name_kana ? employee.last_name_kana + '　' : '') + (employee.first_name_kana ?? ''));
            $('#N11_1').val((employee.last_name ? employee.last_name + '　' : '') + (employee.first_name ?? ''));
            if(headquarters.post_code != null){
                $('#N21_1').val(headquarters.post_code.substring(0, 3));
                $('#N22_1').val(headquarters.post_code.substring(3, 7));
            }
            if(headquarters.address_prefecture  !== null){
                if(headquarters.address_apartment  !== null){
                    $('#N23_1').val((headquarters.address_prefecture ?? '') + (headquarters.address_city ?? '') + (headquarters.address_ward ?? '') + (headquarters.address_apartment ?? ''));
                }else {
                    $('#N23_1').val((headquarters.address_prefecture ?? '') + (headquarters.address_city ?? '') + (headquarters.address_ward ?? ''));
                }
            }
            $('#N24_1').val(headquarters.name ?? '');
            $('#N27_1').val(headquarters.tel_area_code ?? '');
            $('#N28_1').val(headquarters.tel_city_code ?? '');
            $('#N29_1').val(headquarters.tel_subscriber_code ?? '');
        }

        // 選択イベントを通してlivewireからデータを受け取る
        Livewire.on('onSelectEmployee', ({ data }) => {insertDataFromEmployee(data)});
        var eraMapping = {
            '5': '昭和',
            '7': '平成',
            '9': '令和',
        };
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
            $('#N5').val(eraMapping[$(this).val()]);
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
            $('#N13').val(eraMapping[$(this).val()]);
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
            $('#N5_1').val(eraMapping[$(this).val()]);
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
            $('#N13_1').val(eraMapping[$(this).val()]);
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
        <!-- 従業員・支店情報のセット ここまで -->

        @slot('footer')
        <!-- 帳票用の共通jsを読み込む -->
        <script src="{{asset('/js/ledger-form.js')}}" type="module"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.ui.tabular.menu .item');
            const contents = document.querySelectorAll('.ui.bottom.attached.segment');
            tabs.forEach((tab, index) => {
                tab.addEventListener('click', function () {
                    tabs.forEach((t) => t.classList.remove('active'));
                    tab.classList.add('active');
                    contents.forEach((c) => c.style.display = 'none');
                    contents[index].style.display = 'block';
                });
            });
        });
        </script>
        <script>
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
