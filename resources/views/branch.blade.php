<x-layout title="支店・営業所の追加、削除" useRightContent="{{ true }}">
    @slot('header')
        <style type="text/css">
            .calendar-container {
                display: flex;
                justify-content: space-between;
            }

            .ui.form .field>label {
                font-size: 1em;
            }


            .ui.fluid.dropdown {
                height: 49px;
                padding: 14px 16.8px;
                border: 2px solid rgba(34, 36, 38, .15);
            }

            .ui.styled.accordion .content {
                display: flex;
                padding: 14px;
                gap: 14px;
            }

            .ui.styled.accordion .content .content_inner {
                width: 49.9%;
            }

            .ui.styled.accordion .active.title {
                background: white;
            }

            #company_edit {
                display: flex;
                justify-content: space-between;
            }

            #company_edit .flex-inner {
                width: 49%;
            }

            .company_division_selector {
                min-height: 48px;
            }

            .company_division_selector input[type=radio] {
                display: none;
            }

            .company_division_selector input[type=radio]+label {
                display: inline-block;
                cursor: pointer;
                border-radius: 4px;
            }

            .company_division_selector input[type="radio"]:checked+label {
                background: var(--color-blue);
                color: white;
                font-weight: bold;
            }

            .company_division_selector input[type="radio"]+label:hover {
                opacity: 0.9;
            }

            .company_division_selector .label {
                padding: 1em 1.5em;
                /* ラベル外側の余白を指定する */
                background: #2828284d;
            }

            .field.tel-hyphen {
                position: relative;
            }

            .field.tel-hyphen::before {
                position: absolute;
                top: 51%;
                right: -0.4em;
                width: 0.8em;
                height: 0.8em;
                content: '-';
                font-size: 2em;
                text-align: center;
            }

            button.append-branch {
                width: 100%;
                padding: 1em;
                color: gray;
                font-weight: bold;
                border: solid 2px silver;
                border-radius: 4px;
                background: transparent;
                cursor: pointer;
            }

            button.append-branch:hover {
                color: #9e9e9e;
                border: solid 2px #cfcfcf;
            }

            button.append-branch:active {
                color: #6b6b6b;
                border: solid 2px #adadad;
            }

            .company-data-area>.ui.horizontal.card {
                width: 100%;
                margin: 0;
            }

            .company-data-area {
                display: grid;
                gap: 0.8em;
                grid-template-columns: repeat(3, auto);
                grid-template-rows: repeat(5, auto);
            }

            .company-data-area .ui.card.item-0 {
                grid-area: 1 / 1 / 4 / 3;
                min-width: 650px;
            }

            .company-data-area .ui.card.item-1 {
                grid-area: 2 / 3 / 3 / 5;
            }

            .company-data-area .ui.card.item-2 {
                grid-area: 1 / 3 / 2 / 4;
            }

            .company-data-area .ui.card.item-3 {
                grid-area: 1 / 4 / 2 / 5;
            }

            .company-data-area .ui.card.item-4 {
                grid-area: 3 / 3 / 4 / 4;
            }

            .company-data-area .ui.card.item-5 {
                grid-area: 3 / 4 / 4 / 5;
            }

            .ui.basic.label {
                padding-top: 1.2em !important;
            }

            @media (max-width: 1245px) {
                .company-data-area .ui.card.item-0 {
                    grid-area: 1 / 1 / 4 / 4;
                    min-width: 450px;
                }

                .company-data-area .ui.card.item-1 {
                    grid-area: 4 / 1 / 5 / 3;
                    min-width: 460px;
                }

                .company-data-area .ui.card.item-2 {
                    grid-area: 1 / 4 / 2 / 5;
                }

                .company-data-area .ui.card.item-3 {
                    grid-area: 2 / 4 / 3 / 5;
                }

                .company-data-area .ui.card.item-4 {
                    grid-area: 3 / 4 / 4 / 5;
                }

                .company-data-area .ui.card.item-5 {
                    grid-area: 4 / 3 / 5 / 5;
                }
            }

            @media (max-width: 820px) {
                .company-data-area .ui.card.item-0 {
                    grid-area: 1 / 1 / 1 / 4;
                    min-width: 450px;
                }

                .company-data-area .ui.card.item-1 {
                    grid-area: 2 / 1 / 2 / 4;
                    min-width: 460px;
                }

                .company-data-area .ui.card.item-2 {
                    grid-area: 3 / 1 / 3 / 4;
                }

                .company-data-area .ui.card.item-3 {
                    grid-area: 4 / 1 / 4 / 4;
                }

                .company-data-area .ui.card.item-4 {
                    grid-area: 5 / 1 / 5 / 4;
                }

                .company-data-area .ui.card.item-5 {
                    grid-area: 6 / 1 / 6 / 4;
                }

                .ui.styled.accordion .content {
                    flex-direction: column;
                }

                .ui.styled.accordion .content .content_inner {
                    width: 100%;
                }

            }

            @media (max-width: 500px) {
                .company-data-area .ui.card.item-0 {
                    min-width: unset;
                }

                .company-data-area .ui.card.item-1 {
                    min-width: unset;
                }
            }

            .branch-payment-confirm-modal .red-text {
                font-weight: bold;
                color: var(--color-red);
            }

            .tab-error,
            .tab-error.active {
                color: #912d2b !important;
            }
        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb mb-0">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">支店・営業所情報</div>
        </div>
        <h2 class="pl-1">支店・営業所情報</h2>
        <form name="edit-branch" action="{{ route('branch_post') }}" method="post">
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
            <div class="ui form">

                @livewire('branch-form', [
                    'id' => $company_id,
                    'branch' => $branch,
                    'departments' => $departments,
                    'prefectures' => $prefectures,
                    'labor_insurance_payment_method' => $labor_insurance_payment_method,
                    'place_type' => $place_type,
                    'start_days_of_week' => $start_days_of_week,
                    'work_style_type' => $work_style_type,
                    'errors' => $errors,
                ])

                @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
                    <div class="my-4" style="text-align: right; margin-right: 1em;">
                        <a class="ui button negative basic" href="{{ route('home.index') }}"
                            style="width: 200px;">戻る</a>
                        <button class="ui button primary submit-disable" type="submit"
                            style="width: 200px;">更新</button>
                    </div>
                @endif
            </div>
        </form>
        <div class="ui modal branch-payment-confirm-modal">
            <livewire:branch-payment-confirm-modal />
        </div>
    </section>
    <script type="module">
        $(document).ready(function() {
            const readonly = @json(!$userPermission->isBasicDepartment() || !$userPermission->isWritableFor(2));
            if (readonly) {
                $sectionReadonly();
                $('.tab').on('click', function () {
                    setTimeout(() => {
                        $sectionReadonly();
                    }, 550);
                });
            }
        });
    </script>
</x-layout>
