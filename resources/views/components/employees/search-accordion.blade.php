<div {{ $attributes->merge(['class' => 'accordion']) }} id="accordion-{{ $skillType }}">
    <style>
        .accordion {
            position: relative;
            width: 100%;
            padding: 0px;
        }
        .accordion .card {
            position: unset;
            margin-bottom: 0px;
        }
        .accordion .card-header {
            width: 100%;
            height: 40px;
            padding: 0px;
            border-bottom: 1px solid!important;
        }
        .accordion .card-header-text {
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
        .accordion .collapsed {
            background-color: #fff7e7;
        }
        .accordion .collapse {
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
        .accordion .collapse.show {
            display: block;
        }
        .accordion.upper .collapse {
            z-index: 1100;
        }
        .accordion .collapsing {
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
        .accordion.upper .collapsing {
            z-index: 1100;
        }
        .accordion .custom-control-label::before,.custom-control-label::after {
            top: 0.2px;
            width: 1.25rem;
            height: 1.25rem;
        }
		.accordion .custom-control-input,.custom-control-label {
            font-size: 14px!important;
			cursor: pointer;
		}
    </style>

    <div class="card">
        <div class="card-header" id="heading-{{ $skillType }}">
            <div class="card-header-text collapsed dropdown-toggle" data-toggle="collapse" data-target="#collapse-{{ $skillType }}" aria-expanded="false" aria-controls="collapse-{{ $skillType }}">
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
                                const tagCheckbox = $(`#accordion-check-${event.item.skill_type}-${event.item.value}`);

                                if(!tagCheckbox.prop('checked')) {
                                    tagCheckbox.prop('checked', true);
                                }
                            });

                            $('#accordion-search-tagsinput').on('beforeItemRemove', function(event) {
                                const tagCheckbox = $(`#accordion-check-${event.item.skill_type}-${event.item.value}`);

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
