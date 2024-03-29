<div>
    @script
    <script>
        const onCancel = () => {
            $wire.dispatch('onCancelDepartment');
        }
        const onEdit = () =>{
            $wire.dispatch('onEditDepartment');
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

    <div class="ui card full card-shadow item-0">
        <div class="content">
            <ul class="list-table">
                <x-department-rec-list :departments="$departments" :parent="null" />
            </ul>
        </div>
    </div>

    <div id="editDepartment" class="ui modal mini edit-department-modal">
        <i class="close icon"></i>
        <div class="header">
            部署の追加
        </div>
        <div class="content">
            <form name="edit-department">
                <div class="ui form">
                    <input type="hidden" wire:model='form_id'>
                    <div class="field required mb-2">
                        <label>部署名</label>
                        <input type="text" placeholder="部署名" wire:model='form_name'>
                    </div>
                    <div class="field mb-2">
                        <label>部署権限</label>
                        <select class="ui fluid dropdown" wire:model='form_permission'>
                            @foreach ($permission_list as $k => $value)
                            <option value="{{$k}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label>上位部署</label>
                        <select class="ui fluid dropdown" wire:model='form_parent'>
                            <option value="">指定なし</option>
                            @foreach ($parent_list as $k => $name)
                            <option value="{{$k}}">{{$name}}</option>
                            @endforeach
                        </select>
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