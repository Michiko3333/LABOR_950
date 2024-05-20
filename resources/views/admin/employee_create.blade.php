<x-layout title="{{ !isset($employee_id) ? '従業員情報登録' : '従業員情報編集' }}" useRightContent="{{ false }}">
    @slot('header')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <style type="text/css">
            .labor-data-area>.ui.horizontal.card {
                width: 100%;
                margin: 0;
            }

            .ui.fluid.dropdown {
                height: 49px;
                padding: 14px 16.8px;
                border: 2px solid rgba(34, 36, 38, .15);
            }

            .ui.dropdown.dropdown.multiple .dropdown.icon {
                padding-top: 15px;
            }

            .ui.dropdown.dropdown.multiple .remove.icon {
                padding-top: 15px;
            }

            .ui.dropdown.dropdown.multiple {
                height: auto;
                min-height: 49px;
                padding-top: 10px;
            }

            .field.tel-hyphen {
                position: relative;
            }

            .field.tel-hyphen::before {
                position: absolute;
                top: 51%;
                right: -0.4em;
                width: 0.8em;
                height: 0.8em;
                content: '-';
                font-size: 2em;
                text-align: center;
            }

            .labor-data-area {
                display: grid;
                gap: 0.8em;
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: repeat(6, auto);
                grid-template-areas:
                    "a b"
                    "a c"
                    "g c"
                    "e c"
                    "e d"
                    ". f"
                ;
            }

            .labor-data-area .ui.card.item-0 {
                grid-area: a;
            }

            .labor-data-area .ui.card.item-1 {
                grid-area: b;
            }

            .labor-data-area .ui.card.item-2 {
                grid-area: c;
            }

            .labor-data-area .ui.card.item-3 {
                grid-area: d;
            }

            .labor-data-area .ui.card.item-4 {
                grid-area: e;
            }

            .labor-data-area .ui.card.item-5 {
                grid-area: f;
            }

            .labor-data-area .ui.card.item-5 {
                grid-area: g;
            }

            @media (max-width: 1245px) {
                .labor-data-area {
                    display: grid;
                    gap: 0.8em;
                    grid-template-columns: repeat(1, 1fr);
                    grid-template-rows: repeat(5, auto);
                    grid-template-areas:
                        "a"
                        "b"
                        "c"
                        "d"
                        "e";
                }
            }
        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{ route('home.select') }}">会社・操作選択</a>
            <i class="right chevron icon divider"></i>
            <a class="section" href="{{ route('admin.index') }}">Karte管理</a>
            <i class="right chevron icon divider"></i>
            <a class="section" href="{{ route('admin.labor') }}">アカウント管理</a>
            <i class="right chevron icon divider"></i>
            @if (!isset($employee_id))
                <div class="active section">従業員情報登録</div>
            @else
                <div class="active section">従業員情報更新</div>
            @endif
        </div>

        @if (!isset($employee_id))
            <h1 class="mb-2 mt-0">従業員情報登録</h1>
        @else
            <h1 class="mb-2 mt-0">従業員情報更新</h1>
        @endif

        <form class="ui form"
            action="{{ !isset($employee_id) ? route('admin.employee_create_post') : route('admin.employee_update_post', $employee_id) }}"
            method="post">
            @csrf
            @if (session('errors'))
                <div class="ui error message">
                    <div class="header">入力エラー</div>
                    <ul class="list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (isset($employee_id))
                <input type="hidden" name="employee_id" value="{{ $employee_id }}">
            @endif


            <div class="labor-data-area">
                <div class="ui horizontal card card-shadow item-0">
                    <div class="content">
                        <h2>基本情報</h2>
                        <div class="three fields">
                            <div class="required field {{ err($errors, 'employee_no') }}">
                                <label for="employee_no">社員番号</label>
                                <input type="text" id="employee_no" name="employee_no"
                                    value="{{ old('employee_no', isset($employee_id) ? $employee->employee_no : '') }}"
                                    placeholder="E9999999">
                            </div>
                            <div class="required field {{ err($errors, 'employee_type') }}">
                                <label>社員区分</label>
                                <select class="ui fluid dropdown" name="employee_type">
                                    <option value="">未選択</option>
                                    @foreach ($employee_type as $k => $item)
                                        <option value="{{ $k }}"
                                            {{ old('employee_type') == $k || (isset($employee) && old('employee_type', $employee->employee_type) == $k)
                                                ? 'selected'
                                                : '' }}>
                                            {{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="required field {{ err($errors, 'employee_status') }}">
                                <label>社員区分</label>
                                <select class="ui fluid dropdown" name="employee_status">
                                    <option value="">未選択</option>
                                    @foreach ($employee_status_type as $k => $item)
                                        <option value="{{ $k }}"
                                            {{ old('employee_status') == $k ||
                                            (isset($employee) && old('employee_status', $employee->employee_status) == $k)
                                                ? 'selected'
                                                : '' }}>
                                            {{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="two fields m-0">
                                <div class="required field {{ err($errors, 'last_name') }}">
                                    <label for="last_name">氏</label>
                                    <input type="text" id="last_name" name="last_name"
                                        value="{{ old('last_name', isset($employee_id) ? $employee->last_name : '') }}"
                                        placeholder="田中">
                                </div>
                                <div class="required field {{ err($errors, 'first_name') }}">
                                    <label for="first_name">名</label>
                                    <input type="text" id="first_name" name="first_name"
                                        value="{{ old('first_name', isset($employee_id) ? $employee->first_name : '') }}"
                                        placeholder="太郎">
                                </div>
                            </div>
                            <div class="two fields m-0">
                                <div class="required field {{ err($errors, 'last_name_kana') }}">
                                    <label for="last_name_kana">氏（カナ）</label>
                                    <input type="text" id="last_name_kana" name="last_name_kana"
                                        value="{{ old('last_name_kana', isset($employee_id) ? $employee->last_name_kana : '') }}"
                                        placeholder="タナカ">
                                </div>
                                <div class="required field {{ err($errors, 'first_name_kana') }}">
                                    <label for="first_name_kana">名（カナ）</label>
                                    <input type="text" id="first_name_kana" name="first_name_kana"
                                        value="{{ old('first_name_kana', isset($employee_id) ? $employee->first_name_kana : '') }}"
                                        placeholder="タロウ">
                                </div>
                            </div>
                        </div>
                        <div class="three fields">
                            <div class="required field {{ err($errors, 'sex') }}">
                                <label>性別</label>
                                <select class="ui fluid dropdown" name="sex" value="{{ old('sex') }}">
                                    <option value="">未選択</option>
                                    @foreach ($sex_type as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ old('sex') == "$id" || (isset($employee) && old('sex', $employee->sex) == "$id") ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="required field {{ err($errors, 'birthday') }}">
                                <label>生年月日</label>
                                <div class="ui calendar" id="birthday_date_calendar">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" placeholder="Date" name="birthday"
                                            value="{{ old('formatted_birthday_date', isset($employee_id) ? $employee->birthday : '') }}">
                                        <input type="hidden" name="formatted_birthday_date"
                                            id="formatted_birthday_date" value="{{ old('birthday') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="required field {{ err($errors, 'country_id') }}">
                                <label>国籍</label>
                                <select class="ui fluid dropdown" name="country_id">
                                    <option value="">日本</option>
                                    @foreach ($country_type as $k => $item)
                                        <option value="{{ $k }}"
                                            {{ old('country_id') == $k || (isset($employee) && old('country_id', $employee->country_id) == $k)
                                                ? 'selected'
                                                : '' }}>
                                            {{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="three fields">
                            <div class="field">
                                <div class="ui checkbox mr-1">
                                    <input type="checkbox" name="spouse_flg" value='1'
                                    {{ (isset($employee_id) && $employee->spouse_flg == 1) || (old('spouse_flg') == '1') ? 'checked' : '' }}>
                                    <label>配偶者有</label>
                                </div>
                                <div class="ui checkbox">
                                    <input type="checkbox" name="dependent_flg" value='1'
                                    {{ (isset($employee_id) && $employee->dependent_flg == 1) || (old('dependent_flg') == '1') ? 'checked' : '' }}>
                                    <label>扶養者有</label>
                                </div>
                            </div>
                            <div class="field {{ err($errors, '') }}">
                                <label for="dependent_family_number">扶養人数</label>
                                <input type="number" id="dependent_family_number" name="dependent_family_number"
                                    value="{{ old('dependent_family_number', isset($employee_id) ? $employee->dependent_family_number : '') }}"
                                    min="0" max="99">
                            </div>
                        </div>
                        <div class="ui divider my-2"></div>
                        <div class="two fields">
                            <div class="two fields m-0">
                                <div class="field {{ err($errors, 'last_name_alphabet') }}">
                                    <label for="last_name_alphabet">氏（アルファベット）</label>
                                    <input type="text" id="last_name_alphabet" name="last_name_alphabet"
                                        value="{{ old('last_name_alphabet', isset($employee_id) ? $employee->last_name_alphabet : '') }}"
                                        placeholder="TANAKA">
                                </div>
                                <div class="field {{ err($errors, 'first_name_alphabet') }}">
                                    <label for="first_name_alphabet">名（アルファベット）</label>
                                    <input type="text" id="first_name_alphabet" name="first_name_alphabet"
                                        value="{{ old('first_name_alphabet', isset($employee_id) ? $employee->first_name_alphabet : '') }}"
                                        placeholder="TARO">
                                </div>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="two fields m-0">
                                <div class="field {{ err($errors, 'old_last_name') }}">
                                    <label for="old_last_name">旧氏</label>
                                    <input type="text" id="old_last_name" name="old_last_name"
                                        value="{{ old('old_last_name', isset($employee_id) ? $employee->old_last_name : '') }}"
                                        placeholder="鈴木">
                                </div>
                                <div class="field {{ err($errors, 'old_first_name') }}">
                                    <label for="old_first_name">旧名</label>
                                    <input type="text" id="old_first_name" name="old_first_name"
                                        value="{{ old('old_first_name', isset($employee_id) ? $employee->old_first_name : '') }}"
                                        placeholder="太郎">
                                </div>
                            </div>
                            <div class="two fields m-0">
                                <div class="field {{ err($errors, 'old_last_name_kana') }}">
                                    <label for="old_last_name_kana">旧氏（カナ）</label>
                                    <input type="text" id="old_last_name_kana" name="old_last_name_kana"
                                        value="{{ old('old_last_name_kana', isset($employee_id) ? $employee->old_last_name_kana : '') }}"
                                        placeholder="スズキ">
                                </div>
                                <div class="field {{ err($errors, 'old_first_name_kana') }}">
                                    <label for="old_first_name_kana">旧名（カナ）</label>
                                    <input type="text" id="old_first_name_kana" name="old_first_name_kana"
                                        value="{{ old('old_first_name_kana', isset($employee_id) ? $employee->old_first_name_kana : '') }}"
                                        placeholder="タロウ">
                                </div>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="two fields m-0">
                                <div class="field {{ err($errors, 'old_last_name_alphabet') }}">
                                    <label for="old_last_name_alphabet">旧氏（アルファベット）</label>
                                    <input type="text" id="old_last_name_alphabet" name="old_last_name_alphabet"
                                        value="{{ old('old_last_name_alphabet', isset($employee_id) ? $employee->old_last_name_alphabet : '') }}"
                                        placeholder="TANAKA">
                                </div>
                                <div class="field {{ err($errors, 'old_first_name_alphabet') }}">
                                    <label for="old_first_name_alphabet">旧名（アルファベット）</label>
                                    <input type="text" id="old_first_name_alphabet" name="old_first_name_alphabet"
                                        value="{{ old('old_first_name_alphabet', isset($employee_id) ? $employee->old_first_name_alphabet : '') }}"
                                        placeholder="TARO">
                                </div>
                            </div>
                            <div class="two fields m-0">
                                <div class="field {{ err($errors, 'name_common') }}">
                                    <label for="name_common">通称名</label>
                                    <input type="text" id="name_common" name="name_common"
                                        value="{{ old('name_common', isset($employee_id) ? $employee->name_common : '') }}"
                                        placeholder="田中">
                                </div>
                                <div class="field {{ err($errors, 'name_common_kana') }}">
                                    <label for="name_common_kana">通称名（カナ）</label>
                                    <input type="text" id="name_common_kana" name="name_common_kana"
                                        value="{{ old('name_common_kana', isset($employee_id) ? $employee->name_common_kana : '') }}"
                                        placeholder="タナカ">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="ui horizontal card card-shadow item-1">
                    <div class="content">
                        <h2>所属情報</h2>
                        <div class="two fields">
                            <div class="required field {{ err($errors, 'company_id') }}">
                                <label for="company_name">会社</label>
                                <input type="text" id="company_name" name="company_name" placeholder="会社名"
                                    readonly
                                    value="{{ old('company_name', isset($employee_id) ? $employee->company_name : '') }}">
                                <input type="hidden" id="company_id" name="company_id"
                                    value="{{ old('company_id', isset($employee_id) ? $employee->company_id : '') }}">
                            </div>
                            <div class="required field {{ err($errors, 'branch_id') }}">
                                <label for="branch_name">支店</label>
                                <input type="text" id="branch_name" name="branch_name" readonly
                                    value="{{ old('branch_name', isset($employee_id) ? $employee->branch_name : '') }}">
                                <input type="hidden" id="branch_id" name="branch_id"
                                    value="{{ old('branch_id', isset($employee_id) ? $employee->branch_id : '') }}">
                            </div>
                        </div>
                        <div style="text-align:right;">
                            <button class="ui button" type="button" id="company_btn">会社・支店検索</button>
                        </div>
                        <div class="field {{ err($errors, 'departments[]') }}">
                            <label for="departments[]">所属部署</label>
                            <select class="ui fluid search dropdown multiple clearable department_select"
                                multiple="" name="departments[]">
                            </select>
                        </div>
                        <div class="field {{ err($errors, 'managerial_position_id[]') }}">
                            <label for="managerial_position_id">役職</label>
                            <select class="ui fluid dropdown" name="managerial_position_id">
                                <option value="">未選択</option>
                                @foreach ($managerial_position_list as $k => $value)
                                    <option value="{{ $k }}"
                                        {{ old('managerial_position_id') == "$k" ||
                                        (isset($employee) && old('managerial_position_id', $employee->managerial_position_id) == "$k")
                                            ? 'selected'
                                            : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="ui horizontal card card-shadow item-2">
                    <div class="content">
                        <h2>連絡先情報</h2>
                        <div class="two fields">
                            <div class="ui unstackable three fields field {{ err($errors, 'tel_area_code') }}"
                                style="padding: 0;">
                                <div class="field tel-hyphen required" style="padding-right: 0.8em;">
                                    <label for="tel_area_code">電話番号</label>
                                    <input type="tel" pattern="[0-9]{1,5}" id="tel_area_code"
                                        name="tel_area_code"
                                        value="{{ old('tel_area_code', isset($employee_id) ? $employee->tel_area_code : '') }}"
                                        placeholder="市外局番" maxlength="4">
                                </div>

                                <div class="field tel-hyphen {{ err($errors, 'tel_city_code') }}">
                                    <label></label>
                                    <input type="tel" pattern="[0-9]{1,4}" id="tel_city_code"
                                        name="tel_city_code"
                                        value="{{ old('tel_city_code', isset($employee_id) ? $employee->tel_city_code : '') }}"
                                        placeholder="市内局番" maxlength="4">
                                </div>

                                <div class="field {{ err($errors, 'tel_subscriber_code') }}"
                                    style="padding-left: 0.8em;">
                                    <label></label>
                                    <input type="tel" pattern="[0-9]{4,7}" id="tel_subscriber_code"
                                        name="tel_subscriber_code"
                                        value="{{ old('tel_subscriber_code', isset($employee_id) ? $employee->tel_subscriber_code : '') }}"
                                        placeholder="加入者番号" maxlength="4">
                                </div>
                            </div>
                            <div class="field {{ err($errors, 'fax') }}">
                                <label for="fax">FAX</label>
                                <input type="email" id="fax" name="fax"
                                    value="{{ old('fax', isset($employee_id) ? $employee->fax : '') }}"
                                    placeholder="karte_xxxx@xxx.com">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="four wide field required {{ err($errors, 'post_code') }}">
                                <label for="post_code">郵便番号</label>
                                <input type="text" name="post_code"
                                    value="{{ old('post_code', isset($employee_id) ? $employee->post_code : '') }}"
                                    placeholder="">
                            </div>
                            <div class="four wide field required {{ err($errors, 'address_prefecture') }}">
                                <label for="address_prefecture">住所（都道府県）</label>
                                <select class="ui fluid dropdown" name="address_prefecture">
                                    <option value="">未選択</option>
                                    @foreach ($prefectures as $k => $value)
                                        <option value="{{ $k }}"
                                            {{ old('address_prefecture') == "$k" ||
                                            (isset($employee) && old('address_prefecture', $employee->address_prefecture) == "$k")
                                                ? 'selected'
                                                : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="eight wide field required {{ err($errors, 'address_city') }}">
                                <label for="address_city">住所（市区町村）</label>
                                <input type="text" name="address_city"
                                    value="{{ old('address_city', isset($employee_id) ? $employee->address_city : '') }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field required {{ err($errors, 'address_ward') }}">
                                <label for="address_ward">住所（丁目・番地）</label>
                                <input type="text" name="address_ward"
                                    value="{{ old('address_ward', isset($employee_id) ? $employee->address_ward : '') }}"
                                    placeholder="">
                            </div>
                            <div class="field {{ err($errors, 'address_apartment') }}">
                                <label for="address_apartment">住所（アパート・マンション名等）</label>
                                <input type="text" name="address_apartment"
                                    value="{{ old('address_apartment', isset($employee_id) ? $employee->address_apartment : '') }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field {{ err($errors, 'mail_address1') }}">
                                <label for="mail_address1">メールアドレス１</label>
                                <input type="email" id="mail_address1" name="mail_address1"
                                    value="{{ old('mail_address1', isset($employee_id) ? $employee->mail_address1 : '') }}"
                                    placeholder="karte_xxxx@xxx.com">
                            </div>
                            <div class="field {{ err($errors, 'mail_address2') }}">
                                <label for="mail_address2">メールアドレス２</label>
                                <input type="email" id="mail_address2" name="mail_address2"
                                    value="{{ old('mail_address2', isset($employee_id) ? $employee->mail_address2 : '') }}"
                                    placeholder="karte_xxxx@xxx.com">
                            </div>
                        </div>
                        <div class="ui divider my-2"></div>
                        <h3>緊急連絡先１</h3>
                        <div class="two fields">
                            <div class="field {{ err($errors, 'emergency_contact1') }}">
                                <label for="emergency_contact1">氏名</label>
                                <input type="text" id="emergency_contact1" name="emergency_contact1"
                                    value="{{ old('emergency_contact1', isset($employee_id) ? $employee->emergency_contact1 : '') }}"
                                    placeholder="田中 太郎">
                            </div>
                            <div class="field {{ err($errors, 'emergency_relationship1') }}">
                                <label for="emergency_relationship1">続柄</label>
                                <input type="text" id="emergency_relationship1" name="emergency_relationship1"
                                    value="{{ old('emergency_relationship1', isset($employee_id) ? $employee->emergency_relationship1 : '') }}"
                                    placeholder="父">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="four wide field {{ err($errors, 'emergency_post_code1') }}">
                                <label for="emergency_post_code1">郵便番号</label>
                                <input type="text" name="emergency_post_code1"
                                    value="{{ old('emergency_post_code1', isset($employee_id) ? $employee->emergency_post_code1 : '') }}"
                                    placeholder="">
                            </div>
                            <div class="four wide field {{ err($errors, 'emergency_address_prefecture1') }}">
                                <label for="emergency_address_prefecture1">住所（都道府県）</label>
                                <select class="ui fluid dropdown" name="emergency_address_prefecture1"
                                    value="{{ old('emergency_address_prefecture1', isset($employee_id) ? $employee->emergency_address_prefecture1 : '') }}">
                                    <option value="">未選択</option>
                                    @foreach ($prefectures as $k => $value)
                                        <option value="{{ $k }}"
                                            {{ old('emergency_address_prefecture1') == "$k" ||
                                            (isset($employee) && old('emergency_address_prefecture1', $employee->emergency_address_prefecture1) == "$k")
                                                ? 'selected'
                                                : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="eight wide field {{ err($errors, 'emergency_address_city1') }}">
                                <label for="emergency_address_city1">住所（市区町村）</label>
                                <input type="text" name="emergency_address_city1"
                                    value="{{ old('emergency_address_city1', isset($employee_id) ? $employee->emergency_address_city1 : '') }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field {{ err($errors, 'emergency_address_ward1') }}">
                                <label for="emergency_address_ward1">住所（丁目・番地）</label>
                                <input type="text" name="emergency_address_ward1"
                                    value="{{ old('emergency_address_ward1', isset($employee_id) ? $employee->emergency_address_ward1 : '') }}"
                                    placeholder="">
                            </div>
                            <div class="field {{ err($errors, 'emergency_address_apartment1') }}">
                                <label for="emergency_address_apartment1">住所（アパート・マンション名等）</label>
                                <input type="text" name="emergency_address_apartment1"
                                    value="{{ old('emergency_address_apartment1', isset($employee_id) ? $employee->emergency_address_apartment1 : '') }}"
                                    placeholder="">
                            </div>
                        </div>

                        <h3>緊急連絡先２</h3>
                        <div class="two fields">
                            <div class="field {{ err($errors, 'emergency_contact2') }}">
                                <label for="emergency_contact2">氏名</label>
                                <input type="text" id="emergency_contact2" name="emergency_contact2"
                                    value="{{ old('emergency_contact2', isset($employee_id) ? $employee->emergency_contact2 : '') }}"
                                    placeholder="田中 太郎">
                            </div>
                            <div class="field {{ err($errors, 'emergency_relationship2') }}">
                                <label for="emergency_relationship2">続柄</label>
                                <input type="text" id="emergency_relationship2" name="emergency_relationship2"
                                    value="{{ old('emergency_relationship2', isset($employee_id) ? $employee->emergency_relationship2 : '') }}"
                                    placeholder="父">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="four wide field {{ err($errors, 'emergency_post_code2') }}">
                                <label for="emergency_post_code2">郵便番号</label>
                                <input type="text" name="emergency_post_code2"
                                    value="{{ old('emergency_post_code2', isset($employee_id) ? $employee->emergency_post_code2 : '') }}"
                                    placeholder="">
                            </div>
                            <div class="four wide field {{ err($errors, 'emergency_address_prefecture2') }}">
                                <label for="emergency_address_prefecture2">住所（都道府県）</label>
                                <select class="ui fluid dropdown" name="emergency_address_prefecture2"
                                    value="{{ old('emergency_address_prefecture2', isset($employee_id) ? $employee->emergency_address_prefecture2 : '') }}">
                                    <option value="">未選択</option>
                                    @foreach ($prefectures as $k => $value)
                                        <option value="{{ $k }}"
                                            {{ old('emergency_address_prefecture2') == "$k" ||
                                            (isset($employee) && old('emergency_address_prefecture2', $employee->emergency_address_prefecture2) == "$k")
                                                ? 'selected'
                                                : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="eight wide field {{ err($errors, 'emergency_address_city2') }}">
                                <label for="emergency_address_city2">住所（市区町村）</label>
                                <input type="text" name="emergency_address_city2"
                                    value="{{ old('emergency_address_city2', isset($employee_id) ? $employee->emergency_address_city2 : '') }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field {{ err($errors, 'emergency_address_ward2') }}">
                                <label for="emergency_address_ward2">住所（丁目・番地）</label>
                                <input type="text" name="emergency_address_ward2"
                                    value="{{ old('emergency_address_ward2', isset($employee_id) ? $employee->emergency_address_ward2 : '') }}"
                                    placeholder="">
                            </div>
                            <div class="field {{ err($errors, 'emergency_address_apartment2') }}">
                                <label for="emergency_address_apartment2">住所（アパート・マンション名等）</label>
                                <input type="text" name="emergency_address_apartment2"
                                    value="{{ old('emergency_address_apartment2', isset($employee_id) ? $employee->emergency_address_apartment2 : '') }}"
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui horizontal card card-shadow item-3">
                    <div class="content">
                        <h2>契約情報</h2>
                        <div class="three fields">
                            <div class="field inline ml-0 {{ err($errors, 'contract_period_flg') }}">
                                <label>雇用契約期間の有無</label>
                                <div class="mt-1">
                                    <div class="ui radio checkbox field mr-2 mt-0">
                                        <input type="radio" name="contract_period_flg" checked="checked" value="0"
                                        {{ (isset($employee_id) && $employee->contract_period_flg == 0) || (old('contract_period_flg') == '0') ? 'checked' : '' }}>
                                        <label>無</label>
                                    </div>
                                    <div class="ui radio checkbox field mt-0">
                                        <input type="radio" name="contract_period_flg" value="1"
                                        {{ (isset($employee_id) && $employee->contract_period_flg == 1) || (old('contract_period_flg') == '1') ? 'checked' : '' }}>
                                        <label>有</label>
                                    </div>
                                </div>
                            </div>
                            <div class="field inline ml-0 {{ err($errors, 'contract_renewal_flg') }}">
                                <label>契約更新条項の有無</label>
                                <div class="mt-1">
                                    <div class="ui radio checkbox field mr-2 mt-0">
                                        <input type="radio" name="contract_renewal_flg" checked="checked" value="0"
                                        {{ (isset($employee_id) && $employee->contract_renewal_flg == 0) || (old('contract_renewal_flg') == '0') ? 'checked' : '' }}>
                                        <label>無</label>
                                    </div>
                                    <div class="ui radio checkbox field mt-0">
                                        <input type="radio" name="contract_renewal_flg" value="1"
                                        {{ (isset($employee_id) && $employee->contract_renewal_flg == 1) || (old('contract_renewal_flg') == '1') ? 'checked' : '' }}>
                                        <label>有</label>
                                    </div>
                                </div>
                            </div>
                            <div class="field inline ml-0 {{ err($errors, 'resignation_letter_request_flg') }}">
                                <label>離職票の交付希望の有無</label>
                                <div class="mt-1">
                                    <div class="ui radio checkbox field mr-2 mt-0">
                                        <input type="radio" name="resignation_letter_request_flg" checked="checked" value="0"
                                        {{ (isset($employee_id) && $employee->resignation_letter_request_flg == 0) || (old('resignation_letter_request_flg') == '0') ? 'checked' : '' }}>
                                        <label>無</label>
                                    </div>
                                    <div class="ui radio checkbox field mt-0">
                                        <input type="radio" name="resignation_letter_request_flg" value="1"
                                        {{ (isset($employee_id) && $employee->resignation_letter_request_flg == 1) || (old('resignation_letter_request_flg') == '1') ? 'checked' : '' }}>
                                        <label>有</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field {{ err($errors, 'formatted_contract_start_date') }}">
                                <label>雇用契約開始日</label>
                                <div class="ui calendar" id="contract_start_date_calendar">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" placeholder="Date" name="contract_start_date"
                                            value="{{ old('formatted_contract_start_date', isset($employee_id) ? $employee->contract_start_date : '') }}">
                                        <input type="hidden" name="formatted_contract_start_date"
                                            id="formatted_contract_start_date"
                                            value="{{ old('contract_start_date') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="field {{ err($errors, 'formatted_contract_end_date') }}">
                                <label>雇用契約終了日</label>
                                <div class="ui calendar" id="contract_end_date_calendar">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" placeholder="Date" name="contract_end_date"
                                            value="{{ old('formatted_contract_end_date', isset($employee_id) ? $employee->contract_end_date : '') }}">
                                        <input type="hidden" name="formatted_contract_end_date"
                                            id="formatted_contract_end_date" value="{{ old('contract_end_date') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="three fields">
                            <div class="field {{ err($errors, 'formatted_contract_start_date') }}">
                                <label>入社日</label>
                                <div class="ui calendar" id="hired_date_calendar">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" placeholder="Date" name="hired_date"
                                            value="{{ old('formatted_hired_date', isset($employee_id) ? $employee->hired_date : '') }}">
                                        <input type="hidden" name="formatted_hired_date" id="formatted_hired_date"
                                            value="{{ old('hired_date') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="field {{ err($errors, 'formatted_retirement_date') }}">
                                <label>離職日</label>
                                <div class="ui calendar" id="retirement_date_calendar">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" placeholder="Date" name="retirement_date"
                                            value="{{ old('formatted_retirement_date', isset($employee_id) ? $employee->retirement_date : '') }}">
                                        <input type="hidden" name="formatted_retirement_date"
                                            id="formatted_retirement_date" value="{{ old('retirement_date') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="field {{ err($errors, 'formatted_intended_retirement_date') }}">
                                <label>離職予定日</label>
                                <div class="ui calendar" id="intended_retirement_date">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" placeholder="Date" name="intended_retirement_date"
                                            value="{{ old('formatted_intended_retirement_date', isset($employee_id) ? $employee->intended_retirement_date : '') }}">
                                        <input type="hidden" name="formatted_intended_retirement_date"
                                            id="formatted_intended_retirement_date"
                                            value="{{ old('intended_retirement_date') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="three fields">
                            <div class="field {{ err($errors, 'insurance_loss_reason') }}">
                                <label for="insurance_loss_reason">喪失原因</label>
                                <select class="ui fluid dropdown" name="insurance_loss_reason"
                                    value="{{ old('insurance_loss_reason', isset($employee_id) ? $employee->insurance_loss_reason : '') }}">
                                    <option value="">未選択</option>
                                    @foreach ($insurance_loss_reason as $k => $value)
                                        <option value="{{ $k }}"
                                            {{ old('insurance_loss_reason') == "$k" ||
                                            (isset($employee) && old('insurance_loss_reason', $employee->insurance_loss_reason) == "$k")
                                                ? 'selected'
                                                : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field {{ err($errors, 'over_retired_insurance_loss_reason') }}">
                                <label for="over_retired_insurance_loss_reason">喪失原因（70歳以上）</label>
                                <select class="ui fluid dropdown" name="over_retired_insurance_loss_reason"
                                    value="{{ old('over_retired_insurance_loss_reason', isset($employee_id) ? $employee->over_retired_insurance_loss_reason : '') }}">
                                    <option value="">未選択</option>
                                    @foreach ($over_retired_insurance_loss_reason as $k => $value)
                                        <option value="{{ $k }}"
                                            {{ old('over_retired_insurance_loss_reason') == "$k" ||
                                            (isset($employee) && old('over_retired_insurance_loss_reason', $employee->over_retired_insurance_loss_reason) == "$k")
                                                ? 'selected'
                                                : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field {{ err($errors, 'formatted_passed_away_date') }}">
                                <label>死亡日</label>
                                <div class="ui calendar" id="passed_away_date">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" placeholder="Date" name="passed_away_date"
                                            value="{{ old('formatted_passed_away_date', isset($employee_id) ? $employee->passed_away_date : '') }}">
                                        <input type="hidden" name="formatted_passed_away_date"
                                            id="formatted_passed_away_date" value="{{ old('passed_away_date') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field {{ err($errors, 'occupation_type') }}">
                                <label for="occupation_type">職種</label>
                                <select class="ui fluid dropdown" name="occupation_type"
                                    value="{{ old('occupation_type', isset($employee_id) ? $employee->occupation_type : '') }}">
                                    <option value="">未選択</option>
                                    @foreach ($occupation_type as $k => $value)
                                        <option value="{{ $k }}"
                                            {{ old('occupation_type') == "$k" ||
                                            (isset($employee) && old('occupation_type', $employee->occupation_type) == "$k")
                                                ? 'selected'
                                                : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field">
                                <div class="ui checkbox field mt-3 {{ err($errors, 'external_advisor_flg') }}">
                                    <input type="checkbox" name="external_advisor_flg" value='1'
                                    {{ (isset($employee_id) && $employee->external_advisor_flg == 1) || (old('external_advisor_flg') == '1') ? 'checked' : '' }}>
                                    <label>外部顧問</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui horizontal card card-shadow item-4">
                    <div class="content">
                        <h2>保険情報</h2>
                        <div class="two fields">
                            <div class="field {{ err($errors, 'mynumber_card_no') }}">
                                <label for="mynumber_card_no">マイナンバーカード番号</label>
                                <input type="text" id="mynumber_card_no" name="mynumber_card_no"
                                    value="{{ old('mynumber_card_no', isset($employee_id) ? $employee->mynumber_card_no : '') }}"
                                    placeholder="AB12345678CD">
                            </div>
                            <div class="field {{ err($errors, 'social_insurance_no') }}">
                                <label for="social_insurance_no">社会保険番号</label>
                                <input type="text" id="social_insurance_no" name="social_insurance_no"
                                    value="{{ old('social_insurance_no', isset($employee_id) ? $employee->social_insurance_no : '') }}"
                                    placeholder="AB123456">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field {{ err($errors, 'pension_office_no') }}">
                                <label for="pension_office_no">事業所番号（厚生年金）</label>
                                <input type="text" id="pension_office_no" name="pension_office_no"
                                    value="{{ old('pension_office_no', isset($employee_id) ? $employee->pension_office_no : '') }}"
                                    placeholder="01234">
                            </div>
                            <div class="field {{ err($errors, 'pension_office_reference_no') }}">
                                <label for="pension_office_reference_no">事業所整理番号（厚生年金）</label>
                                <input type="text" id="pension_office_reference_no"
                                    name="pension_office_reference_no"
                                    value="{{ old('pension_office_reference_no', isset($employee_id) ? $employee->pension_office_reference_no : '') }}"
                                    placeholder="001-イロハ">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field {{ err($errors, 'pension_no') }}">
                                <label for="pension_no">基礎年金番号</label>
                                <input type="text" id="pension_no" name="pension_no"
                                    value="{{ old('pension_no', isset($employee_id) ? $employee->pension_no : '') }}"
                                    placeholder="111122223333">
                            </div>
                        </div>
                        <div class="ui divider my-2"></div>
                        <div class="two fields">
                            <div class="field {{ err($errors, 'labor_insurance_type') }}">
                                <label for="labor_insurance_type">労災保険区分</label>
                                <select class="ui fluid dropdown" name="labor_insurance_type"
                                    value="{{ old('labor_insurance_type', isset($employee_id) ? $employee->labor_insurance_type : '') }}">
                                    <option value="">未選択</option>
                                    @foreach ($labor_insurance_type as $k => $value)
                                        <option value="{{ $k }}"
                                            {{ old('labor_insurance_type') == "$k" ||
                                            (isset($employee) && old('labor_insurance_type', $employee->labor_insurance_type) == "$k")
                                                ? 'selected'
                                                : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field {{ err($errors, 'employment_insurance_type') }}">
                                <label for="employment_insurance_type">雇用保険区分</label>
                                <select class="ui fluid dropdown" name="employment_insurance_type"
                                    value="{{ old('employment_insurance_type', isset($employee_id) ? $employee->employment_insurance_type : '') }}">
                                    <option value="">未選択</option>
                                    @foreach ($employment_insurance_type as $k => $value)
                                        <option value="{{ $k }}"
                                            {{ old('employment_insurance_type') == "$k" ||
                                            (isset($employee) && old('employment_insurance_type', $employee->employment_insurance_type) == "$k")
                                                ? 'selected'
                                                : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field {{ err($errors, 'insurance_office_reference_no') }}">
                                <label for="insurance_office_reference_no">事業所整理番号（保険）</label>
                                <input type="text" id="insurance_office_reference_no"
                                    name="insurance_office_reference_no"
                                    value="{{ old('insurance_office_reference_no', isset($employee_id) ? $employee->insurance_office_reference_no : '') }}"
                                    placeholder="">
                            </div>
                            <div class="field {{ err($errors, 'employment_insurance_office_no') }}">
                                <label for="employment_insurance_office_no">事業所番号（雇用保険）</label>
                                <input type="text" id="employment_insurance_office_no"
                                    name="employment_insurance_office_no"
                                    value="{{ old('employment_insurance_office_no', isset($employee_id) ? $employee->employment_insurance_office_no : '') }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="ui divider my-2"></div>
                        <div class="three fields">
                            <div class="field {{ err($errors, 'insurer_no') }}">
                                <label for="insurer_no">保険者番号</label>
                                <input type="text" id="insurer_no" name="insurer_no"
                                    value="{{ old('insurer_no', isset($employee_id) ? $employee->insurer_no : '') }}"
                                    placeholder="0123456789">
                            </div>
                            <div class="field {{ err($errors, 'employment_insurance_applied_date_calendar') }}">
                                <label>雇用保険届出日</label>
                                <div class="ui calendar" id="employment_insurance_applied_date_calendar">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" placeholder="Date" name="employment_insurance_applied_date"
                                            value="{{ old('employment_insurance_applied_date', isset($employee_id) ? $employee->employment_insurance_applied_date : '') }}">
                                        <input type="hidden" name="employment_insurance_applied_date"
                                            id="employment_insurance_applied_date"
                                            value="{{ old('employment_insurance_applied_date') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="field {{ err($errors, 'employment_insured_date_calendar') }}">
                                <label>雇用保険届出日</label>
                                <div class="ui calendar" id="employment_insured_date_calendar">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" placeholder="Date" name="employment_insured_date"
                                            value="{{ old('employment_insured_date', isset($employee_id) ? $employee->employment_insured_date : '') }}">
                                        <input type="hidden" name="employment_insured_date"
                                            id="employment_insured_date"
                                            value="{{ old('employment_insured_date') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui horizontal card card-shadow item-5">
                    <div class="content">
                        <h2>外国籍記入欄</h2>
                        <div class="three fields">
                            <div class="field {{ err($errors, 'residence_card_no') }}">
                                <label for="residence_card_no">在留カード番号</label>
                                <input type="text" pattern="^[0-9A-Z]{1,12}$" id="residence_card_no"
                                    name="residence_card_no"
                                    value="{{ old('residence_card_no', isset($employee_id) ? $employee->residence_card_no : '') }}"
                                    placeholder="AB12345678CD">
                            </div>
                            <div class="field {{ err($errors, 'residential_status_unknown_reason') }}">
                                <label>在留資格不明理由</label>
                                <input type="text" id="residential_status_unknown_reason"
                                    name="residential_status_unknown_reason"
                                    value="{{ old('residential_status_unknown_reason', isset($employee_id) ? $employee->residential_status_unknown_reason : '') }}"
                                    placeholder="">
                            </div>
                            <div class="field">
                                <div
                                    class="ui checkbox field mt-3 {{ err($errors, 'unauthorized_activities_permission_flg') }}">
                                    <input type="checkbox" name="unauthorized_activities_permission_flg" value='1'
                                    {{ (isset($employee_id) && $employee->unauthorized_activities_permission_flg == 1) || (old('unauthorized_activities_permission_flg') == '1') ? 'checked' : '' }}>
                                    <label>資格外活動許可</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (!isset($employee_id))
                    <div class="ui horizontal card card-shadow item-6">
                        <div class="content">
                            <h2>ログイン情報</h2>
                            <div class="two fields">
                                <div class="required field {{ err($errors, 'user_email') }}">
                                    <label for="user_email">メールアドレス</label>
                                    <input type="text" id="user_email" name="user_email"
                                        placeholder="karte_xxxx@xxx.com"
                                        value="{{ old('user_email', isset($employee_id) ? $employee->user_email : '') }}">
                                </div>
                                <div class="required field {{ err($errors, 'user_pass') }}">
                                    <label for="user_pass">パスワード</label>
                                    <input type="password" id="user_pass" name="user_pass"
                                        value="{{ old('user_pass', isset($employee_id) ? $employee->user_pass : '') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="my-4" style="text-align: right; margin-right: 1em;">
                <a class="ui button negative basic" href="{{ route('admin.labor') }}"
                    style="width: 200px;">キャンセル</a>
                @if (!isset($employee_id))
                    <button class="ui button primary" type="submit" style="width: 200px;">登録</button>
                @else
                    <button class="ui button primary" type="submit" style="width: 200px;">更新</button>
                @endif
            </div>
        </form>

    </section>

    <!-- 会社検索モーダル -->
    <x-search-company-modal id="company_select" selectorName="#company_name" selectorId="#company_id"
        selectorBrName="#branch_name" selectorBrId="#branch_id" withBranch="true" division="2" />
    <script type="module" src="{{ asset('/js/search-company-modal.js') }}"></script>
    <script type="module">
        $('.ui.dropdown.company')
            .dropdown({
                apiSettings: {
                    // this url just returns a list of tags (with API response expected above)
                    //url: ''
                },
                filterRemoteData: true
            });
        $('#company_btn').click(_ => {
            $('#company_select').modal({
                blurring: true
            }).modal('show');
        });
    </script>

    <!-- カレンダー -->
    <script type="module">
        $(document).ready(function() {
            $('.ui.calendar').calendar({
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
            $('.ui.dropdown.dropdown.multiple').dropdown({});

            function getDepartmentList(id, first = false) {
                $.ajax({
                        url: '{{ route('admin.get_departments') }}',
                        data: {
                            company_id: id
                        },
                        type: 'post'
                    })
                    .done((data) => {
                        $('select[name="departments[]"]').empty();
                        data.forEach(element => {
                            $('<option>').attr({
                                value: element.id
                            }).text(element.name).appendTo('select[name="departments[]"]');
                        });
                        $('.ui.dropdown.dropdown.multiple').dropdown('clear');

                        if (first) {
                            const def = @json(old('departments', $departments));
                            def.forEach(v => {
                                let a = $('select[name="departments[]"] option[value=' + v +
                                    ']').prop(
                                    'selected', true);
                            });

                        }
                    });
            }

            function getPositionList(id, first = false) {
                $.ajax({
                        url: '{{ route('admin.get_position') }}',
                        data: {
                            company_id: id
                        },
                        type: 'post'
                    })
                    .done((data) => {
                        $('select[name="managerial_position_id"]').empty();
                        data = [{
                            id: '',
                            name: '未選択'
                        }, ...data];
                        data.forEach(element => {
                            $('<option>').attr({
                                value: element.id
                            }).text(element.name).appendTo('select[name="managerial_position_id"]');
                        });
                        $('.ui.dropdown.dropdown.multiple').dropdown('clear');

                        if (first) {
                            //const def = @json($managerial_position_list);
                            const v = "{{ old('managerial_position_id', isset($employee_id) ? $employee->managerial_position_id : '0') }}";
                            if (v > 0) {
                                $('select[name="managerial_position_id"] option[value=' + v +
                                    ']').prop(
                                    'selected', true);
                            }
                        }
                    });
            }
            const company_id = $('input[name=company_id]').val();
            if (company_id) {
                getDepartmentList(company_id, true);
                getPositionList(company_id, true);
            }
            addEventCompanyModal((data) => {
                getDepartmentList(data['id']);
                getPositionList(data['id']);
            });
        });
    </script>
</x-layout>
