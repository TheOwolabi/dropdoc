@extends('layouts.app')

@section('content')  
    <div class="container-fluid">
        @if ($filieres->isEmpty())
        @include('shared._empty',['model'=>'filiere','btn'=>'UN filiere', 'msg' => "aucun métier n'a pour le moment été créé"]) 
        @else
        {{-- <div class="d-flex justify-content-center">
            <a href="{{route('filiere.create')}}" class="btn btn-success">AJOUTER filiere</a>
        </div> --}}

        @foreach ($filieres as $filiere)
         <div class="col-md-4 mx-auto">
             <div class="card mt-4">
                 <div class="card-header">
                     <div class="row">
                         <div class="col-md-6">
                           Titre : {{$filiere->nom}} 
                         </div> 
                     </div>
                 </div>

                 <div class="card-body pl-4 pb-3 ">
                    <div>
                         {{$filiere->description ?? '-'}}
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="">
                            <a href="{{route('filiere.show',$filiere)}}" type="submit"  class="btn btn-dark">
                                {{ __('Consulter') }}
                            </a>
                            
                            @can('update', $filiere)
                                <a href="{{route('filiere.edit',$filiere->id)}}" class="icon edit"> <i class="flaticon-pencil"></i> </a>
                            @endcan

                            @can('delete', $filiere)
                                <a href="" class="icon delete" onclick="event.preventDefault(); document.getElementById('delete-{{$filiere->id}}').submit();"> <i class="flaticon-delete"></i> </a>
                    
                                <form id="delete-{{$filiere->id}}" action="{{route('filiere.destroy',$filiere)}}" style="display:none;" method="post">
                                @method('DELETE')
                                @csrf
                            </form>
                            @endcan  
                        </div>
                        
                    </div>
                 </div>
             </div>
            
        </div>
     @endforeach
     @endif
    </div> 
@endsection