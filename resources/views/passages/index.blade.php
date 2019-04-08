@extends('layouts.master')

@section('page_title')
    Liste des passages
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
                <th>Date</th>
                <th>Client</th>
                <th>Contact</th>
                <th>Bateau</th>
                <th>Destination</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($passages as $passage)
                    <tr>
                        <td>{{date('d-m-Y',strtotime($passage->date))}}</td>
                        <td>{{$passage->nom}} {{$passage->prenom}}</td>
                        <td>{{$passage->telephone}}</td>
                        <td>{{$passage->matricule}}</td>
                        <td>{{$passage->destination}}</td>
                        {{-- <td>
                            <form id="frm_supprimer_passage_{{$passage->id}}" action="{{route('passage.destroy',$passage->id)}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <a href="#" class="btn btn-danger" onclick="confirmer({{$passage->id}})">Supprimer</a>
                            </form>
                        </td> --}}
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
            $('#frm_supprimer_passage_'+id).submit();
          }
        }
        
    </script>
@endsection