<div class="pagination">

    <div class="ui pagination borderless mini menu">
        <a class="item @if ($disableFirst) disabled @endif" wire:click="$parent.onPrev">Previous</a>
        @foreach ($elements as $element)
        <a class="item @if ($currentPage == $element) active @endif"
            wire:click="$parent.movePage({{$element}})">{{$element}}</a>
        @endforeach
        <a class="item @if ($disableLast) disabled @endif" wire:click="$parent.onNext">Next</a>
    </div>
</div>