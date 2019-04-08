@extends('layouts.master')

@section('page_title')
    Liste des clients
@endsection

{{-- @section('btn_action')
<a class="btn btn-info" href="{{url('client/create')}}">Ajouter</a>
@endsection --}}
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
                <th>Solde</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{$client->nom}}</td>
                        <td>{{$client->prenom}}</td>
                        <td>{{$client->telephone}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->solde}}</td>
                        <td>
                            <form id="frm_supprimer_client_{{$client->id}}" action="{{route('client.destroy',$client->id)}}" method="POST">
                                @if(auth::user()->role_id==2)
                                    <a class="btn btn-success" href="{{url('rechargement/'.$client->id)}}">Recharger</a>
                                @endif
                                @if(auth::user()->role_id==1)
                                    <a class="btn btn-secondary" href="{{url('client/'.$client->id.'/edit')}}">Modifier</a>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a href="#" class="btn btn-danger" onclick="confirmer({{$client->id}})">Supprimer</a>
                                @endif
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
            $('#frm_supprimer_client_'+id).submit();
          }
        }
        
    </script>
@endsection