<div class="{{ $attributes->get('class') }}">
    <input
        id="{{ $attributes->get('id') }}"
        name="{{ $attributes->get('name') }}"
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
                    tagClass: function(item) {
                        switch (item.skillType) {
                            case 'language': return 'badge badge-primary';
                            case 'framework': return 'badge badge-secondary';
                            case 'design_pattern': return 'badge badge-success';
                            case 'process': return 'badge badge-danger';
                            case 'proceeding': return 'badge badge-warning';
                            case 'engineer_type': return 'badge badge-info';
                            case 'position': return 'badge badge-pink';
                            case 'database': return 'badge badge-dark';
                            case 'infrastructure': return 'badge badge-purple';
                        }
                    },
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
