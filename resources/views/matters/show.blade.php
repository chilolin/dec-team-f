<x-app-layout>
    <x-slot name="title">
        案件詳細
    </x-slot>

    <x-matters.create-input-group label="案件名">
        {{ $matter->name }}
    </x-matters.create-input-group>
    <x-matters.create-input-group label="依頼者">
        {{ $client }}
    </x-matters.create-input-group>
    <x-matters.create-input-group label="開始日">
        {{ $matter->start_at }}
    </x-matters.create-input-group>
    <x-matters.create-input-group label="終了日">
        {{ $matter->end_at }}
    </x-matters.create-input-group>
    <x-matters.create-input-group label="開発工程">
        {{ $skills['process'] }}
    </x-matters.create-input-group>
    <x-matters.create-input-group label="開発の進め方">
        {{ $skills['proceeding'] }}
    </x-matters.create-input-group>
    <x-matters.create-input-group label="デザインパターン">
        {{ $skills['design_pattern'] }}
    </x-matters.create-input-group>
    <x-matters.create-input-group label="フロントエンド">
        <ul class="list-group">
            <li class="list-group-item">言語：{{ $skills['language'] }}</li>
            <li class="list-group-item">フレームワーク：{{ $skills['framework'] }}</li>
        </ul>
    </x-matters.create-input-group>
    <x-matters.create-input-group label="バックエンド">
        <ul class="list-group">
            <li class="list-group-item">言語：{{ $skills['language'] }}</li>
            <li class="list-group-item">フレームワーク：{{ $skills['framework'] }}</li>
        </ul>
    </x-matters.create-input-group>
    <x-matters.create-input-group label="データベース">
        {{ $skills['database'] }}
    </x-matters.create-input-group>
    <x-matters.create-input-group label="インフラ技術">
        {{ $skills['infrastructure'] }}
    </x-matters.create-input-group>
    <x-matters.create-input-group label="エンジニア">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Name</th>
            {{-- <th scope="col">役職</th> --}}
            <th scope="col">開始日</th>
            <th scope="col">終了日</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($engineers as $engineer)
                <tr>
                    <th scope="row">{{ $engineer->name }}</th>
                    {{-- <td>PM</td> --}}
                    <td>{{ $engineer->pivot->start_at }}</td>
                    <td>{{ $engineer->pivot->end_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </x-matters.create-input-group>

</x-app-layout>
