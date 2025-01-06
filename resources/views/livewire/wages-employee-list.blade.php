<div>
    <div class="filter">
        <div class="ui left icon input" style="margin-right: 1em; display: inline-block;">
            <input type="text" placeholder="氏名" wire:model.live="search">
            <i class="search icon"></i>
        </div>
    </div>
    <table class="ui large table">
        <thead>
            <tr>
                <th style="position:relative; width: 50px; text-align: center;">
                    <div class="ui checkbox">
                        <input type="checkbox" name="example">
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
                            <input type="checkbox" name="example" wire:model.live="selected.{{ $item->id }}"
                                {{ $this->checkState($item->id) ? 'checked' : '' }}>
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
        @csrf
        @foreach ($selected as $key => $item)
            @if ($item == 1)
                <input type="hidden" name="selected[]" value="{{ $key }}">
            @endif
        @endforeach
    </form>
</div>
