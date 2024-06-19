<!DOCTYPE html>
<html lang="ja">

@php
    $laborAlert = session()->get('labor-alert', false);
    $laborAlertTitle = session()->get('company_name', 'エラー');
    $useMenu = $useMenu ?? true;
    $useRightContent = $useRightContent ?? true;
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/less/app.less')
    @vite('resources/scss/app.scss')
    @vite(['resources/js/app.js', 'resources/js/semantic.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap');

        body {
            background-image: url("{!! asset('/img/bg_town.jpg') !!}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: var(--color-black);
        }

        .full-screen {
            display: flex;
            width: 100%;
            min-height: 100%;

            background: rgba(0, 0, 0, 0.8);
            justify-content: space-between;
            transition: 1s;
            transition-delay: 0.4s;
        }

        .full-screen.small {
            background: rgba(0, 0, 0, 0.2);
        }

        .labor-alert {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 0.5em 1em;
            border-left: solid 0.5em #979100;
            font-weight: bold;
            font-size: 1.2em;
            background-color: #fff;
        }

        .labor-alert .left {}

        .labor-alert .right {}

        .card-shadow {
            box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.1) !important;
        }

        .left-container {
            width: 100%;
            min-width: 375px;
            padding: 1em;
            transition: 2s;
            padding-top: 80px;
            transition: 1s;
            transition-delay: 0.4s;
            background: #F7F7F7;

            flex-shrink: 1;
        }

        .full-screen.small .left-container {
            width: 40%;
            flex-shrink: 0;
        }

        .right-container {
            width: 100%;
            max-width: 375px;
            padding-top: 80px;
            flex-grow: 1;
            transition: 1s;
            transition-delay: 0.25s;
        }

        .full-screen.small .right-container {
            max-width: 100%;

            flex-grow: 1;
        }

        section.content {
            margin: 0 auto;
            max-width: 1400px;
        }

        .ui.card.full {
            width: 100%;
        }

        .centering {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #select-company-form {
            width: 100%;
            max-width: 500px;
        }

        #select-company-form.ui.form .field .dropdown {
            font-size: 1.2em;
            height: 46px;
        }

        .opacity {
            opacity: 0;
        }

        .ui.huge.breadcrumb {
            margin-bottom: 2em;
        }

        .user-modal .content {
            width: 100%;
        }

        .user-modal .user-modal-content {
            display: flex;
            gap: 1em;
            width: 100%;
            min-height: 420px;
            height: 420px;
            max-height: 420px;
        }

        .user-modal .user-modal-content .left-content {
            display: flex;
            width: 180px;
            height: 100%;
            flex-direction: column;
        }


        .user-modal .user-modal-content .left-content .item.active {
            background: #e8e8e8;
        }

        .user-modal .user-modal-content .center-content {
            width: 1px;
            border-right: solid 1px rgba(34, 36, 38, .15);
        }

        .user-modal .user-modal-content .right-content {
            width: 100%;
            height: 100%;
            overflow-y: auto;
            overflow-x: hidden;
            box-sizing: border-box;
            padding-right: 8px;
        }

        .user-modal .user-modal-content .right-content .area {
            width: 100%;
            height: 100%;
        }

        .user-modal .user-modal-content .area input:read-only {
            border-color: transparent;
        }

        .user-modal .user-modal-content .area.profile {
            display: flex;
            gap: 1em;
        }

        .user-modal .user-modal-content .area.profile .icon-content {}

        .user-modal .user-modal-content .area.profile .information {
            width: 100%;
        }

        .user-modal .user-modal-content .area.profile .user-icon {
            position: relative;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }

        .user-modal .user-modal-content .area.profile .user-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-modal .user-modal-content .area.profile .user-icon::before {
            content: "";
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .permission-readonly {
            border: none !important;
            color: var(--color-blue) !important;
            padding: 0.8em 0 !important;
        }

        @media screen and (max-width: 1250px) {
            .right-container {
                display: none;
            }
        }

        @media screen and (max-width: 768px) {
            .left-container {
                width: 100%;
                max-width: unset;
            }

        }
    </style>
    @if ($useRightContent == false)
        <style>
            header {
                background-color: white !important;
                box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.1) !important;
            }

            header .right .menu-user .name {
                color: var(--color-black) !important;
                text-shadow: none !important;
            }

            header .right .ui.menu .item>i.dropdown.icon {
                color: black;
            }
        </style>
    @endif
    <link rel="stylesheet" href="{{ asset('/css/schedule-sidebar.css') }}">
    @if (isset($title))
        <title>Karte - {{ $title }}</title>
    @else
        <title>Karte</title>
    @endif
    <script type="module">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content")
            }
        });

        window.$sectionReadonly = () => {
            $("section.content select").each(function() {
                const selectedText = $(this).find("option:selected").text();
                const inputText = $("<input>").attr("type", "text").val(selectedText.trim());
                $(this).replaceWith(inputText);
            });
            $("section.content input").prop("readonly", true);
            $("section.content input[type='checkbox']").prop("disabled", true);
            $("section.content input[type='radio']").prop("disabled", true);
            $("section.content input").prop("placeholder", '');
            $("section.content input").addClass("permission-readonly");
        }
    </script>
    {{ $header ?? '' }}
</head>

<body>
    @if ($useMenu == true)
        <x-menu></x-menu>
    @endif
    <div class="full-screen {{ $mode ?? '' }}">
        <div class="left-container">
            @if ($laborAlert == true)
                <section class="content">
                    <x-labor-alert name="{{ $laborAlertTitle }}" />
                </section>
            @endif
            {{ $slot }}
        </div>
        @if ($useRightContent)
            <div class="right-container">
                <section class="schedule">
                    @livewire('side-schedule')
                </section>
            </div>
        @endif
    </div>

    {{ $footer ?? '' }}

    @if (session('post-success'))
        <script type="module">
            $.toast({
                position: 'bottom right',
                class: 'success',
                message: `{{ session('post-success') }}`
            })
        </script>
    @endif

    @if (session('error'))
        <script type="module">
            $.toast({
                position: 'bottom right',
                class: 'red',
                message: `{{ session('error') }}`
            })
        </script>
    @endif

    <!-- 個人設定 -->
    <div class="ui modal user-modal">
        <i class="close icon"></i>
        <div class="header">個人設定</div>
        <div class="content">
            @livewire('user-modal-content')
        </div>
    </div>

    <script type="module">
        const user_modal = $('.user-modal').modal({
            blurring: true
        });
        window.openUserModal = () => {
            user_modal.modal('show');
        };
    </script>
</body>

</html>
