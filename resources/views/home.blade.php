<x-layout title="ホーム" mode="{{ $body['mode'] }}">
    @slot('header')
    <style type="text/css">
        #control-panel {
            display: grid;
            gap: 10px;
            grid-template-columns: repeat(3, minmax(280px, 1fr));
            align-items: start;
            justify-items: start;
            justify-content: start;
        }

        #control-panel .ui.card {
            width: 100%;
            margin: 0;
        }

        .panel-menu {
            backgrount: #fff;
        }

        .panel-menu.ui.card>.image {
            background: unset;
        }

        .ui.card .panel-menu .description {
            color: var(--color-blue);
        }

        .blue-text {
            color: var(--color-blue) !important;
        }

        .control-panel-menu {
            animation-name: fadeIn;
            animation-fill-mode: forwards;
            animation-duration: 1s;
            animation-delay: 1s;
            opacity: 0;
        }
    </style>
    @endslot
    <section class="content">
        <h1 class="my-2">
            <i class="briefcase icon"></i>
            {{$currentCompany->name}} {{empty($branch) ? '' : $branch->name}}
        </h1>
        <section id="control-panel">
            <div class="ui horizontal huge card card-shadow control-panel-menu">
                <div class="content">
                    <i class="right floated building icon big blue-text" style="visibility: visible;"></i>
                    <div class="header blue-text">
                        会社情報
                    </div>
                    <div class="meta">
                        Company
                    </div>
                </div>
                <div class="extra content">
                    <div class="ui middle aligned selection list">
                        <a href="{{ route('company_edit', ['id' => $currentCompany->id]) }}" class="item">
                            <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                            <div class="content">
                                <div class="header">会社基本情報変更</div>
                            </div>
                        </a>
                        <a href="{{ route('branch') }}" class="item">
                            <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                            <div class="content">
                                <div class="header">支店・営業所の追加、削除</div>
                            </div>
                        </a>
                        <a href="{{ route('current_company_department_update') }}" class="item">
                            <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                            <div class="content">
                                <div class="header">組織・部署マスタ変更</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="ui horizontal huge card card-shadow control-panel-menu">
                <div class="content">
                    <i class="right floated user friends icon big blue-text" style="visibility: visible;"></i>
                    <div class="header blue-text">
                        社員管理
                    </div>
                    <div class="meta">
                        Employee
                    </div>
                </div>
                <div class="extra content">
                    <div class="ui middle aligned selection list">
                        <a href="#" class="item">
                            <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                            <div class="content">
                                <div class="header">社員一覧</div>
                            </div>
                        </a>
                        <a href="#" class="item">
                            <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                            <div class="content">
                                <div class="header">社員一括登録</div>
                            </div>
                        </a>
                        <a href="#" class="item">
                            <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                            <div class="content">
                                <div class="header">勤怠一覧</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="ui horizontal huge card card-shadow control-panel-menu">
                <div class="content">
                    <i class="right floated fax icon big blue-text" style="visibility: visible;"></i>
                    <div class="header blue-text">
                        行政手続き
                    </div>
                    <div class="meta">
                        Procedure
                    </div>
                </div>
                <div class="extra content">
                    <div class="ui middle aligned selection list">
                        <a href="{{ route('ledger.index') }}" class="item">
                            <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                            <div class="content">
                                <div class="header">帳票一覧</div>
                            </div>
                        </a>
                    </div>
                    <div class="ui middle aligned selection list">
                        <a href="{{ route('ledger.certificate') }}" class="item">
                            <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                            <div class="content">
                                <div class="header">電子証明書登録</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="ui horizontal huge card card-shadow control-panel-menu">
                <div class="content">
                    <i class="right floated calendar alternate outline icon big blue-text"
                        style="visibility: visible;"></i>
                    <div class="header blue-text">
                        カレンダー
                    </div>
                    <div class="meta">
                        Calendar
                    </div>
                </div>
                <div class="extra content">
                    <div class="ui middle aligned selection list">
                        <a href="{{route('calendar.index')}}" class="item">
                            <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                            <div class="content">
                                <div class="header">カレンダー閲覧</div>
                            </div>
                        </a>
                    </div>
                    <div class="ui middle aligned selection list">
                        <a href="#" class="item">
                            <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                            <div class="content">
                                <div class="header">カレンダー設定変更</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <script src="{{ asset('custom/calendar-small.js') }}"></script>
    <script type="module">
        @if ($body['mode'] === 'small')
            $('.full-screen').removeClass('small');
        @endif
        $('.control-panel-menu').each((index, val) => {
            const n = (index*0.2) + 0.8;
            $(val).css('animation-delay', n + 's')
        });
    </script>
</x-layout>