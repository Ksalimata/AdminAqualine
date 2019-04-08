@extends('layouts.master')

@section('page_title')
    Créer une gare
@endsection

@section('btn_action')
<a class="btn btn-info" href="{{url('gare')}}">Retour à la liste</a>
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
        <form method="POST" action="{{route('gare.store')}}" style="margin-bottom:50px">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="libelle">Libelle</label>
                <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libelle">
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Entrez l'adresse">
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
@endsection