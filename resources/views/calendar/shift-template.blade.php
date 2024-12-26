<!DOCTYPE html>
<html lang="ja">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        /* 日本語対応可のためフォント読込 */
        @font-face {
            font-family: 'NotoSansJP';
            font-style: normal;
            font-weight: normal;
            src: url("{!! asset('css/NotoSansJP-Regular.ttf') !!}");
        }

        * {
            font-family: 'NotoSansJP', sans-serif !important;
            font-weight: normal !important;
        }

        .calendars {
            display: block;
            width: 100%;
        }

        .calendars .row {
            text-align: center;
            vertical-align: top;
            margin-bottom: 20px;
        }

        .calendar-small {
            width: 180px;
            height: 235px;
            display: inline-block;
            margin-top: 18px;
            margin-right: 20px;
            text-align: left;
        }

        .calendar-small .calendar-small-month {
            text-align: center;
        }

        .calendar-small .day_name {
            font-size: 11px;
            display: inline-block;
            width: 20px;
            height: 25px;
            text-align: center;
            border-bottom: solid 1px silver;
        }

        .calendar-small .day_num {
            font-size: 11px;
            display: inline-block;
            width: 20px;
            height: 25px;
            text-align: center;
            color: black;
        }

        .calendar-small .day_num>.holiday {
            color: red;
        }

        .calendar-small .day_num.ignore {
            color: silver;
        }
    </style>
    <title>Test</title>
</head>

<body>
    <p style="font-size: 28px; text-align: center; margin: 0;">{{ $origin['title'] }}</p>
    <p style="font-size: 12px; text-align: left; padding-bottom: 24px;">
        {{ $company_name }}<br>
        起算日：{{ $origin['year'] }}年{{ $origin['month'] }}月{{ $origin['day'] }}日</p>
    <div style="width: 100%;">
        <div class="calendars" style="margin: 0 auto;">
            <div class="row">
                @php
                    $i = 0;
                    $year = (int) $origin['year'];
                    $date = (int) $origin['day'];
                    $week = (int) $origin['week'];
                    $day_base = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                    $days_ja = [
                        'Sun' => '日',
                        'Mon' => '月',
                        'Tue' => '火',
                        'Wed' => '水',
                        'Thu' => '木',
                        'Fri' => '金',
                        'Sat' => '土',
                    ];
                @endphp
                @foreach ($render_months as $cc => $month)
                    @php
                        $filtered_month = array_filter($values, function ($item) use ($month, $year) {
                            return $item['month'] == $month && $item['year'] == $year;
                        });
                    @endphp
                    <!-- calendar -->
                    @php
                        //$date = date('y-m-d', strtotime($year . '-' . $month . '-' . $date));
                        $start_day = $week < 0 || $week > 6 ? 0 : $week;
                        $before_start_day = array_slice($day_base, 0, $start_day);
                        $after_start_day = array_slice($day_base, $start_day);
                        $days = array_merge($after_start_day, $before_start_day);

                    @endphp
                    @if (!($cc % 3))
            </div>
            <div class="row">
                @endif
                <div class="calendar-small">
                    <div class="calendar-small-month">{{ $year }}年 {{ $month }}月</div>
                    <div class="days">
                        @foreach ($days as $day)
                            <div class="day_name">{{ $days_ja[$day] }}</div>
                        @endforeach

                        @php
                            $num_days = date('t', strtotime('01-' . $month . '-' . $year));
                            $num_days_last_month = date(
                                'j',
                                strtotime('last day of previous month', strtotime('01-' . $month . '-' . $year)),
                            );
                            $num_days_next_month = date(
                                'j',
                                strtotime('last day of next month', strtotime('01-' . $month . '-' . $year)),
                            );
                            $first_day_of_week = array_search(date('D', strtotime($year . '-' . $month . '-1')), $days);
                            $row_count = floor(($first_day_of_week + $date - 1) / 7);
                            $day_count = 0;
                        @endphp
                        @for ($i = $first_day_of_week; $i > 0; $i--)
                            @php
                                $day_count++;
                                $num = $num_days_last_month + $date - $i + 1;
                            @endphp
                            @if ($day_count <= $row_count * 7)
                                @continue
                            @endif
                            <div class="day_num ignore">{{ $num_days_last_month - $i + 1 }}</div>
                        @endfor
                        @for ($i = 1; $i < $date; $i++)
                            @php
                                $day_count++;
                            @endphp
                            @if ($day_count <= $row_count * 7)
                                @continue
                            @endif
                            <div class="day_num ignore">{{ $i }}</div>
                        @endfor
                        @for ($i = $date; $i <= $num_days + $date - 1; $i++)
                            @php
                                $day_count++;
                                $num = $i > $num_days ? $i - $num_days : $i;
                                $last_num = $num;
                            @endphp
                            <div class="day_num">
                                @php
                                    $filtered_values = array_filter($filtered_month, function ($item) use ($num) {
                                        return $item['date'] == $num;
                                    });
                                    $day_values = array_values($filtered_values);
                                @endphp
                                <div class="{{ count($day_values) > 0 ? 'holiday' : '' }}">{{ $num }}</div>
                            </div>
                        @endfor
                        @php
                            $c = $day_count - $row_count * 7;
                        @endphp

                        @for ($i = $c; $i < 42; $i++)
                            @php
                                $day_count++;
                                $num = $last_num + 1 + $i - $c;
                                $num = $num > $num_days_next_month ? $num - $num_days_next_month : $num;
                            @endphp
                            @if ($i - $c >= 42 - $c - 7)
                                @continue
                            @endif
                            <div class="day_num ignore">{{ $num }}</div>
                        @endfor
                    </div>
                </div>

                @php
                    if ($month == 12) {
                        $year++;
                    }
                    $i++;
                @endphp
                @endforeach
            </div>
        </div>
    </div>
    <div style="width: 100%; padding: 0px 20px;">
        <table style="width: 90%;" border="1">
            <style>
                th {
                    min-width: 40px;
                }

                th,
                td {
                    text-align: center;
                }
            </style>
            <thead>
                <tr>
                    <th></th>
                    @foreach ($render_months as $month)
                        <th>{{ $month }}月</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>歴日数</td>
                    @php
                        $year = (int) $origin['year'];
                        $num_date = [];
                    @endphp
                    @foreach ($render_months as $month)
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
                        $year = (int) $origin['year'];
                        $num_holiday = [];
                    @endphp
                    @foreach ($render_months as $month)
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
                    @foreach ($render_months as $month)
                        @php
                            $num_work[$month] = $num_date[$month] - $num_holiday[$month];
                        @endphp
                        <td>{{ $num_date[$month] - $num_holiday[$month] }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>総実働時間</td>
                    @foreach ($render_months as $month)
                        <td>{{ $num_work[$month] * $work_time }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
