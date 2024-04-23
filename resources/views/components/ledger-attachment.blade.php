@props([
    'required_list' => [],
    'file_original_names' => [],
    'extensions' => ''
])

<style>
    .ui.radio.checkbox label {
      font-size: .8em;
    }
    #radio-button {
        margin-bottom: 4px;
    }
</style>

<div class="ui form">
    @foreach($file_original_names as $key => $file_original_name)
    <div class="field {{ in_array('required_' . $key, $required_list) ? 'required' : '' }} {{ err($errors, 'file_' . $key) }}">
        <input type="hidden" name="label_file_{{$key}}" value="{{ $file_original_name }}">
        <label for="file_{{$key}}">{{ $file_original_name }}</label>
        <div class="inline" id="radio-button">
            <div class="ui radio checkbox">
                <input type="radio" name="radio_file_{{$key}}" checked="checked" value="2" {{ old("radio_file_{$key}") == '2' ? 'checked' : '' }}>
                <label>添付</label>
            </div>
            <div class="ui radio checkbox">
                <input type="radio" name="radio_file_{{$key}}" value="1" {{ old("radio_file_{$key}") == '1' ? 'checked' : '' }}>
                <label>別送</label>
            </div>
        </div>
        <div class="inline fields">
            <div class="field thirteen wide">
                <div class="ui file input">
                    <input type="file" name="file_{{$key}}" accept="{{$extensions}}">
                </div>
            </div>
            <dic class="field four wide {{ err($errors, "checked_{$key}") }}">
                <div class="ui toggle checkbox">
                    <input class="file_check" type="checkbox" data-input="file_{{$key}}" data-label="label_file_{{$key}}" data-radio="radio_file_{{$key}}" name="checked_{{$key}}"
                    {{ old("checked_{$key}") ? 'checked' : '' }}>
                    <label> </label>
                </div>
            </dic>
        </div> 
    </div>
    @endforeach
    
    <script type="module">
        function updateFields() {
            const name = $(this).data('input');
            const label = $(this).data('label');
            const radio = $(this).data('radio');
            const bool = $(this).prop('checked');
            $('input[name=' + name + '], input[name=' + label + '], input[name=' + radio + ']').prop('disabled', !bool);
        }

        $(document).ready(function() {
            $('.file_check').change(updateFields).trigger('change');
            updateFields.call($('.file_check'));
        });
    </script>
</div>
