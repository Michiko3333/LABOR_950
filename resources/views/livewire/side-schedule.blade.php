<div class="schedule-area">
    @if ($isLogin)
        <div class="schedule-date">
            <p>
                <span class="num">{{ date('m', strtotime($this->today)) }}</span>月
                <span class="num">{{ date('d', strtotime($this->today)) }}</span>日
            </p>
            <p class="weekday">{{ $this->weekday }}曜日</p>
        </div>
        @if ($userPermission->isReadableFor(11))
            <div class="schedule-list">
                @foreach ($events as $event)
                    <div class="schedule-item">
                        <h2>{{ $event[1] }}</h2>
                        <p class="datetime">
                            {{ date('Y年m月d日', strtotime($event[2])) }}
                            @if (!empty($event[3]))
                                - {{ date('Y年m月d日', strtotime($event[3])) }}
                            @endif
                        </p>
                        @if (!empty($event[4]))
                            <p>{{ $event[4] }}</p>
                        @endif
                    </div>
                @endforeach
                @if ($isSelected)
                    <div class="button">
                        <a href="{{ route('calendar.index') }}">カレンダーを見る</a>
                    </div>
                @endif
            </div>
        @endif
    @endif

</div>
