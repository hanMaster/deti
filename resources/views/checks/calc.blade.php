@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 mx-auto">
    <h1 style="text-align: center">Расчет клиента</h1>
    <p>Время прихода: {{$check->start}} Время ухода: {{$time_now}}</p>
    <p>Время проведенное в клубе: {{floor($check->diff / 60)}}:{{($check->diff % 60) < 10 ? '0'.($check->diff % 60):($check->diff % 60)}}</p>
    @if(count($check->check_body) > 0)
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <th>Наименование</th>
        <th>Количество</th>
        <th>Цена</th>
        <th>Сумма</th>
      </thead>
      <tbody>
        @foreach ($check->check_body->all() as $body)
          <tr>
            <td>{{$body->goodName($body->good_id)}}</td>
            <td>{{$body->quantity}}</td>
            <td>{{$body->price/100}}</td>
            <td>{{$body->amount/100}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <h2>Итого: {{$body->where('check_id', $check->id)->sum('amount')/100}}</h2>
    @endif
    <hr/>
    <a href="/check/{{$check->id}}" class="btn btn-primary">Провести</a>
    <a href="/" class="btn btn-secondary pull-right">Отмена</a>
  </div>
</div>


@endsection