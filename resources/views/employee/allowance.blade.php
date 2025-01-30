<x-layout title="手当マスタ" useRightContent="{{ true }}">
    @slot('header')
    <style type="text/css">
        .ui.table {
            border: none;
            border-radius: 8px;
            margin-top: 0;
        }
        .ui.table>tbody>tr>td {
            padding: 1.6em .7em;
        }
        div.filter {
            background: #f9fafb;
            padding: 1em;
            border-radius: 8px;
        }
        div.pagination {
            display: flex;
            justify-content: center;
        }
        span.tag {
            display: inline-block;
            background: #e8e8e8;
            padding: 0.35em 0.7em;
            line-height: 1;
            color: #0009;
            text-transform: none;
            font-weight: 700;
            border-radius: 0.2em;
        }
    </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">手当マスタ</div>
        </div>
        <h1 class="mt-0">手当マスタ</h1>
        <livewire:allowance-list :company_id="$company_id"/>
        
        <div class="ui tiny modal allowance-modal">
            <div class="header allowance-modal-header"></div>
            <livewire:allowance-modal-content :company_id="$company_id"/>
        </div>

        <div id="removeInformation" class="ui modal mini cancel-modal">
            <i class="close icon"></i>
            <div class="header">手当の削除</div>
            <div class="content">
                <livewire:cancel-modal-content />
            </div>
        </div>
    </section>
    <script type="module">
        $(document).ready(function() {
            window.openModal = (id = null,name = null) => {
                Livewire.dispatch('allowanceModalOpened', {
                    id: id,
                });
                setTimeout(() => {
                    $('.allowance-modal').modal({
                        blurring: true,
                        onHidden: () => {
                            window.closeAllowanceModal();
                        }
                    }).modal('show');
                }, 200);
                if(id == null){
                    $('.allowance-modal-header').text("手当の追加");
                }else{
                    $('.allowance-modal-header').text(`手当「${name}」を履歴に追加しますか？`);
                }
            };
            window.addEventListener('closeAllowanceModal', () => {
                const selectedBranchId = document.getElementById('branch_id').value;
                const selectedHistoryFlg = document.getElementById('history_flg').value;
                localStorage.setItem('selectedBranchId', selectedBranchId);
                localStorage.setItem('selectedHistoryFlg', selectedHistoryFlg);
                localStorage.setItem('isFromModalClose', 'true');
                $('.allowance-modal').modal('hide');
                location.reload();
            });
            window.remove = (name,allowanceId) => {
                Livewire.dispatch('cancelModalOpened', {
                    allowanceHistoryId: null,
                    allowanceId: allowanceId,
                    receptionistId: null,
                    managerialPositionId: null,
                    closureId: null,
                    name: name,
                    dependentId: null,
                });
                setTimeout(() => {
                    $('.cancel-modal').modal({
                        blurring: true,
                        onHidden: () => {
                            window.closeAllowanceModal();
                        }
                    }).modal('show');
                }, 200)
            };
            window.removeHistory = (name,allowanceHistoryId) => {
                Livewire.dispatch('cancelModalOpened', {
                    allowanceHistoryId: allowanceHistoryId,
                    allowanceId: null,
                    receptionistId: null,
                    managerialPositionId: null,
                    closureId: null,
                    name: name,
                    dependentId: null,
                });
                setTimeout(() => {
                    $('.cancel-modal').modal({
                        blurring: true
                    }).modal('show');
                }, 200)
            };
            window.closeCancelModal = () => {
                $('.cancel-modal').modal('hide');
            };
            window.addEventListener('closeCancelModal', () => {
                $('.cancel-modal').modal('hide');
                const selectedBranchId = document.getElementById('branch_id').value;
                const selectedHistoryFlg = document.getElementById('history_flg').value;
                localStorage.setItem('selectedBranchId', selectedBranchId);
                localStorage.setItem('selectedHistoryFlg', selectedHistoryFlg);
                localStorage.setItem('isFromModalClose', 'true');
                location.reload();
            });
        });
    </script>
</x-layout>