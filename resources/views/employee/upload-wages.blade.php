<x-layout title="賃金情報のインポート" useRightContent="{{ true }}">
    @slot('header')
        <link rel="stylesheet" href="{{ asset('/css/power-table.css') }}">
        <style type="text/css">
            .power-table {
                height: 375px;
            }
        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <a class="section" href="{{ route('wages.index') }}">賃金情報</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">賃金情報のインポート</div>
        </div>
        <h1 class="mt-0">賃金情報のインポート</h1>
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <div class="ui form">
                    <div class="field" style="max-width: 450px;">
                        <label for="">ファイル選択</label>
                        <div class="ui file input">
                            <input id="csv-input" type="file" accept=".csv" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ui card full card-shadow item-0">
            <div class="content">
                <h2>プレビュー</h2>
                <p>読込可能なデータの一覧：<span id="preview-loadable">0</span>/<span id="preview-inputs">0</span></p>
                <!-- Power Table List -->
                <x-power-table-layout></x-power-table-layout>
                <h3>不明な項目</h3>
                <div id="solv-column" class="ui form"></div>
            </div>
        </div>
        <div class="submit-action py-1" style="text-align: right;">
            <button id="upload-btn" class="ui button primary" disabled>アップロード</button>
        </div>
    </section>
    <script src="{{ asset('/js/power-table-list.js') }}" defer></script>
    <script src="{{ asset('/js/power-table-filter.js') }}" defer></script>
    <script src="{{ asset('/js/csv-import-wage.js') }}" defer></script>

    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            const csvImportWage = new CsvImportWage({
                mode: 'json',
                useEdit: false,
                api: {
                    list: '',
                    post: '',

                    // custom data below
                    data: "{{ route('wages.upload.colmuns') }}",
                    upload: "{{ route('wages.upload.post') }}",
                }
            });
            csvImportWage.onImported = () => {
                $.toast({
                    position: 'bottom right',
                    class: 'success',
                    message: '正常にインポートが完了しました'
                })
            };
        })
    </script>
</x-layout>
