<div class="wage-editor">
    <!-- Profile -->
    <div class="ui card full card-shadow item-0">
        <div class="content">
            <div class="profile">
                <div class="profile-icon">
                    <div class="user-icon">
                        <img src="{{ $employee_icon }}" id="icon">
                    </div>
                </div>
                <div class="profile-info">
                    <h2>{{ $this->employee_data->last_name . ' ' . $this->employee_data->first_name }}</h2>
                    <p>社員番号：{{ $profiles['employee_no'] }}</p>
                    <p>配属：{{ $profiles['branch_name'] }}</p>
                    <p>部署：{{ count($profiles['departments']) ? implode(', ', $profiles['departments']) : '-' }}</p>
                    <p>役職：{{ $profiles['managerial_position'] }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="ui card full card-shadow item-0">
        <div class="content">
            <div class="ui attached tabular menu">
                <button class="item {{ $currentTab == 'wage' ? 'active' : '' }}" style="cursor: pointer;" type="button"
                    wire:click="changeTab('wage')">給与</button>
                <button class="item {{ $currentTab == 'bonus' ? 'active' : '' }}" style="cursor: pointer;"
                    type="button" wire:click="changeTab('bonus')">賞与</button>
                <button class="item {{ $currentTab == 'attendance' ? 'active' : '' }}" style="cursor: pointer;"
                    type="button" wire:click="changeTab('attendance')">勤怠情報</button>
                <button class="item {{ $currentTab == 'remarks' ? 'active' : '' }}" style="cursor: pointer;"
                    type="button" wire:click="changeTab('remarks')">備考</button>
            </div>
            @switch($currentTab)
                @case('wage')
                    <main class="tab pt-1" data-tab="wage">

                        <h2>給与</h2>
                        <div class="controller mb-1">
                            <button class="ui button small" id="openNewAddition" type="button">支給・手当を追加</button>
                        </div>
                        <div class="ui short scrolling container" style="width: 100%; max-height: 800px;">
                            <table class="ui first last head foot stuck unstackable celled table">
                                <thead>
                                    <tr>
                                        <th style="min-width: 180px;">項目／計算期間</th>
                                        @foreach ($this->month_order as $month)
                                            <th>{{ $month }}月</th>
                                        @endforeach
                                        <th style="min-width: 90px;">給与計</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wage_column_names as $key => $name)
                                        @if ($key == 'taxable_paymment')
                                            <tr class="empty-line">
                                                <td></td>
                                                <td></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td></td>
                                            </tr>
                                        @endif

                                        @if ($key == 'overtime_values')
                                            @foreach ($overtime_names as $name)
                                                <tr>
                                                    <td>
                                                        <button class="remove-cotrollable" type="button"
                                                            wire:click="removeAddition('{{ $name }}', '{{ $key }}')"><i
                                                                class="trash alternate outline icon"></i></button>{{ $name }}
                                                    </td>
                                                    @foreach ($this->month_order as $month)
                                                        <td>
                                                            <div class="ui input month">
                                                                <input class="hide-spin" type="number"
                                                                    name="{{ $key }}[]" placeholder="" min="0"
                                                                    max="99999999"
                                                                    wire:key="{{ $current_id }}.month.{{ $month }}.{{ $key }}.{{ $name }}"
                                                                    wire:model.live="data.{{ $current_id }}.month.{{ $month }}.{{ $key }}.{{ $name }}">
                                                            </div>
                                                        </td>
                                                    @endforeach
                                                    <td>{{ $this->getControllableRowSum($key, $name) }}</td>
                                                </tr>
                                            @endforeach
                                        @elseif ($key == 'allowance_values')
                                            @foreach ($allowance_names as $name)
                                                <tr>
                                                    <td>
                                                        <button class="remove-cotrollable" type="button"
                                                            wire:click="removeAddition('{{ $name }}', '{{ $key }}')"><i
                                                                class="trash alternate outline icon"></i></button>{{ $name }}
                                                    </td>
                                                    @foreach ($this->month_order as $month)
                                                        <td>
                                                            <div class="ui input month">
                                                                <input class="hide-spin" type="number"
                                                                    name="{{ $key }}[]" placeholder="" min="0"
                                                                    max="99999999"
                                                                    wire:key="{{ $current_id }}.month.{{ $month }}.{{ $key }}.{{ $name }}"
                                                                    wire:model.live="data.{{ $current_id }}.month.{{ $month }}.{{ $key }}.{{ $name }}">
                                                            </div>
                                                        </td>
                                                    @endforeach
                                                    <td>{{ $this->getControllableRowSum($key, $name) }}</td>
                                                </tr>
                                            @endforeach
                                        @elseif ($key == 'salary_values')
                                            @foreach ($salary_names as $name)
                                                <tr>
                                                    <td>
                                                        <button class="remove-cotrollable" type="button"
                                                            wire:click="removeAddition('{{ $name }}', '{{ $key }}')"><i
                                                                class="trash alternate outline icon"></i></button>{{ $name }}
                                                    </td>
                                                    @foreach ($this->month_order as $month)
                                                        <td>
                                                            <div class="ui input month">
                                                                <input class="hide-spin" type="number"
                                                                    name="{{ $key }}[]" placeholder="" min="0"
                                                                    max="99999999"
                                                                    wire:key="{{ $current_id }}.month.{{ $month }}.{{ $key }}.{{ $name }}"
                                                                    wire:model.live="data.{{ $current_id }}.month.{{ $month }}.{{ $key }}.{{ $name }}">
                                                            </div>
                                                        </td>
                                                    @endforeach
                                                    <td>{{ $this->getControllableRowSum($key, $name) }}</td>
                                                </tr>
                                            @endforeach
                                        @elseif ($key == 'deduction_sum')
                                            <tr class="label">
                                                <td>{{ $name }}</td>
                                                @foreach ($this->month_order as $month)
                                                    <td>{{ $this->getDeductionSumCol($month) }}</td>
                                                @endforeach
                                                <td>{{ $this->getDeductionSumRow() }}</td>
                                            </tr>
                                        @elseif ($key == 'wage_amount')
                                        @else
                                            <tr>
                                                <td>{{ $name }}</td>
                                                @foreach ($this->month_order as $month)
                                                    <td>
                                                        <div class="ui input month">
                                                            <input class="hide-spin" type="number"
                                                                name="{{ $key }}[]" placeholder="" min="0"
                                                                max="99999999"
                                                                wire:model.live="data.{{ $current_id }}.month.{{ $month }}.{{ $key }}"
                                                                wire:key="data.{{ $current_id }}.month.{{ $month }}.{{ $key }}">
                                                        </div>
                                                    </td>
                                                @endforeach
                                                <td>{{ $this->getRowSum($key) }}</td>
                                            </tr>

                                            @if ($key == 'non_taxable_paymment')
                                                <tr class="label">
                                                    <td>支給合計</td>
                                                    @foreach ($this->month_order as $month)
                                                        <td>{{ $this->getAddtionSumCol($month) }}</td>
                                                    @endforeach
                                                    <td>{{ $this->getAddtionSumRow() }}</td>
                                                </tr>
                                            @endif
                                        @endif
                                        @if ($key == 'social_insurance_target' || $key == 'other_insurance_deduction' || $key == 'other_deduction')
                                            <tr class="empty-line">
                                                <td></td>
                                                <td></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td style="border-left: none;"></td>
                                                <td></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="label">
                                        <td>差引支給額</td>
                                        @foreach ($this->month_order as $month)
                                            <td>{{ $this->getTotalAmountCol($month) }}</td>
                                        @endforeach
                                        <td>{{ $this->getTotalAmountRow() }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </main>
                @break;
                @case('bonus')
                    <main class="tab pt-1" data-tab="bonus">
                        <h2>賞与</h2>
                        <div class="ui short scrolling container" style="width: 100%; max-height: 800px;">
                            <table class="ui first last head foot stuck unstackable celled table">
                                <thead>
                                    <tr>
                                        <th style="min-width: 140px;">項目／計算期間</th>
                                        @foreach ($bonus_month_order as $month)
                                            @if (!empty($data[$current_id]['bonus_month'][$month]))
                                                <th>{{ $month }}月</th>
                                            @endif
                                        @endforeach
                                        <th style="max-width: 90px;">賞与計</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bonus_column_names as $key => $name)
                                        @if ($key == 'salary_values')
                                            @foreach ($bonus_salary_names as $salary_name)
                                                <tr>
                                                    <td>
                                                        <button class="remove-cotrollable" type="button"
                                                            wire:click="removeAdditionBonus('{{ $salary_name }}', '{{ $key }}')"><i
                                                                class="trash alternate outline icon"></i></button>{{ $salary_name }}
                                                    </td>
                                                    @foreach ($bonus_month_order as $month)
                                                        @if (!empty($data[$current_id]['bonus_month'][$month]))
                                                            <td>
                                                                <div class="ui input month">
                                                                    <input class="hide-spin" type="number"
                                                                        name="{{ $key }}[]" placeholder=""
                                                                        min="0" max="99999999"
                                                                        wire:model.live="data.{{ $current_id }}.bonus_month.{{ $month }}.{{ $key }}.{{ $salary_name }}">
                                                                </div>
                                                            </td>
                                                        @endif
                                                    @endforeach
                                                    <td>{{ $this->getControllableRowSumBonus($key, $salary_name) }}</td>
                                                </tr>
                                            @endforeach
                                        @elseif ($key == 'deduction_sum')
                                            <tr class="label">
                                                <td>{{ $name }}</td>
                                                @foreach ($this->bonus_month_order as $month)
                                                    @if (!empty($data[$current_id]['bonus_month'][$month]))
                                                        <td>{{ $this->getDeductionSumCol($month, true) }}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{ $this->getDeductionSumRow(true) }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ $name }}</td>
                                                @foreach ($bonus_month_order as $month)
                                                    @if (!empty($data[$current_id]['bonus_month'][$month]))
                                                        <td>
                                                            <div class="ui input month">
                                                                <input class="hide-spin" type="number"
                                                                    name="bonus_{{ $key }}[]" placeholder=""
                                                                    min="0" max="99999999"
                                                                    wire:model.live="data.{{ $current_id }}.bonus_month.{{ $month }}.{{ $key }}"
                                                                    wire:key="data.{{ $current_id }}.bonus_month.{{ $month }}.{{ $key }}">
                                                            </div>
                                                        </td>
                                                    @endif
                                                @endforeach
                                                <td>{{ $this->getRowSum($key, true) }}</td>
                                            </tr>
                                        @endif
                                        @if ($key == 'non_taxable_paymment' || $key == 'other_insurance_deduction' || $key == 'other_deduction')
                                            <tr class="empty-line">
                                                <td></td>
                                                @foreach ($bonus_month_order as $month)
                                                    @if (!empty($data[$current_id]['bonus_month'][$month]))
                                                        <td style="border-left: none;"></td>
                                                    @endif
                                                @endforeach
                                                <td></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="label">
                                        <td>差引支給額</td>
                                        @foreach ($this->bonus_month_order as $month)
                                            @if (!empty($data[$current_id]['bonus_month'][$month]))
                                                <td>{{ $this->getTotalAmountCol($month, true) }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $this->getTotalAmountRow(true) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </main>
                @break;
                @case('attendance')
                    <main class="tab pt-1" data-tab="attendance">
                        <h2>勤怠状況</h2>
                        <div class="ui short scrolling container" style="width: 100%; max-height: 800px;">
                            <table class="ui first last head foot stuck unstackable celled table">
                                <thead>
                                    <tr>
                                        <th style="min-width: 140px;">項目／計算期間</th>
                                        @foreach ($month_order as $month)
                                            <th>{{ $month }}月</th>
                                        @endforeach
                                        <th style="min-width: 90px;">合計日数/時間数</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendance_column_names as $key => $name)
                                        <tr>
                                            <td>{{ $name }}</td>
                                            @foreach ($this->month_order as $month)
                                                <td>
                                                    <div class="ui input month">
                                                        <input class="hide-spin" type="number" name="{{ $key }}[]"
                                                            placeholder="" min="0" max="99999999"
                                                            wire:model.live="data.{{ $current_id }}.atd_month.{{ $month }}.{{ $key }}"
                                                            wire:key="data.{{ $current_id }}.atd_month.{{ $month }}.{{ $key }}">
                                                    </div>
                                                </td>
                                            @endforeach
                                            <td>{{ $this->getRowSumAttendance($key) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </main>
                @break

                @case('remarks')
                    <main class="tab pt-1" data-tab="remarks">
                        <h2>備考</h2>
                        <div class="ui form">
                            <textarea wire:model.live="data.{{ $current_id }}.remarks" wire:key="data.{{ $current_id }}.remarks"
                                maxLength="100" style="width: 100%; max-width: 300px; height: 100px; resize: none;"></textarea>
                        </div>
                    </main>
                @break

                @default
            @endswitch
        </div>
    </div>
    @if (count($data) > 1)
        <div class="counter mt-2">
            {{ $this->currentIndex() + 1 }} / {{ count($employee_ids) }}
        </div>
        <div class="pagination py-1">
            <div class="ui pagination borderless mini menu">
                <a class="item pagination-disable @if ($disablePrev) disabled @endif"
                    wire:click="movePrev">前へ</a>
                <a class="item pagination-disable @if ($disableNext) disabled @endif"
                    wire:click="moveNext">次へ</a>
            </div>
        </div>
    @endif
    <div class="submit-area">
        <a href="{{ route('wages-ledger.index') }}" class="ui button">社員選択に戻る</a>
        <button id="ledger-create-button" type="button" class="ui button primary"
            wire:click="onSubmit">台帳をダウンロード</button>
    </div>
</div>
