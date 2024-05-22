<div>
    <div style="padding: 1em 0;">
        <button class="ui button primary" onclick="openManagerialPositionModal()" type="button" style="width: 100px;">追加</button>
    </div>

    @if ($managerial_position->isNotEmpty())
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <ul class="list-table">
                    @foreach ($groupedData as $rank => $items)
                        <div class="rank-group">
                            <h3>ランク： {{ $rank }}</h3>
                            <ul class="group-list mb-3">
                                @foreach ($items as $item)
                                    <li class="item">
                                        <div class="name">{{ $item['name'] }}</div>
                                        <div class="actions">
                                            <button class="ui button edit modalbtn" onclick="openEditModal('{{ $item['id'] }}')"
                                                wire:click='edit("{{ $item['id'] }}")' type="button">編集</button>
                                            <button class="ui button icon basic negative" type="button"
                                                onclick="openCancelModal('{{ $item['id'] }}')"><i
                                                    class="trash alternate outline icon"></i></button>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    @else
        <h3>設定されていません</h3>
    @endif

    <div id="editManagerialPosition" class="ui modal mini edit-department-modal">
        <i class="close icon"></i>
        <div class="header">役職の追加</div>
        <div class="content">
            <livewire:managerial-position-modal :company_id="$this->company_id" />
        </div>
    </div>

    <div class="ui tiny modal cancel-modal">
        <div class="header">確認</div>
        <div class="content">
            <livewire:cancel-modal-content />
        </div>
    </div>

    @script
        <script>
            window.openManagerialPositionModal = () => {
                $('#editManagerialPosition').modal({
                    blurring: true,
                    onHidden: function() {
                        location.reload();
                    }
                }).modal('show');
            };
            window.openEditModal = (id) => {
                $wire.dispatch('edit', { id: id });
                setTimeout(() => {
                    $('#editManagerialPosition').modal({
                        blurring: true,
                        onHidden: function() {
                            location.reload();
                        }
                    }).modal('show');
                }, 380);
            };
            window.addEventListener('closeManagerialPositionModal', () => {
                $('#editManagerialPosition').modal('hide');
                location.reload();
            });

            window.openCancelModal = (id) => {
                $wire.dispatch('cancelModalOpened', { receptionistId: 0, managerialPositionId: id });
                setTimeout(() => {
                    $('.cancel-modal').modal({
                        blurring: true
                    }).modal('show');
                }, 200);
            };
            window.closeCancelModal = () => {
                $('.cancel-modal').modal('hide');
            };
            window.addEventListener('closeCancelModal', () => {
                $('.cancel-modal').modal('hide');
                location.reload();
            });
        </script>
    @endscript
</div>
