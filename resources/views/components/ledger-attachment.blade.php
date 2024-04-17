@props([
    'insured' => true,
    'dependent' => true,
    'taxable' => true,
    'enrollment' => true,
    'pension' => true,
    'living' => true,
    'housewife' => true,
    'medical' => true,
    'other' => true,
    'required_insured' => false,
    'required_dependent' => false,
    'required_taxable' => false,
    'required_enrollment' => false,
    'required_pension' => false,
    'required_living' => false,
    'required_housewife' => false,
    'required_medical' => false,
    'required_other' => false,
])

<div class="ui form">
    @if (!empty($insured))
        <div class="fields insured">
            <div
                class="field twelve wide {{ empty($required_insured) ? '' : 'required' }} {{ err($errors, 'file_insured') }}">
                <label for="file_insured">被保険者証</label>
                <div class="ui file input">
                    <input type="file" name="file_insured">
                </div>
            </div>
            <dic class="field four wide {{ err($errors, 'checked_insured') }}">
                <div class="ui toggle checkbox">
                    <input class="file_check" type="checkbox" data-input="file_insured" name="checked_insured"
                        {{ old('checked_insured') ? 'checked' : '' }}>
                    <label> </label>
                </div>
            </dic>
        </div>
    @endif
    @if (!empty($dependent))
        <div class="fields dependent">
            <div
                class="field twelve wide {{ empty($required_dependent) ? '' : 'required' }} {{ err($errors, 'file_dependent') }}">
                <label for="file_dependent">被扶養者証</label>
                <div class="ui file input">
                    <input type="file" name="file_dependent">
                </div>
            </div>
            <dic class="field four wide {{ err($errors, 'checked_dependent') }}">
                <div class="ui toggle checkbox">
                    <input class="file_check" type="checkbox" data-input="file_dependent" name="checked_dependent"
                        {{ old('checked_dependent') ? 'checked' : '' }}>
                    <label> </label>
                </div>
            </dic>
        </div>
    @endif
    @if (!empty($taxable))
        <div class="fields taxable">
            <div
                class="field twelve wide {{ empty($required_taxable) ? '' : 'required' }} {{ err($errors, 'file_taxable') }}">
                <label for="file_taxable">被課税証明書</label>
                <div class="ui file input">
                    <input type="file" name="file_taxable">
                </div>
            </div>
            <dic class="field four wide {{ err($errors, 'checked_taxable') }}">
                <div class="ui toggle checkbox">
                    <input class="file_check" type="checkbox" data-input="file_taxable" name="checked_taxable"
                        {{ old('checked_taxable') ? 'checked' : '' }}>
                    <label> </label>
                </div>
            </dic>
        </div>
    @endif
    @if (!empty($enrollment))
        <div class="fields enrollment">
            <div
                class="field twelve wide {{ empty($required_enrollment) ? '' : 'required' }} {{ err($errors, 'file_enrollment') }}">
                <label for="file_enrollment">在学証明書など</label>
                <div class="ui file input">
                    <input type="file" name="file_enrollment">
                </div>
            </div>
            <dic class="field four wide {{ err($errors, 'checked_enrollment') }}">
                <div class="ui toggle checkbox primary">
                    <input class="file_check" type="checkbox" data-input="file_enrollment" name="checked_enrollment"
                        {{ old('checked_enrollment') ? 'checked' : '' }}>
                    <label> </label>
                </div>
            </dic>
        </div>
    @endif
    @if (!empty($pension))
        <div class="fields pension">
            <div
                class="field twelve wide {{ empty($required_pension) ? '' : 'required' }} {{ err($errors, 'file_pension') }}">
                <label for="file_pension">基礎年金番号通知書又は基礎年金番号を確認できる書類</label>
                <div class="ui file input">
                    <input type="file" name="file_pension">
                </div>
            </div>
            <dic class="field four wide {{ err($errors, 'checked_pension') }}">
                <div class="ui toggle checkbox">
                    <input class="file_check" type="checkbox" data-input="file_pension" name="checked_pension"
                        {{ old('checked_pension') ? 'checked' : '' }}>
                    <label> </label>
                </div>
            </dic>
        </div>
    @endif
    @if (!empty($living))
        <div class="fields living">
            <div
                class="field twelve wide {{ empty($required_living) ? '' : 'required' }} {{ err($errors, 'file_living') }}">
                <label for="file_living">生計維持を確認できる書類</label>
                <div class="ui file input">
                    <input type="file" name="file_living">
                </div>
            </div>
            <dic class="field four wide {{ err($errors, 'checked_living') }}">
                <div class="ui toggle checkbox">
                    <input class="file_check" type="checkbox" data-input="file_living" name="checked_living"
                        {{ old('checked_living') ? 'checked' : '' }}>
                    <label> </label>
                </div>
            </dic>
        </div>
    @endif
    @if (!empty($housewife))
        <div class="fields housewife">
            <div
                class="field twelve wide {{ empty($required_housewife) ? '' : 'required' }} {{ err($errors, 'file_housewife') }}">
                <label for="file_housewife">専業主婦等証明書</label>
                <div class="ui file input">
                    <input type="file" name="file_housewife">
                </div>
            </div>
            <dic class="field four wide {{ err($errors, 'checked_housewife') }}">
                <div class="ui toggle checkbox">
                    <input class="file_check" type="checkbox" data-input="file_housewife" name="checked_housewife"
                        {{ old('checked_housewife') ? 'checked' : '' }}>
                    <label> </label>
                </div>
            </dic>
        </div>
    @endif
    @if (!empty($medical))
        <div class="fields medical">
            <div
                class="field twelve wide {{ empty($required_medical) ? '' : 'required' }} {{ err($errors, 'file_medical') }}">
                <label for="file_medical ">医療保険者証明書</label>
                <div class="ui file input">
                    <input type="file" name="file_medical">
                </div>
            </div>
            <dic class="field four wide {{ err($errors, 'checked_medical') }}">
                <div class="ui toggle checkbox">
                    <input class="file_check" type="checkbox" data-input="file_medical" name="checked_medical"
                        {{ old('checked_medical') ? 'checked' : '' }}>
                    <label> </label>
                </div>
            </dic>
        </div>
    @endif
    @if (!empty($other))
        <div class="fields other">
            <div
                class="field twelve wide {{ empty($required_other) ? '' : 'required' }} {{ err($errors, 'file_other') }}">
                <label for="file_insured">その他の添付書類</label>
                <div class="ui file input">
                    <input type="file" name="file_other">
                </div>
            </div>
            <dic class="field four wide {{ err($errors, 'checked_other') }}">
                <div class="ui toggle checkbox">
                    <input class="file_check" type="checkbox" data-input="file_other" name="checked_other"
                        {{ old('checked_other') ? 'checked' : '' }}>
                    <label> </label>
                </div>
            </dic>
        </div>
    @endif
    <script type="module">
        $('.file_check').change(function() {
            const name = $(this).data('input');
            const bool = $(this).prop('checked');
            if (bool) $('input[name=' + name + ']').prop('disabled', false);
            else $('input[name=' + name + ']').prop('disabled', true);
        });
        $('.file_check').trigger('change');
    </script>
</div>
