<div class="content">
    <style>
        .ui.list .item.active {
            background: rgba(151, 145, 0, 0.1);
        }
    </style>
    @if ($errors->any())
        <div class="ui error message">
            <div class="header">入力エラー</div>
            <ul class="list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($this->companyID)
        <div class="ui very relaxed list" style="min-height: 30px;">
            <div class="item">
                <div class="content">
                    <bold class="header ui text primary" style="font-size: 18px;">
                        編集中：{{ $this->receptionistCompanyName }}</bold>
                </div>
            </div>
        </div>
    @endif
    <div class="ui form">
        <div class="two fields">
            <div class="field">
                <label>契約開始年月日</label>
                <div class="ui calendar client-calendar" wire:ignore>
                    <div class="ui fluid input left icon">
                        <i class="calendar icon"></i>
                        <input type="text" id="startCalendar" wire:model.live="startDate" placeholder="YYYY年M月D日">
                    </div>
                </div>
            </div>
            <div class="field">
                <label>契約終了年月日</label>
                <div class="ui calendar client-calendar" wire:ignore>
                    <div class="ui fluid input left icon">
                        <i class="calendar icon"></i>
                        <input type="text" id="endCalendar" wire:model.live="endDate" placeholder="YYYY年M月D日">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (!$this->companyID)
        <div class="ui divider"></div>
        <div style="font-size: .8em; font-weight: 700; text-transform: uppercase; margin-bottom: 8px;">会社検索</div>
        <div class="two fields" style="background-color: #f9fafb; padding: 8px 4px;">
            <div class="field">
                <div class="ui left icon input">
                    <input type="text" placeholder="会社名" maxlength="20" wire:model.live="search"
                        style="width: 280px;">
                    <i class="search icon"></i>
                </div>
            </div>
        </div>
    @endif
    @if (!$this->companyID)

        <div class="ui list" style="">
            @foreach ($data['items'] as $item)
                <div class="item {{ isset($settingText[$item->id]) && $settingText[$item->id] ? 'active' : '' }}"
                    style="width: 100%; display: flex; align-items: center; padding:0.8em;">
                    <div class="content" style="flex-grow: 1; flex-shrink: 0;">
                        <bold class="header ui text primary" style="">{{ $item->name }}</bold>
                    </div>
                    <div class="right floated content" style="flex-grow: 0; flex-shrink: 1;">
                        <button type="button" class="ui button small choice-btn"
                            wire:click="settingID({{ $this->id }}, {{ $item->id }})">
                            @if (isset($settingText[$item->id]) && $settingText[$item->id])
                                選択中
                            @else
                                選択
                            @endif
                        </button>
                    </div>
                </div>
            @endforeach
            @if (count($data['items']) < 1)
                <div class="item" style="width: 100%; display: flex; align-items: center;">
                    <div class="content" style="flex-grow: 1; flex-shrink: 0;">
                        選択可能な顧客会社がありません
                    </div>
                </div>
            @endif
        </div>
    @endif
    @if (!$this->companyID)
        <div class="small-pagination" style="text-align:center;">
            <div class="ui pagination borderless mini menu">
                <a class="item pagination-disable @if ($disablePrev) disabled @endif"
                    wire:click="onPrev"><i class="chevron left icon"></i></a>
                <a class="item pagination-disable @if ($disableNext) disabled @endif"
                    wire:click="onNext"><i class="chevron right icon"></i></a>
            </div>
        </div>
    @endif
    <div style="display: flex; justify-content: flex-end;">
        @if ($this->companyID)
            <button class="ui button primary button-disable" type="button" style="width: 150px;"
                wire:click.debounce.150ms="contractUpdate">更新</button>
        @else
            <button class="ui button primary button-disable" type="button" style="width: 150px;"
                wire:click.debounce.150ms="settingCompany">確定</button>
        @endif
    </div>
</div>

<script>
    function changeButtonText() {
        $('#buttonText').innerText = '選択中';
    }
</script>

@script
    <script type="module">
        $(document).ready(function() {
            $('.client-calendar').calendar({
                type: 'date',
                formatter: {
                    date: 'Y"年"M"月"D"日"'
                },
                text: {
                    days: ['日', '月', '火', '水', '木', '金', '土'],
                    months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                },
                initialDate: "",
            });
        });

        $('#startCalendar').on('change', function() {
            @this.set('startDate', $(this).val());
        });
        $('#endCalendar').on('change', function() {
            @this.set('endDate', $(this).val());
        });
    </script>
@endscript
