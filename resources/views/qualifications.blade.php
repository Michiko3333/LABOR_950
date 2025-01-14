<x-layout title="資格マスタ" useRightContent="{{ true }}">
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
                margin-bottom: 0.3em;
                padding: 0.35em 0.7em;
                line-height: 1;
                color: #0009;
                text-transform: none;
                font-weight: 700;
                border-radius: 0.2em;
            }

            .edit-qualifications-modal label {
                font-size: 14px !important;
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
                資格「<span class="remove-qualification_name"></span>」を削除しますか？
            </div>
            <div class="actions">
                <button class="ui button cancel" type="button">キャンセル</button>
                <div class="ui approve red button" onClick="javascript:$lw.onRemove()">削除</div>
            </div>
        </div>
    </section>

    <script type="module">
        $('.ui.dropdown.managerial_position_ids').dropdown();

        const modal = $('#editQualifications').modal({
            blurring: true,

        });
        const removeModal = $('#removeQualifications').modal({
            blurring: true,
        });

        function getPositionList(id, managerial_position_ids = false) {
            $('select[name="managerial_position_ids[]"]').dropdown('clear');
            $.ajax({
                    url: '{{ route('qualifications.get_position') }}',
                    data: {
                        company_id: id
                    },
                    type: 'post'
                })
                .done((data) => {
                    $('select[name="managerial_position_ids[]"]').empty();
                    data = [{
                        id: '',
                        name: '未選択'
                    }, ...data];
                    data.forEach(element => {
                        $('<option>').attr({
                            value: element.id
                        }).text(element.name).appendTo('select[name="managerial_position_ids[]"]');
                    });
                    if(managerial_position_ids) {
                        const def = managerial_position_ids;
                        def.forEach(v => {
                            let a = $('select[name="managerial_position_ids[]"] option[value=' + v + ']').prop(
                                'selected', true);
                        });
                    }
                });
        }

        Livewire.on('showModal', (data) => {
            const d = data[0];
            modal.modal({
                onShow: () => {
                    $('.edit-qualifications-form_id').val(d.form_id);
                    $('.edit-qualifications-form_qualification_name').val(d.form_qualification_name);
                    $('.edit-qualifications-form_qualification_allowance').val(d.form_qualification_allowance);
                    $('.edit-qualifications-form_applicable_grade').val(d.form_applicable_grade);
                    $('.edit-qualifications-form_other').val(d.form_other);
                },
                onHidden: () => {
                    window.$lw.isSubmit = false;
                }
            });
            $('.edit-qualifications-modal .ui.error.message').addClass('hidden');
            modal.modal('show');
            getPositionList(@json($company_id), d.form_managerial_position_ids);
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
