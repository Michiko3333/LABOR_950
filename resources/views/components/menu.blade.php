<header>
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
                    <img src="{{ asset('/img/image.png') }}">
                </div>
                <div class="name">松田 哲弥</div>
                <i class="dropdown icon"></i>
                <div class="menu" style="width: auto; min-width: 120px;">
                    <a class="item" href="#link1">個人設定</a>
                    <a class="item" id="menu-link-logout" href="{{ route('auth.logout') }}">ログアウト</a>
                </div>
            </div>
        </div>
    </section>
</header>
<div id="sidebar">
    <a class="item">
        <i class="home icon"></i>
        Home
    </a>
    <a class="item">
        <i class="block layout icon"></i>
        Topics
    </a>
    <a class="item">
        <i class="smile icon"></i>
        Friends
    </a>
    <a class="item">
        <i class="calendar icon"></i>
        History
    </a>
</div>
<div id="menu-shadow"></div>
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
        width: 250px;
        display: flex;
        flex-direction: row-reverse;
        flex-grow: 1;
        flex-shrink: 0;
        padding: 0.5em 1em;
    }

    header .left #sidebar-toggle {
        width: 64px;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    header .left img {
        width: auto;
        height: 100%;
        padding: 1em;
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
        width: 300px;
        height: 100%;
        visibility: hidden;
    }

    #menu-shadow {
        position: fixed;
        top: 0;
        height: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 101;
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
</style>
