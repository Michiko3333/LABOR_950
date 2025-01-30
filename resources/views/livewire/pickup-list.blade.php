<div>
    @script
        <script>
            const onEdit = () => {
                if (window.$pickup_modal.isSubmit) return;
                window.$pickup_modal.isSubmit = true;
                const pickup_id = document.getElementsByClassName('pickup_id')[1].value;
                const situation = document.getElementsByClassName('situation')[1].value;
                $wire.dispatch('onSubmitPickup', {
                    id: pickup_id,
                    situation: situation,
                });
            }

            const openDetail = (id = 0) => {
                if(id !== 0) {
                    $wire.dispatch('openDetail', {
                        id: id,
                    });
                }
            }

            window.$pickup_modal = {
                onEdit: onEdit,
                openDetail: openDetail,
                isSubmit: false,
            };
        </script>
    @endscript
    <table class="ui large table">
        <thead>
            <tr>
                <th style="width: 46%;">業務名</th>
                <th style="width: 17%;">期日</th>
                <th style="width: 17%;">対応者</th>
                <th style="width: 10%;">状態</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($data['items'] as $item)
                <tr class="card" id="{{ $item->id }}">
                    <td>{{ $item->business_name }}</td>
                    <td>{{ $item->format_due_date }}</td>
                    <td>{{ $item->responder_name }}</td>
                    <td class="{{ $item->situation_color }}">{{ $item->situation_text }}</td>
                    <td class="right aligned collapsing">
                        <button class="ui basic primary button detail_{{ $item->id }}" wire:click="detail({{ $item->id }})">
                            詳細
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="detailModal" class="ui modal tiny" wire:ignore>
        <i class="close icon"></i>
        <div class="header business_name"></div>
        <div class="content">
            <form name="edit-pickup">
                <div class="ui form edit-pickup">
                    <div class="ui error message hidden">
                        <div class="header">入力エラー</div>
                        <ul class="list">
                            <li>不正な値です。</li>
                        </ul>
                    </div>
                    <input type="hidden" class="pickup_id">
                    <div class="field">
                        <label>内容</label>
                        <p class="pickup_text pickup_content"></p>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>期日</label>
                            <p class="pickup_text due_date"></p>
                        </div>
                        <div class="field">
                            <label>対応者</label>
                            <p class="pickup_text responder_name"></p>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>状態</label>
                            <select class="ui fluid dropdown situation {{ $this->editPermission ? '' : 'readonly-style' }}">
                                <option value="1" class="select_no_supported">未対応</option>
                                <option value="2" class="select_in_progress">対応中</option>
                                <option value="3" class="select_completion">完了</option>
                                <option value="4" class="select_completion">無効</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="actions">
            <button class="ui negative button" type="button">キャンセル</button>
            @if($this->editPermission)
                <div class="ui primary button" onClick="javascript:$pickup_modal.onEdit()">変更</div>
            @endif
        </div>
    </div>

    <livewire:pagination :pagination="$data['pagination']" wire:key="pagination-component" />
</div>
