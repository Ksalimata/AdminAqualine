<?php

namespace App\Http\Controllers;

use App\Bateau;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest\storeBateau;
use App\Http\Requests\UpdateRequest\updateBateau;
use DB;
use App\Gare;

class BateauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bateaus = DB::table('bateaus')
                    ->join('gares','gares.id','gare_id')
                    ->select('bateaus.*','gares.id as gareId','gares.libelle')
                    ->get();
        return view('bateaux.index', compact('bateaus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gares = Gare::all();
        return view('bateaux.create', compact('gares'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeBateau $request)
    {
        try {

            Bateau::create([
            "matricule" => $request['matricule'],
            "destination" => $request['destination'],
            "gare_id" => intval($request['gare_id'])
        ]);
            return redirect()->back()->with('success','Bateau crée avec succès');
            
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
        $bateau = Bateau::where('id','=',$id)->first();
        $gares = Gare::all();
        return view('bateaux.edit', compact('bateau','gares'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateBateau $request, $id)
    {
        try {
        $bateau = Bateau::find($id)->update($request->all());
        return redirect()->back()->with('success','Utilisateur modifié avec succès !');
            
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
