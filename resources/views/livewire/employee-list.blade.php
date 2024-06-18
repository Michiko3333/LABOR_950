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
                <th style="width: 150px;">氏名</th>
                <th style="width: 150px;">部署</th>
                <th style="width: 150px;">役職</th>
                <th style="width: 210px;">事業所</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($data['items'] as $item)
                <tr class="card">
                    <td>{{ $item->last_name }} {{ $item->first_name }}</td>
                    <td>
                        @foreach ($item->departments as $dep)
                            <span class="tag">{{ $dep }}</span>
                        @endforeach
                    </td>
                    <td>{{ empty($item->position_name) ? '-' : $item->position_name }}</td>
                    <td>{{ $item->branch_name }}</td>
                    <td class="right aligned collapsing">
                        @if (
                            $userPermission->isAdmin() ||
                                (!$userPermission->isLabor() && $userPermission->isDirector() && $item->id != $userPermission->employee_id()))
                            <button class="ui basic primary button" type="button"
                                wire:click="toPermission({{ $item->id }})">
                                権限
                            </button>
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
