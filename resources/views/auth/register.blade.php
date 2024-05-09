<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RegisterTest</title>
</head>

<body>
    <h1>登録画面</h1>
    <form action="" method="post">
        @csrf
        <label for="name">名前</label>
        <input type="text" name="name" id="name"><br>
        <label for="email">メールアドレス</label>
        <input type="email" name="email" id="email"><br>
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password"><br>
        <button type="submit">送信</button>
        @error('name')
            <div class="error-text">{{ $message }}</div>
        @enderror
        @error('email')
            <div class="error-text">{{ $message }}</div>
        @enderror
        @error('password')
            <div class="error-text">{{ $message }}</div>
        @enderror
    </form>
</body>

</html>
