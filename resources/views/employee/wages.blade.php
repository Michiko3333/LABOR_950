<x-layout title="賃金情報" useRightContent="{{ true }}">
    @slot('header')
        <style type="text/css">
            .table-wage {
                position: relative;
                overflow: auto;
                height: 52vh;
                max-height: 52vh;
            }

            .table-wage table {
                width: 100%;
                border-collapse: collapse;
            }

            .table-wage th {
                padding: 0.5em;
                min-width: 100px;
                width: auto;
            }

            .table-wage th,
            .table-wage td {
                vertical-align: middle;
                border: 1px solid rgba(34, 36, 38, .1);
                border-collapse: collapse;
                font-size: 14px;
                overflow: hidden;
            }

            .table-wage td {
                height: 32px;
                text-overflow: ellipsis;
                white-space: nowrap;
                background-color: white;
            }

            .table-wage table {
                position: sticky;
                top: 0;
                left: 0;
                background: #f9fafb;
            }

            .table-wage .edit-input {
                width: 100%;
                height: 100%;
                border: none;
                padding: 0.4em;
                font-size: 14px;
                background-color: #ddeeff;
            }

            .table-wage .edit-input:focus {
                outline: solid 1px #4183C0;
            }

            .table-wage table th.hidden,
            .table-wage table td.hidden {
                display: none;
            }

            .table-wage table th button.ui.icon.button {
                padding: 4.5px !important;
                height: 17px;
                margin: 0 4px;
            }

            .table-wage .label,
            .table-wage .view {
                width: 100%;
                height: 100%;
                border: none;
                padding: 0.4em;
                font-size: 14px;
            }

            .table-wage .view.hidden,
            .table-wage .edit-input.hidden {
                display: none;
            }

            .table-wage .plus-btn.hidden {
                display: none;
            }

            .wage-actions-top,
            .wage-actions-bottom {
                padding: 0.5em 0;
            }

            .wage-actions-bottom {
                text-align: end;
            }

            #wage-year_calendar input {
                width: 100%;
            }

            #wage .wage-actions-bottom .hidden {
                display: none;
            }

            #wage-filter h3 {
                font-size: 16px;
            }

            #wage-filter #wage-filter-conditions {
                display: flex;
                flex-direction: column;
                width: 100%;
                padding: 1em 1em;
                gap: 1em;
            }

            #wage-filter #wage-filter-conditions-action {
                padding: 0 1em;
            }

            .filter-condition-row {
                display: flex;
                width: 100%;
                align-items: center;
                gap: 1em;
            }

            .filter-condition-row .ui.basic.red.button {
                width: 80px;
                flex-shrink: 0;
                flex-grow: 0;
                padding: 1.1em 1em;
            }

            .filter-condition-row .label {
                font-weight: bold;
            }

            #add-condition {
                width: 100%;
                padding: 1em;
                color: gray;
                font-weight: bold;
                border: solid 2px silver;
                border-radius: 4px;
                background: transparent;
                cursor: pointer;
            }

            #add-condition:hover {
                opacity: 0.8;
            }

            #wage-filter .remove-ordinary-btn.hidden {
                display: none;
            }

            #wage-filter #filter-showlist-wrapper {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }
        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">賃金情報</div>
        </div>
        <h1 class="mt-0">賃金情報</h1>

        <div id="wage" class="ui card full card-shadow item-0">
            <div class="content">
                <div class="wage-actions-top">
                    <button class="ui button small" id="wage-filter-button">絞り込み・表示設定</button>
                </div>
                <div id="wage-list" class="table-wage">
                    <table>
                        <thead>
                            <tr id="wage-list-header">
                            </tr>
                        </thead>
                        <tbody id="wage-list-body"></tbody>
                    </table>
                </div>
                <div class="wage-actions-bottom">
                    <button class="ui button" id="wage-edit-button">編集</button>
                    <button class="ui button hidden" id="wage-cancel-button">キャンセル</button>
                    <button class="ui button primary hidden" id="wage-submit-button">保存</button>
                </div>
            </div>
        </div>
        <div id="wage-filter" class="ui modal wage-filter-coupled">
            <div class="header">絞り込み・表示設定</div>
            <div class="content scrolling">
                <form id="wage_filter" class="ui form wage-filter-wrapper">
                    <div class="ui top attached tabular menu wage-menu">
                        <div class="item active" data-tab="filter1" style="cursor: pointer;">絞り込み</div>
                        <div class="item" data-tab="filter2" style="cursor: pointer;">詳細条件</div>
                        <div class="item" data-tab="filter3" style="cursor: pointer;">表示・非表示</div>
                    </div>
                    <div class="ui bottom attached tab segment" data-tab="filter1">
                        <div class="fields">
                            <div class="four wide field">
                                <label for="wage_year">年度</label>
                                <div class="ui calendar" id="wage-year_calendar">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" placeholder="20xx" maxLength="4" name="wage_year">
                                    </div>
                                </div>
                            </div>
                            <div class="four wide field">
                                <label for="wage_month">月</label>
                                <select class="ui fluid dropdown wage" name="wage_month">
                                    <option value="">指定なし</option>
                                    @for ($i = 1; $i < 13; $i++)
                                        <option value="{{ $i }}">{{ $i }}月</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="field"></div>
                        </div>
                        <div class="fields">
                            <div class="four wide field">
                                <label for="wage_type">賃金区分</label>
                                <select class="ui fluid dropdown wage" name="wage_type">
                                    <option value="">指定なし</option>
                                    <option value="0">給与</option>
                                    <option value="1">賞与</option>
                                </select>
                            </div>
                            <div class="four wide field">
                                <label for="wage_branch">所属事業所</label>
                                <select class="ui fluid dropdown wage" name="wage_branch">
                                    <option value="">指定なし</option>
                                    @foreach ($branch_list as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="four wide field">
                                <label for="wage_departments">所属部署</label>
                                <input type="text" name="wage_department" placeholder="〇〇部">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="four wide field">
                                <label for="employment_type">雇用区分</label>
                                <input type="text" name="employment_type" placeholder="正社員">
                            </div>
                            <div class="four wide field">
                                <label for="work_type">勤務区分</label>
                                <input type="text" name="work_type" placeholder="〇〇〇">
                            </div>
                            <div class="four wide field">
                                <label for="grade">等級区分</label>
                                <input type="text" name="grade" placeholder="〇〇等級">
                            </div>
                            <div class="four wide field">
                                <label for="gradational_salary">号棒区分</label>
                                <input type="text" name="gradational_salary" placeholder="〇〇号棒">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="four wide field">
                                <label for="other_type">その他区分</label>
                                <input type="text" name="other_type" placeholder="〇〇">
                            </div>
                        </div>
                    </div>
                    <div class="ui bottom attached tab segment" data-tab="filter2">
                        <div id="wage-filter-conditions"></div>
                        <div id="wage-filter-conditions-action">
                            <button id="add-condition" type="button">条件を追加</button>
                        </div>
                    </div>
                    <div class="ui bottom attached tab segment active" data-tab="filter3">
                        <div id="filter-showlist-wrapper">

                        </div>
                    </div>
                </form>
            </div>
            <div class="actions">
                <div class="ui button basic red remove-ordinary-btn hidden" id="remove-ordinary-btn"
                    style="float: left;">常時設定を削除</div>
                <div class="ui cancel button">キャンセル</div>
                <div class="ui primary buttons">
                    <div class="ui button approve">絞り込む</div>
                    <div class="ui floating dropdown icon button">
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <button type="button" id="open-filter-save" class="item approve">常時設定として保存する</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="add-column-modal" class="ui modal mini">
            <div class="header">項目を追加</div>
            <div class="content ui form">
                <div class="field">
                    <label for="">名称</label>
                    <input id="add-column-name" type="text" maxlength="15">
                </div>
            </div>
            <div class="actions">
                <button class="ui button cancel">キャンセル</button>
                <button class="ui button approve primary">追加</button>
            </div>
        </div>
        <div id="edit-column-modal" class="ui modal mini">
            <div class="header">項目を編集</div>
            <div class="content ui form">
                <div class="field">
                    <label for="">名称</label>
                    <input id="edit-column-name" type="text" maxlength="15">
                </div>
            </div>
            <div class="actions">
                <button id="remove-column" data-event="remove" class="ui button basic red mini cancel"
                    type="button" style="float: left;">項目を削除</button>
                <button class="ui button cancel mini" type="button">キャンセル</button>
                <button class="ui button approve primary mini" type="button">適用</button>
            </div>
        </div>
    </section>
    <script src="{{ asset('/js/wage-list.js') }}" defer></script>
    <script src="{{ asset('/js/wage-filter.js') }}" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            // インスタンス作成
            const wageList = new WageList(
                "{{ route('wages.list') }}",
                "{{ route('wages.post') }}",
                "{{ route('wages.filter.showlist') }}",
                "{{ route('wages.filter.load') }}",
                "{{ route('wages.filter.save') }}",
                "{{ route('wages.filter.remove') }}",
                'wage-list');
            const wageFilter = new WageFilter(wageList);
            wageList.showFilter = () => {
                $('#wage-filter')
                    .modal({
                        onApprove: () => {
                            wageFilter.onApprove();
                            wageList.load();
                        },
                        onHidden: () => {
                            wageFilter.onHidden();
                        }
                    })
                    .modal('show');
            };
            wageList.successEvent = () => {
                $.toast({
                    position: 'bottom right',
                    class: 'success',
                    message: '正常に保存されました'
                })
            }
            wageList.onAddColumn = (target, pos) => {
                $('#add-column-modal')
                    .modal({
                        onApprove: (e) => {
                            const val = $('#add-column-name').val();
                            if (val == '') {
                                return false;
                            }
                            wageList.addColumn(val, target, pos);

                            return true;
                        },
                        onHidden: () => {
                            $('#add-column-name').val('');
                        }
                    })
                    .modal('show');
            }
            wageList.onEditColumn = (key, original = '') => {
                $('#edit-column-name').val(original);
                $('#edit-column-modal')
                    .modal({
                        onApprove: (e) => {
                            const val = $('#edit-column-name').val();
                            if (val == '') {
                                return false;
                            }
                            if (wageList.checkColumn(val)) {
                                return false;
                            }
                            return wageList.editColumn(val, key, original);
                        },
                        onDeny: (e) => {
                            if (e[0].dataset.event == 'remove') wageList.removeColumn(key, original);
                        },
                        onHidden: () => {
                            $('#edit-column-name').val('');
                        }
                    })
                    .modal('show');
            }
            wageFilter.onRender = () => {
                $('.ui.dropdown.wage-filter').dropdown({});
            }
            wageFilter.onLoadedShowlist = () => {
                $('#filter-showlist-wrapper .ui.checkbox')
                    .checkbox()
            }
            // Wageをロード
            wageFilter.init();

            // Fomantic
            $('.wage-menu .item')
                .tab();
            $('.ui.dropdown.wage')
                .dropdown({
                    clearable: true
                });
            $('.ui.dropdown.button')
                .dropdown();
            $('#wage-year_calendar')
                .calendar({
                    type: 'year',
                    initialDate: wageList.currentYear
                });
            $('.wage-filter-coupled').modal({
                allowMultiple: true
            });

        });
    </script>
</x-layout>
