<div class="content">
    @if ($this->receptionistId !== null)
        <div class="ui header" style="min-height: 60px; text-align: center; font-size: 18px;">担当から削除しますか？</div>
    @elseif($this->managerialPositionId !== null)
        <div class="ui header" style="min-height: 60px; text-align: center; font-size: 18px;">役職を削除しますか？</div>
    @elseif($this->closureId !== null)
        <div class="ui header" style="min-height: 60px; text-align: center; font-size: 18px;">休業情報を削除しますか？</div>
    @elseif($this->allowanceId !== null)
        <div class="ui header" style="text-align: center; font-size: 18px;">
            手当「<span class="remove-allowance-name">{{ $this->name }}</span>」を削除しますか？</div>
        <span class="ui medium red text" style="text-align: center;">
            <i class="exclamation triangle icon"></i>
            履歴データに保存されず、元に戻すことはできません。
        </span>
    @elseif($this->allowanceHistoryId !== null)
        <div class="ui header" style="text-align: center; font-size: 18px;">
            手当履歴「<span class="remove-allowance-hisroty-name">{{ $this->name }}</span>」を削除しますか？</div>
        <span class="ui medium red text" style="text-align: center;">
            <i class="exclamation triangle icon"></i>
            元に戻すことはできません。
        </span>
    @endif
    <div class="ui divider mt-1"></div>
    <div class="content" style="display: flex; justify-content: flex-end;">
        <a class="ui basic button" href="javascript:closeCancelModal()" style="width: 130px;">キャンセル</a>
        @if ($this->receptionistId !== null)
            <button type="button" class="ui negative basic button button-disable" wire:click="cancelReception"
                style="width: 100px;">削除</button>
        @elseif($this->managerialPositionId !== null)
            <button type="button" class="ui negative basic button button-disable" wire:click="cancelManagerialPosition"
                style="width: 100px;">削除</button>
        @elseif($this->allowanceId !== null || $this->allowanceHistoryId !== null)
            <button type="button" class="ui negative basic button button-disable" wire:click="cancelAllowance"
                style="width: 100px;">削除</button>
        @elseif($this->closureId !== null)
            <button type="button" class="ui negative basic button button-disable" wire:click="cancelClosure"
                style="width: 150px;">削除</button>
        @endif
    </div>
</div>
