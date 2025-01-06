class WageFilter {
    constructor(wageList) {
        this.wageList = wageList;
        this.onRender = () => {};
        this.onLoadedShowlist = () => {};
        this.filterConditionNodes = [];
        this.filiter = {};
        this.isOrdinaryFiltered = false;
        this.wrapperId = 'wage-filter-conditions';
        const condition_btn = document.getElementById('add-condition');
        condition_btn.addEventListener('click', () => this.onAdd());
        const filter_save_btn = document.getElementById('open-filter-save');
        filter_save_btn.addEventListener('click', () => {
            this.saveFilter();
        });
        const filter_remove_btn = document.getElementById('remove-ordinary-btn');
        filter_remove_btn.addEventListener('click', () => {
            this.wageList.post(this.wageList.filter_remove_uri).then(r => {
                this.isOrdinaryFiltered = false;
                this.showRemoveOrdinaryBtn();
            });
        });
    }

    init() {
        this.wageList.get(this.wageList.filter_showlist_uri).then(r => {
            const res = JSON.parse(r);
            const showlist_wrapper = document.getElementById('filter-showlist-wrapper');
            showlist_wrapper.innerHTML = '';
            for (let i = 0; i < res.length; i++) {
                const col = res[i];
                const div = document.createElement('div');
                const label = document.createElement('label');
                const check = document.createElement('input');
                const text = document.createTextNode(col.name);
                div.classList.add('ui', 'checkbox');
                check.type = 'checkbox';
                check.name = 'show-' + col.key;
                check.classList.add('hidden');
                check.dataset.key = col.key;
                check.value = "1";
                div.dataset.key = col.key;
                label.appendChild(text);
                div.appendChild(check);
                div.appendChild(label);
                showlist_wrapper.appendChild(div);
            }
            this.onLoadedShowlist();

            this.wageList.get(this.wageList.filter_load_uri).then(r => {
                const res = JSON.parse(r);
                if (!Object.keys(res).length < 1) {
                    this.isOrdinaryFiltered = true;
                    const json = JSON.parse(res.data);
                    this.setFilter(json);
                } else {
                    this.setFilter({});
                }
                this.wageList.load(true);
                this.showRemoveOrdinaryBtn();
            });
        });
        
    }

    showRemoveOrdinaryBtn() {
        const btn = document.querySelectorAll('#wage-filter .remove-ordinary-btn');
        if (this.isOrdinaryFiltered) {
            btn.forEach(el => el.classList.remove('hidden'));
        } else {
            btn.forEach(el => el.classList.add('hidden'));
        }
    }

    setFilter(j) {
        this.filter = {
            conditions: [],
            show_list: [],
            wage_type: null,
            wage_branch: null,
            wage_department: '',
            employment_type: '',
            work_type: '',
            grade: '',
            gradational_salary: '',
            other_type: '',
            ...j
        };
        const json = this.filter;
        const wage_type = document.getElementsByName('wage_type');
        wage_type.forEach(select => {
            for (let i = 0; i < select.children.length; i++) {
                const option = select.children[i];
                if (option.value == json.wage_type) {
                    option.dataset.n = 0;
                    option.selected = true;
                }
            }
        });
        const wage_branch = document.getElementsByName('wage_branch');
        wage_branch.forEach(select => {
            for (let i = 0; i < select.children.length; i++) {
                const option = select.children[i];
                if (option.value == json.wage_branch) {
                    option.dataset.n = 0;
                    option.selected = true;
                }
            }
        });

        const wage_department = document.getElementsByName('wage_department');
        wage_department.forEach(el => el.value = json.wage_department);
        const employment_type = document.getElementsByName('employment_type');
        employment_type.forEach(el => el.value = json.employment_type);
        const work_type = document.getElementsByName('work_type');
        work_type.forEach(el => el.value = json.work_type);
        const grade = document.getElementsByName('grade');
        grade.forEach(el => el.value = json.grade);
        const gradational_salary = document.getElementsByName('gradational_salary');
        gradational_salary.forEach(el => el.value = json.gradational_salary);
        const other_type = document.getElementsByName('other_type');
        other_type.forEach(el => el.value = json.other_type);

        this.filterConditionNodes = [];

        json.conditions.forEach(cond => {
            const row = this.createNode();
            const cond_target = row.querySelectorAll('[name="cond_target[]"]');
            cond_target.forEach(el => el.value = cond.name);
            const cond_amount = row.querySelectorAll('[name="cond_amount[]"]');
            cond_amount.forEach(el => el.value = cond.amount);
            const cond_comparison = row.querySelectorAll('[name="cond_comparison[]"]');
            cond_comparison.forEach(select => {
                for (let i = 0; i < select.children.length; i++) {
                    const option = select.children[i];
                    if (option.value == cond.cond_comparison) {
                        option.dataset.n = 0;
                        option.selected = true;
                    }
                }
            });
            this.filterConditionNodes.push(row);
        });

        const showlist_wrapper = document.getElementById('filter-showlist-wrapper');
        Object.keys(json.show_list).forEach(key => {
            const keyName = 'show-' + key;
            const input = showlist_wrapper.querySelector('input[name="' + keyName + '"][type="checkbox"]');
            if (input) input.checked = true;
        });

        this.onLoadedShowlist();
        this.render();
    }

    onAdd() {
        if (this.filterConditionNodes.length > 9) return;
        const node = this.createNode();
        this.filterConditionNodes.push(node);
        this.render();
    }

    render() {
        const wrapper = document.getElementById(this.wrapperId);
        wrapper.innerHTML = '';
        let i = 0;
        this.filterConditionNodes.forEach((node, i) => {
            node.dataset.key = i;
            wrapper.appendChild(node);
        });
        this.onRender();
    }

    onApprove() {
        const formData = new FormData(document.forms.wage_filter);
        const data = {};
        for (let d of formData.entries()) {
            const key = d[0];
            const val = d[1];
            if (/.*\[\]$/.test(key)) continue;
            data[key] = val;
        }
        const conditions = [];
        this.filterConditionNodes.forEach((node, i) => {
            const condition = {
                name: null,
                amount: null,
                comparison: null
            };
            const cond_target = node.querySelectorAll('[name="cond_target[]"]');
            cond_target.forEach(el => condition.name = el.value);
            const cond_amount = node.querySelectorAll('[name="cond_amount[]"]');
            cond_amount.forEach(el => condition.amount = el.value);
            const cond_comparison = node.querySelectorAll('[name="cond_comparison[]"]');
            cond_comparison.forEach(el => condition.comparison = el.value);
            conditions.push(condition);
        });
        this.filter = {
            conditions: conditions,
            ...data
        }
    }

    onHidden() {
        this.setFilter(this.filter);
    }

    onRemove(e) {
        const row = e.target.parentElement;
        const index = row.dataset.key;
        this.filterConditionNodes.splice(index, 1);
        this.render();
    }

    createNode() {
        // Create the container div
        const row = document.createElement('div');
        row.className = 'filter-condition-row';

        // Create the first input element
        const inputText = document.createElement('input');
        inputText.className = 'ui input';
        inputText.type = 'text';
        inputText.maxLength = 20;
        inputText.name = 'cond_target[]';
        inputText.placeholder = '項目名';
        row.appendChild(inputText);

        // Create the first label
        const label1 = document.createElement('div');
        label1.className = 'label';
        label1.textContent = 'が';
        row.appendChild(label1);

        // Create the second input element
        const inputNumber = document.createElement('input');
        inputNumber.className = 'ui input';
        inputNumber.type = 'number';
        inputNumber.min = 0;
        inputNumber.max = 99999999;
        inputNumber.name = 'cond_amount[]';
        row.appendChild(inputNumber);

        // Create the second label
        const label2 = document.createElement('div');
        label2.className = 'label';
        label2.textContent = '円';
        row.appendChild(label2);

        // Create the select element
        const select = document.createElement('select');
        select.className = 'ui fluid dropdown wage-filter';
        select.name = 'cond_comparison[]';

        const option1 = document.createElement('option');
        option1.value = '0';
        option1.textContent = '以上';
        select.appendChild(option1);

        const option2 = document.createElement('option');
        option2.value = '1';
        option2.textContent = '以下';
        select.appendChild(option2);

        row.appendChild(select);

        // Create the button element
        const button = document.createElement('button');
        button.className = 'ui button basic red';
        button.type = 'button';
        button.textContent = '削除';
        button.addEventListener('click', (e) => this.onRemove(e));
        row.appendChild(button);

        return row;
    }

    saveFilter() {
        const formData = new FormData(document.forms.wage_filter);
        this.wageList.post(this.wageList.filter_save_uri, formData);
    }
}