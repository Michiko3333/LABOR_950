class WageList {
    constructor(base_uri, post_uri, filter_showlist_uri, filter_load_uri, filter_save_uri, filter_remove_uri, insurance_get_uri, insurance_save_uri, id) {
        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();

        this.currentYear = currentYear;

        this.rowHeight = 32;
        this.totalRows = 0;
        this.visibleRows = 10;
        this.startIndex = 0;

        this.spacerTop;
        this.spacerBottom;
        this.resize;

        this.ticking = false;
        this.isEdit = false;

        this.id = id;
        this.wrapper = document.getElementById(this.id);
        this.height_container = document.getElementById('height-container');
        this.data = [];
        this.columns_map = [];
        this.salary_columns = [];
        this.allowance_columns = [];
        this.overtime_columns = [];
        this.item_nodes = [];
        this.dirtyVal = [];
        this.dirtyName = [];
        this.dirtyRemove= [];

        this.base_uri = base_uri;
        this.post_uri = post_uri;
        this.filter_showlist_uri = filter_showlist_uri;
        this.filter_load_uri = filter_load_uri;
        this.filter_save_uri = filter_save_uri;
        this.filter_remove_uri = filter_remove_uri;
        this.insurance_get_uri = insurance_get_uri;
        this.insurance_save_uri = insurance_save_uri;

        this.eventId = {
            edit: 'wage-edit-button',
            cancel: 'wage-cancel-button',
            submit: 'wage-submit-button',
            filter: 'wage-filter-button'
        };

        this.sumAllowance = [];

        this.labor_insurances = [];
        this.social_insurances = [];

        this.sortKey = '';
        this.sortOrder = 1;

        this.showFilter = () => {};
        this.successEvent = () => {};
        this.onAddColumn = (section, position) => {};
        this.onEditColumn = (key, name) => {}

        this.wrapper.addEventListener('scroll', (e) => {
            if (!this.ticking) {
                window.requestAnimationFrame(() => {
                    const scrollTop = this.wrapper.scrollTop;
                    const newIndex = Math.floor(scrollTop / this.rowHeight);
                    if (newIndex !== this.startIndex) {
                        this.startIndex = newIndex;
                        this.rows();
                    }
                    this.ticking = false;
                });
                this.ticking = true;
            }
        });

        this.resize = window.addEventListener('resize', () => {
            this.visibleRows = Math.floor(this.wrapper.offsetHeight / 32);            
        });
        
        const el_filterBtn = document.getElementById(this.eventId.filter);
        el_filterBtn.addEventListener('click', () => {
            this.showFilter();
        });
    }

    get(url) {
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);
            xhr.onload = () => {
                if (xhr.status >= 200 && xhr.status < 300) {
                    resolve(xhr.responseText);
                } else {
                    reject(new Error(`Request failed with status: ${xhr.status}`));
                }
            };
            xhr.onerror = () => reject(new Error("Network error occurred"));
            xhr.send();
        });
    }
    submit(url, data) {
        return new Promise((resolve, reject) => {
            const qs = document.getElementsByName('csrf-token');
            const token = qs[0].content;
            const xhr = new XMLHttpRequest();
            xhr.open("POST", url, true);
            xhr.setRequestHeader('X-CSRF-Token', token);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onload = () => {
                if (xhr.status >= 200 && xhr.status < 300) {
                    resolve(xhr.responseText);
                } else {
                    reject(new Error(`Request failed with status: ${xhr.status}`));
                }
            };
            xhr.onerror = () => reject(new Error("Network error occurred"));
            xhr.send(data);
        });
    }

    post(url, data) {
        return new Promise((resolve, reject) => {
            const qs = document.getElementsByName('csrf-token');
            const token = qs[0].content;
            const xhr = new XMLHttpRequest();
            xhr.open("POST", url, true);
            xhr.setRequestHeader('X-CSRF-Token', token);
            xhr.onload = () => {
                if (xhr.status >= 200 && xhr.status < 300) {
                    resolve(xhr.responseText);
                } else {
                    reject(new Error(`Request failed with status: ${xhr.status}`));
                }
            };
            xhr.onerror = () => reject(new Error("Network error occurred"));
            xhr.send(data);
        });
    }

    load(isReady = false) {
        const url = new URL(this.base_uri);
        const formData = new FormData(document.forms.wage_filter);
        for (let d of formData.entries()) { 
            url.searchParams.append(d[0], d[1]);
        }
        [...url.searchParams.keys()].forEach(key => {
            if (!url.searchParams.get(key)) {
                url.searchParams.delete(key);
            }
        });
        const target = url.toString();
        
        this.get(target).then(d => {
            const data = JSON.parse(d);
            this.data = data['data'];
            this.columns_map = data['columns_map'];
            this.salary_columns = data['salary_columns'];
            this.allowance_columns = data['allowance_columns'];
            this.overtime_columns = data['overtime_columns'];
            this.createNodes();
            this.startIndex = 0;            
            this.totalRows = this.item_nodes.length;
            if (isReady) this.ready();
            this.rows();
            this.setSortHeder();
        })
    }

    rows() {
        const wageList = document.getElementById('wage-list');
        const wageListBody = document.getElementById('wage-list-body');
        const WageListHeader = document.getElementById('wage-list-header');
        wageListBody.innerHTML = "";
        const endIndex = Math.min(this.startIndex + this.visibleRows, this.totalRows);
        this.spacerTop.style.height = `${this.startIndex * this.rowHeight}px`;
        this.spacerBottom.style.height =
            `${(this.totalRows - endIndex) * this.rowHeight}px` - WageListHeader.height;
        if (this.item_nodes.length > 0) {
            for (let i = 0; i < this.visibleRows; i++) {
                const currentIndex = this.startIndex + i;
                if (currentIndex < this.totalRows) {
                    const row = this.item_nodes.slice(currentIndex) ?? [];
                    if (row.length > 0) wageListBody.appendChild(...row);
                    const viewElements = wageListBody.querySelectorAll('.view');
                    const InputElements = wageListBody.querySelectorAll('.edit-input');
                    const headerBtns = wageList.querySelectorAll('button.plus-btn');
                    if (this.isEdit) {
                        viewElements.forEach(element => {
                            element.classList.add('hidden');
                        });
                        InputElements.forEach(element => {
                            element.classList.remove('hidden');
                        });
                        headerBtns.forEach(element => {
                            element.classList.remove('hidden');
                        });
                    } else {
                        viewElements.forEach(element => {
                            element.classList.remove('hidden');
                        });
                        InputElements.forEach(element => {
                            element.classList.add('hidden');
                        });
                        headerBtns.forEach(element => {
                            element.classList.add('hidden');
                        });
                    }
                }
            }
        }
        if (this.isEdit) {
            WageListHeader.classList.add('edit');
        } else {
            WageListHeader.classList.remove('edit');
        }
        this.setShowList();
    }

    setShowList() {
        const wrapper = document.getElementById('wage-list');
        const showlist_wrapper = document.getElementById('filter-showlist-wrapper');
        const inputs = showlist_wrapper.querySelectorAll('input[type="checkbox"]');        
        for (let i = 0; i < inputs.length; i++) {
            const checkbox = inputs[i];
            const targetKey = checkbox.dataset.key;
            if (checkbox.checked == true) {
                const keys = wrapper.querySelectorAll('td[data-key="' + targetKey + '"], th[data-key="' + targetKey + '"]');
                keys.forEach(el => {
                    el.classList.remove('hidden');
                });
            } else {
                const keys = wrapper.querySelectorAll('td[data-key="' + targetKey + '"], th[data-key="' + targetKey + '"]');
                keys.forEach(el => {
                    el.classList.add('hidden');
                });
            }
        }
    }

    ready() {
        this.totalRows = this.item_nodes.length;
        this.visibleRows = Math.floor(this.wrapper.offsetHeight / 32);
        this.startIndex = 0;
        this.spacerTop = document.createElement("div");
        this.spacerBottom = document.createElement("div");
        this.spacerTop.style.height = "0px";
        this.spacerBottom.style.height = `${(this.totalRows - this.visibleRows) * this.rowHeight}px`;
        this.spacerTop.style.visibility = this.spacerBottom.style.visibility = "hidden";
        this.spacerTop.style.pointerEvents = "none";
        this.spacerBottom.style.pointerEvents = "none";
        this.wrapper.prepend(this.spacerTop);
        this.wrapper.appendChild(this.spacerBottom);

        // Edit event
        const el_edit = document.getElementById(this.eventId.edit);
        el_edit.addEventListener('click', e => {
            this.isEdit = true;
            el_edit.style.display ='none';
            document.getElementById(this.eventId.cancel).style.display ='inline';
            document.getElementById(this.eventId.submit).style.display ='inline';
            this.rows();
        });

        // Cancel event
        const el_cancel = document.getElementById(this.eventId.cancel);
        el_cancel.addEventListener('click', e => {
            this.isEdit = false;
            el_cancel.style.display ='none';
            document.getElementById(this.eventId.edit).style.display ='inline';
            document.getElementById(this.eventId.submit).style.display ='none';
            this.createNodes();
            this.rows();
            this.dirtyVal = [];
            this.dirtyName= [];
            this.dirtyRemove = [];
        });
        // Submit event
        const el_submit = document.getElementById(this.eventId.submit);
        el_submit.addEventListener('click', e => {          
            const columns = this.dirtyVal.filter(f => f.section == 'column');
            const column_res = {};
            columns.forEach(item => {
                const { id, key, val, section } = item;
                if (!column_res[id]) {
                    column_res[id] = {};
                }
                column_res[id][key] = Number(val);
            });

            const salaries = this.dirtyVal.filter(f => f.section == 'salary');
            const salaries_res = {};
            salaries.forEach(item => {
                const { id, key, val, section } = item;
                if (!salaries_res[id]) {
                    salaries_res[id] = {};
                }
                salaries_res[id][key] = Number(val);
            });            

            const allowances = this.dirtyVal.filter(f => f.section == 'allowance');
            const allowances_res = {};
            allowances.forEach(item => {
                const { id, key, val, section } = item;
                if (!allowances_res[id]) {
                    allowances_res[id] = {};
                }
                allowances_res[id][key] = Number(val);
            });
            const overtimes = this.dirtyVal.filter(f => f.section == 'overtime');
            const overtimes_res = {};
            overtimes.forEach(item => {
                const { id, key, val, section } = item;
                if (!overtimes_res[id]) {
                    overtimes_res[id] = {};
                }
                overtimes_res[id][key] = Number(val);
            });

            const formData = new FormData(document.forms.wage_filter);
            const target = [];
            const amount = [];
            const comparison = [];
            let conditions = {};
            for (let d of formData.entries()) { 
                if (/^cond_target\[\]$/.test(d[0])) {
                    target.push(d[1]);
                } else if (/^cond_amount\[\]$/.test(d[0])) {
                    amount.push(d[1]);
                } else if (/^cond_comparison\[\]$/.test(d[0])) {
                    comparison.push(d[1]);
                } else {
                    conditions[d[0]] = d[1];
                }
            }
            let details = [];
            for (let i = 0; i < target.length; i++) {
                const target_val = target[i];
                const amount_val = amount[i];
                const comparison_val = comparison[i];
                details.push({
                    name: target_val,
                    amount: amount_val,
                    comparison: comparison_val
                });
            }

            const data = {
                column: column_res,
                salary: salaries_res,
                allowance: allowances_res,
                overtime: overtimes_res,
                change_name: this.dirtyName,
                remove_name: this.dirtyRemove,
                conditions: {
                    conditions: conditions,
                    detail: details
                }
            }            

            this.submit(this.post_uri, JSON.stringify(data)).then(r => {
                this.isEdit = false;
                el_cancel.style.display ='none';
                document.getElementById(this.eventId.edit).style.display ='inline';
                document.getElementById(this.eventId.submit).style.display ='none';
                this.dirtyVal = [];
                this.dirtyName = [];
                this.dirtyRemove = [];
                this.load();
                this.successEvent();
            });
        });
    }

    onFocusInput(e) {
        e.target.readOnly = false;
        const val = e.target.value.replace(/,/g, '');
        e.target.value = val;
    }

    onBlurInput = (e) => {
        setTimeout(() => {
            e.target.value = e.target.value.replace(/[^0-9]/g, '');
            if (e.target.value != '') {
                e.target.value = parseInt(e.target.value, 10).toLocaleString('ja-JP');
            }
        }, 0);
        e.target.readOnly = true;
    }

    onChangeInput = (e) => {
        const el = e.target;
        const id = el.dataset.id;
        const section = el.dataset.section;
        const key = el.dataset.key;

        const idx = this.dirtyVal.findIndex(d => {
            return d.id == id && d.key == key
        });

        if (idx >= 0) {
            this.dirtyVal[idx].val = el.value;
        } else {
            this.dirtyVal.push({
                id: id,
                key: key,
                val: el.value,
                section: section
            });
        }
    }

    createNodes() {
        this.item_nodes = [];
        const wageListBody = document.getElementById('wage-list-body');
        wageListBody.innerHTML = "";
        const wageListHeader = document.getElementById('wage-list-header');
        wageListHeader.innerHTML = '';
        const columnKeys = Object.keys(this.columns_map);

        // ヘッダー生成
        for (let i = 0; i < columnKeys.length; i++) {
            const key = columnKeys[i];
            const item = this.columns_map[key];

            if (item['type'] === 'array') {
                let arrKeys = [];
                let arrTarget = [];
                switch (key) {
                    case 'salary_values':
                        arrKeys = Object.keys(this.salary_columns);
                        arrTarget = this.salary_columns;
                        break;
                    case 'allowance_values':
                        arrKeys = Object.keys(this.allowance_columns);
                        arrTarget = this.allowance_columns;
                        break;
                    case 'overtime_values':
                        arrKeys = Object.keys(this.overtime_columns);
                        arrTarget = this.overtime_columns;
                        break;
                    default:
                        break;
                }
                for (let j = 0; j < arrKeys.length; j++) {
                    const arrKey = arrKeys[j];
                    const arrName = arrTarget[arrKey];
                    const th = document.createElement('th');
                    const span = document.createElement('span');
                    const btn = document.createElement('button');
                    const plus = document.createElement('i');
                    span.textContent = arrName;
                    th.dataset.name = arrName;
                    th.dataset.key = arrName;
                    th.dataset.parent = key;
                    th.classList.add('sticky');
                    btn.classList.add('mini', 'ui', 'button', 'icon', 'hidden', 'plus-btn');
                    plus.classList.add('pen', 'icon');
                    btn.addEventListener('click', e => {
                        this.onEditColumn(key, arrName);
                    });
                    btn.appendChild(plus);
                    th.appendChild(btn);
                    th.appendChild(span);
                    wageListHeader.appendChild(th);

                    th.addEventListener('click', e => {
                        if (this.isEdit) return;
                        if (this.sortKey == arrName) {
                            if (this.sortOrder == 1) {
                                this.setSort(arrName, 0);
                            } else {
                                this.setSort(arrName, 1);
                            }
                        } else {
                            this.setSort(arrName, 1);
                        }
                    });
                }
            } else {
                const th = document.createElement('th');
                const span = document.createElement('span');
                span.textContent = item['name'];
                th.dataset.key = item['key'];
                th.classList.add('sticky');
                if (item['width'] != null) {
                    th.style.minWidth = item['width'] + 'px';
                    th.style.width = item['width'] + 'px';
                    th.style.maxWidth = item['width'] + 'px';
                }
                wageListHeader.appendChild(th);

                const btn = document.createElement('button');
                const plus = document.createElement('i');
                switch (item['key']) {
                    case 'total_amount':
                        btn.classList.add('mini', 'ui', 'button', 'icon', 'primary', 'hidden', 'plus-btn');
                        plus.classList.add('plus', 'icon');
                        btn.appendChild(plus);
                        th.appendChild(btn);
                        btn.addEventListener('click', e => {                            
                            this.onAddColumn('salary', 'overtime_label');
                        });
                        break;
                    case 'overtime_label':
                        btn.classList.add('mini', 'ui', 'button', 'icon', 'primary', 'hidden', 'plus-btn');
                        plus.classList.add('plus', 'icon');
                        btn.appendChild(plus);
                        th.appendChild(btn);
                        btn.addEventListener('click', e => {
                            this.onAddColumn('overtime', 'allowance_label');
                        });
                        break;
                    case 'allowance_label':
                        btn.classList.add('mini', 'ui', 'button', 'icon', 'primary', 'hidden', 'plus-btn');
                        plus.classList.add('plus', 'icon');
                        btn.appendChild(plus);
                        th.appendChild(btn);
                        btn.addEventListener('click', e => {
                            this.onAddColumn('allowance', 'absence_deduction');
                        });
                        break;
                    default:
                        break;
                }
                th.addEventListener('click', e => {
                    if (this.isEdit) return;
                    if (this.sortKey == key) {
                        if (this.sortOrder == 1) {
                            this.setSort(key, 0);
                        } else {
                            this.setSort(key, 1);
                        }
                    } else {
                        this.setSort(key, 1);
                    }
                });
                th.appendChild(span);
            }
        }

        for (let i = 0; i < this.data.length; i++) {
            const item = this.data[i];            
            const tr = document.createElement('tr');
            tr.dataset.id = item['id'];            
            for (let j = 0; j < columnKeys.length; j++) {
                const key = columnKeys[j];
                switch (key) {
                    case 'salary_values':
                        const salary_data = this.sortSalaryDataByColumns(item[key], this.salary_columns);
                        const salaryKeys = Object.keys(salary_data);
                        for (let t = 0; t < salaryKeys.length; t++) {                            
                            const sk = salaryKeys[t];
                            const obj = salary_data[sk];
                            const salary_td = document.createElement('td');
                            const salary_input = document.createElement('input');
                            salary_input.classList.add('edit-input');
                            salary_input.type = "text";
                            salary_input.dataset.id = item['id'];
                            salary_input.dataset.section = 'salary';
                            salary_input.dataset.key = obj.name;
                            salary_input.readOnly = true;
                            if (obj['amount'] != null) salary_input.value = parseInt(obj['amount'], 10)
                                .toLocaleString('ja-JP');
                            else salary_input.value = 0;
                            salary_input.addEventListener('focus', e => { this.onFocusInput(e) });
                            salary_input.addEventListener('blur', e => { this.onBlurInput(e) });
                            salary_input.addEventListener('change', e => { this.onChangeInput(e) });
                            salary_input.addEventListener('change', (e) => { this.SumWhenChanged(e); });
                            salary_td.appendChild(salary_input);
                            tr.appendChild(salary_td);

                            const salary_label = document.createElement('div');
                            salary_label.classList.add('view');
                            salary_label.dataset.id = item['id'];
                            if (obj['amount'] != null) salary_label.textContent = parseInt(obj['amount'], 10).toLocaleString('ja-JP');
                            else salary_label.textContent = 0;
                            salary_td.appendChild(salary_label);
                            salary_td.dataset.amount = salary_input.value;
                            salary_td.dataset.section = 'salary';
                            salary_td.dataset.key = obj.name;
                        }
                        break;
                    case 'allowance_values':
                        const allowance_data = this.sortSalaryDataByColumns(item[key], this.allowance_columns);
                        const allowanceKeys = Object.keys(allowance_data);
                        for (let t = 0; t < allowanceKeys.length; t++) {
                            const sk = allowanceKeys[t];
                            const obj = allowance_data[sk];
                            const allowance_td = document.createElement('td');
                            const allowance_input = document.createElement('input');
                            allowance_input.classList.add('edit-input');
                            allowance_input.type = "text";
                            allowance_input.dataset.id = item['id'];
                            allowance_input.dataset.section = 'allowance';
                            allowance_input.dataset.key = obj.name;
                            allowance_input.readOnly = true;
                            if (obj['amount'] != null) allowance_input.value = parseInt(obj['amount'], 10)
                                .toLocaleString('ja-JP');
                            else allowance_input.value = 0;
                            allowance_input.addEventListener('focus', e => { this.onFocusInput(e) });
                            allowance_input.addEventListener('blur', e => { this.onBlurInput(e) });
                            allowance_input.addEventListener('change', e => { this.onChangeInput(e) });
                            allowance_input.addEventListener('change', (e) => { this.SumWhenChanged(e); });
                            allowance_td.appendChild(allowance_input);
                            tr.appendChild(allowance_td);

                            const allowance_label = document.createElement('div');
                            allowance_label.classList.add('view');
                            allowance_label.dataset.id = item['id'];
                            if (obj['amount'] != null) allowance_label.textContent = parseInt(obj['amount'], 10).toLocaleString('ja-JP');
                            else allowance_label.textContent = 0;
                            allowance_td.appendChild(allowance_label);
                            allowance_td.dataset.amount = allowance_input.value;
                            allowance_td.dataset.key = obj.name;
                            allowance_td.dataset.section = 'allowance';
                        }
                        break;
                    case 'overtime_values':
                        const overtime_data = this.sortSalaryDataByColumns(item[key], this.overtime_columns);
                        const overtimeKeys = Object.keys(overtime_data);
                        for (let t = 0; t < overtimeKeys.length; t++) {
                            const sk = overtimeKeys[t];
                            const obj = overtime_data[sk];
                            const overtime_td = document.createElement('td');
                            const overtime_input = document.createElement('input');
                            overtime_input.classList.add('edit-input');
                            overtime_input.type = "text";
                            overtime_input.dataset.id = item['id'];
                            overtime_input.dataset.section = 'overtime';
                            overtime_input.dataset.key = obj.name;
                            overtime_input.readOnly = true;
                            if (obj['amount'] != null) overtime_input.value = parseInt(obj['amount'], 10)
                                .toLocaleString('ja-JP');
                            else overtime_input.value = 0;
                            overtime_input.addEventListener('focus', e => { this.onFocusInput(e) });
                            overtime_input.addEventListener('blur', e => { this.onBlurInput(e) });
                            overtime_input.addEventListener('change', e => { this.onChangeInput(e) });
                            overtime_input.addEventListener('change', (e) => { this.SumWhenChanged(e); });
                            overtime_td.dataset.section = 'overtime';
                            overtime_td.appendChild(overtime_input);
                            tr.appendChild(overtime_td);

                            const overtime_label = document.createElement('div');
                            overtime_label.classList.add('view');
                            overtime_label.dataset.id = item['id'];
                            if (obj['amount'] != null) overtime_label.textContent = parseInt(obj['amount'], 10).toLocaleString('ja-JP');
                            else overtime_label.textContent = 0;
                            overtime_td.appendChild(overtime_label);
                            overtime_td.dataset.amount = overtime_input.value;
                            overtime_td.dataset.key = obj.name;
                        }
                        break;
                    default:
                        const td = document.createElement('td');
                        if (this.columns_map[key]['type'] === 'number') {
                            const number_input = document.createElement('input');
                            number_input.classList.add('edit-input');
                            number_input.dataset.id = item['id'];
                            number_input.dataset.section = 'column';
                            number_input.dataset.key = key;
                            number_input.readOnly = true;
                            if (item[key] == '') item[key] = null;
                            if (item[key] != null) number_input.value = parseInt(item[key], 10)
                                .toLocaleString('ja-JP');
                            else number_input.value = 0;
                            number_input.addEventListener('focus', e => { this.onFocusInput(e) });
                            number_input.addEventListener('blur', e => { this.onBlurInput(e) });
                            number_input.addEventListener('change', e => { this.onChangeInput(e) });
                            number_input.addEventListener('change', (e) => { this.SumWhenChanged(e); });
                            td.appendChild(number_input);

                            const number_label = document.createElement('div');
                            number_label.classList.add('view');
                            number_label.dataset.id = item['id'];
                            if (item[key] != null) number_label.textContent = parseInt(item[key], 10).toLocaleString('ja-JP');
                            else number_label.textContent = 0;
                            td.appendChild(number_label);
                            td.dataset.key = key;
                            td.dataset.amount = number_input.value;

                        } else if (this.columns_map[key]['type'] === 'text') {
                            const text_input = document.createElement('input');
                            text_input.classList.add('edit-input');
                            text_input.dataset.id = item['id'];
                            text_input.dataset.section = 'column';
                            text_input.dataset.key = key;
                            text_input.addEventListener('change', e => { this.onChangeInput(e) });
                            if (item[key] == '') item[key] = null;
                            text_input.value = item[key];
                            td.appendChild(text_input);

                            const text_label = document.createElement('div');
                            text_label.classList.add('view');
                            text_label.dataset.id = item['id'];
                            text_label.textContent = item[key];
                            td.appendChild(text_label);
                            td.dataset.key = key;
                        } else {
                            const div = document.createElement('div');
                            div.classList.add('label');
                            div.dataset.id = item['id'];
                            div.dataset.key = key;                            
                            switch (key) {
                                case 'total_amount':
                                    div.textContent = this.comma(
                                        item.wage_base_amount + this.getSumArrType(item.salary_values) + this.getSumArrType(item.allowance_values) + this.getSumArrType(item.overtime_values)
                                    );
                                    div.style.fontWeight = 'bold';
                                    break;
                                case 'allowance_label':
                                    div.textContent = this.comma(this.getSumArrType(item.allowance_values));
                                    div.style.fontWeight = 'bold';
                                    break;
                                case 'overtime_label':
                                    div.textContent = this.comma(this.getSumArrType(item.overtime_values));
                                    div.style.fontWeight = 'bold';
                                    break;
                                case 'taxable_paymment_label':
                                    div.textContent = this.comma(item.taxable_paymment + item.non_taxable_paymment);
                                    div.style.fontWeight = 'bold';
                                    break;
                                case 'deduction_sum':
                                    let deduction_sum = 0;
                                    for (let d = 0; d < columnKeys.length; d++) {
                                        const c = this.columns_map[columnKeys[d]];
                                        if (c.calc !== 2) continue;
                                        let amount = item[columnKeys[d]];
                                        amount = amount ? amount : 0;
                                        deduction_sum += amount;
                                    }
                                    div.textContent = this.comma(deduction_sum);
                                    div.style.fontWeight = 'bold';
                                    break;
                                case 'wage_amount':
                                    let deductions = 0;
                                    for (let d = 0; d < columnKeys.length; d++) {
                                        const c = this.columns_map[columnKeys[d]];
                                        if (c.calc !== 2) continue;
                                        let amount = item[columnKeys[d]];
                                        amount = amount ? amount : 0;
                                        deductions += amount;
                                    }
                                    let wage_amount = 0;
                                    wage_amount += item.wage_base_amount;
                                    wage_amount += this.getSumArrType(item.salary_values);
                                    wage_amount += this.getSumArrType(item.allowance_values);
                                    wage_amount += this.getSumArrType(item.overtime_values);
                                    wage_amount -= deductions;
                                    div.textContent = this.comma(wage_amount);
                                    div.style.fontWeight = 'bold';
                                    break;
                                case 'labor_insurance_target':
                                    let labor_insurance_sum = 0;
                                    this.labor_insurances.forEach(e => {
                                        if (Object.keys(this.columns_map).includes(e)) {                                            
                                            labor_insurance_sum += item[e];
                                        }
                                        else if (Object.keys(item['salary_values']).includes(e)) {                                                                                        
                                            labor_insurance_sum += item['salary_values'][e].amount;
                                        }
                                        else if (Object.keys(item['overtime_values']).includes(e)) {                                            
                                            labor_insurance_sum += item['overtime_values'][e].amount;
                                        }
                                        else if (Object.keys(item['allowance_values']).includes(e)) {                                            
                                            labor_insurance_sum += item['allowance_values'][e].amount;
                                        }
                                    });
                                    div.textContent = this.comma(labor_insurance_sum);
                                    break;
                                case 'social_insurance_target':
                                    let social_insurance_sum = 0;
                                    this.social_insurances.forEach(e => {
                                        if (Object.keys(this.columns_map).includes(e)) {                                            
                                            social_insurance_sum += item[e];
                                        }
                                        else if (Object.keys(item['salary_values']).includes(e)) {                                                                                        
                                            social_insurance_sum += item['salary_values'][e].amount;
                                        }
                                        else if (Object.keys(item['overtime_values']).includes(e)) {                                            
                                            social_insurance_sum += item['overtime_values'][e].amount;
                                        }
                                        else if (Object.keys(item['allowance_values']).includes(e)) {                                            
                                            social_insurance_sum += item['allowance_values'][e].amount;
                                        }
                                    });
                                    div.textContent = this.comma(social_insurance_sum);
                                    break;
                                default:
                                    div.textContent = item[key];
                                    break;
                            }
                            td.dataset.amount = div.textContent;
                            td.appendChild(div);
                        }
                        tr.appendChild(td);
                        td.dataset.key = key;
                        break;
                }

            }
            this.item_nodes.push(tr);
        }
        if (this.sortKey) this.sortItemNodes(this.sortKey, this.sortOrder);
    }

    sortSalaryDataByColumns(data, columns) {
        const sortedData = {};
    
        columns.forEach(column => {
            if (data.hasOwnProperty(column)) {
                sortedData[column] = data[column];
            }
        });
    
        return sortedData;
    }

    sortItemNodes(key, sortOrder) {
        // 0の場合は昇順、1の場合は降順とする
        const isAscending = sortOrder === 0;
    
        const parseValue = (value) => {
            if (/^[\d,]+$/.test(value)) {
                return parseFloat(value.replace(/,/g, ''));
            }
            const date = new Date(value);
            if (!isNaN(date)) {
                return date.getTime(); // 日付をタイムスタンプに変換
            }
            return value.toString();
        };
    
        // ソート
        this.item_nodes.sort((a, b) => {
            const tdA = Array.from(a.children).find(td => td.dataset.key === key);
            const tdB = Array.from(b.children).find(td => td.dataset.key === key);
    
            const valueA = parseValue(tdA ? tdA.dataset.amount : "");
            const valueB = parseValue(tdB ? tdB.dataset.amount : "");
    
            if (valueA < valueB) return isAscending ? -1 : 1;
            if (valueA > valueB) return isAscending ? 1 : -1;
            return 0;
        });
    }

    setSort(key, order) {
        this.sortKey = key;
        this.sortOrder = order;
        this.load();
    }

    setSortHeder() {
        const wageListHeader = document.getElementById('wage-list-header');
        for (let i = 0; i < wageListHeader.children.length; i++) {
            const th = wageListHeader.children[i];
            th.classList.remove('asc', 'desc');
            if (th.dataset.key == this.sortKey) {
                if (this.sortOrder) {
                    th.classList.add('desc');
                } else {
                    th.classList.add('asc');
                }
            }
        }
    }
    
    addColumn(name, section, position) {
        const wageListHeader = document.getElementById('wage-list-header');
        for (let l = 0; l < wageListHeader.children.length; l++) {
            const origin = wageListHeader.children[l];
            if (origin.dataset.key != position) continue;
            const custom_th = document.createElement('th');
            const span = document.createElement('span');
            const btn = document.createElement('button');
            const plus = document.createElement('i');
            span.textContent = name;
            custom_th.dataset.name = name;
            custom_th.dataset.key = name;
            custom_th.dataset.parent = section + '_values';
            custom_th.classList.add('sticky');
            btn.classList.add('mini', 'ui', 'button', 'icon', 'plus-btn');
            plus.classList.add('pen', 'icon');
            btn.addEventListener('click', e => {
                this.onEditColumn(section + '_values', name);
            });
            btn.appendChild(plus);
            custom_th.appendChild(btn);
            custom_th.appendChild(span);
            origin.before(custom_th);
            custom_th.addEventListener('click', e => {
                if (this.isEdit) return;
                if (this.sortKey == arrName) {
                    if (this.sortOrder == 1) {
                        this.setSort(arrName, 0);
                    } else {
                        this.setSort(arrName, 1);
                    }
                } else {
                    this.setSort(arrName, 1);
                }
            });
            l++;
        }
        for (let l = 0; l < this.item_nodes.length; l++) {
            const element = this.item_nodes[l];
            const id = element.dataset.id;
            const origin = element.querySelector('td[data-key="' + position + '"]');                                
            const new_td = document.createElement('td');
            const new_input = document.createElement('input');
            new_input.classList.add('edit-input');
            new_input.type = "text";
            new_input.dataset.id = id;
            new_input.dataset.section = section;
            new_input.dataset.key = name;
            new_input.readOnly = true;
            new_input.addEventListener('focus', e => { this.onFocusInput(e) });
            new_input.addEventListener('blur', e => { this.onBlurInput(e)});
            new_input.addEventListener('change', e => { this.onChangeInput(e)});
            new_input.addEventListener('change', e => { this.SumWhenChanged(e); });
            new_td.appendChild(new_input);
            origin.before(new_td);
        }
    }

    editColumn(name, key, original) {
        let section = '';
        if (key == 'salary_values') section = 'salary';
        else if (key == 'overtime_values') section = 'overtime';
        else if (key == 'allowance_values') section = 'allowance';

        const idx = this.dirtyName.findIndex(d => {
            return d.key == original
        });

        if (idx >= 0) {
            this.dirtyName[idx].val = name;
        } else {
            this.dirtyName.push({
                key: original,
                val: name,
                section: section
            });
        }

        const th = document.querySelector('th[data-name="' + original + '"][data-parent="' + key + '"]');
        const span = th.querySelector('span');
        span.textContent = name;
        return true;
    }

    removeColumn(key, original) {
        let section = '';
        if (key == 'salary_values') section = 'salary';
        else if (key == 'overtime_values') section = 'overtime';
        else if (key == 'allowance_values') section = 'allowance';
        const th = document.querySelector('th[data-name="' + original + '"][data-parent="' + key + '"]');
        th.style.display = 'none';
        this.item_nodes.forEach(tr => {
            const tds = tr.querySelectorAll('td[data-section="' + section + '"');
            for (let i = 0; i < tds.length; i++) {
                const td = tds[i];
                const input = td.querySelector('input[data-key="' + original + '"');
                if (input) {
                    td.style.display = 'none';
                    input.value = '0';
                    this.SumWhenChanged(null, input.dataset.id);
                }
            }
        });
        this.dirtyRemove.push({ key: original, section: section });
    }

    comma(num) {
        let str = '';
        if (num != '') {
            str = parseInt(num, 10).toLocaleString('ja-JP');
        }
        return str;
    }

    replaceInt(str) {        
        if (str != null && str != '') {
            str = str.replace(/,/g, '');
        } else {
            str = 0;
        }
        return parseInt(str);
    }

    getSumArrType(obj) {
        let c = 0;
        for (let j = 0; j < Object.keys(obj).length; j++) {
            const key = Object.keys(obj)[j];
            const t = obj[key];
            c += t.amount;
        }
        return c;
    }
    checkColumn(name) {
        const wageListHeader = document.getElementById('wage-list-header');
        const exists = wageListHeader.querySelectorAll('th[data-name="' + name + '"]');        
        if (exists.length) return true;
        return false;
    }
    SumWhenChanged(event, d = null) {
        const id = d !== null ? d : event.target.dataset.id;
        let element = document;
        for (let i = 0; i < this.item_nodes.length; i++) {
            const el = this.item_nodes[i];
            if (el.dataset.id == id) {
                element = el;
                break;
            }
        }
        const salary_section = 'salary';
        const salary_key = 'salary_label';
        const salary_nodes = element.querySelectorAll('input[data-id="' + id + '"][data-section="'+ salary_section + '"]');
        const salary_label = element.querySelectorAll('div.label[data-id="' + id + '"][data-key="' + salary_key + '"]');
        let salary = 0;                                
        for (let i = 0; i < salary_nodes.length; i++) {
            const node = salary_nodes[i];
            const val = node.value.replace(/,/g, '');
            salary += parseInt(val);
        }

        const allowance_section = 'allowance';
        const allowance_key = 'allowance_label';
        const allowance_nodes = element.querySelectorAll('input[data-id="' + id + '"][data-section="'+ allowance_section + '"]');
        const allowance_label = element.querySelectorAll('div.label[data-id="' + id + '"][data-key="' + allowance_key + '"]');
        let allowance = 0;                                
        for (let i = 0; i < allowance_nodes.length; i++) {
            const node = allowance_nodes[i];
            const val = node.value.replace(/,/g, '');
            allowance += parseInt(val);
        }

        const overtime_section = 'overtime';
        const overtime_key = 'overtime_label';
        const overtime_nodes = element.querySelectorAll('input[data-id="' + id + '"][data-section="'+ overtime_section + '"]');
        const overtime_label = element.querySelectorAll('div.label[data-id="' + id + '"][data-key="' + overtime_key + '"]');
        let overtime = 0;                                
        for (let i = 0; i < overtime_nodes.length; i++) {
            const node = overtime_nodes[i];
            const val = node.value.replace(/,/g, '');
            overtime += parseInt(val);
        }

        const columnKeys = Object.keys(this.columns_map);
        let deductions = 0;
        for (let i = 0; i < columnKeys.length; i++) {
            const c = this.columns_map[columnKeys[i]];
            if (c.calc != 2) continue;
            const key = c.key;            
            const nodes = element.querySelectorAll('input[data-id="' + id + '"][data-key="' + key + '"]');            
            deductions += this.replaceInt(nodes[0].value);
        }

        const base_amount_key = 'wage_base_amount';
        const total_amount_key = 'total_amount';
        const base_amount_nodes = element.querySelectorAll('input[data-id="' + id + '"][data-key="' + base_amount_key + '"]');
        const total_amount_label = element.querySelectorAll('div.label[data-id="' + id + '"][data-key="' + total_amount_key + '"]');
        const base_amount = this.replaceInt(base_amount_nodes[0].value);

        const taxable_paymment_key = 'taxable_paymment';
        const non_taxable_paymment_key = 'non_taxable_paymment';
        const taxable_paymment_label_key = 'taxable_paymment_label';
        const taxable_paymment_nodes = element.querySelectorAll('input[data-id="' + id + '"][data-key="' + taxable_paymment_key + '"]');
        const non_taxable_paymment_nodes = element.querySelectorAll('input[data-id="' + id + '"][data-key="' + non_taxable_paymment_key + '"]');
        const taxable_paymment_label_nodes = element.querySelectorAll('div.label[data-id="' + id + '"][data-key="' + taxable_paymment_label_key + '"]');

        const deduction_sum_key = 'deduction_sum';
        const deduction_sum_label = element.querySelectorAll('div.label[data-id="' + id + '"][data-key="' + deduction_sum_key + '"]');
        const wage_amount_key = 'wage_amount';
        const wage_amount_label = element.querySelectorAll('div.label[data-id="' + id + '"][data-key="' + wage_amount_key + '"]');

        total_amount_label[0].textContent = this.comma(base_amount + salary + overtime + allowance);
        allowance_label[0].textContent = this.comma(allowance);
        overtime_label[0].textContent = this.comma(overtime);
        taxable_paymment_label_nodes[0].textContent = this.comma(this.replaceInt(taxable_paymment_nodes[0].value) + this.replaceInt(non_taxable_paymment_nodes[0].value));
        deduction_sum_label[0].textContent = this.comma(deductions);
        wage_amount_label[0].textContent = this.comma(base_amount + salary + overtime + allowance - deductions);
    }

    getCalcableColumns() {
        const column_names = [];
        for (let i = 0; i < Object.keys(this.columns_map).length; i++) {
            const key = Object.keys(this.columns_map)[i];
            const item = this.columns_map[key];
            if (item.calc == 1) column_names.push({name: item.name, key: item.key});
        }

        const salary_columns = this.salary_columns.map(e => ({name: e, key: e}));
        const overtime_columns = this.overtime_columns.map(e => ({name: e, key: e}));
        const allowance_columns = this.allowance_columns.map(e => ({name: e, key: e}));

        const all = [
            ...column_names,
            ...salary_columns,
            ...overtime_columns,
            ...allowance_columns
        ];

        return all;
    }
}