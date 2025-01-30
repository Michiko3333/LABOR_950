<x-layout title="pick upリスト" mode="">
    @slot('header')
        <link rel="stylesheet" href="{{ asset('custom/pickup.css') }}">
    @endslot

    <section class="content">
        <div class="ui huge breadcrumb">
            <a class="section" href="{{ route('home.index') }}">ホーム</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">Pick upリスト</div>
        </div>
        <h1 class="mt-0">Pick upリスト</h1>
        <div class="ui card full card-shadow item-0">
            <div class="content">
                <livewire:pickup-list />
            </div>
        </div>
    </section>

    <script type="module">
        const detail_modal = $('#detailModal').modal({
            blurring: true,
        });

        $(document).ready(function () {
            const params = new URLSearchParams(window.location.search);
            const id = params.get('id');

            if (id && id !== 0) {
                window.$pickup_modal.openDetail(id);

                const element = $(`#${id}`);
                if (element) {
                    $('html, body').animate({
                        scrollTop: element.offset().top - ($(window).height() / 2) + (element.outerHeight() / 2)
                    }, 500, function () {
                        element.addClass('fade-highlight');
                    });
                }
            }

            params.delete('p');
            params.delete('id');

            const url = new URL(window.location.href);
            url.search = params.toString();
            window.history.replaceState({}, '', url.toString());
        });


        Livewire.on('modal-onDetailModal', (d) => {
            detail_modal.modal({
                blurring: true,
                onHidden: () => {
                    $('.edit-pickup .ui.error.message').addClass('hidden');
                    $('.select_no_supported').css('display', 'block');
                    $('.select_in_progress').css('display', 'block');
                    window.$pickup_modal.isSubmit = false;
                },
                onShow: () => {
                    const info = d.info;

                    if(info.pickup_situation_id === 2) {
                        $('.select_no_supported').css('display', 'none');
                    } else if(info.pickup_situation_id === 3) {
                        $('.select_no_supported').css('display', 'none');
                        $('.select_in_progress').css('display', 'none');
                    }

                    $('.pickup_id').val(info.id);
                    $('.business_name').text(info.business_name);
                    const text = info.content;
                    const formattedText = text.replace(/\n/g, '<br>');
                    $('.pickup_content').html(formattedText);
                    $('.due_date').text(info.due_date);
                    $('.responder_name').text(info.responder_name);
                    $('.situation').val(info.pickup_situation_id);
                }
            }).modal('show');
        });

        Livewire.on('modal-onSubmitError', () => {
            $('.edit-pickup .ui.error.message').removeClass('hidden');
            window.$pickup_modal.isSubmit = false;
        });

        Livewire.on('modal-closePickupModal', () => {
            detail_modal.modal('hide');
        });
    </script>
</x-layout>
