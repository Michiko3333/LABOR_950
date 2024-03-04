<div class="pagination">

    <div class="ui pagination borderless mini menu">
        <a class="item @if ($disableFirst) disabled @endif">Previous</a>
        @foreach ($elements as $element)
        <a class="item @if ($currentPage == $element) active @endif">{{$element}}</a>
        @endforeach
        <a class="item @if ($disableLast) disabled @endif">Next</a>
    </div>
</div>