<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest\storeClient;
use App\Http\Requests\UpdateRequest\updateClient;
use DB;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
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
    public function store(storeClient $request)
    {

       try {
        Client::create([
            "nom" => $request['nom'],
            "prenom" => $request['prenom'],
            "telephone" => $request['telephone'],
            "email" => $request['email'],
            "username" => $request['username'],
            "password" => bcrypt($request['password']),
            "solde" => intval($request['solde'])
        ]);

        return redirect()->back()->with('success','Client créé avec succès');
            
        } catch (Exception $e) {
            
            return redirect()->back()->with('error',$e);
            
        } 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::where('id','=',$id)->first();
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateClient $request, $id)
    {
        try {
        $client = Client::find($id)->update($request->all());
        return redirect()->back()->with('success','Client modifié avec succès !');
            
        } catch (Exception $e) {
            
          return redirect()->back()->with('error','Echec de la mise à jour, veuillez réessayer svp');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::destroy($id);
        return redirect()->back()->with('success','Client supprimé avec succès !');
    }
}
