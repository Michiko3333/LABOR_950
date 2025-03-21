<div>
    <div class="filter">
        <div class="ui left icon input" style="margin-right: 1em; display: inline-block;">
            <input type="text" placeholder="氏名" wire:model.live="search" autocomplete="off">
            <i class="search icon"></i>
        </div>
        <button id="openFilterColumn" class="ui button">表示項目</button>
    </div>
    <div style="max-width: 100%; overflow-x: auto;">
        <table class="ui large table" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th style="width: 300px;">氏名</th>
                    @foreach ($showColumns as $column)
                        @switch($column['value'])
                            @case('belong')
                                <th style="width: 150px;">{{ $column['name'] }}</th>
                            @break

                            @default
                                <th style="width: 150px;">{{ $column['name'] }}</th>
                        @endswitch
                    @endforeach
                    <th style="width: 220px;"></th>
                </tr>
            </thead>
            <tbody id="tbody">
                @foreach ($data['items'] as $item)
                    <tr class="card" id="{{ $item->id }}">
                        <td>
                            <div class="base-data">
                                <div class="employee-icon">
                                    <img src="{{ $item->icon }}">
                                </div>
                                <div class="employee-info">
                                    <div>名前：<b>{{ $item->last_name }} {{ $item->first_name }}</b></div>
                                    <div>雇用：{{ $item->employee_status_name }}</div>
                                    <div>番号：{{ $item->employee_no }}</div>
                                </div>
                            </div>
                        </td>

                        @foreach ($showColumns as $column)
                            @switch($column['value'])
                                @case('belong')
                                    <td>
                                        <p>{{ $item->branch_name }}</p>
                                        @foreach ($item->departments as $dep)
                                            <span class="tag">{{ $dep }}</span>
                                        @endforeach
                                    </td>
                                @break

                                @case('qualification')
                                    <td>
                                        @foreach ($item->qualifications as $n)
                                            <span class="tag">{{ $n }}</span>
                                        @endforeach
                                    </td>
                                @break

                                @case('hired_date')
                                    <td>{{ $this->formatDate($item->hired_date) }}</td>
                                @break

                                @case('birth_date')
                                    <td>{{ $this->formatDate($item->birthday) }}</td>
                                @break

                                @case('full_address')
                                    <td>
                                        {{ $item->address_prefecture_name }} {{ $item->address_city }} {{ $item->address_ward }}
                                        {{ $item->address_apartment }}
                                    </td>
                                @break

                                @case('employment_insured_date')
                                    <td>{{ $this->formatDate($item->employment_insured_date) }}</td>
                                @break

                                @case('employment_not_insured_date')
                                    <td>{{ $this->formatDate($item->employment_not_insured_date) }}</td>
                                @break

                                @case('insured_status')
                                    <td>{{ $this->format_insured_status($item->insured_status) }}</td>
                                @break

                                @case('health_insurance_acquisition_date')
                                    <td>{{ $this->formatDate($item->health_insurance_acquisition_date) }}</td>
                                @break

                                @case('health_insurance_loss_date')
                                    <td>{{ $this->formatDate($item->health_insurance_loss_date) }}</td>
                                @break

                                @case('overseas_special_exception_date')
                                    <td>{{ $this->formatDate($item->overseas_special_exception_date) }}</td>
                                @break

                                @case('overseas_special_not_exception_date')
                                    <td>{{ $this->formatDate($item->overseas_special_not_exception_date) }}</td>
                                @break

                                @case('acquisition_of_distinction')
                                    <td>{{ $this->format_acquisition_of_distinction($item->acquisition_of_distinction) }}</td>
                                @break

                                @case('overseas_special_exception')
                                    <td>{{ $this->format_overseas_special_exception($item->overseas_special_exception) }}</td>
                                @break

                                @case('welfare_pension')
                                    <td>{{ $this->format_welfare_pension($item->welfare_pension) }}</td>
                                @break

                                @case('stay_date_period')
                                    <td>{{ $this->formatDate($item->stay_date_period) }}</td>
                                @break

                                @case('unauthorized_activities_permission_flg')
                                    <td>{{ $item->unauthorized_activities_permission_flg ? '有' : '無' }}</td>
                                @break

                                @case('country_id')
                                    <td>{{ $this->format_country_id($item->country_id) }}</td>
                                @break

                                @case('residential_status_id')
                                    <td>{{ $this->format_residential_status_id($item->residential_status_id) }}</td>
                                @break

                                @case('dispatch_contract_completion')
                                    <td>{{ $this->format_dispatch_contract_completion($item->dispatch_contract_completion) }}</td>
                                @break

                                @default
                                    <td>
                                        @if (!empty($item[$column['value']]))
                                            {{ $item[$column['value']] }}
                                        @else
                                            -
                                        @endif
                                    </td>
                            @endswitch
                        @endforeach

                        <td class="right aligned collapsing">
                            @if ($item->employee_type > 2 && $item->id != $userPermission->employee_id())
                                @if ($userPermission->isAdmin() || (!$userPermission->isLabor() && $userPermission->isDirector()))
                                    <button class="ui button" type="button"
                                        wire:click="toPermission({{ $item->id }})">
                                        権限
                                    </button>
                                @endif
                            @endif
                            @if ($userPermission->isAdmin() || ($userPermission->isReadableFor(6) && $userPermission->isWritableFor(6)))
                                <a href="/employee/edit/{{ $item->id }}" onclick="addQueryParameter(event, '{{ $item->id }}')" class="ui basic primary button">
                                    編集
                                </a>
                            @else
                                @if ($userPermission->isReadableFor(6))
                                    <a href="/employee/edit/{{ $item->id }}" onclick="addQueryParameter(event, '{{ $item->id }}')" class="ui basic primary button">
                                        詳細
                                    </a>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

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
                    }, 800, function () {
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
