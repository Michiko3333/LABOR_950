<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
        <link rel="stylesheet" href="{{asset('/css/ledger-form.css')}}">

        <style type="text/css"></style>
        @endslot
        <h1 class="mt-2">{{ $procedureName }}</h1>
        <p>申請・届出に関する事項を入力してください</p>
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
                                <h2>事業所選択</h2>
                                <livewire:ledger-branch-list />
                            </div>
                        </div>
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>添付ファイル</h2>
                                <x-ledger-attachment 
                                    :file_original_names="[
                                        'other' => 'その他の添付書類']"
                                    :extensions="'.jpg,.jpeg,.pdf'" />
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
                const pensionOfficeReferencePrefecture = branch.pension_office_reference_prefecture;
                const pensionOfficeReferenceNoCities = branch.pension_office_reference_no_cities;
                const pensionOfficeReferenceNoOffice = branch.pension_office_reference_no_office;
                const pensionOfficeNo = branch.pension_office_no;
                const postCode = branch.post_code;
                const addressPrefecture = branch.address_prefecture;
                const addressCity = branch.address_city;
                const addressWard = branch.address_ward;
                const addressApartment = branch.address_apartment;
                const name = branch.name;
                const telAreaCode = branch.tel_area_code;
                const telCityCode = branch.tel_city_code;
                const telSubscriberCode = branch.tel_subscriber_code;

                $('#_8E96_8BC6_8F8A_90AE_979D_8B4C_8D86x_9373_93B9_957B_8CA7_8352_815B_8368_002E7').val(pensionOfficeReferencePrefecture ?? '');
                $('#_8E96_8BC6_8F8A_90AE_979D_8B4C_8D86x_8C53_8E73_8BE6_8B4C_8D86_002E8').val(pensionOfficeReferenceNoCities ?? '');
                $('#_8E96_8BC6_8F8A_90AE_979D_8B4C_8D86x_8E96_8BC6_8F8A_8B4C_8D86_002E9').val(pensionOfficeReferenceNoOffice ?? '');
                $('#_8E96_8BC6_8F8A_94D4_8D86x_8D90_926D_94D4_8D86_002E12').val(pensionOfficeNo ?? '');
                if (postCode && postCode.length == 7) {
                    $('#_8E96_8BC6_8F8A_8F8A_8DDD_926Ex_9758_95D6_94D4_8D86x_9065_94D4_8D86_002E13').val(postCode.substring(0, 3));
                    $('#_8E96_8BC6_8F8A_8F8A_8DDD_926Ex_9758_95D6_94D4_8D86x_8E71_94D4_8D86_002E14').val(postCode.substring(3, 7));
                }
                $('#_8E96_8BC6_8F8A_8F8A_8DDD_926Ex_9144_9495_8F8A_974C_8ED2_8F5A_8F8A_002E15').val(addressPrefecture ?? '' ) + (addressCity ?? '') + (addressWard ?? '') + (addressApartment ?? '');
                $('#_8E96_8BC6_8F8A_96BC_8FCCx_9144_9495_8F8A_974C_8ED2_8E81_96BC_002E16').val(name ?? '');
                $('#_9364_9862_94D4_8D86x_8E73_8A4F_8BC7_94D4_002E18').val(telAreaCode ?? '');
                $('#_9364_9862_94D4_8D86x_8BC7_94D4_002E19').val(telCityCode ?? '');
                $('#_9364_9862_94D4_8D86x_94D4_8D86_002E20').val(telSubscriberCode ?? '');
            }
            Livewire.on('onSelectBranch', ({ data }) => {insertDataFromBranch(data)});
        </script>

        @slot('footer')
        <script src="{{asset('/js/ledger-form.js')}}" type="module"></script>
        @endslot
    </section>
</x-layout>
