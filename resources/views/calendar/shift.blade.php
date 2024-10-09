<x-layout title="年間勤務予定表" mode="">
    @slot('header')
        <link rel="stylesheet" href="{{ asset('custom/calendar-small.css') }}">
        <style>
            .shift-calendar-inputs .ui.basic.label {
                padding-top: 1.2em !important;
            }
        </style>
    @endslot

    <section class="content pb-3">
        <div class="ui huge breadcrumb mb-0 mb-2">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">年間勤務予定表</div>
        </div>
        @livewire('shift-form', ['start_year' => $this_year])
    </section>
</x-layout>
