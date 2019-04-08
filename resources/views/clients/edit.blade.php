@extends('layouts.master')

@section('page_title')
    Modifier un client
@endsection

@section('btn_action')
<a class="btn btn-info" href="{{url('client')}}">Retour à la liste</a>
@endsection
@section('content')

@if(session('success'))
  <div class="alert alert-success">
    {{session('success')}} 
  </div>  
    @endif
    @if(session('error'))
      <div class="alert alert-error">
          {{session('error')}}
      </div>
    @endif
    @if(session('error'))
  <div class="alert alert-error">
      {{session('error')}}
  </div>
@endif
  @if(!$errors->isEmpty())
     <div class="alert alert-danger">
     @foreach($errors->all() as $error)
       {{$error}}<br/>
     @endforeach
     </div>
   @endif 

    <div class="container">
        <form method="POST" action="{{route('client.update',$client->id)}}" style="margin-bottom:50px">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{$client->nom}}" placeholder="Entrez votre nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{$client->prenom}}" placeholder="Entrez votre prenom">
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" value="{{$client->telephone}}" placeholder="Entrez votre numéro de telephone" maxlength="8">
            </div>
            <div class="form-group">
                <label for="nom">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$client->email}}" placeholder="Entrez votre E-mail">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{$client->username}}" placeholder="Entrez votre nom d'utilisateur">
            </div>
            <div class="form-group">
                <label for="solde">Solde</label>
                <input type="text" class="form-control" id="solde" name="solde" value="{{$client->solde}}" placeholder="Entrez votre solde">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection