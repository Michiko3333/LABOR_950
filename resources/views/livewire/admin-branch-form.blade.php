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

            $('.ui.dropdown.dropdown.multiple').dropdown();
            $(document).ready(function() {
                $('.working_hours_calendar').calendar({
                    type: 'time',
                    formatter: {
                        time: 'HH:mm',
                        cellTime: 'HH:mm'
                    }
                });
            });
            Livewire.dispatch('branch-form-loaded');
        }
    </script>
    @foreach ($data as $key => $item)
        <div class="ui styled accordion card-shadow my-2 branch-area-{{ $key }}" style="width: 100%;">
            <div class="title active">
                <i class="dropdown icon"></i>
                @if ($key === 0 && !$this->company)
                    【{{ $branch_types[$item['br-branch_type']] }}】&nbsp;{{ $item['br-name'] }}
                @elseif($key !== 0 && !$this->company)
                    【{{ $branch_types[2] }}】&nbsp;{{ $item['br-name'] }}
                @else
                    【{{ $branch_types[$item['br-branch_type']] }}】&nbsp;{{ $item['br-name'] }}
                @endif
            </div>
            <div data-accordion="{{ $key }}" class="{{ $item['br-class_content'] }} p-0" wire:ignore>
                <div class="side-menu">
                    <div class="item" style="border-right: 1px solid #DEDEDF;">
                        @php
                            $field1 = $errors->hasAny([
                                'br-name.' . $key,
                                'br-branch_type.' . $key,
                                'br-place_type.' . $key,
                                'br-post_code.' . $key,
                                'br-address_prefecture.' . $key,
                                'br-address_city.' . $key,
                                'br-address_ward.' . $key,
                                'br-address_apartment.' . $key,
                                'br-address_city_kana.' . $key,
                                'br-address_ward_kana.' . $key,
                                'br-address_apartment_kana.' . $key,
                                'br-tel_area_code.' . $key,
                                'br-tel_city_code.' . $key,
                                'br-tel_subscriber_code.' . $key,
                                'br-tel_overseas.' . $key,
                                'br-fax1.' . $key,
                                'br-fax2.' . $key,
                                'br-fax3.' . $key,
                                'br-mail_address.' . $key,
                            ]);
                            $field2 = $errors->hasAny([
                                'br-kenpo_no.' . $key,
                                'br-insurance_office_name.' . $key,
                                'br-insurance_office_no.' . $key,
                                'br-pension_office_reference_prefecture.' . $key,
                                'br-pension_office_reference_no_cities.' . $key,
                                'br-pension_office_reference_no_office.' . $key,
                                'br-insurance_applicable_date.' . $key,
                                'br-bonus_payment_month.' . $key,
                                'br-pension_office_name.' . $key,
                                'br-pension_office_no.' . $key,
                                'br-pension_office_id.' . $key,
                                'br-insurance_office_reference_no.' . $key,
                                'br-rate_pattern_id.' . $key,
                                'br-fractional_adjustment_pattern_id.' . $key,
                            ]);
                            $field3 = $errors->hasAny([
                                'br-employment_insurance_office_no.' . $key,
                                'br-employment_insurance_rate.' . $key,
                                'br-hello_work_id.' . $key,
                            ]);
                            $field4 = $errors->hasAny([
                                'br-labor_insurance_no.' . $key,
                                'br-labor_insurance_payment_method.' . $key,
                                'br-labor_insurance_category.' . $key,
                                'br-labor_bureau_name.' . $key,
                                'br-labor_supervision_name.' . $key,
                            ]);
                            $field5 = $errors->hasAny([
                                'br-start_date_of_month.' . $key,
                                'br-start_days_of_week.' . $key,
                                'br-start_time_of_day.' . $key,
                                'br-work_time_start.' . $key,
                                'br-work_time_end.' . $key,
                                'br-agreed_hours_year_h.' . $key,
                                'br-agreed_hours_month_h.' . $key,
                                'br-agreed_hours_week_h.' . $key,
                                'br-agreed_hours_day_h.' . $key,
                                'br-agreed_hours_year_m.' . $key,
                                'br-agreed_hours_month_m.' . $key,
                                'br-agreed_hours_week_m.' . $key,
                                'br-agreed_hours_day_m.' . $key,
                                'br-working_days_yearly.' . $key,
                                'br-working_days_monthly-.' . $key,
                                'br-holiday_yearly.' . $key,
                                'br-holiday_monthly.' . $key,
                                'br-work_style_type.' . $key,
                                'br-holiday_legal.' . $key,
                                'br-holiday_not_logal.' . $key,
                            ]);
                        @endphp
                        <div class="ui secondary vertical menu branch-tab-menu px-1">
                            <a class="active item {{ $field1 ? 'tab-error' : '' }}"
                                data-tab="事業所基本情報_{{ $key }}">事業所基本情報</a>
                            <a class="item {{ $field2 ? 'tab-error' : '' }}"
                                data-tab="社会保険_{{ $key }}">社会保険</a>
                            <a class="item {{ $field3 ? 'tab-error' : '' }}"
                                data-tab="雇用保険_{{ $key }}">雇用保険</a>
                            <a class="item {{ $field4 ? 'tab-error' : '' }}"
                                data-tab="労働保険_{{ $key }}">労働保険</a>
                            <a class="item {{ $field5 ? 'tab-error' : '' }}"
                                data-tab="勤務関連_{{ $key }}">勤務関連</a>
                        </div>
                    </div>
                    <div class="item" style="width: 100%;">
                        <input type="hidden" name="br-id[]" value="{{ $item['br-id'] }}" />
                        <div class="ui active tab segment mt-0 py-0" data-tab="事業所基本情報_{{ $key }}"
                            style="width: 100%; border: none; box-shadow: none;">
                            <h3>事業所基本情報</h3>
                            <div class="two fields" style="padding: 0;">
                                <div class="field required {{ err_bind($errs, 'br-name', $key) }}">
                                    <label for="br-name">名称</label>
                                    <input type="text" name="br-name[]"
                                        wire:model.live="data.{{ $key }}.br-name" placeholder="">
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
                                <div
                                    class="four wide field required {{ err_bind($errs, 'br-address_prefecture', $key) }}">
                                    <label for="br-address_prefecture">住所（都道府県）</label>
                                    <select class="ui fluid dropdown" name="br-address_prefecture[]"
                                        wire:model.live="data.{{ $key }}.br-address_prefecture">
                                        <option value="">未選択</option>
                                        @foreach ($prefectures as $k => $value)
                                            <option value="{{ $k }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="two fields">
                                <div class="eight wide field required {{ err_bind($errs, 'br-address_city', $key) }}">
                                    <label for="br-address_city">住所（市区町村）</label>
                                    <input type="text" name="br-address_city[]"
                                        wire:model.live="data.{{ $key }}.br-address_city" placeholder="">
                                </div>
                                <div class="field required {{ err_bind($errs, 'br-address_ward', $key) }}">
                                    <label for="br-address_ward">住所（丁目・番地）</label>
                                    <input type="text" name="br-address_ward[]"
                                        wire:model.live="data.{{ $key }}.br-address_ward" placeholder="">
                                </div>
                            </div>
                            <div class="two fields">
                                <div class="field {{ err_bind($errs, 'br-address_apartment', $key) }}">
                                    <label for="br-address_apartment">住所（アパート・マンション名等）</label>
                                    <input type="text" name="br-address_apartment[]"
                                        wire:model.live="data.{{ $key }}.br-address_apartment" placeholder="">
                                </div>
                            </div>
                            <div class="ui divider my-2"></div>
                            <div class="two fields">
                                <div class="field required {{ err_bind($errs, 'br-address_city_kana', $key) }}">
                                    <label for="br-address_city_kana">住所（市区町村）（カナ）</label>
                                    <input type="text" name="br-address_city_kana[]"
                                        wire:model.live="data.{{ $key }}.br-address_city_kana" placeholder="">
                                </div>
                                <div class="field required {{ err_bind($errs, 'br-address_ward_kana', $key) }}">
                                    <label for="br-address_ward_kana">住所（丁目・番地）（カナ）</label>
                                    <input type="text" name="br-address_ward_kana[]"
                                        wire:model.live="data.{{ $key }}.br-address_ward_kana"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="two fields">
                                <div class="field {{ err_bind($errs, 'br-address_apartment_kana', $key) }}">
                                    <label for="br-address_apartment_kana">住所（アパート・マンション名等）（カナ）</label>
                                    <input type="text" name="br-address_apartment_kana[]"
                                        wire:model.live="data.{{ $key }}.br-address_apartment_kana"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="ui divider my-2"></div>
                            <div class="two fields">
                                <div class="ui unstackable three fields field" style="padding: 0;">
                                    <div class="field required tel-hyphen {{ err_bind($errs, 'br-tel_area_code', $key) }}"
                                        style="padding-right: 0.8em;">
                                        <label for="br-tel_area_code">電話番号</label>
                                        <input type="text" name="br-tel_area_code[]"
                                            wire:model.live="data.{{ $key }}.br-tel_area_code"
                                            placeholder="市外局番">
                                    </div>
                                    <div class="field required tel-hyphen {{ err_bind($errs, 'br-tel_city_code', $key) }}"
                                        style="padding-left: 0.8em; padding-right: 0.8em;">
                                        <label for="br-tel_city_code"></label>
                                        <input type="text" name="br-tel_city_code[]"
                                            wire:model.live="data.{{ $key }}.br-tel_city_code"
                                            placeholder="市内局番">
                                    </div>
                                    <div class="field required {{ err_bind($errs, 'br-tel_subscriber_code', $key) }}"
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
                                        wire:model.live="data.{{ $key }}.br-tel_overseas" placeholder="" maxlength="15">
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
                        </div>

                        <div class="ui tab segment mt-0 py-0" data-tab="社会保険_{{ $key }}"
                            style="width: 100%; border: none; box-shadow: none;">
                            <h3>社会保険</h3>
                            <div class="two fields">
                                <div class="field {{ err_bind($errs, 'br-kenpo_no', $key) }}">
                                    <label for="br-kenpo_no">協会けんぽNo</label>
                                    <input type="text" name="br-kenpo_no[]"
                                        wire:model.live="data.{{ $key }}.br-kenpo_no" placeholder=""
                                        maxlength="8">
                                </div>
                            </div>
                            <div class="two fields">
                                <div class="field {{ err_bind($errs, 'br-insurance_office_name', $key) }}">
                                    <label for="br-insurance_office_name">健康保険組合・名称</label>
                                    <input type="text" name="br-insurance_office_name[]"
                                        wire:model.live="data.{{ $key }}.br-insurance_office_name"
                                        placeholder="">
                                </div>
                                <div class="field {{ err_bind($errs, 'br-insurance_office_no', $key) }}">
                                    <label for="br-insurance_office_no">健康保険組合・事業所番号</label>
                                    <input type="text" name="br-insurance_office_no[]"
                                        wire:model.live="data.{{ $key }}.br-insurance_office_no"
                                        placeholder="" maxlength="5">
                                </div>
                            </div>
                            <div class="three fields">
                                <div
                                    class="field {{ err_bind($errs, 'br-pension_office_reference_prefecture', $key) }}">
                                    <label for="br-pension_office_reference_prefecture">事業所番号整理記号・都道府県コード</label>
                                    <input type="text" name="br-pension_office_reference_prefecture[]"
                                        wire:model.live="data.{{ $key }}.br-pension_office_reference_prefecture"
                                        placeholder="" maxlength="2">
                                </div>
                                <div
                                    class="field {{ err_bind($errs, 'br-pension_office_reference_no_cities', $key) }}">
                                    <label for="br-pension_office_reference_no_cities">事業所番号整理記号・郡市区符号</label>
                                    <input type="text" name="br-pension_office_reference_no_cities[]"
                                        wire:model.live="data.{{ $key }}.br-pension_office_reference_no_cities"
                                        placeholder="" maxlength="2">
                                </div>
                                <div
                                    class="field {{ err_bind($errs, 'br-pension_office_reference_no_office', $key) }}">
                                    <label for="br-pension_office_reference_no_office">事業所番号整理記号・事務所記号</label>
                                    <input type="text" name="br-pension_office_reference_no_office[]"
                                        wire:model.live="data.{{ $key }}.br-pension_office_reference_no_office"
                                        placeholder="" maxlength="4">
                                </div>
                            </div>
                            <div class="two fields">
                                <div class="field {{ err_bind($errs, 'br-insurance_applicable_date', $key) }}">
                                    <label for="br-insurance_applicable_date">社保適用年月</label>
                                    <div class="ui right labeled input">
                                        <input type="number" placeholder="1~12" min="1" max="12"
                                            name="br-insurance_applicable_date[]"
                                            wire:model.live="data.{{ $key }}.br-insurance_applicable_date">
                                        <div class="ui basic label">
                                            月
                                        </div>
                                    </div>
                                </div>
                                <div class="field {{ err_bind($errs, 'br-bonus_payment_month', $key) }}">
                                    <label for="br-bonus_payment_month">賞与支払月</label>
                                    <select class="ui fluid multiple dropdown"
                                        name="br-bonus_payment_month[{{ $key }}][]"
                                        wire:model.live="data.{{ $key }}.br-bonus_payment_month" multiple>
                                        <option value="1月">1月</option>
                                        <option value="2月">2月</option>
                                        <option value="3月">3月</option>
                                        <option value="4月">4月</option>
                                        <option value="5月">5月</option>
                                        <option value="6月">6月</option>
                                        <option value="7月">7月</option>
                                        <option value="8月">8月</option>
                                        <option value="9月">9月</option>
                                        <option value="10月">10月</option>
                                        <option value="11月">11月</option>
                                        <option value="12月">12月</option>
                                    </select>
                                </div>
                            </div>
                            <div class="two fields">
                                <div class="field {{ err_bind($errs, 'br-pension_office_name', $key) }}">
                                    <label for="br-pension_office_name">厚生年金基金・名称</label>
                                    <input type="text" name="br-pension_office_name[]"
                                        wire:model.live="data.{{ $key }}.br-pension_office_name"
                                        placeholder="">
                                </div>
                                <div class="field {{ err_bind($errs, 'br-pension_office_no', $key) }}">
                                    <label for="br-pension_office_no">厚生年金基金・事業所番号</label>
                                    <input type="text" name="br-pension_office_no[]"
                                        wire:model.live="data.{{ $key }}.br-pension_office_no"
                                        placeholder="" maxlength="5">
                                </div>
                            </div>
                            <div class="two fields">
                                <div class="field {{ err_bind($errs, 'br-pension_office_id', $key) }}">
                                    <label for="br-pension_office_id">年金事務所</label>
                                    <select class="ui fluid search dropdown" name="br-pension_office_id[]"
                                        wire:model.live="data.{{ $key }}.br-pension_office_id">
                                        <option value="">未選択</option>
                                        @foreach ($pension_office_names as $key_po => $value)
                                            <option value="{{ $key_po }}">{{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="field {{ err_bind($errs, 'br-insurance_office_reference_no', $key) }}">
                                    <label for="br-insurance_office_reference_no">健康保険・事業所整理番号</label>
                                    <input type="text" name="br-insurance_office_reference_no[]"
                                        wire:model.live="data.{{ $key }}.br-insurance_office_reference_no"
                                        placeholder="" maxlength="5">
                                </div>
                            </div>
                            <div class="ui divider"></div>
                            <div class="two fields">
                                <div class="field {{ err_bind($errs, 'br-rate_pattern_id', $key) }}">
                                    <label for="br-rate_pattern_id">料率パターン</label>
                                    <select class="ui fluid dropdown" name="br-rate_pattern_id[]"
                                        wire:model.live="data.{{ $key }}.br-rate_pattern_id">
                                        <option value="">未選択</option>
                                    </select>
                                </div>
                            </div>
                            <table class="ui celled table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>健康保険</th>
                                        <th>介護保険</th>
                                        <th>厚生年金</th>
                                        <th>基金</th>
                                        <th>基金（65）</th>
                                        <th>子育て拠出金</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="background-color: #F9FAFB; font-weight: 700;">本人</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="background: #F9FAFB; font-weight: 700;">事業主</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="two fields">
                                <div class="field {{ err_bind($errs, 'br-fractional_adjustment_pattern_id', $key) }}">
                                    <label for="br-fractional_adjustment_pattern_id">端数調整パターン</label>
                                    <select class="ui fluid dropdown" name="br-fractional_adjustment_pattern_id[]"
                                        wire:model.live="data.{{ $key }}.br-fractional_adjustment_pattern_id">
                                        <option value="">未選択</option>
                                        <option value="1">通常（四捨五入）</option>
                                        <option value="2">個別パターン</option>
                                    </select>
                                </div>
                            </div>
                            <table class="ui celled table">
                                <thead>
                                    <tr>
                                        <th>健康保険（端数調整）</th>
                                        <th>厚生年金（端数調整）</th>
                                        <th>基金（端数調整）</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="ui tab segment mt-0 py-0" data-tab="雇用保険_{{ $key }}"
                            style="width: 100%; border: none; box-shadow: none;">
                            <div class="two fields">
                                <div class="field {{ err_bind($errs, 'br-employment_insurance_office_no', $key) }}">
                                    <label for="br-employment_insurance_office_no">雇用保険・事業所番号</label>
                                    <input type="text" name="br-employment_insurance_office_no[]"
                                        wire:model.live="data.{{ $key }}.br-employment_insurance_office_no"
                                        placeholder="" maxlength="11">
                                </div>
                                <div class="field {{ err_bind($errs, 'br-employment_insurance_rate', $key) }}">
                                    <label for="br-employment_insurance_rate">雇用保険料率区分</label>
                                    <select class="ui fluid dropdown" name="br-employment_insurance_rate[]"
                                        wire:model.live="data.{{ $key }}.br-employment_insurance_rate">
                                        <option value="">未選択</option>
                                        <option value="1">一般の事業</option>
                                        <option value="2">農林水産清酒製造の事業</option>
                                        <option value="3">建設の事業</option>
                                    </select>
                                </div>
                            </div>
                            <div class="two fields">
                                <div
                                    class="field {{ err_bind($errs, 'br-employment_insurance_establishment_date', $key) }}">
                                    <label for="br-employment_insurance_establishment_date">雇用保険設立年月日</label>
                                    <div class="ui calendar branch-calendar" wire:ignore>
                                        <div class="ui fluid input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" name="br-employment_insurance_establishment_date[]"
                                                wire:model.live="data.{{ $key }}.br-employment_insurance_establishment_date"
                                                placeholder="YYYY年M月D日">
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="field {{ err_bind($errs, 'br-labor_insurance_establishment_date', $key) }}">
                                    <label for="br-labor_insurance_establishment_date">労働保険成立年月日</label>
                                    <div class="ui calendar branch-calendar" wire:ignore>
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
                                <div class="field {{ err_bind($errs, 'br-hello_work_id', $key) }}"
                                    x-init="setTimeout(function() { $('.ui.search.dropdown').dropdown(); }, 120);">
                                    <label for="br-hello_work_id">公共職業安定所</label>
                                    <select class="ui fluid search dropdown" name="br-hello_work_id[]"
                                        wire:model.live="data.{{ $key }}.br-hello_work_id">
                                        <option value="">未選択</option>
                                        @foreach ($hello_work_id as $k => $value)
                                            <option value="{{ $k }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="ui tab segment mt-0 py-0" data-tab="労働保険_{{ $key }}"
                            style="width: 100%; border: none; box-shadow: none;">
                            <h3>労働保険</h3>
                            <div class="three fields">
                                <div class="field {{ err_bind($errs, 'br-labor_insurance_no', $key) }}">
                                    <label for="br-labor_insurance_no">労働保険番号</label>
                                    <input type="text" name="br-labor_insurance_no[]"
                                        wire:model.live="data.{{ $key }}.br-labor_insurance_no"
                                        placeholder="" maxlength="14">
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
                                <div class="field {{ err_bind($errs, 'br-labor_insurance_category', $key) }}">
                                    <label for="br-labor_insurance_category">労災種類の分類</label>
                                    <select class="ui fluid dropdown" name="br-labor_insurance_category[]"
                                        wire:model.live="data.{{ $key }}.br-labor_insurance_category">
                                        <option value="">未選択</option>
                                    </select>
                                </div>
                            </div>
                            <div class="two fields">
                                <div class="field {{ err_bind($errs, 'br-labor_bureau_name', $key) }}">
                                    <label for="br-labor_bureau_name">労働局</label>
                                    <select class="ui fluid search dropdown" name="br-labor_bureau_name[]"
                                        wire:model.live="data.{{ $key }}.br-labor_bureau_name">
                                        <option value="">未選択</option>
                                        @foreach ($labor_bureau_names as $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="field {{ err_bind($errs, 'br-labor_supervision_name', $key) }}">
                                    <label for="br-labor_supervision_name">労働基準監督署</label>
                                    <select class="ui fluid search dropdown" name="br-labor_supervision_name[]"
                                        wire:model.live="data.{{ $key }}.br-labor_supervision_name">
                                        <option value="">未選択</option>
                                        @foreach ($labor_supervision_names as $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <table class="ui celled table">
                                <thead>
                                    <tr>
                                        <th>労働保険区分総数<br>（現在）</br></th>
                                        <th>人数</th>
                                        <th>雇用保険区分総数<br>（現在）</br></th>
                                        <th>人数</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="background-color: #F9FAFB; font-weight: 700;">常用労働者</td>
                                        <td></td>
                                        <td style="background-color: #F9FAFB; font-weight: 700;">常用労働者</td>
                                        <td data-label="Job"></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #F9FAFB; font-weight: 700;">役員労働者扱いのモノ</td>
                                        <td></td>
                                        <td style="background-color: #F9FAFB; font-weight: 700;">役員で雇用保険加入</td>
                                        <td data-label="Job"></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #F9FAFB; font-weight: 700;">臨時労働者</td>
                                        <td></td>
                                        <td style="background-color: #F9FAFB; font-weight: 700;"></td>
                                        <td data-label="Job"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="ui tab segment mt-0 py-0" data-tab="勤務関連_{{ $key }}"
                            style="width: 100%; border: none; box-shadow: none;">
                            <h3>勤務関連</h3>
                            <h4>開始設定</h4>
                            <div class="three fields">
                                <div class="field {{ err_bind($errs, 'br-start_date_of_month', $key) }}" wire:ignore>
                                    <label for="br-start_date_of_month">月の始まり</label>
                                    <select class="ui fluid search five column dropdown"
                                        name="br-start_date_of_month[]"
                                        wire:model.live="data.{{ $key }}.br-start_date_of_month">
                                        <option value="">日付を選択</option>
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="field {{ err_bind($errs, 'br-start_days_of_week', $key) }}">
                                    <label for="br-start_days_of_week">週の始まり</label>
                                    <select class="ui fluid dropdown" name="br-start_days_of_week[]"
                                        wire:model.live="data.{{ $key }}.br-start_days_of_week">
                                        @foreach ($start_days_of_week as $k => $value)
                                            <option value="{{ $k }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="field {{ err_bind($errs, 'br-start_time_of_day', $key) }}">
                                    <label for="br-start_time_of_day">日の始まり</label>
                                    <div class="ui calendar working_hours_calendar" wire:ignore>
                                        <div class="ui fluid input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" name="br-start_time_of_day[]"
                                                wire:model.live="data.{{ $key }}.br-start_time_of_day"
                                                placeholder="00:00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>就労時間設定</h4>
                            <div class="two fields unstackable ">
                                <div class="field {{ err_bind($errs, 'br-work_time_start', $key) }}">
                                    <label for="br-work_time_start">就業開始</label>
                                    <div class="ui calendar working_hours_calendar" wire:ignore>
                                        <div class="ui fluid input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" name="br-work_time_start[]"
                                                wire:model.live="data.{{ $key }}.br-work_time_start"
                                                placeholder="00:00">
                                        </div>
                                    </div>
                                </div>
                                <div class="field {{ err_bind($errs, 'br-work_time_end', $key) }}">
                                    <label for="br-work_time_end">就業終了</label>
                                    <div class="ui calendar working_hours_calendar" wire:ignore>
                                        <div class="ui fluid input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" name="br-work_time_end[]"
                                                wire:model.live="data.{{ $key }}.br-work_time_end"
                                                placeholder="23:59">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="two fields unstackable ">
                                <div class="field {{ err_bind($errs, 'br-agreed_hours_year_h', $key) }}">
                                    <label for="br-agreed_hours_year_h">所定労働時間(年)</label>
                                    <div class="ui right labeled input">
                                        <input type="number" placeholder="1680" min="0" max="8760"
                                            name="br-agreed_hours_year_h[]"
                                            wire:model.live="data.{{ $key }}.br-agreed_hours_year_h">
                                        <div class="ui basic label">
                                            時間
                                        </div>
                                    </div>
                                </div>
                                <div class="field {{ err_bind($errs, 'br-agreed_hours_year_m', $key) }}">
                                    <label for="br-agreed_hours_year_m"></label>
                                    <div class="ui right labeled input">
                                        <input type="number" placeholder="30" min="0" max="59"
                                            name="br-agreed_hours_year_m[]"
                                            wire:model.live="data.{{ $key }}.br-agreed_hours_year_m">
                                        <div class="ui basic label">
                                            分
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="two fields unstackable">
                                <div class="field {{ err_bind($errs, 'br-agreed_hours_month_h', $key) }}">
                                    <label for="br-agreed_hours_month_h">所定労働時間(月)</label>
                                    <div class="ui right labeled input">
                                        <input type="number" placeholder="140" min="0" max="744"
                                            name="br-agreed_hours_month_h[]"
                                            wire:model.live="data.{{ $key }}.br-agreed_hours_month_h">
                                        <div class="ui basic label">
                                            時間
                                        </div>
                                    </div>
                                </div>
                                <div class="field {{ err_bind($errs, 'br-agreed_hours_month_m', $key) }}">
                                    <label for="br-agreed_hours_month_m"></label>
                                    <div class="ui right labeled input">
                                        <input type="number" placeholder="30" min="0" max="59"
                                            name="br-agreed_hours_month_m[]"
                                            wire:model.live="data.{{ $key }}.br-agreed_hours_month_m">
                                        <div class="ui basic label">
                                            分
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="two fields unstackable">
                                <div class="field {{ err_bind($errs, 'br-agreed_hours_week_h', $key) }}">
                                    <label for="br-agreed_hours_week_h">所定労働時間(週)</label>
                                    <div class="ui right labeled input">
                                        <input type="number" placeholder="40" min="0" max="168"
                                            name="br-agreed_hours_week_h[]"
                                            wire:model.live="data.{{ $key }}.br-agreed_hours_week_h">
                                        <div class="ui basic label">
                                            時間
                                        </div>
                                    </div>
                                </div>
                                <div class="field {{ err_bind($errs, 'br-agreed_hours_week_m', $key) }}">
                                    <label for="br-agreed_hours_week_m"></label>
                                    <div class="ui right labeled input">
                                        <input type="number" placeholder="30" min="0" max="59"
                                            name="br-agreed_hours_week_m[]"
                                            wire:model.live="data.{{ $key }}.br-agreed_hours_week_m">
                                        <div class="ui basic label">
                                            分
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="two fields unstackable">
                                <div class="field {{ err_bind($errs, 'br-agreed_hours_day_h', $key) }}">
                                    <label for="br-agreed_hours_day_h">所定労働時間(日)</label>
                                    <div class="ui right labeled input">
                                        <input type="number" placeholder="8" min="0" max="168"
                                            name="br-agreed_hours_day_h[]"
                                            wire:model.live="data.{{ $key }}.br-agreed_hours_day_h">
                                        <div class="ui basic label">
                                            時間
                                        </div>
                                    </div>
                                </div>
                                <div class="field {{ err_bind($errs, 'br-agreed_hours_day_m', $key) }}">
                                    <label for="br-agreed_hours_day_m"></label>
                                    <div class="ui right labeled input">
                                        <input type="number" placeholder="30" min="0" max="59"
                                            name="br-agreed_hours_day_m[]"
                                            wire:model.live="data.{{ $key }}.br-agreed_hours_day_m">
                                        <div class="ui basic label">
                                            分
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>休日設定</h4>
                            <div class="two fields unstackable">
                                <div class="field {{ err_bind($errs, 'br-working_days_yearly', $key) }}">
                                    <label for="br-working_days_yearly">労働(年間)</label>
                                    <div class="ui right labeled input">
                                        <input type="number" placeholder="120" min="0" max="365"
                                            name="br-working_days_yearly[]"
                                            wire:model.live="data.{{ $key }}.br-working_days_yearly">
                                        <div class="ui basic label">
                                            日
                                        </div>
                                    </div>
                                </div>

                                <div class="field {{ err_bind($errs, 'br-working_days_monthly', $key) }}">
                                    <label for="br-working_days_monthly">労働(月間)</label>
                                    <div class="ui right labeled input">
                                        <input type="number" placeholder="20" min="0" max="31"
                                            name="br-working_days_monthly[]"
                                            wire:model.live="data.{{ $key }}.br-working_days_monthly">
                                        <div class="ui basic label">
                                            日
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="two fields unstackable">
                                <div class="field {{ err_bind($errs, 'br-holiday_yearly', $key) }}">
                                    <label for="br-holiday_yearly">休日(年間)</label>
                                    <div class="ui right labeled input">
                                        <input type="number" placeholder="245" min="0" max="365"
                                            name="br-holiday_yearly[]"
                                            wire:model.live="data.{{ $key }}.br-holiday_yearly">
                                        <div class="ui basic label">
                                            日
                                        </div>
                                    </div>
                                </div>

                                <div class="field {{ err_bind($errs, 'br-holiday_monthly', $key) }}">
                                    <label for="br-holiday_monthly">休日(月間)</label>
                                    <div class="ui right labeled input">
                                        <input type="number" placeholder="20" min="0" max="31"
                                            name="br-holiday_monthly[]"
                                            wire:model.live="data.{{ $key }}.br-holiday_monthly">
                                        <div class="ui basic label">
                                            日
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="two fields">
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
                                        wire:model.live="data.{{ $key }}.br-holiday_legal" placeholder="" maxlength="255">
                                </div>
                                <div class="field {{ err_bind($errs, 'br-holiday_not_logal', $key) }}">
                                    <label for="br-holiday_not_logal">休日内容(法定休日以外)</label>
                                    <input type="text" name="br-holiday_not_logal[]"
                                        wire:model.live="data.{{ $key }}.br-holiday_not_logal"
                                        placeholder="" maxlength="255">
                                </div>
                            </div>
                        </div>
                        @if ($key > 0)
                            @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
                                <div class="p-1" style="text-align: right;">
                                    <button class="ui negative button" type="button"
                                        wire:click="remove({{ $key }})">
                                        この事業所を削除
                                    </button>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
        <button class="append-branch" type="button" wire:click="append"
            {{ count($data) > 9 ? 'disabled' : '' }}><i class="plus circle icon"></i>事業所を追加</button>
    @endif
    @script
        <script type="module">
            const notReadonly = @json($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2));
            $(document).ready(function() {
                if (notReadonly) branch();
                else {
                    $('section.content .calendar.icon').remove();
                }
                $('.branch-tab-menu .item').tab();
                $('.ui.dropdown.dropdown.multiple').on('change', function(event) {
                    var $dropdown = $(this);
                    $dropdown.prop('disabled', true).addClass('disabled');
                    setTimeout(function() {
                        $dropdown.prop('disabled', false).removeClass('disabled');
                    }, 400);
                });
            });
            $wire.on('form-appended', (e) => {
                setTimeout(() => {
                    if (notReadonly) {
                        const c = e[0];
                        const i = c - 1;
                        $('.branch-area-' + i + ' .branch-tab-menu .item').tab();
                        branch();
                    }
                }, 0);
            });
        </script>
    @endscript

    <style>
        .ui.secondary.vertical.branch-tab-menu .item.active {
            background-color: #F2F2F2;
            color: #0C0C0C;
            font-weight: 700;
        }

        .side-menu {
            display: flex;
            width: 100%;
        }

        .ui.celled.table th {
            text-align: center;
        }

        .ui.celled.table td {
            text-align: center;
        }

        .tab-error,
        .tab-error.active {
            color: #912d2b !important;
        }

        .disabled {
            pointer-events: none;
            opacity: 0.8;
        }
    </style>
</div>
