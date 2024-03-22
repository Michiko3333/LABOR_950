<div>
    <div class="filter">
        <div class="ui left icon input" style="width: 100%; max-width: 300px; margin-right: 3em;">
            <input type="text" placeholder="手続名称" wire:model.live="search">
            <i class="search icon"></i>
        </div>
    </div>

    <table class="ui large table">
        <thead>
            <tr>
                <th style="width: 50px;">手続ID</th>
                <th style="width: 460px;">手続名称</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($data['items'] as $item)
            <tr class="card">
                <td>{{ $item->procedure_id }}</td>
                <td>{{ $item->procedure_name }}</td>
                <td class="right aligned collapsing">
                    <a href="/ledger/{{ $item->procedure_id }}" class="ui basic primary button">
                        作成
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    @php
    $pagination = $data['pagination'];
    @endphp

    <livewire:pagination :total="$pagination['totalItems']" :currentPage="$pagination['currentPage']">
</div>
