<?php

namespace App\Http\Controllers;

use App\Operation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest\storeOperation;
use DB;
use App\Client;
use App\User;
use Auth;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operations = DB::table('operations')
                    ->join('clients','clients.id','client_id')
                    ->join('users','users.id','agent_id')
                    ->select('operations.*','clients.id as clientId','clients.nom as clientNom','clients.prenom as clientPrenom','clients.telephone as clientTelephone','users.id as userId','users.nom as userNom','users.prenom as userPrenom','users.telephone as userTelephone')
                    ->get();
        return view('operations.index', compact('operations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* $clients = Client::all();
        $users = User::all();
        return view('operations.create', compact('clients','users')); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeOperation $request)
    {

        
        
        /* Operation::create([
            "numero" => $request['numero'],
            "date" => date('d/m/Y'),
            "client_id" => intval($request['client_id']),
            "user_id" => intval($request['user_id'])
        ]);

        return redirect('/operation')->with('success','Utilisateur créé avec succès'); */
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
        /* $operation = Operation::where('id','=',$id)->first();
        $clients = Client::all();
        $users = User::all();
        return view('operation.edit', compact('operation','clients','users')); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /* $operation = User::find($id)->update($request->all());
        return redirect()->back()->with('success','Utilisateur modifié avec succès !'); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* User::destroy($id);
        return redirect()->back()->with('success','Utilisateur supprimé avec succès !'); */
    }

    public function rechargement($id) {
        $client = Client::find($id);
        return view('operations.rechargement', compact('client'));
    }

    public function recharger(Request $request, $id) {
        $operation = new Operation();
        $operation->date = date('Y-m-d');
        $operation->montant = $request['montant'];
        $operation->agent_id = Auth::user()->id;
        $operation->client_id = $id;
        $operation->save();

        $client = Client::find($id);
        $client->solde += $request['montant'];
        $client->save();

        return redirect('/client')->with('success','Rechargement effectué avec succès !');
    }
}
