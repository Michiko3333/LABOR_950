<div wire:key="client-list-component">
    @php
        $company_type = $subList['company_type'];
        $prefecture = $subList['prefecture'];
    @endphp
    <div class="filter">
        <div class="ui left icon input" style="width: 100%; max-width: 300px; margin-right: 3em;">
            <input type="text" placeholder="会社名" wire:model.live="search">
            <i class="search icon"></i>
        </div>
    </div>
    <table class="ui large table">
        <thead>
            <tr>
                <th style="width: 360px;">会社名</th>
                <th style="width: 150px;">法人格</th>
                <th style="width: 150px;">法人番号</th>
                <th>住所</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($data['items'] as $item)
            <tr class="card">
                <td>{{ $item['name'] }}</td>
                <td>{{ $company_type[$item->type_id] ?? 'E' }}</td>
                <td>{{ $item->company_no }}</td>
                <td>{{ $prefecture[$item->prefecture] ?? '' }}　{{ $item->city }}　{{ $item->ward }}　{{ $item->apartment }}</td>
                <td class="right aligned collapsing">
                    <a class="ui basic primary button" href="javascript:openClientModal({{ $item->company_id }})">
                        編集
                    </a>
                    <a class="ui basic primary button" href="javascript:openCancelModal({{ $item->receptionist_id }})">
                        削除
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="ui modal client-modal">
        <div id="client_modal_title" class="header"></div>
        <div class="content">
            <livewire:client-modal-content />
        </div>
    </div>

    <div class="ui tiny modal cancel-modal">
        <div class="header">確認</div>
        <div class="content">
            <livewire:cancel-modal-content />
        </div>
    </div>

    <livewire:pagination :pagination="$data['pagination']" wire:key="pagination-component" />
</div>

@script
    <script type="module">
        window.openClientModal = (companyID) => {
            if(companyID) {
                $('#client_modal_title').text('契約期間を編集');
            } else {
                $('#client_modal_title').text('追加する顧客会社を検索');
            }
            $wire.dispatch('clientModalOpened', { companyID: companyID });
            setTimeout(() => {
                $('.client-modal').modal({
                    blurring: true,
                    onHidden: function() {
                        location.reload();
                    }
                }).modal('show');
            }, 230);
        };
        window.addEventListener('closeClientModal', () => {
            $('.client-modal').modal('hide');
            location.reload();
        });

        window.openCancelModal = (receptionistId) => {
            $wire.dispatch('cancelModalOpened', { receptionistId: receptionistId, managerialPositionId: 0 });
            setTimeout(() => {
                $('.cancel-modal').modal({
                    blurring: true
                }).modal('show');
            }, 200)
        };
        window.closeCancelModal = () => {
            $('.cancel-modal').modal('hide');
        };
        window.addEventListener('closeCancelModal', () => {
            $('.cancel-modal').modal('hide');
            location.reload();
        });
        
        window.addEventListener('contractSuccess', () => {
            $.toast({
                position: 'bottom right',
                class: 'success',
                message: `更新が完了しました`
            });
        });
    </script>
@endscript
