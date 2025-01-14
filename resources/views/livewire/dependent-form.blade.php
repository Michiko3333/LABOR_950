<div class="dependents-container">
    <style type="text/css">
        .dependent-item {
            background-color: #fff;
        }

        .dependent-item .header {
            display: block;
            width: 100%;
            background-color: transparent;
            border: none;
            color: #13265f;
            font-family: Noto Sans JP, sans-serif;
            font-weight: 700;
            text-align: left;
            cursor: pointer;
        }

        .dependent-item .header i {
            color: gray;
        }

        .dependent-item.close .header i {
            transform: rotate(-90deg);
        }

        .dependent-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content_inner {
            width: 48%;
            box-sizing: border-box;
            padding: 12px;
        }

        .dependent-item.close .dependent-container {
            overflow: hidden;
            height: 0;
        }

        .dependent-item.close .dependent-control {
            display: none;
        }
    </style>
    @foreach ($data as $key => $item)
        @livewire(
            'dependent-form-item',
            [
                'employee' => $employee,
                'item' => $item,
                'key' => $key,
                'list' => [
                    'prefectures' => $prefectures,
                ],
                'errs' => $errs,
                'spouseExists' => $spouseExists,
            ],
            key('dependent-item-' . $key . '-' . $item['de-key'])
        )
    @endforeach
    @foreach ($historyData as $key => $item)
        @livewire(
            'dependent-form-item',
            [
                'employee' => $employee,
                'item' => $item,
                'key' => $key,
                'list' => [
                    'prefectures' => $prefectures,
                ],
                'errs' => $errs,
            ],
            key('dependent-history-item-' . $key . '-' . $item['de-key'])
        )
    @endforeach
    <button class="append-dependent mt-1" type="button" wire:click="append"
        {{ count($data) > 19 ? 'disabled' : '' }}><i class="plus circle icon"></i>追加</button>
</div>
