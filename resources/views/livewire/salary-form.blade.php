<div>
<script type="module">
    window.salary = () => {
            $('.month-calendar').calendar({
                type: 'month',
                formatter: {
                    month: function (date, settings) {
                        if (!date) return '';
                        var year = date.getFullYear();
                        var month = date.getMonth() + 1;
                        return year + "年" + month + "月";
                    }
                },
                text: {
                    months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                    monthsShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                },
                initialDate: "",
            });
            function getDepartmentList(id, first = false) {
                $.ajax({
                        url: '{{ route('admin.get_departments') }}',
                        data: {
                            company_id: id
                        },
                        type: 'post'
                    })
                    .done((data) => {
                        $('select[name="sa-departments[]"]').empty();
                        data.forEach(element => {
                            $('<option>').attr({
                                value: element.id
                            }).text(element.name).appendTo('select[name="sa-departments[]"]');
                        });
                        $('.ui.dropdown.multiple').dropdown('clear');

                        if (first) {
                            const def = @json(old('departments', $departments));
                            def.forEach(v => {
                                let a = $('select[name="sa-departments[]"] option[value=' + v +
                                    ']').prop(
                                    'selected', true);
                            });
                        }
                    });
            }
        Livewire.dispatch('salary-form-loaded');
    }
</script>
<div class="mb-2 flex-container">
<button type="button" class="ui small grey basic button salary-history-{{ $childKey }}">履歴</button>
<div class="ui modal salary-modal-{{ $childKey }}" wire:ignore>
        <div class="basic header center aligned" style="padding:1.25rem 1.5rem 0">履歴</div>
        <div class="content">
            @if (!$salaryHistory->isEmpty())
            <script>
                var deallineMapping = {
                    '1': '15日',
                    '2': '20日',
                    '3': '25日',
                    '4': '末締め',
                };
                var monthMapping = {
                    '1': '当月',
                    '2': '翌月',
                };
                var dayMapping = {
                    '1': '5日',
                    '2': '10日',
                    '3': '15日',
                    '4': '20日',
                    '5': '25日',
                    '6': '末日',
                    '7': '第1営業日',
                    '8': '第2営業日',
                    '9': '第3営業日',
                    '10': '第4営業日',
                    '11': '第5営業日',
                };
            </script>
            <table class="ui celled table center aligned">
                <thead>
                    <tr>
                        <th>該当部署</th>
                        <th>締め日</th>
                        <th>支払月</th>
                        <th>支払日</th>
                        <th>適用年月</th>
                        <th>登録日付</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($salaryHistory as $historyItem)
                    <tr>
                        <td>{{ $historyItem->department_names }}</td>
                        <td>
                            <script>
                                document.write(deallineMapping['{{ $historyItem->payroll_deadline }}'] || '');
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(monthMapping['{{ $historyItem->payroll_month }}'] || '');
                            </script>
                        </td>
                        <td>
                            <script>
                                document.write(dayMapping['{{ $historyItem->payroll_day }}'] || '');
                            </script>
                        </td>
                        <td>{{ substr($historyItem->applied_date, 0, 7) }}</td>
                        <td>{{ substr($historyItem->created_at, 0, 10) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <div class="header center aligned">該当履歴なし</div>
            @endif
        </div>
        <div class="basic actions">
            <div class="ui negative button">戻る</div>
        </div>
    </div>
</div>
@foreach ($salaryData as $salaryKey => $salaryItem)
    <div class="salary fields">
    <input type="hidden" name="sa-id[{{ $childKey }}][]" value="{{ $salaryItem['sa-id'] }}" />
        <div class="six wide field {{ err_sub($saErrs, 'sa-departments', $childKey, $salaryKey) }}" wire:ignore>
            <label for="sa-departments[]">該当部署</label>
            <select class="ui fluid search dropdown multiple department_select"
                wire:model.live="salaryData.{{ $salaryKey }}.sa-departments"
                multiple="" name="sa-departments[{{ $childKey }}][{{ $salaryKey }}][]">
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="field {{ err_sub($saErrs, 'sa-payroll_deadline', $childKey, $salaryKey) }}">
            <label for="sa-payroll_deadline">締め日</label>
            <select class="ui fluid dropdown" name="sa-payroll_deadline[{{ $childKey }}][]"
                wire:model.live="salaryData.{{ $salaryKey }}.sa-payroll_deadline">
                <option value="">未選択</option>
                <option value="1">15日</option>
                <option value="2">20日</option>
                <option value="3">25日</option>
                <option value="4">末締め</option>
            </select>
        </div>
        <div class="field {{ err_sub($saErrs, 'sa-payroll_month', $childKey, $salaryKey) }}">
            <label for="sa-payroll_month">支払月</label>
            <select class="ui fluid dropdown" name="sa-payroll_month[{{ $childKey }}][]"
                wire:model.live="salaryData.{{ $salaryKey }}.sa-payroll_month">
                <option value="">未選択</option>
                <option value="1">当月</option>
                <option value="2">翌月</option>
            </select>
        </div>
        <div class="field {{ err_sub($saErrs, 'sa-payroll_day', $childKey, $salaryKey) }}">
            <label for="sa-payroll_day">支払日</label>
            <select class="ui fluid dropdown" name="sa-payroll_day[{{ $childKey }}][]"
                wire:model.live="salaryData.{{ $salaryKey }}.sa-payroll_day">
                <option value="">未選択</option>
                <option value="1">5日</option>
                <option value="2">10日</option>
                <option value="3">15日</option>
                <option value="4">20日</option>
                <option value="5">25日</option>
                <option value="6">末日</option>
                <option value="7">第1営業日</option>
                <option value="8">第2営業日</option>
                <option value="9">第3営業日</option>
                <option value="10">第4営業日</option>
                <option value="11">第5営業日</option>
            </select>
        </div>
        <div class="three wide field {{ err_sub($saErrs, 'sa-applied_date', $childKey, $salaryKey) }}">
            <label for="sa-applied_date">適用年月</label>
            <div class="ui calendar month-calendar" wire:ignore>
                <div class="ui fluid input left icon">
                    <i class="calendar icon"></i>
                    <input type="text" name="sa-applied_date[{{ $childKey }}][]"
                        wire:model.live="salaryData.{{ $salaryKey }}.sa-applied_date"
                        placeholder="YYYY年M月">
                </div>
            </div>
        </div>
        @if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
        <div class="field">
            <label></label>
            <button class="ui button icon basic negative button-disable" type="button" wire:click="removeSalary({{ $salaryKey }})"><i
            class="trash alternate outline icon"></i></button>
        </div>
        @endif
    </div>
    <div class="ui divider my-2"></div>
@endforeach
@if ($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2))
        <button class="append-salary button-disable" type="button" wire:click="salaryAppend" id="append-salary_{{ $childKey }}"
            {{ count($salaryData) > 9 ? 'disabled' : '' }}><i class="plus circle icon"></i>追加</button>
@endif
@script
    <script type="module">
        const notReadonly = @json($userPermission->isBasicDepartment() && $userPermission->isWritableFor(2));
        $(document).ready(function() {
            if (notReadonly) salary();
        });
        $(document).off('click', '.salary-history-{{ $childKey }}').on('click', '.salary-history-{{ $childKey }}', function() {
            $('.salary-modal-{{ $childKey }}').modal('show');
        });
        $wire.on('form-appended', () => {
            setTimeout(() => {
                if (notReadonly) salary();
                $('.ui.multiple.search.dropdown').on('change', function(event) {
                var $dropdown = $(this);
                $dropdown.prop('disabled', true).addClass('disabled');
                setTimeout(function() {
                    $dropdown.prop('disabled', false).removeClass('disabled');
                }, 400);
            });
            }, 0);
        });
        $wire.on('removeSalary', (e) => {
            setTimeout(() => {
                if (notReadonly) {
                    salary();
                }
            }, 0);
        });
    </script>
@endscript
<style type="text/css">
    .flex-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
button.append-salary {
width: 100%;
padding: 1em;
color: gray;
font-weight: bold;
border: solid 2px silver;
border-radius: 4px;
background: transparent;
cursor: pointer;
}

button.append-salary:hover {
color: #9e9e9e;
border: solid 2px #cfcfcf;
}

button.append-salary:active {
color: #6b6b6b;
border: solid 2px #adadad;
}
</style>
</div>
