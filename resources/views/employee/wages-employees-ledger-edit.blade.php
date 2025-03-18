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

            .ui.table>tbody>tr>td {
                padding: 0;
            }

            .ui.table>tbody>tr.label>td {
                padding: 0.78em;
            }

            .ui.table>tbody>tr>td input {
                width: 100%;
                height: 100%;
            }

            .ui.table>tbody>tr>td:first-child,
            .ui.table>tbody>tr>td:last-child {
                padding: 0.78em;
            }


            .type-overtime::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 2px;
                height: 100%;
                background-color: rgb(120, 63, 146);
            }

            .type-overtime-text {
                color: rgb(120, 63, 146);
            }

            .type-allowance::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 2px;
                height: 100%;
                background-color: rgb(82, 184, 82);
            }

            .type-allowance-text {
                color: rgb(82, 184, 82);
            }

            .type-salary::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 2px;
                height: 100%;
                background-color: rgb(86, 132, 201);
            }

            .type-salary-text {
                color: rgb(86, 132, 201);
            }

            .type-deduction::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 2px;
                height: 100%;
                background-color: rgb(214, 91, 91);
            }

            .type-deduction-text {
                color: rgb(214, 91, 91);
            }
        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <a class="section" href="{{ route('wages-ledger.index') }}">賃金台帳（社員選択）</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">賃金台帳（入力）</div>
        </div>
        <h1 class="mt-0">{{ $year }}年度　賃金台帳（入力）</h1>
        @livewire('wages-ledger-editor', ['employee_ids' => $employee_ids, 'year' => $year])
        <x-wage-addition-modal id="AdditionModal" additionName="additionName" additionType="additionType"
            :isBonus="false" />
        <x-wage-addition-modal id="AdditionModalBonus" additionName="additionNameBonus" additionType="additionTypeBonus"
            :isBonus="true" />
    </section>

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
                console.log(name, type);
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

        const AdditionModalBonus = $('#AdditionModalBonus').modal({
            blurring: true,
            onHidden: () => {
                $('#additionNameBonus').val('');
                $('#additionTypeBonus').val('salary_values');
            },
            onApprove: () => {
                const name = $('#additionNameBonus').val();
                const type = $('#additionTypeBonus').val();
                if (!name || !type) return false;
                Livewire.dispatch('approve-addition-bonus', {
                    name: name,
                    type: type
                });
                $('#additionNameBonus').val('');
                $('#additionTypeBonus').val('salary_values');
                return true;
            }
        });
        Livewire.on('wages-ledger-editor-render', (d) => {
            setTimeout(() => {
                $('#openNewAddition').click(_ => {
                    AdditionModal.modal('show');
                });
                $('#openNewAdditionBonus').click(_ => {
                    AdditionModalBonus.modal('show');
                });
            }, 0);


        });

        $('#openNewAddition').click(_ => {
            AdditionModal.modal('show');
        });

        $('#openNewAdditionBonus').click(_ => {
            AdditionModalBonus.modal('show');
        });

        $('#ledger-create-button').click(_ => {
            $('#ledger-create-button').prop('disabled', true);
        });
    </script>
</x-layout>
