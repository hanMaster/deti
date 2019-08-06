@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Главная</a></li>
    <li class="breadcrumb-item"><a href="{{url('/goodsin')}}">Приход товара</a></li>
    <li class="breadcrumb-item active" aria-current="page">Создание нового прихода товара</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header">Новый приход товара</div>
  <div class="card-body">

    <form action="{{url('/goodsin/')}}" method="post">
    {{ csrf_field()}}

      <div class="form-group">
        <label for="">Наименование</label>
        <select name="good" id="good" class="form-control">
          @foreach ($goods as $good)
            <option value="{{$good->id}}">{{$good->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="">Количество</label>
        <input  type="number" 
                name="count" 
                id="count" 
                class="form-control" 
                value="{{old('count')}}" 
                placeholder="0.00"
                onchange="calc_amount()"
                autocomplete="off"
        />
      </div>      
      
      <div class="form-group">
        <label for="">Закупочная цена</label>
        <input  type="text"
                name="price" 
                id="price" 
                class="form-control" 
                value="{{old('price')}}" 
                placeholder="0.00"
                onchange="calc_amount()"
                autocomplete="off"
        />
      </div>

      <div class="form-group">
        <label for="">Сумма</label>
        <h2 id="amount"></h2>
        <input  type="hidden" id="amount1" name="amount"/>
      </div>
      <div class="actions pull-right">
        <input class="btn btn-success" type="submit" value="Сохранить">
        <a href="{{url('/goodsin')}}" class="btn btn-light">Отмена</a>
      </div>
    </form>

  </div>
</div>
@endsection

@section('js-dt')
  <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
  </script>
  <script>
    function calc_amount(){
      let price = 0;
      if($("#price").val())
        price = $("#price").val();
      let count = 0;
      if ($("#count").val()){
        count = $("#count").val();
      }
        
      let sum = (parseFloat(price) * parseFloat(count)).toFixed(2);

      let result = document.querySelector('#amount');
      //console.log(result);
      result.innerHTML = sum;
      $("#amount1").val(sum);
    }
  </script>
@endsection