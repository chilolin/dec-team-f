<x-app-layout>
    <x-slot name="title">
        案件入力
    </x-slot>

    <style>
        .container {
            width: 100%;
            padding-right: 70px;
            padding-left: 100px;
            padding-bottom: 100px;
            margin-right: auto;
            margin-left: auto;
        }
        .multi-select-header {
            background: rgba(203, 203, 210, 0.15);
            color: #000;
            font-size: 14px;
            font-weight: 600;
        }
    </style>

    <div class="container">
        <form method="POST" action="{{ route('matters.store') }}">
            @csrf
            <x-matters.create-input-group label="案件名">
                <x-forms.input id="matter_name" name="matter_name"/>
            </x-matters.create-input-group>

            <x-matters.create-input-group label="依頼者名">
                <x-forms.input id="client_name" name="client_name" />
            </x-matters.create-input-group>

            <x-matters.create-input-group label="開始日 / 終了日">
                <div class="row">
                    <div class="col-6">
                        <x-forms.datetimepicker id="matter_start_at" name="matter_start_at" label="開始日" />
                    </div>
                    <div class="col-6">
                        <x-forms.datetimepicker id="matter_end_at" name="matter_end_at" label="終了日" />
                    </div>
                </div>
            </x-matters.create-input-group>

            <x-matters.create-input-group label="開発工程">
                <x-forms.skill-input name="process" skill_type="{{ $process }}"/>
            </x-matters.create-input-group>

            <x-matters.create-input-group label="開発の進め方">
                <x-forms.skill-input name="proceeding" skill_type="{{ $proceeding }}"/>
            </x-matters.create-input-group>

            <x-matters.create-input-group label="デザインパターン">
                <x-forms.skill-input name="design_pattern" skill_type="{{ $design_pattern }}"/>
            </x-matters.create-input-group>

            <x-matters.create-input-group label="フロントエンド">
                <div class="row">
                    <div class="col-12 mb-4">
                        <x-forms.skill-input
                            id="frontend_language"
                            name="frontend_language"
                            label="プログラミング言語"
                            skill_type="{{ $language }}"
                        />
                    </div>
                    <div class="col-12">
                        <x-forms.skill-input
                            id="frontend_framework"
                            name="frontend_framework"
                            label="フレームワーク"
                            skill_type="{{ $framework }}"
                        />
                    </div>
                </div>
            </x-matters.create-input-group>

            <x-matters.create-input-group label="バックエンド">
                <div class="row">
                    <div class="col-12 mb-4">
                        <x-forms.skill-input
                            id="backend_language"
                            name="backend_language"
                            label="プログラミング言語"
                            skill_type="{{ $language }}"
                        />
                    </div>
                    <div class="col-12">
                        <x-forms.skill-input
                            id="backend_framework"
                            name="backend_framework"
                            label="フレームワーク"
                            skill_type="{{ $framework }}"
                        />
                    </div>
                </div>
            </x-matters.create-input-group>

            <x-matters.create-input-group label="データベース">
                <x-forms.skill-input name="database" skill_type="{{ $database }}" />
            </x-matters.create-input-group>

            <x-matters.create-input-group label="インフラ技術">
                <x-forms.skill-input name="infrastructure" skill_type="{{ $infrastructure }}" />
            </x-matters.create-input-group>

            <x-matters.create-input-group label="エンジニア">
                <x-forms.multi-select
                    name="engineers[]"
                    selectable_header="エンジニア一覧"
                    selection_header="アサイン済み"
                    :options="$employees"
                />
            </x-matters.create-input-group>

            <div class="row justify-content-center mt-5">
                <button type="submit" class="btn btn-fill btn-warning col-lg-4">登録する</button>
            </div>
        </form>
    </div>
</x-app-layout>
