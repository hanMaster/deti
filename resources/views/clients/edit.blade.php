@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Главная</a></li>
    <li class="breadcrumb-item"><a href="{{url('/dictionaries')}}">Справочники</a></li>
    <li class="breadcrumb-item"><a href="{{url('/clients')}}">Клиенты</a></li>
    <li class="breadcrumb-item active" aria-current="page">Редактировать карточку клиента</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header">Редактировать</div>
  <div class="card-body">

    <form action="{{url('/clients/'.$client->id)}}" method="post" enctype="multipart/form-data">
    {{ method_field('patch')}}
    {{ csrf_field()}}

      <div class="row">
        <div class="col-md-6">
          <img src="{{Storage::url($client->imageUrl)}}" alt="Client photo" id="client_img">
          <input type="file" name="photo" id="fileinput" value="" onchange="handleFiles(this.files)" style="display: none" />
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Имя</label>
            <input type="text" name="name" class="form-control" value="{{$client->name}}"/>
          </div>
          <div class="form-group">
            <label for="">День рождения yyyy-mm-dd</label>
            <input type="text" name="birthday" class="form-control datepicker" value="{{$client->birthday}}"/>
          </div>
          <div class="form-group">
            <label for="">Родитель</label>
            <input type="text" name="parent" class="form-control " value="{{$client->parent}}"/>
          </div>
        </div>
      </div>
      
    

      
      <div class="form-group">
        <label for="">Коментарий</label>
        <textarea name="description" id="editor" class="form-control" cols="30" rows="10">{{$client->description}}</textarea>
      </div>
      <div class="form-group">
        <label for="">Телефон</label>
        <input type="text" class="form-control" name="phone" value="{{$client->phone}}"/>
      </div>
      <div class="actions pull-right">
        <input class="btn btn-success" type="submit" value="Сохранить">
        <a href="{{url()->previous()}}" class="btn btn-light">Отмена</a>
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
  $().ready(function(){
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      startDate: '-13Y'
    });
  });
  
  let img = document.getElementById('client_img');
  function handleFiles(files) {
    var reader = new FileReader();
    reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
    reader.readAsDataURL(files[0]);
  }

  let sel = document.getElementById('fileinput');
  
  window.onload = () => {
    img.addEventListener('click', function(e){ 
      sel.click();
      });  
  }
  
</script>
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
<script>

  CKEDITOR.replace('editor');
</script>
@endsection