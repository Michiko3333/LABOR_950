<div id="certLoader">
    <div class="ui card card-shadow" style="width: 100%; max-width: 512px; height:290px;">
        <div class="content">
            @if ($view < 2) <div class="upload-area">
                <form class="ui form" wire:submit="loadCert">
                    <div class="field">
                        <label>証明書ファイル</label>
                        <div class="ui file input">
                            <input type="file" name="cert-file" wire:model='cert_file'>
                        </div>
                    </div>
                    <div class="field">
                        <label>パスワード</label>
                        <input type="password" name="cert-pass" wire:model='cert_pass' maxLength="20">
                    </div>
                    <div class="field error-text">
                        @if ($isError)
                        正しく読み込めませんでした<br>証明書のファイルまたはパスワードを確認してください。
                        @endif
                    </div>
                    <div style="text-align: right;">
                        <button class="ui button primary" type="submit" {{$view==1 ? 'disabled' : '' }}>
                            @if ($view == 1)
                            <div class="ui loader tiny active inline"></div>
                            @else
                            登録
                            @endif
                        </button>
                    </div>
                </form>
        </div>
        @endif
        @if ($view == 2)
        <div class="verified">
            <i class="check icon massive"></i>
            <p>電子証明書設定済</p>
            <button class="ui button small basic negative" style="margin-top: 1em;" type="button"
                wire:click='remove'>削除</button>
        </div>
        @endif
    </div>
</div>
</div>