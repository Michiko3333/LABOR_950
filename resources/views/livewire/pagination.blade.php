<div class="pagination">

    <div class="ui pagination borderless mini menu">
        <a class="item pagination-disable @if ($disableFirst) disabled @endif"
            wire:click="$parent.onPrev">Previous</a>
        @foreach ($elements as $element)
            <a class="item @if ($currentPage == $element) active @endif"
                wire:click="$parent.movePage({{ $element === '...' ? 0 : $element }})">{{ $element }}</a>
        @endforeach
        <a class="item pagination-disable @if ($disableLast) disabled @endif"
            wire:click="$parent.onNext">Next</a>
    </div>

    <script type="module">
        Livewire.on('pageMemory', (page) => {
            const currentUrl = new URL(window.location.href);
            currentUrl.search = '';
            currentUrl.searchParams.set('p', page[0]);
            window.history.replaceState({}, '', currentUrl);
        });
    </script>
</div>
