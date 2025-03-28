<div class="ui card full card-shadow item-0 my-1">
    <div class="content">
        @script
            <script type="module">
                $(document).ready(() => {
                    $('.holiday-calendar.key-{{ $key }}').each((index, element) => {
                        const parent = $(element).find('input');
                        const key = parent[0].attributes['wire:model.live']['nodeValue'];

                        const selectYear = $('#selectYear').val();
                        const minDate = new Date(selectYear, 0, 1); 
                        const maxDate = new Date(selectYear, 11, 31);

                        $(element).calendar('destroy');
                        $(element).calendar({
                            type: 'date',
                            minDate: minDate,
                            maxDate: maxDate,
                            formatter: {
                                date: 'M"月"D"日"'
                            },
                            text: {
                                days: ['日', '月', '火', '水', '木', '金', '土'],
                                months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月',
                                    '11月',
                                    '12月'
                                ],
                            },
                            onChange: (d, t) => {
                                if (key) @this.set(key, t);
                            }
                        });
                    });
                });

                $('#selectYear').on('change', () => {
                    $('.holiday-calendar.key-{{ $key }}').each((index, element) => {
                        const parent = $(element).find('input');
                        const key = parent[0].attributes['wire:model.live']['nodeValue'];

                        const selectYear = $('#selectYear').val();
                        const minDate = new Date(selectYear, 0, 1); 
                        const maxDate = new Date(selectYear, 11, 31);

                        $(element).calendar('destroy');

                        $(element).calendar({
                            type: 'date',
                            minDate: minDate,
                            maxDate: maxDate,
                            formatter: {
                                date: 'M"月"D"日"'
                            },
                            text: {
                                days: ['日', '月', '火', '水', '木', '金', '土'],
                                months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月',
                                    '11月',
                                    '12月'
                                ],
                            },
                            onChange: (d, t) => {
                                if (key) @this.set(key, t);
                            }
                        });
                    });
                });
            </script>
        @endscript

        <input type="hidden" name="holiday_id[]" value="{{ $this->item['id'] ? $this->item['id'] : '' }}">
        <div class="two fields">
            <div class="field required {{ err_bind($errs, 'holiday_name', $key) }}">
                <label for="holiday_name" style="font-size: 14px;">祝日名称</label>
                <input type="text" name="holiday_name[]" wire:model.live="item.holiday_name" placeholder="" maxlength="20" autocomplete="off">
            </div>

            <div class="field required {{ err_bind($errs, 'holiday_date', $key) }}">
                <label for="holiday_date" style="font-size: 14px;">祝日年月日</label>
                <div class="ui calendar holiday-calendar key-{{ $key }}" wire:ignore>
                    <div class="ui fluid input left icon">
                        <i class="calendar icon"></i>
                        <input type="text" name="holiday_date[]" wire:model.live="item.holiday_date"  placeholder="M月D日" autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="p-1" style="width: 220px; margin-top: 13px; text-align: right;">
                <button class="ui negative button" type="button"
                    wire:click="removeHoliday({{ $key }})">
                    この祝日を削除
                </button>
            </div>
        </div>
    </div>
</div>
