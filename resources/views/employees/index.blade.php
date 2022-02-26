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
            width: 28rem;
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
            margin-top: 8px;
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
                        <h5 class="card-title"><a href="{{ route('employees.show', ['id' => $user['id']])}}">{{ $user-> name }}</a></h5>
                    </div>
                    <div class="card-body">
                        @if(gettype($points[$index]) != 'string')
                            <h5 class="card-text">オススメ度：<?php printf("%.2f", $points[$index]);?></h5>
                        @endif
                        @if(gettype($points[$index]) == 'string')
                            <h5 class="card-text">スキル</h5>
                            <ul>
                                @foreach($user->skills as $idx=>$skill)
                                @if($idx<3)
                                    <li>
                                    @if( $skill->pivot->is_practice == true)
                                        <div style="padding-left: 7px; font-size: 16px; float: left;">
                                            {{ $skill->name }}
                                        </div>
                                        <div style="margin-left: 92%;">
                                            <p class="badge badge-primary" style="font-size: 50%; margin-bottom: 5px;">実務</p>
                                        </div>
                                    @else
                                        <div style="padding-left: 7px; font-size: 16px; float: left;">
                                            {{ $skill->name }}
                                        </div>
                                        <div style="margin-left: 92%">
                                            <p class="badge badge-secondary" style="font-size: 50%; margin-bottom: 5px;">学習</p>
                                        </div>
                                    @endif
                                    <div>
                                    <input
                                        id="input-id"
                                        name="input-name"
                                        type="number"
                                        class="rating rating-loading"
                                        value="{{ $skill->pivot->level }}"
                                        style="margin-left: -5px"
                                        data-min='0'
                                        data-max='5'
                                        data-step='0.5'
                                        data-size="xs"
                                        data-readonly="true"
                                        data-show-clear="false"
                                        data-show-caption="false"
                                    >
                                    </div>
                                    </li>
                                @endif
                                @endforeach
                            </ul>
                         
                        @else
                            <h5 class="card-text">スキル</h5>
                                <ul>
                                    <?php $skills_in_user=$user->skills; $sk_array=array();$skids=array();
                                    foreach($skills_in_user as $sks){array_push($sk_array,$sks);$skid=$sks->id;array_push($skids,$skid);}
                                    $sk_array_keys=array_keys($sk_array); $bg4_length=count($big_skill4);?>
                                    @for($i=0;$i<$bg4_length;$i++)
                                    @if(in_array($big_skill4[$i],$skids))
                                    <?php $sk_array_key_index=array_search($big_skill4[$i],$skids)?>
                                        <li>
                                        @if( $sk_array[$sk_array_keys[$sk_array_key_index]]->pivot->is_practice == true)
                                            <div style="padding-left: 7px; font-size: 16px; float: left;">
                                                {{ $sk_array[$sk_array_keys[$sk_array_key_index]]->name }}
                                            </div>
                                            <div style="margin-left: 92%;">
                                                <p class="badge badge-primary" style="font-size: 50%; margin-bottom: 5px;">実務</p>
                                            </div>
                                        @else
                                            <div style="padding-left: 7px; font-size: 16px; float: left;">
                                                {{ $sk_array[$sk_array_keys[$sk_array_key_index]]->name }}
                                            </div>
                                            <div style="margin-left: 92%">
                                                <p class="badge badge-secondary" style="font-size: 50%; margin-bottom: 5px;">学習</p>
                                            </div>
                                        @endif
                                        <div>
                                        <input
                                            id="input-id"
                                            name="input-name"
                                            type="number"
                                            class="rating rating-loading"
                                            value="{{ $sk_array[$sk_array_keys[$sk_array_key_index]]->pivot->level }}"
                                            style="margin-left: -5px"
                                            data-min='0'
                                            data-max='5'
                                            data-step='0.5'
                                            data-size="xs"
                                            data-readonly="true"
                                            data-show-clear="false"
                                            data-show-caption="false"
                                        >
                                        </div>
                                        </li>
                                    @endif
                                    @endfor

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

