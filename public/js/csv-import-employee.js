class CsvImportEmployee extends PowerTableList {
    constructor(options) {
        super(options)
        this.data_uri = this.option_data.api.data;
        this.upload_uri = this.option_data.api.upload;
        this.columns_map_tmp = [];
        this.employee_list = [];

        this.salary_columns = [];
        this.overtime_columns = [];
        this.allowance_columns = [];
        this.unknown_columns = [];

        this.lengthInputs = 0;
        this.lengthLoadable = 0;

        this.successed_data = [];
        this.faild_data = [];

        this.onImported = () => {};

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

        for (let r = 0; r < rows.length; r++) {
            const row = rows[r];
            if (row.length < 2) continue;
            const newRow = this.createEmptyObjectFromKeys(this.columns_map_tmp);

            for (let c = 0; c < columns.length; c++) {
                const column_name = columns[c];
                const existsBasicColumn = this.findKeyByName(this.columns_map_tmp, column_name);
                if (existsBasicColumn) {
                    newRow[existsBasicColumn] = this.valueFormat(existsBasicColumn, this
                        .valueClearing(row[c]));
                }
            }

            newRow['id'] = r;

            let is_success = true;
            if (!newRow.employee_no) {
                is_success = false;
            } else {
                const employees = this.employee_list.filter(e => {
                    return e.employee_no == newRow.employee_no;
                });
                if (employees.length < 1) is_success = false;
                else {
                    if (!newRow.employee_name) newRow.employee_name =
                        `${employees[0].last_name} ${employees[0].first_name}`;
                    if (!newRow.branch_name) newRow.branch_name = employees[0].branch_name;
                }
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
            const th = this.createHeaderElement(item);
            parent.appendChild(th);
    }

    onCreateCell(parent, key, item) {
            super.onCreateCell(parent, key, item);
    }

    afterLoaded() {
        const inputs = document.getElementById('preview-inputs');
        inputs.textContent = this.lengthInputs;
        const loadable = document.getElementById('preview-loadable');
        loadable.textContent = this.lengthLoadable;

        const uploadButton = document.getElementById('upload-btn');
        if (this.lengthLoadable > 0) uploadButton.disabled = false;
        else uploadButton.disabled = true;
    }

    upload() {
        const uploadButton = document.getElementById('upload-btn');
        uploadButton.disabled = true;
        const data = [];
        for (let i = 0; i < this.data.length; i++) {
            const d = {...this.data[i]};
            data.push(d);
        }

        this.submit(this.upload_uri, JSON.stringify({data: data})).then(r => {
            this.onImported();
        }).finally(() => {
            uploadButton.disabled = false;
        });
    }

    valueClearing(str) {
        str = str.replace(/\r?\n/g, '');
        str = str.replace(/\r/g, '');
        return str;
    }

    valueFormat(key, d) {
        switch (key) {
            case 'wage_type ':
                if (d == '給与') d == 1;
                else if (d == '賞与') d == 2;
                break;
            default:
                break;
        }
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
}