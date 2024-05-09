<x-layout title="カレンダー" mode="">
    @slot('header')
    <link rel="stylesheet" href="{{ asset('custom/calendar.css') }}">
    @endslot

    <div id="calendar"></div>
    <script src=" {{ asset('custom/calendar.js') }} "></script>
    <script>
        const calendar = new Calendar('calendar', []);
    </script>
</x-layout>
