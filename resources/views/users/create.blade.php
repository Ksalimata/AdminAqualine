@extends('layouts.master')

@section('page_title')
    Créer un utilisateur
@endsection

@section('btn_action')
<a class="btn btn-info" href="{{url('user')}}">Retour à la liste</a>
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
        <form method="POST" action="{{route('user.store')}}" style="margin-bottom:50px">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prenom">
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Entrez votre numéro de telephone" maxlength="8">
            </div>
            <div class="form-group">
                <label for="nom">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre E-mail">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Entrez votre nom d'utilisateur">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Entrez votre password">
            </div>
            <div class="form-group">
                <label for="role_id">Role</label>
                <select id="role_id" name="role_id"  class="form-control">
                    @foreach ($roles as $role)
                        @if($role->id==1)
                            <option selected value="{{$role->id}}">{{$role->libelle}}</option>
                        @else
                            <option value="{{$role->id}}">{{$role->libelle}}</option>
                        @endif
                        
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
@endsection