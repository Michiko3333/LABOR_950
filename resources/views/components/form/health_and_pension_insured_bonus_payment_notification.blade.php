<div>
    <div id="modal-recertification" class="modal-recertification">
        <input type="hidden" id="transUrlAccount"
            value="https://account.e-gov.go.jp/user/user-setting/init?service_type=00" />
        <input type="hidden" id="transUrlTwoFact"
            value="https://account.e-gov.go.jp/user/otp-secret-release-confirmation/init" />
        <input type="hidden" id="transUrlAuthService"
            value="https://account.e-gov.go.jp/user/auth-service-update/init?service_type=00" />
        <input type="hidden" id="transUrlUserVerification"
            value="https://shinsei.e-gov.go.jp/recept/user-verification-entry/init" />
        <input type="hidden" id="accountLink" />
        <link rel="stylesheet" href="{{ asset('/css/health-and-pension-insured-bonus-payment-notification.css') }}">
        <div id="modal-recertification-bg" class="modal-recertification-bg"></div>
    </div>
</div>
<main role="main" class="egovui-main-input-application">

    <div class="egovui-application-form-grid pb2">
        <div class="egovui-application-form-input-area">
            <script type="text/javascript">
                null
            </script>
            <div id="eGovFormArea">
                <div id="eGovScript">
                </div>
                <div id="eGovForm">
                    <script type="text/javascript">
                        var F3egclMappingInfo =
                            "<itemXmlMapping><map><itemName>title_health_insurance</itemName><xpath>A-330397-001_1[1]/標題x健康保険[1]</xpath></map><map><itemName>title_pension_insurance</itemName><xpath>A-330397-001_1[1]/標題x厚生年金保険[1]</xpath></map><map><itemName>today_year</itemName><xpath>A-330397-001_1[1]/提出年月日[1]/年[1]</xpath></map><map><itemName>today_month</itemName><xpath>A-330397-001_1[1]/提出年月日[1]/月[1]</xpath></map><map><itemName>today_date</itemName><xpath>A-330397-001_1[1]/提出年月日[1]/日[1]</xpath></map><map><itemName>pension_office_reference_prefecture</itemName><xpath>A-330397-001_1[1]/事業所整理記号x都道府県コード[1]</xpath></map><map><itemName>pension_office_reference_no_cities</itemName><xpath>A-330397-001_1[1]/事業所整理記号x郡市区記号[1]</xpath></map><map><itemName>pension_office_reference_no_office</itemName><xpath>A-330397-001_1[1]/事業所整理記号x事業所記号[1]</xpath></map><map><itemName>branch_post_code_parent</itemName><xpath>A-330397-001_1[1]/事業所所在地x郵便番号x親番号[1]</xpath></map><map><itemName>branch_post_code_child</itemName><xpath>A-330397-001_1[1]/事業所所在地x郵便番号x子番号[1]</xpath></map><map><itemName>branch_address</itemName><xpath>A-330397-001_1[1]/事業所所在地[1]</xpath></map><map><itemName>branch_name</itemName><xpath>A-330397-001_1[1]/事業所名称[1]</xpath></map><map><itemName>employer_company_managerial_position_name</itemName><xpath>A-330397-001_1[1]/事業主氏名[1]</xpath></map><map><itemName>branch_tel_area_code</itemName><xpath>A-330397-001_1[1]/電話番号[1]/市外局番[1]</xpath></map><map><itemName>branch_tel_city_code</itemName><xpath>A-330397-001_1[1]/電話番号[1]/局番[1]</xpath></map><map><itemName>branch_tel_subscriber_code</itemName><xpath>A-330397-001_1[1]/電話番号[1]/番号[1]</xpath></map><map><itemName>labor_consultant_submission_agent_name</itemName><xpath>A-330397-001_1[1]/社会保険労務士の提出代行者名[1]</xpath></map><map><itemName>employment_insured_no</itemName><xpath>A-330397-001_1[1]/被保険者整理番号[1]</xpath></map><map><itemName>insured_fullname_kana</itemName><xpath>A-330397-001_1[1]/被保険者氏名xカナ氏名[1]</xpath></map><map><itemName>insured_fullname</itemName><xpath>A-330397-001_1[1]/被保険者氏名x漢字氏名[1]</xpath></map><map><itemName>employee_birthday_era</itemName><xpath>A-330397-001_1[1]/生年月日[1]/元号[1]</xpath></map><map><itemName>employee_birthday_year</itemName><xpath>A-330397-001_1[1]/生年月日[1]/年[1]</xpath></map><map><itemName>employee_birthday_month</itemName><xpath>A-330397-001_1[1]/生年月日[1]/月[1]</xpath></map><map><itemName>employee_birthday_date</itemName><xpath>A-330397-001_1[1]/生年月日[1]/日[1]</xpath></map><map><itemName>bonus_payment_date_era</itemName><xpath>A-330397-001_1[1]/賞与支払年月日[1]/元号[1]</xpath></map><map><itemName>bonus_payment_date_year</itemName><xpath>A-330397-001_1[1]/賞与支払年月日[1]/年[1]</xpath></map><map><itemName>bonus_payment_date_month</itemName><xpath>A-330397-001_1[1]/賞与支払年月日[1]/月[1]</xpath></map><map><itemName>bonus_payment_date_date</itemName><xpath>A-330397-001_1[1]/賞与支払年月日[1]/日[1]</xpath></map><map><itemName>bonus_payment_currency</itemName><xpath>A-330397-001_1[1]/賞与支払額x通貨[1]</xpath></map><map><itemName>bonus_payment_goods</itemName><xpath>A-330397-001_1[1]/賞与支払額x現物[1]</xpath></map><map><itemName>bonus_payment_sum</itemName><xpath>A-330397-001_1[1]/賞与支払額x合計[1]</xpath></map><map><itemName>mynumber_no_or_pension_no</itemName><xpath>A-330397-001_1[1]/個人番号または基礎年金番号[1]</xpath></map><map><itemName>remarks_over_70_insured</itemName><xpath>A-330397-001_1[1]/備考x選択x70歳以上被用者[1]</xpath></map><map><itemName>remarks_more_than_twice_work</itemName><xpath>A-330397-001_1[1]/備考x選択x二以上勤務[1]</xpath></map><map><itemName>remarks_bonus_sum_in_months</itemName><xpath>A-330397-001_1[1]/備考x選択x同月内の賞与合算[1]</xpath></map><map><itemName>remarks_first_payment_date</itemName><xpath>A-330397-001_1[1]/備考x初回支払日[1]</xpath></map><map><itemName>notification_request</itemName><xpath>A-330397-001_1[1]/通知書希望形式[1]</xpath></map></itemXmlMapping>";
                        var F3egclRepeatItem = "";
                        var F3egclDataStructure =
                            "&#xa;&#xa;&#x3c;&#x44;&#x61;&#x74;&#x61;&#x52;&#x6f;&#x6f;&#x74;&#x3e;&#xa;&#x9;&#x3c;&#x69d8;&#x5f0f;&#x49;&#x44;&#x3e;&#x34;&#x39;&#x35;&#x30;&#x31;&#x33;&#x35;&#x32;&#x30;&#x37;&#x33;&#x33;&#x30;&#x33;&#x30;&#x35;&#x32;&#x36;&#x3c;&#x2f;&#x69d8;&#x5f0f;&#x49;&#x44;&#x3e;&#xa;&#x9;&#x3c;&#x69d8;&#x5f0f;&#x30d0;&#x30fc;&#x30b8;&#x30e7;&#x30f3;&#x3e;&#x31;&#x3c;&#x2f;&#x69d8;&#x5f0f;&#x30d0;&#x30fc;&#x30b8;&#x30e7;&#x30f3;&#x3e;&#xa;&#x9;&#x3c;&#x53;&#x54;&#x59;&#x4c;&#x45;&#x53;&#x48;&#x45;&#x45;&#x54;&#x3e;&#x34;&#x39;&#x35;&#x30;&#x31;&#x33;&#x35;&#x32;&#x30;&#x37;&#x33;&#x33;&#x30;&#x33;&#x30;&#x35;&#x32;&#x36;&#x2e;&#x78;&#x73;&#x6c;&#x3c;&#x2f;&#x53;&#x54;&#x59;&#x4c;&#x45;&#x53;&#x48;&#x45;&#x45;&#x54;&#x3e;&#xa;&#x9;&#x3c;&#x69d8;&#x5f0f;&#x30b3;&#x30d4;&#x30fc;&#x60c5;&#x5831;&#x3e;&#x30;&#x3c;&#x2f;&#x69d8;&#x5f0f;&#x30b3;&#x30d4;&#x30fc;&#x60c5;&#x5831;&#x3e;&#xa;&#x9;&#x3c;&#x44;&#x6f;&#x63;&#x74;&#x79;&#x70;&#x65;&#x3e;&#x31;&#x3c;&#x2f;&#x44;&#x6f;&#x63;&#x74;&#x79;&#x70;&#x65;&#x3e;&#xa;&#x9;&#x3c;&#x41;&#x2d;&#x33;&#x33;&#x30;&#x33;&#x39;&#x37;&#x2d;&#x30;&#x30;&#x31;&#x5f;&#x31;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x6a19;&#x984c;&#x78;&#x5065;&#x5eb7;&#x4fdd;&#x967a;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x6a19;&#x984c;&#x78;&#x539a;&#x751f;&#x5e74;&#x91d1;&#x4fdd;&#x967a;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x63d0;&#x51fa;&#x5e74;&#x6708;&#x65e5;&#x3e;&#xa;&#x9;&#x9;&#x9;&#x3c;&#x5e74;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x9;&#x3c;&#x6708;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x9;&#x3c;&#x65e5;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x2f;&#x63d0;&#x51fa;&#x5e74;&#x6708;&#x65e5;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x4e8b;&#x696d;&#x6240;&#x6574;&#x7406;&#x8a18;&#x53f7;&#x78;&#x90fd;&#x9053;&#x5e9c;&#x770c;&#x30b3;&#x30fc;&#x30c9;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x4e8b;&#x696d;&#x6240;&#x6574;&#x7406;&#x8a18;&#x53f7;&#x78;&#x90e1;&#x5e02;&#x533a;&#x8a18;&#x53f7;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x4e8b;&#x696d;&#x6240;&#x6574;&#x7406;&#x8a18;&#x53f7;&#x78;&#x4e8b;&#x696d;&#x6240;&#x8a18;&#x53f7;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x4e8b;&#x696d;&#x6240;&#x6240;&#x5728;&#x5730;&#x78;&#x90f5;&#x4fbf;&#x756a;&#x53f7;&#x78;&#x89aa;&#x756a;&#x53f7;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x4e8b;&#x696d;&#x6240;&#x6240;&#x5728;&#x5730;&#x78;&#x90f5;&#x4fbf;&#x756a;&#x53f7;&#x78;&#x5b50;&#x756a;&#x53f7;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x4e8b;&#x696d;&#x6240;&#x6240;&#x5728;&#x5730;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x4e8b;&#x696d;&#x6240;&#x540d;&#x79f0;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x4e8b;&#x696d;&#x4e3b;&#x6c0f;&#x540d;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x96fb;&#x8a71;&#x756a;&#x53f7;&#x3e;&#xa;&#x9;&#x9;&#x9;&#x3c;&#x5e02;&#x5916;&#x5c40;&#x756a;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x9;&#x3c;&#x5c40;&#x756a;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x9;&#x3c;&#x756a;&#x53f7;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x2f;&#x96fb;&#x8a71;&#x756a;&#x53f7;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x793e;&#x4f1a;&#x4fdd;&#x967a;&#x52b4;&#x52d9;&#x58eb;&#x306e;&#x63d0;&#x51fa;&#x4ee3;&#x884c;&#x8005;&#x540d;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x88ab;&#x4fdd;&#x967a;&#x8005;&#x6574;&#x7406;&#x756a;&#x53f7;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x88ab;&#x4fdd;&#x967a;&#x8005;&#x6c0f;&#x540d;&#x78;&#x30ab;&#x30ca;&#x6c0f;&#x540d;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x88ab;&#x4fdd;&#x967a;&#x8005;&#x6c0f;&#x540d;&#x78;&#x6f22;&#x5b57;&#x6c0f;&#x540d;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x751f;&#x5e74;&#x6708;&#x65e5;&#x3e;&#xa;&#x9;&#x9;&#x9;&#x3c;&#x5143;&#x53f7;&#x3e;&#x35;&#x3c;&#x2f;&#x5143;&#x53f7;&#x3e;&#xa;&#x9;&#x9;&#x9;&#x3c;&#x5e74;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x9;&#x3c;&#x6708;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x9;&#x3c;&#x65e5;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x2f;&#x751f;&#x5e74;&#x6708;&#x65e5;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x8cde;&#x4e0e;&#x652f;&#x6255;&#x5e74;&#x6708;&#x65e5;&#x3e;&#xa;&#x9;&#x9;&#x9;&#x3c;&#x5143;&#x53f7;&#x3e;&#x37;&#x3c;&#x2f;&#x5143;&#x53f7;&#x3e;&#xa;&#x9;&#x9;&#x9;&#x3c;&#x5e74;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x9;&#x3c;&#x6708;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x9;&#x3c;&#x65e5;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x2f;&#x8cde;&#x4e0e;&#x652f;&#x6255;&#x5e74;&#x6708;&#x65e5;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x8cde;&#x4e0e;&#x652f;&#x6255;&#x984d;&#x78;&#x901a;&#x8ca8;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x8cde;&#x4e0e;&#x652f;&#x6255;&#x984d;&#x78;&#x73fe;&#x7269;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x8cde;&#x4e0e;&#x652f;&#x6255;&#x984d;&#x78;&#x5408;&#x8a08;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x500b;&#x4eba;&#x756a;&#x53f7;&#x307e;&#x305f;&#x306f;&#x57fa;&#x790e;&#x5e74;&#x91d1;&#x756a;&#x53f7;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x5099;&#x8003;&#x78;&#x9078;&#x629e;&#x78;&#x37;&#x30;&#x6b73;&#x4ee5;&#x4e0a;&#x88ab;&#x7528;&#x8005;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x5099;&#x8003;&#x78;&#x9078;&#x629e;&#x78;&#x4e8c;&#x4ee5;&#x4e0a;&#x52e4;&#x52d9;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x5099;&#x8003;&#x78;&#x9078;&#x629e;&#x78;&#x540c;&#x6708;&#x5185;&#x306e;&#x8cde;&#x4e0e;&#x5408;&#x7b97;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x5099;&#x8003;&#x78;&#x521d;&#x56de;&#x652f;&#x6255;&#x65e5;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x901a;&#x77e5;&#x66f8;&#x5e0c;&#x671b;&#x5f62;&#x5f0f;&#x2f;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x5c4a;&#x66f8;&#x51e6;&#x7406;&#x533a;&#x5206;&#x3e;&#x35;&#x3c;&#x2f;&#x5c4a;&#x66f8;&#x51e6;&#x7406;&#x533a;&#x5206;&#x3e;&#xa;&#x9;&#x9;&#x3c;&#x58;&#x6d;&#x69;&#x74;&#x3e;&#x30;&#x3c;&#x2f;&#x58;&#x6d;&#x69;&#x74;&#x3e;&#xa;&#x9;&#x3c;&#x2f;&#x41;&#x2d;&#x33;&#x33;&#x30;&#x33;&#x39;&#x37;&#x2d;&#x30;&#x30;&#x31;&#x5f;&#x31;&#x3e;&#xa;&#x3c;&#x2f;&#x44;&#x61;&#x74;&#x61;&#x52;&#x6f;&#x6f;&#x74;&#x3e;&#xa;";
                    </script>

                    <div class="egovuiForm-preview-style egovuiForm-preview-legal-style">

                        <div class="egov-tool-wrapper">
                            <div class="egov-tool-field-origin" style="left: 83px; top: 70px;">
                                <input class="egov-tool-field-rect onImage" id="N6_005F_93FA" name="today_year"
                                    value="{{ old('today_year') }}" onfocus="addlength(this,2)" required="required"
                                    style="width: 20px; height: 18px; font-size: 10px; text-align: center; line-height: 18px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 114px; top: 70px;">
                                <input class="egov-tool-field-rect onImage" id="N7_005F_944E_8D86" name="today_month"
                                    value="{{ old('today_month') }}" onfocus="addlength(this,2)" required="required"
                                    style="width: 20px; height: 18px; font-size: 10px; text-align: center; line-height: 18px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 145px; top: 70px;">
                                <input class="egov-tool-field-rect onImage" id="N8_005F_944E" name="today_date"
                                    value="{{ old('today_date') }}" onfocus="addlength(this,2)" required="required"
                                    style="width: 20px; height: 18px; font-size: 10px; text-align: center; line-height: 18px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 145px; top: 90px;">
                                <input class="egov-tool-field-rect onImage" id="N9_005F_8C8E" maxlength="2"
                                    value="{{ old('pension_office_reference_prefecture') }}"
                                    name="pension_office_reference_prefecture" required="required"
                                    style="width: 49px; height: 24px; font-size: 12px; text-align: left; line-height: 24px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 196px; top: 90px;">
                                <input class="egov-tool-field-rect onImage" id="N10_005F_93FA" maxlength="4"
                                    value="{{ old('pension_office_reference_no_cities') }}"
                                    name="pension_office_reference_no_cities" required="required"
                                    style="width: 49px; height: 24px; font-size: 12px; text-align: left; line-height: 24px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 247px; top: 90px;">
                                <input class="egov-tool-field-rect onImage" id="N11_005F_94ED_95DB_8CAF_8ED2_8E81"
                                    maxlength="4" value="{{ old('pension_office_reference_no_office') }}"
                                    name="pension_office_reference_no_office" required="required"
                                    style="width: 49px; height: 24px; font-size: 12px; text-align: left; line-height: 24px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin"
                                style="left: 298px; top: 89px; width: 45px; height: 25.5px; border-top: 1px solid #2f323e; border-right: 1px solid #2f323e;">
                                <p style="margin-left: 2px; font-size: 8px; font-weight: 500; line-height: 25px;">事業所番号
                                </p>
                            </div>
                            <div class="egov-tool-field-origin"
                                style="left: 343px; top: 89px; width:48px; height: 25.5px; border-top: 1px solid #2f323e; border-right: 1px solid #2f323e;">
                                <input class="egov-tool-field-rect onImage" id="N9_005F_8C8E0" maxlength="5"
                                    value="{{ old('csv_pension_office_no') }}" name="csv_pension_office_no"
                                    required="required"
                                    style="width: 47px; height: 24px; font-size: 10px; text-align: left; line-height: 38px; padding: inherit; background-color:#ddeeff;"
                                    type="text" value="" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 152px; top: 116px;">
                                <input class="egov-tool-field-rect onImage" id="N12_005F_905C_90BF_8ED2_8E81"
                                    maxlength="3" value="{{ old('branch_post_code_parent') }}"
                                    name="branch_post_code_parent" required="required"
                                    style="width: 48px; height: 16px; font-size: 10px; text-align: center; line-height: 16px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 214px; top: 116px;">
                                <input class="egov-tool-field-rect onImage" id="N13_005F_8374_838A_834B_8369"
                                    maxlength="4" value="{{ old('branch_post_code_child') }}"
                                    name="branch_post_code_child" required="required"
                                    style="width: 48px; height: 16px; font-size: 10px; text-align: center; line-height: 16px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 135px; top: 133px;">
                                <input class="egov-tool-field-rect onImage"
                                    id="N15_005F_94ED_95DB_8CAF_8ED2_8E81_96BC" maxlength="75"
                                    value="{{ old('branch_address') }}" name="branch_address" required="required"
                                    style="width: 254px; height: 32px; font-size: 12px; text-align: left; line-height: 32px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 135px; top: 166px;">
                                <input class="egov-tool-field-rect onImage" id="N16_005F_905C_90BF" maxlength="40"
                                    value="{{ old('branch_name') }}" name="branch_name" required="required"
                                    style="width: 254px; height: 27px; font-size: 12px; text-align: left; line-height: 27px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 135px; top: 194.5px;">
                                <input class="egov-tool-field-rect onImage" id="N17_005F_985A_8F5C_8DCE_82C9"
                                    maxlength="25" value="{{ old('employer_company_managerial_position_name') }}"
                                    name="employer_company_managerial_position_name" required="required"
                                    style="width: 254px; height: 27px; font-size: 12px; text-align: left; line-height: 27px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 135px; top: 222px;">
                                <input class="egov-tool-field-rect onImage" id="N18_005F_8CC2_906C_94D4"
                                    maxlength="5" value="{{ old('branch_tel_area_code') }}"
                                    name="branch_tel_area_code" required="required"
                                    style="width: 64px; height: 14px; font-size: 10px; text-align: center; line-height: 14px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 206.5px; top: 222px;">
                                <input class="egov-tool-field-rect onImage"
                                    id="N19_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85" maxlength="4"
                                    value="{{ old('branch_tel_city_code') }}" name="branch_tel_city_code"
                                    required="required"
                                    style="width: 64px; height: 14px; font-size: 10px; text-align: center; line-height: 14px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 285px; top: 222px;">
                                <input class="egov-tool-field-rect onImage"
                                    id="N20_005F_94ED_95DB_8CAF_8ED2_94D4_8D866" maxlength="5"
                                    value="{{ old('branch_tel_subscriber_code') }}" name="branch_tel_subscriber_code"
                                    required="required"
                                    style="width: 64px; height: 14px; font-size: 10px; text-align: center; line-height: 14px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 399px; top: 203px;">
                                <input class="egov-tool-field-rect onImage"
                                    id="N21_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD" maxlength="40"
                                    value="{{ old('labor_consultant_submission_agent_name') }}"
                                    name="labor_consultant_submission_agent_name"
                                    style="width: 293px; height: 34px; font-size: 12px; text-align: left; line-height: 40px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;"
                                    type="text" />
                                <input id="N19_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C851"
                                    value="{{ old('labor_and_social_security_attorney_registration_no') }}"
                                    name="labor_and_social_security_attorney_registration_no" type="hidden" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 63px; top: 277px;">
                                <input class="egov-tool-field-rect onImage" id="N23_005F_94ED"
                                    value="{{ old('employment_insured_no') }}" name="employment_insured_no"
                                    onfocus="addlength(this,6)"
                                    style="width: 97px; height: 39px; font-size: 12px; text-align: center; line-height: 39px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 193px; top: 277px;">
                                <input class="egov-tool-field-rect onImage" id="N24_005F_8E96_8BC6" maxlength="25"
                                    value="{{ old('insured_fullname_kana') }}" name="insured_fullname_kana"
                                    required="required"
                                    style="width: 212px; height: 18.5px; font-size: 12px; text-align: left; line-height: 18.5px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 163px; top: 297.5px;">
                                <input class="egov-tool-field-rect onImage" id="N25_005F_8E96_8BC6_8F8A"
                                    maxlength="12" value="{{ old('insured_fullname') }}" name="insured_fullname"
                                    required="required"
                                    style="width: 242px; height: 18.5px; font-size: 12px; text-align: left; line-height: 18.5px; padding: 3px; background-color:#ddeeff; overflow-wrap: break-word; word-wrap: break-word;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 407px; top: 283px;">
                                <select class="egov-tool-field-rect onImage" id="N26_005F_8E96_8BC6_8F8A_94D4"
                                    name="employee_birthday_era" required="required"
                                    style="width: 46px; height: 26px; font-size: 12px; text-align: left; line-height: 26px; padding: inherit; background-color:#ddeeff;">
                                    <option value="1"
                                        {{ old('employee_birthday_era') == '1' ? 'selected' : '' }}>
                                        明治
                                    </option>
                                    <option value="3"
                                        {{ old('employee_birthday_era') == '3' ? 'selected' : '' }}>
                                        大正
                                    </option>
                                    <option selected="" value="5"
                                        {{ old('employee_birthday_era') == '5' ? 'selected' : '' }}>
                                        昭和
                                    </option>
                                    <option value="7"
                                        {{ old('employee_birthday_era') == '7' ? 'selected' : '' }}>
                                        平成
                                    </option>
                                    <option value="9"
                                        {{ old('employee_birthday_era') == '9' ? 'selected' : '' }}>
                                        令和
                                    </option>
                                </select>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 455px; top: 287px;">
                                <input class="egov-tool-field-rect onImage" id="N28_8D864_8C85"
                                    value="{{ old('employee_birthday_year') }}" name="employee_birthday_year"
                                    onfocus="addlength(this,2)" required="required"
                                    style="width: 23.5px; height: 24px; font-size: 12px; text-align: center; line-height: 24px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 481.5px; top: 287px;">
                                <input class="egov-tool-field-rect onImage" id="N29_005F_8E73"
                                    value="{{ old('employee_birthday_month') }}" name="employee_birthday_month"
                                    onfocus="addlength(this,2)" required="required"
                                    style="width: 23.5px; height: 24px; font-size: 12px; text-align: center; line-height: 24px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 507px; top: 287px;">
                                <input class="egov-tool-field-rect onImage" id="N30_93E0_8BC7_94D4"
                                    value="{{ old('employee_birthday_date') }}" name="employee_birthday_date"
                                    onfocus="addlength(this,2)" required="required"
                                    style="width: 23.5px; height: 24px; font-size: 12px; text-align: center; line-height: 24px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 63px; top: 351px;">
                                <select class="egov-tool-field-rect onImage" id="N31_005F_89C1_93FC"
                                    name="bonus_payment_date_era" required="required"
                                    style="width: 48px; height: 26px; font-size: 12px; text-align: left; line-height: 26px; padding: inherit; background-color:#ddeeff;">
                                    <option selected="" value="7"
                                        {{ old('bonus_payment_date_era') == '7' ? 'selected' : '' }}>
                                        平成
                                    </option>
                                    <option value="9"
                                        {{ old('bonus_payment_date_era') == '9' ? 'selected' : '' }}>
                                        令和
                                    </option>
                                </select>
                            </div>
                            <div class="egov-tool-field-origin" style="left: 114.5px; top: 351px;">
                                <input class="egov-tool-field-rect onImage" id="N33_005F_8E73_8A4F"
                                    value="{{ old('bonus_payment_date_year') }}" name="bonus_payment_date_year"
                                    onfocus="addlength(this,2)" required="required"
                                    style="width: 23px; height: 30px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 140px; top: 351px;">
                                <input class="egov-tool-field-rect onImage" id="N34_93E0_8BC7_94D4"
                                    value="{{ old('bonus_payment_date_month') }}" name="bonus_payment_date_month"
                                    onfocus="addlength(this,2)" required="required"
                                    style="width: 23px; height: 30px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 166px; top: 351px;">
                                <input class="egov-tool-field-rect onImage" id="N35_94D4_8D86"
                                    value="{{ old('bonus_payment_date_date') }}" name="bonus_payment_date_date"
                                    onfocus="addlength(this,2)" required="required"
                                    style="width: 23px; height: 30px; font-size: 12px; text-align: center; line-height: 30px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 191px; top: 359px;">
                                <input class="egov-tool-field-rect onImage" id="N36_005F_8E96_8BC6_8F8A"
                                    maxlength="7" value="{{ old('bonus_payment_currency') }}"
                                    name="bonus_payment_currency" required="required"
                                    style="width: 77px; height: 36.5px; font-size: 12px; text-align: right; line-height: 36.5px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 281px; top: 359px;">
                                <input class="egov-tool-field-rect onImage" id="N37_96BC_005F_8F8A_8DDD_926E"
                                    maxlength="7" value="{{ old('bonus_payment_goods') }}"
                                    name="bonus_payment_goods" required="required"
                                    style="width: 77px; height: 36.5px; font-size: 12px; text-align: right; line-height: 36.5px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <div class="egov-tool-field-origin" style="left: 371px; top: 359px;">
                                <input class="egov-tool-field-rect onImage" id="N38_8F8A_96BC_005F_8F8A_8DDD_926E"
                                    maxlength="4" value="{{ old('bonus_payment_sum') }}" name="bonus_payment_sum"
                                    required="required"
                                    style="width: 50px; height: 36.5px; font-size: 12px; text-align: right; line-height: 36.5px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>

                            <SPAN
                                style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 533px; top: 336px; width:13px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                <INPUT tabindex="48" value="1" <?php echo old('remarks_over_70_insured') == '1' ? 'checked' : ''; ?>
                                    style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;"
                                    type="CHECKBOX" id="N40_905C_90BF_8ED2" name="remarks_over_70_insured">
                                <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                    &nbsp;
                                </SPAN>
                            </SPAN>
                            <SPAN
                                style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 533px; top: 351px; width:13px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                <INPUT tabindex="48" value="1" <?php echo old('remarks_more_than_twice_work') == '1' ? 'checked' : ''; ?>
                                    style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;"
                                    type="CHECKBOX" id="N41_005F_96BC_8FCC" name="remarks_more_than_twice_work">
                                <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                    &nbsp;
                                </SPAN>
                            </SPAN>
                            <SPAN
                                style="position:absolute; box-sizing:border-box; -moz-box-sizing:border-box; overflow:hidden; color:rgb(0, 0, 0); background-color:#ddeeff; left: 533px; top: 366.5px; width:13px; line-height:12px; height:12px; text-align:left; font-size:12px; font-family:'ＭＳ 明朝', serif; white-space:nowrap;">
                                <INPUT tabindex="48" value="1" <?php echo old('remarks_bonus_sum_in_months') == '1' ? 'checked' : ''; ?>
                                    style="position:absolute; top:1px; left:1px; box-sizing:border-box; -moz-box-sizing:border-box; width:10px; height:10px; margin:auto;"
                                    type="CHECKBOX" id="N42_005F_8F8A_8DDD_926E" name="remarks_bonus_sum_in_months">
                                <SPAN style="font-size:11px; height:11px; vertical-align:middle;">
                                    &nbsp;
                                </SPAN>
                            </SPAN>
                            <div class="egov-tool-field-origin" style="left: 602px; top: 380px;">
                                <input class="egov-tool-field-rect onImage" id="N43_947A_9242_8BC7_94D4"
                                    value="{{ old('remarks_first_payment_date') }}" name="remarks_first_payment_date"
                                    onfocus="addlength(this,2)"
                                    style="width: 50px; height: 16px; font-size: 10px; text-align: center; line-height: 16px; padding: inherit; background-color:#ddeeff;"
                                    type="text" />
                            </div>
                            <img alt="法令様式画像" src="{{ $dataUri }}" />
                        </div>
                    </div>
                    <script>
                        function addlength(ele, ml) {

                            var tmp = ele.getAttribute("maxlength")

                            if (tmp == null) {
                                ele.setAttribute("maxlength", ml);
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="egovui-dialog-content egovui-load-application-data egovui-add-form" style="display: none;">
    <div class="egovui-dialog-size" id="addForm"></div>
</div>
<div class="egovui-dialog-content egovui-load-application-data egovui-select-sign-target" style="display: none;">
    <div class="egovui-dialog-size" id="selectSignTarget"></div>
</div>
<div class="egovui-dialog-content egovui-load-application-data egovui-input-fee-info" style="display: none;">
    <div class="egovui-dialog-size" id="inputFeeInfo"></div>
</div>
<div class="egovui-dialog-content egovui-add-attachment" style="display: none;">
    <div class="egovui-dialog-size" id="addAttach"></div>
</div>
<div class="egovui-dialog-content egovui-load-application-data egovui-auth" style="display: none;">
    <div class="egovui-dialog-size" id="addAuth"></div>
</div>
<div class="egovui-dialog-content egovui-select-destination" style="display: none;">
    <div class="egovui-dialog-size">

        <div class="egovui-group-title">
            <h2 class="egovui-eyecatch">提出先選択</h2>
            <span class="egovui-eyecatch-description">
                大分類（都道府県など）から順に提出先を選択してください。<br>
                選択によっては中分類および小分類は存在しないことがあります。
            </span>
        </div>

        <div class="egovui-destination-category">
            <div class="egovui-category egovui-flex-column egovui-flex-fill">
                <label for="largeGroup">大分類</label> <select id="largeGroup" onchange="selectedMajor()">
                </select>
            </div>
            <div class="egovui-category egovui-flex-column">
                <label for="middleGroup">中分類</label> <select id="middleGroup" onchange="selectedmiddle()">
                </select>
            </div>
            <div class="egovui-category egovui-flex-column">
                <label for="smallGroup">小分類</label> <select id="smallGroup" onchange="selectedMinor()">
                </select>
            </div>
        </div>

        <div class="egovui-buttons">
            <button class="egovui-submit-button egovui-h36 egovui-gray egovui-dialog-close">キャンセル</button>
            <button id="setting-button" class="egovui-submit-button egovui-ml-auto egovui-h36 egovui-dialog-close"
                onclick="setSelectedPresentation()">設定</button>
        </div>
    </div>
</div>
