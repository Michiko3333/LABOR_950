<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

            <style type="text/css"></style>
        @endslot
        <h1 class="mt-2">{{ $procedureName }}</h1>
        @if ($certificate == false)
            <div class="ui warning message" style="margin: 0;">
                <div class="header">
                    電子証明書が登録されていません
                </div>
            </div>
        @endif

        <div id="ledger-step1" class="step-view active mb-2">
            <form id="ledger-form" action="" method="post" enctype="multipart/form-data">
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
                                <h2>添付ファイル</h2>
                                <x-ledger-attachment :file_original_names="[
                                    'wage_ledger' => '賃金台帳のコピー',
                                    'attendance_record' => '出勤簿のコピー',
                                    'other' => 'その他の添付書類',
                                ]" :extensions="'.jpg,.jpeg,.pdf'" />
                            </div>
                        </div>
                    </div>
                    <div class="right-col">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <x-form.health_insurance_employee_pension_insurance_monthly_remuneration_change_notification
                                    :dataUri="$dataUri" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="prevew-btn">
                    <a id="ledger-back" class="ui button negative basic" type="button" style="width: 200px;"
                        href="{{ route('ledger.index') }}">戻る</a>
                    @if ($certificate == false)
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
                        <x-form.health_insurance_employee_pension_insurance_monthly_remuneration_change_notification
                            :dataUri="$dataUri" />
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
                $('#N4_005F_944E').val('{{ old('today_year', $todaySet['year']) }}');
                $('#N5_005F_8C8E').val('{{ old('today_month', $todaySet['month']) }}');
                $('#N6_005F_93FA').val('{{ old('today_date', $todaySet['date']) }}');
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
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
                const employee = data['employee'];
                const branch = data['branch'];
                const headquarters = data['headquarters'];
                const birthdayConvertJapan = data['birthday_convert_japan'];
                var eraMapping = {
                    '明治': '1',
                    '大正': '3',
                    '昭和': '5',
                    '平成': '7',
                    '令和': '9',
                };
                var birthdayEraValue = birthdayConvertJapan['era'] ?? "";
                var birthdayEra = eraMapping[birthdayEraValue] ?? "";
                $('#N7_005F_944E_8D86').val(headquarters.pension_office_reference_prefecture || '');
                $('#N8_005F_944E').val(headquarters.pension_office_reference_no_cities || '');
                $('#N9_005F_8C8E').val(headquarters.pension_office_reference_no_office || '');
                if (headquarters.post_code !== null && headquarters.post_code.length == 7) {
                    $('#N10_005F_93FA').val(headquarters.post_code.substring(0, 3));
                    $('#N11_005F_94ED_95DB_8CAF_8ED2_8E81').val(headquarters.post_code.substring(3, 7));
                }
                const branchAddress = (headquarters.address_prefecture || "") + (headquarters.address_city || "") + (
                    headquarters.address_ward || "") + (headquarters.address_apartment || "");
                $('#N12_005F_905C_90BF_8ED2_8E81').val(branchAddress);
                $('#N13_005F_8374_838A_834B_8369').val(headquarters.name || '');
                $('#N16_005F_905C_90BF').val(headquarters.tel_area_code || '');
                $('#N17_005F_985A_8F5C_8DCE_82C9').val(headquarters.tel_city_code || '');
                $('#N18_005F_8CC2_906C_94D4').val(headquarters.tel_subscriber_code || '');
                const employeeNameKana = (employee.last_name_kana ? employee.last_name_kana + '　' : "") + (employee
                    .first_name_kana || "");
                const employeeName = (employee.last_name ? employee.last_name + '　' : "") + (employee.first_name || "");
                $('#N20_005F_94ED_95DB_8CAF_8ED2_94D4_8D866').val(employee.insurer_reference_no || '');
                $('#N21_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employeeNameKana);
                $('#N23__005F_94ED').val(employeeName);
                $('#N24_005F_8E96_8BC6').val(birthdayEra);
                $('#N25_005F_8E96_8BC6_8F8A').val(birthdayConvertJapan['year'] ?? "");
                $('#N26_005F_8E96_8BC6_8F8A_94D4').val(birthdayConvertJapan['month'] ?? "");
                $('#N28_8D864_8C85').val(birthdayConvertJapan['day'] ?? "");
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
