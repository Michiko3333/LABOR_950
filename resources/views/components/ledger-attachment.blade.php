@props([
    'required_list' => [],
    'file_original_names' => [],
    'extensions' => '',
    'separateDisabled' => false,
])

<style>
    .ui.radio.checkbox label {
        font-size: .8em;
    }

    #radio-button {
        margin-bottom: 4px;
    }

    #other_file_name {
        width: 100%;
        font-size: .8em;
    }

    .ui.input.error>input {
        background-color: #fff6f6;
        border-color: #e0b4b4;
        color: #9f3a38;
        box-shadow: none;
    }
</style>

<div class="ui form">
    @foreach ($file_original_names as $key => $file_original_name)
        <div
            class="field {{ in_array('required_' . $key, $required_list) ? 'required' : '' }} {{ err($errors, 'file_' . $key) }}">
            <input type="hidden" name="label_file_{{ $key }}" value="{{ $file_original_name }}">
            <label for="file_{{ $key }}">{{ $file_original_name }}</label>
            <div class="inline" id="radio-button">
                <div class="ui radio checkbox">
                    <input type="radio" name="radio_file_{{ $key }}" checked="checked" value="2"
                        {{ old("radio_file_{$key}") == '2' ? 'checked' : '' }}>
                    <label>添付</label>
                </div>
                @if ($separateDisabled)
                    <lavel />
                @else
                    <div class="ui radio checkbox">
                        <input type="radio" {{ $separateDisabled ? 'hidden' : '' }}
                            name="radio_file_{{ $key }}" value="1"
                            {{ old("radio_file_{$key}") == '1' ? 'checked' : '' }}>
                        <label>別送</label>
                    </div>
                @endif
            </div>
            <div class="inline fields">
                <div class="field thirteen wide">
                    <div class="ui file input">
                        <input type="file" class="file-attachment-form" name="file_{{ $key }}"
                            accept="{{ $extensions }}">
                    </div>
                </div>
                <div class="field four wide {{ err($errors, "checked_{$key}") }}">
                    <div class="ui toggle checkbox">
                        <input class="file_check" type="checkbox" data-input="file_{{ $key }}"
                            data-label="label_file_{{ $key }}" data-radio="radio_file_{{ $key }}"
                            data-input-other="input_file_{{ $key }}" name="checked_{{ $key }}"
                            {{ old("checked_{$key}") ? 'checked' : '' }}>
                        <label></label>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="ui input {{ $errors->has('input_file_other') ? ' error' : '' }}" id="other_file_name">
        <input type="text" placeholder="その他添付書類の名称" name="input_file_other" value="{{ old('input_file_other') }}">
    </div>

    <script type="module">
        $(document).ready(function() {
            function updateFields() {
                const name = $(this).data('input');
                const label = $(this).data('label');
                const radio = $(this).data('radio');
                const other_name = $(this).data('input-other');
                const bool = $(this).prop('checked');
                $('input[name=' + name + '], input[name=' + label + '], input[name=' + radio + '], input[name=' +
                    other_name + ']').prop('disabled', !bool);

                if (bool) {
                    const radioValue = $('input[name=' + radio + ']:checked').val();
                    if (radioValue === '1') {
                        $('input[name=' + name + ']').prop('disabled', true);
                        $('input[name=' + name + ']').val('');
                    }
                }
            }

            $('.file_check').change(function() {
                updateFields.call(this);
            }).trigger('change');

            $('input[type="radio"][name^="radio_file_"]').change(function() {
                const fileInputField = $(this).closest('.field').find('input[type="file"]');
                fileInputField.prop('disabled', $(this).val() === '1');
                if ($(this).val() === '1') {
                    fileInputField.val('');
                }
            });
        });
        /* filesize validation */
        const fileInputs = document.getElementsByClassName('file-attachment-form');
        const fileHandler = (e) => {
            const totalSizeLimit = 1024 * 1024 * 99;
            let totalSize = 0;
            for (let index = 0; index < fileInputs.length; index++) {
                const input = fileInputs[index];
                const files = input.files;

                for (let i = 0; i < files.length; i++) {
                    const size = files[i].size;
                    totalSize += size;
                }
            }
            if (totalSizeLimit < totalSize) {
                window.alert('添付ファイルの合計を99MB未満にしてください');
                e.target.value = '';
            }
        };
        for (let index = 0; index < fileInputs.length; index++) {
            const element = fileInputs[index];
            element.addEventListener('change', fileHandler);
        }
    </script>
</div>
