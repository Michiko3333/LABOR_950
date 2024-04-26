<div class="branch-container">
    <script type="module">
        window.branch = () => {
            $('.branch-calendar').calendar({
                type: 'date',
                formatter: {
                    date: 'Y"年"M"月"D"日"'
                },
                text: {
                    days: ['日', '月', '火', '水', '木', '金', '土'],
                    months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                },
                initialDate: "",
            });
            $('.ui.accordion').accordion({
                onChange: function(e) {
                    const acs = $('[data-accordion]');
                    const d = [];
                    for (let i = 0; i < acs.length; i++) {
                        const element = acs[i];
                        const k = $(element).data('accordion');
                        const cls = $(element).attr('class');
                        d.push({
                            index: k,
                            value: cls
                        });
                    }

                    Livewire.dispatch('active-state', {
                        data: d
                    });
                },
            });
        }
    </script>
    @foreach ($data as $key => $item)
        <div class="ui styled accordion card-shadow my-2" style="width: 100%;">
            <div class="title active">
                <i class="dropdown icon"></i>
                【{{ $branch_types[$item['br-branch_type']] }}】&nbsp;{{ $item['br-name'] }}
            </div>
            <div data-accordion="{{ $key }}" class="{{ $item['br-class_content'] }}">
                <input type="hidden" name="br-id[]" value="{{ $item['br-id'] }}" />
                <div class="content_inner">
                    <h3>事業所基本情報</h3>
                    <div class="two fields" style="padding: 0;">
                        <div class="field required {{ err_bind($errs, 'br-name', $key) }}">
                            <label for="br-name">名称</label>
                            <input type="text" name="br-name[]" wire:model.live="data.{{ $key }}.br-name"
                                placeholder="">
                        </div>
                        <div class="ui unstackable two fields">
                            <div class="field required {{ err_bind($errs, 'br-branch_type', $key) }}">
                                <label for="br-branch_type">区分</label>
                                <select class="ui fluid dropdown" name="br-branch_type[]"
                                    wire:model.live="data.{{ $key }}.br-branch_type"
                                    {{ $key == 0 ? 'disabled' : '' }}>
                                    @foreach ($branch_types as $k => $value)
                                        @if ($key > 0 && $k == 1)
                                            @continue
                                        @endif
                                        <option value="{{ $k }}" {{ $key == 0 ? 'selected' : '' }}>
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                                @if ($key == 0)
                                    <input type="hidden" name="br-branch_type[]" value="1" />
                                @endif
                            </div>
                            <div class="field required {{ err_bind($errs, 'br-place_type', $key) }}">
                                <label for="br-place_type">国内外</label>
                                <select class="ui fluid dropdown" name="br-place_type[]"
                                    wire:model.live="data.{{ $key }}.br-place_type">
                                    <option value="">未選択</option>
                                    @foreach ($place_type as $k => $value)
                                        <option value="{{ $k }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="four wide field required {{ err_bind($errs, 'br-post_code', $key) }}">
                            <label for="br-post_code">郵便番号</label>
                            <input type="text" name="br-post_code[]"
                                wire:model.live="data.{{ $key }}.br-post_code" placeholder="">
                        </div>
                        <div class="four wide field required {{ err_bind($errs, 'br-address_prefecture', $key) }}">
                            <label for="br-address_prefecture">住所（都道府県）</label>
                            <select class="ui fluid dropdown" name="br-address_prefecture[]"
                                wire:model.live="data.{{ $key }}.br-address_prefecture">
                                <option value="">未選択</option>
                                @foreach ($prefectures as $k => $value)
                                    <option value="{{ $k }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="eight wide field required {{ err_bind($errs, 'br-address_city', $key) }}">
                            <label for="br-address_city">住所（市区町村）</label>
                            <input type="text" name="br-address_city[]"
                                wire:model.live="data.{{ $key }}.br-address_city" placeholder="">
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field required {{ err_bind($errs, 'br-address_ward', $key) }}">
                            <label for="br-address_ward">住所（丁目・番地）</label>
                            <input type="text" name="br-address_ward[]"
                                wire:model.live="data.{{ $key }}.br-address_ward" placeholder="">
                        </div>
                        <div class="field required {{ err_bind($errs, 'br-address_apartment', $key) }}">
                            <label for="br-address_apartment">住所（アパート・マンション名等）</label>
                            <input type="text" name="br-address_apartment[]"
                                wire:model.live="data.{{ $key }}.br-address_apartment" placeholder="">
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="ui unstackable three fields field" style="padding: 0;">
                            <div class="field tel-hyphen required {{ err_bind($errs, 'br-tel_area_code', $key) }}"
                                style="padding-right: 0.8em;">
                                <label for="br-tel_area_code">電話番号</label>
                                <input type="text" name="br-tel_area_code[]"
                                    wire:model.live="data.{{ $key }}.br-tel_area_code" placeholder="市外局番">
                            </div>

                            <div class="field tel-hyphen {{ err_bind($errs, 'br-tel_city_code', $key) }}"
                                style="padding-left: 0.8em; padding-right: 0.8em;">
                                <label for="br-tel_city_code"></label>
                                <input type="text" name="br-tel_city_code[]"
                                    wire:model.live="data.{{ $key }}.br-tel_city_code" placeholder="市内局番">
                            </div>

                            <div class="field {{ err_bind($errs, 'br-tel_subscriber_code', $key) }}"
                                style="padding-left: 0.8em;">
                                <label for="br-tel_subscriber_code"></label>
                                <input type="text" name="br-tel_subscriber_code[]"
                                    wire:model.live="data.{{ $key }}.br-tel_subscriber_code"
                                    placeholder="加入者番号">
                            </div>
                        </div>
                        <div class="field {{ err_bind($errs, 'br-tel_overseas', $key) }}">
                            <label for="br-tel_overseas">国外電話番号</label>
                            <input type="text" name="br-tel_overseas[]"
                                wire:model.live="data.{{ $key }}.br-tel_overseas" placeholder="">
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="ui unstackable three fields field" style="padding: 0;">
                            <div class="field tel-hyphen {{ err_bind($errs, 'br-fax1', $key) }}"
                                style="padding-right: 0.8em;">
                                <label for="br-tel_area_code">fax</label>
                                <input type="text" name="br-fax1[]"
                                    wire:model.live="data.{{ $key }}.br-fax1" placeholder="">
                            </div>

                            <div class="field tel-hyphen {{ err_bind($errs, 'br-fax2', $key) }}"
                                style="padding-left: 0.8em; padding-right: 0.8em;">
                                <label for="br-fax2"></label>
                                <input type="text" name="br-fax2[]"
                                    wire:model.live="data.{{ $key }}.br-fax2" placeholder="">
                            </div>

                            <div class="field {{ err_bind($errs, 'br-fax3', $key) }}"
                                style="padding-left: 0.8em;">
                                <label for="br-fax3"></label>
                                <input type="text" name="br-fax3[]"
                                    wire:model.live="data.{{ $key }}.br-fax3" placeholder="">
                            </div>
                        </div>
                        <div class="field required {{ err_bind($errs, 'br-mail_address', $key) }}">
                            <label for="br-mail_address">メールアドレス</label>
                            <input type="text" name="br-mail_address[]"
                                wire:model.live="data.{{ $key }}.br-mail_address" placeholder="">
                        </div>
                    </div>
                    <div class="ui divider my-2"></div>
                    <h3>保険関連</h3>
                    <div class="three fields">
                        <div class="field {{ err_bind($errs, 'br-labor_insurance_no', $key) }}">
                            <label for="br-labor_insurance_no">労働保険番号</label>
                            <input type="text" name="br-labor_insurance_no[]"
                                wire:model.live="data.{{ $key }}.br-labor_insurance_no" placeholder="">
                        </div>

                        <div class="field {{ err_bind($errs, 'br-labor_insurance_payment_method', $key) }}">
                            <label for="br-labor_insurance_payment_method">労働保険納付区分</label>
                            <select class="ui fluid dropdown" name="br-labor_insurance_payment_method[]"
                                wire:model.live="data.{{ $key }}.br-labor_insurance_payment_method">
                                <option value="">未選択</option>
                                @foreach ($labor_insurance_payment_method as $k => $value)
                                    <option value="{{ $k }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="field {{ err_bind($errs, 'br-labor_insurance_establishment_date', $key) }}">
                            <label for="br-labor_insurance_establishment_date">労働保険成立年月日</label>
                            <div class="ui calendar branch-calendar">
                                <div class="ui fluid input left icon">
                                    <i class="calendar icon"></i>
                                    <input type="text" name="br-labor_insurance_establishment_date[]"
                                        wire:model.live="data.{{ $key }}.br-labor_insurance_establishment_date"
                                        placeholder="YYYY年M月D日">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field {{ err_bind($errs, 'br-insurance_office_no', $key) }}">
                            <label for="br-insurance_office_no">事業所番号（保険）</label>
                            <input type="text" name="br-insurance_office_no[]"
                                wire:model.live="data.{{ $key }}.br-insurance_office_no" placeholder="">
                        </div>

                        <div class="field {{ err_bind($errs, 'br-insurance_office_reference_no', $key) }}">
                            <label for="br-insurance_office_reference_no">事業所整理番号（保険）</label>
                            <input type="text" name="br-insurance_office_reference_no[]"
                                wire:model.live="data.{{ $key }}.br-insurance_office_reference_no"
                                placeholder="">
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field {{ err_bind($errs, 'br-pension_office_no', $key) }}">
                            <label for="br-pension_office_no">事業所番号（厚生年金）</label>
                            <input type="text" name="br-pension_office_no[]"
                                wire:model.live="data.{{ $key }}.br-pension_office_no" placeholder="">
                        </div>
                        <div class="field {{ err_bind($errs, 'br-employment_insurance_office_no', $key) }}">
                            <label for="br-employment_insurance_office_no">事業所番号（雇用保険）</label>
                            <input type="text" name="br-employment_insurance_office_no[]"
                                wire:model.live="data.{{ $key }}.br-employment_insurance_office_no"
                                placeholder="">
                        </div>

                        <div class="field {{ err_bind($errs, 'br-employment_insurance_establishment_date', $key) }}">
                            <label for="br-employment_insurance_establishment_date">雇用保険設立年月日</label>
                            <div class="ui calendar branch-calendar">
                                <div class="ui fluid input left icon">
                                    <i class="calendar icon"></i>
                                    <input type="text" name="br-employment_insurance_establishment_date[]"
                                        wire:model.live="data.{{ $key }}.br-employment_insurance_establishment_date"
                                        placeholder="YYYY年M月D日">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="three fields">
                        <div class="field {{ err_bind($errs, 'br-pension_office_reference_prefecture', $key) }}">
                            <label for="br-pension_office_reference_prefecture">事業所整理記号-都道府県コード</label>
                            <input type="text" name="br-pension_office_reference_prefecture[]"
                                wire:model.live="data.{{ $key }}.br-pension_office_reference_prefecture"
                                placeholder="">
                        </div>
                        <div class="field {{ err_bind($errs, 'br-pension_office_reference_no_cities', $key) }}">
                            <label for="br-pension_office_reference_no_cities">事業所整理記号-郡市区記号</label>
                            <input type="text" name="br-pension_office_reference_no_cities[]"
                                wire:model.live="data.{{ $key }}.br-pension_office_reference_no_cities"
                                placeholder="">
                        </div>
                        <div class="field {{ err_bind($errs, 'br-pension_office_reference_no_office', $key) }}">
                            <label for="br-pension_office_reference_no_office">事業所整理記号-事業所記号</label>
                            <input type="text" name="br-pension_office_reference_no_office[]"
                                wire:model.live="data.{{ $key }}.br-pension_office_reference_no_office"
                                placeholder="">
                        </div>
                    </div>
                    <div class="ui divider my-2"></div>
                    <h3>管轄</h3>
                    <div class="four fields">
                        <div class="field {{ err_bind($errs, 'br-hello_work_id', $key) }}">
                            <label for="br-hello_work_id">公共職業安定所</label>
                            <input type="text" name="br-hello_work_id[]"
                                wire:model.live="data.{{ $key }}.br-hello_work_id" placeholder="">
                        </div>

                        <div class="field {{ err_bind($errs, 'br-labor_bureau_id', $key) }}">
                            <label for="br-labor_bureau_id">労働局</label>
                            <input type="text" name="br-labor_bureau_id[]"
                                wire:model.live="data.{{ $key }}.br-labor_bureau_id" placeholder="">
                        </div>
                        <div class="field {{ err_bind($errs, 'br-labor_supervision_id', $key) }}">
                            <label for="br-labor_supervision_id">労働基準監督署</label>
                            <input type="text" name="br-labor_supervision_id[]"
                                wire:model.live="data.{{ $key }}.br-labor_supervision_id" placeholder="">
                        </div>
                        <div class="field {{ err_bind($errs, 'br-pension_office_id', $key) }}">
                            <label for="br-pension_office_id">年金事務所ID</label>
                            <input type="text" name="br-pension_office_id[]"
                                wire:model.live="data.{{ $key }}.br-pension_office_id" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="content_inner">
                    <h3>勤務関連</h3>
                    <h4>開始設定</h4>
                    <div class="three fields">
                        <div class="field {{ err_bind($errs, 'br-start_date_of_month', $key) }}">
                            <label for="br-start_date_of_month">月</label>
                            <input type="text" name="br-start_date_of_month[]"
                                wire:model.live="data.{{ $key }}.br-start_date_of_month" placeholder="">
                        </div>

                        <div class="field {{ err_bind($errs, 'br-start_days_of_week', $key) }}">
                            <label for="br-start_days_of_week">週</label>
                            <select class="ui fluid dropdown" name="br-start_days_of_week[]"
                                wire:model.live="data.{{ $key }}.br-start_days_of_week">
                                <option value="">未選択</option>
                                @foreach ($start_days_of_week as $k => $value)
                                    <option value="{{ $k }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="field {{ err_bind($errs, 'br-start_time_of_day', $key) }}">
                            <label for="br-start_time_of_day">日</label>
                            <input type="text" name="br-start_time_of_day[]"
                                wire:model.live="data.{{ $key }}.br-start_time_of_day" placeholder="">
                        </div>
                    </div>
                    <h4>就労時間設定</h4>
                    <div class="two fields">
                        <div class="field {{ err_bind($errs, 'br-work_time_start', $key) }}">
                            <label for="br-work_time_start">就業開始</label>
                            <input type="text" name="br-work_time_start[]"
                                wire:model.live="data.{{ $key }}.br-work_time_start" placeholder="">
                        </div>

                        <div class="field {{ err_bind($errs, 'br-work_time_end', $key) }}">
                            <label for="br-work_time_end">就業終了</label>
                            <input type="text" name="br-work_time_end[]"
                                wire:model.live="data.{{ $key }}.br-work_time_end" placeholder="">
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field {{ err_bind($errs, 'br-agreed_hours_year', $key) }}">
                            <label for="br-agreed_hours_year">所定労働時間(年)</label>
                            <input type="text" name="br-agreed_hours_year[]"
                                wire:model.live="data.{{ $key }}.br-agreed_hours_year" placeholder="">
                        </div>

                        <div class="field {{ err_bind($errs, 'br-agreed_hours_month', $key) }}">
                            <label for="br-agreed_hours_month">所定労働時間(月)</label>
                            <input type="text" name="br-agreed_hours_month[]"
                                wire:model.live="data.{{ $key }}.br-agreed_hours_month" placeholder="">
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field {{ err_bind($errs, 'br-agreed_hours_week', $key) }}">
                            <label for="br-agreed_hours_week">所定労働時間(週)</label>
                            <input type="text" name="br-agreed_hours_week[]"
                                wire:model.live="data.{{ $key }}.br-agreed_hours_week" placeholder="">
                        </div>
                        <div class="field {{ err_bind($errs, 'br-agreed_hours_day', $key) }}">
                            <label for="br-agreed_hours_day">所定労働時間(日)</label>
                            <input type="text" name="br-agreed_hours_day[]"
                                wire:model.live="data.{{ $key }}.br-agreed_hours_day" placeholder="">
                        </div>
                    </div>
                    <h4>休日設定</h4>
                    <div class="two fields">
                        <div class="field {{ err_bind($errs, 'br-working_days_yearly', $key) }}">
                            <label for="br-working_days_yearly">労働(年間)</label>
                            <input type="text" name="br-working_days_yearly[]"
                                wire:model.live="data.{{ $key }}.br-working_days_yearly" placeholder="">
                        </div>

                        <div class="field {{ err_bind($errs, 'br-working_days_monthly', $key) }}">
                            <label for="br-working_days_monthly">労働(月間)</label>
                            <input type="text" name="br-working_days_monthly[]"
                                wire:model.live="data.{{ $key }}.br-working_days_monthly" placeholder="">
                        </div>
                    </div>

                    <div class="three fields">
                        <div class="field {{ err_bind($errs, 'br-holiday_yearly', $key) }}">
                            <label for="br-holiday_yearly">休日(年間)</label>
                            <input type="text" name="br-holiday_yearly[]"
                                wire:model.live="data.{{ $key }}.br-holiday_yearly" placeholder="">
                        </div>

                        <div class="field {{ err_bind($errs, 'br-hoiday_monthly', $key) }}">
                            <label for="br-holiday_monthly">休日(月間)</label>
                            <input type="text" name="br-holiday_monthly[]"
                                wire:model.live="data.{{ $key }}.br-holiday_monthly" placeholder="">
                        </div>
                        <div class="field {{ err_bind($errs, 'br-work_style_type', $key) }}">
                            <label for="br-work_style_type">体制区分</label>
                            <select class="ui fluid dropdown" name="br-work_style_type[]"
                                wire:model.live="data.{{ $key }}.br-work_style_type">
                                <option value="">未選択</option>
                                @foreach ($work_style_type as $k => $value)
                                    <option value="{{ $k }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="two fields">
                        <div class="field {{ err_bind($errs, 'br-holiday_legal', $key) }}">
                            <label for="br-holiday_legal">休日内容(法定休日)</label>
                            <input type="text" name="br-holiday_legal[]"
                                wire:model.live="data.{{ $key }}.br-holiday_legal" placeholder="">
                        </div>
                        <div class="field {{ err_bind($errs, 'br-holiday_not_legal', $key) }}">
                            <label for="br-holiday_not_logal">休日内容(法定休日以外)</label>
                            <input type="text" name="br-holiday_not_logal[]"
                                wire:model.live="data.{{ $key }}.br-holiday_not_logal" placeholder="">
                        </div>
                    </div>
                    @if ($key > 0)
                        <div style="text-align: right;">
                            <button class="ui negative button" type="button"
                                wire:click="remove({{ $key }}, {{ json_encode($data[$key]) }})">
                                この事業所を削除
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    <button class="append-branch" type="button" wire:click="append"
        {{ count($data) > 9 ? 'disabled' : '' }}><i class="plus circle icon"></i>事業所を追加</button>
    @script
        <script type="module">
            $(document).ready(function() {
                branch();
            });
            $wire.on('form-appended', () => {
                setTimeout(() => {
                    branch();
                    // window.scroll(0,$(document).height());
                }, 0);
            });
        </script>
    @endscript
</div>
