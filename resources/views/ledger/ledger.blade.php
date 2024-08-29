<x-layout title="帳票一覧">
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
    </style>
    <section class="content">
        <div class="ui breadcrumb huge mb-0">
            <a class="section" href="/">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">帳票一覧</div>
        </div>
        <h1>帳票一覧</h1>
        @if ($existPresident == false)
            <x-representative-alert />
        @endif
        @if ($certificate == false)
            <div class="ui warning message">
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
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <livewire:ledger-list />
            </div>
        </div>
    </section>
</x-layout>
