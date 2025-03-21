<div>
    @script
    <script type="module">
        $(document).ready(() => {
            $('.dependent-calendar.key-{{ $item['de-key'] }}').each((index, element) => {
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
            $('.dependent-calendar.birthday.key-{{ $item['de-key'] }}').each((index, element) => {
                const parent = $(element).find('input');
                const key = parent[0].attributes['wire:model.live']['nodeValue'];
                const initialDate = key ? @this.get(key) : '';
                let match = null;
                if(initialDate){
                    match = initialDate.match(/(\d{4})-(\d{1,2})-(\d{1,2})/);
                }
                if (match) {
                    const year = parseInt(match[1], 10);
                    const month = parseInt(match[2], 10) - 1;
                    const day = parseInt(match[3], 10);
                    const birthDate = new Date(year, month, day);
                    const today = new Date();

                    let age = today.getFullYear() - birthDate.getFullYear();
                    let monthDiff = today.getMonth() - birthDate.getMonth();
                    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                        age -= 1;
                        monthDiff += 12;
                    }

                    let ageMonths = monthDiff;
                    const ageString = `${age}歳${ageMonths}ヵ月`;
                    const ageInput = $(element).closest('.content_inner').find('.de-age');
                    ageInput.val(ageString);
                }

                $(element).calendar({
                    type: 'date',
                    maxDate: new Date(),
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
                        const match = t.match(/(\d{4})年(\d{1,2})月(\d{1,2})日/);
                        if (match) {
                            const year = parseInt(match[1], 10);
                            const month = parseInt(match[2], 10) - 1;
                            const day = parseInt(match[3], 10);
                            const birthDate = new Date(year, month, day);
                            const today = new Date();

                            let age = today.getFullYear() - birthDate.getFullYear();
                            let monthDiff = today.getMonth() - birthDate.getMonth();
                            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                                age -= 1;
                                monthDiff += 12;
                            }

                            let ageMonths = monthDiff;
                            const ageString = `${age}歳${ageMonths}ヵ月`;
                            const ageInput = $(element).closest('.content_inner').find('.de-age');
                            ageInput.val(ageString);
                        }
                    },
                });
            });
            $('.dependent-birthday.key-{{ $item['de-key'] }}').each((index, element) => {
                const initialDate = $(element).val();
                let match = null;
                if(initialDate){
                    match = initialDate.match(/(\d{4})-(\d{1,2})-(\d{1,2})/);
                    const date = new Date(initialDate);
                    const formattedDate = date.getFullYear() + '年' + (date.getMonth() + 1) + '月' + date.getDate() + '日';
                    $(element).val(formattedDate);
                }
                if (match) {
                    const year = parseInt(match[1], 10);
                    const month = parseInt(match[2], 10) - 1;
                    const day = parseInt(match[3], 10);
                    const birthDate = new Date(year, month, day);
                    const today = new Date();

                    let age = today.getFullYear() - birthDate.getFullYear();
                    let monthDiff = today.getMonth() - birthDate.getMonth();
                    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                        age -= 1;
                        monthDiff += 12;
                    }

                    let ageMonths = monthDiff;
                    const ageString = `${age}歳${ageMonths}ヵ月`;
                    const ageInput = $(element).closest('.content_inner').find('.de-age');
                    ageInput.val(ageString);
                }
            });
            $('.history-calendar.key-{{ $item['de-key'] }}').each((index, element) => {
                const initialDate = $(element).val();
                let match = null;
                if(initialDate){
                    match = initialDate.match(/(\d{4})-(\d{1,2})-(\d{1,2})/);
                    const date = new Date(initialDate);
                    const formattedDate = date.getFullYear() + '年' + (date.getMonth() + 1) + '月' + date.getDate() + '日';
                    $(element).val(formattedDate);
                }
            });

            function toggleDisableFields() {
                $('.de-date_of_authorisation').each(function (index) {
                    const authField = $(this);
                    const expiryField = $('.de-date_of_expiry').eq(index);
                    const dependentTypeField = $('.de-dependent_type').eq(index);

                    if (!authField.val()) {
                        expiryField.css({
                            "pointer-events": "none",
                            "border": "none"
                        });
                        dependentTypeField.css({
                            "pointer-events": "none",
                            "border": "none"
                        });
                    } else {
                        expiryField.css({
                            "pointer-events": "",
                            "border": ""
                        });
                        dependentTypeField.css({
                            "pointer-events": "",
                            "border": ""
                        });
                    }
                });
            }

            toggleDisableFields();

            function disableAddressFields() {
                $('.de-living_type_checkbox').each(function (index) {
                    const authField = $(this);
                    const post_code = $('.de-post_code').eq(index);
                    const address_city = $('.de-address_city').eq(index);
                    const address_ward = $('.de-address_ward').eq(index);
                    const address_apartment = $('.de-address_apartment').eq(index);
                    const address_prefecture = $('.de-address_prefecture').eq(index);
                    if(authField.is(':checked')){
                        post_code.val($('#post_code').val());
                        address_city.val($('#address_city').val());
                        address_ward.val($('#address_ward').val());
                        address_apartment.val($('#address_apartment').val());
                        address_prefecture.val($('#address_prefecture').val());
                        $('#post_code').on('change', function() {
                            post_code.val($(this).val());
                        });
                        $('#address_city').on('change', function() {
                            address_city.val($(this).val());
                        });
                        $('#address_ward').on('change', function() {
                            address_ward.val($(this).val());
                        });
                        $('#address_apartment').on('change', function() {
                            address_apartment.val($(this).val());
                        });
                        $('#address_prefecture').on('change', function() {
                            address_prefecture.val($(this).val());
                        });
                    }
                });
            }

            disableAddressFields();

            $('.de-date_of_authorisation').on('change', function () {
                toggleDisableFields();
            });
            
            $('.de-living_type_checkbox').on('change', function () {
                disableAddressFields();
            });
        });
    </script>
    @endscript
        <div class="dependent-item card-shadow mb-1 dependent-area-{{ $item['de-key'] }} {{ empty($item['lw-accordion']) ? 'close' : '' }}"
            style="width: 100%;">
            <input type="hidden" name="lw-accordion[]"value="{{ $item['lw-accordion'] }}">
            <input type="hidden" name="de-id[]" value="{{ $item['de-id'] }}" />
            <button class="header p-1" type="button" wire:click="switchAccordion"><i
                class="dropdown icon"></i>
                @php
                    $relationship_spouse_group = [
                        '1' => '夫',
                        '2' => '妻',
                        '3' => '夫(未届)',
                        '4' => '妻(未届)',
                    ];
                    $relationship_dependent_group = [
                        '1' => '配偶者',
                        '2' => '子供',
                        '3' => '養子',
                        '4' => '孫',
                        '5' => '兄弟姉妹',
                        '6' => '父母',
                        '7' => '祖父母',
                        '8' => '義父母',
                        '9' => '義兄弟姉妹',
                        '10' => '従兄弟姉妹',
                        '11' => '甥・姪',
                        '12' => 'おじ・おば',
                        '13' => '継父母',
                        '14' => '継子',
                        '15' => 'その他の親族'
                    ];

                    $relationship_spouse_value = $item['de-relationship_spouse'] ?? '';
                    $relationship_dependent_value = $item['de-relationship_dependent'] ?? '';
                    $relationship_spouse = $relationship_spouse_group[$relationship_spouse_value] ?? '';
                    $relationship_dependent = $relationship_dependent_group[$relationship_dependent_value] ?? '';

                    $history_flg = $item['de-history_flg'];
                @endphp
                @if ($item['de-spouse_flag'] == '1')
                    【{{ $relationship_spouse }}】&nbsp;{{ $item['de-last_name'] }}{{ $item['de-first_name'] }}
                @elseif ($item['de-spouse_flag'] != '1')
                    【{{ $relationship_dependent }}】&nbsp;{{ $item['de-last_name'] }}{{ $item['de-first_name'] }}
                @endif
            </button>

            <div class="dependent-content">
                <div class="dependent-container">
                    <div class="content_inner">
                        <h3>基本情報</h3>
                        <div class="two fields">
                            @if ($item['de-spouse_flag'] == 1)
                                <div class="field required @if($history_flg == 0) {{ err_bind($errs, 'de-relationship_spouse', $key) }} @endif">
                                    <label for="de-relationship_spouse">続柄</label>
                                    @if($history_flg == 0)
                                        <select class="ui fluid dropdown" name="de-relationship_spouse[]"
                                            wire:model.live="item.de-relationship_spouse">
                                            <option value="">未選択</option>
                                            <option value="1">夫</option>
                                            <option value="2">妻</option>
                                            <option value="3">夫(未届)</option>
                                            <option value="4">妻(未届)</option>
                                        </select>
                                    @else
                                    <select class="ui fluid dropdown" name="de-relationship_spouse[]"
                                        wire:model.live="item.de-relationship_spouse" style="pointer-events: none; border: none;">
                                        <option value="">未選択</option>
                                        <option value="1">夫</option>
                                        <option value="2">妻</option>
                                        <option value="3">夫(未届)</option>
                                        <option value="4">妻(未届)</option>
                                    </select>
                                    @endif
                                </div>
                                <input type="hidden" name="de-relationship_dependent[]" value="">
                            @else
                                <div class="field required @if($history_flg == 0) {{ err_bind($errs, 'de-relationship_dependent', $key) }} @endif">
                                    <label for="de-relationship_dependent">続柄</label>
                                    @if($history_flg == 0)
                                        <select class="ui fluid dropdown" name="de-relationship_dependent[]"
                                            wire:model.live="item.de-relationship_dependent">
                                            <option value="">未選択</option>
                                            <option value="1">配偶者</option>
                                            <option value="2">子供</option>
                                            <option value="3">養子</option>
                                            <option value="4">孫</option>
                                            <option value="5">兄弟姉妹</option>
                                            <option value="6">父母</option>
                                            <option value="7">祖父母</option>
                                            <option value="8">義父母</option>
                                            <option value="9">義兄弟姉妹</option>
                                            <option value="10">従兄弟姉妹</option>
                                            <option value="11">甥・姪</option>
                                            <option value="12">おじ・おば</option>
                                            <option value="13">継父母</option>
                                            <option value="14">継子</option>
                                            <option value="15">その他の親族</option>
                                        </select>
                                    @else
                                        <select class="ui fluid dropdown" name="de-relationship_dependent[]"
                                            wire:model.live="item.de-relationship_dependent" style="pointer-events: none; border: none;">
                                            <option value="">未選択</option>
                                            <option value="1">配偶者</option>
                                            <option value="2">子供</option>
                                            <option value="3">養子</option>
                                            <option value="4">孫</option>
                                            <option value="5">兄弟姉妹</option>
                                            <option value="6">父母</option>
                                            <option value="7">祖父母</option>
                                            <option value="8">義父母</option>
                                            <option value="9">義兄弟姉妹</option>
                                            <option value="10">従兄弟姉妹</option>
                                            <option value="11">甥・姪</option>
                                            <option value="12">おじ・おば</option>
                                            <option value="13">継父母</option>
                                            <option value="14">継子</option>
                                            <option value="15">その他の親族</option>
                                        </select>
                                    @endif
                                </div>
                                <input type="hidden" name="de-relationship_spouse[]" value="">
                                <input type="hidden" name="de-spouse_flag[]" value="">
                            @endif

                            @if ($item['de-spouse_flag'] == 1 || $this->spouseExists)
                                <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-spouse_flag', $key) }} @endif">
                                    <div class="ui checkbox mr-1">
                                        @if($history_flg == 0)
                                            <input type="checkbox" name="de-spouse_flag[]" value='1'
                                            @if($item['de-spouse_flag'] == 1) checked @endif
                                            wire:model.live="item.de-spouse_flag">
                                            <label>配偶者</label>
                                        @else
                                            <input type="checkbox" name="de-spouse_flag[]" value='1' style="pointer-events: none;"
                                            @if($item['de-spouse_flag'] == 1) checked @endif
                                            wire:model.live="item.de-spouse_flag">
                                            <label>配偶者</label>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="two fields">
                            <div class="field required @if($history_flg == 0) {{ err_bind($errs, 'de-last_name', $key) }} @endif">
                                <label for="de-last_name">氏</label>
                                @if($history_flg == 0)
                                    <input type="text" name="de-last_name[]" maxlength="255"
                                        wire:model.live="item.de-last_name" placeholder="田中" autocomplete="off">
                                @else
                                    <input type="text" name="de-last_name[]" maxlength="255"
                                        wire:model.live="item.de-last_name" placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                            <div class="field required @if($history_flg == 0) {{ err_bind($errs, 'de-first_name', $key) }} @endif">
                                <label for="de-first_name">名</label>
                                @if($history_flg == 0)
                                    <input type="text" name="de-first_name[]" maxlength="255"
                                        wire:model.live="item.de-first_name" placeholder="花子" autocomplete="off">
                                @else
                                    <input type="text" name="de-first_name[]" maxlength="255"
                                        wire:model.live="item.de-first_name" placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                        </div>

                        <div class="two fields">
                            <div class="eight wide field required @if($history_flg == 0) {{ err_bind($errs, 'de-last_name_kana', $key) }} @endif">
                                <label for="de-last_name_kana">氏（カナ）</label>
                                @if($history_flg == 0)
                                    <input type="text" name="de-last_name_kana[]" maxlength="255"
                                        wire:model.live="item.de-last_name_kana" placeholder="タナカ" autocomplete="off">
                                @else
                                    <input type="text" name="de-last_name_kana[]" maxlength="255"
                                        wire:model.live="item.de-last_name_kana" placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                            <div class="field required @if($history_flg == 0) {{ err_bind($errs, 'de-first_name_kana', $key) }} @endif">
                                <label for="de-first_name_kana">名（カナ）</label>
                                @if($history_flg == 0)
                                    <input type="text" name="de-first_name_kana[]" maxlength="255"
                                        wire:model.live="item.de-first_name_kana" placeholder="ハナコ" autocomplete="off">
                                @else
                                    <input type="text" name="de-first_name_kana[]" maxlength="255"
                                        wire:model.live="item.de-first_name_kana" placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="three fields">
                            <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-sex', $key) }} @endif">
                                <label for="de-sex">性別</label>
                                @if($history_flg == 0)
                                    <select class="ui fluid dropdown" name="de-sex[]"
                                        wire:model.live="item.de-sex">
                                        <option value="">未選択</option>
                                        <option value="1">男性</option>
                                        <option value="2">女性</option>
                                    </select>
                                @else
                                    <select class="ui fluid dropdown" name="de-sex[]"
                                        wire:model.live="item.de-sex" style="pointer-events: none; border: none;">
                                        <option value="">未選択</option>
                                        <option value="1">男性</option>
                                        <option value="2">女性</option>
                                    </select>
                                @endif
                            </div>
                            <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-birthday', $key) }} @endif">
                                <label for="de-date_of_expiry">生年月日</label>
                                @if($history_flg == 0)
                                    <div class="ui calendar dependent-calendar birthday key-{{ $item['de-key'] }}" wire:ignore>
                                        <div class="ui fluid input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" name="de-birthday[]" class="de-birthday"
                                                wire:model.live="item.de-birthday"
                                                placeholder="YYYY年M月D日" autocomplete="off">
                                        </div>
                                    </div>
                                @else
                                    <input type="text" name="de-birthday[]" class="dependent-birthday key-{{ $item['de-key'] }}"
                                        wire:model.live="item.de-birthday"
                                        placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                            <div class="field">
                                <label for="de-age">年齢</label>
                                    <input type="text" name="de-age[]" class="de-age" wire:model.live="item.de-age"
                                    placeholder="" readonly style="border: none;">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-occupation', $key) }} @endif">
                                <label for="de-occupation">職業</label>
                                @if($history_flg == 0)
                                    <input type="text" name="de-occupation[]" maxlength="255"
                                        wire:model.live="item.de-occupation" placeholder="会社員" autocomplete="off">
                                @else
                                    <input type="text" name="de-occupation[]" maxlength="255"
                                        wire:model.live="item.de-occupation" placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                            <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-annual_income', $key) }} @endif">
                                <label for="de-annual_income">収入</label>
                                @if($history_flg == 0)
                                    <input type="number" name="de-annual_income[]" max="9999999" min="0"
                                        wire:model.live="item.de-annual_income" placeholder="9999999" autocomplete="off">
                                @else
                                    <input type="number" name="de-annual_income[]" max="9999999" min="0"
                                        wire:model.live="item.de-annual_income" placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="field">
                            <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-contact', $key) }} @endif">
                                <label for="de-contact">連絡先（電話番号・ハイフンなし）</label>
                                @if($history_flg == 0)
                                    <input type="text" name="de-contact[]" maxlength="13"
                                        wire:model.live="item.de-contact" placeholder="" autocomplete="off">
                                @else
                                    <input type="text" name="de-contact[]" maxlength="13"
                                        wire:model.live="item.de-contact" placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="content_inner">
                        @if($history_flg == 0)
                        <div style="display: flex;">
                            <h5 style="margin-right: 1em;">居住</h5>
                            <div class="ui checkbox">
                                <input type="checkbox" class="de-living_type_checkbox" wire:model="item.de-living_type" value="1"
                                @if($item['de-living_type'] == 1) checked @endif
                                wire:model.live="item.de-living_type" class="de-living_type">
                                <input type="hidden" name="de-living_type[]" wire:model="item.de-living_type"
                                @if($item['de-living_type'] == 1)
                                value="1"
                                @else
                                value="0"
                                @endif>
                                <label>同居</label>
                            </div>
                        </div>
                        @else
                        <input type="hidden" name="de-living_type[]" wire:model="item.de-living_type">
                        @endif
                        <div class="fields">
                            <div class="four wide field @if($history_flg == 0) {{ err_bind($errs, 'de-post_code', $key) }} @endif">
                                <label for="de-post_code">郵便番号</label>
                                @if($history_flg == 0)
                                <input type="text" name="de-post_code[]" class="de-post_code"
                                wire:model.live="item.de-post_code" placeholder="" autocomplete="off" @if($item['de-living_type'] == 1) style="border: none;" readonly @endif>
                                @else
                                <input type="text" name="de-post_code[]"
                                wire:model.live="item.de-post_code" placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                            <div class="four wide field @if($history_flg == 0) {{ err_bind($errs, 'de-address_prefecture', $key) }} @endif">
                                <label for="de-address_prefecture">住所（都道府県）</label>
                                @if($history_flg == 0)
                                <select class="ui fluid dropdown de-address_prefecture" name="de-address_prefecture[]"
                                    wire:model.live="item.de-address_prefecture" @if($item['de-living_type'] == 1) style="pointer-events: none;border: none;"@endif>
                                    <option value="">未選択</option>
                                    @foreach ($prefectures as $k => $value)
                                        <option value="{{ $k }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @else
                                <select class="ui fluid dropdown" name="de-address_prefecture[]"
                                    wire:model.live="item.de-address_prefecture" style="border: none;" readonly>
                                    <option value="">未選択</option>
                                    @foreach ($prefectures as $k => $value)
                                        <option value="{{ $k }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                            <div class="eight wide field @if($history_flg == 0) {{ err_bind($errs, 'de-address_city', $key) }} @endif">
                                <label for="de-address_city">住所（市区町村）</label>
                                @if($history_flg == 0)
                                <input type="text" name="de-address_city[]" class="de-address_city"
                                wire:model.live="item.de-address_city" 
                                    placeholder="" autocomplete="off" @if($item['de-living_type'] == 1) style="border: none;" readonly @endif>
                                @else
                                <input type="text" name="de-address_city[]"
                                wire:model.live="item.de-address_city" 
                                    placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-address_ward', $key) }} @endif">
                                <label for="de-address_ward">住所（丁目・番地）</label>
                                @if($history_flg == 0)
                                <input type="text" name="de-address_ward[]" class="de-address_ward"
                                wire:model.live="item.de-address_ward" 
                                    placeholder="" autocomplete="off" @if($item['de-living_type'] == 1) style="border: none;" readonly @endif>
                                @else
                                <input type="text" name="de-address_ward[]"
                                wire:model.live="item.de-address_ward" 
                                    placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                            <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-address_apartment', $key) }} @endif">
                                <label for="de-address_apartment">住所（アパート・マンション名等）</label>
                                @if($history_flg == 0)
                                <input type="text" name="de-address_apartment[]" class="de-address_apartment"
                                    wire:model.live="item.de-address_apartment" 
                                    placeholder="" autocomplete="off" @if($item['de-living_type'] == 1) style="border: none;" readonly @endif>
                                @else
                                <input type="text" name="de-address_apartment[]"
                                    wire:model.live="item.de-address_apartment" 
                                    placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="three fields">
                            <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-date_of_authorisation', $key) }} @endif">
                                <label for="de-date_of_authorisation">認定日</label>
                                @if($history_flg == 0)
                                    <div class="ui calendar dependent-calendar key-{{ $item['de-key'] }}" wire:ignore>
                                        <div class="ui fluid input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" name="de-date_of_authorisation[]"
                                                class="de-date_of_authorisation"
                                                wire:model.live="item.de-date_of_authorisation"
                                                placeholder="YYYY年M月D日" autocomplete="off">
                                        </div>
                                    </div>
                                @else
                                    <input type="text" name="de-date_of_authorisation[]" class="history-calendar key-{{ $item['de-key'] }}"
                                        wire:model.live="item.de-date_of_authorisation"
                                        placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                            <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-date_of_expiry', $key) }} @endif">
                                <label for="de-date_of_expiry">抹消日</label>
                                @if($history_flg == 0)
                                    <div class="ui calendar dependent-calendar key-{{ $item['de-key'] }}" wire:ignore>
                                        <div class="ui fluid input left icon">
                                            <i class="calendar icon"></i>
                                            <input type="text" name="de-date_of_expiry[]"
                                                class="de-date_of_expiry"
                                                wire:model.live="item.de-date_of_expiry"
                                                placeholder="YYYY年M月D日" autocomplete="off">
                                        </div>
                                    </div>
                                @else
                                    <input type="text" name="de-date_of_expiry[]" class="history-calendar key-{{ $item['de-key'] }}"
                                        wire:model.live="item.de-date_of_expiry"
                                        placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                            <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-dependent_type', $key) }} @endif">
                                <label for="de-dependent_type">扶養区分</label>
                                @if($history_flg == 0)
                                    <select class="ui fluid dropdown de-dependent_type" name="de-dependent_type[]"
                                        wire:model.live="item.de-dependent_type">
                                        <option value="">未選択</option>
                                        <option value="1">一般の控除対象扶養親族</option>
                                        <option value="2">特定扶養親族</option>
                                        <option value="3">老人扶養親族</option>
                                        <option value="4">同居老親等</option>
                                    </select>
                                @else
                                    <select class="ui fluid dropdown" name="de-dependent_type[]"
                                        wire:model.live="item.de-dependent_type" style="pointer-events: none; border: none;">
                                        <option value="">未選択</option>
                                        <option value="1">一般の控除対象扶養親族</option>
                                        <option value="2">特定扶養親族</option>
                                        <option value="3">老人扶養親族</option>
                                        <option value="4">同居老親等</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-mynumber_card_no', $key) }} @endif">
                                <label for="de-mynumber_card_no">マイナンバー</label>
                                @if($history_flg == 0)
                                    <input type="text" name="de-mynumber_card_no[]" maxlength="12"
                                        wire:model.live="item.de-mynumber_card_no" placeholder="123412341234" autocomplete="off">
                                @else
                                    <input type="text" name="de-mynumber_card_no[]" maxlength="12"
                                        wire:model.live="item.de-mynumber_card_no" placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                            <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-pension_no', $key) }} @endif">
                                <label for="de-pension_no">基礎年金番号</label>
                                @if($history_flg == 0)
                                    <input type="text" name="de-pension_no[]" maxlength="10"
                                        wire:model.live="item.de-pension_no" placeholder="1234512345" autocomplete="off">
                                @else
                                    <input type="text" name="de-pension_no[]" maxlength="10"
                                        wire:model.live="item.de-pension_no" placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-insurance_office_no', $key) }} @endif">
                                <label for="de-insurance_office_no">被保険者番号（雇用）</label>
                                @if($history_flg == 0)
                                    <input type="text" name="de-insurance_office_no[]" maxlength="11"
                                        wire:model.live="item.de-insurance_office_no" placeholder="12341234561" autocomplete="off">
                                @else
                                    <input type="text" name="de-insurance_office_no[]" maxlength="11"
                                        wire:model.live="item.de-insurance_office_no" placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                            <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-insurer_no', $key) }} @endif">
                                <label for="de-insurer_no">被保険者番号（健保）</label>
                                @if($history_flg == 0)
                                    <input type="text" name="de-insurer_no[]" maxlength="8"
                                        wire:model.live="item.de-insurer_no" placeholder="01234567" autocomplete="off">
                                @else
                                    <input type="text" name="de-insurer_no[]" maxlength="10"
                                        wire:model.live="item.de-insurer_no" placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="field">
                            <div class="field @if($history_flg == 0) {{ err_bind($errs, 'de-remarks', $key) }} @endif">
                                <label for="de-remarks">備考</label>
                                @if($history_flg == 0)
                                    <input type="text" name="de-remarks[]" maxlength="255"
                                        wire:model.live="item.de-remarks" placeholder="" autocomplete="off">
                                @else
                                    <input type="text" name="de-remarks[]" maxlength="255"
                                        wire:model.live="item.de-remarks" placeholder="" style="border: none;" readonly>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="de-history" name="de-history_flg[]" wire:model.live="item.de-history_flg" value="{{ $item['de-history_flg'] }}">
                <div style="text-align: right;padding: 12px;" class="dependent-control">
                @if($history_flg == 0)
                    @if($item['de-id'] != 0)
                        <div class="ui floating dropdown button negative px-1 edit-select" style="width: 200px; text-align: right; font-size: 12.88px;">
                            この扶養者情報を削除
                            <i class="dropdown icon" style="margin-left: 1rem;"></i>
                            <div class="menu">
                                <div class="item history" wire:click="history({{ $key }})">履歴として残す</div>
                                <div class="item delete" wire:click="removeDependent({{ $key }})">削除</div>
                            </div>
                        </div>
                    @else
                        <button class="ui negative button" type="button"
                            wire:click="removeDependent({{ $key }})">
                            この扶養者情報を削除
                        </button>
                    @endif
                @else
                    <button class="ui negative button" type="button"
                        wire:click="removeDependentHistoryItem({{ $key }})">
                        この扶養者情報を削除
                    </button>
                @endif
                </div>
            </div>
        </div>
</div>
