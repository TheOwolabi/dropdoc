@extends('layouts.app')

@section('content')  
    <div class="container-fluid">
         <div class="col-md-5 mx-auto">
             <div class="card mt-4">
                 <div class="card-header">
                     <div class="row ">
                         <div class="col-md-12 d-flex justify-content-center">
                           Titre : {{$projet->nom}}
                            <a href="{{route('projet.edit',$projet->id)}}" class="icon edit"> <i class="flaticon-pencil"></i> </a>
                                
                            <a href="" class="icon delete" onclick="event.preventDefault(); document.getElementById('delete-{{$projet->id}}').submit();"> <i class="flaticon-delete"></i> </a>
                    
                            <form id="delete-{{$projet->id}}" action="{{route('projet.destroy',$projet)}}" style="display:none;" method="post">
                            @method('DELETE')
                            @csrf
                            </form> 
                         </div>
                         <div class="col-md-4">
                            Filiere : <a href=""> {{$projet->filiere->nom}} </a> 
                          </div>
                         <div class="col-md-4">
                            Autheur : <a href=""><i>{{$projet->user->firstname}}</i></a>  
                          </div>
                         <div class="col-md-4">
                            Durée : <i> {{$projet->duree}} jours </i>
                         </div>
                         
                     </div>
                 </div>

                 <div class="card-body pl-4 pb-3">
                    {{$projet->description ?? '-'}}
                 </div>

                 <div class="card-body shadow-sm pl-4 pb-3">
                     <table class="table">
                        <tbody>
                            @foreach ($fichiers as $fichier )
                                @if ($fichier->projet_id == $projet->id) 
                                    <tr>
                                        <td>{{$fichier->nom ?? '-'}}</td>
                                        <td> 
                                            <form action="{{route('fichier.download',$fichier)}}" method="post">
                                                @csrf
                                                <button class="btn btn-success" type="submit">Télécharger</button>
                                             </form>
                                        </td>
                                    </tr>
                                @endif   
                            @endforeach
                        </tbody>
                    </table>
                 </div>
             </div>
            
        </div>
    
    </div> 
@endsection