const branchModalEvent = [];
const addEventBranchModal = (func) => {
    branchModalEvent.push(func);
}
window.addEventBranchModal = addEventBranchModal;

$(document).ready(() => {
    const insertBranchDataByModal = (data) => {
        $(data['selector_br_id']).val(data['branch_id']);
        $(data['selector_br_name']).val(data['branch_name']);
        $('#' + data['modal_id']).modal('hide');
        $(data['selector_br_name']).trigger('input');

        // dataをlivewireへ返却する
        Livewire.dispatch('request-reload', { data: data });
    }

    // 選択イベントを通してlivewireからデータを受け取る
    Livewire.on('modal-onSelectBranch', ({ data }) => {
        insertBranchDataByModal(data);
        branchModalEvent.forEach(f => {
            f(data);
        });
    });
});
