<?php
 use App\Models\Skill;
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
            width: 30rem;
            height: auto;
        }
        .card-info {
            margin: 8px 8px;
        }
        
        .img {
            width: 64x;
            height: 64px;
            margin-left: 16px;
            margin-bottom: 8px;
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
                        <img src="{{ asset('/img/human.png') }}" class="img">
                        <h4 class="card-title"><a href="{{ route('employees.show', ['id' => $user['id']])}}">{{ $user-> name }}</a></h4>
                    </div>
                    <div class="card-body">
                        @if(gettype($points[$index]) != 'string')
                            <p class="card-text">オススメ度：<?php printf("%.2f", $points[$index]);?></p>
                        @endif
                         @if(gettype($points[$index]) == 'string')
                            <p class="card-text">スキル：</p>
                            <ul>
                                @foreach($user->skills as $idx=>$skill)
                                @if($idx<3)
                                    <li>
                                    {{$skill->name}}
                                    </li>
                                @endif
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p>選択されたスキルを全て持つユーザーがいませんでした</p>
        @endif
    </div>
</x-app-layout>

