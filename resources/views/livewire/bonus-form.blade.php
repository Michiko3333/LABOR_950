<div id="{{ $uniqueId }}" class="bonus-form">
    <script>
        bonusForm = '.bonus-form';
        init_bonus = (n) => {
            const key = '#' + n + bonusForm;
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
                    document.querySelectorAll(key + ' .limit-select').forEach(selectElement => {
                        selectElement.addEventListener('change', function() {
                            if (this.selectedOptions) {
                                const selectedOptions = Array.from(this.selectedOptions);
                                if (selectedOptions.length === 4) {
                                    Array.from(this.options).forEach(option => {
                                        if (!option.selected) {
                                            option.disabled = true;
                                        }
                                    });
                                } else {
                                    Array.from(this.options).forEach(option => {
                                        option.disabled = false;
                                    });
                                }
                            }
                        });
                    });
                }
            })
        }
    </script>
    @script
        <script>
            const notReadonly = @json($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2));
            $(document).ready(function() {
                if (notReadonly) Livewire.dispatch('bonus-form-loaded');
            });
            $wire.on('bonus-appended', () => {
                setTimeout(() => {
                    if (notReadonly) Livewire.dispatch('bonus-form-loaded');
                }, 0);
            });
            $wire.on('bonus-removed', (e) => {
                setTimeout(() => {
                    if (notReadonly) Livewire.dispatch('bonus-form-loaded');
                }, 0);
            });
            $(document).off('click', '.bonus-history-{{ $childKey }}').on('click', '.bonus-history-{{ $childKey }}',
                function() {
                    $('.bonus-modal-{{ $childKey }}').modal('show');
                });
        </script>
    @endscript
    <div class="mb-2 flex-container">
        <button type="button" class="ui small grey basic button bonus-history-{{ $childKey }}">履歴</button>
        <div class="ui modal bonus-modal-{{ $childKey }}" wire:ignore wire:key="bonus-modal-{{ $childKey }}">
            <div class="basic header center aligned" style="padding:1.25rem 1.5rem 0">履歴</div>
            <div class="scrolling content">
                @if (!$bonusHistory->isEmpty())
                    <table class="ui celled table center aligned">
                        <thead>
                            <tr>
                                <th>該当部署</th>
                                <th>支払月</th>
                                <th>適用年月</th>
                                <th>登録日付</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bonusHistory as $historyItem)
                                <tr
                                @if($historyItem->delete_flg == 1)
                                class="deleted"
                                @endif>
                                    <td>{{ $historyItem->department_names }}</td>
                                    <td>{{ $historyItem->bonus_payment_month }}</td>
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
    @foreach ($bonusData as $bonusKey => $bonusItem)
        <div class="bonus fields"
            wire:key="{{ 'bonus-item-' . $childKey . '-' . $bonusKey . '-' . $bonusItem['bo-key'] }}"
            x-init="init_bonus('{{ $uniqueId }}')">
            <input type="hidden" name="bo-id[{{ $childKey }}][]" value="{{ $bonusItem['bo-id'] }}" />
            <div class="required six wide field {{ err_sub($boErrs, 'bo-departments', $childKey, $bonusKey) }}" wire:ignore>
                <label for="bo-departments[]">該当部署</label>
                <select class="ui fluid search dropdown multiple department_select bonus-dropdown-{{ $childKey }}"
                    wire:model.live="bonusData.{{ $bonusKey }}.bo-departments" multiple=""
                    name="bo-departments[{{ $childKey }}][{{ $bonusKey }}][]">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="required six wide field {{ err_sub($boErrs, 'bo-bonus_payment_month', $childKey, $bonusKey) }}"
                wire:ignore>
                <label for="bo-bonus_payment_month">支払月</label>
                <select class="ui fluid multiple dropdown limit-select bonus-dropdown-{{ $childKey }}"
                    name="bo-bonus_payment_month[{{ $childKey }}][{{ $bonusKey }}][]"
                    wire:model.live="bonusData.{{ $bonusKey }}.bo-bonus_payment_month" multiple>
                    <option value="1月">1月</option>
                    <option value="2月">2月</option>
                    <option value="3月">3月</option>
                    <option value="4月">4月</option>
                    <option value="5月">5月</option>
                    <option value="6月">6月</option>
                    <option value="7月">7月</option>
                    <option value="8月">8月</option>
                    <option value="9月">9月</option>
                    <option value="10月">10月</option>
                    <option value="11月">11月</option>
                    <option value="12月">12月</option>
                </select>
            </div>
            <div class="required three wide field {{ err_sub($boErrs, 'bo-applied_date', $childKey, $bonusKey) }}">
                <label for="bo-applied_date">適用年月</label>
                <div class="ui calendar month-calendar" wire:ignore>
                    <div class="ui fluid input left icon">
                        <i class="calendar icon"></i>
                        <input type="text" name="bo-applied_date[{{ $childKey }}][]"
                            wire:model.live="bonusData.{{ $bonusKey }}.bo-applied_date" placeholder="YYYY年M月"
                            autocomplete="off" autocomplete="off">
                    </div>
                </div>
            </div>
            @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
                <div class="field">
                    <label></label>
                    <button class="ui button icon basic negative button-disable" type="button"
                        wire:click="removebonus({{ $bonusKey }})"><i
                            class="trash alternate outline icon"></i></button>
                </div>
            @endif
        </div>
        <div class="ui divider my-2"></div>
    @endforeach
    @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
        <button class="append-bonus button-disable" type="button" wire:click="bonusAppend"
            id="append-bonus_{{ $childKey }}" {{ count($bonusData) > 9 ? 'disabled' : '' }}><i
                class="plus circle icon"></i>追加</button>
    @endif
    <style type="text/css">
        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        button.append-bonus {
            width: 100%;
            padding: 1em;
            color: gray;
            font-weight: bold;
            border: solid 2px silver;
            border-radius: 4px;
            background: transparent;
            cursor: pointer;
        }

        button.append-bonus:hover {
            color: #9e9e9e;
            border: solid 2px #cfcfcf;
        }

        button.append-bonus:active {
            color: #6b6b6b;
            border: solid 2px #adadad;
        }

        .deleted {
        background: lightgray;
        }
    </style>
</div>
