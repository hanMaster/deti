@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 mx-auto">
    <h1 style="text-align: center">Продажа</h1>
    <form action="/sell/{{$check->id}}" method="POST">
      @csrf
      <div class="form-group">
        <label>Наименование</label>
        <select class="form-control" name="good_id">
          <option disabled>Выберите что хотите включить в чек клиента</option>
          @foreach ($goods as $good)
            <option value={{$good->good_id}}>{{$good->good_name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$good->good_price/100}}руб.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; В наличии {{$good->total_quantity}} </option>    
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>Количество</label>
        <input type="number" name="amount" value="1" class="form-control" autocomplete="off">
      </div>



      <hr>
      <input type="submit" value="Продать" class="btn btn-primary">
      {{-- <a href="/sell" class="btn btn-primary">Продать</a> --}}
      <a href="/" class="btn btn-secondary pull-right">Отмена</a>
      
    </form>


    
  </div>
</div>

@endsection