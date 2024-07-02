<x-layout title="部署マスタ編集" useRightContent="{{ true }}">
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
        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb mb-0">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">部署マスタ編集</div>
        </div>
        <h1>部署マスタ：{{ $company_name }}</h1>
        <livewire:department-list :company_id="$company_id" />
    </section>

    <div id="removeDepartment" class="ui modal mini remove-department-modal">
        <i class="close icon"></i>
        <div class="header">
            部署の削除
        </div>
        <div class="content">
            部署「<span class="remove-department_name"></span>」を削除しますか？
        </div>
        <div class="actions">
            <button class="ui button cancel" type="button">キャンセル</button>
            <div class="ui approve red button" onClick="javascript:$lw.onRemove()">削除</div>
        </div>
    </div>

    <script type="module">
        const modal = $('#editDepartment').modal({
            blurring: true,
        });
        const removeModal = $('#removeDepartment').modal({
            blurring: true,
        });
        window.openEditModal = (d) => {
            $('.edit-department-modal .ui.error.message').addClass('hidden');
            const parent_list = d['parent_list'];
            $('.edit-department-form_parent').empty();
            $('.edit-department-form_parent').append('<option value="">指定なし</option>');
            for (const key in parent_list) {
                if (parent_list.hasOwnProperty.call(parent_list, key)) {
                    const value = parent_list[key];
                    $('.edit-department-form_parent').append('<option value="' + key + '">' + value + '</option>');
                }
            }
            modal.modal({
                onShow: () => {
                    if (d.form_parent == 0) d.form_parent = "";
                    $('.edit-department-form_id').val(d.form_id);
                    $('.edit-department-form_name').val(d.form_name);
                    $('.edit-department-form_parent').val(d.form_parent);
                    $('.edit-department-form_permission').val(d.form_permission);
                },
                onHidden: () => {
                    window.$lw.isSubmit = false;
                }
            });
            modal.modal('show');
        };
        Livewire.on('showModal', (d) => {
            openEditModal(d[0]);
        });

        Livewire.on('showRemoveModal', (d) => {
            const data = d[0];
            removeModal.modal({
                onShow: () => {
                    $('.remove-department_name').text(data.name)
                },
                onApprove: () => {
                    $lw.onRemove(data.id);
                }
            });
            removeModal.modal('show');
        });
        Livewire.on('showErrorMessage', (d) => {
            $('.edit-department-modal .ui.error.message').removeClass('hidden');
            window.$lw.isSubmit = false;
        });
        Livewire.on('closeModal', (d) => {
            modal.modal('hide');
        });
    </script>
</x-layout>
