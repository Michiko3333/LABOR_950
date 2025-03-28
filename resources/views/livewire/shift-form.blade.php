<section>
    <div style="width: 250px;">
        <select class="ui fluid dropdown" name="current_shift" wire:model.live="current_shift"
            wire:change="onChangeShiftId">
            @foreach ($saved_list as $k => $value)
                <option value="{{ $k }}" {{ $this->current_shift == $k ? 'selected' : '' }}>
                    {{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div>
        @if (!empty($errors->all()))
            <div class="ui error message my-1">
                <div class="header">入力エラー</div>
                <ul class="list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="ui error message emoji hidden my-1">
            <div class="header">入力エラー</div>
            <ul class="list">
                <li>絵文字の入力は許可されていません</li>
            </ul>
        </div>
    </div>
    <div class="ui card full card-shadow shift-calendar-inputs" wire:key="shift-form:{{ $current_shift }}">
        <div class="content">
            <section style="display: flex; width: 100%;">
                <div class="ui form" style="width: 50%;">
                    <div class="field required">
                        <label for="title_value">タイトル</label>
                        <input type="text" id="title_value" name="title_value" wire:model="title_value"
                            autocomplete="off">
                    </div>
                    <div class="field required">
                        <label for="branch">事業所</label>
                        <select class="ui fluid dropdown" name="branch_value" wire:model.live="branch_value">
                            @foreach ($branch_list as $k => $value)
                                <option value="{{ $k }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="three fields">

                        <div class="field required">
                            <label for="start_day_of_year">起算日</label>
                            <div class="ui right labeled input">
                                <select class="ui fluid dropdown" name="start_year" wire:model.live="start_year">
                                    @foreach ($year_list as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="ui basic label">
                                    年
                                </div>
                            </div>
                        </div>
                        <div class="field ">
                            <label for="start_day_of_month"></label>
                            <div class="ui right labeled input">
                                <select class="ui fluid dropdown" name="start_month" wire:model.live="start_month">
                                    @for ($i = 1; $i < 13; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <div class="ui basic label">
                                    月
                                </div>
                            </div>
                        </div>
                        <div class="field ">
                            <label for="start_day_of_day"></label>
                            <div class="ui right labeled input">
                                <select class="ui fluid dropdown" name="start_date" wire:model.live="start_date">
                                    @foreach ($day_list as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="ui basic label">
                                    日
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="three fields">
                        <div class="field required">
                            <label for="start_days_of_week">曜日の始まり</label>
                            <select class="ui fluid dropdown" name="start_weekday" wire:model.live="start_weekday">
                                @foreach ($weeks as $k => $value)
                                    <option value="{{ $k }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field my-1">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="is_default" wire:model.live="is_default"
                                {{ $is_default == 1 ? 'checked' : '' }}>
                            <label>この勤務予定表をデフォルトにする</label>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="assist-button" style="text-align: right;">
        @if ($editable)
            <button type="button" class="ui button small" onClick="window.$holidayModal.modal('show')">休日一括設定</button>
        @endif
    </div>
    <div class="calendars">
        @php
            $i = 0;
            $year = $this->start_year;
        @endphp
        @foreach ($this->render_months as $month)
            @php
                $filtered_values = array_filter($values, function ($item) use ($month, $year) {
                    return $item['month'] == $month && $item['year'] == $year;
                });

            @endphp
            <livewire:calendar-small :year="$year" :month="$month" :first-date="$start_date" :first-day-week="$start_weekday"
                :show-header="true" :clickable="$editable" :values="$values"
                wire:key="sc-component:{{ $i }}:{{ $year }}-{{ $start_month }}-{{ $start_date }}-{{ $start_weekday }}:d{{ count($values) }}" />
            @php
                if ($month == 12) {
                    $year++;
                }
                $i++;
            @endphp
        @endforeach
    </div>
    <div class="mt-2 calendar-info">※休日：赤枠</div>
    @if ($this->editPermission)
        <div class="table py-2">
            <table class="ui definition table">
                <thead>
                    <tr>
                        <th style="background: #F7F7F7; box-shadow: none;"></th>
                        @foreach ($this->render_months as $month)
                            <th>{{ $month }}月</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>歴日数</td>
                        @php
                            $year = $this->start_year;
                            $num_date = [];
                        @endphp
                        @foreach ($this->render_months as $month)
                            <td>{{ date('j', strtotime('last day of', strtotime('01-' . $month . '-' . $year))) }}日
                            </td>
                            @php
                                $num_date[$month] = date(
                                    'j',
                                    strtotime('last day of', strtotime('01-' . $month . '-' . $year)),
                                );
                                if ($month == 12) {
                                    $year++;
                                }
                            @endphp
                        @endforeach

                    </tr>
                    <tr>
                        <td>休日日数</td>
                        @php
                            $year = $this->start_year;
                            $num_holiday = [];
                        @endphp
                        @foreach ($this->render_months as $month)
                            @php
                                $filtered_holidays = array_filter($values, function ($item) use ($month, $year) {
                                    return $item['month'] == $month && $item['year'] == $year;
                                });
                                $holidays = array_values($filtered_holidays);
                                $num_holiday[$month] = count($holidays);
                            @endphp
                            <td>{{ count($holidays) }}日</td>
                            @php
                                if ($month == 12) {
                                    $year++;
                                }
                            @endphp
                        @endforeach
                    </tr>
                    <tr>
                        <td>月間所定労働日数</td>
                        @php
                            $num_work = [];
                        @endphp
                        @foreach ($this->render_months as $month)
                            @php
                                $num_work[$month] = $num_date[$month] - $num_holiday[$month];
                            @endphp
                            <td>{{ $num_date[$month] - $num_holiday[$month] }}日</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>月間所定労働時間</td>
                        @foreach ($this->render_months as $month)
                            <td>{{ fmod($num_work[$month] * $work_time, 1) == 0 ? $num_work[$month] * $work_time : number_format($num_work[$month] * $work_time, 1) }}時間
                            </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            @php
                $holiday_num = count($values);
                $agreed_hours = number_format(floor(($agreed_hours_day_h + $agreed_hours_day_m / 60) * 100) / 100, 1, '.', '');
                $yearly_work_days = 365 - $holiday_num;
                $yearly_work_times = number_format(floor(($yearly_work_days * $agreed_hours) * 100) / 100, 1, '.', '');
            @endphp
            <table class="ui definition table" style="width: 300px;">
                <tbody>
                    <tr>
                        <td>年間所定労働日数</td>
                        <td>{{ $yearly_work_days }}日</td>
                    </tr>
                    <tr>
                        <td>年間所定労働時間</td>
                        <td>{{ $yearly_work_times }}時間</td>
                    </tr>
                    <tr>
                        <td>1日所定実働時間</td>
                        <td>{{ $agreed_hours }}時間</td>
                    </tr>
                    <tr>
                        <td>年間休日日数</td>
                        <td>{{ $holiday_num }}日</td>
                    </tr>
                    <tr>
                        <td>週平均所定労働日数</td>
                        <td>{{ number_format($yearly_work_days / 52, 1) }}日</td>
                    </tr>
                    <tr>
                        <td>週平均所定労働時間</td>
                        <td>{{ number_format(($yearly_work_days / 52) * $agreed_hours, 1) }}時間</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="shift-calendar-buttons my-2" style="display: flex; flex-direction: row-reverse; gap: 1em;">
            @if ($editable)
                <button class="ui button primary button-disable" type="button" style="width: 200px;"
                    wire:click.debounce.150ms="save" onClick="window.scrollTo(0, 0);">保存</button>
            @endif
            <button class="ui button yellow button-disable_" type="button" style="width: 200px;"
                wire:click.debounce.150ms="download" onClick="window.scrollTo(0, 0);">ダウンロード</button>
        </div>
    @endif
</section>
