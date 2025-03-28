<x-layout title="pick up設定" mode="">
    @slot('header')
    <style type="text/css">
        .setting-data-area {
            width: 100%;
        }

        .setting-data-area .item-heading {
            margin: 2rem 0 0.5rem 0;
        }

        .setting-data-area p {
            margin: 0;
            font-size: 16px;
            line-height: 40px;
        }

        .setting-data-area span {
            font-size: 16px;
            line-height: 40px;
        }

        .setting-data-area .setting-input {
            width: 80px !important;
            height: 40px;
            padding: 4px !important;
            text-align: center;
        }

        .setting-data-area .label {
            font-size: 16px;
        }

        .setting-data-area .officer-select {
            width: 300px !important;
        }

        .setting-data-area .month-day-inputs {
            display: flex;
            font-size: 16px
        }

        .setting-data-area .under-line {
            margin: 2rem 0 0 0;
        }
    </style>
    @endslot

    <section class="content pb-3">
        <div class="ui huge breadcrumb mb-0 mb-2">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">Pick up設定</div>
        </div>
        <h1 class="mb-2 mt-0">Pick up設定</h1>
        <form class="ui form" action="{{ route('pickup.pick_up_setting') }}" method="post">
            @csrf
            @if (session('errors'))
                <div class="ui error message">
                    <div class="header">入力エラー</div>
                    <ul class="list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="setting-data-area">
                <div class="ui card full card-shadow">
                    <div class="content">
                        <div class="field {{ err($errors, 'nursing_care_insurance_premium_deduction_begins') }}">
                            <h4 style="margin: 1.5rem 0 0.5rem 0;">40歳 介護保険料の控除開始</h4>
                            <p>該当者の誕生日の
                                @if(isset($pickupSetting))
                                    <input type="number" class="setting-input" name="nursing_care_insurance_premium_deduction_begins" autocomplete="off"
                                        value="{{ old('nursing_care_insurance_premium_deduction_begins', $pickupSetting->nursing_care_insurance_premium_deduction_begins) }}" min="1" max="365">
                                @else
                                    <input type="number" class="setting-input" name="nursing_care_insurance_premium_deduction_begins" autocomplete="off"
                                        value="{{ old('nursing_care_insurance_premium_deduction_begins') ?? 60 }}" min="1" max="365">
                                @endif
                                日前から通知開始
                            </p>
                        </div>
                        <div class="ui divider under-line"></div>

                        <div class="field {{ err($errors, 'application_for_attainment_wage_certificate') }}">
                            <h4 class="item-heading">60歳 到達時賃金証明書の申請</h4>
                            <p>該当者の誕生日の
                                @if(isset($pickupSetting))
                                    <input type="number" class="setting-input" name="application_for_attainment_wage_certificate" autocomplete="off"
                                        value="{{ old('application_for_attainment_wage_certificate', $pickupSetting->application_for_attainment_wage_certificate) }}" min="1" max="365">
                                @else
                                    <input type="number" class="setting-input" name="application_for_attainment_wage_certificate" autocomplete="off"
                                        value="{{ old('application_for_attainment_wage_certificate') ?? 30 }}" min="1" max="365">
                                @endif
                                日前から通知開始
                            </p>
                        </div>
                        <div class="ui divider under-line"></div>

                        <div class="field {{ err($errors, 'end_of_nursing_care_insurance_premium_deduction') }}">
                            <h4 class="item-heading">65歳 介護保険料の控除終了</h4>
                            <p>該当者の誕生日の
                                @if(isset($pickupSetting))
                                    <input type="number" class="setting-input" name="end_of_nursing_care_insurance_premium_deduction" autocomplete="off"
                                        value="{{ old('end_of_nursing_care_insurance_premium_deduction', $pickupSetting->end_of_nursing_care_insurance_premium_deduction) }}" min="1" max="365">
                                @else
                                    <input type="number" class="setting-input" name="end_of_nursing_care_insurance_premium_deduction" autocomplete="off"
                                        value="{{ old('end_of_nursing_care_insurance_premium_deduction') ?? 30 }}" min="1" max="365">
                                @endif
                                日前から通知開始
                            </p>
                        </div>
                        <div class="ui divider under-line"></div>

                        <div class="field {{ err($errors, 'loss_of_eligibility_for_employees_pension_insurance') }}">
                            <h4 class="item-heading">70歳 厚生年金保険被保険者の資格喪失</h4>
                            <p>該当者の誕生日の
                                @if(isset($pickupSetting))
                                    <input type="number" class="setting-input" name="loss_of_eligibility_for_employees_pension_insurance" autocomplete="off"
                                        value="{{ old('loss_of_eligibility_for_employees_pension_insurance', $pickupSetting->loss_of_eligibility_for_employees_pension_insurance) }}" min="1" max="365">
                                @else
                                    <input type="number" class="setting-input" name="loss_of_eligibility_for_employees_pension_insurance" autocomplete="off"
                                        value="{{ old('loss_of_eligibility_for_employees_pension_insurance') ?? 30 }}" min="1" max="365">
                                @endif
                                日前から通知開始
                            </p>
                        </div>
                        <div class="ui divider under-line"></div>

                        <div class="field {{ err($errors, 'loss_of_health_insurance_status') }}">
                            <h4 class="item-heading">75歳 健康保険被保険者の資格喪失</h4>
                            <p>該当者の誕生日の
                                @if(isset($pickupSetting))
                                    <input type="number" class="setting-input" name="loss_of_health_insurance_status" autocomplete="off"
                                        value="{{ old('loss_of_health_insurance_status', $pickupSetting->loss_of_health_insurance_status) }}" min="1" max="365">
                                @else
                                    <input type="number" class="setting-input" name="loss_of_health_insurance_status" autocomplete="off"
                                        value="{{ old('loss_of_health_insurance_status') ?? 30 }}" min="1" max="365">
                                @endif
                                日前から通知開始
                            </p>
                        </div>
                        <div class="ui divider under-line"></div>

                        <h4 class="item-heading">労働保険年度更新</h4>
                        <div class="month-day-inputs">
                            @if(isset($pickupSetting))
                                <div class="field {{ err($errors, 'labor_insurance_annual_renewal_start_month') }}">
                                    <input type="number" class="setting-input" name="labor_insurance_annual_renewal_start_month" autocomplete="off"
                                        value="{{ old('labor_insurance_annual_renewal_start_month', $labor_insurance_annual_renewal_start_month) }}" min="1" max="12"><span>月</span>
                                </div>
                                <div class="field {{ err($errors, 'labor_insurance_annual_renewal_start_day') }}">
                                <input type="number" class="setting-input" name="labor_insurance_annual_renewal_start_day" autocomplete="off"
                                    value="{{ old('labor_insurance_annual_renewal_start_day', $labor_insurance_annual_renewal_start_day) }}" min="1" max="31"><span>日</span>
                                </div>
                            @else
                                <div class="field {{ err($errors, 'labor_insurance_annual_renewal_start_month') }}">
                                    <input type="number" class="setting-input" name="labor_insurance_annual_renewal_start_month" autocomplete="off"
                                        value="{{ old('labor_insurance_annual_renewal_start_month') ?? 5 }}" min="1" max="12"><span>月</span>
                                </div>
                                <div class="field {{ err($errors, 'labor_insurance_annual_renewal_start_day') }}">
                                    <input type="number" class="setting-input" name="labor_insurance_annual_renewal_start_day" autocomplete="off"
                                        value="{{ old('labor_insurance_annual_renewal_start_day') ?? 1 }}" min="1" max="31"><span>日</span>
                                </div>
                            @endif
                            <span>から7月10日の間通知</span>
                        </div>
                        <div class="ui divider under-line"></div>

                        <h4 class="item-heading">年末調整</h4>
                        <div class="month-day-inputs">
                            @if(isset($pickupSetting))
                                <div class="field {{ err($errors, 'year_end_tax_adjustment_start_month') }}">
                                    <input type="number" class="setting-input" name="year_end_tax_adjustment_start_month" autocomplete="off"
                                        value="{{ old('year_end_tax_adjustment_start_month', $year_end_tax_adjustment_start_month) }}" min="1" max="12"><span>月</span>
                                </div>
                                <div class="field {{ err($errors, 'year_end_tax_adjustment_start_day') }}">
                                    <input type="number" class="setting-input" name="year_end_tax_adjustment_start_day" autocomplete="off"
                                        value="{{ old('year_end_tax_adjustment_start_day', $year_end_tax_adjustment_start_day) }}"  min="1" max="31"><span>日</span>
                                </div>
                            @else
                                <div class="field {{ err($errors, 'year_end_tax_adjustment_start_month') }}">
                                    <input type="number" class="setting-input" name="year_end_tax_adjustment_start_month" autocomplete="off"
                                        value="{{ old('year_end_tax_adjustment_start_month') ?? 12 }}" min="1" max="12"><span>月</span>
                                </div>
                                <div class="field {{ err($errors, 'year_end_tax_adjustment_start_day') }}">
                                    <input type="number" class="setting-input" name="year_end_tax_adjustment_start_day" autocomplete="off"
                                        value="{{ old('year_end_tax_adjustment_start_day') ?? 1 }}" min="1" max="31"><span>日</span>
                                </div>
                            @endif
                            <span>から</span>
                            @if(isset($pickupSetting))
                                <div class="field {{ err($errors, 'year_end_tax_adjustment_end_month') }}">
                                    <input type="number" class="setting-input" name="year_end_tax_adjustment_end_month" autocomplete="off"
                                        value="{{ old('year_end_tax_adjustment_end_month', $year_end_tax_adjustment_end_month) }}" min="1" max="12"><span>月</span>
                                </div>
                                <div class="field {{ err($errors, 'year_end_tax_adjustment_end_day') }}">
                                    <input type="number" class="setting-input" name="year_end_tax_adjustment_end_day" autocomplete="off"
                                        value="{{ old('year_end_tax_adjustment_end_day', $year_end_tax_adjustment_end_day) }}" min="1" max="31"><span>日</span>
                                </div>
                            @else
                                <div class="field {{ err($errors, 'year_end_tax_adjustment_end_month') }}">
                                    <input type="number" class="setting-input" name="year_end_tax_adjustment_end_month" autocomplete="off"
                                        value="{{ old('year_end_tax_adjustment_end_month') ?? 12 }}" min="1" max="12"><span>月</span>
                                </div>
                                <div class="field {{ err($errors, 'year_end_tax_adjustment_end_day') }}">
                                    <input type="number" class="setting-input" name="year_end_tax_adjustment_end_day" autocomplete="off"
                                        value="{{ old('year_end_tax_adjustment_end_day') ?? 31 }}" min="1" max="31"><span>日</span>
                                </div>
                            @endif
                            <span>の間通知</span>
                            </div>
                        <div class="ui divider under-line"></div>

                        <div class="field {{ err($errors, 'retirement_age') }}">
                            <h4 class="item-heading">定年退職</h4>
                            <p>定年退職
                                @if(isset($pickupSetting))
                                    <input type="number" class="setting-input" name="retirement_age" autocomplete="off"
                                        value="{{ old('retirement_age', $pickupSetting->retirement_age) }}" min="" max="">歳
                                @else
                                    <input type="number" class="setting-input" name="retirement_age" autocomplete="off"
                                        value="{{ old('retirement_age') ?? 65 }}" min="" max="">歳
                                @endif
                            </p>
                        </div>
                        <div class="field {{ err($errors, 'retirement') }}">
                            <p>該当者の誕生日の
                                @if(isset($pickupSetting))
                                    <input type="number" class="setting-input" name="retirement" autocomplete="off"
                                        value="{{ old('retirement', $pickupSetting->retirement) }}" min="1" max="365">
                                @else
                                    <input type="number" class="setting-input" name="retirement" autocomplete="off"
                                        value="{{ old('retirement') ?? 365 }}" min="1" max="365">
                                @endif
                                日前から通知開始
                            </p>
                        </div>
                        <div class="ui divider under-line"></div>

                        <div class="field  {{ err($errors, 'officers') }}">
                            <h4 class="item-heading">役員の誕生日</h4>
                            <div style="width: 50%; margin-bottom: 1rem;">
                                <label for="officers[]" class="label">通知対象</label>
                                <select name="officers[]" multiple="" class="ui fluid dropdown">
                                    <option value="">未選択</option>
                                </select>
                            </div>
                            <div class="field {{ err($errors, 'officers_birthday') }}">
                                <p>該当者の誕生日の
                                    @if(isset($pickupSetting))
                                        <input type="number" class="setting-input" name="officers_birthday" autocomplete="off"
                                            value="{{ old('officers_birthday', $pickupSetting->officers_birthday) }}" min="1" max="365">
                                    @else
                                        <input type="number" class="setting-input" name="officers_birthday" autocomplete="off"
                                            value="{{ old('officers_birthday') ?? 1 }}" min="1" max="365">
                                    @endif
                                    日前から通知開始
                                </p>
                            </div>
                        </div>
                        <div class="ui divider under-line"></div>

                        <div class="field {{ err($errors, 'settlement_date') }}">
                            <h4 class="item-heading">決算日</h4>
                            <p>該当企業の決算日の
                                @if(isset($pickupSetting))
                                    <input type="number" class="setting-input" name="settlement_date" autocomplete="off"
                                        value="{{ old('settlement_date', $pickupSetting->settlement_date) }}" min="1" max="365">
                                @else
                                    <input type="number" class="setting-input" name="settlement_date" autocomplete="off"
                                        value="{{ old('settlement_date') ?? 30 }}" min="1" max="365">
                                @endif
                                日前から通知開始
                            </p>
                        </div>
                        <div class="ui divider under-line"></div>

                        <div class="field {{ err($errors, 'start_of_closure') }}">
                            <h4 class="item-heading">休業開始</h4>
                            <p>対象者の休業開始日の
                                @if(isset($pickupSetting))
                                    <input type="number" class="setting-input" name="start_of_closure" autocomplete="off"
                                        value="{{ old('start_of_closure', $pickupSetting->start_of_closure) }}" min="1" max="365">
                                @else
                                    <input type="number" class="setting-input" name="start_of_closure" autocomplete="off"
                                        value="{{ old('start_of_closure') ?? 30 }}" min="1" max="365">
                                @endif
                                日前から通知開始
                            </p>
                        </div>
                        <div class="ui divider under-line"></div>

                        <div class="field {{ err($errors, 'end_of_closure') }}">
                            <h4 class="item-heading">休業終了</h4>
                            <p>対象者の休業終了日の
                                @if(isset($pickupSetting))
                                    <input type="number" class="setting-input" name="end_of_closure" autocomplete="off"
                                        value="{{ old('end_of_closure', $pickupSetting->end_of_closure) }}" min="1" max="365">
                                @else
                                    <input type="number" class="setting-input" name="end_of_closure" autocomplete="off"
                                        value="{{ old('end_of_closure') ?? 30 }}" min="1" max="365">
                                @endif
                                日前から通知開始
                            </p>
                        </div>
                        <div class="ui divider under-line"></div>

                        <div class="field {{ err($errors, 'change_in_dependent_status') }}">
                            <h4 class="item-heading">扶養変更</h4>
                            <p>扶養開始後
                                @if(isset($pickupSetting))
                                    <input type="number" class="setting-input" name="change_in_dependent_status" autocomplete="off"
                                        value="{{ old('change_in_dependent_status', $pickupSetting->change_in_dependent_status) }}" min="1" max="365">
                                @else
                                    <input type="number" class="setting-input" name="change_in_dependent_status" autocomplete="off"
                                        value="{{ old('change_in_dependent_status') ?? 5 }}" min="1" max="365">
                                @endif
                                日間通知
                            </p>
                        </div>
                        <div class="ui divider under-line"></div>

                        <div class="field {{ err($errors, 'subsidies_and_grants') }}">
                            <h4 class="item-heading">助成金・補助金等</h4>
                            <p>申請開始日の
                                @if(isset($pickupSetting))
                                    <input type="number" class="setting-input" name="subsidies_and_grants" autocomplete="off"
                                        value="{{ old('subsidies_and_grants', $pickupSetting->subsidies_and_grants) }}" min="1" max="365">
                                @else
                                    <input type="number" class="setting-input" name="subsidies_and_grants" autocomplete="off"
                                        value="{{ old('subsidies_and_grants') ?? 30 }}" min="1" max="365">
                                @endif
                                日前から通知開始
                            </p>
                        </div>
                        <div class="ui divider under-line"></div>

                        <h4 class="item-heading">高齢者雇用状況報告書・障碍者状況等報告書</h4>
                        <div class="month-day-inputs">
                            @if(isset($pickupSetting))
                                <div class="field {{ err($errors, 'report_on_the_status_of_elderly_and_disabled_people_month') }}">
                                    <input type="number" class="setting-input" name="report_on_the_status_of_elderly_and_disabled_people_month" autocomplete="off"
                                        value="{{ old('report_on_the_status_of_elderly_and_disabled_people_month', $report_on_the_status_of_elderly_and_disabled_people_month) }}" min="1" max="7"><span>月</span>
                                </div>
                                <div class="field {{ err($errors, 'report_on_the_status_of_elderly_and_disabled_people_day') }}">
                                    <input type="number" class="setting-input" name="report_on_the_status_of_elderly_and_disabled_people_day" autocomplete="off"
                                        value="{{ old('report_on_the_status_of_elderly_and_disabled_people_day', $report_on_the_status_of_elderly_and_disabled_people_day) }}" min="1" max="31"><span>日</span>
                                </div>
                            @else
                                <div class="field {{ err($errors, 'report_on_the_status_of_elderly_and_disabled_people_month') }}">
                                    <input type="number" class="setting-input" name="report_on_the_status_of_elderly_and_disabled_people_month" autocomplete="off"
                                        value="{{ old('report_on_the_status_of_elderly_and_disabled_people_month') ?? 6 }}" min="1" max="7"><span>月</span>
                                </div>
                                <div class="field {{ err($errors, 'report_on_the_status_of_elderly_and_disabled_people_day') }}">
                                    <input type="number" class="setting-input" name="report_on_the_status_of_elderly_and_disabled_people_day" autocomplete="off"
                                        value="{{ old('report_on_the_status_of_elderly_and_disabled_people_day') ?? 1 }}" min="1" max="31"><span>日</span>
                                </div>
                            @endif
                            <span>から7月15日までの間通知</span>
                        </div>
                        <p>※年をまたいで期間を設定できません</p>
                        <div class="ui divider under-line"></div>                 

                        <div class="field {{ err($errors, 'bonus_payment_notice') }}" style="margin-bottom: 1.5rem;">
                            <h4 class="item-heading">健康保険・厚生年金保険被保険者賞与支払届</h4>
                            <p>賞与支払予定月の
                                @if(isset($pickupSetting))
                                    <input type="number" class="setting-input" name="bonus_payment_notice" autocomplete="off"
                                        value="{{ old('bonus_payment_notice', $pickupSetting->bonus_payment_notice) }}" min="1" max="365">
                                @else
                                    <input type="number" class="setting-input" name="bonus_payment_notice" autocomplete="off"
                                        value="{{ old('bonus_payment_notice') ?? 30 }}" min="1" max="365">
                                @endif
                                日前から通知開始
                            </p>
                        </div>
                    </div> 
                </div>
            </div>

            @if(!$userPermission->isAdmin() && $userPermission->isGeneralAffair() && $userPermission->isWritableFor(13) && $userPermission->getEmployeeStatus() !== 1)
                <div class="my-4" style="text-align: right; margin-right: 1em;">
                    <a class="ui button negative basic" href="{{ route('home.index') }}"
                        style="width: 200px;">キャンセル</a>
                    <button class="ui button primary submit-disable" type="submit" style="width: 200px;">更新</button>
                </div>
            @endif
        </form>
    </section>

    <script type="module">
        $(document).ready(function() {
            const readonly = @json($userPermission->isAdmin() || !$userPermission->isGeneralAffair() || !$userPermission->isWritableFor(13) || $userPermission->getEmployeeStatus() === 1);
            if (readonly) {
                $sectionReadonly();
                const def = @json($officers_names);
                $('label[for="officers[]"]').next('div').find('.default').text(def.join(',　')).css('color', '#13265F');
            } else {
                getIndustryType(true);
            }
        });

        function getIndustryType(first = false) {
            $.ajax({
                    url: '{{ route('pickup.get_officers') }}',
                    type: 'post'
                })
                .done((data) => {
                    $('select[name="officers[]"]').empty();
                    data.forEach(element => {
                        $('<option>').attr({
                            value: element.id
                        }).text(element.last_name + ' ' + element.first_name).appendTo('select[name="officers[]"]');
                    });
                    $('.ui.dropdown.dropdown.multiple').dropdown('clear');

                    if (first) {
                        const def = @json(old('officers', $officers ?? []));
                        def.forEach(v => {
                            $('select[name="officers[]"] option[value="' + v + '"]').attr('selected', true);
                        });
                    }
                });
        }

        $('.ui.dropdown').dropdown();
    </script>
</x-layout>
