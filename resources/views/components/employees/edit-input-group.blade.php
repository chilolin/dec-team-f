<div id="skill-input-group" class="skill-input-group form-group mb-5">
    <div class="row mb-3">
        <label for="skill-name-input" class="col-md-2 col-form-label">スキル名</label>
        <div class="col-md-10 skill-input-wrapper">
            <x-forms.skill-input
                skill_type="{{ $skillType }}"
                name="skills[{{ $index }}][name]"
                value="{{ $attributes->get('default_skill_name') }}"
            />
        </div>
    </div>

    <div class="row">
        <label for="select-skill-level" class="col-md-2 col-form-label">レベル</label>
        <div class="col-6 level-select-wrapper">
            <input
                id="level-select"
                name="skills[{{ $index }}][level]"
                type="number"
                class="rating rating-loading"
                value="{{ $attributes->get('default_skill_level') }}"
                data-min='0'
                data-max='5'
                data-step='0.5'
                data-size='sm'
                data-show-clear="false"
            >
        </div>

        @if (strpos(url()->current(), 'career') == false)
            <label for="is-practice-switch-{{ $index }}" class="col-md-2 col-form-label">実務経験</label>
            <div class="col-1 mt-1">
                <label class="switch">
                    <input
                        type="checkbox"
                        class="toggle-input"
                        id="is-practice-switch-{{ $index }}"
                        name="skills[{{ $index }}][is_practice]"
                        style="height: 24px"
                        {{ $attributes->get('default_skill_is_practice') ? 'checked' : null }}
                    >
                    <span class="slider round"></span>
                </label>
            </div>
        @endif
    </div>

    <x-employees.delete-skill-input-button />


    <script type="text/javascript">
        (function($) {
            'use strict';

            $("#level-select").rating({
                starCaptions: {
                    0.5: '0.5',
                    1: '1.0',
                    1.5: '1.5',
                    2: '2.0',
                    2.5: '2.5',
                    3: '3.0',
                    3.5: '3.5',
                    4: '4.0',
                    4.5: '4.5',
                    5: '5.0',
                },
                hoverChangeCaption: false,
            });

            $('.slider').on('click', function() {

            })
        })(window.jQuery)
    </script>
</div>
