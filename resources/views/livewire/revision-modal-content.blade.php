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
        <div style="display: flex;">
            <div class="required field" style="margin-right:5px">
                <label>改定年月</label>
                <select wire:model.live="modal_era" class="ui fluid dropdown" name="modal_era" style="height:50px;width:100px !important">
                    @foreach($eras as $key => $eraLabel)
                    <option value="{{ $key }}">{{ $eraLabel }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field" style="margin-right:5px">
                <label></label>
                <select wire:model.live="modal_year" class="ui fluid dropdown" name="modal_year" style="height:50px;width:100px !important">
                    <option value="">未選択</option>
                    @foreach($years as $key => $yearLabel)
                    <option value="{{ $key }}" {{ $this->modal_year == $key ? 'selected' : '' }}>{{ $yearLabel }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label></label>
                <select wire:model.live="modal_month" class="ui fluid dropdown" name="modal_month" style="height:50px;width:100px !important">
                    <option value="">未選択</option>
                    @foreach($months as $key => $monthLabel)
                    <option value="{{ $key }}" {{ $this->modal_month == $key ? 'selected' : '' }}>{{ $monthLabel }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @if($this->id)
        <div class="required field">
            <label>該当者</label>
            <div class="ui input">
                <input type="text" style="border: none;" readonly value="{{ $this->employee['last_name'] }}　{{ $this->employee['first_name'] }}">
            </div>
        </div>
        @else
            <div class="field">
                <label>該当者</label>
                <select class="ui fluid search dropdown employee"
                    wire:model.live="employee"
                    name="employee[]">
                    <option value="">未選択</option>
                    @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->last_name }}　{{ $employee->first_name }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        <div style="display: flex;">
            <div class="required field">
                <label>標準報酬月額</label>
                <select wire:model.live="monthly_standard_salary" class="ui fluid dropdown" name="monthly_standard_salary" style="height:50px;width:150px !important">
                    <option value="">未選択</option>
                    @foreach($wageLevels as $wage)
                    <option value="{{ $wage['monthly_standard_salary'] }}">{{ $wage['monthly_standard_salary'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label></label>
                <div class="ui right labeled input">
                    <input type="hidden">
                    <div class="ui basic label" style="height:50px;">円</div>
                </div>
            </div>
        </div>
        <div style="display: flex;">
            <div class="field">
                <label>健康保険</label>
                <div class="ui right labeled input">
                    <input type="text" name="health_insurance" wire:model.live="health_insurance" style="border: none;" readonly>
                    <div class="ui basic label">円</div>
                </div>
            </div>
            <div class="field">
                <label>厚生年金保険</label>
                <div class="ui right labeled input">
                    <input type="text" name="welfare_annuity_insurance" wire:model.live="welfare_annuity_insurance" style="border: none;" readonly>
                    <div class="ui basic label">円</div>
                </div>
            </div>
    </div>
    <div style="display: flex; justify-content: flex-end;" class="mt-2">
        <a class="ui basic primary button" href="javascript:closeRevisionModal()">キャンセル</a>
        @if($this->id)
        <button class="ui button primary button-disable" type="button"
        wire:click.debounce.150ms="updateRevision">保存</button>
        @else
        <button class="ui button primary button-disable" type="button"
        wire:click.debounce.150ms="submitRevision">保存</button>
        @endif
    </div>
</div>
@script
    <script type="module">
        $('.ui.dropdown.employee').dropdown();
        Livewire.on('revision-modal-render', () => {
            setTimeout(() => {
                $('.ui.dropdown.employee').dropdown();
            },0);
        });
        window.closeRevisionModal = () => {
            $('.revision-modal').modal('hide');
            @this.set('modal_era', '4');
            @this.set('modal_year', '');
            @this.set('modal_month', '');
            @this.set('modal_employee', '');
            @this.set('monthly_standard_salary', '');
            @this.set('health_insurance', '');
            @this.set('welfare_annuity_insurance', '');
            @this.set('employee', '');
        };
    </script>
@endscript
