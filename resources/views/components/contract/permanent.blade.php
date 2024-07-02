<section style="width: 100%; padding: 1.2em 0;" class="contract-form permanent">
    <div style='position: relative; left: 0px; top: 0px; width:685px; word-wrap:break-word;margin: 0 auto;'>
        <style>
            p.MsoNormal,
            li.MsoNormal,
            div.MsoNormal {
                margin: 0mm;
                text-align: justify;
                text-justify: inter-ideograph;
                font-size: 10.5pt;
                font-family: "Century", serif;
            }

            ol {
                margin-bottom: 0mm;
            }

            ul {
                margin-bottom: 0mm;
            }

            .no-spin::-webkit-inner-spin-button,
            .no-spin::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
                -moz-appearance: textfield;
            }

            .no-spin {
                appearance: textfield;
            }

            input,
            textarea {
                border: none;
            }
        </style>
        <div class=WordSection1>

            <p class=MsoNormal style='text-align:center; margin-bottom: 2px;'>
                <b>
                    <span style='font-size:16.0pt;font-family:"ＭＳ 明朝",serif'>
                        <input type="text" id="title" name="title"
                            style="width: 480px; text-align: center; font-size: 1.1em; background-color: #ddeeff;"
                            value="{{ old('title', $default['title']) }}">
                    </span>
                </b>
            </p>

            <p class=MsoNormal style='text-align:right; margin-right: 12px;'>
                <span style='font-family:"ＭＳ 明朝",serif'>令和<input type="number" class="no-spin" id="era"
                        name="era" style="width: 24px;background-color: #ddeeff;"
                        value="{{ old('era', $info['era']) }}">年<input type="number" class="no-spin" id="month"
                        name="month" style="width: 24px;background-color: #ddeeff;"
                        value="{{ old('month', $info['month']) }}">月<input type="number" class="no-spin" id="day"
                        name="day"
                        style="width: 24px; background-color: #ddeeff;"value="{{ old('day', $info['day']) }}">日</span>
            </p>

            <p class=MsoNormal>
                <span style='font-family:"ＭＳ 明朝",serif; border-bottom: solid 1px black;'> <input type="text"
                        class="full_name" name="full_name" value="{{ old('full_name') }}" readonly>
                    殿 </span>
            </p>

            <p class=MsoNormal style='text-indent:191.25pt;line-height:15.0pt'>
                <span style='text-fit:63.0pt'>
                    <span style='font-family:"ＭＳ 明朝",serif'>事業所所在地</span>
                </span>
                <input type="text" id="company_address" name="company_address"
                    style="width: 320px;background-color: #ddeeff;"
                    value="{{ old('company_address', $info['address']) }}">
            </p>

            <p class=MsoNormal style='text-indent:191.25pt;line-height:15.0pt'>
                <span style='text-fit:63.0pt'>
                    <span style='font-family:"ＭＳ 明朝",serif;letter-spacing:3.5pt'>事業所名</span>
                </span>
                <input type="text" id="company_name" name="company_name"
                    style="width: 320px; margin-left: 9px;background-color: #ddeeff;"
                    value="{{ old('company_name', $info['company_name']) }}">
            </p>

            <p class=MsoNormal style='text-indent:191.4pt;line-height:150%'>
                <span style='text-fit:63.0pt'>
                    <span style='line-height:150%;font-family:"ＭＳ 明朝",serif;letter-spacing:1.3pt'>使用者氏名</span>
                </span>
                <input type="text" name="company_representative"
                    style="width: 280px; margin-left: 5px;background-color: #ddeeff;"
                    value="{{ old('company_representative', $info['company_representative']) }}">
                <span style='margin-left: 5px;line-height:150%;font-family:"ＭＳ 明朝",serif'>&#12958;</span>
            </p>

            <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=680
                style='width:510.35pt;border-collapse:collapse;border:none'>
                <tr style='height:15.05pt'>
                    <td width=95
                        style='width:70.9pt;border:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:15.05pt'>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>雇用期間</span>
                        </p>
                    </td>
                    <td width=586 colspan=3
                        style='width:439.45pt;border:solid windowtext 1.0pt;border-left:none;padding:0mm 5.4pt 0mm 5.4pt;height:15.05pt'>
                        <p class=MsoNormal style='text-indent:10.5pt'>
                            <span style='font-family:"ＭＳ 明朝",serif'>雇用期間の定めなし</span>
                        </p>
                    </td>
                </tr>
                <tr style='height:13.9pt'>
                    <td width=95 rowspan=2
                        style='width:70.9pt;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;height:13.9pt'>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>労働者種別</span>
                        </p>
                    </td>
                    <td width=96 rowspan=2
                        style='width:72.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:13.9pt'>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <input type="text" id="employer_type" name="employer_type"
                                style="width: 82px;background-color: #ddeeff; text-align: center;"
                                value="{{ old('employer_type', $default['employer_type']) }}">
                        </p>
                    </td>
                    <td width=85 rowspan=2
                        style='width:63.75pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:13.9pt'>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>勤務場所</span>
                        </p>
                    </td>
                    <td width=404
                        style='width:303.35pt;border-top:none;border-left:none;border-bottom:dotted windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:13.9pt'>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>同上及び会社が指定する場所</span>
                        </p>
                    </td>
                </tr>
                <tr style='height:13.85pt'>
                    <td width=404
                        style='width:303.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:13.85pt'>
                        <input type="text" id="work_place" name="work_place"
                            style="width: 360px;background-color: #ddeeff;"
                            value="{{ old('work_place', $default['work_place']) }}">
                    </td>
                </tr>
                <tr style='height:15.0pt'>
                    <td width=95 rowspan=2
                        style='width:70.9pt;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;height:15.0pt'>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>試用期間</span>
                        </p>
                    </td>
                    <td width=96
                        style='width:72.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:15.0pt'>
                        <p class=MsoNormal style='text-indent:10.5pt'>
                            <span style='font-family:"ＭＳ 明朝",serif'>あり</span>
                        </p>
                    </td>
                    <td width=85
                        style='width:63.75pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:15.0pt'>
                        <p class=MsoNormal style='text-indent:10.5pt'>
                            <span style='font-family:"ＭＳ 明朝",serif'>期 間</span>
                        </p>
                    </td>
                    <td width=404
                        style='width:303.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:15.0pt'>
                        <input type="text" id="probation_period" name="probation_period"
                            style="width: 360px;background-color: #ddeeff;"
                            value="{{ old('probation_period', $default['probation_period']) }}" />
                    </td>
                </tr>
                <tr style='height:15.0pt'>
                    <td width=586 colspan=3
                        style='width:439.45pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:15.0pt'>
                        <textarea id="probation_period_detail" name="probation_period_detail"
                            style="width: 100%; max-width: 100%; min-width: 100%; height: 70px;background-color: #ddeeff;">{{ old('probation_period_detail', $default['probation_period_detail']) }}</textarea>
                    </td>
                </tr>
                <tr style='height:15.0pt'>
                    <td width=95 rowspan=2
                        style='width:70.9pt;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;height:15.0pt'>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>業務内容</span>
                        </p>
                    </td>
                    <td width=586 colspan=3
                        style='width:439.45pt;border-top:none;border-left:none;border-bottom:dotted windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:15.0pt'>
                        <input type="text" id="duties" name="duties"
                            style="width: 100%;background-color: #ddeeff;"
                            value="{{ old('duties', $default['duties']) }}" />
                    </td>
                </tr>
                <tr style='height:15.0pt'>
                    <td width=586 colspan=3 valign=top
                        style='width:439.45pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:15.0pt'>
                        <textarea id="duties_detail" name="duties_detail"
                            style="width: 100%; max-width: 100%; min-width: 100%; height: 32px;background-color: #ddeeff;">{{ old('duties_detail', $default['duties_detail']) }}</textarea>
                    </td>
                </tr>
                <tr style='height:40.55pt'>
                    <td width=95
                        style='width:70.9pt;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;height:40.55pt'>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>始業・終業</span>
                        </p>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>休憩の時間</span>
                        </p>
                    </td>
                    <td width=586 colspan=3
                        style='width:439.45pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:40.55pt'>
                        <textarea id="start_end_and_break_time" name="start_end_and_break_time"
                            style="width: 100%; max-width: 100%; min-width: 100%; height: 60px;background-color: #ddeeff;">{{ old('start_end_and_break_time', $default['start_end_and_break_time']) }}</textarea>
                    </td>
                </tr>
                <tr style='height:15.0pt'>
                    <td width=95
                        style='width:70.9pt;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;height:15.0pt'>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>休 日</span>
                        </p>
                    </td>
                    <td width=586 colspan=3
                        style='width:439.45pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:15.0pt'>
                        <textarea id="holiday" name="holiday"
                            style="width: 100%; max-width: 100%; min-width: 100%; height: 40px;background-color: #ddeeff;">{{ old('holiday', $default['holiday']) }}</textarea>
                    </td>
                </tr>
                <tr style='height:28.55pt'>
                    <td width=95
                        style='width:70.9pt;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;height:28.55pt'>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>時間外勤務の有無</span>
                        </p>
                    </td>
                    <td width=586 colspan=3
                        style='width:439.45pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:28.55pt'>
                        <textarea id="overtime_work" name="overtime_work"
                            style="width: 100%; max-width: 100%; min-width: 100%; height: 40px;background-color: #ddeeff;">{{ old('overtime_work', $default['overtime_work']) }}</textarea>
                    </td>
                </tr>
                <tr style='height:36.0pt'>
                    <td width=95
                        style='width:70.9pt;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;height:36.0pt'>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>休 暇</span>
                        </p>
                    </td>
                    <td width=586 colspan=3
                        style='width:439.45pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:36.0pt'>
                        <textarea id="vacation" name="vacation"
                            style="width: 100%; max-width: 100%; min-width: 100%; height: 40px;background-color: #ddeeff;">{{ old('vacation', $default['vacation']) }}</textarea>
                    </td>
                </tr>
                <tr style='height:145.15pt'>
                    <td width=95
                        style='width:70.9pt;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;height:145.15pt'>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>賃 金</span>
                        </p>
                    </td>
                    <td width=586 colspan=3
                        style='width:439.45pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:145.15pt'>
                        <textarea id="wages" name="wages"
                            style="width: 100%; max-width: 100%; min-width: 100%; height: 210px;background-color: #ddeeff;">{{ old('wages', $default['wages']) }}</textarea>
                    </td>
                </tr>
                <tr style='height:42.5pt'>
                    <td width=95
                        style='width:70.9pt;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;height:42.5pt'>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>退職に</span>
                        </p>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>関する事項</span>
                        </p>
                    </td>
                    <td width=586 colspan=3
                        style='width:439.45pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:42.5pt'>
                        <textarea id="matters_of_retirement" name="matters_of_retirement"
                            style="width: 100%; max-width: 100%; min-width: 100%; height: 55px;background-color: #ddeeff;">{{ old('matters_of_retirement', $default['matters_of_retirement']) }}</textarea>
                    </td>
                </tr>
                <tr style='height:127.55pt'>
                    <td width=95
                        style='width:70.9pt;border:solid windowtext 1.0pt;border-top:none;padding:0mm 5.4pt 0mm 5.4pt;height:127.55pt'>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>その他の</span>
                        </p>
                        <p class=MsoNormal align=center style='text-align:center'>
                            <span style='font-family:"ＭＳ 明朝",serif'>契約事項</span>
                        </p>
                    </td>
                    <td width=586 colspan=3
                        style='width:439.45pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0mm 5.4pt 0mm 5.4pt;height:127.55pt'>
                        <textarea id="other_contract_matters" name="other_contract_matters"
                            style="width: 100%; max-width: 100%; min-width: 100%; height: 170px;background-color: #ddeeff;">{{ old('other_contract_matters', $default['other_contract_matters']) }}</textarea>
                    </td>
                </tr>
            </table>

            <p class=MsoNormal style=''>
                <span style='position:relative;z-index:auto;top:5px;width:100%;height:69px'>
                    <img width=681 height=64 src="{{ asset('/img/employee_contract_sign.gif') }}"
                        alt="上記の内容を確認し、条件に同意することを証し、本書面を2通作成し、労使双方が各1通を保有する。&#13;&#10;&#13;&#10;氏名	&#12958;&#13;&#10;">
                </span>
                <span lang=EN-US>&nbsp;</span>
            </p>
        </div>
    </div>
</section>
