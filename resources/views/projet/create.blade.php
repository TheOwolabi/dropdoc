@extends('layouts.projet')

@section('content')
<style>
    .container {
        max-width: 500px;
    }
    dl, ol, ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .imgPreview img {
        padding: 8px;
        max-width: 100px;
    } 
</style>

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

                <div class="container mt-5">
                    <h3 class="text-center mb-5">Rajoute des fichiers </h3>
                    {{-- <form action="{{route('projet.store')}}" method="post" enctype="multipart/form-data"> --}}
                        @csrf
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
            
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
            
                        <div class="user-image mb-3 text-center">
                            <div class="imgPreview"> </div>
                        </div>            
            
                        <div class="custom-file">
                            <input type="file" name="File[]" class="custom-file-input" id="images" multiple="multiple">
                          
                            
                            <label class="custom-file-label" for="images">Choose image</label>
                        </div>
            
                        <button type="submit" name="save" class="btn btn-primary btn-block mt-4">
                            Upload les fichiers
                        </button>
                    {{-- </form> --}}
                </div>
            
            


          
                            
            

            <div class="d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-outline-primary shadow-sm ">Ajouter</button>
            </div>
        </form>
    </div>
</div>
@endsection
