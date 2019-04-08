@extends('layouts.master')

@section('page_title')
    Liste des opérations
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
                <th>Montant</th>
                <th>Client</th>
                <th>Contact client</th>
                <th>Agent</th>
                <th>Contact Agent</th>
                {{-- <th></th> --}}
            </tr>
            </thead>
            <tbody>
                @foreach ($operations as $operation)
                    <tr>
                        <td>{{date('d-m-Y',strtotime($operation->date))}}</td>
                        <td>{{$operation->montant}}</td>
                        <td>{{$operation->clientNom}} {{$operation->clientPrenom}}</td>
                        <td>{{$operation->clientTelephone}}</td>
                        <td>{{$operation->userNom}} {{$operation->userPrenom}}</td>
                        <td>{{$operation->userTelephone}}</td>
                        {{-- <td>
                            <form id="frm_supprimer_operation_{{$operation->id}}" action="{{route('operation.destroy',$operation->id)}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <a href="#" class="btn btn-danger" onclick="confirmer({{$operation->id}})">Supprimer</a>
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
            $('#frm_supprimer_operation_'+id).submit();
          }
        }
        
    </script>
@endsection