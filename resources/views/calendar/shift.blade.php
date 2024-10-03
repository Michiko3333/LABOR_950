<x-layout title="年間勤務予定表" mode="">
    @slot('header')
        <link rel="stylesheet" href="{{ asset('custom/calendar-small.css') }}">
    @endslot

    <section class="content pb-3">
        <div class="ui huge breadcrumb mb-0 mb-2">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">年間勤務予定表</div>
        </div>
        @livewire('calendar-small', ['year' => 2024, 'month' => 11, 'showHeader' => true, 'firstDayWeek' => 1, 'firstDate' => 1])
    </section>
</x-layout>
