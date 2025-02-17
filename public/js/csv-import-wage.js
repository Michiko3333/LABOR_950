class CsvImportWage extends PowerTableList {
    constructor(options) {
        super(options)
        this.data_uri = this.option_data.api.data;
        this.upload_uri = this.option_data.api.upload;
        this.columns_map_tmp = [];
        this.employee_list = [];

        this.all_custom_columns = [];
        this.salary_columns = [];
        this.overtime_columns = [];
        this.allowance_columns = [];
        this.unknown_columns = [];

        this.lengthInputs = 0;
        this.lengthLoadable = 0;

        this.successed_data = [];
        this.faild_data = [];

        this.labor_insurances = [];
        this.social_insurances = [];

        this.insurance_get = this.option_data.api.insurance_get;

        this.onImported = () => {};
        this.onFaildImport = () => {};
        this.onChangedCustomColumns = () => {};

        this.rules = {
            employee_no: ['required'],
            branch_name: ['required'],
            month: ['required', 'date'],
            employment_type: ['required'],
            wage_type: ['required', 'regex:^(給与|賞与|役員報酬|役員賞与)$']
        };

        this.get(this.insurance_get).then(r => {
            const res = JSON.parse(r);
            const insurances = {labor: [], social: []};
            if (!Object.keys(res).length < 1) {
                for (let i = 0; i < res.length; i++) {
                    const ins = res[i];
                    if (ins.type) {
                        insurances.social = ins.keys.split(',');
                        if (!insurances.social) insurances.social = [];
                    } else {
                        insurances.labor = ins.keys.split(',');
                        if (!insurances.labor) insurances.labor = [];
                    }
                }
                this.setInsurances(insurances);
            } else {
                this.setInsurances(insurances);
            }
        });

        this.get(this.data_uri).then(r => {
            const res = JSON.parse(r);

            this.columns_map_tmp = res.columns_map;
            this.employee_list = res.employees;

            this.setJson({
                columns_map: this.columns_map_tmp,
                data: []
            });
            this.load(true);

            // input event
            const input = document.getElementById('csv-input');
            input.disabled = false;
            input.addEventListener('change', (event) => {
                this.onChangeFile(event)
            });

            const uploadButton = document.getElementById('upload-btn');
            uploadButton.addEventListener('click', (event) => {
                this.upload();
            });
        });
    }

    validationRow(row) {
        // ルール定義
        const rules = this.rules;

        // ルールを検証するためのヘルパー関数
        const validators = {
            required: (value) => value !== undefined && value !== null && value !== '',
            numeric: (value) => !isNaN(value),
            date: (value) => !isNaN(Date.parse(value)),
            regex: (value, pattern) => new RegExp(pattern).test(value)
        };

        // 全てのルールをチェック
        for (const key in rules) {
            if (rules.hasOwnProperty(key)) {
                const fieldRules = rules[key];

                // rowに該当キーが存在しない場合は無効
                if (!row.hasOwnProperty(key)) {
                    return false;
                }

                // 各ルールを適用
                for (const rule of fieldRules) {
                    if (rule.startsWith('regex:')) {
                        // 正規表現ルール
                        const pattern = rule.split(':')[1];
                        if (!validators.regex(row[key], pattern)) {
                            return false;
                        }
                    } else if (validators[rule]) {
                        // その他のルール
                        if (!validators[rule](row[key])) {
                            return false;
                        }
                    } else {
                        console.error(`Unknown validation rule: ${rule}`);
                        return false;
                    }
                }
            }
        }
        return true;
    }


    onChangeFile(event) {
        const file = event.target.files[0];

        if (!file || file.type !== 'text/csv') {
            alert('CSVファイルを選択してください。');
            event.target.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = (e) => {
            const csvContent = e.target.result;
            const rows = csvContent.split('\n').map(row => row.split(','));

            if (rows.length < 1) {
                alert('不明なデータです');
                return;
            }

            const columns = [...rows[0]].map(e => this.valueClearing(e));
            this.loadCsv(columns, rows.slice(1));
        }

        reader.onerror = function() {
            alert('ファイルの読み取り中にエラーが発生しました。');
        };

        reader.readAsText(file);
    }

    loadCsv(columns, rows) {
        rows = rows.filter(e => e.length > 1);
        this.lengthInputs = rows.length;
        const column_default_names = [];
        for (const key in this.columns_map_tmp) {
            if (Object.prototype.hasOwnProperty.call(this.columns_map_tmp, key)) {
                const element = this.columns_map_tmp[key];
                column_default_names.push(element.name);
            }
        }
        this.successed_data = [];
        this.faild_data = [];
        this.salary_columns = [];
        this.overtime_columns = [];
        this.allowance_columns = [];
        this.unknown_columns = [];
        this.all_custom_columns = [];
        for (let c = 0; c < columns.length; c++) {
            const name = columns[c];
            if (!column_default_names.includes(name)) {
                this.all_custom_columns.push(name);
                if (/.*報奨金$/.test(name)) {
                    this.salary_columns.push(name);
                } else if (/.*給与$/.test(name)) {
                    this.salary_columns.push(name);
                } else if (/.*支給$/.test(name)) {
                    this.salary_columns.push(name);
                } else if (/.*特別手当$/.test(name)) {
                    this.salary_columns.push(name);
                } else if (/残業.*手当$/.test(name)) {
                    this.overtime_columns.push(name);
                } else if (/.*手当$/.test(name)) {
                    this.allowance_columns.push(name);
                } else {
                    this.unknown_columns.push(name);
                }
            }
        }

        for (let r = 0; r < rows.length; r++) {
            const row = rows[r];
            if (row.length < 2) continue;
            const newRow = this.createEmptyObjectFromKeys(this.columns_map_tmp);

            newRow['salary_values'] = {};
            newRow['overtime_values'] = {};
            newRow['allowance_values'] = {};
            newRow['unknown_values'] = {};

            for (let c = 0; c < columns.length; c++) {
                const column_name = columns[c];
                const existsBasicColumn = this.findKeyByName(this.columns_map_tmp, column_name);
                if (existsBasicColumn) {
                    newRow[existsBasicColumn] = this.valueFormat(existsBasicColumn, this
                        .valueClearing(row[c]));
                } else {
                    if (this.salary_columns.includes(column_name)) {
                        newRow['salary_values'][column_name] = this.valueClearing(row[c]);
                    }
                    if (this.overtime_columns.includes(column_name)) {
                        newRow['overtime_values'][column_name] = this.valueClearing(row[c]);
                    }
                    if (this.allowance_columns.includes(column_name)) {
                        newRow['allowance_values'][column_name] = this.valueClearing(row[c]);
                    }
                    if (this.unknown_columns.includes(column_name)) {
                        newRow['unknown_values'][column_name] = this.valueClearing(row[c]);
                    }
                }
            }

            newRow['id'] = r;

            let is_success = this.validationRow(newRow);
            const employees = this.employee_list.filter(e => {
                return e.employee_no == newRow.employee_no;
            });
            if (employees.length < 1) is_success = false;
            else {
                if (!newRow.employee_name) newRow.employee_name =
                    `${employees[0].last_name} ${employees[0].first_name}`;
                if (!newRow.branch_name) newRow.branch_name = employees[0].branch_name;
            }
            if (is_success) this.successed_data.push(newRow);
            else this.faild_data.push(newRow);
        }

        this.setJson({
            columns_map: this.columns_map_tmp,
            data: this.successed_data
        });
        this.lengthLoadable = this.successed_data.length;
        this.load();
    }

    onCreateHeader(parent, key, item) {
        if (key == 'salary_values') {
            for (let i = 0; i < this.salary_columns.length; i++) {
                const column = this.salary_columns[i];
                const th = this.createHeaderElement({
                    key: column,
                    name: column,
                    width: 120
                });
                parent.appendChild(th);
            }
        } else if (key == 'overtime_values') {
            for (let i = 0; i < this.overtime_columns.length; i++) {
                const column = this.overtime_columns[i];
                const th = this.createHeaderElement({
                    key: column,
                    name: column,
                    width: 120
                });
                parent.appendChild(th);
            }
        } else if (key == 'allowance_values') {
            for (let i = 0; i < this.allowance_columns.length; i++) {
                const column = this.allowance_columns[i];
                const th = this.createHeaderElement({
                    key: column,
                    name: column,
                    width: 120
                });
                parent.appendChild(th);
            }
        } else if (key == 'unknown_values') {
            // nothings to do
        } else {
            const th = this.createHeaderElement(item);
            parent.appendChild(th);
        }
    }

    onCreateCell(parent, key, item) {
        if (key == 'salary_values') {
            for (let i = 0; i < this.salary_columns.length; i++) {
                const column = this.salary_columns[i];
                const amount = item['salary_values'][column];
                const custom_item = {};
                custom_item['id'] = item['id'];
                custom_item[column] = amount;
                super.onCreateCell(parent, column, custom_item);
            }
        } else if (key == 'overtime_values') {
            for (let i = 0; i < this.overtime_columns.length; i++) {
                const column = this.overtime_columns[i];
                const amount = item['overtime_values'][column];
                const custom_item = {};
                custom_item['id'] = item['id'];
                custom_item[column] = amount;
                super.onCreateCell(parent, column, custom_item);
            }
        } else if (key == 'allowance_values') {
            for (let i = 0; i < this.allowance_columns.length; i++) {
                const column = this.allowance_columns[i];
                const amount = item['allowance_values'][column];
                const custom_item = {};
                custom_item['id'] = item['id'];
                custom_item[column] = amount;
                super.onCreateCell(parent, column, custom_item);
            }
        } else if (key == 'unknown_values') {
            // nothings to do
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
                deduction_sum +=  this.replaceInt(item[k]);
            });

            label.textContent = this.comma(deduction_sum);
            label.style.fontWeight = 'bold';
            td.dataset.amount = label.textContent;
            item[key] = this.replaceInt(label.textContent);
        } else if (key == 'salary_amount') {
            const [td, label] = super.onCreateCell(parent, key, item);
            label.textContent = this.comma(this.replaceInt(item.taxable_paymment) + this.replaceInt(item.non_taxable_paymment));
            label.style.fontWeight = 'bold';
            td.dataset.amount = label.textContent;
            item[key] = this.replaceInt(label.textContent);
        } else if (key == 'month') {
            const [td, label] = super.onCreateCell(parent, key, item);
            const date = new Date(item[key]);
            const year = date.getFullYear();
            const month = date.getMonth() + 1;
            const formattedDate = `${year}年${month}月`;
            label.textContent = formattedDate;
            td.dataset.amount = item[key];
        } else if (key == 'wage_amount') {
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
                deduction_sum +=  this.replaceInt(item[k]);
            });

            let wage_amount = 0;
            wage_amount += this.replaceInt(item.wage_base_amount);
            wage_amount += this.getSumArrType(item.salary_values);
            wage_amount += this.getSumArrType(item.allowance_values);
            wage_amount += this.getSumArrType(item.overtime_values);
            wage_amount -= social_insurance_sum;
            wage_amount -= deduction_sum;
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
        } else {
            super.onCreateCell(parent, key, item);
        }
    }

    afterLoaded() {
        const inputs = document.getElementById('preview-inputs');
        inputs.textContent = this.lengthInputs;
        const loadable = document.getElementById('preview-loadable');
        loadable.textContent = this.lengthLoadable;
        const uploadButton = document.getElementById('upload-btn');
        if (this.lengthLoadable > 0) uploadButton.disabled = false;
        else uploadButton.disabled = true;
        this.renderRadioButtons();
    }

    renderRadioButtons() {
        const solvColumn = document.getElementById('solv-column');
        solvColumn.innerHTML = '';

        for (let i = 0; i < this.all_custom_columns.length; i++) {
            const name = this.all_custom_columns[i];
            const container = document.createElement('div');
            container.className = 'inline fields';

            const label = document.createElement('label');
            label.textContent = name;
            label.style.width = '200px';
            container.appendChild(label);

            const options = [
                { value: 'unknown', name: name, label: '不明（取り込まない）', checked: this.unknown_columns.includes(name) },
                { value: 'salary', name: name, label: '支給', checked: this.salary_columns.includes(name) },
                { value: 'overtime', name: name, label: '残業手当', checked: this.overtime_columns.includes(name) },
                { value: 'allowance', name: name, label: '諸手当', checked: this.allowance_columns.includes(name) },
            ];

            options.forEach(option => {
                const fieldDiv = document.createElement('div');
                fieldDiv.className = 'field';

                const checkboxDiv = document.createElement('div');
                checkboxDiv.className = 'ui radio checkbox';

                const input = document.createElement('input');
                input.type = 'radio';
                input.name = option.name;
                input.value = option.value;
                if (option.checked) input.checked = true;
                input.addEventListener('change', (e) => {
                    this.radioButtonEvent(e);
                });

                const optionLabel = document.createElement('label');
                optionLabel.textContent = option.label;

                checkboxDiv.appendChild(input);
                checkboxDiv.appendChild(optionLabel);
                fieldDiv.appendChild(checkboxDiv);

                container.appendChild(fieldDiv);
              });
              solvColumn.appendChild(container);
        }
        this.onChangedCustomColumns();
    }

    radioButtonEvent(e) {
        const target = e.target.value;
        const name = e.target.name;

        this.unknown_columns = this.unknown_columns.filter(e => e != name);
        this.salary_columns = this.salary_columns.filter(e => e != name);
        this.overtime_columns = this.overtime_columns.filter(e => e != name);
        this.allowance_columns = this.allowance_columns.filter(e => e != name);

        for (let n = 0; n < this.json['data'].length; n++) {
            const row = this.json['data'][n];
            let amount = '0';
            if (Object.keys(row['unknown_values']).includes(name)) {
                amount = row['unknown_values'][name];
                delete this.json['data'][n]['unknown_values'][name];
            }
            else if (Object.keys(row['salary_values']).includes(name)) {
                amount = row['salary_values'][name];
                delete this.json['data'][n]['salary_values'][name];
            }
            else if (Object.keys(row['overtime_values']).includes(name)) {
                amount = row['overtime_values'][name];
                delete this.json['data'][n]['overtime_values'][name];
            }
            else if (Object.keys(row['allowance_values']).includes(name)) {
                amount = row['allowance_values'][name];
                delete this.json['data'][n]['allowance_values'][name];
            }
            if (target == 'unknown') {
                this.json['data'][n]['unknown_values'][name] = amount;
            } else if (target == 'salary') {
                this.json['data'][n]['salary_values'][name] = amount;
            } else if (target == 'overtime') {
                this.json['data'][n]['overtime_values'][name] = amount;
            } else if (target == 'allowance') {
                this.json['data'][n]['allowance_values'][name] = amount;
            }
        }
        if (target == 'unknown') {
            this.unknown_columns.push(name);
        } else if (target == 'salary') {
            this.salary_columns.push(name);
        } else if (target == 'overtime') {
            this.overtime_columns.push(name);
        } else if (target == 'allowance') {
            this.allowance_columns.push(name);
        }
        this.load();
    }

    upload() {
        const uploadButton = document.getElementById('upload-btn');
        uploadButton.disabled = true;
        const data = [];
        for (let i = 0; i < this.data.length; i++) {
            const d = {
                ...this.data[i],
                month: this.normalizeDate(this.data[i].month)
            };
            delete d.unknown_values;
            data.push(d);
        }

        this.submit(this.upload_uri, JSON.stringify({data: data})).then(r => {
            this.onImported();
        })
        .catch(() => {
            this.onFaildImport();
        })
        .finally(() => {
            uploadButton.disabled = false;
        });
    }

    setInsurances(insurances) {
        this.labor_insurances = insurances.labor;
        this.social_insurances = insurances.social;
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
            c += this.replaceInt(t);
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

    normalizeDate(dateStr) {
        const date = new Date(dateStr);
        return date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
    }
}
