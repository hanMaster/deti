<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    public function check_body(){
      return $this->hasMany('App\Models\Check_body');
    }

    public function client(){
      return $this->belongsTo('App\Models\Client');
    }

    /*
     для расчета клиента нужно выбрать мероприятия,
     которые произошли в клубе с момента его прихода
    */
    public function getEvents(String $start){
      $start = \Carbon\Carbon::parse($start)->toTimeString();
      $end = \Carbon\Carbon::now()->toTimeString();
      $events = Calendar::where('date_event',\Carbon\Carbon::now()->toDateString())
                          ->where('time_start_event' ,'>', $start )
                          ->where('time_end_event', '<', $end)->get();
      return $events;
    }

    /*
      При расчете выбираем события из календаря и добавляем в чек
    */
    public function addEventToCheck()
    {
      $events = null;
      $events = $this->getEvents($this->created_at);

      foreach($events as $event){
        $events_in_check = Check_body::where("check_id", $this->id)->where('good_id', $event->event_id)->get();
        if ($events_in_check->count() == 0){
          $body = new Check_body;
          $body->check_id = $this->id;
          $body->good_id = $event->event_id;
          $body->quantity = 1;
          $body->price = Good::findOrFail($event->event_id)->price;
          $body->amount = $body->quantity * $body->price;
          $body->save();
        }
      }
      $this->save();
    }

    public function log(){
      $total = 0;
      try{
        foreach ($this->check_body as $item) {
          if($item->isGood()){
            $raw = new GoodsLog();
            $raw->optype = '-';
            $raw->good_id = $item->good_id;
            $raw->doc_id = $item->check_id;
            $raw->quantity = -$item->quantity;
            $raw->amount = -$item->amount;
            $raw->save();
            $total += $item->amount;
          }else{
            $raw = new ServiceLog();
            $raw->good_id = $item->good_id;
            $raw->doc_id = $item->check_id;
            $raw->quantity = -$item->quantity;
            $raw->amount = -$item->amount;
            $raw->save();
            $total += $item->amount;
          }
        }
      }catch(Exception $e){
        echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
        return 0;
      }
      
      return $total;
    }
}
