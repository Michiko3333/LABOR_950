<div class="dependent-container">
    <script type="module">
        window.dependent = () => {
            $('.dependent-calendar').calendar({
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
            $('.dependent-calendar.birthday').each(function() {
                const calendarElement = $(this);
                calendarElement.calendar({
                    type: 'date',
                    formatter: {
                        date: 'Y"年"M"月"D"日"'
                    },
                    text: {
                        days: ['日', '月', '火', '水', '木', '金', '土'],
                        months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                    },
                    initialDate: "",
                    onChange: (date, text, mode) => {
                        const match = text.match(/(\d{4})年(\d{1,2})月(\d{1,2})日/);
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
                            const ageInput = calendarElement.closest('.content_inner').find('.de-age');
                            ageInput.val(ageString);
                        }
                    },
                });
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

            Livewire.dispatch('dependent-form-loaded');

            function toggleDisableFields() {
                console.log('start');
                $('.de-date_of_authorisation').each(function (index) {
                    console.log(index);
                    const authField = $(this);
                    const expiryField = $('.de-date_of_expiry').eq(index);
                    const dependentTypeField = $('.de-dependent_type').eq(index);
                    console.log(authField, expiryField, dependentTypeField);

                    if (!authField.val()) {
                        expiryField.prop('disabled', true);
                        dependentTypeField.prop('disabled', true);
                        console.log(true);
                    } else {
                        expiryField.prop('disabled', false);
                        dependentTypeField.prop('disabled', false);
                        console.log(false);
                    }
                });
                console.log('end');
            }

            toggleDisableFields();

            $('.de-date_of_authorisation').on('change', function () {
                toggleDisableFields();
            });
        }
    </script>
    @foreach ($data as $key => $item)
        <div class="ui styled accordion card-shadow my-2" style="width: 100%;">
            <div class="title active">
                <i class="dropdown icon"></i>
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
            </div>
            <div data-accordion="{{ $key }}" class="{{ $item['de-class_content'] }}">
                <input type="hidden" name="de-id[]" value="{{ $item['de-id'] }}" />
                <div class="content_inner">
                    <h3>基本情報</h3>
                    <div class="two fields">
                        @if ($key == 0 && $item['de-spouse_flag'] == 1)
                            <div class="field required {{ err_bind($errs, 'de-relationship_spouse', $key) }}">
                                <label for="de-relationship_spouse">続柄</label>
                                @if($history_flg === 0)
                                    <select class="ui fluid dropdown" name="de-relationship_spouse[]"
                                        wire:model.live="data.{{ $key }}.de-relationship_spouse">
                                        <option value="">未選択</option>
                                        <option value="1">夫</option>
                                        <option value="2">妻</option>
                                        <option value="3">夫(未届)</option>
                                        <option value="4">妻(未届)</option>
                                    </select>
                                @else
                                <select class="ui fluid dropdown" name="de-relationship_spouse[]"
                                    wire:model.live="data.{{ $key }}.de-relationship_spouse" style="pointer-events: none; border: none;">
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
                            <div class="field required {{ err_bind($errs, 'de-relationship_dependent', $key) }}">
                                <label for="de-relationship_dependent">続柄</label>
                                @if($history_flg === 0)
                                    <select class="ui fluid dropdown" name="de-relationship_dependent[]"
                                        wire:model.live="data.{{ $key }}.de-relationship_dependent">
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
                                        wire:model.live="data.{{ $key }}.de-relationship_dependent" style="pointer-events: none; border: none;">
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
                        @endif
                        @if ($key == 0)
                            <div class="field {{ err_bind($errs, 'de-spouse_flag', $key) }}">
                                <div class="ui checkbox mr-1">
                                    @if($history_flg === 0)
                                        <input type="checkbox" name="de-spouse_flag[]" value='1'
                                        @if($item['de-spouse_flag'] == 1) checked @endif
                                        wire:model.live="data.{{ $key }}.de-spouse_flag">
                                        <label>配偶者</label>
                                    @else
                                        <input type="checkbox" name="de-spouse_flag[]" value='1' style="pointer-events: none;"
                                        @if($item['de-spouse_flag'] == 1) checked @endif
                                        wire:model.live="data.{{ $key }}.de-spouse_flag">
                                        <label>配偶者</label>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="two fields">
                        <div class="field required {{ err_bind($errs, 'de-last_name', $key) }}">
                            <label for="de-last_name">氏</label>
                            @if($history_flg === 0)
                                <input type="text" name="de-last_name[]" maxlength="255"
                                    wire:model.live="data.{{ $key }}.de-last_name" placeholder="田中">
                            @else
                                <input type="text" name="de-last_name[]" maxlength="255"
                                    wire:model.live="data.{{ $key }}.de-last_name" placeholder="" style="border: none;" readonly>
                            @endif
                        </div>
                        <div class="field required {{ err_bind($errs, 'de-first_name', $key) }}">
                            <label for="de-first_name">名</label>
                            @if($history_flg === 0)
                                <input type="text" name="de-first_name[]" maxlength="255"
                                    wire:model.live="data.{{ $key }}.de-first_name" placeholder="花子">
                            @else
                                <input type="text" name="de-first_name[]" maxlength="255"
                                    wire:model.live="data.{{ $key }}.de-first_name" placeholder="" style="border: none;" readonly>
                            @endif
                        </div>
                    </div>

                    <div class="two fields">
                        <div class="eight wide field required {{ err_bind($errs, 'de-last_name_kana', $key) }}">
                            <label for="de-last_name_kana">氏（カナ）</label>
                            @if($history_flg === 0)
                                <input type="text" name="de-last_name_kana[]" maxlength="255"
                                    wire:model.live="data.{{ $key }}.de-last_name_kana" placeholder="タナカ">
                            @else
                                <input type="text" name="de-last_name_kana[]" maxlength="255"
                                    wire:model.live="data.{{ $key }}.de-last_name_kana" placeholder="" style="border: none;" readonly>
                            @endif
                        </div>
                        <div class="field required {{ err_bind($errs, 'de-first_name_kana', $key) }}">
                            <label for="de-first_name_kana">名（カナ）</label>
                            @if($history_flg === 0)
                                <input type="text" name="de-first_name_kana[]" maxlength="255"
                                    wire:model.live="data.{{ $key }}.de-first_name_kana" placeholder="ハナコ">
                            @else
                                <input type="text" name="de-first_name_kana[]" maxlength="255"
                                    wire:model.live="data.{{ $key }}.de-first_name_kana" placeholder="" style="border: none;" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="three fields">
                        <div class="field {{ err_bind($errs, 'de-sex', $key) }}">
                            <label for="de-sex">性別</label>
                            @if($history_flg === 0)
                                <select class="ui fluid dropdown" name="de-sex[]"
                                    wire:model.live="data.{{ $key }}.de-sex">
                                    <option value="">未選択</option>
                                    <option value="1">男性</option>
                                    <option value="2">女性</option>
                                </select>
                            @else
                                <select class="ui fluid dropdown" name="de-sex[]"
                                    wire:model.live="data.{{ $key }}.de-sex" style="pointer-events: none; border: none;">
                                    <option value="">未選択</option>
                                    <option value="1">男性</option>
                                    <option value="2">女性</option>
                                </select>
                            @endif
                        </div>
                        <div class="field {{ err_bind($errs, 'de-birthday', $key) }}">
                            <label for="de-date_of_expiry">生年月日</label>
                            @if($history_flg === 0)
                                <div class="ui calendar dependent-calendar birthday" wire:ignore>
                                    <div class="ui fluid input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" name="de-birthday[]" class="de-birthday"
                                            wire:model.live="data.{{ $key }}.de-birthday"
                                            placeholder="YYYY年M月D日">
                                    </div>
                                </div>
                            @else
                                <input type="text" name="de-birthday[]"
                                    wire:model.live="data.{{ $key }}.de-birthday"
                                    placeholder="" style="border: none;" readonly>
                            @endif
                        </div>
                        <div class="field">
                            <label for="de-age">年齢</label>
                                <input type="text" name="de-age[]" class="de-age"
                                placeholder="" readonly style="border: none;">
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field {{ err_bind($errs, 'de-occupation', $key) }}">
                            <label for="de-occupation">職業</label>
                            @if($history_flg === 0)
                                <input type="text" name="de-occupation[]" maxlength="255"
                                    wire:model.live="data.{{ $key }}.de-occupation" placeholder="会社員">
                            @else
                                <input type="text" name="de-occupation[]" maxlength="255"
                                    wire:model.live="data.{{ $key }}.de-occupation" placeholder="" style="border: none;" readonly>
                            @endif
                        </div>
                        <div class="field {{ err_bind($errs, 'de-annual_income', $key) }}">
                            <label for="de-annual_income">収入</label>
                            @if($history_flg === 0)
                                <input type="number" name="de-annual_income[]" max="9999999" min="0"
                                    wire:model.live="data.{{ $key }}.de-annual_income" placeholder="9999999">
                            @else
                                <input type="number" name="de-annual_income[]" max="9999999" min="0"
                                    wire:model.live="data.{{ $key }}.de-annual_income" placeholder="" style="border: none;" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="field">
                        <div class="field {{ err_bind($errs, 'de-contact', $key) }}">
                            <label for="de-contact">連絡先（電話番号・ハイフンなし）</label>
                            @if($history_flg === 0)
                                <input type="text" name="de-contact[]" maxlength="13"
                                    wire:model.live="data.{{ $key }}.de-contact" placeholder="">
                            @else
                                <input type="text" name="de-contact[]" maxlength="13"
                                    wire:model.live="data.{{ $key }}.de-contact" placeholder="" style="border: none;" readonly>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="content_inner">
                    <div class="three fields">
                        <div class="field {{ err_bind($errs, 'de-date_of_authorisation', $key) }}">
                            <label for="de-date_of_authorisation">認定日</label>
                            @if($history_flg === 0)
                                <div class="ui calendar dependent-calendar" wire:ignore>
                                    <div class="ui fluid input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" name="de-date_of_authorisation[]"
                                            class="de-date_of_authorisation"
                                            wire:model.live="data.{{ $key }}.de-date_of_authorisation"
                                            placeholder="YYYY年M月D日">
                                    </div>
                                </div>
                            @else
                                <input type="text" name="de-date_of_authorisation[]"
                                    wire:model.live="data.{{ $key }}.de-date_of_authorisation"
                                    placeholder="" style="border: none;" readonly>
                            @endif
                        </div>
                        <div class="field {{ err_bind($errs, 'de-date_of_expiry', $key) }}">
                            <label for="de-date_of_expiry">抹消日</label>
                            @if($history_flg === 0)
                                <div class="ui calendar dependent-calendar" wire:ignore>
                                    <div class="ui fluid input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" name="de-date_of_expiry[]"
                                            class="de-date_of_expiry"
                                            wire:model.live="data.{{ $key }}.de-date_of_expiry"
                                            placeholder="YYYY年M月D日" @if(!$item['de-date_of_authorisation']) disabled @endif>
                                    </div>
                                </div>
                            @else
                                <input type="text" name="de-date_of_expiry[]"
                                    wire:model.live="data.{{ $key }}.de-date_of_expiry"
                                    placeholder="" style="border: none;" readonly>
                            @endif
                        </div>
                        <div class="field {{ err_bind($errs, 'de-dependent_type', $key) }}">
                            <label for="de-dependent_type">扶養区分</label>
                            @if($history_flg === 0)
                                <select class="ui fluid dropdown de-dependent_type" name="de-dependent_type[]"
                                    wire:model.live="data.{{ $key }}.de-dependent_type" @if(!$item['de-date_of_authorisation']) disabled @endif>
                                    <option value="">未選択</option>
                                    <option value="1">一般の控除対象扶養親族</option>
                                    <option value="2">特定扶養親族</option>
                                    <option value="3">老人扶養親族</option>
                                    <option value="4">同居老親等</option>
                                </select>
                            @else
                                <select class="ui fluid dropdown" name="de-dependent_type[]"
                                    wire:model.live="data.{{ $key }}.de-dependent_type" style="pointer-events: none; border: none;">
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
                        <div class="field {{ err_bind($errs, 'de-mynumber_card_no', $key) }}">
                            <label for="de-mynumber_card_no">マイナンバー</label>
                            @if($history_flg === 0)
                                <input type="text" name="de-mynumber_card_no[]" maxlength="12"
                                    wire:model.live="data.{{ $key }}.de-mynumber_card_no" placeholder="123412341234">
                            @else
                                <input type="text" name="de-mynumber_card_no[]" maxlength="12"
                                    wire:model.live="data.{{ $key }}.de-mynumber_card_no" placeholder="" style="border: none;" readonly>
                            @endif
                        </div>
                        <div class="field {{ err_bind($errs, 'de-pension_no', $key) }}">
                            <label for="de-pension_no">基礎年金番号</label>
                            @if($history_flg === 0)
                                <input type="text" name="de-pension_no[]" maxlength="10"
                                    wire:model.live="data.{{ $key }}.de-pension_no" placeholder="1234512345">
                            @else
                                <input type="text" name="de-pension_no[]" maxlength="10"
                                    wire:model.live="data.{{ $key }}.de-pension_no" placeholder="" style="border: none;" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="field">
                        <div class="field {{ err_bind($errs, 'de-other_1', $key) }}">
                            <label for="de-other_1">その他①</label>
                            @if($history_flg === 0)
                                <input type="text" name="de-other_1[]" maxlength="255"
                                    wire:model.live="data.{{ $key }}.de-other_1" placeholder="">
                            @else
                                <input type="text" name="de-other_1[]" maxlength="255"
                                    wire:model.live="data.{{ $key }}.de-other_1" placeholder="" style="border: none;" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="field">
                        <div class="field {{ err_bind($errs, 'de-other_2', $key) }}">
                            <label for="de-other_2">その他②</label>
                            @if($history_flg === 0)
                                <input type="text" name="de-other_2[]" maxlength="255"
                                    wire:model.live="data.{{ $key }}.de-other_2" placeholder="">
                            @else
                                <input type="text" name="de-other_2[]" maxlength="255"
                                    wire:model.live="data.{{ $key }}.de-other_2" placeholder="" style="border: none;" readonly>
                            @endif
                        </div>
                    </div>
                    @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
                        <input type="hidden" class="de-history" name="de-history[]" wire:model.live="data.{{ $key }}.de-history_flg" value="{{ $item['de-history_flg'] }}">
                        @if($history_flg === 0)
                            <div style="text-align: right;">
                                @if($item['de-last_name'])
                                    <div class="ui floating dropdown button negative px-1 edit-select" style="width: 200px; text-align: right; font-size: 12.88px;">
                                        この扶養者情報を削除
                                        <i class="dropdown icon" style="margin-left: 1rem;"></i>
                                        <div class="menu">
                                            <div class="item history" wire:click="history({{ $key }})">履歴として残す</div>
                                            <div class="item delete" wire:click="remove({{ $key }})">削除</div>
                                        </div>
                                    </div>
                                @else
                                    <button class="ui negative button" type="button"
                                        wire:click="remove({{ $key }})">
                                        この扶養者情報を削除
                                    </button>
                                @endif
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
        <button class="append-dependent" type="button" wire:click="append"
            {{ count($data) > 19 ? 'disabled' : '' }}><i class="plus circle icon"></i>追加</button>
    @endif
    @script
        <script type="module">
            const notReadonly = @json($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2));
            $(document).ready(function() {
                if (notReadonly) dependent();
                $('.dependent-calendar.birthday').each(function() {
                    const calendarElement = $(this);
                    const date = new Date($(this).data()["date"]);
                    if(date != "Invalid Date"){
                        const today = new Date();
                        let age = today.getFullYear() - date.getFullYear();
                        let monthDiff = today.getMonth() - date.getMonth();
                        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < date.getDate())) {
                            age -= 1;
                            monthDiff += 12;
                        }
                        let ageMonths = monthDiff;
                        const ageString = `${age}歳${ageMonths}ヵ月`;
                        const ageInput = calendarElement.closest('.content_inner').find('.de-age');
                        ageInput.val(ageString);
                    }
                });
            });
            $wire.on('form-appended', () => {
                setTimeout(() => {
                    if (notReadonly) dependent();
                }, 0);
            });
            $wire.on('history_flg-change', (index) => {
                setTimeout(() => {
                    $('.de-history').eq(index[0].index).val(1);
                }, 0);
            });
        </script>
    @endscript
</div>
