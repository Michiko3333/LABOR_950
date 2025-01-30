class PowerTableList {
    constructor(options = {}) {

        this.option_data = {
            mode: 'api',
            api: {
                list: '',
                post: ''
            },
            elementIds: {},
            useFilter: false,
            useEdit: false,
            ...options
        }
        
        this.mode = this.option_data.mode;

        this.rowHeight = 32;
        this.totalRows = 0;
        this.visibleRows = 10;
        this.startIndex = 0;

        this.spacerTop;
        this.spacerBottom;
        this.resize;

        this.ticking = false;
        this.isEdit = false;

        this.userFilter = this.option_data.userFilter;
        this.useEdit = this.option_data.useEdit;

        this.elementIds = {
            wrapper: 'pt',
            list: 'pt-list',
            body: 'pt-list-body',
            header: 'pt-list-header',
            heaight_container: 'pt-height-container',
            editbtn: 'pt-edit-button',
            cancelbtn: 'pt-cancel-button',
            submitbtn: 'pt-submit-button',
            filter: 'pt-filter-form',
            result_num : 'pt-result-num',
            ...this.option_data.elementIds
        };

        this.height_container = document.getElementById(this.elementIds.heaight_container);
        this.data = [];
        this.json = { data: [], columns_map: [] };
        this.columns_map = [];
        this.item_nodes = [];

        this.dirtyVal = [];
        this.dirtyName= [];
        this.dirtyRemove = [];

        this.base_uri = this.option_data.api.list;
        this.post_uri = this.option_data.api.post;

        this.useSort = true;
        this.sortKey = '';
        this.sortOrder = 1;

        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();
        this.currentYear = currentYear;

        this.wrapper = document.getElementById(this.elementIds.wrapper);
        const list = document.getElementById(this.elementIds.list);  
        list.addEventListener('scroll', (e) => {
            if (!this.ticking) {
                window.requestAnimationFrame(() => {
                    const scrollTop = list.scrollTop;
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
            const list = document.getElementById(this.elementIds.list);
            this.visibleRows = Math.floor(list.offsetHeight / 32);            
        });

        if (this.useEdit) {
            const el_edit = document.getElementById(this.elementIds.editbtn);
            el_edit.addEventListener('click', e => {
                this.isEdit = true;
                el_edit.style.display ='none';
                document.getElementById(this.elementIds.cancelbtn).style.display ='inline';
                document.getElementById(this.elementIds.submitbtn).style.display ='inline';
                this.rows();
            });

            const el_cancel = document.getElementById(this.elementIds.cancelbtn);
            el_cancel.style.display ='none';
            el_cancel.addEventListener('click', e => {
                this.isEdit = false;
                el_cancel.style.display ='none';
                document.getElementById(this.elementIds.editbtn).style.display ='inline';
                document.getElementById(this.elementIds.submitbtn).style.display ='none';
                this.createNodes();
                this.rows();
                this.dirtyVal = [];
                this.dirtyName= [];
                this.dirtyRemove = [];
            });

            const el_submit = document.getElementById(this.elementIds.submitbtn);
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

                const formData = new FormData(document.forms[this.elementIds.filter]);
                let conditions = {};
                for (let d of formData.entries()) { 
                    conditions[d[0]] = d[1];
                }

                const data = this.beforeSubmit({
                    column: column_res,
                    change_name: this.dirtyName,
                    remove_name: this.dirtyRemove,
                    conditions: {
                        conditions: conditions,
                    }
                });

                this.submit(this.post_uri, JSON.stringify(data)).then(r => {
                    this.isEdit = false;
                    document.getElementById(this.elementIds.editbtn).style.display ='inline';
                    document.getElementById(this.elementIds.submitbtn).style.display ='none';
                    document.getElementById(this.elementIds.cancelbtn).style.display ='none';
                    this.dirtyVal = [];
                    this.dirtyName = [];
                    this.dirtyRemove = [];
                    this.load();
                    this.afterSubmit(true);
                }).catch(err => {
                    this.afterSubmit(false, err);
                });
            });
            el_submit.style.display ='none';
        } else {
            const el_edit = document.getElementById(this.elementIds.editbtn);
            const el_cancel = document.getElementById(this.elementIds.cancelbtn);
            const el_submit = document.getElementById(this.elementIds.submitbtn);
            el_edit.style.display = 'none';
            el_cancel.style.display = 'none';
            el_submit.style.display = 'none';
        }
    }

    setJson(json) {
        this.json = json;
    }

    onLoad(d) {}
    afterLoaded() {}
    onRefreshRow() {}
    onReady() {}
    onRefreshed() {}
    beforeSubmit(data) { return data }
    afterSubmit(bool, err = null) {}
    createLoadQuery(url) {
        const formData = new FormData(document.forms[this.elementIds.filter]);
        for (let d of formData.entries()) { 
            url.searchParams.append(d[0], d[1]);
        }
        [...url.searchParams.keys()].forEach(key => {
            if (!url.searchParams.get(key)) {
                url.searchParams.delete(key);
            }
        });
        return url.toString();
    }
    createdNodes(columnKeys, ListHeader, ListBody) {}
    onCreateHeader(parent, key, item) {
        const th = this.createHeaderElement(item);
        parent.appendChild(th);
    }
    onCreateCell(parent, key, item) {        
        const td = document.createElement('td');
        const label = document.createElement('div');
        label.classList.add('label');
        label.dataset.id = item['id'];
        label.dataset.key = key;
        label.textContent = item[key];
        td.dataset.id = item['id'];
        td.dataset.key = key;
        td.dataset.amount = label.textContent;        
        td.appendChild(label);
        parent.appendChild(td);
        return [td, label];
    }

    get(url) {
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();

            xhr.open("GET", url, true);
            xhr.setRequestHeader('Accept', 'application/json');
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
        if (this.mode == 'api') {
            const url = new URL(this.base_uri);
            const target = this.createLoadQuery(url);
            this.get(target).then(d => {
                const data = JSON.parse(d);
                this.data = data['data'];
                this.columns_map = data['columns_map'];
                
                this.onLoad(data);
    
                this.createNodes();
                this.startIndex = 0;            
                this.totalRows = this.item_nodes.length;
                if (isReady) this.ready();
                this.rows();
                this.setSortHeder();
                this.afterLoaded();

                const resultNum = document.getElementById(this.elementIds.result_num);
                if (resultNum) resultNum.textContent = this.item_nodes.length;
            })
        } else if (this.mode == 'json') {            
            this.data = this.json['data'];
            this.columns_map = this.json['columns_map'];
            this.onLoad(this.json);
    
            this.createNodes();
            this.startIndex = 0;            
            this.totalRows = this.item_nodes.length;
            if (isReady) this.ready();
            this.rows();
            this.setSortHeder();
            this.afterLoaded();

            const resultNum = document.getElementById(this.elementIds.result_num);
            if (resultNum) resultNum.textContent = this.item_nodes.length;
        }
    }

    rows() {
        const ListBody = document.getElementById(this.elementIds.body);
        const ListHeader = document.getElementById(this.elementIds.header);
        ListBody.innerHTML = "";
        const endIndex = Math.min(this.startIndex + this.visibleRows, this.totalRows);
        
        this.spacerTop.style.height = `${this.startIndex * this.rowHeight}px`;
        this.spacerBottom.style.height =
            `${(this.totalRows - endIndex) * this.rowHeight}px`;
            
        ListBody.appendChild(this.spacerTop);
        if (this.item_nodes.length > 0) {            
            for (let i = 0; i < this.visibleRows; i++) {
                const currentIndex = this.startIndex + i;
                if (currentIndex < this.totalRows) {                    
                    const row = this.item_nodes.slice(currentIndex) ?? [];
                    if (row.length > 0) ListBody.appendChild(...row);
                    this.onRefreshRow(row)
                }
            }
        }
        ListBody.appendChild(this.spacerBottom);

        const viewElements = ListBody.querySelectorAll('.view');
        const InputElements = ListBody.querySelectorAll('.edit-input');
        if (this.isEdit) {
            viewElements.forEach(element => {
                element.classList.add('hidden');
            });
            InputElements.forEach(element => {
                element.classList.remove('hidden');
            });
            ListHeader.classList.add('edit');
        } else {
            viewElements.forEach(element => {
                element.classList.remove('hidden');
            });
            InputElements.forEach(element => {
                element.classList.add('hidden');
            });
            ListHeader.classList.remove('edit');
        }
        this.onRefreshed();

    }


    ready() {
        const list = document.getElementById(this.elementIds.list);

        this.totalRows = this.item_nodes.length;
        this.visibleRows = Math.floor(list.offsetHeight / 32);
        this.startIndex = 0;
        

        this.spacerTop = document.createElement("tr");
        this.spacerBottom = document.createElement("tr");
        this.spacerTop.style.height = "0px";
        this.spacerBottom.style.height = `${(this.totalRows - this.visibleRows) * this.rowHeight}px`;
        this.spacerTop.style.visibility = this.spacerBottom.style.visibility = "hidden";
        this.spacerTop.style.pointerEvents = "none";
        this.spacerBottom.style.pointerEvents = "none";
        
        this.onReady();
    }

    setSort(key, order) {
        this.sortKey = key;
        this.sortOrder = order;        
        this.load();
    }

    createNodes() {
        this.item_nodes = [];
        const ListBody = document.getElementById(this.elementIds.body);
        ListBody.innerHTML = "";
        const ListHeader = document.getElementById(this.elementIds.header);
        ListHeader.innerHTML = '';
        const columnKeys = Object.keys(this.columns_map);
        // Headers
        for (let i = 0; i < columnKeys.length; i++) {
            const key = columnKeys[i];
            const item = this.columns_map[key];
            this.onCreateHeader(ListHeader, key, item);
        }

        // Content
        for (let i = 0; i < this.data.length; i++) {            
            const item = this.data[i];
            const tr = document.createElement('tr');
            tr.dataset.id = item['id'];
            for (let j = 0; j < columnKeys.length; j++) {
                const key = columnKeys[j];
                this.onCreateCell(tr, key, item);
            }
            this.item_nodes.push(tr);
        }
        if (this.sortKey && this.useSort) this.sortItemNodes(this.sortKey, this.sortOrder);
        this.createdNodes(columnKeys, ListHeader, ListBody);
    }

    createHeaderElement(item) {
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
        th.appendChild(span);
        th.addEventListener('click', e => {            
            if (this.isEdit || !this.useSort) return;
            if (this.sortKey == item['key']) {
                if (this.sortOrder == 1) {
                    this.setSort(item['key'], 0);
                } else {
                    this.setSort(item['key'], 1);
                }
            } else {
                this.setSort(item['key'], 1);
            }
            
        });
        return th;
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

    setSortHeder() {
        const List = document.getElementById(this.elementIds.header);
        for (let i = 0; i < List.children.length; i++) {
            const th = List.children[i];
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

    baseInputCell(key, item) {
        const td = document.createElement('td');
        const input = document.createElement('input');
        input.classList.add('edit-input');
        input.dataset.id = item['id'];
        input.dataset.section = 'column';
        input.dataset.key = key;
        input.autocomplete = 'off';
        input.addEventListener('change', e => { this.onChangeInput(e) });
        td.appendChild(input);
        const label = document.createElement('div');
        label.classList.add('view');
        label.dataset.id = item['id'];
        td.appendChild(label);
        td.dataset.id = item['id'];
        td.dataset.key = key;
        td.dataset.amount = item[key];
        input.value = item[key];
        label.textContent = item[key];
        return [td, input, label];
    }
}