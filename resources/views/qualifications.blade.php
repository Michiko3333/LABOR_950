<x-layout title="資格マスタ" useRightContent="{{ true }}">
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
            <div class="active section">資格マスタ</div>
        </div>
        <h1>資格マスタ：{{ $company_name }}</h1>
        <livewire:qualifications-list :company_id="$company_id" />
        <div id="removeQualifications" class="ui modal mini remove-qualifications-modal">
            <i class="close icon"></i>
            <div class="header">
                資格の削除
            </div>
            <div class="content">
                役職「<span class="remove-qualification_name"></span>」を削除しますか？
            </div>
            <div class="actions">
                <button class="ui button cancel" type="button">キャンセル</button>
                <div class="ui approve red button" onClick="javascript:$lw.onRemove()">削除</div>
            </div>
        </div>
    </section>

    <script type="module">
        const modal = $('#editQualifications').modal({
            blurring: true,

        });
        const removeModal = $('#removeQualifications').modal({
            blurring: true,
        });

        Livewire.on('showModal', (data) => {
            const d = data[0];
            console.log(d);
            modal.modal({
                onShow: () => {
                    $('.edit-qualifications-form_id').val(d.form_id);
                    $('.edit-qualifications-form_qualification_name').val(d.form_qualification_name);
                    $('.edit-qualifications-form_qualification_allowance').val(d.form_qualification_allowance);
                    $('.edit-qualifications-form_applicable_grade').val(d.form_applicable_grade);
                },
                onHidden: () => {
                    window.$lw.isSubmit = false;
                }
            });
            $('.edit-qualifications-modal .ui.error.message').addClass('hidden');
            modal.modal('show');
        });

        Livewire.on('showRemoveModal', (d) => {
            const data = d[0];
            removeModal.modal({
                onShow: () => {
                    $('.remove-qualification_name').text(data.qualification_name)
                },
                onApprove: () => {
                    $lw.onRemove(data.id);
                }
            });
            removeModal.modal('show');
        });

        Livewire.on('showErrorMessage', (d) => {
            $('.edit-qualifications-modal .ui.error.message').removeClass('hidden');
            window.$lw.isSubmit = false;
        });
        Livewire.on('closeModal', (d) => {
            modal.modal('hide');
        });
    </script>
</x-layout>
