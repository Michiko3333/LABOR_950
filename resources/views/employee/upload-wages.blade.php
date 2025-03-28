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
            <a class="section" href="{{ route('wages.index') }}">賃金情報</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">賃金情報のインポート</div>
        </div>
        <h1 class="mt-0">賃金情報のインポート</h1>
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <div class="ui form">
                    <div class="field" style="width: 450px;">
                        <label for="">ファイル選択</label>
                        <div class="ui file input">
                            <input id="csv-input" type="file" accept=".csv" disabled>
                        </div>
                    </div>
                    <div class="field" style="width: 450px;">
                        <div class="fields two">
                            <div class="field">
                                <label>対象年月</label>
                                <div class="ui calendar" id="wage_month">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" placeholder="Date" name="wage_month" autocomplete="off">
                                        <input type="hidden" name="formatted_wage_month" id="formatted_wage_month">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>支払年月日</label>
                                <div class="ui calendar" id="payment_date">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" placeholder="Date" name="payment_date" autocomplete="off">
                                        <input type="hidden" name="formatted_payment_date" id="formatted_payment_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-1">
                        <div class="ui radio checkbox field mr-2 mt-0">
                            <input type="radio" name="wage_type_radio" checked="checked" value="0" />
                            <label>給与</label>
                        </div>
                        <div class="ui radio checkbox field mt-0">
                            <input type="radio" name="wage_type_radio" value="1" />
                            <label>賞与</label>
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
                <p style="display: flex; align-items: center;">
                    読込可能なデータの一覧：<span id="preview-loadable">0</span>/<span id="preview-inputs">0</span>
                    <button id="import-help-btn" type="button" class="ui icon button basic mini ml-1">
                        配置項目の一覧
                    </button>
                </p>
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

    <div id="import-help-modal" class="ui modal small">
        <div class="header">
            <h3>配置項目の一覧</h3>
        </div>
        <div class="content">
            <table class="ui celled table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>主な支給額</th>
                        <th>時間外手当</th>
                        <th>諸手当</th>
                        <th>控除</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <p class="mt-1">* 固定項目</p>
        </div>
        <div class="actions">
            <button type="button" class="ui button cancel">閉じる</button>
        </div>
    </div>
    <script src="{{ asset('/js/power-table-list.js') }}" defer></script>
    <script src="{{ asset('/js/power-table-filter.js') }}" defer></script>
    <script src="{{ asset('/js/csv-import-wage.js') }}" defer></script>

    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            const configModal = $('#import-config-modal').modal();
            const csvImportWage = new CsvImportWage({
                mode: 'json',
                useEdit: false,
                api: {
                    list: '',
                    post: '',

                    // custom data below
                    data: "{{ route('wages.upload.colmuns') }}",
                    upload: "{{ route('wages.upload.post') }}",
                    insurance_get: "{{ route('wages.insurance.get') }}",
                    solv: "{{ route('wages.solv.column') }}"
                }
            });
            csvImportWage.onImported = () => {
                $.toast({
                    position: 'bottom right',
                    class: 'success',
                    message: '正常にインポートが完了しました'
                })
                document.scrollTo(0, 0);
            };
            csvImportWage.onFaildImport = () => {
                $.toast({
                    position: 'bottom right',
                    class: 'red',
                    message: 'インポートに失敗しました'
                })
                document.scrollTo(0, 0);
            };
            csvImportWage.onSolvedColumn = () => {
                $.toast({
                    position: 'bottom right',
                    class: 'success',
                    message: '割当設定を保存しました'
                })
            };
            csvImportWage.onFaildSolvedColumn = () => {
                $.toast({
                    position: 'bottom right',
                    class: 'red',
                    message: '割当設定の保存に失敗しました'
                })
            };
            $('#wage_month').calendar({
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
            $('#payment_date').calendar({
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
            const importHelpModal = $('#import-help-modal').modal();
            $('#import-help-btn').click(() => {
                importHelpModal.modal('show');
            });

            csvImportWage.onLoadedCsv = () => {
                const salary_columns = ['基本給*', ...csvImportWage.salary_columns];
                const overtime_columns = [...csvImportWage.overtime_columns];
                const allowance_columns = [...csvImportWage.allowance_columns];
                const deduction_columns = ['住民税*', '源泉所得税*', ...csvImportWage.deduction_columns];

                const tbody = document.querySelector('#import-help-modal tbody');
                tbody.innerHTML = '';
                const maxLength = Math.max(salary_columns.length, overtime_columns.length, allowance_columns
                    .length, deduction_columns.length);
                for (let i = 0; i < maxLength; i++) {
                    const tr = document.createElement('tr');
                    const td1 = document.createElement('td');
                    const td2 = document.createElement('td');
                    const td3 = document.createElement('td');
                    const td4 = document.createElement('td');
                    td1.textContent = salary_columns[i] || '';
                    td2.textContent = overtime_columns[i] || '';
                    td3.textContent = allowance_columns[i] || '';
                    td4.textContent = deduction_columns[i] || '';
                    tr.appendChild(td1);
                    tr.appendChild(td2);
                    tr.appendChild(td3);
                    tr.appendChild(td4);
                    tbody.appendChild(tr);
                }
            }
        })
    </script>
</x-layout>
