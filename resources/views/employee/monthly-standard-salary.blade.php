<x-layout title="標準報酬月額（定時・随時）" useRightContent="{{ true }}">
    @slot('header')
        <style type="text/css">
            .ui.table {
                border: none;
                borde-radius: 8px;
                margin-top: 0;
            }

            .ui.table>tbody>tr>td {
                padding: 1.6em .7em;
            }

            div.filter {
                background: #f9fafb;
                padding: 1em;
                borde-radius: 8px;
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

            .import-modal .header-fixed-table {
                width: 100%;
                height: 150px;
                overflow-y: scroll;
            }

            .import-modal .header-fixed-table table {
                border-collapse: collapse;
                width: 100%;
            }

            .import-modal .header-fixed-table table thead th {
                padding: 0.5em;
                z-index: 2;
            }

            .import-modal .header-fixed-table table thead th:first-of-type {
                z-index: 3;
            }

            .import-modal .header-fixed-table table tbody th {
                z-index: 1;
            }

            .import-modal .header-fixed-table table th {
                position: sticky;
                top: 0;
                left: 0;
                background: #F9FAFB;
            }

            .import-modal .header-fixed-table table th:before {
                content: "";
                position: absolute;
                top: -1px;
                left: -1px;
                width: 100%;
                height: 100%;
                border: 1px solid #ccc;
                border-bottom: none;
                border-left: none;
            }

            .import-modal .header-fixed-table table th:last-child:before {
                border-right: none;
            }

            .import-modal .header-fixed-table table td {
                position: relative;
            }

            .import-modal .header-fixed-table table td:before {
                content: "";
                position: absolute;
                top: -1px;
                left: -1px;
                width: 100%;
                height: 100%;
                border: 1px solid #ccc;
                border-bottom: none;
                border-left: none;
            }

            .import-modal .header-fixed-table table td:last-child:before {
                border-right: none;
            }

            .import-modal .header-fixed-table.unknown table td {
                color: var(--color-red);
            }
        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">標準報酬月額（定時・随時）</div>
        </div>
        <h1 class="mt-0">標準報酬月額（定時・随時）</h1>
        <a class="ui button primary mt-1 mb-2 button-disable small" type="button"
            href="javascript:openImportModal()">インポート
        </a>
        <div class="context">
            <div class="ui tabular menu" style="margin-bottom: 0;">
                <a class="item active" data-tab="one">定時改定表</a>
                <a class="item" data-tab="two">随時改定表</a>
                <a class="item" data-tab="three">改訂履歴</a>
            </div>
            <div class="ui tab segment" style="margin-top: 0; border-top: none;" data-tab="one">
                <livewire:fixed-revision :company_id="$company_id" />
            </div>
            <div class="ui active tab segment" style="margin-top: 0; border-top: none;" data-tab="two">
                <livewire:anytime-revision :company_id="$company_id" />
            </div>
            <div class="ui tab segment" style="margin-top: 0; border-top: none;" data-tab="three">
                <livewire:history-revision :company_id="$company_id" />
            </div>
        </div>

        <div class="ui tiny modal revision-modal">
            <div class="header">標準報酬月額改定</div>
            <livewire:revision-modal-content :company_id="$company_id" :fixed_flg="0" />
        </div>
        <div class="ui fullscreen modal revision-history-modal">
            <div class="header revision-history-modal-header"></div>
            <livewire:revision-history-modal-content />
            <div class="actions" style="text-align: right;">
                <div class="ui negative button">戻る</div>
            </div>
        </div>
        <div class="ui small modal import-modal">
            <div class="header">標準報酬月額改定をインポート</div>
            <livewire:import-monthly-standard />
            <div class="actions" style="text-align: right;">
                <button class="ui cancel button">キャンセル</button>
                <button class="ui approve primary button" type="button" form="monthly_standard_form"
                    disabled>インポート</button>
            </div>
        </div>
    </section>

    <script type="module">
        $('.context .menu .item').tab({
            context: 'parent'
        });
        $(document).ready(function() {
            window.openModal = (fixed_flg, id) => {
                Livewire.dispatch('revisionModalOpened', {
                    id: id,
                    fixed_flg: fixed_flg,
                });
                setTimeout(() => {
                    $('.revision-modal').modal({
                        blurring: true,
                        onHidden: () => {
                            window.closeRevisionModal();
                        }
                    }).modal('show');
                }, 200);
            };
            window.addEventListener('closeRevisionModal', () => {
                $('.revision-modal').modal({
                    blurring: true,
                    onHidden: function() {
                        location.reload();
                    },
                }).modal('hide');
            });
            window.openHistoryModal = (name, employee_id) => {
                Livewire.dispatch('revisionHistoryModalOpened', {
                    employee_id: employee_id,
                });
                setTimeout(() => {
                    $('.revision-history-modal').modal({
                        blurring: true,
                    }).modal('show');
                    $('.revision-history-modal-header').text(name + 'さんの標準報酬月額　新旧対象履歴表（10年以内）');
                }, 200);
            };

            window.openImportModal = () => {
                Livewire.dispatch('importModalOpened');
                setTimeout(() => {
                    $('.import-modal').modal({
                        blurring: true,
                        onShow: () => {
                            Livewire.dispatch('on-import-modal-show');
                            $('.import-modal button.approve').prop('disabled', true);
                            $('#monthly_standard_zip').val('');
                        },
                        onApprove: () => {
                            Livewire.dispatch('importDataSubmitted');
                        }
                    }).modal('show');
                }, 200);
            };
            Livewire.on('import-data-updated', (data) => {
                const d = data[0];
                const insertData = d['insertData'];
                $('.import-modal button.approve').prop('disabled', insertData.length < 1);
            });
            Livewire.on('import-modal-closed', (result) => {
                if (result) {
                    $.toast({
                        position: 'bottom right',
                        class: 'success',
                        message: `アップロードが完了しました`
                    });
                } else {
                    $.toast({
                        position: 'bottom right',
                        class: 'error',
                        message: `アップロードに失敗しました`
                    });
                }
            });
        });
    </script>
</x-layout>
