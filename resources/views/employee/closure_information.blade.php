<x-layout title="休業設定" useRightContent="{{ true }}">
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
            background-color: #e8e8e8;
            padding: 0.35em 0.7em;
            line-height: 1;
            color: #0009;
            text-transform: none;
            font-weight: 700;
            border-radius: 0.2em;
        }

        .employee-icon {
            width: 48px;
            height: 48px;
        }

        .employee-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .employee-info {
            display: flex;
            gap: 20px;
            font-weight: bolder;
            font-size: 1.4em;
        }
    </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">休業設定</div>
        </div>
        <h1 class="mt-0">休業情報一覧</h1>
        @if($userPermission->isWritableFor(14))
            <div id="new" class="ui floating dropdown button primary my-1">
                <div class="text" style="text-align: center; width: 103px;">追加</div>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="javascript:openModal('1','雇用保険：育児休業')">雇用保険：育児休業</a>
                    <a class="item" href="javascript:openModal('2','雇用保険：介護休業')">雇用保険：介護休業</a>
                    <a class="item" href="javascript:openModal('3','労災保険：傷病休業')">労災保険：傷病休業</a>
                    <a class="item" href="javascript:openModal('4','健康保険：産前・産後休業')">健康保険：産前・産後休業</a>
                    <a class="item" href="javascript:openModal('5','健康保険：養育特例休業')">健康保険：養育特例休業</a>
                    <a class="item" href="javascript:openModal('6','健康保険：傷病休業')">健康保険：傷病休業</a>
                    <a class="item" href="javascript:openModal('7','介護保険：介護休業')">介護保険：介護休業</a>
                </div>
            </div>
        @endif
        <div class="ui card full card-shadow item-0">
            <div class="content">
            <livewire:closure-list :company_id="$company_id"/>
            </div>
        </div>
        <div class="ui modal closure-modal">
            <div class="header closure-modal-header"></div>
            <livewire:closure-modal-content :company_id="$company_id"/>
        </div>
        <div id="removeInformation" class="ui modal mini cancel-modal">
            <i class="close icon"></i>
            <div class="header">確認</div>
            <div class="content">
                <livewire:cancel-modal-content />
            </div>
        </div>
    </section>
    <script type="module">
    $(document).ready(function() {
        $('#new').dropdown({
                action: 'hide'
            });
        window.openModal = (closure_type,closure_name,id = null) => {
            Livewire.dispatch('closureModalOpened', {
                closure_type: closure_type,
                id: id
            });
            setTimeout(() => {
                $('.closure-modal').modal({
                        blurring: true,
                        onHidden: () => {
                            closeClosureModal();
                        }
                    }).modal('show');
                $('.closure-modal-header').text(closure_name);
            }, 500);
        };
        window.addEventListener('closeClosureModal', () => {
            $('.closure-modal').modal({
                blurring: true,
                onHidden: function() {
                    location.reload();
                },
            }).modal('hide');
        });
        window.remove = (closureId) => {
            Livewire.dispatch('cancelModalOpened', {
                closureId: closureId,
                receptionistId: null,
                managerialPositionId: null,
                dependentId: null,
                allowanceId: null,
                name: null,
                allowanceHistoryId: null,
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
        });
        window.addEventListener('success', () => {
            sessionStorage.setItem('showSuccessToast', 'true');
            location.reload();
        });
        window.addEventListener('load', () => {
            if (sessionStorage.getItem('showSuccessToast') === 'true') {
                $.toast({
                    position: 'bottom right',
                    class: 'success',
                    message: `更新が完了しました`
                });

                sessionStorage.removeItem('showSuccessToast');
            }
        });
    });
    </script>
</x-layout>
