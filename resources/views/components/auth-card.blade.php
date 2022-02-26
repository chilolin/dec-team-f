<div class="container d-flex align-items-center justify-content-center">
    <div>
        <div class="d-flex justify-content-center" style="margin-bottom: 40px;">
            <a href="/">
                <img src="{{ asset('img/logo.png') }}" width="170px" />
            </a>
        </div>

        <div class="row justify-content-center">
            {{ $slot }}
        </div>
    </div>

    <style>
        .container {
            min-height: 100vh;
        }
    </style>
</div>
