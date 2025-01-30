<div class="content">
    @if ($errors->any())
        <div class="ui error message">
            <div class="header">入力エラー</div>
            <ul class="list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="ui form">
        @if($this->id)
        <div class="required field">
            <label>適用終了日</label>
            <div class="ui calendar end_date_of_application">
                <div class="ui fluid input left icon">
                    <i class="calendar icon"></i>
                    <input type="text" wire:model.live="end_date_of_application" placeholder="YYYY年M月D日">
                </div>
            </div>
        </div>
        <span class="ui medium red text">
            <i class="exclamation triangle icon"></i>
            データは履歴として保存され、現行データには戻せません。
        </span>
        @else
        <div class="required field">
            <label>名称</label>
            <input type="text" id="allowance_name"
                wire:model.live="allowance_name" placeholder="">
        </div>
        <div class="required field">
            <label>適用日</label>
            <div class="ui calendar applied_date">
                <div class="ui fluid input left icon">
                    <i class="calendar icon"></i>
                    <input type="text" wire:model.live="applied_date" placeholder="YYYY年M月D日">
                </div>
            </div>
        </div>
        @endif
    </div>
    <div style="display: flex; justify-content: flex-end;" class="mt-2">
        <a class="ui button negative basic" href="javascript:closeAllowanceModal()">キャンセル</a>
        @if($this->id)
        <button class="ui button primary button-disable" type="button"
        wire:click.debounce.150ms="makeAllowanceHistory({{ $this->id }})">履歴に追加</button>
        @else
        <button class="ui button primary button-disable" type="button"
        wire:click.debounce.150ms="submitAllowance">保存</button>
        @endif
    </div>
</div>
@script
    <script type="module">
        Livewire.on('allowance-modal-render', () => {
            setTimeout(() => {
                function initializeCalendar(selector, value) {
                    $(selector).calendar({
                        type: 'date',
                        formatter: {
                            date: 'Y"年"M"月"D"日"'
                        },
                        text: {
                            days: ['日', '月', '火', '水', '木', '金', '土'],
                            months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                        },
                        initialDate: "",
                        onChange: (_, t) => {
                            @this.set(value, t);
                        }
                    });
                }
                initializeCalendar('.ui.calendar.applied_date', 'applied_date');
                initializeCalendar('.ui.calendar.end_date_of_application', 'end_date_of_application');
            },0);
        });
        window.closeAllowanceModal = () => {
            $('.allowance-modal').modal('hide');
            @this.set('applied_date', '');
            $('.applied_date').calendar('clear');
            @this.set('end_date_of_application', '');
            $('.end_date_of_application').calendar('clear');
            $('#allowance_name').val('');
        };
    </script>
@endscript