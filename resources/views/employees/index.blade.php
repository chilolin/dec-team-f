<?php

// var_dump($users);


// var_dump($search);

// // var_dump($matter_hit_each);
// var_dump($matter_hits);

// var_dump($co_occur_matrix);
// ddd($co_occur_matrix_skill);



// $test = array();
// array_push($test,$check);
// $bool = in_array($check,$test);
// var_dump($bool);



// $test = array(1,2,3);
// $replace = array(array_search(1,$test) => $test[array_search(1, $test)] +1);
// $changes = array_replace($test,$replace);
// $test = $changes;
// var_dump($test);

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

  @foreach($users as $user)
    <div class="card">
      <div class="card-info">
        <h3 class="card-title"><a href="{{ route('employees.show', ['id' => Auth::id()])}}">{{ $user-> name }}</a></h3>
        <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
        <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
      </div>
      <div class="card-body">
        <p class="card-text">役職：</p>
        <p class="card-text">言語：</p>
       </div>
    </div>
  @endforeach
</x-app-layout> 

<!-- data-toggle="tooltip" data-placement="top" title="Tooltip on top" -->
