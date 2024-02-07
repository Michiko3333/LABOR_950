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
    <h1 class="my-2">ホーム</h1>
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
                    <a href="#" class="item">
                        <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                        <div class="content">
                            <div class="header">会社基本情報変更</div>
                        </div>
                    </a>
                    <a href="#" class="item">
                        <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                        <div class="content">
                            <div class="header">視点・営業所追加</div>
                        </div>
                    </a>
                    <a href="#" class="item">
                        <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                        <div class="content">
                            <div class="header">組織・部署変更</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="ui horizontal huge card card-shadow control-panel-menu">
            <div class="content">
                <i class="right floated user friends icon big blue-text" style="visibility: visible;"></i>
                <div class="header blue-text">
                    従業員情報
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
                            <div class="header">社員一覧・変更</div>
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
                    行制定続き
                </div>
                <div class="meta">
                    Procedure
                </div>
            </div>
            <div class="extra content">
                <div class="ui middle aligned selection list">
                    <a href="#" class="item">
                        <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                        <div class="content">
                            <div class="header">e-gov 申請</div>
                        </div>
                    </a>
                    <a href="#" class="item">
                        <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                        <div class="content">
                            <div class="header">e-gov ステータス確認</div>
                        </div>
                    </a>
                    <a href="#" class="item">
                        <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                        <div class="content">
                            <div class="header">e-gov リンク</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
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
