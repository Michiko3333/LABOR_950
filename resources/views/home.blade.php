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
        <h1 class="mb-2">
            <i class="briefcase icon"></i>
            {{ $currentCompany->name }} {{ empty($branch) ? '' : $branch->name }}
        </h1>
        <section id="control-panel">
            @if ($userPermission->getEmployeeStatus() != 1)
                @if ($userPermission->isReadableAtleast([1, 2, 3, 4]))
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
                                @if ($userPermission->isReadableFor(1))
                                    <a href="{{ route('company_edit') }}" class="item">
                                        <i class="right caret right icon big blue-text"
                                            style="visibility: visible;"></i>
                                        <div class="content">
                                            <div class="header">会社基本情報</div>
                                        </div>
                                    </a>
                                @endif
                                @if ($userPermission->isReadableFor(2))
                                    <a href="{{ route('branch') }}" class="item">
                                        <i class="right caret right icon big blue-text"
                                            style="visibility: visible;"></i>
                                        <div class="content">
                                            <div class="header">支店・営業所情報</div>
                                        </div>
                                    </a>
                                @endif
                                @if ($userPermission->isReadableFor(3))
                                    <a href="{{ route('current_company_department_update') }}" class="item">
                                        <i class="right caret right icon big blue-text"
                                            style="visibility: visible;"></i>
                                        <div class="content">
                                            <div class="header">組織・部署マスタ</div>
                                        </div>
                                    </a>
                                @endif
                                @if ($userPermission->isReadableFor(4))
                                    <a href="{{ route('managerial_position') }}" class="item">
                                        <i class="right caret right icon big blue-text"
                                            style="visibility: visible;"></i>
                                        <div class="content">
                                            <div class="header">役職マスタ</div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            @if ($userPermission->getEmployeeStatus() != 1)
                @if ($userPermission->isBasicDepartment() && $userPermission->isReadableAtleast([5, 7]))
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
                                @if ($userPermission->isReadableFor(5))
                                    <a href="{{ route('employee') }}" class="item">
                                        <i class="right caret right icon big blue-text"
                                            style="visibility: visible;"></i>
                                        <div class="content">
                                            <div class="header">社員一覧</div>
                                        </div>
                                    </a>
                                @endif
                                @if ($userPermission->isReadableFor(7))
                                    <a href="{{ route('contract.index') }}" class="item">
                                        <i class="right caret right icon big blue-text"
                                            style="visibility: visible;"></i>
                                        <div class="content">
                                            <div class="header">労働契約書作成</div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            @if ($userPermission->getEmployeeStatus() != 1)
                @if (
                    !$userPermission->denyProcedure() &&
                        $userPermission->isBasicDepartment() &&
                        $userPermission->isReadableAtleast([8, 9, 10]))
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
                                @if ($userPermission->isReadableFor(8))
                                    <a href="{{ route('ledger.index') }}" class="item">
                                        <i class="right caret right icon big blue-text"
                                            style="visibility: visible;"></i>
                                        <div class="content">
                                            <div class="header">帳票一覧</div>
                                        </div>
                                    </a>
                                @endif
                                @if ($userPermission->isReadableFor(10) && $userPermission->isWritableFor(10))
                                    <a href="{{ route('ledger.egov') }}" class="item">
                                        <i class="right caret right icon big blue-text"
                                            style="visibility: visible;"></i>
                                        <div class="content">
                                            <div class="header">e-Gov連携</div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            @if ($userPermission->isReadableAtleast([11]))
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
                            @if ($userPermission->isReadableFor(11))
                                <a href="{{ route('calendar.index') }}" class="item">
                                    <i class="right caret right icon big blue-text" style="visibility: visible;"></i>
                                    <div class="content">
                                        <div class="header">カレンダー閲覧</div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </section>
    </section>
    <script src="{{ asset('custom/calendar-small.js') }}"></script>
    <script type="module">
        @if ($body['mode'] === 'small')
            $('.full-screen').removeClass('small');
        @endif
        $('.control-panel-menu').each((index, val) => {
            const n = (index * 0.2) + 0.8;
            $(val).css('animation-delay', n + 's')
        });
    </script>
</x-layout>
