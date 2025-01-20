<!-- 4950013521035000_2 -->
<!-- 国民年金第3号被保険者関係届　事業主等証明書 -->

<main role="main" class="national_pension_category_3_insured_person_employer_certificate" style="display: flex; justify-content: center;">
    <div class="input_area">
        <style>
            .input_area {
                margin-top: 3.2rem;
            }

            .input_area .field_origin * {
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

            .npc3ipn_2_dependent_info {
                top: 197px;
                height: 36px;
                font-size: 16px;
                text-align: left;
            }

            .npc3ipn_2_dependent_birthday {
                top: 206px;
                width: 33px;
                height: 27px;
                font-size: 14px;
                text-align: center;
            }

            .npc3ipn_2_employee_name {
                left: 310px;
                width: 222px;
                font-size: 12px;
                text-align: left;
            }

            .npc3ipn_2_employee_birthday {
                top: 267.5px;
                width: 33px;
                height: 27px;
                font-size: 14px;
                text-align: center;
            }

            .npc3ipn_2_business_owners_post_code {
                font-size: 12px;
                text-align: center;
                top: 332.5px;
                height: 16px;
            }

            .npc3ipn_2_business_owners_info {
                font-size: 12px;
                text-align: left;
                left: 283.5px;
                width: 396px;
                overflow-wrap: break-word;
                word-wrap: break-word;
            }

            .npc3ipn_2_business_owners_tell {
                font-size: 12px;
                text-align: center;
                top: 425px;
                width: 71px;
                height: 15px;
            }

            .npc3ipn_2_date_of_submission {
                font-size: 12px;
                text-align: center;
                top: 458px;
                width: 16px;
                height: 15px;
            }

            .input_area img {
                margin: 0px !important;
                max-width: 762px;
                min-width: 762px;
            }
        </style>

        <div class="field_origin">
            <input class="npc3ipn_2_dependent_info number_12" id="D1" name="npc3ipn_2_dependent_mynumber_card_no_or_pension_no"
                style="left: 124px; width: 141px;"
                maxlength="12"
                type="text" autocomplete="off" value="{{ old('npc3ipn_2_dependent_mynumber_card_no_or_pension_no') }}"
            />
            <input class="npc3ipn_2_dependent_info" id="D2" name="npc3ipn_2_dependent_fullname"
                style="left: 266px; width: 266.5px;"
                maxlength="25"
                type="text" autocomplete="off" value="{{ old('npc3ipn_2_dependent_fullname') }}"
            />
            <input class="npc3ipn_2_dependent_birthday" id="D3_1" name="npc3ipn_2_dependent_birthday_era"
                style="left: 534px; width: 41px; font-size: 10px;"
                maxlength="2" autocomplete="off" value="{{ old('npc3ipn_2_dependent_birthday_era') }}"
            >
            <input class="npc3ipn_2_dependent_birthday year" id="D3_2" name="npc3ipn_2_dependent_birthday_year"
                style="left: 576.5px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{ old('npc3ipn_2_dependent_birthday_year') }}"
            />
            <input class="npc3ipn_2_dependent_birthday month" id="D3_3" name="npc3ipn_2_dependent_birthday_month"
                style="left: 611px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_2_dependent_birthday_month')}}"
            />
            <input class="npc3ipn_2_dependent_birthday day" id="D3_4" name="npc3ipn_2_dependent_birthday_day"
                style="left: 646px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_2_dependent_birthday_day')}}"
            />
            <input class="number_12" id="D4" name="npc3ipn_2_employee_mynumber_card_no_or_pension_no"
                style="top: 256px; left: 124px; width: 140px; height: 39px; font-size: 16px; text-align: left;"
                maxlength="12"
                type="text" autocomplete="off" value="{{ old('npc3ipn_2_employee_mynumber_card_no_or_pension_no') }}"
            />
            <input class="npc3ipn_2_employee_name" id="D5_1" name="npc3ipn_2_employee_fullname_kana"
                style="top: 256px; height: 20px;"
                maxlength="25"
                type="text" autocomplete="off" value="{{ old('npc3ipn_2_employee_fullname_kana') }}"
            />
            <input class="npc3ipn_2_employee_name" id="D5_2" name="npc3ipn_2_employee_fullname"
                style="top: 277.5px; height: 17.5px;"
                maxlength="25"
                type="text" autocomplete="off" value="{{ old('npc3ipn_2_employee_fullname') }}"
            />
            <input class="npc3ipn_2_employee_birthday" id="D6_1" name="npc3ipn_2_employee_birthday_era"
                style="left: 534px; width: 41px; font-size: 10px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{ old('npc3ipn_2_employee_birthday_era') }}"
            />
            <input class="npc3ipn_2_employee_birthday year" id="D6_2" name="npc3ipn_2_employee_birthday_year"
                style="left: 576.5px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{ old('npc3ipn_2_employee_birthday_year') }}"
            />
            <input class="npc3ipn_2_employee_birthday month" id="D6_3" name="npc3ipn_2_employee_birthday_month"
                style="left: 611px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_2_employee_birthday_month')}}"
            />
            <input class="npc3ipn_2_employee_birthday day" id="D6_4" name="npc3ipn_2_employee_birthday_day"
                style="left: 646px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_2_employee_birthday_day')}}"
            />

            <input class="npc3ipn_2_business_owners_post_code number_3" id="E1_1" name="npc3ipn_2_business_owners_post_code_former"
                style="left: 283px; width: 39px;"
                maxlength="3"
                type="text" autocomplete="off" value="{{old('npc3ipn_2_business_owners_post_code_former')}}"
            />
            <input class="npc3ipn_2_business_owners_post_code number_4" id="E1_2" name="npc3ipn_2_business_owners_post_code_letter"
                style="left: 332px; width: 63px;"
                maxlength="4"
                type="text" autocomplete="off" value="{{old('npc3ipn_2_business_owners_post_code_letter')}}"
            />
            <textarea class="npc3ipn_2_business_owners_info" id="E2_1" name="npc3ipn_2_business_owners_address"
                style="top: 350px; height: 27px;"
                type="text"
                maxlength="50"
                >{{old('npc3ipn_2_business_owners_address')}}</textarea>
            <input class="npc3ipn_2_business_owners_info" id="E2_2" name="npc3ipn_2_business_owners_location"
                style="top: 378px; height: 25px;"
                maxlength="25"
                type="text" autocomplete="off" value="{{old('npc3ipn_2_business_owners_location')}}"
            />
            <input class="npc3ipn_2_business_owners_info" id="E2_3" name="npc3ipn_2_business_owners_fullname"
                style="top: 404px; height: 20px;"
                maxlength="25"
                type="text" autocomplete="off" value="{{old('npc3ipn_2_business_owners_fullname')}}"
            />
            <input class="npc3ipn_2_business_owners_tell number_5" id="E3_1" name="npc3ipn_2_business_owners_tel_area_code"
                style="left: 346px;"
                maxlength="5"
                type="text" autocomplete="off" value="{{old('npc3ipn_2_business_owners_tel_area_code')}}"
            />
            <input class="npc3ipn_2_business_owners_tell number_4" id="E3_2" name="npc3ipn_2_business_owners_tel_city_code"
                style="left: 445px;"
                maxlength="4"
                type="text" autocomplete="off" value="{{old('npc3ipn_2_business_owners_tel_city_code')}}"
            />
            <input class="npc3ipn_2_business_owners_tell number_5" id="E3_3" name="npc3ipn_2_business_owners_tel_subscriber_code"
                style="left: 544px;"
                maxlength="5"
                    type="text" autocomplete="off" value="{{old('npc3ipn_2_business_owners_tel_subscriber_code')}}"
                />

            <input class="npc3ipn_2_date_of_submission year" id="F1_1" name="npc3ipn_2_date_of_submission_year"
                style="left: 159px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_2_date_of_submission_year')}}"
            />
            <input class="npc3ipn_2_date_of_submission month" id="F1_2" name="npc3ipn_2_date_of_submission_month"
                style="left: 184px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_2_date_of_submission_month')}}"
            />
            <input class="npc3ipn_2_date_of_submission day" id="F1_3" name="npc3ipn_2_date_of_submission_day"
                style="left: 208px;"
                maxlength="2"
                type="text" autocomplete="off" value="{{old('npc3ipn_2_date_of_submission_day')}}"
            />
            <input id="F2" name="npc3ipn_2_labor_consultant_name"
                style="top: 554px; left: 408px; height: 21px; width: 321px; text-align: center;"
                maxlength="40"
                type="text" autocomplete="off" value="{{old('npc3ipn_2_labor_consultant_name')}}"
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

