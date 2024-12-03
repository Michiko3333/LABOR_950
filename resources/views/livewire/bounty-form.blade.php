<div>
    <script>
        window.bounty = (n) => {
            $('.dropdown.bounty-dropdown-' + n).dropdown({});
            $('.bounty-month-' + n).each((index, element) => {
                const parent = $(element).find('input');
                const key = parent[0].attributes['wire:model.live']['nodeValue'];
                const initialDate = key ? @this.get(key) : '';

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
                        months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月',
                            '12月'
                        ],
                        monthsShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月',
                            '11月', '12月'
                        ],
                    },
                    initialDate: initialDate,
                });

            });
            Livewire.dispatch('bounty-form-loaded');
        }
    </script>
    <div class="mb-2 flex-container">
        <button type="button" class="ui small grey basic button bounty-history-{{ $childKey }}">履歴</button>
        <div class="ui modal bounty-modal-{{ $childKey }}" wire:ignore>
            <div class="basic header center aligned" style="padding:1.25rem 1.5rem 0">履歴</div>
            <div class="content">
                @if (!$bountyHistory->isEmpty())
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
                            @foreach ($bountyHistory as $historyItem)
                                <tr>
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
    @foreach ($bountyData as $bountyKey => $bountyItem)
        <div class="bounty fields">
            <input type="hidden" name="bou-id[{{ $childKey }}][]" value="{{ $bountyItem['bou-id'] }}" />
            <div class="six wide field {{ err_sub($bouErrs, 'bou-departments', $childKey, $bountyKey) }}" wire:ignore>
                <label for="bou-departments[]">該当部署</label>
                <select class="ui fluid search dropdown multiple department_select bounty-dropdown-{{ $childKey }}"
                    wire:model.live="bountyData.{{ $bountyKey }}.bou-departments" multiple=""
                    name="bou-departments[{{ $childKey }}][{{ $bountyKey }}][]">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="six wide field {{ err_sub($bouErrs, 'bou-bonus_payment_month', $childKey, $bountyKey) }}"
                wire:ignore>
                <label for="bou-bonus_payment_month">支払月</label>
                <select class="ui fluid multiple dropdown limit-select bounty-dropdown-{{ $childKey }}"
                    name="bou-bonus_payment_month[{{ $childKey }}][{{ $bountyKey }}][]"
                    wire:model.live="bountyData.{{ $bountyKey }}.bou-bonus_payment_month" multiple>
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
            <div class="three wide field {{ err_sub($bouErrs, 'bou-applied_date', $childKey, $bountyKey) }}">
                <label for="bou-applied_date">適用年月</label>
                <div class="ui calendar month-calendar bounty-month-{{ $childKey }}" wire:ignore>
                    <div class="ui fluid input left icon">
                        <i class="calendar icon"></i>
                        <input type="text" name="bou-applied_date[{{ $childKey }}][]"
                            wire:model.live="bountyData.{{ $bountyKey }}.bou-applied_date" placeholder="YYYY年M月">
                    </div>
                </div>
            </div>
            @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
                <div class="field">
                    <label></label>
                    <button class="ui button icon basic negative button-disable" type="button"
                        wire:click="removebounty({{ $bountyKey }})"><i
                            class="trash alternate outline icon"></i></button>
                </div>
            @endif
        </div>
        <div class="ui divider my-2"></div>
    @endforeach
    @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
        <button class="append-bounty button-disable" type="button" wire:click="bountyAppend"
            id="append-bounty_{{ $childKey }}" {{ count($bountyData) > 9 ? 'disabled' : '' }}><i
                class="plus circle icon"></i>追加</button>
    @endif
    @script
        <script type="module">
            const notReadonly = @json($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2));
            $(document).ready(function() {
                if (notReadonly) bounty({{ $childKey }});
            });
            $(document).off('click', '.bounty-history-{{ $childKey }}').on('click', '.bounty-history-{{ $childKey }}',
                function() {
                    $('.bounty-modal-{{ $childKey }}').modal('show');
                });
            document.querySelectorAll('.limit-select').forEach(selectElement => {
                selectElement.addEventListener('change', function() {
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
                });
            });
            $wire.on('bounty-appended', () => {
                setTimeout(() => {
                    if (notReadonly) bounty({{ $childKey }});
                }, 0);
            });
            $wire.on('bounty-removed', (e) => {
                setTimeout(() => {
                    if (notReadonly) bounty({{ $childKey }});
                }, 0);
            });
        </script>
    @endscript
    <style type="text/css">
        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        button.append-bounty {
            width: 100%;
            padding: 1em;
            color: gray;
            font-weight: bold;
            border: solid 2px silver;
            border-radius: 4px;
            background: transparent;
            cursor: pointer;
        }

        button.append-bounty:hover {
            color: #9e9e9e;
            border: solid 2px #cfcfcf;
        }

        button.append-bounty:active {
            color: #6b6b6b;
            border: solid 2px #adadad;
        }
    </style>
</div>
