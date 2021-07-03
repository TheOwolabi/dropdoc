@extends('layouts.app')

@section('content')  
    <div class="container-fluid">
         <div class="col-md-5 mx-auto">
             <div class="card mt-4">
                 <div class="card-header">
                     <div class="row ">
                         <div class="col-md-12 d-flex justify-content-center">
                           Titre : {{$projet->nom}}
                           @can('update', $projet)
                            <a href="{{route('projet.edit',$projet->id)}}" class="icon edit"> <i class="flaticon-pencil"></i> </a>
                           @endcan

                           @can('delete', $projet)
                            <a href="" class="icon delete" onclick="event.preventDefault(); document.getElementById('delete-{{$projet->id}}').submit();"> <i class="flaticon-delete"></i> </a>
                    
                            <form id="delete-{{$projet->id}}" action="{{route('projet.destroy',$projet)}}" style="display:none;" method="post">
                            @method('DELETE')
                            @csrf
                            </form> 
                            @endcan
                         </div>
                         <div class="col-md-4">
                            Filiere : <a href="{{route('filiere.show',$projet->filiere)}}"> {{$projet->filiere->nom}} </a> 
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
                                            <a href="{{"https://dropstore.s3.us-west-1.amazonaws.com/".$fichier->nom.".".$fichier->extension}}">Telecharger</a>
                                            {{-- <a href="{{route('fichier.delete',$fichier)}}">Supprimer</a> --}}
                                            
                                            @can('delete',$fichier)
                                                <form action="{{route('fichier.delete',$fichier)}}" method="post">
                                                    @csrf
                                                    <button class="btn btn-danger"  type="submit">Supprimer</button>
                                                </form>
                                            @endcan  
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