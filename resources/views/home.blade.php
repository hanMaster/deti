@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        Ближайшие дни рождения
      </div>
      <ul class="list-group list-group-flush">
        @foreach ($birthdays as $birthday)
          <li class="list-group-item">
            <a href="{{url('clients/'.$birthday->id)}}">
              <strong>{{$birthday->name}}</strong>
              {{($birthday->diff != 0)? "- дней до дня рождения: ".$birthday->diff :"- день рождения сегодня"}}
            </a>
          </li>    
        @endforeach
      </ul>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div 
        class="card-header" 
        style="display: flex; align-items: center; justify-content: space-between"
      >
        <h5 style="display: inline-block; margin: 0">Посетители клуба</h5>
        <a href="{{url('clients/')}}" class="btn btn-primary pull-right">Новый посетитель</a>
      </div>
      <ul class="list-group list-group-flush">
        @foreach ($visitors as $visitor)
          <li class="list-group-item" 
            style="display: flex; align-items: center; justify-content: space-between"
          >
            <a href="{{url('clients/'.$visitor->client_id)}}">{{$visitor->name}}</a>
            <div>
              <button class="btn btn-secondary">{{$visitor->created_at}}</button>
              <a href="{{url('sell/'.$visitor->id)}}"
                class="btn btn-info"
              >Продать</a>
              <a href="{{url('calc/'.$visitor->id)}}"
                class="btn btn-success"
              >Уходит</a>
            </div>
          </li>    
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection
