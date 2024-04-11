<x-layout title="帳票作成：">
    <section class="content">
        @slot('header')
        <link rel="stylesheet" href="{{asset('/css/ledger-form.css')}}">

        <style type="text/css">
            .preview-area .ledger-card .content {
                padding: 14px;
            }
        </style>
        @endslot
        <h1 class="mt-2">高年齢雇用継続給付（高年齢再就職給付金）の申請 / 雇用保険高年齢雇用継続給付（高年齢再就職給付金）の申請</h1>
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
                                <div class="ui bottom attached segment" data-tab="sample">
                                    <x-form.senior_elderly_reemployment_subsidy />
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
                        <x-form.senior_elderly_reemployment_subsidy />
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
                $('#J46_005F_944E_8D86').val('{{ $todaySet['japanEra'] }}');
                $('#J47_005F_944E').val('{{ $todaySet['japanEraYear'] }}');
                $('#J48_005F_8C8E').val('{{ $todaySet['month'] }}');
                $('#J49_005F_93FA').val('{{ $todaySet['day'] }}');
                $('#J56_005F_944E_8D86').val('{{ $todaySet['japanEra'] }}');
                $('#J57_005F_944E').val('{{ $todaySet['japanEraYear'] }}');
                $('#J58_005F_8C8E').val('{{ $todaySet['month'] }}');
                $('#J59_005F_93FA').val('{{ $todaySet['day'] }}');
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
                const todaySet = data['todaySet'];

                if ( employee.last_name_kana && employee.first_name_kana ){
                    $('#J2_005F_8E81_96BC').val(employee.last_name_kana + '　' + employee.first_name_kana);
                    $('#J84_005F_94ED_95DB_8CAF_8ED2_8E81_96BC_8374_838A_834B_8369').val(employee.last_name_kana + '　' + employee.first_name_kana);
                }
                if ( employee.last_name && employee.first_name ){
                    $('#J83_005F_94ED_95DB_8CAF_8ED2_8E81_96BC').val(employee.last_name + '　' + employee.first_name);
                    $('#J61_005F_905C_90BF_8ED2_8E81_96BC').val(employee.last_name + '　' + employee.first_name);

                }
                var employmentInsuredNo = employee.employment_insured_no;
                if ( employmentInsuredNo && employmentInsuredNo.length === 11 ){
                    var employmentInsuredNo4digit = employmentInsuredNo.substring(0, 4);
                    var employmentInsuredNo6digit = employmentInsuredNo.substring(4, 10);
                    var employmentInsuredNoCD = employmentInsuredNo.substring(10, 11);
                    $('#J8_005F_94ED_95DB_8CAF_8ED2_94D4_8D864_8C85').val(employmentInsuredNo4digit);
                    $('#J9_005F_94ED_95DB_8CAF_8ED2_94D4_8D866_8C85').val(employmentInsuredNo6digit);
                    $('#J10_005F_94ED_95DB_8CAF_8ED2_94D4_8D86CD').val(employmentInsuredNoCD);
                }
                var employmentInsuranceOfficeNo = employee.employment_insurance_office_no;
                if ( employmentInsuranceOfficeNo && employmentInsuranceOfficeNo.length === 11 ){
                    var employmentInsuranceOfficeNo4digit = employmentInsuranceOfficeNo.substring(0, 4);
                    var employmentInsuranceOfficeNo6digit = employmentInsuranceOfficeNo.substring(4, 10);
                    var employmentInsuranceOfficeNoCD = employmentInsuranceOfficeNo.substring(10, 11);
                    $('#J4_005F_8E96_8BC6_8F8A_94D4_8D864_8C85').val(employmentInsuranceOfficeNo4digit);
                    $('#J5_005F_8E96_8BC6_8F8A_94D4_8D866_8C85').val(employmentInsuranceOfficeNo6digit);
                    $('#J6_005F_8E96_8BC6_8F8A_94D4_8D86CD').val(employmentInsuranceOfficeNoCD);
                }
                if ( headquarters.tel_area_code && headquarters.tel_city_code && headquarters.tel_subscriber_code){
                    $('#J51_005F_8E73_8A4F_8BC7_94D4').val(headquarters.tel_area_code);
                    $('#J52_005F_8E73_93E0_8BC7_94D4').val(headquarters.tel_city_code);
                    $('#J53_005F_89C1_93FC_8ED2_94D4_8D86').val(headquarters.tel_subscriber_code);
                }
                if ( headquarters.address_prefecture && headquarters.address_city && headquarters.address_ward && headquarters.address_apartment){
                    $('#J50_005F_8E96_8BC6_8F8A_96BC_005F_8F8A_8DDD_926E').val(headquarters.address_prefecture + headquarters.address_city + headquarters.address_ward + headquarters.address_apartment);
                }
            }
            Livewire.on('onSelectEmployee', ({ data }) => {insertDataFromEmployee(data)});
        </script>

        @slot('footer')
        <script src="{{asset('/js/ledger-form.js')}}" type="module"></script>
        @endslot
    </section>
</x-layout>
