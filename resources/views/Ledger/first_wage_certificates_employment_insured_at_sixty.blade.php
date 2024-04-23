<x-layout title="雇用保険被保険者六十歳到達時等賃金証明書の提出及び高年齢雇用継続給付受給資格確認・高年齢雇用継続給付（高年齢雇用継続基本給付金・高年齢再就職給付金）の申請（初回申請）（令和４年６月以降手続き）">
    <section class="content">
        @slot('header')
        <link rel="stylesheet" href="{{asset('/css/ledger-form.css')}}">

        <style type="text/css"></style>
        @endslot
        <h1 class="mt-2">雇用保険被保険者六十歳到達時等賃金証明書の提出及び高年齢雇用継続給付受給資格確認・高年齢雇用継続給付（高年齢雇用継続基本給付金・高年齢再就職給付金）の申請（初回申請）（令和４年６月以降手続き）</h1>
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
            <form id="ledger-form" action="" method="post">
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
            const employee = data['employee'];
            const branch = data['branch'];
            const headquarters = data['headquarters'];
            const company = data['company'];
            if ( employee.employment_insured_no !== null && employee.employment_insured_no.length == 11 ) {
                $('#J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.substring(0, 4));
                $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.substring(4, 10));
                $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.substring(10, 11));
                $('#J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85_2nd').val(employee.employment_insured_no.substring(0, 4));
                $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85_2nd').val(employee.employment_insured_no.substring(4, 10));
                $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD_2nd').val(employee.employment_insured_no.substring(10, 11));
            }else{
                $('#J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val("");
                $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val("");
                $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val("");
                $('#J2_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85_2nd').val("");
                $('#J3_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85_2nd').val("");
                $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD_2nd').val("");
            }
            if ( employee.employment_insurance_office_no !== null && employee.employment_insurance_office_no.length == 11 ) {
                $('#J10_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(employee.employment_insurance_office_no.substring(0, 4));
                $('#J11_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(employee.employment_insurance_office_no.substring(4, 10));
                $('#J12_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(employee.employment_insurance_office_no.substring(10, 11));
                $('#J5_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(employee.employment_insurance_office_no.substring(0, 4));
                $('#J6_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(employee.employment_insurance_office_no.substring(4, 10));
                $('#J7_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(employee.employment_insurance_office_no.substring(10, 11));
            }else{
                $('#J10_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val("");
                $('#J11_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val("");
                $('#J12_005F_8E96_8BC6_8F8A_94D4_8D86CD').val("");
                $('#J5_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val("");
                $('#J6_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val("");
                $('#J7_005F_8E96_8BC6_8F8A_94D4_8D86CD').val("");
            }
            if ( employee.post_code !== null && employee.post_code.length == 7 ) {
                $('#J15_005F_947A_9242_8BC7_94D4_8D86').val(employee.post_code.substring(0, 3));
                $('#J16_005F_92AC_88E6_94D4_8D86').val(employee.post_code.substring(3, 7));
            }else{
                $('#J15_005F_947A_9242_8BC7_94D4_8D86').val("");
                $('#J16_005F_92AC_88E6_94D4_8D86').val("");
            }
            if ( employee.post_code !== null ) {
                var dateParts = employee.birthday.split('-');
                $('#J26_005F_944E').val(parseInt(dateParts[0]));
                $('#J27_005F_8C8E').val(parseInt(dateParts[1]));
                $('#J28_005F_93FA').val(parseInt(dateParts[2]));
            }else{
                $('#J26_005F_944E').val("");
                $('#J27_005F_8C8E').val("");
                $('#J28_005F_93FA').val("");
            }
            $('#J119_005F_8CC2_906C_94D4_8D86').val(employee.mynumber_card_no || '');
            $('#J68_005F_8E73_8A4F_8BC7_94D4').val(headquarters.tel_area_code || '');
            $('#J69_005F_8E73_93E0_8BC7_94D4').val(headquarters.tel_city_code || '');
            $('#J70_005F_89C1_93FC_8ED2_94D4_8D86').val(headquarters.tel_subscriber_code || '');
            $('#J10_005F_96BC_8FCC').val(branch.name || '');
            $('#J12_005F_8E73_8A4F_8BC7_94D4').val(branch.tel_area_code || '');
            $('#J13_005F_8E73_93E0_8BC7_94D4').val(branch.tel_city_code || '');
            $('#J14_005F_89C1_93FC_8ED2_94D4_8D86').val(branch.tel_subscriber_code || '');
            $('#J18_005F_8E73_8A4F_8BC7_94D4').val(employee.tel_area_code || '');
            $('#J19_005F_8E73_93E0_8BC7_94D4').val(employee.tel_city_code || '');
            $('#J20_005F_89C1_93FC_8ED2_94D4_8D86').val(employee.tel_subscriber_code || '');
            const employeeAddress = (employee.address_prefecture || "") + (employee.address_city || "") + (employee.address_ward || "") + (employee.address_apartment || "");
            $('#J120_005F_905C_90BF_8ED2_8F5A_8F8A').val(employeeAddress);
            $('#J17_005F_8F5A_8F8A').val(employeeAddress);
            const headquartersAddress = (headquarters.address_prefecture || "") + (headquarters.address_city || "") + (headquarters.address_ward || "") + (headquarters.address_apartment || "");
            $('#J67_005F_8E96_8BC6_8F8A_96BC_005F_8F8A_8DDD_926E').val(headquartersAddress);
            $('#J29_005F_8F5A_8F8A').val(headquartersAddress);
            const branchAddress = (branch.address_prefecture || "") + (branch.address_city || "") + (branch.address_ward || "") + (branch.address_apartment || "");
            $('#J11_005F_8F8A_8DDD_926E').val(branchAddress);
            const fullname = (employee.last_name || "") + "　" + (employee.first_name || "");
            $('#J121_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(fullname);
            $('#J79_005F_905C_90BF_8ED2_8E81_96BC').val(fullname);
            $('#J8_005F_8374_838A_834B_8369').val(fullname);
            const fullnameKana = (employee.last_name_kana || "") + "　" + (employee.first_name_kana || "");
            $('#J122_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').val(fullnameKana);
            $('#J78_005F_905C_90BF_8ED2_8E81_96BC_005F_8374_838A_834B_8369').val(fullnameKana);
            $('#J9_005F_985A_8F5C_8DCE_82C9_9242_82B5_82BD_8ED2_82CC_8E81_96BC').val(fullnameKana);
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
        document.getElementById('J121_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').addEventListener('input', function() {
            document.getElementById('J9_005F_985A_8F5C_8DCE_82C9_9242_82B5_82BD_8ED2_82CC_8E81_96BC').value = this.value;
            document.getElementById('J79_005F_905C_90BF_8ED2_8E81_96BC').value = this.value;
        });
        document.getElementById('J122_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').addEventListener('input', function() {
            document.getElementById('J8_005F_8374_838A_834B_8369').value = this.value;
            document.getElementById('J78_005F_905C_90BF_8ED2_8E81_96BC_005F_8374_838A_834B_8369').value = this.value;
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
        document.getElementById('J67_005F_8E96_8BC6_8F8A_96BC_005F_8F8A_8DDD_926E').addEventListener('input', function() {
            document.getElementById('J29_005F_8F5A_8F8A').value = this.value;
        });
        document.getElementById('J71_005F_8E96_8BC6_8EE5_8E81_96BC').addEventListener('input', function() {
            document.getElementById('J30_005F_8E81_96BC').value = this.value;
        });
        document.getElementById('J120_005F_905C_90BF_8ED2_8F5A_8F8A').addEventListener('input', function() {
            document.getElementById('J17_005F_8F5A_8F8A').value = this.value;
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

        Livewire.on('onSelectEmployee', ({ data }) => {insertDataFromEmployee(data)});
        </script>

        @slot('footer')
        <script src="{{asset('/js/ledger-form.js')}}" type="module"></script>
        @endslot
    </section>
</x-layout>
