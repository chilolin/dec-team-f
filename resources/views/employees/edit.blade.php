<x-app-layout>
    <x-slot name="title">
        スキル編集
    </x-slot>

    <style scoped>
        .container {
            width: 100%;
            padding-left: 150px;
            padding-right: 150px;
            margin-left: auto;
            margin-right: auto;
        }

        .add-button {
            border-radius: 50%;
            font-size: 22px;
            padding: auto;
            margin-bottom: 50px;
        }
    </style>

    <div class="container">
        <h3 class="title">{{ $skill_type_translator[$skill_type] }}</h3>
        <div style="padding: 50px 30px;">
            <form method="POST">
                @foreach ($skill_list as $idx => $skill)
                    <div id="skill-input-group" class="skill-input-group form-group" style="margin-bottom: 50px;">
                        <div class="row">
                            <label for="skill-name-input" class="col-md-2 col-form-label">スキル名</label>
                            <div class="col-md-10 skill-input-wrapper" style="margin-bottom: 10px;">
                                <x-forms.skill-input skill_type="{{ $skill_type }}" name="skill-name-{{ $idx+1 }}" value="{{ $skill->name }}" />
                            </div>
                        </div>

                        <div class="row">
                            <label for="selectSkillLevel" class="col-md-2 col-form-label">レベル</label>
                            <div class="col-md-7 level-select-wrapper" style="margin-bottom: 10px;">
                                <input
                                    id="level-select"
                                    name="skill-level"
                                    type="number"
                                    class="rating rating-loading"
                                    value="{{ $skill->pivot->level }}"
                                    data-min='0'
                                    data-max='5'
                                    data-step='0.5'
                                    data-size='sm'
                                >
                            </div>
                        </div>

                        <x-employees.delete-skill-input-button />
                    </div>
                @endforeach

                <div id="skill-input-group" class="skill-input-group form-group" style="margin-bottom: 50px;">
                    <div class="row">
                        <label for="skill-name-input" class="col-md-2 col-form-label">スキル名</label>
                        <div class="col-md-10 skill-input-wrapper" style="margin-bottom: 10px;">
                            <x-forms.skill-input skill_type="{{ $skill_type }}" name="skill-name-0" />
                        </div>
                    </div>
                    <div class="row">
                        <label for="selectSkillLevel" class="col-md-2 col-form-label">レベル</label>
                        <div class="col-md-7 level-select-wrapper" style="margin-bottom: 10px;">
                            <input
                                id="level-select"
                                name="skill-level"
                                type="number"
                                class="rating rating-loading"
                                data-min='0'
                                data-max='5'
                                data-step='0.5'
                                data-size='sm'
                            >
                        </div>
                    </div>
                    <x-employees.delete-skill-input-button />
                </div>

                <div id="add-button-container" class="row justify-content-md-center">
                    <button type="button" id="add-button" class="btn btn-sm btn-secondary add-button">＋</button>
                </div>

                <div class="row justify-content-md-center">
                    <button type="button" class="btn btn-warning col-lg-2" onclick="event.preventDefault(); this.closest('form').submit();">登録する</button>
                </div>
            </form>
        </div>
    </div>

    <script>
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

            $('#add-button').click(function() {
                $('#skill-input-group').clone(false).insertBefore('#add-button-container');
                $('.skill-input-group:last').find('.skill-input-wrapper').remove();
                $('.skill-input-group:last').find('.level-select-wrapper').remove();

                // スキル入力欄を作成
                var $dataOptions = $('.skill-input-group:first').find('.sr-only').data('options');
                var $skillInput = $(
                    '<input type="text" name="skill-name" data-role="tagsinput" data-options=' + $dataOptions + '>'
                );
                var $skillInputWrapper = $(
                    "<div>",
                    {
                        css: {
                            marginBottom: "10px"
                        },
                        addClass: "col-md-10 skill-input-wrapper",
                    }
                )
                .append($skillInput);
                $('.skill-input-group:last .row:first').append($skillInputWrapper)

                // レベル入力欄を作成
                var $levelSelect = $('<input id="level-select" name="skill-level" type="number" class="rating rating-loading" data-min="0" data-max="5" data-step="0.5" data-size="sm">')
                var $levelSelectWrapper = $(
                    "<div>",
                    {
                        css: {
                            marginBottom: "10px"
                        },
                        addClass: "col-md-7 level-select-wrapper",
                    }
                ).append($levelSelect);
                $('.skill-input-group:last .row:nth-child(2)').append($levelSelectWrapper)

                //  プラグインを適用
                $skillInput.tagsinput();
                $levelSelect.rating({
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
            });
        })(window.jQuery);
    </script>
</x-app-layout>
