<div>
    <style type="text/css">
        .ui.form .warning.message {
            display: block;
        }
    </style>

    <div class="employee-reflection-area ui form">
        <div class="error-message-w-reflection-onoff">
            <div class="ui warning message hidden" style = "margin: 20px 0;">
                <div class="header">複数チェックする場合は、連続した年月日を選択してください</div>
            </div>
        </div>
        <div class="error-message-emptycheck-onoff">
            <div class="ui warning message hidden" style = "margin: 20px 0;">
                <div class="header">反映にチェックを入れてください</div>
            </div>
        </div>
        <div class="error-message-send-onoff">
            <div class="ui warning message hidden" style = "margin: 20px 0;">
                <div class="header">入力値が空の為、連携できません</div>
            </div>
        </div>
        <div class="error-message-empty-onoff">
            <div class="ui warning message hidden" style = "margin: 20px 0;">
                <div class="header">入力値が空の為、編集できません</div>
            </div>
        </div>

        <div class="input_fields" style="display: flex; align-items: flex-end; flex-wrap: wrap; margin-top: 20px;">
            
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <label>支給対象年月</label>
                <input wire:model.live="era_1" id="selected_Japanese_era_name_1" name="selected_Japanese_era_name_1" style="padding: 1px; height: 38px; text-align: center;"readonly>
            </div>
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model.live="year_1" id="payment_year_1" name="payment_year_1" type="number" min="0" style="width: 40px; height: 38px; padding: 1px; text-align: right;"readonly>
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        年
                    </div>
                </div>
            </div>
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model.live="month_1" id="payment_month_1" name="payment_month_1" type="number" min="0" style="width: 40px; height: 38px; padding: 1px; text-align: right;"readonly>
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        月
                    </div>
                </div>
            </div>
            <div class="field" style="flex: 0 1 170px; min-width: 170px; margin-left: 6px;">
                <label>賃金額</label>
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model.live="total_amount_1" id="payment_amount_1" name="payment_amount_1" type="number" min="0" max="9999999" style="width: 40px; height: 38px; padding: 1px; text-align: right;"readonly>
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        円
                    </div>
                    <button type="button" onClick="javascript:openUserModaledit(0)" style="height: 37px;">編集</button>
                    <div id="edit_wage_amount" class="ui large modal edit_wage_amount">
                        <i class="close icon"></i>
                        <div class="header">
                            賃金額より除外する項目
                        </div>
                        <p style="padding: 1.25rem 1.5rem;">賃金額より除外する項目にチェックをいれて『確定』ボタンを押してください。</p>
                        <livewire:wage-payment-status-edit-wage-amount :employeeId="$employeeId" wire:key="edit-wage-amount-{{ $employeeId }}" />
                    </div>
                </div>
            </div>
            <div class="field" style="flex: 0 1 80px; min-width: 80px; margin-left: 6px;">
                <label>減額日数</label>
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model.live="reduced_days_1" id="reduced_days_1" name="reduced_days_1" type="number" min="0" max="365" style="width: 40px; height: 38px; padding: 1px; text-align: right;"readonly>
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        日
                    </div>
                </div>
            </div>
            <div class="field" style="text-align: center;">
                <label>反映</label>
                <div class="field" style="margin-left: 6px; margin-bottom: 1em; padding: 10px;">
                    <input wire:model="checkbox_1" id="checkbox_1" name="checkbox_1" type="checkbox" value="有" style="width: 20px; height: 20px;">
                </div>
            </div>
        </div>


        <div class="input_fields" style="display: flex; align-items: flex-end; flex-wrap: wrap;">
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
            <input wire:model.live="era_2" id="selected_Japanese_era_name_2" name="selected_Japanese_era_name_2" style="padding: 1px; height: 38px; text-align: center;"readonly>
            </div>
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model.live="year_2" id="payment_year_2" name="payment_year_2" type="number" min="0" style="width: 40px; height: 38px; padding: 1px; text-align: right;"readonly>
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        年
                    </div>
                </div>
            </div>
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model.live="month_2" id="payment_month_2" name="payment_month_2" type="number" min="0" style="width: 40px; height: 38px; padding: 1px; text-align: right;"readonly>
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        月
                    </div>
                </div>
            </div>
            <div class="field" style="flex: 0 1 170px; min-width: 170px; margin-left: 6px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model.live="total_amount_2" id="payment_amount_2" id="payment_amount_2" name="payment_amount_2" type="number" min="0" max="9999999" style="width: 40px; height: 38px; padding: 1px; text-align: right;"readonly>
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        円
                    </div>
                    <button type="button" onClick="javascript:openUserModaledit(1)" style="height: 37px;">編集</button>
                </div>
            </div>
            <div class="field" style="flex: 0 1 80px; min-width: 80px; margin-left: 6px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model.live="reduced_days_2" id="reduced_days_2" name="reduced_days_2" type="number" min="0" max="365" style="width: 40px; height: 38px; padding: 1px; text-align: right;"readonly>
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        日
                    </div>
                </div>
            </div>
            <div class="field" style="margin-left: 6px; margin-bottom: 1em; padding: 10px;">
                <input wire:model="checkbox_2" id="checkbox_2" name="checkbox_2" type="checkbox" value="有" style="width: 20px; height: 20px;">
            </div>
        </div>


        <div class="input_fields" style="display: flex; align-items: flex-end; flex-wrap: wrap;">
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
            <input wire:model.live="era_3" id="selected_Japanese_era_name_3" name="selected_Japanese_era_name_3" style="padding: 1px; height: 38px; text-align: center;"readonly>
            </div>
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model.live="year_3" id="payment_year_3" name="payment_year_3" type="number" min="0" style="width: 40px; height: 38px; padding: 1px; text-align: right;"readonly>
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        年
                    </div>
                </div>
            </div>
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model.live="month_3" id="payment_month_3" name="payment_month_3" type="number" min="0" style="width: 40px; height: 38px; padding: 1px; text-align: right;"readonly>
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        月
                    </div>
                </div>
            </div>
            <div class="field" style="flex: 0 1 170px; min-width: 170px; margin-left: 6px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model.live="total_amount_3" id="payment_amount_3" id="payment_amount_3" name="payment_amount_3" type="number" min="0" max="9999999" style="width: 40px; height: 38px; padding: 1px; text-align: right;"readonly>
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        円
                    </div>
                    <button type="button" onClick="javascript:openUserModaledit(2)" style="height: 37px;">編集</button>
                </div>
            </div>
            <div class="field" style="flex: 0 1 80px; min-width: 80px; margin-left: 6px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model.live="reduced_days_3" id="reduced_days_3" name="reduced_days_3" type="number" min="0" max="365" style="width: 40px; height: 38px; padding: 1px; text-align: right;"readonly>
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        日
                    </div>
                </div>
            </div>

            <div class="field" style="margin-left: 6px; margin-bottom: 1em; padding: 10px;">
                <input wire:model="checkbox_3" id="checkbox_3" name="checkbox_3" type="checkbox" value="有" style="width: 20px; height: 20px;">
            </div>
        </div>
        <div class="field" style="flex: 0 1 80px; min-width: 80px; text-align: right;">
            <button type="button" wire:click="reflectValues" class="ui button small">連携する</button>
        </div>
    </div>


    @script
    <script>

        const edit_wage_amount = $('#edit_wage_amount').modal({
            blurring: true,
        });

        Livewire.on('close_hensyu_modal', () => {
            edit_wage_amount.modal('hide');
        });

        window.modalEdit = $('#edit_wage_amount').modal({
            blurring: true
        });

        //編集ボタンが押されたら
        window.openUserModaledit = (type) => {
            $wire.dispatch('openEditWageAmountModal', {
                type: type,
            });
        };

        //編集モーダル開く
        Livewire.on('open_edit_modal_input', () => {
                modalEdit.modal('show');
        });

        Livewire.on('showErrorMessage_empty_input', () => {
            setTimeout(() => {
                $('.error-message-empty-onoff .ui.warning.message').removeClass('hidden');
            }, 0);
        });

        //支払い賃金状況にチェックが入っているデータを帳票画面の方に反映するスクリプト
        Livewire.on('runConfirmation', () => {
            const checkboxes = [
                document.getElementById("checkbox_1"),
                document.getElementById("checkbox_2"),
                document.getElementById("checkbox_3")
            ];

            let checkedIndexes = checkboxes
                .map((checkbox, index) => checkbox.checked ? index + 1 : -1)
                .filter(index => index !== -1);

            // 何もチェックされていない場合にエラーを表示
            if (checkedIndexes.length === 0) {
                setTimeout(() => {
                    $('.error-message-emptycheck-onoff .ui.warning.message').removeClass('hidden');
                }, 0);
                return;
            } else {
                setTimeout(() => {
                    $('.error-message-emptycheck-onoff .ui.warning.message').addClass('hidden');
                }, 0);
            }

            // 歯抜けエラー（連続チェックされているか確認）
            for (let i = 0; i < checkedIndexes.length - 1; i++) {
                if (checkedIndexes[i + 1] !== checkedIndexes[i] + 1) {
                    setTimeout(() => {
                        $('.error-message-w-reflection-onoff .ui.warning.message').removeClass('hidden');
                    }, 0);
                    return;
                } else {
                    setTimeout(() => {
                        $('.error-message-w-reflection-onoff .ui.warning.message').addClass('hidden');
                    }, 0);
                }
            }

            // 選択された行の年月が連続しているか確認
            let yearMonthList = checkedIndexes.map(num => {
                let year = parseInt(document.querySelector(`[name="payment_year_${num}"]`)?.value || "0", 10);
                let month = parseInt(document.querySelector(`[name="payment_month_${num}"]`)?.value || "0", 10);
                return { year, month };
            });

            // 選択されたチェックの行に値が入っているか確認
            let hasEmptyValue = checkedIndexes.some(num => {
                let year = document.querySelector(`[name="payment_year_${num}"]`)?.value.trim();
                let month = document.querySelector(`[name="payment_month_${num}"]`)?.value.trim();
                let amount = document.querySelector(`[name="payment_amount_${num}"]`)?.value.trim();
                
                return !year || !month || !amount;
            });
            if (hasEmptyValue) {
                setTimeout(() => {
                    $('.error-message-send-onoff .ui.warning.message').removeClass('hidden');
                }, 0);
                return;
            } else {
                setTimeout(() => {
                    $('.error-message-send-onoff .ui.warning.message').addClass('hidden');
                }, 0);
            }

            for (let i = 0; i < yearMonthList.length - 1; i++) {
                let current = yearMonthList[i];
                let next = yearMonthList[i + 1];

                // 月が1つ前でない、または年が違う場合
                if (!(current.year === next.year && current.month === next.month + 1) &&
                    !(current.year - 1 === next.year && current.month === 1 && next.month === 12)) {
                    setTimeout(() => {
                        $('.error-message-w-reflection-onoff .ui.warning.message').removeClass('hidden');
                    }, 0);
                    return;
                } else {
                    setTimeout(() => {
                        $('.error-message-w-reflection-onoff .ui.warning.message').addClass('hidden');
                    }, 0);
                }
            }

            $wire.dispatch('checkbox_change', {
                checkedIndexes: checkedIndexes,
            });
        });

    </script>
    @endscript

</div>

    
    