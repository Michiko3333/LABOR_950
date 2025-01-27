<x-layout title="勤怠情報" useRightContent="{{ true }}">
    @slot('header')
        <link rel="stylesheet" href="{{ asset('/css/power-table.css') }}">
        <style type="text/css">
            #pt-showlist-wrapper {
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
            <div class="active section">勤怠情報</div>
        </div>
        <h1 class="mt-0">勤怠情報</h1>

        <div style="padding: 1em 0;">
            <a href="{{ route('attendances.upload') }}" class="ui button primary">インポート</a>
        </div>

        <!-- Power Table List -->
        <div id="pt" class="ui card full card-shadow item-0">
            <div class="content">
                <div class="pt-actions-top">
                    <button class="ui button small" id="pt-filter-button">絞り込み・表示設定</button>
                </div>
                <div id="pt-condition-message" class="ui tiny message"></div>
                <div id="pt-list" class="power-table">
                    <table>
                        <thead>
                            <tr id="pt-list-header">
                            </tr>
                        </thead>
                        <tbody id="pt-list-body"></tbody>
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

        <!-- Power Table Filter -->
        <div id="pt-filter" class="ui modal attendance-filter-coupled">
            <div class="header">絞り込み・表示設定</div>
            <div class="content">
                <form id="pt-filter-form" class="ui form pt-filter-wrapper" onsubmit="return false;">
                    <div class="ui top attached tabular menu pt-filter-menu">
                        <div class="item active" data-tab="filter1" style="cursor: pointer;">絞り込み</div>
                        <div class="item" data-tab="filter3" style="cursor: pointer;">表示・非表示</div>
                    </div>
                    <div class="ui bottom attached tab segment" data-tab="filter1">
                        <div class="fields">
                            <div class="four wide field">
                                <label for="attendance_year_from">年（from）</label>
                                <div class="ui calendar" id="attendance-year_calendar_from"
                                    class="attendance_year_calendar">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" placeholder="20xx" maxLength="4"
                                            name="attendance_year_from">
                                    </div>
                                </div>
                            </div>
                            <div class="four wide field">
                                <label for="attendance_month_from">月（from）</label>
                                <select class="ui fluid dropdown attendance" name="attendance_month_from">
                                    <option value="">指定なし</option>
                                    @for ($i = 1; $i < 13; $i++)
                                        <option value="{{ $i }}">{{ $i }}月</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="wide field">
                                <label for=""></label>
                                <div
                                    style="width: 100%; height: 48px; display: flex; justify-content: center; align-items: center;">

                                    から
                                </div>
                            </div>
                            <div class="four wide field">
                                <label for="attendance_year_to">年（To）</label>
                                <div class="ui calendar" id="attendance-year_calendar_to"
                                    class="attendance_year_calendar">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" placeholder="20xx" maxLength="4"
                                            name="attendance_year_to">
                                    </div>
                                </div>
                            </div>
                            <div class="four wide field">
                                <label for="attendance_month_to">月（To）</label>
                                <select class="ui fluid dropdown attendance" name="attendance_month_to">
                                    <option value="">指定なし</option>
                                    @for ($i = 1; $i < 13; $i++)
                                        <option value="{{ $i }}">{{ $i }}月</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="ui divider"></div>
                        <div class="fields">
                            <div class="four wide field">
                                <label for="attendance_full_name">氏名</label>
                                <input type="text" name="attendance_full_name" placeholder="田中 〇〇">
                            </div>
                            <div class="four wide field">
                                <label for="attendance_branch">所属事業所</label>
                                <select class="ui fluid dropdown attendance" name="attendance_branch">
                                    <option value="">指定なし</option>
                                    @foreach ($branch_list as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="four wide field">
                                <label for="attendance_department">所属部署</label>
                                <select class="ui fluid dropdown attendance" name="attendance_department">
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
                                <select class="ui fluid dropdown attendance" name="employment_type">
                                    <option value="">指定なし</option>
                                    @foreach ($employment_type as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="four wide field">
                                <label for="work_type">勤務区分</label>
                                <select class="ui fluid dropdown attendance" name="work_type">
                                    <option value="">指定なし</option>
                                    @foreach ($work_type as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
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
                    <div class="ui button approve">絞り込む</div>
                    <div class="ui floating dropdown icon button">
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <button type="button" id="pt-filter-save" class="item approve">常時設定として保存する</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script src="{{ asset('/js/power-table-list.js') }}" defer></script>
    <script src="{{ asset('/js/power-table-filter.js') }}" defer></script>
    <script src="{{ asset('/js/attendance-list.js') }}" defer></script>
    <script src="{{ asset('/js/attendance-filter.js') }}" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            const attendanceList = new AttendanceList({
                mode: 'api',
                api: {
                    list: "{{ route('attendances.list') }}",
                    post: "{{ route('attendances.post') }}"
                },
                useEdit: true
            });
            const attendanceFilter = new AttendanceFilter(
                attendanceList, {
                    api: {
                        load: "{{ route('attendances.filter.load') }}",
                        save: "{{ route('attendances.filter.save') }}",
                        remove: "{{ route('attendances.filter.remove') }}",
                        showlist: "{{ route('attendances.filter.showlist') }}"
                    },
                },
            )

            attendanceFilter.onLoadedShowlist = () => {
                $('#pt-showlist-wrapper .ui.checkbox')
                    .checkbox()
            }

            attendanceList.successSubmit = () => {
                $.toast({
                    position: 'bottom right',
                    class: 'success',
                    message: '正常に保存されました'
                })
            };
            attendanceList.errorSubmit = (err) => {
                $.toast({
                    position: 'bottom right',
                    class: 'red',
                    message: 'エラーが発生しました'
                })
            };

            attendanceFilter.run();

            const filterBtn = document.getElementById('pt-filter-button');
            filterBtn.addEventListener('click', () => {
                $('#pt-filter')
                    .modal({
                        onApprove: () => {
                            attendanceFilter.onApprove();
                            attendanceFilter.reload();
                        },
                        onHidden: () => {
                            attendanceFilter.onHidden();
                        }
                    })
                    .modal('show');
            })
            $('.pt-filter-menu .item')
                .tab();
            $('.ui.dropdown.attendance')
                .dropdown({
                    clearable: true
                });
            $('.ui.dropdown.button')
                .dropdown();
            $('#attendance-year_calendar_from')
                .calendar({
                    type: 'year',
                    initialDate: attendanceList.currentYear
                });
            $('#attendance-year_calendar_to')
                .calendar({
                    type: 'year',
                });
        });
    </script>
</x-layout>
