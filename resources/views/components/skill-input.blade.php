<div>
    <style scoped>
        .skill-input-label {
            margin-bottom: -4px;
            font-size: 14px;
            font-weight: 600;
        }

        .ui-menu .ui-menu-item-wrapper {
            position: relative;
            padding: 3px 1em 3px .4em;
        }
        /* リスト全体の背景 */
        .ui-widget-content {
            width: 400px;
            border: 1px solid #dddddd!important;
            background: #eeeeee!important;
            color: #333333!important;
        }
        /* リスト hover 時のカラー */
        .ui-state-active {
            border: 1px solid #cccccc!important;
            background: #f6f6f6!important;
            font-weight: bold!important;
            color: #17a2b8!important;
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
