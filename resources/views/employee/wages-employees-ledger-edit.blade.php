<x-layout title="賃金情報（入力）" useRightContent="{{ true }}">
    @slot('header')
        <style type="text/css">
            .ui.basic.label {
                display: flex;
                align-items: center;
            }

            .allowance-row {
                display: flex;
                gap: 1em;
            }

            .remove-allowance-row {
                height: 48.6px;
            }

            .pagination {
                text-align: center;
            }

            .counter {
                text-align: center;
                font-weight: bold;
            }

            .ui.scrolling.container {
                overscroll-behavior: unset;
                scrollbar-width: auto;
            }

            .ui.stuck.table tbody>tr.empty-line {
                background: #f9fafb;
            }

            .wage-editor .profile {
                display: flex;
                gap: 2em;
                align-items: center;
            }

            .wage-editor .user-icon {
                width: 140px;
                height: 140px;
                border: 1px solid #ECECEC;
                border-radius: 50%;
                overflow: hidden;
            }

            .wage-editor .user-icon img {
                width: 100%;
                height: 100%;
            }

            .hide-spin::-webkit-inner-spin-button,
            .hide-spin::-webkit-outer-spin-button {
                -webkit-appearance: none;
                -moz-appearance: textfield;
            }

            .ui.input.month {
                min-width: 90px;
                width: 100%;
                position: static;
            }

            button.remove-cotrollable {
                padding: 0;
                border: none;
                background: transparent;
                cursor: pointer;
                margin-right: 4px;
            }

            button.remove-cotrollable i {
                margin: 0;
                color: var(--color-red);
            }

            tr.label {
                background-color: #f9fafb !important;
                font-weight: bold;
            }

            .submit-area {
                display: inline-block;
                width: 100%;
                text-align: right;
            }
        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">賃金台帳（社員選択）</div>
            <i class="right chevron icon divider"></i>
            <div class="active section">賃金台帳（入力）</div>
        </div>
        <h1 class="mt-0">賃金台帳（入力）</h1>
        @livewire('wages-ledger-editor', ['employee_ids' => $employee_ids])
    </section>
    <div id="AdditionModal" class="ui modal mini addition-modal">
        <i class="close icon"></i>
        <div class="header">
            支給・手当を追加
        </div>
        <div class="content ui form">
            <div class="field">
                <label for="additionName">名称</label>
                <input type="text" name="" id="additionName" class="ui input" placeholder="〇〇手当"
                    maxLength="15">
            </div>
            <div class="field">
                <label for="additionType">種類</label>
                <select name="" id="additionType" class="ui dropdown">
                    <option value="salary_values">支給金</option>
                    <option value="overtime_values">時間外手当</option>
                    <option value="allowance_values">諸手当</option>
                </select>
            </div>
        </div>
        <div class="actions">
            <button class="ui button cancel" type="button">キャンセル</button>
            <div class="ui approve primary button">追加</div>
        </div>
    </div>

    <script type="module">
        const AdditionModal = $('#AdditionModal').modal({
            blurring: true,
            onHidden: () => {
                $('#additionName').val('');
                $('#additionType').val('salary_values');
            },
            onApprove: () => {
                const name = $('#additionName').val();
                const type = $('#additionType').val();
                if (!name || !type) return false;
                Livewire.dispatch('approve-addition', {
                    name: name,
                    type: type
                });
                $('#additionName').val('');
                $('#additionType').val('salary_values');
                return true;
            }
        });

        $('#openNewAddition').click(_ => {
            AdditionModal.modal('show');
        });

        $('#ledger-create-button').click(_ => {
            $('#ledger-create-button').prop('disabled', true);
            console.log('submit');

        });
    </script>
</x-layout>
