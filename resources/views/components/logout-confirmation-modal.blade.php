<div id="{{$id ?? ''}}"  class="ui tiny modal logout-confirmation-modal">
    <i class="close icon"></i>
    <div class="header">
        確認
    </div>

    <div class="content">
        「社員区分」 「雇用区分」 「所属部署」の変更は権限が変更されるため、<strong>ログアウト</strong>します。
    </div>

    <div class="actions">
        <button class="ui negative button">キャンセル</button>
        <button class="ui primary button logout-confirmation-submit">確定</button>
    </div>

    <script type="module">
        $(document).on('click', '.logout-confirmation-submit', function() {
            $('.authority').closest('form').submit();
        });
    </script>
</div>