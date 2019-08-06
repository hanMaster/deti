@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Главная</a></li>
    <li class="breadcrumb-item"><a href="{{url('/dictionaries')}}">Справочники</a></li>
    <li class="breadcrumb-item"><a href="{{url('/abonements')}}">Абонементы</a></li>
    <li class="breadcrumb-item active" aria-current="page">Создание нового абонемента</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header">Новый абонемент</div>
  <div class="card-body">

    <form action="{{url('/abonements/')}}" method="post">
    {{ csrf_field()}}

      <div class="form-group">
        <label for="">Название абонемента</label>
        <input  type="text" 
                name="name" 
                class="form-control" 
                value="{{old('name')}}"/>
      </div>
      <div class="form-group">
        <label for="">Цена абонемента</label>
        <input  type="text" 
                name="price" 
                class="form-control" 
                value="{{old('price')}}"
                autocomplete="off"
                placeholder="0.00"/>
      </div>
      <div class="form-group">
        <label for="">Количество посещений</label>
        <input  type="number" 
                name="visits" 
                class="form-control" 
                value="{{old('visits')}}"
                autocomplete="off"
                placeholder="Введите количество посещений"/>
      </div>
      <div class="actions pull-right">
        <input class="btn btn-success" type="submit" value="Сохранить">
        <a href="{{url('/abonements')}}" class="btn btn-light">Отмена</a>
      </div>
    </form>

  </div>
</div>
@endsection
