<!-- 4950013520989000 -->
<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

            <style type="text/css"></style>
        @endslot
        <h1>{{ $procedureName }}</h1>
        <p>申請・届出に関する事項を入力してください。 </p>
        @if ($certificate == false)
            <div class="ui warning message" style="margin: 0;">
                <div class="header">
                    電子証明書が登録されていません
                </div>
            </div>
        @endif
        @if ($egovAcount == false)
            <div class="ui warning message" style="margin: 0;">
                <div class="header">
                    e-Govアカウントが連携されていません
                </div>
            </div>
        @endif

        <div id="ledger-step1" class="step-view active mb-2">
            <form id="ledger-form" action='' method="post" enctype="multipart/form-data">
                @csrf
                @if (session('errors'))
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
                                <div style="display: flex; justify-content: space-between;">
                                    <h2>70歳以上</h2>
                                    <div class="field four wide" style="margin-top: 5px;">
                                        <div class="ui toggle checkbox">
                                            <input id="over_70_check" type="checkbox" name="over_70_check" {{ old("over_70_check") ? 'checked' : '' }}>
                                            <label></label>
                                        </div>
                                    </div>
                                </div>
                                <p style="font-size: 12px; font-weight: 700;">70歳以上の方は下記のいずれかが必須です</p>
                                <div id="over_70" style="display: flex;">
                                    <div class="ui input" style="display: flex; flex-direction: column; width: 49%; margin-right: 2%;">
                                        <label style="font-size: 11.2px;">個人番号</label>
                                        <input id="personal_number" maxlength="12" type="text" placeholder="" name="my_number_or_basic_pension_number" value="{{ old('my_number_or_basic_pension_number') }}" value="">
                                    </div>
                                    <div class="ui input" style="display: flex; flex-direction: column; width: 49%;">
                                        <label style="font-size: 11.2px;">基礎年金番号</label>
                                        <input id="basic_pension_number" maxlength="10" type="text" placeholder="" name="basic_pension_number" value="{{ old('basic_pension_number') }}" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>添付ファイル</h2>
                                <x-ledger-attachment :file_original_names="[
                                    'wage_ledger' => '（様式1）年間報酬の平均で算定することの申立書',
                                    'attendance_record' => '（様式2）保険者算定申立に係る例年の状況、標準報酬月額の比較及び被保険者の同意書等',
                                    'other' => 'その他の添付書類',
                                ]" :extensions="'.csv,.jpg,.jpeg,.pdf'"
                                :separateDisabled="true" />
                            </div>
                        </div>
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>提出先選択</h2>
                                <livewire:submission-selector :mode="1" />
                            </div>
                        </div>
                    </div>
                    <div class="right-col">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <div class="ui bottom attached segment" data-tab="sample">
                                    <x-form.insured_person_monthly_remuneratio_basic_calculation_notification
                                        :dataUri="$dataUri" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="prevew-btn">
                    <a id="ledger-back" class="ui button negative basic" type="button" style="width: 200px;"
                        href="{{ route('ledger.index') }}">戻る</a>
                    @if ($certificate == false || $egovAcount == false)
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
                        <x-form.insured_person_monthly_remuneratio_basic_calculation_notification :dataUri="$dataUri" />
                    </div>
                </div>
            </div>
            <div class="submit-btn py-2">
                <button id="ledger-edit-btn" class="ui button" type="button" style="width: 200px;">修正</button>
                <button id="ledger-submit-btn" class="ui button yellow" type="button" style="width: 200px;">申請</button>
            </div>
        </div>

        <script type="module">
            $(document).ready(function() {
                $('#N3_005F_944E_8D86').val('{{ old('today_japan_era_year', $todaySet['year']) }}');
                $('#N4_005F_944E').val('{{ old('today_japan_era_month', $todaySet['month']) }}');
                $('#N5_005F_8C8E').val('{{ old('today_japan_era_date', $todaySet['date']) }}');

                @if ($current_employee->role_id === 500)
                    $('#N18_005F_8CC2_906C_94D4').val('{{ $current_employee->last_name }}' + '　' + '{{ $current_employee->first_name }}');
                    $('#N19_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C851').val('{{ $current_employee->labor_and_social_security_attorney_registration_no }}');
                @else
                    $('#N18_005F_8CC2_906C_94D4').prop('disabled', true);
                @endif

                checkOver70();
                $('#over_70_check').change(function(){
                    checkOver70();
                });
                $('#N55_005F_8E73_8A4F_8BC7_94D4').change(function(){
                    checkOver70_2();
                });
                function checkOver70() {
                    if($('#over_70_check').prop('checked')) {
                        $('#personal_number, #basic_pension_number').prop('disabled', false);
                    } else {
                        $('#personal_number, #basic_pension_number').prop('disabled', true); 
                        $('#personal_number, #basic_pension_number').val('');
                    }
                }
                function checkOver70_2() {
                    if($('#N55_005F_8E73_8A4F_8BC7_94D4').prop('checked')) {
                        $('#personal_number, #basic_pension_number').prop('disabled', false);
                    } else {
                        $('#personal_number, #basic_pension_number').prop('disabled', true); 
                        $('#personal_number, #basic_pension_number').val('');
                    }
                }
            });
            document.addEventListener('DOMContentLoaded', function() {
                const tabs = document.querySelectorAll('.ui.tabular.menu .item');
                const contents = document.querySelectorAll('.ui.bottom.attached.segment');
                tabs.forEach((tab, index) => {
                    tab.addEventListener('click', function() {
                        tabs.forEach((t) => t.classList.remove('active'));
                        tab.classList.add('active');
                        contents.forEach((c) => c.style.display = 'none');
                        contents[index].style.display = 'block';
                    });
                });
            });

            $(function(){
                $('#personal_number').change(function(){
                    $('#basic_pension_number').val('');
                });
                $('#basic_pension_number').change(function(){
                    $('#personal_number').val('');
                });
            });
            $(function(){
                var cb1 = $('#over_70_check'); 
                var cb2 = $('#N55_005F_8E73_8A4F_8BC7_94D4');
                cb1.change(function(){
                    if(cb1.prop('checked')){
                        cb2.prop('checked', true);
                    }else{
                        cb2.prop('checked', false);
                    }
                });
                cb2.change(function(){
                    if(cb2.prop('checked')){
                        cb1.prop('checked', true);
                    }else{
                        cb1.prop('checked', false);
                    }
                });
            });
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
                const employee = data['employee'];
                const branch = data['branch'];
                const headquarters = data['headquarters'];
                const birthdayConvertJapan = data['birthday_convert_japan'];
                const branch_prefecture_data = data['branch_prefecture_data'];
                var eraMapping = {
                    '明治': '1',
                    '大正': '3',
                    '昭和': '5',
                    '平成': '7',
                    '令和': '9',
                };
                var birthdayEraValue = birthdayConvertJapan['era'] ?? "";
                var birthdayEra = eraMapping[birthdayEraValue] ?? "";
                $('#N6_005F_93FA').val(branch.pension_office_reference_prefecture ?? '');
                $('#N7_005F_944E_8D86').val(branch.pension_office_reference_no_cities ?? '');
                $('#N8_005F_944E').val(branch.pension_office_reference_no_office ?? '');
                $('#N9_005F_8C8E0').val(branch.pension_office_no ?? '');
                if (branch.post_code !== null ?? branch.post_code.length == 7) {
                    $('#N9_005F_8C8E').val(branch.post_code.substring(0, 3));
                    $('#N10_005F_93FA').val(branch.post_code.substring(3, 7));
                } else {
                    $('#N9_005F_8C8E').val('');
                    $('#N10_005F_93FA').val('');
                }
                $('#N11_005F_94ED_95DB_8CAF_8ED2_8E81').val((branch_prefecture_data.name ?? '') + (branch
                    .address_city ?? '') + (branch.address_ward ?? '') + (branch.address_apartment ?? ''));
                $('#N12_005F_905C_90BF_8ED2_8E81').val(branch.name ?? '');
                $('#N15_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(branch.tel_area_code ?? '');
                $('#N16_005F_905C_90BF').val(branch.tel_city_code ?? '');
                $('#N17_005F_985A_8F5C_8DCE_82C9').val(branch.tel_subscriber_code ?? '');
                $('#N19_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employee.insurer_reference_no);
                $('#N20_005F_94ED_95DB_8CAF_8ED2_94D4_8D866').val((employee.last_name_kana ? employee.last_name_kana + '　' :
                    '') + (employee.first_name_kana ?? ''));
                $('#N21_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val((employee.last_name ? employee.last_name + '　' : '') + (
                    employee.first_name ?? ''));
                $('#N23__005F_94ED').val(birthdayEra);
                $('#N24_005F_8E96_8BC6').val(birthdayConvertJapan['year'] ?? "");
                $('#N25_005F_8E96_8BC6_8F8A').val(birthdayConvertJapan['month'] ?? "");
                $('#N26_005F_8E96_8BC6_8F8A_94D4').val(birthdayConvertJapan['day'] ?? "");
            }
            Livewire.on('onSelectEmployee', ({
                data
            }) => {
                insertDataFromEmployee(data)
            });
        </script>

        @slot('footer')
            <script src="{{ asset('/js/ledger-form.js') }}" type="module"></script>
        @endslot
    </section>
</x-layout>
