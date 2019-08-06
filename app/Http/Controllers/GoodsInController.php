<?php

namespace App\Http\Controllers;

use App\Models\Goods_in;
use App\Models\GoodsInDocs;
use App\Models\Good;

use Illuminate\Http\Request;
use Validator;

class GoodsInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $goodsin = GoodsInDocs::paginate(10);
      return view('goodsin.index', compact('goodsin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $goods = Good::where("type","=", "good")->get();
      return view('goodsin.create', compact('goods'));
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
          'count'=>'required|gt:0',
          'amount'=>'required|regex:/^\d+.\d*$/'
        ], $messages
      );
      if ($validator->fails()){
        return redirect('/goodsin/create')->withErrors($validator)->withInput();
      }

      $goodsin = new Goods_in();
      $goodsin->good_id = $request->good;
      $goodsin->quantity = $request->count;
      $goodsin->amount = $request->amount;
      if ($goodsin->save()){
        $goodsin->log('add');
        return redirect('/goodsin')->with('success','Товар оприходован успешно');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Goods_in  $goods_in
     * @return \Illuminate\Http\Response
     */
    public function show(Goods_in $goods_in)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Goods_in  $goods_in
     * @return \Illuminate\Http\Response
     */
    public function edit(Goods_in $goodsin)
    {
      $goods = Good::where("type","=", "good")->get();
      // return $goodsin;
      return view('goodsin.edit', compact('goodsin', 'goods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Goods_in  $goods_in
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goods_in $goodsin)
    {
      $data = $request->except('_method','_token');
      $goodsin->good_id = $request->good;
      $goodsin->quantity = $request->count;
      $goodsin->amount = $request->amount;
      if ($goodsin->update()){
        return redirect('/goodsin/')->with('success','Успешно обновлено');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Goods_in  $goods_in
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goods_in $goodsin)
    {
      $goodsin->log('delete');
      if ($goodsin->delete()){        
        return redirect('/goodsin')->with('success','Приход товара успешно удален');
      }
      
    }

}
