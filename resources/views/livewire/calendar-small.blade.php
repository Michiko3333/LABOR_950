<div class="calendar">
    @if ($showHeader)
        <div class="calendar-month">{{ $active_year }}年 {{ $active_month }}月</div>
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

        @for ($i = $this->select_date; $i <= $this->num_days + $this->select_date - 1; $i++)
            @php
                $day_count++;
                $num = $i > $this->num_days ? $i - $this->num_days : $i;
                $last_num = $num;
            @endphp
            <div class="day_num">
                <div>{{ $num }}</div>
            </div>
        @endfor

        @php
            $c = $day_count - $row_count * 7;
        @endphp

        @for ($i = $c; $i < 42; $i++)
            @php
                $day_count++;
                $num = $last_num + 1 + $i - $c;
                $num = $num > $this->num_days_next_month ? $num - $this->num_days_next_month : $num;
            @endphp
            @if ($i - $c >= 42 - $c - 7)
                @continue
            @endif
            <div class="day_num ignore">{{ $num }}</div>
        @endfor
    </div>
</div>
