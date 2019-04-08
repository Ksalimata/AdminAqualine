@extends('layouts.master')

@section('page_title')
    Créer un utilisateur
@endsection

@section('btn_action')
<a class="btn btn-info" href="{{url('bateau')}}">Retour à la liste</a>
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
        <form method="POST" action="{{route('bateau.store')}}" style="margin-bottom:50px">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="matricule">Matricule</label>
                <input type="text" class="form-control" id="matricule" name="matricule" placeholder="Entrez le matricule">
            </div>
            <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" class="form-control" id="destination" name="destination" placeholder="Entrez la destination">
            </div>
            <div class="form-group">
                <label for="gare_id">Gare</label>
                <select id="gare_id" name="gare_id"  class="form-control">
                    @foreach ($gares as $gare)
                        @if($gare->id==1)
                            <option selected value="{{$gare->id}}">{{$gare->libelle}}</option>
                        @else
                            <option value="{{$gare->id}}">{{$gare->libelle}}</option>
                        @endif
                        
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
@endsection