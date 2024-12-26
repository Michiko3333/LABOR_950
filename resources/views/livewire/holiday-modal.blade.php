<div>
    @script
        <script>
            window.$hm = {
                onInsert: () => $wire.dispatch('holiday-modal-insert'),
                onCancel: () => $wire.dispatch('holiday-modal-cancel')
            }
        </script>
    @endscript
    <table class="ui definition table holiday-table">
        <thead>
            <tr>
                <th></th>
                @foreach ($this->days as $day)
                    <th>{{ $days_ja[$day] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>第1週</td>
                @foreach ($this->days as $day)
                    <td>
                        <input type="checkbox" wire:model.live="week1.{{ $day }}"
                            wire:key="week1.{{ $day }}" />
                    </td>
                @endforeach
            </tr>
            <tr>
                <td>第2週</td>
                @foreach ($this->days as $day)
                    <td>
                        <input type="checkbox" wire:model.live="week2.{{ $day }}"
                            wire:key="week2.{{ $day }}" />
                    </td>
                @endforeach
            </tr>
            <tr>
                <td>第3週</td>
                @foreach ($this->days as $day)
                    <td>
                        <input type="checkbox" wire:model.live="week3.{{ $day }}"
                            wire:key="week3.{{ $day }}" />
                    </td>
                @endforeach
            </tr>
            <tr>
                <td>第4週</td>
                @foreach ($this->days as $day)
                    <td>
                        <input type="checkbox" wire:model.live="week4.{{ $day }}"
                            wire:key="week4.{{ $day }}" />
                    </td>
                @endforeach
            </tr>
            <tr>
                <td>第5週</td>
                @foreach ($this->days as $day)
                    <td>
                        <input type="checkbox" wire:model.live="week5.{{ $day }}"
                            wire:key="week5.{{ $day }}" />
                    </td>
                @endforeach
            </tr>
            <tr>
                <td>第6週</td>
                @foreach ($this->days as $day)
                    <td>
                        <input type="checkbox" wire:model.live="week6.{{ $day }}"
                            wire:key="week6.{{ $day }}" />
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
