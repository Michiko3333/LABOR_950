<div>
    @if ($userPermission->isWritableFor(16) && $userPermission->isBasicDepartment())
        <div style="padding: 1em 0;">
            <button class="ui button primary" type="button" style="width: 100px;" wire:click='new'>追加</button>
        </div>
    @endif

    <div class="ui card full card-shadow item-0">
        <div class="content">
            <table class="ui large table">
                <thead>
                    <tr>
                        <th style="width: 20%;">資格名</th>
                        <th style="width: 20%;">資格手当</th>
                        <th style="width: 20%;">該当役職</th>
                        <th style="width: 10%; text-align: center;">該当等級</th>
                        <th style="width: 20%;">備考</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    @foreach ($data['items'] as $item)
                        <tr class="card">
                            <td>{{ $item['qualification_name'] }}</td>
                            <td>{{ $item['qualification_allowance'] ?? 0 }}円</td>
                            <td>
                                @if(count($item['managerial_position_ids']) !== 0)
                                    @foreach($item['managerial_position_ids'] as $managerial_position)
                                        <span class="tag">{{ $managerial_position->name }}</span>
                                    @endforeach
                                @else
                                    -
                                @endif
                            </td>
                            <td style="text-align: center;">{{ $item['applicable_grade'] ? $item['applicable_grade'] : '-' }}</td>
                            <td>{{ $item['other'] ? $item['other'] : '-' }}</td>
                            <td class="right aligned collapsing">
                                @if ($userPermission->isAdmin() || $userPermission->isLabor() || $userPermission->isWritableFor(16))
                                    <button class="ui button edit" type="button"
                                        wire:click='edit("{{ $item['id'] }}")'>編集</button>
                                    <button class="ui button icon basic negative" type="button"
                                        wire:click='remove({{ $item['id'] }}, "{{ $item['qualification_name'] }}")'><i
                                            class="trash alternate outline icon"></i></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <livewire:pagination :pagination="$data['pagination']" wire:key="pagination-component" />
        </div>
    </div>

    <div id="editQualifications" class="ui modal tiny edit-qualifications-modal">
        <i class="close icon"></i>
        <div class="header">
            資格情報の追加
        </div>
        <div class="content" wire:ignore>
            <form id="edit-qualifications-position" name="edit-qualifications-position" onsubmit="return false;">
                <div class="ui form">
                    <div class="ui error message hidden">
                        <div class="header">入力エラー</div>
                        <ul class="list">
                            <li>必須項目が空欄か、フォーマットが正しくありません</li>
                        </ul>
                    </div>
                    <input type="hidden" class="edit-qualifications-form_id"
                        name="edit-qualifications-form_id">
                    <div class="field required">
                        <label>資格名</label>
                        <input class="edit-qualifications-form_qualification_name" name="edit-qualifications-form_qualification_name"
                            type="text" placeholder="資格名" maxlength="50" autocomplete="off">
                    </div>
                    <div class="two fields">
                        <div class="field required">
                            <label>資格手当</label>
                            <input type="number" class="edit-qualifications-form_qualification_allowance"
                                name="edit-qualifications-form_qualification_allowance" placeholder="5000" min="0" max="10000000" autocomplete="off">
                        </div>
                        <div class="field">
                            <label>該当等級</label>
                            <input type="text" class="edit-qualifications-form_applicable_grade" maxlength="255"
                                name="edit-qualifications-form_applicable_grade" placeholder="" autocomplete="off">
                        </div>
                    </div>
                    <div class="field">
                        <label>該当役職</label>
                        <select id="managerial_position_ids"
                            class="ui fluid search dropdown multiple managerial_position_ids" multiple=""
                            name="managerial_position_ids[]">
                        </select>
                    </div>
                    <div class="field">
                        <label>備考</label>
                        <input type="text" class="edit-qualifications-form_other"
                            name="edit-qualifications-form_other" placeholder="" maxlength="100" autocomplete="off">
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
        <script type="module">
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
                const form_managerial_position_ids = $('select[name="managerial_position_ids[]"]').dropdown('get value');
                const lastValue = form_managerial_position_ids.length > 0 
                    ? form_managerial_position_ids[form_managerial_position_ids.length - 1] 
                    : null;
                const form_other = document.getElementsByClassName('edit-qualifications-form_other')[1].value;
                const data = {
                    form_id: form_id,
                    form_qualification_name: form_qualification_name,
                    form_qualification_allowance: form_qualification_allowance,
                    form_applicable_grade: form_applicable_grade,
                    form_managerial_position_ids: lastValue,
                    form_other: form_other,
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
            window.addEventListener('success', () => {
                $.toast({
                    position: 'bottom right',
                    class: 'success',
                    message: `更新が完了しました`
                });
            });
        </script>
    @endscript
</div>
