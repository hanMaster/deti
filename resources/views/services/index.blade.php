@extends('layouts.app')

@section('content')
<!-- ============================================== -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Главная</a></li>
    <li class="breadcrumb-item"><a href="{{url('/dictionaries')}}">Справочники</a></li>
    <li class="breadcrumb-item active" aria-current="page">Услуги</li>
  </ol>
</nav>
<!-- ===================================================== -->
<div class="actions mt-2">
  <div class="row">
    <div class="col-md-9">
      <input type="text" class="form-control" placeholder="Поиск">  
    </div>
    <div class="col-md-3">
      <a href="{{url('/services/create')}}" class="btn btn-primary pull-right mb-3">
      <i class="fa fa-plus mr-2"></i> Создать
  </a>
    </div>
  </div>
  

</div>
<!-- ===================================================== -->
<table class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th>№</th>
      <th>Наименование</th>
      <th>Цена</th>
      <th class="text-right">Действие</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($goods as $good)
      <tr>
        <td>{{$good->id}}</td>
        <td>{{$good->name}}</td>
        <td>{{$good->price/100}}</td>
        <td class="text-right">

          <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" 
                action="{{url('/services/'.$good->id)}}" method="POST">
            {{ method_field('delete')}}
            {{ csrf_field()}}
            <a href="{{url('/services/'.$good->id.'/edit')}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
            <button class="btn btn-sm btn-danger" type="submit">
              <i class="fa fa-trash"></i>
            </button>
          
          </form>



        </td>
      </tr>
    @endforeach
  </tbody>
    <tfoot>
      <tr>
        <td colspan="4">
          <ul class="pagination pull-right">
            {{ $goods->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
</table>
@endsection
