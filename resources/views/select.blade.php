<x-layout title="会社選択" mode="small" useMenu="{{ true }}" laborAlert="{{ false }}">
    @slot('header')
        <style type="text/css">
            header {
                animation-name: fadeIn;
                animation-fill-mode: forwards;
                animation-duration: 1s;
                opacity: 0;
            }
            #company_select_form {
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

            #company_select {
                font-size: 1.2em;
            }
        </style>
    @endslot
    <section class="centering">
        <form id="company_select_form" class="select-container ui form fadeInY" action="{{ route('home.select_post') }}"
            method="post">
            @csrf
            <h1 class="slideY">操作する会社を選んでください...</h1>
            <div class="field slideY">
                <select id="company_select" name="company_select" class="ui fluid dropdown">
                    <option value="">選択無し</option>
                    <option value="AL">株式会社コラットベース</option>
                    <option value="AK">合同会社ほんわかフェスティバル</option>
                    <option value="AZ">株式会社豚汁</option>
                    <option value="AR">有限会社ハタラキ太陽</option>
                </select>
            </div>
            <div class="field btn-area slideY">
                <button id="company_select_submit" class="ui primary submit button" disabled><i
                        class="home icon"></i>ホームへ進む</button>
            </div>
        </form>
    </section>
    @slot('footer')
        <script type="module">
            $('#company_select_form').submit(_ => {
                $('button.submit').html('<div class="ui loader small active inline"></div>');
                $('button.submit').attr('disabled', true);
                return true;
            });
            $('#company_select').change(function() {
                const val = $('#company_select').val();
                $('button.submit').attr('disabled', val == '');
            });
        </script>
    @endslot
</x-layout>
