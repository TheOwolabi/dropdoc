@extends('layouts.app')

@section('content')  
    <div class="container-fluid">
        @if ($projets->isEmpty())
        @include('shared._empty',['model'=>'projet','btn'=>'UN projet', 'msg' => "aucun métier n'a pour le moment été créé"]) 
        @else
        {{-- <div class="d-flex justify-content-center">
            <a href="{{route('projet.create')}}" class="btn btn-success">AJOUTER projet</a>
        </div> --}}

        @foreach ($projets as $projet)
         <div class="col-md-4 mx-auto">
             <div class="card mt-4">
                 <div class="card-header">
                     <div class="row">
                         <div class="col-md-6">
                           Titre : {{$projet->nom}} 
                         </div>
                         <div class="col-md-6">
                            Filiere : <a href=""> {{$projet->filiere->nom}} </a> 
                          </div>
                         <div class="col-md-6">
                            Autheur : <a href=""><i>{{$projet->user->firstname}}</i></a>  
                          </div>
                         <div class="col-md-6">
                            Durée : <i> {{$projet->duree}} jours </i>
                         </div>
                         
                     </div>
                 </div>

                 <div class="card-body pl-4 pb-3 ">
                    <div>
                         {{$projet->description ?? '-'}}
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="">
                            <a href="{{route('projet.show',$projet)}}" type="submit"  class="btn btn-dark">
                                {{ __('Consulter') }}
                            </a>
                            
                                
                            <a href="{{route('projet.edit',$projet->id)}}" class="icon edit"> <i class="flaticon-pencil"></i> </a>
                        
                            <a href="" class="icon delete" onclick="event.preventDefault(); document.getElementById('delete-{{$projet->id}}').submit();"> <i class="flaticon-delete"></i> </a>
                    
                            <form id="delete-{{$projet->id}}" action="{{route('projet.destroy',$projet)}}" style="display:none;" method="post">
                            @method('DELETE')
                            @csrf
                            </form>
                               
                             </div>
                        
                    </div>
                 </div>
             </div>
            
        </div>
     @endforeach
     @endif
    </div> 
@endsection