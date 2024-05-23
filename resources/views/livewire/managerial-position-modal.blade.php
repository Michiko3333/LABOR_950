<div class="content">
    @if ($errors->any())
        <div class="ui error message">
            <div class="header">入力エラー</div>
            <ul class="list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form name="edit-managerial-position">
        <div class="ui form">
            <input type="hidden" wire:model='form_id'>
            <div class="field required mb-2">
                <label>役職名</label>
                <input type="text" placeholder="役職名" wire:model='form_name' required>
            </div>
            <div class="field required mb-2">
                <label>役職名（カナ）</label>
                <input type="text" placeholder="役職名（カナ）" wire:model='form_name_kana' required>
            </div>
            <div class="field required mb-2">
                <label>ランク</label>
                <input type="number" placeholder="ランク" wire:model='form_rank' min="0" max="10" required>
            </div>
            <div class="ui checkbox mr-1">
                <input type="checkbox" name="form_representative_flg" value='1'
                    wire:model='form_representative_flg'>
                <label>代表取締役</label>
            </div>
        </div>
    </form>
    <div style="display: flex; justify-content: flex-end; padding-top: 18px;">
        <div class="actions">
            <button class="ui negative button" type="button">キャンセル</button>
        </div>
        <div class="ui approve primary button" style="margin-left: 10px;" wire:click="onEditManagerialPosition">登録</div>
    </div>
</div>

