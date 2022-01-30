<x-guest-layout>
    <x-auth-card>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}" class="col-6 row justify-content-center">
            @csrf

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

            <button id="password-reset-button" type="submit" class="col-3 btn btn-warning btn-fill btn-sm" style="margin-bottom: 40px;">
                {{ __('リセット') }}
            </button>
        </form>
    </x-auth-card>
</x-guest-layout>
