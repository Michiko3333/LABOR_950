<div class="content">
    <style>
        .filter-column-wrapper {
            background-color: #fff;
        }

        .filter-column-wrapper th {
            height: 25px;
        }

        .filter-column-wrapper td.buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.5em;
        }

        .filter-column-wrapper select {
            min-width: 160px;
            height: 170px;
        }
    </style>
    @script
        <script>
            window.$lw = {
                onSave: () => {
                    $wire.dispatch("{{ $filterSaveTarget }}");
                }
            }
        </script>
    @endscript
    <table class="filter-column-wrapper">
        <thead>
            <tr>
                <th>全ての項目</th>
                <th></th>
                <th>表示項目</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select name="" id="" size="10" wire:key="list_all_select"
                        wire:model.live="value_all">
                        @foreach ($list_all as $item)
                            <option value="{{ $item['value'] }}">{{ $item['name'] }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="buttons">
                    <button type="button" class="ui button icon" wire:click="moveToShow"><i
                            class="angle right icon"></i></button>
                    <button type="button" class="ui button icon" wire:click="moveToAll"><i
                            class="angle left icon"></i></button>
                </td>
                <td>
                    <select name="" id="" size="10" wire:key="list_show_select"
                        wire:model.live="value_show">
                        @foreach ($list_show as $item)
                            <option value="{{ $item['value'] }}">{{ $item['name'] }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="buttons">
                    <button type="button" class="ui button icon" wire:click="moveToUp"><i
                            class="angle up icon"></i></button>
                    <button type="button" class="ui button icon" wire:click="moveToDown"><i
                            class="angle down icon"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
