@extends('layouts.app')

@section('content')
<!-- ============================================== -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Главная</a></li>
    <li class="breadcrumb-item active" aria-current="page">Приход товара</li>
  </ol>
</nav>
<!-- ===================================================== -->
<div class="actions mt-2">
  <div class="row">
    <div class="col-md-9">
      <input type="text" class="form-control" placeholder="Поиск">  
    </div>
    <div class="col-md-3">
      <a href="{{url('/goodsin/create')}}" class="btn btn-primary pull-right mb-3" title="Создать новый элемент">
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
      <th>Кол-во</th>
      <th>Сумма</th>
      <th>Дата создания</th>
      <th class="text-right">Действие</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($goodsin as $goodin)
      <tr>
        <td>{{$goodin->id}}</td>
        <td>{{$goodin->good->name}}</td>
        <td>{{$goodin->quantity}}</td>
        <td>{{$goodin->amount}}</td>
        <td>{{$goodin->created_at}}</td>
        <td class="text-right">

          <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" 
                action="{{url('/goodsin/'.$goodin->id)}}" method="POST">
            {{ method_field('delete')}}
            {{ csrf_field()}}

            {{-- <a href="{{url('/goodsin/'.$goodin->id.'/edit')}}" class="btn btn-sm btn-success" title="Редактировать"><i class="fa fa-edit"></i></a> --}}

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
        <td colspan="6">
          <ul class="pagination pull-right">
            {{ $goodsin->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
</table>
@endsection
