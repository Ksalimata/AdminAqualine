@extends('layouts.master')

@section('page_title')
    Recharger un client
@endsection

@section('btn_action')
<a class="btn btn-info" href="{{url('client')}}">Retour à la liste</a>
@endsection
@section('content')
    <div class="container">
        <form method="POST" action="{{route('recharger',$client->id)}}" style="margin-bottom:50px">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="montant">Montant</label>
                <input type="text" class="form-control" id="montant" name="montant" placeholder="Entrez le montant">
            </div>
            <button type="submit" class="btn btn-primary">Recharger</button>
        </form>
    </div>
@endsection