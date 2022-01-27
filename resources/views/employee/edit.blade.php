<x-app-layout>
    <div class="container">
        <h3 class="title">プログラミング言語</h3>
        <div style="padding: 50px 30px;">
            <form>
                <div class="form-group row" style="margin-bottom: 50px;">
                    <label for="inputSkillName" class="col-md-2 col-form-label">スキル名</label>
                    <div class="col-md-10 input-group-lg" style="margin-bottom: 10px;">
                        <input type="text" class="form-control" id="inputSkillName" placeholder="スキル名">
                    </div>
                    <label for="selectSkillLevel" class="col-md-2 col-form-label">レベル</label>
                    <div class="col-md-3" style="margin-bottom: 10px;">
                        <select class="custom-select custom-select-lg">
                            <option selected>レベルを指定</option>
                            @for ($i = 1; $i < 11; $i++)
                                <option value="{{ $i/2 }}">{{ $i/2 }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-danger btn-sm">削除する</button>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputSkillName" class="col-md-2 col-form-label">スキル名</label>
                    <div class="col-md-10 input-group-lg" style="margin-bottom: 10px;">
                        <input type="text" class="form-control" id="inputSkillName" placeholder="スキル名">
                    </div>
                    <label for="selectSkillLevel" class="col-md-2 col-form-label">レベル</label>
                    <div class="col-md-3" style="margin-bottom: 10px;">
                        <select class="custom-select custom-select-lg">
                            <option selected>レベルを指定</option>
                            @for ($i = 1; $i < 11; $i++)
                                <option value="{{ $i/2 }}">{{ $i/2 }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-danger btn-sm">削除する</button>
                    </div>
                </div>

                <div class="row justify-content-md-center">
                    <button type="submit" class="btn btn-sm btn-secondary skill-add-button">＋</button>
                </div>

                <div class="row justify-content-md-center">
                    <button type="submit" class="btn btn-warning col-lg-2">登録する</button>
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

        .skill-add-button {
            border-radius: 50%;
            font-size: 22px;
            padding: auto;
            margin-bottom: 50px;
        }
    </style>
</x-app-layout>
