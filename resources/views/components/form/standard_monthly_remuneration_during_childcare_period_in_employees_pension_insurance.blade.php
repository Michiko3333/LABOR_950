<div class="egovuiForm-preview-style egovuiForm-preview-legal-style">
    <style>
        .egovuiForm-preview-style.egovuiForm-preview-legal-style #egov-tool-wrapper {
            position: relative;
            overflow: visible;
        }

        .egovuiForm-preview-style.egovuiForm-preview-legal-style #egov-tool-wrapper input,
        .egovuiForm-preview-style.egovuiForm-preview-legal-style #egov-tool-wrapper select,
        .egovuiForm-preview-style.egovuiForm-preview-legal-style #egov-tool-wrapper textarea {
            color: #000000;
            font-family: sans-serif;
            min-height: initial;
            position: absolute;
        }

        .egovuiForm-preview-style.egovuiForm-preview-legal-style .egov-tool-field-origin {
            position: absolute;
            z-index: 2;
        }

        .egovuiForm-preview-style.egovuiForm-preview-legal-style .egov-tool-field-rect {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            background-color: #ddeeff;
            padding: 0px;
            overflow: hidden;
            border: none;
            position: absolute;
            border-radius: 0px;
        }

        .egovuiForm-preview-style .egovuiForm-preview-legal-style .egov-tool-field-rect .egovuiForm-radio-wrapper:disabled {
            background-color: #ffffff;
        }

        .egovuiForm-preview-style.egovuiForm-preview-legal-style #egov-tool-wrapper img {
            margin: 0px !important;
        }

        .egovuiForm-preview-style.egovuiForm-preview-legal-style select {
            min-height: 10px;
            min-width: 10px;
            background-color: #ddeeff;
        }

        .egovuiForm-radio-wrapper {
            background-color: #ddeeff;
            position: absolute;
            width: 15px;
            height: 15px;
            display: flex;
            border-radius: 5px;
        }

        .egovuiForm-radio-wrapper input[type="radio"] {
            width: 10px;
            height: 10px;
            margin: 0;
            padding: 0;
            position: relative;
        }

        .egovuiForm-checkbox-wrapper {
            position: absolute;
            background-color: #ddeeff;
            width: 18px;
            height: 18px;
        }

        .egovuiForm-checkbox-wrapper input[type="checkbox"] {
            position: relative;
            margin: 0;
        }
    </style>
    <form class="egovuiForm-form">
        <div id="egov-tool-wrapper">
            <div class="egov-tool-field-origin" style="left: 106px; top: 76px;">
                <input class="egov-tool-field-rect submission_year" id="submission_year" name="submission_year" required="required" style="width: 30px; height: 28px; font-size: 12px; text-align: center; line-height: 28px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('submission_year')}}" />
            </div>
            <div class="egov-tool-field-origin" style="left: 151px; top: 76px;">
                <input class="egov-tool-field-rect submission_month" id="submission_month" name="submission_month" required="required" style="width: 30px; height: 28px; font-size: 12px; text-align: center; line-height: 28px; padding: inherit; background-color: #ddeeff;" type="text"  value="{{old('submission_month')}}" />
            </div>
            <div class="egov-tool-field-origin" style="left: 196px; top: 76px;">
                <input class="egov-tool-field-rect submission_day" id="submission_day" name="submission_day" required="required" style="width: 30px; height: 28px; font-size: 12px; text-align: center; line-height: 28px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('submission_day')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 211px; top: 108px;">
                <input class="egov-tool-field-rect office_reference_code_prefecture" id="office_reference_code_prefecture" maxlength="2" name="office_reference_code_prefecture" required="required" autocomplete=”off” style="width: 32px; height: 26px; font-size: 12px; text-align: left; line-height: 26px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('office_reference_code_prefecture')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 249px; top: 108px;">
                <input class="egov-tool-field-rect office_reference_code_city" id="office_reference_code_city" maxlength="4" name="office_reference_code_city" required="required" autocomplete=”off” style="width: 58px; height: 26px; font-size: 12px; text-align: left; line-height: 26px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('office_reference_code_city')}}" />
            </div>
            <div class="egov-tool-field-origin" style="left: 313px; top: 108px;">
                <input class="egov-tool-field-rect office_reference_code_office" id="office_reference_code_office" maxlength="4" name="office_reference_code_office" required="required" autocomplete=”off” style="width: 66px; height: 26px; font-size: 12px; text-align: left; line-height: 26px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('office_reference_code_office')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 506px; top: 108px;">
                <input class="egov-tool-field-rect pension_office_number" id="pension_office_number" maxlength="5" name="pension_office_number" required="required" autocomplete=”off” style="width: 77px; height: 26px; font-size: 12px; text-align: right; line-height: 26px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('pension_office_number')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 236px; top: 139px;">
                <input class="egov-tool-field-rect postcode_office_parent" id="postcode_office_parent" maxlength="3" name="postcode_office_parent" required="required" autocomplete=”off” style="width: 69px; height: 27px; font-size: 12px; text-align: center; line-height: 27px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('postcode_office_parent')}}" />
            </div>
            <div class="egov-tool-field-origin" style="left: 329px; top: 139px;">
                <input class="egov-tool-field-rect postcode_office_child" id="postcode_office_child" maxlength="4" name="postcode_office_child" required="required" autocomplete=”off” style="width: 81px; height: 27px; font-size: 12px; text-align: center; line-height: 27px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('postcode_office_child')}}" />
            </div>
            <div class="egov-tool-field-origin" style="left: 211px; top: 168px;">
                <textarea class="egov-tool-field-rect str_company_address" id="str_company_address" maxlength="75" name="str_company_address" required="required" style="width: 372px; height: 55px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color: #ddeeff; overflow-wrap: break-word; word-wrap: break-word;">{{old('str_company_address') ?? ''}}</textarea>
            </div>
            <div class="egov-tool-field-origin" style="left: 211px; top: 225px;">
                <textarea class="egov-tool-field-rect str_company_name" id="str_company_name" maxlength="50" name="str_company_name" required="required" style="width: 372px; height: 34px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color: #ddeeff; overflow-wrap: break-word; word-wrap: break-word;">{{old('str_company_name') ?? ''}}</textarea>
            </div>
            <div class="egov-tool-field-origin" style="left: 211px; top: 261px;">
                <textarea class="egov-tool-field-rect str_representative_name" id="str_representative_name" maxlength="25" name="str_representative_name" required="required" style="width: 372px; height: 26px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color: #ddeeff; overflow-wrap: break-word; word-wrap: break-word;">{{old('str_representative_name') ?? ''}}</textarea>
            </div>
            <div class="egov-tool-field-origin" style="left: 211px; top: 289px;">
                <input class="egov-tool-field-rect tel_area_code" id="tel_area_code" maxlength="5" name="tel_area_code" required="required" autocomplete=”off” style="width: 94px; height: 25px; font-size: 12px; text-align: center; line-height: 25px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('tel_area_code')}}" />
            </div>
            <div class="egov-tool-field-origin" style="left: 315px; top: 289px;">
                <input class="egov-tool-field-rect tel_city_code" id="tel_city_code" maxlength="4" name="tel_city_code" required="required" autocomplete=”off” style="width: 93px; height: 25px; font-size: 12px; text-align: center; line-height: 25px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('tel_city_code')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 432px; top: 289px;">
                <input class="egov-tool-field-rect tel_subscriber_code" id="tel_subscriber_code" maxlength="5" name="tel_subscriber_code" autocomplete=”off” required="required" style="width: 95px; height: 25px; font-size: 12px; text-align: center; line-height: 25px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('tel_subscriber_code')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 335px; top: 358px;">
                <textarea class="egov-tool-field-rect labor_and_social_security_attorney_name" id="labor_and_social_security_attorney_name" maxlength="40" name="labor_and_social_security_attorney_name" style="width: 429px; height: 47px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color: #ddeeff; overflow-wrap: break-word; word-wrap: break-word;">{{old('labor_and_social_security_attorney_name') ?? ''}}</textarea>
            </div>
            <div class="egov-tool-field-origin" style="left: 166px; top: 418px;">
                <input class="egov-tool-field-rect insurer_reference_num" id="insurer_reference_num" name="insurer_reference_num" maxlength="6" required="required" autocomplete=”off” style="width: 183px; height: 33px; font-size: 12px; text-align: right; line-height: 33px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('insurer_reference_num')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 513px; top: 419px;">
                <input class="egov-tool-field-rect emp_mynumber_or_pension_num" id="emp_mynumber_or_pension_num" maxlength="12" name="emp_mynumber_or_pension_num" autocomplete=”off” style="width: 251px; height: 31px; font-size: 12px; text-align: left; line-height: 31px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('emp_mynumber_or_pension_num')}}" />
            </div>
            <div class="egov-tool-field-origin" style="left: 211px; top: 455px;">
                <textarea class="egov-tool-field-rect employee_name_kana" id="employee_name_kana" maxlength="25" name="employee_name_kana" style="width: 172px; height: 26px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color: #ddeeff; overflow-wrap: break-word; word-wrap: break-word;">{{old('employee_name_kana')}}</textarea>
            </div>
            <div class="egov-tool-field-origin" style="left: 166px; top: 486px;">
                <textarea class="egov-tool-field-rect employee_name_kanji" id="employee_name_kanji" maxlength="12" name="employee_name_kanji" required="required" style="width: 217px; height: 25px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color: #ddeeff; overflow-wrap: break-word; word-wrap: break-word;">{{old('employee_name_kanji')}}</textarea>
            </div>
            <div class="egov-tool-field-origin" style="left: 479px; top: 456px;">
                <select class="egov-tool-field-rect employee_birth_era" id="employee_birth_era" name="employee_birth_era" required="required" style="width: 66px; height: 55px; font-size: 12px; text-align: left; line-height: 55px; padding: inherit; background-color: #ddeeff;">
                    <option value="5" {{old('employee_birth_era') == 5 ? 'selected' : ''}}>昭和</option>
                    <option value="7" {{old('employee_birth_era') == 7 ? 'selected' : ''}}>平成</option>
                    <option value="9" {{old('employee_birth_era') == 9 ? 'selected' : ''}}>令和</option>
                </select>
            </div>
            <div class="egov-tool-field-origin" style="left: 550px; top: 468px;">
                <input class="egov-tool-field-rect employee_birth_year" id="employee_birth_year" name="employee_birth_year" maxlength="2" required="required" autocomplete=”off” style="width: 33px; height: 43px; font-size: 12px; text-align: center; line-height: 43px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('employee_birth_year')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 589px; top: 468px;">
                <input class="egov-tool-field-rect employee_birth_month" id="employee_birth_month" name="employee_birth_month" maxlength="2" required="required" autocomplete=”off” style="width: 33px; height: 43px; font-size: 12px; text-align: center; line-height: 43px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('employee_birth_month')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 626px; top: 468px;">
                <input class="egov-tool-field-rect employee_birth_day" id="employee_birth_day" name="employee_birth_day" maxlength="2" required="required" autocomplete=”off” style="width: 33px; height: 43px; font-size: 12px; text-align: center; line-height: 43px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('employee_birth_day')}}"/>
            </div>
            <span class="egov-tool-field-origin egovuiForm-radio-wrapper" style="position: absolute; left: 728px; top: 466.5px; background-color: #ddeeff;">
                <input checked="" id="employee_sex_man" name="employee_sex" required="required" type="radio" style="position: absolute; left: 1.5px; top: 1.5px; box-sizing:border-box;" value="1" {{ old('employee_sex') == '1' ? 'checked' : '' }}/>
                <label class="egovuiForm-label" for="employee_sex_man" style="font-size: 12px;"></label>
            </span>
            <span class="egov-tool-field-origin egovuiForm-radio-wrapper" style="position: absolute; left: 728px; top: 486px; background-color: #ddeeff;">
                <input id="employee_sex_woman" name="employee_sex" required="required" type="radio" style="position: absolute; left: 1.5px; top: 1.5px; box-sizing:border-box;" value="2" {{ old('employee_sex') == '2' ? 'checked' : '' }}/>
                <label class="egovuiForm-label" for="employee_sex_woman" style="font-size: 12px;"></label>
            </span>
            <div class="egov-tool-field-origin" style="left: 210px; top: 516px;">
                <textarea class="egov-tool-field-rect child_name_kana" id="child_name_kana" maxlength="25" name="child_name_kana" style="width: 172px; height: 26px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color: #ddeeff; overflow-wrap: break-word; word-wrap: break-word;">{{old('child_name_kana')}}</textarea>
            </div>
            <div class="egov-tool-field-origin" style="left: 166px; top: 547px;">
                <textarea class="egov-tool-field-rect child_name_kanji" id="child_name_kanji" maxlength="12" name="child_name_kanji" style="width: 217px; height: 25px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color: #ddeeff; overflow-wrap: break-word; word-wrap: break-word;">{{old('child_name_kanji')}}</textarea>
            </div>
            <div class="egov-tool-field-origin" style="left: 479px; top: 517px;">
                <select class="egov-tool-field-rect child_birth_era" id="child_birth_era" name="child_birth_era" required="required" style="width: 66px; height: 55px; font-size: 12px; text-align: left; line-height: 55px; padding: inherit; background-color: #ddeeff;">
                    <option value="7" {{old('child_birth_era') == '7' ? 'selected' : ''}}>平成</option>
                    <option value="9" {{old('child_birth_era') == '9' ? 'selected' : ''}}>令和</option>
                </select>
            </div>
            <div class="egov-tool-field-origin" style="left: 551px; top: 529px;">
                <input class="egov-tool-field-rect child_birth_year" id="child_birth_year" name="child_birth_year" maxlength="2" required="required" autocomplete=”off” style="width: 33px; height: 43px; font-size: 12px; text-align: center; line-height: 43px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('child_birth_year')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 589px; top: 529px;">
                <input class="egov-tool-field-rect child_birth_month" id="child_birth_month" name="child_birth_month" maxlength="2" required="required" autocomplete=”off” style="width: 33px; height: 43px; font-size: 12px; text-align: center; line-height: 43px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('child_birth_month')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 627px; top: 529px;">
                <input class="egov-tool-field-rect child_birth_day" id="child_birth_day" name="child_birth_day" maxlength="2" required="required" autocomplete=”off” style="width: 33px; height: 43px; font-size: 12px; text-align: center; line-height: 43px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('child_birth_day')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 336px; top: 577px;">
                <input class="egov-tool-field-rect child_mynumber_or_pension_num" id="child_mynumber_or_pension_num" maxlength="12" name="child_mynumber_or_pension_num" autocomplete=”off” style="width: 209px; height: 51px; font-size: 12px; text-align: left; line-height: 51px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('child_mynumber_or_pension_num')}}"/>
            </div>
            <span class="egov-tool-field-origin egovuiForm-checkbox-wrapper" style="left: 670px; top: 593px; background-color: #ddeeff;">
                <input id="relationship_comfirm_0" name="relationship_comfirm" type="checkbox" style="position: absolute; left: 2.5px; top: 2.5px;" value="確認済" {{old('relationship_comfirm') ? 'checked' : ''}} />
                <label class="egovuiForm-label" for="relationship_comfirm_0" style="font-size: 12px;"></label>
            </span>
            <div class="egov-tool-field-origin" style="left: 441px; top: 635px;">
                <select class="egov-tool-field-rect applied_confirm" id="applied_confirm" name="applied_confirm" style="width: 323px; height: 42px; font-size: 12px; text-align: left; line-height: 42px; padding: inherit; background-color: #ddeeff;">
                    <option selected="" value="はい" {{old('applied_confirm') == 'はい' ? 'selected' : ''}}>はい</option>
                    <option value="いいえ" {{old('applied_confirm') == 'いいえ' ? 'selected' : ''}}>いいえ</option>
                </select>
            </div>
            <span class="egov-tool-field-origin egovuiForm-radio-wrapper" style="position: absolute; left: 449px; top: 699px; background-color: #ddeeff;">
                <input checked="" id="branch_confirm_0" name="branch_confirm" required="required" type="radio" style="position: relaltive; left: 1.7px; top: 1.7px;" value="有" {{old('branch_confirm') == '有' ? 'checked' : ''}}/>
                <label class="egovuiForm-label" for="branch_confirm_0" style="font-size: 12px;"></label>
            </span>
            <span class="egov-tool-field-origin egovuiForm-radio-wrapper" style="position: absolute; left: 537px; top: 699px; background-color: #ddeeff;">
                <input id="branch_confirm_1" name="branch_confirm" required="required" type="radio" style="position: relaltive; left: 1.7px; top: 1.7px;" value="無" {{old('branch_confirm') == '無' ? 'checked' : ''}}/>
                <label class="egovuiForm-label" for="branch_confirm_1" style="font-size: 12px;"></label>
            </span>
            <div class="egov-tool-field-origin" style="left: 336px; top: 731px;">
                <input class="egov-tool-field-rect branch_postcode_parent" id="branch_postcode_parent" maxlength="3" name="branch_postcode_parent" autocomplete=”off” style="width: 53px; height: 19px; font-size: 12px; text-align: center; line-height: 19px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('branch_postcode_parent')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 408px; top: 731px;">
                <input class="egov-tool-field-rect branch_postcode_child" id="branch_postcode_child" maxlength="4" name="branch_postcode_child" autocomplete=”off” style="width: 79px; height: 19px; font-size: 12px; text-align: center; line-height: 19px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('branch_postcode_child')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 320px; top: 751px;">
                <textarea class="egov-tool-field-rect branch_address" id="branch_address" maxlength="75" name="branch_address" style="width: 444px; height: 24px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color: #ddeeff; overflow-wrap: break-word; word-wrap: break-word;">{{old('branch_address')}}</textarea>
            </div>
            <div class="egov-tool-field-origin" style="left: 320px; top: 781px;">
                <textarea class="egov-tool-field-rect branch_name" id="branch_name" maxlength="50" name="branch_name" style="width: 444px; height: 33px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color: #ddeeff; overflow-wrap: break-word; word-wrap: break-word;">{{old('branch_name')}}</textarea>
            </div>
            <div class="egov-tool-field-origin" style="left: 196px; top: 845px;">
                <select class="egov-tool-field-rect" id="childcare_start_era" name="childcare_start_era" style="width: 70px; height: 44px; font-size: 12px; text-align: left; line-height: 44px; padding: inherit; background-color: #ddeeff;">
                    <option value=""></option>
                    <option value="7" {{old('childcare_start_era') == '7' ? 'selected' : ''}}>平成</option>
                    <option value="9" {{old('childcare_start_era') == '9' ? 'selected' : ''}}>令和</option>
                </select>
            </div>
            <div class="egov-tool-field-origin" style="left: 271px; top: 858px;">
                <input class="egov-tool-field-rect childcare_start_year" id="childcare_start_year" name="childcare_start_year" maxlength="2" autocomplete=”off” style="width: 33px; height: 31px; font-size: 12px; text-align: center; line-height: 31px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('childcare_start_year')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 309px; top: 858px;">
                <input class="egov-tool-field-rect childcare_start_month" id="childcare_start_month" name="childcare_start_month" maxlength="2" autocomplete=”off” style="width: 33px; height: 31px; font-size: 12px; text-align: center; line-height: 31px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('childcare_start_month')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 347px; top: 858px;">
                <input class="egov-tool-field-rect childcare_start_day" id="childcare_start_day" name="childcare_start_day" maxlength="2" autocomplete=”off” style="width: 33px; height: 31px; font-size: 12px; text-align: center; line-height: 31px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('childcare_start_day')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 487px; top: 845px;">
                <select class="egov-tool-field-rect" id="aply_childcare_exception_start_era" name="aply_childcare_exception_start_era" style="width: 70px; height: 44px; font-size: 12px; text-align: left; line-height: 44px; padding: inherit; background-color: #ddeeff;">
                    <option value=""></option>
                    <option value="7" {{old('aply_childcare_exception_start_era') == '7' ? 'selected' : ''}}>平成</option>
                    <option value="9" {{old('aply_childcare_exception_start_era') == '9' ? 'selected' : ''}}>令和</option>
                </select>
            </div>
            <div class="egov-tool-field-origin" style="left: 562px; top: 858px;">
                <input class="egov-tool-field-rect aply_childcare_exception_start_year" id="aply_childcare_exception_start_year" name="aply_childcare_exception_start_year" maxlength="2" autocomplete=”off” style="width: 33px; height: 31px; font-size: 12px; text-align: center; line-height: 31px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('aply_childcare_exception_start_year')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 600px; top: 858px;">
                <input class="egov-tool-field-rect aply_childcare_exception_start_month" id="aply_childcare_exception_start_month" name="aply_childcare_exception_start_month" maxlength="2" autocomplete=”off” style="width: 33px; height: 31px; font-size: 12px; text-align: center; line-height: 31px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('aply_childcare_exception_start_month')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 638px; top: 858px;">
                <input class="egov-tool-field-rect  aply_childcare_exception_start_day" id="aply_childcare_exception_start_day" name="aply_childcare_exception_start_day" maxlength="2" autocomplete=”off” style="width: 33px; height: 31px; font-size: 12px; text-align: center; line-height: 31px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('aply_childcare_exception_start_day')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 195px; top: 894px;">
                <textarea class="egov-tool-field-rect" id="apply_note" maxlength="117" name="apply_note" style="width: 569px; height: 44px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color: #ddeeff; overflow-wrap: break-word; word-wrap: break-word;">{{old('apply_note')}}</textarea>
            </div>
            <div class="egov-tool-field-origin" style="left: 195px; top: 970px;">
                <select class="egov-tool-field-rect" id="end_childcare_exception_start_era" name="end_childcare_exception_start_era" style="width: 70px; height: 44px; font-size: 12px; text-align: left; line-height: 44px; padding: inherit; background-color: #ddeeff;">
                    <option value=""></option>
                        <option value="7" {{old('end_childcare_exception_start_era') ==  '7' ? 'selected' : ''}}>平成</option>
                        <option value="9" {{old('end_childcare_exception_start_era') ==  '9' ? 'selected' : ''}}>令和</option>
                </select>
            </div>
            <div class="egov-tool-field-origin" style="left: 271px; top: 983px;">
                <input class="egov-tool-field-rect end_childcare_exception_start_year" id="end_childcare_exception_start_year" name="end_childcare_exception_start_year" maxlength="2" autocomplete=”off” style="width: 33px; height: 31px; font-size: 12px; text-align: center; line-height: 31px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('end_childcare_exception_start_year')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 309px; top: 983px;">
                <input class="egov-tool-field-rect end_childcare_exception_start_month" id="end_childcare_exception_start_month" name="end_childcare_exception_start_month" maxlength="2" autocomplete=”off” style="width: 33px; height: 31px; font-size: 12px; text-align: center; line-height: 31px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('end_childcare_exception_start_month')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 348px; top: 983px;">
                <input class="egov-tool-field-rect end_childcare_exception_start_day" id="end_childcare_exception_start_day" name="end_childcare_exception_start_day" maxlength="2" autocomplete=”off” style="width: 33px; height: 31px; font-size: 12px; text-align: center; line-height: 31px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('end_childcare_exception_start_day')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 487px; top: 970px;">
                <select class="egov-tool-field-rect" id="childcare_exception_end_era" name="childcare_exception_end_era" style="width: 70px; height: 44px; font-size: 12px; text-align: left; line-height: 44px; padding: inherit; background-color: #ddeeff;">
                    <option value=""></option>
                    <option value="7" {{old('childcare_exception_end_era') == '7' ? 'selected' : ''}}>平成</option>
                    <option value="9" {{old('childcare_exception_end_era') == '9' ? 'selected' : ''}}>令和</option>
                </select>
            </div>
            <div class="egov-tool-field-origin" style="left: 562px; top: 983px;">
                <input class="egov-tool-field-rect childcare_exception_end_year" id="childcare_exception_end_year" name="childcare_exception_end_year" maxlength="2" autocomplete=”off” style="width: 33px; height: 31px; font-size: 12px; text-align: center; line-height: 31px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('childcare_exception_end_year')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 600px; top: 983px;">
                <input class="egov-tool-field-rect childcare_exception_end_month" id="childcare_exception_end_month" name="childcare_exception_end_month" maxlength="2" autocomplete=”off” style="width: 33px; height: 31px; font-size: 12px; text-align: center; line-height: 31px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('childcare_exception_end_month')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 638px; top: 983px;">
                <input class="egov-tool-field-rect childcare_exception_end_day" id="childcare_exception_end_day" name="childcare_exception_end_day" maxlength="2" autocomplete=”off” style="width: 33px; height: 31px; font-size: 12px; text-align: center; line-height: 31px; padding: inherit; background-color: #ddeeff;" type="text" value="{{old('childcare_exception_end_day')}}"/>
            </div>
            <div class="egov-tool-field-origin" style="left: 195px; top: 1019px;">
                <textarea class="egov-tool-field-rect" id="end_note" maxlength="117" name="end_note" style="width: 569px; height: 44px; font-size: 12px; text-align: left; line-height: 12px; padding: 3px; background-color: #ddeeff; overflow-wrap: break-word; word-wrap: break-word;">{{old('end_note')}}</textarea>
            </div>
            <img alt="法令様式画像" src="{{ $dataUri }}"/>
        </div>
    </form>
    <script>
        function addRangeValidation(inputClass, maxlength, minValue = false, maxValue = false) {
            function toHalfWidth(str) {
                return str.replace(/[０-９]/g, function(match) {
                    const halfWidthChar = String.fromCharCode(match.charCodeAt(0) - 65248);
                    return halfWidthChar;
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
                    value = toHalfWidth(value);
                    event.target.value = value;


                    if (maxValue !== false && minValue !== false) {
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
        addRangeValidation("submission_year", 2, 1, 99);
        addRangeValidation("submission_month", 2, 1, 12);
        addRangeValidation("submission_day", 2, 1, 31);
        addRangeValidation("office_reference_code_prefecture", 2);
        addRangeValidation("pension_office_number", 5);
        addRangeValidation("postcode_office_parent", 3);
        addRangeValidation("postcode_office_child", 4);
        addRangeValidation("tel_area_code", 5);
        addRangeValidation("tel_city_code", 4);
        addRangeValidation("tel_subscriber_code", 5);
        addRangeValidation("insurer_reference_num", 6);
        addRangeValidation("emp_mynumber_or_pension_num", 12);
        addRangeValidation("employee_birth_year", 2, 1, 99);
        addRangeValidation("employee_birth_month", 2, 1, 12);
        addRangeValidation("employee_birth_day", 2, 1, 31);
        addRangeValidation("child_birth_year", 2, 1, 99);
        addRangeValidation("child_birth_month", 2, 1, 12);
        addRangeValidation("child_birth_day", 2, 1, 31);
        addRangeValidation("child_mynumber_or_pension_num", 12);
        addRangeValidation("branch_postcode_parent", 3);
        addRangeValidation("branch_postcode_child", 4);
        addRangeValidation("childcare_start_year", 2, 1, 99);
        addRangeValidation("childcare_start_month", 2, 1, 12);
        addRangeValidation("childcare_start_day", 2, 1, 31);
        addRangeValidation("aply_childcare_exception_start_year", 2, 1, 99);
        addRangeValidation("aply_childcare_exception_start_month", 2, 1, 12);
        addRangeValidation("aply_childcare_exception_start_day", 2, 1, 31);
        addRangeValidation("end_childcare_exception_start_year", 2, 1, 99);
        addRangeValidation("end_childcare_exception_start_month", 2, 1, 12);
        addRangeValidation("end_childcare_exception_start_day", 2, 1, 31);
        addRangeValidation("childcare_exception_end_year", 2, 1, 99);
        addRangeValidation("childcare_exception_end_month", 2, 1, 12);
        addRangeValidation("childcare_exception_end_day", 2, 1, 31);
    </script>
</div>
