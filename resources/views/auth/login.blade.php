<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="col-6 row justify-content-center">
            @csrf
            <!-- Email Address -->
            <div class="col-12" style="margin-bottom: 17px;">
                <label for="email">メールアドレス</label>
                <input
                    id="email"
                    class="form-control"
                    type="email"
                    name="email"
                    :value="old('email')"
                    placeholder="メールアドレス"
                    required
                    autofocus
                />
            </div>

            <!-- Password -->
            <div class="col-12" style="margin-bottom: 17px;">
                <label for="password">パスワード</label>
                <input
                    id="password"
                    class="form-control"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="パスワード"
                />
            </div>


            <!-- Remember Me -->
            <div class="col-12" id="remember_checkbox" style="margin-bottom: 14px;">
                <input id="remember_me" type="checkbox" name="remember">
                <label class="form-check-label" for="remember_me">
                    {{ __('自動ログイン') }}
                </label>
            </div>

            <!-- Validation Errors -->
            <div class="col-12" style="text-align: center; margin-bottom: 40px;">
                <x-auth-validation-errors :errors="$errors" />
            </div>

            <button id="login-button" type="submit" class="col-3 btn btn-warning btn-fill btn-sm" style="margin-bottom: 40px;">
                {{ __('ログイン') }}
            </button>

            <div id="transition-to-register" class="col-12">
                <a href="{{ route('register') }}">
                    {{ __('新規登録') }}
                </a>
            </div>

            <!-- <div id="password-request" class="col-12">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('パスワードを忘れましたか?') }}
                    </a>
                @endif
            </div> -->
        </form>

        <style>
            label {
                font-size: 13px;
                font-weight: 600;
                margin-bottom: -6px;
            }
            #remember_checkbox input[type="checkbox"]{
                display: none;
            }
            /* チェックボックスの代わりを成すラベル */
            #remember_checkbox input[type="checkbox"]+label{
                display: none;
                cursor: pointer;
                display: inline-block;
                position: relative;
                padding-left: 25px;
                padding-right: 10px;
                color: #565656;
                font-size: 13px;
                font-weight: 500;
            }
            /* ラベルの左に表示させる正方形のボックス□ */
            #remember_checkbox input[type="checkbox"]+label::before{
                content: "";
                position: absolute;
                display: block;
                box-sizing: border-box;
                width: 20px;
                height: 20px;
                margin-top: -10px;
                left: 0;
                top: 50%;
                border: 1px solid;
                border-radius: 50%;
                border-color:  #e3e3e3; /* 枠の色変更 お好きな色を */
                background-color: #fff; /* 背景の色変更 お好きな色を */
            }
            /* チェックが入った時のレ点 */
            #remember_checkbox input[type="checkbox"]:checked+label::after{
                content: "";
                position: absolute;
                display: block;
                box-sizing: border-box;
                width: 18px;
                height: 9px;
                margin-top: -9px;
                top: 50%;
                left: 3px;
                transform: rotate(-45deg);
                border-bottom: 3px solid;
                border-left: 3px solid;
                border-color:  #fff; /* チェックの色変更 お好きな色を */
            }
            #remember_checkbox input[type="checkbox"]:checked+label::before{
                border-color: #ff9500; /* 背景の色変更 お好きな色を */
                background-color: #ff9500; /* 背景の色変更 お好きな色を */
            }

            #login-button {
                border-radius: 40px;
                font-size: 14px;
            }

            #password-request,
            #transition-to-register {
                text-align: center;
                font-size: 13px;
            }
        </style>
    </x-auth-card>
</x-guest-layout>
