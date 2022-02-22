<?php

// var_dump($users[0]);

// var_dump($skills[1]);

// var_dump($search);

// var_dump($matter_hit_each);
// var_dump($matter_hits);
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
        @foreach($users as $user)
            <div class="card custom-card">
                <div class="card-info">
                    <h3 class="card-title"><a href="{{ route('employees.show', ['id' => $user['id']])}}">{{ $user-> name }}</a></h3>
                    <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
                    <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
                </div>
                <div class="card-body">
                    <p class="card-text">役職：</p>
                    <p class="card-text">言語：</p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- <script>
        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        })
    </script> --}}
</x-app-layout>

<!-- data-toggle="tooltip" data-placement="top" title="Tooltip on top" -->
