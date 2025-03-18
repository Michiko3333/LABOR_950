<div>
    <table class="ui large table issues-table">
        <thead>
            <tr>
                <th style="width: 3%;">申請日</th>
                <th style="width: 11%;">申請者</th>
                <th style="width: 14%;">会社名</th>
                <th style="width: 11%;">対象者</th>
                <th style="width: 18%;">手続名</th>
                <th style="width: 18%;">提出先</th>
                <th style="width: 6%; text-align: center;">公文書</th>
                <th style="width: 6%; text-align: center;">コメント</th>
                <th style="width: 10%; text-align: center;">ステータス</th>
                <th style="width: 3%;"></th>
            </tr>
        </thead>
        <tbody id="tbody">
            @if (!empty($data))
                @foreach ($data['items'] as $key => $item)
                    <tr class="card status-color {{ $item['status_color'] }}" id="{{ $item['arrive_id'] }}">
                        <td>
                            <p>{{ $item['arrive_date'] }}</p>
                        </td>
                        <td>
                            <p>{{ $item['applicant_name'] }}</p>
                        </td>
                        <td>
                            <p>{{ $item['corporation_name'] }}</p>
                        </td>
                        <td>
                            <p>-</p>
                        </td>
                        <td>
                            <p>{{ $item['proc_name'] }}</p>
                        </td>
                        <td>
                            <p>{{ $item['submission_destination'] }}</p>
                        </td>
                        <td class="label-area">
                            <p>{{ $item['doc_count'] }}件</p>
                        </td>
                        <td class="label-area">
                            <p>{{ $item['notice_count'] }}件</p>
                        </td>
                        <td class="label-area">
                            <p class="status">{!! $item['status'] !!}</p>
                        </td>
                        <td class="right aligned collapsing">
                            <a class="ui basic primary button" style="font-size: 14px;"
                                onclick="addQueryParameter(event, '{{ $item['arrive_id'] }}')" href="{{ route('ledger.detail', $item['arrive_id']) }}">
                                詳細
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
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
