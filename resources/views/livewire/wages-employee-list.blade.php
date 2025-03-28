<div>
    <div class="filter" style="display: flex; align-items: center;">
        <div style="margin-right: 1.5em;">
            <label style="font-size:14px">氏名</label>
            <div class="ui left icon input" style="margin-right: 1em; display: inline-block;">
                <input style="height:45px;" type="text" placeholder="氏名" wire:model.live="search">
                <i class="search icon"></i>
            </div>
        </div>
        <div style="margin-right: 1.5em;">
            <label style="font-size:14px">役職</label>
            <select class="ui fluid selection clearable dropdown managerial_position"
                style="width: 300px !important; height:45px;font-size:14px !important;"
                name="managerial_position_target" wire:model.live="managerial_position_id">
                <option value="">未選択</option>
                @foreach ($managerial_position_list as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div style="margin-right: 1.5em;">
            <label style="font-size:14px">部署</label>
            <select class="ui fluid selection clearable dropdown department_target"
                style="width: 300px !important; height:45px;font-size:14px !important;" name="department_target"
                wire:model.live="department_id">
                <option value="">未選択</option>
                @foreach ($department_list as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <table class="ui large table">
        <thead>
            <tr>
                <th style="position:relative; width: 50px; text-align: center;">
                    <div class="ui checkbox">
                        <input type="checkbox" name="all_select" value="1" wire:model="all_select"
                            wire:change="checkAll">
                        <label></label>
                    </div>
                </th>
                @foreach ($showColumns as $column)
                    @switch($column['value'])
                        @case('full_name')
                            <th style="width: 280px;">{{ $column['name'] }}</th>
                        @break

                        @case('departments')
                            <th style="width: 200px;">{{ $column['name'] }}</th>
                        @break

                        @case('managerial_position')
                            <th style="width: 100px;">{{ $column['name'] }}</th>
                        @break

                        @case('branch')
                            <th style="width: 200px;">{{ $column['name'] }}</th>
                        @break
                    @endswitch
                @endforeach
                <th></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($data['items'] as $item)
                <tr class="card">
                    <td style="position:relative; text-align: center;">
                        <div class="ui checkbox">
                            <input type="checkbox" name="selected_col" value="{{ $item->id }}" wire:model="selected"
                                wire:key="selected.{{ $item->id }}" wire:change="checkCol">
                            <label></label>
                        </div>
                    </td>

                    @foreach ($showColumns as $column)
                        @switch($column['value'])
                            @case('full_name')
                                <td style="display: flex; align-items: center; gap: 1.5em;">
                                    <div class="employee-icon">
                                        <img src="{{ $item->icon }}">
                                    </div>
                                    <div>{{ $item->last_name }} {{ $item->first_name }}</div>
                                </td>
                            @break

                            @case('departments')
                                <td>
                                    @foreach ($item->departments as $dep)
                                        <span class="tag">{{ $dep }}</span>
                                    @endforeach
                                </td>
                            @break

                            @case('managerial_position')
                                <td>{{ empty($item->position_name) ? '-' : $item->position_name }}</td>
                            @break

                            @case('branch')
                                <td>{{ $item->branch_name }}</td>
                            @break
                        @endswitch
                    @endforeach

                    <td class="right aligned collapsing">

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <livewire:pagination :pagination="$data['pagination']" wire:key="pagination-component" />
    <form id="wages-form" action="{{ route('wages-ledger.edit') }}" method="post">
        <input type="hidden" id="wage-year" name="year">
        @csrf
        @foreach ($selected as $v)
            <input type="hidden" name="selected[]" wire:key="val-{{ $v }}" value="{{ $v }}">
        @endforeach
    </form>
</div>
