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
                <button class="ui button cancel" type="button">キャンセル</button>
                <button class="ui approve primary button">保存</button>
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
                onApprove: () => {
                    window.$lw.onSave();
                }
            }).modal('show');
        });
    </script>
</x-layout>
