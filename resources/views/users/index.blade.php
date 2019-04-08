@extends('layouts.master')

@section('page_title')
    Liste des utilisateurs
@endsection

@section('btn_action')
<a class="btn btn-info" href="{{url('user/create')}}">Ajouter</a>
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
    
    <div class="table-responsive">
        <table class="table table-striped table-sm" id="myTable">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>E-mail</th>
                <th>Role</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->nom}}</td>
                        <td>{{$user->prenom}}</td>
                        <td>{{$user->telephone}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->libelle}}</td>
                        <td>
                            <form id="frm_supprimer_user_{{$user->id}}" action="{{route('user.destroy',$user->id)}}" method="POST">
                            <a class="btn btn-secondary" href="{{url('user/'.$user->id.'/edit')}}">Modifier</a>
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <a href="#" class="btn btn-danger" onclick="confirmer({{$user->id}})">Supprimer</a>
                            </form>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        function confirmer(id)
        {
          var r = confirm("Confirmez vous la suppression ?");
      
          if (r == true)
          {
            $('#frm_supprimer_user_'+id).submit();
          }
        }
        
    </script>
@endsection