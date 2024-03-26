<x-layout title="帳票作成：">
    @slot('header')
    <link rel="stylesheet" href="{{asset('/css/ledger-form.css')}}">

    <style type="text/css"></style>
    @endslot
    <h1>健康保険・厚生年金保険被保険者資格取得届（単記用）（２０１９年５月以降手続き）／電子申請</h1>
    <p>申請・届出に関する事項を入力してください。<br>
    </p>

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
                        <div class="content" style="margin-bottom: 20px;">
                                <x-form.notification_of_obtainingInsured_qualification :dataUri="$dataUri"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="prevew-btn">
                <button id="ledger-back" class="ui button negative basic" type="button"
                    style="width: 200px;">戻る</button>
                <button id="ledger-preview-btn" class="ui button primary" type="button"
                    style="width: 200px;">確認</button>
            </div>
        </form>
    </div>

    <div id="ledger-step2" class="step-view my-2">
        <h2 style="text-align: center;">プレビュー</h2>
        <div class="preview-area">
            <div class="ui card card-shadow ledger-card">
                <div class="content" preview-component>
                    <div class="ui segment">
                        <x-form.notification_of_obtainingInsured_qualification :dataUri="$dataUri"/>
                    </div>
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
            $('#N5_005F_8C8E').val('{{ old("input_date_japan_era_year", $todaySet["year"]) }}');
            $('#N6_005F_93FA').val('{{ old("input_date_month", $todaySet["month"]) }}');
            $('#N7_005F_944E_8D86').val('{{ old("input_date_day", $todaySet["date"]) }}');
        });
    </script>

    <script type="module">
        function insertDataFromEmployee(data) {
            const employee = data['employee'];
            const branch = data['branch'];
            const company = data['company'];
            const headquarters = data['headquarters'];

            const employee_pension_office_reference_prefecture = headquarters.pension_office_reference_prefecture;
            const employee_pension_office_reference_no_cities = headquarters.pension_office_reference_no_cities;
            const employee_pension_office_reference_no_office = headquarters.pension_office_reference_no_office;
            const branch_insurance_office_no = headquarters.pension_office_no;
            if(headquarters.post_code !== null && headquarters.post_code.length == 7) {
                var branch_post_code_first = headquarters.post_code.substring(0, 3);
                var branch_post_code_last = headquarters.post_code.substring(3, 7);
            } else {
                var branch_post_code_first = '';
                var branch_post_code_last = '';
            }
            const headquarters_address_prefecture = headquarters.address_prefecture;
            const headquarters_address_city = headquarters.address_city;
            const headquarters_address_ward = headquarters.address_ward;
            const headquarters_address_apartment = headquarters.address_apartment;
            const branch_name = headquarters.name;
            const branch_tel_area_code = headquarters.tel_area_code;
            const branch_tel_city_code = headquarters.tel_city_code;
            const branch_tel_subscriber_code = headquarters.tel_subscriber_code;
            const employee_last_name_kana = employee.last_name_kana;
            const employee_first_name_kana = employee.first_name_kana;
            const employee_last_name = employee.last_name;
            const employee_first_name = employee.first_name;
            if(employee.mynumber_card_no) {
                var employee_mynumber_card_no = employee.mynumber_card_no;
            } else if(employee.pension_no) {
                var employee_mynumber_card_no = employee.pension_no;
            }
            if(employee.post_code !== null && employee.post_code.length == 7) {
                var employee_post_code_first = employee.post_code.substring(0, 3);
                var employee_post_code_last = employee.post_code.substring(3, 7);
            } else {
                var employee_post_code_first = '';
                var employee_post_code_last = '';
            }
            const employee_address_prefecture = employee.address_prefecture;
            const employee_address_city = employee.address_city;
            const employee_address_ward = employee.address_ward;
            const employee_address_apartment = employee.address_apartment;

            $('#N8_005F_944E').val(employee_pension_office_reference_prefecture ?? '');
            $('#N9_005F_8C8E').val(employee_pension_office_reference_no_cities ?? '');
            $('#N10_005F_93FA').val(employee_pension_office_reference_no_office ?? '');
            $('#N11_005F_94ED_95DB_8CAF_8ED2_8E81').val(branch_insurance_office_no ?? '');
            $('#N12_005F_905C_90BF_8ED2_8E81').val(branch_post_code_first ?? '');
            $('#N13_005F_8374_838A_834B_8369').val(branch_post_code_last ?? '');
            $('#N15_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val((headquarters.address_prefecture ?? '') + (headquarters.address_city ?? '') + (headquarters.address_ward ?? '') + (headquarters.address_apartment ?? ''));
            $('#N16_005F_905C_90BF').val(branch_name ?? '');
            $('#N18_005F_8CC2_906C_94D4').val(branch_tel_area_code ?? '');
            $('#N19_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(branch_tel_city_code ?? '');
            $('#N20_005F_94ED_95DB_8CAF_8ED2_94D4_8D866').val(branch_tel_subscriber_code ?? '');
            $('#N23__005F_94ED').val((employee_last_name_kana ? employee_last_name_kana + '　' : '') + (employee_first_name_kana ?? ''));
            $('#N24_005F_8E96_8BC6').val((employee_last_name ? employee_last_name + '　' : '') + (employee_first_name ?? ''));
            $('#N36_005F_8E96_8BC6_8F8A').val(employee_mynumber_card_no ?? '');
            $('#N51_005F_8E73_8A4F_8BC7').val(employee_post_code_first ?? '');
            $('#N52_005F_8E73_8A4F').val(employee_post_code_last ?? '');
            $('#N53_005F_8E73_93E0').val((employee_address_prefecture ?? '') + (employee_address_city ?? '') + (employee_address_ward ?? '') + (employee_address_apartment ?? ''));
        }
        Livewire.on('onSelectEmployee', ({ data }) => {insertDataFromEmployee(data)});
    </script>

    @slot('footer')
    <script src="{{asset('/js/ledger-form.js')}}" type="module"></script>
    @endslot
</x-layout>
