@extends('layouts.app')

@section('content')
<!-- ============================================== -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Главная</a></li>
    <li class="breadcrumb-item active" aria-current="page">Отчет о покупках клиентов</li>
  </ol>
</nav>
<!-- ===================================================== -->
<!-- ===================================================== -->
<table class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th>Имя клиента</th>
      <th>Сумма</th>
    </tr>
  </thead>
  <tbody>
    @foreach($clientsSpent as $cs)
    <tr>
      <td><a href="/clients/{{$cs->client_id}}">{{$cs->name}}</a></td>
      <td>{{$cs->total/100}}</td>
    </tr>
    @endforeach

  </tbody>
    <tfoot>

    </tfoot>
</table>
@endsection
