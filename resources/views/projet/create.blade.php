@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4 ">
    <div id="collapseExample" class="col-md-5 mx-auto mt-4 bg-light shadow-sm p-4 ">
        <form action="{{route('projet.store')}}" class="" method="post" enctype="multipart/form-data">  
            @csrf

            <center>
            <div class="form-group mt-3">
                <label for="nom"><strong>Titre</strong></label>
                <input type="text" class="form-control  @error('nom') is-invalid @enderror" name="nom" id="nom" value="{{$projet->nom ?? old('nom') }}">
            
                @error('nom')
                    <span class="invalid-feedback">
                        {{$message}}
                    </span>
                @enderror
            </div>
            </center>

            

            {{-- <center>
                <div class="form-group mt-3">
                    <label class="btn btn-primary" for="description"> <i class="fa fa-upload"></i> <strong>En quoi consiste ce projet ? </strong></label>
                    
                    <input type="file" id="description" name="description" class="form-control-file @error('file') is-invalid @enderror">
                    @error('description')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                    @enderror
                </div>
            </center> --}}

            <div class="form-group ">
                <center> <label for="description"><strong>Décrivez brièvement le projet</strong></label> 
                    <textarea name="description" class="form-control rounded-0 @error('description') is-invalid @enderror" id="description" cols="1" rows="3">{{$projet->description ?? old('description') }}</textarea>
                
                    @error('description')
                    <span class="invalid-feedback">
                        {{$message}}
                    </span>
                    @enderror
                </center>
            </div>

             
                <div class="form-group mt-3">
                    <center>
                        <label class="" for="debut">  <strong>Quand a débuté ce projet ? </strong></label>
                        
                        <input type="date" id="debut" name="debut" class="form-control @error('debut') is-invalid @enderror">
                        @error('debut')
                            <span class="invalid-feedback">
                                {{$message}}
                            </span>
                        @enderror
                    </center> 
                </div>

                <div class="form-group mt-3">
                    <center>
                        <label class="" for="fin">  <strong>Quand se termine t'il ? </strong></label>
                        
                        <input type="date" id="fin" name="fin" class="form-control @error('fin') is-invalid @enderror">
                        @error('fin')
                            <span class="invalid-feedback">
                                {{$message}}
                            </span>
                        @enderror
                    </center> 
                </div>
            


            <div class="form-group ">
                <center> <label for="filiere"><strong>Filière</strong></label> 

                    <select name="filiere" id="filiere" class="form-control @error('filiere') is-invalid @enderror">
                        <option value="" style="display: none;">  </option>
                        @foreach ($filieres as $filiere)
                            <option value="{{$filiere->id}}"> {{$filiere->nom}} </option>
                        @endforeach
                    </select>
                   
                    @error('filiere')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                    @enderror
                </center>
            </div>
                            
            {{-- <div class="form-group ">
                <center> <label for="content"><strong>Description</strong></label> 
                    <textarea name="content" class="form-control rounded-0 @error('content') is-invalid @enderror" id="content" cols="20" rows="8">{{$projet->content ?? old('content') }}</textarea>
                
                    @error('content')
                    <span class="invalid-feedback">
                        {{$message}}
                    </span>
                    @enderror
                </center>
            </div>   --}}

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-primary shadow-sm ">Ajouter</button>
            </div>
        </form>
    </div>
</div>
@endsection
