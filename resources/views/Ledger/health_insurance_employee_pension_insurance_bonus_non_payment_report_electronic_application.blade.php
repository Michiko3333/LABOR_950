<x-layout title="帳票作成：">
    <section class="content">
        @slot('header')
        <!-- 帳票用の共通CSSを読み込む -->
        <link rel="stylesheet" href="{{asset('/css/ledger-form.css')}}">

        <!-- ページ単位で追加分CSS -->
        <style type="text/css"></style>
        @endslot
        <h1>健康保険・厚生年金保険賞与不支給報告書／電子申請</h1>
        <p>申請・届出に関する事項を入力してください</p>

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
                                <h2>事業所選択</h2>
                                <livewire:ledger-branch-list />
                            </div>
                        </div>
                    </div>
                    <div class="right-col">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <div class="ui bottom attached segment" data-tab="sample">
                                <x-form.bonus_non_payment_report />
                                </div>
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
                    <x-form.bonus_non_payment_report />
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
                $('#_944E_002E4').val('{{ $todaySet['japanEraYear'] }}');
                $('#_8C8E_002E5').val('{{ $todaySet['month'] }}');
                $('#_93FA_002E6').val('{{ $todaySet['day'] }}');
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
            function insertDataFromBranch(data) {
                const branch = data['branch'];
                var pensionOfficeReferencePrefecture = branch.pension_office_reference_prefecture;
                var pensionOfficeReferenceNoCities = branch.pension_office_reference_no_cities;
                var pensionOfficeReferenceNoOffice = branch.pension_office_reference_no_office;
                var pensionOfficeNo = branch.pension_office_no;
                var postCode = branch.post_code;
                var addressPrefecture = branch.address_prefecture;
                var addressCity = branch.address_city;
                var addressWard = branch.address_ward;
                var addressApartment = branch.address_apartment;
                var name = branch.name;
                var telAreaCode = branch.tel_area_code;
                var telCityCode = branch.tel_city_code;
                var telSubscriberCode = branch.tel_subscriber_code;

                // ここに支店情報をinputに入れる処理
                $('#_8E96_8BC6_8F8A_90AE_979D_8B4C_8D86x_9373_93B9_957B_8CA7_8352_815B_8368_002E7').val(pensionOfficeReferencePrefecture);
                $('#_8E96_8BC6_8F8A_90AE_979D_8B4C_8D86x_8C53_8E73_8BE6_8B4C_8D86_002E8').val(pensionOfficeReferenceNoCities);
                $('#_8E96_8BC6_8F8A_90AE_979D_8B4C_8D86x_8E96_8BC6_8F8A_8B4C_8D86_002E9').val(pensionOfficeReferenceNoOffice);
                $('#_8E96_8BC6_8F8A_94D4_8D86x_8D90_926D_94D4_8D86_002E12').val(pensionOfficeNo);
                if (postCode !== null && postCode.length == 7) {
                    $('#_8E96_8BC6_8F8A_8F8A_8DDD_926Ex_9758_95D6_94D4_8D86x_9065_94D4_8D86_002E13').val(postCode.substring(0, 3));
                    $('#_8E96_8BC6_8F8A_8F8A_8DDD_926Ex_9758_95D6_94D4_8D86x_8E71_94D4_8D86_002E14').val(postCode.substring(3, 7));
                }
                $('#_8E96_8BC6_8F8A_8F8A_8DDD_926Ex_9144_9495_8F8A_974C_8ED2_8F5A_8F8A_002E15').val(addressPrefecture + ' ' + addressCity + ' ' + addressWard + ' ' + addressApartment);
                $('#_8E96_8BC6_8F8A_96BC_8FCCx_9144_9495_8F8A_974C_8ED2_8E81_96BC_002E16').val(name);
                $('#_9364_9862_94D4_8D86x_8E73_8A4F_8BC7_94D4_002E18').val(telAreaCode);
                $('#_9364_9862_94D4_8D86x_8BC7_94D4_002E19').val(telCityCode);
                $('#_9364_9862_94D4_8D86x_94D4_8D86_002E20').val(telSubscriberCode);
            }
            Livewire.on('onSelectBranch', ({ data }) => {insertDataFromBranch(data)});
        </script>

        @slot('footer')
        <script src="{{asset('/js/ledger-form.js')}}" type="module"></script>
        @endslot
    </section>
</x-layout>