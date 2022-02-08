<style scoped>
    .matter-input-group {
        margin-top: 15px;
        margin-bottom: 15px;
    }
    .matter-label {
        min-height: 60px;
        background: #e5e5e5;
        text-align: center;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .matter-input-wrapper {
        padding-top: 15px;
        padding-bottom: 15px;
    }
</style>

<div class="row matter-input-group justify-content-center">
    <div class="col-3 matter-label"><span>{{ $label }}</span></div>
    <div class="col-7 matter-input-wrapper">
        {{ $slot }}
    </div>
</div>
