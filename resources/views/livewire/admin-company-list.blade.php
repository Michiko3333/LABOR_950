<div>
    @php
    $company_listed_type = $subList['company_listed_type'];
    $businessTypes = $subList['businessTypes'];
    @endphp
    <div class="filter">
        <div class="ui left icon input" style="width: 100%; max-width: 300px; margin-right: 3em;">
            <input type="text" placeholder="会社名">
            <i class="search icon"></i>
        </div>
    </div>
    <table class="ui large table">
        <thead>
            <tr>
                <th style="width: 360px;">会社名</th>
                <th style="width: 150px;">会社区分</th>
                <th style="width: 150px;">法人格</th>
                <th style="width: 150px;">法人番号</th>
                <th>従業員数</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($data as $item)
            <tr class="card">
                <td>{{ $item->name }}</td>
                <td>{{ $businessTypes[$item->company_division] ?? 'E' }}</td>
                <td>{{ $company_listed_type[$item->company_type_id] ?? 'E' }}</td>
                <td>{{ $item->company_no }}</td>
                <td>{{ $item->employee_sum }}</td>
                <td class="right aligned collapsing">
                    <button class="ui button" type="button" wire:click="toEdit({{ $item->id }})">
                        編集
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">
        <div class="ui pagination borderless mini menu">
            <a class="active item">
                1
            </a>
            <div class="disabled item">
                ...
            </div>
            <a class="item">
                10
            </a>
            <a class="item">
                11
            </a>
            <a class="item">
                12
            </a>
        </div>
    </div>
</div>