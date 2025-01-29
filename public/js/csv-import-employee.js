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

        this.fix_values = {};

        this.onImported = () => {};
        this.onFaildImport = () => {};

        this.get(this.data_uri).then(r => {            
            const res = JSON.parse(r);

            this.columns_map_tmp = res.columns_map;
            this.employee_list = res.employees;
            this.fix_values = {
                branch: res.branch,
                country_type: res.country_type,
                departments_list: res.departments_list,
                employee_insured_age_type: res.employee_insured_age_type,
                employee_qualifications: res.employee_qualifications,
                employee_status_type: res.employee_status_type,
                employee_type: res.employee_type,
                employment_insurance_type: res.employment_insurance_type,
                employment_route: res.employment_route,
                employment_status: res.employment_status,
                enrollment_category: res.enrollment_category,
                insurance_loss_reason: res.insurance_loss_reason,
                labor_insurance_type: res.labor_insurance_type,
                managerial_position_list: res.managerial_position_list,
                occupation_type: res.occupation_type,
                over_retired_insurance_loss_reason: res.over_retired_insurance_loss_reason,
                pay_type: res.pay_type,
                prefectures: res.prefectures,
                qualifications: res.qualifications,
                recruitment_category: {0: '新卒（第二新卒含む）', 1: '中途採用'},
                recruitment_category_detail: res.recruitment_category_detail,
                residential_status: res.idential_status,
                sex_type: res.sex_type,
                work_category: res.work_category,
                basic_radio: {0: '無', 1: '有'},
                yesno_radio: {0: 'いいえ', 1: 'はい'},
                insured_status: {1: '海外勤務者（介護保険適用除外）', 2: '育児休業者、産前産後休業者（社会保険免除）', 3: '特定第二号被保険者（介護保険負担有）', 4: '短期雇用特例被保険者', 5: 'その他'},
            };

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

        for (let r = 0; r < rows.length; r++) {
            const row = rows[r];
            if (row.length < 2) continue;
            
            const newRow = this.createEmptyObjectFromKeys(this.columns_map_tmp);

            for (let c = 0; c < columns.length; c++) {
                const column_name = columns[c];
                const existsBasicColumn = this.findKeyByName(this.columns_map_tmp, column_name);
                if (existsBasicColumn) {
                    newRow[existsBasicColumn] = this.valueClearing(row[c]);
                }
            }

            const rules = this.rules();
            const valid = new Valid(rules);
            valid.setDebug(true)
            let is_success = valid.check(newRow);
            const branch_name = Object.entries(this.fix_values.branch).find(([k, v]) => v.normalize("NFC") === newRow.branch_name)?.[0];
            if (branch_name) {
                newRow.branch_name = branch_name;
            } else {
                is_success = false;
            }

            const address_prefecture = Object.entries(this.fix_values.prefectures).find(([k, v]) => v.normalize("NFC") === newRow.address_prefecture)?.[0];
            if (address_prefecture) {
                newRow.address_prefecture = address_prefecture;
            } else {
                if (!rules['address_prefecture'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const emergency_address_prefecture1 = Object.entries(this.fix_values.prefectures).find(([k, v]) => v.normalize("NFC") === newRow.emergency_address_prefecture1)?.[0];
            if (emergency_address_prefecture1) {
                newRow.emergency_address_prefecture1 = emergency_address_prefecture1;
            } else {
                if (!rules['emergency_address_prefecture1'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const emergency_address_prefecture2 = Object.entries(this.fix_values.prefectures).find(([k, v]) => v.normalize("NFC") === newRow.emergency_address_prefecture2)?.[0];
            if (emergency_address_prefecture2) {
                newRow.emergency_address_prefecture2 = emergency_address_prefecture2;
            } else {
                if (!rules['emergency_address_prefecture2'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const sex = Object.entries(this.fix_values.sex_type).find(([k, v]) => v.normalize("NFC") === newRow.sex)?.[0];
            if (sex) {
                //newRow.sex = sex;
            } else {
                if (!rules['sex'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const insured_age_type = Object.entries(this.fix_values.employee_insured_age_type).find(([k, v]) => v.normalize("NFC") === newRow.insured_age_type)?.[0];
            if (insured_age_type) {
                newRow.insured_age_type = insured_age_type;
            } else {
                if (!rules['insured_age_type'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const work_category = Object.entries(this.fix_values.work_category).find(([k, v]) => v.normalize("NFC") === newRow.work_category)?.[0];
            if (work_category) {
                newRow.work_category = work_category;
            } else {
                if (!rules['work_category'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const enrollment_category = Object.entries(this.fix_values.enrollment_category).find(([k, v]) => v.normalize("NFC") === newRow.enrollment_category)?.[0];
            if (enrollment_category) {
                newRow.enrollment_category = enrollment_category;
            } else {
                if (!rules['enrollment_category'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const country_id = Object.entries(this.fix_values.country_type).find(([k, v]) => v.normalize("NFC") === newRow.country_id)?.[0];            
            if (country_id) {
                newRow.country_id = country_id;
            } else {
                if (!rules['country_id'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                }
                newRow.country_id = null;
            }

            const labor_insurance_type = Object.entries(this.fix_values.labor_insurance_type).find(([k, v]) => v.normalize("NFC") === newRow.labor_insurance_type)?.[0];
            if (labor_insurance_type) {
                newRow.labor_insurance_type = labor_insurance_type;
            } else {
                if (!rules['labor_insurance_type'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const employment_insurance_type = Object.entries(this.fix_values.employment_insurance_type).find(([k, v]) => v.normalize("NFC") === newRow.employment_insurance_type)?.[0];
            if (employment_insurance_type) {
                newRow.employment_insurance_type = employment_insurance_type;
            } else {
                if (!rules['employment_insurance_type'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const employee_type = Object.entries(this.fix_values.employee_type).find(([k, v]) => v.normalize("NFC") === newRow.employee_type)?.[0];
            if (employee_type) {
                newRow.employee_type = employee_type;
            } else {
                if (!rules['employee_type'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const employee_status = Object.entries(this.fix_values.employee_status_type).find(([k, v]) => v.normalize("NFC") === newRow.employee_status)?.[0];
            if (employee_status) {
                newRow.employee_status = employee_status;
            } else {
                if (!rules['employee_status'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const employment_route = Object.entries(this.fix_values.employment_route).find(([k, v]) => v.normalize("NFC") === newRow.employment_route)?.[0];
            if (employment_route) {
                newRow.employment_route = employment_route;
            } else {
                if (!rules['employment_route'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const recruitment_category = Object.entries(this.fix_values.recruitment_category).find(([k, v]) => v.normalize("NFC") === newRow.recruitment_category)?.[0];
            if (recruitment_category) {
                newRow.recruitment_category = recruitment_category;
            } else {
                if (!rules['recruitment_category'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const recruitment_category_detail = Object.entries(this.fix_values.recruitment_category_detail).find(([k, v]) => v.normalize("NFC") === newRow.recruitment_category_detail)?.[0];
            if (recruitment_category_detail) {
                newRow.recruitment_category_detail = recruitment_category_detail;
            } else {
                if (!rules['recruitment_category_detail'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const pay_type = Object.entries(this.fix_values.pay_type).find(([k, v]) => v.normalize("NFC") === newRow.pay_type)?.[0];
            if (pay_type) {
                newRow.pay_type = pay_type;
            } else {
                if (!rules['pay_type'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const employment_status = Object.entries(this.fix_values.employment_status).find(([k, v]) => v.normalize("NFC") === newRow.employment_status)?.[0];
            if (employment_status) {
                newRow.employment_status = employment_status;
            } else {
                if (!rules['employment_status'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const contract_period_flg = Object.entries(this.fix_values.basic_radio).find(([k, v]) => v.normalize("NFC") === newRow.contract_period_flg)?.[0];
            if (contract_period_flg) {
                newRow.contract_period_flg = contract_period_flg;
            } else {
                if (!rules['contract_period_flg'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const contract_renewal_flg = Object.entries(this.fix_values.basic_radio).find(([k, v]) => v.normalize("NFC") === newRow.contract_renewal_flg)?.[0];
            if (contract_renewal_flg) {
                newRow.contract_renewal_flg = contract_renewal_flg;
            } else {
                if (!rules['contract_renewal_flg'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const resignation_letter_request_flg = Object.entries(this.fix_values.basic_radio).find(([k, v]) => v.normalize("NFC") === newRow.resignation_letter_request_flg)?.[0];
            if (resignation_letter_request_flg) {
                newRow.resignation_letter_request_flg = resignation_letter_request_flg;
            } else {
                if (!rules['resignation_letter_request_flg'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const insured_status = Object.entries(this.fix_values.insured_status).find(([k, v]) => v.normalize("NFC") === newRow.insured_status)?.[0];
            if (insured_status) {
                newRow.insured_status = insured_status;
            } else {
                if (!rules['insured_status'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }
            
            const occupation_type = Object.entries(this.fix_values.occupation_type).find(([k, v]) => v.normalize("NFC") === newRow.occupation_type)?.[0];
            if (occupation_type) {
                newRow.occupation_type = occupation_type;
            } else {
                if (!rules['occupation_type'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const external_advisor_flg = Object.entries(this.fix_values.yesno_radio).find(([k, v]) => v.normalize("NFC") === newRow.external_advisor_flg)?.[0];
            if (external_advisor_flg) {
                newRow.external_advisor_flg = external_advisor_flg;
            } else {
                if (!rules['external_advisor_flg'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const insurance_loss_reason = Object.entries(this.fix_values.insurance_loss_reason).find(([k, v]) => v.normalize("NFC") === newRow.insurance_loss_reason)?.[0];
            if (insurance_loss_reason) {
                newRow.insurance_loss_reason = insurance_loss_reason;
            } else {
                if (!rules['insurance_loss_reason'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }

            const over_retired_insurance_loss_reason = Object.entries(this.fix_values.over_retired_insurance_loss_reason).find(([k, v]) => v.normalize("NFC") === newRow.over_retired_insurance_loss_reason)?.[0];
            if (over_retired_insurance_loss_reason) {
                newRow.over_retired_insurance_loss_reason = over_retired_insurance_loss_reason;
            } else {
                if (!rules['over_retired_insurance_loss_reason'].includes('nullable')) {
                    console.error(`Validation failed: the value of ${key} is not correct`);
                    is_success = false;
                }
            }


            if (this.employee_list.includes(newRow.employee_no)) {
                console.error(`Validation failed: Employee No. ${newRow.employee_no} is already exists`);
                is_success = false;
            }

            if (is_success) this.successed_data.push(newRow);
            else this.faild_data.push(newRow);
        }

        for (let i = 0; i < this.successed_data.length; i++) {
            const element = this.successed_data[i];
            element.id = i;
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
        const [td, label] = super.onCreateCell(parent, key, item);
        label.textContent = this.valueFormat(key, label.textContent);
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
        }).catch(() => {
            this.onFaildImport();
        }).finally(() => {
            uploadButton.disabled = false;
        });
    }

    valueClearing(str) {
        str = str.replace(/\r?\n/g, '');
        str = str.replace(/\r/g, '');
        str = str.normalize("NFC");
        return str;
    }

    valueFormat(key, d) {        
        switch (key) {
            case 'branch_name': 
                d = this.fix_values.branch[d]; 
                break;
            case 'address_prefecture': 
                d = this.fix_values.prefectures[d]; 
                break;
            case 'sex': 
                d = this.fix_values.sex_type[d]; 
                break;
            case 'insured_age_type': 
                d = this.fix_values.employee_insured_age_type[d]; 
                break;
            case 'work_category': 
                d = this.fix_values.work_category[d]; 
                break;
            case 'enrollment_category': 
                d = this.fix_values.enrollment_category[d]; 
                break;
            case 'country_id': 
                d = this.fix_values.country_type[d]; 
                break;
            case 'labor_insurance_type': 
                d = this.fix_values.labor_insurance_type[d]; 
                break;
            case 'employment_insurance_type': 
                d = this.fix_values.employment_insurance_type[d]; 
                break;
            case 'employee_type': 
                d = this.fix_values.employee_type[d]; 
                break;
            case 'employee_status': 
                d = this.fix_values.employee_status_type[d]; 
                break;
            case 'employment_route': 
                d = this.fix_values.employment_route[d]; 
                break;
            case 'recruitment_category': 
                d = this.fix_values.recruitment_category[d]; 
                break;
            case 'recruitment_category_detail': 
                d = this.fix_values.recruitment_category_detail[d]; 
                break;
            case 'pay_type': 
                d = this.fix_values.pay_type[d]; 
                break;
            case 'employment_status': 
                d = this.fix_values.employment_status[d]; 
                break;
            case 'contract_period_flg': 
                d = this.fix_values.basic_radio[d]; 
                break;
            case 'contract_renewal_flg': 
                d = this.fix_values.basic_radio[d]; 
                break;
            case 'resignation_letter_request_flg': 
                d = this.fix_values.basic_radio[d]; 
                break;
            case 'insured_status': 
                d = this.fix_values.insured_status[d]; 
                break;
            case 'occupation_type': 
                d = this.fix_values.occupation_type[d]; 
                break;
            case 'external_advisor_flg': 
                d = this.fix_values.yesno_radio[d]; 
                break;
            case 'insurance_loss_reason': 
                d = this.fix_values.insurance_loss_reason[d]; 
                break;
            case 'over_retired_insurance_loss_reason': 
                d = this.fix_values.over_retired_insurance_loss_reason[d];
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

    rules() {
        return {
            employee_no: ['required', 'max:255', "regex:[A-Z0-9]+"],
            branch_name: ['required'],
            managerial_position_name: ['nullable'],
            grade: ['nullable'],
            work_category: ['required'],
            enrollment_category: ['required'],
            transfer_date: ['nullable'],
            //division_name: ['nullable', 'max:255'],
            //division_name_kana: ['nullable', 'max:255', 'katakana'],
            last_name: ['max:255'],
            last_name_kana: ['max:255', 'katakana'],
            last_name_alphabet: ['nullable', 'max:255', "regex:^[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+$"],
            first_name: ['max:255'],
            first_name_kana: ['max:255', 'katakana'],
            first_name_alphabet: ['nullable', 'max:255', "regex:^[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+$"],
            old_last_name: ['nullable', 'max:255'],
            old_last_name_kana: ['nullable', 'max:255', 'katakana'],
            old_last_name_alphabet: ['nullable', 'max:255', "regex:^[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+$"],
            old_first_name: ['nullable', 'max:255'],
            old_first_name_kana: ['nullable', 'max:255', 'katakana'],
            old_first_name_alphabet: ['nullable', 'max:255', "regex:^[A-Z!@#\$%\^\*()_+\{\}\[\]:;<>,.?~\/\\-=]+$"],
            name_common: ['nullable', 'max:255'],
            name_common_kana: ['nullable', 'max:255', 'katakana'],
            sex: ['required'],
            birthday: ['required', 'date'],
            post_code: ['required', 'max:20', 'numeric'],
            address_prefecture: ['required'],
            address_city: ['required', 'max:255', "regex:^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$"],
            address_ward: ['required', 'max:255', "regex:^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$"],
            address_apartment: ['nullable', 'max:255', "regex:^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$"],
            address_city_kana: ['max:255', "regex:^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$"],
            address_ward_kana: ['max:255', "regex:^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$"],
            tel_area_code: ['max:10', 'regex:[0-9]+'],
            tel_city_code: ['max:10', 'regex:[0-9]+'],
            tel_subscriber_code: ['max:10', 'regex:[0-9]+'],
            fax1: ['nullable', 'regex:^0[0-9]{1,4}$'],
            fax2: ['nullable', 'regex:[0-9]{1,4}$'],
            fax3: ['nullable', 'regex:[0-9]{1,8}$'],
            mail_address1: ['nullable', 'max:255'],
            mail_address2: ['nullable', 'max:255'],
            emergency_post_code1: ['nullable', 'max:20', 'regex:[0-9]+'],
            emergency_contact1: ['nullable', 'max:255'],
            emergency_relationship1: ['nullable', 'max:255'],
            emergency_tel1: ['nullable', 'max:12', 'regex:[0-9]+'],
            emergency_address_prefecture1: ['nullable'],
            emergency_address_city1: ['nullable', 'max:255', "regex:^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$"],
            emergency_address_ward1: ['nullable', 'max:255', "regex:^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$"],
            emergency_address_apartment1: ['nullable', 'max:255', "regex:^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$"],
            emergency_address_prefecture2: ['nullable'],
            emergency_address_city2: ['nullable', 'max:255', "regex:^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$"],
            emergency_address_ward2: ['nullable', 'max:255', "regex:^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$"],
            emergency_address_apartment2: ['nullable', 'max:255', "regex:^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$"],
            country_id: ['nullable'],
            blood_type: ['nullable', 'regex:^(A|B|AB|O)$'],
            insured_age_type: ['nullable'],
            mynumber_card_no: ['nullable', 'max:12', "regex:^[0-9]{12}$"],
            social_insurance_no: ['nullable', 'max:8', 'regex:[A-Z0-9]+'],
            pension_no: ['nullable', 'max:10', 'regex:[0-9]+'],
            labor_insurance_type: ['nullable'],
            employment_insurance_type: ['nullable'],
            insurance_office_no: ['nullable', 'max:5', 'regex:[0-9]+'],
            insurer_no: ['nullable', 'max:8', 'regex:[0-9]+'],
            employee_type: ['required'],
            employee_status: ['required'],
            contract_period_flg: ['nullable'],
            contract_renewal_flg: ['nullable'],
            resignation_letter_request_flg: ['nullable'],
            employment_route: ['required'],
            private_introduction: ['nullable'],
            recruitment_category: ['required'],
            recruitment_category_detail: ['required'],
            pay_type: ['required'],
            employment_status: ['required'],
            insurance_loss_reason: ['nullable', 'numeric'],
            over_retired_insurance_loss_reason: ['nullable', 'numeric'],
            external_advisor_flg: ['nullable', 'numeric'],
            occupation_type: ['nullable', 'max:10'],
            japan_post_bank_code_no: ['nullable', 'max:8', 'regex:[0-9]+'],
            insured_status: ['nullable', 'max:21'],
            health_insurance_association_number: ['nullable', 'numeric'],
            acquisition_of_distinction: ['nullable', 'numeric'],
            welfare_pension: ['nullable', 'numeric'],
            overseas_special_exception: ['nullable', 'numeric'],
            dispatch_contract_completion: ['nullable', 'numeric'],
            bank_name: ['nullable'],
            bank_name_kana: ['nullable', 'max:255', 'katakana'],
            head_office_or_branch_office: ['nullable', 'numeric'],
            financial_institution_code: ['nullable', 'regex:[0-9]{4}+'],
            store_code: ['nullable', 'regex:[0-9]{3}+'],
            japan_bank_flg: ['nullable', 'numeric'],
            bank_account_no: ['nullable', 'max:8', 'regex:[0-9]+'],
            japan_post_bank_code_no: ['nullable', 'max:8', 'regex:[0-9]+'],

            employment_insurance_applied_date: ['nullable', 'date'],
            employment_insured_date: ['nullable', 'date'],
            employment_not_insured_date: ['nullable', 'date'],

            passed_away_date: ['nullable', 'date'],
            intended_retirement_date: ['nullable', 'date'],
            hired_date: ['nullable', 'date'],
            retirement_date: ['nullable', 'date'],

            contract_end_date: ['nullable', 'date'],
            contract_start_date: ['nullable', 'date'],
        };
    }
}