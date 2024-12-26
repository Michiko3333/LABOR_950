<div>
    <div class="filter">
        <div class="ui left icon input" style="margin-right: 1em; display: inline-block;">
            <input type="text" placeholder="氏名" wire:model.live="search">
            <i class="search icon"></i>
        </div>
        <button id="openFilterColumn" class="ui button">表示項目</button>
    </div>
    <table class="ui large table">
        <thead>
            <tr>
                @foreach ($showColumns as $column)
                    @switch($column['value'])
                        @case('full_name')
                            <th style="width: 150px;">{{ $column['name'] }}</th>
                        @break

                        @case('icon')
                            <th style="width: 64px;">{{ $column['name'] }}</th>
                        @break

                        @case('departments')
                            <th style="width: 150px;">{{ $column['name'] }}</th>
                        @break

                        @case('managerial_position')
                            <th style="width: 100px;">{{ $column['name'] }}</th>
                        @break

                        @case('full_address')
                            <th style="width: 150px;">{{ $column['name'] }}</th>
                        @break

                        @case('branch')
                            <th style="width: 200px;">{{ $column['name'] }}</th>
                        @break

                        @case('tel')
                            <th style="width: 80px;">{{ $column['name'] }}</th>
                        @break

                        @case('email')
                            <th style="width: 100px;">{{ $column['name'] }}</th>
                        @break
                    @endswitch
                @endforeach
                <th></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($data['items'] as $item)
                <tr class="card">
                    @foreach ($showColumns as $column)
                        @switch($column['value'])
                            @case('full_name')
                                <td>{{ $item->last_name }} {{ $item->first_name }}</td>
                            @break

                            @case('icon')
                                <td>
                                    <div class="employee-icon">
                                        <img src="{{ $item->icon }}">
                                    </div>
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

                            @case('full_address')
                                <td>{{ $item->address_prefecture_name }} {{ $item->address_city }}
                                    {{ $item->address_ward }}<br>{{ $item->address_apartment }}</td>
                            @break

                            @case('branch')
                                <td>{{ $item->branch_name }}</td>
                            @break

                            @case('tel')
                                <td>{{ $item->tel_area_code }}-{{ $item->tel_city_code }}-{{ $item->tel_subscriber_code }}
                                </td>
                            @break

                            @case('email')
                                <td>
                                    {{ $item->mail_address1 }}
                                    @if (!empty($item->mail_address2))
                                        <br>{{ $item->mail_address2 }}
                                    @endif
                                </td>
                            @break
                        @endswitch
                    @endforeach

                    <td class="right aligned collapsing">
                        @if ($item->employee_type > 2 && $item->id != $userPermission->employee_id())
                            @if ($userPermission->isAdmin() || (!$userPermission->isLabor() && $userPermission->isDirector()))
                                <button class="ui button" type="button"
                                    wire:click="toPermission({{ $item->id }})">
                                    権限
                                </button>
                            @endif
                        @endif
                        @if ($userPermission->isAdmin() || ($userPermission->isReadableFor(6) && $userPermission->isWritableFor(6)))
                            <button class="ui basic primary button" type="button"
                                wire:click="toEdit({{ $item->id }})">
                                編集
                            </button>
                        @else
                            @if ($userPermission->isReadableFor(6))
                                <button class="ui basic primary button" type="button"
                                    wire:click="toEdit({{ $item->id }})">
                                    詳細
                                </button>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <livewire:pagination :pagination="$data['pagination']" wire:key="pagination-component" />

</div>
