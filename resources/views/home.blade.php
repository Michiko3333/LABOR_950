<x-layout title="ホーム" mode="{{ $body['mode'] }}">
    @slot('header')
        <style type="text/css">
            #control-panel {
                display: grid;
                gap: 1.4em;
                grid-template-columns: repeat(3, minmax(280px, 1fr));
            }

            #control-panel .ui.card {
                width: 100%;
                margin: 0;
            }

            #control-panel .control-panel-menu .title.content {
                position: relative;
                padding: 0;
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                height: 100px;
            }

            #control-panel .control-panel-menu .extra.content {
                height: 100%;
                flex-grow: 1;
                flex-shrink: 1;
                border: none;
            }

            #control-panel .control-panel-menu .extra.content a .content .header {
                position: relative;
                padding-left: 1.2em;

            }

            #control-panel .control-panel-menu .extra.content a .content .header::before {
                position: absolute;
                content: "";
                top: 8px;
                left: 0px;
                width: 8px;
                height: 8px;
                background-color: var(--color-red);
            }


            #control-panel .control-panel-menu .title.content .overlay {
                font-weight: bold;
                width: 100%;
                height: 100%;
                padding: 1.1em;
                background-color: rgba(0, 0, 0, 0.18);
            }

            #control-panel .control-panel-menu .title.content .overlay h2 {
                margin-bottom: 0;
                font-size: 1.2em;
            }

            #control-panel .control-panel-menu .title.content .overlay p {
                font-size: 0.8em;
            }

            #control-panel .control-panel-menu .title.content div {
                color: #fff;
                filter: drop-shadow(0 0 0.3rem black);
            }

            #control-panel .control-panel-menu .title.content.company {
                background-image: url("{{ asset('/img/home_company.webp') }}");
            }

            #control-panel .control-panel-menu .title.content.employee {
                background-image: url("{{ asset('/img/home_employee.webp') }}");
            }

            #control-panel .control-panel-menu .title.content.procedure {
                background-image: url("{{ asset('/img/home_procedure.webp') }}");
            }

            #control-panel .control-panel-menu .title.content.calendar {
                background-image: url("{{ asset('/img/home_calendar.webp') }}");
                background-position: left 0 bottom 10%;
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
                        <div class="title content company">
                            <div class="overlay">
                                <h2>会社情報</h2>
                                <p>Company</p>
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui middle aligned selection list">
                                @if ($userPermission->isReadableFor(1))
                                    <a href="{{ route('company_edit') }}" class="item">
                                        <div class="content">
                                            <div class="header">会社基本情報</div>
                                        </div>
                                    </a>
                                @endif
                                @if ($userPermission->isReadableFor(2))
                                    <a href="{{ route('branch') }}" class="item">

                                        <div class="content">
                                            <div class="header">支店・営業所情報</div>
                                        </div>
                                    </a>
                                @endif
                                @if ($userPermission->isReadableFor(3))
                                    <a href="{{ route('current_company_department_update') }}" class="item">

                                        <div class="content">
                                            <div class="header">組織・部署マスタ</div>
                                        </div>
                                    </a>
                                @endif
                                @if ($userPermission->isReadableFor(4))
                                    <a href="{{ route('managerial_position') }}" class="item">

                                        <div class="content">
                                            <div class="header">役職マスタ</div>
                                        </div>
                                    </a>
                                @endif
                                <a class="item" style="pointer-events: none;">
                                    <div class="content">
                                        <div class="header">各種設定</div>
                                    </div>
                                </a>
                                @if ($userPermission->isAdmin() || $userPermission->isLabor() || $userPermission->isReadableFor(16))
                                    <a href="{{ route('qualifications') }}" class="item">
                                        <div class="header">
                                            　-　資格マスタ
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
                        <div class="title content employee">
                            <div class="overlay">
                                <h2>社員管理</h2>
                                <p>Employee</p>
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui middle aligned selection list">
                                @if ($userPermission->isReadableFor(5))
                                    <a href="{{ route('employee') }}" class="item">
                                        <div class="content">
                                            <div class="header">従業員一覧</div>
                                        </div>
                                    </a>
                                @endif
                                @if ($userPermission->isReadableFor(7))
                                    <a href="{{ route('contract.index') }}" class="item">
                                        <div class="content">
                                            <div class="header">労働契約書作成</div>
                                        </div>
                                    </a>
                                @endif
                                    <a class="item" style="pointer-events: none;">
                                        <div class="content">
                                            <div class="header">各種設定</div>
                                        </div>
                                    </a>
                                @if ($userPermission->isReadableFor(14))
                                    <a href="{{ route('closure_information') }}" class="item">
                                        <div class="header">
                                            　-　休業設定
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
                        ($userPermission->isReadableAtleast([8, 9]) ||
                            ($userPermission->isWritableFor(10) && $userPermission->isReadableFor(10))))
                    <div class="ui horizontal huge card card-shadow control-panel-menu">
                        <div class="title content procedure">
                            <div class="overlay">
                                <h2>行政手続き</h2>
                                <p>Procedure</p>
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui middle aligned selection list">
                                @if ($userPermission->isReadableFor(8))
                                    <a href="{{ route('ledger.index') }}" class="item">

                                        <div class="content">
                                            <div class="header">帳票一覧</div>
                                        </div>
                                    </a>
                                @endif
                                @if ($userPermission->isReadableFor(9))
                                    <a href="{{ route('ledger.issues') }}" class="item">

                                        <div class="content">
                                            <div class="header">申請案件一覧</div>
                                        </div>
                                    </a>
                                @endif
                                @if ($userPermission->isReadableFor(10) && $userPermission->isWritableFor(10))
                                    <a href="{{ route('ledger.egov') }}" class="item">


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
                    <div class="title content calendar">
                        <div class="overlay">
                            <h2>カレンダー</h2>
                            <p>Calendar</p>
                        </div>
                    </div>
                    <div class="extra content">
                        <div class="ui middle aligned selection list">
                            @if ($userPermission->isReadableFor(11))
                                <a href="{{ route('calendar.index') }}" class="item">
                                    <div class="content">
                                        <div class="header">カレンダー閲覧</div>
                                    </div>
                                </a>
                            @endif
                            @if ($userPermission->isReadableFor(12) && $userPermission->isBasicDepartment())
                                <a href="{{ route('calendar.shift') }}" class="item">
                                    <div class="content">
                                        <div class="header">年間勤務予定表</div>
                                    </div>
                                </a>
                            @endif
                            @if ($userPermission->isReadableFor(13) && $userPermission->isBasicDepartment())
                                <a href="{{ route('pickup.setting') }}" class="item">
                                    <div class="content">
                                        <div class="header">Pick up設定</div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </section>
    </section>
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
