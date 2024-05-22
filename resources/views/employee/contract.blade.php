<x-layout title="労働条件通知＆契約書">
    @slot('header')
        <!-- 帳票用の共通CSSを読み込む -->
        <link rel="stylesheet" href="{{ asset('/css/ledger-form.css') }}">

        <!-- ページ単位で追加分CSS -->
        <style type="text/css">
            .contract_type_area {
                width: 100%;
                display: flex;
                justify-content: space-around;
                gap: 1em;
            }

            .contract_type_area>div.checkbox {
                width: 100%;
            }

            #step0-1,
            #step0-2,
            #step0-3 {
                opacity: 1;
                transition: 0.8s;
            }

            #step0-1.hidden,
            #step0-2.hidden,
            #step0-3.hidden {
                height: 0;
                opacity: 0;
                overflow: hidden;
                transition: 0.8s;
            }

            .none {
                display: none;
            }
        </style>
    @endslot
    <section class="content">

        <div class="ui huge breadcrumb mt-2">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">労働契約書作成</div>
        </div>

        <h1 class="mb-2 mt-0">労働条件通知＆契約書の作成</h1>

        <!-- 入力エリア -->
        <div id="ledger-step1" class="step-view active my-2">
            <form id="ledger-form" action="{{ route('contract.download') }}" method="post">
                <div id="step0-1">
                    <h4>１：契約書の種類を選択してください</h4>
                    <div class="contract_type_area">
                        <div class="ui invisible checkbox">
                            <input type="radio" id="type_permenant" name="contract_type" value="1"
                                {{ old('contract_type', '') == 1 ? 'checked' : '' }}>
                            <label for="type_permenant" class="ui primary basic button">正社員/無期雇用</label>
                        </div>
                        <div class="ui invisible checkbox">
                            <input type="radio" id="type_flexterm" name="contract_type" value="2"
                                {{ old('contract_type', '') == 2 ? 'checked' : '' }}>
                            <label for="type_flexterm" class="ui primary basic button ">契約社員/有期雇用</label>
                        </div>
                    </div>
                </div>
                <div id="step0-2" class="mt-4 hidden">
                    <h3>２：社員を選択してください</h3>
                    <div class="ui card card-shadow" style="padding: 1em; width: 100%;">
                        <div class="content">
                            <livewire:ledger-employee-list />
                        </div>
                        <input type="hidden" id="employee_id" name="employee_id" value="{{ old('employee_id', '') }}">
                        <input type="hidden" id="employee_name" name="employee_name"
                            value="{{ old('employee_name', '') }}">
                    </div>
                </div>
                <div id="step0-3" class="mt-4 hidden">
                    <h3>３：内容を入力してください</h3>

                    @csrf
                    <div class="ui error message hidden">
                        <div class="header">入力エラー</div>
                        <ul id="errorList" class="list">

                        </ul>
                    </div>
                    <div class="ledger-single my-1">
                        <div class="ui card card-shadow">
                            <div class="content">
                                <x-contract.permanent :default="$default_permanent" :info="$info" />
                                <x-contract.flexterm :default="$default_flexterm" :info="$info" />
                            </div>
                        </div>
                    </div>

                    <div class="prevew-btn">
                        <a id="ledger-back" class="ui button negative" type="button" style="width: 200px;"
                            href="{{ route('home.index') }}">破棄する</a>
                        <button id="ledger-preview-btn" class="ui button primary" type="button"
                            style="width: 200px;">確認</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- プレビューエリア -->
        <div id="ledger-step2" class="step-view my-2">
            <h3 style="text-align: center;">プレビュー</h3>
            <div class="preview-area">
                <div class="ui card card-shadow ledger-card">
                    <div class="content" preview-component>
                        <x-contract.permanent :default="$default_permanent" :info="$info" />
                        <x-contract.flexterm :default="$default_flexterm" :info="$info" />
                    </div>
                </div>
            </div>
            <div class="submit-btn py-2">
                <button id="ledger-edit-btn" class="ui button" type="button" style="width: 200px;">修正</button>
                <button id="contract-submit-btn" class="ui button yellow" type="button"
                    style="width: 200px;">ダウンロード</button>
            </div>
        </div>

    </section>

    <div class="ui mini modal">
        <div class="header">ダウンロード...</div>
        <div class="content">
            <div class="ui active centered inline loader large"></div>
        </div>
        <div class="actions">
            <div class="ui approve primary button">完了</div>
        </div>
    </div>

    <!-- 会社情報のセット ここから -->
    <script type="module">
        $(document).ready(function() {
            $('input[name=contract_type]').change(function(e) {
                $('#step0-2').removeClass('hidden');
                $('.contract-form').addClass('none');
                if ($(this).val() == 1) {
                    $('.contract-form.permanent').removeClass('none');
                    $('.contract-form.permanent input').prop("disabled", false);
                    $('.contract-form.permanent textarea').prop("disabled", false);
                    $('.contract-form.flexterm input').prop("disabled", true);
                    $('.contract-form.flexterm textarea').prop("disabled", true);
                } else {
                    $('.contract-form.flexterm').removeClass('none');
                    $('.contract-form.flexterm input').prop("disabled", false);
                    $('.contract-form.flexterm textarea').prop("disabled", false);
                    $('.contract-form.permanent input').prop("disabled", true);
                    $('.contract-form.permanent textarea').prop("disabled", true);
                }
            });

            Livewire.dispatch('setDefault', {
                employee_id: '{{ old('employee_id', '') }}',
                employee_name: '{{ old('employee_name', '') }}'
            });

            @if (!empty(old('employee_id', 0)))
                $('#step0-3').removeClass('hidden');
            @endif
        });

        $('#contract-submit-btn').click(() => {
            $('.contract_type_area input').prop("disabled", false);
            const form = document.getElementById('ledger-form');
            const formData = new FormData(form);
            $.ajax({
                    url: '{{ route('contract.check') }}',
                    type: 'post',
                    data: formData, // dataに FormDataを指定
                    processData: false, //ajaxがdataを整形しない指定
                    contentType: false
                })
                .done(_ => {
                    $('#contract-submit-btn').prop('disabled', true);
                    $('.mini.modal').modal({
                        closable: false,
                        onApprove: function() {
                            location.href = '{{ route('contract.index') }}';
                        }
                    }).modal('show');
                    setTimeout(() => {
                        $('#ledger-form').submit();
                        $('.contract_type_area input').prop("disabled", true);
                    }, 1000);
                })
                .fail(err => {
                    const d = err.responseJSON;
                    $('#errorList').html('');
                    const values = [];

                    // オブジェクトを反復処理して値を抽出
                    for (const key in d.errors) {
                        if (d.errors.hasOwnProperty(key)) {
                            const errorMessages = d.errors[key];
                            errorMessages.forEach(value => {
                                values.push(value);
                            });
                        }
                    }

                    values.forEach(d => {
                        $('#errorList').append('<li>' + d + '</li>');
                    });

                    $('.ui.error.message').removeClass('hidden');
                    $('#ledger-step1').addClass('active');
                    $('#ledger-step2').removeClass('active');
                    window.scrollTo(0, 0);
                })
        });
    </script>
    <!-- 会社情報のセット ここまで -->

    <!-- 従業員・支店情報のセット ここから -->
    <script type="module">
        function insertDataFromEmployee(data) {
            const employee = data['employee'];
            const branch = data['branch'];

            // ここに従業員と紐づく支店情報をinputに入れる処理
            // 例：
            $('.full_name').val(employee.last_name + ' ' + employee.first_name);
            $('#employee_id').val(employee.id);
            $('#employee_name').val(employee.last_name + employee.first_name);
            $('#step0-3').removeClass('hidden');
        }

        // 選択イベントを通してlivewireからデータを受け取る
        Livewire.on('onSelectEmployee', ({
            data
        }) => {
            insertDataFromEmployee(data);
        });
    </script>
    <!-- 従業員・支店情報のセット ここまで -->

    @slot('footer')
        <!-- 帳票用の共通jsを読み込む -->
        <script src="{{ asset('/js/ledger-form.js') }}" type="module"></script>
    @endslot
</x-layout>
