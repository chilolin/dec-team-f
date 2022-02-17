<x-app-layout>
    <x-slot name="title">
        案件一覧
    </x-slot>
    <style>
      .content{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
      }

      .card {
        width: 22rem;
        height: auto;
      }

      .subject{
        text-align: center;
      }
    </style>
    @foreach($matters as $matter)
     <div class="card">
        <h3 class="subject">{{ $matter->name }}</h3>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">依頼者：<p>{{ $matter->client->name }}</p></li>
          <li class="list-group-item">開始日：<p>{{ $matter->start_at }}</p></li>
          <li class="list-group-item">終了日：<p>{{ $matter->end_at }}</p></li>
          <li class="list-group-item">担当：<p>{{ $matter->users->reduce(function ($engineer_names, $engineer) { if (!$engineer_names) return $engineer->name; return $engineer_names . ',' . $engineer->name; }) }}</p></li>
        </ul>
        <a href="http://localhost/matters/1" class="btn btn-primary">詳細画面へ</a>
      </div>
    @endforeach
</x-app-layout>
