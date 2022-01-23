@extends('layouts.default')

@section('title', '有理数の計算')

@section('content')
  @isset($img_url)
    <img src="{{ asset($img_url) }}" alt="">
  @endisset
  {!! Form::open() !!}
    <table>
      <tr>
        <th></th>
        <th>分数A</th>
        <th>演算子</th>
        <th>分数B</th>
      </tr>
      <tr>
        <th>分子</th>
        <td>
          {!! Form::number('numerator_a', old('numerator_a'), ['size' => 3]) !!}
        </td>
        <td rowspan="2">
          {!! Form::select('operator',
            [
              1 => '+',
              2 => '-',
              3 => '*',
              4 => '/'
            ],
            [
              'selected' => old('operator'),
            ]) !!}
        </td>
        <td>
          {!! Form::number('numerator_b', old('numerator_b'), ['size' => 3]) !!}
        </td>
      </tr>
      <tr>
        <th>分母</th>
        <td>
          {!! Form::number('denominator_a', old('denominator_a'), ['size' => 3]) !!}
        </td>
        <td>
          {!! Form::number('denominator_b', old('denominator_b'), ['size' => 3]) !!}
        </td>
      </tr>
    </table>
    {!! Form::submit('計算実行！') !!}
  {!! Form::close() !!}
@endsection
