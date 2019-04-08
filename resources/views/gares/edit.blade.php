@extends('layouts.master')

@section('page_title')
    Modifier une gare
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
        <form method="POST" action="{{route('gare.update',$gare->id)}}" style="margin-bottom:50px">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="libelle">Libelle</label>
            <input type="text" class="form-control" id="libelle" name="libelle" value="{{$gare->libelle}}" placeholder="Entrez le libelle">
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" value="{{$gare->adresse}}" placeholder="Entrez l'adresse">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection