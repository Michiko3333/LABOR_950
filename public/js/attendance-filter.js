class AttendanceFilter extends PowerTableFilter {
    constructor(List, options) {
        super(List, options);
        this.PowerList.setShowList = () => {
            this.setShowList();
        }
        
    }

    onLoadShowlist(res) {
        const showlist_wrapper = document.getElementById(this.elementIds.showlist);
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
    }

    setFilterConfig(j) {
        this.filter = {
            attendance_full_name: '',
            attendance_branch: null,
            attendance_department: null,
            employment_type: '',
            work_type: '',
            show_list: [],
            ...j
        }

        const json = this.filter;        

        const attendance_full_name = document.getElementsByName('attendance_full_name');
        attendance_full_name.forEach(el => el.value = json.attendance_full_name);

        const attendance_branch = document.getElementsByName('attendance_branch');
        attendance_branch.forEach(select => {
            for (let i = 0; i < select.children.length; i++) {
                const option = select.children[i];
                if (option.value == json.attendance_branch) {
                    option.dataset.n = 0;
                    option.selected = true;
                }
            }
        });
        const attendance_department = document.getElementsByName('attendance_department');
        attendance_department.forEach(select => {
            for (let i = 0; i < select.children.length; i++) {
                const option = select.children[i];
                if (option.value == json.attendance_department) {
                    option.dataset.n = 0;
                    option.selected = true;
                }
            }
        });
        const employment_type = document.getElementsByName('employment_type');
        employment_type.forEach(select => {
            for (let i = 0; i < select.children.length; i++) {
                const option = select.children[i];
                if (option.value == json.employment_type) {
                    option.dataset.n = 0;
                    option.selected = true;
                }
            }
        });
        const work_type = document.getElementsByName('work_type');
        work_type.forEach(select => {
            for (let i = 0; i < select.children.length; i++) {
                const option = select.children[i];
                if (option.value == json.work_type) {
                    option.dataset.n = 0;
                    option.selected = true;
                }
            }
        });
        const showlist_wrapper = document.getElementById(this.elementIds.showlist);
        Object.keys(json.show_list).forEach(key => {
            const keyName = 'show-' + key;
            const input = showlist_wrapper.querySelector('input[name="' + keyName + '"][type="checkbox"]');
            if (input) input.checked = true;
        });

    }

    setShowList() {
        const wrapper = document.getElementById(this.PowerList.elementIds.list);
        const showlist_wrapper = document.getElementById(this.elementIds.showlist);
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
}