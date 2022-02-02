<div class="row matter_input_group">
    <div class="col-3 matter_label"><span>{{ $label }}</span></div>
    <div class="col-7 matter_input">
        {{ $slot }}
    </div>

    <style>
        .matter_input_group {
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .matter_label {
            min-height: 60px;
            background: #e5e5e5;
            text-align: center;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .matter_input {
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
</div>
