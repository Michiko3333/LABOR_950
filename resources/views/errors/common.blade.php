<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/less/app.less')
    @vite('resources/scss/app.scss')
    <title>Karte - エラー</title>
</head>

<body>
    <section class="content"
        style="width: 100%; height: 100%; display: flex; justify-content:center; align-items:center;">
        @php
            $status_code = $exception->getStatusCode();
            $message = $exception->getMessage();

            if (!$message) {
                switch ($status_code) {
                    case 400:
                        $message = '不正なフォーマットが検出されました';
                        break;
                    case 401:
                        $message = '認証に失敗しました';
                        break;
                    case 403:
                        $message = 'アクセス権がありません';
                        break;
                    case 404:
                        $message = 'ページが存在しません';
                        break;
                    case 408:
                        $message = 'セッションがタイムアウトしました';
                        break;
                    case 414:
                        $message = '不正なリクエストです';
                        break;
                    case 419:
                        $message = '不正なリクエストです';
                        break;
                    case 500:
                        $message = 'システムエラーが発生しました。管理者にお問い合わせください。';
                        break;
                    case 503:
                        $message = 'Service Unavailable';
                        break;
                    default:
                        $message = '予期せぬエラーが発生しました。';
                        break;
                }
            }
        @endphp
        <div style="color: var(--color-red);">
            <h1 style="text-align: center;">{{ $status_code }}</h1>
            <p style="text-align: center;">{{ $message }}</p>
        </div>
    </section>
</body>

</html>
