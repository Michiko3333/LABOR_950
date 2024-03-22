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
    <div class="ui breadcrumb huge mt-2">
        <a class="section" href="/">個人ポータル</a>
        <i class="right chevron icon divider"></i>
        <div class="active section">帳票一覧</div>
    </div>
        <h1>帳票一覧</h1>
        <livewire:ledger-list />
</x-layout>
