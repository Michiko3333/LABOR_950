<div class="holidays-container">
    @script
    <script type="module">
        $('#selectYear').on('change', (event) => {
            $wire.dispatch('onChangeYear', { year: event.target.value });
        });
    </script>
    @endscript

    @foreach ($this->data as $key => $item)
        @livewire(
            'holidays-form-item',
            [
                'key' => $key,
                'item' => $item,
                'errs' => $errs,
            ],
            key($key . '-' . json_encode($item))
        )
    @endforeach

    <button class="append-holiday mt-1" type="button" wire:click="append" {{ count($data) > 19 ? 'disabled' : '' }}><i
            class="plus circle icon"></i>入力欄を追加</button>

    <div class="my-4" style="text-align: right; margin-right: 1em;">
        <button class="ui button" type="button" style="width: 200px;" wire:click="copy">前年の項目をコピー</button>
        <button class="ui button primary submit-disable" type="submit" style="width: 200px;">保存</button>
    </div>
</div>
