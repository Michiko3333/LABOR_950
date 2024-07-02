<div>
    @script
        <script>
            const onCancel = () => {
                $wire.dispatch('onCancelDepartment');
            }
            const onEdit = () => {
                if (window.$lw.isSubmit) return;
                window.$lw.isSubmit = true;
                const form_id = document.getElementsByClassName('edit-department-form_id')[1].value;
                const form_name = document.getElementsByClassName('edit-department-form_name')[1].value;
                const form_parent = document.getElementsByClassName('edit-department-form_parent')[1].value;
                const form_permission = document.getElementsByClassName('edit-department-form_permission')[1].value;
                const data = {
                    form_id: form_id,
                    form_name: form_name,
                    form_parent: form_parent,
                    form_permission: form_permission
                };
                $wire.dispatch('onEditDepartment', {
                    data: data
                });
            }
            const onRemove = (id) => {
                $wire.dispatch('onRemoveDepartment');
            };
            window.$lw = {
                onCancel: onCancel,
                onEdit: onEdit,
                onRemove: onRemove,
                isSubmit: false
            };
        </script>
    @endscript

    @if ($userPermission->isWritableFor(3) && $userPermission->isBasicDepartment())
        <div style="padding: 1em 0;">
            <button class="ui button primary" type="button" wire:click='new' style="width: 100px;">追加</button>
        </div>
    @endif

    @if ($departments->isNotEmpty())
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <ul class="list-table">
                    <x-department-rec-list :departments="$departments" :parent="null" />
                </ul>
            </div>
        </div>
    @else
        <h3>設定されていません</h3>
    @endif

    <div id="editDepartment" class="ui modal mini edit-department-modal">
        <i class="close icon"></i>
        <div class="header">
            部署の追加
        </div>
        <div class="content" wire:ignore>
            <form id="edit-department" name="edit-department" onsubmit="return false;">
                <div class="ui form">
                    <div class="ui error message hidden">
                        <div class="header">入力エラー</div>
                        <ul class="list">
                            <li>必須項目が空欄か、フォーマットが正しくありません</li>
                        </ul>
                    </div>
                    <input type="hidden" class="edit-department-form_id" name="edit-department-form_id">
                    <div class="field required mb-2">
                        <label>部署名</label>
                        <input class="edit-department-form_name" name="edit-department-form_name" type="text"
                            placeholder="部署名" maxlength="15">
                    </div>
                    <div class="field mb-2">
                        <label>部署権限</label>
                        <select class="ui fluid dropdown edit-department-form_permission"
                            name="edit-department-form_permission">
                            @foreach ($permission_list as $k => $value)
                                <option value="{{ $k }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label>上位部署</label>
                        <select class="ui fluid dropdown edit-department-form_parent"
                            name="edit-department-form_parent">
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="actions">
            <button class="ui negative button" onClick="javascript:$lw.onCancel()" type="button">キャンセル</button>
            <div class="ui primary button" onClick="javascript:$lw.onEdit()">登録</div>
        </div>
    </div>
</div>
