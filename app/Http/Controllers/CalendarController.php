<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Calendar;
use Carbon\Carbon;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
  public function index()
  {
    $events = Calendar::orderBy('date_event', 'desc')->paginate(10);

    return view('calendar.index', compact('events'));
  }

  public function create()
  {
    $events = Good::where('type','service')->get();
    return view('calendar.create', compact('events'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'eventId' => 'required',
      'dateEvent' => 'required|date',
      'startEvent' => 'required',
      'endEvent' => 'required|after:startEvent'
    ]);

    $startEvent = Carbon::parse($request->startEvent);
    $endEvent = carbon::parse($request->endEvent);


    $event = new Calendar();
    $event->date_event = $request->dateEvent;
    $event->time_start_event = $startEvent;
    $event->time_end_event = $endEvent;
    $event->event_id = $request->eventId;
    $event->save();
    return redirect('calendar')->with('success', 'Добавлено новое мероприятие');
  }

  public function edit(Calendar $calendar)
  {
    $events = Good::where('type','service')->get();
    // $cal = $calendar;
    // return $calendar;
    return view('calendar.edit', compact('calendar', 'events'));
  }

  public function update(Request $request, Calendar $calendar)
  {
    $request->validate([
      'eventId' => 'required',
      'dateEvent' => 'required|date',
      'startEvent' => 'required',
      'endEvent' => 'required|after:startEvent'
    ]);

    $startEvent = Carbon::parse($request->startEvent);
    $endEvent = carbon::parse($request->endEvent);

    $calendar->date_event = $request->dateEvent;
    $calendar->time_start_event = $startEvent;
    $calendar->time_end_event = $endEvent;
    $calendar->event_id = $request->eventId;
    $calendar->save();
    return redirect('calendar')->with('success', 'Добавлено новое мероприятие');
  }

  public function destroy(Calendar $calendar) 
  {
    $calendar->delete();
    return redirect('/calendar')->with('success', 'Мероприятие успешно удалено');
  }
}
