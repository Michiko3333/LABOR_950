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
            background: #fff;

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

        @media screen and (max-width: 768px) {
            .left-container {
                width: 100%;
                max-width: unset;
            }

            .right-container {
                display: none;
            }
        }
    </style>
    @if (isset($title))
    <title>Karte - {{ $title }}</title>
    @else
    <title>Karte</title>
    @endif
    <script type="module">
        $.ajaxSetup({headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") }});
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
            <x-labor-alert name="{{$laborAlertTitle}}" />
            @endif
            {{ $slot }}
        </div>
        @if($useRightContent)
        <div class="right-container">{{ $side ?? '' }}</div>
        @endif
    </div>

    {{ $footer ?? '' }}
</body>

</html>