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

        .filter-column-wrapper div {
            display: block;
            width: 250px;
            height: 320px;
            overflow-y: auto;
            overflow-x: hidden;
            list-style-type: none;
            padding: 0.2em;
            border: 1px solid rgba(34, 36, 38, .15);
        }

        .filter-column-wrapper div button {
            display: inline-block;
            width: 100%;
            border: none;
            padding-left: 1em;
            user-select: none;
            background-color: transparent;
            text-align: left;
        }

        .filter-column-wrapper div button:hover {
            background-color: #f7f7f7;
        }

        .filter-column-wrapper div button.label {
            padding-left: 0;
            font-weight: bold;
        }

        .filter-column-wrapper div button.active {
            background-color: #4183c4 !important;
            color: white;
        }
    </style>
    @script
        <script>
            window.$lw = {
                onShow: () => {
                    $wire.dispatch("{{ $filterShowTarget }}");
                },
                onSave: () => {
                    $wire.dispatch("{{ $filterSaveTarget }}");
                },
                onFilter: () => {
                    $wire.dispatch("{{ $filterFilterTarget }}");
                },
                onHidden: () => {
                    $wire.dispatch("{{ $filterHiddenTarget }}");
                },
                onReset: () => {
                    $wire.dispatch("{{ $filterResetTarget }}");
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
                    <div>
                        @foreach ($list_all as $k => $item)
                            <button
                                class="{{ $item['parent'] ? '' : 'label' }} {{ $k === $select_all && $item['parent'] ? 'active' : '' }}"
                                wire:click="selectAll({{ $k }})">
                                {{ $item['name'] }}
                            </button>
                        @endforeach
                    </div>
                </td>
                <td class="buttons" style="text-alig: center;">
                    <button type="button" class="ui button icon" wire:click.debounce.180ms="moveToShow"><i
                            class="angle right icon"></i></button>
                    <button type="button" class="ui button icon" wire:click.debounce.180ms="moveToAll"><i
                            class="angle left icon"></i></button>
                </td>
                <td>
                    <div>
                        @foreach ($list_show as $k => $item)
                            <button
                                class="{{ $item['parent'] ? '' : 'label' }} {{ $k === $select_show ? 'active' : '' }}"
                                wire:click="selectShow({{ $k }})">
                                {{ $item['name'] }}
                            </button>
                        @endforeach
                    </div>
                </td>
                <td class="buttons" style="text-alig: center;">
                    <button type="button" class="ui button icon" wire:click.debounce.180ms="moveToUp"><i
                            class="angle up icon"></i></button>
                    <button type="button" class="ui button icon" wire:click.debounce.180ms="moveToDown"><i
                            class="angle down icon"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
