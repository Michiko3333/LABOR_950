<x-layout title="従業員一覧" useRightContent="{{ true }}">
    @slot('header')
        <style type="text/css">
            .ui.table {
                border: none;
                borde-radius: 8px;
                margin-top: 0;
            }

            .ui.table>tbody>tr>td {
                padding: 1.6em .7em;
            }

            div.filter {
                background: #f9fafb;
                padding: 1em;
                borde-radius: 8px;
            }

            div.pagination {
                display: flex;
                justify-content: center;
            }

            span.tag {
                display: inline-block;
                background-color: #e8e8e8;
                padding: 0.35em 0.7em;
                line-height: 1;
                color: #0009;
                text-transform: none;
                font-weight: 700;
                border-radius: 0.2em;
            }

            .base-data {
                display: flex;
            }

            .base-data .employee-icon {
                width: 86px;
                height: 86px;
                flex-shrink: 0;
                flex-grow: 0;
            }

            .base-data .employee-icon img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .base-data .employee-info {
                width: 200px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                padding: 0 0.8em;
                flex-shrink: 0;
                flex-grow: 0;
            }

            .fade-highlight {
                animation: fadeHighlight 0.5s ease-out forwards;
            }

            .remove-ordinary-btn.hidden {
                display: none;
            }

            @keyframes fadeHighlight {
                0% {
                    box-shadow: none;
                }

                50% {
                    box-shadow: inset 0 0 0 2px rgba(153, 153, 153, 0.5);
                }

                100% {
                    box-shadow: inset 0 0 0 2px #999999;
                }
            }
        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">従業員一覧</div>
        </div>
        <h1 class="mt-0">従業員一覧</h1>
        <div style="padding: 1em 0;">
            <a href="{{ route('employees.upload') }}" class="ui button primary">インポート</a>
        </div>
        <div id="FilterModal" class="ui modal small filter-employee-list-modal" style="max-width: 650px;">
            <i class="close icon"></i>
            <div class="header">
                表示項目の切替
            </div>
            @livewire('filter-employee-list', [
                'columns' => $columnList,
                'default' => $defaultList,
            ])
            <div class="actions">
                <button class="ui button basic red remove-ordinary-btn hidden" id="filter-remove" style="float: left;"
                    type="button">常時設定を削除</button>
                <button class="ui cancel button" type="button">キャンセル</button>
                <div class="ui primary buttons">
                    <button class="ui button approve" type="button" data-type="filter">絞り込む</button>
                    <div class="ui floating dropdown icon button">
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <button type="button" id="pt-filter-save" class="item approve"
                                data-type="save">常時設定として保存する</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <livewire:employee-list />
            </div>
        </div>
    </section>
    <script type="module">
        const filterModal = $('#FilterModal').modal({
            blurring: true
        });
        $('#openFilterColumn').click(_ => {
            filterModal.modal({
                onShow: () => {
                    window.$lw.onShow();
                },
                onHidden: () => {
                    window.$lw.onHidden();
                },
                onApprove: (e) => {
                    if ($(e[0]).data('type') === 'save') {
                        window.$lw.onSave();
                        $('#filter-remove').removeClass('hidden');
                    } else {
                        window.$lw.onFilter();
                    }
                    const url = new URL(window.location.href);
                    url.search = '';
                    window.history.replaceState({}, '', url.toString());
                }
            }).modal('show');
        });
        $('#exportFilterColumn').click(_ => {
            Livewire.dispatch('export-filter-list');
        });
        $('.ui.dropdown.button')
            .dropdown();
        $('#filter-remove').click(_ => {
            window.$lw.onReset();
            $('#filter-remove').addClass('hidden');
        });

        const isSetUserList = {{ $isSetUserList == true ? 'true' : 'false' }};
        if (isSetUserList) {
            $('#filter-remove').removeClass('hidden');
        }
    </script>
</x-layout>
