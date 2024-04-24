<div>
    @script
    <script>
        const onCancel = () => {
            $wire.dispatch('onCancelManagerialPosition');
        }
        const onEdit = () =>{
            $wire.dispatch('onEditManagerialPosition');
        }
        window.$lw = {
            onCancel: onCancel,
            onEdit: onEdit
        };
    </script>
    @endscript

    <div style="padding: 1em 0;">
        <button class="ui button primary modalbtn" type="button" wire:click='new' style="width: 100px;">追加</button>
    </div>

    @if ($managerial_position->isNotEmpty())
    <div class="ui card full card-shadow item-0">
        <div class="content">
            <ul class="list-table">
                <x-managerial-position-list :managerial_position="$managerial_position" />
            </ul>
        </div>
    </div>
    @else
    <h3>設定されていません</h3>
    @endif

    <div id="editManagerialPosition" class="ui modal mini edit-department-modal">
        <i class="close icon"></i>
        <div class="header">
        役職の追加
        </div>
        <div class="content">
            <form name="edit-managerial-position">
                <div class="ui form">
                    <input type="hidden" wire:model='form_id'>
                    <div class="field required mb-2">
                        <label>役職名</label>
                        <input type="text" placeholder="役職名" wire:model='form_name'>
                    </div>
                    <div class="field required mb-2">
                        <label>役職名（カナ）</label>
                        <input type="text" placeholder="役職名（カナ）" wire:model='form_name_kana'>
                    </div>
                    <div class="field required mb-2">
                        <label>ランク</label>
                        <input type="text" placeholder="ランク" wire:model='form_rank'>
                    </div>
                    <div class="ui checkbox mr-1">
                        <input type="checkbox" name="form_representative_flg" value='1' wire:model='form_representative_flg'>
                        <label>代表取締役</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="actions">
            <button class="ui negative button" onClick="javascript:$lw.onCancel()" type="button">キャンセル</button>
            <div class="ui approve primary button" onClick="javascript:$lw.onEdit()">登録</div>
        </div>
    </div>
</div>