<div class="employee-select-area ui form">
    <div class="two fields pb-1">
        <div class="field">
            <div class="ui left icon input">
                <input type="text" placeholder="従業員氏名" maxlength="20" wire:model.live="search" autocomplete="off">
                <i class="search icon"></i>
            </div>
        </div>
        <div class="field">
            <select class="ui fluid dropdown" wire:model.live="branch_id">
                <option value="">全ての支店</option>
                @foreach ($branch_list as $k => $item)
                    <option value="{{ $k }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="ui very relaxed list">
        @foreach ($data['items'] as $item)
            <div class="item {{ $selected_id == $item->id ? 'selected' : '' }}">
                <div class="right floated content">
                    <button type="button" class="ui button small"
                        wire:click="selectEmployee({{ $item->id }})">選択</button>
                </div>
                <img class="ui avatar image" src="{{ asset('/img/image.png') }}">
                <div class="content">
                    <a class="header" style="">{{ $item->last_name }} {{ $item->first_name }}</a>
                    <div class="description"><b>{{ $item->branch->name }}</b></div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="small-pagination">
        <div class="ui pagination borderless mini menu">
            <button type="button"
                class="ui button item pagination-disable @if ($disablePrev) disabled @endif"
                wire:click.debounce.150ms="onPrev"><i class="chevron left icon"></i></button>
            <button type="button"
                class="ui button item pagination-disable @if ($disableNext) disabled @endif"
                wire:click.debounce.150ms="onNext"><i class="chevron right icon"></i></button>
        </div>
    </div>
</div>
