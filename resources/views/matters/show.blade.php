<x-app-layout>
    <x-slot name="title">
        案件詳細
    </x-slot>

    <x-matters.create-input-group label="案件名">
      〇〇〇〇の開発
    </x-matters.create-input-group>
    <x-matters.create-input-group label="依頼者">
      （株）〇〇〇〇様
    </x-matters.create-input-group>
    <x-matters.create-input-group label="開始日">
      2018年1月31日
    </x-matters.create-input-group>
    <x-matters.create-input-group label="終了日">
      2018年12月31日
    </x-matters.create-input-group>
    <x-matters.create-input-group label="開発工程">
      設計、コーディング、テスト、保守、運用
    </x-matters.create-input-group>
    <x-matters.create-input-group label="開発の進め方">
      アジャイル開発
    </x-matters.create-input-group>
    <x-matters.create-input-group label="デザインパターン">
      GoFデザインパターン
    </x-matters.create-input-group>
    <x-matters.create-input-group label="フロントエンド">
      <ul class="list-group">
        <li class="list-group-item">言語：HTML,CSS,JavaScript</li>
        <li class="list-group-item">フレームワーク：Bootstorap</li>
      </ul>
    </x-matters.create-input-group>
    <x-matters.create-input-group label="バックエンド">
      <ul class="list-group">
        <li class="list-group-item">言語：php</li>
        <li class="list-group-item">フレームワーク：Laravel</li>
      </ul>
    </x-matters.create-input-group>
    <x-matters.create-input-group label="データベース">
      Mysql
    </x-matters.create-input-group>
    <x-matters.create-input-group label="インフラ技術">
      circleci
    </x-matters.create-input-group>
    <x-matters.create-input-group label="エンジニア">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">役職</th>
          <th scope="col">開始日</th>
          <th scope="col">終了日</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">佐藤</th>
          <td>PM</td>
          <td>2018年1月31日</td>
          <td>2018年12月31日</td>
        </tr>
        <tr>
          <th scope="row">鈴木</th>
          <td>フロントエンド</td>
          <td>2018年1月31日</td>
          <td>2018年1月31日</td>
        </tr>
        <tr>
          <th scope="row">田中</th>
          <td>バックエンド</td>
          <td>2018年1月31日</td>
          <td>2018年1月31日</td>
        </tr>
      </tbody>
    </table>
    </x-matters.create-input-group>

</x-app-layout>
