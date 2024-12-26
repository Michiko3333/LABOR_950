<section>
    <div style="width: 250px;">
        <select class="ui fluid dropdown" name="current_shift" wire:model.live="current_shift"
            wire:change="onChangeShiftId">
            @foreach ($saved_list as $k => $value)
                <option value="{{ $k }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="ui card full card-shadow shift-calendar-inputs" wire:key="shift-form:{{ $current_shift }}">
        <div class="content">
            <section style="display: flex; width: 100%;">
                <div class="ui form" style="width: 50%;">
                    <div class="field">
                        <label for="title_value">タイトル</label>
                        <input type="text" id="title_value" name="title_value" wire:model="title_value">
                    </div>
                    <div class="field">
                        <label for="br-start_days_of_week">事業所</label>
                        <select class="ui fluid dropdown" name="branch_value" wire:model.live="branch_value">
                            @foreach ($branch_list as $k => $value)
                                <option value="{{ $k }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="three fields">
                        <div class="field ">
                            <label for="start_month_of_year">起算日</label>
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
                                <select class="ui fluid dropdown" name="start_date" wire:model.live="start_month">
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
                            <label for="start_day_of_week"></label>
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
                        <div class="field">
                            <label for="br-start_days_of_week">曜日の始まり</label>
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
        <button type="button" class="ui button small" onClick="window.$holidayModal.modal('show')">休日一括設定</button>
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
    <div class="table py-2">
        <table class="ui definition table">
            <thead>
                <tr>
                    <th></th>
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
                        <td>{{ date('j', strtotime('last day of', strtotime('01-' . $month . '-' . $year))) }}</td>
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
                        <td>{{ count($holidays) }}</td>
                        @php
                            if ($month == 12) {
                                $year++;
                            }
                        @endphp
                    @endforeach
                </tr>
                <tr>
                    <td>実働日数</td>
                    @php
                        $num_work = [];
                    @endphp
                    @foreach ($this->render_months as $month)
                        @php
                            $num_work[$month] = $num_date[$month] - $num_holiday[$month];
                        @endphp
                        <td>{{ $num_date[$month] - $num_holiday[$month] }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>総実働時間</td>
                    @foreach ($this->render_months as $month)
                        <td>{{ $num_work[$month] * $work_time }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    <div class="shift-calendar-buttons my-2" style="display: flex; flex-direction: row-reverse; gap: 1em;">
        @if ($editable)
            <button class="ui button primary button-disable" type="button" style="width: 200px;"
                wire:click.debounce.150ms="save">保存</button>
        @endif
        <button class="ui button yellow button-disable_" type="button" style="width: 200px;"
            wire:click.debounce.150ms="download">ダウンロード</button>
    </div>
</section>
