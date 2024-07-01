<x-layout title="カレンダー" mode="">
    @slot('header')
        <link rel="stylesheet" href="{{ asset('custom/calendar.css') }}">
    @endslot

    <section class="content pb-3">
        <div class="ui huge breadcrumb mb-0 mb-2">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">カレンダー</div>
        </div>
        @livewire('calendar')
    </section>

    <script type="module">
        window.$_calendar = {
            calendar_date_from: '',
            calendar_date_to: ''
        };

        const calendar_formatter = {
            date: 'Y"年"MM"月"DD"日"',
            datetime: 'Y"年"MM"月"DD"日" H:mm',
            time: 'H:mm',
            cellTime: 'H:mm'
        };
        const calendar_text = {
            days: ['日', '月', '火', '水', '木', '金', '土'],
            months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
        };

        const calendar_edit_modal = $('#editCalendar').modal({
            blurring: true,
        });

        const calendar_detail_modal = $('#detailCalendar').modal({
            blurring: true,
        });

        function formatUnixTime(unixTime) {
            const date = new Date(unixTime * 1000); // Unixタイムスタンプはミリ秒ではなく秒単位なので、1000倍する
            const year = date.getFullYear();
            const month = ("0" + (date.getMonth() + 1)).slice(-2); // 月は0から始まるので、+1して補完する
            const day = ("0" + date.getDate()).slice(-2);
            const hours = ("0" + date.getHours()).slice(-2);
            const minutes = ("0" + date.getMinutes()).slice(-2);

            return `${year}年${month}月${day}日 ${hours}:${minutes}`;
        }

        window.openEditCalendarModal = () => {
            $('.edit-calendar-modal .ui.error.message').addClass('hidden');
            calendar_edit_modal.modal({
                allowMultiple: true,
                onShow: () => {
                    //$('').remove();
                },
                onHidden: () => {
                    //$('.ui.dimmer.modals.page').empty();
                    $('.edit-calendar-modal').remove();
                    window.$calendar_modal.isSubmit = false;
                }
            }).modal('show');
        };
        Livewire.on('modal-closeCalendarModal', () => {
            calendar_edit_modal.modal('hide');
        });
        Livewire.on('modal-onSubmitError', () => {
            $('.edit-calendar-modal .ui.error.message').removeClass('hidden');
            window.$calendar_modal.isSubmit = false;
        });
        Livewire.on('modal-onEditModal', (d) => {
            const data = d[0];
            $('.ui.calendar.from_date_calendar').calendar('clear').calendar('destroy');
            $('.ui.calendar.to_date_calendar').calendar('clear').calendar('destroy');
            $('.edit-calendar-modal .ui.error.message').addClass('hidden');
            window.$_calendar = {
                calendar_date_from: '',
                calendar_date_to: ''
            };

            let initial_date_from = '';
            if (data['from']) {
                window.$_calendar.calendar_date_from = data['from'];
                const milliseconds = data['from'] * 1000;
                initial_date_from = new Date(milliseconds);
            }

            let initial_date_to = null;
            if (data['to']) {
                window.$_calendar.calendar_date_to = data['to'];
                const milliseconds = data['to'] * 1000;
                initial_date_to = new Date(milliseconds);
            }

            $('.ui.calendar.from_date_calendar').calendar({
                formatter: calendar_formatter,
                text: calendar_text,
                initialDate: initial_date_from,
                onSelect: $calendar_modal.onChangeFrom
            });

            $('.ui.calendar.to_date_calendar').calendar({
                formatter: calendar_formatter,
                text: calendar_text,
                initialDate: initial_date_to,
                onSelect: $calendar_modal.onChangeTo
            });

            $('.edit-calendar-inputs_name').val(data['inputs_name']);
            $('.edit-calendar-inputs_category').val(data['inputs_category']);
            $('.edit-calendar-inputs_contents').val(data['inputs_contents']);

            if (data['inputs_edit_id'] > 0) {
                $('.edit-calendar-inputs_edit_id').val(data['inputs_edit_id']);
                $('.edit-calendar-modal .remove-link').removeClass('hidden');
            } else {
                $('.edit-calendar-modal .remove-link').addClass('hidden');
            }
        });

        Livewire.on('modal-onDetailModal', (d) => {
            const info = d.info;
            if (info.from) info.from = formatUnixTime(info.from);
            if (info.to) info.to = formatUnixTime(info.to);

            calendar_detail_modal.modal({
                blurring: true,
                onHidden: () => {
                    $('.detail-calendar-modal').remove();
                    window.$calendar_modal.onClose();
                },
                onShow: () => {
                    $('.detail-calendar-modal .header').removeClass('admin');
                    $('#detailCalendar .header').removeClass('labor');
                    $('#detailCalendar .header').removeClass('employee');

                    $('#detailCalendar .title').val(info.name);
                    $('#detailCalendar .category').val(info.category);
                    $('#detailCalendar .from_date').val(info.from);
                    $('#detailCalendar .to_date').val(info.to);
                    $('#detailCalendar .contents').val(info.contents);

                    $('#detailCalendar .author').val('');

                    if (info.role_id == 999) {
                        $('#detailCalendar .header').addClass('admin');
                        $('#detailCalendar .author').val('管理者');
                    } else if (info.role_id == 500) {
                        $('#detailCalendar .header').addClass('labor');
                        $('#detailCalendar .author').val('社労士：' + info.author);
                    }
                    if (info.own) {
                        $('#detailCalendar .actions').addClass('own');
                        $('#detailCalendar .actions>button').on('click', () => {
                            window.$calendar_modal.onStartEdit(info.edit_id);
                            window.openEditCalendarModal(false);
                        });
                        if (info.role_id != 999 && info.role_id != 500) {
                            $('#detailCalendar .header').addClass('employee');
                            $('#detailCalendar .author').val(info.author);
                        }
                    } else {
                        $('#detailCalendar .actions').removeClass('own');
                        if (info.role_id != 999 && info.role_id != 500) {
                            $('#detailCalendar .author').val(info.author);
                        }
                    }
                }
            }).modal('show');
        });
    </script>
</x-layout>
