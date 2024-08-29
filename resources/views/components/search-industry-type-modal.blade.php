<div id="{{$id ?? ''}}" class="ui modal search-industry-type-modal">
    <i class="close icon"></i>
    <div class="header">
        業種選択
    </div>
    <livewire:search-industry-type-list :companyId="$selectorId ?? ''" />
</div>
