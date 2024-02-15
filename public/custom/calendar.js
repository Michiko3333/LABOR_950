class Calendar {
    element;
    events = [];
    start = 0;
    options = {};
    default_options = {
        date: Date.now(),
        current_date: Date.now(),
        title_date: 'YYYY年MM月'
    };
    constructor(id, events, options = {}) {
        this.element = document.getElementById(id);
        this.events = events;
        this.options = {
            ...this.default_options,
            ...options
        };
        const dateObj = this._createData();
        this.render(dateObj);
    }

    _createData() {
        const startDayOfWeek = this.start;
        const currentDate = new Date(this.options.current_date);
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth() + 1;

        const startDate = new Date(year, month - 1, 1);
        const endDate = new Date(year, month, 0);
        const endDayCount = endDate.getDate();
        const startDay = startDate.getDay();

        let dayCount = 1 - startDay + startDayOfWeek;
        if (dayCount > 1) {
            dayCount -= 7;
        }

        const calendar = [];
        for (let w = 0; w < 6; w++) {
            const week = [];
            for (let d = 0; d < 7; d++) {
                const dt = this._dateObject(startDate, dayCount);
                week.push(dt);
                dayCount++;
            }
            calendar.push(week);
        }
        return calendar;
    }

    _dateObject(originDate, count) {
        const dt = new Date(originDate);
        dt.setDate(dt.getDate() - 1 + count);
        return dt;
    }

    _truncateDate(date) {
        if (date) {
            return new Date(date.getFullYear(), date.getMonth(), date.getDate());
        }
        return date;
    }

    _checkStartDate(start, target) {
        return start.getFullYear() == target.getFullYear() &&
            start.getMonth() == target.getMonth() &&
            start.getDate() == target.getDate();
    }
    _convertHexToRGB(hex) {
        if (hex.slice(0, 1) !== '#') {
            throw new Error('Hex must start with #')
        }
        if (hex.length !== 4 && hex.length !== 7) {
            throw new Error('Hex must be 4 or 7 characters')
        }

        const hex6Digits =
            hex.length == 4 ? '#' +
                hex.slice(1, 2) +
                hex.slice(1, 2) +
                hex.slice(2, 3) +
                hex.slice(2, 3) +
                hex.slice(3, 4) +
                hex.slice(3, 4)
                : hex

        return [
            hex6Digits.slice(1, 3),
            hex6Digits.slice(3, 5),
            hex6Digits.slice(5, 7)
        ]
            .map((color) => parseInt(color, 16));
    }
    _getTextColor(backgroundColor) {
        const [red, green, blue] = this._convertHexToRGB(backgroundColor);
        const brightness = Math.floor((parseInt(red, 16) * 0.299) + (parseInt(green, 16) * 0.587) + (parseInt(blue, 16) * 0.114));
        return brightness >= 140 ? '#000000' : '#FFFFFF';
    }

    _getNumber(arr, num) {
        const indexes = arr.map(obj => obj.index);
        let count = 0;
        let currentNumber = num;

        while (indexes.includes(currentNumber)) {
            count++;
            currentNumber++;
        }

        return count;
    }

    _formatDate(date, format) {
        format = format.replace(/YYYY/, date.getFullYear());
        format = format.replace(/MM/, date.getMonth() + 1);
        format = format.replace(/DD/, date.getDate());
        return format;
    }

    nextMonth() {
        this.options.current_date.setMonth(this.options.current_date.getMonth() + 1);
        const dateObj = this._createData();
        this.render(dateObj);
    }

    previousMonth() {
        this.options.current_date.setMonth(this.options.current_date.getMonth() - 1);
        const dateObj = this._createData();
        this.render(dateObj);
    }

    render(dateObj) {
        // 日時と母体要素を作成
        const currentDate = new Date(this.options.current_date);
        const table = document.createElement('div');
        table.classList.add('calendar-component');

        // コントロールエリアを作成
        const control = document.createElement('div');
        control.classList.add('calendar-component-control');

        const texts = document.createElement('div');
        texts.classList.add('calendar-component-control__date');
        texts.innerText = this._formatDate(currentDate, this.options.title_date);
        control.appendChild(texts);
        table.appendChild(control);

        // 曜日ヘッダーを作成
        const startDayOfWeek = this.start;
        const daysOfWeek = ['日', '月', '火', '水', '木', '金', '土'];
        const reorderedDaysOfWeek = [...daysOfWeek.slice(startDayOfWeek), ...daysOfWeek.slice(0, startDayOfWeek)];

        const head = document.createElement('div');
        head.classList.add('calendar-component-head');

        reorderedDaysOfWeek.forEach(wn => {
            const div = document.createElement('div');
            if (wn == '日') div.classList.add('sun');
            if (wn == '土') div.classList.add('sat');
            div.innerText = wn;
            div.classList.add('calendar-component-head__day');
            head.appendChild(div);
        });
        table.appendChild(head);

        // カレンダー内部を作成
        const event_pos_state = [];
        for (let i = 0; i < dateObj.length; i++) {
            const days = dateObj[i];
            const row = document.createElement('div');
            row.classList.add('calendar-component-row');

            // 日ごとに処理
            for (let j = 0; j < days.length; j++) {
                const day = days[j];
                const col = document.createElement('div');
                col.classList.add('calendar-component-row__day');

                const time = document.createElement('time');
                time.classList.add('cc-head');
                time.setAttribute('datetime', day.toLocaleDateString('sv-SE'));
                time.innerText = day.getDate();

                // イベントリスト
                const events = document.createElement('div');
                events.classList.add('cc-events');

                const event_list = this.events.filter(e => {
                    const start = new Date(e.start);
                    return this._checkStartDate(start, day)
                });

                let current_event_num = 0;
                for (let l = 0; l < event_list.length; l++) {
                    const event = event_list[l];
                    const event_div = document.createElement('div');
                    event_div.classList.add('cc-events__item');

                    const exists_previous_event = event_pos_state.filter(e => {
                        return e.end >= day && e.start < day;
                    });
                    if (exists_previous_event.length) {
                        const num = this._getNumber(exists_previous_event, Math.max(l, current_event_num));
                        current_event_num = num + 1 + current_event_num;
                        for (let n = 0; n < num; n++) {
                            const d = document.createElement('div');
                            d.classList.add('cc-events__ghost');
                            events.appendChild(d);
                        }
                    }

                    const p = document.createElement('p');
                    p.innerText = event.title;
                    if (event.hasOwnProperty('color')) {
                        const font_color = this._getTextColor(event.color);
                        event_div.style.background = event.color;
                        event_div.style.color = font_color;
                    }

                    // 期間指定がある場合
                    if (event.hasOwnProperty('end')) {
                        const start = new Date(event.start);
                        const end = new Date(event.end);

                        let diff_days_tmp = parseInt((end - start) / 1000 / 60 / 60 / 24) + 1;
                        const diff_by_week = days.length - j;
                        const left = diff_days_tmp - diff_by_week;

                        if (diff_days_tmp == 1) {
                            event_div.classList.add('single');
                            event_div.style.background = 'transparent';
                            event_div.style.color = '#2F3E32';
                            const dot = document.createElement('div');
                            dot.classList.add('dot');
                            dot.style.borderColor = event.color;
                            event_div.appendChild(dot);
                        } else {
                            event_div.classList.add('multi');
                        }

                        if (!event.parent) {
                            event_div.classList.add('start');
                        }

                        if (left > 0) {
                            this.events.push({
                                ...event,
                                start: new Date(start.getFullYear(), start.getMonth(), start.getDate() + left),
                                parent: true
                            });
                            end.setDate(end.getDate() - left);
                            diff_days_tmp = parseInt((end - start) / 1000 / 60 / 60 / 24) + 1;
                        }

                        const diff_days = diff_days_tmp;
                        event_div.style.width = 'calc(' + (100 * diff_days) + '% + ' + diff_days + 'px)';

                        event_pos_state.push({
                            start: new Date(start.getFullYear(), start.getMonth(), start.getDate()),
                            end: new Date(end.getFullYear(), end.getMonth(), end.getDate()),
                            index: Math.max(l, current_event_num - 1),
                            title: event.title,
                        });
                    } else {
                        event_div.classList.add('single');
                        event_div.style.background = 'transparent';
                        event_div.style.color = '#2F3E32';
                        const dot = document.createElement('div');
                        dot.classList.add('dot');
                        dot.style.borderColor = event.color;
                        event_div.appendChild(dot);
                    }

                    event_div.appendChild(p);
                    events.appendChild(event_div);
                }

                if (currentDate.getMonth() !== day.getMonth()) col.classList.add('other-month');
                col.appendChild(time);
                col.appendChild(events);
                row.appendChild(col);
            }
            table.appendChild(row);
        }

        // 母体を出力
        this.element.innerHTML = '';
        this.element.appendChild(table);
    }
}
