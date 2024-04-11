<x-layout title="電子証明書登録">
    <style type="text/css">
        .ui.table {
            border: none;
            borde-radius: 8px;
            margin-top: 0;
        }

        .ui.table>tbody>tr>td {
            padding: 1.6em .7em;
        }

        div.filter {
            background: #f9fafb;
            padding: 1em;
            borde-radius: 8px;
        }

        div.pagination {
            display: flex;
            justify-content: center;
        }


        .error-text {
            font-size: 0.8em;
            color: var(--color-red);
        }

        #notConnected {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .verified {
            display: flex;
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .verified.hide {
            display: none !important;
        }

        .verified p {
            font-size: 1.5em;
            font-weight: bold;
        }

        .verified i.positive {
            color: var(--color-green);
        }

        .verified i.negative {
            color: var(--color-red);
        }
    </style>
    <section class="content">
        <div class="ui breadcrumb huge mt-2 mb-0">
            <a class="section" href="/">個人ポータル</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">e-Gov連携</div>
        </div>
        <h1>e-Gov連携</h1>
        <div class="ui card card-shadow" style="width: 100%; max-width: 512px; height:290px;">
            <div id="egovConnect" class="content">
                <div id="notConnected" class="verified {{$isConnected == 1 ? 'hide' : ''}}">
                    <i class="times icon massive negative"></i>
                    <p>アカウントが連携されていません</p>
                    <button id="connectBtn" class="ui button small primary" style="margin-top: 1em;"
                        type="button">連携する</button>
                </div>
                <div id="connected" class="verified {{$isConnected == 1 ? '' : 'hide'}}">
                    <i class="check icon massive positive"></i>
                    <p>アカウント連携済</p>
                    <button id="disconnectBtn" class="ui button small basic negative" style="margin-top: 1em;"
                        type="button">解除</button>
                </div>
            </div>
        </div>
        <h2>電子証明書登録</h2>
        <p>電子申請に利用する電子証明書ファイルをアップロードしてください</p>
        <p>電子証明書はe-gov公式サイトにて案内されている認証局で発行したものを推奨してります。詳しくは<a
                href="https://shinsei.e-gov.go.jp/contents/preparation/certificate/certification-authority.html"
                target="_blank">こちら<i class="window restore outline icon small"></i></a>をご覧ください</p>
        <livewire:certification-loader />
    </section>
    a:{{$isConnected}}
    <script type="module">
        $('#connectBtn').click(function() {
            $('#connectBtn').prop('disabled', true);
            $.ajax({url:'{{ route("egov.auth") }}', type:'post'}).then(d => {
                if (d) {
                    const url = d.url;
                    const authWindow = window.open(url, null, 'width=512,height=512');
                    const interval = setInterval(() => {
                        if (authWindow.closed) {
                            clearInterval(interval);
                            $('#connectBtn').prop('disabled', false);
                            $('#notConnected').addClass('hide');
                            $('#connected').removeClass('hide');
                        }
                    }, 1000);
                }
            }).catch(e => {
                $('#connectBtn').prop('disabled', false);
            });
        });

        $('#disconnectBtn').click(function() {
            $.ajax({url:'{{ route("egov.disconnect") }}', type:'post'}).then(_ => {
                $('#notConnected').removeClass('hide');
                $('#connected').addClass('hide');
            });
        });

    </script>
</x-layout>
