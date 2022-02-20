@extends('layouts.default')

@section('title', 'あみだくじ')

@section('content')
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      /* html {
        height: 90%;
        width: 100%;
      }
      body {
        height: 100%;
      }
      div {
        height: 100%;
        padding: 10px;
      } */
      table{
        width: 100%;
        height: 150px;
        border-collapse: collapse;
        /* border: 2px solid #000; */
        font-size: 12px;
      }
      td {
        padding: 10px;
        border: 2px solid #000;
      }
    </style>
  </head>
  <body>
    <div>
      <table summary="サンプル" rules="cols">
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
</html>

@endsection
