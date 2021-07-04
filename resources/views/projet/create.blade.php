
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../fonts/icomoon/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Style -->
    <link rel="stylesheet" href="../css/style1.css">
    

    <title>ajout de projet</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
       

    <div class="container px-4 px-lg-5">
            
            <a class="navbar-brand" href="{{ url('/') }}"><span class="text-highlight">Drop</span><span class="text-bold">Docs</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
               
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item">
                <div class="dropdown">
                    <button class="btn btn-outline-dark mt-auto">Filières</button>
                    <div class="dropdown-content">
                    <a href="/filiere/1">IT</a>
                   <a href="/filiere/3">Data Science</a>
                   <a href="">Sécurité & Réseaux</a>
                        <a href="/filiere/2">Systèmes embarqués</a>
                    </div>
                </div>
                </li>
                </ul>

                    <form class="d-flex">
                    @if (Route::has('login'))
                         @auth
                         <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/profile"> <i class="bi bi-person-circle me-1"> profile </i> </a></div>
                        @else
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/login"> <i class="bi bi-person-circle me-1"> Login </i> </a></div>

                    @if (Route::has('register'))
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/register">  <i class="bi bi-person-circle me-1"> Register </i> </a></div>
                    @endif
                @endauth
            
             @endif
                </form>
        </div>
   </div>
    </nav>

  <div class="content">
    
    <div class="container">
      <div class="row">
        <div class="col-md-5 mr-auto">
          <h1 class="mb-3">Ajoutez votre projet</h1>
          <p> Vous êtes ici afin de d'ajouter un projet sur la plateform Dropdocs</p>
          <p> Vous pourriez ainsi sauvegarder votre projet et ainsi y avoir accès partout où vous disposez d'internet ☺</p>
          <p> Cela donnera aussi la possibilité à d'autres d'avoir accès à votre projet et en profiter pour ce cultiver ou s'inspirer afin de développer le sien</p>
          
        </div>
        <div class="col-md-6">
          <div class="box">
               <h3 class="heading"> Ajout de projet </h3>
        <form action="{{route('projet.store')}}" class="mb-5" method="post" id="contactForm" name="contactForm">  
            @csrf
            <div class="row">
              
            <div class="col-md-8 form-group">
                  <label for="name" class="col-form-label">Titre </label>
                  <input type="text" class="form-control @error('nom') is-invalid @enderror" name="name" id="name" placeholder="Your name" value="{{$projet->nom ?? old('nom') }}"> 
                 
                @error('nom')
                    <span class="invalid-feedback">
                        {{$message}}
                    </span>
                @enderror
            </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                  <label for="debut" class="col-form-label">Date debut </label>
                  <input type="date" class="form-control @error('debut') is-invalid @enderror" name="debut" id="debut" placeholder="Your email address">
                  @error('debut')
                            <span class="invalid-feedback">
                                {{$message}}
                            </span>
                        @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                  <label for="fin" class="col-form-label">Date Fin </label>
                  <input type="date" class="form-control @error('debut') is-invalid @enderror" name="fin" id="fin" placeholder="Your email address">
                  @error('fin')
                            <span class="invalid-feedback">
                                {{$message}}
                            </span>
                        @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                  <label for="message" class="col-form-label">Description du projet </label>
                  <textarea class="form-control  @error('description') is-invalid @enderror" name="message" id="message" cols="30" rows="7"></textarea>
                  @error('description')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                    @enderror
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6 form-group">
                  <label for="filiere" class="col-form-label">Filière</label>
                  <select class="custom-select @error('filiere') is-invalid @enderror" id="budget" name="budget">
                    <option selected>Choose...</option>
                    @foreach ($filieres as $filiere)
                                <option value="{{$filiere->id}}"> {{$filiere->nom}} </option>
                            @endforeach
                    </select>
                </div>
              </div>
              
         
                    {{-- <form action="{{route('projet.store')}}" method="post" enctype="multipart/form-data"> --}}
                        {{-- @csrf --}}
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
                          
                            
                            <label class="custom-file-label" for="images">Choose file </label>
                        </div>
            
                        {{-- <button type="submit" name="save" class="btn btn-primary btn-block mt-4">
                            Upload les fichiers
                        </button> --}}
                    {{-- </form> --}}
               
                <div class="row">
                <div class="col-md-12">
                  <input type="submit" value="Ajouter" class="btn btn-block btn-primary rounded-0 py-2 px-4">
                  <span class="submitting"></span>
                </div>
              </div>
            </form>
            </form>
            <div id="form-message-warning mt-4"></div> 
            <div id="form-message-success">
              projet ajoutez avec succès!
            </div>
        
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/main2.js"></script>

  </body>
</html>