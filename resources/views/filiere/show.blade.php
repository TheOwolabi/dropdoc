<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>DropDocs</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />


        
    </head>
    <body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            
                <a class="navbar-brand" href="{{ url('/') }}"><span class="text-highlight">Drop</span><span class="text-bold">Docs</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
               
               <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a></li>
               <li class="nav-item">
                <div class="dropdown">
                 <button class="btn btn-outline-dark mx-8">Filières</button>
                 <div class="dropdown-content">
                    @foreach ($filieres as $fil)
                        <a href="{{route('filiere.show',$fil)}}">{{$fil->nom}}</a>
                    @endforeach
                 </div>
                    </div>
             </li> 
           </ul>

                    <form class="d-flex">
                    @if (Route::has('login'))
                         @auth
                         <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/login"> <i class="bi bi-person-circle me-1"> profile </i> </a></div>
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
            <header class="header text-center">
            <div class="container">
                <div class="branding">
                    <h1 class="logo">

                    @php
                         $var = explode(' ',trim($filiere->nom));
                         unset($var[0]);

                        $var = implode(' ', $var);
                        
                    @endphp

                      
                        <span aria-hidden="true" class="icon_documents_alt icon"></span> 
                        
                        <span class="text-highlight"> {{explode(' ',trim($filiere->nom))[0] }}</span><span class="text-bold"> {{ $var}} </span>
                        
                    </h1>
                    
                </div><!--//branding-->
                <p class="col-md-6 mx-auto">{{$filiere->description}}</p>	             <div class="main-search-box pt-3 pb-4 d-inline-block">
	                 <form class="form-inline search-form justify-content-center" action="" method="get">
                        @csrf
			            <input type="text" autocomplete="off" placeholder="Enter search terms..." name="search" id="search" class="form-control search-input">
			            
			            <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
			            
			        </form>
                    <div id="projetList">
                    </div>
	             </div>
                
            </div><!--//container-->
        </header><!--//header-->
        
        <!-- Section-->
        <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                   @foreach ($projets as $projet )
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><a href="{{route('projet.show',$projet)}}"> {{$projet->nom}}</a> </h5>
                                    <!-- Product price-->
                                    Author : <a href=""> {{$projet->user->firstname}}</a>
                                </div>
                            </div>
                        </div>
                            <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#"> voir plus ...</a></div>                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; DropDocs 2021</p></div>
        </footer>
     
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
          <!-- jQuery library -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        </div>
        <script>
            $(document).ready(function () {
                $('#search').keyup(function () {
                    var projets = <?php echo json_encode($projets, JSON_HEX_TAG); ?>;
                    
                    var data = $(this).val();
                    if (data != '') {
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('projets.list') }}",
                            method: "POST",
                            data: {data: data, _token: _token,  projets: projets},
                            success: function (data) {
                                $('#projetList').fadeIn();
                                $('#projetList').html(data);
                            }
                        });
                    
                    }
                    
            
            
            });
        
        });
        
        $(document).on('click', 'li', function () {
                    $('#search').val($(this).text());
                    $('#projetList').fadeOut();
                });
        
        </script>
    </body>
</html>
