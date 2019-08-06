@extends('layouts.app')

@section('content')
{{-- <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Главная</a></li>
    <li class="breadcrumb-item"><a href="{{url('/dictionaries')}}">Справочники</a></li>
    <li class="breadcrumb-item"><a href="{{url('/clients')}}">Товары</a></li>
    <li class="breadcrumb-item active" aria-current="page">Создание нового товара</li>
  </ol>
</nav> --}}

<div class="card">
  <div class="card-header">Добавление мероприятия в календарь</div>
  <div class="card-body">

    <form action="/calendar" method="post">
      @csrf

      <div class="form-group">
        <label>Мероприятие</label>
        <select class="form-control" name="eventId">
          <option disabled>Выберите мероприятие</option>
          @foreach ($events as $event)
            <option value={{$event->id}}>{{$event->name}}</option>    
          @endforeach
        </select>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Дата мероприятия</label>
            <input type="text" name="dateEvent" class="form-control datepicker" value="{{old('dateEvent')}}"/>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Начало</label>
            <select class="form-control" name="startEvent">
              <option value='8:00:00'>8:00</option>
              <option value='8:30:00'>8:30</option>
              <option value='9:00:00'>9:00</option>
              <option value='9:30:00'>9:30</option>
              <option value='10:00:00'>10:00</option>
              <option value='10:30:00'>10:30</option>
              <option value='11:00:00'>11:00</option>
              <option value='11:30:00'>11:30</option>
              <option value='12:00:00'>12:00</option>
              <option value='12:30:00'>12:30</option>
              <option value='13:00:00'>13:00</option>
              <option value='13:30:00'>13:30</option>
              <option value='14:00:00'>14:00</option>
              <option value='14:30:00'>14:30</option>
              <option value='15:00:00'>15:00</option>
              <option value='15:30:00'>15:30</option>
              <option value='16:00:00'>16:00</option>
              <option value='16:30:00'>16:30</option>
              <option value='17:00:00'>17:00</option>
              <option value='17:30:00'>17:30</option>
              <option value='18:00:00'>18:00</option>
              <option value='18:30:00'>18:30</option>
              <option value='19:00:00'>19:00</option>
              <option value='19:30:00'>19:30</option>
              <option value='20:00:00'>20:00</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Конец</label>
            <select class="form-control" name="endEvent">
              <option value='8:00:00'>8:00</option>
              <option value='8:30:00'>8:30</option>
              <option value='9:00:00'>9:00</option>
              <option value='9:30:00'>9:30</option>
              <option value='10:00:00'>10:00</option>
              <option value='10:30:00'>10:30</option>
              <option value='11:00:00'>11:00</option>
              <option value='11:30:00'>11:30</option>
              <option value='12:00:00'>12:00</option>
              <option value='12:30:00'>12:30</option>
              <option value='13:00:00'>13:00</option>
              <option value='13:30:00'>13:30</option>
              <option value='14:00:00'>14:00</option>
              <option value='14:30:00'>14:30</option>
              <option value='15:00:00'>15:00</option>
              <option value='15:30:00'>15:30</option>
              <option value='16:00:00'>16:00</option>
              <option value='16:30:00'>16:30</option>
              <option value='17:00:00'>17:00</option>
              <option value='17:30:00'>17:30</option>
              <option value='18:00:00'>18:00</option>
              <option value='18:30:00'>18:30</option>
              <option value='19:00:00'>19:00</option>
              <option value='19:30:00'>19:30</option>
              <option value='20:00:00'>20:00</option>
            </select>
          </div>        
        </div>
      </div>

      <div class="actions pull-right">
        <input class="btn btn-success" type="submit" value="Сохранить">
        <a href="/calendar" class="btn btn-light">Отмена</a>
      </div>
    </form>

  </div>
</div>
@endsection

@include('layouts.include.datepickerNew')