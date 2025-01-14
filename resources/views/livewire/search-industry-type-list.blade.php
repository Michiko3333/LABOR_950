<div class="content">
    <div style="display: flex; justify-content: space-between;">
        <div class="field" style="width: 300px;">
            <label style="font-size: .8em; font-weight: 700; text-transform: uppercase;">大分類</label>
            <select class="ui fluid selection clearable dropdown big_category" style="margin-top: 4px;" name="big_category_name" wire:model.live="big_category_code">
                <option value="">未選択</option>
                @foreach ($big_categories as $big_category_code => $big_category_name)
                    <option value="{{ $big_category_code }}">
                        {{ $big_category_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="field" style="width: 300px;">
            <label style="font-size: .8em; font-weight: 700; text-transform: uppercase;">中分類</label>
            <select class="ui fluid selection clearable dropdown medium_category" style="margin-top: 4px;" name="medium_category_name" wire:model.live="medium_category_code">
                <option value="">未選択</option>
                @foreach ($medium_categories as $medium_category_code => $medium_category_name)
                    <option value="{{ $medium_category_code }}">
                        {{ $medium_category_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="field" style="width: 300px;">
            <label style="font-size: .8em; font-weight: 700; text-transform: uppercase;">小分類</label>
            <select class="ui fluid selection clearable dropdown small_category" style="margin-top: 4px;" name="small_category_name" wire:model.live="small_category_code">
                <option value="">未選択</option>
                @foreach ($small_categories as $small_category_code => $small_category_name)
                    <option value="{{ $small_category_code }}">
                        {{ $small_category_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="ui divider"></div>

    <div class="ui header mt-1 mb-2">細分類：</div>
    <div class="ui very relaxed list" style="min-height: 300px;">
        @foreach ($data['items'] as $item)
            @if (in_array($item->id, $industry_types))
            <div class="industry-type-item item py-1" id="{{ $item->id }}" style="background-color: #F4F4E5;">
                <div class="content">
                    <bold class="header ui text primary">{{ $item->tiny_category_name }}</bold>
                    <span class="description" style="">{{ $item->medium_category_name }}</span>
                </div>
            </div>
            @else
            <div class="industry-type-item item py-1" id="{{ $item->id }}">
                <div class="right floated content">
                    <button type="button" class="ui button small"
                        wire:click="addIndustryType({{ $item->id }})">追加</button>
                </div>
                <div class="content">
                    <bold class="header ui text primary">{{ $item->tiny_category_name }}</bold>
                    <span class="description" style="">{{ $item->medium_category_name }}</span>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    <div class="small-pagination" style="text-align:center;">
        <div class="ui pagination borderless mini menu">
            <a class="item pagination-disable @if ($disablePrev) disabled @endif" wire:click="onPrev"><i
                    class="chevron left icon"></i></a>
            <a class="item pagination-disable @if ($disableNext) disabled @endif" wire:click="onNext"><i
                    class="chevron right icon"></i></a>
        </div>
    </div>

    <div class="actions" style="display: flex; justify-content: flex-end;">
        <button class="ui button negative basic">閉じる</button>
    </div>
</div>

<script type="module">
    Livewire.on('checkedIndustryType', (values) => {
        values[0].forEach(function(value) {
            $(`#${value}`).css('background-color', '#F4F4E5');
            $(`#${value} button`).attr('disabled', true);
        });
    });
    Livewire.on('clearIndustryType', () => {
        $('.industry-type-item').css('background-color', '');
        $('.industry-type-item button').attr('disabled', false);
    });

</script>
