<x-layout title="会社基本情報">
    @slot('header')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <style type="text/css">
            .calendar-container {
                display: flex;
                justify-content: space-between;
            }


            .ui.fluid.dropdown {
                height: 49px;
                padding: 14px 16.8px;
                border: 2px solid rgba(34, 36, 38, .15);
            }

            .ui.styled.accordion .content {
                display: flex;
                padding: 14px;
                gap: 14px;
            }

            .ui.styled.accordion .content .content_inner {
                width: 49.9%;
            }

            .ui.styled.accordion .active.title {
                background: white;
            }

            #company_edit {
                display: flex;
                justify-content: space-between;
            }

            #company_edit .flex-inner {
                width: 49%;
            }

            .company_division_selector {
                min-height: 48px;
            }

            .company_division_selector input[type=radio] {
                display: none;
            }

            .company_division_selector input[type=radio]+label {
                display: inline-block;
                cursor: pointer;
                border-radius: 4px;
            }

            .company_division_selector input[type="radio"]:checked+label {
                background: var(--color-blue);
                color: white;
                font-weight: bold;
            }

            .company_division_selector input[type="radio"]+label:hover {
                opacity: 0.9;
            }

            .company_division_selector .label {
                padding: 1em 1.5em;
                /* ラベル外側の余白を指定する */
                background: #2828284d;
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

            button.append-branch {
                width: 100%;
                padding: 1em;
                color: gray;
                font-weight: bold;
                border: solid 2px silver;
                border-radius: 4px;
                background: transparent;
                cursor: pointer;
            }

            button.append-branch:hover {
                color: #9e9e9e;
                border: solid 2px #cfcfcf;
            }

            button.append-branch:active {
                color: #6b6b6b;
                border: solid 2px #adadad;
            }

            #bank_name {
                resize: none;
                height: 195px;
            }

            .company-data-area>.ui.horizontal.card {
                width: 100%;
                margin: 0;
            }

            .company-data-area {
                display: grid;
                gap: 0.8em;
                grid-template-columns: repeat(4, auto);
                grid-template-rows: repeat(5, auto);
            }

            .company-data-area .ui.card.item-0 {
                grid-area: 1 / 1 / 4 / 4;
                min-width: 450px;
            }

            .company-data-area .ui.card.item-1 {
                grid-area: 3 / 4 / 4 / 5;
            }

            .company-data-area .ui.card.item-2 {
                grid-area: 1 / 4 / 2 / 5;
            }

            .company-data-area .ui.card.item-3 {
                grid-area: 2 / 4 / 3 / 5;
            }

            .company-data-area .ui.card.item-4 {
                grid-area: 4 / 1 / 5 / 3;
            }

            .company-data-area .ui.card.item-5 {
                grid-area: 5 / 1 / 6 / 3;
            }

            .company-data-area .ui.card.item-6 {
                grid-area: 4 / 3 / 5 / 5;
            }

            .company-data-area label {
                font-size: 1em !important;
            }

            .company-data-area label {
                font-size: 1em !important;
            }

            a.download-link:hover {
                text-decoration: underline;
            }

            a.delete-link {
                color: var(--color-red);
                margin-left: 0.5rem;
            }

            a.delete-link:hover {
                color: var(--color-red);
                text-decoration: underline;
            }

            @media (max-width: 820px) {
                .company-data-area .ui.card.item-0 {
                    grid-area: 1 / 1 / 2 / 4;
                    min-width: 450px;
                }

                .company-data-area .ui.card.item-1 {
                    grid-area: 4 / 1 / 4 / 4;
                }

                .company-data-area .ui.card.item-2 {
                    grid-area: 2 / 1 / 2 / 4;
                }

                .company-data-area .ui.card.item-3 {
                    grid-area: 3 / 1 / 3 / 4;
                }

                .company-data-area .ui.card.item-4 {
                    grid-area: 5 / 1 / 5 / 4;
                }

                .company-data-area .ui.card.item-5 {
                    grid-area: 7 / 1 / 7 / 4;
                }

                .company-data-area .ui.card.item-6 {
                    grid-area: 6 / 1 / 6 / 4;
                }

                .ui.styled.accordion .content {
                    flex-direction: column;
                }

                .ui.styled.accordion .content .content_inner {
                    width: 100%;
                }

            }

            @media (max-width: 500px) {
                .company-data-area .ui.card.item-0 {
                    min-width: unset;
                }

                .company-data-area .ui.card.item-1 {
                    min-width: unset;
                }
            }
        </style>
    @endslot

    @php

    @endphp
    <section class="content">
        <div class="ui huge breadcrumb mb-2">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">会社基本情報</div>
        </div>

        <h1 class="mb-2 mt-0">会社基本情報変更</h1>
        <form class="ui form" action="{{ route('company_edit_post') }}" method="post" enctype="multipart/form-data">
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
            <div class="company-data-area">
                <div class="ui horizontal card card-shadow item-0">
                    <div class="content">
                        <h2>基本情報</h2>
                        <div class="two fields">
                            <div class="required field {{ err($errors, 'name') }}">
                                <label for="name">会社名</label>
                                <input type="text" id="name" name="name"
                                    value="{{ old('name', $currentCompany->name) }}" placeholder="株式会社Karte"
                                    autocomplete="off">
                                <div class="ui error message"></div>
                            </div>

                            <div class="required field {{ err($errors, 'name_kana') }}">
                                <label for="name_kana">会社名（カナ）</label>
                                @if (!isset($currentCompany->id))
                                    <input type="text" id="name_kana" name="name_kana" value="{{ old('name_kana') }}"
                                        placeholder="カブシキガイシャカルテ" autocomplete="off">
                                @else
                                    <input type="text" id="name_kana" name="name_kana"
                                        value="{{ old('name_kana', $currentCompany->name_kana) }}"
                                        placeholder="カブシキガイシャカルテ" autocomplete="off">
                                @endif

                            </div>
                        </div>
                        <div class="ui unstackable two fields">
                            <div class="field {{ err($errors, 'name_en') }}">
                                <label for="name_en">会社名（英語表記）</label>
                                @if (!isset($currentCompany->id))
                                    <input type="text" id="name_en" name="name_en" value="{{ old('name_en') }}"
                                        placeholder="Karte.co.ltd" autocomplete="off">
                                @else
                                    <input type="text" id="name_en" name="name_en"
                                        value="{{ old('name_en', $currentCompany->name_en) }}"
                                        placeholder="Karte.co.ltd" autocomplete="off">
                                @endif

                            </div>
                            <div class="field {{ err($errors, 'name_abbreviation') }}">
                                <label for="name_abbreviation">会社名（略称表記）</label>
                                @if (!isset($currentCompany->id))
                                    <input type="text" id="name_abbreviation" name="name_abbreviation"
                                        value="{{ old('name_abbreviation') }}" placeholder="KRT" autocomplete="off">
                                @else
                                    <input type="text" id="name_abbreviation" name="name_abbreviation"
                                        value="{{ old('name_abbreviation', $currentCompany->name_abbreviation) }}"
                                        placeholder="KRT" autocomplete="off">
                                @endif
                            </div>
                        </div>
                        <div class="field">
                            <div class="two fields">
                                <div class="field required {{ err($errors, 'representative') }}">
                                    <label for="representative">代表者</label>
                                    @if (!isset($currentCompany->id))
                                        <input type="text" id="representative" name="representative"
                                            value="{{ old('representative') }}" placeholder="" autocomplete="off">
                                    @else
                                        <input type="text" id="representative" name="representative"
                                            value="{{ old('representative', $currentCompany->representative) }}"
                                            placeholder="" autocomplete="off">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="equal width fields">
                            <div class="required field {{ err($errors, 'company_no') }}">
                                <label for="company_no">法人番号</label>
                                @if (!isset($currentCompany->id))
                                    <input type="text" id="company_no" name="company_no"
                                        value="{{ old('company_no') }}" placeholder="" autocomplete="off">
                                @else
                                    <input type="text" id="company_no" name="company_no"
                                        value="{{ old('company_no', $currentCompany->company_no) }}" placeholder=""
                                        autocomplete="off">
                                @endif

                            </div>
                            <div class="required field {{ err($errors, 'company_type_id') }}">
                                <label>法人格</label>
                                <select class="ui fluid dropdown" name="company_type_id"
                                    value="{{ old('company_type_id') }}">
                                    <option value="">未選択</option>
                                    @foreach ($company_type as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('company_type_id') == $item->id ||
                                            (isset($currentCompany) && old('company_type_id', $currentCompany->company_type_id) == $item->id)
                                                ? 'selected'
                                                : '' }}>
                                            {{ empty($item->example) ? $item->name : $item->name . '（' . $item->example . '）' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field {{ err($errors, 'license_no') }}">
                                <label for="license_no">許認可番号</label>
                                @if (!isset($currentCompany->id))
                                    <input type="text" id="license_no" name="license_no"
                                        value="{{ old('license_no') }}" placeholder="" autocomplete="off">
                                @else
                                    <input type="text" id="license_no" name="license_no"
                                        value="{{ old('license_no', $currentCompany->license_no) }}" placeholder=""
                                        autocomplete="off">
                                @endif
                            </div>
                        </div>

                        <div class="two fields">
                            <div class="required field {{ err($errors, 'business_type') }}">
                                <label>企業区分
                                    <i class="question circle outline link icon" id="info-icon"></i>
                                </label>
                                <select class="ui fluid dropdown" name="business_type"
                                    value="{{ old('business_type') }}">
                                    <option value="">未選択</option>
                                    @foreach ($businessTypes as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ old('business_type') == "$id" ||
                                            (isset($currentCompany->business_type) && old('business_type', $currentCompany->business_type) == "$id")
                                                ? 'selected'
                                                : '' }}>
                                            {{ $name }}
                                        </option>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ui modal" id="info-modal">
                                <div class="basic header center aligned" style="padding:1.25rem 1.5rem 0">中小企業区分</div>
                                <div class="content">
                                    <table class="ui celled table center aligned">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">業種</th>
                                                <th colspan="2">中小企業</th>
                                                <th colspan="1">小規模企業者</th>
                                            </tr>
                                            <tr>
                                                <th style="border-left:1px solid rgba(34,36,38,.1)">資本金額</th>
                                                <th>常時使用する従業員数</th>
                                                <th>常時使用する従業員数</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>小売・飲食業</td>
                                                <td>5,000万円以下</td>
                                                <td>50人以下</td>
                                                <td>5人以下</td>
                                            </tr>
                                            <tr>
                                                <td>サービス業</td>
                                                <td>5,000万円以下</td>
                                                <td>100人以下</td>
                                                <td>5人以下</td>
                                            </tr>
                                            <tr>
                                                <td>卸売業</td>
                                                <td>1億円以下</td>
                                                <td>100人以下</td>
                                                <td>5人以下</td>
                                            </tr>
                                            <tr>
                                                <td>製造/建設/運輸　その他業種</td>
                                                <td>3億円以下</td>
                                                <td>300人以下</td>
                                                <td>20人以下</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="ui message mt-2">
                                        <div class="header">
                                            資本金・従業員数が上記の数字を超えた場合大企業という区分になる。
                                        </div>
                                        <p></p>
                                        <p>※これらの区分は日常業務にて必要とはならないが、法律上の区分（税法・下請法等）や国の制度を活用する際に区分される
                                            際に必要となる。例えば、税法面において中小企業の場合は、大企業に比べ法人税の軽減税率、交際費の一部損金算入、
                                            留保金課税の免除、欠損金の繰戻還付制度等の税法上の優遇措置がある。また、助成金や補助金を取得する際に、
                                            助成率や補助率が変わる等。</p>
                                        <p>※「業種区分は産業分類」を「資本金は会計データー」を「従業員数は従業員名簿」をマスターデーターとして紐づけ、
                                            大・中・小を区分する。</p>
                                    </div>
                                </div>
                                <div class="basic actions">
                                    <div class="ui negative button">戻る</div>
                                </div>
                            </div>
                            <div class="field  {{ err($errors, 'listed_type') }}">
                                <label>上場区分</label>
                                <select class="ui fluid dropdown" name="listed_type"
                                    value="{{ old('listed_type') }}">
                                    <option value="">未選択</option>
                                    @foreach ($company_listed_type as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ old('listed_type') == "$id" ||
                                            (isset($currentCompany->listed_type) && old('listed_type', $currentCompany->listed_type) == "$id")
                                                ? 'selected'
                                                : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field {{ err($errors, 'industry_type[]') }}">
                            <label for="industry_type[]">業種コード<span class="ml-1"><a href="https://www.e-stat.go.jp"
                                        target=”_blank”>参考URL：https://www.e-stat.go.jp</a></span></label>
                            <select id="industry_type_dropdown"
                                class="ui fluid search dropdown multiple industry_type_select" multiple=""
                                name="industry_type[]">
                            </select>
                        </div>
                        <div style="text-align:right;">
                            <button class="ui button hidden-readonly" type="button"
                                id="industry_type_btn">業種選択</button>
                        </div>
                        <div class="field">
                            <div class="field {{ err($errors, 'stock_code') }}">
                                <label for="stock_code">証券コード</label>
                                @if (!isset($currentCompany->id))
                                    <input type="text" id="stock_code" name="stock_code"
                                        value="{{ old('stock_code') }}" placeholder="非上場は記入しない" autocomplete="off">
                                @else
                                    <input type="text" id="stock_code" name="stock_code"
                                        value="{{ old('stock_code', $currentCompany->stock_code) }}"
                                        placeholder="非上場は記入しない" autocomplete="off">
                                @endif
                            </div>
                        </div>
                        <div class="required field {{ err($errors, 'purpose') }}">
                            <label for="purpose">事業目的</label>
                            @if (!isset($currentCompany->id))
                                <input type="text" id="purpose" name="purpose" value="{{ old('purpose') }}"
                                    placeholder="ハードウェア・ソフトウェアの企画、開発、制作、販売及び保守" autocomplete="off">
                            @else
                                <input type="text" id="purpose" name="purpose"
                                    value="{{ old('purpose', $currentCompany->purpose) }}"
                                    placeholder="ハードウェア・ソフトウェアの企画、開発、制作、販売及び保守" autocomplete="off">
                            @endif
                        </div>
                        <div class="three fields">
                            <div class="field">
                                <label for="start_month_of_year">起算日（年の始まり）</label>
                                <div class="ui right labeled input">
                                    <select class="ui fluid dropdown" name="start_month_of_year"
                                        value="{{ old('start_month_of_year', $currentCompany->start_month_of_year) }}">
                                        @for ($i = 1; $i < 13; $i++)
                                            <option value="{{ $i }}"
                                                {{ old('start_month_of_year', $currentCompany->start_month_of_year) == $i ? 'selected' : '' }}>
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <div class="ui basic label">
                                        月
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="start_day_of_month">起算日（月の始まり）</label>
                                <div class="ui right labeled input">
                                    <select class="ui fluid dropdown" name="start_day_of_month"
                                        value="{{ old('start_day_of_month', $currentCompany->start_day_of_month) }}">
                                        @for ($i = 1; $i < 32; $i++)
                                            <option value="{{ $i }}"
                                                {{ old('start_day_of_month', $currentCompany->start_day_of_month) == $i ? 'selected' : '' }}>
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <div class="ui basic label">
                                        日
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="start_day_of_week">起算日（曜日の始まり）</label>
                                <select class="ui fluid dropdown" name="start_day_of_week"
                                    value="{{ old('start_day_of_week', $currentCompany->start_day_of_week) }}">
                                    @foreach ($start_days_of_week as $k => $value)
                                        <option value="{{ $k }}"
                                            {{ old('start_day_of_week', $currentCompany->start_day_of_week) == $k ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ui horizontal card card-shadow item-1">
                    <div class="content">
                        <h2>資本情報</h2>
                        <div class="field {{ err($errors, 'capital') }}">
                            <label for="capital">資本金</label>
                            @if (!isset($currentCompany->id))
                                <input type="text" id="capital" name="capital"
                                    value="{{ old('capital') }}" placeholder="999999" maxlength="9" autocomplete="off">
                            @else
                                <input type="text" id="capital" name="capital"
                                    value="{{ old('capital', $currentCompany->capital) }}" placeholder="999999" maxlength="9"
                                    autocomplete="off">
                            @endif
                            <div class="ui error message"></div>
                        </div>
                        <div class="field {{ err($errors, 'founding_date') }}">
                            <label>創業年月</label>
                            <div class="ui calendar" id="founding_date_calendar">
                                <div class="ui input left icon">
                                    <i class="calendar icon"></i>
                                    @if (!isset($currentCompany->id))
                                        <input type="text" placeholder="Date" name="founding_date"
                                            value="{{ old('formatted_founding_date') }}" autocomplete="off">
                                        <input type="hidden" name="formatted_founding_date"
                                            id="formatted_founding_date" value="{{ old('founding_date') }}">
                                    @else
                                        <input type="text" placeholder="Date" name="founding_date"
                                            id="founding_date" value="{{ $currentCompany->founding_date }}"
                                            autocomplete="off">
                                        <input type="hidden" name="formatted_founding_date"
                                            id="formatted_founding_date"
                                            value="{{ old('formatted_founding_date') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="field {{ err($errors, 'establishment_date') }}">
                            <label>設立年月</label>
                            <div class="ui calendar" id="establishment_date_calendar">
                                <div class="ui input left icon">
                                    <i class="calendar icon"></i>
                                    @if (!isset($currentCompany->id))
                                        <input type="text" placeholder="Date" name="establishment_date"
                                            value="{{ old('establishment_date') }}" autocomplete="off">
                                        <input type="hidden" name="formatted_establishment_date"
                                            id="formatted_establishment_date"
                                            value="{{ old('establishment_date') }}">
                                    @else
                                        <input type="text" placeholder="Date" name="establishment_date"
                                            value="{{ $currentCompany->establishment_date }}" autocomplete="off">
                                        <input type="hidden" name="formatted_establishment_date"
                                            id="formatted_establishment_date"
                                            value="{{ old('formatted_establishment_date') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui horizontal card card-shadow item-2">
                    <div class="content">
                        <h2>業績情報</h2>
                        <div class="two fields">
                            <div class="field {{ err($errors, 'annual_sales') }}">
                                <label for="annual_sales">年間売上高（連結）</label>
                                @if (!isset($currentCompany->id))
                                    <input type="text" id="annual_sales" name="annual_sales"
                                        value="{{ old('annual_sales') }}" placeholder="99999999" maxlength="18" autocomplete="off">
                                @else
                                    <input type="text" id="annual_sales" name="annual_sales"
                                        value="{{ old('annual_sales', $currentCompany->annual_sales) }}"
                                        placeholder="99999999" maxlength="18" autocomplete="off">
                                @endif
                            </div>
                            <div class="field {{ err($errors, 'employee_sum') }}">
                                <label for="employee_sum">従業員数</label>
                                @if (!isset($currentCompany->id))
                                    <input type="text" id="employee_sum" name="employee_sum"
                                        value="{{ old('employee_sum') }}" placeholder="999" maxlength="9" autocomplete="off">
                                @else
                                    <input type="text" id="employee_sum" name="employee_sum"
                                        value="{{ old('employee_sum', $currentCompany->employee_sum) }}"
                                        placeholder="999" maxlength="9" autocomplete="off">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui horizontal card card-shadow item-3">
                    <div class="content">
                        <h2>株式情報</h2>
                        <div class="two fields">
                            <div class="field {{ err($errors, 'authorized_shares') }}">
                                <label for="authorized_shares">発行可能株式総数</label>
                                @if (!isset($currentCompany->id))
                                    <input type="text" id="authorized_shares" name="authorized_shares"
                                        value="{{ old('authorized_shares') }}" placeholder="1200" maxlength="18" autocomplete="off">
                                @else
                                    <input type="text" id="authorized_shares" name="authorized_shares"
                                        value="{{ old('authorized_shares', $currentCompany->authorized_shares) }}"
                                        placeholder="1200" maxlength="18" autocomplete="off">
                                @endif
                            </div>
                            <div class="field {{ err($errors, 'issued_shares') }}">
                                <label for="issued_shares">発行済株式総数</label>
                                @if (!isset($currentCompany->id))
                                    <input type="text" id="issued_shares" name="issued_shares"
                                        value="{{ old('issued_shares') }}" placeholder="100" maxlength="18" autocomplete="off">
                                @else
                                    <input type="text" id="issued_shares" name="issued_shares"
                                        value="{{ old('issued_shares', $currentCompany->issued_shares) }}"
                                        placeholder="100" maxlength="18" autocomplete="off">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ui horizontal card card-shadow item-4">
                    <div class="content">
                        <h2>取引先情報</h2>
                        <div class="two fields">
                            <div class="field">
                                <div class="field {{ err($errors, 'supplier_company') }}">
                                    <label for="supplier_company">仕入先名称</label>
                                    @if (!isset($currentCompany->id))
                                        <input type="text" id="supplier_company" name="supplier_company"
                                            value="{{ old('supplier_company') }}" placeholder="有限会社〇〇"
                                            autocomplete="off">
                                    @else
                                        <input type="text" id="supplier_company" name="supplier_company"
                                            value="{{ old('supplier_company', $currentCompany->supplier_company) }}"
                                            placeholder="有限会社〇〇" autocomplete="off">
                                    @endif
                                </div>
                                <div class="field {{ err($errors, 'outsourcing_company') }}">
                                    <label for="outsourcing_company">外注先名称</label>
                                    @if (!isset($currentCompany->id))
                                        <input type="text" id="outsourcing_company" name="outsourcing_company"
                                            value="{{ old('outsourcing_company') }}" placeholder="有限会社〇〇"
                                            autocomplete="off">
                                    @else
                                        <input type="text" id="outsourcing_company" name="outsourcing_company"
                                            value="{{ old('outsourcing_company', $currentCompany->outsourcing_company) }}"
                                            placeholder="有限会社〇〇" autocomplete="off">
                                    @endif
                                </div>
                                <div class="field {{ err($errors, 'sales_company') }}">
                                    <label for="sales_company">販売先名称</label>
                                    @if (!isset($currentCompany->id))
                                        <input type="text" id="sales_company" name="sales_company"
                                            value="{{ old('sales_company') }}" placeholder="株式会社〇〇"
                                            autocomplete="off">
                                    @else
                                        <input type="text" id="sales_company" name="sales_company"
                                            value="{{ old('sales_company', $currentCompany->sales_company) }}"
                                            placeholder="株式会社〇〇" autocomplete="off">
                                    @endif
                                </div>
                            </div>
                            <div class="field {{ err($errors, 'bank_name') }}">
                                <label for="bank_name">銀行名</label>
                                @if (!isset($currentCompany->id))
                                    <textarea id="bank_name" name="bank_name" maxlength="300" placeholder="">{{ old('bank_name') }}</textarea>
                                @else
                                    <textarea id="bank_name" name="bank_name" maxlength="300" placeholder="">{{ old('bank_name', $currentCompany->bank_name) }}</textarea>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui horizontal card card-shadow item-5">
                    <div class="content">
                        <h2>その他情報</h2>
                        <div class="field {{ err($errors, 'qualification') }}">
                            <label for="qualification">保有資格</label>
                            @if (!isset($currentCompany->id))
                                <input type="text" id="qualification" name="qualification"
                                    value="{{ old('qualification') }}" placeholder="ISO 9001:2015"
                                    autocomplete="off">
                            @else
                                <input type="text" id="qualification" name="qualification"
                                    value="{{ old('qualification', $currentCompany->qualification) }}"
                                    placeholder="ISO 9001:2015" autocomplete="off">
                            @endif
                        </div>
                        <div class="field {{ err($errors, 'url') }}">
                            <label for="url">ホームページアドレス</label>
                            @if (!isset($currentCompany->id))
                                <input type="text" id="url" name="url" value="{{ old('url') }}"
                                    placeholder="https://xxxxxxx" autocomplete="off">
                            @else
                                <input type="text" id="url" name="url"
                                    value="{{ old('url', $currentCompany->url) }}" placeholder="https://xxxxxxx"
                                    autocomplete="off">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="ui horizontal card card-shadow item-6">
                    <div class="content">
                        <h2>添付情報</h2>
                        <div class="field">
                            <label for="financial_statement">業績情報へ決算書の添付（直近1期分）</label>
                            <input type="file" accept=".doc,.docs,.pdf,.jpeg,.jpg" id="financial_statement"
                                class="file-attachment-form" name="financial_statement">
                            <input type="hidden" name="financial_statement_delete"
                                value="{{ old('financial_statement_delete', 0) }}">
                            @if (!empty($financial_statement) && old('financial_statement_delete') == 0)
                                <p class="financial_statement_current" style="text-align: right;">
                                    {{ $financial_statement }}
                                    <span class="ml-1">
                                        <a href="{{ route('company.downloadFile', ['document_type' => 1]) }}"
                                            class="download-link">ダウンロード</a>
                                        @if ($userPermission->isWritableFor(1))
                                            <a href="javascript:deleteFile('financial_statement')"
                                                class="delete-link">削除</a>
                                        @endif
                                    </span>
                                </p>
                            @endif
                        </div>
                        <div class="field">
                            <label for="articles_of_incorporation">事業目的へ定款の添付（最新）</label>
                            <input type="file" accept=".doc,.docs,.pdf,.jpeg,.jpg" id="articles_of_incorporation"
                                class="file-attachment-form" name="articles_of_incorporation">
                            <input type="hidden" name="articles_of_incorporation_delete"
                                value="{{ old('articles_of_incorporation_delete', 0) }}">
                            @if (!empty($articles_of_incorporation) && old('articles_of_incorporation_delete') == 0)
                                <p class="articles_of_incorporation_current" style="text-align: right;">
                                    {{ $articles_of_incorporation }}
                                    <span class="ml-1">
                                        <a href="{{ route('company.downloadFile', ['document_type' => 2]) }}"
                                            class="download-link">ダウンロード</a>
                                        @if ($userPermission->isWritableFor(1))
                                            <a href="javascript:deleteFile('articles_of_incorporation')"
                                                class="delete-link">削除</a>
                                        @endif
                                    </span>
                                </p>
                            @endif
                        </div>
                        <div class="field">
                            <label for="stock_information">株式情報へ株主を添付（最新）</label>
                            <input type="file" accept=".doc,.docs,.pdf,.jpeg,.jpg" id="stock_information"
                                class="file-attachment-form" name="stock_information">
                            <input type="hidden" name="stock_information_delete"
                                value="{{ old('stock_information_delete', 0) }}">
                            @if (!empty($stock_information) && old('stock_information_delete') == 0)
                                <p class="stock_information_current" style="text-align: right;">
                                    {{ $stock_information }}
                                    <span class="ml-1">
                                        <a href="{{ route('company.downloadFile', ['document_type' => 3]) }}"
                                            class="download-link">ダウンロード</a>
                                        @if ($userPermission->isWritableFor(1))
                                            <a href="javascript:deleteFile('stock_information')"
                                                class="delete-link">削除</a>
                                        @endif
                                    </span>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(1))
                <div class="my-4" style="text-align: right; margin-right: 1em;">
                    <a class="ui button negative basic" href="{{ route('home.index') }}"
                        style="width: 200px;">キャンセル</a>
                    <button class="ui button primary submit-disable" type="submit" style="width: 200px;">更新</button>
                </div>
            @endif
        </form>
    </section>

    <!-- 業種選択モーダル -->
    <x-search-industry-type-modal id="industry_type_select" selectorId="{{ $currentCompany->id ?? '' }}" />
    <script type="module">
        $('#industry_type_dropdown').on('change', function() {
            const selectedValue = $(this).val();
            Livewire.dispatch('checkIndustryType', [selectedValue]);
        });

        $('#industry_type_btn').click(_ => {
            $('#industry_type_select').modal({
                blurring: true
            }).modal('show');
        });
    </script>

    <script type="module">
        $(document).ready(function() {
            const readonly = @json(!$userPermission->isBasicDepartment() || !$userPermission->isWritableFor(1));
            if (readonly) {
                $sectionReadonly();
                const def = @json($current_industry_type);
                $('label[for="industry_type[]"]').next('input[type="text"]').val(def.join(', '));
            } else {
                $('#founding_date_calendar').calendar({
                    type: 'date',
                    formatter: {
                        date: 'Y"年"M"月"D"日"'
                    },
                    text: {
                        days: ['日', '月', '火', '水', '木', '金', '土'],
                        months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                    },
                    initialDate: "",
                })
                $('#establishment_date_calendar').calendar({
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
                getIndustryType(true);
            }
        });

        function getIndustryType(first = false) {
            $.ajax({
                    url: '{{ route('company.get_industry_type') }}',
                    type: 'post'
                })
                .done((data) => {
                    $('select[name="industry_type[]"]').empty();
                    data.forEach(element => {
                        $('<option>').attr({
                            value: element.id
                        }).text(element.industry_type_code).appendTo('select[name="industry_type[]"]');
                    });
                    $('.ui.dropdown.dropdown.multiple').dropdown('clear');

                    if (first) {
                        const def = @json(old('industry_type', $industry_type ?? []));
                        def.forEach(v => {
                            $('select[name="industry_type[]"] option[value=' + v +
                                ']').attr(
                                'selected', true);
                        });
                    }
                });
        }

        Livewire.on('addIndustryType', (data) => {
            $(`.item[data-text="${data[0].industry_type_code}"]`).trigger('click');
        });
    </script>
    <script type="module">
        $(document).ready(function() {
            $('#info-icon').click(function() {
                $('#info-modal').modal('show');
            });
        });

        const fileInputs = document.getElementsByClassName('file-attachment-form');
        const fileHandler = (e) => {
            const totalSizeLimit = 1024 * 1024 * 99;
            let totalSize = 0;
            for (let index = 0; index < fileInputs.length; index++) {
                const input = fileInputs[index];
                const files = input.files;

                for (let i = 0; i < files.length; i++) {
                    const size = files[i].size;
                    totalSize += size;
                }
            }
            if (totalSizeLimit < totalSize) {
                window.alert('添付ファイルの合計は99MB以下にしてください。');
                e.target.value = '';
            }
        };
        for (let index = 0; index < fileInputs.length; index++) {
            const element = fileInputs[index];
            element.addEventListener('change', fileHandler);
        }
    </script>
    <script>
        function deleteFile(name) {
            const current = document.querySelector('.' + name + '_current');
            const del = document.querySelector('[name=' + name + '_delete]');
            current.remove();
            del.value = 1;
        }
    </script>
</x-layout>
