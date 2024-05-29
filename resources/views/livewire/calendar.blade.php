<div class="calendar">
    @script
        <script>
            const onCancel = () => {
                $wire.dispatch('onCancelCalendar');
            }

            const onClose = () => {
                $wire.dispatch('onCloseCalendar');
            }

            const onEdit = () => {
                $wire.dispatch('onSubmitCalendar', {
                    from: window.$_calendar.calendar_date_from,
                    to: window.$_calendar.calendar_date_to
                });
            }

            const onStartEdit = (edit_id) => {
                $wire.dispatch('onStartEditCalendar', {
                    id: edit_id
                });
            }

            const onChangeFrom = (e) => {
                const unix = e ? Math.floor(e.getTime() / 1000) : '';
                window.$_calendar.calendar_date_from = unix;
            };
            const onChangeTo = (e) => {
                const unix = e ? Math.floor(e.getTime() / 1000) : '';
                window.$_calendar.calendar_date_to = unix;
            };

            window.$calendar_modal = {
                onStartEdit: onStartEdit,
                onCancel: onCancel,
                onEdit: onEdit,
                onChangeFrom: onChangeFrom,
                onChangeTo: onChangeTo,
                onClose: onClose
            };
        </script>
    @endscript
    <div class="mb-1">
        @if ($userPermission->isWritableFor(11))
            <button class="ui button primary small" type="button" onclick="openEditCalendarModal()"
                wire:click='new'>予定を追加</button>
        @endif
    </div>
    <div class="header">
        <div class="control">
            <button type="button" class="ui button small icon" wire:click="page('prev')"><i
                    class="angle left icon"></i></button>
            <div class="date-select">
                <select class="ui fluid dropdown" id="select-year" style="min-width: 80px; max-width: 80px;"
                    wire:model.live="select_year">
                    @foreach ($this->years as $year)
                        <option value="{{ $year }}">
                            {{ $year }}</option>
                    @endforeach
                </select>年
                <select class="ui fluid dropdown" id="select-month" wire:model.live="select_month"
                    style="max-width: 60px;">
                    @foreach ($this->months as $month)
                        <option value="{{ $month }}">
                            {{ $month }}</option>
                    @endforeach
                </select>月
                <button type="button" class="ui button small icon" wire:click="setToday"><i
                        class="calendar check icon"></i></button>
            </div>
            <button type="button" class="ui button small icon" wire:click="page('next')"><i
                    class="angle right icon"></i></button>
        </div>
    </div>
    <div class="days">
        @foreach ($this->days as $day)
            <div class="day_name">{{ $days_ja[$day] }}</div>
        @endforeach

        @for ($i = $this->first_day_of_week; $i > 0; $i--)
            <div class="day_num ignore">{{ $this->num_days_last_month - $i + 1 }}</div>
        @endfor

        @for ($i = 1; $i <= $this->num_days; $i++)
            <div class="day_num {{ $this->isToday($i) ? 'selected' : '' }}">
                <span>{{ $i }}</span>
                @foreach ($this->events as $event)
                    @for ($d = 0; $d <= $event[3] - 1; $d++)
                        @if ($this->checkdate($event, $i, $d))
                            <div class="event {{ $event[4] }}" wire:click='detail({{ $event[0] }})'>
                                {{ $event[1] }}</div>
                        @endif
                    @endfor
                @endforeach
            </div>
        @endfor

        @for ($i = 1; $i <= 42 - $this->num_days - max($this->first_day_of_week, 0); $i++)
            <div class="day_num ignore">{{ $i }}</div>
        @endfor
    </div>
    <div id="editCalendar" class="ui modal tiny edit-calendar-modal" wire:ignore>
        <i class="close icon"></i>
        <div class="header">
            予定の追加
        </div>
        <div class="content">
            <form name="edit-calendar">
                <div class="ui form">
                    <div class="ui error message hidden">
                        <div class="header">入力エラー</div>
                        <ul class="list">
                            <li>必須項目が空欄か、指定した日時が不正です。</li>
                        </ul>
                    </div>
                    <input type="hidden" wire:model='inputs_edit_id'>
                    <div class="required field">
                        <label for="event-title">タイトル</label>
                        <input type="text" name="event-title" wire:model='inputs_name' maxlength="20">
                    </div>
                    <div class="two fields">
                        <div class="required field">
                            <label>日時（開始）</label>
                            <div class="ui calendar from_date_calendar" id="from_date_calendar" wire:ignore>
                                <div class="ui input left icon">
                                    <i class="calendar icon"></i>
                                    <input type="text" placeholder="Date" name="from_date" class="from_date">
                                    <input type="hidden" name="formatted_from_date" class="formatted_from_date"
                                        id="formatted_from_date">
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label>日時（終了）</label>
                            <div class="ui calendar to_date_calendar" id="to_date_calendar" wire:ignore>
                                <div class="ui input left icon">
                                    <i class="calendar icon"></i>
                                    <input type="text" placeholder="Date" name="to_date">
                                    <input type="hidden" name="formatted_to_date" id="formatted_to_date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="required field">
                            <label>カテゴリ</label>
                            <select class="ui fluid dropdown" wire:model='inputs_category'>
                                <option value="">未選択</option>
                                @foreach ($category_types as $index => $cat)
                                    <option value="{{ $index }}">{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label for="event-title">内容・詳細</label>
                        <textarea name="event-contents" cols="30" rows="6" wire:model='inputs_contents'></textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="actions">
            <button class="ui negative button" type="button"
                onClick="javascript:$calendar_modal.onCancel()">キャンセル</button>
            @if ($userPermission->isWritableFor(11))
                <div class="ui primary button" onClick="javascript:$calendar_modal.onEdit()">登録</div>
            @endif
        </div>
    </div>

    <div id="detailCalendar" class="ui modal tiny detail-calendar-modal" wire:ignore>
        <i class="close icon"></i>
        <div class="header">
            <input type="text" class="title" maxlength="20" readonly style="">
        </div>
        <div class="content">
            <div class="ui form">
                <input type="hidden">
                <div class="field">
                    <label>登録者</label>
                    <input type="text" class="author" readonly>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label>日時（開始）</label>
                        <input type="text" class="from_date" readonly>
                    </div>
                    <div class="field">
                        <label>日時（終了）</label>
                        <input type="text" class="to_date" readonly>
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label>カテゴリ</label>
                        <input type="text" class="category" readonly>
                    </div>
                </div>
                <div class="field">
                    <label for="event-title">内容・詳細</label>
                    <textarea class="contents" cols="30" rows="6" readonly></textarea>
                </div>
            </div>
        </div>
        <div class="actions">
            <button class="ui primary button approve">編集</button>
        </div>
    </div>
</div>
