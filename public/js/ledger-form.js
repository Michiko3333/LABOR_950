document.addEventListener("DOMContentLoaded", function () {
    // コンポーネント内のすべてのidをdata-idに置き換える
    $('[preview-component]').each(function () {
        const $component = $(this);
        replaceIdWithDataId($component);
    });

    function replaceIdWithDataId($element) {
        const $elementsWithId = $element.find('[id]');
        $elementsWithId.each(function () {
            const $element = $(this);
            const id = $element.attr('id');

            const dvalue = $element.prop("defaultValue");
            $element.attr('data-id', id);
            $element.prop('readonly', true);
            $element.removeAttr('id');

            if ($element.is('input[type="radio"]')) {
                $element.attr('data-value', dvalue);
            }
        });

        // ネストされた要素も対象にする
        $elementsWithId.each(function () {
            replaceIdWithDataId($(this));
        });
    }

    $(':not(.preview-area) input[type="radio"]').on('change', function () {
        const name = $(this).prop('name');
        $(':not(.preview-area) input[type="radio"][name=' + name + ']').prop('checked', false);
        $(this).prop('checked', true);
    });
});

function formDataToObject(formData) {
    const obj = {};
    formData.forEach((value, key) => {
        obj[key] = value;
    });
    return obj;
}

$('#ledger-preview-btn').click(() => {
    $('#ledger-step1').removeClass('active');
    $('#ledger-step2').addClass('active');
    window.scrollTo(0, 0);
    const form = document.getElementById('ledger-form');
    const formData = new FormData(form);
    const formDataObject = formDataToObject(formData);

    $('[preview-component]').each(function () {
        const $component = $(this);
        applyValueToPreview($component);
    });

    function applyValueToPreview($elm) {
        const $elementsWithId = $elm.find('[name]');
        $elementsWithId.each(function () {
            const $element = $(this);
            const name = $element.attr('name');

            $element.val('');
            $element.prop('checked', false);

            if (formDataObject.hasOwnProperty(name)) {
                if ($element.is('input[type="checkbox"]')) {
                    if (formDataObject[name] != '') {
                        $element.prop('disabled', false);
                        $element.prop('checked', true);
                    }
                } else if ($element.is('input[type="radio"]')) {
                    if (formDataObject[name] == $element.attr('data-value')) {
                        $element.prop('disabled', false);
                        $element.prop('checked', true);
                    }

                } else {
                    $element.val(formDataObject[name]);
                }
            }

            if ($element.is('input[type="checkbox"]')) $element.prop('disabled', true);
        });

        // ネストされた要素も対象にする
        $elementsWithId.each(function () {
            applyValueToPreview($(this));
        });
    }

});
$('#ledger-edit-btn').click(() => {
    $('#ledger-step1').addClass('active');
    $('#ledger-step2').removeClass('active');
    window.scrollTo(0, 0);
});
$('#ledger-submit-btn').click((event) => {
    $(event.target).prop('disabled', true);
    $('#ledger-form').submit();
});

function handlePageHistory() {
    const sessionHistory = JSON.parse(sessionStorage.getItem('pageHistory'));
    if (sessionHistory) {
        $('#queryParameter').val(sessionHistory.toString());
        $('#ledger-back').attr('href', sessionHistory.toString());
    }
}

document.addEventListener("DOMContentLoaded", handlePageHistory);
