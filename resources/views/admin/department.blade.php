<x-layout title="部署マスタ編集" useRightContent="{{false}}">
    @slot('header')
    <style type="text/css">
        ul.list-table {
            width: 100%;
            padding-left: 1.5em;
            background-color: white;
        }

        ul.list-table ul.list {
            padding-left: 1.5em;
        }

        ul.list-table li.item {
            display: inline-flex;
            justify-content: space-between;
            align-items: center;
            list-style-type: none;
            width: 100%;
            height: 44px;
            margin-bottom: 4px;
            border-bottom: solid 1px rgba(34, 36, 38, .15);
            font-weight: bold;
        }

        ul.list-table li.item div.name {
            position: relative;
        }



        ul.list-table li.item div.name::before {
            position: absolute;
            content: "-";
            font-size: 0.8em;
            width: 1em;
            height: 1em;
            top: 0;
            left: -1.4em;
        }
    </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb mb-0">
            <a class="section" href="{{route('home.select')}}">会社・操作選択</a>
            <i class="right chevron icon divider"></i>
            <a class="section" href="{{route('admin.index')}}">Karte管理</a>
            <i class="right chevron icon divider"></i>
            <a class="section" href="{{route('admin.company')}}">会社一覧</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">部署マスタ編集</div>
        </div>
        <h1>部署マスタ：{{$company_name}}</h1>
        <livewire:department-list :company_id="$company_id" />
    </section>

    <script type="module">
        window.openEditModal = () => {
            $('#editDepartment').modal({
                blurring: true
            }).modal('show');
        };
    </script>
</x-layout>