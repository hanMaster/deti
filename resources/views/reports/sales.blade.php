@extends('layouts.app')

@section('content')
<!-- ============================================== -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Главная</a></li>
    <li class="breadcrumb-item active" aria-current="page">Отчет о продажах</li>
  </ol>
</nav>
<!-- ===================================================== -->
<!-- ===================================================== -->
<table class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th>№</th>
      <th>Наименование</th>
      <th>Кол-во</th>
      <th>Сумма</th>
      <th>Дата продажи</th>
    </tr>
  </thead>
  <tbody>
    @foreach($goodsLogs as $log)
    <tr>
    <td>{{$log->id}}</td>
    <td>{{$log->good->name}}</td>
    <td>{{$log->quantity * (-1)}}</td>
    <td>{{$log->amount / (-100)}}</td>
    <td>{{$log->created_at->format('d.m.Y')}}</td>
    </tr>
    @endforeach
    <tr>
    <td></td>
    <td></td>
    <td>Итого</td>
    <td>{{$total/(-100)}}</td>
    <td></td>
    </tr>

  </tbody>
    <tfoot>

    </tfoot>
</table>
@endsection
