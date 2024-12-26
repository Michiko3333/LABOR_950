<div>
    @if ($userPermission->isWritableFor(16) && $userPermission->isBasicDepartment())
        <div style="padding: 1em 0;">
            <button class="ui button primary" type="button" style="width: 100px;" wire:click='new'>追加</button>
        </div>
    @endif
    @if (count($data) !== 0)
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <ul class="list-table">
                    @foreach ($data as $item)
                        <li class="item">
                            <div class="qualification_name">{{ $item['qualification_name'] }}：{{ $item['qualification_allowance'] ?? 0 }}円</div>
                            <div class="actions">
                                @if ($userPermission->isWritableFor(16) && $userPermission->isBasicDepartment())
                                    <button class="ui button edit" type="button"
                                        wire:click='edit("{{ $item['id'] }}")'>編集</button>
                                    <button class="ui button icon basic negative" type="button"
                                        wire:click='remove({{ $item['id'] }}, "{{ $item['qualification_name'] }}")'><i
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

    <div id="editQualifications" class="ui modal mini edit-qualifications-modal">
        <i class="close icon"></i>
        <div class="header">
            資格情報の追加
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
                    <input type="hidden" class="edit-qualifications-form_id"
                        name="edit-qualifications-form_id">
                    <div class="field required mb-2">
                        <label>資格名</label>
                        <input class="edit-qualifications-form_qualification_name" name="edit-qualifications-form_qualification_name"
                            type="text" placeholder="資格名" maxlength="50">
                    </div>
                    <div class="field required mb-2">
                        <label>資格手当</label>
                        <input class="edit-qualifications-form_qualification_allowance"
                            name="edit-qualifications-form_qualification_allowance" type="number" placeholder="5000"
                            min="0" max="10000000">
                    </div>
                    <div class="field mb-2">
                        <label>該当等級</label>
                        <input type="number" class="edit-qualifications-form_applicable_grade"
                            name="edit-qualifications-form_applicable_grade" placeholder="該当等級" min="0" max="">
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
                $wire.dispatch('onCancelQualification');
            }
            const onEdit = () => {

                if (window.$lw.isSubmit) return;
                window.$lw.isSubmit = true;

                const form_id = document.getElementsByClassName('edit-qualifications-form_id')[1] ? document.getElementsByClassName('edit-qualifications-form_id')[1].value : null;
                const form_qualification_name = document.getElementsByClassName('edit-qualifications-form_qualification_name')[1].value;
                const form_qualification_allowance = document.getElementsByClassName('edit-qualifications-form_qualification_allowance')[1].value;
                const form_applicable_grade = document.getElementsByClassName('edit-qualifications-form_applicable_grade')[1].value || null;
                const data = {
                    form_id: form_id,
                    form_qualification_name: form_qualification_name,
                    form_qualification_allowance: form_qualification_allowance,
                    form_applicable_grade: form_applicable_grade,
                };
                $wire.dispatch('onEditQualification', {
                    data: data
                });
            }
            const onRemove = (id) => {
                $wire.dispatch('onRemoveQualification');
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
