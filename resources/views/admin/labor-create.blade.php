<x-layout title="{{!isset($employee_id) ? '社労士情報登録' : '社労士情報編集'}}" useRightContent="{{false}}">
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
            grid-template-rows: repeat(2, 1fr);
            grid-template-areas:
                "a b"
                "a c";
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

        @media (max-width: 1245px) {
            .labor-data-area {
                display: grid;
                gap: 0.8em;
                grid-template-columns: repeat(1, 1fr);
                grid-template-rows: repeat(3, auto);
                grid-template-areas:
                    "a"
                    "b"
                    "c";
            }
        }
    </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{route('home.select')}}">会社・操作選択</a>
            <i class="right chevron icon divider"></i>
            <a class="section" href="{{route('admin.index')}}">Karte管理</a>
            <i class="right chevron icon divider"></i>
            <a class="section" href="{{route('admin.labor')}}">アカウント管理</a>
            <i class="right chevron icon divider"></i>
            @if(!isset($employee_id))
            <div class="active section">社労士情報登録</div>
            @else
            <div class="active section">社労士情報更新</div>
            @endif
        </div>

        @if(!isset($employee_id))
        <h1 class="mb-2 mt-0">社労士情報登録</h1>
        @else
        <h1 class="mb-2 mt-0">社労士情報更新</h1>
        @endif

        <form class="ui form"
            action="{{!isset($employee_id) ? route('admin.labor_create_post') : route('admin.labor_update_post', $employee_id)}}"
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
            
            @if (isset($employee_id))
                <input type="hidden" name="employee_id" value="{{ $employee_id }}">
            @endif

            <div class="labor-data-area">
                <div class="ui horizontal card card-shadow item-0">
                    <div class="content">
                        <h2>基本情報</h2>
                        <div class="two fields">
                            <div class="required field {{err($errors, 'employee_no')}}">
                                <label for="employee_no">社員番号</label>
                                <input type="text" id="employee_no" name="employee_no"
                                    value="{{ old('employee_no', isset($employee_id) ? $employee->employee_no : '') }}"
                                    placeholder="E9999999">
                            </div>
                            <div class="required field {{err($errors, 'employee_type')}}">
                                <label>社員区分</label>
                                <select class="ui fluid dropdown" name="employee_type">
                                    <option value="">未選択</option>
                                    @foreach ($employee_type as $k => $item)
                                    <option value="{{$k}}" {{ old('employee_type')==$k || (isset($employee) &&
                                        old('employee_type', $employee->employee_type) == $k) ? 'selected' : ''
                                        }}>{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="required field {{err($errors, 'last_name')}}">
                                <label for="last_name">氏</label>
                                <input type="text" id="last_name" name="last_name"
                                    value="{{ old('last_name', isset($employee_id) ? $employee->last_name : '') }}"
                                    placeholder="田中">
                            </div>
                            <div class="required field {{err($errors, 'first_name')}}">
                                <label for="first_name">名</label>
                                <input type="text" id="first_name" name="first_name"
                                    value="{{ old('first_name', isset($employee_id) ? $employee->first_name : '') }}"
                                    placeholder="太郎">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="required field {{err($errors, 'last_name_kana')}}">
                                <label for="last_name_kana">氏（カナ）</label>
                                <input type="text" id="last_name_kana" name="last_name_kana"
                                    value="{{ old('last_name_kana', isset($employee_id) ? $employee->last_name_kana : '') }}"
                                    placeholder="タナカ">
                            </div>
                            <div class="required field {{err($errors, 'first_name_kana')}}">
                                <label for="first_name_kana">名（カナ）</label>
                                <input type="text" id="first_name_kana" name="first_name_kana"
                                    value="{{ old('first_name_kana', isset($employee_id) ? $employee->first_name_kana : '') }}"
                                    placeholder="タロウ">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field {{err($errors, 'last_name_alphabet')}}">
                                <label for="last_name_alphabet">氏（アルファベット）</label>
                                <input type="text" id="last_name_alphabet" name="last_name_alphabet"
                                    value="{{ old('last_name_alphabet', isset($employee_id) ? $employee->last_name_alphabet : '') }}"
                                    placeholder="TANAKA">
                            </div>
                            <div class="field {{err($errors, 'first_name_alphabet')}}">
                                <label for="first_name_alphabet">名（アルファベット）</label>
                                <input type="text" id="first_name_alphabet" name="first_name_alphabet"
                                    value="{{ old('first_name_alphabet', isset($employee_id) ? $employee->first_name_alphabet : '') }}"
                                    placeholder="TARO">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui horizontal card card-shadow item-1">
                    <div class="content">
                        <h2>所属・担当情報</h2>
                        <div class="two fields">
                            <div class="required field {{err($errors, 'company_id')}}">
                                <label for="company_name">会社</label>
                                <input type="text" id="company_name" name="company_name" placeholder="会社名" readonly
                                    value="{{ old('company_name', isset($employee_id) ? $employee->company_name : '') }}">
                                <input type="hidden" id="company_id" name="company_id"
                                    value="{{ old('company_id', isset($employee_id) ? $employee->company_id : '') }}">
                            </div>
                            <div class="required field {{err($errors, 'branch_id')}}">
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
                        <div class="field {{err($errors, 'departments[]')}}">
                            <label for="departments[]">所属部署</label>
                            <select class="ui fluid search dropdown multiple clearable department_select" multiple=""
                                name="departments[]">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="ui horizontal card card-shadow item-2">
                    <div class="content">
                        <h2>連絡先情報</h2>
                        <div class="two fields">
                            <div class="ui unstackable three fields field {{err($errors, 'tel_area_code')}}"
                                style="padding: 0;">
                                <div class="field tel-hyphen required" style="padding-right: 0.8em;">
                                    <label for="tel_area_code">電話番号</label>
                                    <input type="tel" pattern="[0-9]{1,5}" id="tel_area_code" name="tel_area_code"
                                        value="{{ old('tel_area_code', isset($employee_id) ? $employee->tel_area_code : '') }}"
                                        placeholder="市外局番" maxlength="4">
                                </div>

                                <div class="field tel-hyphen {{err($errors, 'tel_city_code')}}">
                                    <label></label>
                                    <input type="tel" pattern="[0-9]{1,4}" id="tel_city_code" name="tel_city_code"
                                        value="{{ old('tel_city_code', isset($employee_id) ? $employee->tel_city_code : '') }}"
                                        placeholder="市内局番" maxlength="4">
                                </div>

                                <div class="field {{err($errors, 'tel_subscriber_code')}}" style="padding-left: 0.8em;">
                                    <label></label>
                                    <input type="tel" pattern="[0-9]{4,7}" id="tel_subscriber_code"
                                        name="tel_subscriber_code"
                                        value="{{ old('tel_subscriber_code', isset($employee_id) ? $employee->tel_subscriber_code : '') }}"
                                        placeholder="加入者番号" maxlength="4">
                                </div>
                            </div>
                            <div class="field {{err($errors, 'mail_address2')}}">
                                <label for="mail_address2">メールアドレス</label>
                                <input type="email" id="mail_address2" name="mail_address2"
                                    value="{{ old('mail_address2', isset($employee_id) ? $employee->mail_address2 : '') }}"
                                    placeholder="karte_xxxx@xxx.com">
                            </div>
                        </div>
                    </div>
                </div>
                @if(!isset($employee_id))
                <div class="ui horizontal card card-shadow item-3">
                    <div class="content">
                        <h2>ログイン情報</h2>
                        <div class="two fields">
                            <div class="required field {{err($errors, 'user_email')}}">
                                <label for="user_email">メールアドレス</label>
                                <input type="text" id="user_email" name="user_email" placeholder="会社名"
                                    value="{{ old('user_email', isset($employee_id) ? $employee->user_email : '') }}">
                            </div>
                            <div class="required field {{err($errors, 'user_pass')}}">
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
                <a class="ui button negative basic" href="{{ route('admin.labor') }}" style="width: 200px;">キャンセル</a>
                @if(!isset($employee_id))
                <button class="ui button primary" type="submit" style="width: 200px;">登録</button>
                @else
                <button class="ui button primary" type="submit" style="width: 200px;">更新</button>
                @endif
            </div>
        </form>
    </section>

    <!-- 会社検索モーダル -->
    <x-search-company-modal id="company_select" selectorName="#company_name" selectorId="#company_id"
        selectorBrName="#branch_name" selectorBrId="#branch_id" withBranch="true" division="1" />
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
            $('#company_select').modal({blurring: true}).modal('show');
        });
    </script>
    <script type="module">
        $(document).ready(function () {
            $('.ui.dropdown.dropdown.multiple').dropdown({});
            function getDepartmentList(id, first = false) {
                $.ajax({url:'{{ route("admin.get_departments") }}', data: { company_id: id}, type:'post'})
                    .done((data) => {
                        $('select[name="departments[]"]').empty();
                        data.forEach(element => {
                            $('<option>').attr({value: element.id}).text(element.name).appendTo('select[name="departments[]"]');
                        });
                        $('.ui.dropdown.dropdown.multiple').dropdown('clear');

                        if (first) {
                            const def = @json(old('departments', $departments));
                            def.forEach(v => {
                                let a = $('select[name="departments[]"] option[value=' + v + ']').prop('selected', true);
                            });
                        }
                    });
            }
            const company_id = $('input[name=company_id]').val();
            if (company_id) {
                getDepartmentList(company_id, true);
            }
            addEventCompanyModal((data) => {
                getDepartmentList(data['id']);
            });
        });
    </script>
</x-layout>