<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Passage;
use App\Operation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nbre_clients = count(Client::all());
        $nbre_passages = count(Passage::all());
        $nbre_operations = count(Operation::all());

        return view('home', compact('nbre_clients','nbre_passages','nbre_operations'));
    }

    public function getStatistique() {
        $result = collect();
        $days = [];
        $numbers = [];
        for ($i=7; $i >=0 ; $i--) { 
            $day = date('Y-m-d', strtotime('-'.$i.' days', strtotime(date('Y-m-d'))));
            $number = count(Passage::where('date','=',$day)->get());
            array_push($days,$day);
            array_push($numbers,$number);
        }
        $result->push($days);
        $result->push($numbers);
        return response()->json($result);
    }
}
