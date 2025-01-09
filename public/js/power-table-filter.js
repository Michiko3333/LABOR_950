class PowerTableFilter {
    constructor(List, options) {
        const option_data = {
            api: {
                load: '',
                save: '',
                remove: '',
                showlist: '',
            },
            elementIds: {},
            ...options
        };
        this.PowerList = List;
        this.isOrdinaryFiltered = false;
        this.api = {
            load: '',
            save: '',
            remove: '',
            showlist: '',
            ...option_data.api
        };
        this.elementIds = {
            form: 'pt-filter-form',
            saveBtn: 'pt-filter-save',
            removeBtn: 'pt-filter-remove',
            showlist: 'pt-showlist-wrapper',
            ...option_data.elementIds
        }
        this.filter = {};
        this.addEvents();
    }

    run() {
        const task1 = this.PowerList.get(this.api.showlist);
        const task2 = this.PowerList.get(this.api.load);

        task1.then(r => {
            const res = JSON.parse(r);
            this.onLoadShowlist(res);
            return task2;
        }).then(r => {
            const res = JSON.parse(r);
            if (!Object.keys(res).length < 1) {
                this.isOrdinaryFiltered = true;
                const json = JSON.parse(res.data);
                this.setFilterConfig(json);
            } else {
                this.setFilterConfig({});
            }
            this.showRemoveBtn();
            this.PowerList.load(true);
        })
    }

    reload() {
        this.PowerList.load();
    }

    save() {        
        const formData = new FormData(document.forms[this.elementIds.form]);
        this.PowerList.post(this.api.save, formData);
    }

    remove() {
        this.PowerList.post(this.api.remove, new FormData());
    }

    addEvents() {        
        const filter_save_btn = document.getElementById(this.elementIds.saveBtn);
        filter_save_btn.addEventListener('click', () => { this.save(); });

        const filter_remove_btn = document.getElementById(this.elementIds.removeBtn);
        filter_remove_btn.addEventListener('click', () => {
            this.remove();
            this.isOrdinaryFiltered = false;
            this.showRemoveBtn();
        });
    }

    showRemoveBtn() {        
        const btn = document.getElementById(this.elementIds.removeBtn);
        if (this.isOrdinaryFiltered) {
            btn.classList.remove('hidden')
        } else {
            btn.classList.add('hidden')
        }
    }

    onHidden() {
        this.setFilterConfig(this.filter);
    }

    onLoadShowlist(res) {}
    setFilterConfig(j) {}
}