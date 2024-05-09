@props(['departments', 'parent'])

@php
    $filtered = array_filter($departments->toArray(), function ($item) use ($parent) {
        if (empty($parent)) {
            return $item['upper_department_id'] == null;
        } else {
            return $item['upper_department_id'] == $parent;
        }
    });
@endphp

@if (count($filtered) > 0)
    @if (!empty($parent))
        <ul class="list">
    @endif

    @foreach ($filtered as $key => $item)
        <li class="item">
            <div class="name">{{ $item['name'] }}</div>
            <div class="actions">
                <button class="ui button edit" type="button" onclick="openEditModal()"
                    wire:click='edit("{{ $item['id'] }}")'>編集</button>
                <button class="ui button icon basic negative" type="button" wire:click='remove("{{ $item['id'] }}")'><i
                        class="trash alternate outline icon"></i></button>
            </div>
        </li>
        <x-department-rec-list :departments="$departments" parent="{{ $item['id'] }}" />
    @endforeach

    @if (!empty($parent))
        </ul>
    @endif
@endif
