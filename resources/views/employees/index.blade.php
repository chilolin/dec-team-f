<?php

// var_dump($users[0]);

// var_dump($skills[1]);

// var_dump($search);
// exit();
?>

<x-app-layout>
    <x-slot name="title">
        社員一覧
    </x-slot>

    <style>
      .content{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
      }
      .card-body{
        text-align: center;
      }
      .employees-img{
        width: 200px;
        height: 200px;
        margin-bottom: 8px;
      }

      .icon{
        width: 13%;
        height: auto;
        margin: 16px 8px;
      }

      .h4{
        margin: 8px;
      }
    </style>

    <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>

    <div class="card" style="width: 18rem; height: auto;">
      <div class="card-body">
        <img src="{{ asset('img/human.png')}}" class="employees-img">
        <h3 class="card-title"><a href="http://localhost/employees/1">佐藤太郎</a></h3>
        <div class="card-icon">
          <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
          <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
        </div>
        <h4 class="h4">PM </h4>
        <h5>言語</h5>
        <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">HTML</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">CSS</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">JavaScript</li>
        </ul>
      </div>
    </div>
    <div class="card" style="width: 18rem; height: auto;">
      <div class="card-body">
        <img src="{{ asset('img/human.png')}}" class="employees-img">
        <h3 class="card-title"><a href="http://localhost/employees/1">佐藤太郎</a></h3>
        <div class="card-icon">
          <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
          <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
        </div>
        <h4 class="h4">PM </h4>
        <h5>言語</h5>
        <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">HTML</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">CSS</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">JavaScript</li>
        </ul>
      </div>
    </div>
    <div class="card" style="width: 18rem; height: auto;">
      <div class="card-body">
        <img src="{{ asset('img/human.png')}}" class="employees-img">
        <h3 class="card-title"><a href="http://localhost/employees/1">佐藤太郎</a></h3>
        <div class="card-icon">
          <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
          <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
        </div>
        <h4 class="h4">PM </h4>
        <h5>言語</h5>
        <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">HTML</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">CSS</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">JavaScript</li>
        </ul>
      </div>
    </div>
    <div class="card" style="width: 18rem; height: auto;">
      <div class="card-body">
        <img src="{{ asset('img/human.png')}}" class="employees-img">
        <h3 class="card-title"><a href="http://localhost/employees/1">佐藤太郎</a></h3>
        <div class="card-icon">
          <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
          <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
        </div>
        <h4 class="h4">PM </h4>
        <h5>言語</h5>
        <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">HTML</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">CSS</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">JavaScript</li>
        </ul>
      </div>
    </div>
    <div class="card" style="width: 18rem; height: auto;">
      <div class="card-body">
        <img src="{{ asset('img/human.png')}}" class="employees-img">
        <h3 class="card-title"><a href="http://localhost/employees/1">佐藤太郎</a></h3>
        <div class="card-icon">
          <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
          <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
        </div>
        <h4 class="h4">PM </h4>
        <h5>言語</h5>
        <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">HTML</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">CSS</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">JavaScript</li>
        </ul>
      </div>
    </div>
    <div class="card" style="width: 18rem; height: auto;">
      <div class="card-body">
        <img src="{{ asset('img/human.png')}}" class="employees-img">
        <h3 class="card-title"><a href="http://localhost/employees/1">佐藤太郎</a></h3>
        <div class="card-icon">
          <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
          <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
        </div>
        <h4 class="h4">PM </h4>
        <h5>言語</h5>
        <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">HTML</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">CSS</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">JavaScript</li>
        </ul>
      </div>
    </div>
    <div class="card" style="width: 18rem; height: auto;">
      <div class="card-body">
        <img src="{{ asset('img/human.png')}}" class="employees-img">
        <h3 class="card-title"><a href="http://localhost/employees/1">佐藤太郎</a></h3>
        <div class="card-icon">
          <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
          <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
        </div>
        <h4 class="h4">PM </h4>
        <h5>言語</h5>
        <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">HTML</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">CSS</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">JavaScript</li>
        </ul>
      </div>
    </div>
    <div class="card" style="width: 18rem; height: auto;">
      <div class="card-body">
        <img src="{{ asset('img/human.png')}}" class="employees-img">
        <h3 class="card-title"><a href="http://localhost/employees/1">佐藤太郎</a></h3>
        <div class="card-icon">
          <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
          <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
        </div>
        <h4 class="h4">PM </h4>
        <h5>言語</h5>
        <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">HTML</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">CSS</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">JavaScript</li>
        </ul>
      </div>
    </div>
    <div class="card" style="width: 18rem; height: auto;">
      <div class="card-body">
        <img src="{{ asset('img/human.png')}}" class="employees-img">
        <h3 class="card-title"><a href="http://localhost/employees/1">佐藤太郎</a></h3>
        <div class="card-icon">
          <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
          <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
        </div>
        <h4 class="h4">PM </h4>
        <h5>言語</h5>
        <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">HTML</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">CSS</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">JavaScript</li>
        </ul>
      </div>
    </div>
    <div class="card" style="width: 18rem; height: auto;">
      <div class="card-body">
        <img src="{{ asset('img/human.png')}}" class="employees-img">
        <h3 class="card-title"><a href="http://localhost/employees/1">佐藤太郎</a></h3>
        <div class="card-icon">
          <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
          <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
        </div>
        <h4 class="h4">PM </h4>
        <h5>言語</h5>
        <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">HTML</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">CSS</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">JavaScript</li>
        </ul>
      </div>
    </div>
    <div class="card" style="width: 18rem; height: auto;">
      <div class="card-body">
        <img src="{{ asset('img/human.png')}}" class="employees-img">
        <h3 class="card-title"><a href="http://localhost/employees/1">佐藤太郎</a></h3>
        <div class="card-icon">
          <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
          <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
        </div>
        <h4 class="h4">PM </h4>
        <h5>言語</h5>
        <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">HTML</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">CSS</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">JavaScript</li>
        </ul>
      </div>
    </div>
    <div class="card" style="width: 18rem; height: auto;">
      <div class="card-body">
        <img src="{{ asset('img/human.png')}}" class="employees-img">
        <h3 class="card-title"><a href="http://localhost/employees/1">佐藤太郎</a></h3>
        <div class="card-icon">
          <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
          <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
        </div>
        <h4 class="h4">PM </h4>
        <h5>言語</h5>
        <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">HTML</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">CSS</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">JavaScript</li>
        </ul>
      </div>
    </div>
    <div class="card" style="width: 18rem; height: auto;">
      <div class="card-body">
        <img src="{{ asset('img/human.png')}}" class="employees-img">
        <h3 class="card-title"><a href="http://localhost/employees/1">佐藤太郎</a></h3>
        <div class="card-icon">
          <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
          <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
        </div>
        <h4 class="h4">PM </h4>
        <h5>言語</h5>
        <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">HTML</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">CSS</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">JavaScript</li>
        </ul>
      </div>
    </div>
    <div class="card" style="width: 18rem; height: auto;">
      <div class="card-body">
        <img src="{{ asset('img/human.png')}}" class="employees-img">
        <h3 class="card-title"><a href="http://localhost/employees/1">佐藤太郎</a></h3>
        <div class="card-icon">
          <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
          <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
        </div>
        <h4 class="h4">PM </h4>
        <h5>言語</h5>
        <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">HTML</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">CSS</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">JavaScript</li>
        </ul>
      </div>
    </div>
    <div class="card" style="width: 18rem; height: auto;">
      <div class="card-body">
        <img src="{{ asset('img/human.png')}}" class="employees-img">
        <h3 class="card-title"><a href="http://localhost/employees/1">佐藤太郎</a></h3>
        <div class="card-icon">
          <a href="https://twitter.com/?lang=ja"><img src="{{ asset('img/twitter.png')}}" alt="Twitterのアイコン" class="icon"></a>
          <a href="https://github.co.jp/"><img src="{{ asset('img/github.png')}}" alt="GitHubのアイコン" class="icon"></a>
        </div>
        <h4 class="h4">PM </h4>
        <h5>言語</h5>
        <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">HTML</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">CSS</li>
          <li data-toggle="tooltip" data-placement="top" title="Tooltip on top">JavaScript</li>
        </ul>
      </div>
    </div>

</x-app-layout>
