<x-layout title="申請案件一覧">
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

        .label-status {
            display: inline-block;
            min-width: 80px;
            padding: .2em .5em;
            color: white;
            background-color: var(--color-blue);
            text-align: center;
        }
    </style>
    <section class="content">
        <div class="ui breadcrumb huge mb-0">
            <a class="section" href="/">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">申請案件一覧</div>
        </div>
        <h2>申請案件一覧</h2>
        @if ($egovAcount == false)
            <div class="ui warning message" style="margin: 0;">
                <div class="header">
                    e-Govアカウントが連携されていません
                </div>
            </div>
        @endif
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <livewire:issues-list />
            </div>
        </div>
    </section>
</x-layout>
