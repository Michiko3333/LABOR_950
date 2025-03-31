<!-- 4950013520873000 -->
<x-layout title="{{ $procedureName }}">
    <section class="content">
        @slot('header')
            <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

            <style type="text/css"></style>
        @endslot
        <h1>{{ $procedureName }}</h1>
        <p>申請・届出に関する事項を入力してください</p>
        @if ($existPresident == false)
            <x-representative-alert />
        @endif
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

                <div class="ledger-grid my-2">
                    <div class="employee-card">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>事業所選択</h2>
                                <livewire:ledger-branch-list />
                            </div>
                        </div>
                    </div>
                    <div class="attachment-card">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>書類・データの添付</h2>
                                <x-ledger-attachment :file_original_names="[
                                    'other' => 'その他の添付書類',
                                ]" :extensions="'.jpg,.jpeg,.pdf'" :separateDisabled='true' />
                            </div>
                        </div>
                    </div>
                    <div class="submission-card">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <h2>提出先選択</h2>
                                <livewire:submission-selector :mode="1" />
                            </div>
                        </div>
                    </div>
                    <div class="qualification-card">
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
                    @if ($certificate == false || $egovAcount == false || $existPresident == false)
                        <button id="ledger-preview-btn" class="ui button primary" type="button" style="width: 200px;"
                            disabled>確認</button>
                    @else
                        <button id="ledger-preview-btn" class="ui button primary" type="button"
                            style="width: 200px;">確認</button>
                    @endif
                </div>

                <input type="hidden" name="query_parameter" id="queryParameter">
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
            $(document).ready(function() {
                $('#_944E_002E4').val('{{ old('today_japan_era_year', $todaySet['japanEraYear']) }}');
                $('#_8C8E_002E5').val('{{ old('today_japan_era_month', $todaySet['month']) }}');
                $('#_93FA_002E6').val('{{ old('today_japan_era_day', $todaySet['day']) }}');

                $('#_8E96_8BC6_8EE5_8E81_96BCx_91E3_955C_8ED2_8E81_96BC_002E17').val(
                    '{{ old('business_owner_name_representative_name') }}' ? '{{ old('business_owner_name_representative_name') }}' : '{{ $company->representative }}');

                @if ($current_employee->role_id === 500)
                    $('#_8ED0_89EF_95DB_8CAF_984A_96B1_8E6D_82CC_92F1_8F6F_91E3_8D73_8ED2_96BC_002E21').val(
                        '{{ $current_employee->indication_of_labor . '　' . $current_employee->last_name . $current_employee->first_name . '　' . $current_branch->tel_area_code . '-' . $current_branch->tel_city_code. '-' . $current_branch->tel_subscriber_code }}'
                    );
                @else
                    $('#_8ED0_89EF_95DB_8CAF_984A_96B1_8E6D_82CC_92F1_8F6F_91E3_8D73_8ED2_96BC_002E21').prop('readonly',true);
                @endif
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
            function insertDataFromBranch(data) {
                const branch = data['branch'];
                const company = data['company'];
                const pensionOfficeReferencePrefecture = branch.pension_office_reference_prefecture;
                const pensionOfficeReferenceNoCities = branch.pension_office_reference_no_cities;
                const pensionOfficeReferenceNoOffice = branch.pension_office_reference_no_office;
                const pensionOfficeNo = branch.pension_office_no;
                const postCode = branch.post_code;
                const telAreaCode = branch.tel_area_code;
                const telCityCode = branch.tel_city_code;
                const telSubscriberCode = branch.tel_subscriber_code;
                const branch_prefecture_data = data['branch_prefecture_data'];
                const pensionOffice = data['pensionOffice'];

                $('#_8E96_8BC6_8F8A_96BC_8FCCx_9144_9495_8F8A_974C_8ED2_8E81_96BC_002E16').val(company.name);
                $('#_8E96_8BC6_8F8A_90AE_979D_8B4C_8D86x_9373_93B9_957B_8CA7_8352_815B_8368_002E7').val(
                    pensionOfficeReferencePrefecture ?? '');
                $('#_8E96_8BC6_8F8A_90AE_979D_8B4C_8D86x_8C53_8E73_8BE6_8B4C_8D86_002E8').val(pensionOfficeReferenceNoCities ??
                    '');
                $('#_8E96_8BC6_8F8A_90AE_979D_8B4C_8D86x_8E96_8BC6_8F8A_8B4C_8D86_002E9').val(pensionOfficeReferenceNoOffice ??
                    '');
                $('#_8E96_8BC6_8F8A_94D4_8D86x_8D90_926D_94D4_8D86_002E12').val(branch.insurance_office_no ?? '');
                if (postCode && postCode.length == 7) {
                    $('#_8E96_8BC6_8F8A_8F8A_8DDD_926Ex_9758_95D6_94D4_8D86x_9065_94D4_8D86_002E13').val(postCode.substring(0,
                        3));
                    $('#_8E96_8BC6_8F8A_8F8A_8DDD_926Ex_9758_95D6_94D4_8D86x_8E71_94D4_8D86_002E14').val(postCode.substring(3,
                        7));
                }
                $('#_8E96_8BC6_8F8A_8F8A_8DDD_926Ex_9144_9495_8F8A_974C_8ED2_8F5A_8F8A_002E15').val((branch
                    .address_prefecture ?? '') + (branch.address_city ?? '') + (branch.address_ward ?? '') + (branch
                    .address_apartment ?? ''));
                $('#_9364_9862_94D4_8D86x_8E73_8A4F_8BC7_94D4_002E18').val(telAreaCode ?? '');
                $('#_9364_9862_94D4_8D86x_8BC7_94D4_002E19').val(telCityCode ?? '');
                $('#_9364_9862_94D4_8D86x_94D4_8D86_002E20').val(telSubscriberCode ?? '');

                const prefectureSelect = document.querySelector('select[name="selected_prefecture"]');
                const helloWorkSelect = document.querySelector('select[name="selected_pension_office"]');

                if(pensionOffice){
                    prefectureSelect.addEventListener('change', function () {
                    setTimeout(()=>{
                            helloWorkSelect.value = pensionOffice.id;
                        },700);
                    });
                    prefectureSelect.value = pensionOffice.address_prefecture;
                    prefectureSelect.dispatchEvent(new Event('change', { bubbles: true }));
                    document.querySelector('input[name="apply_to_code"]').value = pensionOffice.identifier_e;
                    document.querySelector('input[name="apply_to_code"]').dispatchEvent(new Event('input'));
                    document.querySelector('input[name="apply_to_name"]').value = pensionOffice.submit_union_name_e;
                    document.querySelector('input[name="apply_to_name"]').dispatchEvent(new Event('input'));
                }else{
                    $("select[name='selected_prefecture']").val('');
                    $("select[name='selected_pension_office']").val('');
                    $("input[name='apply_to_name']").val('');
                    $("input[name='apply_to_code']").val('');
                }
            }
            Livewire.on('onSelectBranch', ({
                data
            }) => {
                insertDataFromBranch(data)
            });
        </script>

        @slot('footer')
            <script src="{{ asset('/js/ledger-form.js') }}" type="module"></script>
        @endslot
    </section>
</x-layout>
