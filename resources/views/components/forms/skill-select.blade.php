<div class="skill-select-wrapper">
    <input
        {{ $attributes }}
        type="text"
        class="form-control"
        data-role="tagsinput"
    />

    <script>
        (function($) {
            $(function() {
                const candidates = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: @json($candidates),
                });
                candidates.initialize();

                $('input[data-role="tagsinput"]').tagsinput({
                    itemValue: 'value',
                    itemText: 'text',
                    typeaheadjs: {
                        name: 'candidates',
                        displayKey: 'text',
                        source: candidates.ttAdapter()
                    }
                });
            });
        })(window.jQuery);
    </script>
</div>
