@extends('layouts.app')

@section('content')
<!-- ============================================== -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Главная</a></li>
    <li class="breadcrumb-item active" aria-current="page">Результаты поиска</li>
  </ol>
</nav>
<!-- ===================================================== -->
<table class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th>№</th>
      <th>Имя</th>
      <th>Родитель</th>
      <th class="text-right">Действие</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($clients as $client)
      <tr>
        <td>{{$client->id}}</td>
        <td><a href="/clients/{{$client->id}}">{{$client->name}}</a></td>
        <td>{{$client->parent}}</td>
        <td class="text-right">
          
          <form action="{{url('/new-visiter/'.$client->id)}}" method="POST" style="display: inline-block; margin-right: 10px">
            {{ csrf_field()}}

            <button class="btn btn-sm btn-success" type="submit">
              Посетитель
            </button>

          </form>

          <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" 
                action="{{url('/clients/'.$client->id)}}" method="POST" style="display: inline-block">
            {{ method_field('delete')}}
            {{ csrf_field()}}


            <a href="{{url('/clients/'.$client->id.'/edit')}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
            
            <button class="btn btn-sm btn-danger" type="submit">
              <i class="fa fa-trash"></i>
            </button>
          
          </form>

        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
