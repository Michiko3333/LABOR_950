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
    @if($required_list)
    <h4>必須　添付ファイル</h4>
    @foreach ($required_list as $key => $file_original_name)
        <div
            class="field required {{ err($errors, 'file_' . $key) }}">
            <input type="hidden" name="label_file_{{ $key }}" value="{{ $file_original_name }}">
            <label for="file_{{ $key }}">{{ $file_original_name }}</label>
            <div class="inline" id="radio-button">
                <div class="ui radio checkbox">
                    <input type="radio" name="radio_file_{{ $key }}" value="2"
                        {{ old("radio_file_{$key}") == '2' ? 'checked' : ($separateDisabled && old("radio_file_{$key}") === null ? 'checked' : '') }}>
                    <label>添付</label>
                </div>
                @if (!$separateDisabled)
                    <div class="ui radio checkbox">
                        <input type="radio" {{ $separateDisabled ? 'hidden' : '' }}
                            name="radio_file_{{ $key }}" value="1"
                            {{ old("radio_file_{$key}") === '1' ? 'checked' : (!$separateDisabled && old("radio_file_{$key}") === null ? 'checked' : '') }}>
                        <label>別送</label>
                    </div>
                @endif
            </div>
            <div class="inline fields" style="display: none;">
                <div class="field thirteen wide">
                    <div class="ui file input">
                        <input type="file" class="file-attachment-form" name="file_{{ $key }}"
                            accept="{{ $extensions }}">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="ui divider my-2"></div>
    @endif
    <h4>任意・依頼された場合　添付ファイル</h4>
    @foreach ($file_original_names as $key => $file_original_name)
        <div
            class="field ? 'required' : '' }} {{ err($errors, 'file_' . $key) }}">
            <input type="hidden" name="label_file_{{ $key }}" value="{{ $file_original_name }}">
            <label for="file_{{ $key }}">{{ $file_original_name }}</label>
            <div class="inline" id="radio-button">
                <div class="ui radio checkbox">
                    <input type="radio" name="radio_file_{{ $key }}" value="2"
                        {{ old("radio_file_{$key}") == '2' ? 'checked' : '' }}>
                    <label>添付</label>
                </div>
                @if (!$separateDisabled)
                    <div class="ui radio checkbox">
                        <input type="radio" {{ $separateDisabled ? 'hidden' : '' }}
                            name="radio_file_{{ $key }}" value="1"
                            {{ old("radio_file_{$key}") === '1' ? 'checked' : '' }}>
                        <label>別送</label>
                    </div>
                @endif
                <div class="ui radio checkbox">
                    <input type="radio" name="radio_file_{{ $key }}" value="0"
                    {{ old("radio_file_{$key}") === '0' || old("radio_file_{$key}") === null ? 'checked' : '' }}>
                    <label>不要</label>
                </div>
            </div>
            <div class="inline fields" style="display: none;">
                <div class="field thirteen wide">
                    <div class="ui file input">
                        <input type="file" class="file-attachment-form" name="file_{{ $key }}"
                            accept="{{ $extensions }}">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="ui input {{ $errors->has('input_file_other') ? ' error' : '' }}" id="other_file_name" style="display: none;">
        <input type="text" placeholder="その他添付書類の名称" name="input_file_other" autocomplete="off" value="{{ old('input_file_other') }}">
    </div>

    <script type="module">
        $(document).ready(function() {
            const separateDisabled = @json($separateDisabled);
            function toggleFileInputAndFields(radioValue, fieldSelector, fileInputSelector, inlineFieldsSelector) {
                const fileInputField = fieldSelector.find(fileInputSelector);
                if (radioValue === '2') {
                    fileInputField.val('');
                    fieldSelector.find(inlineFieldsSelector).css('display', 'block');
                } else {
                    fileInputField.val('');
                    fieldSelector.find(inlineFieldsSelector).css('display', 'none');
                }
            }

            $('input[type="radio"][name^="radio_file_"]:checked').each(function() {
                toggleFileInputAndFields($(this).val(), $(this).closest('.field'), 'input[type="file"]', 'div.inline.fields');
            });

            function toggleFileNameInput() {
                const fileNameInputField = $('input[name="input_file_other"]');
                const displayStyle = $('input[name="radio_file_other"]:checked').val() != '0' ? 'block' : 'none';
                fileNameInputField.val('');
                $('#other_file_name').css('display', displayStyle);
            }
            
            toggleFileNameInput();

            $('input[type="radio"][name^="radio_file_"]').change(function() {
                toggleFileInputAndFields($(this).val(), $(this).closest('.field'), 'input[type="file"]', 'div.inline.fields');
            });

            $('input[name="radio_file_other"]').change(toggleFileNameInput);
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
