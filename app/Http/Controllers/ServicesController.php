<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $goods = Good::where('type','service')->paginate(10);
      
      return view('services.index', compact('goods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('services.create');
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
      $request->validate([
        'name' => 'required|min:2',
        'price' => 'required|regex:/^\d+.\d*$/',
      ]);
      $good = new Good();
      $good->name = $request->name;
      $good->price = $request->price*100;
      $good->type = 'service';
      $good->save();
      return redirect('/services')->with('success', 'Успешно добавлено');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function show(Good $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function edit(Good $service)
    {
      return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Good $service)
    {
      $request->price = str_replace(",", ".", $request->price);
      $request->validate([
        'name' => 'required|min:2',
        'price' => 'required|regex:/^\d+.\d*$/',
      ]);
      $service->name = $request->name;
      $service->price = $request->price*100;
      $service->save();
      return redirect('/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function destroy(Good $service)
    {
      $service->delete();
      return redirect('/services');
    }

}
