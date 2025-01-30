<div class="content">
<style type="text/css">
div {
    font-size: 14px;
}
label {
    font-size: 14px !important;
}
</style>
@if($data)
@foreach ($data as $key => $item)
    <div class="ui form">
        <div class="dependent-item card-shadow mb-1 key-{{ $key }} {{ empty($item['lw-accordion']) ? 'close' : '' }}"
            style="width: 100%;">
            <input type="hidden" name="lw-accordion[]"value="{{ $item['lw-accordion'] }}">
            <input type="hidden" name="id[]" value="{{ $item['id'] }}" />
            <button class="header p-1" type="button" wire:click="switchAccordion({{ $key }})"><i
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

                    $relationship_spouse_value = $item['relationship_spouse'] ?? '';
                    $relationship_dependent_value = $item['relationship_dependent'] ?? '';
                    $relationship_spouse = $relationship_spouse_group[$relationship_spouse_value] ?? '';
                    $relationship_dependent = $relationship_dependent_group[$relationship_dependent_value] ?? '';

                    $history_flg = $item['history_flg'];
                @endphp
                @if ($item['spouse_flag'] == '1')
                    【{{ $relationship_spouse }}】&nbsp;{{ $item['last_name'] }}{{ $item['first_name'] }}
                @elseif ($item['spouse_flag'] != '1')
                    【{{ $relationship_dependent }}】&nbsp;{{ $item['last_name'] }}{{ $item['first_name'] }}
                @endif
            </button>

            <div class="dependent-content">
                <div class="dependent-container">
                    <div class="content_inner">
                        <h3>基本情報</h3>
                        <div class="two fields">
                            @if ($item['spouse_flag'] == 1)
                                <div class="field required ">
                                    <label for="relationship_spouse">続柄</label>
                                    <select class="ui fluid dropdown" name="relationship_spouse[]"
                                    wire:model.live="data.{{ $key }}.relationship_spouse" style="pointer-events: none; border: none;">
                                        <option value="">未選択</option>
                                        <option value="1">夫</option>
                                        <option value="2">妻</option>
                                        <option value="3">夫(未届)</option>
                                        <option value="4">妻(未届)</option>
                                    </select>
                                </div>
                            @else
                                <div class="field required ">
                                    <label for="relationship_dependent">続柄</label>
                                        <select class="ui fluid dropdown" name="relationship_dependent[]" 
                                        wire:model.live="data.{{ $key }}.relationship_dependent" style="pointer-events: none; border: none;">
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

                            @if ($item['spouse_flag'] == 1)
                                <div class="field ">
                                    <div class="ui checkbox mr-1">
                                        <input type="checkbox" name="spouse_flag[]" value='1' style="pointer-events: none;"
                                        @if($item['spouse_flag'] == 1) checked @endif>
                                        <label>配偶者</label>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="two fields">
                            <div class="field required ">
                                <label for="last_name">氏</label>
                                    <input type="text" name="last_name[]" maxlength="255" placeholder=""
                                    wire:model.live="data.{{ $key }}.last_name" style="border: none;" readonly>
                            </div>
                            <div class="field required ">
                                <label for="first_name">名</label>
                                    <input type="text" name="first_name[]" maxlength="255" placeholder=""
                                    wire:model.live="data.{{ $key }}.first_name" style="border: none;" readonly>
                            </div>
                        </div>

                        <div class="two fields">
                            <div class="eight wide field required ">
                                <label for="last_name_kana">氏（カナ）</label>
                                    <input type="text" name="last_name_kana[]" maxlength="255" placeholder=""
                                    wire:model.live="data.{{ $key }}.last_name_kana" style="border: none;" readonly>
                            </div>
                            <div class="field required ">
                                <label for="first_name_kana">名（カナ）</label>
                                    <input type="text" name="first_name_kana[]" maxlength="255" placeholder=""
                                    wire:model.live="data.{{ $key }}.first_name_kana" style="border: none;" readonly>
                            </div>
                        </div>
                        <div class="three fields">
                            <div class="field ">
                                <label for="sex">性別</label>
                                    <select class="ui fluid dropdown" name="sex[]"
                                    wire:model.live="data.{{ $key }}.sex" style="pointer-events: none; border: none;">
                                        <option value="">未選択</option>
                                        <option value="1">男性</option>
                                        <option value="2">女性</option>
                                    </select>
                            </div>
                            <div class="field ">
                                <label for="date_of_expiry">生年月日</label>
                                    <input type="text" name="birthday[]" placeholder=""
                                    wire:model.live="data.{{ $key }}.birthday" style="border: none;" readonly>
                            </div>
                            <div class="field">
                                <label for="age">年齢</label>
                                    <input type="text" name="age[]" placeholder=""
                                    wire:model.live="data.{{ $key }}.age" readonly style="border: none;">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field ">
                                <label for="occupation">職業</label>
                                    <input type="text" name="occupation[]" maxlength="255" placeholder=""
                                    wire:model.live="data.{{ $key }}.occupation" style="border: none;" readonly>
                            </div>
                            <div class="field ">
                                <label for="annual_income">収入</label>
                                    <input type="number" name="annual_income[]" max="9999999" min="0" placeholder=""
                                    wire:model.live="data.{{ $key }}.annual_income" style="border: none;" readonly>
                            </div>
                        </div>
                        <div class="field">
                            <div class="field ">
                                <label for="contact">連絡先（電話番号・ハイフンなし）</label>
                                    <input type="text" name="contact[]" maxlength="13" placeholder=""
                                    wire:model.live="data.{{ $key }}.contact" style="border: none;" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="content_inner">
                        <div class="fields">
                            <div class="four wide field ">
                                <label for="post_code">郵便番号</label>
                                <input type="text" name="post_code[]" placeholder=""
                                wire:model.live="data.{{ $key }}.post_code" style="border: none;" readonly>
                            </div>
                            <div class="four wide field ">
                                <label for="address_prefecture">住所（都道府県）</label>
                                <select class="ui fluid dropdown" name="address_prefecture[]"
                                wire:model.live="data.{{ $key }}.address_prefecture" style="pointer-events: none;border: none;" readonly>
                                    <option value="">未選択</option>
                                    @foreach ($prefectures as $k => $value)
                                        <option value="{{ $k }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="eight wide field ">
                                <label for="address_city">住所（市区町村）</label>
                                <input type="text" name="address_city[]" placeholder=""
                                wire:model.live="data.{{ $key }}.address_city" style="border: none;" readonly>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field ">
                                <label for="address_ward">住所（丁目・番地）</label>
                                <input type="text" name="address_ward[]" placeholder=""
                                wire:model.live="data.{{ $key }}.address_ward" style="border: none;" readonly>
                            </div>
                            <div class="field ">
                                <label for="address_apartment">住所（アパート・マンション名等）</label>
                                <input type="text" name="address_apartment[]" placeholder=""
                                wire:model.live="data.{{ $key }}.address_apartment" style="border: none;" readonly>
                            </div>
                        </div>
                        <div class="three fields">
                            <div class="field ">
                                <label for="date_of_authorisation">認定日</label>
                                    <input type="text" name="date_of_authorisation[]" placeholder=""
                                    wire:model.live="data.{{ $key }}.date_of_authorisation" style="border: none;" readonly>
                            </div>
                            <div class="field ">
                                <label for="date_of_expiry">抹消日</label>
                                    <input type="text" name="date_of_expiry[]" placeholder=""
                                    wire:model.live="data.{{ $key }}.date_of_expiry" style="border: none;" readonly>
                            </div>
                            <div class="field ">
                                <label for="dependent_type">扶養区分</label>
                                    <select class="ui fluid dropdown" name="dependent_type[]"
                                    wire:model.live="data.{{ $key }}.dependent_type" style="pointer-events: none; border: none;">
                                        <option value="">未選択</option>
                                        <option value="1">一般の控除対象扶養親族</option>
                                        <option value="2">特定扶養親族</option>
                                        <option value="3">老人扶養親族</option>
                                        <option value="4">同居老親等</option>
                                    </select>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field ">
                                <label for="mynumber_card_no">マイナンバー</label>
                                    <input type="text" name="mynumber_card_no[]" maxlength="12" placeholder=""
                                    wire:model.live="data.{{ $key }}.mynumber_card_no" style="border: none;" readonly>
                            </div>
                            <div class="field ">
                                <label for="pension_no">基礎年金番号</label>
                                    <input type="text" name="pension_no[]" maxlength="10" placeholder=""
                                    wire:model.live="data.{{ $key }}.pension_no" style="border: none;" readonly>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field ">
                                <label for="insurance_office_no">被保険者番号（雇用）</label>
                                    <input type="text" name="insurance_office_no[]" maxlength="11" placeholder=""
                                    wire:model.live="data.{{ $key }}.insurance_office_no" style="border: none;" readonly>
                            </div>
                            <div class="field ">
                                <label for="insurer_no">被保険者番号（健保）</label>
                                    <input type="text" name="insurer_no[]" maxlength="10" placeholder=""
                                    wire:model.live="data.{{ $key }}.insurer_no" style="border: none;" readonly>
                            </div>
                        </div>
                        <div class="field">
                            <div class="field ">
                                <label for="remarks">備考</label>
                                    <input type="text" name="remarks[]" maxlength="255" placeholder=""
                                    wire:model.live="data.{{ $key }}.remarks" style="border: none;" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="text-align: right;padding: 12px;" class="dependent-control">
                    <button class="ui negative button" type="button"
                        onClick="javascript:removeDependentHistory({{ $item['id'] }})">
                        この扶養者情報を削除
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach
@else
<div class="header center aligned">該当履歴なし</div>
@endif
</div>
