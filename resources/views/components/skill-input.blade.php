<div>
    <style scoped>
        .skill-input-label {
            margin-bottom: -4px;
            font-size: 14px;
            font-weight: 600;
        }
    </style>

    @if ($attributes->has('label'))
        <label class="skill-input-label" {{ $attributes->merge(['for' => $attributes->get('id')]) }}>{{ $attributes->get('label') }}</label>
    @endif
    <input id="{{ $attributes->get('id') }}" type="text" name="{{ $attributes->get('name') }}" data-role="tagsinput" data-candidatemap="{{ json_encode($candidate_map) }}"/>

    <script>
        (function($) {
            var list = @json($candidates);
            var inputName = @json($attributes->get('name'));

            $(function() {
                var candidates = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: list,
                });
                candidates.initialize();

                $('input[name=' + inputName + ']').tagsinput({
                    typeaheadjs: {
                        name: 'candidates',
                        source: candidates.ttAdapter()
                    }
                });
            });
        })(window.jQuery);
    </script>
</div>
