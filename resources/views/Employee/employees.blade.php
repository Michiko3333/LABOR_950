<x-layout title="管理画面" useRightContent="{{ true }}">
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
        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb mt-2">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">社員一覧</div>
        </div>
        <h1 class="mt-0">社員一覧</h1>
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <livewire:employee-list />
            </div>
        </div>
    </section>
    <script type="module">
        $('#new')
            .dropdown({
                action: 'hide'
            });
        $('#company_btn').click(_ => {
            $('#company_select').modal({
                blurring: true
            }).modal('show');
        });
    </script>
</x-layout>
