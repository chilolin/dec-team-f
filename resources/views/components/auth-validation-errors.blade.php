@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        @if ($errors->any())
            <div style="color: #ff4a55; font-size: 13px">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <!-- <div style="color: #ff4a55; font-size: 13px">
            {{ __('メールアドレスまたはパスワードが違います。') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> -->
    </div>
@endif
