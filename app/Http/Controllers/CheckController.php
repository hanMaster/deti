<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Models\Check_body;
use App\Models\Client;
use App\Models\Good;
use App\Models\Warehouse;
use App\Models\Abonement_log;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store($id)
    {
      $check = new Check();
      $check->client_id = $id;
      $check->user_id = Auth::user()->id;
      $check->save();
      return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function show(Check $check)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function sell(Check $check)
    {
      $goods = Warehouse::get();
      return view('checks.sell', compact('check', 'goods'));
    }

    // Обработка кнопки Продать в форме продажи товара клиенту
    public function addSell(Request $request, Check $check)
    {
      $request->validate([
        'good_id' => 'required',
        'amount' => 'required|gt:0'
      ]);
      $body = new Check_body;
      $body->check_id = $check->id;
      $body->good_id = $request->good_id;
      $body->quantity = $request->amount;
      $body->price = Good::findOrFail($request->good_id)->price;
      $body->amount = $body->quantity * $body->price;
      $body->save();
      // return redirect('/')->with('success', 'Товар успешно добавлен в чек');
      return back()->with('success', 'Товар успешно добавлен в чек');
    }

    public function calculate(Check $check)
    {
      /*
        Добавляем мероприятие в чек, если оно запланировано в календаре на время пребывания клиента
      */
      $check->addEventToCheck();
      $check->start = Carbon::parse($check->created_at);
      $check->diff = $check->start->diffInMinutes();
      $check->start = $check->start->toTimeString();
      $time_now = Carbon::now()->toTimeString();
      $services = Good::where('type','service')->get();
     
      return view('checks.calc', compact('time_now', 'check', 'services'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function update(Check $check)
    {
      $check->is_closed = true;
      //Фиксируем движение товара (добавляем транзакциюв лог goods_log)
      $total = $check->log();

      // списываем абонемент
      // Abonement_log::

      if($total > 0){
        $check->total = $total;
        $check->save();
        return redirect('/')->with('success', 'Чек успешно проведен');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Check $check)
    {
      $row = $check->check_body->find($request->bodyId);
      $row->delete();
      return back()->with('success', 'Удаление успешно');
    }
}
