<x-layout title="管理画面" useRightContent="{{ false }}">
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
    <section class="content">
        <div class="ui huge breadcrumb mb-0">
            <a class="section" href="{{ route('home.select') }}">会社・操作選択</a>
            <i class="right chevron icon divider"></i>
            <a class="section" href="{{ route('admin.index') }}">Karte管理</a>
            <i class="right chevron icon divider"></i>
            <a class="section" href="{{ route('admin.labor') }}">アカウント管理</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">顧客会社設定</div>
        </div>
        <h1>顧客会社設定：{{ $employee->last_name }} {{ $employee->first_name }}</h1>
        <p>所属：{{ $company->name }}</p>
        <div style="padding: 1em 0;">
            <a class="ui button primary" href="javascript:openClientModal(null)" style="width: 200px;">追加</a>
        </div>
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <livewire:client-list :id="$employee->id" />
            </div>
        </div>
    </section>
</x-layout>
