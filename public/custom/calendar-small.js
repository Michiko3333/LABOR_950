class CalendarSmall extends HTMLElement {
    constructor() {
        super();
        this.root = this.attachShadow({ mode: "closed" });
    }

    get date() {
        return this.getAttribute('date');
    }

    get attention() {
        return this.getAttribute('attention') ?? null;
    }

    get start() {
        return this.getAttribute('start') ?? 0;
    }

    get color() {
        return this.getAttribute('color') ?? '#2F323E';
    }


    _render() {
        const startDayOfWeek = this.start;
        const daysOfWeek = ['日', '月', '火', '水', '木', '金', '土'];
        const reorderedDaysOfWeek = [...daysOfWeek.slice(startDayOfWeek), ...daysOfWeek.slice(0, startDayOfWeek)];

        const thead = document.createElement('thead');
        const thead_tr = document.createElement('tr');
        reorderedDaysOfWeek.forEach(wn => {
            const th = document.createElement('th');
            if (wn == '日') th.classList.add('sun');
            if (wn == '土') th.classList.add('sat');
            th.innerText = wn;
            thead_tr.appendChild(th);
        });
        thead.appendChild(thead_tr);
        const thead_template = thead.outerHTML;

        const date = new Date(this.date);
        const year = date.getFullYear();
        const month = date.getMonth() + 1;

        const startDate = new Date(year, month - 1, 1);
        const endDate = new Date(year, month, 0);
        const endDayCount = endDate.getDate();
        const startDay = startDate.getDay();

        let dayCount = 1 - startDay + startDayOfWeek;
        if (dayCount > 1) {
            dayCount -= 7;
        }

        const calendar = [];
        const attention_date = new Date(this.attention);

        const attention = {
            date: attention_date.getDate(),
            month: date.getMonth() + 1
        };

        for (let w = 0; w < 6; w++) {
            const week = [];
            for (let d = 0; d < 7; d++) {
                if (dayCount <= 0) {
                    week.push('');
                } else if (dayCount <= endDayCount) {
                    week.push(dayCount);
                } else {
                    week.push('');
                }
                dayCount++;
            }
            calendar.push(week);
        }

        const tbody = document.createElement('tbody');
        calendar.forEach(wk => {
            const tr = document.createElement('tr');
            wk.forEach(n => {
                const td = document.createElement('td');
                if (n) {
                    const inner = document.createElement('div');
                    inner.innerText = n;
                    inner.classList.add('inner')
                    if (this.attention && attention.date === n) inner.classList.add('attention');
                    td.appendChild(inner);
                } else {
                    const spacer = document.createElement('div');
                    spacer.classList.add('space');
                    td.appendChild(spacer);
                }
                tr.appendChild(td);
            });
            tbody.appendChild(tr);
        });
        const tbody_template = tbody.outerHTML;

        const custom_style = `
            <style type="text/css">
                .calendar-parts-wrapper th,
                .calendar-parts-wrapper td {
                    color: ${this.color};
                }
                .calendar-parts-wrapper div.inner {
                    color: ${this.color};
                }
            </style>
        `;

        const template = `
        ${custom_style}
        ${this.loadExternalCSS('./custom/calendar-small.css')}
        <div class="calendar-parts-wrapper">
            <table>
                ${tbody_template}
                ${thead_template}
            </table>
        </div>`;

        this.root.innerHTML = template;
    }

    connectedCallback() {
        this._render();
    }

    static get observedAttributes() {
        return ['date', 'attention', 'start', 'color'];
    }

    attributeChangedCallback(attr, oldValue, newValue) {
        if (oldValue === newValue) return;
        this._render();
    }

    loadExternalCSS(path) {
        const linkElement = document.createElement("link");
        linkElement.rel = "stylesheet";
        linkElement.type = "text/css";
        linkElement.href = path;
        return linkElement.outerHTML;
    }
}

customElements.define('calendar-small', CalendarSmall);
