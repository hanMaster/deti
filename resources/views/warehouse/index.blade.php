@extends('layouts.app')

@section('content')
<!-- ============================================== -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Главная</a></li>
    <li class="breadcrumb-item active" aria-current="page">Остатки товара</li>
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
      <th>Наименование</th>
      <th>Кол-во</th>
      <th>Цена продажи</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $good)
      <tr>
        <td>{{$good->good_name}}</td>
        <td>{{$good->total_quantity}}</td>
        <td>{{$good->good_price/100}}</td>
      </tr>
    @endforeach
  </tbody>
    <tfoot>
      <tr>
        <td colspan="6">
          <ul class="pagination pull-right">
            {{ $data->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
</table>
@endsection
