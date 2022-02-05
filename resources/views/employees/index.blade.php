<x-app-layout>
    <x-slot name="title">
        社員一覧
    </x-slot>

    <h3 class="title">----result----</h3>

    <div class="card">
      <div class="card-info">
        <img src="{{ asset('img/human.png') }}" class="img1"></br>
        <div class="info-text">
          <a href="https://github.com">githubはこちら</a></br>
          <a href="https://twitter.com/?lang=ja">Twitterはこちら</a>
        </div>
      </div>
      <div class="card-body">
        <h3>佐藤太郎</h3>
        <p class="card-text">
            ・役職：PM</br>
            ・プログラミング言語：HTML,CSS,JavaScript,PHP</br>
            ・経験年数：12年</br>
            ・アサイン中の案件:〇〇〇〇の開発
        </p>
        <a href="{{ url('employees/show') }}" class="btn btn-primary">詳細画面へ</a>
      </div>
    </div>

    <div class="card">
      <div class="card-info">
        <img src="{{ asset('img/human.png') }}" class="img1"></br>
        <div class="info-text">
          <a href="https://github.com">githubはこちら</a></br>
          <a href="https://twitter.com/?lang=ja">Twitterはこちら</a>
        </div>
      </div>
      <div class="card-body">
        <h3>鈴木太郎</h3>
        <p class="card-text">
            ・役職：フロントエンド</br>
            ・プログラミング言語：HTML,CSS,JavaScript,</br>
            ・経験年数：８年</br>
            ・アサイン中の案件:〇〇〇〇の開発
        </p>
        <a href="{{ url('employees/show') }}" class="btn btn-primary">詳細画面へ</a>
      </div>
    </div>

    <div class="card">
      <div class="card-info">
        <img src="{{ asset('img/human.png') }}" class="img1"></br>
        <div class="info-text">
          <a href="https://github.com">githubはこちら</a></br>
          <a href="https://twitter.com/?lang=ja">Twitterはこちら</a>
        </div>
      </div>
      <div class="card-body">
        <h3>田中太郎</h3>
        <p class="card-text">
            ・役職：バックエンド</br>
            ・プログラミング言語：PHP, Java,Ruby</br>
            ・経験年数：10年</br>
            ・アサイン中の案件:〇〇〇〇の開発
        </p>
        <a href="{{ url('employees/show') }}" class="btn btn-primary">詳細画面へ</a>
      </div>
    </div>

    <div class="card">
      <div class="card-info">
        <img src="{{ asset('img/human.png') }}" class="img1"></br>
        <div class="info-text">
          <a href="https://github.com">githubはこちら</a></br>
          <a href="https://twitter.com/?lang=ja">Twitterはこちら</a>
        </div>
      </div>
      <div class="card-body">
        <h3>渡辺太郎</h3>
        <p class="card-text">
            ・役職：機械学習</br>
            ・プログラミング言語：Python</br>
            ・経験年数：７年</br>
            ・アサイン中の案件:〇〇〇〇の開発
        </p>
        <a href="{{ url('employees/show') }}" class="btn btn-primary">詳細画面へ</a>
      </div>
    </div>
 
    <style>
      .title{
        text-align:center;
        margin-top: 32px
      }

      .card {
        display: flex;
        flex-direction: row;
        width: 60rem; 
        margin: 36px auto;
        padding: 8px;
      }

      .card-info{
        margin-top: 24px;
      }

      .info-text{
        margin: auto 16px;
      }
      .card-body{
        margin-left: 72px;
      }

      .img1{
        width: 160px;
        height:160px;
      }
    </style>
</x-app-layout> 
