<x-layout title="管理画面" useRightContent="{{false}}">
    @slot('header')
    <style type="text/css">
        .ui.three.cards {
            display: flex;
            justify-content: space-evenly;
            text-align: center;
        }

        .ui.cards:after {
            content: none;
        }

        .ui.three.cards>.card {
            display: block;
            width: 360px;
            height: 360px;
            margin: 10rem 0 0;
        }

        .ui.three.cards i {
            margin: 30% auto 0;
            color: #2F323E;
            font-size: 8rem;
        }

        .ui.three.cards p {
            margin-top: 3rem;
            color: #2F323E;
            font-size: 24px;
            font-weight: bold;
        }

        @media(max-width: 759px) {
            .ui.three.cards {
                display: flex;
                flex-direction: column;
                justify-content: space-evenly;
                align-items: center;
            }

            .ui.three.cards>.card {
                display: block;
                margin-top: 2rem;
            }
        }
    </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{route('home.select')}}">会社・操作選択</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">Karte管理</div>
        </div>

        <div class="ui three cards">
            <a class="primary card card-shadow" href="{{ route('admin.company') }}">
                <i class="building outline icon" style="visibility: visible;"></i>
                <p>会社一覧</p>
            </a>
            <a class="secondary card card-shadow" href="{{ route('admin.labor') }}">
                <i class="user graduate icon" style="visibility: visible;"></i>
                <p>アカウント管理</p>
            </a>
            <a class="secondary card card-shadow" href="{{ route('admin.holidays') }}">
                <i class="calendar alternate outline icon" style="visibility: visible;"></i>
                <p>休日設定</p>
            </a>
        </div>
    </section>
</x-layout>