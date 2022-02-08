<div class="custom-ms-wrapper">
    <select
        {{ $attributes->filter(fn ($value, $key) => $key != 'label') }}
        multiple="multiple"
        class="@error('engineers') custom-is-invalid @enderror"
        data-role="multi-select"
    >
        @foreach ($options as $option)
            <option
                value='{{ $option->id }}'
                @if (old(substr($attributes->get('name'), 0, strlen($attributes->get('name'))-2)))
                    {{
                        array_search(
                            $option->id,
                            old(substr($attributes->get('name'), 0, strlen($attributes->get('name'))-2))
                        ) !== false
                        ? 'selected'
                        : ''
                    }}
                @endif
            >
                {{ $option->name }}
            </option>
        @endforeach
    </select>

    @error(substr($attributes->get('name'), 0, strlen($attributes->get('name'))-2))
        <div class="custom-ms-error-message">{{ $message }}</div>
    @enderror

    <script type="text/javascript">
        $(function () {
            var selectableHeader = @json($selectableHeader);
            var selectionHeader = @json($selectionHeader);

            $('select[data-role="multi-select"]').multiSelect({
                selectableHeader:
                    `<div class='multi-select-header'>${selectableHeader}</div>`,
                selectionHeader:
                    `<div class='multi-select-header'>${selectionHeader}</div>`,
            });
        });
    </script>
</div>
