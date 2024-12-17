<div>
    <div class="filter">
        <div class="ui left icon input" style="width: 100%; max-width: 300px; margin-right: 3em;">
            <input type="text" placeholder="手続名称" wire:model.live="search">
            <i class="search icon"></i>
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
