<div {{ $attributes->merge(['class' => 'accordion']) }} id="accordion-{{ $skillType }}">
    <style>
        .accordion {
            width: 100%;
            padding: 0px;
        }
        .accordion .card-header {
            width: 100%;
            padding: 0px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125)!important;
        }
        .accordion .card-header-text {
            width: 100%;
            height: 100%;
            padding: 15px 20px;
            text-align: center;
            font-size: 14px;
            color: #333333;
            cursor: pointer;
        }
        .accordion .collapsed {
            background-color: #EBF4F4;
        }
        .accordion .card-body {
            padding: 15px 20px;
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
            <div class="card-header-text collapsed" data-toggle="collapse" data-target="#collapse-{{ $skillType }}" aria-expanded="false" aria-controls="collapse-{{ $skillType }}">
                {{ $skill_types_in_jp[$skillType] }}
            </div>
        </div>

        <div id="collapse-{{ $skillType }}" class="collapse" aria-labelledby="heading-{{ $skillType }}" data-parent="#accordion-{{ $skillType }}">
            <div class="card-body">
                @foreach ($skills as $index => $skill)
                    <div class="custom-control custom-checkbox ml-2 mb-2">
                        <input
                            type="checkbox"
                            class="custom-control-input"
                            id="modal-check-{{ $skillType }}-{{ $index }}"
                        >
                        <label class="custom-control-label" for="modal-check-{{ $skillType }}-{{ $index }}">{{ $skill['name'] }}</label>
                    </div>
                    <script>
                            $('input[type=checkbox]').click(function() {
                                console.log('change')
                                $('input[data-role="tagsinput"]').tagsinput('add', { id: @json($skill['id']), text: @json($skill['name'])})
                            })
                        });
                    </script>
                @endforeach
            </div>
        </div>
    </div>
</div>
