<div {{ $attributes->merge(['class' => 'accordion search-accordion']) }} id="accordion-{{ $skillType }}">
    <style>
        .search-accordion {
            position: relative;
            width: 100%;
            padding: 0px;
        }
        .search-accordion .card {
            position: unset;
            margin-bottom: 0px;
        }
        .search-accordion .card-header {
            width: 100%;
            height: 40px;
            padding: 0px;
            border-bottom: 1px solid!important;
        }
        .search-accordion .card-header-text {
            width: 100%;
            height: 100%;
            padding: 10px 20px;
            margin: auto;
            text-align: center;
            font-size: 14px;
            color: #333333;
            cursor: pointer;
            border-bottom: 1px solid rgba(0,0,0,.15);
        }
        .search-accordion .collapsed {
            /* background-color: #f1f1f1; */
            background-color: #fff;
        }
        .search-accordion .collapse {
            width: 100%;
            position: absolute;
            left: 0;
            z-index: 1000;
            display: none;
            padding: 5px 10px;
            border: 1px solid rgba(0,0,0,.15);
            top: 40px;
            background-color: #fff;
        }
        .search-accordion .collapse.show {
            display: block
        }
        .search-accordion.upper .collapse {
            z-index: 1100;
        }
        .search-accordion .collapsing {
            width: 100%;
            position: absolute;
            left: 0;
            z-index: 1000;
            display: block;
            background-color: #fff;
            padding: 5px 10px;
            border: 1px solid rgba(0,0,0,.15);
            top: 40px;
        }
        .search-accordion.upper .collapsing {
            z-index: 1100;
        }
        .search-accordion .custom-control-label::before,.custom-control-label::after {
            top: 0.2px;
            width: 1.25rem;
            height: 1.25rem;
        }
		.search-accordion .custom-control-input,.custom-control-label {
            font-size: 14px!important;
			cursor: pointer;
            text-transform: none!important;
		}
    </style>

    <div class="card {{ $borderType }} rounded">
        <div class="card-header {{ $borderType }} rounded" id="heading-{{ $skillType }}">
            <div class="card-header-text collapsed dropdown-toggle {{ $borderType }} rounded" data-toggle="collapse" data-target="#collapse-{{ $skillType }}" aria-expanded="false" aria-controls="collapse-{{ $skillType }}">
                {{ $skill_types_in_jp[$skillType] }}
            </div>
        </div>

        <div id="collapse-{{ $skillType }}" class="collapse" aria-labelledby="heading-{{ $skillType }}" data-parent="#accordion-{{ $skillType }}">
            <div class="card-body">
                @foreach ($skills as $skill)
                    <div class="custom-control custom-checkbox ml-2 mb-2">
                        <input
                            type="checkbox"
                            class="custom-control-input accordion-check-{{ $skillType }}-{{ $skill['id'] }}"
                            id="accordion-check-{{ $skillType }}-{{ $skill['id'] }}"
                        >
                        <label class="custom-control-label" for="accordion-check-{{ $skillType }}-{{ $skill['id'] }}">{{ $skill['name'] }}</label>
                    </div>
                    <script>
                        (function($) {
                            const skillType = @json($skillType);
                            const skillId = @json($skill['id']);
                            const skillName = @json($skill['name']);

                            $(`#accordion-check-${skillType}-${skillId}`).change(function(event) {
                                if (event.target.checked) {
                                    $('#accordion-search-tagsinput').tagsinput('add', { value: skillId, text: skillName, skillType: skillType});
                                } else {
                                    $('#accordion-search-tagsinput').tagsinput('remove', { value: skillId, text: skillName, skillType: skillType});
                                }
                            })

                            $('#accordion-search-tagsinput').on('beforeItemAdd', function(event) {
                                const tagCheckbox = $(`#accordion-check-${event.item.skillType}-${event.item.value}`);

                                if(!tagCheckbox.prop('checked')) {
                                    tagCheckbox.prop('checked', true);
                                }
                            });

                            $('#accordion-search-tagsinput').on('beforeItemRemove', function(event) {
                                const tagCheckbox = $(`#accordion-check-${event.item.skillType}-${event.item.value}`);

                                if(tagCheckbox.prop('checked')) {
                                    tagCheckbox.prop('checked', false);
                                }
                            });
                        })(window.jQuery);
                    </script>
                @endforeach
            </div>
        </div>
    </div>
</div>
