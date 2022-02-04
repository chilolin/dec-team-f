<?php

// var_dump($search);
// exit();

?>


<x-app-layout>
    <x-slot name="title">
        社員一覧
    </x-slot>

  <h2 class="main">社員検索結果</h2>

    <div class="border" id="flexbox">
      <img src="{{ asset('img/human.png') }}" class="img_human">
      <div class="box-item"style="flex-basis:30%;">佐藤太郎</div>
      <div class="box-item" style="flex-basis:30%;">検索マッチ度 90点</div>
      <div class="box-item" style="flex-basis:30%;">最近のアサイン</div>
    </div>
    <div class="border" id="flexbox">
      <img src="{{ asset('img/human.png') }}" class="img_human">
      <div class="box-item"style="flex-basis:30%;">鈴木太郎</div>
      <div class="box-item" style="flex-basis:30%;">検索マッチ度 82点</div>
      <div class="box-item" style="flex-basis:30%;">最近のアサイン</div>
    </div>
    <div class="border" id="flexbox">
      <img src="{{ asset('img/human.png') }}" class="img_human">
      <div class="box-item"style="flex-basis:30%;">田中太郎</div>
      <div class="box-item" style="flex-basis:30%;">検索マッチ度 73点</div>
      <div class="box-item" style="flex-basis:30%;">最近のアサイン</div>
    </div>
    <div class="border" id="flexbox">
      <img src="{{ asset('img/human.png') }}" class="img_human">
      <div class="box-item"style="flex-basis:30%;">佐々木太郎</div>
      <div class="box-item" style="flex-basis:30%;">検索マッチ度 69点</div>
      <div class="box-item" style="flex-basis:30%;">最近のアサイン</div>
    </div>
    <div class="border" id="flexbox">
      <img src="{{ asset('img/human.png') }}" class="img_human">
      <div class="box-item"style="flex-basis:30%;">渡辺太郎</div>
      <div class="box-item" style="flex-basis:30%;">検索マッチ度 58点</div>
      <div class="box-item" style="flex-basis:30%;">最近のアサイン</div>
    </div>

    <style>
      #flexbox{
        display:flex;
      }

      .main{
        text-align:center;
        margin-bottom: 50px
      }

      .border{
        padding: 8px;
        margin-bottom: 30px;
        margin-left: 50px;
        margin-right: 50px;
        border: 1px solid #333333;
      }

      .img_human{
        width: 50px;
        height: 50px;
        margin-right: 10px;
      }

      .box-item{
        padding-top: 12px;
      }
    </style>
</x-app-layout>

