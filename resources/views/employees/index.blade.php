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
                        <h3 class="card-title"><a href="{{ route('employees.show', ['id' => $user['id']])}}">{{ $user-> name }}</a></h3>
                    </div>
                    <div class="card-body">
                        @if(gettype($points[$index]) != 'string')
                            <p class="card-text">オススメ度：{{$points[$index]}}</p>
                        @endif
                        <!-- @if(gettype($points[$index]) == 'string')
                            <?php 
                                $user_skill_array = $user->skills;
                                $id_level = array();
                                foreach($user_skill_array as $array){
                                $skill_id = $array ->only('id');
                                $skill_id = $skill_id['id'];
                                $id_level[$skill_id]= $array -> pivot->level;
                                }
                                arsort($id_level);
                                $id_keys = array_keys($id_level);
                                for($i = 0; $i<4; $i++) {
                                    $colle = Skill::find($id_keys[$i])->get();
                                   foreach($colle as $co){
                                        $skill_name = $co->name;
                                        echo($skill_name);
                                      }
                                   }
                            ?> -->
                            <p class="card-text">スキル：</p>
                            @else
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p>選択されたスキルを全て持つユーザーがいませんでした</p>
        @endif
    </div>
</x-app-layout>

