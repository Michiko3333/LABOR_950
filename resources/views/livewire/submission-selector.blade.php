<div class="ui form submission-selector">
    <div class="field required">
        <label for="selected_prefecture">大分類（都道府県）</label>
        <select class="ui fluid dropdown searchable" name="selected_prefecture" wire:model.live="selected_prefecture">
            <option value="">未選択</option>
            @foreach ($prefectures as $p)
                <option value="{{ $p->name }}">{{ $p->name }}
                </option>
            @endforeach
        </select>
    </div>
    @if ($mode === 0)
        <div class="field required">
            <label for="selected_hello_work">中分類（公共職業安定所）</label>
            <select class="ui fluid dropdown searchable" name="selected_hello_work"
                wire:model.live="selected_hello_work">
                <option value="">未選択</option>
                @foreach ($hello_work_list as $h)
                    <option value="{{ $h->id }}">
                        {{ $h->submit_name_d }}
                    </option>
                @endforeach
            </select>
        </div>
    @endif
    @if ($mode === 1)
        <div class="field required">
            <label for="selected_pension_office">中分類（年金事務所）</label>
            <select class="ui fluid dropdown searchable" name="selected_pension_office"
                wire:model.live="selected_pension_office">
                <option value="">未選択</option>
                @foreach ($pension_office_list as $h)
                    <option value="{{ $h->id }}">{{ $h->submit_name_e }}
                    </option>
                @endforeach
            </select>
        </div>
    @endif

    <input type="text" name="apply_to_code" style="display: none;" wire:model.live='apply_to_code' readonly>
    <input type="text" name="apply_to_name" style="display: none;" wire:model.live='apply_to_name' readonly>
</div>
