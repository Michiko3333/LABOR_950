<div>
    @if($this->employee_id)
    <div class="content" style="overflow: auto;">
        <table class="ui celled definition table">
            <thead>
                <tr>
                <th></th>
                <th style="min-width: 100px;">現在（新）</th>
                @if(count($this->items) > 1)
                    @for($i = 0; $i < count($this->items) - 1; $i++)
                    <th style="min-width: 100px;">従前（旧）</th>
                    @endfor
                @endif
                </tr>
            </thead>
            <tbody>
                <tr>
                <td style="min-width: 100px;max-width: 100px;width:100px">報酬月額</td>
                <td>{{ $this->items[0]['monthly_standard_salary']}}円</td>
                @if(count($this->items) > 1)
                    @for($i = 0; $i < count($this->items) - 1; $i++)
                    <td>{{ $this->items[$i+1]['monthly_standard_salary']}}円</td>
                    @endfor
                @endif
                </tr>
                <tr>
                <td style="min-width: 100px;max-width: 100px;width:100px">健康保険</td>
                <td>{{ $this->items[0]['health_insurance']}}円</td>
                @if(count($this->items) > 1)
                    @for($i = 0; $i < count($this->items) - 1; $i++)
                <td>{{ $this->items[$i+1]['health_insurance']}}円</td>
                    @endfor
                @endif
                </tr>
                <tr>
                <td style="min-width: 100px;max-width: 100px;width:100px">厚生年金</td>
                <td>{{ $this->items[0]['welfare_annuity_insurance']}}円</td>
                @if(count($this->items) > 1)
                    @for($i = 0; $i < count($this->items) - 1; $i++)
                <td>{{ $this->items[$i+1]['welfare_annuity_insurance']}}円</td>
                    @endfor
                @endif
                </tr>
                <tr>
                <td style="min-width: 100px;max-width: 100px;width:100px">改定年月</td>
                <td>
                    {{ $this->items[0]['revision_date']['japanese_calendar_era_string'] }}
                    {{ $this->items[0]['year'] }}年
                    {{ $this->items[0]['month'] }}月
                </td>
                @if(count($this->items) > 1)
                    @for($i = 0; $i < count($this->items) - 1; $i++)
                <td>
                    {{ $this->items[$i+1]['revision_date']['japanese_calendar_era_string'] }}
                    {{ $this->items[$i+1]['year'] }}年
                    {{ $this->items[$i+1]['month'] }}月
                </td>
                    @endfor
                @endif
                </tr>
            </tbody>
        </table>
    </div>
    @endif
</div>