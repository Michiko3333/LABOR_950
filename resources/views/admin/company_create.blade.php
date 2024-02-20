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
    </style>
    @endslot

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
    <h1>会社情報登録</h1>
    @else
    <h1>会社情報編集</h1>
    @endif

    <div class="ui container">
        @if(!isset($company_id))
        <form id="company_form" class="ui form" action="/admin/company/create" method="post">
            @else
            <form id="company_form" class="ui form" action="/admin/company/create/edit/{{ $company_id }}" method="post">
                @endif
                @csrf

                @if(session('errors'))
                <div class="ui error message">
                    <div class="header">入力フォームに問題があります</div>
                    <ul class="list">
                        @foreach($errors->keys() as $field)
                        @switch($field)
                        @case('name')
                        <li>必須項目である会社名を入力してください</li>
                        @break
                        @case('name_kana')
                        <li>会社名（カナ）は全角カナを入力してください</li>
                        @break
                        @case('name_en')
                        <li>会社名（英語表記）は半角英数字記号を入力してください</li>
                        @break
                        @case('name_abbreviation')
                        <li>会社名（略称表記）は半角英数字を入力してください</li>
                        @break
                        @case('company_no')
                        <li>法人番号は半角英数字20文字以内で入力してください</li>
                        @break
                        @case('company_type_id')
                        <li>必須項目である法人格を選択してください</li>
                        @break
                        @case('license_id')
                        <li>許認可番号に不正な値が入力されています</li>
                        @break
                        @case('business_type')
                        <li>必須項目である企業区分を選択してください</li>
                        @break
                        @case('listed_type')
                        <li>必須項目である上場区分を選択してください</li>
                        @break
                        @case('stock_code')
                        <li>証券コードは半角英数字20文字以内で入力してください</li>
                        @break
                        @case('capital')
                        <li>資本金は整数値を入力してください</li>
                        @break
                        @case('annual_sales')
                        <li>年間売上高（連結）は整数値を入力してください</li>
                        @break
                        @case('employee_sum')
                        <li>従業員数は整数値を入力してください</li>
                        @break
                        @case('authorized_shares')
                        <li>発行可能株式総数は整数値を入力してください</li>
                        @break
                        @case('issued_shares')
                        <li>発行済株式総数は整数値を入力してください</li>
                        @break
                        @case('url')
                        <li>ホームページアドレスをURL形式で入力してください</li>
                        @break
                        @case('purpose')
                        <li>必須項目である事業目的を入力してください</li>
                        @break
                        @case('company_division')
                        <li>必須項目である会社区分を選択してください</li>
                        @break
                        @case('stock_code_unique')
                        <li>{{ $errors->first('stock_code_unique') }}</li>
                        @break
                        @default
                        <li>予期せぬエラーが発生しました</li>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        @break
                        @endswitch
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="two fields">
                    <div class="required field">
                        <label for="name">会社名</label>
                        @if(!isset($company_id))
                        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="株式会社Karte">
                        @else
                        <input type="text" id="name" name="name" value="{{ old('name', $company->name) }}"
                            placeholder="株式会社Karte">
                        @endif
                        <div class="ui error message"></div>
                    </div>

                    <div class="required field">
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

                <div class="two fields">
                    <div class="field">
                        <label for="name_en">会社名（英語表記）</label>
                        @if(!isset($company_id))
                        <input type="text" id="name_en" name="name_en" value="{{ old('name_en') }}"
                            placeholder="Karte.co.ltd">
                        @else
                        <input type="text" id="name_en" name="name_en" value="{{ old('name_en', $company->name_en) }}"
                            placeholder="Karte.co.ltd">
                        @endif

                    </div>
                    <div class="field">
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
                    <div class="required field">
                        <label for="company_no">法人番号</label>
                        @if(!isset($company_id))
                        <input type="text" id="company_no" name="company_no" value="{{ old('company_no') }}"
                            placeholder="">
                        @else
                        <input type="text" id="company_no" name="company_no"
                            value="{{ old('company_no', $company->company_no) }}" placeholder="">
                        @endif

                    </div>
                    <div class="required field">
                        <label>法人格</label>
                        <select class="ui fluid dropdown" name="company_type_id" value="{{ old('company_type_id') }}">
                            <option value="">State</option>
                            <option value="1" {{ old('company_type_id')=="1" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "1") ? 'selected' : '' }}>株式会社
                            </option>
                            <option value="2" {{ old('company_type_id')=="2" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "2") ? 'selected' : '' }}>有限会社
                            </option>
                            <option value="3" {{ old('company_type_id')=="3" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "3") ? 'selected' : '' }}>合名会社
                            </option>
                            <option value="4" {{ old('company_type_id')=="4" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "4") ? 'selected' : '' }}>合同会社
                            </option>
                            <option value="5" {{ old('company_type_id')=="5" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "5") ? 'selected' : '' }}>合資会社
                            </option>
                            <option value="6" {{ old('company_type_id')=="6" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "6") ? 'selected' : '' }}>協同組合
                            </option>
                            <option value="7" {{ old('company_type_id')=="7" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "7") ? 'selected' : '' }}>管理組合
                            </option>
                            <option value="8" {{ old('company_type_id')=="8" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "8") ? 'selected' : '' }}>互助会
                            </option>
                            <option value="9" {{ old('company_type_id')=="9" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "9") ? 'selected' : '' }}>一般財団法人
                            </option>
                            <option value="10" {{ old('company_type_id')=="10" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "10") ? 'selected' : '' }}>公益財団法人
                            </option>
                            <option value="11" {{ old('company_type_id')=="11" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "11") ? 'selected' : '' }}>一般社団法人
                            </option>
                            <option value="12" {{ old('company_type_id')=="12" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "12") ? 'selected' : '' }}>公益社団法人
                            </option>
                            <option value="13" {{ old('company_type_id')=="13" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "13") ? 'selected' : '' }}>NPO法人
                            </option>
                            <option value="14" {{ old('company_type_id')=="14" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "14") ? 'selected' : '' }}>宗教法人
                            </option>
                            <option value="15" {{ old('company_type_id')=="15" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "15") ? 'selected' : '' }}>地方公共団体
                            </option>
                            <option value="16" {{ old('company_type_id')=="16" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "16") ? 'selected' : '' }}>独立行政法人
                            </option>
                            <option value="17" {{ old('company_type_id')=="17" || (isset($company) &&
                                old('company_type_id', $company->company_type_id) == "17") ? 'selected' : '' }}>特殊法人
                            </option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="license_id">許認可番号</label>
                        @if(!isset($company_id))
                        <input type="text" id="license_id" name="license_id" value="{{ old('license_id') }}"
                            placeholder="">
                        @else
                        <input type="text" id="license_id" name="license_id"
                            value="{{ old('license_id', $company->license_id) }}" placeholder="">
                        @endif
                    </div>
                </div>

                <div class="two fields">
                    <div class="required field">
                        <label>企業区分</label>
                        <select class="ui fluid dropdown" name="business_type" value="{{ old('business_type') }}">
                            <option value="">State</option>
                            @foreach($businessTypes as $id => $name)
                            <option value="{{ $id }}" {{ old('business_type')=="$id" || (isset($company) &&
                                old('business_type', $company->business_type) == "$id") ? 'selected' : '' }}>{{ $name }}
                            </option>
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="required field">
                        <label>上場区分</label>
                        <select class="ui fluid dropdown" name="listed_type" value="{{ old('listed_type') }}">
                            <option value="">State</option>
                            @foreach($company_listed_type as $id => $name)
                            <option value="{{ $id }}" {{ old('listed_type')=="$id" || (isset($company) &&
                                old('listed_type', $company->listed_type) == "$id") ? 'selected' : '' }}>{{ $name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field">
                    <div class="field">
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
                <div class="two fields">
                    <div class="field">
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
                    <div class="field">
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
                                    id="formatted_establishment_date" value="{{ old('formatted_establishment_date') }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="capital">資本金</label>
                        @if(!isset($company_id))
                        <input type="text" id="capital" name="capital" value="{{ old('capital') }}"
                            placeholder="999999">
                        @else
                        <input type="text" id="capital" name="capital" value="{{ old('capital', $company->capital) }}"
                            placeholder="999999">
                        @endif
                        <div class="ui error message"></div>
                    </div>
                    <div class="field">
                        <label for="annual_sales">年間売上高（連結）</label>
                        @if(!isset($company_id))
                        <input type="text" id="annual_sales" name="annual_sales" value="{{ old('annual_sales') }}"
                            placeholder="99999999">
                        @else
                        <input type="text" id="annual_sales" name="annual_sales"
                            value="{{ old('annual_sales', $company->annual_sales) }}" placeholder="99999999">
                        @endif
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="employee_sum">従業員数</label>
                        @if(!isset($company_id))
                        <input type="text" id="employee_sum" name="employee_sum" value="{{ old('employee_sum') }}"
                            placeholder="999">
                        @else
                        <input type="text" id="employee_sum" name="employee_sum"
                            value="{{ old('employee_sum', $company->employee_sum) }}" placeholder="999">
                        @endif
                    </div>
                    <div class="field">
                        <label for="qualification">保有資格</label>
                        @if(!isset($company_id))
                        <input type="text" id="qualification" name="qualification" value="{{ old('qualification') }}"
                            placeholder="ISO 9001:2015">
                        @else
                        <input type="text" id="qualification" name="qualification"
                            value="{{ old('qualification', $company->qualification) }}" placeholder="ISO 9001:2015">
                        @endif
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="authorized_shares">発行可能株式総数</label>
                        @if(!isset($company_id))
                        <input type="text" id="authorized_shares" name="authorized_shares"
                            value="{{ old('authorized_shares') }}" placeholder="1200">
                        @else
                        <input type="text" id="authorized_shares" name="authorized_shares"
                            value="{{ old('authorized_shares', $company->authorized_shares) }}" placeholder="1200">
                        @endif
                    </div>
                    <div class="field">
                        <label for="issued_shares">発行済株式総数</label>
                        @if(!isset($company_id))
                        <input type="text" id="issued_shares" name="issued_shares" value="{{ old('issued_shares') }}"
                            placeholder="100">
                        @else
                        <input type="text" id="issued_shares" name="issued_shares"
                            value="{{ old('issued_shares', $company->issued_shares) }}" placeholder="100">
                        @endif
                    </div>
                </div>

                <div class="three fields">
                    <div class="field">
                        <label for="supplier_company">仕入先名称</label>
                        @if(!isset($company_id))
                        <input type="text" id="supplier_company" name="supplier_company"
                            value="{{ old('supplier_company') }}" placeholder="有限会社〇〇">
                        @else
                        <input type="text" id="supplier_company" name="supplier_company"
                            value="{{ old('supplier_company', $company->supplier_company) }}" placeholder="有限会社〇〇">
                        @endif
                    </div>
                    <div class="field">
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
                    <div class="field">
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

                <div class="two fields">
                    <div class="field">
                        <label for="url">ホームページアドレス</label>
                        @if(!isset($company_id))
                        <input type="text" id="url" name="url" value="{{ old('url') }}" placeholder="https://xxxxxxx">
                        @else
                        <input type="text" id="url" name="url" value="{{ old('url', $company->url) }}"
                            placeholder="https://xxxxxxx">
                        @endif
                    </div>
                    <div class="required field">
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

                <div class="two fields">
                    <div class="required field">
                        <label>会社区分</label>
                        <select class="ui fluid dropdown" name="company_division" value="{{ old('company_division') }}">
                            <option value="">State</option>
                            <option value="1" {{ old('company_division')=="1" || (isset($company) &&
                                old('company_division', $company->company_division) == "1") ? 'selected' : '' }}>労務事務所
                            </option>
                            <option value="2" {{ old('company_division')=="2" || (isset($company) &&
                                old('company_division', $company->company_division) == "2") ? 'selected' : '' }}>顧客企業
                            </option>
                        </select>
                    </div>
                </div>
                <div style="text-align: right;">
                    <a class="ui button negative basic" href="{{ route('admin.company') }}"
                        style="width: 200px;">キャンセル</a>
                    @if(!isset($company_id))
                    <button class="ui button primary" type="submit" style="width: 200px;">登録</button>
                    @else
                    <button class="ui button primary" type="submit" style="width: 200px;">更新</button>
                    @endif
                </div>
            </form>
    </div>
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