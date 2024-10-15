<x-layout title="年間勤務予定表" mode="">
    @slot('header')
        <link rel="stylesheet" href="{{ asset('custom/calendar-small.css') }}">
        <style>
            .shift-calendar-inputs .ui.basic.label {
                padding-top: 1.2em !important;
            }

            .table {
                width: 100%;
            }

            .table table {
                width: 100%;
            }
        </style>
    @endslot

    <section class="content pb-3">
        <div class="ui huge breadcrumb mb-0 mb-2">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">年間勤務予定表</div>
        </div>
        @livewire('shift-form', ['editable' => $userPermission->isWritableFor(12)])
    </section>
    <div id="HolidayModal" class="ui modal mini holiday-modal">
        <i class="close icon"></i>
        <div class="header">
            休日一括設定
        </div>
        <div class="content">
            @livewire('holiday-modal')
        </div>
        <div class="actions">
            <button class="ui button cancel" type="button" onClick="javascript:$hm.onCancel()">キャンセル</button>
            <button class="ui approve primary button" type="button" onClick="javascript:$hm.onInsert()">挿入</button>
        </div>
    </div>
    @slot('footer')
        <script type="module">
            $(document).ready(function() {
                const readonly = @json(!$userPermission->isBasicDepartment() || !$userPermission->isWritableFor(12));
                if (readonly) {
                    $sectionReadonly();
                }
                $('.ui.dropdown.dropdown.multiple').dropdown({});

                const holidayModal = $('#HolidayModal').modal({
                    blurring: true,
                });
                window.$holidayModal = holidayModal;
            });
        </script>
        <script type="module">
            Livewire.on('onSavedShiftCalendar', () => {
                $.toast({
                    position: 'bottom right',
                    class: 'success',
                    message: `保存が完了しました`
                });
            });
            Livewire.on('onErrorShiftCalendar', () => {
                $.toast({
                    position: 'bottom right',
                    class: 'red',
                    message: `エラーが発生しました`
                });
            });
        </script>
    @endslot
</x-layout>
