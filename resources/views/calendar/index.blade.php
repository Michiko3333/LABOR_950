<x-layout title="カレンダー" mode="">
    @slot('header')
        <link rel="stylesheet" href="{{ asset('custom/calendar.css') }}">
        <link rel="stylesheet" href="{{ asset('custom/calendar-small.css') }}">
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
                    if($('.edit-calendar-inputs-select-events-type').val() === '0') {
                        $('.select-repetition').css('display', 'none');
                    }
                },
                onHidden: () => {
                    //$('.ui.dimmer.modals.page').empty();
                    $('.select-repetition').css('display', 'block');
                    $('input[name="removal-conditions"]').prop('checked', false);
                    $('.edit-calendar-modal').remove();
                    window.$calendar_modal.isSubmit = false;
                }
            }).modal('show');
        };
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
            $('.edit-calendar-inputs_subsidies_name').val(data['inputs_subsidies_name']);
            $('.edit-calendar-inputs_category').val(data['inputs_category']);
            $('.edit-calendar-inputs_repetition').val(data['inputs_repetition']);
            $('.edit-calendar-inputs_contents').val(data['inputs_contents']);

            if (data['inputs_repetition'] == 0) {
                $('.remove-link').removeClass('hidden');
                $('.open-remove-select').addClass('hidden');
                $('.select-remove-type-style').addClass('hidden');
                $('.confirm-remove').addClass('hidden');
            } else {
                $('.remove-link').addClass('hidden');
                $('.open-remove-select').removeClass('hidden');
            }

            if (data['inputs_edit_id'] > 0) {
                $('.edit-calendar-inputs_edit_id').val(data['inputs_edit_id']);
            } else {
                $('.edit-calendar-modal .remove-link').addClass('hidden');
            }

            subsidiesSwitching();
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
                    $('.no-repetition-event').addClass('hidden');
                    $('.repetition-event').addClass('hidden');

                    $('.select-remove-type-style').addClass('hidden');
                    $('.confirm-remove').addClass('hidden');
                },
                onShow: () => {
                    $('.detail-calendar-modal .header').removeClass('admin');
                    $('#detailCalendar .header').removeClass('labor');
                    $('#detailCalendar .header').removeClass('employee');

                    if(info.subsidies_name) {
                        $('#detailCalendar .field.subsidies_name').removeClass('hidden');
                    } else {
                        $('#detailCalendar .field.subsidies_name').addClass('hidden');
                    }

                    $('#detailCalendar .title').val(info.name);
                    $('#detailCalendar .subsidies_name').val(info.subsidies_name);
                    $('#detailCalendar .category').val(info.category);
                    $('#detailCalendar .from_date').val(info.from);
                    $('#detailCalendar .to_date').val(info.to);
                    $('#detailCalendar .repetition').val(info.repetition_type);
                    $('#detailCalendar .contents').val(info.contents);

                    $('#detailCalendar .author').val('');

                    $('#detailCalendar .this-event').on('click', () => {
                        $('.edit-calendar-inputs-select-events-type').val(0);
                        window.$calendar_modal.onStartEdit(info.edit_id);
                        window.openEditCalendarModal(false);
                        calendar_detail_modal.modal('hide');
                    });

                    $('#detailCalendar .subsequent-events').on('click', () => {
                        $('.edit-calendar-inputs-select-events-type').val(1);
                        window.$calendar_modal.onStartEdit(info.edit_id);
                        window.openEditCalendarModal(false);
                        calendar_detail_modal.modal('hide');
                    });

                    $('#detailCalendar .all-event').on('click', () => {
                        $('.edit-calendar-inputs-select-events-type').val(2);
                        window.$calendar_modal.onStartEdit(info.edit_id);
                        window.openEditCalendarModal(false);
                        calendar_detail_modal.modal('hide');
                    });


                    if (info.role_id == 999) {
                        $('#detailCalendar .header').addClass('admin');
                        $('#detailCalendar .author').val('管理者');
                    } else if (info.role_id == 500) {
                        $('#detailCalendar .header').addClass('labor');
                        $('#detailCalendar .author').val('社労士：' + info.author);
                    } else if (info.role_id == 100) {
                        $('#detailCalendar .header').addClass('employee');
                        $('#detailCalendar .author').val(info.author);
                    }

                    $('#detailCalendar .no-repetition-event>button').on('click', () => {
                        $('.edit-calendar-inputs-select-events-type').val('');
                        window.$calendar_modal.onStartEdit(info.edit_id);
                        window.openEditCalendarModal(false);
                    });

                    if (info.repetition_type === '繰り返さない') {
                        $('.no-repetition-event').removeClass('hidden');
                        $('.repetition-event').addClass('hidden');

                        $('.remove-link').removeClass('hidden');
                        $('.open-remove-select').addClass('hidden');
                        $('.select-remove-type-style').addClass('hidden');
                        $('.confirm-remove').addClass('hidden');
                    } else {
                        $('.no-repetition-event').addClass('hidden');
                        $('.repetition-event').removeClass('hidden');

                        $('.remove-link').addClass('hidden');
                        $('.open-remove-select').removeClass('hidden');
                    }
                    const classList = $('#detailCalendar .header').attr('class');
                    const role_type = classList.replace('header', '').trim();
                    if(info.role_type !== role_type) {
                        $('.no-repetition-event').addClass('hidden');
                        $('.repetition-event').addClass('hidden');
                    }

                    $('.item').removeClass('selected');
                    $('.item').removeClass('active');
                }
            }).modal('show');

            $('.ui.dropdown.edit-select').dropdown();

            subsidiesSwitching();
        });

        $(document).on('click', '.open-remove-select', function() {
            $(this).addClass('hidden');
            $('.select-remove-type-style').removeClass('hidden');
        });

        $(document).on('change', '.select-remove-type-style', function() {
            $('.confirm-remove').removeClass('hidden');
        });

        $(document).on('click', 'input[name="removal-conditions"]',  function() {
            $('input[name="removal-conditions"]').not(this).prop('checked', false);
        });

        function subsidiesSwitching() {
            if($('.edit-calendar-inputs_category').eq(1).val() == 7) {
                $('.subsidies').eq(1).css('display', 'block');
            } else {
                $('.subsidies').css('display', 'none');
            }
        }

        $(document).on('change', '.edit-calendar-inputs_category', function() {
            subsidiesSwitching();
        });
    </script>
</x-layout>
