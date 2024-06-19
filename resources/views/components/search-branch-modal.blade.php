<div id="{{$id ?? ''}}" class="ui modal search-company-modal">
    <i class="close icon"></i>
    <div class="header">
        支店検索
    </div>
    <livewire:search-branch-list :id="$id ?? ''" :laborMode="$laborMode ?? false" :selectorBrName="$selectorBrName ?? ''" 
        :selectorBrId="$selectorBrId ?? ''" :division="$division ?? ''" />
</div>