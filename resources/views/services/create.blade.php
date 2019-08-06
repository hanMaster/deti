@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Главная</a></li>
    <li class="breadcrumb-item"><a href="{{url('/dictionaries')}}">Справочники</a></li>
    <li class="breadcrumb-item"><a href="{{url('/services')}}">Услуги</a></li>
    <li class="breadcrumb-item active" aria-current="page">Создание новой услуги</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header">Новая услуга</div>
  <div class="card-body">

    <form action="{{url('/services/')}}" method="post">
    {{ csrf_field()}}

      <div class="form-group">
        <label for="">Наименование</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}"/>
      </div>
      <div class="form-group">
        <label for="">Цена продажи</label>
        <input  type="text"
                name="price"
                class="form-control"
                value="{{old('price')}}"
                autocomplete="off"
                placeholder="0.00"/>
      </div>
      <div class="actions pull-right">
        <input class="btn btn-success" type="submit" value="Сохранить">
        <a href="{{url('/services')}}" class="btn btn-light">Отмена</a>
      </div>
    </form>

  </div>
</div>
@endsection
