<x-layout title="役職マスタ登録" useRightContent="{{ true }}">
    @slot('header')
        <style type="text/css">
            ul.list-table {
                width: 100%;
                padding-left: 1.5em;
                background-color: white;
            }

            ul.list-table ul.list {
                padding-left: 1.5em;
            }

            ul.list-table li.item {
                display: inline-flex;
                justify-content: space-between;
                align-items: center;
                list-style-type: none;
                width: 100%;
                height: 44px;
                margin-bottom: 4px;
                border-bottom: solid 1px rgba(34, 36, 38, .15);
                font-weight: bold;
            }

            ul.list-table li.item div.name {
                position: relative;
            }



            ul.list-table li.item div.name::before {
                position: absolute;
                content: "-";
                font-size: 0.8em;
                width: 1em;
                height: 1em;
                top: 0;
                left: -1.4em;
            }

            #edit-managerial-position label {
                font-size: 1em;
            }
        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb mb-0">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">役職マスタ登録</div>
        </div>
        <h1>役職マスタ登録：{{ $company_name }}</h1>
        <livewire:managerial-position-list :company_id="$company_id" />
        <div id="removeManagerial" class="ui modal mini remove-managerial-position-modal">
            <i class="close icon"></i>
            <div class="header">
                役職の削除
            </div>
            <div class="content">
                役職「<span class="remove-managerial-position_name"></span>」を削除しますか？
            </div>
            <div class="actions">
                <button class="ui button cancel" type="button">キャンセル</button>
                <div class="ui approve red button" onClick="javascript:$lw.onRemove()">削除</div>
            </div>
        </div>
    </section>
    <script type="module">
        const modal = $('#editManagerial').modal({
            blurring: true,

        });
        const removeModal = $('#removeManagerial').modal({
            blurring: true,
        });

        Livewire.on('showModal', (data) => {
            const d = data[0];
            modal.modal({
                onShow: () => {
                    $('.edit-managerial-position-form_id').val(d.form_id);
                    $('.edit-managerial-position-form_name').val(d.form_name);
                    $('.edit-managerial-position-form_name_kana').val(d.form_name_kana);
                    $('.edit-managerial-position-form_rank').val(d.form_rank);
                    $('.edit-managerial-position-form_representative_flg').prop('checked',
                        d.form_representative_flg == 1);
                },
                onHidden: () => {
                    window.$lw.isSubmit = false;
                }
            });
            $('.edit-managerial-position-modal .ui.error.message').addClass('hidden');
            modal.modal('show');
        });

        Livewire.on('showRemoveModal', (d) => {
            const data = d[0];
            removeModal.modal({
                onShow: () => {
                    $('.remove-managerial-position_name').text(data.name)
                },
                onApprove: () => {
                    $lw.onRemove(data.id);
                }
            });
            removeModal.modal('show');
        });

        Livewire.on('showErrorMessage', (d) => {
            $('.edit-managerial-position-modal .ui.error.message').removeClass('hidden');
            window.$lw.isSubmit = false;
        });
        Livewire.on('closeModal', (d) => {
            modal.modal('hide');
        });
    </script>
</x-layout>
