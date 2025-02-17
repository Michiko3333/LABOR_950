class AttendanceList extends PowerTableList {
    constructor(options) {
        super(options);
        this.sum_working_days= [
            'working_off_days',
            'working_legal_days',
        ];
        this.sum_overtime = [
            'overtime_early',
            'overtime_late',
            'overtime_low',
            'overtime_normal',
            'overtime_off'
        ];
        this.sum_holidays = [
            'holidays_special',
            'holidays_comp',
            'holidays_legal',
            'holidays_public',
            'holidays_transfered'
        ];
        this.setShowList = () => {};

        this.successSubmit = () => {};
        this.errorSubmit = () => {};
    }

    // override
    afterSubmit(bool, err = null) {
        if (bool) {
            this.successSubmit();
        } else {
            this.errorSubmit(err);
        }
    }

    onCreateCell(parent, key, item) {
        if (this.columns_map[key]['type'] === 'label') {
            if (key == 'working_days') {
                const [td, label] = super.onCreateCell(parent, key, item);

                let sum = 0;
                this.sum_working_days.forEach(k => {
                    if (Object.keys(item).includes(k)) {
                        sum += item[k];
                    }
                });

                label.textContent = sum;
                label.style.fontWeight = 'bold';
                td.dataset.amount = label.textContent;
            } else if (key == 'overtime') {
                const [td, label] = super.onCreateCell(parent, key, item);

                let sum = 0;
                this.sum_overtime.forEach(k => {
                    if (Object.keys(item).includes(k)) {
                        sum += item[k];
                    }
                });

                label.textContent = sum;
                label.style.fontWeight = 'bold';
                td.dataset.amount = label.textContent;
            } else if (key == 'holidays') {
                const [td, label] = super.onCreateCell(parent, key, item);
                let sum = 0;
                this.sum_holidays.forEach(k => {
                    if (Object.keys(item).includes(k)) {
                        sum += item[k];
                    }
                });
                label.textContent = sum;
                label.style.fontWeight = 'bold';
                td.dataset.amount = label.textContent;
            } else if (key == 'month') {
                const [td, label] = super.onCreateCell(parent, key, item);
                const date = new Date(item[key]);
                const year = date.getFullYear();
                const month = date.getMonth() + 1;
                const formattedDate = `${year}年${month}月`;
                label.textContent = formattedDate;
                td.dataset.amount = item[key];
            } else {
                super.onCreateCell(parent, key, item);
            }
        } else if (this.columns_map[key]['type'] === 'number') {
            const [td, input, label] = this.baseInputCell(key, item);
            input.type = 'number';
            input.min = 0;
            input.max = 99999;

            if (this.sum_working_days.includes(key)) {
                input.addEventListener('change', (event) => {
                    this.sumCells(event.target.dataset.id, 'working_days', this.sum_working_days);
                });
            } else if (this.sum_overtime.includes(key)) {
                input.addEventListener('change', (event) => {
                    this.sumCells(event.target.dataset.id, 'overtime', this.sum_overtime);
                });
            } else if (this.sum_holidays.includes(key)) {
                input.addEventListener('change', (event) => {
                    this.sumCells(event.target.dataset.id, 'holidays', this.sum_holidays);
                });
            }

            parent.appendChild(td);
        }
    }

    onRefreshed() {
        this.setShowList();
    }

    // override
    onRefreshRow() {
        const filterBtn = document.getElementById('pt-filter-button');
        if (this.isEdit) {
            filterBtn.disabled = true;
        } else {
            filterBtn.disabled = false;
        }
    }

    sumCells(id, label_key, array) {
        let element = document.getElementById(this.elementIds.wrapper);
        for (let i = 0; i < this.item_nodes.length; i++) {
            const el = this.item_nodes[i];
            if (el.dataset.id == id) {
                element = el;
                break;
            }
        }
        let sum = 0;
        array.forEach(k => {
            const selected = element.querySelector('input[data-id="' + id + '"][data-key="' + k + '"]');
            sum += selected.value ?  parseFloat(selected.value) : 0;
        });

        const total = element.querySelector('div.label[data-id="' + id + '"][data-key="' + label_key + '"]');
        total.textContent = sum;
    }
}
