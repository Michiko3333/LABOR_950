<x-layout title="賃金情報のインポート" useRightContent="{{ true }}">
    @slot('header')
        <link rel="stylesheet" href="{{ asset('/css/power-table.css') }}">
        <style type="text/css">
            .power-table {
                height: 375px;
            }

            .mapping-row {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                margin-bottom: 15px;
                padding: 10px;
                border-bottom: 1px solid #eee;
            }

            .mapping-row label {
                flex: 0 0 150px;
                font-weight: bold;
                color: #555;
            }

            .mapping-row span {
                flex: 0 0 80px;
                color: #888;
                font-style: italic;
            }

            .mapping-row select {
                flex: 1;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
                max-width: 200px;
            }
        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <a class="section" href="{{ route('attendances.index') }}">勤怠情報</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">勤怠情報のインポート</div>
        </div>
        <h1 class="mt-0">勤怠情報のインポート</h1>
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <div class="ui form">
                    <div class="field" style="max-width: 450px;">
                        <label for="">ファイル選択</label>
                        <div class="ui file input">
                            <input id="csv-input" type="file" accept=".csv" disabled>
                        </div>
                    </div>
                    <div class="field" style="width: 450px;">
                        <div class="fields two">
                            <div class="field">
                                <label>対象年月</label>
                                <div class="ui calendar" id="attendance_month">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" placeholder="Date" name="attendance_month"
                                            autocomplete="off">
                                        <input type="hidden" name="formatted_attendance_month"
                                            id="formatted_attendance_month">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-1" style="text-align: left;">
                    <button id="preview-btn" class="ui button small">プレビュー</button>
                </div>
            </div>
        </div>

        <div class="ui card full card-shadow item-0">
            <div class="content">
                <h2>プレビュー</h2>
                <p>読込可能なデータの一覧：<span id="preview-loadable">0</span>/<span id="preview-inputs">0</span></p>
                <!-- Power Table List -->
                <x-power-table-layout></x-power-table-layout>
                <h3>取り込み項目の割り当て</h3>
                <div id="solv-column" class="ui form"></div>
                <button id="solv-column-btn" class="ui button primary mini" disabled>現在の設定を保存</button>
            </div>
        </div>
        <div class="submit-action py-1" style="text-align: right;">
            <button id="upload-btn" class="ui button primary" disabled>アップロード</button>
        </div>
    </section>
    <script src="{{ asset('/js/power-table-list.js') }}" defer></script>
    <script src="{{ asset('/js/power-table-filter.js') }}" defer></script>
    <script src="{{ asset('/js/csv-import-attendance.js') }}" defer></script>

    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            const csvImportAttendance = new CsvImportAttendance({
                mode: 'json',
                useEdit: false,
                api: {
                    list: '',
                    post: '',

                    // custom data below
                    data: "{{ route('attendances.upload.colmuns') }}",
                    upload: "{{ route('attendances.upload.post') }}",
                    solv: "{{ route('attendances.solv.column') }}"
                }
            });
            csvImportAttendance.onImported = () => {
                $.toast({
                    position: 'bottom right',
                    class: 'success',
                    message: '正常にインポートが完了しました'
                })
                document.scrollTo(0, 0);
            };
            csvImportAttendance.onFaildImport = () => {
                $.toast({
                    position: 'bottom right',
                    class: 'red',
                    message: 'インポートに失敗しました'
                })
                document.scrollTo(0, 0);
            };
            csvImportAttendance.onSolvedColumn = () => {
                $.toast({
                    position: 'bottom right',
                    class: 'success',
                    message: '割当設定を保存しました'
                })
            };
            csvImportAttendance.onFaildSolvedColumn = () => {
                $.toast({
                    position: 'bottom right',
                    class: 'red',
                    message: '割当設定の保存に失敗しました'
                })
            };
            $('#attendance_month').calendar({
                type: 'month',
                formatter: {
                    month: 'Y年M月'
                },
                text: {
                    months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                    monthsShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月',
                        '12月'
                    ],
                },
                initialDate: "",
            });
        })
    </script>
</x-layout>
