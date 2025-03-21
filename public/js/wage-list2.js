class WageList extends PowerTableList {
    constructor(options) {
        super(options)
        this.columns_map_tmp = [];
        this.employee_list = [];

        this.all_custom_columns = [];
        this.salary_columns = [];
        this.overtime_columns = [];
        this.allowance_columns = [];
        this.deduction_columns = [];
        this.unknown_columns = [];

        this.labor_insurances = [];
        this.social_insurances = [];
        this.commute = [];

        this.insurance_get = this.option_data.api.insurance_get;
        this.insurance_save = this.option_data.api.insurance_save;
        this.commute_save = this.option_data.api.commute_save;
        this.commute_get = this.option_data.api.commute_get;

        this.onChangedCustomColumns = () => { };
        this.onEditColumn = (key, name) => { };
        this.successSubmit = () => { };
        this.errorSubmit = () => { };
        this.setShowList = () => { };
        this.onAddColumn = (section, position) => { };
    }

    // override
    onLoad(d) {
        this.salary_columns = d['salary_columns'];
        this.overtime_columns = d['overtime_columns'];
        this.allowance_columns = d['allowance_columns'];
        this.deduction_columns = d['deduction_columns'];
    }

    // override
    onRefreshRow() {
        const list = document.getElementById(this.elementIds.list);
        const headerBtns = list.querySelectorAll('button.plus-btn');

        const filterBtn = document.getElementById('pt-filter-button');
        const insuranceBtn = document.getElementById('wage-insurance-button');

        if (this.isEdit) {
            headerBtns.forEach(element => {
                element.classList.remove('hidden');
            });
            filterBtn.disabled = true;
            insuranceBtn.disabled = true;
        } else {
            headerBtns.forEach(element => {
                element.classList.add('hidden');
            });
            filterBtn.disabled = false;
            insuranceBtn.disabled = false;
        }
    }
    onRefreshed() {
        this.setShowList();
    }
    // override
    onCreateHeader(parent, key, item) {
        if (key == 'salary_values') {
            for (let i = 0; i < this.salary_columns.length; i++) {
                const column = this.salary_columns[i];
                const th = this.createHeaderElement({
                    key: column,
                    name: column,
                    width: 120
                });
                th.dataset.parent = key;
                th.dataset.name = column;
                parent.appendChild(th);

                const btn = document.createElement('button');
                const plus = document.createElement('i');
                btn.classList.add('mini', 'ui', 'button', 'icon', 'plus-btn', 'hidden');
                plus.classList.add('pen', 'icon');
                btn.addEventListener('click', e => {
                    this.onEditColumn(key, column);
                });
                btn.appendChild(plus);
                th.querySelector('span').before(btn);
            }
        } else if (key == 'overtime_values') {
            for (let i = 0; i < this.overtime_columns.length; i++) {
                const column = this.overtime_columns[i];
                const th = this.createHeaderElement({
                    key: column,
                    name: column,
                    width: 120
                });
                th.dataset.parent = key;
                th.dataset.name = column;
                parent.appendChild(th);

                const btn = document.createElement('button');
                const plus = document.createElement('i');
                btn.classList.add('mini', 'ui', 'button', 'icon', 'plus-btn', 'hidden');
                plus.classList.add('pen', 'icon');
                btn.addEventListener('click', e => {
                    this.onEditColumn(key, column);
                });
                btn.appendChild(plus);
                th.querySelector('span').before(btn);
            }
        } else if (key == 'allowance_values') {
            for (let i = 0; i < this.allowance_columns.length; i++) {
                const column = this.allowance_columns[i];
                const th = this.createHeaderElement({
                    key: column,
                    name: column,
                    width: 120
                });
                th.dataset.parent = key;
                th.dataset.name = column;
                parent.appendChild(th);

                const btn = document.createElement('button');
                const plus = document.createElement('i');
                btn.classList.add('mini', 'ui', 'button', 'icon', 'plus-btn', 'hidden');
                plus.classList.add('pen', 'icon');
                btn.addEventListener('click', e => {
                    this.onEditColumn(key, column);
                });
                btn.appendChild(plus);
                th.querySelector('span').before(btn);
            }
        } else if (key == 'deduction_values') {
            for (let i = 0; i < this.deduction_columns.length; i++) {
                const column = this.deduction_columns[i];
                const th = this.createHeaderElement({
                    key: column,
                    name: column,
                    width: 120
                });
                th.dataset.parent = key;
                th.dataset.name = column;
                parent.appendChild(th);

                const btn = document.createElement('button');
                const plus = document.createElement('i');
                btn.classList.add('mini', 'ui', 'button', 'icon', 'plus-btn', 'hidden');
                plus.classList.add('pen', 'icon');
                btn.addEventListener('click', e => {
                    this.onEditColumn(key, column);
                });
                btn.appendChild(plus);
                th.querySelector('span').before(btn);
            }
        } else if (key == 'total_amount') {
            const th = this.createHeaderElement(item);
            parent.appendChild(th);
            const btn = document.createElement('button');
            const plus = document.createElement('i');
            btn.classList.add('mini', 'ui', 'button', 'icon', 'primary', 'hidden', 'plus-btn');
            plus.classList.add('plus', 'icon');
            btn.appendChild(plus);
            btn.addEventListener('click', e => {
                this.onAddColumn('salary_values', 'overtime_label');
            });
            th.querySelector('span').before(btn);
        } else if (key == 'overtime_label') {
            const th = this.createHeaderElement(item);
            parent.appendChild(th);
            const btn = document.createElement('button');
            const plus = document.createElement('i');
            btn.classList.add('mini', 'ui', 'button', 'icon', 'primary', 'hidden', 'plus-btn');
            plus.classList.add('plus', 'icon');
            btn.appendChild(plus);
            btn.addEventListener('click', e => {
                this.onAddColumn('overtime_values', 'allowance_label');
            });
            th.querySelector('span').before(btn);
        } else if (key == 'allowance_label') {
            const th = this.createHeaderElement(item);
            parent.appendChild(th);
            const btn = document.createElement('button');
            const plus = document.createElement('i');
            btn.classList.add('mini', 'ui', 'button', 'icon', 'primary', 'hidden', 'plus-btn');
            plus.classList.add('plus', 'icon');
            btn.appendChild(plus);
            btn.addEventListener('click', e => {
                this.onAddColumn('allowance_values', 'absence_deduction');
            });
            th.querySelector('span').before(btn);
        } else if (key == 'deduction_sum') {
            const th = this.createHeaderElement(item);
            parent.appendChild(th);
            const btn = document.createElement('button');
            const plus = document.createElement('i');
            btn.classList.add('mini', 'ui', 'button', 'icon', 'primary', 'hidden', 'plus-btn');
            plus.classList.add('plus', 'icon');
            btn.appendChild(plus);
            btn.addEventListener('click', e => {
                this.onAddColumn('deduction_values', 'deduction_sum');
            });
            th.querySelector('span').before(btn);
        } else {
            const th = this.createHeaderElement(item);
            parent.appendChild(th);
        }
    }

    // override
    onCreateCell(parent, key, item) {
        if (key == 'salary_values') {
            for (let i = 0; i < this.salary_columns.length; i++) {
                const column = this.salary_columns[i];
                const data = item['salary_values'][column];
                const custom_item = {};
                custom_item['id'] = item['id'];
                custom_item[column] = data.amount;

                const [td, input, label] = this.baseInputCell(column, custom_item);
                input.type = 'number';
                input.min = 0;
                input.max = 99999;
                input.dataset.section = key;
                input.addEventListener('change', (e) => { this.SumWhenChanged(e); });
                label.textContent = this.comma(input.value);
                td.dataset.parent = key;
                parent.appendChild(td);
            }
        } else if (key == 'overtime_values') {
            for (let i = 0; i < this.overtime_columns.length; i++) {
                const column = this.overtime_columns[i];
                const data = item['overtime_values'][column];
                const custom_item = {};
                custom_item['id'] = item['id'];
                custom_item[column] = data.amount;

                if (this.wageOrBonus(item['wage_type']) == 2) {
                    const [td, label] = super.onCreateCell(parent, column, custom_item);
                    td.dataset.parent = key;
                } else {
                    const [td, input, label] = this.baseInputCell(column, custom_item);
                    input.type = 'number';
                    input.min = 0;
                    input.max = 99999;
                    input.dataset.section = key;
                    input.addEventListener('change', (e) => { this.SumWhenChanged(e); });
                    label.textContent = this.comma(input.value);
                    td.dataset.parent = key;
                    parent.appendChild(td);
                }
            }
        } else if (key == 'allowance_values') {
            for (let i = 0; i < this.allowance_columns.length; i++) {
                const column = this.allowance_columns[i];
                const data = item['allowance_values'][column];
                const custom_item = {};
                custom_item['id'] = item['id'];
                custom_item[column] = data.amount;
                if (this.wageOrBonus(item['wage_type']) == 2) {
                    const [td, label] = super.onCreateCell(parent, column, custom_item);
                    td.dataset.parent = key;
                } else {
                    const [td, input, label] = this.baseInputCell(column, custom_item);
                    input.type = 'number';
                    input.min = 0;
                    input.max = 99999;
                    input.dataset.section = key;
                    input.addEventListener('change', (e) => { this.SumWhenChanged(e); });
                    label.textContent = this.comma(input.value);
                    td.dataset.parent = key;
                    parent.appendChild(td);
                }
            }
        } else if (key == 'deduction_values') {
            for (let i = 0; i < this.deduction_columns.length; i++) {
                const column = this.deduction_columns[i];
                const data = item['deduction_values'][column];
                const custom_item = {};
                custom_item['id'] = item['id'];
                custom_item[column] = data.amount;

                const [td, input, label] = this.baseInputCell(column, custom_item);
                input.type = 'number';
                input.min = 0;
                input.max = 99999;
                input.dataset.section = key;
                input.addEventListener('change', (e) => { this.SumWhenChanged(e); });
                label.textContent = this.comma(input.value);
                td.dataset.parent = key;
                parent.appendChild(td);
            }
        } else if (key == 'total_amount') {
            const [td, label] = super.onCreateCell(parent, key, item);
            label.textContent = this.comma(
                this.replaceInt(item.wage_base_amount) +
                this.getSumArrType(item['salary_values']) + this.getSumArrType(item['overtime_values']) + this.getSumArrType(item['allowance_values'])
            );
            label.style.fontWeight = 'bold';
            td.dataset.amount = label.textContent;
            item[key] = this.replaceInt(label.textContent);
        } else if (key == 'overtime_label') {
            const [td, label] = super.onCreateCell(parent, key, item);
            label.textContent = this.comma(this.getSumArrType(item['overtime_values']));
            label.style.fontWeight = 'bold';
            td.dataset.amount = label.textContent;
            item[key] = this.replaceInt(label.textContent);
        } else if (key == 'allowance_label') {
            const [td, label] = super.onCreateCell(parent, key, item);
            label.textContent = this.comma(this.getSumArrType(item['allowance_values']));
            label.style.fontWeight = 'bold';
            td.dataset.amount = label.textContent;
            item[key] = this.replaceInt(label.textContent);
        } else if (key == 'salary_amount') {
            const [td, label] = super.onCreateCell(parent, key, item);
            const val = this.replaceInt(item['taxable_paymment']) + this.replaceInt(item['non_taxable_paymment']);
            label.textContent = this.comma(val);
            label.style.fontWeight = 'bold';
            td.dataset.amount = label.textContent;
            item[key] = this.replaceInt(label.textContent);
        } else if (key == 'social_insurance_amount') {
            const [td, label] = super.onCreateCell(parent, key, item);
            const social_insurances = [
                'health_insurance_deduction',
                'nursing_care_insurance_deduction',
                'welfare_pension_deduction',
                'welfare_pension_insurance_deduction',
                'employment_insurance_deduction'
            ];
            let social_insurance_sum = 0;
            social_insurances.forEach(k => {
                social_insurance_sum += this.replaceInt(item[k]);
            });

            label.textContent = this.comma(social_insurance_sum);
            label.style.fontWeight = 'bold';
            td.dataset.amount = label.textContent;
            item[key] = this.replaceInt(label.textContent);
        } else if (key == 'deduction_sum') {
            const [td, label] = super.onCreateCell(parent, key, item);
            const deductions = [
                'withholding_tax',
                'resident_tax',
                'mutual_aid',
                'asset_saving',
                'other_deduction2'
            ];
            let deduction_sum = 0;
            deductions.forEach(k => {
                deduction_sum += this.replaceInt(item[k]);
            });

            label.textContent = this.comma(deduction_sum + this.getSumArrType(item['deduction_values']));
            label.style.fontWeight = 'bold';
            td.dataset.amount = label.textContent;
            item[key] = this.replaceInt(label.textContent);
        } else if (key == 'salary_amount') {
            const [td, label] = super.onCreateCell(parent, key, item);

            label.textContent = this.comma(this.replaceInt(item.taxable_paymment) + this.replaceInt(item.non_taxable_paymment));
            label.style.fontWeight = 'bold';
            td.dataset.amount = label.textContent;
            item[key] = this.replaceInt(label.textContent);

        } else if (key == 'wage_amount') {
            const columnKeys = Object.keys(this.columns_map);
            const [td, label] = super.onCreateCell(parent, key, item);
            const social_insurances = [
                'health_insurance_deduction',
                'nursing_care_insurance_deduction',
                'welfare_pension_deduction',
                'welfare_pension_insurance_deduction',
                'employment_insurance_deduction'
            ];
            let social_insurance_sum = 0;
            social_insurances.forEach(k => {
                social_insurance_sum += this.replaceInt(item[k]);
            });

            const deductions = [
                'withholding_tax',
                'resident_tax',
                'mutual_aid',
                'asset_saving',
                'other_deduction2'
            ];
            let deduction_sum = 0;
            deductions.forEach(k => {
                deduction_sum += this.replaceInt(item[k]);
            });


            let wage_amount = 0;
            wage_amount += this.replaceInt(item.wage_base_amount);
            wage_amount += this.getSumArrType(item.salary_values);
            wage_amount += this.getSumArrType(item.allowance_values);
            wage_amount += this.getSumArrType(item.overtime_values);
            wage_amount -= social_insurance_sum;
            wage_amount -= deduction_sum;
            wage_amount -= this.getSumArrType(item.deduction_values);
            label.textContent = this.comma(wage_amount);
            label.style.fontWeight = 'bold';
            td.dataset.amount = label.textContent;
            item[key] = this.replaceInt(label.textContent);
        } else if (key == 'labor_insurance_target') {
            const [td, label] = super.onCreateCell(parent, key, item);
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
            label.textContent = this.comma(labor_insurance_sum);
        } else if (key == 'social_insurance_target') {
            const [td, label] = super.onCreateCell(parent, key, item);
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
            label.textContent = this.comma(social_insurance_sum);
        } else if (this.columns_map[key]['type'] === 'number') {
            const [td, input, label] = this.baseInputCell(key, item);
            input.type = 'number';
            input.min = 0;
            input.max = 99999;
            input.addEventListener('change', (e) => { this.SumWhenChanged(e); });
            label.textContent = this.comma(input.value);
            parent.appendChild(td);
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
    }

    // override
    beforeSubmit(data) {
        const salaries = this.dirtyVal.filter(f => f.section == 'salary_values');
        const salaries_res = {};
        salaries.forEach(item => {
            const { id, key, val, section } = item;
            if (!salaries_res[id]) {
                salaries_res[id] = {};
            }
            salaries_res[id][key] = Number(val);
        });

        const allowances = this.dirtyVal.filter(f => f.section == 'allowance_values');
        const allowances_res = {};
        allowances.forEach(item => {
            const { id, key, val, section } = item;
            if (!allowances_res[id]) {
                allowances_res[id] = {};
            }
            allowances_res[id][key] = Number(val);
        });
        const overtimes = this.dirtyVal.filter(f => f.section == 'overtime_values');
        const overtimes_res = {};
        overtimes.forEach(item => {
            const { id, key, val, section } = item;
            if (!overtimes_res[id]) {
                overtimes_res[id] = {};
            }
            overtimes_res[id][key] = Number(val);
        });

        const deductions = this.dirtyVal.filter(f => f.section == 'deduction_values');
        const deductions_res = {};
        deductions.forEach(item => {
            const { id, key, val, section } = item;
            if (!deductions_res[id]) {
                deductions_res[id] = {};
            }
            deductions_res[id][key] = Number(val);
        });

        const formData = new FormData(document.forms.wage_filter);
        const target = [];
        const amount = [];
        const comparison = [];
        for (let d of formData.entries()) {
            if (/^cond_target\[\]$/.test(d[0])) {
                target.push(d[1]);
            } else if (/^cond_amount\[\]$/.test(d[0])) {
                amount.push(d[1]);
            } else if (/^cond_comparison\[\]$/.test(d[0])) {
                comparison.push(d[1]);
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

        return {
            ...data,
            salary: salaries_res,
            allowance: allowances_res,
            overtime: overtimes_res,
            deduction: deductions_res,
            conditions: {
                conditions: data.conditions,
                detail: details
            }
        }
    }

    // override
    afterSubmit(bool, err = null) {
        if (bool) {
            this.successSubmit();
        } else {
            this.errorSubmit(err);
        }
    }

    getCalcableColumns() {
        const column_names = [];
        for (let i = 0; i < Object.keys(this.columns_map).length; i++) {
            const key = Object.keys(this.columns_map)[i];
            const item = this.columns_map[key];
            if (item.calc == 1) column_names.push({ name: item.name, key: item.key });
        }

        const salary_columns = this.salary_columns.map(e => ({ name: e, key: e }));
        const overtime_columns = this.overtime_columns.map(e => ({ name: e, key: e }));
        const allowance_columns = this.allowance_columns.map(e => ({ name: e, key: e }));

        const all = [
            ...column_names,
            ...salary_columns,
            ...overtime_columns,
            ...allowance_columns
        ];

        return all;
    }

    checkColumn(name) {
        const wageListHeader = document.getElementById(this.elementIds.header);
        const exists = wageListHeader.querySelectorAll('th[data-name="' + name + '"]');
        if (exists.length) return true;
        return false;
    }

    editColumn(name, key, original) {
        let section = '';
        if (key == 'salary_values') section = 'salary';
        else if (key == 'overtime_values') section = 'overtime';
        else if (key == 'allowance_values') section = 'allowance';
        else if (key == 'deduction_values') section = 'deduction';

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
        const th = this.wrapper.querySelector('th[data-name="' + original + '"][data-parent="' + key + '"]');
        const span = th.querySelector('span');
        span.textContent = name;
        return true;
    }

    addColumn(name, section, position) {
        const header = document.getElementById(this.elementIds.header);
        const nextElement = header.querySelector('th[data-key="' + position + '"]');
        const th = this.createHeaderElement({
            key: name,
            name: name,
            width: 120
        });
        th.dataset.parent = section;
        th.dataset.name = name;
        const btn = document.createElement('button');
        const plus = document.createElement('i');
        btn.classList.add('mini', 'ui', 'button', 'icon', 'plus-btn');
        plus.classList.add('pen', 'icon');
        btn.addEventListener('click', e => {
            this.onEditColumn(section, name);
        });
        btn.appendChild(plus);
        th.querySelector('span').before(btn);
        nextElement.before(th);


        for (let l = 0; l < this.item_nodes.length; l++) {
            const row = this.item_nodes[l];
            const origin = row.querySelector('td[data-key="' + position + '"]');
            const wage_type_td = row.querySelector('td[data-key="wage_type"]');
            let d = { id: row.dataset.id };
            d[name] = '';

            if (wage_type_td.dataset.amount == 2) {
                const td = document.createElement('td');
                const label = document.createElement('div');
                label.classList.add('label');
                label.dataset.id = d['id'];
                label.dataset.key = name;
                label.textContent = d[name];
                td.dataset.id = d['id'];
                td.dataset.key = name;
                td.dataset.amount = label.textContent;
                td.appendChild(label);
                origin.before(td);
            } else {
                const [td, input, label] = this.baseInputCell(name, d);
                input.type = 'number';
                input.min = 0;
                input.max = 99999;
                input.addEventListener('change', (e) => { this.SumWhenChanged(e); });
                input.dataset.section = section;
                input.dataset.id = d['id'];
                label.classList.add('hidden');
                label.textContent = this.comma(input.value);
                td.dataset.parent = section;
                origin.before(td);
            }
        }
    }

    removeColumn(key, original) {
        let section = '';
        if (key == 'salary_values') section = 'salary';
        else if (key == 'overtime_values') section = 'overtime';
        else if (key == 'allowance_values') section = 'allowance';

        const header = document.getElementById(this.elementIds.header);
        const th = header.querySelector('th[data-name="' + original + '"][data-parent="' + key + '"]');
        th.style.display = 'none';

        this.item_nodes.forEach(tr => {
            const td = tr.querySelector('td[data-key="' + original + '"][data-parent="' + key + '"]');
            const input = td.querySelector('input[data-key="' + original + '"');
            if (input) {
                input.value = '0';
                this.SumWhenChanged(null, input.dataset.id);
            }
            td.style.display = 'none';
        });
        this.dirtyRemove.push({ key: original, section: section });
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

        const base_amount_key = 'wage_base_amount';
        const base_amount_node = element.querySelector('input[data-id="' + id + '"][data-key="' + base_amount_key + '"]');

        const salary_section = 'salary_values';
        const salary_nodes = element.querySelectorAll('input[data-id="' + id + '"][data-section="' + salary_section + '"]');
        let salary = 0;
        for (let i = 0; i < salary_nodes.length; i++) {
            const node = salary_nodes[i];
            salary += this.replaceInt(node.value);
        }

        const overtime_section = 'overtime_values';
        const overtime_key = 'overtime_label';
        const overtime_nodes = element.querySelectorAll('input[data-id="' + id + '"][data-section="' + overtime_section + '"]');
        const overtime_label = element.querySelector('div.label[data-id="' + id + '"][data-key="' + overtime_key + '"]');
        let overtime = 0;
        for (let i = 0; i < overtime_nodes.length; i++) {
            const node = overtime_nodes[i];
            overtime += this.replaceInt(node.value);
        }

        const allowance_section = 'allowance_values';
        const allowance_key = 'allowance_label';
        const allowance_nodes = element.querySelectorAll('input[data-id="' + id + '"][data-section="' + allowance_section + '"]');
        const allowance_label = element.querySelector('div.label[data-id="' + id + '"][data-key="' + allowance_key + '"]');
        let allowance = 0;
        for (let i = 0; i < allowance_nodes.length; i++) {
            const node = allowance_nodes[i];
            allowance += this.replaceInt(node.value);
        }

        const total_amount_key = 'total_amount';
        const total_amount_label = element.querySelector('div.label[data-id="' + id + '"][data-key="' + total_amount_key + '"]');

        const taxable_paymment_key = 'taxable_paymment';
        const non_taxable_paymment_key = 'non_taxable_paymment';
        const salary_amount_key = 'salary_amount';
        const taxable_paymment_node = element.querySelector('input[data-id="' + id + '"][data-key="' + taxable_paymment_key + '"]');
        const non_taxable_paymment_node = element.querySelector('input[data-id="' + id + '"][data-key="' + non_taxable_paymment_key + '"]');
        const salary_amount_node = element.querySelector('div.label[data-id="' + id + '"][data-key="' + salary_amount_key + '"]');

        const absence_deduction_key = 'absence_deduction';
        const late_deduction_key = 'late_deduction';
        const other_deduction_key = 'other_deduction';
        const absence_deduction_node = element.querySelector('input[data-id="' + id + '"][data-key="' + absence_deduction_key + '"]');
        const late_deduction_node = element.querySelector('input[data-id="' + id + '"][data-key="' + late_deduction_key + '"]');
        const other_deduction_node = element.querySelector('input[data-id="' + id + '"][data-key="' + other_deduction_key + '"]');

        const social_insurances = [
            'health_insurance_deduction',
            'nursing_care_insurance_deduction',
            'welfare_pension_deduction',
            'welfare_pension_insurance_deduction',
            'employment_insurance_deduction'
        ];
        let social_insurance_sum = 0;
        social_insurances.forEach(k => {
            const node = element.querySelector('input[data-id="' + id + '"][data-key="' + k + '"]');
            if (node) social_insurance_sum += this.replaceInt(node.value);
        });

        const deductions = [
            'withholding_tax',
            'resident_tax',
            'mutual_aid',
            'asset_saving',
            'other_deduction2'
        ];
        let deduction = 0;
        deductions.forEach(k => {
            const node = element.querySelector('input[data-id="' + id + '"][data-key="' + k + '"]');
            if (node) deduction += this.replaceInt(node.value);
        });

        const deduction_values_key = 'deduction_values';
        const deduction_values_nodes = element.querySelectorAll('input[data-id="' + id + '"][data-section="' + deduction_values_key + '"]');
        const deduction_values_label = element.querySelector('div.label[data-id="' + id + '"][data-key="' + deduction_values_key + '"]');
        let deduction_values = 0;
        for (let i = 0; i < deduction_values_nodes.length; i++) {
            const node = deduction_values_nodes[i];
            deduction_values += this.replaceInt(node.value);
        }

        const social_insurance_amount_key = 'social_insurance_amount';
        const social_insurance_amount_label = element.querySelector('div.label[data-id="' + id + '"][data-key="' + social_insurance_amount_key + '"]');

        const deduction_sum_key = 'deduction_sum';
        const deduction_sum_label = element.querySelector('div.label[data-id="' + id + '"][data-key="' + deduction_sum_key + '"]');
        const wage_amount_key = 'wage_amount';
        const wage_amount_label = element.querySelector('div.label[data-id="' + id + '"][data-key="' + wage_amount_key + '"]');

        const total_amount = this.replaceInt(base_amount_node.value) + salary;
        const salary_amount = this.replaceInt(taxable_paymment_node.value) + this.replaceInt(non_taxable_paymment_node.value);


        const update_list = [
            {
                key: overtime_key,
                value: overtime,
                element: overtime_label
            },
            {
                key: allowance_key,
                value: allowance,
                element: allowance_label
            },
            {
                key: total_amount_key,
                value: total_amount,
                element: total_amount_label
            },
            {
                key: salary_amount_key,
                value: salary_amount,
                element: salary_amount_node
            },
            {
                key: social_insurance_amount_key,
                value: social_insurance_sum,
                element: social_insurance_amount_label
            },
            {
                key: deduction_sum_key,
                value: deduction + deduction_values,
                element: deduction_sum_label
            },
            {
                key: wage_amount_key,
                value: total_amount + overtime + allowance - social_insurance_sum - deduction - deduction_values,
                element: wage_amount_label
            }
        ];

        update_list.forEach(el => {
            const idx = this.dirtyVal.findIndex(d => {
                return d.id == id && d.key == el.key
            });

            if (idx >= 0) {
                this.dirtyVal[idx].val = el.value;
            } else {
                this.dirtyVal.push({
                    id: id,
                    key: el.key,
                    val: el.value,
                    section: 'column'
                });
            }

            el.element.textContent = this.comma(el.value);
        });
    }

    valueClearing(str) {
        str = str.replace(/\r?\n/g, '');
        str = str.replace(/\r/g, '');
        return str;
    }

    valueFormat(key, d) {
        return d;
    }

    findKeyByName(data, searchName) {
        for (const key in data) {
            if (data[key].name === searchName) {
                return data[key].key;
            }
        }
        return null;
    }

    createEmptyObjectFromKeys(data) {
        const result = {};
        for (const key in data) {
            if (data[key].key) {
                result[data[key].key] = "";
            }
        }
        return result;
    }

    comma(num) {
        let str = '0';
        if (num != '') {
            str = parseInt(num, 10).toLocaleString('ja-JP');
        }
        return str;
    }

    getSumArrType(obj) {
        let c = 0;
        for (let j = 0; j < Object.keys(obj).length; j++) {
            const key = Object.keys(obj)[j];
            const t = obj[key];
            c += this.replaceInt(t.amount);
        }
        return c;
    }

    replaceInt(str) {
        if (typeof str != 'number') {
            if (str != null && str != '') {
                str = str.replace(/,/g, '');
            } else {
                str = 0;
            }
        }
        return parseInt(str);
    }

    wageOrBonus(val) {
        if (/(給与|役員報酬|)/.test(val)) return 1;
        return 2;
    }
}
