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
            data-show-clear="false"
        >
    </div>

    <script type="text/javascript">
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
    </script>
</div>
