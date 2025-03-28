<div>
    <h3>標準報酬月額　随時改定表</h3>
    <a class="ui button primary mb-1 button-disable small" type="button" href="javascript:openModal('1',null)">新規入力
    </a>
    <div class="ui form">
        <div style="display: flex; align-items: baseline;">
            <h4 style="margin-right:25px">随時改定年月</h4>
            <div class="field" style="margin-right:25px">
                <select wire:model.live="era" class="ui fluid dropdown" id="era"
                    style="width:160px !important;height:50px;font-size:14px !important;border-radius: 5px !important;">
                    <option value="4">令和</option>
                </select>
            </div>
            <div class="field" style="margin-right:25px">
                <select wire:model.live="year" class="ui fluid dropdown" id="year"
                    style="width:160px !important;height:50px;font-size:14px !important;border-radius: 5px !important;">
                    <option value="">未選択</option>
                    @foreach ($years as $key => $yearLabel)
                        <option value="{{ $key }}">{{ $yearLabel }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field" style="margin-right:50px">
                <select wire:model.live="month" class="ui fluid dropdown" id="month"
                    style="width:160px !important;height:50px;font-size:14px !important;border-radius: 5px !important;">
                    <option value="">未選択</option>
                    @foreach ($months as $key => $monthLabel)
                        <option value="{{ $key }}">{{ $monthLabel }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <table class="ui large table">
                    <thead>
                        <tr>
                            <th style="width: 200px;">従業員氏名</th>
                            <th style="width: 200px;">被保険者番号</th>
                            <th style="width: 200px;">健康保険</th>
                            <th style="width: 200px;">厚生年金保険</th>
                            <th style="width: 100px;"></th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @if ($this->items)
                            @foreach ($this->items as $item)
                                <tr class="card">
                                    <td>{{ $item['employee_last_name'] }}　{{ $item['employee_first_name'] }}</td>
                                    <td>
                                        @if ($item['employment_insured_no'])
                                            {{ $item['employment_insured_no'] }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item['health_insurance'] }}円
                                    </td>
                                    <td>
                                        {{ $item['welfare_annuity_insurance'] }}円
                                    </td>
                                    <td class="right aligned collapsing">
                                        <a class="ui basic primary button button-disable" type="button"
                                            onClick="javascript:openModal('1',{{ $item['id'] }})">
                                            編集
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                @if ($this->items)
                    <livewire:pagination :pagination="$data['pagination']" wire:key="pagination-component" />
                @endif
            </div>
        </div>
    </div>
</div>
