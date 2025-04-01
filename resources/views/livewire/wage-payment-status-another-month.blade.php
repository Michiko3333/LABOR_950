<div style="padding: 1.25rem 1.5rem;">
    <style type="text/css">

    .wage-container {
        display: flex;
        height: 35px;
        align-items: center;
        justify-content: left;
        margin-bottom: 1.5rem;
        padding: 1.5rem 0.5rem;
        font-size: 16px;
        background-color:  rgba(151, 145, 0, 0.1);
    }

    /* クリック可能な行*/
    .clickable-row {
        background: white;
        cursor: pointer;
    }

    .clickable-row:hover {
        background-color: #bbdbf3;
    }

    /* クリック不可な行*/
    .disabled-row {
        background-color: lightgray;
        cursor: not-allowed;
        opacity: 0.6;
    }

    /* 選択した行*/
    .selected-row {
        background-color: #ddeeff;
    }


    .ui.form .warning.message {
        display: block;
    }

    </style>

    <div class="content" >
    
        <div class="error-message-24-onoff">
            <div class="ui warning message hidden" style = "margin: -20px 0 20px 0;">
                <div class="header">支給対象年月が選択されていません</div>
            </div>
        </div>

        <div class="wage-container ui form">
            <label class="wage-label">平均月額賃金：</label>
            <p class="wage-amount">{{ $calculated_wage }}円</p>
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
                @foreach ($filtered_wage_data as $index => $wage)
                    @if ($wage['below_75_percent_flag'])
                        <tr 
                            class="clickable-row {{ array_key_exists($index, $selectedRows) ? 'selected-row' : '' }}"
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

    </div>

    <div class="actions" style="margin: 1.5rem 0; text-align: right;">
        <button class="ui negative button" onClick="javascript:onCancel24Modal()" type="button">キャンセル</button>
        <div class="ui primary button" onClick="javascript:onEdit24Modal()">確定</div>
    </div>

</div>  

@script
<script>

window.onCancel24Modal = () => {
    $wire.dispatch('onCancel24');
    $('#another_payment_month').modal('hide');
};

window.onEdit24Modal = () => {
    $wire.dispatch('onEdit24');
};

Livewire.on('closed24modal', () => {
    $('#another_payment_month').modal('hide');
});

Livewire.on('showErrorMessage_nodata24', () => {
    setTimeout(() => {
        $('.error-message-24-onoff .ui.warning.message').removeClass('hidden');
    }, 0);
});

Livewire.on('updateInfoText', (data) => {
    $('#info_text_1').text(data[0].info_text_1);
    $('#info_text_2').text(data[0].info_text_2);
});
</script>
@endscript
