<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest\storeUser;
use App\Http\Requests\UpdateRequest\updateUser;
use App\User;
use App\Role;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
                    ->join('roles','roles.id','role_id')
                    ->select('users.*','roles.id as roleId','roles.libelle')
                    ->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUser $request)
    {
        try {
        User::create([
            "nom" => $request['nom'],
            "prenom" => $request['prenom'],
            "telephone" => $request['telephone'],
            "email" => $request['email'],
            "username" => $request['username'],
            "password" => bcrypt($request['password']),
            "role_id" => intval($request['role_id'])
        ]);

        return redirect()->back()->with('success','Utilisateur créé avec succès');
            
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
        $user = User::where('id','=',$id)->first();
        $roles = Role::all();
        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateUser $request, $id)
    {
        try {
            
        $user = User::find($id)->update($request->all());
        return redirect()->back()->with('success','Utilisateur modifié avec succès !');
        }
     catch (Exception $e) {

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
        User::destroy($id);
        return redirect()->back()->with('success','Utilisateur supprimé avec succès !');
    }
}
