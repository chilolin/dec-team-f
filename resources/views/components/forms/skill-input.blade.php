<div class="skill-input-wrapper">
    @if ($attributes->has('label'))
        <label class="skill-input-label" {{ $attributes->merge(['for' => $attributes->get('id')]) }}>{{ $attributes->get('label') }}</label>
    @endif

    <input
        {{ $attributes->filter(fn ($value, $key) => $key != 'label') }}
        type="text"
        class="form-control @error($attributes->get('name')) custom-is-invalid @enderror"
        value="{{ old($attributes->get('name')) }}"
        data-role="tagsinput"
        data-candidates = "{{ json_encode($candidates) }}"
        data-candidatemap="{{ json_encode($candidate_map) }}"
    />

    @error($attributes->get('name'))
        <div class="skill-input-error-message">{{ $message }}</div>
    @enderror

    <script>
        (function($) {
            'use strict';

            const list = @json($candidates);
            const inputName = @json($attributes->get('name'));

            $(function() {
                const candidates = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: list,
                });
                candidates.initialize();

                $(`input[name="${inputName}"]`).tagsinput({
                    typeaheadjs: {
                        name: 'candidates',
                        source: candidates.ttAdapter()
                    }
                });
            });
        })(window.jQuery);
    </script>
</div>
