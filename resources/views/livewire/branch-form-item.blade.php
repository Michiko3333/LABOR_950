<div>
    @script
        <script type="module">
            $(document).ready(() => {
                $('.branch-calendar.key-{{ $key }}').each((index, element) => {
                    const parent = $(element).find('input');
                    const key = parent[0].attributes['wire:model.live']['nodeValue'];
                    const initialDate = key ? @this.get(key) : '';

                    $(element).calendar({
                        type: 'date',
                        formatter: {
                            date: 'Y"年"M"月"D"日"'
                        },
                        text: {
                            days: ['日', '月', '火', '水', '木', '金', '土'],
                            months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月',
                                '11月',
                                '12月'
                            ],
                        },
                        initialDate: initialDate,
                        onChange: (d, t) => {
                            if (key) @this.set(key, t);
                        }
                    });
                });
                $('.working_hours_calendar.key-{{ $key }}').each((index, element) => {
                    const parent = $(element).find('input');
                    const key = parent[0].attributes['wire:model.live']['nodeValue'];
                    const initialDate = key ? @this.get(key) : '';
                    $(element).calendar({
                        type: 'time',
                        formatter: {
                            time: 'HH:mm',
                            cellTime: 'HH:mm'
                        },
                        initialDate: initialDate,
                        onChange: (d, t) => {
                            t = t + ':00';
                            if (key) @this.set(key, t);
                        }
                    });
                });
                $('.ui.dropdown.search.key-{{ $key }}').each((index, element) => {
                    $(element).dropdown({});
                });
            });
        </script>
    @endscript
    <div class="branch-item card-shadow mb-1 branch-area-{{ $key }} {{ empty($item['lw-accordion']) ? 'close' : '' }}"
        style="width: 100%;">
        @php
            $patterns = [
                '/^sa-payroll_month\.' . preg_quote($key) . '\..*/',
                '/^sa-payroll_day\.' . preg_quote($key) . '\..*/',
                '/^sa-applied_date\.' . preg_quote($key) . '\..*/',
                '/^sa-payroll_deadline\.' . preg_quote($key) . '\..*/',
                '/^sa-departments\.' . preg_quote($key) . '\..*/',
                '/^bo-departments\.' . preg_quote($key) . '\..*/',
                '/^bo-bonus_payment_month\.' . preg_quote($key) . '\..*/',
                '/^bo-applied_date\.' . preg_quote($key) . '\..*/',
                '/^bou-departments\.' . preg_quote($key) . '\..*/',
                '/^bou-bonus_payment_month\.' . preg_quote($key) . '\..*/',
                '/^bou-applied_date\.' . preg_quote($key) . '\..*/',
                '/^al-allowance\.' . preg_quote($key) . '\..*/',
                '/^al-amount\.' . preg_quote($key) . '\..*/',
                '/^al-pay_month\.' . preg_quote($key) . '\..*/',
                '/^al-target\.' . preg_quote($key) . '\..*/',
                '/^al-remarks\.' . preg_quote($key) . '\..*/',
                '/^al-applied_date\.' . preg_quote($key) . '\..*/',
            ];
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

            $field6 = !empty(
                array_filter($patterns, function ($pattern) use ($errors) {
                    return !empty(preg_grep($pattern, $errors->keys()));
                })
            );
            $sub = [
                '/^sa-payroll_month\.' . preg_quote($key) . '\..*/',
                '/^sa-payroll_day\.' . preg_quote($key) . '\..*/',
                '/^sa-applied_date\.' . preg_quote($key) . '\..*/',
                '/^sa-payroll_deadline\.' . preg_quote($key) . '\..*/',
                '/^sa-departments\.' . preg_quote($key) . '\..*/',
            ];
            $sub2 = [
                '/^bo-departments\.' . preg_quote($key) . '\..*/',
                '/^bo-bonus_payment_month\.' . preg_quote($key) . '\..*/',
                '/^bo-applied_date\.' . preg_quote($key) . '\..*/',
            ];
            $sub3 = [
                '/^bou-departments\.' . preg_quote($key) . '\..*/',
                '/^bou-bonus_payment_month\.' . preg_quote($key) . '\..*/',
                '/^bou-applied_date\.' . preg_quote($key) . '\..*/',
            ];
            $sub4 = [
                '/^al-allowance\.' . preg_quote($key) . '\..*/',
                '/^al-amount\.' . preg_quote($key) . '\..*/',
                '/^al-pay_month\.' . preg_quote($key) . '\..*/',
                '/^al-target\.' . preg_quote($key) . '\..*/',
                '/^al-remarks\.' . preg_quote($key) . '\..*/',
                '/^al-applied_date\.' . preg_quote($key) . '\..*/',
            ];

            $sub = !empty(
                array_filter($sub, function ($pattern) use ($errors) {
                    return !empty(preg_grep($pattern, $errors->keys()));
                })
            );
            $sub2 = !empty(
                array_filter($sub2, function ($pattern) use ($errors) {
                    return !empty(preg_grep($pattern, $errors->keys()));
                })
            );
            $sub3 = !empty(
                array_filter($sub3, function ($pattern) use ($errors) {
                    return !empty(preg_grep($pattern, $errors->keys()));
                })
            );
            $sub4 = !empty(
                array_filter($sub4, function ($pattern) use ($errors) {
                    return !empty(preg_grep($pattern, $errors->keys()));
                })
            );
            $anyErrorTab = [
                '事業所基本情報' => $field1,
                '社会保険' => $field2,
                '雇用保険' => $field3,
                '労働保険' => $field4,
                '勤務関連' => $field5,
                '給与関連' => $field6,
            ];
            $anyErrorPaymentTab = [
                '給与' => $sub,
                '賞与' => $sub2,
                '報奨金' => $sub3,
                '手当' => $sub4,
            ];
        @endphp
        <input type="hidden" name="lw-accordion[]"value="{{ $item['lw-accordion'] }}">
        <input type="hidden" name="lw-current_tab[]"value="{{ $item['lw-current_tab'] }}">
        <input type="hidden" name="br-id[]" value="{{ $item['br-id'] }}" />
        <button class="header p-1" type="button" wire:click="switchAccordion"><i
                class="dropdown icon"></i>【{{ $branch_types[$item['br-branch_type']] }}】&nbsp;{{ $item['br-name'] }}</button>
        <div class="content">
            <div class="tab-container" style="display: flex;">
                <div class="tab-container__menu">
                    @foreach ($tabs as $tab)
                        @if (empty($departments) && $tab == '給与関連')
                            @continue;
                        @endif
                        <button
                            class="tab item {{ $tab == $item['lw-current_tab'] ? 'active' : '' }} {{ $anyErrorTab[$tab] ? 'tab-error' : '' }}"
                            type="button" wire:click="changeTab('{{ $tab }}')">{{ $tab }}</a>
                    @endforeach
                </div>
                <div class="tab-container__area">
                    @foreach ($tabs as $tab)
                        <div class="ui form item {{ $tab == $item['lw-current_tab'] ? 'active' : '' }}">
                            @switch($tab)
                                @case('事業所基本情報')
                                    <h3>事業所基本情報</h3>
                                    <div class="two fields" style="padding: 0;">
                                        <div class="field required {{ err_bind($errs, 'br-name', $key) }}">
                                            <label for="br-name">名称</label>
                                            <input type="text" name="br-name[]" wire:model.live="item.br-name"
                                                placeholder="">
                                        </div>
                                        <div class="ui unstackable two fields">
                                            <div class="field required {{ err_bind($errs, 'br-branch_type', $key) }}">
                                                <label for="br-branch_type">区分</label>
                                                <select class="ui fluid dropdown" name="br-branch_type[]"
                                                    wire:model.live="item.br-branch_type" {{ $key == 0 ? 'disabled' : '' }}>
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
                                                    wire:model.live="item.br-place_type">
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
                                            <input type="text" name="br-post_code[]" wire:model.live="item.br-post_code"
                                                placeholder="">
                                        </div>
                                        <div
                                            class="four wide field required {{ err_bind($errs, 'br-address_prefecture', $key) }}">
                                            <label for="br-address_prefecture">住所（都道府県）</label>
                                            <select class="ui fluid dropdown" name="br-address_prefecture[]"
                                                wire:model.live="item.br-address_prefecture">
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
                                                wire:model.live="item.br-address_city" placeholder="">
                                        </div>
                                        <div class="field required {{ err_bind($errs, 'br-address_ward', $key) }}">
                                            <label for="br-address_ward">住所（丁目・番地）</label>
                                            <input type="text" name="br-address_ward[]"
                                                wire:model.live="item.br-address_ward" placeholder="">
                                        </div>
                                    </div>
                                    <div class="two fields">
                                        <div class="field {{ err_bind($errs, 'br-address_apartment', $key) }}">
                                            <label for="br-address_apartment">住所（アパート・マンション名等）</label>
                                            <input type="text" name="br-address_apartment[]"
                                                wire:model.live="item.br-address_apartment" placeholder="">
                                        </div>
                                    </div>
                                    <div class="ui divider my-2"></div>
                                    <div class="two fields">
                                        <div class="field required {{ err_bind($errs, 'br-address_city_kana', $key) }}">
                                            <label for="br-address_city_kana">住所（市区町村）（カナ）</label>
                                            <input type="text" name="br-address_city_kana[]"
                                                wire:model.live="item.br-address_city_kana" placeholder="">
                                        </div>
                                        <div class="field required {{ err_bind($errs, 'br-address_ward_kana', $key) }}">
                                            <label for="br-address_ward_kana">住所（丁目・番地）（カナ）</label>
                                            <input type="text" name="br-address_ward_kana[]"
                                                wire:model.live="item.br-address_ward_kana" placeholder="">
                                        </div>
                                    </div>
                                    <div class="two fields">
                                        <div class="field {{ err_bind($errs, 'br-address_apartment_kana', $key) }}">
                                            <label for="br-address_apartment_kana">住所（アパート・マンション名等）（カナ）</label>
                                            <input type="text" name="br-address_apartment_kana[]"
                                                wire:model.live="item.br-address_apartment_kana" placeholder="">
                                        </div>
                                    </div>
                                    <div class="ui divider my-2"></div>
                                    <div class="two fields">
                                        <div class="ui unstackable three fields field" style="padding: 0;">
                                            <div class="field required tel-hyphen {{ err_bind($errs, 'br-tel_area_code', $key) }}"
                                                style="padding-right: 0.8em;">
                                                <label for="br-tel_area_code">電話番号</label>
                                                <input type="text" name="br-tel_area_code[]"
                                                    wire:model.live="item.br-tel_area_code" placeholder="市外局番">
                                            </div>
                                            <div class="field required tel-hyphen {{ err_bind($errs, 'br-tel_city_code', $key) }}"
                                                style="padding-left: 0.8em; padding-right: 0.8em;">
                                                <label for="br-tel_city_code"></label>
                                                <input type="text" name="br-tel_city_code[]"
                                                    wire:model.live="item.br-tel_city_code" placeholder="市内局番">
                                            </div>
                                            <div class="field required {{ err_bind($errs, 'br-tel_subscriber_code', $key) }}"
                                                style="padding-left: 0.8em;">
                                                <label for="br-tel_subscriber_code"></label>
                                                <input type="text" name="br-tel_subscriber_code[]"
                                                    wire:model.live="item.br-tel_subscriber_code" placeholder="加入者番号">
                                            </div>
                                        </div>
                                        <div class="field {{ err_bind($errs, 'br-tel_overseas', $key) }}">
                                            <label for="br-tel_overseas">国外電話番号</label>
                                            <input type="text" name="br-tel_overseas[]"
                                                wire:model.live="item.br-tel_overseas" placeholder="" maxlength="15">
                                        </div>
                                    </div>
                                    <div class="two fields">
                                        <div class="ui unstackable three fields field" style="padding: 0;">
                                            <div class="field tel-hyphen {{ err_bind($errs, 'br-fax1', $key) }}"
                                                style="padding-right: 0.8em;">
                                                <label for="br-tel_area_code">fax</label>
                                                <input type="text" name="br-fax1[]" wire:model.live="item.br-fax1"
                                                    placeholder="">
                                            </div>
                                            <div class="field tel-hyphen {{ err_bind($errs, 'br-fax2', $key) }}"
                                                style="padding-left: 0.8em; padding-right: 0.8em;">
                                                <label for="br-fax2"></label>
                                                <input type="text" name="br-fax2[]" wire:model.live="item.br-fax2"
                                                    placeholder="">
                                            </div>
                                            <div class="field {{ err_bind($errs, 'br-fax3', $key) }}"
                                                style="padding-left: 0.8em;">
                                                <label for="br-fax3"></label>
                                                <input type="text" name="br-fax3[]" wire:model.live="item.br-fax3"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="field required {{ err_bind($errs, 'br-mail_address', $key) }}">
                                            <label for="br-mail_address">メールアドレス</label>
                                            <input type="text" name="br-mail_address[]"
                                                wire:model.live="item.br-mail_address" placeholder="">
                                        </div>
                                    </div>
                                @break

                                @case('社会保険')
                                    <h3>社会保険</h3>
                                    <div class="two fields">
                                        <div class="field {{ err_bind($errs, 'br-kenpo_no', $key) }}">
                                            <label for="br-kenpo_no">協会けんぽNo</label>
                                            <input type="text" name="br-kenpo_no[]" wire:model.live="item.br-kenpo_no"
                                                placeholder="" maxlength="8">
                                        </div>
                                    </div>
                                    <div class="two fields">
                                        <div class="field {{ err_bind($errs, 'br-insurance_office_name', $key) }}">
                                            <label for="br-insurance_office_name">健康保険組合・名称</label>
                                            <input type="text" name="br-insurance_office_name[]"
                                                wire:model.live="item.br-insurance_office_name" placeholder="">
                                        </div>
                                        <div class="field {{ err_bind($errs, 'br-insurance_office_no', $key) }}">
                                            <label for="br-insurance_office_no">健康保険組合・事業所番号</label>
                                            <input type="text" name="br-insurance_office_no[]"
                                                wire:model.live="item.br-insurance_office_no" placeholder="" maxlength="5">
                                        </div>
                                    </div>
                                    <div class="three fields">
                                        <div
                                            class="field {{ err_bind($errs, 'br-pension_office_reference_prefecture', $key) }}">
                                            <label for="br-pension_office_reference_prefecture">事業所番号整理記号・都道府県コード</label>
                                            <input type="text" name="br-pension_office_reference_prefecture[]"
                                                wire:model.live="item.br-pension_office_reference_prefecture" placeholder=""
                                                maxlength="2">
                                        </div>
                                        <div
                                            class="field {{ err_bind($errs, 'br-pension_office_reference_no_cities', $key) }}">
                                            <label for="br-pension_office_reference_no_cities">事業所番号整理記号・郡市区符号</label>
                                            <input type="text" name="br-pension_office_reference_no_cities[]"
                                                wire:model.live="item.br-pension_office_reference_no_cities" placeholder=""
                                                maxlength="2">
                                        </div>
                                        <div
                                            class="field {{ err_bind($errs, 'br-pension_office_reference_no_office', $key) }}">
                                            <label for="br-pension_office_reference_no_office">事業所番号整理記号・事業所記号</label>
                                            <input type="text" name="br-pension_office_reference_no_office[]"
                                                wire:model.live="item.br-pension_office_reference_no_office" placeholder=""
                                                maxlength="4">
                                        </div>
                                    </div>
                                    <div class="two fields">
                                        <div class="field {{ err_bind($errs, 'br-insurance_applicable_date', $key) }}">
                                            <label for="br-insurance_applicable_date">社保適用年月</label>
                                            <div class="ui right labeled input">
                                                <input type="number" placeholder="1~12" min="1" max="12"
                                                    name="br-insurance_applicable_date[]"
                                                    wire:model.live="item.br-insurance_applicable_date">
                                                <div class="ui basic label">
                                                    月
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="two fields">
                                        <div class="field {{ err_bind($errs, 'br-pension_office_name', $key) }}">
                                            <label for="br-pension_office_name">厚生年金基金・名称</label>
                                            <input type="text" name="br-pension_office_name[]"
                                                wire:model.live="item.br-pension_office_name" placeholder="">
                                        </div>
                                        <div class="field {{ err_bind($errs, 'br-pension_office_no', $key) }}">
                                            <label for="br-pension_office_no">厚生年金基金・事業所番号</label>
                                            <input type="text" name="br-pension_office_no[]"
                                                wire:model.live="item.br-pension_office_no" placeholder="" maxlength="5">
                                        </div>
                                    </div>
                                    <div class="two fields">
                                        <div class="field {{ err_bind($errs, 'br-pension_office_id', $key) }}" wire:ignore>
                                            <label for="br-pension_office_id">年金事務所</label>
                                            <select class="ui fluid search dropdown key-{{ $key }}"
                                                name="br-pension_office_id[]" wire:model.live="item.br-pension_office_id">
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
                                                wire:model.live="item.br-insurance_office_reference_no" placeholder=""
                                                maxlength="5">
                                        </div>
                                    </div>
                                    <div class="ui divider"></div>
                                    <div class="two fields">
                                        <div class="field {{ err_bind($errs, 'br-rate_pattern_id', $key) }}">
                                            <label for="br-rate_pattern_id">料率パターン</label>
                                            <select class="ui fluid dropdown" name="br-rate_pattern_id[]"
                                                wire:model.live="item.br-rate_pattern_id">
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
                                                wire:model.live="item.br-fractional_adjustment_pattern_id">
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
                                @break

                                @case('雇用保険')
                                    <h3>雇用保険</h3>
                                    <div class="two fields">
                                        <div class="field {{ err_bind($errs, 'br-employment_insurance_office_no', $key) }}">
                                            <label for="br-employment_insurance_office_no">雇用保険・事業所番号</label>
                                            <input type="text" name="br-employment_insurance_office_no[]"
                                                wire:model.live="item.br-employment_insurance_office_no" placeholder=""
                                                maxlength="11">
                                        </div>
                                        <div class="field {{ err_bind($errs, 'br-employment_insurance_rate', $key) }}">
                                            <label for="br-employment_insurance_rate">雇用保険料率区分</label>
                                            <select class="ui fluid dropdown" name="br-employment_insurance_rate[]"
                                                wire:model.live="item.br-employment_insurance_rate">
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
                                            <div class="ui calendar branch-calendar key-{{ $key }}" wire:ignore>
                                                <div class="ui fluid input left icon">
                                                    <i class="calendar icon"></i>
                                                    <input type="text" name="br-employment_insurance_establishment_date[]"
                                                        wire:model.live="item.br-employment_insurance_establishment_date"
                                                        placeholder="YYYY年M月D日" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="field {{ err_bind($errs, 'br-labor_insurance_establishment_date', $key) }}">
                                            <label for="br-labor_insurance_establishment_date">労働保険成立年月日</label>
                                            <div class="ui calendar branch-calendar key-{{ $key }}" wire:ignore>
                                                <div class="ui fluid input left icon">
                                                    <i class="calendar icon"></i>
                                                    <input type="text" name="br-labor_insurance_establishment_date[]"
                                                        wire:model.live="item.br-labor_insurance_establishment_date"
                                                        placeholder="YYYY年M月D日" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="two fields">
                                        <div class="field {{ err_bind($errs, 'br-hello_work_id', $key) }}" wire:ignore>
                                            <label for="br-hello_work_id">公共職業安定所</label>
                                            <select class="ui fluid search dropdown key-{{ $key }}"
                                                name="br-hello_work_id[]" wire:model.live="item.br-hello_work_id">
                                                <option value="">未選択</option>
                                                @foreach ($hello_work_id as $k => $value)
                                                    <option value="{{ $k }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @break

                                @case('労働保険')
                                    <h3>労働保険</h3>
                                    <div class="three fields">
                                        <div class="field {{ err_bind($errs, 'br-labor_insurance_no', $key) }}">
                                            <label for="br-labor_insurance_no">労働保険番号</label>
                                            <input type="text" name="br-labor_insurance_no[]"
                                                wire:model.live="item.br-labor_insurance_no" placeholder="" maxlength="14">
                                        </div>
                                        <div class="field {{ err_bind($errs, 'br-labor_insurance_payment_method', $key) }}">
                                            <label for="br-labor_insurance_payment_method">労働保険納付区分</label>
                                            <select class="ui fluid dropdown" name="br-labor_insurance_payment_method[]"
                                                wire:model.live="item.br-labor_insurance_payment_method">
                                                <option value="">未選択</option>
                                                @foreach ($labor_insurance_payment_method as $k => $value)
                                                    <option value="{{ $k }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="field {{ err_bind($errs, 'br-labor_insurance_category', $key) }}">
                                            <label for="br-labor_insurance_category">労災種類の分類</label>
                                            <select class="ui fluid dropdown" name="br-labor_insurance_category[]"
                                                wire:model.live="item.br-labor_insurance_category">
                                                <option value="">未選択</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="two fields">
                                        <div class="field {{ err_bind($errs, 'br-labor_bureau_name', $key) }}" wire:ignore>
                                            <label for="br-labor_bureau_name">労働局</label>
                                            <select class="ui fluid search dropdown key-{{ $key }}"
                                                name="br-labor_bureau_name[]" wire:model.live="item.br-labor_bureau_name">
                                                <option value="">未選択</option>
                                                @foreach ($labor_bureau_names as $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="field {{ err_bind($errs, 'br-labor_supervision_name', $key) }}"
                                            wire:ignore>
                                            <label for="br-labor_supervision_name">労働基準監督署</label>
                                            <select class="ui fluid search dropdown key-{{ $key }}"
                                                name="br-labor_supervision_name[]"
                                                wire:model.live="item.br-labor_supervision_name">
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
                                @break

                                @case('勤務関連')
                                    <h3>勤務関連</h3>
                                    <h4>開始設定</h4>
                                    <div class="three fields">
                                        <div class="field {{ err_bind($errs, 'br-start_date_of_month', $key) }}" wire:ignore>
                                            <label for="br-start_date_of_month">月の始まり</label>
                                            <select class="ui fluid search five column dropdown key-{{ $key }}"
                                                name="br-start_date_of_month[]" wire:model.live="item.br-start_date_of_month"
                                                wire:ignore>
                                                <option value="">日付を選択</option>
                                                @for ($i = 1; $i <= 31; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="field {{ err_bind($errs, 'br-start_days_of_week', $key) }}">
                                            <label for="br-start_days_of_week">週の始まり</label>
                                            <select class="ui fluid dropdown" name="br-start_days_of_week[]"
                                                wire:model.live="item.br-start_days_of_week">
                                                @foreach ($start_days_of_week as $k => $value)
                                                    <option value="{{ $k }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="field {{ err_bind($errs, 'br-start_time_of_day', $key) }}">
                                            <label for="br-start_time_of_day">日の始まり</label>
                                            <div class="ui calendar working_hours_calendar key-{{ $key }}"
                                                wire:ignore>
                                                <div class="ui fluid input left icon">
                                                    <i class="calendar icon"></i>
                                                    <input type="text" name="br-start_time_of_day[]"
                                                        wire:model.live="item.br-start_time_of_day" placeholder="00:00"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4>就労時間設定</h4>
                                    <div class="two fields unstackable ">
                                        <div class="field {{ err_bind($errs, 'br-work_time_start', $key) }}">
                                            <label for="br-work_time_start">就業開始</label>
                                            <div class="ui calendar working_hours_calendar key-{{ $key }}"
                                                wire:ignore>
                                                <div class="ui fluid input left icon">
                                                    <i class="calendar icon"></i>
                                                    <input type="text" name="br-work_time_start[]"
                                                        wire:model.live="item.br-work_time_start" placeholder="00:00"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field {{ err_bind($errs, 'br-work_time_end', $key) }}">
                                            <label for="br-work_time_end">就業終了</label>
                                            <div class="ui calendar working_hours_calendar key-{{ $key }}"
                                                wire:ignore>
                                                <div class="ui fluid input left icon">
                                                    <i class="calendar icon"></i>
                                                    <input type="text" name="br-work_time_end[]"
                                                        wire:model.live="item.br-work_time_end" placeholder="23:59"
                                                        autocomplete="off">
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
                                                    wire:model.live="item.br-agreed_hours_year_h">
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
                                                    wire:model.live="item.br-agreed_hours_year_m">
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
                                                    wire:model.live="item.br-agreed_hours_month_h">
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
                                                    wire:model.live="item.br-agreed_hours_month_m">
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
                                                    wire:model.live="item.br-agreed_hours_week_h">
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
                                                    wire:model.live="item.br-agreed_hours_week_m">
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
                                                    wire:model.live="item.br-agreed_hours_day_h">
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
                                                    wire:model.live="item.br-agreed_hours_day_m">
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
                                                    wire:model.live="item.br-working_days_yearly">
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
                                                    wire:model.live="item.br-working_days_monthly">
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
                                                    name="br-holiday_yearly[]" wire:model.live="item.br-holiday_yearly">
                                                <div class="ui basic label">
                                                    日
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field {{ err_bind($errs, 'br-holiday_monthly', $key) }}">
                                            <label for="br-holiday_monthly">休日(月間)</label>
                                            <div class="ui right labeled input">
                                                <input type="number" placeholder="20" min="0" max="31"
                                                    name="br-holiday_monthly[]" wire:model.live="item.br-holiday_monthly">
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
                                                wire:model.live="item.br-work_style_type">
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
                                                wire:model.live="item.br-holiday_legal" placeholder="" maxlength="255">
                                        </div>
                                        <div class="field {{ err_bind($errs, 'br-holiday_not_logal', $key) }}">
                                            <label for="br-holiday_not_logal">休日内容(法定休日以外)</label>
                                            <input type="text" name="br-holiday_not_logal[]"
                                                wire:model.live="item.br-holiday_not_logal" placeholder="" maxlength="255">
                                        </div>
                                    </div>
                                @break

                                @case('給与関連')
                                    @if (!empty($departments))
                                        <h3>給与関連</h3>
                                        <input type="hidden" name="lw-payment_tab[]"value="{{ $item['lw-payment_tab'] }}">
                                        <div class="ui attached tabular menu">
                                            @foreach ($paymentTabs as $paymentTab)
                                                <button
                                                    class="item {{ $paymentTab == $item['lw-payment_tab'] ? 'active' : '' }} {{ $anyErrorPaymentTab[$paymentTab] ? 'tab-error' : '' }}"
                                                    style="cursor: pointer;" type="button"
                                                    wire:click="changePaymentTab('{{ $paymentTab }}')">{{ $paymentTab }}</button>
                                            @endforeach
                                        </div>
                                        @foreach ($paymentTabs as $paymentTab)
                                            <div
                                                class="ui bottom attached segment tab main-segment {{ $paymentTab == $item['lw-payment_tab'] ? 'active' : '' }}">
                                                @switch($paymentTab)
                                                    @case('給与')
                                                        <livewire:salary-form :errors="$errors" :childKey="$key" :salary="$salary"
                                                            :branchId="$item['br-id']" :companyId="$company->id"
                                                            wire:key="salary-form-{{ $key }}" />
                                                    @break

                                                    @case('賞与')
                                                        <livewire:bonus-form :errors="$errors" :childKey="$key" :bonus="$bonus"
                                                            :branchId="$item['br-id']" :companyId="$company->id"
                                                            wire:key="bonus-form-{{ $key }}" />
                                                    @break

                                                    @case('報奨金')
                                                        <livewire:bounty-form :errors="$errors" :childKey="$key" :bounty="$bounty"
                                                            :branchId="$item['br-id']" :companyId="$company->id"
                                                            wire:key="bounty-form-{{ $key }}" />
                                                    @break

                                                    @case('手当')
                                                        <livewire:allowance-form :errors="$errors" :childKey="$key" :allowance="$allowance"
                                                            :branchId="$item['br-id']" :companyId="$company->id"
                                                            wire:key="allowance-form-{{ $key }}" />
                                                    @break

                                                    @default
                                                @endswitch
                                                @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
                                                    <div class="pt-2" style="text-align: right;">
                                                        <a class="ui button primary confirm-button-{{ $key }}"
                                                            href="javascript:openPaymentConfirmModal({{ $item['br-id'] }},{{ $key }},'{{ $item['lw-payment_tab'] }}')"
                                                            wire:key="confirm-button-{{ $key }}">
                                                            確認
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @endif
                                @break

                                @default
                            @endswitch
                        </div>
                    @endforeach
                </div>
            </div>
        @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
            @if ($key != 0)
                <div class="branch-control p-1" style="text-align: right;">
                    <button class="ui negative button" type="button"
                        wire:click="removeBranch({{ $key }})">
                        この事業所を削除
                    </button>
                </div>
            @endif
        @endif
        </div>
    </div>
</div>
