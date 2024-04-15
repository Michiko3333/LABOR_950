@props(['managerial_position'])

@if ($managerial_position->isNotEmpty())
    @php
        $sortedData = $managerial_position->sortBy('rank');
        $groupedData = $sortedData->groupBy('rank');
    @endphp

    <ul class="list">
        @foreach ($groupedData as $rank => $items)
            <div class="rank-group">
                <h3>ランク： {{ $rank }}</h3>
                <ul class="group-list mb-3">
                    @foreach ($items as $item)
                        <li class="item">
                            <div class="name">{{ $item['name'] }}</div>
                            <div class="actions">
                                <button class="ui button edit modalbtn" wire:click='edit({{ $item["id"] }})' type="button">編集</button>
                                <button class="ui button icon basic negative" type="button" wire:click='remove("{{ $item["id"] }}")'><i class="trash alternate outline icon"></i></button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </ul>
@endif
