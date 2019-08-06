<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Abonement;
use App\Models\Abonement_log;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clients = Client::orderBy('name', 'asc')->paginate(10);
      return view('clients.index', compact('clients'));
    }

    public function search(Request $request)
    {
      $clients = Client::where('name', 'like', '%'.$request->search.'%')->orderBy('name', 'asc')->get();
      return view('clients.search', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $request->validate([
        'name' => 'required|min:2',
        'birthday' => 'required',
        'parent' => 'required',
        'description' => 'required',
        'phone' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
      ]);

      $client = new Client();
      if($request->has('photo')){
        $path = $request->file('photo')->store('public/avatars');
        if($client->imageUrl !== 'noimage.jpg' ){
          Storage::delete($client->imageUrl);
        }
        $client->imageUrl = $path;
      }     
      $client->name = $request->name;
      $client->birthday = $request->birthday;
      $client->parent = $request->parent;
      $client->description = $request->description;
      $client->phone = $request->phone;
      $client->save();
      return redirect('/clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
      $abonements = Abonement::all();
      $currentAbonements =Abonement_log::where('client_id', $client->id)->where('count', '>', 0)->get();
      
      // return $currentAbonements;

      $client->age = Carbon::parse($client->birthday)->diffInYears();
      $client->age < 5 ? $client->age_plural = 'года' : $client->age_plural = 'лет';
      return view('clients.show', compact('client', 'abonements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
      return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
      $request->validate([
        'name' => 'required|min:2',
        'birthday' => 'required',
        'parent' => 'required',
        'description' => 'required',
        'phone' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
      ]);

      
      
      if($request->has('photo')){
        $path = $request->file('photo')->store('public/avatars');
        if($client->imageUrl !== 'public/avatars/noImage.png' ){
          Storage::delete($client->imageUrl);
        }
        $client->imageUrl = $path;
      }
      $client->name = $request->name;
      $client->birthday = $request->birthday;
      $client->parent = $request->parent;
      $client->description = $request->description;
      $client->phone = $request->phone;
      $client->update();
      return redirect('/clients')->with('success', 'Анкета изменена успешно');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
      $client->delete();
      return redirect('/clients');
    }

}
