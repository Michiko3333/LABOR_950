$(document).ready(() => {
    const insertCompanyDataByModal = (data) => {
        $(data['selector_id']).val(data['id']);
        $(data['selector_name']).val(data['name']);
        $(data['selector_br_id']).val(data['branch_id']);
        $(data['selector_br_name']).val(data['branch_name']);
        $('#' + data['modal_id']).modal('hide');
        $(data['selector_name']).trigger('input');

        // dataをlivewireへ返却する
        Livewire.dispatch('request-reload', { data: data });
    }
    // 選択イベントを通してlivewireからデータを受け取る
    Livewire.on('modal-onSelectCompany', ({ data }) => { insertCompanyDataByModal(data) });
});
