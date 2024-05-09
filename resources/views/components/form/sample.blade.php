<DIV style="position:relative; left:0px; top:0px; width:792px; height:2210px;">
    <script type="text/javascript">
        function katakanaOnlyCheck(f){
            var st = f.value;
            var zenkaku = "　ァアィイゥウェエォオカガキギクグケゲコゴサザシジスズセゼソゾタダチヂッツヅテデトド";
            zenkaku += "ナニヌネノハバパヒビピフブプヘベペホボポマミムメモャヤュユョヨラリルレロワンヴヲ";
            zenkaku += "‐－ー";
            var reg = new RegExp("[^" + zenkaku + "]","g");
            if (st.match(reg) != null){
                    alert("指定可能な文字以外が指定されています。\n\n【指定可能な文字】\n全角カナ、全角記号（‐－ー）、全角空白");
                    f.focus();
            }
        }

       function katakanaCheck(f){
            var st = f.value;
            var zenkaku = "０１２３４５６７８９＋‐－ー＃￥＆．，：＊　";
            zenkaku += "ァアィイゥウェエォオカガキギクグケゲコゴサザシジスズセゼソゾタダチヂッツヅテデトド";
            zenkaku += "ナニヌネノハバパヒビピフブプヘベペホボポマミムメモャヤュユョヨラリルレロヮワヰヱヲンヴヵヶ";
            zenkaku += "ＡＢＣＤＥＦＧＨＩＪＫＬＭＮＯＰＱＲＳＴＵＶＷＸＹＺａｂｃｄｅｆｇｈｉｊｋｌｍｎｏｐｑｒｓｔｕｖｗｘｙｚ";
            var reg = new RegExp("[^" + zenkaku + "]","g");
            if (st.match(reg) != null){
                    alert("指定可能な文字以外が指定されています。\n\n【指定可能な文字】\n全角カナ、全角英数字\n全角記号（＋‐－ー＃￥＆．，：＊）、全角空白");
                    f.focus();
            }
       }
    </script>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:38px; top:352px; width:648px; line-height:45px; height:47px; font-size:14px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            tabindex="11"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:14px; font-family:'ＭＳ 明朝', serif; width:646px; height:44px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J13_005F_8E96_8BC6_8F8A_8F8A_8DDD_926E" name="J13_事業所所在地"></TEXTAREA></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:650px; top:659px; width:127px; height:41px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:13px 3px 0px 0px;">人</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:200px; top:103px; width:250px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;"><INPUT
            tabindex="6"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:250px; max-width:250px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J59_005F_9640_906C_94D4_8D86" name="J83_法人番号" maxlength="13"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:38px; top:180px; width:648px; height:28px; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:5px 0px 0px 0px;"><INPUT
            tabindex="7" onBlur="katakanaOnlyCheck(this.form.J9_事業所名称カタカナ)"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:648px; max-width:648px; height:14px; ime-mode:active;"
            type="TEXT" id="J9_005F_8E96_8BC6_8F8A_96BC_8FCC_834A_835E_834A_8369" name="J9_事業所名称カタカナ"
            maxlength="54"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:445px; top:491px; width:25px; height:36px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:18px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:469px; top:491px; width:47px; height:36px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:18px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:515px; top:491px; width:138px; height:36px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:18px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:399px; top:491px; width:47px; height:36px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:18px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:652px; top:491px; width:70px; height:36px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:18px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:476px; top:819px; width:115px; height:81px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:34px 1px 23px 15px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">雇用保険担当課名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:403px; top:500px; width:38px; height:17px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px;"><INPUT
            tabindex="17"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:38px; max-width:38px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J20_005F_957B_8CA7" name="J20_府県" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:448px; top:500px; width:18px; height:17px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px;"><INPUT
            tabindex="18"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:18px; max-width:18px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J21_005F_8F8A_8FB6" name="J21_所掌" maxlength="1"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:472px; top:500px; width:38px; height:17px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px;"><INPUT
            tabindex="19"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:38px; max-width:38px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J22_005F_8AC7_8A8D" name="J22_管轄" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:518px; top:500px; width:130px; height:17px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px;"><INPUT
            tabindex="20"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:130px; max-width:130px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J23_005F_8AEE_8AB2_94D4_8D86" name="J23_基幹番号" maxlength="6"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:656px; top:500px; width:61px; height:17px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px;"><INPUT
            tabindex="21"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:61px; max-width:61px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J24_005F_8E7D_94D4_8D86" name="J24_枝番号" maxlength="3"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px dashed rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:148px; top:781px; width:329px; height:39px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:21px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px dashed rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:148px; top:754px; width:329px; line-height:26px; height:28px; font-size:8px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            tabindex="31" onBlur="katakanaCheck(this.form.J34_氏名フリガナ)"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:8px; font-family:'ＭＳ 明朝', serif; width:327px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J34_005F_8E81_96BC_8374_838A_834B_8369" name="J34_氏名フリガナ"></TEXTAREA></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:107px; top:918px; width:149px; height:43px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:25px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px dashed rgb(0, 0, 0); border-right:1px dashed rgb(0, 0, 0); border-bottom:1px dashed rgb(0, 0, 0); border-left:1px dashed rgb(0, 0, 0); left:135px; top:543px; width:529px; height:62px; text-align:left; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:23px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px dashed rgb(0, 0, 0); border-right:1px dashed rgb(0, 0, 0); border-bottom:1px dashed rgb(0, 0, 0); border-left:1px dashed rgb(0, 0, 0); left:35px; top:543px; width:102px; height:62px; text-align:left; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:23px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:54px; top:103px; width:97px; height:24px; font-size:20px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;"><INPUT
            tabindex="-1" readonly
            style="border-style:none; box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:20px; font-family:'ＭＳ ゴシック', sans-serif; padding:0px 0px 0px 0px; min-width:97px; max-width:97px; height:24px;"
            value="12001" type="TEXT" id="J2_005F_92A0_955B_8EED_95CA" name="J2_帳票種別"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px dashed rgb(0, 0, 0); border-right:1px dashed rgb(0, 0, 0); border-bottom:1px dashed rgb(0, 0, 0); border-left:1px dashed rgb(0, 0, 0); left:549px; top:57px; width:204px; height:44px; text-align:left; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:84px; top:305px; width:38px; height:18px; text-align:center; font-size:16px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">－</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:116px; top:300px; width:73px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="10"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:73px; max-width:73px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J12_005F_92AC_88E6_94D4_8D86" name="J12_町域番号" maxlength="4"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:38px; top:300px; width:54px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="9"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:54px; max-width:54px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J11_005F_947A_9242_8BC7_94D4_8D86" name="J11_配達局番号" maxlength="3"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:38px; top:236px; width:648px; height:39px; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:8px 0px 0px 0px;"><INPUT
            tabindex="8"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:648px; max-width:648px; height:18px; ime-mode:active;"
            type="TEXT" id="J10_005F_8E96_8BC6_8F8A_96BC_8FCC" name="J10_事業所名称" maxlength="34"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:377px; top:480px; width:23px; height:47px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:29px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:399px; top:480px; width:47px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 8px 0px 10px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">府県</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:445px; top:480px; width:25px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 1px 0px 1px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">所掌</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:469px; top:480px; width:47px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 9px 0px 10px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">管轄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:652px; top:480px; width:70px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 11px 0px 12px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">枝番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:35px; top:617px; width:19px; height:203px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:185px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:53px; top:617px; width:96px; height:69px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:51px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px dashed rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:148px; top:617px; width:329px; line-height:26px; height:27px; font-size:8px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            tabindex="27" onBlur="katakanaCheck(this.form.J30_住所フリガナ)"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:8px; font-family:'ＭＳ 明朝', serif; width:327px; height:24px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J30_005F_8F5A_8F8A_8374_838A_834B_8369" name="J30_住所フリガナ"></TEXTAREA></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:476px; top:617px; width:115px; height:43px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:14px 1px 12px 15px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">常時使用労働者数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:590px; top:617px; width:187px; height:43px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:14px 3px 0px 0px;">人</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:476px; top:659px; width:115px; height:81px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:35px 1px 24px 14px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">雇用保険被保険者数</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:590px; top:659px; width:61px; height:41px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:13px 12px 7px 13px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">一般</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:53px; top:685px; width:96px; height:70px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:52px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px dashed rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:148px; top:685px; width:329px; line-height:26px; height:28px; font-size:8px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            tabindex="29" onBlur="katakanaCheck(this.form.J32_名称フリガナ)"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:8px; font-family:'ＭＳ 明朝', serif; width:327px; height:25px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J32_005F_96BC_8FCC_8374_838A_834B_8369" name="J32_名称フリガナ"></TEXTAREA></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:590px; top:699px; width:61px; height:41px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:13px 12px 7px 14px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">日雇</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:476px; top:739px; width:115px; height:81px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:34px 1px 30px 17px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">賃金支払関係</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:590px; top:739px; width:61px; height:41px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:13px 0px 11px 2px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">賃金締切日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:53px; top:754px; width:96px; height:66px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:48px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:590px; top:779px; width:61px; height:41px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:13px 1px 11px 2px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">賃金支払日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:35px; top:819px; width:114px; height:100px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:82px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:148px; top:819px; width:329px; line-height:99px; height:100px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            tabindex="33"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; width:327px; height:97px; ime-mode:active;"
            id="J36_005F_8E96_8BC6_8A54_9776" name="J36_事業概要"></TEXTAREA></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:590px; top:819px; width:187px; height:41px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:13px 3px 0px 0px;">課</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:590px; top:859px; width:187px; height:41px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:13px 3px 0px 0px;">係</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:476px; top:899px; width:173px; height:62px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:24px 3px 0px 18px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">社会保険加入状況</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:648px; top:899px; width:129px; height:62px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:44px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:35px; top:918px; width:73px; height:43px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:25px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:255px; top:918px; width:73px; height:43px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:25px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:327px; top:918px; width:150px; height:43px; text-align:center; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:15px 2px 12px 9px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:35px; top:960px; width:18px; height:63px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; padding:23px 0px 9px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:52px; top:960px; width:325px; line-height:62px; height:63px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            tabindex="51"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; width:323px; height:60px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J58_005F_94F5_8D6C" name="J58_備考"></TEXTAREA></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:409px; top:973px; width:16px; height:46px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; padding:16px 1px 7px 1px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:424px; top:973px; width:47px; height:46px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:28px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:470px; top:973px; width:16px; height:46px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; padding:16px 1px 7px 1px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:485px; top:973px; width:47px; height:46px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:28px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:531px; top:973px; width:17px; height:46px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; padding:16px 1px 7px 1px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:547px; top:973px; width:46px; height:46px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:28px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:592px; top:973px; width:17px; height:46px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; padding:16px 1px 7px 1px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:608px; top:973px; width:46px; height:46px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:28px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:653px; top:973px; width:15px; height:46px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; padding:16px 1px 7px 1px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:667px; top:973px; width:48px; height:46px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:28px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:714px; top:973px; width:16px; height:46px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; padding:16px 1px 3px 1px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:729px; top:973px; width:47px; height:46px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:28px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:259px; top:925px; width:11px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">※</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:259px; top:941px; width:65px; height:14px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">16廃止年月日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:925px; width:12px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">15</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:53px; top:925px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">事業の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:53px; top:941px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">開始年月日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:689px; top:906px; width:49px; height:13px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">健康保険</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:689px; top:925px; width:74px; height:13px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">厚生年金保険</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:689px; top:943px; width:49px; height:13px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">労災保険</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:840px; width:80px; height:13px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">事業の概要</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:52px; top:866px; width:77px; height:8px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">漁業の場合は漁船の総</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:52px; top:875px; width:77px; height:8px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">トン数を記入すること</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:67px; top:789px; width:67px; height:13px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">氏名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:54px; top:807px; width:94px; height:8px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">(法人のときは代表者の氏名)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:68px; top:725px; width:68px; height:13px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">名称</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:76px; top:624px; width:55px; height:14px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">(フリガナ)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:68px; top:645px; width:68px; height:13px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">住所</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:70px; top:663px; width:61px; height:9px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">法人のときは主た</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:70px; top:672px; width:61px; height:9px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">る事務所の所在地</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:39px; top:632px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">13</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:39px; top:654px; width:12px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">事</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:378px; top:481px; width:10px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">８</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:388px; top:490px; width:10px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">番</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:217px; top:38px; width:273px; height:20px; text-align:center; font-size:18px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">雇用保険適用事業所設置届</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:521px; top:40px; width:249px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">（必ず記載要領の注意事項を読んでから入力してください。）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:555px; top:63px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">※</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:576px; top:63px; width:56px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">事業所番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:56px; top:91px; width:44px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">帳票種別</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:571px; top:104px; width:118px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">下記のとおり届けます。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:609px; top:117px; width:122px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">公共職業安定所長殿</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:606px; top:137px; width:23px; height:13px; text-align:left; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:647px; top:139px; width:16px; height:13px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:200px; top:91px; width:250px; height:12px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">１法人番号（個人事業の場合は入力不要です。）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:167px; width:150px; height:12px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">２事業所の名称（カタカナ）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:220px; width:133px; height:13px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">３事業所の名称（漢字）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:287px; width:68px; height:12px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">４郵便番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:478px; width:171px; height:12px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">７設置年月日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:42px; top:549px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; line-height:normal;">※</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:41px; top:563px; width:85px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">公共職業安定所</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:41px; top:580px; width:84px; height:13px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">記載欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:146px; top:550px; width:59px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">９設置区分</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:244px; top:550px; width:70px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">10事業所区分</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:342px; top:550px; width:59px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">11産業分類</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:537px; top:550px; width:82px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">12台帳保存区分</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:586px; top:571px; width:54px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">日雇被保険者</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:586px; top:580px; width:54px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">のみの事業所</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:586px; top:590px; width:54px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">船舶所有者</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:395px; top:974px; width:11px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ 明朝', serif; line-height:normal;">※</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:1031px; width:392px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">（この届出は、事業所を設置した日の翌日から起算して10日以内に提出してください。）</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:565px; top:77px; width:180px; height:20px; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:180px; max-width:180px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J1_005F_8E96_8BC6_8F8A_94D4_8D86" name="J1_事業所番号" maxlength="13"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:193px; top:569px; width:10px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">1</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:206px; top:569px; width:18px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">当然</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:193px; top:581px; width:10px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">2</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:206px; top:581px; width:18px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">任意</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:180px; top:566px; width:12px; height:26px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:7px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:188px; top:569px; width:2px; height:21px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:3px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:225px; top:566px; width:11px; height:26px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:7px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:227px; top:569px; width:4px; height:21px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:3px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:292px; top:569px; width:10px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">1</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:304px; top:569px; width:18px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">個別</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:292px; top:581px; width:10px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">2</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:304px; top:581px; width:18px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">委託</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:279px; top:566px; width:11px; height:26px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:7px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:286px; top:569px; width:3px; height:21px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:3px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:323px; top:566px; width:12px; height:26px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:7px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:326px; top:569px; width:4px; height:21px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:3px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:345px; top:566px; width:39px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:39px; max-width:39px; height:18px; ime-mode:disabled;"
            type="TEXT" id="J28_005F_8E59_8BC6_95AA_97DE" name="J28_産業分類" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:576px; top:571px; width:10px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">1</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:576px; top:590px; width:10px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">2</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:565px; top:566px; width:11px; height:26px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:7px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:572px; top:569px; width:3px; height:30px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:3px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:641px; top:566px; width:12px; height:26px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:7px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:644px; top:569px; width:3px; height:30px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:3px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:76px; top:694px; width:55px; height:14px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">(フリガナ)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:76px; top:763px; width:55px; height:14px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">(フリガナ)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:40px; top:861px; width:12px; height:26px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:7px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:48px; top:864px; width:3px; height:21px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:3px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:130px; top:861px; width:12px; height:26px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:7px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:133px; top:864px; width:4px; height:21px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:3px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:67px; top:661px; width:3px; height:21px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:3px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:135px; top:661px; width:4px; height:21px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; padding:3px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:145px; top:571px; width:38px; height:18px; font-size:13px;"><SELECT
            size="1" tabindex="-1" disabled
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; width:37px; height:18px;"
            id="J26_005F_90DD_9275_8BE6_95AA" name="J26_設置区分">
            <OPTION value="" selected="selected"></OPTION>
            <OPTION value="1">1</OPTION>
            <OPTION value="2">2</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:244px; top:571px; width:38px; height:18px; font-size:13px;"><SELECT
            size="1" tabindex="-1" disabled
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; width:37px; height:18px;"
            id="J27_005F_8E96_8BC6_8F8A_8BE6_95AA" name="J27_事業所区分">
            <OPTION value="" selected="selected"></OPTION>
            <OPTION value="1">1</OPTION>
            <OPTION value="2">2</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:530px; top:571px; width:38px; height:18px; font-size:13px;"><SELECT
            size="1" tabindex="-1" disabled
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; width:37px; height:18px;"
            id="J29_005F_91E4_92A0_95DB_91B6_8BE6_95AA" name="J29_台帳保存区分">
            <OPTION value="" selected="selected"></OPTION>
            <OPTION value="1">1</OPTION>
            <OPTION value="2">2</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px dashed rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:148px; top:643px; width:329px; line-height:42px; height:43px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            tabindex="28"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:327px; height:40px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J31_005F_8F5A_8F8A" name="J31_住所"></TEXTAREA></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px dashed rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:148px; top:712px; width:329px; line-height:42px; height:43px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            tabindex="30"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:327px; height:40px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J33_005F_96BC_8FCC" name="J33_名称"></TEXTAREA></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:38px; top:495px; width:58px; height:19px; font-size:13px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="13"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; width:58px; height:19px;"
            id="J16_005F_944E_8D86" name="J16_年号">
            <OPTION value=""></OPTION>
            <OPTION value="平成">平成</OPTION>
            <OPTION value="令和" selected="selected">令和</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:100px; top:491px; width:39px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="14"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:39px; max-width:39px; height:18px; ime-mode:disabled;"
            type="TEXT" id="J17_005F_944E" name="J17_年" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:158px; top:491px; width:39px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="15"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:39px; max-width:39px; height:18px; ime-mode:disabled;"
            type="TEXT" id="J18_005F_8C8E" name="J18_月" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:218px; top:491px; width:39px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            tabindex="16"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:39px; max-width:39px; height:18px; ime-mode:disabled;"
            type="TEXT" id="J19_005F_93FA" name="J19_日" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:665px; top:906px; width:18px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="48" value="1"
            style="position:absolute; top:1px; left:4px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;"
            type="CHECKBOX" id="J55_005F_8C92_8D4E_95DB_8CAF" name="J55_健康保険"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:665px; top:924px; width:18px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="49" value="1"
            style="position:absolute; top:1px; left:4px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;"
            type="CHECKBOX" id="J56_005F_8CFA_90B6_944E_8BE0_95DB_8CAF" name="J56_厚生年金保険"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:665px; top:942px; width:18px; line-height:12px; height:13px; text-align:left; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            tabindex="50" value="1"
            style="position:absolute; top:1px; left:4px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;"
            type="CHECKBOX" id="J57_005F_984A_8DD0_95DB_8CAF" name="J57_労災保険"><SPAN
            style="font-size:11px; height:11px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:41px; top:840px; width:13px; height:13px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">14</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:388px; top:516px; width:10px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:495px; top:117px; width:112px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="1"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:112px; max-width:112px; height:14px; ime-mode:active;"
            type="TEXT" id="J3_005F_82A0_82C4_90E6" name="J3_あて先" maxlength="10"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:626px; top:137px; width:19px; height:15px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="3"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J6_005F_944E" name="J6_年" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:664px; top:137px; width:19px; height:15px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="4"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J7_005F_8C8E" name="J7_月" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:699px; top:137px; width:19px; height:15px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="5"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J8_005F_93FA" name="J8_日" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:157px; top:931px; width:19px; height:17px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="35"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J39_005F_944E" name="J39_年" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:189px; top:931px; width:19px; height:17px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="36"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J40_005F_8C8E" name="J40_月" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:221px; top:931px; width:20px; height:17px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="37"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:20px; max-width:20px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J41_005F_93FA" name="J41_日" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:380px; top:931px; width:19px; height:17px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J44_005F_944E" name="J44_年" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:412px; top:931px; width:19px; height:17px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J45_005F_8C8E" name="J45_月" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:445px; top:931px; width:19px; height:17px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="-1" readonly
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J46_005F_93FA" name="J46_日" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:152px; top:784px; width:213px; line-height:30px; height:31px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            tabindex="32"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:213px; height:30px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J35_005F_8E81_96BC" name="J35_氏名"></TEXTAREA></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:650px; top:699px; width:127px; height:41px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:13px 3px 0px 0px;">人</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:650px; top:739px; width:127px; height:41px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:13px 3px 0px 0px;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:650px; top:779px; width:127px; height:41px; text-align:right; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:13px 3px 0px 0px;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:712px; top:627px; width:46px; height:16px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="40"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:46px; max-width:46px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J47_005F_8FED_8E9E_8E67_9770_984A_93AD_8ED2_9094" name="J47_常時使用労働者数" maxlength="6"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:712px; top:669px; width:46px; height:16px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="41"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:46px; max-width:46px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J48_005F_88EA_94CA" name="J48_一般" maxlength="6"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:712px; top:709px; width:46px; height:16px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="42"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:46px; max-width:46px; height:16px; ime-mode:disabled;"
            type="TEXT" id="J49_005F_93FA_8CD9" name="J49_日雇" maxlength="6"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:654px; top:750px; width:104px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px;"><INPUT
            tabindex="43"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:104px; max-width:104px; height:14px; ime-mode:active;"
            type="TEXT" id="J50_005F_92C0_8BE0_92F7_90D8_93FA" name="J50_賃金締切日" maxlength="9"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:702px; top:788px; width:56px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px;"><INPUT
            tabindex="45"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:56px; max-width:56px; height:14px; ime-mode:active;"
            type="TEXT" id="J52_005F_92C0_8BE0_8E78_95A5_93FA" name="J52_賃金支払日" maxlength="5"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:603px; top:831px; width:155px; height:12px; font-size:8px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px;"><INPUT
            tabindex="46"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:8px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:155px; max-width:155px; height:12px; ime-mode:active;"
            type="TEXT" id="J53_005F_89DB" name="J53_課" maxlength="15"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:603px; top:870px; width:155px; height:12px; font-size:8px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px;"><INPUT
            tabindex="47"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:8px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:155px; max-width:155px; height:12px; ime-mode:active;"
            type="TEXT" id="J54_005F_8C57" name="J54_係" maxlength="15"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:654px; top:787px; width:46px; height:18px; font-size:10px;"><SELECT
            size="1" tabindex="44"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:46px; height:18px;"
            id="J51_005F_92C0_8BE0_8E78_95A5_93FA_9396_9782" name="J51_賃金支払日当翌">
            <OPTION value="" selected="selected"></OPTION>
            <OPTION value="当月">当月</OPTION>
            <OPTION value="翌月">翌月</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:582px; top:7px; width:184px; height:16px; text-align:left; font-size:13px; font-family:'ＭＳ 明朝', serif line-height:normal;">G00001-A-250054-001_1</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:681px; top:1024px; width:85px; height:32px; text-align:left; font-size:13px; font-family:'ＭＳ 明朝', serif; line-height:normal; padding:8px 0px 0px 0px;">0</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:478px; top:632px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">17</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:478px; top:693px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">18</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:478px; top:773px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">19</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:478px; top:854px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">20</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:478px; top:924px; width:11px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">21</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:339px; width:129px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">５事業所の所在地(漢字)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:419px; width:110px; height:11px; text-align:left; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">６事業所の電話番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:38px; top:432px; width:149px; height:25px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            tabindex="12"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:149px; max-width:149px; height:17px; ime-mode:disabled;"
            type="TEXT" id="J14_005F_8E96_8BC6_8F8A_9364_9862_94D4_8D86" name="J14_事業所電話番号" maxlength="17"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:515px; top:480px; width:138px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 35px 0px 35px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">基幹番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:378px; top:490px; width:10px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">労</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:378px; top:499px; width:10px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">働</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:378px; top:507px; width:10px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">保</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:378px; top:516px; width:10px; height:9px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">険</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:39px; top:704px; width:12px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">業</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:39px; top:754px; width:12px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">主</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:967px; width:13px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">備</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:1002px; width:13px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">考</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:411px; top:981px; width:13px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">所</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:411px; top:1000px; width:13px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:472px; top:981px; width:12px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">次</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:472px; top:1000px; width:12px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:534px; top:981px; width:12px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">課</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:534px; top:1000px; width:12px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:595px; top:981px; width:12px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">係</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:595px; top:1000px; width:12px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">長</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:655px; top:990px; width:12px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">係</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:717px; top:978px; width:12px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">操</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:717px; top:990px; width:12px; height:15px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">作</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:717px; top:1003px; width:12px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">者</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:573px; top:137px; width:50px; height:17px; font-size:11px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="2"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; width:50px; height:17px;"
            id="J5_005F_944E_8D86" name="J5_年号">
            <OPTION value=""></OPTION>
            <OPTION value="平成">平成</OPTION>
            <OPTION value="令和" selected="selected">令和</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:682px; top:139px; width:16px; height:13px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:720px; top:139px; width:16px; height:13px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:108px; top:932px; width:50px; height:17px; font-size:11px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="34"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; width:50px; height:17px;"
            id="J38_005F_944E_8D86" name="J38_年号">
            <OPTION value=""></OPTION>
            <OPTION value="平成">平成</OPTION>
            <OPTION value="令和" selected="selected">令和</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:328px; top:932px; width:50px; height:17px; font-size:11px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="-1" disabled
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:11px; font-family:'ＭＳ 明朝', serif; width:50px; height:17px;"
            id="J43_005F_944E_8D86" name="J43_年号">
            <OPTION value=""></OPTION>
            <OPTION value="平成">平成</OPTION>
            <OPTION value="令和" selected="selected">令和</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:273px; top:925px; width:50px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">事業の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:141px; top:499px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:199px; top:499px; width:13px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:260px; top:499px; width:12px; height:13px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:176px; top:933px; width:13px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:209px; top:933px; width:13px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:242px; top:933px; width:13px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:400px; top:933px; width:13px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:432px; top:933px; width:13px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:463px; top:933px; width:13px; height:14px; text-align:center; font-size:11px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:30px; top:1110px; width:744px; height:355px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:337px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1113px; width:49px; height:16px; text-align:left; font-size:13px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">注　意</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1133px; width:22px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">１</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:58px; top:1133px; width:709px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">記載すべき事項のない欄又は記入枠は空欄のままとし、※印のついた欄又は記入枠には記載しないでください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1152px; width:22px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">２</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:58px; top:1152px; width:709px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">1欄には、平成27年10月以降、国税庁長官から本社等へ通知された法人番号を記載してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1171px; width:22px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">３</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:58px; top:1171px; width:709px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">2欄には、数字は使用せず、カタカナ及び「－」のみで記載してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:58px; top:1190px; width:709px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">カタカナの「ヰ」及び「ヱ」は使用せず、それぞれ「イ」及び「エ」を使用してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1209px; width:22px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">４</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:58px; top:1209px; width:709px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">3欄及び5欄には、漢字、カタカナ、平仮名及び英数字（英字については大文字体とする。）により記載してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1228px; width:22px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">５</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:58px; top:1228px; width:709px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">5欄には、都道府県名は記載せず、特別区名、市名又は郡名とそれに続く町村名、丁目及び番地のみを左詰めで</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:58px; top:1247px; width:709px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">記載してください。また、所在地にビル名又はマンション名等が入る場合は続けて記載してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1266px; width:22px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">６</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:58px; top:1266px; width:709px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">6欄には、事業所の電話番号を記載してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1285px; width:22px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">７</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:58px; top:1285px; width:709px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">7欄には、雇用保険の適用事業所となるに至った年月日を記載してください。この場合、元号を選択した上で、</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:58px; top:1304px; width:709px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">年、月又は日が１桁の場合は、それぞれ10の位の部分に「０」を付加して２桁で記載してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1323px; width:22px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">８</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:58px; top:1323px; width:709px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">14欄には、製品名及び製造工程又は建設の事業及び林業等の事業内容を具体的に記載してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1342px; width:22px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">９</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:58px; top:1342px; width:709px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">18欄の「一般」には、雇用保険被保険者のうち、一般被保険者数、高年齢被保険者数及び短期雇用特例被保険者数の</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:58px; top:1361px; width:709px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">合計数を記載し、「日雇」には、日雇労働被保険者数を記載してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1380px; width:22px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">10</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:58px; top:1380px; width:709px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">21欄は、該当事項を選択してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:30px; top:1483px; width:744px; height:62px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:44px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1487px; width:49px; height:15px; text-align:left; font-size:13px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">お願い</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:1506px; width:23px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">１</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:70px; top:1506px; width:609px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">事業所を設置した日の翌日から起算して10日以内に提出してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1399px; width:22px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">11</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:58px; top:1399px; width:709px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">23欄は、最寄りの駅又はバス停から事業所への道順略図を添付資料として提出してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:47px; top:1525px; width:23px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">２</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:70px; top:1525px; width:670px; height:17px; text-align:left; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">営業許可証、登記事項証明書その他記載内容を確認することができる書類を添付資料として提出してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:502px; top:1568px; width:98px; height:29px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:11px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:231px; top:1837px; width:135px; height:41px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:23px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:30px; top:1553px; width:29px; height:148px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:130px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:58px; top:1553px; width:134px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:2px 27px 1px 28px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">事業所印影</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:191px; top:1553px; width:123px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">事業主(代理人)印影</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:313px; top:1553px; width:145px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">改印欄(事業所・事業主)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1553px; width:143px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">改印欄(事業所・事業主)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:599px; top:1553px; width:139px; height:16px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">改印欄(事業所・事業主)</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:58px; top:1568px; width:134px; height:133px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:115px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:191px; top:1568px; width:123px; height:133px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:115px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:313px; top:1568px; width:41px; height:29px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:11px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:353px; top:1568px; width:105px; height:29px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:11px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1568px; width:46px; height:29px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:11px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:599px; top:1568px; width:42px; height:29px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:11px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:640px; top:1568px; width:98px; height:29px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:11px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:313px; top:1596px; width:145px; height:105px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:87px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:1596px; width:143px; height:105px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:87px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:599px; top:1596px; width:139px; height:105px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:87px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:30px; top:1700px; width:428px; height:19px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:30px; top:1718px; width:428px; height:74px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:56px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:30px; top:1826px; width:47px; height:52px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:34px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:76px; top:1826px; width:156px; height:12px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:231px; top:1826px; width:135px; height:12px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:365px; top:1826px; width:92px; height:12px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:30px; top:1896px; width:283px; line-height:121px; height:121px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            tabindex="266"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:283px; height:120px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J82_005F_9574_8B4C_9793" name="J82_付記欄"></TEXTAREA></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:374px; top:1827px; width:73px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">電話番号</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:34px; top:1832px; width:40px; height:11px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">社会保険</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:34px; top:1846px; width:40px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">労務士</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:34px; top:1859px; width:40px; height:12px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">記載欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:61px; top:1735px; width:15px; height:16px; text-align:center; font-size:13px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px;">※</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:88px; top:1735px; width:308px; height:16px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">最寄りの駅又はバス停から事業所への道順略図を</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:85px; top:1753px; width:235px; height:17px; text-align:center; font-size:13px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">添付資料として提出してください。</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:34px; top:1703px; width:19px; height:15px; text-align:center; font-size:13px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">23</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:59px; top:1703px; width:257px; height:15px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">最寄りの駅又はバス停から事業所への道順</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:647px; top:1573px; width:23px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">令和</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:678px; top:1584px; width:55px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">年月日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:507px; top:1573px; width:23px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">令和</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:539px; top:1584px; width:55px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">年月日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:360px; top:1573px; width:23px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">令和</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:393px; top:1583px; width:54px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">年月日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:318px; top:1572px; width:30px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">改印</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:318px; top:1584px; width:32px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">年月日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1560px; width:17px; height:15px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:0px 1px 0px 1px;">22</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:480px; top:1772px; width:164px; height:17px; text-align:center; font-size:14px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">労働保険事務組合記載欄</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:480px; top:1828px; width:46px; height:16px; text-align:center; font-size:14px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">所在地</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:480px; top:1872px; width:46px; height:16px; text-align:center; font-size:14px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">名　称</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:480px; top:1916px; width:73px; height:16px; text-align:center; font-size:13px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">代表者氏名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:480px; top:1960px; width:59px; height:16px; text-align:center; font-size:13px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">委託開始</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:480px; top:2004px; width:59px; height:16px; text-align:center; font-size:13px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">委託解除</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); left:479px; top:1845px; width:276px; line-height:0px; height:0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); left:479px; top:1889px; width:276px; line-height:0px; height:0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); left:479px; top:1933px; width:276px; line-height:0px; height:0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1585px; width:17px; height:15px; text-align:left; font-size:13px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">登</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:604px; top:1572px; width:30px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">改印</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:463px; top:1572px; width:30px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">改印</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:604px; top:1584px; width:32px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">年月日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:463px; top:1584px; width:32px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">年月日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:645px; top:1961px; width:16px; height:16px; text-align:center; font-size:14px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:690px; top:1961px; width:16px; height:16px; text-align:center; font-size:14px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:736px; top:1961px; width:16px; height:16px; text-align:center; font-size:14px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:645px; top:2005px; width:16px; height:16px; text-align:center; font-size:14px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:690px; top:2005px; width:16px; height:16px; text-align:center; font-size:14px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:736px; top:2005px; width:16px; height:16px; text-align:center; font-size:14px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:87px; top:1827px; width:134px; height:10px; text-align:center; font-size:6px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; padding:1px 0px 0px 0px; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">作成年月日・提出代行者・事務代理者の表示</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:76px; top:1837px; width:156px; height:41px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:23px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:260px; top:1827px; width:80px; height:10px; text-align:center; font-size:8px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal; display:block; text-align:justify; text-justify:inter-ideograph; text-align-last:justify;">氏　名</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:365px; top:1837px; width:92px; height:41px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:23px 0px 0px 0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); left:479px; top:1977px; width:276px; line-height:0px; height:0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); left:479px; top:2021px; width:276px; line-height:0px; height:0px;"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:143px; top:1841px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">年</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:181px; top:1841px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">月</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:217px; top:1841px; width:11px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">日</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:405px; top:1842px; width:13px; height:11px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">―</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:405px; top:1859px; width:13px; height:12px; text-align:center; font-size:10px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">―</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:124px; top:1839px; width:17px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="258"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:17px; max-width:17px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J74_005F_944E" name="J74_年" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:161px; top:1839px; width:17px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="259"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:17px; max-width:17px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J75_005F_8C8E" name="J75_月" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:198px; top:1839px; width:17px; height:14px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="260"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:17px; max-width:17px; height:14px; ime-mode:disabled;"
            type="TEXT" id="J76_005F_93FA" name="J76_日" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:531px; top:1806px; width:221px; line-height:38px; height:38px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            tabindex="246"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:221px; height:37px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J59_005F_8F8A_8DDD_926E" name="J59_所在地"></TEXTAREA></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:531px; top:1850px; width:221px; line-height:38px; height:38px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            tabindex="247"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:221px; height:37px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J60_005F_96BC_8FCC" name="J60_名称"></TEXTAREA></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:560px; top:1894px; width:175px; line-height:38px; height:38px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            tabindex="248"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:175px; height:37px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J61_005F_91E3_955C_8ED2_8E81_96BC" name="J61_代表者氏名"></TEXTAREA></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:621px; top:1957px; width:19px; height:19px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="250"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J64_005F_944E" name="J64_年" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:667px; top:1957px; width:19px; height:19px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="251"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J65_005F_8C8E" name="J65_月" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:713px; top:1957px; width:19px; height:19px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="252"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J66_005F_93FA" name="J66_日" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:621px; top:2001px; width:19px; height:19px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="254"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J69_005F_944E" name="J69_年" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:667px; top:2001px; width:19px; height:19px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="255"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J70_005F_8C8E" name="J70_月" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:713px; top:2001px; width:19px; height:19px; font-size:12px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="256"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; min-width:19px; max-width:19px; height:19px; ime-mode:disabled;"
            type="TEXT" id="J71_005F_93FA" name="J71_日" maxlength="2"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:78px; top:1859px; width:131px; height:15px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="261"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:131px; max-width:131px; height:14px; ime-mode:active;"
            type="TEXT" id="J77_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6"
            name="J77_提出代行者事務代理者の表示" maxlength="12"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:235px; top:1839px; width:112px; line-height:37px; height:37px; font-size:10px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            tabindex="262"
            style="overflow:hidden; text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:112px; height:36px; ime-mode:active; padding:0px 0px 0px 1px;"
            id="J78_005F_8E81_96BC" name="J78_氏名"></TEXTAREA></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:367px; top:1840px; width:36px; height:15px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="263"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:36px; max-width:36px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J79_005F_8E73_8A4F_8BC7_94D4" name="J79_市外局番" maxlength="5"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:367px; top:1858px; width:36px; height:15px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="264"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:36px; max-width:36px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J80_005F_8E73_93E0_8BC7_94D4" name="J80_市内局番" maxlength="5"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:418px; top:1858px; width:36px; height:15px; font-size:11px; font-family:'ＭＳ 明朝', serif;"><INPUT
            tabindex="265"
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; min-width:36px; max-width:36px; height:15px; ime-mode:disabled;"
            type="TEXT" id="J81_005F_89C1_93FC_8ED2_94D4_8D86" name="J81_加入者番号" maxlength="5"></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:636px; top:2183px; width:92px; height:27px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; line-height:normal; padding:9px 0px 0px 0px;">0</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:552px; top:1101px; width:226px; height:20px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; line-height:normal; padding:2px 0px 0px 0px;">G00001-A-250054-001_2</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:78px; top:1839px; width:46px; height:16px; font-size:10px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="257"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:10px; font-family:'ＭＳ 明朝', serif; width:46px; height:16px;"
            id="J73_005F_944E_8D86" name="J73_年号">
            <OPTION value=""></OPTION>
            <OPTION value="平成">平成</OPTION>
            <OPTION value="令和" selected="selected">令和</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:557px; top:1958px; width:54px; height:19px; font-size:13px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="249"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; width:54px; height:19px;"
            id="J63_005F_944E_8D86" name="J63_年号">
            <OPTION value=""></OPTION>
            <OPTION value="平成">平成</OPTION>
            <OPTION value="令和" selected="selected">令和</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:557px; top:2002px; width:54px; height:19px; font-size:13px; padding:0px 0px 0px 0px;"><SELECT
            size="1" tabindex="253"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; width:54px; height:19px;"
            id="J68_005F_944E_8D86" name="J68_年号">
            <OPTION value=""></OPTION>
            <OPTION value="平成">平成</OPTION>
            <OPTION value="令和" selected="selected">令和</OPTION>
        </SELECT></SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1616px; width:17px; height:15px; text-align:left; font-size:13px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">録</SPAN>
    <SPAN
        style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:36px; top:1646px; width:17px; height:15px; text-align:left; font-size:13px; font-family:'ＭＳ ゴシック', sans-serif; line-height:normal;">印</SPAN>

</DIV>