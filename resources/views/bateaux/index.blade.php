@extends('layouts.master')

@section('page_title')
    Liste des bateaux
@endsection

@section('btn_action')
<a class="btn btn-info" href="{{url('bateau/create')}}">Ajouter</a>
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
                <th>Matricule</th>
                <th>Destination</th>
                <th>Gare</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($bateaus as $bateau)
                    <tr>
                        <td>{{$bateau->matricule}}</td>
                        <td>{{$bateau->destination}}</td>
                        <td>{{$bateau->libelle}}</td>
                        <td>
                            <form id="frm_supprimer_bateau_{{$bateau->id}}" action="{{route('bateau.destroy',$bateau->id)}}" method="POST">
                            <a class="btn btn-secondary" href="{{url('bateau/'.$bateau->id.'/edit')}}">Modifier</a>
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <a href="#" class="btn btn-danger" onclick="confirmer({{$bateau->id}})">Supprimer</a>
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
            $('#frm_supprimer_bateau_'+id).submit();
          }
        }
        
    </script>
@endsection