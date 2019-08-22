@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 mx-auto">
    <h1 style="text-align: center">Расчет клиента</h1>
    <h4>Клиент: {{$check->client->name}}</h4>
    <h4>Администратор: {{ Auth::user()->name }}</h4>
    <br/>
    <p>Время прихода: {{$check->start}} Время ухода: {{$time_now}}</p>
    <p>Время проведенное в клубе: {{floor($check->diff / 60)}}:{{($check->diff % 60) < 10 ? '0'.($check->diff % 60):($check->diff % 60)}}</p>
    @if(count($check->check_body) > 0)
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <th>Наименование</th>
        <th>Количество</th>
        <th>Цена</th>
        <th>Сумма</th>
        <th></th>
      </thead>
      <tbody>
        @foreach ($check->check_body->all() as $body)
          <tr>
            <td>{{$body->good->name}}</td>
            <td>{{$body->quantity}}</td>
            <td>{{$body->price/100}}</td>
            <td>{{$body->amount/100}}</td>
            <td>
              <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" 
                  action="{{url('/check/'.$check->id)}}'" method="POST" style="display: inline-block">

              {{ method_field('delete')}}
              @csrf
              <input type="hidden" name="bodyId" value='{{$body->id}}'>
              <button class="btn btn-sm btn-danger" type="submit">
                <i class="fa fa-trash"></i>
              </button>
            
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <h2>Итого: {{$body->where('check_id', $check->id)->sum('amount')/100}} руб.</h2>
    @endif
    <hr/>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary pull-right" style="display: block;" data-toggle="modal" data-target="#serviceAddModal">
          <i class="fa fa-plus mr-2"></i> Добавить услугу
        </button>

        <!-- Modal -->
        <div class="modal fade" id="serviceAddModal" tabindex="-1" role="dialog" aria-labelledby="serviceAddModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="serviceAddModalLabel">Продажа услуги клиенту</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/sell/{{$check->id}}" method="POST">
                <div class="modal-body">
                  @csrf
                  <input type="hidden" name="check" value="{{$check->id}}">
                  <div class="form-group">
                    <label for="">Выберите услугу</label>
                    <select name="good_id" id="service" class="form-control">
                      @foreach ($services as $service)
                        <option value="{{$service->id}}">{{$service->name}}</option>
                      @endforeach
                    </select>
                    <br/>
                    <input type="number" name="amount" value="1" class="form-control" autocomplete="off">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                  <button type="submit" class="btn btn-primary">Продать</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      {{-- Добавление услуги --}}
    <br/>
    <br/>
    <hr/>
    <a href="/check/{{$check->id}}" class="btn btn-primary">Провести</a>
    <a href="/" class="btn btn-secondary pull-right">Отмена</a>
  </div>
</div>


@endsection