<x-layout title="ログイン">
    @slot('header')
        <style type="text/css">
            .ui.grid {
                height: 100%;
                margin: 0;
            }

            .left-container {
                width: 50%;
                height: 100%;
                padding: 64px 32px 64px 32px;
                gap: 14px;
                background: #FFFFFF;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .right-container {
                background-image: url("{!! asset('/img/bg_town.jpg') !!}");
                background-repeat: no-repeat;
                background-size: cover;
                background-position: 80% 30%;
                background-attachment: fixed;
                transform: scaleX(-1);
                width: 50%;
                height: 100%;
                padding: 10px;
                gap: 10px;

            }

            .column {
                width: 350px;
            }

            .logo_area {
                width: 350px;
                height: 90.55px;
                margin: 0 auto;
                margin-bottom: 21px;
            }

            .field {
                width: 350px;
                height: 110px;
                padding: 10px;
                gap: 10px;
                display: flex;
                flex-direction: column;
            }

            .label {
                padding: 10px;
                text-align: left;
                width: 452px;
                height: 13px;
                font-family: 'Inria Sans';
                font-size: 14px;
                font-weight: 700;
                color: #2F323E;
                line-height: 17px;
                text-align: left;
            }

            .ui.input {
                width: 350px;
                height: 67px;
                font-family: 'Inria Sans';
                padding: 0px 18px 0px 18px;
                border-radius: 4px;
                border: 2px;
                gap: 10px;
                border: 2px solid #C0C0C0;
            }

            input::placeholder {
                color: #C0C0C0;
                font-family: 'Inria Sans';
                font-size: 14px;
                font-weight: 700;
                line-height: 17px;
                letter-spacing: 0em;
                text-align: left;
            }


            .ui.button {
                width: 350px;
                height: 64px;
                padding: 5px 9px 5px 9px;
                border-radius: 4px;
                gap: 10px;
                font-family: 'Inria Sans';
                font-size: 18px;
                font-weight: 700;
                line-height: 22px;
                text-align: center;
                color: #FFFFFF;
                margin-top: 21px;
            }

            @media screen and (max-width: 768px) {
                .left-container {
                    width: 100%;
                }

                .right-container {
                    width: 100%;
                }
            }

            @media screen and (max-width: 768px) {
                .left-container {
                    width: 100%;
                }

                .right-container {
                    display: none;
                }
            }
            }
        </style>
    @endslot
    <div class="ui grid">
        <div class="left-container">
            <div class="column">
                <form class="ui large form" action="{{ route('auth.login_post') }}" method="post">
                    @csrf
                    <div class="logo_area">
                        <img src="{{ asset('/img/karte_logo.svg') }}">
                    </div>
                    <div class="input-fields">
                        <div class="field">
                            <label>Email
                                <input class="ui input" name="email" type="email" autocomplete="on"
                                    placeholder="Placeholder…">
                            </label>
                        </div>
                        <div class="field">
                            <label>Password
                                <input class="ui input" type="password" name="password" autocomplete="on"
                                    placeholder="Placeholder…">
                            </label>
                        </div>
                    </div>
                    <button class="ui primary submit button">ログイン</button>
                </form>
            </div>
        </div>
        <div class="right-container"></div>
    </div>
</x-layout>
