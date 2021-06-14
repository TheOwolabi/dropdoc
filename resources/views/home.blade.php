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

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            @endif

          
        </div>
    </div>
</div>
@endsection
