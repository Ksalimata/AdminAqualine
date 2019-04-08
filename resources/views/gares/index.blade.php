@extends('layouts.master')

@section('page_title')
    Liste des gares
@endsection

@section('btn_action')
<a class="btn btn-info" href="{{url('gare/create')}}">Ajouter</a>
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
                <th>Libelle</th>
                <th>Adresse</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($gares as $gare)
                    <tr>
                        <td>{{$gare->libelle}}</td>
                        <td>{{$gare->adresse}}</td>
                        <td>
                            <form id="frm_supprimer_gare_{{$gare->id}}" action="{{route('gare.destroy',$gare->id)}}" method="POST">
                            <a class="btn btn-secondary" href="{{url('gare/'.$gare->id.'/edit')}}">Modifier</a>
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <a href="#" class="btn btn-danger" onclick="confirmer({{$gare->id}})">Supprimer</a>
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
            $('#frm_supprimer_gare_'+id).submit();
          }
        }
        
    </script>
@endsection