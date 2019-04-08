@extends('layouts.master')

@section('page_title')
    Dashboard
@endsection


@section('content')
    <div class="row" style="margin-bottom:50px">
        <div class="col-sm-4">
            <div class="card" style="background-color:#2b7b94">
            <div class="card-body">
                <center><h5 class="card-title">Nombre de clients</h5>
                <h1>{{$nbre_clients}}</h1>
                <a href="/client" class="btn btn-primary">Clients</a></center>
            </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="background-color:#3ca5c5">
            <div class="card-body">
                <center><h5 class="card-title">Nombre de passages</h5>
                <h1>{{$nbre_passages}}</h1>
                <a href="/passage" class="btn btn-primary">Passages</a></center>
            </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="background-color:#f3bd4b">
            <div class="card-body">
                <center><h5 class="card-title">Nombre d'opérations</h5>
                <h1>{{$nbre_operations}}</h1>
                <a href="/operation" class="btn btn-primary">Operations</a></center>
            </div>
            </div>
        </div>
    </div>
    <h2>Courbe de l'utilisation du service</h2>
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    
@endsection