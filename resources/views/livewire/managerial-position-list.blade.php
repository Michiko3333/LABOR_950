<div>
    @if ($userPermission->isWritableFor(4) && $userPermission->isBasicDepartment())
        <div style="padding: 1em 0;">
            <button class="ui button primary" type="button" style="width: 100px;" wire:click='new'>追加</button>
        </div>
    @endif
    @if (!empty($data))
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <ul class="list-table">
                    @foreach ($data as $item)
                        <li class="item">
                            <div class="name">{{ $item['name'] }}</div>
                            <div class="actions">
                                @if ($userPermission->isWritableFor(4) && $userPermission->isBasicDepartment())
                                    <button class="ui button edit" type="button"
                                        wire:click='edit("{{ $item['id'] }}")'>編集</button>
                                    <button class="ui button icon basic negative" type="button"
                                        wire:click='remove({{ $item['id'] }}, "{{ $item['name'] }}")'><i
                                            class="trash alternate outline icon"></i></button>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @else
        <h3>設定されていません</h3>
    @endif

    <div id="editManagerial" class="ui modal mini edit-managerial-position-modal">
        <i class="close icon"></i>
        <div class="header">
            役職の追加
        </div>
        <div class="content" wire:ignore>
            <form id="edit-managerial-position" name="edit-managerial-position" onsubmit="return false;">
                <div class="ui form">
                    <div class="ui error message hidden">
                        <div class="header">入力エラー</div>
                        <ul class="list">
                            <li>必須項目が空欄か、フォーマットが正しくありません</li>
                        </ul>
                    </div>
                    <input type="hidden" class="edit-managerial-position-form_id"
                        name="edit-managerial-position-form_id">
                    <div class="field required mb-2">
                        <label>役職名</label>
                        <input class="edit-managerial-position-form_name" name="edit-managerial-position-form_name"
                            type="text" placeholder="役職名" maxlength="20" autocomplete="off">
                    </div>
                    <div class="field required mb-2">
                        <label>役職名（カナ）</label>
                        <input class="edit-managerial-position-form_name_kana"
                            name="edit-managerial-position-form_name_kana" type="text" placeholder="役職名（カナ）"
                            maxlength="50" autocomplete="off">
                    </div>
                    <div class="field required mb-2">
                        <label>序列</label>
                        <input type="number" class="edit-managerial-position-form_rank"
                            name="edit-managerial-position-form_rank" placeholder="序列" min="1" max="10" autocomplete="off">
                    </div>
                    <div class="ui checkbox mr-1">
                        <input type="checkbox" class="edit-managerial-position-form_representative_flg" value='1'
                            name="edit-managerial-position-form_representative_flg">
                        <label>代表取締役</label>
                    </div>
                </div>

            </form>
        </div>
        <div class="actions">
            <button class="ui negative button" onClick="javascript:$lw.onCancel()" type="button">キャンセル</button>
            <div class="ui primary button" onClick="javascript:$lw.onEdit()">登録</div>
        </div>
    </div>

    @script
        <script>
            const onCancel = () => {
                $wire.dispatch('onCancelManagerial');
            }
            const onEdit = () => {

                if (window.$lw.isSubmit) return;
                window.$lw.isSubmit = true;

                const form_id = document.getElementsByClassName('edit-managerial-position-form_id')[1].value;
                const form_name = document.getElementsByClassName('edit-managerial-position-form_name')[1].value;
                const form_name_kana = document.getElementsByClassName('edit-managerial-position-form_name_kana')[1].value;
                const form_rank = document.getElementsByClassName('edit-managerial-position-form_rank')[1].value;
                const form_representative_flg = document.getElementsByClassName(
                    'edit-managerial-position-form_representative_flg')[1].checked;

                const data = {
                    form_id: form_id,
                    form_name: form_name,
                    form_name_kana: form_name_kana,
                    form_rank: form_rank,
                    form_representative_flg: form_representative_flg == 1 ? 1 : 0
                };
                $wire.dispatch('onEditManagerial', {
                    data: data
                });
            }
            const onRemove = (id) => {
                $wire.dispatch('onRemoveManagerial');
            };
            window.$lw = {
                onCancel: onCancel,
                onEdit: onEdit,
                onRemove: onRemove,
                isSubmit: false
            };
        </script>
    @endscript
</div>
