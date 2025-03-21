<div class="content">
    <style>
        .ui.list .item.active {
            background: rgba(151, 145, 0, 0.1);
        }

        .ui.fluid.dropdown {
            height: 49px;
            padding: 14px 16.8px;
            border: 2px solid rgba(34, 36, 38, .15);
        }

        .employee-select-area .list .item {
            padding: 0.8em !important;
        }

        .employee-select-area .list .item.selected {
            background: rgba(151, 145, 0, 0.1)
        }
    </style>
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
        <input type="hidden" id="closure_type" name="closure_type" value="{{ $this->closure_type }}">
        @if ($this->id)
            <div class="employee-info mb-2">
                <div class="employee-icon information">
                    <img src="{{ $this->current_closure['icon'] }}">
                </div>
                <div style="color: #4183c4;" class="employee-name">{{ $this->current_closure['employee_last_name'] }}
                    {{ $current_closure['employee_first_name'] }}</div>
                <div>{{ $this->current_closure['branch_name'] }}</div>
                <div>{{ $this->current_closure['employee_no'] }}</div>
                <div>
                    {{ $this->statusMapping($this->current_closure['employee_status']) }}
                </div>
            </div>
        @endif
        @if ($this->closure_type == '1')
            <div class="two fields">
                <div class="required field">
                    <label>休業開始日</label>
                    <div class="ui calendar closure-calendar start-date-of-closed">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="start_date_of_closed" wire:model.live="startDateOfClosed"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>休業終了日</label>
                    <div class="ui calendar closure-calendar end-date-of-losed">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="end_date_of_losed" wire:model.live="endDateOfLosed"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="three fields">
                <div class="field">
                    <label>職場復帰日</label>
                    <div class="ui calendar closure-calendar date-of-return-to-work">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="date_of_return_to_work" wire:model.live="dateOfReturnToWork"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>出産予定日</label>
                    <div class="ui calendar closure-calendar due-date">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="due_date" wire:model.live="dueDate" placeholder="YYYY年M月D日"
                                autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>出産日</label>
                    <div class="ui calendar closure-calendar date-of-birth">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="date_of_birth" wire:model.live="dateOfBirth"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($this->closure_type == '2')
            <div class="three fields">
                <div class="required field">
                    <label>休業開始日</label>
                    <div class="ui calendar closure-calendar start-date-of-closed">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="start_date_of_closed" wire:model.live="startDateOfClosed"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>休業終了日</label>
                    <div class="ui calendar closure-calendar end-date-of-losed">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="end_date_of_losed" wire:model.live="endDateOfLosed"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>職場復帰日</label>
                    <div class="ui calendar closure-calendar date-of-return-to-work">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="date_of_return_to_work" wire:model.live="dateOfReturnToWork"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($this->closure_type == '3')
            <div class="three fields">
                <div class="required field">
                    <label>休業開始日</label>
                    <div class="ui calendar closure-calendar start-date-of-closed">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="start_date_of_closed" wire:model.live="startDateOfClosed"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>休業終了日</label>
                    <div class="ui calendar closure-calendar end-date-of-losed">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="end_date_of_losed" wire:model.live="endDateOfLosed"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>職場復帰日</label>
                    <div class="ui calendar closure-calendar date-of-return-to-work">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="date_of_return_to_work" wire:model.live="dateOfReturnToWork"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($this->closure_type == '4')
            <div class="three fields">
                <div class="required field">
                    <label>休業開始日</label>
                    <div class="ui calendar closure-calendar start-date-of-closed">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="start_date_of_closed" wire:model.live="startDateOfClosed"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>休業終了予定日</label>
                    <div class="ui calendar closure-calendar planned-end-date-of-closure">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="planned_end_date_of_closure"
                                wire:model.live="plannedEndDateOfClosure" placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>休業終了日</label>
                    <div class="ui calendar closure-calendar end-date-of-losed">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="end_date_of_losed" wire:model.live="endDateOfLosed"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label>出産予定日</label>
                    <div class="ui calendar closure-calendar due-date">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="due_date" wire:model.live="dueDate" placeholder="YYYY年M月D日"
                                autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>出産日</label>
                    <div class="ui calendar closure-calendar date-of-birth">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="date_of_birth" wire:model.live="dateOfBirth"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($this->closure_type == '5')
            <div class="two fields">
                <div class="required field">
                    <label>養育開始日</label>
                    <div class="ui calendar closure-calendar date-of-start-of-foster-care">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="date_of_start_of_foster_care"
                                wire:model.live="dateOfStartOfFosterCare" placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>養育終了予定日</label>
                    <div class="ui calendar closure-calendar planned-end-date-of-child-support">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="planned_end_date_of_child_support"
                                wire:model.live="plannedEndDateOfChildSupport" placeholder="YYYY年M月D日"
                                autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label>養育終了日</label>
                    <div class="ui calendar closure-calendar end-date-of-foster-care">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="end_date_of_foster_care" wire:model.live="endDateOfFosterCare"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="required field">
                    <label>養育特例開始日</label>
                    <div class="ui calendar closure-calendar date-of-commencement-of-special-childcare-provision">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="date_of_commencement_of_special_childcare_provision"
                                wire:model.live="dateOfCommencementOfSpecialChildcareProvision"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($this->closure_type == '6')
            <div class="three fields">
                <div class="required field">
                    <label>休業開始日</label>
                    <div class="ui calendar closure-calendar start-date-of-closed">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="start_date_of_closed" wire:model.live="startDateOfClosed"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>休業終了日</label>
                    <div class="ui calendar closure-calendar end-date-of-losed">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="end_date_of_losed" wire:model.live="endDateOfLosed"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>職場復帰日</label>
                    <div class="ui calendar closure-calendar date-of-return-to-work">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="date_of_return_to_work" wire:model.live="dateOfReturnToWork"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($this->closure_type == '7')
            <div class="three fields">
                <div class="required field">
                    <label>休業開始日</label>
                    <div class="ui calendar closure-calendar start-date-of-closed">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="start_date_of_closed" wire:model.live="startDateOfClosed"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>休業終了日</label>
                    <div class="ui calendar closure-calendar end-date-of-losed">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="end_date_of_losed" wire:model.live="endDateOfLosed"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>職場復帰日</label>
                    <div class="ui calendar closure-calendar date-of-return-to-work">
                        <div class="ui fluid input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" id="date_of_return_to_work" wire:model.live="dateOfReturnToWork"
                                placeholder="YYYY年M月D日" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @if (!$this->id)
        <div class="mt-2">
            <h3>従業員選択</h3>
            <div class="ui card card-shadow" style="padding: 1em; width: 100%;">
                <div class="content">
                    <div class="employee-select-area ui form">
                        <div class="two fields pb-1">
                            <div class="field">
                                <div class="ui left icon input">
                                    <input type="text" placeholder="従業員氏名" maxlength="20"
                                        wire:model.live="search" autocomplete="off">
                                    <i class="search icon"></i>
                                </div>
                            </div>
                            <div class="field">
                                <select class="ui fluid dropdown" wire:model.live="branch_id">
                                    <option value="">全ての支店</option>
                                    @foreach ($branch_list as $k => $item)
                                        <option value="{{ $k }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="ui very relaxed list">
                            @foreach ($data['items'] as $item)
                                <div class="item {{ $employee_id == $item->id ? 'selected' : '' }}">
                                    <div class="right floated content">
                                        <button type="button" class="ui button small"
                                            wire:click="selectEmployee({{ $item->id }})">選択</button>
                                    </div>
                                    <img class="ui avatar image" src="{{ asset('/img/image.png') }}">
                                    <div class="content">
                                        <a class="header" style="">{{ $item->last_name }}
                                            {{ $item->first_name }}</a>
                                        <div class="description"><b>{{ $item->branch->name }}</b></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="small-pagination" style="display: flex; justify-content: center;">
                            <div class="ui pagination borderless mini menu">
                                <button type="button"
                                    class="ui button item pagination-disable @if ($disablePrev) disabled @endif"
                                    wire:click.debounce.150ms="onPrev"><i class="chevron left icon"></i></button>
                                <button type="button"
                                    class="ui button item pagination-disable @if ($disableNext) disabled @endif"
                                    wire:click.debounce.150ms="onNext"><i class="chevron right icon"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="employee_id" name="employee_id" wire:model.live="employee_id">
            </div>
        </div>
    @endif
    <div style="display: flex; justify-content: flex-end;" class="mt-2">
        <a class="ui negative button" href="javascript:closeClosureModal()" style="width: 150px;">キャンセル</a>
        @if ($this->id)
            <button class="ui button primary button-disable" type="button" style="width: 150px;"
                wire:click.debounce.150ms="updateClosure({{ $current_closure['id'] }})">更新</button>
        @else
            <button class="ui button primary button-disable" type="button" style="width: 150px;"
                wire:click.debounce.150ms="submitClosure">保存</button>
        @endif
    </div>
</div>

@script
    <script type="module">
        Livewire.on('closure-modal-render', () => {
            setTimeout(() => {
                function initializeCalendar(selector, value) {
                    $(selector).calendar({
                        type: 'date',
                        formatter: {
                            date: 'Y"年"M"月"D"日"'
                        },
                        text: {
                            days: ['日', '月', '火', '水', '木', '金', '土'],
                            months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月',
                                '11月', '12月'
                            ],
                        },
                        initialDate: "",
                        onChange: (_, t) => {
                            @this.set(value, t);
                        }
                    });
                }
                initializeCalendar('.closure-calendar.start-date-of-closed', 'startDateOfClosed');
                initializeCalendar('.closure-calendar.end-date-of-losed', 'endDateOfLosed');
                initializeCalendar('.closure-calendar.date-of-return-to-work', 'dateOfReturnToWork');
                initializeCalendar('.closure-calendar.due-date', 'dueDate');
                initializeCalendar('.closure-calendar.planned-end-date-of-closure',
                    'plannedEndDateOfClosure');
                initializeCalendar('.closure-calendar.date-of-birth', 'dateOfBirth');
                initializeCalendar('.closure-calendar.date-of-start-of-foster-care',
                    'dateOfStartOfFosterCare');
                initializeCalendar('.closure-calendar.planned-end-date-of-child-support',
                    'plannedEndDateOfChildSupport');
                initializeCalendar('.closure-calendar.end-date-of-foster-care', 'endDateOfFosterCare');
                initializeCalendar('.closure-calendar.date-of-commencement-of-special-childcare-provision',
                    'dateOfCommencementOfSpecialChildcareProvision');
            }, 0);
        });
        window.closeClosureModal = () => {
            $('.closure-modal').modal('hide');
            @this.set('startDateOfClosed', '');
            $('.start-date-of-closed').calendar('clear');
            @this.set('endDateOfLosed', '');
            $('.end-date-of-losed').calendar('clear');
            @this.set('dateOfReturnToWork', '');
            $('.date-of-return-to-work').calendar('clear');
            @this.set('dueDate', '');
            $('.due-date').calendar('clear');
            @this.set('plannedEndDateOfClosure', '');
            $('.planned-end-date-of-closure').calendar('clear');
            @this.set('dateOfBirth', '');
            $('.date-of-birth').calendar('clear');
            @this.set('dateOfStartOfFosterCare', '');
            $('.date-of-start-of-foster-care').calendar('clear');
            @this.set('plannedEndDateOfChildSupport', '');
            $('.planned-end-date-of-child-support').calendar('clear');
            @this.set('endDateOfFosterCare', '');
            $('.end-date-of-foster-care').calendar('clear');
            @this.set('dateOfCommencementOfSpecialChildcareProvision', '');
            $('.date-of-commencement-of-special-childcare-provision').calendar('clear');
            $('.item.selected').removeClass('selected');
            $('#employee_id').val('');
            @this.set('employee_id', '');
        };
    </script>
@endscript
