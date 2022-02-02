<x-app-layout>
    <x-slot name="title">
        案件入力
    </x-slot>

    <div class="container">
        <x-matters.create-input-group label="案件名">
            <input type="text" class="form-control" name="matter_name" />
        </x-matters.create-input-group>

        <x-matters.create-input-group label="依頼者名">
            <input type="text" class="form-control" name="client_name" />
        </x-matters.create-input-group>

        <x-matters.create-input-group label="開始日 / 終了日">
            <div class="row">
                <div class="col-6">
                    <label for="start_date">開始日</label>
                    <input id="start_date" type="text" class="form-control" name="matter_name" />
                </div>
                <div class="col-6">
                    <label for="end_date">終了日</label>
                    <input id="end_date" type="text" class="form-control" name="matter_name" />
                </div>
            </div>
        </x-matters.create-input-group>

        <x-matters.create-input-group label="開発工程">
            <x-skill-input name="process" skill_type="process"/>
        </x-matters.create-input-group>

        <x-matters.create-input-group label="開発の進め方">
            <x-skill-input name="proceeding" skill_type="proceeding"/>
        </x-matters.create-input-group>

        <x-matters.create-input-group label="デザインパターン">
            <x-skill-input name="design_pattern" skill_type="design_pattern"/>
        </x-matters.create-input-group>

        <x-matters.create-input-group label="フロントエンド">
            <div class="row">
                <div class="col-12 mb-2">
                    <x-skill-input
                        id="frontend_language"
                        name="frontend_language"
                        label="プログラミング言語"
                        skill_type="language"
                    />
                </div>
                <div class="col-12">
                    <x-skill-input
                        id="frontend_framework"
                        name="frontend_framework"
                        label="フレームワーク"
                        skill_type="framework"
                    />
                </div>
            </div>
        </x-matters.create-input-group>

        <x-matters.create-input-group label="バックエンド">
            <div class="row">
                <div class="col-12 mb-2">
                    <x-skill-input
                        id="backend_language"
                        name="backend_language"
                        label="プログラミング言語"
                        skill_type="language"
                    />
                </div>
                <div class="col-12">
                    <x-skill-input
                        id="backend_framework"
                        name="backend_framework"
                        label="フレームワーク"
                        skill_type="framework"
                    />
                </div>
            </div>
        </x-matters.create-input-group>

        <x-matters.create-input-group label="データベース">
            <x-skill-input name="database" skill_type="database" />
        </x-matters.create-input-group>

        <x-matters.create-input-group label="インフラ技術">
            <x-skill-input name="infrastructure" skill_type="infrastructure" />
        </x-matters.create-input-group>
    </div>

    <style>
        .container {
            width: 100%;
            padding-right: 70px;
            padding-left: 100px;
            margin-right: auto;
            margin-left: auto;
        }

        label {
            margin-bottom: -4px;
            font-size: 14px;
            font-weight: 600;
        }
    </style>

<!-- <script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            dayViewHeaderFormat: 'YYYY年 MMMM',
            tooltips: {
                close: '閉じる',
                selectMonth: '月を選択',
                prevMonth: '前月',
                nextMonth: '次月',
                selectYear: '年を選択',
                prevYear: '前年',
                nextYear: '次年',
                selectTime: '時間を選択',
                selectDate: '日付を選択',
                prevDecade: '前期間',
                nextDecade: '次期間',
                selectDecade: '期間を選択',
                prevCentury: '前世紀',
                nextCentury: '次世紀'
            },
            format: 'YYYY/MM/DD',
            locale: 'ja',
            showClose: true
        });
        $('#datetimepicker2').datetimepicker({
            tooltips: {
                close: '閉じる',
                pickHour: '時間を取得',
                incrementHour: '時間を増加',
                decrementHour: '時間を減少',
                pickMinute: '分を取得',
                incrementMinute: '分を増加',
                decrementMinute: '分を減少',
                pickSecond: '秒を取得',
                incrementSecond: '秒を増加',
                decrementSecond: '秒を減少',
                togglePeriod: '午前/午後切替',
                selectTime: '時間を選択'
            },
            format: 'HH:mm',
            locale: 'ja',
            showClose: true
        });
    });
</script> -->
</x-app-layout>
