<x-layout title="ログイン">
    @slot('header')
        <style type="text/css">
            body {
                background-image: url({{ asset('/img/bg_town.jpg') }});
                background-repeat: no-repeat;
                background-size: cover;
                background-position: bottom;
            }

            .ui.grid {
                height: 100%;
                margin: 0;
            }

            .column {
                max-width: 430px;
            }

            .ui.stacked.segment {
                padding: 3em;
            }

            .input-fields {
                padding: 1em 0;
                text-align: left;
            }
        </style>
        <style lang="less">
            @ppp : red;

            .column {
                background: @ppp;
            }
        </style>
    @endslot
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <form class="ui large form" action="" method="post">
                @csrf
                <div class="ui stacked segment">
                    <div class="logo_area">
                        <img src="{{ asset('/img/logo.png') }}">
                    </div>
                    <div class="input-fields">
                        <div class="field">
                            <label>Email</label>
                            <input name="email" type="email">
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <input type="password" name="password" autocomplete="on">
                        </div>
                    </div>
                    <div style="padding: 1em 0;">
                        <button class="ui primary button">
                            ログインする
                        </button>
                    </div>
                    <div>
                        <a href="./">パスワードを忘れた場合</a>
                    </div>
                </div>

                <div class="ui error message">
                    @error('email')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                    @error('password')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

            </form>
        </div>
    </div>
</x-layout>
