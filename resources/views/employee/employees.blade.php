<x-layout title="社員一覧" useRightContent="{{ true }}">
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

            .employee-icon {
                width: 48px;
                height: 48px;
            }

            .employee-icon img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">社員一覧</div>
        </div>
        <h1 class="mt-0">社員一覧</h1>
        <div id="FilterModal" class="ui modal small filter-employee-list-modal" style="max-width: 480px;">
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
                <div class="ui approve primary button" onClick="javascript:$lw.onSave()">保存</div>
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
            filterModal.modal('show');
        });
    </script>
</x-layout>
