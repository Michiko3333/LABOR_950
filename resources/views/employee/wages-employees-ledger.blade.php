<x-layout title="賃金台帳" useRightContent="{{ true }}">
    @slot('header')
        <style type="text/css">
            .ui.table {
                border: none;
                borde-radius: 8px;
                margin-top: 0;
            }

            .ui.table>tbody>tr>td {
                padding: 1.6em .7em;
            }

            div.filter {
                background: #f9fafb;
                padding: 1em;
                borde-radius: 8px;
            }

            div.pagination {
                display: flex;
                justify-content: center;
            }

            span.tag {
                display: inline-block;
                background-color: #e8e8e8;
                padding: 0.35em 0.7em;
                line-height: 1;
                color: #0009;
                text-transform: none;
                font-weight: 700;
                border-radius: 0.2em;
            }

            .employee-icon {
                width: 48px;
                height: 48px;
            }

            .employee-icon img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .filter label {
                display: block;
                margin: 0 0 .28571429rem;
                font-size: .8em;
                font-weight: 700;
                text-transform: uppercase;
            }
        </style>
    @endslot
    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">賃金台帳</div>
        </div>
        <h1 class="mt-0">賃金台帳（社員選択）</h1>
        <p>選択した社員の賃金情報を元に、賃金台帳を作成します。</p>

        <div class="ui calendar" id="wage-year_calendar" style="display: inline-block;">
            <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input type="text" placeholder="20xx" maxLength="4" name="wage_year">
            </div>
        </div>

        @if (session('errors'))
            <div class="ui error message">
                <div class="header">入力エラー</div>
                <ul class="list">
                    <li>従業員を１人以上選択してください</li>
                </ul>
            </div>
        @endif

        <div id="FilterModal" class="ui modal small filter-employee-list-modal" style="max-width: 480px;">
            <i class="close icon"></i>
            <div class="actions">
                <button class="ui button cancel" type="button">キャンセル</button>
                <div class="ui approve primary button" onClick="javascript:$lw.onSave()">保存</div>
            </div>
        </div>
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <livewire:wages-employee-list />
            </div>
        </div>
        <div class="py-2" style="text-align: right;">
            <button id="startBtn" type="button" class="ui button primary">確認</button>
        </div>
    </section>
    <script type="module">
        $(document).ready(function() {
            const now = new Date();
            let old = '{{ old('year') }}';
            let year = old ? old : now.getFullYear();
            const filterModal = $('#FilterModal').modal({
                blurring: true
            });
            $('#openFilterColumn').click(_ => {
                filterModal.modal('show');
            });
            $('#startBtn').click(_ => {
                $('#wage-year').val(year);
                $('form#wages-form').submit();
            });
            $('#wage-year').val(year);
            $('#wage-year_calendar')
                .calendar({
                    type: 'year',
                    initialDate: year,
                    formatter: {
                        year: 'YYYY年度'
                    },
                    onChange: (date, text, mode) => {
                        if (date) {
                            year = date.getFullYear();
                        }
                    }
                });
        });
    </script>
</x-layout>
