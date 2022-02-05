<x-app-layout>
    <x-slot name="title">
        案件一覧
    </x-slot>

    <h3 class="title">----result----</h3>

    <div class="card">
        <h3>〇〇〇〇の開発</h3>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">依頼者：<p>（株）〇〇〇〇様</p></li>
          <li class="list-group-item">開始日：<p>2018年1月31日</p></li>
          <li class="list-group-item">終了日：<p>2018年12月31日</p></li>
          <li class="list-group-item">担当：<p>佐藤、田中、鈴木</p></</li>
        </ul>
        <a href="#" class="btn btn-primary">詳細画面へ</a>
    </div>
    <div class="card">
        <h3>××××の開発</h3>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">依頼者：<p>（株）××××様</p></li>
          <li class="list-group-item">開始日：<p>2019年2月14日</p></li>
          <li class="list-group-item">終了日：<p>2019年6月24日</p></li>
          <li class="list-group-item">担当：<p>鈴木、渡辺、佐藤</p></</li>
        </ul>
        <a href="#" class="btn btn-primary">詳細画面へ</a>
    </div>
    <div class="card">
        <h3>△△△△の開発</h3>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">依頼者：<p>（株）△△△△様</p></li>
          <li class="list-group-item">開始日：<p>2020年9月23日</p></li>
          <li class="list-group-item">終了日：<p>2021年1月31日</p></li>
          <li class="list-group-item">担当：<p>高島、田中、中田</p></</li>
        </ul>
        <a href="#" class="btn btn-primary">詳細画面へ</a>
    </div>
    <div class="card">
        <h3>□□□□の開発</h3>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">依頼者：<p>（株）□□□□様</p></li>
          <li class="list-group-item">開始日：<p>2017年5月17日</p></li>
          <li class="list-group-item">終了日：<p>2018年6月28日</p></li>
          <li class="list-group-item">担当：<p>渡辺、田中、斉藤</p></</li>
        </ul>
        <a href="#" class="btn btn-primary">詳細画面へ</a>
    </div>
    
    <style>
      .title{
        text-align:center;
        margin-top: 32px
      }

      .card {
        width: 60rem; 
        margin: 36px auto;
        padding: 16px;
      }

    </style>
</x-app-layout>
