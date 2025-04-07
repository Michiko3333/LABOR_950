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


        <table class="ui celled table" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th style="text-align: center;">支給対象年月</th>
                    <th style="text-align: center;">賃金額</th>
                    <th style="text-align: center;">減額日数</th>
                    <th style="text-align: center;">
                        <label style="display: flex; align-items: center; justify-content: center;">
                            <span id="selectAllLabel" style="margin-right: 8px;">まとめてチェックする</span>
                            <input id="selectAllCheckbox" type="checkbox">
                        </label>
                    </th>
                
                </tr>
            </thead>
            <tbody>
                <!-- 1行目 -->
                <tr>
                    <td style="text-align: center;">
                        令和
                        <span wire:model.live="year_1" id="payment_year_1" name="payment_year_1"> {{ $year_1 }} </span>年
                        <span wire:model.live="month_1" id="payment_month_1" name="payment_month_1"> {{ $month_1 }} </span>月
                    </td>
                    <td style="text-align: center; width: 30%;">
                        <span wire:model.live="total_amount_1" id="payment_amount_1" name="payment_amount_1"> {{ $total_amount_1 }} </span> 円
                        <button class="ui button" style="margin-left: 15px; padding: 6px 12px;" type="button" onClick="javascript:openUserModaledit(0)">編集</button>
                        <div id="edit_wage_amount" class="ui large modal edit_wage_amount">
                            <i class="close icon"></i>
                            <div class="header">
                                賃金額より除外する項目
                            </div>
                            <p style="padding: 1.25rem 1.5rem;">賃金額より除外する項目にチェックをいれて『確定』ボタンを押してください。</p>
                            <livewire:wage-payment-status-edit-wage-amount :employeeId="$employeeId" wire:key="edit-wage-amount-{{ $employeeId }}" />
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <span wire:model.live="reduced_days_1" id="reduced_days_1" name="reduced_days_1"> {{ $reduced_days_1 }} </span> 日
                    </td>
                    <td style="text-align: center;">
                        <input wire:model="checkbox_1" id="checkbox_1" name="checkbox_1" type="checkbox" value="有" style="width: 20px; height: 20px;">
                    </td>
                </tr>

                <!-- 2行目 -->
                <tr>
                    <td style="text-align: center;">
                        令和
                        <span wire:model.live="year_2" id="payment_year_2" name="payment_year_2"> {{ $year_2 }} </span>年
                        <span wire:model.live="month_2" id="payment_month_2" name="payment_month_2"> {{ $month_2 }} </span>月
                    </td>
                    <td style="text-align: center; width: 30%;">
                        <span wire:model.live="total_amount_2" id="payment_amount_2" name="payment_amount_2"> {{ $total_amount_2 }} </span> 円
                        <button class="ui button" style="margin-left: 15px; padding: 6px 12px;" type="button" onClick="javascript:openUserModaledit(1)">編集</button>
                    </td>
                    <td style="text-align: center;">
                        <span wire:model.live="reduced_days_2" id="reduced_days_2" name="reduced_days_2"> {{ $reduced_days_2 }} </span> 日
                    </td>
                    <td style="text-align: center;">
                        <input wire:model="checkbox_2" id="checkbox_2" name="checkbox_2" type="checkbox" value="有" style="width: 20px; height: 20px;">
                    </td>
                </tr>

                <!-- 3行目 -->
                <tr>
                    <td style="text-align: center;">
                        令和
                        <span wire:model.live="year_3" id="payment_year_3" name="payment_year_3"> {{ $year_3 }} </span>年
                        <span wire:model.live="month_3" id="payment_month_3" name="payment_month_3"> {{ $month_3 }} </span>月
                    </td>
                    <td style="text-align: center; width: 30%;">
                        <span wire:model.live="total_amount_3" id="payment_amount_3" name="payment_amount_3"> {{ $total_amount_3 }} </span> 円
                        <button class="ui button" style="margin-left: 15px; padding: 6px 12px;" type="button" onClick="javascript:openUserModaledit(2)">編集</button>
                    </td>
                    <td style="text-align: center;">
                        <span wire:model.live="reduced_days_3" id="reduced_days_3" name="reduced_days_3"> {{ $reduced_days_3 }} </span> 日
                    </td>
                    <td style="text-align: center;">
                        <input wire:model="checkbox_3" id="checkbox_3" name="checkbox_3" type="checkbox" value="有" style="width: 20px; height: 20px;">
                    </td>
                </tr>
            </tbody>
        </table>

        
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

        // 全て選択チェックボックスの処理
        let selectAllCheckbox = document.getElementById('selectAllCheckbox');
        let selectAllLabel = document.getElementById('selectAllLabel');

        selectAllCheckbox.addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('input[type="checkbox"][id^="checkbox_"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
            // チェックボックスが変更されるたびに選択状態をリセット
            if (!selectAllCheckbox.checked) {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
            }
        });
        
        Livewire.on('resetCheckboxes', () => {
            selectAllCheckbox.checked = false;
            let checkboxes = document.querySelectorAll('input[type="checkbox"][id^="checkbox_"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
        });

        // 支払い賃金状況にチェックが入っているデータを帳票画面の方に反映するスクリプト
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
                let yearElement = document.querySelector(`[name="payment_year_${num}"]`);
                let monthElement = document.querySelector(`[name="payment_month_${num}"]`);

                let year = yearElement ? parseInt(yearElement.innerText.trim(), 10) : 0;
                let month = monthElement ? parseInt(monthElement.innerText.trim(), 10) : 0;
                return { year, month };
            });

            // 選択されたチェックの行に値が入っているか確認
            let hasEmptyValue = checkedIndexes.some(num => {
                let yearElement = document.querySelector(`[name="payment_year_${num}"]`);
                let monthElement = document.querySelector(`[name="payment_month_${num}"]`);
                let amountElement = document.querySelector(`[name="payment_amount_${num}"]`);

                let year = yearElement ? yearElement.innerText.trim() : "";
                let month = monthElement ? monthElement.innerText.trim() : "";
                let amount = amountElement ? amountElement.innerText.trim() : "";
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

    
    