<!-- 4950013520602000 -->
<!-- 健康保険厚生年金保険育児休業等終了時報酬月額変更届/厚生年金保険７０歳以上被用者育児休業等終了時報酬月額相当額変更届 -->

<div class="egovui-application-form-button-area">
  <div class="egovui-flex-row">
    <button type="button" style="visibility: hidden;" class="egovui-normal-button egovui-h36"
        onclick="addCopiedForm(&#39;495013520602030244_01.xml&#39;); return false;">続紙追加</button>
  </div>
</div>
<div class="egovui-application-form-input-area">
  <input type="hidden" name="currentPartAmendTagXpaths" id="currentPartAmendTagXpaths" value="">
  <script type="text/javascript">null</script>
  <div id="eGovFormArea">
    <FORM>
      <script>
      function addRangeValidation(inputClass, maxlength, minValue=false, maxValue=false) {
        function toHalfWidth(str) {
            return str.replace(/[０-９]/g, function (match) {
              const halfWidthChar = String.fromCharCode(match.charCodeAt(0) - 65248);
              return halfWidthChar;  // 半角
            });
        }
        let inputs = document.querySelectorAll('.' + inputClass);
        inputs.forEach(function(input) {
            input.addEventListener("input", function(event) {
              let value = event.target.value;
              if (!/^[\d０-９]*$/.test(value)) {
                event.target.value = value.replace(/[^0-9０-９]/g, "");
                return;
              }
              if (value.length > maxlength) {
                value = value.slice(0, maxlength);
              }
              event.target.value = value;
            });
            input.addEventListener("blur", function(event) {
              let value = event.target.value;
              let firstValue = value.slice(0, 1);
              // 全角>半角
              value = toHalfWidth(value);
              event.target.value = value;
              if(maxValue !== false && minValue !== false) {
                if (firstValue == 0) {
                  event.target.value = "";
                }
                if (value < minValue || value > maxValue) {
                  event.target.value = "";
                }
              }
            });
        });
      }

      addRangeValidation("number_4",4);
      addRangeValidation("number_3",3);
      addRangeValidation("number_5",5);
      addRangeValidation("number_6",6);
      addRangeValidation("number_12",12);
      addRangeValidation("money_7", 7, false,9999999);
      addRangeValidation("money_4",4, false,9999);
      addRangeValidation("year",2, 1, 99);
      addRangeValidation("month",2, 1, 12);
      addRangeValidation("day",2, 1, 31);
      </script>

      <DIV style="position:relative; left:0px; top:0px; width:791px; height:976px;">
        <PRE>
        <SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:30px; top:118px; width:30px; height:22px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;">令和</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:91px; top:118px; width:15px; height:22px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;">年</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:137px; top:118px; width:15px; height:22px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;">月</SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:182px; top:118px; width:54px; height:22px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;">日 提出</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:118px; width:31px; height:22px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ffffff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:31px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_92F1_8F6F_944E_8C8E_93FAx_944E_002E1" name="submission_year" value="{{ old('submission_year') }}" class="year" maxlength="2"  readonly></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:106px; top:118px; width:31px; height:22px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ffffff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:31px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_92F1_8F6F_944E_8C8E_93FAx_8C8E_002E2" name="submission_month" value="{{ old('submission_month') }}" class="month" maxlength="2"readonly></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:152px; top:118px; width:30px; height:22px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ffffff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:30px; height:16px; ime-mode:inactive;"
            type="TEXT"  autocomplete="off" id="_92F1_8F6F_944E_8C8E_93FAx_93FA_002E3" name="submission_day" value="{{ old('submission_day') }}" class="day" maxlength="2" readonly></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:152px; top:140px; width:77px; height:40px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:75px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_8E96_8BC6_8F8A_90AE_979D_8B4C_8D86x_8C53_8E73_8BE6_8B4C_8D86_002E4"
            name="office_arrangement_code_county_city_ward_code" value="{{ old('office_arrangement_code_county_city_ward_code') }}" class="number_4" maxlength="4" ></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:228px; top:140px; width:77px; height:40px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:75px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_8E96_8BC6_8F8A_90AE_979D_8B4C_8D86x_8E96_8BC6_8F8A_8B4C_8D86_002E5"
            name="office_reference_symbol_office_symbol" value="{{ old('office_reference_symbol_office_symbol') }}" maxlength="4"></SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0); left:190px; top:734px; width:43px; height:25px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;">翌月</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:765px; width:69px; height:19px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:5px 0px 0px 3px;">21</SPAN>

        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:125px; top:765px; width:657px; height:58px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px; display:block; text-align:justify; text-justify:distribute-all-lines;"></SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:346px; top:701px; width:436px; height:58px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px; display:block; text-align:justify; text-justify:distribute-all-lines;"></SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:666px; top:50px; width:119px; height:50px; text-align:center; font-size:17px; font-family:'ＭＳ ゴシック', sans-serif; padding:13px 11px 16px 11px; display:block; text-align:justify; text-justify:distribute-all-lines;">電子申請用</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:30px; top:400px; width:19px; height:291px; font-size:10px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines; writing-mode:tb-rl;">◎入力方法等については、記載要領をご覧ください。</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:11px; top:400px; width:19px; height:231px; font-size:10px; font-family:'ＭＳ 明朝', serif; display:block; text-align:justify; text-justify:distribute-all-lines; writing-mode:tb-rl;">◎必ず電子署名を付与して申請願います。</SPAN></PRE>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:704px; top:948px; width:85px; height:28px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;">0</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; display:none; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:672px; top:15px; width:119px; height:27px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;">A-330357-001_1</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:762px; top:541px; width:20px; height:35px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:10px 3px 0px 3px;">円</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:762px; top:575px; width:20px; height:35px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:10px 3px 0px 3px;">円</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:762px; top:609px; width:20px; height:35px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:10px 3px 0px 3px;">円</SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:224px; top:72px; width:416px; height:38px; text-align:center; font-size:14px; font-family:'ＭＳ ゴシック', sans-serif; padding:11px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;">70歳以上被用者育児休業等終了時報酬月額相当額変更届</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:133px; top:80px; width:80px; height:19px; text-align:center; font-size:12px; font-family:'ＭＳ ゴシック', sans-serif; padding:2px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;">厚生年金保険</SPAN></PRE>


        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:30px; top:140px; width:123px; height:40px; text-align:center; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:12px 7px 0px 7px; display:block; text-align:justify; text-justify:distribute-all-lines;">&#x2460;事業所整理記号</SPAN></PRE>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:243px; top:563px; width:13px; height:28px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:7px 0px 0px 0px;">日</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:243px; top:590px; width:13px; height:28px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:7px 0px 0px 0px;">日</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:243px; top:617px; width:13px; height:27px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:6px 0px 0px 0px;">日</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:342px; top:563px; width:20px; height:28px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:7px 1px 0px 1px;">円</SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:342px; top:590px; width:20px; height:28px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:7px 1px 0px 1px;">円</SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:342px; top:617px; width:20px; height:27px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:6px 1px 0px 1px;">円</SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:449px; top:563px; width:20px; height:28px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:7px 1px 0px 1px;">円</SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:449px; top:590px; width:20px; height:28px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:7px 1px 0px 1px;">円</SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:449px; top:617px; width:20px; height:27px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:6px 1px 0px 1px;">円</SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:556px; top:563px; width:16px; height:28px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:7px 1px 0px 1px;">円</SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:556px; top:590px; width:16px; height:28px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:7px 1px 0px 1px;">円</SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:556px; top:617px; width:16px; height:27px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:6px 1px 0px 1px;">円</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px dotted rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:255px; top:541px; width:107px; height:23px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:4px 1px 0px 1px;">[ｱ]&nbsp;通貨</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:137px; top:331px; width:382px; height:31px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"></SPAN>

        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:525px; top:278px; width:257px; height:31px; text-align:center; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:7px 3px 0px 3px; display:block; text-align:justify; text-justify:distribute-all-lines;">&#x2462; 社会保険労務士の提出代行者名記載欄</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:137px; top:179px; width:382px; height:30px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:13px 0px 0px 0px;"></SPAN>
          <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:166px; top:182px; width:68px; height:23px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:68px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_8E96_8BC6_8F8A_8F8A_8DDD_926Ex_9758_95D6_94D4_8D86x_9065_94D4_8D86_002E6"
            name="post_code_former" value="{{ old('post_code_former') }}" class="number_3" maxlength="3"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:257px; top:182px; width:91px; height:23px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:91px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_8E96_8BC6_8F8A_8F8A_8DDD_926Ex_9758_95D6_94D4_8D86x_8E71_94D4_8D86_002E7"
            name="post_code_latter" value="{{ old('post_code_latter') }}" class="number_4" maxlength="4"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:137px; top:209px; width:382px; line-height:38px; height:38px; font-size:13px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
          autocomplete="off"style=" text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; width:380px; height:37px; ime-mode:active;"
            id="_8E96_8BC6_8F8A_8F8A_8DDD_926E_002E8" maxlength="75" name="branch_address" >{{ old('branch_address') }}</TEXTAREA></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:137px; top:247px; width:382px; line-height:53px; height:53px; font-size:13px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
          autocomplete="off" style="text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; width:380px; height:52px; ime-mode:active;"
            id="_8E96_8BC6_8F8A_96BC_8FCC_002E9" maxlength="50" name="branch_name" >{{ old('branch_name') }}</TEXTAREA></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:137px; top:300px; width:382px; line-height:30px; height:31px; font-size:13px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
          autocomplete="off" style="text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; width:380px; height:30px; ime-mode:active;"
            id="_8E96_8BC6_8EE5_8E81_96BC_002E10" maxlength="25" name="employer_company_managerial_position_name" >{{ old('employer_company_managerial_position_name') }}</TEXTAREA></SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:143px; top:182px; width:23px; height:23px; text-align:center; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;">〒</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:234px; top:182px; width:23px; height:23px; text-align:center; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;">－</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:337px; top:335px; width:27px; height:23px; text-align:center; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;">局</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:455px; top:335px; width:23px; height:23px; text-align:center; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;">番</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:30px; top:179px; width:108px; height:183px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:165px 0px 0px 0px;"></SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:217px; width:91px; height:19px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;">事業所所在地</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:259px; width:91px; height:34px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;">事業所名称</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:304px; width:91px; height:19px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;">事業主氏名</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:38px; top:335px; width:91px; height:19px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;">電話番号</SPAN></PRE>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:143px; top:335px; width:91px; height:23px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT                    
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:91px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_9364_9862_94D4_8D86x_8E73_8A4F_8BC7_94D4_002E11" name="branch_tel_area_code" value="{{ old('branch_tel_area_code') }}" class="number_5"
            maxlength="5"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:234px; top:335px; width:12px; height:23px; text-align:center; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:246px; top:335px; width:91px; height:23px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:91px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_9364_9862_94D4_8D86x_8BC7_94D4_002E12" name="branch_tel_city_code" value="{{ old('branch_tel_city_code') }}" class="number_4" maxlength="4"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:364px; top:335px; width:91px; height:23px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:91px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_9364_9862_94D4_8D86x_94D4_8D86_002E13" name="branch_tel_subscriber_code" value="{{ old('branch_tel_subscriber_code') }}" class="number_5" maxlength="5"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:525px; top:308px; width:257px; line-height:53px; height:54px; font-size:13px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
          autocomplete="off" style="text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); font-size:13px; font-family:'ＭＳ 明朝', serif; width:255px; height:51px; ime-mode:disabled;"
            id="_8ED0_89EF_95DB_8CAF_984A_96B1_8E6D_82CC_92F1_8F6F_91E3_8D73_8ED2_96BC_002E14"
            name="labor_consultant_name"  ></TEXTAREA></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:125px; top:373px; width:165px; height:39px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:163px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_94ED_95DB_8CAF_8ED2_90AE_979D_94D4_8D86_002E15" name="Insured_person_reference_number" value="{{ old('Insured_person_reference_number') }}" class="number_6"
            maxlength="6"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:441px; top:373px; width:341px; height:39px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:339px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_8CC2_906C_94D4_8D86_82DC_82BD_82CD_8AEE_9162_944E_8BE0_94D4_8D86_002E16"
            name="my_number_or_basic_pension_number" value="{{ old('my_number_or_basic_pension_number') }}" class="number_12" maxlength="12" ></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0);left:175px; top:411px; width:153px; line-height:30px; height:30px; font-size:13px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            style="text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; width:152px; height:28px; ime-mode:active;"
            id="_94ED_95DB_8CAF_8ED2_8E81_96BCx_834A_8369_8E81_96BC_002E17" maxlength="25" autocomplete="off"
            name="fullname_kana">{{ old('fullname_kana') }}</TEXTAREA></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px dotted rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:125px; top:441px; width:203px; height:32px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:202px; height:30px; ime-mode:active;"
            type="TEXT" autocomplete="off" id="_94ED_95DB_8CAF_8ED2_8E81_96BCx_8ABF_8E9A_8E81_96BC_002E18" name="fullname" value="{{ old('fullname') }}"
            maxlength="12"></SPAN>
          <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:381px; top:411px; width:77px; height:62px; font-size:13px; padding:21px 19px 0px 7px;"><SELECT
            size="1"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; width:65px;"
            id="_94ED_95DB_8CAF_8ED2_90B6_944E_8C8E_93FAx_8CB3_8D86_002E19" name="year_of_birth_era" >
            <OPTION value="5" {{ old('year_of_birth_era') == '5' ? 'selected' : '' }}>昭和</OPTION>
            <OPTION value="7" {{ old('year_of_birth_era', '7') == '7' ? 'selected' : '' }}>平成</OPTION>
            <OPTION value="9" {{ old('year_of_birth_era') == '9' ? 'selected' : '' }}>令和</OPTION>
          </SELECT></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:426px; width:31px; height:47px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:29px; height:16px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_94ED_95DB_8CAF_8ED2_90B6_944E_8C8E_93FAx_944E_002E20" name="year_of_birth" value="{{ old('year_of_birth') }}" class="year"
            maxlength="2"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0); left:488px; top:426px; width:31px; height:47px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:30px; height:16px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_94ED_95DB_8CAF_8ED2_90B6_944E_8C8E_93FAx_8C8E_002E21" name="month_of_birth" value="{{ old('month_of_birth') }}" class="month"
            maxlength="2"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:518px; top:426px; width:31px; height:47px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:29px; height:16px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_94ED_95DB_8CAF_8ED2_90B6_944E_8C8E_93FAx_93FA_002E22" name="date_of_birth" value="{{ old('date_of_birth') }}" class="day"
            maxlength="2"></SPAN>

        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:548px; top:411px; width:234px; height:62px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:23px 76px 0px 76px; display:block; text-align:justify; text-justify:distribute-all-lines;"></SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:426px; width:69px; height:15px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 7px 0px 7px; display:block; text-align:justify; text-justify:distribute-all-lines;">被保険者</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:441px; width:69px; height:32px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:8px 7px 0px 7px; display:block; text-align:justify; text-justify:distribute-all-lines;">氏名</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:327px; top:426px; width:55px; height:15px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 3px; display:block; text-align:justify; text-justify:distribute-all-lines;">被保険者</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:327px; top:441px; width:55px; height:32px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:8px 0px 0px 3px; display:block; text-align:justify; text-justify:distribute-all-lines;">生年月日</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:411px; width:69px; height:15px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px;">&#x2465;</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:327px; top:411px; width:55px; height:15px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px;">&#x2466;</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0); left:126px; top:472px; width:49px; height:30px; text-align:center; font-size:11px; font-family:'ＭＳ 明朝', serif;">(ﾌﾘｶﾞﾅ)</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); left:175px; top:472px; width:153px; line-height:30px; height:30px; font-size:13px; font-family:'ＭＳ 明朝', serif;"><TEXTAREA
            style="text-align:left; box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:11px; font-family:'ＭＳ 明朝', serif; width:152px; height:28px; ime-mode:active;"
            autocomplete="off" id="_8E71_82CC_8E81_96BCx_834A_8369_8E81_96BC_002E23" name="ch_fullname_kana" maxlength="25" >{{ old('ch_fullname_kana') }}</TEXTAREA></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px dotted rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:125px; top:502px; width:203px; height:32px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:202px; height:30px; ime-mode:active;"
            type="TEXT" autocomplete="off" id="_8E71_82CC_8E81_96BCx_8ABF_8E9A_8E81_96BC_002E24" name="ch_fullname" value="{{ old('ch_fullname') }}"
            maxlength="12"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:381px; top:472px; width:77px; height:62px; font-size:13px; padding:21px 19px 0px 7px;"><SELECT
            size="1"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; width:65px;"
            id="_8E71_82CC_90B6_944E_8C8E_93FAx_8CB3_8D86_002E25" name="ch_year_of_birth_era" value="{{ old('ch_year_of_birth_era') }}">
            <OPTION value="" {{ old('ch_year_of_birth_era', '') == '' ? 'selected' : '' }}></OPTION>
            <OPTION value="令和" {{ old('ch_year_of_birth_era') == '令和' ? 'selected' : '' }}>令和</OPTION>
          </SELECT></SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:487px; width:69px; height:34px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:10px 7px 0px 7px; display:block; text-align:justify; text-justify:distribute-all-lines;">子の氏名</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:521px; width:69px; height:13px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 7px 0px 7px; display:block; text-align:justify; text-justify:distribute-all-lines;"></SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:472px; width:69px; height:15px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px;">&#x2467;</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:472px; width:31px; height:15px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 2px 0px 0px;">年</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0); left:488px; top:472px; width:31px; height:15px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 2px 0px 0px;">月</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:518px; top:472px; width:31px; height:15px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 2px 0px 0px;">日</SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:487px; width:31px; height:47px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:29px; height:16px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_8E71_82CC_90B6_944E_8C8E_93FAx_944E_002E26" name="ch_year_of_birth" value="{{ old('ch_year_of_birth') }}" class="year"
            maxlength="2"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0); left:488px; top:487px; width:31px; height:47px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:30px; height:16px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_8E71_82CC_90B6_944E_8C8E_93FAx_8C8E_002E27" name="ch_month_of_birth" value="{{ old('ch_month_of_birth') }}" class="month"
            maxlength="2"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:518px; top:487px; width:31px; height:47px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:29px; height:16px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_8E71_82CC_90B6_944E_8C8E_93FAx_93FA_002E28" name="ch_date_of_birth" value="{{ old('ch_date_of_birth') }}" class="day"
            maxlength="2"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:609px; top:472px; width:77px; height:62px; font-size:13px; padding:21px 19px 0px 7px;"><SELECT
            size="1"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; width:65px;"
            id="_88E7_8E99_8B78_8BC6_9399_8F49_97B9_944E_8C8E_93FAx_8CB3_8D86_002E29" name="closure_information_end_era">
            <OPTION value="" {{ old('closure_information_end_era', '') == '' ? 'selected' : '' }}></OPTION>
            <OPTION value="令和" {{ old('closure_information_end_era') == '令和' ? 'selected' : '' }}>令和</OPTION>
          </SELECT></SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:327px; top:487px; width:55px; height:15px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 3px; display:block; text-align:justify; text-justify:distribute-all-lines;">子の</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:327px; top:502px; width:55px; height:32px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 3px; display:block; text-align:justify; text-justify:distribute-all-lines;">生年月日</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:327px; top:472px; width:55px; height:15px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px;">&#x2468;</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:472px; width:33px; height:15px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 2px 0px 0px;">年</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:717px; top:472px; width:33px; height:15px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 2px 0px 0px;">月</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:749px; top:472px; width:33px; height:15px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 2px 0px 0px;">日</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:685px; top:487px; width:33px; height:47px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:31px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_88E7_8E99_8B78_8BC6_9399_8F49_97B9_944E_8C8E_93FAx_944E_002E30"
            name="closure_information_end_year" value="{{ old('closure_information_end_year') }}" class="year" maxlength="2"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:717px; top:487px; width:33px; height:47px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:31px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_88E7_8E99_8B78_8BC6_9399_8F49_97B9_944E_8C8E_93FAx_8C8E_002E31"
            name="closure_information_end_month" value="{{ old('closure_information_end_month') }}" class="month" maxlength="2"></SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:749px; top:487px; width:33px; height:47px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:14px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:31px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_88E7_8E99_8B78_8BC6_9399_8F49_97B9_944E_8C8E_93FAx_93FA_002E32"
            name="closure_information_end_day" value="{{ old('closure_information_end_day') }}" class="day" maxlength="2"></SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:548px; top:487px; width:62px; height:15px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 3px 0px 3px; display:block; text-align:justify; text-justify:distribute-all-lines;">育児休業等</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:548px; top:502px; width:62px; height:16px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 3px 0px 3px; display:block; text-align:justify; text-justify:distribute-all-lines;">終了年月日</SPAN></PRE>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:548px; top:472px; width:62px; height:15px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 3px 0px 3px;">&#x2469;</SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:548px; top:518px; width:62px; height:16px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 3px 0px 3px; display:block; text-align:justify; text-justify:distribute-all-lines;"></SPAN></PRE>
                        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:125px; top:563px; width:54px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:53px; height:17px;"
            type="TEXT" autocomplete="off" id="_8E78_8B8B_8C8E1x_8C8E_002E33" name="pay_month1" value="{{ old('pay_month1') }}" class="month" maxlength="2"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:190px; top:563px; width:53px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:52px; height:17px;"
            type="TEXT" autocomplete="off" id="_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90941x_93FA_002E34" name="Basic_days_payroll_calculation1" value="{{ old('Basic_days_payroll_calculation1') }}" class="day"
            maxlength="2"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:255px; top:564px; width:89px; height:27px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:88px; height:17px;"
            type="TEXT" autocomplete="off" id="_92CA_89DD1_002E35" name="currency_1" value="{{ old('currency_1') }}" class="money_7" maxlength="7"  ></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:179px; top:563px; width:12px; height:28px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:7px 0px 0px 0px;">月</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:179px; top:590px; width:12px; height:28px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:7px 0px 0px 0px;">月</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:179px; top:617px; width:12px; height:27px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:6px 0px 0px 0px;">月</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:361px; top:563px; width:90px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:89px; height:17px;"
            type="TEXT" autocomplete="off" id="_8CBB_95A81_002E36" name="genbutsu_1" value="{{ old('genbutsu_1') }}" class="money_7" maxlength="7"></SPAN>
          <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:468px; top:563px; width:90px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ffffff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:89px; height:17px; ime-mode:disabled;"
            type="TEXT" autocomplete="off" id="_8D87_8C761_002E37" name="sum1" value="{{ old('sum1') }}" class="money_7" maxlength="7" readonly></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:125px; top:590px; width:54px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:53px; height:17px;"
            type="TEXT" autocomplete="off" id="_8E78_8B8B_8C8E2x_8C8E_002E38" name="pay_month2" value="{{ old('pay_month2') }}" class="month" maxlength="2"></SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:190px; top:590px; width:53px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:52px; height:17px;"
            type="TEXT" autocomplete="off" id="_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90942x_93FA_002E39" name="Basic_days_payroll_calculation2" value="{{ old('Basic_days_payroll_calculation2') }}" class="day"
            maxlength="2"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:255px; top:590px; width:89px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:88px; height:17px;"
            type="TEXT" autocomplete="off" id="_92CA_89DD2_002E40" name="currency_2" value="{{ old('currency_2') }}" class="money_7" maxlength="7"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:361px; top:590px; width:90px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:89px; height:17px;"
            type="TEXT" autocomplete="off" id="_8CBB_95A82_002E41" name="genbutsu_2" value="{{ old('genbutsu_2') }}" class="money_7" maxlength="7"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:468px; top:590px; width:90px; height:28px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ffffff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:89px; height:17px;"
            type="TEXT" autocomplete="off" id="_8D87_8C762_002E42" name="sum2" value="{{ old('sum2') }}" class="money_7" maxlength="7" readonly></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:125px; top:617px; width:54px; height:27px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:53px; height:17px;"
            type="TEXT" autocomplete="off" id="_8E78_8B8B_8C8E3x_8C8E_002E43" name="pay_month3" value="{{ old('pay_month3') }}" class="month" maxlength="2"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:190px; top:617px; width:53px; height:27px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:52px; height:17px;"
            type="TEXT" autocomplete="off" id="_8B8B_975E_8C76_8E5A_82CC_8AEE_9162_93FA_90943x_93FA_002E44" name="Basic_days_payroll_calculation3" value="{{ old('Basic_days_payroll_calculation3') }}" class="day"
            maxlength="2"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:255px; top:617px; width:89px; height:27px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:88px; height:17px;"
            type="TEXT" autocomplete="off" id="_92CA_89DD3_002E45" name="currency_3" value="{{ old('currency_3') }}" class="money_7" maxlength="7"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:361px; top:617px; width:90px; height:27px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:89px; height:17px;"
            type="TEXT" autocomplete="off" id="_8CBB_95A83_002E46" name="genbutsu_3" value="{{ old('genbutsu_3') }}" class="money_7" maxlength="7"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:468px; top:617px; width:90px; height:27px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ffffff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:89px; height:17px;"
            type="TEXT" autocomplete="off" id="_8D87_8C763_002E47" name="sum3" value="{{ old('sum3') }}" class="money_7" maxlength="7" readonly></SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:224px; top:34px; width:416px; height:23px; text-align:center; font-size:21px; font-family:'ＭＳ ゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;">育児休業等終了時報酬月額変更届</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:289px; top:373px; width:153px; height:19px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 1px; display:block; text-align:justify; text-justify:distribute-all-lines;">&#x2464;個人番号</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px dotted rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:125px; top:541px; width:66px; height:23px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:4px 7px 0px 1px;">支給月</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px dotted rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:190px; top:541px; width:66px; height:23px; text-align:left; font-size:9px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px;line-height:11px; display:block;">給与計算の<br>基礎日数</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:0px dotted rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0); left:0px; top:0px; width:0px; height:0px; text-align:left; font-size:0px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px;"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:571px; top:541px; width:19px; height:35px; text-align:left; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 3px;">&#x246B;</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:571px; top:575px; width:19px; height:35px; text-align:left; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 3px;">&#x246C;</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:571px; top:609px; width:19px; height:35px; text-align:left; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:9px 0px 0px 3px;">&#x246D;</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:659px; top:541px; width:103px; height:35px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:7px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ffffff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:103px; height:17px;"
            type="TEXT" autocomplete="off" id="_918D_8C76_002E48" name="total" value="{{ old('total') }}" class="money_7" maxlength="7" readonly></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:659px; top:575px; width:103px; height:35px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:7px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ffffff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:103px; height:17px;"
            type="TEXT" autocomplete="off" id="_95BD_8BCF_8A7A_002E49" name="ave_amount" value="{{ old('ave_amount') }}" class="money_7" maxlength="7" readonly></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:659px; top:609px; width:103px; height:35px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:7px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ffffff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:103px; height:17px;"
            type="TEXT" autocomplete="off" id="_8F43_90B3_95BD_8BCF_8A7A_002E50" name="adj_amount" value="{{ old('adj_amount') }}" class="money_7" maxlength="7" readonly></SPAN>

        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:590px; top:541px; width:70px; height:35px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:9px 3px 0px 3px; display:block; text-align:justify; text-justify:distribute-all-lines;">総計</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:590px; top:575px; width:70px; height:35px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:9px 3px 0px 3px; display:block; text-align:justify; text-justify:distribute-all-lines;">平均額</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:590px; top:609px; width:70px; height:35px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:10px 3px 0px 3px; display:block; text-align:justify; text-justify:distribute-all-lines;">修正平均額</SPAN></PRE>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:34px; top:182px; width:19px; height:23px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 1px 0px 1px;">&#x2461;</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:346px; top:735px; width:95px; height:24px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:5px 0px 0px 22px;">パート</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px dotted rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:361px; top:541px; width:108px; height:23px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:4px 1px 0px 1px;">[ｲ］&nbsp;現物</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px dotted rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:468px; top:541px; width:104px; height:23px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:4px 1px 0px 1px;">[ｳ］合計([ｱ]+[ｲ])</SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:289px; top:392px; width:153px; height:20px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 1px; display:block; text-align:justify; text-justify:distribute-all-lines;">　(または基礎年金番号)</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:571px; width:69px; height:15px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px; display:block; text-align:justify; text-justify:distribute-all-lines;">給与支給月</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:541px; width:69px; height:30px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:15px 0px 0px 1px;">&#x246A;</SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:586px; width:69px; height:15px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px; display:block; text-align:justify; text-justify:distribute-all-lines;">及び</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:601px; width:69px; height:43px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px; display:block; text-align:justify; text-justify:distribute-all-lines;">報酬月額</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:659px; width:69px; height:15px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px; display:block; text-align:justify; text-justify:distribute-all-lines;">従前標準</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:643px; width:69px; height:16px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 1px;">&#x246E;</SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:674px; width:69px; height:28px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px; display:block; text-align:justify; text-justify:distribute-all-lines;">報酬月額</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:125px; top:643px; width:66px; height:16px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 7px 0px 1px;">健</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:190px; top:643px; width:66px; height:16px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 7px 0px 1px;">厚</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:125px; top:685px; width:66px; height:17px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;">千円</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:190px; top:685px; width:66px; height:17px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;">千円</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:125px; top:659px; width:66px; height:26px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:64px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_8F5D_914F_9557_8F80_95F1_8F56_8C8E_8A7Ax_8C92_002E51" name="previous_standard_monthly_remuneration_health_insurance" value="{{ old('previous_standard_monthly_remuneration_health_insurance') }}" class="money_4"
            maxlength="4"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:190px; top:659px; width:66px; height:26px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:64px; height:17px; ime-mode:inactive;"
            type="TEXT" autocomplete="off" id="_8F5D_914F_9557_8F80_95F1_8F56_8C8E_8A7Ax_8CFA_002E52" name="previous_standard_monthly_remuneration_employees_pension" value="{{ old('previous_standard_monthly_remuneration_employees_pension') }}" class="money_4"
            maxlength="4"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:350px; top:643px; width:50px; height:59px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:21px 19px 0px 19px;"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:331px; top:643px; width:19px; height:59px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:44px 1px 0px 1px;">月</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:369px; top:647px; width:29px; height:27px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:7px 0px 0px 0px;">昇給</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-bottom:1px solid rgb(0, 0, 0); left:369px; top:670px; width:29px; height:32px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:7px 0px 0px 0px;">降給</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:297px; top:643px; width:34px; height:59px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:19px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:33px; height:17px;"
            type="TEXT" autocomplete="off" id="_8FB8_8B8B_8D7E_8B8Bx_8C8E_002E53" name="pay_raise_increase_m" value="{{ old('pay_raise_increase_m') }}" class="month" maxlength="2"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:354px; top:655px; width:12px; line-height:15px; height:15px; text-align:left; font-size:15px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; white-space:nowrap;"><INPUT
            value="昇給"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:11px; "
            type="RADIO" id="_8FB8_8B8B_8D7E_8B8B_8BE6_95AA_002E54" name="pay_raise_increase" maxlength="2" <?php echo (old('pay_raise_increase') == '昇給') ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:354px; top:678px; width:12px; line-height:15px; height:15px; text-align:left; font-size:15px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; white-space:nowrap;"><INPUT
            value="降給"
            style="position:absolute; top:2px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:11px;"
            type="RADIO" id="_8FB8_8B8B_8D7E_8B8B_8BE6_95AA_002E54" name="pay_raise_increase" maxlength="2" <?php echo (old('pay_raise_increase') == '降給') ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>

        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:255px; top:659px; width:43px; height:15px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 5px 0px 5px; display:block; text-align:justify; text-justify:distribute-all-lines;">昇給</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:255px; top:643px; width:43px; height:16px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 1px;">&#x246F;</SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:255px; top:674px; width:43px; height:28px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 5px 0px 5px; display:block; text-align:justify; text-justify:distribute-all-lines;">降給</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-bottom:1px solid rgb(0, 0, 0); left:476px; top:659px; width:15px; height:43px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:29px 1px 0px 1px;">月</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:556px; top:659px; width:19px; height:43px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:29px 1px 0px 1px;">円</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:441px; top:659px; width:35px; height:43px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:12px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:34px; height:17px;"
            type="TEXT" autocomplete="off" id="_916B_8B79_8E78_95A5_8A7Ax_8C8E_002E55" name="retroactive_payment_month" value="{{ old('retroactive_payment_month') }}" class="month" maxlength="2"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-bottom:1px solid rgb(0, 0, 0); left:491px; top:659px; width:65px; height:43px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:12px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:right; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 1px 0px 0px; width:65px; height:17px;"
            type="TEXT" autocomplete="off" id="_916B_8B79_8E78_95A5_8A7A_002E56" name="retroactive_payment" value="{{ old('retroactive_payment') }}" class="money_7" maxlength="7"></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:613px; top:643px; width:68px; height:59px; font-size:13px; padding:19px 19px 0px 3px;"><SELECT
            size="1"
            style="box-sizing:border-box; -moz-box-sizing:border-box; line-height:1em; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; width:60px;"
            id="_89FC_92E8_944E_8C8Ex_8CB3_8D86_002E57" name="revised_era">
            <OPTION value="" {{ old('revised_era', '') == '' ? 'selected' : '' }}></OPTION>
            <OPTION value="9" {{ old('revised_era') == '9' ? 'selected' : '' }}>令和</OPTION>
          </SELECT></SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0); left:400px; top:659px; width:41px; height:15px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px; display:block; text-align:justify; text-justify:distribute-all-lines;">遡及</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0); left:400px; top:643px; width:41px; height:16px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 1px;">&#x2470;</SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0); left:400px; top:674px; width:41px; height:28px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px; display:block; text-align:justify; text-justify:distribute-all-lines;">支払額</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:441px; top:643px; width:134px; height:16px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 7px 0px 68px;">遡及支払額</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:716px; top:643px; width:15px; height:59px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:45px 1px 0px 1px;">年</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:681px; top:643px; width:35px; height:59px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:19px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:35px; height:17px;"
            type="TEXT" autocomplete="off" id="_89FC_92E8_944E_8C8Ex_944E_002E58" name="revised_year" value="{{ old('revised_year') }}" class="year" maxlength="2"></SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:575px; top:659px; width:39px; height:15px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 3px 0px 3px; display:block; text-align:justify; text-justify:distribute-all-lines;">改定</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:575px; top:643px; width:39px; height:16px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 1px;">&#x2471;</SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:575px; top:674px; width:39px; height:28px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 3px 0px 3px; display:block; text-align:justify; text-justify:distribute-all-lines;">年月</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:731px; top:643px; width:34px; height:59px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:19px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ffffff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:34px; height:17px;"
            type="TEXT" autocomplete="off" id="_89FC_92E8_944E_8C8Ex_8C8E_002E59" name="revised_month" value="{{ old('revised_month') }}" class="month" maxlength="2" readonly></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:765px; top:643px; width:17px; height:59px; text-align:center; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:45px 1px 0px 1px;">月</SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:716px; width:69px; height:15px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; display:block; text-align:justify; text-justify:distribute-all-lines;">給与締切日･</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:701px; width:69px; height:15px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px;">&#x2472;</SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:731px; width:69px; height:28px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 7px 0px 7px; display:block; text-align:justify; text-justify:distribute-all-lines;">支払日</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:125px; top:701px; width:66px; height:19px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 7px 0px 3px;">締切日</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0); left:190px; top:701px; width:115px; height:19px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 7px 0px 1px;">支払日</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:175px; top:701px; width:16px; height:58px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:22px 0px 0px 0px;">日</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:289px; top:701px; width:16px; height:58px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:40px 0px 0px 0px;">日</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:125px; top:720px; width:54px; height:39px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:53px; height:17px;"
            type="TEXT" autocomplete="off" id="_8B8B_975E_92F7_90D8_93FAx_93FA_002E60" name="salary_payroll_deadline" value="{{ old('salary_payroll_deadline') }}" class="day" maxlength="2"></SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0); left:191px; top:718px; width:42px; height:19px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 0px;">当月</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:198px; top:723px; width:12px; line-height:15px; height:14px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; white-space:nowrap;"><INPUT
            value="当月"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:11px;"
            type="RADIO" id="_8B8B_975E_8E78_95A5_93FAx_9149_91F0_002E61_1" name="salary_payroll_month" <?php echo (old('salary_payroll_month') == '当月') ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:198px; top:739px; width:12px; line-height:15px; height:14px; text-align:left; font-size:14px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; white-space:nowrap;"><INPUT
            value="翌月"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:11px; height:11px;"
            type="RADIO" id="_8B8B_975E_8E78_95A5_93FAx_9149_91F0_002E61_2" name="salary_payroll_month" <?php echo (old('salary_payroll_month') == '翌月') ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-bottom:1px solid rgb(0, 0, 0); left:233px; top:720px; width:59px; height:39px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:center; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 0px; width:53px; height:17px;"
            type="TEXT" autocomplete="off" id="_8B8B_975E_8E78_95A5_93FAx_93FA_002E62" name="salary_payroll_day" value="{{ old('salary_payroll_day') }}" class="day" maxlength="2"></SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:304px; top:716px; width:43px; height:23px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:8px 0px 0px 1px; display:block; text-align:justify; text-justify:distribute-all-lines;">備考</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:304px; top:701px; width:43px; height:15px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px;">&#x2473;</SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:304px; top:739px; width:43px; height:20px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px; display:block; text-align:justify; text-justify:distribute-all-lines;"></SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0); left:347px; top:701px; width:115px; height:22px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 22px;">70歳以上被用者</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); left:461px; top:701px; width:144px; height:22px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 22px;">二以上勤務被保険者</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); left:601px; top:701px; width:138px; height:22px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 0px 22px;">短時間労働者</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:601px; top:720px; width:138px; height:15px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 22px;">(特定適用事業所のみ)</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-bottom:1px solid rgb(0, 0, 0); left:464px; top:735px; width:73px; height:24px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:5px 0px 0px 22px;">その他(</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-bottom:1px solid rgb(0, 0, 0); left:681px; top:735px; width:31px; height:24px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:5px 0px 0px 0px;">)</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color: #ddeeff; left:354px; top:708px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            value="有" <?php echo old('remarks_and_calculation_of_employees_aged_70_and_over') == '有' ? 'checked' : ''; ?>
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:12px;"
            type="CHECKBOX" id="_94F5_8D6Cx_9149_91F0x70_8DCE_88C8_8FE3_94ED_9770_8ED2_002E63"
            name="remarks_and_calculation_of_employees_aged_70_and_over" ><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color: #ddeeff; left:468px; top:708px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            value="有"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:12px;"
            type="CHECKBOX" id="_94F5_8D6Cx_9149_91F0x_93F1_88C8_8FE3_8BCE_96B1_94ED_95DB_8CAF_8ED2_002E64"
            name="remarks_and_two_or_more_jobs"  <?php echo old('remarks_and_two_or_more_jobs') == '有' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color: #ddeeff; left:609px; top:708px; width:13px; line-height:13px; height:14px; text-align:center; font-size:14px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            value="有"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:12px;"
            type="CHECKBOX" id="_94F5_8D6Cx_9149_91F0x_925A_8E9E_8AD4_984A_93AD_8ED2_002E65"
            name="remarks_and_part_time_worker" <?php echo old('remarks_and_part_time_worker') == '有' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color: #ddeeff; left:354px; top:743px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            value="有"
            style="position:absolute; top:0px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:12px;"
            type="CHECKBOX" id="_94F5_8D6Cx_9149_91F0x_8370_815B_8367_002E66" name="remarks_and_part" <?php echo old('remarks_and_part') == '有' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;" >&nbsp;</SPAN></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color: #ddeeff; left:468px; top:743px; width:13px; line-height:13px; height:13px; text-align:center; font-size:13px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            value="有"
            style="position:absolute; top:0px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:12px; height:12px;"
            type="CHECKBOX" id="_94F5_8D6Cx_9149_91F0x_82BB_82CC_91BC_002E67" name="remarks_and_others" <?php echo old('remarks_and_others') == '有' ? 'checked' : ''; ?>><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-bottom:1px solid rgb(0, 0, 0); left:533px; top:735px; width:147px; height:24px; font-size:13px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 0px;"><INPUT
            style="box-sizing:border-box; -moz-box-sizing:border-box; text-align:left; color:rgb(0, 0, 0); background-color:#ddeeff; font-size:13px; font-family:'ＭＳ 明朝', serif; width:147px; height:17px;"
            type="TEXT" autocomplete="off" id="_94F5_8D6Cx_82BB_82CC_91BC_002E68" name="comment_other" value="{{ old('comment_other') }}" maxlength="10"></SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:784px; width:69px; height:16px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 1px; display:block; text-align:justify; text-justify:distribute-all-lines;">月変該当の</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:800px; width:69px; height:23px; text-align:right; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 7px 0px 7px; display:block; text-align:justify; text-justify:distribute-all-lines;">確認</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:125px; top:765px; width:248px; height:29px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:10px 0px 1px 3px;">育児休業等を終了した日の翌日に引き続いて、</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:125px; top:794px; width:248px; height:29px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:1px 0px 0px 3px;">産前産後休業を開始していませんか。</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:377px; top:765px; width:144px; height:58px; text-align:left; font-size:11px; font-family:'ＭＳ 明朝', serif; padding:22px 0px 0px 22px;">開始していません</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left:381px; top:788px; width:13px; line-height:15px; height:16px; text-align:left; font-size:16px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;"><INPUT
            value="開始していません"
            style="position:absolute; top:1px; left:0px; box-sizing:border-box; -moz-box-sizing:border-box; width:13px; height:13px;"
            type="CHECKBOX" id="_8C8E_95CF_8A59_9396_82CC_8A6D_9446_002E69" name="month_check"  {{ old('month_check') == '開始していません' ? 'checked' : '' }}><SPAN
            style="font-size:14px; height:14px; vertical-align:middle;">&nbsp;</SPAN></SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); left:514px; top:765px; width:268px; height:19px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 1px 3px;">※育児休業等を終了した日の翌日に引き続いて、</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); left:514px; top:803px; width:268px; height:20px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:3px 0px 3px 15px;">できません。</SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:392px; width:69px; height:20px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:0px 0px 0px 15px; display:block; text-align:justify; text-justify:distribute-all-lines;">整理番号</SPAN></PRE>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:373px; width:69px; height:19px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; padding:4px 0px 0px 1px; display:block; text-align:justify; text-justify:distribute-all-lines;">&#x2463;被保険者</SPAN></PRE>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:1px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:57px; top:768px; width:19px; height:18px;"></SPAN>
        <PRE><SPAN style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); left:60px; top:38px; width:153px; height:15px; text-align:center; font-size:12px; font-family:'ＭＳ Ｐゴシック', sans-serif; display:block; text-align:justify; text-justify:distribute-all-lines;">健康保険・厚生年金保険</SPAN></PRE>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:0px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); left:514px; top:784px; width:268px; height:19px; text-align:left; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:2px 0px 0px 15px;">産前産後休業を開始した場合は、この申出は</SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:0spx solid rgb(0, 0, 0); left:126px; top:411px; width:49px; height:30px; text-align:center; font-size:11px; font-family:'ＭＳ 明朝', serif;">(ﾌﾘｶﾞﾅ)</SPAN>

        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:457px; top:411px; width:31px; height:15px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 2px 0px 0px;">年</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:0px solid rgb(0, 0, 0); left:488px; top:411px; width:31px; height:15px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 2px 0px 0px;">月</SPAN>
        <SPAN
          style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:rgb(255, 255, 255); border-top:1px solid rgb(0, 0, 0); border-right:0px solid rgb(0, 0, 0); border-bottom:0px solid rgb(0, 0, 0); border-left:1px solid rgb(0, 0, 0); left:518px; top:411px; width:30px; height:15px; text-align:right; font-size:10px; font-family:'ＭＳ 明朝', serif; padding:0px 2px 0px 0px;">日</SPAN>

        <input type="hidden" name="report_form" value="4">
      </DIV>
    </FORM>
  </div>
</div>
