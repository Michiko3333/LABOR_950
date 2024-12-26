<x-layout title="申請案件一覧">
    <style type="text/css">
        .issues-table  {
            font-size: 16px;
        }

        .issues-table p {
            font-size: 16px;
        }

        .issues-table span {
            font-size: 16px;
        }

        .ui.table {
            border: none;
            border-radius: 8px;
            margin-top: 0;
            border-collapse: collapse;
        }

        .ui.table>tbody>tr {
            border-left: 2px solid white;
            border-right: 2px solid white;
        }

        .ui.table>tbody>tr>td {
            padding: 1.6em .7em;
        }

        div.filter {
            background: #f9fafb;
            padding: 1em;
            border-radius: 8px;
        }

        div.pagination {
            display: flex;
            justify-content: center;
        }

        .label-area {
            text-align: center !important;
        }

        .status {
            font-weight: 900;
        }

        .status-color.completion {
            background-color: #eaeaea;
        }
        .status-color.returned {
            background-color: #fffced;
        }

        .icon-area {
            text-align: center !important;
        }

        .fade-highlight {
            animation: fadeHighlight 0.5s ease-out forwards;
        }
        @keyframes fadeHighlight {
            0% {
                border: none;
            }
            50% {
                border: 2px solid rgba(153, 153, 153, 0.5);
            }
            100% {
                border: 2px solid #999999;
            }
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
