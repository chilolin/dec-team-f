<x-app-layout>
    <div class="container">
        <h3 class="title">プログラミング言語</h3>
        <div style="padding: 50px 30px;">
            <form>
                <div id="skill-input-group" class="skill-input-group form-group" style="margin-bottom: 50px;">
                    <x-employee.skill-input />
                    <x-employee.level-select />
                    <x-employee.delete-skill-input-button />
                </div>

                <div id="add-button-container" class="row justify-content-md-center">
                    <button type="button" id="add-button" class="btn btn-sm btn-secondary add-button">＋</button>
                </div>

                <div class="row justify-content-md-center">
                    <button type="button" class="btn btn-warning col-lg-2">登録する</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .container {
            width: 100%;
            padding-left: 70px;
            padding-right: 70px;
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

<script>
    (function($) {
        $('#add-button').click(function() {
                $('#skill-input-group').clone(false).insertBefore('#add-button-container');
                $('.skill-input-group:last').find('.skill-input-wrapper').remove();
                $('.skill-input-group:last').find('.level-select-wrapper').remove();

                // スキル入力欄
                var $dataOptions = $('.skill-input-group:first').find('.sr-only').data('options');
                var $skillInput = $(
                    '<input type="text" name="skill-name" data-role="tagsinput" data-options=' + $dataOptions + '>'
                )
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

                // レベル入力欄
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


                // jQueryを適用
                $.ajax({
                    dataType: "script",
                    url: $(location).attr('origin') + '/js/tagsinput.js',
                    success: 'success'
                });
                $.ajax({
                    dataType: "script",
                    url: 'https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js',
                    success: 'success'
                });
                $.ajax({
                    dataType: "script",
                    url: 'https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.js',
                    success: 'success'
                });
                $.ajax({
                    dataType: "script",
                    url: 'https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/locales/LANG.js',
                    success: 'success'
                });

                // クローンした要素を初期化
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
