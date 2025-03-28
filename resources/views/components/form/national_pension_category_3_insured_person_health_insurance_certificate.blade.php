<!-- 4950013521035000_3 -->
<!-- 国民年金第3号被保険者関係届　医療保険者証明書 -->

<main role="main" class="national_pension_category_3_insured_person_health_insurance_certificate" style="display: flex; justify-content: center;">
    <div class="input_area">
        <style>
            .input_area {
                margin-top: 3.2rem;
            }

            .input_area .npc3ipn_3_field_origin * {
                position: absolute;
                z-index: 2;
                background-color: #ddeeff;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                padding: 0px;
                overflow: hidden;
                border: none;
                position: absolute;
                border-radius: 0px;
            }

            .npc3ipn_3_dependent_info {
                top: 184px;
                height: 36px;
                font-size: 16px;
                text-align: left;
            }

            .npc3ipn_3_dependent_birthday {
                top: 193px;
                width: 33px;
                height: 27px;
                font-size: 14px;
                text-align: center;
            }

            .npc3ipn_3_employee_name {
                left: 310px;
                width: 225px;
                height: 20px;
                font-size: 12px;
                text-align: left;
            }

            .npc3ipn_3_employee_birthday {
                top: 257px;
                width: 33px;
                height: 27px;
                font-size: 14px;
                text-align: center;
            }

            .npc3ipn_3_date_of_certification {
                top: 325px;
                width: 20px;
                height: 16px;
                font-size: 10px;
                text-align: center;
            }

            .npc3ipn_3_business_owners_post_code {
                font-size: 12px;
                text-align: center;
                top: 352.5px;
                height: 16px;
            }

            .npc3ipn_3_business_owners_info {
                font-size: 12px;
                text-align: left;
                left: 285px;
                width: 396px;
                overflow-wrap: break-word;
                word-wrap: break-word;
            }

            .npc3ipn_3_business_owners_tell {
                font-size: 12px;
                text-align: center;
                top: 445px;
                width: 71px;
                height: 15px;
            }

            .npc3ipn_3_date_of_submission {
                font-size: 12px;
                text-align: center;
                top: 473px;
                width: 18px;
                height: 15px;
            }

            .input_area img {
                margin: 0px !important;
                max-width: 762px;
                min-width: 762px;
            }
        </style>

        <div class="npc3ipn_3_field_origin">
            <input class="npc3ipn_3_dependent_info number_12" id="G1" name="npc3ipn_3_dependent_mynumber_card_no_or_pension_no"
                style="left: 113px; width: 154px;" maxlength="12"
                type="text" autocomplete="off" value="{{ old('npc3ipn_3_dependent_mynumber_card_no_or_pension_no') }}"
            />
            <input class="npc3ipn_3_dependent_info" id="G2" name="npc3ipn_3_dependent_fullname"
                style="left: 269px; width: 266.5px;" maxlength="25"
                type="text" autocomplete="off" value="{{ old('npc3ipn_3_dependent_fullname') }}"
            />
            <input class="npc3ipn_3_dependent_birthday" id="G3_1" name="npc3ipn_3_dependent_birthday_era"
                style="left: 537px; width: 41px; font-size: 10px;" maxlength="2"
                type="text" autocomplete="off" value="{{ old('npc3ipn_3_dependent_birthday_era') }}"
            >
            <input class="npc3ipn_3_dependent_birthday year" id="G3_2" name="npc3ipn_3_dependent_birthday_year"
                style="left: 579px;" maxlength="2"
                type="text" autocomplete="off" value="{{ old('npc3ipn_3_dependent_birthday_year') }}"
            />
            <input class="npc3ipn_3_dependent_birthday month" id="G3_3" name="npc3ipn_3_dependent_birthday_month"
                style="left: 614px;" maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_dependent_birthday_month')}}"
            />
            <input class="npc3ipn_3_dependent_birthday day" id="G3_4" name="npc3ipn_3_dependent_birthday_day"
                style="left: 648.5px;" maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_dependent_birthday_day')}}"
            />
            <input class="number_12" id="G4" name="npc3ipn_3_employee_mynumber_card_no_or_pension_no"
                style="top: 243px; left: 113px; width: 154px; height: 41px; font-size: 16px; text-align: left;"
                maxlength="12" type="text" autocomplete="off" value="{{ old('npc3ipn_3_employee_mynumber_card_no_or_pension_no') }}"
            />
            <input class="npc3ipn_3_employee_name" id="G5_1" name="npc3ipn_3_employee_fullname_kana"
                style="top: 242px;" maxlength="25"
                type="text" autocomplete="off" value="{{ old('npc3ipn_3_employee_fullname_kana') }}"
            />
            <input class="npc3ipn_3_employee_name" id="G5_2" name="npc3ipn_3_employee_fullname"
                style="top: 264px;"
                maxlength="25"
                type="text" autocomplete="off" value="{{ old('npc3ipn_3_employee_fullname') }}"
            />
            <input class="npc3ipn_3_employee_birthday" id="G6_1" name="npc3ipn_3_employee_birthday_era"
                style="left: 537px; width: 41px; font-size: 10px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{ old('npc3ipn_3_employee_birthday_era') }}"
            >
            <input class="npc3ipn_3_employee_birthday year" id="G6_2" name="npc3ipn_3_employee_birthday_year"
                style="left: 579.5px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{ old('npc3ipn_3_employee_birthday_year') }}"
            />
            <input class="npc3ipn_3_employee_birthday month" id="G6_3" name="npc3ipn_3_employee_birthday_month"
                style="left: 614px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_employee_birthday_month')}}"
            />
            <input class="npc3ipn_3_employee_birthday day" id="G6_4" name="npc3ipn_3_employee_birthday_day"
                style="left: 648.5px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_employee_birthday_day')}}"
            />

            <input class="npc3ipn_3_date_of_certification year" id="G7_1" name="npc3ipn_3_date_of_certification_year"
                style="left: 429px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{ old('npc3ipn_3_date_of_certification_year') }}"
            />
            <input class="npc3ipn_3_date_of_certification month" id="G7_2" name="npc3ipn_3_date_of_certification_month"
                style="left: 459px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_date_of_certification_month')}}"
            />
            <input class="npc3ipn_3_date_of_certification day" id="G7_3" name="npc3ipn_3_date_of_certification_day"
                style="left: 488px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_date_of_certification_day')}}"
            />

            <input class="npc3ipn_3_business_owners_post_code number_3" id="G8_1" name="npc3ipn_3_business_owners_post_code_former"
                style="left: 285px; width: 39px;"
                maxlength="3"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_business_owners_post_code_former')}}"
            />
            <input class="npc3ipn_3_business_owners_post_code number_4" id="G8_2" name="npc3ipn_3_business_owners_post_code_letter"
                style="left: 333px; width: 63px;"
                maxlength="4"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_business_owners_post_code_letter')}}"
            />
            <textarea class="npc3ipn_3_business_owners_info" id="G9_1" name="npc3ipn_3_business_owners_address"
                style="top: 371px; height: 33px;" autocomplete="off"
                maxlength="50" type="text"
                >{{old('npc3ipn_3_business_owners_address')}}</textarea>
            <input class="npc3ipn_3_business_owners_info" id="G9_2" name="npc3ipn_3_business_owners_location"
                style="top: 405px; height: 20px;"
                maxlength="25"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_business_owners_location')}}"
            />
            <input class="npc3ipn_3_business_owners_info" id="G9_3" name="npc3ipn_3_business_owners_fullname"
                style="top: 426px; height: 18px;"
                maxlength="25"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_business_owners_fullname')}}"
            />
            <input class="npc3ipn_3_business_owners_tell number_5" id="G10_1" name="npc3ipn_3_business_owners_tell_area_code"
                style="left: 348px;"
                maxlength="5"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_business_owners_tell_area_code')}}"
            />
            <input class="npc3ipn_3_business_owners_tell number_4" id="G10_2" name="npc3ipn_3_business_owners_tell_city_code"
                style="left: 447px;"
                maxlength="4"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_business_owners_tell_city_code')}}"
            />
            <input class="npc3ipn_3_business_owners_tell number_5" id="G10_3" name="npc3ipn_3_business_owners_tell_subscriber_code"
                style="left: 546px;"
                maxlength="5"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_business_owners_tell_subscriber_code')}}"
            />

            <input class="npc3ipn_3_date_of_submission year" id="G11_1" name="npc3ipn_3_date_of_submission_year"
                style="left: 164px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_date_of_submission_year')}}"
            />
            <input class="npc3ipn_3_date_of_submission month" id="G11_2" name="npc3ipn_3_date_of_submission_month"
                style="left: 193px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_date_of_submission_month')}}"
            />
            <input class="npc3ipn_3_date_of_submission day" id="G11_3" name="npc3ipn_3_date_of_submission_day"
                style="left: 226px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_date_of_submission_day')}}"
            />
            <input id="G12" name="npc3ipn_3_labor_consultant_name"
                style="top: 554px; left: 410px; height: 21px; width: 321px; text-align: center;"
                maxlength="40"
                type="text" autocomplete="off" value="{{old('npc3ipn_3_labor_consultant_name')}}"
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

