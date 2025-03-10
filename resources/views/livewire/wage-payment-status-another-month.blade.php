<!-- ②呼び出し元のLivewireのBladeファイル（デザインファイル） 使いまわせる画面側の実装-->
<div>
    <button type="button" class="ui button small" id="another_payment_month_btn" wire:click="openPaymentModal">別の支給対象年月を参照する</button>

    <style type="text/css">

    .wage-container {
        display: flex;
        height: 35px;
        align-items: center;
        justify-content: left;
        margin-bottom: 1.5rem;
        padding: 1.5rem 0.5rem;
        font-size: 16px;
        border-top: 6px double #000;
        border-bottom: 6px double #000;
    }

    /* クリック可能な行*/
    .clickable-row {
        background: rgba(151, 145, 0, 0.1);
        font-weight: bold;
        color: #13265f;
        cursor: pointer;
    }

    .clickable-row:hover {
        background-color:  rgba(151, 145, 0, 0.2);
    }

    /* クリック可能な年月の部分*/
    .clickable-text {
        text-decoration: underline;
        color: #13265f;
    }

    .clickable-text:hover {
        background-color:  rgba(151, 145, 0, 0.2);
    }

    /* クリック不可な行*/
    .disabled-row {
        background-color: lightgray;
        cursor: not-allowed;
        opacity: 0.6;
    }
    

    </style>


    <div id="another_payment_month" class="ui tiny modal another_payment_month">

        <i class="close icon"></i>
        <div class="header">
            支給対象年月の編集
        </div>
        <p style="margin: 1.25rem 1.5rem;">下記より支給対象年月を選択し、反映ボタンを押してください。</p>
        <p style="margin: 1.25rem 1.5rem 0;">※選択可能な年月は60歳到達時の賃金と比べて、60歳以後の賃金が75％未満になっている年月です。</p>
        <p style="margin: 0 1.5rem;">※選択した支給対象年月の前2ヶ月〜3ヶ月の賃金が75％未満と連続している場合は、最大3ヶ月分が自動で選択されます。</p>
        
        <div class="content" > 
            <form id="another_payment_months" name="another_payment_months" onsubmit="return false;">
                <div class="wage-container">
                    <label class="wage-label">60歳到達時の賃金額：</label>
                    <p class="wage-amount">{{ $sixty_years_total_amount }}円</p>
                </div>
                <div class="ui form" style = "display: flex;">
                    <table class="ui celled table" style="margin: 0;">
                        <thead>
                            <tr>
                                <td style="background: #F9FAFB; font-weight: 700; height: 40px; padding: 10px;">支給対象年月</td>
                                <td style="background: #F9FAFB; font-weight: 700; height: 40px; padding: 10px;">総支給額</td> 
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($filtered_wage_data as $wage)
                            @if ($wage['below_75_percent_flag'])
                                <tr 
                                    class="clickable-row"
                                    wire:key="row-{{ $index }}"
                                    wire:click="handleRowClick({{ $index }})"
                                >
                            @else
                                <tr class="disabled-row" wire:key="row-{{ $index }}">
                            @endif
                                    <td>
                                        @if ($wage['below_75_percent_flag'])
                                            <span class="clickable-text">
                                                {{ $wage['era'] ? $wage['era'] . $wage['year'] . '年' . $wage['month'] . '月' : $wage['year'] . '年' . $wage['month'] . '月' }}
                                            </span>
                                        @else
                                            {{ $wage['era'] ? $wage['era'] . $wage['year'] . '年' . $wage['month'] . '月' : $wage['year'] . '年' . $wage['month'] . '月' }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ number_format($wage['valid_total_amount']) }}円
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <div class="actions">
            <button class="ui negative button" onClick="javascript:$lw.onCancel()" type="button">キャンセル</button>
            <div class="ui primary button" wire:click="saveSelectedData">反映</div>
        </div>

    </div>

    <script type="module">

    

    </script>

</div>
