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

        .verified {
            display: flex;
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .verified p {
            font-size: 1.5em;
            font-weight: bold;
        }

        .verified i {
            color: var(--color-green);
        }
    </style>
    <section class="content">
        <div class="ui breadcrumb huge mt-2 mb-0">
            <a class="section" href="/">個人ポータル</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">電子証明書登録</div>
        </div>
        <h1>電子証明書登録</h1>
        <p>電子申請に利用する電子証明書ファイルをアップロードしてください</p>
        <p>電子証明書はe-gov公式サイトにて案内されている認証局で発行したものを推奨してります。詳しくは<a
                href="https://shinsei.e-gov.go.jp/contents/preparation/certificate/certification-authority.html"
                target="_blank">こちら<i class="window restore outline icon small"></i></a>をご覧ください</p>
        <livewire:certification-loader />
    </section>
</x-layout>