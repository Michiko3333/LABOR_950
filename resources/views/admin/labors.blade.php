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
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{route('home.select')}}">会社・操作選択</a>
            <i class="right chevron icon divider"></i>
            <a class="section" href="{{route('admin.index')}}">Karte管理</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">アカウント管理</div>
        </div>
        <h1 class="mt-0">アカウント管理</h1>
        <div id="new" class="ui floating dropdown button primary my-1">
            <div class="text" style="text-align: center; width: 103px;">新規登録</div>
            <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="{{route('admin.labor_create')}}">社労士</a>
                <a class="item" href="{{route('admin.employee_create')}}">顧客社員</a>
            </div>
        </div>
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <livewire:admin-labor-list />
            </div>
        </div>
    </section>
    <!-- 会社検索モーダル -->
    <x-search-company-modal id="company_select" selectorName="#company_name" selectorId="#company_id" />
    <script type="module" src="{{ asset('/js/search-company-modal.js') }}"></script>
    <script type="module">
        $('#new')
            .dropdown({
                action: 'hide'
            });
        $('#company_btn').click(_ => {
            $('#company_select').modal({blurring: true}).modal('show');
        });
    </script>
</x-layout>