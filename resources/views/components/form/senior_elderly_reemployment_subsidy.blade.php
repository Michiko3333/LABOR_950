<!-- 4950008680047000 -->
<!-- 雇用保険高年齢雇用継続給付（高年齢再就職給付金）の申請（令和４年６月以降手続き） -->

<DIV style="position:relative; left:0px; top:0px; width:752px; height:1048px;">
    <script type="text/javascript">
        function keitaiCtl(f) {
            if (f.wage_structure.value == "月給" || f.wage_structure.value == "日給" || f.wage_structure.value == "時間給") {
                f.wage_structure_other.value = "";
            }
        }

        function teateumuCtl(f) {
            var teate = document.getElementsByName("commuting_allowance");
            for (var i = 0; i < teate.length; i++) {
                if (teate[i].checked && teate[i].value == "無") {
                    setTimeout(function() {
                        f.commuting_allowance_period.disabled = true;
                        f.commuting_allowance_period_other.disabled = true;
                        f.commuting_allowance_period.value = "";
                        f.commuting_allowance_period_other.value = "";
                    }, 0);
                } else if (teate[i].checked && teate[i].value == "有") {
                    f.commuting_allowance_period.disabled = false;
                    f.commuting_allowance_period_other.disabled = false;
                    f.commuting_allowance_period.value = "";
                    f.commuting_allowance_period_other.value = "";
                }
            }
        }

        function kikanCtl1(f) {
            var teate = document.getElementsByName("commuting_allowance");
            if (f.commuting_allowance_period.value != "") {
                for (var i = 0; i < teate.length; i++) {
                    if (teate[i].value == "有") {
                        teate[i].checked = true;
                    }
                }
                if (f.commuting_allowance_period.value == "毎月" || f.commuting_allowance_period.value == "３か月" || f
                    .commuting_allowance_period.value == "６か月") {
                    f.commuting_allowance_period_other.value = "";
                }
            }
        }

        function kikanCtl2(f) {
            var teate = document.getElementsByName("commuting_allowance");
            if (f.commuting_allowance_period_other.value != "") {
                for (var i = 0; i < teate.length; i++) {
                    if (teate[i].value == "有") {
                        teate[i].checked = true;
                    }
                }
                f.commuting_allowance_period.value = "その他";
            }
        }
    </script>

    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:276px; top:625px; width:19px; height:33px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 1px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:667px; width:659px; height:135px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:117px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:801px; width:659px; height:78px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:60px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:457px; top:135px; width:8px; height:26px; text-align:right; font-size:5px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:462px; top:139px; width:2px; height:19px; text-align:right; font-size:5px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:5px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:554px; top:1024px; width:162px; height:20px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:462px; top:1024px; width:93px; height:20px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:462px; top:887px; width:17px; height:128px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:625px; width:19px; height:33px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 1px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:495px; top:625px; width:19px; height:33px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:3px 0px 0px 1px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:887px; width:46px; height:46px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:28px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:102px; top:887px; width:126px; height:12px; text-align:center; font-size:4px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 1px 1px 2px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:227px; top:887px; width:133px; height:12px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:359px; top:887px; width:85px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 7px 0px 7px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:102px; top:898px; width:126px; line-height:33px; height:35px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="65"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:8px; font-family:'ＭＳ 明朝', serif; width:124px; height:32px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J63_005F_8DEC_90AC_944E_8C8E_93FA_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2"
            value="{{ old('labor_consultant_acting_as_agent') }}" name="labor_consultant_acting_as_agent"
            autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:227px; top:898px; width:119px; line-height:33px; height:35px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="66"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:8px; font-family:'ＭＳ 明朝', serif; width:118px; height:32px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J64_005F_8ED0_89EF_95DB_8CAF_984A_96B1_8E6D_005F_8E81_96BC" value="{{ old('labor_consultant_name') }}"
            name="labor_consultant_name" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:359px; top:898px; width:85px; height:35px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:17px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:948px; width:16px; height:65px; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:9px 0px 9px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify; writing-mode:tb-rl;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:72px; top:948px; width:50px; height:65px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:47px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:121px; top:948px; width:16px; height:65px; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:9px 0px 9px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify; writing-mode:tb-rl;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:136px; top:948px; width:50px; height:65px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:47px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:185px; top:948px; width:17px; height:65px; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:9px 0px 9px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify; writing-mode:tb-rl;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:201px; top:948px; width:50px; height:65px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:47px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:250px; top:948px; width:16px; height:65px; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:9px 0px 9px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify; writing-mode:tb-rl;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:265px; top:948px; width:50px; height:65px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:47px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:314px; top:948px; width:16px; height:65px; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:7px 0px 7px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify; writing-mode:tb-rl;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:329px; top:948px; width:51px; height:65px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:47px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:379px; top:948px; width:16px; height:65px; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:9px 0px 9px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify; writing-mode:tb-rl;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:394px; top:948px; width:50px; height:65px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:47px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:248px; top:888px; width:90px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">氏名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:59px; top:890px; width:41px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">社会保険</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:59px; top:903px; width:41px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">労務士</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:59px; top:916px; width:41px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">記載欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:64px; top:671px; width:240px; height:15px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">上記の記載事実に誤りがないことを証明します。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:317px; top:780px; width:63px; height:16px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;">事業主氏名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:64px; top:804px; width:576px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">雇用保険法施行規則第101条の５及び第101条の７の規定により、上記のとおり高年齢雇用継続給付の支給を申請します。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:259px; top:862px; width:107px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">公共職業安定所長
        殿</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:400px; top:862px; width:54px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">申請者氏名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:76px; top:55px; width:300px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">様式第33号の3の2（第101条の5、第101条の7関係）（第1面）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:57px; top:257px; width:23px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">令和</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:57px; top:177px; width:80px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">１被保険者番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:435px; top:120px; width:68px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">給付金の種類</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:553px; top:120px; width:57px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">事業所番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:705px; top:120px; width:46px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">管轄区分</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:550px; top:177px; width:69px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">支給対象年月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:550px; top:200px; width:23px; height:15px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">令和</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:57px; top:288px; width:90px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">３被保険者氏名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:288px; width:100px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">フリガナ</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:57px; top:339px; width:91px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">〈賃金支払状況〉</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:57px; top:356px; width:114px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">４支給対象年月その１</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:234px; top:356px; width:210px; height:15px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">５&nbsp;４欄の支給対象年月に支払われた賃金額</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:57px; top:417px; width:115px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">８支給対象年月その２</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:234px; top:417px; width:209px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">９&nbsp;８欄の支給対象年月に支払われた賃金額</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:57px; top:478px; width:115px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">12支給対象年月その３</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:234px; top:478px; width:209px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">13&nbsp;12欄の支給対象年月に支払われた賃金額</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:407px; top:547px; width:114px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">18次回支給申請年月日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:64px; top:547px; width:80px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">※16未支給区分</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:57px; top:610px; width:155px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">その他賃金に関する特記事項</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:464px; top:919px; width:12px; height:12px; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; writing-mode:tb-rl;">備</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:43px; top:948px; width:12px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ 明朝', serif; line-height:normal;">※</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:217px; top:74px; width:320px; height:23px; text-align:center; font-size:17px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">高年齢雇用継続給付支給申請書</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:195px; top:97px; width:370px; height:23px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">（必ず記載要領の注意書きをよく読んでから記入してください。）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:224px; top:177px; width:92px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">２資格取得年月日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:167px; top:120px; width:38px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">氏名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:467px; top:139px; width:57px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">１基本給付金</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:467px; top:148px; width:69px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">２再就職給付金</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:588px; top:356px; width:76px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">７みなし賃金額</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:588px; top:417px; width:77px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">11みなし賃金額</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:588px; top:478px; width:77px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">15みなし賃金額</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:120px; top:567px; width:20px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">空欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:144px; top:567px; width:50px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">未支給以外</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:120px; top:576px; width:20px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">1</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:144px; top:576px; width:31px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">未支給</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:281px; top:567px; width:84px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">即時出力の場合は</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:468px; top:1028px; width:80px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">※支給決定年月日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:57px; top:234px; width:57px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">支給申請月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:226px; top:547px; width:57px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">17出力区分</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:57px; top:118px; width:49px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">帳票種別</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:133px; width:96px; height:28px; font-size:20px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:20px; font-family:'ＭＳ ゴシック', sans-serif; padding:0px 0px 0px 0px; min-width:96px; max-width:96px; height:24px;"
            value="14301" type="TEXT" id="J1_005F_92A0_955B_8EED_95CA" name="ledger_type" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:194px; width:43px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="8"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:43px; max-width:43px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J8_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85"
            value="{{ old('employment_insured_no_4digit') }}" name="employment_insured_no_4digit" maxlength="4"
            autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:118px; top:194px; width:52px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="9"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:52px; max-width:52px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J9_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85"
            value="{{ old('employment_insured_no_6digit') }}" name="employment_insured_no_6digit" maxlength="6"
            autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:188px; top:194px; width:14px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="10"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:14px; max-width:14px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J10_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD"
            value="{{ old('employment_insured_no_CD') }}" name="employment_insured_no_CD" maxlength="1"
            autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:283px; top:194px; width:28px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="12"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:28px; max-width:28px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J13_005F_944E" value="{{ old('qualifications_japan_era_year') }}"
            name="qualifications_japan_era_year" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:325px; top:194px; width:28px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="13"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:28px; max-width:28px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J14_005F_8C8E" value="{{ old('qualifications_month') }}" name="qualifications_month"
            maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:367px; top:194px; width:28px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="14"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:28px; max-width:28px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J15_005F_93FA" value="{{ old('qualifications_day') }}" name="qualifications_day"
            maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:167px; top:137px; width:260px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="2"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:260px; max-width:260px; height:16px; ime-mode:active;"
            type="TEXT" id="J2_005F_8E81_96BC" value="{{ old('fullname_kana') }}" name="fullname_kana"
            maxlength="20" readonly></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:575px; top:194px; width:39px; height:24px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:6px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:624px; top:194px; width:39px; height:24px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:6px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:670px; top:194px; width:40px; height:24px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:6px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:81px; top:251px; width:59px; height:24px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:6px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:148px; top:251px; width:58px; height:24px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:6px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:116px; top:373px; width:41px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="24"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:41px; max-width:41px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J26_005F_944E_005F1" value="{{ old('payer_japan_era_year1') }}"
            name="payer_japan_era_year1" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:172px; top:373px; width:41px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="25"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:41px; max-width:41px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J27_005F_8C8E_005F1" value="{{ old('payer_month1') }}" name="payer_month1"
            maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:242px; top:373px; width:135px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="26"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:135px; max-width:135px; height:17px; ime-mode:disabled;"
            type="TEXT"
            id="J28_005F_8E78_8B8B_91CE_8FDB_944E_8C8E_82C9_8E78_95A5_82ED_82EA_82BD_92C0_8BE0_8A7A_005F1"
            value="{{ old('wages_paid1') }}" name="wages_paid1" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:445px; top:373px; width:41px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="27"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:41px; max-width:41px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J29_005F_92C0_8BE0_82CC_8CB8_8A7A_82CC_82A0_82C1_82BD_93FA_9094_005F1"
            value="{{ old('wage_reduction_days1') }}" name="wage_reduction_days1" maxlength="2"
            autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:490px; top:381px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:588px; top:373px; width:104px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:104px; max-width:104px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J30_005F_82DD_82C8_82B5_92C0_8BE0_8A7A_005F1" name="J30" maxlength="7"
            disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:116px; top:434px; width:41px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="30"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:41px; max-width:41px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J33_005F_944E_005F2" value="{{ old('payer_japan_era_year2') }}"
            name="payer_japan_era_year2" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:172px; top:434px; width:41px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="31"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:41px; max-width:41px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J34_005F_8C8E_005F2" value="{{ old('payer_month2') }}" name="payer_month2"
            maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:242px; top:434px; width:135px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="32"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:135px; max-width:135px; height:17px; ime-mode:disabled;"
            type="TEXT"
            id="J35_005F_8E78_8B8B_91CE_8FDB_944E_8C8E_82C9_8E78_95A5_82ED_82EA_82BD_92C0_8BE0_8A7A_005F2"
            value="{{ old('wages_paid2') }}" name="wages_paid2" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:445px; top:434px; width:41px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="33"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:41px; max-width:41px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J36_005F_92C0_8BE0_82CC_8CB8_8A7A_82CC_82A0_82C1_82BD_93FA_9094_005F2"
            value="{{ old('wage_reduction_days2') }}" name="wage_reduction_days2" maxlength="2"
            autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:490px; top:442px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:588px; top:434px; width:104px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:104px; max-width:104px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J37_005F_82DD_82C8_82B5_92C0_8BE0_8A7A_005F2" name="deemed_wage2" maxlength="7"
            disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:116px; top:495px; width:41px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="36"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:41px; max-width:41px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J33_005F_944E_005F3" value="{{ old('payer_japan_era_year3') }}"
            name="payer_japan_era_year3" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:172px; top:495px; width:41px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="37"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:41px; max-width:41px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J34_005F_8C8E_005F3" value="{{ old('payer_month3') }}" name="payer_month3"
            maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:242px; top:495px; width:135px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="38"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:135px; max-width:135px; height:17px; ime-mode:disabled;"
            type="TEXT"
            id="J35_005F_8E78_8B8B_91CE_8FDB_944E_8C8E_82C9_8E78_95A5_82ED_82EA_82BD_92C0_8BE0_8A7A_005F3"
            value="{{ old('wages_paid3') }}" name="wages_paid3" maxlength="7" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:445px; top:495px; width:41px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="39"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:41px; max-width:41px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J36_005F_92C0_8BE0_82CC_8CB8_8A7A_82CC_82A0_82C1_82BD_93FA_9094_005F3"
            value="{{ old('wage_reduction_days3') }}" name="wage_reduction_days3" maxlength="2"
            autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:490px; top:503px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:588px; top:495px; width:104px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:104px; max-width:104px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J37_005F_82DD_82C8_82B5_92C0_8BE0_8A7A_005F3" name="deemed_wage3" maxlength="7"
            disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:64px; top:569px; width:38px; height:19px; font-size:13px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="-1" disabled
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; width:38px; height:19px;"
            id="J38_005F_96A2_8E78_8B8B_8BE6_95AA" name="J38" disabled>
            <OPTION value="" selected="selected"></OPTION>
            <OPTION value="1">1</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:226px; top:569px; width:38px; height:19px; font-size:13px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="-1" disabled
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; width:38px; height:19px;"
            id="J39_005F_8F6F_97CD_8BE6_95AA" name="J39" disabled>
            <OPTION value="" selected="selected"></OPTION>
            <OPTION value="1">1</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:465px; top:564px; width:41px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:41px; max-width:41px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J42_005F_944E" name="J42" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:520px; top:564px; width:41px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:41px; max-width:41px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J43_005F_8C8E" name="J43" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:575px; top:564px; width:41px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:41px; max-width:41px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J44_005F_93FA" name="J44" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:478px; top:963px; width:238px; line-height:51px; height:52px; font-size:8px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="82"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:8px; font-family:'ＭＳ 明朝', serif; width:236px; height:49px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J77_005F_94F5_8D6C" value="{{ old('note') }}" name="note" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:100px; top:197px; width:16px; height:16px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:171px; top:197px; width:16px; height:16px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:312px; top:200px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:354px; top:200px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:396px; top:200px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:705px; top:137px; width:14px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="7"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:14px; max-width:14px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J7_005F_8AC7_8A8D_8BE6_95AA" value="{{ old('jurisdiction') }}" name="jurisdiction"
            maxlength="1" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:553px; top:137px; width:43px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="4"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:43px; max-width:43px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J4_005F_8E96_8BC6_8F8A_94D4_8D864_8C85"
            value="{{ old('employment_insurance_office_no_4digit') }}" name="employment_insurance_office_no_4digit"
            maxlength="4" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:614px; top:137px; width:52px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="5"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:52px; max-width:52px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J5_005F_8E96_8BC6_8F8A_94D4_8D866_8C85"
            value="{{ old('employment_insurance_office_no_6digit') }}" name="employment_insurance_office_no_6digit"
            maxlength="6" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:684px; top:137px; width:14px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="6"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:14px; max-width:14px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J6_005F_8E96_8BC6_8F8A_94D4_8D86CD"
            value="{{ old('employment_insurance_office_no_CD') }}" name="employment_insurance_office_no_CD"
            maxlength="1" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:596px; top:140px; width:16px; height:16px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:667px; top:140px; width:16px; height:16px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:507px; top:571px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:562px; top:571px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:617px; top:571px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:696px; top:381px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">円</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:696px; top:442px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">円</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:696px; top:503px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">円</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:380px; top:381px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">円</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:380px; top:442px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">円</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:380px; top:503px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">円</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:158px; top:381px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:214px; top:381px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:158px; top:442px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:214px; top:442px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:158px; top:503px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:214px; top:503px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:537px; top:135px; width:8px; height:26px; text-align:left; font-size:5px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:539px; top:139px; width:3px; height:19px; text-align:left; font-size:5px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:5px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:108px; top:564px; width:8px; height:27px; text-align:right; font-size:5px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:113px; top:568px; width:2px; height:19px; text-align:right; font-size:5px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:5px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:198px; top:564px; width:7px; height:27px; text-align:left; font-size:5px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:200px; top:568px; width:2px; height:19px; text-align:left; font-size:5px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:5px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:281px; top:576px; width:77px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:0px 24px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">｢１｣を入力</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:270px; top:564px; width:8px; height:27px; text-align:right; font-size:5px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:276px; top:568px; width:2px; height:19px; text-align:right; font-size:5px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:5px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:369px; top:564px; width:8px; height:27px; text-align:left; font-size:5px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:10px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:371px; top:568px; width:2px; height:19px; text-align:left; font-size:5px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:5px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px dashed rgb(0, 0, 0); left:57px; top:598px; width:655px; line-height:0px; height:0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px dashed rgb(0, 0, 0); left:57px; top:541px; width:521px; line-height:0px; height:0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-left:1px dashed rgb(0, 0, 0); left:578px; top:350px; width:1px; height:191px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px dashed rgb(0, 0, 0); left:578px; top:350px; width:134px; line-height:0px; height:0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-left:1px dashed rgb(0, 0, 0); left:712px; top:350px; width:1px; height:248px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-left:1px dashed rgb(0, 0, 0); left:57px; top:541px; width:1px; height:57px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:76px; top:625px; width:201px; line-height:31px; height:33px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="40"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; width:200px; height:30px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J62_005F_82BB_82CC_91BC_92C0_8BE0_82C9_8AD6_82B7_82E9_93C1_8B4C_8E96_8D80_005F1"
            value="{{ old('special_note_on_wages1') }}" name="special_note_on_wages1" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:295px; top:625px; width:201px; line-height:31px; height:33px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="41"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; width:200px; height:30px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J62_005F_82BB_82CC_91BC_92C0_8BE0_82C9_8AD6_82B7_82E9_93C1_8B4C_8E96_8D80_005F2"
            value="{{ old('special_note_on_wages2') }}" name="special_note_on_wages2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:514px; top:625px; width:201px; line-height:31px; height:33px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="42"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; width:200px; height:30px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J62_005F_82BB_82CC_91BC_92C0_8BE0_82C9_8AD6_82B7_82E9_93C1_8B4C_8E96_8D80_005F3"
            value="{{ old('special_note_on_wages3') }}" name="special_note_on_wages3" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:134px; top:689px; width:13px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:178px; top:689px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:222px; top:689px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:134px; top:824px; width:16px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:178px; top:824px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:222px; top:824px; width:15px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:112px; top:686px; width:19px; height:17px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="48"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J47_005F_944E" value="{{ old('today_japan_era_year') }}" name="today_japan_era_year"
            maxlength="2" readonly></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:154px; top:686px; width:19px; height:17px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="49"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J48_005F_8C8E" value="{{ old('today_japan_era_month') }}"
            name="today_japan_era_month" maxlength="2" readonly></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:196px; top:686px; width:19px; height:17px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="50"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J49_005F_93FA" value="{{ old('today_japan_era_day') }}" name="today_japan_era_day"
            maxlength="2" readonly></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:112px; top:820px; width:19px; height:17px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="57"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J57_005F_944E" value="{{ old('today_japan_era_year') }}" name="today_japan_era_year"
            maxlength="2" readonly></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:154px; top:820px; width:19px; height:17px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="58"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J58_005F_8C8E" value="{{ old('today_japan_era_month') }}"
            name="today_japan_era_month" maxlength="2" readonly></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:196px; top:820px; width:19px; height:17px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="59"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J59_005F_93FA" value="{{ old('today_japan_era_day') }}" name="today_japan_era_day"
            maxlength="2" readonly></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:125px; top:860px; width:130px; height:14px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="60"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:130px; max-width:130px; height:14px; ime-mode:active;"
            type="TEXT" id="J60_005F_82A0_82C4_90E6" value="{{ old('destination') }}" name="destination"
            maxlength="10" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); left:457px; top:845px; width:225px; line-height:26px; height:27px; font-size:11px; font-family:'ＭＳ 明朝', serif;">
        <textarea tabindex="61"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:225px; height:26px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J61_005F_905C_90BF_8ED2_8E81_96BC" name="address_fullname" autocomplete="off">{{ old('address_fullname') }}</textarea>
    </SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); left:400px; top:874px; width:282px; line-height:0px; height:0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:416px; top:741px; width:240px; line-height:53px; height:54px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="55"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; width:240px; height:53px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J54_005F_8E96_8BC6_8EE5_8E81_96BC" value="{{ old('employer_name') }}" name="employer_name"
            maxlength="64" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:416px; top:673px; width:285px; line-height:42px; height:42px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><input
            tabindex="51"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; width:285px; height:41px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J50_005F_8E96_8BC6_8F8A_96BC_005F_8F8A_8DDD_926E" value="{{ old('headquarters_address') }}"
            maxlength="63" name="headquarters_address" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); left:317px; top:797px; width:384px; line-height:0px; height:0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:346px; top:898px; width:14px; height:35px; text-align:right; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:20px 1px 3px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:361px; top:900px; width:34px; height:14px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="67"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:34px; max-width:34px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J65_005F_8E73_8A4F_8BC7_94D4" value="{{ old('labor_consultant_tel_area_code') }}"
            name="labor_consultant_tel_area_code" maxlength="5" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:394px; top:899px; width:11px; height:16px; text-align:center; font-size:8px; font-family:'ＭＳ 明朝', serif; line-height:normal; padding:3px 0px 0px 0px;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:361px; top:916px; width:34px; height:14px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="68"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:34px; max-width:34px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J66_005F_8E73_93E0_8BC7_94D4" value="{{ old('labor_consultant_tel_city_code') }}"
            name="labor_consultant_tel_city_code" maxlength="5" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:394px; top:915px; width:11px; height:16px; text-align:center; font-size:8px; font-family:'ＭＳ 明朝', serif; line-height:normal; padding:3px 0px 0px 0px;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:406px; top:916px; width:35px; height:14px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="69"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:35px; max-width:35px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J67_005F_89C1_93FC_8ED2_94D4_8D86"
            value="{{ old('labor_consultant_tel_subscriber_code') }}" name="labor_consultant_tel_subscriber_code"
            maxlength="5" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:627px; top:1028px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:661px; top:1028px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:695px; top:1028px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:676px; top:1026px; width:19px; height:16px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J82_005F_93FA" name="J82" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:642px; top:1026px; width:19px; height:16px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J81_005F_8C8E" name="J81" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:608px; top:1026px; width:19px; height:16px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J80_005F_944E" name="J80" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:613px; top:1009px; width:104px; height:24px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; line-height:normal; padding:6px 0px 0px 0px;">0</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:435px; top:137px; width:14px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:14px; max-width:14px; height:16px; ime-mode:disabled;"
            value="2" type="TEXT" id="J3_005F_8B8B_9574_8BE0_82CC_8EED_97DE"
            value="{{ old('benefits_types') }}" name="benefits_types" maxlength="1" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:445px; top:356px; width:127px; height:15px; text-align:center; font-size:9px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">６賃金の減額のあった日数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:445px; top:417px; width:127px; height:15px; text-align:center; font-size:9px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">10賃金の減額のあった日数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:445px; top:478px; width:127px; height:15px; text-align:center; font-size:9px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">14賃金の減額のあった日数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:417px; top:177px; width:57px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">要件該当日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:417px; top:194px; width:27px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:27px; max-width:27px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J16_005F_944E" name="J16" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:459px; top:194px; width:27px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:27px; max-width:27px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J17_005F_8C8E" name="J17" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:501px; top:194px; width:27px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:27px; max-width:27px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J18_005F_93FA" name="J18" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:445px; top:200px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:487px; top:200px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:529px; top:200px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:247px; top:234px; width:80px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">前回処理年月日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:247px; top:251px; width:28px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:28px; max-width:28px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J19_005F_944E" name="J19" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:289px; top:251px; width:28px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:28px; max-width:28px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J20_005F_8C8E" name="J20" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:331px; top:251px; width:28px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:28px; max-width:28px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J21_005F_93FA" name="J21" maxlength="2" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:276px; top:257px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:318px; top:257px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:360px; top:257px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:403px; top:251px; width:59px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:59px; max-width:59px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J22_005F_92C0_8BE0_8C8E_8A7A_82CC75" name="J22" maxlength="7" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:403px; top:234px; width:149px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">賃金月額の７５％(旧８５％)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:575px; top:251px; width:58px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:58px; max-width:58px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J23_005F_92C0_8BE0_8C8E_8A7A_82CC61" name="J23" maxlength="7" disabled></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:575px; top:234px; width:148px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">賃金月額の６１％(旧６４％)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:305px; width:272px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="15"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:272px; max-width:272px; height:16px; ime-mode:active;"
            type="TEXT" id="J83_005F_94ED_95DB_8CAF_8ED2_8E81_96BC" value="{{ old('fullname') }}"
            name="fullname" maxlength="20" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:403px; top:305px; width:272px; height:24px; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="16"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:272px; max-width:272px; height:16px; ime-mode:active;"
            type="TEXT" id="J84_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369"
            value="{{ old('fullname_kana') }}" name="fullname_kana" maxlength="20" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px dashed rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:478px; top:887px; width:65px; height:20px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:5px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px dashed rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:582px; top:887px; width:55px; height:20px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:5px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px dashed rgb(0, 0, 0); left:542px; top:887px; width:41px; height:20px; text-align:right; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:4px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px dashed rgb(0, 0, 0); left:636px; top:887px; width:80px; height:20px; text-align:right; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:4px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:544px; top:889px; width:23px; height:15px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="70"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:23px; max-width:23px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J68_005F_92C0_8BE0_92F7_90D8_93FA" value="{{ old('wage_deadline') }}"
            name="wage_deadline" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:684px; top:889px; width:20px; height:15px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="72"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:20px; max-width:20px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J70_005F_92C0_8BE0_8E78_95A5_93FA" name="wage_payment_day"
            value="{{ old('wage_payment_day') }}" maxlength="2" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:638px; top:889px; width:46px; height:16px; font-size:10px;"><SELECT
            size="1" tabindex="71"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:46px; height:16px;"
            id="J69_005F_92C0_8BE0_8E78_95A5_93FA_005F_9396_9782_8C8E" name="wage_payment">
            <OPTION value=""></OPTION>
            <OPTION value="当月" {{ old('wage_payment') == '当月' ? 'selected' : '' }}>当月</OPTION>
            <OPTION value="翌月" {{ old('wage_payment') == '翌月' ? 'selected' : '' }}>翌月</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px dashed rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:478px; top:906px; width:65px; height:20px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:5px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px dashed rgb(0, 0, 0); left:542px; top:906px; width:174px; height:20px; text-align:right; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:4px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:628px; top:908px; width:61px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="74"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:61px; max-width:61px; height:14px; ime-mode:active;"
            type="TEXT" id="J72_005F_92C0_8BE0_8C60_91D4_005F_82BB_82CC_91BC"
            value="{{ old('wage_structure_other') }}" name="wage_structure_other" maxlength="5"
            autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:544px; top:908px; width:60px; height:16px; font-size:10px;"><SELECT
            size="1" tabindex="73"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:60px; height:16px;"
            onBlur="keitaiCtl(this.form)" id="J71_005F_92C0_8BE0_8C60_91D4" name="wage_structure">
            <OPTION value=""></OPTION>
            <OPTION value="月給" {{ old('wage_structure') == '月給' ? 'selected' : '' }}>月給</OPTION>
            <OPTION value="日給" {{ old('wage_structure') == '日給' ? 'selected' : '' }}>日給</OPTION>
            <OPTION value="時間給" {{ old('wage_structure') == '時間給' ? 'selected' : '' }}>時間給</OPTION>
            <OPTION value="その他" {{ old('wage_structure') == 'その他' ? 'selected' : '' }}>その他</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px dashed rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:478px; top:925px; width:65px; height:20px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:5px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px dashed rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px dashed rgb(0, 0, 0); left:542px; top:925px; width:59px; height:20px; text-align:right; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:4px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px dashed rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px dashed rgb(0, 0, 0); left:600px; top:925px; width:58px; height:20px; text-align:right; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:4px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px dashed rgb(0, 0, 0); left:657px; top:925px; width:59px; height:20px; text-align:right; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:4px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:544px; top:929px; width:21px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">４欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:565px; top:927px; width:19px; height:15px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="75"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J73_005F_8F8A_92E8_984A_93AD_93FA_9094_005F1"
            value="{{ old('prescribed_working_days1') }}" name="prescribed_working_days1" maxlength="2"
            autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:602px; top:929px; width:21px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">８欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:623px; top:927px; width:19px; height:15px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="76"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J73_005F_8F8A_92E8_984A_93AD_93FA_9094_005F2"
            value="{{ old('prescribed_working_days2') }}" name="prescribed_working_days2" maxlength="2"
            autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:659px; top:929px; width:22px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">12欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:681px; top:927px; width:20px; height:15px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="77"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:20px; max-width:20px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J73_005F_8F8A_92E8_984A_93AD_93FA_9094_005F3"
            value="{{ old('prescribed_working_days3') }}" name="prescribed_working_days3" maxlength="2"
            autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px dashed rgb(0, 0, 0); left:542px; top:944px; width:174px; height:20px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:5px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:560px; top:948px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">有</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:544px; top:946px; width:14px; line-height:14px; height:14px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="78" value="有"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;"
            type="RADIO" onClick="teateumuCtl(this.form)" id="J74_005F_92CA_8BCE_8EE8_9396_974C_96B3"
            name="commuting_allowance" <?php echo old('commuting_allowance') == '有' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:701px; top:948px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">無</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:685px; top:946px; width:14px; line-height:14px; height:14px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="79" value="無"
            style="position:absolute; top:2px; left:2px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;"
            type="RADIO" onClick="teateumuCtl(this.form)" id="J74_005F_92CA_8BCE_8EE8_9396_974C_96B3"
            name="commuting_allowance" <?php echo old('commuting_allowance') == '無' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:574px; top:947px; width:60px; height:16px; font-size:10px;"><SELECT
            size="1" tabindex="80"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:60px; height:16px;"
            onBlur="kikanCtl1(this.form)" id="J75_005F_92CA_8BCE_8EE8_9396_82CC_8AFA_8AD4"
            name="commuting_allowance_period">
            <OPTION value=""></OPTION>
            <OPTION value="毎月" {{ old('commuting_allowance_period') == '毎月' ? 'selected' : '' }}>毎月</OPTION>
            <OPTION value="３か月" {{ old('commuting_allowance_period') == '３か月' ? 'selected' : '' }}>３か月</OPTION>
            <OPTION value="６か月" {{ old('commuting_allowance_period') == '６か月' ? 'selected' : '' }}>６か月</OPTION>
            <OPTION value="その他" {{ old('commuting_allowance_period') == 'その他' ? 'selected' : '' }}>その他</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:638px; top:946px; width:45px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="81"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:45px; max-width:45px; height:14px; ime-mode:active;"
            type="TEXT" onBlur="kikanCtl2(this.form)"
            id="J76_005F_92CA_8BCE_8EE8_9396_82CC_8AFA_8AD4_005F_82BB_82CC_91BC"
            value="{{ old('commuting_allowance_period_other') }}" name="commuting_allowance_period_other"
            maxlength="4" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px dashed rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:478px; top:944px; width:65px; height:20px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:5px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:317px; top:687px; width:91px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">事業所名(所在地)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:347px; top:721px; width:58px; height:15px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">(電話番号)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:416px; top:719px; width:42px; height:17px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="52"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:42px; max-width:42px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J51_005F_8E73_8A4F_8BC7_94D4" value="{{ old('branch_tel_treacode') }}"
            name="branch_tel_treacode" maxlength="5" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:462px; top:721px; width:11px; height:15px; text-align:center; font-size:8px; font-family:'ＭＳ 明朝', serif; line-height:normal; padding:2px 0px 0px 0px;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:478px; top:719px; width:42px; height:17px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="53"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:42px; max-width:42px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J52_005F_8E73_93E0_8BC7_94D4" value="{{ old('branch_tel_city_code') }}"
            name="branch_tel_city_code" maxlength="5" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:525px; top:721px; width:11px; height:15px; text-align:center; font-size:8px; font-family:'ＭＳ 明朝', serif; line-height:normal; padding:2px 0px 0px 0px;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:541px; top:719px; width:41px; height:17px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="54"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:41px; max-width:41px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J53_005F_89C1_93FC_8ED2_94D4_8D86" value="{{ old('branch_tel_subscriber_code') }}"
            name="branch_tel_subscriber_code" maxlength="5" autocomplete="off"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:59px; top:959px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">所</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:59px; top:989px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:123px; top:959px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">次</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:123px; top:989px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:187px; top:959px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">課</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:187px; top:989px; width:12px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:252px; top:959px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">係</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:252px; top:989px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:316px; top:974px; width:12px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">係</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:381px; top:959px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">操</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:381px; top:974px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">作</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:381px; top:989px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">者</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:464px; top:977px; width:12px; height:12px; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; writing-mode:tb-rl;">考</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:57px; top:379px; width:54px; height:18px; font-size:12px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="23"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; width:54px; height:18px;"
            id="J25_005F_944E_8D86_005F1" name="payer_japan_era1">
            <OPTION value="令和" {{ old('payer_japan_era1') == '令和' ? 'selected' : '' }}>令和</OPTION>
            <OPTION value="平成" {{ old('payer_japan_era1') == '平成' ? 'selected' : '' }}>平成</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:57px; top:440px; width:54px; height:18px; font-size:12px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="29"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; width:54px; height:18px;"
            id="J32_005F_944E_8D86_005F2" name="payer_japan_era2">
            <OPTION value="令和" {{ old('payer_japan_era2') == '令和' ? 'selected' : '' }}>令和</OPTION>
            <OPTION value="平成" {{ old('payer_japan_era2') == '平成' ? 'selected' : '' }}>平成</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:57px; top:501px; width:54px; height:18px; font-size:12px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="35"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; width:54px; height:18px;"
            id="J32_005F_944E_8D86_005F3" name="payer_japan_era3">
            <OPTION value="令和" {{ old('payer_japan_era3') == '令和' ? 'selected' : '' }}>令和</OPTION>
            <OPTION value="平成" {{ old('payer_japan_era3') == '平成' ? 'selected' : '' }}>平成</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:407px; top:569px; width:54px; height:19px; font-size:12px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="-1" disabled
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; width:54px; height:19px;"
            id="J41_005F_944E_8D86" name="J41" disabled>
            <OPTION value=""></OPTION>
            <OPTION value="平成">平成</OPTION>
            <OPTION value="令和" selected="selected">令和</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:61px; top:687px; width:49px; height:16px; font-size:10px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="47"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); font-size:10px; font-family:'ＭＳ 明朝', serif; width:49px; height:16px;"
            id="J46_005F_944E_8D86" name="today_japan_era">
            <OPTION value="令和" {{ old('today_japan_era') == '令和' ? 'selected' : '' }}>令和</OPTION>
            <OPTION value="平成" {{ old('today_japan_era') == '平成' ? 'selected' : '' }} disabled>平成</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:61px; top:821px; width:49px; height:16px; font-size:10px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="56"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); font-size:10px; font-family:'ＭＳ 明朝', serif; width:49px; height:16px;"
            id="J56_005F_944E_8D86" name="today_japan_era">
            <OPTION value="令和" {{ old('today_japan_era') == '令和' ? 'selected' : '' }}>令和</OPTION>
            <OPTION value="平成" {{ old('today_japan_era') == '平成' ? 'selected' : '' }} disabled>平成</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:556px; top:1026px; width:49px; height:15px; font-size:8px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="-1" disabled
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:10px; font-family:'ＭＳ 明朝', serif; width:49px; height:15px;"
            id="J79_005F_944E_8D86" name="J79" disabled>
            <OPTION value=""></OPTION>
            <OPTION value="平成">平成</OPTION>
            <OPTION value="令和" selected="selected">令和</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:644px; top:929px; width:11px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:586px; top:929px; width:12px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:702px; top:929px; width:12px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:627px; width:12px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">19</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:280px; top:627px; width:11px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">20</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:499px; top:627px; width:11px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">21</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:105px; top:888px; width:120px; height:10px; text-align:center; font-size:5.5px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">作成年月日・提出代行者・事務代理者の表示</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:367px; top:888px; width:68px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">電話番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:705px; top:891px; width:10px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:569px; top:891px; width:12px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:480px; top:891px; width:61px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">賃金締切日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:480px; top:910px; width:61px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">賃金形態</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:480px; top:929px; width:61px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">所定労働日数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:480px; top:948px; width:61px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">通勤手当</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:584px; top:891px; width:50px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">賃金支払日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:224px; top:198px; width:54px; height:18px; font-size:12px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="11"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; width:54px; height:18px;"
            id="J12_005F_944E_8D86" name="qualifications_japan_era">
            <OPTION value=""></OPTION>
            <OPTION value="昭和" {{ old('qualifications_japan_era') == '昭和' ? 'selected' : '' }}>昭和</OPTION>
            <OPTION value="平成" {{ old('qualifications_japan_era') == '平成' ? 'selected' : '' }}>平成</OPTION>
            <OPTION value="令和" {{ old('qualifications_japan_era') == '令和' ? 'selected' : '' }}>令和</OPTION>
        </SELECT></SPAN>

</DIV>
