
        <!-- あとで直す　<style type="text/css">
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
        </style> -->
<div>

        <style> 
        .custom-checkbox {
            width: 20px; /* チェックボックスの枠サイズ */
            height: 20px; /* チェックボックスの枠サイズ */
            position: relative;
        }

        .custom-checkbox input[type="checkbox"] {
            width: 20px;
            height: 20px;
        }

        .custom-checkbox input[type="checkbox"]::before {
            content: "✔"; /* チェックマーク */
            font-size: 10px; /* ← ここでチェックマークのサイズを変更 */
            color: black;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%) scale(0.5); /* チェックマークのサイズを小さく */
        }
        </style> 

    
    <div class="employee-select-area ui form">
        <div class="input_fields" style="display: flex; align-items: flex-end; flex-wrap: wrap; margin-top: 20px;">
            
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <label>支給対象年月</label>
                <select wire:model="era_1" class="ui fluid dropdown" id="selected_Japanese_era_name_1" name="selected_Japanese_era_name_1" style="padding: 1px; height: 38px;">
                    <option value="7" {{ old('selected_Japanese_era_name') == '7' ? 'selected' : '' }}>平成</option>
                    <option value="9" {{ old('selected_Japanese_era_name') == '9' ? 'selected' : '' }}>令和</option>
                </select>
            </div>
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model="year_1" id="payment_year_1" name="payment_year_1" type="number" min="0" style="width: 40px; height: 38px; padding: 1px;">
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        年
                    </div>
                </div>
            </div>
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model="month_1" id="payment_month_1" name="payment_month_1" type="number" wire:model="payment_month" min="0" style="width: 40px; height: 38px; padding: 1px;">
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        月
                    </div>
                </div>
            </div>
            <div class="field" style="flex: 0 1 170px; min-width: 170px; margin-left: 6px;">
                <label>賃金額</label>
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model="total_amount_1" id="payment_amount_1" name="payment_amount_1" type="number" wire:model="payment_amount" min="0" max="9999999" placeholder="9999999" style="width: 40px; height: 38px; padding: 1px;">
                    <livewire:wage-payment-status-edit-wage-amount />
                </div>
            </div>
            <div class="field" style="flex: 0 1 80px; min-width: 80px; margin-left: 6px;">
                <label>減額日数</label>
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model="reduced_days_1" id="reduced_days_1" name="reduced_days_1" type="number" placeholder="120" min="0" max="365" style="width: 40px; height: 38px; padding: 1px;">
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        日
                    </div>
                </div>
            </div>
            <div class="field" style="flex: 0 1 38px; min-width: 38px; margin-left: 6px; margin-bottom: 1em;">
                <label>反映</label>
                <input id="checkbox_1" name="checkbox_1" type="checkbox" value="有" style="width: 38px; height: 38px;">
            </div>
        </div>


        <div class="input_fields" style="display: flex; align-items: flex-end; flex-wrap: wrap;">
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <select wire:model="era_2" class="ui fluid dropdown" id="selected_Japanese_era_name_2" name="selected_Japanese_era_name_2" style="padding: 1px; height: 38px;">
                    <option value="7" {{ old('selected_Japanese_era_name') == '7' ? 'selected' : '' }}>平成</option>
                    <option value="9" {{ old('selected_Japanese_era_name') == '9' ? 'selected' : '' }}>令和</option>
                </select>
            </div>
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model="year_2" id="payment_year_2" name="payment_year_2" type="number" min="0" style="width: 40px; height: 38px; padding: 1px;">
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        年
                    </div>
                </div>
            </div>
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model="month_2" id="payment_month_2" name="payment_month_2" type="number" min="0" style="width: 40px; height: 38px; padding: 1px;">
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        月
                    </div>
                </div>
            </div>
            <div class="field" style="flex: 0 1 170px; min-width: 170px; margin-left: 6px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model="total_amount_2" id="payment_amount_2" id="payment_amount_2" name="payment_amount_2" type="number" min="0" max="9999999" placeholder="9999999" style="width: 40px; height: 38px; padding: 1px;">
                    <livewire:wage-payment-status-edit-wage-amount/>
                </div>
            </div>
            <div class="field" style="flex: 0 1 80px; min-width: 80px; margin-left: 6px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model="reduced_days_2" id="reduced_days_2" name="reduced_days_2" type="number" placeholder="120" min="0" max="365" style="width: 40px; height: 38px; padding: 1px;">
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        日
                    </div>
                </div>
            </div>
            <div class="field" style="flex: 0 1 38px; min-width: 38px; margin-left: 6px; margin-bottom: 1em;">
                <input id="checkbox_2" name="checkbox_2" type="checkbox" value="有" style="width: 38px; height: 38px;">
            </div>
        </div>


        <div class="input_fields" style="display: flex; align-items: flex-end; flex-wrap: wrap;">
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <select wire:model="era_3" class="ui fluid dropdown" id="selected_Japanese_era_name_3" name="selected_Japanese_era_name_3" style="padding: 1px; height: 38px;">
                    <option value="7" {{ old('selected_Japanese_era_name') == '7' ? 'selected' : '' }}>平成</option>
                    <option value="9" {{ old('selected_Japanese_era_name') == '9' ? 'selected' : '' }}>令和</option>
                </select>
            </div>
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model="year_3" id="payment_year_3" name="payment_year_3" type="number" min="0" style="width: 40px; height: 38px; padding: 1px;">
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        年
                    </div>
                </div>
            </div>
            <div class="field" style="flex: 0 1 70px; min-width: 70px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model="month_3" id="payment_month_3" name="payment_month_3" type="number" min="0" style="width: 40px; height: 38px; padding: 1px;">
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        月
                    </div>
                </div>
            </div>
            <div class="field" style="flex: 0 1 170px; min-width: 170px; margin-left: 6px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model="total_amount_3" id="payment_amount_3" id="payment_amount_3" name="payment_amount_3" type="number" min="0" max="9999999" placeholder="9999999" style="width: 40px; height: 38px; padding: 1px;">
                    <livewire:wage-payment-status-edit-wage-amount />
                </div>
            </div>
            <div class="field" style="flex: 0 1 80px; min-width: 80px; margin-left: 6px;">
                <div class="ui right labeled input" style="height: 38px;">
                    <input wire:model="reduced_days_3" id="reduced_days_3" name="reduced_days_3" type="number" placeholder="120" min="0" max="365" style="width: 40px; height: 38px; padding: 1px;">
                    <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                        日
                    </div>
                </div>
            </div>

            <div class="field" style="flex: 0 1 38px; min-width: 38px; margin-left: 6px; margin-bottom: 1em;">
                <input id="checkbox_3" name="checkbox_3" type="checkbox" value="有" style="width: 38px; height: 38px;">
            </div>
        </div>
        <div class="field" style="flex: 0 1 80px; min-width: 80px; text-align: right;">
            <button type="button" onclick="reflectValues()" class="ui button small">連携する</button>
        </div>


        
    </div>


    <script>

        function reflectValues() {

            if (document.getElementById("checkbox_1").checked) {
                let era = document.querySelector('[name="selected_Japanese_era_name_1"]')?.value || "";
                let year = document.querySelector('[name="payment_year_1"]')?.value || "";
                let month = document.querySelector('[name="payment_month_1"]')?.value || "";
                let amount = document.querySelector('[name="payment_amount_1"]')?.value || "";
                let days = document.querySelector('[name="reduced_days_1"]')?.value || "";

                document.getElementById("J25_005F_944E_8D86_005F1").value = era;
                document.getElementById("J26_005F_944E_005F1").value = year;
                document.getElementById("J27_005F_8C8E_005F1").value = month;
                document.getElementById("J28_005F_8E78_8B8B_91CE_8FDB_944E_8C8E_82C9_8E78_95A5_82ED_82EA_82BD_92C0_8BE0_8A7A_005F1").value = amount;
                document.getElementById("J29_005F_92C0_8BE0_82CC_8CB8_8A7A_82CC_82A0_82C1_82BD_93FA_9094_005F1").value = days;
            }

            if (document.getElementById("checkbox_2").checked) {

                let era = document.querySelector('[name="selected_Japanese_era_name_2"]')?.value || "";
                let year = document.querySelector('[name="payment_year_2"]')?.value || "";
                let month = document.querySelector('[name="payment_month_2"]')?.value || "";
                let amount = document.querySelector('[name="payment_amount_2"]')?.value || "";
                let days = document.querySelector('[name="reduced_days_2"]')?.value || "";

                console.log(era);
                console.log(year);
                console.log(month);

                document.getElementById("J32_005F_944E_8D86_005F2").value = era;
                document.getElementById("J33_005F_944E_005F2").value = year;
                document.getElementById("J34_005F_8C8E_005F2").value = month;
                document.getElementById("J35_005F_8E78_8B8B_91CE_8FDB_944E_8C8E_82C9_8E78_95A5_82ED_82EA_82BD_92C0_8BE0_8A7A_005F2").value = amount;
                document.getElementById("J36_005F_92C0_8BE0_82CC_8CB8_8A7A_82CC_82A0_82C1_82BD_93FA_9094_005F2").value = days;
            }
                
            if (document.getElementById("checkbox_3").checked) {
                let era = document.querySelector('[name="selected_Japanese_era_name_3"]')?.value || "";
                let year = document.querySelector('[name="payment_year_3"]')?.value || "";
                let month = document.querySelector('[name="payment_month_3"]')?.value || "";
                let amount = document.querySelector('[name="payment_amount_3"]')?.value || "";
                let days = document.querySelector('[name="reduced_days_3"]')?.value || "";

                document.getElementById("J32_005F_944E_8D86_005F3").value = era;
                document.getElementById("J33_005F_944E_005F3").value = year;
                document.getElementById("J34_005F_8C8E_005F3").value = month;
                document.getElementById("J35_005F_8E78_8B8B_91CE_8FDB_944E_8C8E_82C9_8E78_95A5_82ED_82EA_82BD_92C0_8BE0_8A7A_005F3").value = amount;
                document.getElementById("J36_005F_92C0_8BE0_82CC_8CB8_8A7A_82CC_82A0_82C1_82BD_93FA_9094_005F3").value = days;
            }
        }

        
    </script>

    </div>

    
    