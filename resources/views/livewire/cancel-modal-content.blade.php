<div class="content">
    @if($this->receptionistId !== null)
        <div class="ui header" style="min-height: 60px; text-align: center; font-size: 18px;">担当から削除しますか？</div>
    @elseif($this->managerialPositionId !== null)
        <div class="ui header" style="min-height: 60px; text-align: center; font-size: 18px;">役職を削除しますか？</div>
    @endif
    <div class="content" style="display: flex; justify-content: space-evenly;">
        <a class="ui basic button" href="javascript:closeCancelModal()" style="width: 150px;">キャンセル</a>
        @if($this->receptionistId !== null)
            <button type="button" class="ui negative basic button" wire:click="cancelReception" style="width: 150px;">削除</button>
        @elseif($this->managerialPositionId !== null)
            <button type="button" class="ui negative basic button" wire:click="cancelManagerialPosition" style="width: 150px;">削除</button>
        @endif
    </div>
</div>
