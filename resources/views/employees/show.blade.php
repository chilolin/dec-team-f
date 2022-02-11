<?php

//変数動作確認
// var_dump($uid);
// var_export($detail);
// exit();
?>

<x-app-layout>
    <x-slot name="title">
        社員詳細
    </x-slot>

    <style scoped>
        .container {
            width: 100%;
            padding-left: 120px;
            padding-right: 120px;
            padding-bottom: 80px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

    <div class="content">
        <div class="container">
            <div class="card card-user">
                <div class="card-body row">
                    <div class="col-md-4">
                        <img class="avatar border-gray" src="{{asset('img/dinosaur.jfif')}}" alt="dinosaur">
                    </div>
                    <div class="col-md-8">
                        <h4 class="title">Mike Andrew</h4>
                        <p class="description">
                            michael24
                        </p>
                    </div>
                </div>
            </div>

            <x-employees.skill-card-list list-type="practice" uid="{{ $uid }}" />
            <x-employees.skill-card-list list-type="learning" uid="{{ $uid }}" />
            <x-employees.skill-card-list list-type="career" uid="{{ $uid }}" />
        </div>
    </div>
</x-app-layout>
