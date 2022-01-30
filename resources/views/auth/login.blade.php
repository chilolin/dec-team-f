<x-guest-layout>
    <div class="container overflow-hidden">
        <div class="row align-items-center justify-content-center" style="height: 100vh;">

            <!-- Session Status -->
            <x-auth-session-status class="col-12" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="col-5 row justify-content-center">
                @csrf
                <a href="/" style="margin-bottom: 40px;">
                    <img src="{{ asset('img/e3sys_logo.png') }}" width="200px" />
                </a>
                <!-- Email Address -->
                <div class="col-12" style="margin-bottom: 12px;">
                    <input
                        id="email"
                        class="form-control"
                        type="email"
                        name="email"
                        :value="old('email')"
                        placeholder="Email Address"
                        required
                        autofocus
                    />
                </div>

                <!-- Password -->
                <div class="col-12" style="margin-bottom: 12px;">
                    <input
                        id="password"
                        class="form-control"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Password"
                    />
                </div>


                <!-- Remember Me -->
                <div class="col-12 row" style="margin-bottom: 40px;">
                    <div class="col-12" style="padding-left: 0px; margin-bottom: 14px;">
                        <input id="remember_me" class="" type="checkbox" name="remember" value="" style="border-radius: 100%;">
                        <label class="form-check-label" for="remember_me" style="color: #565656;">
                            {{ __('Stay Logged In') }}
                        </label>
                    </div>

                    <div class="col-12" style="text-align: center;">
                        <x-auth-validation-errors class="" :errors="$errors" />
                    </div>
                </div>

                <!-- Validation Errors -->

                <button type="submit" class="col-3 btn btn-warning btn-fill btn-sm" style="margin-bottom: 40px; border-radius: 40px; font-size: 14px;">
                    {{ __('Login') }}
                </button>

                <div class="col-12" style="text-align: center;">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="font-size: 13px;">
                            {{ __('パスワードを忘れましたか?') }}
                        </a>
                    @endif
                </div>

            </form>
        </div>
    </div>

    <style>
        input[type="checkbox"]{
            display: none;
        }
        /* チェックボックスの代わりを成すラベル */
        input[type="checkbox"]+label{
            display: none;
            cursor: pointer;
            display: inline-block;
            position: relative;
            padding-left: 25px;
            padding-right: 10px;
        }
        /* ラベルの左に表示させる正方形のボックス□ */
        input[type="checkbox"]+label::before{
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
        input[type="checkbox"]:checked+label::after{
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
        input[type="checkbox"]:checked+label::before{
            border-color: #ff9500; /* 背景の色変更 お好きな色を */
            background-color: #ff9500; /* 背景の色変更 お好きな色を */
        }
    </style>
</x-guest-layout>
