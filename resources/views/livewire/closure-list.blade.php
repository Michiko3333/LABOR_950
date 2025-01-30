@php
    $typeMapping = [
        '1' => '雇用保険：育児休業',
        '2' => '雇用保険：介護休業',
        '3' => '労災保険：傷病休業',
        '4' => '健康保険：産前・産後休業',
        '5' => '健康保険：養育特例休業',
        '6' => '健康保険：傷病休業',
        '7' => '介護保険：介護休業',
    ];
    $statusMapping = [
        '1' => '内定承諾（未社員）',
        '2' => '有期雇用社員',
        '3' => '正社員',
        '9' => '退職者',
    ];
@endphp
<div>
    <table class="ui large table">
        <thead>
            <tr>
                <th style="width: 64px;"></th>
                <th style="width: 250px;">従業員名</th>
                <th style="width: 200px;">所属事務所</th>
                <th style="width: 230px;">休業種類</th>
                <th style="width: 200px;">休業開始日</th>
                <th style="width: 200px;">休業終了日</th>
                <th style="width: 200px;">職場復帰日</th>
                <th style="width: 200px;">出産日</th>
                <th style="width: 200px;"></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($data['items'] as $item)
                <tr class="card">
                    <td>
                        <div class="employee-icon">
                            <img src="{{ $item->icon }}">
                        </div>
                    </td>
                    <td>
                        {{ $item->employee_last_name }} {{ $item->employee_first_name }}<br>
                        {{ $statusMapping[$item->employee_employee_status] }}<br>
                        {{ $item->employee_employee_no }}<br>
                    </td>
                    <td>{{ $item->branch_name }}</td>
                    <td>{{ mb_substr($typeMapping[$item->closure_type], 0, 5) }}<br>　{{ mb_substr($typeMapping[$item->closure_type], 5) }}</td>
                    <td>
                        @if($item->start_date_of_closed)
                        {{ mb_substr($item->start_date_of_closed, 0, 5) }}<br>{{ mb_substr($item->start_date_of_closed, 5) }}
                        @elseif($item->date_of_start_of_foster_care)
                        {{ mb_substr($item->date_of_start_of_foster_care, 0, 5) }}<br>{{ mb_substr($item->date_of_start_of_foster_care, 5) }}<br>
                            （養育開始日）
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        @if($item->end_date_of_losed)
                        {{ mb_substr($item->end_date_of_losed, 0, 5) }}<br>{{ mb_substr($item->end_date_of_losed, 5) }}
                        @elseif($item->planned_end_date_of_closure)
                        {{ mb_substr($item->planned_end_date_of_closure, 0, 5) }}<br>{{ mb_substr($item->planned_end_date_of_closure, 5) }}<br>
                            （予定）
                        @elseif($item->end_date_of_foster_care)
                        {{ mb_substr($item->end_date_of_foster_care, 0, 5) }}<br>{{ mb_substr($item->end_date_of_foster_care, 5) }}<br>
                            （養育終了日）
                        @elseif($item->planned_end_date_of_child_support)
                        {{ mb_substr($item->planned_end_date_of_child_support, 0, 5) }}<br>{{ mb_substr($item->planned_end_date_of_child_support, 5) }}<br>
                            （養育終了予定日）
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        @if($item->date_of_return_to_work)
                        {{ mb_substr($item->date_of_return_to_work, 0, 5) }}<br>{{ mb_substr($item->date_of_return_to_work, 5) }}
                        @elseif($item->date_of_commencement_of_special_childcare_provision)
                        {{ mb_substr($item->date_of_commencement_of_special_childcare_provision, 0, 5) }}<br>{{ mb_substr($item->date_of_commencement_of_special_childcare_provision, 5) }}<br>
                            （養育特例開始日）
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        @if($item->date_of_birth)
                        {{ mb_substr($item->date_of_birth, 0, 5) }}<br>{{ mb_substr($item->date_of_birth, 5) }}
                        @elseif($item->due_date)
                        {{ mb_substr($item->due_date, 0, 5) }}<br>{{ mb_substr($item->due_date, 5) }}<br>
                            （予定）
                        @else
                        -
                        @endif
                    </td>

                    <td class="right aligned collapsing">
                        @if ($userPermission->isWritableFor(14))
                            <a class="ui basic primary button" type="button"
                            onClick="javascript:openModal('{{ $item->closure_type }}', '{{ $typeMapping[$item->closure_type] }}', '{{ $item->id }}')">
                            編集
                            </a>
                        @endif
                        @if ($userPermission->isWritableFor(14))
                            <a class="ui button negative basic" type="button"
                            onClick="javascript:remove({{ $item->id }})">
                            削除
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <livewire:pagination :pagination="$data['pagination']" wire:key="pagination-component" />
</div>