<x-layout title="帳票作成：雇用保険被保険者資格喪失届（離職票交付なし）">
    <section class="content">
        @slot('header')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <!-- 帳票用の共通CSSを読み込む -->
        <link rel="stylesheet" href="{{asset('/css/ledger-form.css')}}">

        <!-- ページ単位で追加分CSS -->
        <style type="text/css"></style>
        @endslot
        <h1>帳票：雇用保険被保険者資格喪失届（離職票交付なし）</h1>

        <!-- 入力エリア -->
        <div id="ledger-step1" class="step-view active my-2">
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
                                <x-form.employment_insured_status_acquisition_not_issued_separation_form />
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="prevew-btn">
                    <a id="ledger-back" class="ui button negative basic" type="button"
                        style="width: 200px;" href="{{ route('ledger.index') }}">戻る</a>
                    <button id="ledger-preview-btn" class="ui button primary" type="button"
                        style="width: 200px;">確認</button>
                </div>
            </form>
        </div>

        <!-- プレビューエリア -->
        <div id="ledger-step2" class="step-view my-2">
            <h2 style="text-align: center;">プレビュー</h2>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component>
                        <x-form.employment_insured_status_acquisition_not_issued_separation_form />
                    </div>
                </div>
            </div>
            <div class="submit-btn py-2">
                <button id="ledger-edit-btn" class="ui button" type="button" style="width: 200px;">修正</button>
                <button id="ledger-submit-btn" class="ui button yellow" type="button" style="width: 200px;">申請</button>
            </div>
        </div>

        <!-- 会社情報のセット ここから -->
        <script type="module">
            $(document).ready(function () {
                // 事業所名略称
                $('#J44_005F_8E96_8BC6_8F8A_96BC_97AA_8FCC').val('{{$company->name_abbreviation}}');
                // 届出年月日
                $('#J60_005F_944E').val('{{$today["year"]}}');
                $('#J61_005F_8C8E').val('{{$today["month"]}}');
                $('#J62_005F_93FA').val('{{$today["day"]}}');
                // 作成年月日
                $('#J71_005F_944E').val('{{$today["year"]}}');
                $('#J72_005F_8C8E').val('{{$today["month"]}}');
                $('#J73_005F_93FA').val('{{$today["day"]}}');
            });
        </script>
        <!-- 会社情報のセット ここまで -->

        <!-- 従業員・支店情報のセット ここから -->
        <script type="module">
            function insertDataFromEmployee(data) {
                const employee = data['employee'];
                const branch = data['branch'];
                const employeeName = (employee.last_name || "") + ' ' + (employee.first_name || "");
                const employeeNameKana = (employee.last_name_kana || "") + ' ' + (employee.first_name_kana || "");
                const employeeNameAlphabet = (employee.last_name_alphabet || "") + ' ' + (employee.first_name_alphabet || "");
                const branchAddress = (branch.address_prefecture || "") + ' ' + (branch.address_city || "") + ' ' + (branch.address_ward || "") + ' ' + (branch.address_apartment || "");
                const employeeAddress = (employee.address_prefecture || "") + ' ' + (employee.address_city || "") + ' ' + (employee.address_ward || "") + ' ' + (employee.address_apartment || "");

                let stay_date_period = new Date(employee.stay_date_period);

                // ここに従業員と紐づく支店情報をinputに入れる処理
                // 被保険者番号
                if (employee.employment_insured_no !== null) {
                    $('#J4_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.employment_insured_no.substring(0, 4));
                    $('#J5_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employee.employment_insured_no.substring(4, 10));
                    $('#J6_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employee.employment_insured_no.substring(10));
                }
                // 事業所番号
                if (branch.employment_insurance_office_no !== null) {
                    $('#J7_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(branch.employment_insurance_office_no.substring(0, 4));
                    $('#J8_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(branch.employment_insurance_office_no.substring(4, 10));
                    $('#J9_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(branch.employment_insurance_office_no.substring(10));
                }
                // 資格取得年月日
                // 離職年月日
                // 1週間の所定労働時間
                if (branch.agreed_hours_week !== null) {
                    let momentAgreedHoursWeek = moment(branch.agreed_hours_week, 'HH:mm:ss');
                    $('#J22_005F_8E9E_8AD4').val(momentAgreedHoursWeek.hours());
                    $('#J23_005F_95AA').val(momentAgreedHoursWeek.minutes());
                }
                // 個人番号
                $('#J27_005F_8CC2_906C_94D4_8D86').val(employee.mynumber_card_no || "");
                // 被保険者氏名
                $('#J29_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(employeeName);
                // 生年月日
                // 雇用形態
                // 被保険者氏名（ローマ字）
                $('#J47_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_838D_815B_837D_8E9A').val(employeeNameAlphabet);
                // 在留カード番号
                $('#J86_005F_8DDD_97AF_834A_815B_8368_94D4_8D86').val(employee.residence_card_no || "");
                // 在留期間
                if (stay_date_period !== null) {
                    $('#J49_005F_944E').val(stay_date_period.getFullYear());
                    $('#J50_005F_8C8E').val(stay_date_period.getMonth() + 1);
                    $('#J51_005F_93FA').val(stay_date_period.getDate());
                }
                // 在留資格
                $('#J55_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752').val(employee.residential_status_id || "");
                // 在留資格不明理由
                $('#J55_005F_8DDD_97AF_8E91_8A69_005F_9573_96BE_979D_9752').val(employee.residential_status_unknown_reason || "");
                // 被保険者住所
                $('#J45_005F_8F5A_8F8A_9694_82CD_8B8F_8F8A').val(employeeAddress);
                // 事業主住所
                $('#J63_005F_8F5A_8F8A').val(branchAddress);
                // 事業主氏名
                // 事業主電話番号
                $('#J65_005F_8E73_8A4F_8BC7_94D4').val(branch.tel_area_code || "");
                $('#J66_005F_8E73_93E0_8BC7_94D4').val(branch.tel_city_code || "");
                $('#J67_005F_89C1_93FC_8ED2_94D4_8D86').val(branch.tel_subscriber_code || "");

                // 社会保険労務士記載欄
                if ({{$current_employee->role_id}} === 500) {
                    // 提出代行者・事務代理者
                    $('#J74_005F_92F1_8F6F_91E3_8D73_8ED2_8E96_96B1_91E3_979D_8ED2_82CC_955C_8EA6').val('{{$current_employee->last_name ?: ''}}' + ' ' + '{{$current_employee->first_name ?: ''}}');
                    // 氏名
                    $('#J75_005F_8E81_96BC').val('{{$current_employee->last_name ?: ''}}' + ' ' + '{{$current_employee->first_name ?: ''}}');
                    // 電話番号
                    $('#J76_005F_8E73_8A4F_8BC7_94D4').val('{{$current_branch->tel_area_code ?: ''}}');
                    $('#J77_005F_8E73_93E0_8BC7_94D4').val('{{$current_branch->tel_city_code ?: ''}}');
                    $('#J78_005F_89C1_93FC_8ED2_94D4_8D86').val('{{$current_branch->tel_subscriber_code ?: ''}}');
                }
            }

            // 選択イベントを通してlivewireからデータを受け取る
            Livewire.on('onSelectEmployee', ({ data }) => {insertDataFromEmployee(data)});
        </script>
        <!-- 従業員・支店情報のセット ここまで -->

        @slot('footer')
        <!-- 帳票用の共通jsを読み込む -->
        <script src="{{asset('/js/ledger-form.js')}}" type="module"></script>
        @endslot
    </section>
</x-layout>
