<div class="calendar-small">
    @if ($showHeader)
        <div class="calendar-small-month">{{ $active_year }}年 {{ $active_month }}月</div>
    @endif
    <div class="days">
        @foreach ($this->days as $day)
            <div class="day_name">{{ $days_ja[$day] }}</div>
        @endforeach

        @php
            $row_count = floor(($this->first_day_of_week + $this->select_date - 1) / 7);
            $day_count = 0;
        @endphp
        @for ($i = $this->first_day_of_week; $i > 0; $i--)
            @php
                $day_count++;
                $num = $this->num_days_last_month + $this->select_date - $i + 1;
            @endphp
            @if ($day_count <= $row_count * 7)
                @continue
            @endif
            <div class="day_num ignore">{{ $this->num_days_last_month - $i + 1 }}</div>
        @endfor

        @for ($i = 1; $i < $this->select_date; $i++)
            @php
                $day_count++;
            @endphp
            @if ($day_count <= $row_count * 7)
                @continue
            @endif
            <div class="day_num ignore">{{ $i }}</div>
        @endfor
        @php
            $year = (int) $this->active_year;
            $month = (int) $this->active_month;
        @endphp
        @for ($i = $this->select_date; $i <= $this->num_days + $this->select_date - 1; $i++)
            @php
                $day_count++;
                $num = $i > $this->num_days ? $i - $this->num_days : $i;
                $last_num = $num;
            @endphp
            <div class="day_num">
                @php
                    $filtered_values = array_filter($this->values, function ($item) use ($num, $month, $year) {
                        return $item['year'] == $year && $item['month'] == $month && $item['date'] == $num;
                    });
                    $values = array_values($filtered_values);
                @endphp
                @if ($this->clickable)
                    <button wire:click="clickNum({{ $month }}, {{ $num }})">{{ $num }}</button>
                @else
                    <div>{{ $num }}</div>
                @endif
                @if (count($values) > 0)
                    <span class="mark {{ $values[0]['mark'] }}"
                        style="background-color: {{ $values[0]['color'] }}; color: {{ $values[0]['color'] }}; border-color: {{ $values[0]['color'] }};">
                    </span>
                @endif
                @php
                    if ($num == $this->num_days) {
                        $month++;
                        if ($month > 12) {
                            $month = 1;
                            $year++;
                        }
                    }
                @endphp
            </div>
        @endfor

        @php
            $next_month_start = $this->select_date;
        @endphp

        @php
            $c = $day_count - $row_count * 7;
            $is_last_day_in_sixth_row = $c > 35;
            $fill_count = $is_last_day_in_sixth_row ? 42 : 35;
        @endphp

        @for ($i = $c; $i < $fill_count; $i++)
            @php
                $day_count++;
                $num = $next_month_start++;
            @endphp
            <div class="day_num ignore">{{ $num }}</div>
        @endfor
    </div>
</div>
