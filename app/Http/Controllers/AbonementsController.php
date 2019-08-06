<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Abonement;
use App\Models\Abonement_log;
use Validator;

class AbonementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $abonements = Abonement::paginate(10);
      return view('abonement.index', compact('abonements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('abonement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input = $request->except('_token');
      // dd($input);
      $messages =[
        'required'=>'Поле :attribute обязательно к заполнению',
        'gt' => 'Поле :attribute должно иметь значение больше 0'
      ];

      $validator = Validator::make(
        $input,
        [
          'name'=>'required|min:3',
          'price'=>'required|regex:/^\d+.\d*$/',
          'visits'=>'required|gt:0'
        ], $messages
      );
      if ($validator->fails()){
        return redirect('/abonements/create')->withErrors($validator)->withInput();
      }

      $abonement = new Abonement();
      $abonement->name = $request->name;
      $abonement->price = $request->price*100;
      $abonement->visits_in_abonement = $request->visits;
      if ($abonement->save()){
        return redirect('/abonements')->with('success','Абонемент успешно создан');
      }      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sell(Request $request)
    {
        $input = $request->except('_token');
        $log = new Abonement_log();
        $log->client_id = $request->client_id;
        $log->abonement_id = $request->abonement_id;
        $log->count = Abonement::findOrFail($request->abonement_id)->visits_in_abonement;
        $log->comment = 'Продажа абонемента клиенту';
        if($log->save()){
          return redirect('/clients/'.$request->client_id)->with('success', 'Абонемент продан');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Abonement $abonement)
    {
      return view('abonement.edit', compact('abonement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abonement $abonement)
    {
      $input = $request->except('_token');
      // dd($input);
      $messages =[
        'required'=>'Поле :attribute обязательно к заполнению',
        'gt' => 'Поле :attribute должно иметь значение больше 0'
      ];

      $validator = Validator::make(
        $input,
        [
          'name'=>'required|min:3',
          'price'=>'required|regex:/^\d+.\d*$/',
          'visits'=>'required|gt:0'
        ], $messages
      );
      if ($validator->fails()){
        return redirect('/abonemets/'.$abonement->id.'/edit')->withErrors($validator)->withInput();
      }

      $abonement->name = $request->name;
      $abonement->price = $request->price*100;
      $abonement->visits_in_abonement = $request->visits;
      if ($abonement->update()){
        return redirect('/abonements')->with('success','Абонемент успешно изменен');
      }      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abonement $abonement)
    {
      if ($abonement->delete())
        return redirect('/abonements')->with('success','Абонемент успешно удален');
    }
}
