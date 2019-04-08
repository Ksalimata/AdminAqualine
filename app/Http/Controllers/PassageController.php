<?php

namespace App\Http\Controllers;

use App\Passage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest\storePassage;
use App\Http\Requests\UpdateRequest\updatePassage;
use App\Client;
use App\Bateau;
use DB;

class PassageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passages = DB::table('passages')
                    ->join('clients','clients.id','client_id')
                    ->join('bateaus','bateaus.id','bateau_id')
                    ->select('passages.*','clients.id as clientId','clients.nom','clients.prenom','clients.telephone','bateaus.id as bateauId','bateaus.matricule','bateaus.destination')
                    ->get();
        return view('passages.index', compact('passages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $bateaus = Bateau::all();
        return view('passages.create', compact('clients','bateaus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePassage $request)
    {

       try {
        Passage::create([
            "date" => date('d/m/Y'),
            "client_id" => intval($request['client_id']),
            "bateau_id" => intval($request['bateau_id'])
        ]);

        return redirect()->with('success','Utilisateur créé avec succès');
            
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
        $passage = Passage::where('id','=',$id)->first();
        $clients = Client::all();
        $bateaus = Bateau::all();
        return view('passage.edit', compact('passage','clients','bateaus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updatePassage $request, $id)
    {
        try {
            
        $passage = Bateau::find($id)->update($request->all());
        return redirect()->back()->with('success','Passage modifié avec succès !');
        
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
        Bateau::destroy($id);
        return redirect()->back()->with('success','Utilisateur supprimé avec succès !');
    }
}
