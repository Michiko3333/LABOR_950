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

            const tag = $element.prop("tagName");

            $element.attr('data-id', id);
            $element.prop('readonly', true);
            $element.removeAttr('id');

        });

        // ネストされた要素も対象にする
        $elementsWithId.each(function () {
            replaceIdWithDataId($(this));
        });
    }
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
        var $component = $(this);
        applyValueToPreview($component);
    });

    function applyValueToPreview($element) {
        var $elementsWithId = $element.find('[name]');
        $elementsWithId.each(function () {
            var $element = $(this);
            var name = $element.attr('name');

            $element.val('');

            if (formDataObject.hasOwnProperty(name)) {
                if ($element.is('input[type="checkbox"]')) {

                    if (formDataObject[name] == 1) {
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
$('#ledger-submit-btn').click(() => {
    $('#ledger-form').submit();
});
