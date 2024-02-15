<x-layout title="管理画面" useRightContent="{{false}}">
    @slot('header')
    <style type="text/css">

    </style>
    @endslot

    <div class="ui huge breadcrumb">
        <a class="section" href="{{route('home.select')}}">会社・操作選択</a>
        <i class="right chevron icon divider"></i>
        <a class="section" href="{{route('admin.index')}}">Karte管理</a>
        <i class="right chevron icon divider"></i>
        <div class="active section">会社一覧</div>
    </div>
    <table class="ui large table">
        <thead>
            <tr>
                <th>会社名</th>
                <th>従業員数</th>
                <th>代表者名</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John</td>
                <td>Approved</td>
                <td>None</td>
            </tr>
            <tr>
                <td>Jamie</td>
                <td>Approved</td>
                <td>Requires call</td>
            </tr>
            <tr>
                <td>Jill</td>
                <td>Denied</td>
                <td>None</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>3 People</th>
                <th>2 Approved</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</x-layout>