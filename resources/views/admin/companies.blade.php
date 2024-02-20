<x-layout title="管理画面" useRightContent="{{false}}">
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
    </style>
    @endslot
    <div class="ui breadcrumb">
        <a class="section" href="{{route('home.select')}}">会社・操作選択</a>
        <i class="right chevron icon divider"></i>
        <a class="section" href="{{route('admin.index')}}">Karte管理</a>
        <i class="right chevron icon divider"></i>
        <div class="active section">会社一覧</div>
    </div>
    <h1>会社一覧</h1>
    <div style="padding: 1em 0;">
        <a class="ui button primary" href="{{route('admin.company_create')}}" style="width: 200px;">新規登録</a>
    </div>
    <livewire:admin-company-list>
</x-layout>