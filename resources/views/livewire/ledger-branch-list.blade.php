<div class="employee-select-area ui form">
    <div class="two fields pb-1">
        <div class="field">
            <div class="ui left icon input">
                <input type="text" placeholder="事業所名" maxlength="20" wire:model.live="search">
                <i class="search icon"></i>
            </div>
        </div>
    </div>

    <div class="ui very relaxed list">
        @foreach ($data['items'] as $item)
        <div class="item {{$selected_id == $item->id ? 'selected' : ''}}">
            <div class="right floated content">
                <button type="button" class="ui button small" wire:click="selectBranch({{$item->id}})">選択</button>
            </div>
            <div class="content">
                <a class="header" style="">{{$item->name}}</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="small-pagination">
        <div class="ui pagination borderless mini menu">
            <a class="item @if ($disablePrev) disabled @endif" wire:click="onPrev"><i class="chevron left icon"></i></a>
            <a class="item @if ($disableNext) disabled @endif" wire:click="onNext"><i
                    class="chevron right icon"></i></a>
        </div>
    </div>
</div>