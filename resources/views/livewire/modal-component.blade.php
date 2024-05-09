<!-- resources/views/livewire/modal-component.blade.php -->

<div>
    <button id="btn" wire:click="openModal">Open Modal</button>

    @if($showModal)
        <div class="modal" id="myModal">
            <!-- モーダルのコンテンツ -->
            <p>This is a modal!</p>
            <button wire:click="closeModal">Close Modal</button>
        </div>

        @push('scripts')
            <script>
                document.addEventListener('livewire:load', function () {
                    Livewire.on('openModal', function () {
                        document.getElementById('myModal').classList.add('block');
                    });

                    Livewire.on('closeModal', function () {
                        document.getElementById('myModal').classList.remove('block');
                    });
                });
            </script>
        @endpush
    @endif
</div>
<script>
btn.addEventListener('click', function() {
  
  prompt('名前を入力してください', '例：佐藤');

});
