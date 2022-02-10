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
        <h3 class="title">{{ $skill_types_in_jp[$skill_type] }}</h3>
        <div style="padding: 50px 30px;">
            <form
                method="POST"
                action="{{
                    strpos(url()->current(), 'career') != false ?
                    route('employees.career_store', ['skill_type' => $skill_type]) :
                    route('employees.learning_store', ['skill_type' => $skill_type])
                }}"
            >
                @csrf

                @if (old('skills'))
                    @foreach (old('skills') as $index => $old_skill)
                        @php
                            $tagsinput_default = '';
                            if (json_decode($old_skill['name'])) {
                                $tagsinput_default = array_reduce(
                                    json_decode($old_skill['name']),
                                    function ($tagsinput_default, $tagsinput_skill) {
                                        if (!$tagsinput_default) return $tagsinput_skill->value;
                                        return $tagsinput_default . ',' . $tagsinput_skill->value;
                                    },
                                    ''
                                );
                            }
                        @endphp

                        <x-employees.edit-input-group
                            skill_type="{{ $skill_type }}"
                            index="{{ $index }}"
                            default_skill_name="{{ $tagsinput_default }}"
                            default_skill_level="{{ $old_skill['level'] }}"
                        />
                    @endforeach
                @else
                    @foreach ($skill_list as $index => $skill)
                        <x-employees.edit-input-group
                            skill_type="{{ $skill_type }}"
                            index="{{ $index+1 }}"
                            default_skill_name="{{ $skill->name }}"
                            default_skill_level="{{ $skill->pivot->level }}"
                        />
                    @endforeach

                    <x-employees.edit-input-group
                        skill_type="{{ $skill_type }}"
                        index=0
                    />
                @endif

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

            $(".rating").rating({
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
                const index = $('.skill-input-group').length;
                $('#skill-input-group').clone(false).insertBefore('#add-button-container');
                $('.skill-input-group:last').find('.skill-input-wrapper').remove();
                $('.skill-input-group:last').find('.level-select-wrapper').remove();

                // スキル入力欄を作成
                const $candidatemap = $('.skill-input-group:first').find('.sr-only').data('candidatemap');
                const $list = $('.skill-input-group:first').find('.sr-only').data('candidates');
                const $skillInput = $(
                    `<input type="text" class="form-control" name="skills[${index}][name]" data-role="tagsinput" data-candidatemap="${$candidatemap}">`
                );
                const $skillInputWrapper = $(
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
                const $levelSelect = $(`<input id="level-select" name="skills[${index}][level]" type="number" class="rating rating-loading" data-min="0" data-max="5" data-step="0.5" data-size="sm" data-show-clear="false">`)
                const $levelSelectWrapper = $(
                    "<div>",
                    {
                        css: {
                            marginBottom: "10px"
                        },
                        addClass: "col-md-7 level-select-wrapper",
                    }
                ).append($levelSelect);
                $('.skill-input-group:last .row:nth-child(2)').append($levelSelectWrapper)

                const candidates = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: $list,
                });
                candidates.initialize();

                //  プラグインを適用
                $skillInput.tagsinput({
                    typeaheadjs: {
                        name: 'candidates',
                        source: candidates.ttAdapter()
                    }
                });
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
