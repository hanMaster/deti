@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/home">Главная</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
      <a href="{{url('/dictionaries')}}">Справочники</a>
    </li>
  </ol>
</nav>

<ul class="list-group">
  <li class="list-group-item lists_li">
    <a href="{{ url('/clients')}}" class="d-block">Клиенты</a>
  </li>
  <li class="list-group-item lists_li">
    <a href="{{ url('/services')}}" class="d-block">Услуги</a>
  </li>
  <li class="list-group-item lists_li">
    <a href="{{ url('/goods')}}" class="d-block">Товары</a>
  </li>
  <li class="list-group-item lists_li">
    <a href="{{ url('/abonements')}}" class="d-block">Абонементы</a>
  </li>
</ul>
@endsection