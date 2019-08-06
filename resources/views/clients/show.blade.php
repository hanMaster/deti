@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Главная</a></li>
    <li class="breadcrumb-item"><a href="{{url('/dictionaries')}}">Справочники</a></li>
    <li class="breadcrumb-item"><a href="{{url('/clients')}}">Клиенты</a></li>
    <li class="breadcrumb-item active" aria-current="page">Карточка клиента</li>
  </ol>
</nav>


<div class="card">
  <div class="card-header">Анкета клиента <a href="/clients/{{$client->id}}/edit" style="float: right">Редактировать</a> </div>
  <div class="card-body">
    <div class="row">

      <div class="col-md-6">
        
        <h2>{{$client->name}}</h2>
        <h5>Дата рождения: {{$client->birthday}}</h5>
        <h5>Возраст: {{$client->age.' '.$client->age_plural}}</h5>
        <h5>Родитель: {{$client->parent}}</h5>
        <h5>Телефон: {{$client->phone}}</h5>
      </div>
      
      <div class="col-md-6">
        <img src="{{Storage::url($client->imageUrl)}}" alt="Client" id="client_img">
      </div>
    </div>



    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">О клиенте</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Абонементы</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">История посещений</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <p class="mt-5">{!!$client->description!!}</p>
      </div>

      {{-- Абонементы --}}
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <h3 class="mt-5">Нет активных абонементов</h3>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#abonementAddModal">
          <i class="fa fa-plus mr-2"></i> Добавить абонемент
        </button>

        <!-- Modal -->
        <div class="modal fade" id="abonementAddModal" tabindex="-1" role="dialog" aria-labelledby="abonementAddModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="abonementAddModalLabel">Продажа абонемента клиенту</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/abonements/sell" method="post">
                <div class="modal-body">
                  @csrf
                  <input type="hidden" name="client_id" value="{{$client->id}}">
                  <div class="form-group">
                    <label for="">Выберите абонемент</label>
                    <select name="abonement_id" id="abonement" class="form-control">
                      @foreach ($abonements as $abonement)
                        <option value="{{$abonement->id}}">{{$abonement->name}}</option>
                      @endforeach
                    </select>
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















      </div>
      {{-- Абонементы --}}



      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <table class="table table-striped table-bordered mt-2">
          <thead class="thead-dark">
            <tr>
              <th>Дата</th>
              <th>Вид занятия</th>
              <th>Сумма</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>01.01.2018</td>
              <td>Новый год</td>
              <td>4500</td>
            </tr>
            <tr>
              <td>01.01.2018</td>
              <td>Новый год</td>
              <td>4500</td>
            </tr>
          </tbody>
          <tfoot>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection


@section('js-dt')

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>

@endsection