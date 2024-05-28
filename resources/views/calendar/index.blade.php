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
            $('#editCalendar').modal({
                allowMultiple: true,
                onShow: () => {
                    //$('').remove();
                },
                onHidden: () => {
                    //$('.ui.dimmer.modals.page').empty();
                    $('.edit-calendar-modal').remove();
                }
            }).modal('show');
        };
        Livewire.on('modal-closeCalendarModal', () => {
            $('.edit-calendar-modal').modal('hide');
        });
        Livewire.on('modal-onSubmitError', () => {
            $('.edit-calendar-modal .ui.error.message').removeClass('hidden');
        });
        Livewire.on('modal-onEditModal', (d) => {
            window.$_calendar = {
                calendar_date_from: '',
                calendar_date_to: ''
            };

            let initial_date_from = '';
            if (d.date[0]) {
                window.$_calendar.calendar_date_from = d.date[0];
                const milliseconds = d.date[0] * 1000;
                initial_date_from = new Date(milliseconds);
            }

            let initial_date_to = '';
            if (d.date[1]) {
                window.$_calendar.calendar_date_to = d.date[1];
                const milliseconds = d.date[1] * 1000;
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
        });

        Livewire.on('modal-onDetailModal', (d) => {
            const info = d.info;
            if (info.from) info.from = formatUnixTime(info.from);
            if (info.to) info.to = formatUnixTime(info.to);
            $('#detailCalendar').modal({
                blurring: true,
                onHidden: () => {
                    $('.detail-calendar-modal').remove();
                    window.$calendar_modal.onClose();
                },
                onShow: () => {
                    $('#detailCalendar .header').removeClass('admin');
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
                        $('#detailCalendar .actions>button')[0].addEventListener('click', () => {
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
