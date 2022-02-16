<style scoped>
    .matter-input-group {
        margin-top: 5px;
        margin-bottom: 5px;
    }
    .matter-label {
        min-height: 60px;
        width: 210px;
        background: #e5e5e5;
        text-align: center;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .matter-input-wrapper {
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>

<div class="row matter-input-group justify-content-center">
    <div class="matter-label"><span>{{ $label }}</span></div>
    <div class="col-7 matter-input-wrapper">
        {{ $slot }}
    </div>
</div>
