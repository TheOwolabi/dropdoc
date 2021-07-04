@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (Auth::user()->is_verified == 0)
                <div class="flash-message">
                   
                        
                            <p class="alert alert-danger">Veuillez vérifier votre compte  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                       
                 
                </div>
            @else
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{route('filiere.index')}}" type="submit"  class="btn btn-dark">
                                    {{ __('Les filieres') }}
                                </a>
                                <a href="{{route('projet.index')}}" type="submit"  class="btn btn-dark">
                                    {{ __('Tous les projets') }}
                                </a>
                                <a href="{{route('upload')}}" type="submit"  class="btn btn-dark">
                                    {{ __('upload') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

          
        </div>
    </div>
</div>
@endsection
