<div>
    <style type="text/css">
        .select-branch-title {
            display: flex;
            align-items: center;
            width: 100%;
            box-sizing: border-box;
            gap: 1em;
        }

        .select-branch-title label {
            font-size: 14px;
        }
    </style>
    <div class="ui form select-branch-title">
        <div class="field">
            <label for="">事業所選択</label>
            <select class="ui fluid dropdown" id="branch_id" wire:model.live="branch_id"
                style="width:260px !important;height:50px;font-size:14px !important;border-radius: 5px !important;">
                <option value="">未選択</option>
                @foreach ($this->branch_list as $id => $name)
                    <option value="{{ $id }}">
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>
        <input style="display: none;" id="history_flg" wire:model.live="history_flg">
        <div>
            @if ($this->branch_id)
                @if ($this->history_flg == 0)
                    <a class="ui button primary mt-1 button-disable" type="button"
                        style="width: 125px;font-size:14px !important;border-radius: 5px !important;"
                        href="javascript:openModal()">追加</a>
                    <button type="button" class="ui small grey basic button history-button"
                        style="width: 125px;font-size:14px !important;border-radius: 5px !important;">履歴</button>
                @else
                    <button class="ui button primary mt-1" type="button" disabled
                        style="width: 125px;font-size:14px !important;border-radius: 5px !important;">追加</button>
                    <button type="button" class="ui small grey basic button now-button"
                        style="width: 150px;font-size:14px !important;border-radius: 5px !important;">現行データ</button>
                @endif
            @else
                <button class="ui button primary mt-1" type="button" disabled
                    style="width: 125px;font-size:14px !important;border-radius: 5px !important;">追加</button>
                <button type="button" class="ui small grey basic button" disabled
                    style="width: 125px;font-size:14px !important;border-radius: 5px !important;">履歴</button>
            @endif
        </div>
    </div>

    <div class="ui card full card-shadow item-0">
        <div class="content">
            <table class="ui large table">
                <thead>
                    <tr>
                        <th style="width: 200px;">名称</th>
                        <th style="width: 200px;">適用日</th>
                        @if ($this->history_flg == 0)
                            <th style="width: 200px;"></th>
                        @else
                            <th style="width: 200px;">適用終了日</th>
                            <th style="width: 200px;"></th>
                        @endif
                    </tr>
                </thead>
                @if ($this->history_flg == 0)
                    <tbody id="tbody">
                        @foreach ($this->items as $item)
                            <tr class="card">
                                <td>{{ $item['name'] }}</td>

                                <td>
                                    @if ($item['applied_date'])
                                        {{ $item['applied_date'] }}
                                    @else
                                        -
                                    @endif
                                </td>

                                <td class="right aligned collapsing">
                                    @if ($userPermission->isReadableFor(14))
                                        <a class="ui basic primary button button-disable" type="button"
                                            onClick="javascript:openModal({{ $item['id'] }},'{{ $item['name'] }}')">
                                            履歴に追加
                                        </a>
                                        <a class="ui basic primary button button-disable" type="button"
                                            onClick="javascript:remove('{{ $item['name'] }}',{{ $item['id'] }})">
                                            削除
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <tbody id="tbody">
                        @foreach ($this->items as $item)
                            <tr class="card">
                                <td>{{ $item['name'] }}</td>

                                <td>
                                    @if ($item['applied_date'])
                                        {{ $item['applied_date'] }}
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>
                                    {{ $item['end_date_of_application'] }}
                                </td>

                                <td class="right aligned collapsing">
                                    @if ($userPermission->isReadableFor(14))
                                        <a class="ui basic primary button button-disable" type="button"
                                            onClick="javascript:removeHistory('{{ $item['name'] }}',{{ $item['id'] }})">
                                            削除
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>

            <livewire:pagination :pagination="$data['pagination']" wire:key="pagination-component" />
        </div>
    </div>
</div>
@script
    <script type="module">
        $(document).on('click', '.history-button', function() {
            @this.set('history_flg', 1);
        });
        $(document).on('click', '.now-button', function() {
            @this.set('history_flg', 0);
        });
        $(document).ready(function() {
            $('#branch_id').change(function() {
                @this.set('history_flg', 0);
            });
        });
        let timeout;
        document.addEventListener('click', function(event) {
            if (event.target.matches('.history-button, .now-button')) {
                if (timeout) return;

                event.target.disabled = true;
                timeout = setTimeout(() => {
                    event.target.disabled = false;
                    timeout = null;
                }, 1000);
            }
        });
        window.addEventListener('load', () => {
            const isFromModalClose = localStorage.getItem('isFromModalClose');
            const selectedBranchId = localStorage.getItem('selectedBranchId');
            const selectedHistoryFlg = localStorage.getItem('selectedHistoryFlg');
            if (isFromModalClose) {
                if (selectedBranchId) {
                    document.getElementById('branch_id').value = selectedBranchId;
                    @this.set('branch_id', selectedBranchId);
                }
                if (selectedHistoryFlg) {
                    document.getElementById('history_flg').value = selectedHistoryFlg;
                    @this.set('history_flg', selectedHistoryFlg);
                }
                localStorage.removeItem('isFromModalClose');
                localStorage.removeItem('selectedBranchId');
                localStorage.removeItem('selectedHistoryFlg');
            }
        });
    </script>
@endscript
