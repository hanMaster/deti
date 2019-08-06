<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $goods = Good::where('type','good')->paginate(10);
      return view('goods.index', compact('goods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('goods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->price = str_replace(",", ".", $request->price);
      // dd($request->all());
      $request->validate([
        'name' => 'required|min:2',
        'price' => 'required|regex:/^\d+.\d*$/',
      ]);
      $good = new Good();
      $good->name = $request->name;
      $good->price = $request->price*100;
      $good->type = 'good';
      $good->save();
      return redirect('/goods')->with('success', 'Успешно добавлено');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function edit(Good $good)
    {
      return view('goods.edit', compact('good'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Good $good)
    {
      $request->price = str_replace(",", ".", $request->price);
      $request->validate([
        'name' => 'required|min:2',
        'price' => 'required|regex:/^\d+.\d*$/',
      ]);
      $good->name = $request->name;
      $good->price = $request->price*100;
      $good->save();
      return redirect('/goods')->with('success', 'Товар успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function destroy(Good $good)
    {
      $good->delete();
      return redirect('/goods');
    }
}
