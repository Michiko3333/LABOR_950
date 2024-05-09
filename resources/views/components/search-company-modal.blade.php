<div id="{{$id ?? ''}}" class="ui modal search-company-modal">
    <i class="close icon"></i>
    <div class="header">
        会社検索
    </div>
    <livewire:search-company-list :id="$id ?? ''" :laborMode="$laborMode ?? false" :selectorName="$selectorName"
        :selectorId="$selectorId" :selectorBrName="$selectorBrName ?? ''" :selectorBrId="$selectorBrId ?? ''"
        :withBranch="$withBranch ?? false" :division="$division ?? ''" />
</div>