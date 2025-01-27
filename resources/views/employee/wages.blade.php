<x-layout title="賃金情報" useRightContent="{{ true }}">
    @slot('header')
        <link rel="stylesheet" href="{{ asset('/css/power-table.css') }}">
        <style type="text/css">
            #pt-showlist-wrapper {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
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

            #wage-filter-conditions {
                display: flex;
                flex-direction: column;
                width: 100%;
                padding: 1em 1em;
                gap: 1em;
                margin-bottom: 1em;
            }

            #wage-filter-conditions-action {
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
        </style>
        <style type="text/css">

        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">賃金情報</div>
        </div>
        <h1 class="mt-0">賃金情報</h1>

        <div style="padding: 1em 0;">
            <a href="{{ route('wages.upload') }}" class="ui button primary">インポート</a>
        </div>

        <!-- Power Table List -->
        <div id="pt" class="ui card full card-shadow item-0">
            <div class="content">
                <div class="pt-actions-top">
                    <button class="ui button small" id="pt-filter-button">絞り込み・表示設定</button>
                    <button class="ui button small" id="wage-insurance-button">保険対象賃金設定</button>
                </div>
                <div id="pt-condition-message" class="ui tiny message"></div>
                <div id="pt-list" class="power-table">
                    <table>
                        <thead>
                            <tr id="pt-list-header">
                            </tr>
                        </thead>
                        <tbody id="pt-list-body">
                        </tbody>
                    </table>
                </div>
                <div class="pt-actions-bottom">
                    <div style="float:left; padding: 1.1em 0.5em;"><span id="pt-result-num">0</span>件のデータが見つかりました</div>
                    <button class="ui button" id="pt-edit-button">編集</button>
                    <button class="ui button" id="pt-cancel-button">キャンセル</button>
                    <button class="ui button primary" id="pt-submit-button">保存</button>
                </div>
            </div>
        </div>

        <div id="pt-filter" class="ui modal wage-filter-coupled">
            <div class="header">絞り込み・表示設定</div>
            <div class="content">
                <form id="pt-filter-form" class="ui form pt-filter-wrapper" onsubmit="return false;">
                    <div class="ui top attached tabular menu pt-filter-menu">
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
                                    <option value="給与">給与</option>
                                    <option value="賞与">賞与</option>
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
                                <label for="wage_department">所属部署</label>
                                <select class="ui fluid dropdown wage" name="wage_department">
                                    <option value="">指定なし</option>
                                    @foreach ($departments as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="four wide field">
                                <label for="employment_type">雇用区分</label>
                                <select class="ui fluid dropdown wage" name="employment_type">
                                    <option value="">指定なし</option>
                                    @foreach ($employment_type as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="four wide field">
                                <label for="work_type">勤務形態</label>
                                <select class="ui fluid dropdown wage" name="work_type">
                                    <option value="">指定なし</option>
                                    @foreach ($work_type as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="four wide field">
                                <label for="grade">等級区分</label>
                                <select class="ui fluid dropdown wage" name="grade">
                                    <option value="">指定なし</option>
                                    @foreach ($grade as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="four wide field">
                                <label for="gradational_salary">号棒区分</label>
                                <select class="ui fluid dropdown wage" name="gradational_salary">
                                    <option value="">指定なし</option>
                                    @foreach ($gradational_salary as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="four wide field">
                                <label for="other_type">その他区分</label>
                                <select class="ui fluid dropdown wage" name="other_type">
                                    <option value="">指定なし</option>
                                    @foreach ($other_type as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ui bottom attached tab segment" data-tab="filter2">
                        <div id="wage-filter-conditions"></div>
                        <div id="wage-filter-conditions-action">
                            <button type="button" id="add-condition" type="button">条件を追加</button>
                        </div>
                    </div>
                    <div class="ui bottom attached tab segment active" data-tab="filter3">
                        <div id="pt-showlist-wrapper">

                        </div>
                    </div>
                </form>
            </div>
            <div class="actions">
                <div class="ui button basic red remove-ordinary-btn hidden" id="pt-filter-remove"
                    style="float: left;">常時設定を削除</div>
                <div class="ui cancel button">キャンセル</div>
                <div class="ui primary buttons">
                    <button class="ui button approve">絞り込む</button>
                    <div class="ui floating dropdown icon button">
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <button type="button" id="pt-filter-save" class="item approve">常時設定として保存する</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="wage-insurance-modal" class="ui modal tiny">
            <div class="header">保険対象賃金設定</div>
            <div class="content ui form">
                <div class="field">
                    <label for="labor_insurance_target">労働保険対象賃金</label>
                    <select id="labor_insurance_target" multiple="" name="skills"
                        class="ui fluid normal dropdown wage-insurance-dd"></select>
                </div>
                <div class="field">
                    <label for="social_insurance_target">社会保険対象賃金</label>
                    <select id="social_insurance_target" multiple="" name="skills"
                        class="ui fluid normal dropdown wage-insurance-dd"></select>
                </div>
            </div>
            <div class="actions">
                <button class="ui button cancel">キャンセル</button>
                <button class="ui button approve primary">保存</button>
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
    <script src="{{ asset('/js/power-table-list.js') }}" defer></script>
    <script src="{{ asset('/js/power-table-filter.js') }}" defer></script>
    <script src="{{ asset('/js/wage-list2.js') }}" defer></script>
    <script src="{{ asset('/js/wage-filter2.js') }}" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            const wageList = new WageList({
                mode: 'api',
                api: {
                    list: "{{ route('wages.list') }}",
                    post: "{{ route('wages.post') }}",
                    insurance_get: "{{ route('wages.insurance.get') }}",
                    insurance_save: "{{ route('wages.insurance.save') }}",
                },
                useEdit: true
            });
            const wageFilter = new WageFilter(
                wageList, {
                    api: {
                        load: "{{ route('wages.filter.load') }}",
                        save: "{{ route('wages.filter.save') }}",
                        remove: "{{ route('wages.filter.remove') }}",
                        showlist: "{{ route('wages.filter.showlist') }}"
                    },
                },
            )

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

            wageFilter.onRender = () => {
                $('.ui.dropdown.wage-filter').dropdown({});
            }
            wageFilter.onLoadedShowlist = () => {
                $('#pt-showlist-wrapper .ui.checkbox').checkbox()
            }

            wageList.successSubmit = () => {
                $.toast({
                    position: 'bottom right',
                    class: 'success',
                    message: '正常に保存されました'
                })
            };
            wageList.errorSubmit = (err) => {
                $.toast({
                    position: 'bottom right',
                    class: 'red',
                    message: 'エラーが発生しました'
                })
            };

            wageFilter.run();

            $('#wage-insurance-button').click(e => {
                const list = wageList.getCalcableColumns();
                const labors = wageList.labor_insurances;
                const social = wageList.social_insurances;

                const select_labor = $('#labor_insurance_target.wage-insurance-dd');
                const select_social = $('#social_insurance_target.wage-insurance-dd');

                $('#wage-insurance-modal')
                    .modal({
                        onShow: () => {
                            const labors_values = list.map(e => {
                                return {
                                    name: e.name,
                                    value: e.key,
                                    selected: labors.includes(e.key)
                                }
                            });
                            const social_values = list.map(e => {
                                return {
                                    name: e.name,
                                    value: e.key,
                                    selected: social.includes(e.key)
                                }
                            });

                            select_labor
                                .dropdown({
                                    values: labors_values
                                })
                                .dropdown('save defaults');
                            select_social
                                .dropdown({
                                    values: social_values
                                })
                                .dropdown('save defaults');

                        },
                        onHidden: () => {
                            select_labor.dropdown('restore defaults');
                            select_social.dropdown('restore defaults');

                        },
                        onApprove: () => {
                            const labor_insurance_target = document.getElementById(
                                'labor_insurance_target');
                            const social_insurance_target = document.getElementById(
                                'social_insurance_target');

                            const data = {
                                labor: [],
                                social: []
                            }

                            for (let i = 0; i < labor_insurance_target.options.length; i++) {
                                const option = labor_insurance_target.options[i];
                                if (option.selected) {
                                    data.labor.push(option.value);
                                }
                            }
                            for (let i = 0; i < social_insurance_target.options.length; i++) {
                                const option = social_insurance_target.options[i];
                                if (option.selected) {
                                    data.social.push(option.value);
                                }
                            }

                            wageFilter.saveInsurances(data);

                            select_labor.dropdown('save defaults');
                            select_social.dropdown('save defaults');

                            return true;
                        }
                    })
                    .modal('show');
            })

            const filterBtn = document.getElementById('pt-filter-button');
            filterBtn.addEventListener('click', () => {
                $('#pt-filter')
                    .modal({
                        onApprove: () => {
                            wageFilter.onApprove();
                            wageFilter.reload();
                        },
                        onHidden: () => {
                            wageFilter.onHidden();
                        }
                    })
                    .modal('show');
            })
            $('.pt-filter-menu .item')
                .tab();

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
