<x-layout title="健康保険・厚生年金保険被保険者資格喪失届（単記用）（２０１９年５月以降手続き）">
    <section class="content">
        @slot('header')
        <link rel="stylesheet" href="{{asset('/css/ledger-form.css')}}">

        <style type="text/css">
            .preview-area input.checkboxs {
                background-color: rgb(255, 255, 255) !important;
            }
        </style>
        @endslot
        <h1 class="mt-2">健康保険・厚生年金保険被保険者資格喪失届（単記用）（２０１９年５月以降手続き）</h1>
        <p>申請・届出に関する事項を入力してください。<br>
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
                                        'required_insurance',
                                        'required_dependent']"
                                    :file_original_names="[
                                        'insurance' => '被保険者証',
                                        'dependent' => '被扶養者証',
                                        'load' => '標準負担額減額認定証',
                                        'medical_treatment' => '特定疾病療養受療証',
                                        'old_age' => '高齢受給者証',
                                        'unrecoverable' => '被保険者証回収不能届',
                                        'other' => 'その他の添付書類']"
                                    :extensions="'.jpg,.jpeg,.pdf'" />
                            </div>
                        </div>
                    </div>
                    <div class="right-col">
                        <div class="ui card card-shadow">
                            <div class="content" style="margin-bottom: 20px;">
                                <x-form.health_insurance_pension_insured_qualification_loss :dataUri="$dataUri" />
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
                        <x-form.health_insurance_pension_insured_qualification_loss :dataUri="$dataUri" />
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
            $('#N6_P1').val('{{ $todaySet["year"] }}');
            $('#N7_P1').val('{{ $todaySet["month"] }}');
            $('#N8_P1').val('{{ $todaySet["day"] }}');
        });
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
            const employee = data['employee'];
            const branch = data['branch'];
            if( employee.birthday != null ){
                var date_parts = employee.birthday.split('-');
                var birthday_year = parseInt(date_parts[0]);
                var birthday_month = parseInt(date_parts[1]);
                var birthday_day = parseInt(date_parts[2]);
                // 年号メソッドで年号と年を対応
                // $('#N27_P1').val(年号);
                // $('#N28_P1').val(年);
                $('#N29_P1').val(birthday_month);
                $('#N30_P1').val(birthday_day);
            }else{
                $('#N27_P1').val("昭和");
                $('#N28_P1').val("");
                $('#N29_P1').val("");
                $('#N30_P1').val("");
            }
            if( employee.insurance_loss_date != null ){
                var insurance_loss_date_parts = employee.insurance_loss_date.split('-');
                var insurance_loss_date_year = parseInt(insurance_loss_date_parts[0]);
                var insurance_loss_date_month = parseInt(insurance_loss_date_parts[1]);
                var insurance_loss_date_day = parseInt(insurance_loss_date_parts[2]);
                // 年号メソッドで年号と年を対応
                // $('#N33_P1').val(年号);
                // $('#N34_P1').val(年);
                $('#N35_P1').val(insurance_loss_date_month);
                $('#N36_P1').val(insurance_loss_date_day);
            }else{
                $('#N33_P1').val("");
                $('#N34_P1').val("");
                $('#N35_P1').val("");
                $('#N36_P1').val("");
            }

            if( employee.over_70_non_applicable_date != null ){
                var over_70_non_applicable_date_parts = employee.over_70_non_applicable_date.split('-');
                var over_70_non_applicable_date_year = parseInt(over_70_non_applicable_date_parts[0]);
                var over_70_non_applicable_date_month = parseInt(over_70_non_applicable_date_parts[1]);
                var over_70_non_applicable_date_day = parseInt(over_70_non_applicable_date_parts[2]);
                // 年号メソッドで年号と年を対応
                // $('#N56_P1').val(年号);
                // $('#N57_P1').val(年);
                $('#N58_P1').val(over_70_non_applicable_date_month);
                $('#N59_P1').val(over_70_non_applicable_date_day);
            }else{
                $('#N56_P1').val("");
                $('#N57_P1').val("");
                $('#N58_P1').val("");
                $('#N59_P1').val("");
            }
            $('#N9_P1').val(employee.pension_office_reference_prefecture || '');
            $('#N10_P1').val(employee.pension_office_reference_no_cities || '');
            $('#N11_P1').val(employee.pension_office_reference_no_office || '');
            $('#N12_P1').val(branch.insurance_office_no || '');

            if( branch.post_code != null && employee.post_code.length == 7 ) {
                $('#N13_P1').val(branch.post_code.substring(0, 3));
                $('#N14_P1').val(branch.post_code.substring(3, 7));
            }else{
                $('#N13_P1').val("");
                $('#N14_P1').val("");
            }
            $('#N15_P1').val(branch.address_prefecture+branch.address_city+branch.address_ward+branch.address_apartment || '');
            $('#N16_P1').val(branch.name || '');
            $('#N19_P1').val(branch.tel_area_code || '');
            $('#N20_P1').val(branch.tel_city_code || '');
            $('#N21_P1').val(branch.tel_subscriber_code || '');
            const employeeNameKana = (employee.last_name_kana || "") + '　' + (employee.first_name_kana || "");
            const employeeName = (employee.last_name || "") + '　' + (employee.first_name || "");
            $('#N24_P1').val(employeeNameKana);
            $('#N25_P1').val(employeeName);
            $('#N31_P1').val(employee.mynumber_card_no || '');

            if( employee.over_retired_insurance_loss_reason === 4 && employee.retirement_date != null ){
                var retirement_date_parts = employee.retirement_date.split('-');
                var retirement_date_year = parseInt(retirement_date_parts[0]);
                var retirement_date_month = parseInt(retirement_date_parts[1]);
                var retirement_date_day = parseInt(retirement_date_parts[2]);
                $('#N37_P1_0').prop("checked", true);
                // 年号メソッドで年号と年を対応
                // $('#N39_P1').val(年号);
                // $('#N40_P1').val(年);
                $('#N41_P1').val(retirement_date_month);
                $('#N42_P1').val(retirement_date_day);
            } else if( employee.over_retired_insurance_loss_reason === 5 && employee.passed_away_date != null ){
                var passed_away_date_parts = employee.passed_away_date.split('-');
                var passed_away_date_year = parseInt(passed_away_date_parts[0]);
                var passed_away_date_month = parseInt(passed_away_date_parts[1]);
                var passed_away_date_day = parseInt(passed_away_date_parts[2]);
                $('#N37_P1_1').prop("checked", true);
                // 年号メソッドで年号と年を対応
                // $('#N44_P1').val(年号);
                // $('#N45_P1').val(年);
                $('#N46_P1').val(passed_away_date_month);
                $('#N47_P1').val(passed_away_date_day);
            } else if(employee.over_retired_insurance_loss_reason === 7){
                $('#N37_P1_2').prop("checked", true);
            } else if(employee.over_retired_insurance_loss_reason === 9){
                $('#N37_P1_3').prop("checked", true);
            } else if(employee.over_retired_insurance_loss_reason === 11){
                $('#N37_P1_4').prop("checked", true);
            }
            if(employee.over_70_applicable_flg === 0){
                $('#N54_P1').prop("checked", true);
                $('#N58_P1').val(over_70_non_applicable_date_month);
                $('#N59_P1').val(over_70_non_applicable_date_day);
            }
        }
        Livewire.on('onSelectEmployee', ({ data }) => {insertDataFromEmployee(data)});
        </script>

        @slot('footer')
        <script src="{{asset('/js/ledger-form.js')}}" type="module"></script>
        @endslot
    </section>
</x-layout>
