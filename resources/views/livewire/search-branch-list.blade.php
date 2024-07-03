<div class="content">
    <div class="two fields pb-1">
        <div class="field">
            <div class="ui left icon input">
                <input type="text" placeholder="支店名" maxlength="20" wire:model.live="search" style="width: 280px;">
                <i class="search icon"></i>
            </div>
        </div>
    </div>
    <div class="ui very relaxed list" style="min-height: 300px;">
        @foreach ($data['items'] as $item)
            <div class="item">
                <div class="right floated content">
                    <button type="button" class="ui button small"
                        wire:click="selectBranch({{ $item->id }})">選択</button>
                </div>
                <div class="content">
                    <bold class="header ui text primary" style="">{{ $item->branch_name }}</bold>
                </div>
            </div>
        @endforeach
    </div>
    <div class="small-pagination" style="text-align:center;">
        <div class="ui pagination borderless mini menu">
            <a class="item pagination-disable @if ($disablePrev) disabled @endif" wire:click="onPrev"><i
                    class="chevron left icon"></i></a>
            <a class="item pagination-disable @if ($disableNext) disabled @endif" wire:click="onNext"><i
                    class="chevron right icon"></i></a>
        </div>
    </div>
</div>
