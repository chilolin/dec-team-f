<?php

// ddd($search);

// ddd($check);
// ddd($users);
// ddd($points);
// ddd($big_skill4);

// exit();
?>

<x-app-layout>
    <x-slot name="title">
        社員一覧
    </x-slot>

    <style>
        .search-container {
            padding: 0px 27px;
        }
        .container {
            display: flex;
            flex-flow: row wrap;
            justify-content: space-around;
        }
        .custom-card {
            flex-direction: row;
            width: 28rem;
            height: auto;
        }
        .card-info {
            margin: 28px 16px;
        }
        .icon {
            width: 24px;
            height: auto;
            margin: 8px 4px;
        }
        .card-text {
            margin-top: 16px;
        }
    </style>

    <div class="search-container mb-5">
        <x-employees.search-box />
    </div>
    <div class="container">
        @if(! empty($users))
            @foreach($users as $index => $user)
                <div class="card custom-card">
                    <div class="card-info">
                        <h3 class="card-title"><a href="{{ route('employees.show', ['id' => $user['id']])}}">{{ $user-> name }}</a></h3>
                        <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
                        <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
                    </div>
                    <div class="card-body">
                        @if(gettype($points[$index]) != 'string')
                            <p class="card-text">オススメ度：{{$points[$index]}}</p>
                        @endif
                        <p class="card-text">スキル：</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>選択されたスキルを全て持つユーザーがいませんでした</p>
        @endif
    </div>
</x-app-layout>
