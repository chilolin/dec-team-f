<div class="row">
    <label for="selectSkillLevel" class="col-md-2 col-form-label">レベル</label>
    <div class="col-md-3" style="margin-bottom: 10px;">
        <select class="custom-select custom-select-lg">
            <option selected>レベルを指定</option>
            @for ($i = 1; $i < 11; $i++)
                <option value="{{ $i/2 }}">{{ $i/2 }}</option>
            @endfor
        </select>
    </div>
</div>
