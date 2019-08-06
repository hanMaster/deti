@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Главная</a></li>
    <li class="breadcrumb-item"><a href="{{url('/goodsin')}}">Приход товара</a></li>
    <li class="breadcrumb-item active" aria-current="page">Редактирование прихода товара</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header">Изменение прихода товара</div>
  <div class="card-body">

    <form action="{{url('/goodsin/'.$goodsin->id)}}" method="post">
    {{ method_field('put')}}
    @csrf

      <div class="form-group">
        <label for="">Наименование</label>
        <select name="good" id="good" class="form-control">
          @foreach ($goods as $good)
            <option value="{{$good->id}}">{{$good->name}}</option>
          @endforeach
        </select>
      </div>

      
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="">Количество</label>
            <input type="text" name="count" id="count" class="form-control" value="{{$goodsin->quantity}}" placeholder="0.00"
              onchange="calc_amount()"/>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="">Сумма</label>
            <input type="text" name="amount" id="amount" class="form-control" value="{{$goodsin->amount}}" placeholder="0.00"/>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="">Провести</label>
            <input type="checkbox" name="fixed" id="fixed" class="form-control" 
            @if ($goodsin->fixed)
            checked
            @endif
            />
          </div>
        </div>
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
      let str = $("#price").val();
      let s = str.replace(",",".");
      let c = $("#count").val();
      let count = c.replace(",",".");
      let sum = (parseFloat(s) * parseFloat(count)).toFixed(2);
      $("#amount").val(sum);
    }
  </script>
  <script>
  document.addEventListener("DOMContentLoaded", function() {
    const select_good = document.querySelector('#good');
    const good = {!! json_encode($goodsin->good_id) !!};

    for (let i = 0; i < select_good.children.length; i++){
      if(select_good.children[i].value == good) {
        select_good.children[i].setAttribute("selected", "selected");
      }
    }
  })
</script>
@endsection