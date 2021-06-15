@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4 ">
    <div id="collapseExample" class="col-md-5 mx-auto mt-4 bg-light shadow-sm p-4 ">
        <form action="{{route('filiere.store')}}" class="" method="post" enctype="multipart/form-data">  
            @csrf

            <center>
            <div class="form-group mt-3">
                <label for="nom"><strong>Nom de la filiere</strong></label>
                <input type="text" class="form-control  @error('nom') is-invalid @enderror" name="nom" id="nom" value="{{$filiere->nom ?? old('nom') }}">
            
                @error('nom')
                    <span class="invalid-feedback">
                        {{$message}}
                    </span>
                @enderror
            </div>
            </center>


            <div class="form-group ">
                <center> <label for="description"><strong>Description de la filiere</strong></label> 
                    <textarea name="description" class="form-control rounded-0 @error('description') is-invalid @enderror" id="description" cols="1" rows="3">{{$filiere->description ?? old('description') }}</textarea>
                
                    @error('description')
                    <span class="invalid-feedback">
                        {{$message}}
                    </span>
                    @enderror
                </center>
            </div>

           
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-primary shadow-sm ">Créer</button>
            </div>
        </form>
    </div>
</div>
@endsection