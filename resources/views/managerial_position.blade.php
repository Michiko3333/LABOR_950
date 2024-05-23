<x-layout title="役職マスタ登録" useRightContent="{{ true }}">
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
        <div class="ui huge breadcrumb mb-0 mt-2">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">役職マスタ登録</div>
        </div>
        <h1>役職マスタ登録：{{ $company_name }}</h1>
        <livewire:managerial-position-list :company_id="$company_id" />
    </section>
</x-layout>
