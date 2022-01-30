<div class="row">
    <label for="selectSkillLevel" class="col-md-2 col-form-label">レベル</label>
    <div class="col-md-7" style="margin-bottom: 10px;">
        <input
            id="input-id"
            name="input-name"
            type="number"
            class="rating rating-loading"
            data-min='0'
            data-max='5'
            data-step='0.5'
            data-size="sm"
        >
    </div>

    <script>
        $("#input-id").rating({
            starCaptions: {
                0.5: 'level 0.5',
                1: 'level 1',
                1.5: 'level 1.5',
                2: 'level 2',
                2.5: 'level 2.5',
                3: 'level 3',
                3.5: 'level 3.5',
                4: 'level 4',
                4.5: 'level 4.5',
                5: 'level 5',
            },
            hoverChangeCaption: false,
        });
    </script>
</div>
