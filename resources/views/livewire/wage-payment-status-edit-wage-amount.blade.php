<div>

    <style type="text/css">

    .ui.form .warning.message {
        display: block;
    }
    </style>

    <div class="content" > 
        <div class="error-message-hensyu-onoff">
            <div class="ui warning message hidden" style = "margin: 20px;">
                <div class="header">除外対象がチェックされていません</div>
            </div>
        </div>

        <form onsubmit="return false;">
            <div class="ui basic label" style=" display: flex; height: 40px; padding: 0 1.5rem; font-size: 16px; border: none;">
                <div>
                    <label>除外後の賃金額：</label>
                    <input value="{{ number_format($wage_amount_after_exclusion ) }}円"  id="wage_amount_after_exclusion" name="wage_amount_after_exclusion" style="border: none;" disabled>
                </div>
                <div>
                    <label>除外合計：</label>
                    <input value="{{ number_format($total_exclusion) }}円" id="total_exclusion" name="total_exclusion" style="border: none;" disabled >
                </div>
            </div>
            <div class="ui basic label" style=" display: flex; height: 40px; padding: 0 1.5rem; font-size: 16px; border: none;">
                <div style=" display: flex; width: 30%; align-items: center;">
                    <label>総支給額：</label>
                    <input value="{{ number_format($total_amount) }}円" id="total_payment_amount" name="total_payment_amount" style="border: none;" disabled >
                </div>
                <div style=" display: flex; width: 25%; align-items: center;">
                    <label>基本給：</label>
                    <input value="{{ number_format($wage_base_amount) }}円" id="base_salary" name="base_salary" style="border: none;" disabled >
                </div>
            </div>

            <div class="exclusion_table_conteiner" style="display: flex;" > 
                <div class="left_conteiner" style="width:50%; margin: 1rem;"> 
                    <!-- １個目のテーブル -->
                    <table class="ui celled structured table">
                        <thead>
                            <tr>
                                <th rowspan="2" style="width: 45%;">時間外手当</th>
                                <th rowspan="2" style="width: 30%; text-align: center;">金額</th>
                                <th rowspan="2" style="width: 20%; text-align: center;">除外</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($allowances1 as $index => $allowance)
                            <tr>
                                <td>{{ $allowance['name'] }}</td>
                                <td style="text-align: center;">{{ number_format($allowance['amount']) }}円</td> 
                                <td class="center aligned">
                                    <input type="checkbox" wire:model.live="selectedAllowances.allowances1.{{ $index }}" style="width: 20px; height: 20px;"  readonly>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                    <!-- ２個目のテーブル -->
                    <table class="ui celled structured table">

                        <!-- 縦１列目の2段目 -->
                        <thead>
                            <tr>
                                <th rowspan="2" style="width: 45%;">支給控除</th>
                                <th rowspan="2" style="width: 30%; text-align: center;">金額</th>
                                <th rowspan="2" style="width: 20%; text-align: center;">除外</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($allowances2 as $index => $allowance)
                            <tr>
                                <td>{{ $allowance['name'] }}</td>
                                <td style="text-align: center;">{{ number_format($allowance['amount']) }}円</td> 
                                <td class="center aligned">
                                    <input type="checkbox" wire:model.live="selectedAllowances.allowances2.{{ $index }}" style="width: 20px; height: 20px;"  readonly>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    
                    </table>
                </div>

                <div class="right_conteiner" style="width:50%; margin: 1rem;"> 

                    <!-- ３個目のテーブル -->
                    <table class="ui celled structured table">
                        <thead>
                            <tr>
                                <th rowspan="2"style="width: 45%;">諸手当合計</th>
                                <th rowspan="2" style="width: 30%; text-align: center;">金額</th>
                                <th rowspan="2" style="width: 20%; text-align: center;">除外</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($allowances3 as $index => $allowance)
                            <tr>
                                <td>{{ $allowance['name'] }}</td>
                                <td style="text-align: center;">{{ number_format($allowance['amount']) }}円</td> 
                                <td class="center aligned">
                                    <input type="checkbox" wire:model.live="selectedAllowances.allowances3.{{ $index }}" style="width: 20px; height: 20px;"  readonly>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>


                    <!-- 4個目のテーブル -->
                    <table class="ui celled structured table">
                        <thead>
                            <tr>
                                <th rowspan="2" style="width: 45%;">支給</th>
                                <th rowspan="2" style="width: 30%; text-align: center;">金額</th>
                                <th rowspan="2" style="width: 20%; text-align: center;">除外</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($allowances4 as $index => $allowance)
                            <tr>
                                <td>{{ $allowance['name'] }}</td>
                                <td style="text-align: center;">{{ number_format($allowance['amount']) }}円</td> 
                                <td class="center aligned">
                                    <input type="checkbox" wire:model.live="selectedAllowances.allowances4.{{ $index }}" style="width: 20px; height: 20px;"  readonly>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <div class="actions" style="padding: 1.5rem; text-align: right; background: #f9fafb;">
        <button class="ui negative button" type="button">キャンセル</button>
        <div class="ui primary button " wire:click="onEditClick">確定</div>
    </div>
</div>


@script
<script>
    
    Livewire.on('showErrorMessage_nodata_hensyu', () => {
        setTimeout(() => {
            $('.error-message-hensyu-onoff .ui.warning.message').removeClass('hidden');
        }, 0);
    });
</script>
@endscript
