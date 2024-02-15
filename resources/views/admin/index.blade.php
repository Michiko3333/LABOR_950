<x-layout title="管理画面" useRightContent="{{false}}">
    @slot('header')
    <style type="text/css">

    </style>
    @endslot

    <div class="ui huge breadcrumb">
        <a class="section" href="{{route('home.select')}}">会社・操作選択</a>
        <i class="right chevron icon divider"></i>
        <div class="active section">Karte管理</div>
    </div>
</x-layout>