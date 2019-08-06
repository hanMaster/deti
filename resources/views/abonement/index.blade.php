@extends('layouts.app')

@section('content')
<!-- ============================================== -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Главная</a></li>
    <li class="breadcrumb-item"><a href="{{url('/dictionaries')}}">Справочники</a></li>
    <li class="breadcrumb-item active" aria-current="page">Абонементы</li>
  </ol>
</nav>
<!-- ===================================================== -->
<div class="actions mt-2">
  <div class="row">
    <div class="col-md-9">
      <input type="text" class="form-control" placeholder="Поиск">  
    </div>
    <div class="col-md-3">
      <a href="{{url('/abonements/create')}}" class="btn btn-primary pull-right mb-3" title="Создать новый элемент">
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
    @foreach ($abonements as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->price/100}}</td>
        <td class="text-right">

          <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" 
                action="{{url('/abonements/'.$item->id)}}" method="POST">
            {{ method_field('delete')}}
            {{ csrf_field()}}
            <a href="{{url('/abonements/'.$item->id.'/edit')}}" class="btn btn-sm btn-success" title="Редактировать"><i class="fa fa-edit"></i></a>
            <button class="btn btn-sm btn-danger" type="submit" title="Удалить">
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
            {{ $abonements->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
</table>
@endsection
