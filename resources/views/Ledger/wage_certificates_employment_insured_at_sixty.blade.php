<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
        <link rel="stylesheet" href="{{asset('/css/ledger-form.css')}}">

        <style type="text/css"></style>
        @endslot
        <h1 class="mt-2"> {{ $procedureName }}</h1>
        <p>申請・届出に関する事項を入力してください。<br>
            複数の様式を提出する場合は、タブから様式を切り替えてください。
        </p>
        @if($certificate == false)
        <div class="ui warning message" style="margin: 0;">
            <div class="header">
                電子証明書が登録されていません
            </div>
        </div>
        @endif

        <div id="ledger-step1" class="step-view active mb-2">
            <form id="ledger-form" action="" method="post" enctype="multipart/form-data">
                @csrf
                @if(session('errors'))
                <div class="ui error message">
                    <div class="header">入力エラー</div>
                    <ul class="list">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="ledger-twocol my-2">
                    <div class="left-col">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>社員選択</h2>
                                <livewire:ledger-employee-list />
                            </div>
                        </div>
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>添付ファイル</h2>
                                <x-ledger-attachment 
                                    :required_list="[
                                        'required_wage_payment_status']"
                                    :file_original_names="[
                                        'wage_payment_status' => '六十歳到達時等賃金証明書に記載された賃金支払い状況の内容が確認できる書類',
                                        'insured_age' => '被保険者の年齢が確認できる書類',
                                        'separation_form' => '直前の被保険者資格喪失の日前の賃金支払い状況を記した雇用保険被保険者離職票－２',
                                        'insured_period' => '被保険者期間等証明書',
                                        'passbook' => '払渡希望金融機関の口座に係る被保険者名義の通帳',
                                        'other' => 'その他の添付書類']"
                                    :extensions="'.doc,.docx,.jpg,.jpeg,.pdf,.xls,.xlsx'" />
                            </div>
                        </div>
                    </div>
                    <div class="right-col">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <div class="ui top attached tabular menu">
                                    <a class="item active" data-tab="sample">
                                        高年齢雇用継続給付受給資格確認票・<br>
                                        （初回）高年齢雇用継続給付支給申請書
                                    </a>
                                    <a class="item" data-tab="sample2">
                                        雇用保険被保険者<br>
                                        六十歳到達時等賃金証明書(安定所提出用)
                                    </a>
                                </div>
                                <div class="ui bottom attached segment" data-tab="sample">
                                    <x-form.first_senior_employment_continuation_benefit_claim_form />
                                </div>
                                <div class="ui bottom attached segment" data-tab="sample2" style="display: none;">
                                    <x-form.employment_insurance_insured_person_wage_certificate_at_sixty />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="prevew-btn">
                    <a id="ledger-back" class="ui button negative basic" type="button" style="width: 200px;"
                        href="{{ route('ledger.index') }}">戻る</a>
                    @if($certificate == false)
                    <button id="ledger-preview-btn" class="ui button primary" type="button" style="width: 200px;"
                        disabled>確認</button>
                    @else
                    <button id="ledger-preview-btn" class="ui button primary" type="button"
                        style="width: 200px;">確認</button>
                    @endif
                </div>
            </form>
        </div>

        <div id="ledger-step2" class="step-view my-2">
            <h2 style="text-align: center;">プレビュー</h2>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component>
                        <x-form.first_senior_employment_continuation_benefit_claim_form />
                    </div>
                </div>
            </div>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component>
                        <x-form.employment_insurance_insured_person_wage_certificate_at_sixty />
                    </div>
                </div>
            </div>
            <div class="submit-btn py-2">
                <button id="ledger-edit-btn" class="ui button" type="button" style="width: 200px;">修正</button>
                <button id="ledger-submit-btn" class="ui button yellow" type="button" style="width: 200px;">申請</button>
            </div>
        </div>

        <script type="module">
            $(document).ready(function () {
            $('#J63_005F_944E_8D86').val('{{ $todaySet['japanEra'] }}');
            $('#J64_005F_944E').val('{{ $todaySet['japanEraYear'] }}');
            $('#J65_005F_8C8E').val('{{ $todaySet['month'] }}');
            $('#J66_005F_93FA').val('{{ $todaySet['day'] }}');
            $('#J73_005F_944E_8D86').val('{{ $todaySet['japanEra'] }}');
            $('#J74_005F_944E').val('{{ $todaySet['japanEraYear'] }}');
            $('#J75_005F_8C8E').val('{{ $todaySet['month'] }}');
            $('#J76_005F_93FA').val('{{ $todaySet['day'] }}');
            @if($current_employee->role_id === 500)
            // $('#J112_005F_8DEC_90AC_944E_8C8E_93FA_005F_92F1_8F6F_91E3_8D73_8ED2').val('{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
            $('#J113_005F_8E81_96BC').val('{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
            $('#J114_005F_8E73_8A4F_8BC7_94D4').val('{{$current_employee->tel_area_code}}');
            $('#J115_005F_8E73_93E0_8BC7_94D4').val('{{$current_employee->tel_city_code}}');
            $('#J116_005F_89C1_93FC_8ED2_94D4_8D86').val('{{$current_employee->tel_subscriber_code}}');
            $('#J112_005F_8DEC_90AC_944E_8C8E_93FA_005F_92F1_8F6F_91E3_8D73_8ED2,\
                #J113_005F_8E81_96BC, #J114_005F_8E73_8A4F_8BC7_94D4, #J115_005F_8E73_93E0_8BC7_94D4, #J116_005F_89C1_93FC_8ED2_94D4_8D86').prop('readonly', true);
            $('#J64_005F_944E_8D86').val( '{{ old("laborConsultantJapanEra", $todaySet['japanEra']) }}' );
            $('#J65_005F_944E').val( '{{ old("laborConsultantJapanEraYear", $todaySet['japanEraYear']) }}' );
            $('#J66_005F_8C8E').val( '{{ old("laborConsultantMonth", $todaySet['month']) }}' );
            $('#J67_005F_93FA').val( '{{ old("laborConsultantDay", $todaySet['day']) }}' );
            // $('#J68_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6').val('{{$current_employee->last_name}}' + '　' + '{{$current_employee->first_name}}');
            $('#J65_005F_944E,#J66_005F_8C8E, #J67_005F_93FA, #J68_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6').prop('readonly', true);
            @else
            $('#J64_005F_944E_8D86').prop('disabled', true);
            $('#J112_005F_8DEC_90AC_944E_8C8E_93FA_005F_92F1_8F6F_91E3_8D73_8ED2,\
                #J113_005F_8E81_96BC, #J114_005F_8E73_8A4F_8BC7_94D4, #J115_005F_8E73_93E0_8BC7_94D4, #J116_005F_89C1_93FC_8ED2_94D4_8D86').prop('readonly', true);
            $('#J65_005F_944E,#J66_005F_8C8E, #J67_005F_93FA, #J68_005F_92F1_8F6F_91E3_8D73_8ED2_005F_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6,J73_005F_9574_8B4C_9793').prop('readonly', true);
            @endif
        });
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.ui.tabular.menu .item');
            const contents = document.querySelectorAll('.ui.bottom.attached.segment');
            tabs.forEach((tab, index) => {
                tab.addEventListener('click', function () {
                    tabs.forEach((t) => t.classList.remove('active'));
                    tab.classList.add('active');
                    contents.forEach((c) => c.style.display = 'none');
                    contents[index].style.display = 'block';
                });
            });
        });
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
            const inputForms = document.querySelectorAll('input, textarea, select');

            const employee = data['employee'];
            const branch = data['branch'];
            const headquarters = data['headquarters'];
            const company = data['company'];
            const todaySet = data['todaySet'];
            const birthdayConvertJapan = data['birthday_convert_japan'];
            var fullname_kana;
            var fullname;
            fullname_kana = ( employee.last_name_kana && employee.first_name_kana) ? (employee.last_name_kana + '　' + employee.first_name_kana) : "";
            $('#J122_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').val(fullname_kana) ?? "";
            $('#J78_005F_905C_90BF_8ED2_8E81_96BC_005F_8374_838A_834B_8369').val(fullname_kana) ?? "";
            $('#J8_005F_8374_838A_834B_8369').val(fullname_kana) ?? "";
            fullname = ( employee.last_name && employee.first_name) ? (employee.last_name + '　' + employee.first_name ) : "";
            $('#J121_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(fullname) ?? "";
            $('#J79_005F_905C_90BF_8ED2_8E81_96BC').val(fullname) ?? "";
            $('#J9_005F_985A_8F5C_8DCE_82C9_9242_82B5_82BD_8ED2_82CC_8E81_96BC').val(fullname) ?? "";

            $('#J119_005F_8CC2_906C_94D4_8D86').val(employee.mynumber_card_no) ?? "";
            var employmentInsuredNo = employee.employment_insured_no;
            var isValidEmploymentInsuredNo = employmentInsuredNo && employmentInsuredNo.length === 11;
            var employmentInsuredNo4digit = isValidEmploymentInsuredNo ? employmentInsuredNo.substring(0, 4) : "";
            var employmentInsuredNo6digit = isValidEmploymentInsuredNo ? employmentInsuredNo.substring(4, 10) : "";
            var employmentInsuredNoCD = isValidEmploymentInsuredNo ? employmentInsuredNo.substring(10, 11) : "";
            $('#J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employmentInsuredNo4digit);
            $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employmentInsuredNo6digit);
            $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employmentInsuredNoCD);
            $('#J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85_2nd').val(employmentInsuredNo4digit);
            $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85_2nd').val(employmentInsuredNo6digit);
            $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD_2nd').val(employmentInsuredNoCD);

            var employmentInsuranceOfficeNo = employee.employment_insurance_office_no;
            var isValidemploymentInsuranceOfficeNo = employmentInsuranceOfficeNo && employmentInsuranceOfficeNo.length === 11;
            var employmentInsuranceOfficeNo4digit = isValidemploymentInsuranceOfficeNo ? employmentInsuranceOfficeNo.substring(0, 4) : "";
            var employmentInsuranceOfficeNo6digit = isValidemploymentInsuranceOfficeNo ? employmentInsuranceOfficeNo.substring(4, 10) : "";
            var employmentInsuranceOfficeNoCD = isValidemploymentInsuranceOfficeNo ? employmentInsuranceOfficeNo.substring(10, 11) : "";
            $('#J10_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(employmentInsuranceOfficeNo4digit);
            $('#J11_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(employmentInsuranceOfficeNo6digit);
            $('#J12_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(employmentInsuranceOfficeNoCD);
            $('#J5_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(employmentInsuranceOfficeNo4digit);
            $('#J6_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(employmentInsuranceOfficeNo6digit);
            $('#J7_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(employmentInsuranceOfficeNoCD);

            if ( headquarters.tel_area_code && headquarters.tel_city_code && headquarters.tel_subscriber_code ){
                $('#J68_005F_8E73_8A4F_8BC7_94D4').val(headquarters.tel_area_code);
                $('#J69_005F_8E73_93E0_8BC7_94D4').val(headquarters.tel_city_code);
                $('#J70_005F_89C1_93FC_8ED2_94D4_8D86').val(headquarters.tel_subscriber_code);
            }else{
                $('#J68_005F_8E73_8A4F_8BC7_94D4').val("");
                $('#J69_005F_8E73_93E0_8BC7_94D4').val("");
                $('#J70_005F_89C1_93FC_8ED2_94D4_8D86').val("");
            }

            if ( headquarters.address_prefecture && headquarters.address_city && headquarters.address_ward && headquarters.address_apartment ){
                $('#J67_005F_8E96_8BC6_8F8A_96BC_005F_8F8A_8DDD_926E').val(headquarters.address_prefecture + headquarters.address_city + headquarters.address_ward + headquarters.address_apartment);
                $('#J29_005F_8F5A_8F8A').val(headquarters.address_prefecture + headquarters.address_city + headquarters.address_ward + headquarters.address_apartment);
            }else{
                $('#J67_005F_8E96_8BC6_8F8A_96BC_005F_8F8A_8DDD_926E').val("");
                $('#J29_005F_8F5A_8F8A').val("");
            }
            if ( employee.address_prefecture && employee.address_city && employee.address_ward && employee.address_apartment ){
                $('#J120_005F_905C_90BF_8ED2_8F5A_8F8A').val(employee.address_prefecture + employee.address_city + employee.address_ward + employee.address_apartment);
            }else{
                $('#J120_005F_905C_90BF_8ED2_8F5A_8F8A').val("");
            }
            if ( branch.name && branch.address_prefecture && branch.address_city && branch.address_ward && branch.address_apartment ){
                $('#J10_005F_96BC_8FCC').val(branch.name);
                $('#J11_005F_8F8A_8DDD_926E').val(branch.address_prefecture + branch.address_city + branch.address_ward + branch.address_apartment);
            }else{
                $('#J10_005F_96BC_8FCC').val("");
                $('#J11_005F_8F8A_8DDD_926E').val("");
            }

            var postCode = employee.post_code;
            if ( postCode && postCode.length === 7 ){
                var postCodeFormer = postCode.substring(0, 3);
                var postCodeLatter = postCode.substring(3, 7);
            }else{
                var postCodeFormer = "";
                var postCodeLatter = "";
            }
            $('#J15_005F_947A_9242_8BC7_94D4_8D86').val(postCodeFormer);
            $('#J16_005F_92AC_88E6_94D4_8D86').val(postCodeLatter);

            if ( branch.tel_area_code && branch.tel_city_code && branch.tel_subscriber_code ){
                $('#J12_005F_8E73_8A4F_8BC7_94D4').val(branch.tel_area_code);
                $('#J13_005F_8E73_93E0_8BC7_94D4').val(branch.tel_city_code);
                $('#J14_005F_89C1_93FC_8ED2_94D4_8D86').val(branch.tel_subscriber_code);
            }else{
                $('#J12_005F_8E73_8A4F_8BC7_94D4').val("");
                $('#J13_005F_8E73_93E0_8BC7_94D4').val("");
                $('#J14_005F_89C1_93FC_8ED2_94D4_8D86').val("");
            }
            if ( employee.tel_area_code && employee.tel_city_code && employee.tel_subscriber_code ){
                $('#J18_005F_8E73_8A4F_8BC7_94D4').val(employee.tel_area_code);
                $('#J19_005F_8E73_93E0_8BC7_94D4').val(employee.tel_city_code);
                $('#J20_005F_89C1_93FC_8ED2_94D4_8D86').val(employee.tel_subscriber_code);
            }else{
                $('#J18_005F_8E73_8A4F_8BC7_94D4').val("");
                $('#J19_005F_8E73_93E0_8BC7_94D4').val("");
                $('#J20_005F_89C1_93FC_8ED2_94D4_8D86').val("");
            }
            if ( employee.address_prefecture && employee.address_city && employee.address_ward && employee.address_apartment ){
                $('#J17_005F_8F5A_8F8A').val(employee.address_prefecture + employee.address_city + employee.address_ward + employee.address_apartment);
            }else{
                $('#J17_005F_8F5A_8F8A').val("");
            }
            if ( birthdayConvertJapan['era'] === '昭和' ) {
                $('#J26_005F_944E').val(birthdayConvertJapan['year'] ?? "");
                $('#J27_005F_8C8E').val(birthdayConvertJapan['month'] ?? "");
                $('#J28_005F_93FA').val(birthdayConvertJapan['day'] ?? "");
            }
        }
        document.getElementById('J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').addEventListener('input', function() {
            document.getElementById('J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85_2nd').value = this.value;
        });
        document.getElementById('J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').addEventListener('input', function() {
            document.getElementById('J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85_2nd').value = this.value;
        });
        document.getElementById('J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').addEventListener('input', function() {
            document.getElementById('J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD_2nd').value = this.value;
        });

        document.getElementById('J10_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').addEventListener('input', function() {
            document.getElementById('J5_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').value = this.value;
        });
        document.getElementById('J11_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').addEventListener('input', function() {
            document.getElementById('J6_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').value = this.value;
        });
        document.getElementById('J12_005F_8E96_8BC6_8F8A_94D4_8D86CD').addEventListener('input', function() {
            document.getElementById('J7_005F_8E96_8BC6_8F8A_94D4_8D86CD').value = this.value;
        });

        document.getElementById('J121_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').addEventListener('input', function() {
            document.getElementById('J9_005F_985A_8F5C_8DCE_82C9_9242_82B5_82BD_8ED2_82CC_8E81_96BC').value = this.value;
        });
        document.getElementById('J122_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').addEventListener('input', function() {
            document.getElementById('J8_005F_8374_838A_834B_8369').value = this.value;
        });
        document.getElementById('J67_005F_8E96_8BC6_8F8A_96BC_005F_8F8A_8DDD_926E').addEventListener('input', function() {
            document.getElementById('J29_005F_8F5A_8F8A').value = this.value;
        });
        document.getElementById('J71_005F_8E96_8BC6_8EE5_8E81_96BC').addEventListener('input', function() {
            document.getElementById('J30_005F_8E81_96BC').value = this.value;//
        });

        document.getElementById('J113_005F_8E81_96BC').addEventListener('input', function() {
            document.getElementById('J69_005F_8E81_96BC').value = this.value;
        });
        document.getElementById('J114_005F_8E73_8A4F_8BC7_94D4').addEventListener('input', function() {
            document.getElementById('J70_005F_8E73_8A4F_8BC7_94D4').value = this.value;
        });
        document.getElementById('J115_005F_8E73_93E0_8BC7_94D4').addEventListener('input', function() {
            document.getElementById('J71_005F_8E73_93E0_8BC7_94D4').value = this.value;
        });
        document.getElementById('J116_005F_89C1_93FC_8ED2_94D4_8D86').addEventListener('input', function() {
            document.getElementById('J72_005F_89C1_93FC_8ED2_94D4_8D86').value = this.value;
        });
        Livewire.on('onSelectEmployee', ({ data }) => {insertDataFromEmployee(data)});J113_005F_8E81_96BC
        </script>

        @slot('footer')
        <script src="{{asset('/js/ledger-form.js')}}" type="module"></script>
        @endslot
    </section>
</x-layout>
