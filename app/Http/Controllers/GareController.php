<?php

namespace App\Http\Controllers;

use App\Gare;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest\storeGare;
use App\Http\Requests\UpdateRequest\updateGare;
use DB;
class GareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gares = Gare::all();
        return view('gares.index', compact('gares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gares.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeGare $request)
    {
        try
        {
            Gare::create([
                "libelle" => $request['libelle'],
                 "adresse" => $request['adresse']
            ]);

            return redirect()->back()->with('success','Gare créé avec succès');

        }
        catch(\Exception $e)
        {
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
        $gare = Gare::where('id','=',$id)->first();
        return view('gares.edit', compact('gare'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateGare $request, $id)
    {
        try {
        $gare = Gare::find($id)->update($request->all());
        
        return redirect()->back()->with('success','Gare modifié avec succès !');
            
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
        Gare::destroy($id);
        return redirect()->back()->with('success','Gare supprimé avec succès !');
    }
}
