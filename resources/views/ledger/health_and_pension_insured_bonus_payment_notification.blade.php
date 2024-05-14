<!-- 4950013520991000 -->
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
        @if($egovAcount == false)
        <div class="ui warning message" style="margin: 0;">
            <div class="header">
                e-Govアカウントが連携されていません
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
                                    'other' => 'その他の添付書類',
                                ]" :extensions="'.jpg,.jpeg,.pdf'" />
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
                                <x-form.health_and_pension_insured_bonus_payment_notification :dataUri="$dataUri" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="prevew-btn">
                    <a id="ledger-back" class="ui button negative basic" type="button" style="width: 200px;"
                        href="{{ route('ledger.index') }}">戻る</a>
                    @if($certificate == false || $egovAcount == false)
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
                        <x-form.health_and_pension_insured_bonus_payment_notification :dataUri="$dataUri" />
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
                $('#N6_005F_93FA').val('{{ old('today_year', $todaySet['year']) }}');
                $('#N7_005F_944E_8D86').val('{{ old('today_month', $todaySet['month']) }}');
                $('#N8_005F_944E').val('{{ old('today_date', $todaySet['date']) }}');
            });
        </script>

        <script type="module">
            function insertDataFromEmployee(data) {
                const employee = data['employee'];
                const branch = data['branch'];
                const headquarters = data['headquarters'];
                const birthdayConvertJapan = data['birthday_convert_japan'];
                const headquarters_prefecture_data = data['headquarters_prefecture_data'];
                var eraMapping = {
                    '明治': '1',
                    '大正': '3',
                    '昭和': '5',
                    '平成': '7',
                    '令和': '9',
                };
                var birthdayEraValue = birthdayConvertJapan['era'] ?? "";
                var birthdayEra = eraMapping[birthdayEraValue] ?? "";
                $('#N9_005F_8C8E').val(headquarters.pension_office_reference_prefecture || '');
                $('#N10_005F_93FA').val(headquarters.pension_office_reference_no_cities || '');
                $('#N11_005F_94ED_95DB_8CAF_8ED2_8E81').val(headquarters.pension_office_reference_no_office || '');
                if (headquarters.post_code !== null && headquarters.post_code.length == 7) {
                    $('#N12_005F_905C_90BF_8ED2_8E81').val(headquarters.post_code.substring(0, 3));
                    $('#N13_005F_8374_838A_834B_8369').val(headquarters.post_code.substring(3, 7));
                }
                const branchAddress = (headquarters_prefecture_data.name || "") + (headquarters.address_city || "") + (
                    headquarters.address_ward || "") + (headquarters.address_apartment || "");
                $('#N15_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(branchAddress);
                $('#N16_005F_905C_90BF').val(headquarters.name || '');
                $('#N18_005F_8CC2_906C_94D4').val(headquarters.tel_area_code || '');
                $('#N19_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(headquarters.tel_city_code || '');
                $('#N20_005F_94ED_95DB_8CAF_8ED2_94D4_8D866').val(headquarters.tel_subscriber_code || '');
                const employeeNameKana = (employee.last_name_kana ? employee.last_name_kana + '　' : "") + (employee
                    .first_name_kana || "");
                const employeeName = (employee.last_name ? employee.last_name + '　' : "") + (employee.first_name || "");
                $('#N23_005F_94ED').val(employee.insurer_reference_no);
                $('#N24_005F_8E96_8BC6').val(employeeNameKana);
                $('#N25_005F_8E96_8BC6_8F8A').val(employeeName);
                $('#N26_005F_8E96_8BC6_8F8A_94D4').val(birthdayEra);
                $('#N28_8D864_8C85').val(birthdayConvertJapan['year'] ?? "");
                $('#N29_005F_8E73').val(birthdayConvertJapan['month'] ?? "");
                $('#N30_93E0_8BC7_94D4').val(birthdayConvertJapan['day'] ?? "");
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
