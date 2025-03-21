<div id="{{ $uniqueId }}" class="allowance-form">
<script>
        allowanceForm = '.allowance-form';
        init_allowance = (n) => {
            const key = '#' + n + allowanceForm;
            setTimeout(() => {
                $(key + ' .ui.dropdown').dropdown({});
            }, 0);
            document.querySelectorAll(key).forEach(componentElement => {
                const wireId = componentElement.getAttribute('wire:id');
                if (wireId) {
                    const livewireComponent = Livewire.find(wireId);
                    $(key + ' .month-calendar').each((index, element) => {
                        const parent = $(element).find('input');
                        const key = parent[0].attributes['wire:model.live']['nodeValue'];
                        const initialDate = key ? livewireComponent.get(key) : '';
                        $(element).calendar({
                            type: 'month',
                            formatter: {
                                month: function(date, settings) {
                                    if (!date) return '';
                                    var year = date.getFullYear();
                                    var month = date.getMonth() + 1;
                                    return year + "年" + month + "月";
                                }
                            },
                            text: {
                                months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月',
                                    '10月', '11月',
                                    '12月'
                                ],
                                monthsShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月',
                                    '9月',
                                    '10月',
                                    '11月', '12月'
                                ],
                            },
                            initialDate: initialDate,
                            onChange: (d, t) => {
                                if (key) livewireComponent.set(key, t);
                            }
                        });
                    })
                }
            })
        }
    </script>
    @script
        <script>
            const notReadonly = @json($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2));
            $(document).ready(function() {
                if (notReadonly) Livewire.dispatch('allowance-form-loaded');
            });
            $wire.on('allowance-appended', () => {
                setTimeout(() => {
                    if (notReadonly) Livewire.dispatch('allowance-form-loaded');
                }, 0);
            });
            $wire.on('allowance-removed', (e) => {
                setTimeout(() => {
                    if (notReadonly) Livewire.dispatch('allowance-form-loaded');
                }, 0);
            });
            $(document).off('click', '.allowance-history-{{ $childKey }}').on('click', '.allowance-history-{{ $childKey }}',
                function() {
                    $('.allowance-modal-{{ $childKey }}').modal('show');
                });
        </script>
    @endscript
<div class="mb-2 flex-container">
<button type="button" class="ui small grey basic button allowance-history-{{ $childKey }}">履歴</button>
<div class="ui modal allowance-modal-{{ $childKey }}" wire:ignore wire:key="allowance-modal-{{ $childKey }}">
        <div class="basic header center aligned" style="padding:1.25rem 1.5rem 0">履歴</div>
        <div class="scrolling content">
            @if (!$allowanceHistory->isEmpty())
            <script>
                var monthMapping = {
                    '1': '毎月',
                    '2': '2ヵ月毎',
                    '3': '3ヵ月毎',
                    '4': '4ヵ月毎',
                    '5': '5ヵ月毎',
                    '6': '6ヵ月毎',
                    '7': '7ヵ月毎',
                    '8': '8ヵ月毎',
                    '9': '9ヵ月毎',
                    '10': '10ヵ月毎',
                    '11': '11ヵ月毎',
                    '12': '12ヵ月毎',
                    '13': '不定期',
                };
            </script>
            <table class="ui celled table center aligned">
                <thead>
                    <tr>
                        <th>手当名</th>
                        <th>金額</th>
                        <th>支払月</th>
                        <th>対象者</th>
                        <th>適用年月</th>
                        <th>登録日付</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($allowanceHistory as $historyItem)
                    <tr
                    @if($historyItem->delete_flg == 1)
                    class="deleted"
                    @endif>
                        <td>{{ $historyItem->allowance }}</td>
                        <td>{{ $historyItem->amount }}</td>
                        <td>
                            <script>
                                document.write(monthMapping['{{ $historyItem->pay_month }}'] || '');
                            </script>
                        </td>
                        <td>{{ $historyItem->target }}</td>
                        <td>{{ substr($historyItem->applied_date, 0, 7) }}</td>
                        <td>{{ substr($historyItem->created_at, 0, 10) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <div class="header center aligned">該当履歴なし</div>
            @endif
        </div>
        <div class="basic actions">
            <div class="ui negative button">戻る</div>
        </div>
    </div>
</div>
@foreach ($allowanceData as $allowanceKey => $allowanceItem)
    <div class="allowance three fields"
        wire:key="{{ 'allowance-item-' . $childKey . '-' . $allowanceKey . '-' . $allowanceItem['al-key'] }}"
        x-init="init_allowance('{{ $uniqueId }}')">
    <input type="hidden" name="al-id[{{ $childKey }}][]" value="{{ $allowanceItem['al-id'] }}" />
        <div class="required twelve wide field {{ err_sub($alErrs, 'al-allowance', $childKey, $allowanceKey) }}">
            <label for="al-allowance">手当名</label>
            <input type="text" maxlength="255" name="al-allowance[{{ $childKey }}][]"
            wire:model.live="allowanceData.{{ $allowanceKey }}.al-allowance" autocomplete="off">
        </div>
        <div class="required twelve wide field {{ err_sub($alErrs, 'al-amount', $childKey, $allowanceKey) }}">
            <label for="al-amount">金額</label>
            <input type="number" min="0" max="9999999" name="al-amount[{{ $childKey }}][]"
                wire:model.live="allowanceData.{{ $allowanceKey }}.al-amount" placeholder="9999999" autocomplete="off">
        </div>
        <div class="required eight wide field {{ err_sub($alErrs, 'al-pay_month', $childKey, $allowanceKey) }}">
            <label for="al-pay_month">支払月</label>
            <select class="ui fluid dropdown" name="al-pay_month[{{ $childKey }}][]"
                wire:model.live="allowanceData.{{ $allowanceKey }}.al-pay_month">
                <option value="">未選択</option>
                <option value="1">毎月</option>
                <option value="2">2ヵ月毎</option>
                <option value="3">3ヵ月毎</option>
                <option value="4">4ヵ月毎</option>
                <option value="5">5ヵ月毎</option>
                <option value="6">6ヵ月毎</option>
                <option value="7">7ヵ月毎</option>
                <option value="8">8ヵ月毎</option>
                <option value="9">9ヵ月毎</option>
                <option value="10">10ヵ月毎</option>
                <option value="11">11ヵ月毎</option>
                <option value="12">12ヵ月毎</option>
                <option value="13">不定期</option>
            </select>
        </div>
        <div class="required eight wide field {{ err_sub($alErrs, 'al-applied_date', $childKey, $allowanceKey) }}">
            <label for="al-applied_date">適用年月</label>
            <div class="ui calendar month-calendar" wire:ignore>
                <div class="ui fluid input left icon">
                    <i class="calendar icon"></i>
                    <input type="text" name="al-applied_date[{{ $childKey }}][]"
                        wire:model.live="allowanceData.{{ $allowanceKey }}.al-applied_date"
                        placeholder="YYYY年M月" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="required twelve wide field {{ err_sub($alErrs, 'al-target', $childKey, $allowanceKey) }}">
            <label for="al-target">対象者</label>
            <input type="text" maxlength="30" name="al-target[{{ $childKey }}][]"
                wire:model.live="allowanceData.{{ $allowanceKey }}.al-target" placeholder="" autocomplete="off">
        </div>
        @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
        <div class="field">
            <label></label>
            <button class="ui button icon basic negative button-disable" type="button" wire:click="removeAllowance({{ $allowanceKey }})"><i
            class="trash alternate outline icon"></i></button>
        </div>
        @endif
    </div>
    <div class="ui divider my-2"></div>
@endforeach
@if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
        <button class="append-allowance button-disable" type="button" wire:click="allowanceAppend" id="append-allowance_{{ $childKey }}"
            {{ count($allowanceData) > 9 ? 'disabled' : '' }}><i class="plus circle icon"></i>追加</button>
@endif
<style type="text/css">
    .flex-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
button.append-allowance {
width: 100%;
padding: 1em;
color: gray;
font-weight: bold;
border: solid 2px silver;
border-radius: 4px;
background: transparent;
cursor: pointer;
}

button.append-allowance:hover {
color: #9e9e9e;
border: solid 2px #cfcfcf;
}

button.append-allowance:active {
color: #6b6b6b;
border: solid 2px #adadad;
}
.deleted {
background: lightgray;
}
</style>
</div>
