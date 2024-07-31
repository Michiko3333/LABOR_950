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

                    $relationship_spouse_value = $data[$key]['de-relationship_spouse'] ?? '';
                    $relationship_dependent_value = $data[$key]['de-relationship_dependent'] ?? '';
                    $relationship_spouse = $relationship_spouse_group[$relationship_spouse_value] ?? '';
                    $relationship_dependent = $relationship_dependent_group[$relationship_dependent_value] ?? '';
                @endphp
                @if ($data[$key]['de-spouse_flag'] == '1')
                    【{{ $relationship_spouse }}】&nbsp;{{ $data[$key]['de-last_name'] }}{{ $data[$key]['de-first_name'] }}
                @elseif ($data[$key]['de-spouse_flag'] != '1')
                    【{{ $relationship_dependent }}】&nbsp;{{ $data[$key]['de-last_name'] }}{{ $data[$key]['de-first_name'] }}
                @endif
            </div>
            <div data-accordion="{{ $key }}" class="{{ $item['de-class_content'] }}">
                <input type="hidden" name="de-id[]" value="{{ $item['de-id'] }}" />
                <div class="content_inner">
                    <h3>基本情報</h3>
                    <div class="two fields">
                        @if ($data[$key]['de-spouse_flag'] == '1')
                            <div class="field required {{ err_bind($errs, 'de-relationship_spouse', $key) }}">
                                <label for="de-relationship_spouse">続柄</label>
                                <select class="ui fluid dropdown" name="de-relationship_spouse[]"
                                    wire:model.live="data.{{ $key }}.de-relationship_spouse">
                                    <option value="">未選択</option>
                                    <option value="1">夫</option>
                                    <option value="2">妻</option>
                                    <option value="3">夫(未届)</option>
                                    <option value="4">妻(未届)</option>
                                </select>
                            </div>
                        @elseif  ($data[$key]['de-spouse_flag'] != '1')
                            <div class="field required {{ err_bind($errs, 'de-relationship_dependent', $key) }}">
                                <label for="de-relationship_dependent">続柄</label>
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
                            </div>
                        @endif
                        @if ($key == 0)
                            <div class="field {{ err_bind($errs, 'de-spouse_flag', $key) }}">
                                <div class="ui checkbox mr-1">
                                    <input type="checkbox" name="de-spouse_flag[]" value='1'
                                    @if($data[$key]['de-spouse_flag'] == 1) checked @endif
                                    wire:model.live="data.{{ $key }}.de-spouse_flag">
                                    <label>配偶者</label>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="two fields">
                        <div class="field required {{ err_bind($errs, 'de-last_name', $key) }}">
                            <label for="de-last_name">氏</label>
                            <input type="text" name="de-last_name[]" maxlength="255"
                                wire:model.live="data.{{ $key }}.de-last_name" placeholder="田中">
                        </div>
                        <div class="field required {{ err_bind($errs, 'de-first_name', $key) }}">
                            <label for="de-first_name">名</label>
                            <input type="text" name="de-first_name[]" maxlength="255"
                                wire:model.live="data.{{ $key }}.de-first_name" placeholder="花子">
                        </div>
                    </div>

                    <div class="two fields">
                        <div class="eight wide field required {{ err_bind($errs, 'de-last_name_kana', $key) }}">
                            <label for="de-last_name_kana">氏（カナ）</label>
                            <input type="text" name="de-last_name_kana[]" maxlength="255"
                                wire:model.live="data.{{ $key }}.de-last_name_kana" placeholder="タナカ">
                        </div>
                        <div class="field required {{ err_bind($errs, 'de-first_name_kana', $key) }}">
                            <label for="de-first_name_kana">名（カナ）</label>
                            <input type="text" name="de-first_name_kana[]" maxlength="255"
                                wire:model.live="data.{{ $key }}.de-first_name_kana" placeholder="ハナコ">
                        </div>
                    </div>
                    <div class="three fields">
                        <div class="field {{ err_bind($errs, 'de-sex', $key) }}">
                            <label for="de-sex">性別</label>
                            <select class="ui fluid dropdown" name="de-sex[]"
                                wire:model.live="data.{{ $key }}.de-sex">
                                <option value="">未選択</option>
                                <option value="1">男性</option>
                                <option value="2">女性</option>
                            </select>
                        </div>
                        <div class="field {{ err_bind($errs, 'de-birthday', $key) }}">
                            <label for="de-date_of_expiry">生年月日</label>
                            <div class="ui calendar dependent-calendar" wire:ignore>
                                <div class="ui fluid input left icon">
                                    <i class="calendar icon"></i>
                                    <input type="text" name="de-birthday[]"
                                        wire:model.live="data.{{ $key }}.de-birthday"
                                        placeholder="YYYY年M月D日">
                                </div>
                            </div>
                        </div>
                        <div class="field {{ err_bind($errs, 'de-age', $key) }}">
                            <label for="de-age">年齢</label>
                            <input type="number" name="de-age[]" max="200" min="0"
                                wire:model.live="data.{{ $key }}.de-age" placeholder="10">
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field {{ err_bind($errs, 'de-occupation', $key) }}">
                            <label for="de-occupation">職業</label>
                            <input type="text" name="de-occupation[]" maxlength="255"
                                wire:model.live="data.{{ $key }}.de-occupation" placeholder="会社員">
                        </div>
                        <div class="field {{ err_bind($errs, 'de-annual_income', $key) }}">
                            <label for="de-annual_income">収入</label>
                            <input type="number" name="de-annual_income[]" max="9999999" min="0"
                                wire:model.live="data.{{ $key }}.de-annual_income" placeholder="9999999">
                        </div>
                    </div>
                    <div class="field">
                        <div class="field {{ err_bind($errs, 'de-contact', $key) }}">
                            <label for="de-contact">連絡先（電話番号・ハイフンなし）</label>
                            <input type="text" name="de-contact[]" maxlength="13"
                                wire:model.live="data.{{ $key }}.de-contact" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="content_inner">
                    <div class="three fields">
                        <div class="field {{ err_bind($errs, 'de-date_of_authorisation', $key) }}">
                            <label for="de-date_of_authorisation">認定日</label>
                            <div class="ui calendar dependent-calendar" wire:ignore>
                                <div class="ui fluid input left icon">
                                    <i class="calendar icon"></i>
                                    <input type="text" name="de-date_of_authorisation[]"
                                        wire:model.live="data.{{ $key }}.de-date_of_authorisation"
                                        placeholder="YYYY年M月D日">
                                </div>
                            </div>
                        </div>
                        <div class="field {{ err_bind($errs, 'de-date_of_expiry', $key) }}">
                            <label for="de-date_of_expiry">抹消日</label>
                            <div class="ui calendar dependent-calendar" wire:ignore>
                                <div class="ui fluid input left icon">
                                    <i class="calendar icon"></i>
                                    <input type="text" name="de-date_of_expiry[]"
                                        wire:model.live="data.{{ $key }}.de-date_of_expiry"
                                        placeholder="YYYY年M月D日">
                                </div>
                            </div>
                        </div>
                        <div class="field {{ err_bind($errs, 'de-dependent_type', $key) }}">
                            <label for="de-dependent_type">扶養区分</label>
                            <select class="ui fluid dropdown" name="de-dependent_type[]"
                                wire:model.live="data.{{ $key }}.de-dependent_type">
                                <option value="">未選択</option>
                                <option value="1">一般の控除対象扶養親族</option>
                                <option value="2">特定扶養親族</option>
                                <option value="3">老人扶養親族</option>
                                <option value="4">同居老親等</option>
                            </select>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field {{ err_bind($errs, 'de-mynumber_card_no', $key) }}">
                            <label for="de-mynumber_card_no">マイナンバー</label>
                            <input type="text" name="de-mynumber_card_no[]" maxlength="12"
                                wire:model.live="data.{{ $key }}.de-mynumber_card_no" placeholder="123412341234">
                        </div>
                        <div class="field {{ err_bind($errs, 'de-pension_no', $key) }}">
                            <label for="de-pension_no">基礎年金番号</label>
                            <input type="text" name="de-pension_no[]" maxlength="10"
                                wire:model.live="data.{{ $key }}.de-pension_no" placeholder="1234512345">
                        </div>
                    </div>
                    <div class="field">
                        <div class="field {{ err_bind($errs, 'de-other_1', $key) }}">
                            <label for="de-other_1">その他①</label>
                            <input type="text" name="de-other_1[]" maxlength="255"
                                wire:model.live="data.{{ $key }}.de-other_1" placeholder="">
                        </div>
                    </div>
                    <div class="field">
                        <div class="field {{ err_bind($errs, 'de-other_2', $key) }}">
                            <label for="de-other_2">その他②</label>
                            <input type="text" name="de-other_2[]" maxlength="255"
                                wire:model.live="data.{{ $key }}.de-other_2" placeholder="">
                        </div>
                    </div>
                    @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
                        <div style="text-align: right;">
                            <button class="ui negative button" type="button"
                                wire:click="remove({{ $key }})">
                                この扶養者情報を削除
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    

    @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
        <button class="append-dependent" type="button" wire:click="append"
            {{ count($data) > 9 ? 'disabled' : '' }}><i class="plus circle icon"></i>追加</button>
    @endif
    @script
        <script type="module">
            const notReadonly = @json($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2));
            $(document).ready(function() {
                if (notReadonly) dependent();
            });
            $wire.on('form-appended', () => {
                setTimeout(() => {
                    if (notReadonly) dependent();
                }, 0);
            });
        </script>
    @endscript
</div>

