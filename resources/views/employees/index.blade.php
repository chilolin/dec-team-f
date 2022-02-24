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
    .content {
      display: flex;
      flex-flow: row wrap;
      justify-content: space-around;
    }

    .card {
      flex-direction: row;
      width: 30rem;
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
  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>

  @if(! empty($users))
    @for($i=0;$i < count($users); $i++)
      <div class="card">
        <div class="card-info">
          <h3 class="card-title"><a href="{{ route('employees.show', ['id' => Auth::id()])}}">{{ $users[$i]-> name }}</a></h3>
          <a href="https://twitter.com/?lang=ja"><i class="bi bi-twitter"></i></a>
          <a href="https://github.co.jp/"><i class="bi bi-github"></i></a>
        </div>
        <div class="card-body">
          @if(gettype($points[$i]) != 'string')
            <p class="card-text">オススメ度：{{$points[$i]}}</p>
          @endif

          <p class="card-text">スキル：</p>

          </div>
      </div>
    @endfor
  
  @else <p>選択されたスキルを全て持つユーザーがいませんでした</p>

  @endif



</x-app-layout> 

<!-- data-toggle="tooltip" data-placement="top" title="Tooltip on top" -->
