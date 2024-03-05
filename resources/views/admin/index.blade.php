<x-layout title="管理画面" useRightContent="{{false}}">
    @slot('header')
    <style type="text/css">
        .ui.two.cards {
            display: flex;
            justify-content: space-evenly;
            text-align: center;
        }

        .ui.cards:after {
            content: none;
        }

        .ui.two.cards>.card {
            display: block;
            width: 360px;
            height: 360px;
            margin: 10rem 0 0;
        }

        .ui.two.cards i {
            margin: 30% auto 0;
            color: #2F323E;
            font-size: 8rem;
        }

        .ui.two.cards p {
            margin-top: 3rem;
            color: #2F323E;
            font-size: 24px;
            font-weight: bold;
        }

        @media(max-width: 759px) {
            .ui.two.cards {
                display: flex;
                flex-direction: column;
                justify-content: space-evenly;
                align-items: center;
            }

            .ui.two.cards>.card {
                display: block;
                margin-top: 2rem;
            }
        }
    </style>
    @endslot

    <div class="ui huge breadcrumb">
        <a class="section" href="{{route('home.select')}}">会社・操作選択</a>
        <i class="right chevron icon divider"></i>
        <div class="active section">Karte管理</div>
    </div>

    <div class="ui two cards">
        <a class="primary card card-shadow" href="{{ route('admin.company') }}">
            <i class="building outline icon" style="visibility: visible;"></i>
            <p>会社管理</p>
        </a>
        <a class="secondary card card-shadow">
            <i class="user graduate icon" style="visibility: visible;"></i>
            <p>社労士管理</p>
        </a>
    </div>
</x-layout>