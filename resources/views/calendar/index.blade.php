@extends('layouts.app')

@section('content')
<!-- ============================================== -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Главная</a></li>
    <li class="breadcrumb-item active" aria-current="page">Календарь мероприятий</li>
  </ol>
</nav>
<!-- ===================================================== -->
<div class="actions mt-2">
  <div class="row">
    <div class="col-md-9">
      <input type="text" class="form-control" placeholder="Поиск">  
    </div>
    <div class="col-md-3">
      <a href="{{url('/calendar/create')}}" class="btn btn-primary pull-right mb-3">
      <i class="fa fa-plus mr-2"></i> Создать
  </a>
    </div>
  </div>
  

</div>
<!-- ===================================================== -->
<table class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th>Дата</th>
      <th>Время</th>
      <th>Мероприятие</th>
      <th class="text-right">Действие</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($events as $event)
      <tr>
        <td style="max-width: 50px">{{$event->date_event}}</td>
        <td style="max-width: 50px">
          {{\Carbon\Carbon::createFromFormat('H:i:s',$event->time_start_event)->format('H:i')}}
          - {{\Carbon\Carbon::createFromFormat('H:i:s',$event->time_end_event)->format('H:i')}}
        </td>
        <td>{{$event->getEventName($event->event_id)}}</td>

        <td class="text-right" style="max-width: 50px">
          <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" 
                action="{{url('/calendar/'.$event->id)}}" method="POST" style="display: inline-block">
            {{ method_field('delete')}}
            @csrf

            <a href="{{url('/calendar/'.$event->id.'/edit')}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
            
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
            {{ $events->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
</table>
@endsection
