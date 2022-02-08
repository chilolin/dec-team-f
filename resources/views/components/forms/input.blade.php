<div class="custom-input-wrapper">
    @if ($attributes->has('label'))
        <label class="custom-input-label" {{ $attributes->merge(['for' => $attributes->get('id')]) }}>{{ $attributes->get('label') }}</label>
    @endif

    <input
        {{ $attributes->filter(fn ($value, $key) => $key != 'label') }}
        type="text"
        class="form-control input @error($attributes->get('name')) custom-is-invalid @enderror"
    />

    @error($attributes->get('name'))
        <div class="alert custom-input-error-message">{{ $message }}</div>
    @enderror
</div>
