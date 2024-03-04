<x-layout title="{{!isset($company_id) ? '会社情報登録' : '会社情報編集'}}" useRightContent="{{false}}">
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

        .company-data-area>.ui.horizontal.card {
            width: 100%;
            margin: 0;
        }

        .company-data-area {
            display: grid;
            gap: 0.8em;
            grid-template-columns: repeat(3, auto);
            grid-template-rows: repeat(5, auto);
        }

        .company-data-area .ui.card.item-0 {
            grid-area: 1 / 1 / 4 / 3;
            min-width: 650px;
        }

        .company-data-area .ui.card.item-1 {
            grid-area: 2 / 3 / 3 / 5;
        }

        .company-data-area .ui.card.item-2 {
            grid-area: 1 / 3 / 2 / 4;
        }

        .company-data-area .ui.card.item-3 {
            grid-area: 1 / 4 / 2 / 5;
        }

        .company-data-area .ui.card.item-4 {
            grid-area: 3 / 3 / 4 / 4;
        }

        .company-data-area .ui.card.item-5 {
            grid-area: 3 / 4 / 4 / 5;
        }

        @media (max-width: 1245px) {
            .company-data-area .ui.card.item-0 {
                grid-area: 1 / 1 / 4 / 4;
                min-width: 450px;
            }

            .company-data-area .ui.card.item-1 {
                grid-area: 4 / 1 / 5 / 3;
                min-width: 460px;
            }

            .company-data-area .ui.card.item-2 {
                grid-area: 1 / 4 / 2 / 5;
            }

            .company-data-area .ui.card.item-3 {
                grid-area: 2 / 4 / 3 / 5;
            }

            .company-data-area .ui.card.item-4 {
                grid-area: 3 / 4 / 4 / 5;
            }

            .company-data-area .ui.card.item-5 {
                grid-area: 4 / 3 / 5 / 5;
            }
        }

        @media (max-width: 820px) {
            .company-data-area .ui.card.item-0 {
                grid-area: 1 / 1 / 1 / 4;
                min-width: 450px;
            }

            .company-data-area .ui.card.item-1 {
                grid-area: 2 / 1 / 2 / 4;
                min-width: 460px;
            }

            .company-data-area .ui.card.item-2 {
                grid-area: 3 / 1 / 3 / 4;
            }

            .company-data-area .ui.card.item-3 {
                grid-area: 4 / 1 / 4 / 4;
            }

            .company-data-area .ui.card.item-4 {
                grid-area: 5 / 1 / 5 / 4;
            }

            .company-data-area .ui.card.item-5 {
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

    <div class="ui breadcrumb">
        <a class="section" href="{{route('home.select')}}">会社・操作選択</a>
        <i class="right chevron icon divider"></i>
        <a class="section" href="{{route('admin.index')}}">Karte管理</a>
        <i class="right chevron icon divider"></i>
        <a class="section" href="{{route('admin.company')}}">会社一覧</a>
        <i class="right chevron icon divider"></i>
        @if(!isset($company_id))
        <div class="active section">会社情報登録</div>
        @else
        <div class="active section">会社情報更新</div>
        @endif
    </div>

    @if(!isset($company_id))
    <h1 class="mb-2">会社情報登録</h1>
    @else
    <h1 class="mb-2">会社情報編集</h1>
    @endif
    <form class="ui form"
        action="{{!isset($company_id) ? route('admin.company_create_post') : route('admin.company_update_post', $company_id)}}"
        method="post">
        @csrf
        @if(session('errors'))
        <div class="ui error message">
            <div class="header">入力エラー</div>
            <ul class="list">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(isset($company_id))
        <input type="hidden" id="company_id" name="company_id" value="{{ old('company_id', $company_id) }}">
        @endif
        <div class="company_division_selector">
            <input type="radio" id="company_division_v1" name="company_division" class="box-radio" value="1"
                {{radioChecked(1, !isset($company_id) ? old('company_division') : old('company_division',
                $company->company_division))}} />
            <label for="company_division_v1" class="label">労務事務所</label>
            <input type="radio" id="company_division_v2" name="company_division" class="box-radio" value="2"
                {{radioChecked(2, !isset($company_id) ? old('company_division') : old('company_division',
                $company->company_division))}} />
            <label for="company_division_v2" class="label">顧客企業</label>
        </div>
        @error('company_division')
        <div>会社区分を選択してください</div>
        @enderror
        <div class="company-data-area">
            <div class="ui horizontal card card-shadow item-0">
                <div class="content">
                    <h2>基本情報</h2>
                    <div class="two fields">
                        <div class="required field {{err($errors, 'name')}}">
                            <label for="name">会社名</label>
                            @if(!isset($company_id))
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="株式会社Karte">
                            @else
                            <input type="text" id="name" name="name" value="{{ old('name', $company->name) }}"
                                placeholder="株式会社Karte">
                            @endif
                            <div class="ui error message"></div>
                        </div>

                        <div class="required field {{err($errors, 'name_kana')}}">
                            <label for="name_kana">会社名（カナ）</label>
                            @if(!isset($company_id))
                            <input type="text" id="name_kana" name="name_kana" value="{{ old('name_kana') }}"
                                placeholder="カブシキガイシャカルテ">
                            @else
                            <input type="text" id="name_kana" name="name_kana"
                                value="{{ old('name_kana', $company->name_kana) }}" placeholder="カブシキガイシャカルテ">
                            @endif

                        </div>
                    </div>
                    <div class="ui unstackable two fields">
                        <div class="field {{err($errors, 'name_en')}}">
                            <label for="name_en">会社名（英語表記）</label>
                            @if(!isset($company_id))
                            <input type="text" id="name_en" name="name_en" value="{{ old('name_en') }}"
                                placeholder="Karte.co.ltd">
                            @else
                            <input type="text" id="name_en" name="name_en"
                                value="{{ old('name_en', $company->name_en) }}" placeholder="Karte.co.ltd">
                            @endif

                        </div>
                        <div class="field {{err($errors, 'name_abbreviation')}}">
                            <label for="name_abbreviation">会社名（略称表記）</label>
                            @if(!isset($company_id))
                            <input type="text" id="name_abbreviation" name="name_abbreviation"
                                value="{{ old('name_abbreviation') }}" placeholder="KRT">
                            @else
                            <input type="text" id="name_abbreviation" name="name_abbreviation"
                                value="{{ old('name_abbreviation', $company->name_abbreviation) }}" placeholder="KRT">
                            @endif
                        </div>
                    </div>
                    <div class="equal width fields">
                        <div class="required field {{err($errors, 'company_no')}}">
                            <label for="company_no">法人番号</label>
                            @if(!isset($company_id))
                            <input type="text" id="company_no" name="company_no" value="{{ old('company_no') }}"
                                placeholder="">
                            @else
                            <input type="text" id="company_no" name="company_no"
                                value="{{ old('company_no', $company->company_no) }}" placeholder="">
                            @endif

                        </div>
                        <div class="required field {{err($errors, 'company_type_id')}}">
                            <label>法人格</label>
                            <select class="ui fluid dropdown" name="company_type_id"
                                value="{{ old('company_type_id') }}">
                                <option value="">未選択</option>
                                <option value="1" {{ old('company_type_id')=="1" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "1") ? 'selected' : ''
                                    }}>株式会社
                                </option>
                                <option value="2" {{ old('company_type_id')=="2" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "2") ? 'selected' : ''
                                    }}>有限会社
                                </option>
                                <option value="3" {{ old('company_type_id')=="3" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "3") ? 'selected' : ''
                                    }}>合名会社
                                </option>
                                <option value="4" {{ old('company_type_id')=="4" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "4") ? 'selected' : ''
                                    }}>合同会社
                                </option>
                                <option value="5" {{ old('company_type_id')=="5" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "5") ? 'selected' : ''
                                    }}>合資会社
                                </option>
                                <option value="6" {{ old('company_type_id')=="6" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "6") ? 'selected' : ''
                                    }}>協同組合
                                </option>
                                <option value="7" {{ old('company_type_id')=="7" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "7") ? 'selected' : ''
                                    }}>管理組合
                                </option>
                                <option value="8" {{ old('company_type_id')=="8" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "8") ? 'selected' : ''
                                    }}>互助会
                                </option>
                                <option value="9" {{ old('company_type_id')=="9" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "9") ? 'selected' : ''
                                    }}>一般財団法人
                                </option>
                                <option value="10" {{ old('company_type_id')=="10" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "10") ? 'selected' : ''
                                    }}>公益財団法人
                                </option>
                                <option value="11" {{ old('company_type_id')=="11" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "11") ? 'selected' : ''
                                    }}>一般社団法人
                                </option>
                                <option value="12" {{ old('company_type_id')=="12" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "12") ? 'selected' : ''
                                    }}>公益社団法人
                                </option>
                                <option value="13" {{ old('company_type_id')=="13" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "13") ? 'selected' : ''
                                    }}>NPO法人
                                </option>
                                <option value="14" {{ old('company_type_id')=="14" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "14") ? 'selected' : ''
                                    }}>宗教法人
                                </option>
                                <option value="15" {{ old('company_type_id')=="15" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "15") ? 'selected' : ''
                                    }}>地方公共団体
                                </option>
                                <option value="16" {{ old('company_type_id')=="16" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "16") ? 'selected' : ''
                                    }}>独立行政法人
                                </option>
                                <option value="17" {{ old('company_type_id')=="17" || (isset($company) &&
                                    old('company_type_id', $company->company_type_id) == "17") ? 'selected' : ''
                                    }}>特殊法人
                                </option>
                            </select>
                        </div>
                        <div class="field {{err($errors, 'license_no')}}">
                            <label for="license_no">許認可番号</label>
                            @if(!isset($company_id))
                            <input type="text" id="license_no" name="license_no" value="{{ old('license_no') }}"
                                placeholder="">
                            @else
                            <input type="text" id="license_no" name="license_no"
                                value="{{ old('license_no', $company->license_no) }}" placeholder="">
                            @endif
                        </div>
                    </div>

                    <div class="two fields {{err($errors, 'business_type')}}">
                        <div class="required field">
                            <label>企業区分</label>
                            <select class="ui fluid dropdown" name="business_type" value="{{ old('business_type') }}">
                                <option value="">未選択</option>
                                @foreach($businessTypes as $id => $name)
                                <option value="{{ $id }}" {{ old('business_type')=="$id" || (isset($company) &&
                                    old('business_type', $company->business_type) == "$id") ? 'selected' : '' }}>{{
                                    $name }}
                                </option>
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="field  {{err($errors, 'license_type')}}">
                            <label>上場区分</label>
                            <select class="ui fluid dropdown" name="listed_type" value="{{ old('listed_type') }}">
                                <option value="">未選択</option>
                                @foreach($company_listed_type as $id => $name)
                                <option value="{{ $id }}" {{ old('listed_type')=="$id" || (isset($company) &&
                                    old('listed_type', $company->listed_type) == "$id") ? 'selected' : '' }}>{{
                                    $name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <div class="field {{err($errors, 'stock_code')}}">
                            <label for="stock_code">証券コード</label>
                            @if(!isset($company_id))
                            <input type="text" id="stock_code" name="stock_code" value="{{ old('stock_code') }}"
                                placeholder="非上場は記入しない">
                            @else
                            <input type="text" id="stock_code" name="stock_code"
                                value="{{ old('stock_code', $company->stock_code) }}" placeholder="非上場は記入しない">
                            @endif
                        </div>
                    </div>
                    <div class="required field {{err($errors, 'purpose')}}">
                        <label for="purpose">事業目的</label>
                        @if(!isset($company_id))
                        <input type="text" id="purpose" name="purpose" value="{{ old('purpose') }}"
                            placeholder="ハードウェア・ソフトウェアの企画、開発、制作、販売及び保守">
                        @else
                        <input type="text" id="purpose" name="purpose" value="{{ old('purpose', $company->purpose) }}"
                            placeholder="ハードウェア・ソフトウェアの企画、開発、制作、販売及び保守">
                        @endif
                    </div>
                </div>
            </div>

            <div class="ui horizontal card card-shadow item-1">
                <div class="content">
                    <h2>資本情報</h2>
                    <div class="three fields {{err($errors, 'capital')}}">
                        <div class="field">
                            <label for="capital">資本金</label>
                            @if(!isset($company_id))
                            <input type="text" id="capital" name="capital" value="{{ old('capital') }}"
                                placeholder="999999">
                            @else
                            <input type="text" id="capital" name="capital"
                                value="{{ old('capital', $company->capital) }}" placeholder="999999">
                            @endif
                            <div class="ui error message"></div>
                        </div>
                        <div class="field {{err($errors, 'founding_date')}}">
                            <label>創業年月</label>
                            <div class="ui calendar" id="founding_date_calendar">
                                <div class="ui input left icon">
                                    <i class="calendar icon"></i>
                                    @if(!isset($company_id))
                                    <input type="text" placeholder="Date" name="founding_date"
                                        value="{{ old('formatted_founding_date') }}">
                                    <input type="hidden" name="formatted_founding_date" id="formatted_founding_date"
                                        value="{{ old('founding_date') }}">
                                    @else
                                    <input type="text" placeholder="Date" name="founding_date" id="founding_date"
                                        value="{{ $company->founding_date }}">
                                    <input type="hidden" name="formatted_founding_date" id="formatted_founding_date"
                                        value="{{ old('formatted_founding_date') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="field {{err($errors, 'establishment_date')}}">
                            <label>設立年月</label>
                            <div class="ui calendar" id="establishment_date_calendar">
                                <div class="ui input left icon">
                                    <i class="calendar icon"></i>
                                    @if(!isset($company_id))
                                    <input type="text" placeholder="Date" name="establishment_date"
                                        value="{{ old('establishment_date') }}">
                                    <input type="hidden" name="formatted_establishment_date"
                                        id="formatted_establishment_date" value="{{ old('establishment_date') }}">
                                    @else
                                    <input type="text" placeholder="Date" name="establishment_date"
                                        value="{{ $company->establishment_date }}">
                                    <input type="hidden" name="formatted_establishment_date"
                                        id="formatted_establishment_date"
                                        value="{{ old('formatted_establishment_date') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui horizontal card card-shadow item-2">
                <div class="content">
                    <h2>業績情報</h2>
                    <div class="two fields">
                        <div class="field {{err($errors, 'annual_sales')}}">
                            <label for="annual_sales">年間売上高（連結）</label>
                            @if(!isset($company_id))
                            <input type="text" id="annual_sales" name="annual_sales" value="{{ old('annual_sales') }}"
                                placeholder="99999999">
                            @else
                            <input type="text" id="annual_sales" name="annual_sales"
                                value="{{ old('annual_sales', $company->annual_sales) }}" placeholder="99999999">
                            @endif
                        </div>
                        <div class="field {{err($errors, 'employee_sum')}}">
                            <label for="employee_sum">従業員数</label>
                            @if(!isset($company_id))
                            <input type="text" id="employee_sum" name="employee_sum" value="{{ old('employee_sum') }}"
                                placeholder="999">
                            @else
                            <input type="text" id="employee_sum" name="employee_sum"
                                value="{{ old('employee_sum', $company->employee_sum) }}" placeholder="999">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui horizontal card card-shadow item-3">
                <div class="content">
                    <h2>株式情報</h2>
                    <div class="two fields">
                        <div class="field {{err($errors, 'authorized_shares')}}">
                            <label for="authorized_shares">発行可能株式総数</label>
                            @if(!isset($company_id))
                            <input type="text" id="authorized_shares" name="authorized_shares"
                                value="{{ old('authorized_shares') }}" placeholder="1200">
                            @else
                            <input type="text" id="authorized_shares" name="authorized_shares"
                                value="{{ old('authorized_shares', $company->authorized_shares) }}" placeholder="1200">
                            @endif
                        </div>
                        <div class="field {{err($errors, 'issued_shares')}}">
                            <label for="issued_shares">発行済株式総数</label>
                            @if(!isset($company_id))
                            <input type="text" id="issued_shares" name="issued_shares"
                                value="{{ old('issued_shares') }}" placeholder="100">
                            @else
                            <input type="text" id="issued_shares" name="issued_shares"
                                value="{{ old('issued_shares', $company->issued_shares) }}" placeholder="100">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui horizontal card card-shadow item-4">
                <div class="content">
                    <h2>取引先情報</h2>
                    <div class="field {{err($errors, 'supplier_company')}}">
                        <label for="supplier_company">仕入先名称</label>
                        @if(!isset($company_id))
                        <input type="text" id="supplier_company" name="supplier_company"
                            value="{{ old('supplier_company') }}" placeholder="有限会社〇〇">
                        @else
                        <input type="text" id="supplier_company" name="supplier_company"
                            value="{{ old('supplier_company', $company->supplier_company) }}" placeholder="有限会社〇〇">
                        @endif
                    </div>
                    <div class="field {{err($errors, 'outsourcing_company')}}">
                        <label for="outsourcing_company">外注先名称</label>
                        @if(!isset($company_id))
                        <input type="text" id="outsourcing_company" name="outsourcing_company"
                            value="{{ old('outsourcing_company') }}" placeholder="有限会社〇〇">
                        @else
                        <input type="text" id="outsourcing_company" name="outsourcing_company"
                            value="{{ old('outsourcing_company', $company->outsourcing_company) }}"
                            placeholder="有限会社〇〇">
                        @endif
                    </div>
                    <div class="field {{err($errors, 'sales_company')}}">
                        <label for="sales_company">販売先名称</label>
                        @if(!isset($company_id))
                        <input type="text" id="sales_company" name="sales_company" value="{{ old('sales_company') }}"
                            placeholder="株式会社〇〇">
                        @else
                        <input type="text" id="sales_company" name="sales_company"
                            value="{{ old('sales_company', $company->sales_company) }}" placeholder="株式会社〇〇">
                        @endif
                    </div>
                </div>
            </div>
            <div class="ui horizontal card card-shadow item-5">
                <div class="content">
                    <h2>その他情報</h2>
                    <div class="field {{err($errors, 'qualification')}}">
                        <label for="qualification">保有資格</label>
                        @if(!isset($company_id))
                        <input type="text" id="qualification" name="qualification" value="{{ old('qualification') }}"
                            placeholder="ISO 9001:2015">
                        @else
                        <input type="text" id="qualification" name="qualification"
                            value="{{ old('qualification', $company->qualification) }}" placeholder="ISO 9001:2015">
                        @endif
                    </div>
                    <div class="field {{err($errors, 'url')}}">
                        <label for="url">ホームページアドレス</label>
                        @if(!isset($company_id))
                        <input type="text" id="url" name="url" value="{{ old('url') }}" placeholder="https://xxxxxxx">
                        @else
                        <input type="text" id="url" name="url" value="{{ old('url', $company->url) }}"
                            placeholder="https://xxxxxxx">
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <h2 class="pl-1">事業所情報</h2>

        <!-- 支店情報 -->
        <livewire:admin-branch-form :branch="$branch" :prefectures="$prefectures" :insuranceTypes="$insuranceTypes"
            :errors="$errors" />

        <div class="my-4" style="text-align: right; margin-right: 1em;">
            <a class="ui button negative basic" href="{{ route('admin.company') }}" style="width: 200px;">キャンセル</a>
            @if(!isset($company_id))
            <button class="ui button primary" type="submit" style="width: 200px;">登録</button>
            @else
            <button class="ui button primary" type="submit" style="width: 200px;">更新</button>
            @endif
        </div>
    </form>

    <script type="module">
        $(document).ready(function () {
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
            })
        });
    </script>
</x-layout>