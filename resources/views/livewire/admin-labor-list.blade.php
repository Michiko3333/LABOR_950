<div>
    <div class="filter">
        <div class="ui left icon input" style="margin-right: 1em; display: inline-block;">
            <input type="text" placeholder="氏名" wire:model.live="search">
            <i class="search icon"></i>
        </div>
        <div style="width: 150px; margin-right: 1em; display: inline-block;">
            <select class="ui fluid dropdown" name="employee_type" wire:model.live="type">
                <option value="">全て</option>
                <option value="1">社労士</option>
                <option value="2">顧客社員</option>
            </select>
        </div>
        <div class="ui action input">
            <input id="company_name" type="text" placeholder="会社名" wire:model.live="company_name">
            <button id="company_btn" class="ui button">会社検索</button>
        </div>
    </div>
    <table class="ui large table">
        <thead>
            <tr>
                <th style="width: 150px;">氏名</th>
                <th style="width: 150px;">区分</th>
                <th style="width: 360px;">会社名</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($data['items'] as $item)
            <tr class="card">
                <td>{{ $item->last_name }} {{$item->first_name}}</td>
                <td>@if($item->company_division == 1) 社労士 @elseif($item->company_division == 2) 顧客社員 @endif</td>
                <td>{{$item->company_name}}</td>
                <td class="right aligned collapsing">
                    @if($item->company_division == 1)
                    <button class="ui basic primary button" type="button" wire:click="toAddCompany({{ $item->id }})">
                        顧客会社設定
                    </button>
                    @endif
                    <button class="ui basic primary button" type="button" wire:click="toPermission({{ $item->id }})">
                        権限
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