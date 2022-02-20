@extends('layouts.default')

@section('title', 'あみだくじ')
@section('content')
<?php
  // TODO: スタイルシートを別ファイル切り分ける
  // MEMO: ブラウザのクリックイベントに対して、横線の表示/非表示を切り替え
  // MEMO: formを作成。クリックイベントごとにフォームのバリューを更新
?>
<style>
  table {
    width: 100%;
    height: 150px;
    border-collapse: collapse;
    font-size: 12px;
  }
  td {
    padding: 10px;
    border: 2px solid #000;
  }
  .start, .end {
    border-width: 0px 0px 0px 0px;
  }
  .second {
    border-width: 0px 2px 0px 2px;
  }
  .second-target {
    border-width: 0px 2px 2px 2px;
  }
</style>

<div>
  <table summary="サンプル" rules="cols">
    <tbody>
      <tr>
        <td class="start"></td>
        <td class="second"></td>
        <td></td>
        <td></td>
        <td class="end"></td>
      </tr>
      <tr>
        <td class="start"></td>
        <td class="second-target"></td>
        <td></td>
        <td></td>
        <td class="end"></td>
      </tr>
      <tr>
        <td class="start"></td>
        <td class="second"></td>
        <td></td>
        <td></td>
        <td class="end"></td>
      </tr>
      <tr>
        <td class="start"></td>
        <td class="second"></td>
        <td></td>
        <td></td>
        <td class="end"></td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
