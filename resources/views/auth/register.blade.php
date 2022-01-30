<x-guest-layout>
    <x-auth-card>
        <form method="POST" action="{{ route('register') }}" class="col-5 row justify-content-center">
            @csrf
            <!-- Name -->
            <div class="col-12" style="margin-bottom: 17px;">
                <label for="name">名前</label>
                <input
                    id="name"
                    class="form-control"
                    type="text"
                    name="name"
                    :value="old('name')"
                    placeholder="名前"
                    required
                    autofocus
                />
            </div>

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

            <!-- Confirm Password -->
            <div class="col-12" style="margin-bottom: 17px;">
                <label for="password_confirmation">パスワード（確認）</label>
                <input
                    id="password_confirmation"
                    class="form-control"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="current-password"
                    placeholder="パスワード（確認）"
                />
            </div>

            <!-- Validation Errors -->
            <div class="col-12" style="text-align: center; margin-bottom: 40px;">
                <x-auth-validation-errors :errors="$errors" />
            </div>

            <button id="register-button" type="submit" class="col-3 btn btn-warning btn-fill btn-sm" style="margin-bottom: 40px;">
                {{ __('登録する') }}
            </button>

            <div id="transition-to-login" class="col-12">
                <a href="{{ route('login') }}">
                    {{ __('ログイン') }}
                </a>
            </div>
        </form>

        <style>
            label {
                font-size: 13px;
                font-weight: 600;
                margin-bottom: -6px;
            }
            #register-button {
                border-radius: 40px;
                font-size: 14px;
            }

            #transition-to-login {
                text-align: center;
                font-size: 13px;
            }
        </style>
    </x-auth-card>
</x-guest-layout>
