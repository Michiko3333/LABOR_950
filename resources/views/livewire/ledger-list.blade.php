<div>
    <style>
        label{
            display: block;
            margin: 0 0 .28571429rem;
            font-size: .8em;
            font-weight: 700;
            text-transform: uppercase;
        }
    </style>
    <div class="filter" style="display: flex; align-items: center;">
        <div style="margin-right: 1.5em;">
            <label style="font-size:14px">業務別カテゴリー</label>
            <select class="ui fluid selection clearable dropdown big_category" style="width: 300px !important; height:45px;font-size:14px !important;"
            name="big_category_name" wire:model.live="big_category_id">
                <option value="">未選択</option>
                @foreach ($big_categories as $id => $big_category_name)
                    <option value="{{ $id }}">
                        {{ $big_category_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div style="margin-right: 1.5em;">
            <label style="font-size:14px">業務詳細カテゴリー</label>
            <select class="ui fluid selection clearable dropdown medium_category" style="width: 250px !important; height:45px;font-size:14px !important;"
            name="medium_category_name" wire:model.live="medium_category_id">
                <option value="">未選択</option>
                @foreach ($medium_categories as $id => $medium_category_name)
                    <option value="{{ $id }}">
                        {{ $medium_category_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div style="margin-left: auto;">
            <label style="color:transparent">手続名称</label>
            <div class="ui left icon input" style="width: 100%; max-width: 300px; height:45px; margin-right: 1.5em;">
                <input type="text" placeholder="手続名称" wire:model.live="search" autocomplete="off">
                <i class="search icon"></i>
            </div>
        </div>
    </div>

    <table class="ui large table">
        <thead>
            <tr>
                <th style="width: 50px;">手続ID</th>
                <th style="width: 460px;">手続名称</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($data['items'] as $item)
                <tr class="card" id="{{ $item->procedure_id }}">
                    <td>{{ $item->procedure_id }}</td>
                    <td>{{ $item->procedure_name }}</td>
                    <td class="right aligned collapsing">
                        @if ($userPermission->isWritableFor(9))
                            <a href="/ledger/{{ $item->procedure_id }}" onclick="addQueryParameter(event, '{{ $item->procedure_id }}')" class="ui basic primary button">
                                作成
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <livewire:pagination :pagination="$data['pagination']" wire:key="pagination-component" />

    <script type="module">
        $(document).ready(function() {
            sessionStorage.removeItem('pageHistory');

            const urlParams = new URLSearchParams(window.location.search);
            const itemId = urlParams.get('id');

            if (itemId) {
                const element = $(`#${itemId}`);
                if (element) {
                    $('html, body').animate({
                        scrollTop: element.offset().top - ($(window).height() / 2) + (element.outerHeight() / 2)
                    }, 500, function () {
                        element.addClass('fade-highlight');
                    });
                }
            }
        });

        window.addQueryParameter = function(event, id) {
            event.preventDefault();

            const href = event.target.getAttribute('href');
            const nextUrl = new URL(href, window.location.origin);

            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('id', id);
            window.history.pushState({}, '', currentUrl);

            sessionStorage.setItem('pageHistory', JSON.stringify(currentUrl));
            window.location.href = nextUrl.toString();
        }
    </script>
</div>
