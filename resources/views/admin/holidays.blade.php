<x-layout title="管理画面" useRightContent="{{false}}">
    @slot('header')
    <style type="text/css">
        button.append-holiday {
            width: 100%;
            padding: 1em;
            color: gray;
            font-weight: bold;
            border: solid 2px silver;
            border-radius: 4px;
            background: transparent;
            cursor: pointer;
        }

        button.append-holiday:hover {
            color: #9e9e9e;
            border: solid 2px #cfcfcf;
        }

        button.append-holiday:active {
            color: #6b6b6b;
            border: solid 2px #adadad;
        }
    </style>

    <script type="module">
        $(document).ready(() => {
            $('.ui.selection.dropdown.select_years').dropdown({});
        });
    </script>

    @endslot
    <section class="content">
        <div class="ui huge breadcrumb mb-0">
            <a class="section" href="{{route('home.select')}}">会社・操作選択</a>
            <i class="right chevron icon divider"></i>
            <a class="section" href="{{route('admin.index')}}">Karte管理</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">祝日設定</div>
        </div>
        <h1>祝日設定</h1>
            <form class="ui form" action="{{ route('admin.holidays_post') }}" method="post">
                @csrf
                @if (session('errors'))
                    <div class="ui error message">
                        <div class="header">入力エラー</div>
                        <ul class="list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <select class="ui selection dropdown select_years" id="selectYear" name="select_year">
                    <option value="{{ $year }}">{{ $year }}年</option>
                    <option value="{{ $next_next }}">{{ $next_next }}年</option>
                </select>
                <livewire:holidays-form :errors='$errors' :year='$year' :next_year='$next_next' />
            </form>
    </section>
</x-layout>