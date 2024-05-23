<div>
    @php
    $company_type = $subList['company_type'];
    $businessTypes = $subList['businessTypes'];
    @endphp
    <div class="filter">
        <div class="ui left icon input" style="width: 100%; max-width: 300px; margin-right: 3em;">
            <input type="text" placeholder="会社名" wire:model.live="search">
            <i class="search icon"></i>
        </div>
    </div>
    <table class="ui large table">
        <thead>
            <tr>
                <th style="width: 360px;">会社名</th>
                <th style="width: 150px;">種別</th>
                <th style="width: 120px;">会社区分</th>
                <th style="width: 150px;">法人格</th>
                <th style="width: 120px;">法人番号</th>
                <th style="min-width: 90px;">従業員数</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($data['items'] as $item)
            <tr class="card">
                <td>{{ $item->name }}</td>
                <td>{{ $item->company_division == 1 ? '社労士事務所' : '顧客企業' }}</td>
                <td>{{ $businessTypes[$item->business_type] ?? 'E' }}</td>
                <td>{{ $company_type[$item->company_type_id] ?? 'E' }}</td>
                <td>{{ $item->company_no }}</td>
                <td>{{ $employeeSums[$item->id - 1] ?? '0'}} 名</td>
                <td class="right aligned collapsing">
                    <button class="ui button" type="button" wire:click="toDepartment({{ $item->id }})">
                        部署編集
                    </button>
                    <button class="ui basic primary button" type="button" wire:click="toEdit({{ $item->id }})">
                        編集
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <livewire:pagination :pagination="$data['pagination']" wire:key="pagination-component" />
</div>