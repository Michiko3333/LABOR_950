<div>
    <!--<div class="filter">
        <div class="ui left icon input" style="width: 100%; max-width: 300px; margin-right: 3em;">
            <input type="text" placeholder="手続名称" wire:model.live="search">
            <i class="search icon"></i>
        </div>
    </div>
-->
    <table class="ui large table">
        <thead>
            <tr>
                <th>案件概要</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($data['items'] as $item)
                <tr class="card"style="font-size: 0.8em;">
                    <td>
                        <p><span class="label-status">{{ $item['status'] }}</span></p>
                        <p>
                            <span
                                style="color: var(--color-blue); font-weight: bold;">到達番号：{{ $item['arrive_id'] }}</span>　到達日時：{{ $item['arrive_date'] }}
                        </p>
                        <p>{{ $item['corporation_name'] }}</p>
                        <p>{{ $item['applicant_name'] }}</p>
                        <p>{{ $item['proc_name'] }}</p>
                    </td>
                    <td></td>
                    <td></td>

                    <td class="right aligned collapsing">
                        <a class="ui basic primary button" href="{{ route('ledger.detail', $item['arrive_id']) }}">
                            詳細
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <livewire:pagination :pagination="$data['pagination']" wire:key="pagination-component" />
</div>
