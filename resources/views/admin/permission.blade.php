<x-layout title="個別権限付与" useRightContent="{{ true }}">
    @slot('header')
        <style type="text/css">
            .ui.table {
                border: none;
                borde-radius: 8px;
                margin-top: 0;
            }

            .ui.table>tbody>tr>td {
                padding: 1.6em .7em;
            }

            div.filter {
                background: #f9fafb;
                padding: 1em;
                borde-radius: 8px;
            }

            div.pagination {
                display: flex;
                justify-content: center;
            }

            span.tag {
                display: inline-block;
                background-color: #e8e8e8;
                padding: 0.35em 0.7em;
                line-height: 1;
                color: #0009;
                text-transform: none;
                font-weight: 700;
                border-radius: 0.2em;
            }

            .ui.toggle.checkbox input:checked~label:before {
                background-color: var(--color-red) !important;
            }
        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb mb-0">
            @if (request()->route()->getName() === 'employee_permission')
                <a class="section" href="{{ route('home.index') }}">ホーム</a>
                <i class="right chevron icon divider"></i>
                <a class="section" href="{{ route('employee') }}">社員一覧</a>
            @else
                <a class="section" href="{{ route('home.select') }}">会社・操作選択</a>
                <i class="right chevron icon divider"></i>
                <a class="section" href="{{ route('admin.index') }}">Karte管理</a>
                <i class="right chevron icon divider"></i>
                <a class="section" href="{{ route('admin.labor') }}">アカウント管理</a>
            @endif
            <i class="right chevron icon divider"></i>
            <div class="active section">個別権限</div>
        </div>
        <h1>個別権限：{{ $employee->last_name }}　{{ $employee->first_name }}</h1>
        <p>各種機能に対してユーザー単位で指定した権限を<span class="ui text red">剥奪</span>します。</p>
        <p>※更新した内容は当該ユーザーの次回ログイン時に反映</p>
        <div class="ui card card-shadow item-0" style="width: 100%;">
            <div class="content">
                <form method="post"
                    action="{{ request()->route()->getName() === 'employee_permission' ? route('employee_permission_post', ['id' => $employee->id]) : route('labor_permission_post', ['id' => $employee->id]) }}">
                    @csrf
                    <table class="ui large table">
                        <thead>
                            <tr>
                                <th style="width: 350px;">機能</th>
                                <th style="width: 150px;">閲覧</th>
                                <th style="width: 150px;">編集</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach ($features as $feature)
                                <tr class="card">
                                    <td>{{ $feature->name }}</td>
                                    <td>
                                        <div class="ui toggle checkbox red">
                                            <input type="checkbox" name="permissions[{{ $feature->id }}][read]"
                                                value="1"
                                                {{ $employee->account_permission()->where('feature_id', $feature->id)->value('read') == 1? 'checked': '' }}>
                                            <label></label>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="ui toggle checkbox red">
                                            <input type="checkbox" name="permissions[{{ $feature->id }}][write]"
                                                value="1"
                                                {{ $employee->account_permission()->where('feature_id', $feature->id)->value('write') == 1? 'checked': '' }}>
                                            <label></label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div style="display: flex; justify-content: flex-end;">
                        <a class="ui button negative basic"
                            href="{{ request()->route()->getName() === 'employee_permission' ? route('employee') : route('admin.labor') }}"
                            style="width: 200px; margin-right: 10px;">キャンセル</a>
                        <button class="ui button primary" type="submit" style="width: 200px;">更新</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>
