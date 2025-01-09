<header>
    @php
        $user = Auth::user();
        $employee = $user->employee()->first();
        $name = !empty($employee) ? $employee->last_name . ' ' . $employee->first_name : '';

        $employee_id = !empty($employee) ? $employee->id : '';
        $role_id = !empty($employee) ? $employee->role_id : '';
        if ($role_id !== 999) {
            $branch = $employee->branch()->first();
            $company = $branch->company()->first();
            $company_id = $company->id;
            $directory = 'photo/' . $company_id;
            $files = Storage::files($directory);
            foreach ($files as $file) {
                $fileName = pathinfo($file, PATHINFO_FILENAME);
                if ((int) $fileName === $employee_id) {
                    $filePath = '/' . $file;
                }
            }
            if (!isset($filePath)) {
                $filePath = '/img/image.png';
            }
        } else {
            $filePath = '/img/image.png';
        }
    @endphp
    <section class="left">
        <a id="sidebar-toggle">
            <i class="sidebar big icon primary"></i>
        </a>
        <img src="{{ asset('/img/logo.png') }}">
    </section>
    <section class="right">
        <div class="ui bottom menu scrollhint">
            <div class="ui floating dropdown item menu-user">
                <div class="user-icon">
                    <img src="{{ $filePath }}" id="iconImage">
                </div>
                <div class="name">{{ $name }}</div>
                <i class="dropdown icon"></i>
                <div class="menu" style="width: auto; min-width: 120px;">
                    <a class="item" href="javascript:openUserModal()">個人設定</a>
                    <a class="item" id="menu-link-logout" href="{{ route('auth.logout') }}">ログアウト</a>
                </div>
            </div>
        </div>
    </section>
</header>
<div id="menu-shadow"></div>
<div id="sidebar">
    <menu>
        <li class="logo"><img src="{{ asset('/img/logo.png') }}"></li>
        @if ($userPermission->isSelectedCompany())
            <li class="item icon">
                <a href="{{ route('home.index') }}" style="font-weight: bold;">
                    <i class="home icon large blue-text"></i>
                    ホーム</a>
            </li>
            @if ($userPermission->getEmployeeStatus() != 1)
                @if ($userPermission->isReadableAtleast([1, 2, 3, 4]))
                    <li class="title">会社情報</li>
                @endif
                @if ($userPermission->isReadableFor(1))
                    <li class="item">
                        <a href="{{ route('company_edit') }}">

                            会社基本情報</a>
                    </li>
                @endif
                @if ($userPermission->isReadableFor(2))
                    <li class="item">
                        <a href="{{ route('branch') }}">

                            支店・営業所情報</a>
                    </li>
                @endif
                @if ($userPermission->isReadableFor(3))
                    <li class="item">
                        <a href="{{ route('current_company_department_update') }}">

                            組織・部署マスタ</a>
                    </li>
                @endif
                @if ($userPermission->isReadableFor(4))
                    <li class="item">
                        <a href="{{ route('managerial_position') }}">

                            役職マスタ</a>
                    </li>
                @endif
                @if ($userPermission->isAdmin() || $userPermission->isLabor() || $userPermission->isReadableFor(16))
                    <li class="item">
                        <a href="{{ route('qualifications') }}">

                            資格マスタ</a>
                    </li>
                @endif
                @if ($userPermission->isBasicDepartment() && $userPermission->isReadableAtleast([5, 7]))
                    <li class="title">社員管理</li>
                    @if ($userPermission->isReadableFor(5))
                        <li class="item">
                            <a href="{{ route('employee') }}">

                                社員一覧</a>
                        </li>
                    @endif
                    @if ($userPermission->isReadableFor(517))
                        <li class="item">
                            <a href="{{ route('wages.index') }}">

                                賃金情報</a>
                        </li>
                    @endif
                    @if ($userPermission->isReadableFor(19))
                        <li class="item">
                            <a href="{{ route('attendances.index') }}">

                                勤怠情報</a>
                        </li>
                    @endif
                    @if ($userPermission->isReadableFor(18))
                        <li class="item">
                            <a href="{{ route('wages-ledger.index') }}">

                                賃金台帳作成</a>
                        </li>
                    @endif
                    @if ($userPermission->isReadableFor(7))
                        <li class="item">
                            <a href="{{ route('contract.index') }}">

                                労働契約書作成</a>
                        </li>
                    @endif
                    @if ($userPermission->isReadableFor(14) && $userPermission->isBasicDepartment())
                        <li class="item">
                            <a href="{{ route('closure_information') }}">

                                休業情報</a>
                        </li>
                    @endif
                @endif
                @if (
                    !$userPermission->denyProcedure() &&
                        $userPermission->isBasicDepartment() &&
                        ($userPermission->isReadableAtleast([8, 9]) ||
                            ($userPermission->isWritableFor(10) && $userPermission->isReadableFor(10))))
                    <li class="title">行政手続き</li>
                    @if ($userPermission->isReadableFor(8))
                        <li class="item">
                            <a href="{{ route('ledger.index') }}">

                                帳票一覧</a>
                        </li>
                    @endif
                    @if ($userPermission->isReadableFor(9))
                        <li class="item">
                            <a href="{{ route('ledger.issues') }}">

                                申請案件一覧</a>
                        </li>
                    @endif
                    @if ($userPermission->isReadableFor(10) && $userPermission->isWritableFor(10))
                        <li class="item">
                            <a href="{{ route('ledger.egov') }}">

                                e-Gov連携</a>
                        </li>
                    @endif
                @endif
            @endif
            @if ($userPermission->isReadableFor(11) || $userPermission->isReadableFor(12) || $userPermission->isReadableFor(13))
                <li class="title">スケジュール</li>
                @if ($userPermission->isReadableFor(11))
                    <li class="item">
                        <a href="{{ route('calendar.index') }}">

                            カレンダー</a>
                    </li>
                @endif
                @if (
                    $userPermission->isReadableFor(12) &&
                        $userPermission->isBasicDepartment() &&
                        $userPermission->getEmployeeStatus() !== 1)
                    <li class="item">
                        <a href="{{ route('calendar.shift') }}">

                            年間勤務予定表</a>
                    </li>
                @endif
                @if (
                    $userPermission->isReadableFor(13) &&
                        $userPermission->isBasicDepartment() &&
                        $userPermission->getEmployeeStatus() !== 1)
                    <li class="item">
                        <a href="{{ route('pickup.setting') }}">

                            Pick up設定</a>
                    </li>
                @endif
            @endif
            @if ($userPermission->isAdmin() || $userPermission->isLabor())
                <li class="btn"><button class="ui button small yellow basic " type="button"
                        onclick="location.href='{{ route('home.select') }}'">会社を変更</button></li>
            @endif
        @else
            <li class="item icon">
                <a href="{{ route('home.select') }}" style="font-weight: bold;">
                    <i class="home icon large blue-text"></i>
                    会社選択</a>
            </li>
            @if ($userPermission->isAdmin())
                <li class="title">Karte管理</li>
                <li class="item">
                    <a href="{{ route('admin.company') }}">
                        会社管理</a>
                </li>
                <li class="item">
                    <a href="{{ route('admin.labor') }}">
                        アカウント管理</a>
                </li>
                @if (config('egov.test') === true)
                    <li class="item">
                        <a href="{{ route('egovtest.index') }}">
                            e-Gov最終試験管理</a>
                    </li>
                @endif
            @endif
            @if ($userPermission->isLabor())
                <li class="title">社労士管理</li>
                <li class="item">
                    <a href="{{ route('labor_company_update') }}">
                        自社情報編集</a>
                </li>
            @endif
        @endif
    </menu>
</div>
<script type="module">
    let showMenu = false;
    $('.ui.dropdown.menu-user')
        .dropdown({
            action: 'hide'
        });
    $('#menu-link-logout').click(_ => {
        window.location.href = '{{ route('auth.logout') }}';
    });
    $('#sidebar-toggle').click(() => {
        toggleMenu(true);
    });
    $('#menu-shadow').click(() => {
        toggleMenu(false);
    });

    function toggleMenu(bool) {
        if (bool) {
            $('#sidebar').addClass('show');
            $('#menu-shadow').addClass('show');
        } else {
            $('#sidebar').removeClass('show');
            $('#menu-shadow').removeClass('show');
        }
    }

    Livewire.on('changeIconImage', (iconPath) => {
        $('#iconImage').attr('src', iconPath);
    });
</script>
<style>
    header {
        position: fixed;
        display: flex;
        width: 100%;
        height: 64px;
        background-color: transparent;
        z-index: 100;
        transition: 0.8s;
    }

    header .left {
        width: 100%;
        display: flex;
        flex-grow: 1;
        flex-shrink: 1;
    }

    header .right {
        width: 375px;
        display: flex;
        flex-direction: row-reverse;
        flex-grow: 1;
        flex-shrink: 0;
        padding: 0.5em 1em;
        background-color: transparent;
    }

    header .left #sidebar-toggle {
        width: 64px;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        filter: drop-shadow(5px 5px 5px gray);
    }

    header .left img {
        width: auto;
        height: 100%;
        padding: 1em;
        filter: drop-shadow(5px 5px 5px gray);

    }

    header .right .ui.menu {
        background: transparent;
        border: none;
    }

    header .right .ui.menu .item {
        background: transparent !important;
    }


    header .right .ui.menu .active.item {
        background: transparent;
        border: none;
        font-weight: bold;
    }

    header .right .ui.menu .active.item:hover {
        color: color: var(--color-black);
        background: transparent;
    }

    header .right .ui.menu .menu-user {
        width: auto;
        display: flex;
        align-items: center;
        color: var(--color-black);
        padding: 0;
    }

    header .right .menu-user .user-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        overflow: hidden;
    }

    header .right .menu-user img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    header .right .menu-user .name {
        font-weight: bold;
        margin-left: 1em;
        color: #fff;
        text-shadow: #000 1px 0 10px;

    }

    header .right .menu-user i {
        color: #fff;
        text-shadow: #000 1px 0 10px;
    }


    #menu-link-logout {
        color: var(--color-red) !important;
    }

    #sidebar {
        position: fixed;
        top: 0;
        width: 0px;
        height: 100%;
        overflow-x: hidden;
        overflow-y: auto;
        z-index: 900;
        background-color: white;
        transition: 0.5s;
        box-shadow: 8px 0px 12px rgba(0, 0, 0, 0.1);
    }

    #sidebar.show {
        width: 300px;
        transition: 0.8s;
    }

    #sidebar menu {
        width: 300px;
        padding: 0;
    }

    #sidebar menu li {
        list-style: none;
        padding: 1em;
        font-size: 1.2em;
    }

    #sidebar menu li.btn {
        list-style: none;
        padding: 1em;
        font-size: 0.8em;
        text-align: center;
    }

    #sidebar menu li.logo {
        text-align: center;
        margin-bottom: 1em;
    }

    #sidebar menu li.title {

        font-weight: bold;
        border-bottom: solid 4px var(--color-red);
    }

    #sidebar menu li.item {
        position: relative;
        padding: 0;
    }

    #sidebar menu li.item a {
        position: relative;
        display: block;
        width: 100%;
        height: 100%;
        padding: 1em;
        padding-left: 3em;
        color: var(--color-black);
    }

    #sidebar menu li.item:not(.icon) a::before {
        position: absolute;
        content: "";
        top: calc(50% - 4px);
        left: 1.2em;
        width: 8px;
        height: 8px;
        background-color: var(--color-red);
    }

    #sidebar menu li.item a:hover {
        background-color: #0000000d;
    }

    #sidebar menu li.item a>i {
        position: absolute;
        top: 0.5em;
        left: 0.5em;
    }

    #menu-shadow {
        position: fixed;
        top: 0;
        height: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 850;
        opacity: 0;
        pointer-events: none;
        transition: 0.8s;
    }

    #menu-shadow.show {
        opacity: 1;
        pointer-events: fill;
        transition: 0.8s;
    }

    @media screen and (max-width: 768px) {
        header .right .menu-user .name {
            display: none;
        }


    }

    @media screen and (max-width: 1250px) {
        header {
            background-color: white;
            box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.1);
        }

        header .right .menu-user .name {
            color: var(--color-black);
            text-shadow: none;
        }

        header .right .ui.menu .item>i.dropdown.icon {
            color: black;
        }
    }
</style>
