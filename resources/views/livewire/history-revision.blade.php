<div>
    <h3>改訂履歴</h3>
    <div class="ui card full card-shadow item-0">
        <div class="content">
            <table class="ui large table">
                <thead>
                    <tr>
                        <th style="width: 200px;">従業員氏名</th>
                        <th style="width: 200px;">報酬月額</th>
                        <th style="width: 200px;">健康保険</th>
                        <th style="width: 200px;">厚生年金保険</th>
                        <th style="width: 200px;">改定年月</th>
                        <th style="width: 200px;"></th>
                    </tr>
                </thead>
                    <tbody id="tbody">
                        @if($this->items)
                            @foreach ($this->items as $item)
                                <tr class="card">
                                    <td>{{ $item['employee_last_name'] }}　{{ $item['employee_first_name'] }}</td>
                                    <td>
                                        {{ $item['health_insurance'] }}円
                                    </td>
                                    <td>
                                        {{ $item['welfare_annuity_insurance'] }}円
                                    </td>
                                    <td>
                                        {{ $item['monthly_standard_salary'] }}円
                                    </td>
                                    <td>
                                        {{ $item['revision_date']['japanese_calendar_era_string'] }}
                                        {{ $item['year'] }}年
                                        {{ $item['month'] }}月
                                    </td>
                                    <td class="right aligned collapsing">
                                        <a class="ui basic primary button button-disable" type="button"
                                            onClick="javascript:openHistoryModal('{{ $item['employee_last_name'] }}　{{ $item['employee_first_name'] }}',{{ $item['employee_id'] }})">
                                            履歴
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
            </table>

            <livewire:pagination :pagination="$data['pagination']" wire:key="pagination-component" />
        </div>
    </div>
</div>
