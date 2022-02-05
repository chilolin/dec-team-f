<x-app-layout>
    <x-slot name="title">
        案件一覧
    </x-slot>

    <h3 class="title">----result----</h3>

    <div class="card">
      <div class="card-body">
        <h3>佐藤太郎</h3>
        <p class="card-text">
            役職：PG</br>
            プログラミング言語：HTML,CSS,JavaScript,PHP</br>
            経験年数：12年</br>
            アサイン中の案件:〇〇〇〇の開発
        </p>
        <a href="#" class="btn btn-primary">詳細画面へ</a>
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

      .card-body{
        margin-left: 72px;
      }

      .img1{
        width: 160px;
        height:160px;
      }
    </style>
</x-app-layout>
