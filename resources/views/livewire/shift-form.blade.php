<div class="ui card full card-shadow shift-calendar-inputs">
    <div class="content">
        <section style="display: flex; width: 100%;">
            <div class="ui form" style="width: 50%;">
                <div class="field">
                    <label for="title_value">タイトル</label>
                    <input type="text" id="title_value" name="title_value"
                        value="{{ old('title_value', isset($title_value) ? $title_value : '') }}">
                </div>
                <div class="field {{ err_bind($errs, 'branch_value') }}">
                    <label for="branch_value">支店・事業所</label>
                    <select class="ui fluid dropdown" name="branch_value">
                        <option value="">未選択</option>
                        @foreach ($this->branch_list as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="three fields">
                    <div class="field ">
                        <label for="start_month_of_year">起算日</label>
                        <div class="ui right labeled input">
                            <input type="number" placeholder="2025" min="0" max="8760"
                                name="start_month_of_year">
                            <div class="ui basic label">
                                年
                            </div>
                        </div>
                    </div>
                    <div class="field ">
                        <label for="start_day_of_month"></label>
                        <div class="ui right labeled input">
                            <input type="number" placeholder="12" min="1" max="12"
                                name="start_day_of_month">
                            <div class="ui basic label">
                                月
                            </div>
                        </div>
                    </div>
                    <div class="field ">
                        <label for="start_day_of_week"></label>
                        <div class="ui right labeled input">
                            <input type="number" placeholder="31" min="1" max="31"
                                name="start_day_of_week">
                            <div class="ui basic label">
                                日
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field {{ err_bind($errs, 'is_default') }}">
                    <div class="ui toggle checkbox">
                        <input type="checkbox" name="is_default">
                        <label>このカレンダーをデフォルトにする</label>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="calendars">
    @php
        $year = $this->start_year;
    @endphp
    @foreach ($this->render_months as $month)
        @php
            $filtered_values = array_filter($this->test, function ($item) use ($month) {
                return $item['month'] == $month;
            });
        @endphp
        @livewire('calendar-small', [
            'year' => $year,
            'month' => $month,
            'showHeader' => true,
            'firstDayWeek' => $start_weekday,
            'firstDate' => $start_date,
            'clickable' => true,
            'values' => $filtered_values,
        ])
        @php
            if ($month == 12) {
                $year++;
            }
        @endphp
    @endforeach
</div>
