<x-layout title="ログイン" mode="small" useMenu="{{ false }}" laborAlert="{{ false }}">
    @slot('header')
    <style type="text/css">
        #login {
            display: flex;
            width: 360px;
            flex-direction: column;
        }

        .submit.button {
            width: 100%;
            margin: 1em 0;
            font-size: 1.2em;
            padding: 0.5em 1em;
            height: 48px;
        }

        #login.ui.form .ui.input {
            font-size: 1.2em;
        }

        #login.ui.form .error.message {
            display: block;
        }

        #login.ui.form .error.message:empty {
            display: none;
        }
    </style>
    @endslot
    <section class="centering">
        <form id="login" class="ui form" action="{{ route('auth.login_post') }}" method="post">
            @csrf
            <img class="logo" src="{{ asset('/img/logo.png') }}" style="margin-bottom: 2em;">
            <div class="input-fields">
                <div class="field">
                    <label>Email
                        <input class="ui input" name="email" type="email" autocomplete="on">
                    </label>
                </div>
                <div class="field">
                    <label>Password
                        <input class="ui input" type="password" name="password" autocomplete="on">
                    </label>
                </div>
                @if ($errors->has('email') || $errors->has('password'))
                <div class="ui error message">
                    @error('email')
                    <div class="error-text">{{ $message }}</div>
                    @enderror
                    @error('password')
                    <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>
                @endif
            </div>
            <button class="ui primary submit button" type="submit">
                ログイン
            </button>
        </form>
    </section>
    @slot('footer')
    <script type="module">
        $('#login').submit(_ => {
                $('button.submit').html('<div class="ui loader small active inline"></div>');
                $('button.submit').attr('disabled', true);
                return true;
            });
    </script>
    @endslot
</x-layout>