<div class="calendar">
<div id="load" style="display: none;">
<div id="overlay">
<div class="loader"></div>
</div>
</div>
@script
<script>
const onCancel = () => {
$wire.dispatch('onCancelCalendar');
}
const onClose = () => {
$wire.dispatch('onCloseCalendar');
}
const onEdit = () => {
if (window.$calendar_modal.isSubmit) return;
window.$calendar_modal.isSubmit = true;
const inputs_name = document.getElementsByClassName('edit-calendar-inputs_name')[1].value;
const inputs_subsidies_name = document.getElementsByClassName('edit-calendar-inputs_subsidies_name')[1].value;
const inputs_category = document.getElementsByClassName('edit-calendar-inputs_category')[1].value;
const inputs_repetition = document.getElementsByClassName('edit-calendar-inputs_repetition')[1].value;
const inputs_contents = document.getElementsByClassName('edit-calendar-inputs_contents')[1].value;
const inputs_edit_id = document.getElementsByClassName('edit-calendar-inputs_edit_id')[1].value;
const inputs_select_events_type = document.getElementsByClassName('edit-calendar-inputs-select-events-type')[0].value;
const from = document.getElementsByClassName('edit-calendar-from')[1].value;
const to = document.getElementsByClassName('edit-calendar-to')[1].value;
const data = {
inputs_name: inputs_name,
inputs_subsidies_name: inputs_subsidies_name,
inputs_category: inputs_category,
inputs_repetition: inputs_repetition ? inputs_repetition : 0,
inputs_contents: inputs_contents,
inputs_edit_id: inputs_edit_id,
inputs_select_events_type: inputs_select_events_type ? inputs_select_events_type : null,
from: from ? $_calendar.calendar_date_from : '',
to: to ? $_calendar.calendar_date_to : '',
};
$wire.dispatch('onSubmitCalendar', {
data: data
});
}
const onRemove = () => {
const select_value = document.querySelector('input[name="removal-conditions"]:checked').value;
$wire.dispatch('onRemoveCalendar', {
value: select_value
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
onClose: onClose,
onRemove: onRemove,
isSubmit: false
};
const calendar_edit_modal = $('#editCalendar').modal({
    blurring: true,
});
Livewire.on('modal-closeCalendarModal', () => {
    calendar_edit_modal.modal('hide');
    $wire.dispatch('getEvents');
});
</script>
@endscript
<script>
document.addEventListener('livewire:init', () => {
    Livewire.hook('request', ({ respond, succeed }) => {
        const startTime = Date.now();
        const showLoading = () => {
            document.getElementById('load').style.display = 'block';
        };

        let loadingTimer = setTimeout(showLoading, 800);

        succeed(() => {
            clearTimeout(loadingTimer);
            document.getElementById('load').style.display = 'none';
        });
    });
});
</script>
<div class="mb-1">
@if ($this->editPermission)
<button class="ui button primary small" type="button" onclick="openEditCalendarModal()"
wire:click='new'>予定を追加</button>
@endif
</div>
<div class="calendar-container">
<div class="calendar-small-area">
<div class="calendar-small-next"><livewire:calendar-small :year="$this->todayNextYear" :month="$this->todayNextMonth" :showHeader="true" :firstDayWeek="$this->start_day" :firstDate="1" :clickable="$this->clickable" :values="$this->nextMonthEvent" wire:key="sc-component:{{ $this->todayNextYear }}-{{ $this->todayNextMonth }}:{{ $this->active_year }}-{{ $this->active_month }}:{{ $this->clickable }}" /></div><div class="calendar-small-next"><livewire:calendar-small :year="$this->todayAfterNextYear" :month="$this->todayAfterNextMonth" :showHeader="true" :firstDayWeek="$this->start_day" :firstDate="1" :clickable="$this->clickable" :values="$this->afterNextMonthEvent" wire:key="sc-component:{{ $this->todayAfterNextYear }}-{{ $this->todayAfterNextMonth }}:{{ $this->active_year }}-{{ $this->active_month }}:{{ $this->clickable }}" /></div>
<div class="checkbox-area">
<div class="event-checkbox company-events">
<input type="checkbox" id="company-events" name="company-events" wire:click="filterEvents('company-events')" checked>
<label for="company-events">会社行事</label>
</div>
<div class="event-checkbox personnel-affairs">
<input type="checkbox" id="personnel-affairs" name="personnel-affairs" wire:click="filterEvents('personnel-affairs')" checked>
<label for="personnel-affairs">人事業務</label>
</div>
<div class="event-checkbox general-affairs">
<input type="checkbox" id="general-affairs" name="general-affairs" wire:click="filterEvents('general-affairs')" checked>
<label for="general-affairs">総務業務</label>
</div>
<div class="event-checkbox administrative-procedures">
<input type="checkbox" id="administrative-procedures" name="administrative-procedures" wire:click="filterEvents('administrative-procedures')" checked>
<label for="administrative-procedures">行政手続</label>
</div>
<div class="event-checkbox taxation-services">
<input type="checkbox" id="taxation-services" name="taxation-services" wire:click="filterEvents('taxation-services')" checked>
<label for="taxation-services">税務業務</label>
</div>
<div class="event-checkbox others">
<input type="checkbox" id="others" name="others" wire:click="filterEvents('others')" checked>
<label for="others">その他</label>
</div>
<div class="event-checkbox grants-and-subsidies">
<input type="checkbox" id="grants-and-subsidies" name="grants-and-subsidies" wire:click="filterEvents('grants-and-subsidies')" checked>
<label for="grants-and-subsidies">助成金・補助金</label>
</div>
</div>
</div>
<div class="calendar-area" style="display: flex; flex-direction: column; margin-left: 2rem; width: 80%;">
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
<div class="days-work">
@foreach ($this->days as $day)
<div class="day_name-work">{{ $days_ja[$day] }}</div>
@endforeach
@for ($i = $this->first_day_of_week; $i > 0; $i--)
<div class="day_num-work ignore">{{ $this->num_days_last_month - $i + 1 }}</div>
@endfor
@for ($i = 1; $i <= $this->num_days; $i++)
<div class="day_num-work {{ $this->isToday($i) ? 'selected' : '' }}">
<span>{{ $i }}</span>
@foreach ($this->events as $event)
@if ($this->checkdate($event, $i, 0))
@if ($event[5] === true)
<div class="event {{ $event[4] }} days_{{ $event[3] }} {{ $event[7] }}" style="z-index: 100; width: calc({{ $event[6] }}% + {{ $event[8] }}px);" wire:click='detail({{ $event[0] }})'>
{{ $event[1] }}</div>
@else
<div class="event {{ $event[4] }} days_{{ $event[3] }}" style="opacity: 0; cursor: default;">
{{ $event[1] }}</div>
@endif
@endif
@endforeach
</div>
@endfor
@for ($i = 1; $i <= 42 - $this->num_days - max($this->first_day_of_week, 0); $i++)
<div class="day_num-work ignore">{{ $i }}</div>
@endfor
</div>
</div>
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
<input type="hidden" class='edit-calendar-inputs_edit_id'>
<input type="hidden" class='edit-calendar-inputs-select-events-type'>
<div class="required field">
<label for="event-title">タイトル</label>
<input type="text" name="event-title" class='edit-calendar-inputs_name' autocomplete="off" maxlength="20" wire:ignore>
</div>
<div class="required field subsidies" style="display: none;">
<label for="input_subsidies_name">助成金・補助金名</label>
<input type="text" name="input_subsidies_name" class='edit-calendar-inputs_subsidies_name' autocomplete="off" maxlength="50" wire:ignore>
</div>
<div class="two fields">
<div class="required field">
<label>日時（開始）</label>
<div class="ui calendar from_date_calendar" id="from_date_calendar" wire:ignore>
<div class="ui input left icon">
<i class="calendar icon"></i>
<input type="text" placeholder="Date" name="from_date" class="from_date" autocomplete="off">
<input type="hidden" name="formatted_from_date" class="formatted_from_date edit-calendar-from" id="formatted_from_date">
</div>
</div>
</div>
<div class="field">
<label>日時（終了）</label>
<div class="ui calendar to_date_calendar" id="to_date_calendar" wire:ignore>
<div class="ui input left icon">
<i class="calendar icon"></i>
<input type="text" placeholder="Date" name="to_date" autocomplete="off">
<input type="hidden" name="formatted_to_date" id="formatted_to_date"
class="edit-calendar-to" wire:ignore>
</div>
</div>
</div>
</div>
<div class="two fields">
<div class="required field">
<label>カテゴリ</label>
<select class="ui fluid dropdown edit-calendar-inputs_category">
<option value="">未選択</option>
@foreach ($category_types as $index => $cat)
<option value="{{ $index }}">{{ $cat }}</option>
@endforeach
</select>
</div>
<div class="field select-repetition">
<label>繰り返し</label>
<select class="ui fluid dropdown edit-calendar-inputs_repetition">
<option value="0">繰り返さない</option>
<option value="1">毎週</option>
<option value="2">毎月（曜日）</option>
<option value="3">毎月（日付）</option>
<option value="4">毎年</option>
</select>
</div>
</div>
<div class="field">
<label for="event-title">内容・詳細</label>
<textarea name="event-contents" cols="30" rows="6" maxlength="255" class='edit-calendar-inputs_contents'></textarea>
</div>
</div>
</form>
@if ($this->editPermission)
<div class="remove-area mt-2">
<div class="open-remove-select ui hidden">
<button type="button">この予定を削除する</button>
</div>
<div class="select-remove-type-area">
<div class="select-remove-type-style">
<div class="select-remove-type">
<div>
<input type="radio" id="defaultCheck" name="removal-conditions" value="0" checked>
<label for="defaultCheck">この予定</label>
</div>
<div>
<input type="radio" name="removal-conditions" value="1">
<label for="">これ以降の予定</label>
</div>
<div>
<input type="radio" name="removal-conditions" value="2">
<label for="">全ての予定</label>
</div>
</div>
</div>
<div class="confirm-remove hidden">
<button type="button" onClick="$calendar_modal.onRemove()">削除</button>
</div>
</div>
<div class="remove-link ui hidden">
<button type="button" onClick="$calendar_modal.onRemove()">この予定を削除する</button>
</div>
</div>
@endif
</div>
<div class="actions">
<button class="ui negative button" type="button"
onClick="javascript:$calendar_modal.onCancel()">キャンセル</button>
@if ($this->editPermission)
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
<div class="field subsidies_name hidden">
<label>助成金・補助金名</label>
<input type="text" class="subsidies_name" readonly>
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
<div class="field">
<label>繰り返し</label>
<input type="text" class="repetition" readonly>
</div>
</div>
<div class="field">
<label for="event-title">内容・詳細</label>
<textarea class="contents" cols="30" rows="6" readonly></textarea>
</div>
</div>
</div>
@if ($this->editPermission)
<div class="actions no-repetition-event hidden">
<button class="ui primary button approve">編集</button>
</div>
<div class="actions repetition-event hidden">
<div class="ui floating dropdown button primary px-1 edit-select" style="width: 100px; text-align: center;">
編集
<i class="dropdown icon" style="margin-left: 1rem;"></i>
<div class="menu">
<div class="item this-event">この予定</div>
<div class="item subsequent-events">これ以降の予定</div>
<div class="item all-event">全ての予定</div>
</div>
</div>
</div>
@endif
</div>
</div>
