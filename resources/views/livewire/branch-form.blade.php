<div class="branch-container">
    @script
        <script type="module">
            $(document).ready(function() {
                window.openPaymentConfirmModal = (branchID, index, tabName) => {
                    $wire.dispatch('confirmModalOpened', {
                        branchID: branchID,
                        index: index
                    });
                    setTimeout(() => {
                        $('.branch-payment-confirm-modal').modal({
                            blurring: true,
                        }).modal('show');
                        $('.branch-payment-confirm-modal .modal-menu .item').tab('change tab', tabName);

                    }, 0);
                };
            });
        </script>
    @endscript
    <style type="text/css">
        /* AdminBranchForm */
        .branch-item {
            background-color: #fff;
        }

        .branch-item .header {
            display: block;
            width: 100%;
            background-color: transparent;
            border: none;
            color: #13265f;
            font-family: Noto Sans JP, sans-serif;
            font-weight: 700;
            text-align: left;
            cursor: pointer;
        }

        .branch-item .header i {
            color: gray;
        }

        .branch-item.close .header i {
            transform: rotate(-90deg);
        }

        .tab-container {
            display: flex;
            height: auto;
        }

        .branch-item.close .tab-container {
            overflow: hidden;
            height: 0;
        }

        .branch-item.close .branch-control {
            display: none;
        }

        .tab-container__menu {
            width: 180px;
            padding: 12px;
            border-right: 1px solid #DEDEDF;
            flex-grow: 0;
            flex-shrink: 0;
        }

        .tab-container__menu button.item {
            display: block;
            width: 100%;
            padding: 12px;
            color: var(--color-black);
            background-color: transparent;
            border: none;
            color: var(--color-black);
            font-family: Noto Sans JP, sans-serif;
            font-weight: 700;
            text-align: left;
            cursor: pointer;
        }

        .tab-container__menu button.item.active {
            background-color: #F2F2F2;
        }

        .tab-container__area {
            width: 100%;
            padding: 12px;
            flex-grow: 1;
            flex-shrink: 1;
        }

        .tab-container__area .item {
            display: none;
        }

        .tab-container__area .item.active {
            display: block;
        }
    </style>
    @foreach ($data as $key => $item)
        @livewire(
            'branch-form-item',
            [
                'company' => $company,
                'item' => $item,
                'key' => $key,
                'list' => [
                    'place_type' => $place_type,
                    'prefectures' => $prefectures,
                    'labor_insurance_payment_method' => $labor_insurance_payment_method,
                    'start_days_of_week' => $start_days_of_week,
                    'work_style_type' => $work_style_type,
                    'branch_types' => $branch_types,
                    'labor_bureau_names' => $labor_bureau_names,
                    'labor_supervision_names' => $labor_supervision_names,
                    'pension_office_names' => $pension_office_names,
                    'hello_work_id' => $hello_work_id,
                    'salary' => $salary,
                    'bonus' => $bonus,
                    'bounty' => $bounty,
                ],
                'tabs' => $tabs,
                'paymentTabs' => $paymentTabs,
                'departments' => $departments,
                'errs' => $errs,
            ],
            key($key)
        )
    @endforeach
    <button class="append-branch mt-1" type="button" wire:click="append" {{ count($data) > 9 ? 'disabled' : '' }}><i
            class="plus circle icon"></i>事業所を追加</button>
</div>
