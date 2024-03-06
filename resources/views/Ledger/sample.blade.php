<x-layout title="帳票作成：">
    @slot('header')
    <!-- 帳票用の共通CSSを読み込む -->
    <link rel="stylesheet" href="{{asset('/css/ledger-form.css')}}">

    <!-- ページ単位で追加分CSS -->
    <style type="text/css"></style>
    @endslot
    <h1>帳票：雇用保険適用事業所設置届</h1>
    <p>帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト
        帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト帳票の説明テキスト
    </p>

    <!-- 入力エリア -->
    <div id="ledger-step1" class="step-view active my-2">
        <form id="ledger-form" action="" method="post">
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
            <div class="ledger-twocol my-2">
                <div class="left-col">
                    <div class="ui card card-shadow">
                        <div class="content">
                            <h2>社員選択</h2>
                            <livewire:ledger-employee-list />
                        </div>
                    </div>
                </div>
                <div class="right-col">
                    <div class="ui card card-shadow">
                        <div class="content">
                            <x-form.sample />
                        </div>
                    </div>
                </div>
            </div>

            <div class="prevew-btn">
                <button id="ledger-back" class="ui button negative basic" type="button"
                    style="width: 200px;">戻る</button>
                <button id="ledger-preview-btn" class="ui button primary" type="button"
                    style="width: 200px;">確認</button>
            </div>
        </form>
    </div>

    <!-- プレビューエリア -->
    <div id="ledger-step2" class="step-view my-2">
        <h2 style="text-align: center;">プレビュー</h2>
        <div class="preview-area">
            <div class="ui card card-shadow ledger-card">
                <div class="content" preview-component>
                    <x-form.sample />
                </div>
            </div>
        </div>
        <div class="submit-btn py-2">
            <button id="ledger-edit-btn" class="ui button" type="button" style="width: 200px;">修正</button>
            <button id="ledger-submit-btn" class="ui button yellow" type="button" style="width: 200px;">申請</button>
        </div>
    </div>


    <!-- 会社情報のセット ここから -->
    <script type="module">
        $(document).ready(function () {
            // 例：
            $('#J59_005F_9640_906C_94D4_8D86').val('{{$company->company_no}}');
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
            $('#J35_005F_8E81_96BC').val(employee.last_name + ' ' + employee.first_name);
            $('#J34_005F_8E81_96BC_8374_838A_834B_8369').val(employee.last_name_kana + ' ' + employee.first_name_kana);
            $('#J10_005F_8E96_8BC6_8F8A_96BC_8FCC').val(branch.name);
        }

        // 選択イベントを通してlivewireからデータを受け取る
        Livewire.on('onSelectEmployee', ({ data }) => {insertDataFromEmployee(data)});
    </script>
    <!-- 従業員・支店情報のセット ここまで -->

    @slot('footer')
    <!-- 帳票用の共通jsを読み込む -->
    <script src="{{asset('/js/ledger-form.js')}}" type="module"></script>
    @endslot
</x-layout>