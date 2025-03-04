<!-- 4950008680035000 -->
<!-- 雇用保険被保険者資格喪失届（離職票交付あり）（令和４年６月以降手続き）/雇用保険被保険者離職証明書 -->

<DIV style="position:relative; left:0px; top:0px; width:1566px; height:2320px;">
    <style>
        :not(.preview-area) input[type="text"].clear:disabled {
            color: gray !important;
        }
    </style>
    <script type="text/javascript">
        function calc1(f) {
            if (f.salary_amount_A.value == "" && f.salary_amount_B.value == "") {
                f.salary_amount_total.value = "";
            } else if (f.salary_amount_A.value.match(/\s|　/) || f.salary_amount_B.value.match(/\s|　/)) {
                return;
            } else if (isNaN(f.salary_amount_A.value) == false && isNaN(f.salary_amount_B.value) == false) {
                f.salary_amount_total.value = (f.salary_amount_A.value - 0) + (f.salary_amount_B.value - 0);
            } else {
                return;
            }
        }

        function calc2(f, line) {
            if ((f.elements["salary_amount_A_" + line].value) == "" && (f.elements["salary_amount_B_" + line].value) ==
                "") {
                f.elements["salary_amount_total_" + line].value = "";
            } else if (f.elements["salary_amount_A_" + line].value.match(/\s|　/) || f.elements["salary_amount_B_" + line]
                .value.match(/\s|　/)) {
                return;
            } else if (isNaN(f.elements["salary_amount_A_" + line].value) == false && isNaN(f.elements["salary_amount_B_" +
                    line].value) == false) {
                f.elements["salary_amount_total_" + line].value = (f.elements["salary_amount_A_" + line].value - 0) + (f
                    .elements["salary_amount_B_" + line].value - 0);
            } else {
                return;
            }
        }

        function calc3(f, line) {
            if ((f.elements["salary_amount_A_" + line].value) == "" && (f.elements["salary_amount_B_" + line].value) ==
                "") {
                f.elements["salary_amount_total_" + line].value = "";
                check_item_gw(f, 314);
            } else if (f.elements["salary_amount_A_" + line].value.match(/\s|　/) || f.elements["salary_amount_B_" + line]
                .value.match(/\s|　/)) {
                return;
            } else if (isNaN(f.elements["salary_amount_A_" + line].value) == false && isNaN(f.elements["salary_amount_B_" +
                    line].value) == false) {
                f.elements["salary_amount_total_" + line].value = (f.elements["salary_amount_A_" + line].value - 0) + (f
                    .elements["salary_amount_B_" + line].value - 0);
            } else {
                return;
            }
        }

        function renderRetirementForms() {
            const clears = document.querySelectorAll(':not(.preview-area) input.clear');
            clears.forEach(el => {
                el.disabled = true;
            });

            const checks = document.querySelectorAll(':not(.preview-area) input.check');
            checks.forEach(el => {
                if (el.checked) {
                    const cat = el.dataset.cat;
                    switch (cat) {
                        case "c2":
                            const c2 = document.querySelectorAll(':not(.preview-area) input.clear.c2');
                            c2.forEach(input => {
                                input.disabled = false;
                            });

                            const c2_radio = document.querySelector(
                                ':not(.preview-area) input.clear.c2[data-cat="c_2"]:checked');
                            if (c2_radio) {
                                if (c2_radio.value == "無") {
                                    const c_2 = document.querySelectorAll(
                                        ':not(.preview-area) input.clear.c_2');
                                    c_2.forEach(input => {
                                        input.disabled = false;
                                    });
                                    const c_2_radio = document.querySelector(
                                        ':not(.preview-area) input.clear.c_2:checked');
                                    if (c_2_radio) {
                                        if (c_2_radio.value == "その他") {
                                            const c2_c = document.querySelector(
                                                ':not(.preview-area) input.clear.c2-c');
                                            c2_c.disabled = false;
                                        }
                                    }
                                }
                            }
                            break;
                        case "c3-1":
                            const c3_1 = document.querySelectorAll(
                                ':not(.preview-area) input.clear.c3-1');
                            c3_1.forEach(input => {
                                input.disabled = false;
                            });
                            break;
                        case "c3-2":
                            const c312 = document.querySelectorAll(
                                ':not(.preview-area) input.clear.c3-1-2');
                            c312.forEach(input => {
                                input.disabled = false;
                            });
                            const c312_radio = document.querySelector(
                                ':not(.preview-area) input.clear.c3-1-2:checked');
                            if (c312_radio) {
                                if (c312_radio.value == "常時雇用される労働者") {
                                    const c3121 = document.querySelectorAll(
                                        ':not(.preview-area) input.clear.c3-1-2-1');
                                    c3121.forEach(input => {
                                        input.disabled = false;
                                    });
                                } else if (c312_radio.value == "常時雇用される労働者以外") {
                                    const c3122 = document.querySelectorAll(
                                        ':not(.preview-area) input.clear.c3-1-2-2');
                                    c3122.forEach(input => {
                                        input.disabled = false;
                                    });
                                }
                            }
                            break;
                        case "c4-3-2":
                            const c432 = document.querySelectorAll(
                                ':not(.preview-area) input.clear.c4-3-2');
                            c432.forEach(input => {
                                input.disabled = false;
                            });
                            break;
                        case "c5-1-5":
                            const c515 = document.querySelectorAll(
                                ':not(.preview-area) input.clear.c5-1-5');
                            c515.forEach(input => {
                                input.disabled = false;
                            });
                            break;
                        case "c5-1-6":
                            const c516 = document.querySelectorAll(
                                ':not(.preview-area) input.clear.c5-1-6');
                            c516.forEach(input => {
                                input.disabled = false;
                            });
                            break;
                        case "c5-1-7":
                            const c517 = document.querySelectorAll(
                                ':not(.preview-area) input.clear.c5-1-7');
                            c517.forEach(input => {
                                input.disabled = false;
                            });
                            break;
                        case "c6":
                            const c6 = document.querySelectorAll(
                                ':not(.preview-area) input.clear.c6');
                            c6.forEach(input => {
                                input.disabled = false;
                            });
                            break;
                        default:
                            break;
                    }
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            renderRetirementForms();

            const checks = document.querySelectorAll(':not(.preview-area) input.check');
            checks.forEach(el => {
                el.addEventListener('click', (e) => {
                    const own = e.target.checked;
                    checks.forEach(c => {
                        c.checked = false;
                    });
                    if (own) {
                        e.target.checked = true;
                    }
                    renderRetirementForms();
                });
            });

            const clears = document.querySelectorAll(':not(.preview-area) input.clear.call-render');
            clears.forEach(el => {
                el.addEventListener('change', () => {
                    renderRetirementForms();
                });
            });
        });

        function updateInputFields() {
            var checkboxYes = document.getElementById('J128_005F_97A3_9045_979D_9752_82C9_88D9_8B63_82CC_974C_96B3');
            var checkboxNo = document.getElementById('J128_005F_97A3_9045_979D_9752_82C9_88D9_8B63_82CC_974C_96B33');
            var inputJ129 = document.getElementById('J129_005F_8F90_96BC_9793');
            var inputJ9 = document.getElementById('J9_005F_97A3_9045_8ED2_8E81_96BC');

            if (checkboxYes.checked) {
                inputJ129.value = inputJ9.value;
                inputJ129.disabled = false;
            } else if (checkboxNo.checked) {
                inputJ129.value = '';
                inputJ129.disabled = true;
            }
        }

        window.onload = function() {
            var checkboxYes = document.getElementById('J128_005F_97A3_9045_979D_9752_82C9_88D9_8B63_82CC_974C_96B3');
            var checkboxNo = document.getElementById('J128_005F_97A3_9045_979D_9752_82C9_88D9_8B63_82CC_974C_96B33');

            checkboxYes.addEventListener('change', updateInputFields);
            checkboxNo.addEventListener('change', updateInputFields);
        };
    </script>

    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:819px; top:113px; width:671px; height:981px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:905px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:651px; top:944px; width:77px; height:24px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; line-height:normal; padding:10px 0px 0px 0px;">A-250046-004_1</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:739px; top:944px; width:31px; height:24px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; line-height:normal; padding:6px 0px 0px 0px;">0</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:34px; width:146px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">様式第５号（第７条関係）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:186px; top:22px; width:427px; height:23px; text-align:center; font-size:20px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">雇用保険被保険者離職証明書(安定所提出用)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:704px; top:3px; width:77px; height:42px; font-size:38px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1"
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:38px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:77px; max-width:77px; height:42px;"
            type="TEXT" id="J1_005F_925A_8E9E_8AD4_984A_93AD_8ED2" name="J1" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:49px; width:248px; height:66px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:48px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:49px; width:77px; height:32px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:35px; top:53px; width:35px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（１）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:39px; top:66px; width:66px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">被保険者番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:110px; top:49px; width:172px; height:32px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:121px; top:56px; width:35px; height:19px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="1" onChange="return(check_item_gw(this.form,1));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:35px; max-width:35px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85" name="employment_insured_no_4"
            value="{{ old('employment_insured_no_4') }}" maxlength="4" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:160px; top:57px; width:13px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:177px; top:56px; width:49px; height:19px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="2" onChange="return(check_item_gw(this.form,2));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:49px; max-width:49px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85" name="employment_insured_no_6"
            value="{{ old('employment_insured_no_6') }}" maxlength="6" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:230px; top:57px; width:13px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:247px; top:56px; width:15px; height:19px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="3" onChange="return(check_item_gw(this.form,3));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:15px; max-width:15px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD" name="employment_insured_no_CD"
            value="{{ old('employment_insured_no_CD') }}" maxlength="1" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:83px; width:77px; height:32px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:35px; top:87px; width:35px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（２）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:39px; top:99px; width:66px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">事業所番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:110px; top:83px; width:172px; height:32px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:121px; top:90px; width:35px; height:19px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="4" onChange="return(check_item_gw(this.form,4));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:35px; max-width:35px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J5_005F_8E96_8BC6_8F8A_94D4_8D864_8C85" name="insurance_office_no_4"
            value="{{ old('insurance_office_no_4') }}" maxlength="4" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:160px; top:91px; width:13px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:177px; top:90px; width:49px; height:19px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="5" onChange="return(check_item_gw(this.form,5));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:49px; max-width:49px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J6_005F_8E96_8BC6_8F8A_94D4_8D866_8C85" name="insurance_office_no_6"
            value="{{ old('insurance_office_no_6') }}" maxlength="6" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:230px; top:91px; width:13px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:247px; top:90px; width:15px; height:19px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="6" onChange="return(check_item_gw(this.form,6));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:15px; max-width:15px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J7_005F_8E96_8BC6_8F8A_94D4_8D86CD" name="insurance_office_no_CD"
            value="{{ old('insurance_office_no_CD') }}" maxlength="1" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:281px; top:49px; width:28px; height:32px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:15px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:282px; top:53px; width:32px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（３）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:281px; top:83px; width:70px; height:32px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:15px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:285px; top:95px; width:54px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離職者氏名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:350px; top:49px; width:230px; line-height:34px; height:35px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="7" onChange="return(check_item_gw(this.form,7));"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 10px 0px 0px; width:228px; height:32px; ime-mode:active;"
            id="J8_005F_97A3_9045_8ED2_8E81_96BC_005F_8374_838A_834B_8369" name="name_kana"
            value="{{ old('name_kana') }}" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:350px; top:83px; width:230px; line-height:30px; height:32px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="8" onChange="return(check_item_gw(this.form,8));"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 10px 0px 0px; width:228px; height:29px; ime-mode:active;"
            id="J9_005F_97A3_9045_8ED2_8E81_96BC" name="name" value="{{ old('name') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:579px; top:49px; width:45px; height:66px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:48px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:580px; top:53px; width:35px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（４）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:586px; top:68px; width:32px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離　職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:586px; top:91px; width:32px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年月日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:623px; top:49px; width:60px; height:66px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:48px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:628px; top:75px; width:48px; height:16px; font-size:10px;"><SELECT
            size="1" tabindex="9" onChange="return(check_item_gw(this.form,12));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:10px; font-family:'ＭＳ 明朝', serif; width:48px; height:16px;"
            id="J11_005F_944E_8D86" name="retirement_date_era" value="{{ old('retirement_date_era') }}" disabled>
            <OPTION value="平成">平成</OPTION>
            <OPTION value="令和" selected="selected">令和</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:682px; top:49px; width:34px; height:66px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:48px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:698px; top:52px; width:12px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:687px; top:74px; width:23px; height:18px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="9" onChange="return(check_item_gw(this.form,9));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:23px; max-width:23px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J12_005F_944" name="retirement_date_year" value="{{ old('retirement_date_year') }}"
            maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:715px; top:49px; width:34px; height:66px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:48px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:733px; top:52px; width:12px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:721px; top:74px; width:23px; height:18px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="10" onChange="return(check_item_gw(this.form,10));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:23px; max-width:23px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J13_005F_8C8" name="retirement_date_month"
            value="{{ old('retirement_date_month') }}" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:748px; top:49px; width:34px; height:66px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:48px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:766px; top:52px; width:12px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:754px; top:74px; width:23px; height:18px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="11" onChange="return(check_item_gw(this.form,11));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:23px; max-width:23px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J14_005F_93F" name="retirement_date_day" value="{{ old('retirement_date_day') }}"
            maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:114px; width:77px; height:75px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:57px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:35px; top:118px; width:35px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（５）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:144px; width:33px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">事業所</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:74px; top:125px; width:32px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">名　称</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:74px; top:148px; width:32px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">所在地</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:63px; top:173px; width:43px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">電話番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:110px; top:114px; width:313px; height:75px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:57px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:152px; top:173px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:207px; top:173px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:114px; top:116px; width:297px; line-height:26px; height:26px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="12"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 10px 0px 0px; width:297px; height:25px; ime-mode:active;"
            id="J15_005F_96BC_8FCC" name="branch_name" value="{{ old('branch_name') }}" maxlength="40" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:114px; top:144px; width:297px; line-height:26px; height:27px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="13"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 10px 0px 0px; width:297px; height:26px; ime-mode:active;"
            id="J16_005F_8F8A_8DDD_926E" name="branch_address" value="{{ old('branch_address') }}" maxlength="40" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:114px; top:171px; width:36px; height:16px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="14"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:36px; max-width:36px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J17_005F_8E73_8A4F_8BC7_94D4" name="branch_tel_area_code"
            value="{{ old('branch_tel_area_code') }}" maxlength="5" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:169px; top:171px; width:36px; height:16px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="15"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:36px; max-width:36px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J18_005F_8E73_93E0_8BC7_94D4" name="branch_tel_city_code"
            value="{{ old('branch_tel_city_code') }}" maxlength="5" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:224px; top:171px; width:36px; height:16px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="16"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:36px; max-width:36px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J19_005F_89C1_93FC_8ED2_94D4_8D86" name="branch_tel_subscriber_code"
            value="{{ old('branch_tel_subscriber_code') }}" maxlength="5" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:422px; top:114px; width:78px; height:75px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:57px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:424px; top:118px; width:35px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（６）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:430px; top:137px; width:64px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離&nbsp;職&nbsp;者&nbsp;の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:430px; top:167px; width:64px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">住所又は居所</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:499px; top:114px; width:283px; height:75px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:57px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:502px; top:118px; width:12px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">〒</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:544px; top:118px; width:14px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:502px; top:173px; width:44px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">電話番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:598px; top:171px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:661px; top:171px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:518px; top:117px; width:23px; height:14px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="17"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:23px; max-width:23px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J20_005F_947A_9242_8BC7_94D4_8D86" name="employee_post_code_former"
            value="{{ old('employee_post_code_former') }}" maxlength="3" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:561px; top:117px; width:27px; height:14px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="18"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:27px; max-width:27px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J21_005F_92AC_88E6_94D4_8D86" name="employee_post_code_latter"
            value="{{ old('employee_post_code_latter') }}" maxlength="4" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:517px; top:134px; width:240px; line-height:34px; height:34px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="19"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:240px; height:33px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J22_005F_8F5A_8F8A" name="employee_address" value="{{ old('employee_address') }}" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:552px; top:170px; width:42px; height:16px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="20"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:42px; max-width:42px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J23_005F_8E73_8A4F_8BC7_94D4" name="employee_tel_area_code"
            value="{{ old('employee_tel_area_code') }}" maxlength="5" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:615px; top:170px; width:42px; height:16px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="21"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:42px; max-width:42px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J24_005F_8E73_93E0_8BC7_94D4" name="employee_tel_city_code"
            value="{{ old('employee_tel_city_code') }}" maxlength="5" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:678px; top:170px; width:42px; height:16px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="22"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:42px; max-width:42px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J25_005F_89C1_93FC_8ED2_94D4_8D86" name="employee_tel_subscriber_code"
            value="{{ old('employee_tel_subscriber_code') }}" maxlength="5" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:188px; width:389px; height:83px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:65px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:64px; top:192px; width:286px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">この証明書の記載は、事実に相違ないことを証明します。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:230px; width:32px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">事業主</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:81px; top:215px; width:22px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">住所</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:81px; top:245px; width:23px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">氏名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:110px; top:205px; width:297px; line-height:26px; height:27px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="23" onChange="return(check_item_gw(this.form,23));"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif;  padding:0px 10px 0px 0px; width:297px; height:26px; ime-mode:active;"
            id="J26_005F_8F5A_8F8A" name="headquarters_address" value="{{ old('headquarters_address') }}" maxlength="40"
            disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:110px; top:236px; width:290px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="24" onChange="return(check_item_gw(this.form,24));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:290px; max-width:290px; height:15px; ime-mode:active;"
            type="TEXT" id="J27_005F_8E81_96BC_005F_8FE3_9269" name="company_name"
            value="{{ old('company_name') }}" maxlength="27" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:110px; top:253px; width:290px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="25" onChange="return(check_item_gw(this.form,25));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:290px; max-width:290px; height:15px; ime-mode:active;"
            type="TEXT" id="J28_005F_8E81_96BC_005F_89BA_9269" name="employer_managerial_position_name"
            value="{{ old('employer_managerial_position_name') }}" maxlength="27" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:422px; top:188px; width:360px; height:83px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:65px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:430px; top:194px; width:65px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">※離職票交付</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:518px; top:192px; width:23px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1"
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:23px; max-width:23px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J29_005F_944E_8D86" name="J29_era" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:579px; top:194px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:621px; top:194px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:662px; top:194px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:434px; top:220px; width:55px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（交付番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:590px; top:222px; width:23px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">番）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:552px; top:192px; width:23px; height:15px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1"
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:23px; max-width:23px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J30_005F_944E" name="J30_year" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:594px; top:192px; width:23px; height:15px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1"
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:23px; max-width:23px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J31_005F_8C8E" name="J31_month" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:636px; top:192px; width:23px; height:15px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1"
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:23px; max-width:23px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J32_005F_93FA" name="J32_day" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:491px; top:220px; width:95px; height:16px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1"
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:95px; max-width:95px; height:16px;"
            type="TEXT" id="J33_005F_8CF0_9574_94D4_8D86" name="J33_number" maxlength="11" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:426px; top:247px; width:248px; height:19px; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;"><INPUT
            tabindex="-1"
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:248px; max-width:248px; height:15px; ime-mode:active;"
            type="TEXT" id="J34_005F_8CF6_8BA4_9045_8BC6_88C0_92E8_8F8A_96BC" name="J34_hello_work"
            maxlength="20" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:270px; width:748px; height:24px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:6px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:264px; top:275px; width:286px; height:15px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離&nbsp;職&nbsp;の&nbsp;日&nbsp;以&nbsp;前&nbsp;の&nbsp;賃&nbsp;金&nbsp;支&nbsp;払&nbsp;状&nbsp;況&nbsp;等</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:293px; width:195px; height:26px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:8px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:35px; top:299px; width:35px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（８）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:64px; top:299px; width:149px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">被保険者期間算定対象期間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:318px; width:153px; height:72px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:54px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:35px; top:334px; width:23px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">(A)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:64px; top:334px; width:107px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">一&nbsp;般&nbsp;被&nbsp;保&nbsp;険&nbsp;者&nbsp;等</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:364px; width:85px; height:26px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:8px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:371px; width:76px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離職日の翌日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:118px; top:364px; width:62px; height:26px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:8px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:137px; top:373px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:167px; top:373px; width:10px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:120px; top:369px; width:15px; height:15px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="26"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:15px; max-width:15px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J35_005F_8C8E" name="the_day_after_retirement_date_month"
            value="{{ old('the_day_after_retirement_date_month') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:369px; width:15px; height:15px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="27"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:15px; max-width:15px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J36_005F_93FA" name="the_day_after_retirement_date_day"
            value="{{ old('the_day_after_retirement_date_day') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:318px; width:43px; height:72px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:54px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:188px; top:326px; width:38px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">(B)短期</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:188px; top:341px; width:38px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">雇用特例</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:188px; top:356px; width:38px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">被保険者</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:293px; width:39px; height:96px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:78px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:232px; top:299px; width:35px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（９）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:231px; top:318px; width:34px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">(８)の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:232px; top:329px; width:30px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">期間に</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:232px; top:340px; width:30px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">おける</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:232px; top:352px; width:30px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">賃金支</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:232px; top:363px; width:30px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">払基礎</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:232px; top:375px; width:30px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:293px; width:154px; height:96px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:78px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:270px; top:299px; width:45px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（１０）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:274px; top:336px; width:137px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">賃&nbsp;金&nbsp;支&nbsp;払&nbsp;対&nbsp;象&nbsp;期&nbsp;間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:293px; width:39px; height:96px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:78px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:420px; top:299px; width:45px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（１１）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:420px; top:322px; width:26px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(１０)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:445px; top:322px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:424px; top:341px; width:27px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">基&nbsp;礎</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:424px; top:360px; width:27px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日&nbsp;数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:293px; width:229px; height:48px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:30px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:461px; top:299px; width:45px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（１２）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:480px; top:315px; width:171px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">賃　　　　　金　　　　　額</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:340px; width:77px; height:49px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:31px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:481px; top:358px; width:35px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">（Ａ）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:340px; width:77px; height:49px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:31px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:558px; top:358px; width:35px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">（Ｂ）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:340px; width:77px; height:49px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:31px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:634px; top:358px; width:27px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">計</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:293px; width:97px; height:96px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:78px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:689px; top:299px; width:45px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（１３）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:701px; top:335px; width:64px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">備　　　考</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:388px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:388px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:388px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:388px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:388px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:388px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:388px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:388px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:388px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="37"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J46_005F_94F5_8D6C" name="memo" value="{{ old('memo') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:415px; width:153px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:415px; width:43px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:415px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:415px; width:154px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:415px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:415px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:415px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:415px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:415px; width:97px; line-height:26px; height:27px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="52"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:24px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J61_005F_94F5_8D6C_005F1" name="memo_1" value="{{ old('memo_1') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:441px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:441px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:441px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:441px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:441px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:441px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:441px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:441px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:441px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="67"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J61_005F_94F5_8D6C_005F2" name="memo_2" value="{{ old('memo_2') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:468px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:468px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:468px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:468px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:468px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:468px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:468px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:468px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:468px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="82"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J61_005F_94F5_8D6C_005F3" name="memo_3" value="{{ old('memo_3') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:495px; width:153px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:495px; width:43px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:495px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:495px; width:154px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:495px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:495px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:495px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:495px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:495px; width:97px; line-height:26px; height:27px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="97"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:24px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J61_005F_94F5_8D6C_005F4" name="memo_4" value="{{ old('memo_4') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:521px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:521px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:521px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:521px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:521px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:521px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:521px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:521px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:521px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="112"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J61_005F_94F5_8D6C_005F5" name="memo_5" value="{{ old('memo_5') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:548px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:548px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:548px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:548px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:548px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:548px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:548px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:548px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:548px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="127"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J61_005F_94F5_8D6C_005F6" name="memo_6" value="{{ old('memo_6') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:575px; width:153px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:575px; width:43px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:575px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:575px; width:154px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:575px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:575px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:575px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:575px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:575px; width:97px; line-height:26px; height:27px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="142"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:24px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J61_005F_94F5_8D6C_005F7" name="memo_7" value="{{ old('memo_7') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:601px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:601px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:601px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:601px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:601px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:601px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:601px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:601px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:601px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="157"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J61_005F_94F5_8D6C_005F8" name="memo_8" value="{{ old('memo_8') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:628px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:628px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:628px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:628px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:628px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:628px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:628px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:628px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:628px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="172"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J61_005F_94F5_8D6C_005F9" name="memo_9" value="{{ old('memo_9') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:655px; width:153px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:655px; width:43px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:655px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:655px; width:154px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:655px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:655px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:655px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:655px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:655px; width:97px; line-height:26px; height:27px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="187"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:24px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J61_005F_94F5_8D6C_005F10" name="memo_10" value="{{ old('memo_10') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:681px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:681px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:681px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:681px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:681px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:681px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:681px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:681px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:681px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="202"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J61_005F_94F5_8D6C_005F11" name="memo_11" value="{{ old('memo_11') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:708px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:708px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:708px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:708px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:708px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:708px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:708px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:708px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:708px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="217"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J61_005F_94F5_8D6C_005F12" name="memo_12" value="{{ old('memo_12') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:398px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:398px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:398px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:125px; top:398px; width:57px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離　職　日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:190px; top:398px; width:34px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離職月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:398px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:398px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:398px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:398px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:358px; top:398px; width:57px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離　職　日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:398px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:392px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="28"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J37_005F_8C8E" name="insured_period_start_month"
            value="{{ old('insured_period_start_month') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:392px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="29"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J38_005F_93FA" name="insured_period_start_day"
            value="{{ old('insured_period_start_day') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:392px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="30"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J39_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094"
            name="basic_days_for_salary_payment_of_insured_period"
            value="{{ old('basic_days_for_salary_payment_of_insured_period') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:392px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="31"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J40_005F_8C8E" name="salary_payment_period_start_month"
            value="{{ old('salary_payment_period_start_month') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:392px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="32"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J41_005F_93FA" name="salary_payment_period_start_day"
            value="{{ old('salary_payment_period_start_day') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:392px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="33"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J42_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094"
            name="basic_days_of_salary_payment_period" value="{{ old('basic_days_of_salary_payment_period') }}"
            maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:392px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="34" onBlur="return calc1(this.form);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J43_005F_92C0_8BE0_8A7AA" name="salary_amount_A"
            value="{{ old('salary_amount_A') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:392px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="35" onBlur="return calc1(this.form);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J44_005F_92C0_8BE0_8A7AB" name="salary_amount_B"
            value="{{ old('salary_amount_B') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:392px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="36"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J45_005F_92C0_8BE0_8A7A_8C76" name="salary_amount_total"
            value="{{ old('salary_amount_total') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:424px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:424px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:424px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:424px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:424px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:424px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:424px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:424px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:424px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:424px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:424px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:424px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:424px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:451px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:451px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:451px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:451px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:451px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:451px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:451px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:451px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:451px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:451px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:451px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:451px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:451px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:478px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:478px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:478px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:478px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:478px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:478px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:478px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:478px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:478px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:478px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:478px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:478px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:478px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:504px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:504px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:504px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:504px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:504px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:504px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:504px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:504px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:504px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:504px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:504px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:504px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:504px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:531px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:531px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:531px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:531px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:531px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:531px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:531px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:531px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:531px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:531px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:531px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:531px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:531px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:558px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:558px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:558px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:558px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:558px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:558px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:558px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:558px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:558px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:558px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:558px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:558px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:558px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:584px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:584px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:584px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:584px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:584px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:584px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:584px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:584px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:584px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:584px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:584px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:584px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:584px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:611px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:611px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:611px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:611px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:611px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:611px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:611px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:611px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:611px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:611px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:611px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:611px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:611px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:638px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:638px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:638px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:638px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:638px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:638px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:638px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:638px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:638px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:638px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:638px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:638px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:638px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:664px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:664px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:664px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:664px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:664px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:664px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:664px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:664px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:664px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:664px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:664px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:664px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:664px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:691px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:691px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:691px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:691px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:691px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:691px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:691px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:691px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:691px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:691px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:691px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:691px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:691px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:718px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:718px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:718px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:718px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:718px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:718px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:718px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:718px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:718px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:718px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:718px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:718px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:718px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:419px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="38"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J47_005F_8C8E_005F1" name="insured_period_start_month_1"
            value="{{ old('insured_period_start_month_1') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:419px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="39"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J48_005F_93FA_005F1" name="insured_period_start_day_1"
            value="{{ old('insured_period_start_day_1') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:419px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="40"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J49_005F_8C8E_005F1" name="insured_period_end_month_1"
            value="{{ old('insured_period_end_month_1') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:419px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="41"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J50_005F_93FA_005F1" name="insured_period_end_day_1"
            value="{{ old('insured_period_end_day_1') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:419px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="42"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J51_005F_8C8E_005F1" name="insured_period_month_1"
            value="{{ old('insured_period_month_1') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:419px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="43"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J52_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F1"
            name="basic_days_for_salary_payment_of_insured_period_1"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_1') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:419px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="44"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J53_005F_8C8E_005F1" name="salary_payment_period_start_month_1"
            value="{{ old('salary_payment_period_start_month_1') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:419px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="45"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J54_005F_93FA_005F1" name="salary_payment_period_start_day_1"
            value="{{ old('salary_payment_period_start_day_1') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:419px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="46"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J55_005F_8C8E_005F1" name="salary_payment_period_end_month_1"
            value="{{ old('salary_payment_period_end_month_1') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:419px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="47"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J56_005F_93FA_005F1" name="salary_payment_period_end_day_1"
            value="{{ old('salary_payment_period_end_day_1') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:419px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="48"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J57_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F1"
            name="basic_days_of_salary_payment_period_1" value="{{ old('basic_days_of_salary_payment_period_1') }}"
            maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:419px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="49" onBlur="return calc2(this.form, 1);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J58_005F_92C0_8BE0_8A7AA_005F1" name="salary_amount_A_1"
            value="{{ old('salary_amount_A_1') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:419px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="50" onBlur="return calc2(this.form, 1);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J59_005F_92C0_8BE0_8A7AB_005F1" name="salary_amount_B_1"
            value="{{ old('salary_amount_B_1') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:419px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="51"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J60_005F_92C0_8BE0_8A7A_8C76_005F1" name="salary_amount_total_1"
            value="{{ old('salary_amount_total_1') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:445px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="53"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J47_005F_8C8E_005F2" name="insured_period_start_month_2"
            value="{{ old('insured_period_start_month_2') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:445px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="54"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J48_005F_93FA_005F2" name="insured_period_start_day_2"
            value="{{ old('insured_period_start_day_2') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:445px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="55"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J49_005F_8C8E_005F2" name="insured_period_end_month_2"
            value="{{ old('insured_period_end_month_2') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:445px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="56"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J50_005F_93FA_005F2" name="insured_period_end_day_2"
            value="{{ old('insured_period_end_day_2') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:445px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="57"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J51_005F_8C8E_005F2" name="insured_period_month_2"
            value="{{ old('insured_period_month_2') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:445px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="58"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J52_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F2"
            name="basic_days_for_salary_payment_of_insured_period_2"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_2') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:445px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="59"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J53_005F_8C8E_005F2" name="salary_payment_period_start_month_2"
            value="{{ old('salary_payment_period_start_month_2') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:445px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="60"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J54_005F_93FA_005F2" name="salary_payment_period_start_day_2"
            value="{{ old('salary_payment_period_start_day_2') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:445px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="61"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J55_005F_8C8E_005F2" name="salary_payment_period_end_month_2"
            value="{{ old('salary_payment_period_end_month_2') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:445px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="62"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J56_005F_93FA_005F2" name="salary_payment_period_end_day_2"
            value="{{ old('salary_payment_period_end_day_2') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:445px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="63"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J57_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F2"
            name="basic_days_of_salary_payment_period_2" value="{{ old('basic_days_of_salary_payment_period_2') }}"
            maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:445px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="64" onBlur="return calc2(this.form, 2);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J58_005F_92C0_8BE0_8A7AA_005F2" name="salary_amount_A_2"
            value="{{ old('salary_amount_A_2') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:445px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="65" onBlur="return calc2(this.form, 2);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J59_005F_92C0_8BE0_8A7AB_005F2" name="salary_amount_B_2"
            value="{{ old('salary_amount_B_2') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:445px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="66"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J60_005F_92C0_8BE0_8A7A_8C76_005F2" name="salary_amount_total_2"
            value="{{ old('salary_amount_total_2') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:472px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="68"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J47_005F_8C8E_005F3" name="insured_period_start_month_3"
            value="{{ old('insured_period_start_month_3') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:472px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="69"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J48_005F_93FA_005F3" name="insured_period_start_day_3"
            value="{{ old('insured_period_start_day_3') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:472px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="70"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J49_005F_8C8E_005F3" name="insured_period_end_month_3"
            value="{{ old('insured_period_end_month_3') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:472px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="71"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J50_005F_93FA_005F3" name="insured_period_end_day_3"
            value="{{ old('insured_period_end_day_3') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:472px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="72"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J51_005F_8C8E_005F3" name="insured_period_month_3"
            value="{{ old('insured_period_month_3') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:472px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="73"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J52_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F3"
            name="basic_days_for_salary_payment_of_insured_period_3"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_3') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:472px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="74"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J53_005F_8C8E_005F3" name="salary_payment_period_start_month_3"
            value="{{ old('salary_payment_period_start_month_3') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:472px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="75"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J54_005F_93FA_005F3" name="salary_payment_period_start_day_3"
            value="{{ old('salary_payment_period_start_day_3') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:472px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="76"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J55_005F_8C8E_005F3" name="salary_payment_period_end_month_3"
            value="{{ old('salary_payment_period_end_month_3') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:472px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="77"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J56_005F_93FA_005F3" name="salary_payment_period_end_day_3"
            value="{{ old('salary_payment_period_end_day_3') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:472px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="78"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J57_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F3"
            name="basic_days_of_salary_payment_period_3" value="{{ old('basic_days_of_salary_payment_period_3') }}"
            maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:472px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="79" onBlur="return calc2(this.form, 3);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J58_005F_92C0_8BE0_8A7AA_005F3" name="salary_amount_A_3"
            value="{{ old('salary_amount_A_3') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:472px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="80" onBlur="return calc2(this.form, 3);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J59_005F_92C0_8BE0_8A7AB_005F3" name="salary_amount_B_3"
            value="{{ old('salary_amount_B_3') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:472px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="81"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J60_005F_92C0_8BE0_8A7A_8C76_005F3" name="salary_amount_total_3"
            value="{{ old('salary_amount_total_3') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:499px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="83"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J47_005F_8C8E_005F4" name="insured_period_start_month_4"
            value="{{ old('insured_period_start_month_4') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:499px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="84"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J48_005F_93FA_005F4" name="insured_period_start_day_4"
            value="{{ old('insured_period_start_day_4') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:499px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="85"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J49_005F_8C8E_005F4" name="insured_period_end_month_4"
            value="{{ old('insured_period_end_month_4') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:499px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="86"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J50_005F_93FA_005F4" name="insured_period_end_day_4"
            value="{{ old('insured_period_end_day_4') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:499px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="87"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J51_005F_8C8E_005F4" name="insured_period_month_4"
            value="{{ old('insured_period_month_4') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:499px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="88"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J52_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F4"
            name="basic_days_for_salary_payment_of_insured_period_4"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_4') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:499px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="89"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J53_005F_8C8E_005F4" name="salary_payment_period_start_month_4"
            value="{{ old('salary_payment_period_start_month_4') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:499px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="90"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J54_005F_93FA_005F4" name="salary_payment_period_start_day_4"
            value="{{ old('salary_payment_period_start_day_4') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:499px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="91"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J55_005F_8C8E_005F4" name="salary_payment_period_end_month_4"
            value="{{ old('salary_payment_period_end_month_4') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:499px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="92"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J56_005F_93FA_005F4" name="salary_payment_period_end_day_4"
            value="{{ old('salary_payment_period_end_day_4') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:499px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="93"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J57_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F4"
            name="basic_days_of_salary_payment_period_4"
            value="{{ old('basic_days_of_salary_payment_period_4') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:499px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="94" onBlur="return calc2(this.form, 4);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J58_005F_92C0_8BE0_8A7AA_005F4" name="salary_amount_A_4"
            value="{{ old('salary_amount_A_4') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:499px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="95" onBlur="return calc2(this.form, 4);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J59_005F_92C0_8BE0_8A7AB_005F4" name="salary_amount_B_4"
            value="{{ old('salary_amount_B_4') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:499px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="96"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J60_005F_92C0_8BE0_8A7A_8C76_005F4" name="salary_amount_total_4"
            value="{{ old('salary_amount_total_4') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:525px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="98"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J47_005F_8C8E_005F5" name="insured_period_start_month_5"
            value="{{ old('insured_period_start_month_5') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:525px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="99"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J48_005F_93FA_005F5" name="insured_period_start_day_5"
            value="{{ old('insured_period_start_day_5') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:525px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="100"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J49_005F_8C8E_005F5" name="insured_period_end_month_5"
            value="{{ old('insured_period_end_month_5') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:525px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="101"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J50_005F_93FA_005F5" name="insured_period_end_day_5"
            value="{{ old('insured_period_end_day_5') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:525px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="102"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J51_005F_8C8E_005F5" name="insured_period_month_5"
            value="{{ old('insured_period_month_5') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:525px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="103"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J52_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F5"
            name="basic_days_for_salary_payment_of_insured_period_5"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_5') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:525px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="104"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J53_005F_8C8E_005F5" name="salary_payment_period_start_month_5"
            value="{{ old('salary_payment_period_start_month_5') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:525px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="105"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J54_005F_93FA_005F5" name="salary_payment_period_start_day_5"
            value="{{ old('salary_payment_period_start_day_5') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:525px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="106"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J55_005F_8C8E_005F5" name="salary_payment_period_end_month_5"
            value="{{ old('salary_payment_period_end_month_5') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:525px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="107"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J56_005F_93FA_005F5" name="salary_payment_period_end_day_5"
            value="{{ old('salary_payment_period_end_day_5') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:525px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="108"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J57_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F5"
            name="basic_days_of_salary_payment_period_5"
            value="{{ old('basic_days_of_salary_payment_period_5') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:525px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="109" onBlur="return calc2(this.form, 5);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J58_005F_92C0_8BE0_8A7AA_005F5" name="salary_amount_A_5"
            value="{{ old('salary_amount_A_5') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:525px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="110" onBlur="return calc2(this.form, 5);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J59_005F_92C0_8BE0_8A7AB_005F5" name="salary_amount_B_5"
            value="{{ old('salary_amount_B_5') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:525px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="111"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J60_005F_92C0_8BE0_8A7A_8C76_005F5" name="salary_amount_total_5"
            value="{{ old('salary_amount_total_5') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:552px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="113"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J47_005F_8C8E_005F6" name="insured_period_start_month_6"
            value="{{ old('insured_period_start_month_6') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:552px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="114"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J48_005F_93FA_005F6" name="insured_period_start_day_6"
            value="{{ old('insured_period_start_day_6') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:552px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="115"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J49_005F_8C8E_005F6" name="insured_period_end_month_6"
            value="{{ old('insured_period_end_month_6') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:552px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="116"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J50_005F_93FA_005F6" name="insured_period_end_day_6"
            value="{{ old('insured_period_end_day_6') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:552px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="117"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J51_005F_8C8E_005F6" name="insured_period_month_6"
            value="{{ old('insured_period_month_6') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:552px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="118"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J52_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F6"
            name="basic_days_for_salary_payment_of_insured_period_6"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_6') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:552px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="119"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J53_005F_8C8E_005F6" name="salary_payment_period_start_month_6"
            value="{{ old('salary_payment_period_start_month_6') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:552px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="120"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J54_005F_93FA_005F6" name="salary_payment_period_start_day_6"
            value="{{ old('salary_payment_period_start_day_6') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:552px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="121"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J55_005F_8C8E_005F6" name="salary_payment_period_end_month_6"
            value="{{ old('salary_payment_period_end_month_6') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:552px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="122"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J56_005F_93FA_005F6" name="salary_payment_period_end_day_6"
            value="{{ old('salary_payment_period_end_day_6') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:552px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="123"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J57_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F6"
            name="basic_days_of_salary_payment_period_6"
            value="{{ old('basic_days_of_salary_payment_period_6') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:552px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="124" onBlur="return calc2(this.form, 6);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J58_005F_92C0_8BE0_8A7AA_005F6" name="salary_amount_A_6"
            value="{{ old('salary_amount_A_6') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:552px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="125" onBlur="return calc2(this.form, 6);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J59_005F_92C0_8BE0_8A7AB_005F6" name="salary_amount_B_6"
            value="{{ old('salary_amount_B_6') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:552px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="126"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J60_005F_92C0_8BE0_8A7A_8C76_005F6" name="salary_amount_total_6"
            value="{{ old('salary_amount_total_6') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:579px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="128"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J47_005F_8C8E_005F7" name="insured_period_start_month_7"
            value="{{ old('insured_period_start_month_7') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:579px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="129"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J48_005F_93FA_005F7" name="insured_period_start_day_7"
            value="{{ old('insured_period_start_day_7') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:579px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="130"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J49_005F_8C8E_005F7" name="insured_period_end_month_7"
            value="{{ old('insured_period_end_month_7') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:579px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="131"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J50_005F_93FA_005F7" name="insured_period_end_day_7"
            value="{{ old('insured_period_end_day_7') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:579px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="132"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J51_005F_8C8E_005F7" name="insured_period_month_7"
            value="{{ old('insured_period_month_7') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:579px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="133"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J52_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F7"
            name="basic_days_for_salary_payment_of_insured_period_7"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_7') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:579px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="134"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J53_005F_8C8E_005F7" name="salary_payment_period_start_month_7"
            value="{{ old('salary_payment_period_start_month_7') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:579px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="135"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J54_005F_93FA_005F7" name="salary_payment_period_start_day_7"
            value="{{ old('salary_payment_period_start_day_7') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:579px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="136"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J55_005F_8C8E_005F7" name="salary_payment_period_end_month_7"
            value="{{ old('salary_payment_period_end_month_7') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:579px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="137"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J56_005F_93FA_005F7" name="salary_payment_period_end_day_7"
            value="{{ old('salary_payment_period_end_day_7') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:579px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="138"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J57_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F7"
            name="basic_days_of_salary_payment_period_7"
            value="{{ old('basic_days_of_salary_payment_period_7') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:579px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="139" onBlur="return calc2(this.form, 7);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J58_005F_92C0_8BE0_8A7AA_005F7" name="salary_amount_A_7"
            value="{{ old('salary_amount_A_7') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:579px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="140" onBlur="return calc2(this.form, 7);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J59_005F_92C0_8BE0_8A7AB_005F7" name="salary_amount_B_7"
            value="{{ old('salary_amount_B_7') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:579px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="141"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J60_005F_92C0_8BE0_8A7A_8C76_005F7" name="salary_amount_total_7"
            value="{{ old('salary_amount_total_7') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:605px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="143"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J47_005F_8C8E_005F8" name="insured_period_start_month_8"
            value="{{ old('insured_period_start_month_8') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:605px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="144"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J48_005F_93FA_005F8" name="insured_period_start_day_8"
            value="{{ old('insured_period_start_day_8') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:605px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="145"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J49_005F_8C8E_005F8" name="insured_period_end_month_8"
            value="{{ old('insured_period_end_month_8') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:605px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="146"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J50_005F_93FA_005F8" name="insured_period_end_day_8"
            value="{{ old('insured_period_end_day_8') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:605px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="147"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J51_005F_8C8E_005F8" name="insured_period_month_8"
            value="{{ old('insured_period_month_8') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:605px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="148"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J52_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F8"
            name="basic_days_for_salary_payment_of_insured_period_8"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_8') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:605px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="149"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J53_005F_8C8E_005F8" name="salary_payment_period_start_month_8"
            value="{{ old('salary_payment_period_start_month_8') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:605px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="150"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J54_005F_93FA_005F8" name="salary_payment_period_start_day_8"
            value="{{ old('salary_payment_period_start_day_8') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:605px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="151"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J55_005F_8C8E_005F8" name="salary_payment_period_end_month_8"
            value="{{ old('salary_payment_period_end_month_8') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:605px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="152"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J56_005F_93FA_005F8" name="salary_payment_period_end_day_8"
            value="{{ old('salary_payment_period_end_day_8') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:605px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="153"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J57_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F8"
            name="basic_days_of_salary_payment_period_8"
            value="{{ old('basic_days_of_salary_payment_period_8') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:605px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="154" onBlur="return calc2(this.form, 8);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J58_005F_92C0_8BE0_8A7AA_005F8" name="salary_amount_A_8"
            value="{{ old('salary_amount_A_8') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:605px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="155" onBlur="return calc2(this.form, 8);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J59_005F_92C0_8BE0_8A7AB_005F8" name="salary_amount_B_8"
            value="{{ old('salary_amount_B_8') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:605px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="156"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J60_005F_92C0_8BE0_8A7A_8C76_005F8" name="salary_amount_total_8"
            value="{{ old('salary_amount_total_8') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:632px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="158"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J47_005F_8C8E_005F9" name="insured_period_start_month_9"
            value="{{ old('insured_period_start_month_9') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:632px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="159"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J48_005F_93FA_005F9" name="insured_period_start_day_9"
            value="{{ old('insured_period_start_day_9') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:632px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="160"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J49_005F_8C8E_005F9" name="insured_period_end_month_9"
            value="{{ old('insured_period_end_month_9') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:632px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="161"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J50_005F_93FA_005F9" name="insured_period_end_day_9"
            value="{{ old('insured_period_end_day_9') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:632px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="162"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J51_005F_8C8E_005F9" name="insured_period_month_9"
            value="{{ old('insured_period_month_9') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:632px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="163"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J52_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F9"
            name="basic_days_for_salary_payment_of_insured_period_9"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_9') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:632px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="164"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J53_005F_8C8E_005F9" name="salary_payment_period_start_month_9"
            value="{{ old('salary_payment_period_start_month_9') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:632px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="165"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J54_005F_93FA_005F9" name="salary_payment_period_start_day_9"
            value="{{ old('salary_payment_period_start_day_9') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:632px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="166"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J55_005F_8C8E_005F9" name="salary_payment_period_end_month_9"
            value="{{ old('salary_payment_period_end_month_9') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:632px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="167"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J56_005F_93FA_005F9" name="salary_payment_period_end_day_9"
            value="{{ old('salary_payment_period_end_day_9') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:632px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="168"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J57_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F9"
            name="basic_days_of_salary_payment_period_9"
            value="{{ old('basic_days_of_salary_payment_period_9') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:632px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="169" onBlur="return calc2(this.form, 9);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J58_005F_92C0_8BE0_8A7AA_005F9" name="salary_amount_A_9"
            value="{{ old('salary_amount_A_9') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:632px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="170" onBlur="return calc2(this.form, 9);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J59_005F_92C0_8BE0_8A7AB_005F9" name="salary_amount_B_9"
            value="{{ old('salary_amount_B_9') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:632px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="171"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J60_005F_92C0_8BE0_8A7A_8C76_005F9" name="salary_amount_total_9"
            value="{{ old('salary_amount_total_9') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:659px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="173"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J47_005F_8C8E_005F10" name="insured_period_start_month_10"
            value="{{ old('insured_period_start_month_10') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:659px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="174"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J48_005F_93FA_005F10" name="insured_period_start_day_10"
            value="{{ old('insured_period_start_day_10') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:659px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="175"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J49_005F_8C8E_005F10" name="insured_period_end_month_10"
            value="{{ old('insured_period_end_month_10') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:659px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="176"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J50_005F_93FA_005F10" name="insured_period_end_day_10"
            value="{{ old('insured_period_end_day_10') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:659px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="177"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J51_005F_8C8E_005F10" name="insured_period_month_10"
            value="{{ old('insured_period_month_10') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:659px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="178"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J52_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F10"
            name="basic_days_for_salary_payment_of_insured_period_10"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_10') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:659px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="179"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J53_005F_8C8E_005F10" name="salary_payment_period_start_month_10"
            value="{{ old('salary_payment_period_start_month_10') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:659px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="180"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J54_005F_93FA_005F10" name="salary_payment_period_start_day_10"
            value="{{ old('salary_payment_period_start_day_10') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:659px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="181"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J55_005F_8C8E_005F10" name="salary_payment_period_end_month_10"
            value="{{ old('salary_payment_period_end_month_10') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:659px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="182"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J56_005F_93FA_005F10" name="salary_payment_period_end_day_10"
            value="{{ old('salary_payment_period_end_day_10') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:659px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="183"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J57_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F10"
            name="basic_days_of_salary_payment_period_10"
            value="{{ old('basic_days_of_salary_payment_period_10') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:659px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="184" onBlur="return calc2(this.form, 10);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J58_005F_92C0_8BE0_8A7AA_005F10" name="salary_amount_A_10"
            value="{{ old('salary_amount_A_10') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:659px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="185" onBlur="return calc2(this.form, 10);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J59_005F_92C0_8BE0_8A7AB_005F10" name="salary_amount_B_10"
            value="{{ old('salary_amount_B_10') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:659px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="186"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J60_005F_92C0_8BE0_8A7A_8C76_005F10" name="salary_amount_total_10"
            value="{{ old('salary_amount_total_10') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:685px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="188"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J47_005F_8C8E_005F11" name="insured_period_start_month_11"
            value="{{ old('insured_period_start_month_11') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:685px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="189"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J48_005F_93FA_005F11" name="insured_period_start_day_11"
            value="{{ old('insured_period_start_day_11') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:685px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="190"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J49_005F_8C8E_005F11" name="insured_period_end_month_11"
            value="{{ old('insured_period_end_month_11') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:685px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="191"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J50_005F_93FA_005F11" name="insured_period_end_day_11"
            value="{{ old('insured_period_end_day_11') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:685px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="192"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J51_005F_8C8E_005F11" name="insured_period_month_11"
            value="{{ old('insured_period_month_11') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:685px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="193"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J52_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F11"
            name="basic_days_for_salary_payment_of_insured_period_11"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_11') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:685px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="194"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J53_005F_8C8E_005F11" name="salary_payment_period_start_month_11"
            value="{{ old('salary_payment_period_start_month_11') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:685px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="195"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J54_005F_93FA_005F11" name="salary_payment_period_start_day_11"
            value="{{ old('salary_payment_period_start_day_11') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:685px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="196"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J55_005F_8C8E_005F11" name="salary_payment_period_end_month_11"
            value="{{ old('salary_payment_period_end_month_11') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:685px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="197"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J56_005F_93FA_005F11" name="salary_payment_period_end_day_11"
            value="{{ old('salary_payment_period_end_day_11') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:685px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="198"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J57_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F11"
            name="basic_days_of_salary_payment_period_11"
            value="{{ old('basic_days_of_salary_payment_period_11') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:685px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="199" onBlur="return calc2(this.form, 11);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J58_005F_92C0_8BE0_8A7AA_005F11" name="salary_amount_A_11"
            value="{{ old('salary_amount_A_11') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:685px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="200" onBlur="return calc2(this.form, 11);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J59_005F_92C0_8BE0_8A7AB_005F11" name="salary_amount_B_11"
            value="{{ old('salary_amount_B_11') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:685px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="201"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J60_005F_92C0_8BE0_8A7A_8C76_005F11" name="salary_amount_total_11"
            value="{{ old('salary_amount_total_11') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:712px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="203"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J47_005F_8C8E_005F12" name="insured_period_start_month_12"
            value="{{ old('insured_period_start_month_12') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:712px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="204"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J48_005F_93FA_005F12" name="insured_period_start_day_12"
            value="{{ old('insured_period_start_day_12') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:712px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="205"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J49_005F_8C8E_005F12" name="insured_period_end_month_12"
            value="{{ old('insured_period_end_month_12') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:712px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="206"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J50_005F_93FA_005F12" name="insured_period_end_day_12"
            value="{{ old('insured_period_end_day_12') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:712px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="207"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J51_005F_8C8E_005F12" name="insured_period_month_12"
            value="{{ old('insured_period_month_12') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:712px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="208"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J52_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F12"
            name="basic_days_for_salary_payment_of_insured_period_12"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_12') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:712px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="209"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J53_005F_8C8E_005F12" name="salary_payment_period_start_month_12"
            value="{{ old('salary_payment_period_start_month_12') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:712px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="210"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J54_005F_93FA_005F12" name="salary_payment_period_start_day_12"
            value="{{ old('salary_payment_period_start_day_12') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:712px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="211"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J55_005F_8C8E_005F12" name="salary_payment_period_end_month_12"
            value="{{ old('salary_payment_period_end_month_12') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:712px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="212"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J56_005F_93FA_005F12" name="salary_payment_period_end_day_12"
            value="{{ old('salary_payment_period_end_day_12') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:712px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="213"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J57_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F12"
            name="basic_days_of_salary_payment_period_12"
            value="{{ old('basic_days_of_salary_payment_period_12') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:712px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="214" onBlur="return calc2(this.form, 12);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J58_005F_92C0_8BE0_8A7AA_005F12" name="salary_amount_A_12"
            value="{{ old('salary_amount_A_12') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:712px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="215" onBlur="return calc2(this.form, 12);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J59_005F_92C0_8BE0_8A7AB_005F12" name="salary_amount_B_12"
            value="{{ old('salary_amount_B_12') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:712px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="216"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J60_005F_92C0_8BE0_8A7A_8C76_005F12" name="salary_amount_total_12"
            value="{{ old('salary_amount_total_12') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:735px; width:62px; height:64px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:46px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:35px; top:739px; width:45px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（１４）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:41px; top:754px; width:46px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">賃&nbsp;金&nbsp;に</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:41px; top:767px; width:46px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">関&nbsp;す&nbsp;る</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:41px; top:781px; width:46px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">特記事項</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:95px; top:735px; width:363px; line-height:63px; height:64px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="218"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif;  padding:0px 40px 0px 0px; width:361px; height:61px; ime-mode:active;"
            id="J62_005F_92C0_8BE0_82C9_8AD6_82B7_82E9_93C1_8B4C_8E96_8D80" name="salary_notices"
            value="{{ old('salary_notices') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:735px; width:325px; height:64px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:46px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:458px; top:739px; width:45px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（１５）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:495px; top:739px; width:265px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">この証明書の記載内容(（７）欄を除く)は相違ないと</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:495px; top:752px; width:80px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">認めます。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:480px; top:767px; width:4px; height:24px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; padding:15px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:491px; top:767px; width:34px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離職者</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:491px; top:781px; width:34px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">氏　名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0); left:529px; top:767px; width:4px; height:24px; text-align:center; font-size:14px; font-family:'ＭＳ ゴシック', sans-serif; padding:15px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:544px; top:767px; width:202px; line-height:26px; height:27px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="219"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:202px; height:26px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J63_005F_97A3_9045_8ED2_8F90_96BC" name="name" value="{{ old('name') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:798px; width:39px; height:172px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:154px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:802px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">※</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:817px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">公</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:832px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">共</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:847px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:862px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">業</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:878px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">安</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:893px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">定</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:908px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">所</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:923px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">記</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:939px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">載</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:954px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:72px; top:798px; width:572px; height:100px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:82px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:80px; top:805px; width:45px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">（１５）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:118px; top:805px; width:49px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">欄の記載</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:217px; top:805px; width:15px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">有・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:257px; top:805px; width:15px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">無</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:80px; top:824px; width:45px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">（１６）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:118px; top:824px; width:49px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">欄の記載</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:217px; top:824px; width:23px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">有・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:257px; top:824px; width:15px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">無</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:118px; top:843px; width:22px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">資・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:167px; top:843px; width:15px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">聴</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:201px; top:805px; width:14px; line-height:15px; height:16px; text-align:center; font-size:16px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="有"
            style="position:absolute; top:3px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J64_005F_8F5C_8CDC_9793_82CC_8B4C_8DDA_974C_96B3" name="J64_15"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:241px; top:805px; width:14px; line-height:15px; height:16px; text-align:center; font-size:16px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="無"
            style="position:absolute; top:3px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J64_005F_8F5C_8CDC_9793_82CC_8B4C_8DDA_974C_96B3" name="J64_15"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:201px; top:824px; width:14px; line-height:15px; height:16px; text-align:center; font-size:16px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="有"
            style="position:absolute; top:3px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J65_005F_8F5C_985A_9793_82CC_8B4C_8DDA_974C_96B3" name="J65_16"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:241px; top:824px; width:14px; line-height:15px; height:16px; text-align:center; font-size:16px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="無"
            style="position:absolute; top:3px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J65_005F_8F5C_985A_9793_82CC_8B4C_8DDA_974C_96B3" name="J65_16"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:95px; top:843px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="J66_005F_8E91_92AE_82CC_95CA_005F_8E91" name="J66"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:152px; top:843px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="J67_005F_8E91_92AE_82CC_95CA_005F_92AE" name="J67"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:544px; top:800px; width:88px; height:15px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1"
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:88px; max-width:88px; height:15px;"
            type="TEXT" id="J68_005F_92C0_8BE0_93FA_8A7A" name="J68" maxlength="13" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:72px; top:897px; width:572px; height:73px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:55px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:80px; top:899px; width:552px; line-height:68px; height:68px; font-size:10px; font-family:'ＭＳ 明朝', serif;">
        <TEXTAREA tabindex="-1"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 40px 0px 0px; width:552px; height:67px; ime-mode:active;"
            id="J70_005F_9574_8B4C_9793" name="J70" disabled></TEXTAREA>
    </SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:971px; width:739px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">　本手続きは電子申請による申請も可能です。本手続きについて、電子申請により行う場合には、被保険者が離職証明書の内容について確認したことを証明すること</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:981px; width:739px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">ができるものを本離職証明書の提出と併せて送信することをもって、当該被保険者の電子署名に代えることができます。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:990px; width:739px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">　また、本手続きについて、社会保険労務士が電子申請による本届書の提出に関する手続を事業主に代わって行う場合には、当該社会保険労務士が当該事業主の提出</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:1000px; width:739px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">代行者であることを証明することができるものを本届書の提出と併せて送信することをもって、当該事業主の電子署名に代えることができます。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1021px; width:47px; height:54px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:36px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1026px; width:45px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">社会保険</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1042px; width:45px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">労&nbsp;務&nbsp;士</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1057px; width:45px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">記&nbsp;載&nbsp;欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:80px; top:1021px; width:153px; height:16px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:4px 0px 0px 0px;">作成年月日･提出代行者･事務代理者の表示</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:80px; top:1036px; width:153px; height:39px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:21px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:83px; top:1038px; width:46px; height:16px; font-size:10px;"><SELECT
            size="1" tabindex="228"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:10px; font-family:'ＭＳ 明朝', serif; width:46px; height:16px;"
            id="J72_005F_944E_8D86" name="labor_consultant_japan_era"
            value="{{ old('labor_consultant_japan_era') }}" disabled>
            <OPTION value=""></OPTION>
            <OPTION value="平成">平成</OPTION>
            <OPTION value="令和" selected="selected">令和</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:150px; top:1042px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:181px; top:1042px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:212px; top:1042px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:132px; top:1038px; width:15px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="228"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:15px; max-width:15px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J73_005F_944E" name="labor_consultant_japan_era_year"
            value="{{ old('labor_consultant_japan_era_year') }}" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:164px; top:1038px; width:16px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="229"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:16px; max-width:16px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J74_005F_8C8E" name="labor_consultant_month"
            value="{{ old('labor_consultant_month') }}" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:195px; top:1038px; width:15px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="230"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:15px; max-width:15px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J75_005F_93FA" name="labor_consultant_day"
            value="{{ old('labor_consultant_day') }}" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:83px; top:1057px; width:130px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="231"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:130px; max-width:130px; height:14px; ime-mode:active;"
            type="TEXT" id="J76_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6"
            name="labor_consultant_acting_as_agent_name"
            value="{{ old('labor_consultant_acting_as_agent_name') }}" maxlength="12" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:232px; top:1021px; width:138px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">氏　　　　　　名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:232px; top:1036px; width:138px; height:39px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:21px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:235px; top:1037px; width:111px; line-height:36px; height:36px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="232"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:111px; height:36px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J77_005F_8E81_96BC" name="labor_consultant_name" value="{{ old('labor_consultant_name') }}"
            disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:369px; top:1021px; width:96px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">電　話　番　号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:369px; top:1036px; width:96px; height:39px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:21px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:411px; top:1042px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:411px; top:1059px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:373px; top:1040px; width:34px; height:14px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="233"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:34px; max-width:34px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J78_005F_8E73_8A4F_8BC7_94D4" name="labor_consultant_tel_area_code"
            value="{{ old('labor_consultant_tel_area_code') }}" maxlength="5" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:373px; top:1057px; width:34px; height:14px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="234"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:34px; max-width:34px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J79_005F_8E73_93E0_8BC7_94D4" name="labor_consultant_tel_city_code"
            value="{{ old('labor_consultant_tel_city_code') }}" maxlength="5" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:426px; top:1057px; width:34px; height:14px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="235"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:34px; max-width:34px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J80_005F_89C1_93FC_8ED2_94D4_8D86" name="labor_consultant_tel_subscriber_code"
            value="{{ old('labor_consultant_tel_subscriber_code') }}" maxlength="5" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:518px; top:1013px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">※</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1013px; width:50px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">所長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1026px; width:50px; height:47px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:29px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:582px; top:1013px; width:51px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">次長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:582px; top:1026px; width:51px; height:47px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:29px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:632px; top:1013px; width:50px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">課長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:632px; top:1026px; width:50px; height:47px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:29px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:681px; top:1013px; width:51px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">係長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:681px; top:1026px; width:51px; height:47px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:29px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:731px; top:1013px; width:51px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">係</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:731px; top:1026px; width:51px; height:47px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:29px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:34px; top:1076px; width:747px; line-height:49px; height:49px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="236"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 50px 0px 0px; width:747px; height:48px; ime-mode:active;"
            id="J81_005F_9574_8B4C_9793" name="remarks" value="{{ old('remarks') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1379px; top:22px; width:186px; height:23px; font-size:20px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1"
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:19px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:186px; max-width:186px; height:23px;"
            type="TEXT" id="J83_005F_8DC4_94AD_8D73_944E_8C8E_93FA" name="J83" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:819px; top:49px; width:747px; height:59px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:55px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:821px; top:51px; width:33px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（７）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:853px; top:51px; width:693px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離職理由欄･･･事業主の方は、離職者の主たる離職理由が該当する理由を左の事業主記入欄の□の中から選択し、下の具体的事情記載欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:922px; top:63px; width:171px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">に具体的事情を記載してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:834px; top:75px; width:495px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">【離職理由は所定給付日数・給付制限の有無に影響を与える場合があり、適正に記載してください。】</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:819px; top:88px; width:77px; height:26px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:824px; top:95px; width:65px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">事業主記入欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:895px; top:88px; width:595px; height:26px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:994px; top:95px; width:366px; height:15px; text-align:center; font-size:14px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離　　　　　職　　　　　理　　　　　由</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:1489px; top:88px; width:77px; height:26px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1501px; top:95px; width:57px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">※離職区分</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:819px; top:113px; width:76px; height:878px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:802px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:1489px; top:113px; width:77px; height:368px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:307px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:1489px; top:472px; width:77px; height:622px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:581px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:830px; top:998px; width:649px; height:46px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:29px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:902px; top:115px; width:14px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">１</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:115px; width:191px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">事業所の倒産等によるもの</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:126px; width:35px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">（１）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:126px; width:194px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">倒産手続開始、手形取引停止による離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:139px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（２）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:139px; width:342px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">事業所の廃止又は事業活動停止後事業再開の見込みがないため離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:902px; top:152px; width:14px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">２</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:152px; width:84px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">定年によるもの</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:912px; top:165px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">定年による離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:990px; top:165px; width:34px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（定年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1055px; top:165px; width:23px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">歳）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:933px; top:187px; width:91px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">定年後の継続雇用</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:1028px; top:180px; width:4px; height:26px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; padding:6px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1059px; top:178px; width:381px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">を希望していた（以下のａからｃまでのいずれかを１つ選択してください）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1059px; top:194px; width:247px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">を希望していなかった</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:209px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ａ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:971px; top:209px; width:465px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">就業規則に定める解雇事由又は退職事由（年齢に係るものを除く。以下同じ。）に該当したため</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:948px; top:220px; width:534px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">(解雇事由又は退職事由と同一の事由として就業規則又は労使協定に定める「継続雇用しないことができる事由」に該当して離職した場合も含む。)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:231px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ｂ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:971px; top:231px; width:515px; height:13px; text-align:center; font-size:9px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">平成25年3月31日以前に労使協定により定めた継続雇用制度の対象となる高年齢者に係る基準に該当しなかったため</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:248px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ｃ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:971px; top:248px; width:107px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">その他（具体的理由：</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1470px; top:248px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:272px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（１）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:366px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（２）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:272px; width:381px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">採用又は定年後の再雇用時等にあらかじめ定められた雇用期限到来による離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:366px; width:152px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">労働契約期間満了による離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:902px; top:260px; width:14px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">３</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:260px; width:153px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">労働契約期間満了等によるもの</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:283px; width:88px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(１回の契約期間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1043px; top:283px; width:100px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">箇月、通算契約期間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1173px; top:283px; width:99px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">箇月、契約更新回数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1303px; top:283px; width:22px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">回)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:295px; width:450px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(当初の契約締結後に契約期間や更新回数の上限を短縮し、その上限到来による離職に該当</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1373px; top:295px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">する・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1420px; top:295px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">しない)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:307px; width:430px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(当初の契約締結後に契約期間や更新回数の上限を設け、その上限到来による離職に該当</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1363px; top:307px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">する・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1410px; top:307px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">しない)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:319px; width:350px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(定年後の再雇用時にあらかじめ定められた雇用期限到来による離職で</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1281px; top:319px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ある・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1330px; top:319px; width:27px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ない)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:331px; width:430px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(４年６箇月以上５年以下の通算契約期間の上限が定められ、この上限到来による離職で</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1365px; top:331px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ある・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1415px; top:331px; width:27px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ない)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:945px; top:343px; width:500px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">→ある場合（同一事業所の有期雇用労働者に一様に４年６箇月以上５年以下の通算契約期間の上限が</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1008px; top:355px; width:200px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">平成24年８月10日前から定められて</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1195px; top:355px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">いた・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1250px; top:355px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">いなかった)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:377px; width:35px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">［１］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:377px; width:190px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">下記［２］以外の労働者</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:391px; width:88px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(１回の契約期間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1043px; top:391px; width:100px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">箇月、通算契約期間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1173px; top:391px; width:99px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">箇月、契約更新回数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1303px; top:391px; width:22px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">回)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:404px; width:221px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(契約を更新又は延長することの確約・合意の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1165px; top:404px; width:23px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">有・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1207px; top:404px; width:12px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">無</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1219px; top:404px; width:156px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(更新又は延長しない旨の明示の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1394px; top:404px; width:23px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">有・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1434px; top:404px; width:11px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">無</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1447px; top:404px; width:16px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">))</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:415px; width:168px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">(直前の契約更新時に雇止め通知の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1112px; top:415px; width:23px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">有・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1154px; top:415px; width:27px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">無)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:427px; width:198px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">(当初の契約締結後に不更新条項の追加が</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1140px; top:427px; width:50px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">ある・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1185px; top:427px; width:27px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">ない)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:453px; width:153px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">労働者から契約の更新又は延長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1082px; top:443px; width:8px; height:41px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; padding:13px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:1086px; top:443px; width:4px; height:36px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; padding:11px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1112px; top:440px; width:152px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">を希望する旨の申出があった</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1112px; top:453px; width:152px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">を希望しない旨の申出があった</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1112px; top:465px; width:152px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">の希望に関する申出はなかった</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:963px; top:491px; width:420px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">労働者派遣事業に雇用される派遣労働者のうち常時雇用される労働者以外の者</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:491px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［２］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:504px; width:88px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">(１回の契約期間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1043px; top:504px; width:100px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">箇月、通算契約期間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1173px; top:504px; width:99px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">箇月、契約更新回数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1303px; top:504px; width:22px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">回)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:518px; width:221px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(契約を更新又は延長することの確約・合意の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1165px; top:518px; width:23px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">有・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1207px; top:518px; width:12px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">無</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1219px; top:518px; width:156px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(更新又は延長しない旨の明示の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1394px; top:518px; width:23px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">有・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1434px; top:518px; width:11px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">無</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1447px; top:518px; width:16px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">))</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:542px; width:153px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">労働者から契約の更新又は延長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1082px; top:532px; width:8px; height:42px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; padding:14px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:1086px; top:532px; width:4px; height:36px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; padding:11px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1112px; top:530px; width:152px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">を希望する旨の申出があった</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1112px; top:542px; width:152px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">を希望しない旨の申出があった</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1112px; top:555px; width:152px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">の希望に関する申出はなかった</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:568px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ａ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:971px; top:568px; width:381px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">労働者が適用基準に該当する派遣就業の指示を拒否したことによる場合</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:579px; width:13px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">ｂ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:971px; top:579px; width:495px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">事業主が適用基準に該当する派遣就業の指示を行わなかったことによる場合（指示した派遣就業</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:971px; top:591px; width:381px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">が取りやめになったことによる場合を含む。）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:602px; width:488px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">(ａに該当する場合は、更に下記の５のうち、該当する主たる離職理由を更に１つ選択してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:615px; width:457px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">該当するものがない場合は下記の６を選択した上、具体的な理由を記載してください。)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:638px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（３）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:649px; width:35px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">（４）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:638px; width:251px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">早期退職優遇制度、選択定年制度等により離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:649px; width:53px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">移籍出向</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:902px; top:661px; width:14px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">４</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:674px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（１）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:710px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［１］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:686px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（２）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:697px; width:35px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">（３）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:725px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［２］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:661px; width:176px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">事業主からの働きかけによるもの</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:674px; width:381px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">解雇　（重責解雇を除く。）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:686px; width:381px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">重責解雇　（労働者の責めに帰すべき重大な理由による解雇）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:697px; width:381px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">希望退職の募集又は退職勧奨</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:710px; width:289px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">事業の縮小又は一部休廃止に伴う人員整理を行うためのもの</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:725px; width:122px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">その他（理由を具体的に</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1470px; top:725px; width:11px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:902px; top:737px; width:14px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">５</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:750px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（１）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:762px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［１］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:772px; width:381px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">労働者が判断したため</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:785px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［２］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:809px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［３］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:831px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［４］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:842px; width:35px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">［５］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:737px; width:153px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">労働者の判断によるもの</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:750px; width:190px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">職場における事情による離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:762px; width:461px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">労働条件に係る問題（賃金低下、賃金遅配、時間外労働、採用条件との相違等）があったと</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:785px; width:430px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">事業主又は他の労働者から就業環境が著しく害されるような言動（故意の排斥、嫌がらせ等）を</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:797px; width:430px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">受けたと労働者が判断したため</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:809px; width:470px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">妊娠、出産、育児休業、介護休業等に係る問題（休業等の申出拒否、妊娠、出産、休業等を理由とする</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:820px; width:430px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">不利益取扱い）があったと労働者が判断したため</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:831px; width:282px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">事業所での大規模な人員整理があったことを考慮した離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:842px; width:289px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">職種転換等に適応することが困難であったため（教育訓練の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1272px; top:842px; width:34px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">有　・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1333px; top:842px; width:34px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">無　）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:857px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［６］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:873px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［７］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:886px; width:35px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">（２）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:857px; width:331px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">事業所移転により通勤困難となった（なる）ため（旧（新）所在地：</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:873px; width:122px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">その他（理由を具体的に</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1470px; top:857px; width:11px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1470px; top:873px; width:11px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:886px; width:381px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">労働者の個人的な事情による離職（一身上の都合、転職希望等）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:902px; top:970px; width:14px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">６</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:970px; width:221px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">その他（１－５のいずれにも該当しない場合）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:982px; width:92px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">（理由を具体的に</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1470px; top:982px; width:11px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">）</SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_1_1" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:126px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="237" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c1-1" data-cat="c1-1" id="J84_005F_9149_91F01_005F1"
            name="retirement_reason_1_1" <?php echo old('retirement_reason_1_1') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_1_2" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:139px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="238" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c1-2" data-cat="c1-2" id="J85_005F_9149_91F01_005F2"
            name="retirement_reason_1_2" <?php echo old('retirement_reason_1_2') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_2" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:165px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="239" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c2" data-cat="c2" id="J86_005F_9149_91F02"
            name="retirement_reason_2" <?php echo old('retirement_reason_2') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_3_1" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:273px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="240" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c3-1" data-cat="c3-1" id="J87_005F_9149_91F03_005F1"
            name="retirement_reason_3_1" <?php echo old('retirement_reason_3_1') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_3_2" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:366px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="241" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c3-2" data-cat="c3-2" id="J88_005F_9149_91F03_005F2"
            name="retirement_reason_3_2" <?php echo old('retirement_reason_3_2') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_3_3" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:637px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="242" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c3-3" data-cat="c3-3" id="J89_005F_9149_91F03_005F3"
            name="retirement_reason_3_3" <?php echo old('retirement_reason_3_3') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_3_4" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:649px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="243" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c3-4" data-cat="c3-4" id="J90_005F_9149_91F03_005F4"
            name="retirement_reason_3_4" <?php echo old('retirement_reason_3_4') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_4_1" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:674px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="244" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c4-1" data-cat="c4-1" id="J91_005F_9149_91F04_005F1"
            name="retirement_reason_4_1" <?php echo old('retirement_reason_4_1') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_4_2" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:686px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="245" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c4-2" data-cat="c4-2" id="J92_005F_9149_91F04_005F2"
            name="retirement_reason_4_2" <?php echo old('retirement_reason_4_2') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_4_3_1" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:710px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="246" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c4-3-1" data-cat="c4-3-1" id="J93_005F_9149_91F04_005F3_005F1"
            name="retirement_reason_4_3_1" <?php echo old('retirement_reason_4_3_1') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_4_3_2" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:725px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="247" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c4-3-2" data-cat="c4-3-2" id="J94_005F_9149_91F04_005F3_005F2"
            name="retirement_reason_4_3_2" <?php echo old('retirement_reason_4_3_2') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_5_1_1" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:762px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="248" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c5-1-1" data-cat="c5-1-1" id="J95_005F_9149_91F05_005F1_005F1"
            name="retirement_reason_5_1_1" <?php echo old('retirement_reason_5_1_1') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_5_1_2" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:785px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="249" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c5-1-2" data-cat="c5-1-2" id="J96_005F_9149_91F05_005F1_005F2"
            name="retirement_reason_5_1_2" <?php echo old('retirement_reason_5_1_2') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_5_1_3" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:809px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="250" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c5-1-3" data-cat="c5-1-3" id="J193_005F_9149_91F05_005F1_005F3"
            name="retirement_reason_5_1_3" <?php echo old('retirement_reason_5_1_3') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_5_1_4" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:831px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="251" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c5-1-4" data-cat="c5-1-4" id="J97_005F_9149_91F05_005F1_005F4"
            name="retirement_reason_5_1_4" <?php echo old('retirement_reason_5_1_4') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_5_1_5" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:843px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="252" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c5-1-5" data-cat="c5-1-5" id="J98_005F_9149_91F05_005F1_005F5"
            name="retirement_reason_5_1_5" <?php echo old('retirement_reason_5_1_5') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_5_1_6" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:857px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="253" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c5-1-6" data-cat="c5-1-6" id="J99_005F_9149_91F05_005F1_005F6"
            name="retirement_reason_5_1_6" <?php echo old('retirement_reason_5_1_6') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_5_1_7" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:873px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="254" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c5-1-7" data-cat="c5-1-7" id="J100_005F_9149_91F05_005F1_005F7"
            name="retirement_reason_5_1_7" <?php echo old('retirement_reason_5_1_7') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_5_2" checked class="default-check"
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:888px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="255" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c5-2" data-cat="c5-2" id="J101_005F_9149_91F05_005F2"
            name="retirement_reason_5_2" <?php echo old('retirement_reason_5_2') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <INPUT value="" type="checkbox" name="retirement_reason_6" checked class="default-check"
        style="display: none;"><!--ここ-->
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:971px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="256" value="1"
            style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" class="check c6" data-cat="c6" id="J102_005F_9149_91F06"
            name="retirement_reason_6" <?php echo old('retirement_reason_6') == '1' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>

    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:126px; width:65px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:139px; width:65px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:165px; width:65px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:273px; width:65px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:366px; width:65px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:637px; width:65px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:648px; width:65px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:674px; width:65px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:686px; width:65px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:710px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:725px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:762px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:785px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:809px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:831px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:842px; width:80px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:857px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:873px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:888px; width:65px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:0px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:970px; width:54px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">･･････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1024px; top:163px; width:27px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="257"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:27px; max-width:27px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J103_005F_92E8_944E_005F_944E_97EE" name="retirement_age" class="clear c2"
            value="{{ old('retirement_age') }}" maxlength="2" autocomplete="off"></SPAN>
    <!-- ここから -->
    <input type="radio" name="reemployment_request_flg" value="" checked style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1040px; top:178px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="258" value="有"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J104_005F_Radio1" name="reemployment_request_flg" class="clear c2 call-render"
            data-cat="c_2" <?php echo old('reemployment_request_flg') == '有' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1040px; top:194px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="259" value="無"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J104_005F_Radio2" name="reemployment_request_flg" class="clear c2 call-render"
            data-cat="c_2" <?php echo old('reemployment_request_flg') == '無' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <input type="radio" name="retirement_reason_type" value="" checked style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:933px; top:211px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="260" value="就業規則に定める事由に該当したため"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J105_005F_Radio1" name="retirement_reason_type" class="clear c_2 call-render"
            <?php echo old('retirement_reason_type') == '就業規則に定める事由に該当したため' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:933px; top:231px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="261" value="労使協定に定めた基準に該当しなかったため"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J105_005F_Radio2" name="retirement_reason_type" class="clear c_2 call-render"
            <?php echo old('retirement_reason_type') == '労使協定に定めた基準に該当しなかったため' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:933px; top:246px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="262" value="その他"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J105_005F_Radio3" name="retirement_reason_type" class="clear c_2 call-render"
            <?php echo old('retirement_reason_type') == 'その他' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1078px; top:246px; width:381px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="263"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:381px; max-width:381px; height:14px; ime-mode:active;"
            type="TEXT" autocomplete="off"
            id="J106_005F_8C70_91B1_8CD9_9770_8AF3_965D_8ED2_005F_97A3_9045_979D_9752_005F_82BB_82CC_91BC_005F_8BEF_91CC_9349_979D_9752"
            name="retirement_reason" class="clear c2-c" value="{{ old('retirement_reason') }}"
            maxlength="34" autocomplete="off"></SPAN>
    <input type="radio" name="shortened_contract_renewal_reached_limit_flg" value="" checked
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1362px; top:293px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="267" value="する"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J197_005F_Radio1" name="shortened_contract_renewal_reached_limit_flg"
            class="clear c3-1" <?php echo old('shortened_contract_renewal_reached_limit_flg') == 'する' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1405px; top:293px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="268" value="しない"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J197_005F_Radio2" name="shortened_contract_renewal_reached_limit_flg"
            class="clear c3-1" <?php echo old('shortened_contract_renewal_reached_limit_flg') == 'しない' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <input type="radio" name="contract_renewal_reached_limit_flg" value="" checked
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1352px; top:306px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="269" value="する"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J198_005F_Radio1" name="contract_renewal_reached_limit_flg" class="clear c3-1"
            <?php echo old('contract_renewal_reached_limit_flg') == 'する' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1395px; top:306px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="270" value="しない"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J198_005F_Radio2" name="contract_renewal_reached_limit_flg" class="clear c3-1"
            <?php echo old('contract_renewal_reached_limit_flg') == 'しない' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <input type="radio" name="rehire_contract_renewal_reached_limit_flg" value="" checked
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1265px; top:318px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="271" value="ある"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J199_005F_Radio1" name="rehire_contract_renewal_reached_limit_flg"
            class="clear c3-1" <?php echo old('rehire_contract_renewal_reached_limit_flg') == 'ある' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1315px; top:318px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="272" value="ない"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J199_005F_Radio2" name="rehire_contract_renewal_reached_limit_flg"
            class="clear c3-1" <?php echo old('rehire_contract_renewal_reached_limit_flg') == 'ない' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <input type="radio" name="contract_period_total_reached_limit_flg" value="" checked
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1350px; top:330px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="273" value="ある"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J200_005F_Radio1" name="contract_period_total_reached_limit_flg"
            class="clear c3-1" <?php echo old('contract_period_total_reached_limit_flg') == 'ある' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1400px; top:330px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="274" value="ない"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J200_005F_Radio2" name="contract_period_total_reached_limit_flg"
            class="clear c3-1" <?php echo old('contract_period_total_reached_limit_flg') == 'ない' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <input type="radio" name="contract_period_total_established_before_law_amendment_flg" value="" checked
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1178px; top:354px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="275" value="いた"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J201_005F_Radio1" name="contract_period_total_established_before_law_amendment_flg"
            class="clear c3-1" <?php echo old('contract_period_total_established_before_law_amendment_flg') == 'いた' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1235px; top:354px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="276" value="いなかった"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J201_005F_Radio2" name="contract_period_total_established_before_law_amendment_flg"
            class="clear c3-1" <?php echo old('contract_period_total_established_before_law_amendment_flg') == 'いなかった' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <input type="radio" name="dispatched_employee_flg" value="" checked style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:910px; top:378px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="277" value="常時雇用される労働者"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J107_005F_Radio1" name="dispatched_employee_flg" class="clear c3-1-2 call-render"
            <?php echo old('dispatched_employee_flg') == '常時雇用される労働者' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:910px; top:490px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="278" value="常時雇用される労働者以外"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J107_005F_Radio2" name="dispatched_employee_flg" class="clear c3-1-2 call-render"
            <?php echo old('dispatched_employee_flg') == '常時雇用される労働者以外' ? 'checked' : ''; ?>SPAN style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <input type="radio" name="eternal_hire_contract_renewal_guarantee_agreement_flg" value="" checked
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1146px; top:404px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="282" value="有"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J111_005F_Radio1" name="eternal_hire_contract_renewal_guarantee_agreement_flg"
            class="clear c3-1-2-1" <?php echo old('eternal_hire_contract_renewal_guarantee_agreement_flg') == '有' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1188px; top:404px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="283" value="無"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J111_005F_Radio2" name="eternal_hire_contract_renewal_guarantee_agreement_flg"
            class="clear c3-1-2-1" <?php echo old('eternal_hire_contract_renewal_guarantee_agreement_flg') == '無' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <input type="radio" name="contract_non_renewal_flg" value="" checked style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1377px; top:404px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="284" value="有"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J112_005F_Radio1" name="contract_non_renewal_flg" class="clear c3-1-2-1"
            <?php echo old('contract_non_renewal_flg') == '有' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1415px; top:404px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="285" value="無"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J112_005F_Radio2" name="contract_non_renewal_flg" class="clear c3-1-2-1"
            <?php echo old('contract_non_renewal_flg') == '無' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <input type="radio" name="employment_termination_notice_flg" value="" checked
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1093px; top:415px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="286" value="有"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J113_005F_Radio1" name="employment_termination_notice_flg" class="clear c3-1-2-1"
            <?php echo old('employment_termination_notice_flg') == '有' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1135px; top:415px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="287" value="無"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J113_005F_Radio2" name="employment_termination_notice_flg" class="clear c3-1-2-1"
            <?php echo old('employment_termination_notice_flg') == '無' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <input type="radio" name="non_renewal_clause_addition_flg" value="" checked style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1127px; top:427px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="288" value="ある"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J202_005F_Radio1" name="non_renewal_clause_addition_flg" class="clear c3-1-2-1"
            <?php echo old('non_renewal_clause_addition_flg') == 'ある' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1170px; top:427px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="289" value="ない"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J202_005F_Radio2" name="non_renewal_clause_addition_flg" class="clear c3-1-2-1"
            <?php echo old('non_renewal_clause_addition_flg') == 'ない' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <input type="radio" name="eternal_hire_contract_renewal_request_type" value="" checked
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1093px; top:441px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="290" value="希望する申出有"
            style="position:absolute; top:1px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J114_005F_Radio1" name="eternal_hire_contract_renewal_request_type"
            class="clear c3-1-2-1" <?php echo old('eternal_hire_contract_renewal_request_type') == '希望する申出有' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1093px; top:453px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="291" value="希望しない申出有"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J114_005F_Radio2" name="eternal_hire_contract_renewal_request_type"
            class="clear c3-1-2-1" <?php echo old('eternal_hire_contract_renewal_request_type') == '希望しない申出有' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1093px; top:466px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="292" value="申出無"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J114_005F_Radio3" name="eternal_hire_contract_renewal_request_type"
            class="clear c3-1-2-1" <?php echo old('eternal_hire_contract_renewal_request_type') == '1' ? '申出無' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <input type="radio" name="contract_renewal_guarantee_agreement_flg" value="" checked
        style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1148px; top:518px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="296" value="有"
            style="position:absolute; top:1px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J118_005F_Radio1" name="contract_renewal_guarantee_agreement_flg"
            class="clear c3-1-2-2" <?php echo old('contract_renewal_guarantee_agreement_flg') == '有' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1190px; top:518px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="297" value="無"
            style="position:absolute; top:1px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J118_005F_Radio2" name="contract_renewal_guarantee_agreement_flg"
            class="clear c3-1-2-2" <?php echo old('contract_renewal_guarantee_agreement_flg') == '無' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <input type="radio" name="no_contract_renewal_flg" value="" checked style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1379px; top:518px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="298" value="有"
            style="position:absolute; top:1px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J119_005F_Radio1" name="no_contract_renewal_flg" class="clear c3-1-2-2"
            <?php echo old('no_contract_renewal_flg') == '有' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1417px; top:518px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="299" value="無"
            style="position:absolute; top:1px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J119_005F_Radio2" name="no_contract_renewal_flg" class="clear c3-1-2-2"
            <?php echo old('no_contract_renewal_flg') == '無' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <input type="radio" name="contract_renewal_request_type" value="" checked style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1093px; top:530px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="300" value="希望する申出有"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J120_005F_Radio1" name="contract_renewal_request_type" class="clear c3-1-2-2"
            <?php echo old('contract_renewal_request_type') == '希望する申出有' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1093px; top:542px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="301" value="希望しない申出有"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J120_005F_Radio2" name="contract_renewal_request_type" class="clear c3-1-2-2"
            <?php echo old('contract_renewal_request_type') == '希望しない申出有' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1093px; top:555px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="302" value="申出無"
            style="position:absolute; top:1px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J120_005F_Radio3" name="contract_renewal_request_type" class="clear c3-1-2-2"
            <?php echo old('contract_renewal_request_type') == '申出無' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <input type="radio" name="employment_instructions_type" value="" checked style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:933px; top:568px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="303" value="労働者が適用基準に派遣就業の指示を拒否したことによる場合"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J121_005F_Radio1" name="employment_instructions_type" class="clear c3-1-2-2"
            <?php echo old('employment_instructions_type') == '労働者が適用基準に派遣就業の指示を拒否したことによる場合' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:933px; top:580px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="304" value="事業主が派遣就業の指示を行わなかったことによる場合"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J121_005F_Radio2" name="employment_instructions_type" class="clear c3-1-2-2"
            <?php echo old('employment_instructions_type') == '事業主が派遣就業の指示を行わなかったことによる場合' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1013px; top:283px; width:27px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="264"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:27px; max-width:27px; height:13px; ime-mode:disabled;"
            type="TEXT" id="J194_005F_8CD9_9770_8AFA_8AD4_939E_9788_005F_31_89F1_82CC_8C5F_96F1_8AFA_8AD4"
            name="contract_period_reached_limit_contract_period_once" class="clear c3-1"
            value="{{ old('contract_period_reached_limit_contract_period_once') }}" maxlength="3" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1143px; top:283px; width:26px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="265" autocomplete="off"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:26px; max-width:26px; height:13px; ime-mode:disabled;"
            type="TEXT" id="J195_005F_8CD9_9770_8AFA_8AD4_939E_9788_005F_92CA_8E5A_8C5F_96F1_8AFA_8AD4"
            name="contract_period_reached_limit_contract_period_total" class="clear c3-1"
            value="{{ old('contract_period_reached_limit_contract_period_total') }}"
            maxlength="3" autocomplete="off" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1272px; top:283px; width:27px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="266"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:27px; max-width:27px; height:13px; ime-mode:disabled;"
            type="TEXT" id="J196_005F_8CD9_9770_8AFA_8AD4_939E_9788_005F_8C5F_96F1_8D58_9056_89F1_9094"
            name="contract_period_reached_limit_contract_renewal_count" class="clear c3-1"
            value="{{ old('contract_period_reached_limit_contract_renewal_count') }}" maxlength="3" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1013px; top:391px; width:27px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="279"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:27px; max-width:27px; height:13px; ime-mode:disabled;"
            type="TEXT" id="J108_005F_8FED_9770_984A_93AD_8ED2_005F1_89F1_82CC_8C5F_96F1_8AFA_8AD4"
            name="eternal_hire_contract_period_once" class="clear c3-1-2-1"
            value="{{ old('eternal_hire_contract_period_once') }}" maxlength="3" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1143px; top:391px; width:26px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="280"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:26px; max-width:26px; height:13px; ime-mode:disabled;"
            type="TEXT" id="J109_005F_8FED_9770_984A_93AD_8ED2_005F_92CA_8E5A_8C5F_96F1_8AFA_8AD4"
            name="eternal_hire_contract_period_total" class="clear c3-1-2-1"
            value="{{ old('eternal_hire_contract_period_total') }}" maxlength="3" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1272px; top:391px; width:27px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="281"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:27px; max-width:27px; height:13px; ime-mode:disabled;"
            type="TEXT" id="J110_005F_8FED_9770_984A_93AD_8ED2_005F_8C5F_96F1_8D58_9056_89F1_9094"
            name="eternal_hire_contract_renewal_count" class="clear c3-1-2-1"
            value="{{ old('eternal_hire_contract_renewal_count') }}" maxlength="3" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1013px; top:503px; width:27px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="293"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:27px; max-width:27px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J115_005F_8FED_9770_984A_93AD_8ED2_88C8_8A4F_005F1_89F1_82CC_8C5F_96F1_8AFA_8AD4"
            name="except_eternal_hire_contract_period_once" class="clear c3-1-2-2"
            value="{{ old('except_eternal_hire_contract_period_once') }}" maxlength="3" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1143px; top:503px; width:26px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="294"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:26px; max-width:26px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J116_005F_8FED_9770_984A_93AD_8ED2_88C8_8A4F_005F_92CA_8E5A_8C5F_96F1_8AFA_8AD4"
            name="except_eternal_hire_contract_period_total" class="clear c3-1-2-2"
            value="{{ old('except_eternal_hire_contract_period_total') }}" maxlength="3" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1272px; top:503px; width:27px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="295"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:27px; max-width:27px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J117_005F_8FED_9770_984A_93AD_8ED2_88C8_8A4F_005F_8C5F_96F1_8D58_9056_89F1_9094"
            name="except_eternal_hire_contract_renewal_count" class="clear c3-1-2-2"
            value="{{ old('except_eternal_hire_contract_renewal_count') }}" maxlength="3" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1085px; top:723px; width:381px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="305"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:381px; max-width:381px; height:14px; ime-mode:active;"
            type="TEXT"
            id="J122_005F_8AF3_965D_91DE_9045_9694_82CD_91DE_9045_8AA9_8FA7_005F_82BB_82CC_91BC_005F_8BEF_91CC_9349_979D_9752"
            name="retirement_recommendation_reason" class="clear c4-3-2"
            value="{{ old('retirement_recommendation_reason') }}" maxlength="33" autocomplete="off"></SPAN>
    <input type="radio" name="education_training_flg" value="" checked style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1253px; top:842px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="306" value="有"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J123_005F_Radio1" name="education_training_flg" class="clear c5-1-5"
            <?php echo old('education_training_flg') == '有' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1314px; top:842px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="307" value="無"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J123_005F_Radio2" name="education_training_flg" class="clear c5-1-5"
            <?php echo old('education_training_flg') == '無' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1291px; top:856px; width:175px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="308"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:175px; max-width:175px; height:14px; ime-mode:active;"
            type="TEXT"
            id="J124_005F_8E96_8BC6_8F8A_88DA_935D_82C9_82E6_82E8_92CA_8BCE_8DA2_93EF_005F_8F8A_8DDD_926E"
            name="change_office_place" class="clear c5-1-6" value="{{ old('change_office_place') }}"
            maxlength="13" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1085px; top:871px; width:381px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="309"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:381px; max-width:381px; height:14px; ime-mode:active;"
            type="TEXT" id="J125_005F_82BB_82CC_91BC_005F_8BEF_91CC_9349_979D_9752"
            name="employee_decision_reasons" class="clear c5-1-7" value="{{ old('employee_decision_reasons') }}"
            maxlength="32" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1017px; top:983px; width:449px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="310"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:449px; max-width:449px; height:14px; ime-mode:active;"
            type="TEXT" id="J126_005F_82BB_82CC_91BC_005F_8BEF_91CC_9349_979D_9752" name="other_reasons"
            class="clear c6" value="{{ old('other_reasons') }}" maxlength="37" autocomplete="off"></SPAN>

    <!-- ここまで -->
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:832px; top:1000px; width:150px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">具体的事情記載欄（事業主用）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:832px; top:1013px; width:644px; line-height:26px; height:27px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="311"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 70px 0px 0px; width:644px; height:26px; ime-mode:active;"
            id="J127_005F_8BEF_91CC_9349_8E96_8FEE_8B4C_8DDA_9793_005F_8E96_8BC6_8EE5_9770" name="memo_for_employer"
            value="{{ old('memo_for_employer') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:819px; top:1097px; width:374px; height:54px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:36px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:820px; top:1099px; width:43px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">（１６）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:857px; top:1099px; width:167px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">離職者本人の判断&nbsp;(選択すること)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:857px; top:1114px; width:164px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">事業主が記入した離職理由に異議</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:822px; top:1133px; width:134px; height:15px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:5px 0px 0px 0px;">(離職者氏名)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1047px; top:1114px; width:35px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">有り・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1104px; top:1114px; width:23px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">無し</SPAN>
    <input type="radio" name="objection_retirement_reason_flg" value="" checked style="display: none;">
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1032px; top:1114px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="312" value="有"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J128_005F_97A3_9045_979D_9752_82C9_88D9_8B63_82CC_974C_96B3"
            name="objection_retirement_reason_flg" <?php echo old('objection_retirement_reason_flg') == '有' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:1089px; top:1114px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="313" value="無"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="J128_005F_97A3_9045_979D_9752_82C9_88D9_8B63_82CC_974C_96B33"
            name="objection_retirement_reason_flg" <?php echo old('objection_retirement_reason_flg') == '無' ? 'checked' : ''; ?>><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:963px; top:1133px; width:176px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="314"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:176px; max-width:176px; height:14px; ime-mode:active;"
            type="TEXT" id="J129_005F_8F90_96BC_9793" name="name" class="clear"
            value="{{ old('name') }}" maxlength="15" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:127px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="J130_005F_9149_91F01A" name="J130_1A"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:127px; width:30px; height:16px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">１Ａ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:152px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="J131_005F_9149_91F01B" name="J131_1B"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:152px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">１Ｂ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:177px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="J132_005F_9149_91F02A" name="J132_2A"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:177px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">２Ａ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:202px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="J133_005F_9149_91F02B" name="J133_2B"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:202px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">２Ｂ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:227px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="J134_005F_9149_91F02C" name="J134_2C"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:227px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">２Ｃ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:252px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="J135_005F_9149_91F02D" name="J135_2D"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:252px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">２Ｄ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:277px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="J136_005F_9149_91F02E" name="J136_2E"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:277px; width:30px; height:16px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">２Ｅ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:302px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="J137_005F_9149_91F03A" name="J137_3A"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:302px; width:30px; height:16px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">３Ａ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:327px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="J138_005F_9149_91F03B" name="J138_3B"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:327px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">３Ｂ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:352px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="J139_005F_9149_91F03C" name="J139_3C"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:352px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">３Ｃ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:377px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="J140_005F_9149_91F03D" name="J140_3D"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:377px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">３Ｄ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:402px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="J141_005F_9149_91F04D" name="J141_4D"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:402px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">４Ｄ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:427px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="J142_005F_9149_91F05E" name="J142_5E"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:427px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">５Ｅ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:308px; top:49px; width:43px; height:35px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:17px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:310px; top:60px; width:38px; height:14px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">フリガナ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-left:1px solid rgb(0, 0, 0); left:895px; top:113px; width:1px; height:878px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:819px; top:1283px; width:671px; height:980px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:905px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:651px; top:2114px; width:77px; height:24px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; line-height:normal; padding:10px 0px 0px 0px;">A-250046-004_2</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:739px; top:2114px; width:31px; height:24px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; line-height:normal; padding:6px 0px 0px 0px;">0</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:1203px; width:146px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">様式第５号（第７条関係）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:186px; top:1192px; width:427px; height:23px; text-align:center; font-size:20px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">雇用保険被保険者離職証明書(安定所提出用)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:704px; top:1173px; width:77px; height:42px; font-size:38px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1"
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:38px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:77px; max-width:77px; height:42px;"
            type="TEXT" id="J143_005F_91B1_8E86_005F_925A_8E9E_8AD4_984A_93AD_8ED2" name="J143"
            disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1219px; width:248px; height:65px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:47px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1219px; width:77px; height:32px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:35px; top:1223px; width:35px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（１）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:39px; top:1235px; width:66px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">被保険者番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:110px; top:1219px; width:172px; height:32px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:121px; top:1225px; width:35px; height:19px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:35px; max-width:35px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J144_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85" name="J144_employment_insured_no_4"
            maxlength="4"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:160px; top:1227px; width:13px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:177px; top:1225px; width:49px; height:19px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:49px; max-width:49px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J145_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85" name="J145_employment_insured_no_6"
            maxlength="6"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:230px; top:1227px; width:13px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:247px; top:1225px; width:15px; height:19px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:15px; max-width:15px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J146_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD" name="J146_employment_insured_no_CD"
            maxlength="1"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1253px; width:77px; height:31px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:13px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:35px; top:1257px; width:35px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（２）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:39px; top:1268px; width:66px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">事業所番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:110px; top:1253px; width:172px; height:31px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:13px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:121px; top:1259px; width:35px; height:20px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:35px; max-width:35px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J147_005F_8E96_8BC6_8F8A_94D4_8D864_8C85" name="J147_insurance_office_no_4"
            maxlength="4"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:160px; top:1261px; width:13px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:177px; top:1259px; width:49px; height:20px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:49px; max-width:49px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J148_005F_8E96_8BC6_8F8A_94D4_8D866_8C85" name="J148_insurance_office_no_6"
            maxlength="6"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:230px; top:1261px; width:13px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:247px; top:1259px; width:15px; height:20px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:15px; max-width:15px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J149_005F_8E96_8BC6_8F8A_94D4_8D86CD" name="J149_insurance_office_no_CD"
            maxlength="1"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:281px; top:1219px; width:28px; height:32px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:15px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:283px; top:1223px; width:32px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（３）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:281px; top:1253px; width:70px; height:31px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:285px; top:1264px; width:54px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">離職者氏名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:350px; top:1219px; width:230px; line-height:34px; height:35px; font-size:11px; font-family:'ＭＳ 明朝', serif;">
        <TEXTAREA tabindex="-1" disabled
            style="border-style:none; overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 20px 0px 0px; width:228px; height:32px; ime-mode:active;"
            id="J150_005F_91B1_8E86_005F_97A3_9045_8ED2_8E81_96BC_005F_8374_838A_834B_8369" name="J150_name_kana"></TEXTAREA>
    </SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:350px; top:1253px; width:230px; line-height:30px; height:31px; font-size:11px; font-family:'ＭＳ 明朝', serif;">
        <TEXTAREA tabindex="-1" disabled
            style="border-style:none; overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 20px 0px 0px; width:228px; height:28px; ime-mode:active;"
            id="J151_005F_91B1_8E86_005F_97A3_9045_8ED2_8E81_96BC" name="J151_name"></TEXTAREA>
    </SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:579px; top:1219px; width:45px; height:65px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:47px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:580px; top:1223px; width:35px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（４）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:586px; top:1238px; width:32px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離　職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:586px; top:1261px; width:32px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年月日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:623px; top:1219px; width:60px; height:65px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:47px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:634px; top:1245px; width:27px; height:16px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:27px; max-width:27px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J153_005F_944E_8D86" name="retirement_date_era"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:682px; top:1219px; width:34px; height:65px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:47px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:698px; top:1221px; width:12px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:687px; top:1245px; width:23px; height:16px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:23px; max-width:23px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J154_005F_944E" name="retirement_date_year" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:715px; top:1219px; width:34px; height:65px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:47px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:733px; top:1221px; width:12px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:721px; top:1245px; width:23px; height:16px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:23px; max-width:23px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J155_005F_8C8E" name="retirement_date_month" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:748px; top:1219px; width:34px; height:65px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:47px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:766px; top:1221px; width:12px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:754px; top:1245px; width:23px; height:16px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:23px; max-width:23px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J156_005F_93FA" name="retirement_date_day" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1283px; width:77px; height:76px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:58px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:35px; top:1287px; width:35px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（５）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:1314px; width:33px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">事業所</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:74px; top:1295px; width:32px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">名　称</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:74px; top:1318px; width:32px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">所在地</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:63px; top:1343px; width:43px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">電話番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:110px; top:1283px; width:313px; height:76px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:58px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:152px; top:1343px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:207px; top:1343px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:422px; top:1283px; width:78px; height:76px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:58px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:424px; top:1287px; width:35px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（６）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:430px; top:1306px; width:64px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離&nbsp;職&nbsp;者&nbsp;の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:430px; top:1337px; width:64px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">住所又は居所</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:499px; top:1283px; width:283px; height:76px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:58px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:502px; top:1287px; width:12px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">〒</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:544px; top:1287px; width:14px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:502px; top:1343px; width:44px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">電話番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:598px; top:1341px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:661px; top:1341px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1358px; width:389px; height:83px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:65px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:64px; top:1362px; width:286px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">この証明書の記載は、事実に相違ないことを証明します。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:1400px; width:32px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">事業主</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:81px; top:1384px; width:22px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">住所</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:81px; top:1415px; width:23px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">氏名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:110px; top:1375px; width:297px; line-height:26px; height:27px; font-size:10px; font-family:'ＭＳ 明朝', serif;">
        <TEXTAREA tabindex="-1" disabled
            style="border-style:none; overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 10px 0px 0px; width:297px; height:26px; ime-mode:active;"
            id="J157_005F_8F5A_8F8A" name="J157_branch_address"></TEXTAREA>
    </SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:110px; top:1405px; width:290px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:290px; max-width:290px; height:15px; ime-mode:active;"
            type="TEXT" id="J158_005F_8E81_96BC_005F_8FE3_9269" name="J158_company_name"
            maxlength="27"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:110px; top:1423px; width:290px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:290px; max-width:290px; height:15px; ime-mode:active;"
            type="TEXT" id="J159_005F_8E81_96BC_005F_89BA_9269"
            name="J159_employer_company_managerial_position_name" maxlength="27"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:422px; top:1358px; width:360px; height:83px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:65px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:430px; top:1363px; width:65px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">※離職票交付</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:518px; top:1362px; width:26px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:26px; max-width:26px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J160_005F_944E_8D86" name="J160_年号"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:579px; top:1363px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:621px; top:1363px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:662px; top:1363px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:434px; top:1390px; width:55px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（交付番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:590px; top:1391px; width:23px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">番）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:552px; top:1362px; width:23px; height:15px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:23px; max-width:23px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J161_005F_944E" name="J161" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:594px; top:1362px; width:23px; height:15px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:23px; max-width:23px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J162_005F_8C8E" name="J162" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:636px; top:1362px; width:23px; height:15px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:23px; max-width:23px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J163_005F_93FA" name="J163" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:491px; top:1390px; width:95px; height:15px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:95px; max-width:95px; height:15px;"
            type="TEXT" id="J164_005F_91B1_8E86_005F_8CF0_9574_94D4_8D86" name="J164"
            maxlength="11"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:426px; top:1417px; width:248px; height:19px; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:248px; max-width:248px; height:15px; ime-mode:active;"
            type="TEXT" id="J165_005F_91B1_8E86_005F_8CF6_8BA4_9045_8BC6_88C0_92E8_8F8A_96BC" name="J165"
            maxlength="20"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1440px; width:748px; height:24px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:6px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:264px; top:1445px; width:286px; height:15px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離&nbsp;職&nbsp;の&nbsp;日&nbsp;以&nbsp;前&nbsp;の&nbsp;賃&nbsp;金&nbsp;支&nbsp;払&nbsp;状&nbsp;況&nbsp;等</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1463px; width:195px; height:26px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:7px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:35px; top:1469px; width:35px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（８）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:64px; top:1469px; width:149px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">被保険者期間算定対象期間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1488px; width:153px; height:72px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:54px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:35px; top:1503px; width:23px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">(A)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:64px; top:1503px; width:107px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">一&nbsp;般&nbsp;被&nbsp;保&nbsp;険&nbsp;者&nbsp;等</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1534px; width:85px; height:26px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:8px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:1541px; width:76px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離職日の翌日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:118px; top:1534px; width:62px; height:26px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:8px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:137px; top:1543px; width:11px; height:10px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:167px; top:1543px; width:10px; height:10px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:1488px; width:43px; height:72px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:54px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:188px; top:1496px; width:38px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">(B)短期</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:188px; top:1511px; width:38px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">雇用特例</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:188px; top:1526px; width:38px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">被保険者</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:1463px; width:39px; height:96px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:78px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:232px; top:1469px; width:35px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（９）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:231px; top:1487px; width:34px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(８)の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:232px; top:1499px; width:30px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">期間に</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:232px; top:1510px; width:30px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">おける</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:232px; top:1522px; width:30px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">賃金支</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:232px; top:1533px; width:30px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">払基礎</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:232px; top:1544px; width:30px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">日数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:1463px; width:154px; height:96px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:78px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:270px; top:1469px; width:45px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（１０）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:274px; top:1506px; width:137px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">賃&nbsp;金&nbsp;支&nbsp;払&nbsp;対&nbsp;象&nbsp;期&nbsp;間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:1463px; width:39px; height:96px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:78px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:420px; top:1469px; width:45px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（１１）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:420px; top:1492px; width:26px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">(１０)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:445px; top:1492px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:424px; top:1511px; width:27px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">基&nbsp;礎</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:424px; top:1530px; width:27px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日&nbsp;数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1463px; width:229px; height:48px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:30px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:461px; top:1469px; width:45px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（１２）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:480px; top:1484px; width:171px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">賃　　　　　金　　　　　額</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1510px; width:77px; height:49px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:31px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:481px; top:1528px; width:35px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（Ａ）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1510px; width:77px; height:49px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:31px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:558px; top:1528px; width:35px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（Ｂ）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:1510px; width:77px; height:49px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:31px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:634px; top:1528px; width:27px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">計</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:1463px; width:97px; height:96px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:78px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:689px; top:1469px; width:45px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（１３）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:701px; top:1504px; width:64px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">備　　　考</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1558px; width:153px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:1558px; width:43px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:1558px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:1558px; width:154px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:1558px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1558px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1558px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:1558px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:auto; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:1558px; width:97px; height:27px; text-align:center; font-size:24px; font-family:'ＭＳ 明朝', serif;"><SPAN
            style="font-size:10px; height:10px; line-height:1em; vertical-align:middle;"></SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1584px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:1584px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:1584px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:1584px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:1584px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1584px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1584px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:1584px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:1584px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="328"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J180_005F_94F5_8D6C_005F1" name="memo_13" value="{{ old('memo_13') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1611px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:1611px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:1611px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:1611px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:1611px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1611px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1611px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:1611px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:1611px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="343" onChange="return(check_item_gw(this.form,314));"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J180_005F_94F5_8D6C_005F2" name="memo_14" value="{{ old('memo_14') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1638px; width:153px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:1638px; width:43px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:1638px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:1638px; width:154px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:1638px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1638px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1638px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:1638px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:1638px; width:97px; line-height:26px; height:27px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="358" onChange="return(check_item_gw(this.form,314));"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:24px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J180_005F_94F5_8D6C_005F3" name="memo_15" value="{{ old('memo_15') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1664px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:1664px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:1664px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:1664px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:1664px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1664px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1664px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:1664px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:1664px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="373" onChange="return(check_item_gw(this.form,314));"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J180_005F_94F5_8D6C_005F4" name="memo_16" value="{{ old('memo_16') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1691px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:1691px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:1691px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:1691px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:1691px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1691px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1691px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:1691px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:1691px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="388" onChange="return(check_item_gw(this.form,314));"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J180_005F_94F5_8D6C_005F5" name="memo_17" value="{{ old('memo_17') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1718px; width:153px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:1718px; width:43px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:1718px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:1718px; width:154px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:1718px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1718px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1718px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:1718px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:1718px; width:97px; line-height:26px; height:27px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="403" onChange="return(check_item_gw(this.form,314));"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:24px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J180_005F_94F5_8D6C_005F6" name="memo_18" value="{{ old('memo_18') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1744px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:1744px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:1744px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:1744px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:1744px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1744px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1744px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:1744px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:1744px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="418" onChange="return(check_item_gw(this.form,314));"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J180_005F_94F5_8D6C_005F7" name="memo_19" value="{{ old('memo_19') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1771px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:1771px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:1771px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:1771px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:1771px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1771px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1771px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:1771px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:1771px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="433" onChange="return(check_item_gw(this.form,314));"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J180_005F_94F5_8D6C_005F8" name="memo_20" value="{{ old('memo_20') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1798px; width:153px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:1798px; width:43px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:1798px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:1798px; width:154px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:1798px; width:39px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1798px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1798px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:1798px; width:77px; height:27px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:1798px; width:97px; line-height:26px; height:27px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="448" onChange="return(check_item_gw(this.form,314));"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:24px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J180_005F_94F5_8D6C_005F9" name="memo_21" value="{{ old('memo_21') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1824px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:1824px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:1824px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:1824px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:1824px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1824px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1824px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:1824px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:1824px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="463" onChange="return(check_item_gw(this.form,314));"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J180_005F_94F5_8D6C_005F10" name="memo_22" value="{{ old('memo_22') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1851px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:1851px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:1851px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:1851px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:1851px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1851px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1851px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:1851px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:1851px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="478" onChange="return(check_item_gw(this.form,314));"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J180_005F_94F5_8D6C_005F11" name="memo_23" value="{{ old('memo_23') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1878px; width:153px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:186px; top:1878px; width:43px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:1878px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:266px; top:1878px; width:154px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:419px; top:1878px; width:39px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1878px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:1878px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:1878px; width:77px; height:28px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:1878px; width:97px; line-height:26px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="493" onChange="return(check_item_gw(this.form,314));"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:9px; font-family:'ＭＳ 明朝', serif; width:95px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J180_005F_94F5_8D6C_005F12" name="memo_24" value="{{ old('memo_24') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:1567px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:1567px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:1567px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:125px; top:1567px; width:57px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離　職　日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:190px; top:1567px; width:34px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離職月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:1567px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:1567px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:1567px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:1567px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:358px; top:1567px; width:57px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離　職　日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:1567px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:1594px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:1594px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:1594px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:1594px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:1594px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:1594px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:1594px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:1594px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:1594px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:1594px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:1594px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:1594px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:1594px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:1621px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:1621px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:1621px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:1621px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:1621px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:1621px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:1621px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:1621px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:1621px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:1621px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:1621px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:1621px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:1621px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:1647px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:1647px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:1647px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:1647px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:1647px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:1647px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:1647px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:1647px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:1647px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:1647px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:1647px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:1647px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:1647px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:1674px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:1674px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:1674px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:1674px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:1674px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:1674px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:1674px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:1674px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:1674px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:1674px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:1674px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:1674px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:1674px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:1701px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:1701px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:1701px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:1701px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:1701px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:1701px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:1701px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:1701px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:1701px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:1701px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:1701px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:1701px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:1701px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:1727px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:1727px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:1727px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:1727px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:1727px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:1727px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:1727px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:1727px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:1727px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:1727px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:1727px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:1727px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:1727px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:1754px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:1754px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:1754px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:1754px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:1754px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:1754px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:1754px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:1754px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:1754px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:1754px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:1754px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:1754px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:1754px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:1781px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:1781px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:1781px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:1781px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:1781px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:1781px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:1781px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:1781px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:1781px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:1781px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:1781px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:1781px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:1781px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:1807px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:1807px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:1807px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:1807px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:1807px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:1807px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:1807px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:1807px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:1807px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:1807px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:1807px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:1807px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:1807px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:1834px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:1834px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:1834px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:1834px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:1834px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:1834px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:1834px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:1834px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:1834px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:1834px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:1834px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:1834px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:1834px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:1861px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:1861px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:1861px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:1861px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:1861px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:1861px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:1861px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:1861px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:1861px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:1861px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:1861px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:1861px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:1861px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:1887px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:93px; top:1887px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:1887px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:139px; top:1887px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:1887px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:213px; top:1887px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:253px; top:1887px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:291px; top:1887px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:1887px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:339px; top:1887px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">～</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:371px; top:1887px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:1887px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:443px; top:1887px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:1588px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="314" onChange="return(check_item_gw(this.form,313));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J166_005F_8C8E_005F1" name="insured_period_start_month_13"
            value="{{ old('insured_period_start_month_13') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:1588px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="315" onChange="return(check_item_gw(this.form,313));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J167_005F_93FA_005F1" name="insured_period_start_day_13"
            value="{{ old('insured_period_start_day_13') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:1588px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="316" onChange="return(check_item_gw(this.form,313));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J168_005F_8C8E_005F1" name="insured_period_end_month_13"
            value="{{ old('insured_period_end_month_13') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:1588px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="317" onChange="return(check_item_gw(this.form,313));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J169_005F_93FA_005F1" name="insured_period_end_day_13"
            value="{{ old('insured_period_end_day_13') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:1588px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="318" onChange="return(check_item_gw(this.form,313));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J170_005F_8C8E_005F1" name="insured_period_month_13"
            value="{{ old('insured_period_month_13') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:1588px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="319"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J171_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F1"
            name="basic_days_for_salary_payment_of_insured_period_13"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_13') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:1588px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="320"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J172_005F_8C8E_005F1" name="salary_payment_period_start_month_13"
            value="{{ old('salary_payment_period_start_month_13') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:1588px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="321"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J173_005F_93FA_005F1" name="salary_payment_period_start_day_13"
            value="{{ old('salary_payment_period_start_day_13') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:1588px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="322"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J174_005F_8C8E_005F1" name="salary_payment_period_end_month_13"
            value="{{ old('salary_payment_period_end_month_13') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:1588px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="323"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J175_005F_93FA_005F1" name="salary_payment_period_end_day_13"
            value="{{ old('salary_payment_period_end_day_13') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:1588px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="324"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J176_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F1"
            name="basic_days_of_salary_payment_period_13"
            value="{{ old('basic_days_of_salary_payment_period_13') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:1588px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="325" onBlur="return calc3(this.form, 13);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J177_005F_92C0_8BE0_8A7AA_005F1" name="salary_amount_A_13"
            value="{{ old('salary_amount_A_13') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:1588px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="326" onBlur="return calc3(this.form, 13);"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J178_005F_92C0_8BE0_8A7AB_005F1" name="salary_amount_B_13"
            value="{{ old('salary_amount_B_13') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:1588px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="327"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J179_005F_92C0_8BE0_8A7A_8C76_005F1" name="salary_amount_total_13"
            value="{{ old('salary_amount_total_13') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:1615px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="329" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J166_005F_8C8E_005F2" name="insured_period_start_month_14"
            value="{{ old('insured_period_start_month_14') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:1615px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="330" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J167_005F_93FA_005F2" name="insured_period_start_day_14"
            value="{{ old('insured_period_start_day_14') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:1615px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="331" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J168_005F_8C8E_005F2" name="insured_period_end_month_14"
            value="{{ old('insured_period_end_month_14') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:1615px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="332" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J169_005F_93FA_005F2" name="insured_period_end_day_14"
            value="{{ old('insured_period_end_day_14') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:1615px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="333" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J170_005F_8C8E_005F2" name="insured_period_month_14"
            value="{{ old('insured_period_month_14') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:1615px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="334" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J171_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F2"
            name="basic_days_for_salary_payment_of_insured_period_14"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_14') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:1615px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="335" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J172_005F_8C8E_005F2" name="salary_payment_period_start_month_14"
            value="{{ old('salary_payment_period_start_month_14') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:1615px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="336" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J173_005F_93FA_005F2" name="salary_payment_period_start_day_14"
            value="{{ old('salary_payment_period_start_day_14') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:1615px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="337" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J174_005F_8C8E_005F2" name="salary_payment_period_end_month_14"
            value="{{ old('salary_payment_period_end_month_14') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:1615px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="338" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J175_005F_93FA_005F2" name="salary_payment_period_end_day_14"
            value="{{ old('salary_payment_period_end_day_14') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:1615px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="339" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J176_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F2"
            name="basic_days_of_salary_payment_period_14"
            value="{{ old('basic_days_of_salary_payment_period_14') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:1615px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="340" onBlur="return calc3(this.form, 14);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J177_005F_92C0_8BE0_8A7AA_005F2" name="salary_amount_A_14"
            value="{{ old('salary_amount_A_14') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:1615px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="341" onBlur="return calc3(this.form, 14);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J178_005F_92C0_8BE0_8A7AB_005F2" name="salary_amount_B_14"
            value="{{ old('salary_amount_B_14') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:1615px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="342" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J179_005F_92C0_8BE0_8A7A_8C76_005F2" name="salary_amount_total_14"
            value="{{ old('salary_amount_total_14') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:1642px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="344" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J166_005F_8C8E_005F3" name="insured_period_start_month_15"
            value="{{ old('insured_period_start_month_15') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:1642px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="345" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J167_005F_93FA_005F3" name="insured_period_start_day_15"
            value="{{ old('insured_period_start_day_15') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:1642px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="346" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J168_005F_8C8E_005F3" name="insured_period_end_month_15"
            value="{{ old('insured_period_end_month_15') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:1642px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="347" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J169_005F_93FA_005F3" name="insured_period_end_day_15"
            value="{{ old('insured_period_end_day_15') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:1642px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="348" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J170_005F_8C8E_005F3" name="insured_period_month_15"
            value="{{ old('insured_period_month_15') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:1642px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="349" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J171_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F3"
            name="basic_days_for_salary_payment_of_insured_period_15"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_15') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:1642px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="350" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J172_005F_8C8E_005F3" name="salary_payment_period_start_month_15"
            value="{{ old('salary_payment_period_start_month_15') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:1642px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="351" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J173_005F_93FA_005F3" name="salary_payment_period_start_day_15"
            value="{{ old('salary_payment_period_start_day_15') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:1642px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="352" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J174_005F_8C8E_005F3" name="salary_payment_period_end_month_15"
            value="{{ old('salary_payment_period_end_month_15') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:1642px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="353" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J175_005F_93FA_005F3" name="salary_payment_period_end_day_15"
            value="{{ old('salary_payment_period_end_day_15') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:1642px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="354" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J176_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F3"
            name="basic_days_of_salary_payment_period_15"
            value="{{ old('basic_days_of_salary_payment_period_15') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:1642px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="355" onBlur="return calc3(this.form, 15);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J177_005F_92C0_8BE0_8A7AA_005F3" name="salary_amount_A_15"
            value="{{ old('salary_amount_A_15') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:1642px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="356" onBlur="return calc3(this.form, 15);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J178_005F_92C0_8BE0_8A7AB_005F3" name="salary_amount_B_15"
            value="{{ old('salary_amount_B_15') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:1642px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="357" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J179_005F_92C0_8BE0_8A7A_8C76_005F3" name="salary_amount_total_15"
            value="{{ old('salary_amount_total_15') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:1668px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="359" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J166_005F_8C8E_005F4" name="insured_period_start_month_16"
            value="{{ old('insured_period_start_month_16') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:1668px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="360" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J167_005F_93FA_005F4" name="insured_period_start_day_16"
            value="{{ old('insured_period_start_day_16') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:1668px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="361" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J168_005F_8C8E_005F4" name="insured_period_end_month_16"
            value="{{ old('insured_period_end_month_16') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:1668px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="362" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J169_005F_93FA_005F4" name="insured_period_end_day_16"
            value="{{ old('insured_period_end_day_16') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:1668px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="363" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J170_005F_8C8E_005F4" name="insured_period_month_16"
            value="{{ old('insured_period_month_16') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:1668px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="364" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J171_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F4"
            name="basic_days_for_salary_payment_of_insured_period_16"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_16') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:1668px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="365" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J172_005F_8C8E_005F4" name="salary_payment_period_start_month_16"
            value="{{ old('salary_payment_period_start_month_16') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:1668px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="366" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J173_005F_93FA_005F4" name="salary_payment_period_start_day_16"
            value="{{ old('salary_payment_period_start_day_16') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:1668px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="367" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J174_005F_8C8E_005F4" name="salary_payment_period_end_month_16"
            value="{{ old('salary_payment_period_end_month_16') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:1668px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="368" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J175_005F_93FA_005F4" name="salary_payment_period_end_day_16"
            value="{{ old('salary_payment_period_end_day_16') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:1668px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="369" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J176_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F4"
            name="basic_days_of_salary_payment_period_16"
            value="{{ old('basic_days_of_salary_payment_period_16') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:1668px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="370" onBlur="return calc3(this.form, 16);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J177_005F_92C0_8BE0_8A7AA_005F4" name="salary_amount_A_16"
            value="{{ old('salary_amount_A_16') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:1668px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="371" onBlur="return calc3(this.form, 16);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J178_005F_92C0_8BE0_8A7AB_005F4" name="salary_amount_B_16"
            value="{{ old('salary_amount_B_16') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:1668px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="372" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J179_005F_92C0_8BE0_8A7A_8C76_005F4" name="salary_amount_total_16"
            value="{{ old('salary_amount_total_16') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:1695px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="374" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J166_005F_8C8E_005F5" name="insured_period_start_month_17"
            value="{{ old('insured_period_start_month_17') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:1695px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="375" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J167_005F_93FA_005F5" name="insured_period_start_day_17"
            value="{{ old('insured_period_start_day_17') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:1695px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="376" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J168_005F_8C8E_005F5" name="insured_period_end_month_17"
            value="{{ old('insured_period_end_month_17') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:1695px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="377" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J169_005F_93FA_005F5" name="insured_period_end_day_17"
            value="{{ old('insured_period_end_day_17') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:1695px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="378" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J170_005F_8C8E_005F5" name="insured_period_month_17"
            value="{{ old('insured_period_month_17') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:1695px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="379" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J171_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F5"
            name="basic_days_for_salary_payment_of_insured_period_17"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_17') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:1695px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="380" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J172_005F_8C8E_005F5" name="salary_payment_period_start_month_17"
            value="{{ old('salary_payment_period_start_month_17') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:1695px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="381" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J173_005F_93FA_005F5" name="salary_payment_period_start_day_17"
            value="{{ old('salary_payment_period_start_day_17') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:1695px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="382" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J174_005F_8C8E_005F5" name="salary_payment_period_end_month_17"
            value="{{ old('salary_payment_period_end_month_17') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:1695px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="383" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J175_005F_93FA_005F5" name="salary_payment_period_end_day_17"
            value="{{ old('salary_payment_period_end_day_17') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:1695px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="384" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J176_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F5"
            name="basic_days_of_salary_payment_period_17"
            value="{{ old('basic_days_of_salary_payment_period_17') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:1695px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="385" onBlur="return calc3(this.form, 17);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J177_005F_92C0_8BE0_8A7AA_005F5" name="salary_amount_A_17"
            value="{{ old('salary_amount_A_17') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:1695px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="386" onBlur="return calc3(this.form, 17);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J178_005F_92C0_8BE0_8A7AB_005F5" name="salary_amount_B_17"
            value="{{ old('salary_amount_B_17') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:1695px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="387" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J179_005F_92C0_8BE0_8A7A_8C76_005F5" name="salary_amount_total_17"
            value="{{ old('salary_amount_total_17') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:1722px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="389" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J166_005F_8C8E_005F6" name="insured_period_start_month_18"
            value="{{ old('insured_period_start_month_18') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:1722px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="390" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J167_005F_93FA_005F6" name="insured_period_start_day_18"
            value="{{ old('insured_period_start_day_18') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:1722px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="391" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J168_005F_8C8E_005F6" name="insured_period_end_month_18"
            value="{{ old('insured_period_end_month_18') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:1722px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="392" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J169_005F_93FA_005F6" name="insured_period_end_day_18"
            value="{{ old('insured_period_end_day_18') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:1722px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="393" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J170_005F_8C8E_005F6" name="insured_period_month_18"
            value="{{ old('insured_period_month_18') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:1722px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="394" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J171_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F6"
            name="basic_days_for_salary_payment_of_insured_period_18"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_18') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:1722px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="395" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J172_005F_8C8E_005F6" name="salary_payment_period_start_month_18"
            value="{{ old('salary_payment_period_start_month_18') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:1722px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="396" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J173_005F_93FA_005F6" name="salary_payment_period_start_day_18"
            value="{{ old('salary_payment_period_start_day_18') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:1722px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="397" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J174_005F_8C8E_005F6" name="salary_payment_period_end_month_18"
            value="{{ old('salary_payment_period_end_month_18') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:1722px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="398" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J175_005F_93FA_005F6" name="salary_payment_period_end_day_18"
            value="{{ old('salary_payment_period_end_day_18') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:1722px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="399" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J176_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F6"
            name="basic_days_of_salary_payment_period_18"
            value="{{ old('basic_days_of_salary_payment_period_18') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:1722px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="400" onBlur="return calc3(this.form, 18);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J177_005F_92C0_8BE0_8A7AA_005F6" name="salary_amount_A_18"
            value="{{ old('salary_amount_A_18') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:1722px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="401" onBlur="return calc3(this.form, 18);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J178_005F_92C0_8BE0_8A7AB_005F6" name="salary_amount_B_18"
            value="{{ old('salary_amount_B_18') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:1722px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="402" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J179_005F_92C0_8BE0_8A7A_8C76_005F6" name="salary_amount_total_18"
            value="{{ old('salary_amount_total_18') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:1748px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="404" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J166_005F_8C8E_005F7" name="insured_period_start_month_19"
            value="{{ old('insured_period_start_month_19') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:1748px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="405" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J167_005F_93FA_005F7" name="insured_period_start_day_19"
            value="{{ old('insured_period_start_day_19') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:1748px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="406" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J168_005F_8C8E_005F7" name="insured_period_end_month_19"
            value="{{ old('insured_period_end_month_19') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:1748px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="407" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J169_005F_93FA_005F7" name="insured_period_end_day_19"
            value="{{ old('insured_period_end_day_19') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:1748px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="408" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J170_005F_8C8E_005F7" name="insured_period_month_19"
            value="{{ old('insured_period_month_19') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:1748px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="409" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J171_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F7"
            name="basic_days_for_salary_payment_of_insured_period_19"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_19') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:1748px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="410" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J172_005F_8C8E_005F7" name="salary_payment_period_start_month_19"
            value="{{ old('salary_payment_period_start_month_19') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:1748px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="411" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J173_005F_93FA_005F7" name="salary_payment_period_start_day_19"
            value="{{ old('salary_payment_period_start_day_19') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:1748px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="412" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J174_005F_8C8E_005F7" name="salary_payment_period_end_month_19"
            value="{{ old('salary_payment_period_end_month_19') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:1748px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="413" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J175_005F_93FA_005F7" name="salary_payment_period_end_day_19"
            value="{{ old('salary_payment_period_end_day_19') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:1748px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="414" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J176_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F7"
            name="basic_days_of_salary_payment_period_19"
            value="{{ old('basic_days_of_salary_payment_period_19') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:1748px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="415" onBlur="return calc3(this.form, 19);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J177_005F_92C0_8BE0_8A7AA_005F7" name="salary_amount_A_19"
            value="{{ old('salary_amount_A_19') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:1748px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="416" onBlur="return calc3(this.form, 19);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J178_005F_92C0_8BE0_8A7AB_005F7" name="salary_amount_B_19"
            value="{{ old('salary_amount_B_19') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:1748px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="417" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J179_005F_92C0_8BE0_8A7A_8C76_005F7" name="salary_amount_total_19"
            value="{{ old('salary_amount_total_19') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:1775px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="419" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J166_005F_8C8E_005F8" name="insured_period_start_month_20"
            value="{{ old('insured_period_start_month_20') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:1775px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="420" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J167_005F_93FA_005F8" name="insured_period_start_day_20"
            value="{{ old('insured_period_start_day_20') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:1775px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="421" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J168_005F_8C8E_005F8" name="insured_period_end_month_20"
            value="{{ old('insured_period_end_month_20') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:1775px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="422" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J169_005F_93FA_005F8" name="insured_period_end_day_20"
            value="{{ old('insured_period_end_day_20') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:1775px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="423" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J170_005F_8C8E_005F8" name="insured_period_month_20"
            value="{{ old('insured_period_month_20') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:1775px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="424" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J171_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F8"
            name="basic_days_for_salary_payment_of_insured_period_20"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_20') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:1775px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="425" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J172_005F_8C8E_005F8" name="salary_payment_period_start_month_20"
            value="{{ old('salary_payment_period_start_month_20') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:1775px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="426" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J173_005F_93FA_005F8" name="salary_payment_period_start_day_20"
            value="{{ old('salary_payment_period_start_day_20') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:1775px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="427" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J174_005F_8C8E_005F8" name="salary_payment_period_end_month_20"
            value="{{ old('salary_payment_period_end_month_20') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:1775px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="428" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J175_005F_93FA_005F8" name="salary_payment_period_end_day_20"
            value="{{ old('salary_payment_period_end_day_20') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:1775px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="429" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J176_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F8"
            name="basic_days_of_salary_payment_period_20"
            value="{{ old('basic_days_of_salary_payment_period_20') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:1775px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="430" onBlur="return calc3(this.form, 20);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J177_005F_92C0_8BE0_8A7AA_005F8" name="salary_amount_A_20"
            value="{{ old('salary_amount_A_20') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:1775px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="431" onBlur="return calc3(this.form, 20);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J178_005F_92C0_8BE0_8A7AB_005F8" name="salary_amount_B_20"
            value="{{ old('salary_amount_B_20') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:1775px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="432" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J179_005F_92C0_8BE0_8A7A_8C76_005F8" name="salary_amount_total_20"
            value="{{ old('salary_amount_total_20') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:1802px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="434" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J166_005F_8C8E_005F9" name="insured_period_start_month_21"
            value="{{ old('insured_period_start_month_21') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:1802px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="435" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J167_005F_93FA_005F9" name="insured_period_start_day_21"
            value="{{ old('insured_period_start_day_21') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:1802px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="436" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J168_005F_8C8E_005F9" name="insured_period_end_month_21"
            value="{{ old('insured_period_end_month_21') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:1802px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="437" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J169_005F_93FA_005F9" name="insured_period_end_day_21"
            value="{{ old('insured_period_end_day_21') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:1802px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="438" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J170_005F_8C8E_005F9" name="insured_period_month_21"
            value="{{ old('insured_period_month_21') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:1802px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="439" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J171_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F9"
            name="basic_days_for_salary_payment_of_insured_period_21"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_21') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:1802px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="440" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J172_005F_8C8E_005F9" name="salary_payment_period_start_month_21"
            value="{{ old('salary_payment_period_start_month_21') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:1802px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="441" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J173_005F_93FA_005F9" name="salary_payment_period_start_day_21"
            value="{{ old('salary_payment_period_start_day_21') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:1802px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="442" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J174_005F_8C8E_005F9" name="salary_payment_period_end_month_21"
            value="{{ old('salary_payment_period_end_month_21') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:1802px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="443" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J175_005F_93FA_005F9" name="salary_payment_period_end_day_21"
            value="{{ old('salary_payment_period_end_day_21') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:1802px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="444" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J176_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F9"
            name="basic_days_of_salary_payment_period_21"
            value="{{ old('basic_days_of_salary_payment_period_21') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:1802px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="445" onBlur="return calc3(this.form, 21);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J177_005F_92C0_8BE0_8A7AA_005F9" name="salary_amount_A_21"
            value="{{ old('salary_amount_A_21') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:1802px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="446" onBlur="return calc3(this.form, 21);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J178_005F_92C0_8BE0_8A7AB_005F9" name="salary_amount_B_21"
            value="{{ old('salary_amount_B_21') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:1802px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="447" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J179_005F_92C0_8BE0_8A7A_8C76_005F9" name="salary_amount_total_21"
            value="{{ old('salary_amount_total_21') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:1828px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="449" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J166_005F_8C8E_005F10" name="insured_period_start_month_22"
            value="{{ old('insured_period_start_month_22') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:1828px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="450" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J167_005F_93FA_005F10" name="insured_period_start_day_22"
            value="{{ old('insured_period_start_day_22') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:1828px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="451" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J168_005F_8C8E_005F10" name="insured_period_end_month_22"
            value="{{ old('insured_period_end_month_22') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:1828px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="452" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J169_005F_93FA_005F10" name="insured_period_end_day_22"
            value="{{ old('insured_period_end_day_22') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:1828px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="453" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J170_005F_8C8E_005F10" name="insured_period_month_22"
            value="{{ old('insured_period_month_22') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:1828px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="454" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J171_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F10"
            name="basic_days_for_salary_payment_of_insured_period_22"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_22') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:1828px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="455" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J172_005F_8C8E_005F10" name="salary_payment_period_start_month_22"
            value="{{ old('salary_payment_period_start_month_22') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:1828px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="456" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J173_005F_93FA_005F10" name="salary_payment_period_start_day_22"
            value="{{ old('salary_payment_period_start_day_22') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:1828px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="457" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J174_005F_8C8E_005F10" name="salary_payment_period_end_month_22"
            value="{{ old('salary_payment_period_end_month_22') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:1828px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="458" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J175_005F_93FA_005F10" name="salary_payment_period_end_day_22"
            value="{{ old('salary_payment_period_end_day_22') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:1828px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="459" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J176_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F10"
            name="basic_days_of_salary_payment_period_22"
            value="{{ old('basic_days_of_salary_payment_period_22') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:1828px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="460" onBlur="return calc3(this.form, 22);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J177_005F_92C0_8BE0_8A7AA_005F10" name="salary_amount_A_22"
            value="{{ old('salary_amount_A_22') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:1828px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="461" onBlur="return calc3(this.form, 22);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J178_005F_92C0_8BE0_8A7AB_005F10" name="salary_amount_B_22"
            value="{{ old('salary_amount_B_22') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:1828px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="462" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J179_005F_92C0_8BE0_8A7A_8C76_005F10" name="salary_amount_total_22"
            value="{{ old('salary_amount_total_22') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:1855px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="464" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J166_005F_8C8E_005F11" name="insured_period_start_month_23"
            value="{{ old('insured_period_start_month_23') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:1855px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="465" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J167_005F_93FA_005F11" name="insured_period_start_day_23"
            value="{{ old('insured_period_start_day_23') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:1855px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="466" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J168_005F_8C8E_005F11" name="insured_period_end_month_23"
            value="{{ old('insured_period_end_month_23') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:1855px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="467" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J169_005F_93FA_005F11" name="insured_period_end_day_23"
            value="{{ old('insured_period_end_day_23') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:1855px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="468" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J170_005F_8C8E_005F11" name="insured_period_month_23"
            value="{{ old('insured_period_month_23') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:1855px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="469" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J171_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F11"
            name="basic_days_for_salary_payment_of_insured_period_23"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_23') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:1855px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="470" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J172_005F_8C8E_005F11" name="salary_payment_period_start_month_23"
            value="{{ old('salary_payment_period_start_month_23') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:1855px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="471" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J173_005F_93FA_005F11" name="salary_payment_period_start_day_23"
            value="{{ old('salary_payment_period_start_day_23') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:1855px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="472" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J174_005F_8C8E_005F11" name="salary_payment_period_end_month_23"
            value="{{ old('salary_payment_period_end_month_23') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:1855px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="473" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J175_005F_93FA_005F11" name="salary_payment_period_end_day_23"
            value="{{ old('salary_payment_period_end_day_23') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:1855px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="474" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J176_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F11"
            name="basic_days_of_salary_payment_period_23"
            value="{{ old('basic_days_of_salary_payment_period_23') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:1855px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="475" onBlur="return calc3(this.form, 23);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J177_005F_92C0_8BE0_8A7AA_005F11" name="salary_amount_A_23"
            value="{{ old('salary_amount_A_23') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:1855px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="476" onBlur="return calc3(this.form, 23);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J178_005F_92C0_8BE0_8A7AB_005F11" name="salary_amount_B_23"
            value="{{ old('salary_amount_B_23') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:1855px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="477" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J179_005F_92C0_8BE0_8A7A_8C76_005F11" name="salary_amount_total_23"
            value="{{ old('salary_amount_total_23') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:1882px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="479" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J166_005F_8C8E_005F12" name="insured_period_start_month_24"
            value="{{ old('insured_period_start_month_24') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:72px; top:1882px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="480" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J167_005F_93FA_005F12" name="insured_period_start_day_24"
            value="{{ old('insured_period_start_day_24') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:118px; top:1882px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="481" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J168_005F_8C8E_005F12" name="insured_period_end_month_24"
            value="{{ old('insured_period_end_month_24') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:150px; top:1882px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="482" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J169_005F_93FA_005F12" name="insured_period_end_day_24"
            value="{{ old('insured_period_end_day_24') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:190px; top:1882px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="483" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J170_005F_8C8E_005F12" name="insured_period_month_24"
            value="{{ old('insured_period_month_24') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:232px; top:1882px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="484" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J171_005F_92C0_8BE0_8E78_95A5_8AEE_9162_93FA_9094_005F12"
            name="basic_days_for_salary_payment_of_insured_period_24"
            value="{{ old('basic_days_for_salary_payment_of_insured_period_24') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:270px; top:1882px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="485" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J172_005F_8C8E_005F12" name="salary_payment_period_start_month_24"
            value="{{ old('salary_payment_period_start_month_24') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:302px; top:1882px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="486" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J173_005F_93FA_005F12" name="salary_payment_period_start_day_24"
            value="{{ old('salary_payment_period_start_day_24') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:350px; top:1882px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="487" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J174_005F_8C8E_005F12" name="salary_payment_period_end_month_24"
            value="{{ old('salary_payment_period_end_month_24') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:382px; top:1882px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="488" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J175_005F_93FA_005F12" name="salary_payment_period_end_day_24"
            value="{{ old('salary_payment_period_end_day_24') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:422px; top:1882px; width:19px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="489" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J176_005F_92C0_8BE0_8E78_95A5_91CE_8FDB_8AFA_8AD4_005F_8AEE_9162_93FA_9094_005F12"
            name="basic_days_of_salary_payment_period_24"
            value="{{ old('basic_days_of_salary_payment_period_24') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:461px; top:1882px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="490" onBlur="return calc3(this.form, 24);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J177_005F_92C0_8BE0_8A7AA_005F12" name="salary_amount_A_24"
            value="{{ old('salary_amount_A_24') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:537px; top:1882px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="491" onBlur="return calc3(this.form, 24);" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J178_005F_92C0_8BE0_8A7AB_005F12" name="salary_amount_B_24"
            value="{{ old('salary_amount_B_24') }}" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:613px; top:1882px; width:68px; height:19px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="492" onChange="return(check_item_gw(this.form,314));"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:68px; max-width:68px; height:19px; ime-mode:inactive;"
            type="TEXT" id="J179_005F_92C0_8BE0_8A7A_8C76_005F12" name="salary_amount_total_24"
            value="{{ old('salary_amount_total_24') }}" maxlength="8" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1905px; width:62px; height:63px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:45px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:35px; top:1908px; width:45px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（１４）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:41px; top:1924px; width:46px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">賃&nbsp;金&nbsp;に</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:41px; top:1937px; width:46px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">関&nbsp;す&nbsp;る</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:41px; top:1950px; width:46px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">特記事項</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:95px; top:1905px; width:363px; line-height:63px; height:63px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="493"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 40px 0px 0px; width:361px; height:60px; ime-mode:active;"
            id="J181_005F_91B1_8E86_005F_92C0_8BE0_82C9_8AD6_82B7_82E9_93C1_8B4C_8E96_8D80" name="salary_notices_1"
            value="{{ old('salary_notices_1') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1905px; width:325px; height:63px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:45px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:458px; top:1908px; width:45px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（１５）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:495px; top:1908px; width:265px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">この証明書の記載内容(（７）欄を除く)は相違ないと</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:495px; top:1922px; width:80px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">認めます。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:480px; top:1937px; width:4px; height:24px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; padding:14px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:491px; top:1937px; width:34px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離職者</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:491px; top:1950px; width:34px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">氏　名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0); left:529px; top:1937px; width:4px; height:24px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; padding:14px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:1967px; width:39px; height:173px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:155px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:1971px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">※</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:1986px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">公</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:2002px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">共</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:2017px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:2032px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">業</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:2047px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">安</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:2063px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">定</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:2078px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">所</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:2093px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">記</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:2108px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">載</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:2124px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:72px; top:1967px; width:572px; height:100px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:82px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:80px; top:1975px; width:45px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（１５）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:118px; top:1975px; width:49px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">欄の記載</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:217px; top:1975px; width:15px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">有・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:257px; top:1975px; width:15px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">無</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:80px; top:1994px; width:45px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（１６）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:118px; top:1994px; width:49px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">欄の記載</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:217px; top:1994px; width:23px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">有・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:257px; top:1994px; width:15px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">無</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:118px; top:2013px; width:22px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">資・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:167px; top:2013px; width:15px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">聴</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:201px; top:1975px; width:14px; line-height:15px; height:15px; text-align:center; font-size:15px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" value="有"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" disabled id="Group1_005F1" name="Group1_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:241px; top:1975px; width:14px; line-height:15px; height:15px; text-align:center; font-size:15px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" value="無"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" disabled id="Group1_005F2" name="Group1_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:201px; top:1994px; width:14px; line-height:15px; height:15px; text-align:center; font-size:15px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" value="有"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" disabled id="Group2_005F1" name="Group2_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:241px; top:1994px; width:14px; line-height:15px; height:15px; text-align:center; font-size:15px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" value="無"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" disabled id="Group2_005F2" name="Group2_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:95px; top:2013px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check1" disabled="disabled" name="check1"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:152px; top:2013px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check2" disabled="disabled" name="check2"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:544px; top:1969px; width:88px; height:16px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:88px; max-width:88px; height:15px;"
            type="TEXT" id="J182_005F_92C0_8BE0_93FA_8A7A" name="J182" maxlength="13"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:72px; top:2066px; width:572px; height:74px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:56px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:80px; top:2068px; width:552px; line-height:68px; height:69px; font-size:10px; font-family:'ＭＳ 明朝', serif;">
        <TEXTAREA tabindex="-1" disabled
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 40px 0px 0px; width:552px; height:68px; ime-mode:active;"
            id="J184_005F_9574_8B4C_9793" name="J184"></TEXTAREA>
    </SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:2141px; width:739px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">　本手続きは電子申請による申請も可能です。本手続きについて、電子申請により行う場合には、被保険者が離職証明書の内容について確認したことを証明すること</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:2150px; width:739px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">ができるものを本離職証明書の提出と併せて送信することをもって、当該被保険者の電子署名に代えることができます。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:2160px; width:739px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">　また、本手続きについて、社会保険労務士が電子申請による本届書の提出に関する手続を事業主に代わって行う場合には、当該社会保険労務士が当該事業主の提出</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:2169px; width:739px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">代行者であることを証明することができるものを本届書の提出と併せて送信することをもって、当該事業主の電子署名に代えることができます。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:34px; top:2190px; width:47px; height:55px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:37px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:2196px; width:45px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">社会保険</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:2211px; width:45px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">労&nbsp;務&nbsp;士</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:2226px; width:45px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">記&nbsp;載&nbsp;欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:80px; top:2190px; width:153px; height:16px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:4px 0px 0px 0px;">作成年月日･提出代行者･事務代理者の表示</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:80px; top:2205px; width:153px; height:40px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:22px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:150px; top:2211px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:181px; top:2211px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:212px; top:2211px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:232px; top:2190px; width:138px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">氏　　　　　　名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:232px; top:2205px; width:138px; height:40px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:22px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:369px; top:2190px; width:96px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">電　話　番　号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:369px; top:2205px; width:96px; height:40px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:22px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:411px; top:2209px; width:13px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:411px; top:2226px; width:13px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:518px; top:2183px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">※</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:2183px; width:50px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">所長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:533px; top:2196px; width:50px; height:47px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:29px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:582px; top:2183px; width:51px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">次長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:582px; top:2196px; width:51px; height:47px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:29px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:632px; top:2183px; width:50px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">課長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:632px; top:2196px; width:50px; height:47px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:29px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:681px; top:2183px; width:51px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">係長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:681px; top:2196px; width:51px; height:47px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:29px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:731px; top:2183px; width:51px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">係</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:731px; top:2196px; width:51px; height:47px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:29px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:34px; top:2245px; width:747px; line-height:49px; height:50px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="496"
            style="overflow:hidden; text-align:center; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 50px 0px 0px; width:747px; height:49px; ime-mode:active;"
            id="J185_005F_9574_8B4C_9793" name="remarks_1" value="{{ old('remarks_1') }}" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1379px; top:1192px; width:186px; height:23px; font-size:20px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" disabled
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:19px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:186px; max-width:186px; height:23px;"
            type="TEXT" id="J187_005F_91B1_8E86_005F_8DC4_94AD_8D73_944E_8C8E_93FA" name="J187"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:819px; top:1219px; width:747px; height:40px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:55px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:822px; top:1221px; width:33px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">（７）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:853px; top:1221px; width:693px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離職理由欄･･･事業主の方は、離職者の主たる離職理由が該当する理由を左の事業主記入欄の□の中から選択し、下の具体的事情記載欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:922px; top:1233px; width:171px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">に具体的事情を記載してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:834px; top:1245px; width:495px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">【離職理由は所定給付日数・給付制限の有無に影響を与える場合があり、適正に記載してください。】</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:819px; top:1258px; width:77px; height:26px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:824px; top:1265px; width:65px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">事業主記入欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:895px; top:1258px; width:595px; height:26px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:994px; top:1265px; width:366px; height:15px; text-align:center; font-size:14px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">離　　　　　職　　　　　理　　　　　由</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:1489px; top:1258px; width:77px; height:26px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1501px; top:1265px; width:57px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">※離職区分</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:819px; top:1283px; width:76px; height:878px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:802px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:1489px; top:1283px; width:77px; height:368px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:307px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:1489px; top:1642px; width:77px; height:621px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:581px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:830px; top:2167px; width:649px; height:45px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:28px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:902px; top:1285px; width:14px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">１</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:1285px; width:191px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">事業所の倒産等によるもの</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:1296px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（１）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:1296px; width:194px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">倒産手続開始、手形取引停止による離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:1309px; width:35px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">（２）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:1309px; width:342px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">事業所の廃止又は事業活動停止後事業再開の見込みがないため離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:902px; top:1322px; width:14px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">２</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:1322px; width:84px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">定年によるもの</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:912px; top:1335px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">定年による離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:990px; top:1335px; width:34px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（定年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1055px; top:1335px; width:23px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">歳）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:933px; top:1357px; width:91px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">定年後の継続雇用</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:1028px; top:1350px; width:4px; height:26px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; padding:6px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1059px; top:1348px; width:381px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">を希望していた（以下のａからｃまでのいずれかを１つ選択してください）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1059px; top:1364px; width:247px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">を希望していなかった</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:1379px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ａ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:971px; top:1379px; width:465px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">就業規則に定める解雇事由又は退職事由（年齢に係るものを除く。以下同じ。）に該当したため</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:948px; top:1390px; width:534px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">(解雇事由又は退職事由と同一の事由として就業規則又は労使協定に定める「継続雇用しないことができる事由」に該当して離職した場合も含む。)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:1401px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ｂ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:971px; top:1401px; width:515px; height:13px; text-align:center; font-size:9px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">平成25年3月31日以前に労使協定により定めた継続雇用制度の対象となる高年齢者に係る基準に該当しなかったため</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:1418px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ｃ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:971px; top:1418px; width:107px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">その他（具体的理由：</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1470px; top:1418px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:1442px; width:35px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">（１）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:1536px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（２）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:1442px; width:381px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">採用又は定年後の再雇用時等にあらかじめ定められた雇用期限到来による離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:1536px; width:152px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">労働契約期間満了による離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:902px; top:1430px; width:14px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">３</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:1430px; width:153px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">労働契約期間満了等によるもの</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:1454px; width:88px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(１回の契約期間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1043px; top:1454px; width:100px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">箇月、通算契約期間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1173px; top:1454px; width:99px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">箇月、契約更新回数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1303px; top:1454px; width:22px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">回)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:1465px; width:450px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(当初の契約締結後に契約期間や更新回数の上限を短縮し、その上限到来による離職に該当</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1373px; top:1465px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">する・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1420px; top:1465px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">しない)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:1477px; width:430px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(当初の契約締結後に契約期間や更新回数の上限を設け、その上限到来による離職に該当</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1363px; top:1477px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">する・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1410px; top:1477px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">しない)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:1489px; width:350px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(定年後の再雇用時にあらかじめ定められた雇用期限到来による離職で</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1281px; top:1489px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ある・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1330px; top:1489px; width:27px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ない)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:1501px; width:430px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(４年６箇月以上５年以下の通算契約期間の上限が定められ、この上限到来による離職で</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1365px; top:1501px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ある・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1415px; top:1501px; width:27px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ない)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:945px; top:1513px; width:500px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">→ある場合（同一事業所の有期雇用労働者に一様に４年６箇月以上５年以下の通算契約期間の上限が</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1008px; top:1525px; width:200px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">平成24年８月10日前から定められて</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1195px; top:1525px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">いた・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1250px; top:1525px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">いなかった)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:1548px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［１］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:1548px; width:190px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">下記［２］以外の労働者</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:1561px; width:88px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">(１回の契約期間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1043px; top:1561px; width:100px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">箇月、通算契約期間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1173px; top:1561px; width:99px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">箇月、契約更新回数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1303px; top:1561px; width:22px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">回)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:1574px; width:221px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(契約を更新又は延長することの確約・合意の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1165px; top:1574px; width:23px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">有・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1207px; top:1574px; width:12px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">無</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1219px; top:1574px; width:156px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(更新又は延長しない旨の明示の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1394px; top:1574px; width:23px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">有・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1434px; top:1574px; width:11px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">無</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1447px; top:1574px; width:16px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">))</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:1585px; width:168px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(直前の契約更新時に雇止め通知の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1112px; top:1585px; width:23px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">有・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1154px; top:1585px; width:27px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">無)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:1597px; width:198px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">(当初の契約締結後に不更新条項の追加が</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1140px; top:1597px; width:50px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">ある・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1185px; top:1597px; width:27px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">ない)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:1623px; width:153px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">労働者から契約の更新又は延長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1082px; top:1613px; width:8px; height:42px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:14px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:1086px; top:1613px; width:4px; height:36px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; padding:11px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1112px; top:1610px; width:152px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">を希望する旨の申出があった</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1112px; top:1623px; width:152px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">を希望しない旨の申出があった</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1112px; top:1635px; width:152px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">の希望に関する申出はなかった</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:963px; top:1661px; width:420px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">労働者派遣事業に雇用される派遣労働者のうち常時雇用される労働者以外の者</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:1661px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［２］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:1674px; width:88px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">(１回の契約期間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1043px; top:1674px; width:100px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">箇月、通算契約期間</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1173px; top:1674px; width:99px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">箇月、契約更新回数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1303px; top:1674px; width:22px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">回)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:929px; top:1688px; width:221px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">(契約を更新又は延長することの確約・合意の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1165px; top:1688px; width:23px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">有・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1207px; top:1688px; width:12px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">無</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1219px; top:1688px; width:156px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">(更新又は延長しない旨の明示の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1394px; top:1688px; width:23px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">有・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1434px; top:1688px; width:11px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">無</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1447px; top:1688px; width:16px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">))</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:1712px; width:153px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">労働者から契約の更新又は延長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1082px; top:1702px; width:8px; height:41px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; padding:13px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:1086px; top:1702px; width:4px; height:36px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; padding:11px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1112px; top:1700px; width:152px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">を希望する旨の申出があった</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1112px; top:1712px; width:152px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">を希望しない旨の申出があった</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1112px; top:1725px; width:152px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">の希望に関する申出はなかった</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:1738px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ａ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:971px; top:1738px; width:381px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">労働者が適用基準に該当する派遣就業の指示を拒否したことによる場合</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:1749px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">ｂ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:971px; top:1749px; width:495px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">事業主が適用基準に該当する派遣就業の指示を行わなかったことによる場合（指示した派遣就業</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:971px; top:1760px; width:381px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">が取りやめになったことによる場合を含む。）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:1772px; width:488px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">(ａに該当する場合は、更に下記の５のうち、該当する主たる離職理由を更に１つ選択してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:1785px; width:457px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">該当するものがない場合は下記の６を選択した上、具体的な理由を記載してください。)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:1808px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（３）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:1819px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（４）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:1808px; width:251px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">早期退職優遇制度、選択定年制度等により離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:1819px; width:53px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">移籍出向</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:902px; top:1831px; width:14px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">４</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:1844px; width:35px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">（１）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:1880px; width:35px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">［１］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:1856px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（２）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:1867px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（３）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:1895px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［２］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:1831px; width:176px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">事業主からの働きかけによるもの</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:1844px; width:381px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">解雇　（重責解雇を除く。）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:1856px; width:381px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">重責解雇　（労働者の責めに帰すべき重大な理由による解雇）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:1867px; width:381px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">希望退職の募集又は退職勧奨</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:1880px; width:289px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">事業の縮小又は一部休廃止に伴う人員整理を行うためのもの</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:1895px; width:122px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">その他（理由を具体的に</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1470px; top:1895px; width:11px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:902px; top:1907px; width:14px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">５</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:1920px; width:35px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">（１）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:1932px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［１］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:1944px; width:381px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">労働者が判断したため</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:1955px; width:35px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">［２］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:1979px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［３］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:2001px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［４］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:2014px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［５］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:1907px; width:153px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">労働者の判断によるもの</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:1920px; width:190px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">職場における事情による離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:1932px; width:461px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">労働条件に係る問題（賃金低下、賃金遅配、時間外労働、採用条件との相違等）があったと</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:1955px; width:430px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">事業主又は他の労働者から就業環境が著しく害されるような言動（故意の排斥、嫌がらせ等）を</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:1967px; width:430px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">受けたと労働者が判断したため</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:1979px; width:470px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">妊娠、出産、育児休業、介護休業等に係る問題（休業等の申出拒否、妊娠、出産、休業等を理由とする</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:952px; top:1990px; width:430px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">不利益取扱い）があったと労働者が判断したため</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:2001px; width:282px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">事業所での大規模な人員整理があったことを考慮した離職</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:2014px; width:289px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">職種転換等に適応することが困難であったため（教育訓練の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1272px; top:2014px; width:34px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">有　・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1333px; top:2014px; width:34px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">無　）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:2027px; width:35px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">［６］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:2043px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">［７］</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:910px; top:2056px; width:35px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">（２）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:2027px; width:331px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">事業所移転により通勤困難となった（なる）ため（旧（新）所在地：</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:960px; top:2043px; width:122px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">その他（理由を具体的に</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1470px; top:2027px; width:11px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1470px; top:2043px; width:11px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:941px; top:2056px; width:381px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">労働者の個人的な事情による離職（一身上の都合、転職希望等）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:902px; top:2140px; width:14px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">６</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:2140px; width:221px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">その他（１－５のいずれにも該当しない場合）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:925px; top:2152px; width:92px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">（理由を具体的に</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1470px; top:2152px; width:11px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:1296px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check3" disabled="disabled" name="check3"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:1309px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check4" disabled="disabled" name="check4"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:1335px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check5" disabled="disabled" name="check5"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:1443px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check6" disabled="disabled" name="check6"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:1536px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check7" disabled="disabled" name="check7"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:1807px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check8" disabled="disabled" name="check8"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:1819px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check9" disabled="disabled" name="check9"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:1844px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check10" disabled="disabled" name="check10"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:1856px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check11" disabled="disabled" name="check11"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:1880px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check12" disabled="disabled" name="check12"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:1895px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check13" disabled="disabled" name="check13"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:1932px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check14" disabled="disabled" name="check14"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:1955px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check15" disabled="disabled" name="check15"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:1979px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check16" disabled="disabled" name="check16"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:2001px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check17" disabled="disabled" name="check17"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:2013px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check18" disabled="disabled" name="check18"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:2027px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check19" disabled="disabled" name="check19"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:2043px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check20" disabled="disabled" name="check20"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:2058px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check21" disabled="disabled" name="check21"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:832px; top:2141px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check35" disabled="disabled" name="check35"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:1296px; width:65px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:1309px; width:65px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:1335px; width:65px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:1443px; width:65px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:1536px; width:65px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:1807px; width:65px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:1818px; width:65px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:1844px; width:65px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:1856px; width:65px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:1880px; width:80px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:1895px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:1932px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:1955px; width:80px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:1979px; width:80px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:2001px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:2012px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:2027px; width:80px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:2043px; width:80px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">･･･････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:2058px; width:65px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">････････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:845px; top:2140px; width:54px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">･･････････</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1040px; top:1348px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="有"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group3_005F1" disabled="disabled" name="Group3_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1040px; top:1364px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="無"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group3_005F2" disabled="disabled" name="Group3_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:933px; top:1381px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="就業規則に定める事由に該当したため"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group4_005F1" disabled="disabled" name="Group4_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:933px; top:1401px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="労使協定に定めた基準に該当しなかったため"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group4_005F2" disabled="disabled" name="Group4_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:933px; top:1416px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="その他"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group4_005F3" disabled="disabled" name="Group4_3"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1362px; top:1463px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="する"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group16_005F1" disabled="disabled" name="Group16_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1405px; top:1463px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="しない"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group16_005F2" disabled="disabled" name="Group16_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1352px; top:1476px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="する"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group17_005F1" disabled="disabled" name="Group17_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1395px; top:1476px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="しない"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group17_005F2" disabled="disabled" name="Group17_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1268px; top:1488px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="ある"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group18_005F1" disabled="disabled" name="Group18_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1313px; top:1488px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="ない"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group18_005F2" disabled="disabled" name="Group18_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1350px; top:1500px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="ある"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group19_005F1" disabled="disabled" name="Group19_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1400px; top:1500px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="ない"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group19_005F2" disabled="disabled" name="Group19_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1178px; top:1524px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="いた"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group20_005F1" disabled="disabled" name="Group20_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1235px; top:1524px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="いなかった"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group20_005F2" disabled="disabled" name="Group20_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:910px; top:1548px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="常時雇用される労働者"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group5_005F1" disabled="disabled" name="Group5_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:910px; top:1660px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="常時雇用される労働者以外"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group5_005F2" disabled="disabled" name="Group5_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1146px; top:1574px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="有"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group6_005F1" disabled="disabled" name="Group6_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1188px; top:1574px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="無"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group6_005F2" disabled="disabled" name="Group6_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1377px; top:1574px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="有"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group7_005F1" disabled="disabled" name="Group7_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1415px; top:1574px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="無"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group7_005F2" disabled="disabled" name="Group7_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1093px; top:1585px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="有"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group8_005F1" disabled="disabled" name="Group8_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1135px; top:1585px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="無"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group8_005F2" disabled="disabled" name="Group8_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1127px; top:1597px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="ある"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group21_005F1" disabled="disabled" name="Group21_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1170px; top:1597px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="ない"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group21_005F2" disabled="disabled" name="Group21_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1093px; top:1611px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="希望する申出有"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group9_005F1" disabled="disabled" name="Group9_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1093px; top:1623px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="希望しない申出有"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group9_005F2" disabled="disabled" name="Group9_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1093px; top:1636px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="申出無"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group9_005F3" disabled="disabled" name="Group9_3"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1148px; top:1688px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="有"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group10_005F1" disabled="disabled" name="Group10_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1190px; top:1688px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="無"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group10_005F2" disabled="disabled" name="Group10_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1379px; top:1688px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="有"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group11_005F1" disabled="disabled" name="Group11_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1417px; top:1688px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="無"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group11_005F2" disabled="disabled" name="Group11_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1093px; top:1700px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="希望する申出有"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group12_005F1" disabled="disabled" name="Group12_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1093px; top:1712px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="希望しない申出有"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group12_005F2" disabled="disabled" name="Group12_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1093px; top:1725px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="申出無"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group12_005F3" disabled="disabled" name="Group12_3"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:933px; top:1738px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="労働者が適用基準に派遣就業の指示を拒否したことによる場合"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group13_005F1" disabled="disabled" name="Group13_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:933px; top:1750px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="事業主が派遣就業の指示を行わなかったことによる場合"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group13_005F2" disabled="disabled" name="Group13_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1253px; top:2012px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="有"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group14_005F1" disabled="disabled" name="Group14_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1314px; top:2012px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="無"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group14_005F2" disabled="disabled" name="Group14_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:832px; top:2168px; width:150px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">具体的事情記載欄（事業主用）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:819px; top:2266px; width:374px; height:54px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:36px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:821px; top:2267px; width:45px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:4px 0px 0px 0px;">（１６）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:857px; top:2267px; width:167px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:4px 0px 0px 0px;">離職者本人の判断&nbsp;(選択すること)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:857px; top:2283px; width:164px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">事業主が記入した離職理由に異議</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:822px; top:2300px; width:134px; height:15px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:5px 0px 0px 0px;">(離職者氏名)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1047px; top:2283px; width:35px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">有り・</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1104px; top:2283px; width:23px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">無し</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1032px; top:2283px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="有"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group15_005F1" disabled="disabled" name="Group15_1"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1089px; top:2283px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="-1" disabled="disabled" value="無"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:10px; margin:auto;"
            type="RADIO" id="Group15_005F2" disabled="disabled" name="Group15_2"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:1297px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check22" disabled="disabled" name="check22"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:1297px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">１Ａ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:1322px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check23" disabled="disabled" name="check23"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:1322px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">１Ｂ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:1347px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check24" disabled="disabled" name="check24"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:1347px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">２Ａ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:1372px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check25" disabled="disabled" name="check25"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:1372px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">２Ｂ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:1397px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check26" disabled="disabled" name="check26"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:1397px; width:30px; height:16px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">２Ｃ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:1422px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check27" disabled="disabled" name="check27"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:1422px; width:30px; height:16px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">２Ｄ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:1447px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check28" disabled="disabled" name="check28"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:1447px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">２Ｅ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:1472px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check29" disabled="disabled" name="check29"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:1472px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">３Ａ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:1497px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check30" disabled="disabled" name="check30"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:1497px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">３Ｂ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:1522px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check31" disabled="disabled" name="check31"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:1522px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">３Ｃ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:1547px; width:14px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check32" disabled="disabled" name="check32"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:1547px; width:30px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">３Ｄ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:1572px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check33" disabled="disabled" name="check33"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:1572px; width:30px; height:16px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">４Ｄ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:1504px; top:1597px; width:14px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif;"><INPUT
            onclick="this.checked=true;" tabindex="-1" disabled="disabled" value="1"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:11px; margin:auto;"
            type="CHECKBOX" id="check34" disabled="disabled" name="check34"><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:1524px; top:1597px; width:30px; height:16px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 0px;">５Ｅ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:308px; top:1219px; width:43px; height:35px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:17px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:310px; top:1230px; width:38px; height:13px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">フリガナ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-left:1px solid rgb(0, 0, 0); left:895px; top:1283px; width:1px; height:878px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:621px; top:1196px; width:53px; height:17px; text-align:center; font-size:14px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">[続紙]</SPAN>
    <SPAN><INPUT type = "hidden" id="J189_005F_check_005F_flg" name="J189_check_flg" value=""
            disabled></SPAN>
    <SPAN><INPUT type = "hidden" id="J190_005F_check_005F_flg2" name="J190_check_flg2" value=""
            disabled></SPAN>
    <SPAN><INPUT type = "hidden" id="J191_005F_check_005F_flg3" name="J191_check_flg3" value=""
            disabled></SPAN>
</DIV>
