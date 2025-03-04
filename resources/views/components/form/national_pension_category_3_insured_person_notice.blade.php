<!-- 4950013521035000_1 -->
<!-- 国民年金第3号被保険者関係届 -->

<main role="main" class="national_pension_category_3_insured_person_notice" style="display: flex; justify-content: center;">
    <div class="input_area">
        <style>
            .input_area {
                margin-top: 3.2rem;
            }

            .input_area .npc3ipn_1_field_origin * {
                position: absolute;
                background-color: #ddeeff;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                padding: 0px;
                overflow: hidden;
                border: none;
                border-radius: 0px;
            }

            .npc3ipn_1_date_of_submission {
                width: 29px;
                height: 24px;
                top: 150px;
                font-size: 16px;
                text-align: center;
            }

            .npc3ipn_1_business_location_post_code {
                top: 183px;
                height: 22px;
                font-size: 14px;
                text-align: center;
            }

            .npc3ipn_1_branch_info {
                left: 148px;
                width: 356px;
                font-size: 16px;
                text-align: left;
                overflow-wrap: break-word;
                word-wrap: break-word;
            }

            .npc3ipn_1_branch_tel {
                top: 325px;
                height: 23px;
                font-size: 16px;
                text-align: center;   
            }

            .npc3ipn_1_date_of_receipt_by_employer_etc {
                font-size: 16px;
                text-align: center;
                line-height: 26px;
                top: 357px;
                height: 28px;
            }

            .npc3ipn_1_employee_fullname {
                font-size: 16px;
                text-align: left;
                left: 178px;
                width: 197px;
            }

            .npc3ipn_1_employee_birthday {
                top: 432px;
                width: 30px;
                height: 27px;
                font-size: 16px;
                text-align: center;
            }

            .npc3ipn_1_employee_address_post_code {
                font-size: 12px;
                top: 501px;
                height: 16px;
                text-align: center;
            }

            .npc3ipn_1_notification_date {
                font-size: 12px;
                top: 576px;
                height: 18px;
                width: 34px;
                text-align: center;
            }

            .npc3ipn_1_dependent_fullname {
                font-size: 16px;
                left: 178px;
                height: 27px;
                width: 186px;
                text-align: left;
            }

            .npc3ipn_1_delegate_to_partner {
                top: 663px;
                left: 340px;
                height: 18px;
                width: 18px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .npc3ipn_1_dependent_birthday {
                top: 588px;
                width: 30px;
                height: 28px;
                font-size: 16px;
                text-align: center;
            }

            .npc3ipn_1_dependent_foreign_nationality {
                font-size: 16px;
                text-align: left;
                top: 648px;
                height: 40px;
            }

            .npc3ipn_1_dependent_post_code {
                font-size: 12px;
                top: 692px;
                height: 18px;
                text-align: center;
            }

            .npc3ipn_1_dependent_tell {
                font-size: 12px;
                top: 711px;
                height: 21px;
                text-align: center;
            }

            .npc3ipn_1_date_of_authorisation {
                font-size: 16px;
                top: 776px;
                height: 35px;
                width: 41px;
                text-align: center;
            }

            .npc3ipn_1_date_of_expiry {
                font-size: 16px;
                top: 870px;
                height: 35px;
                width: 41px;
                text-align: center;
            }

            .npc3ipn_1_date_of_death {
                font-size: 12px;
                top: 863px;
                height: 17px;
                width: 21px;
                text-align: center;
            }

            .npc3ipn_1_date_of_authorisation_of_special_overseas_requirements {
                font-size: 16px;
                top: 968px;
                height: 39px;
                width: 30px;
                text-align: center;
            }

            .npc3ipn_1_date_of_expiry_of_special_overseas_requirements {
                font-size: 16px;
                top: 1022px;
                height: 39px;
                width: 30px;
                text-align: center;
            }

            .npc3ipn_1_date_of_moving_into_japan {
                font-size: 12px;
                top: 1034px;
                height: 28px;
                width: 30px;
                text-align: center;
            }

            .field_other {
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                background-color: inherit;
                padding: 0px;
                overflow: hidden;
                border: none;
                position: absolute;
                border-radius: 0px;
            }

            .input_area img {
                margin: 0px !important;
                max-width: 762px;
                min-width: 762px;
            }
        </style>

        <div class="npc3ipn_1_field_origin">
            <input class="npc3ipn_1_date_of_submission year" id="A1_1" name="npc3ipn_1_submission_year"
                required="required"
                style="left:71px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{ old('npc3ipn_1_submission_year') }}"
            />
            <input class="npc3ipn_1_date_of_submission month" id="A1_2" name="npc3ipn_1_submission_month"
                required="required"
                style="left:115px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{ old('npc3ipn_1_submission_month') }}"
            />
            <input class="npc3ipn_1_date_of_submission day" id="A1_3" name="npc3ipn_1_submission_day"
                required="required"
                style="left:158px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_submission_day')}}"
            />
            <input class="npc3ipn_1_business_location_post_code number_3" id="A2_1" name="npc3ipn_1_post_code_former"
                required="required"
                style="left: 168px; width: 73px;"
                maxlength="3"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_post_code_former')}}"
            />
            <input class="npc3ipn_1_business_location_post_code number_4" id="A2_2" name="npc3ipn_1_post_code_latter"
                required="required"
                style="left: 256px; width: 85px;"
                maxlength="4"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_post_code_latter')}}"
            />
            <textarea class="npc3ipn_1_branch_info" id="A3_1" name="npc3ipn_1_branch_address"
                required="required"
                style="top: 208px; height: 44px;"
                type="text"
                maxlength="50" autocomplete="off"
            >{{old('npc3ipn_1_branch_address')}}</textarea>
            <input class="npc3ipn_1_branch_info" id="A3_2" name="npc3ipn_1_company_name"
                required="required"
                style="top: 254px; height: 36px; padding: inherit;"
                maxlength="25"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_company_name')}}"
            />
            <input class="npc3ipn_1_branch_info" id="A3_3" name="npc3ipn_1_business_owner_name"
                required="required"
                style="top: 292px; height: 29px;"
                maxlength="25"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_business_owner_name')}}"
            />
            <input class="npc3ipn_1_branch_tel number_5" id="A4_1" name="npc3ipn_1_branch_tel_area_code"
                required="required"
                style="left: 148px; width: 90px;"
                maxlength="5"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_branch_tel_area_code')}}"
            />
            <input class="npc3ipn_1_branch_tel number_4" id="A4_2" name="npc3ipn_1_branch_tel_city_code"
                required="required"
                style="left: 248px; width: 90px;"
                maxlength="4"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_branch_tel_city_code')}}"
            />
            <input class="npc3ipn_1_branch_tel number_5" id="A4_3" name="npc3ipn_1_branch_tel_subscriber_code"
                required="required"
                style="left: 360px; width: 90px;"
                maxlength="5"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_branch_tel_subscriber_code')}}"
            />
            <select class="npc3ipn_1_date_of_receipt_by_employer_etc" id="A5_1" name="npc3ipn_1_date_of_receipt_era"
                required="required"
                style="left: 148px; width: 52px;"
                maxlength="1">
                <option value="" {{old('npc3ipn_1_date_of_receipt_era') == '' ? 'selected' : ''}}></option>
                <option value="9" {{old('npc3ipn_1_date_of_receipt_era') == '9' ? 'selected' : ''}}> 令和 </option>
            </select>
            <input class="npc3ipn_1_date_of_receipt_by_employer_etc year" id="A5_2" name="npc3ipn_1_date_of_receipt_year"
                required="required"
                style="left: 201px; width: 52px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_receipt_year')}}"
            />
            <input class="npc3ipn_1_date_of_receipt_by_employer_etc month" id="A5_3" name="npc3ipn_1_date_of_receipt_month"
                required="required"
                style="left: 266px; width: 42px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_receipt_month')}}"
            />
            <input class="npc3ipn_1_date_of_receipt_by_employer_etc day" id="A5_4" name="npc3ipn_1_date_of_receipt_day"
                required="required"
                style="left: 319px; width: 40px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_receipt_day')}}"
            />
            <input id="A6_1" name="npc3ipn_1_labor_consultant_name"
                style="
                    font-size: 20px;
                    text-align: center;
                    line-height: 26px;
                    top: 340px;
                    left: 513px;
                    width: 247px;
                    height: 47px;"
                maxlength="40"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_labor_consultant_name')}}"
            />
            <input id="A6_2" name="npc3ipn_1_labor_and_social_security_attorney_registration_no"
                type="hidden" autocomplete="off" value="{{ old('npc3ipn_1_labor_and_social_security_attorney_registration_no') }}"
            />

            <input class="npc3ipn_1_employee_fullname" id="B1_1" name="npc3ipn_1_employee_fullname_kana"
                style="top: 420px; height: 25px;"
                maxlength="25"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_employee_fullname_kana')}}"
            />
            <input class="npc3ipn_1_employee_fullname" id="B1_2" name="npc3ipn_1_employee_fullname"
                style="top: 449px; height: 46px;"
                maxlength="12"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_employee_fullname')}}"
            />
            <select id="B2_1" name="npc3ipn_1_employee_birthday_era"
                style="top: 420px; left: 454px; width: 59px; height: 39px; font-size: 16px; text-align: center;"
                maxlength="1">
                <option value="5" {{old('npc3ipn_1_employee_birthday_era') == '5' ? 'selected' : ''}}> 昭和 </option> 
                <option value="7" {{old('npc3ipn_1_employee_birthday_era') == '7' ? 'selected' : ''}}> 平成 </option>
                <option value="9" {{old('npc3ipn_1_employee_birthday_era') == '9' ? 'selected' : ''}}> 令和 </option>
            </select>
            <input class="npc3ipn_1_employee_birthday year" id="B2_2" name="npc3ipn_1_employee_birthday_year"
                style="left: 515px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_employee_birthday_year')}}"
            />
            <input class="npc3ipn_1_employee_birthday month" id="B2_3" name="npc3ipn_1_employee_birthday_month"
                style="left: 548px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_employee_birthday_month')}}"
            />
            <input class="npc3ipn_1_employee_birthday day" id="B2_4" name="npc3ipn_1_employee_birthday_day"
                style="left: 581px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_employee_birthday_day')}}"
            />
            <SPAN style="top: 432px; height:18px; left: 668px; width: 18px; background-color: #ddeeff;"></SPAN>
            <input style="top: 432px; height:18px; left: 670px; width: 14px;"
                id="B3_1" name="npc3ipn_1_employee_sex"
                maxlength="1" type="radio" value="男"
                <?php echo (old('npc3ipn_1_employee_sex') == '1') ? 'checked' : ''; ?>
                <?php echo (old('npc3ipn_1_employee_sex') == '男') ? 'checked' : ''; ?>
            />
            <SPAN style="top: 432px; height:18px; left: 720px; width: 18px; background-color: #ddeeff;"></SPAN>
            <input style="top: 432px; height:18px; left: 722px; width: 14px;"
                id="B3_2" name="npc3ipn_1_employee_sex"
                maxlength="1" type="radio" value="女"
                <?php echo (old('npc3ipn_1_employee_sex') == '2') ? 'checked' : ''; ?>
                <?php echo (old('npc3ipn_1_employee_sex') == '女') ? 'checked' : ''; ?>
            />
            <input class="number_12" id="B4" name="npc3ipn_1_employee_my_number_or_basic_pension_number"
                style="
                    font-size: 16px;
                    text-align: left;
                    top: 463px;
                    left: 524px;
                    width: 235px;
                    height: 33px;"
                maxlength="12"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_employee_my_number_or_basic_pension_number')}}"
            />
            <input class="npc3ipn_1_employee_address_post_code number_3" id="B5_1" name="npc3ipn_1_employee_address_post_code_former"
                style="left: 152px; width: 74px;"
                maxlength="3"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_employee_address_post_code_former')}}"
            />
            <input class="npc3ipn_1_employee_address_post_code number_4" id="B5_2" name="npc3ipn_1_employee_address_post_code_latter"
                style="left: 238px; width: 76px;"
                maxlength="4"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_employee_address_post_code_latter')}}"
            />
            <textarea id="B6" name="npc3ipn_1_employee_address" type="text"
                    style="
                    top: 518px;
                    left: 136px;
                    height: 28px;
                    width: 624px;
                    font-size: 12px;
                    text-align: left;
                    overflow-wrap: break-word;
                    word-wrap: break-word;" autocomplete="off"
                maxlength="37">{{old('npc3ipn_1_employee_address')}}</textarea>

            <input class="npc3ipn_1_notification_date year" id="C1_1" name="npc3ipn_1_notification_date_year"
                style="left: 161px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_notification_date_year')}}"
            />
            <input class="npc3ipn_1_notification_date month" id="C1_2" name="npc3ipn_1_notification_date_month"
                style="left: 212px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_notification_date_month')}}"
            />
            <input class="npc3ipn_1_notification_date day" id="C1_3" name="npc3ipn_1_notification_date_day"
                style="left: 266px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_notification_date_day')}}"
            />
            <input class="npc3ipn_1_dependent_fullname" id="C2_1" name="npc3ipn_1_dependent_fullname_kana"
                style="top: 596px;"
                maxlength="25"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_dependent_fullname_kana')}}"
            />
            <input class="npc3ipn_1_dependent_fullname" id="C2_2" name="npc3ipn_1_dependent_fullname"
                style="top: 625px;"
                maxlength="12"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_dependent_fullname')}}"
            />
            <span style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; left:338px; top:660px; width:12px; line-height:21px; height:21px; font-size:21px; padding:0px 0px 0px 25px; background-color:#ddeeff;">
                <input id="C3" name="npc3ipn_1_delegate_to_employee" type="checkbox" value="有"
                    style="top:2px; left:4.5px; box-sizing:border-box; -moz-box-sizing:border-box; width:16px; height:16px;"
                    <?php echo old('npc3ipn_1_delegate_to_employee') == '有' ? 'checked' : ''; ?>
                >
            </span>
            <select id="C4_1" name="npc3ipn_1_dependent_birthday_era"
                style="top: 575px; left: 422px; width: 58px; height: 41px; font-size: 16px; text-align: center;"
                maxlength="1">
                <option value="5" {{old('npc3ipn_1_dependent_birthday_era') == '5' ? 'selected' : ''}} selected> 昭和 </option>
                <option value="7" {{old('npc3ipn_1_dependent_birthday_era') == '7' ? 'selected' : ''}}> 平成 </option>
                <option value="9" {{old('npc3ipn_1_dependent_birthday_era') == '9' ? 'selected' : ''}}> 令和 </option>
            </select>
            <input class="npc3ipn_1_dependent_birthday year" id="C4_2" name="npc3ipn_1_dependent_birthday_year"
                style="left:483px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_dependent_birthday_year')}}"
            />
            <input class="npc3ipn_1_dependent_birthday month" id="C4_3" name="npc3ipn_1_dependent_birthday_month"
                style="left:516px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_dependent_birthday_month')}}"
            />
            <input class="npc3ipn_1_dependent_birthday day" id="C4_4" name="npc3ipn_1_dependent_birthday_day"
                style="left:548px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_dependent_birthday_day')}}"
            />
            <SPAN style="top: 578px; height:18px; left: 628px; width: 18px; background-color: #ddeeff;"></SPAN>
            <input id="C5_1" name="npc3ipn_1_sex_relationship"
                style="
                    top: 580px;
                    left: 630px;
                    height: 14px;
                    width: 14px;"
                maxlength="1"
                type="radio" value="1"
                <?php echo (old('npc3ipn_1_sex_relationship') == '1') ? 'checked' : ''; ?>
            />
            <SPAN style="top: 598px; height:18px; left: 628px; width: 18px; background-color: #ddeeff;"></SPAN>
            <input id="C5_2" name="npc3ipn_1_sex_relationship"
                style="top: 600px; left: 630px; height: 14px; width: 14px;"
                maxlength="1" type="radio" value="2"
                <?php echo (old('npc3ipn_1_sex_relationship') == '2') ? 'checked' : ''; ?>
            />
            <SPAN style="top: 578px; height:18px; left: 686px; width: 18px; background-color: #ddeeff;"></SPAN>
            <input id="C5_3" name="npc3ipn_1_sex_relationship"
                style="top: 580px; left: 688px; height: 14px; width: 14px;"
                maxlength="1" type="radio" value="3"
                <?php echo (old('npc3ipn_1_sex_relationship') == '3') ? 'checked' : ''; ?>
            />
            <SPAN style="top: 598px; height:18px; left: 686px; width: 18px; background-color: #ddeeff;"></SPAN>
            <input id="C5_4" name="npc3ipn_1_sex_relationship"
                style="top: 600px; left: 688px; height: 14px; width: 14px;"
                maxlength="1" type="radio" value="4"
                <?php echo (old('npc3ipn_1_sex_relationship') == '4') ? 'checked' : ''; ?>
            />
            <input class="number_12" id="C6" name="npc3ipn_1_dependent_my_number_or_basic_pension_number"
                style="font-size: 16px; text-align: left; top: 619px; left: 516px; width: 244px; height: 25px;"
                maxlength="12" type="text" autocomplete="off" value="{{old('npc3ipn_1_dependent_my_number_or_basic_pension_number')}}"
            />
            <input class="npc3ipn_1_dependent_foreign_nationality" id="C7_1" name="npc3ipn_1_dependent_foreign_nationality"
                style="left: 429px; width: 84px;"
                maxlength="12"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_dependent_foreign_nationality')}}"
            />
            <input class="npc3ipn_1_dependent_foreign_nationality" id="C7_2" name="npc3ipn_1_dependent_foreigner_nickname"
                style="left: 581px; width: 178px;"
                maxlength="12"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_dependent_foreigner_nickname')}}"
            />
            <SPAN style="top: 692px; height:18px; left: 136px; width: 18px; background-color: #ddeeff;"></SPAN>
            <input id="C8_1" name="npc3ipn_1_living_together_or_separately"
                style="top: 693px; left: 138px; height: 16px; width: 14px;"
                maxlength="2" type="radio" value="同居"
                {{ old('npc3ipn_1_living_together_or_separately') == '同居' ? 'checked' : '' }}
            />
            <SPAN style="top: 713px; height:18px; left: 136px; width: 18px; background-color: #ddeeff;"></SPAN>
            <input id="C8_2" name="npc3ipn_1_living_together_or_separately"
                style="top: 715px; left: 138px; height: 16px; width: 14px;"
                maxlength="2" type="radio" value="別居"
                {{ old('npc3ipn_1_living_together_or_separately') == '別居' ? 'checked' : '' }}
            />
            <input class="npc3ipn_1_dependent_post_code number_3" id="C9_1" name="npc3ipn_1_dependent_post_code_former"
                style="left: 202px; width: 73px;"
                maxlength="3"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_dependent_post_code_former')}}"
            />
            <input class="npc3ipn_1_dependent_post_code number_4" id="C9_2" name="npc3ipn_1_dependent_post_code_latter"
                style="left: 290px; width: 73px;"
                maxlength="4"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_dependent_post_code_latter')}}"
            />
            <textarea id="C10" name="npc3ipn_1_dependent_address" type="text" autocomplete="off"
                style="font-size: 10px; top: 711px; left: 202px; height: 21px; width: 249px; text-align: left;"
                maxlength="37">{{old('npc3ipn_1_dependent_address')}}</textarea>
            <select id="C25" name="npc3ipn_1_dependent_tell_number_type"
                style="top: 691px; left: 505px; width: 255px; height: 19px; font-size: 15px; text-align: left;" maxlength="3">
                <option value="" {{old('npc3ipn_1_dependent_tell_number_type') == '' ? 'selected' : ''}}></option>
                <option value="自宅" {{old('npc3ipn_1_dependent_tell_number_type') == '自宅' ? 'selected' : ''}}> 自宅 </option> 
                <option value="携帯" {{old('npc3ipn_1_dependent_tell_number_type') == '携帯' ? 'selected' : ''}}> 携帯 </option>
                <option value="勤務先" {{old('npc3ipn_1_dependent_tell_number_type') == '勤務先' ? 'selected' : ''}}> 勤務先 </option>
                <option value="その他" {{old('npc3ipn_1_dependent_tell_number_type') == 'その他' ? 'selected' : ''}}> その他 </option>
            </select>
            <input class="npc3ipn_1_dependent_tell number_5" id="C11_1" name="npc3ipn_1_dependent_tell_area_code"
                style="left: 506px; width: 70px;"
                maxlength="5"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_dependent_tell_area_code')}}"
            />
            <input class="npc3ipn_1_dependent_tell number_4" id="C11_2" name="npc3ipn_1_dependent_tell_city_code"
                style="left: 585px; width: 77px;"
                maxlength="4"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_dependent_tell_city_code')}}"
            />
            <input class="npc3ipn_1_dependent_tell number_5" id="C11_3" name="npc3ipn_1_dependent_tell_subscriber_code"
                style="left: 670px; width: 80px;"
                maxlength="5"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_dependent_tell_subscriber_code')}}"
            />
            <select id="C12" name="npc3ipn_1_applicable_or_not_applicable"
                style="font-size: 14px; top: 735px; left: 178px; width: 208px; height: 22px; text-align: left;"
                maxlength="3">
                <option value="" {{old('npc3ipn_1_applicable_or_not_applicable') == '' ? 'selected' : ''}}></option>
                <option value="該当" {{old('npc3ipn_1_applicable_or_not_applicable') == '該当' ? 'selected' : ''}}> 該当 </option>
                <option value="非該当" {{old('npc3ipn_1_applicable_or_not_applicable') == '非該当' ? 'selected' : ''}}> 非該当 </option>
            </select>
            <select id="C13_1" name="npc3ipn_1_date_of_authorisation_era"
                style="top: 760px; left: 178px; width: 78px; height: 52px; font-size: 16px; text-align: center;"
                maxlength="1">
                <option value="7" {{old('npc3ipn_1_date_of_authorisation_era') == '7' ? 'selected' : ''}}> 平成 </option>
                <option value="9" {{old('npc3ipn_1_date_of_authorisation_era') == '9' ? 'selected' : ''}}> 令和 </option>
                <option value="" {{old('npc3ipn_1_date_of_authorisation_era') == '' ? 'selected' : ''}}></option>
            </select>
            <input class="npc3ipn_1_date_of_authorisation year" id="C13_2" name="npc3ipn_1_date_of_authorisation_year"
                style="left: 258px;" maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_authorisation_year')}}"
            />
            <input class="npc3ipn_1_date_of_authorisation month" id="C13_3" name="npc3ipn_1_date_of_authorisation_month"
                style="left: 302px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_authorisation_month')}}"
            />
            <input class="npc3ipn_1_date_of_authorisation day" id="C13_4" name="npc3ipn_1_date_of_authorisation_day"
                style="left: 345px;" maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_authorisation_day')}}"
            />
            <select id="C14" name="npc3ipn_1_dependent_enrollment_system"
                style="top: 815px; left: 178px; width: 208px; height: 36px; font-size: 12px;"
                maxlength="2">
                <option value="" {{old('npc3ipn_1_dependent_enrollment_system') == '' ? 'selected' : ''}}></option>
                <option value="31" {{old('npc3ipn_1_dependent_enrollment_system') == '31' ? 'selected' : ''}}> 厚生年金保険・健康保険 </option>
                <option value="32" {{old('npc3ipn_1_dependent_enrollment_system') == '36' ? 'selected' : ''}}> 国家公務員共済組合 </option>
                <option value="36" {{old('npc3ipn_1_dependent_enrollment_system') == '30' ? 'selected' : ''}}> 地方公務員等共済組合 </option>
                <option value="37" {{old('npc3ipn_1_dependent_enrollment_system') == '32' ? 'selected' : ''}}> 日本私立学校振興・共済事業団 </option>
                <option value="30" {{old('npc3ipn_1_dependent_enrollment_system') == '37' ? 'selected' : ''}}> 厚生年金保険・船員保険 </option>
            </select>
            <select id="C15_1" name="npc3ipn_1_date_of_expiry_era"
                style="top: 854px; left: 178px; width: 78px; height: 52px; font-size: 16px; text-align: center;"
                maxlength="1">
                <option value="7" {{old('npc3ipn_1_date_of_expiry_era') == '7' ? 'selected' : ''}}> 平成 </option>
                <option value="9" {{old('npc3ipn_1_date_of_expiry_era') == '9' ? 'selected' : ''}}> 令和 </option>
                <option value="" {{old('npc3ipn_1_date_of_expiry_era') == '' ? 'selected' : ''}}></option>
            </select>
            <input class="npc3ipn_1_date_of_expiry year" id="C15_2" name="npc3ipn_1_date_of_expiry_year"
                style="left: 258px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_expiry_year')}}"
            />
            <input class="npc3ipn_1_date_of_expiry month" id="C15_3" name="npc3ipn_1_date_of_expiry_month"
                style="left: 302px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_expiry_month')}}"
            />
            <input class="npc3ipn_1_date_of_expiry day" id="C15_4" name="npc3ipn_1_date_of_expiry_day"
                style="left: 345px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_expiry_day')}}"
            />
            <select id="C16" name="npc3ipn_1_reason_for_cancellation"
                style="top: 780px; left: 423px; width: 161px; height: 40px; font-size: 16px; text-align: left;"
                maxlength="5">
                <option value="" {{old('npc3ipn_1_reason_for_cancellation') == '' ? 'selected' : ''}}></option>
                <option value="配偶者就職" {{old('npc3ipn_1_reason_for_cancellation') == '配偶者就職' ? 'selected' : ''}}> 配偶者の就職 </option>
                <option value="婚姻" {{old('npc3ipn_1_reason_for_cancellation') == '婚姻' ? 'selected' : ''}}> 婚姻 </option>
                <option value="離職" {{old('npc3ipn_1_reason_for_cancellation') == '離職' ? 'selected' : ''}}> 離職 </option>
                <option value="収入減少" {{old('npc3ipn_1_reason_for_cancellation') == '収入減少' ? 'selected' : ''}}> 収入減少 </option>
                <option value="死亡" {{old('npc3ipn_1_reason_for_cancellation') == '死亡' ? 'selected' : ''}}> 死亡 </option>
                <option value="離婚" {{old('npc3ipn_1_reason_for_cancellation') == '離婚' ? 'selected' : ''}}> 離婚 </option>
                <option value="収入増加" {{old('npc3ipn_1_reason_for_cancellation') == '収入増加' ? 'selected' : ''}}> 収入増加 </option>
                <option value="その他" {{old('npc3ipn_1_reason_for_cancellation') == 'その他' ? 'selected' : ''}}> その他 </option>
            </select>
            <input class="npc3ipn_1_date_of_death year" id="C17_1" name="npc3ipn_1_date_of_death_year"
                style="left: 463px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_death_year')}}"
            />
            <input class="npc3ipn_1_date_of_death month" id="C17_2" name="npc3ipn_1_date_of_death_month"
                style="left: 496px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_death_month')}}"
            />
            <input class="npc3ipn_1_date_of_death day" id="C17_3" name="npc3ipn_1_date_of_death_day"
                style="left: 528px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_death_day')}}"
            />
            <input id="C18" name="npc3ipn_1_other_input_fields"
                style="top: 906px; left: 441px; height: 18px; width: 103px;"
                maxlength="8"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_other_input_fields')}}"
            />
            <textarea id="C19" name="npc3ipn_1_remark" type="text" autocomplete="off"
                style="top: 735px; left: 614px; height: 218px; width: 146px;
                    text-align: left; overflow-wrap: break-word; word-wrap: break-word;"
                maxlength="39">{{old('npc3ipn_1_remark')}}</textarea>
            <select id="C20" name="npc3ipn_1_overseas_special_requirements_category"
                style="top: 984px; left: 70px; width: 167px; height: 30px; font-size: 16px; text-align: left;"
                maxlength="1">
                <option value="" {{old('npc3ipn_1_overseas_special_requirements_category') == '' ? 'selected' : ''}}></option> 
                <option value="1" {{old('npc3ipn_1_overseas_special_requirements_category') == '1' ? 'selected' : ''}}> 海外特例要件該当 </option> 
                <option value="2" {{old('npc3ipn_1_overseas_special_requirements_category') == '2' ? 'selected' : ''}}> 海外特例要件非該当 </option>
            </select>
            <SPAN style="top: 1013px; left: 69px; width: 169px; height: 20px; background-color: #ffffff;
                    border-top: 1px solid #2f323e; border-bottom: 1px solid #2f323e;">
                <p style="margin-left: 40px; margin-top: 0.5px; font-size: 14px; line-height: 20px; background-color: #ffffff;">
                    国内転入年月日
                </p>
            </SPAN>
            <SPAN class="npc3ipn_1_date_of_moving_into_japan" 
                style="left: 75px; width: 60px; background-color: #ffffff;">
                <p style="margin-top: 4px; font-size: 12px; line-height: 20px; background-color: #ffffff;">
                    令和
                </p>
            </SPAN>
            <input class="npc3ipn_1_date_of_moving_into_japan year" id="C25_2" name="npc3ipn_1_date_of_moving_into_japan_year"
                style="left: 100px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_moving_into_japan_year')}}"
            />
            <SPAN class="npc3ipn_1_date_of_moving_into_japan" 
                style="left: 130px; width: 20px; background-color: #ffffff;">
                <p style="margin-left: 1px; margin-top: 3px; font-size: 12px; line-height: 20px; background-color: #ffffff;">
                    年
                </p>
            </SPAN>
            <input class="npc3ipn_1_date_of_moving_into_japan month" id="C25_3" name="npc3ipn_1_date_of_moving_into_japan_month"
                style="left: 144px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_moving_into_japan_month')}}"
            />
            <SPAN class="npc3ipn_1_date_of_moving_into_japan" 
                style="left: 175px; width: 20px; background-color: #ffffff;">
                <p style="margin-left: 1px; margin-top: 3px; font-size: 12px; line-height: 20px; background-color: #ffffff;">
                    月
                </p>
            </SPAN>
            <input class="npc3ipn_1_date_of_moving_into_japan day" id="C25_4" name="npc3ipn_1_date_of_moving_into_japan_day"
                style="left: 190px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_moving_into_japan_day')}}"
            />
            <SPAN class="npc3ipn_1_date_of_moving_into_japan" 
                style="left: 224px; width: 12px; background-color: #ffffff;">
                <p style="margin-top: 3px; font-size: 12px; line-height: 20px; background-color: #ffffff;">
                    日
                </p>
            </SPAN>
            <select id="C21_1" name="npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_era"
                style="top: 955px; left: 349px; width: 59px; height: 52px; font-size: 16px; text-align: center;"
                maxlength="1">
                <option value="" selected=""  {{old('npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_era') == '' ? 'selected' : ''}}></option> 
                <option value="9" {{old('npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_era') == '9' ? 'selected' : ''}}> 令和 </option>
            </select>
            <input class="npc3ipn_1_date_of_authorisation_of_special_overseas_requirements year" id="C21_2" name="npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_year"
                style="left: 411px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_year')}}"
            />
            <input class="npc3ipn_1_date_of_authorisation_of_special_overseas_requirements month" id="C21_3" name="npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_month"
                style="left: 443.5px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_month')}}"
            />
            <input class="npc3ipn_1_date_of_authorisation_of_special_overseas_requirements day" id="C21_4" name="npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_day"
                style="left: 476px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_day')}}"
            />
            <select id="C22_1" name="npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason"
                style="top: 955px; left: 545px; width: 215px; height: 34px; font-size: 14px; text-align: left;"
                maxlength="1">
                <option value="" {{old('npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason') == '' ? 'selected' : ''}}></option> 
                <option value="1" {{old('npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason') == '1' ? 'selected' : ''}}> 留学 </option> 
                <option value="2" {{old('npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason') == '2' ? 'selected' : ''}}> 同行家族 </option>
                <option value="3" {{old('npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason') == '3' ? 'selected' : ''}}> 特定活動 </option>
                <option value="4" {{old('npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason') == '4' ? 'selected' : ''}}> 海外婚姻 </option>
                <option value="5" {{old('npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason') == '5' ? 'selected' : ''}}> その他 </option>
            </select>
            <input id="C22_2" name="npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason_other"
                style="top: 990px; left: 620px; height: 16px; width: 130px; font-size: 12px; text-align: left;"
                maxlength="11"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_authorisation_of_special_overseas_requirements_reason_other')}}"
            />
            <select id="C23_1" name="npc3ipn_1_date_of_expiry_of_special_overseas_requirements_era"
                style="top: 1010px; left: 349px; width: 59px; height: 52px; font-size: 16px; text-align: center;"
                maxlength="1">
                <option value="" selected="" {{old('npc3ipn_1_date_of_expiry_of_special_overseas_requirements_era') == '' ? 'selected' : ''}}></option>
                <option value="9" {{old('npc3ipn_1_date_of_expiry_of_special_overseas_requirements_era') == '9' ? 'selected' : ''}}> 令和 </option>
            </select>
            <input class="npc3ipn_1_date_of_expiry_of_special_overseas_requirements year" id="C23_2" name="npc3ipn_1_date_of_expiry_of_special_overseas_requirements_year"
                style="left: 411px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_expiry_of_special_overseas_requirements_year')}}"
            />
            <input class="npc3ipn_1_date_of_expiry_of_special_overseas_requirements month" id="C23_3" name="npc3ipn_1_date_of_expiry_of_special_overseas_requirements_month"
                style="left: 443.5px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_expiry_of_special_overseas_requirements_month')}}"
            />
            <input class="npc3ipn_1_date_of_expiry_of_special_overseas_requirements day" id="C23_4" name="npc3ipn_1_date_of_expiry_of_special_overseas_requirements_day"
                style="left: 476px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_expiry_of_special_overseas_requirements_day')}}"
            />
            <select id="C24_1" name="npc3ipn_1_date_of_expiry_of_special_overseas_requirements_reason"
                style="top: 1010px; left: 545px; width: 215px; height: 34px; font-size: 14px; text-align: left;"
                maxlength="1">
                <option value="" {{old('npc3ipn_1_date_of_expiry_of_special_overseas_requirements_reason') == '' ? 'selected' : ''}}></option>
                <option value="1" {{old('npc3ipn_1_date_of_expiry_of_special_overseas_requirements_reason') == '1' ? 'selected' : ''}}> 国内転入 </option>
                <option value="2" {{old('npc3ipn_1_date_of_expiry_of_special_overseas_requirements_reason') == '2' ? 'selected' : ''}}> その他 </option>
            </select>
            <input id="C24_2" name="npc3ipn_1_date_of_expiry_of_special_overseas_requirements_reason_other"
                style="top: 1045px; left: 620px; height: 16px; width: 130px; font-size: 12px; text-align: left;"
                maxlength="11"
                type="text" autocomplete="off" value="{{old('npc3ipn_1_date_of_expiry_of_special_overseas_requirements_reason_other')}}"
            />

            <script>
                function addRangeValidation(inputClass, maxlength, minValue=false, maxValue=false) {          
                    function toHalfWidth(str) {
                        return str.replace(/[０-９]/g, 
                            function (match) {
                                const halfWidthChar = String.fromCharCode(match.charCodeAt(0) - 65248);
                                return halfWidthChar;  // 半角
                            }
                        );
                    }  
                    let inputs = document.querySelectorAll('.' + inputClass);
                    inputs.forEach(
                        function(input) {
                            input.addEventListener(
                                "input", function(event) {
                                    let value = event.target.value;
                                    if (!/^[\d０-９]*$/.test(value)) {                            
                                        event.target.value = value.replace(/[^0-9０-９]/g, "");
                                        return;
                                    }
                                    if (value.length > maxlength) {
                                        value = value.slice(0, maxlength);                              
                                    }
                                    event.target.value = value;                                              
                                }
                            );
                            input.addEventListener(
                                "blur", function(event) {
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
                                }
                            );
                        }
                    );
                }
                addRangeValidation("number_3",3);
                addRangeValidation("number_4",4);
                addRangeValidation("number_5",5);
                addRangeValidation("number_12",12);
                addRangeValidation("year",2, 1, 99);
                addRangeValidation("month",2, 1, 12);
                addRangeValidation("day",2, 1, 31);
            </script>
        </div>
        <img alt="法令様式画像" src="{{ $dataUri }}">
    </div>
</main>

