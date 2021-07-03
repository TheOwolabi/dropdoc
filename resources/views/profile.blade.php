<!DOCTYPE html>
<html lang="en">
<head>
    <title>DropDocs</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS -->
    <script defer src="../fontawesome/js/all.js"></script>
    <!-- Global CSS -->
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->    

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="../css/styles.css">

    

</head> 

<body>
    <div class="page-wrapper">
	    
	    <!-- ******Header****** -->
        <header id="header" class="header">
            <div class="container">
                <div class="branding">
                    <h1 class="logo">
                        <a href="/">
                            <span aria-hidden="true" class="icon_documents_alt icon"></span>
                            <span class="text-highlight">Drop</span><span class="text-bold">Docs</span>
                        </a>
                    </h1>
                </div><!--//branding-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
                    <li class="breadcrumb-item active">profile</li>
                </ol>
               
                <div class="top-search-box"> 
	                 <form class="form-inline search-form justify-content-center" action="" method="get">
	            
                         @csrf
			            <input autocomplete="off" type="text" placeholder="Search..." name="search" id="search" class="form-control search-input">
			            
			            <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
			            
			        </form>

                    <div id="projetList">
                
                     </div>
             
            </div>
            
            
            <!--//container-->
            
        <div>
            <a type="button" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-prima">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"></path>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"></path>
</svg>
                Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
</div>  
</div>
        </header><!--//header-->

        <div class="doc-wrapper">
            <div class="container">
                <div id="doc-header" class="doc-header text-center">
                    <h1 class="doc-title"><span aria-hidden="true" class="icon icon_genius"></span> Bienvenue </h1>
                </div><!--//doc-header-->
                <div id="showcase" class="doc-body row">
                    <div class="doc-content col-md-9 col-12 order-1">
                        <div class="content-inner">
                            <section id="premium-themes" class="doc-section">
                                <div class="jumbotron">
                                    <h1> Plateform de partage de connaissance <i class="fas fa-heart"></i> </h1>
                                    <p> Cette page contient tous vos projets chargés sur la plateforme. Tout en bas ce trouve les projets d'autres élèves</p>
                                    <a class="btn btn-blue btn-cta" href="{{route('projet.create')}}"> Ajoutez un projet</a>
                                </div><!--//jumbotron-->
                                <h2 id="theme-start" class="section-title"> Vos Projets </h2>
                                <div class="section-block">
                                    <div class="row">
                                        @foreach ($projets as $projet)

                                            <div class="col-md-4 col-12 mb-3">
                                                <div class="theme-card">
                                                    <a href="https://themes.3rdwavemedia.com/bootstrap-templates/resume/instance-bootstrap-portfolio-theme-for-developers/" target="_blank"><img class="img-fluid" src="../images/demo/theme-instance.png" alt="screenshot" /></a>
                                                    <div class="card-block">
                                                        <h4 class="card-title"><a href="{{route('projet.show',$projet)}}"> {{$projet->nom}}</a></h4>
                                                        <p class="card-text"> {{$projet->description}}<a class="mask" href="https://themes.3rdwavemedia.com/bootstrap-templates/resume/instance-bootstrap-portfolio-theme-for-developers/" target="_blank"><i class="icon fa fa-search-plus"></i></a></p>
                                                        @can('delete', $projet)
                                                            <button type="button" onclick="event.preventDefault(); document.getElementById('delete-{{$projet->id}}').submit();" class="btn-trash">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                            </svg>
                                                            </button>

                                                            <form id="delete-{{$projet->id}}" action="{{route('projet.destroy',$projet)}}" style="display:none;" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                            </form> 
                                                        @endcan

                                                        @can('update', $projet)
                                                        <a href="{{route('projet.edit',$projet->id)}}" type="button" class="btn-pen">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                                </svg>
                                                            </a>
                                                        @endcan
                                                    </div><!--//card-block-->
                                                
                                                </div><!--//theme-card-->
                                            </div>
                                        @endforeach
                                        {{-- <div class="col-md-4 col-12 mb-3">
                                            <div class="theme-card">
                                                <a href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/velocity-bootstrap-theme-for-startup-products/" target="_blank"><img class="img-fluid" src="../images/demo/theme-velocity.png" alt="screenshot" /></a>
                                                <div class="card-block">
                                                    <h4 class="card-title">Velocity</h4>
                                                    <p class="card-text">DESIGN SITE WEB</p>
                                                      <button type="button" class="btn-trash">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                    </svg>
                                                      </button>
                                                      <button type="button" class="btn-pen">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                            </svg>
                                                    </button>
                                                </div><!--//card-block-->
                                                <a class="mask" href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/velocity-bootstrap-theme-for-startup-products/" target="_blank"><i class="icon fa fa-search-plus"></i></a>
                                            </div><!--//theme-card-->
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <div class="theme-card">
                                                <a href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/startupkit-bootstrap-theme-for-saas-startups/" target="_blank"><img class="img-fluid" src="../images/demo/theme-startupkit.png" alt="screenshot" /></a>
                                                <div class="card-block">
                                                    <h4 class="card-title">Startup Kit</h4>
                                                    <p class="card-text">Designe pour Startups</p>
                                                     <button type="button" class="btn-trash">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                    </svg>
                                                      </button>
                                                      <button type="button" class="btn-pen">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                            </svg>
                                                    </button>
                                                    
                                                </div><!--//card-block-->
                                                <a class="mask" href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/startupkit-bootstrap-theme-for-saas-startups/" target="_blank"><i class="icon fa fa-search-plus"></i></a>
                                            </div><!--//theme-card-->
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <div class="theme-card">
                                                <a href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/tempo-bootstrap-theme-for-startups/" target="_blank"><img class="img-fluid" src="../images/demo/theme-tempo.png" alt="screenshot" /></a>
                                                <div class="card-block">
                                                    <h4 class="card-title">Tempo</h4>
                                                    <p class="card-text">projet réalise en C</p>
                                                      <button type="button" class="btn-trash">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                    </svg>
                                                      </button>
                                                      <button type="button" class="btn-pen">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                            </svg>
                                                    </button>
                                                </div><!--//card-block-->

                                                <a class="mask" href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/tempo-bootstrap-theme-for-startups/" target="_blank"><i class="icon fa fa-search-plus"></i></a>
                                            </div><!--//theme-card-->
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <div class="theme-card">
                                                <a href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/devstudio-bootstrap-theme-for-web-development-agencies-and-developers/" target="_blank"><img class="img-fluid" src="../images/demo/theme-devstudio.png" alt="screenshot" /></a>
                                                <div class="card-block">
                                                    <h4 class="card-title">DevStudio</h4>
                                                    <p class="card-text">Site Web d'une agence de recrutement </p>
                                                       <button type="button" class="btn-trash">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                    </svg>
                                                      </button>
                                                      <button type="button" class="btn-pen">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                            </svg>
                                                    </button>
                                                </div><!--//card-block-->
                                                <a class="mask" href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/devstudio-bootstrap-theme-for-web-development-agencies-and-developers/" target="_blank"><i class="icon fa fa-search-plus"></i></a>
                                            </div><!--//theme-card-->
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <div class="theme-card">
                                                <a href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/atom-bootstrap-theme-for-mobile-app-startups/" target="_blank"><img class="img-fluid" src="../images/demo/theme-atom.png" alt="screenshot" /></a>
                                                <div class="card-block">
                                                    <h4 class="card-title">Atom</h4>
                                                    <p class="card-text">development d'un IDE</p>
                                                    <button type="button" class="btn-trash">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                    </svg>
                                                      </button>
                                                      <button type="button" class="btn-pen">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                            </svg>
                                                    </button>
                                                </div><!--//card-block-->
                                                <a class="mask" href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/atom-bootstrap-theme-for-mobile-app-startups/" target="_blank"><i class="icon fa fa-search-plus"></i></a>
                                            </div><!--//theme-card-->
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <div class="theme-card">
                                                <a href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/delta-bootstrap-theme-for-mobile-apps/" target="_blank"><img class="img-fluid" src="../images/demo/theme-delta.png" alt="screenshot" /></a>
                                                <div class="card-block">
                                                    <h4 class="card-title">Delta</h4>
                                                    <p class="card-text">Application Mobile </p>
                                                    <button type="button" class="btn-trash">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                    </svg>
                                                      </button>
                                                      <button type="button" class="btn-pen">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                            </svg>
                                                    </button>
                                                </div><!--//card-block-->
                                                <a class="mask" href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/delta-bootstrap-theme-for-mobile-apps/" target="_blank"><i class="icon fa fa-search-plus"></i></a>
                                            </div><!--//theme-card-->
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <div class="theme-card">
                                                <a href="https://themes.3rdwavemedia.com/bootstrap-templates/resume/sphere-bootstrap-theme-for-resume-cv-portfolio/" target="_blank"><img class="img-fluid" src="../images/demo/theme-sphere.png" alt="screenshot" /></a>
                                                <div class="card-block">
                                                    <h4 class="card-title">Sphere</h4>
                                                    <p class="card-text">Theme pour site web</p>
                                                    <button type="button" class="btn-trash">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                    </svg>
                                                      </button>
                                                      <button type="button" class="btn-pen">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                            </svg>
                                                    </button>
                                                </div><!--//card-block-->
                                                <a class="mask" href="https://themes.3rdwavemedia.com/bootstrap-templates/resume/sphere-bootstrap-theme-for-resume-cv-portfolio/" target="_blank"><i class="icon fa fa-search-plus"></i></a>
                                            </div><!--//theme-card-->
                                        </div>
                                         <div class="col-md-4 col-12 mb-3">
                                            <div class="theme-card">
                                                <a href="https://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-template-for-bands-and-musicians-decibel/" target="_blank"><img class="img-fluid" src="../images/demo/theme-decibel.png" alt="screenshot" /></a>
                                                <div class="card-block">
                                                    <h4 class="card-title">Decibel</h4>
                                                    <p class="card-text"> exemple de logo</p>
                                                    <button type="button" class="btn-trash">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                    </svg>
                                                      </button>
                                                      <button type="button" class="btn-pen">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                            </svg>
                                                    </button>
                                                </div><!--//card-block-->
                                                <a class="mask" href="https://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-template-for-bands-and-musicians-decibel/" target="_blank"><i class="icon fa fa-search-plus"></i></a>
                                            </div><!--//theme-card-->
                                        </div>
                                        
                                        <div class="col-md-4 col-12 mb-3">
                                            <div class="theme-card">
                                                <a href="https://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-template-for-crowdfunding-campaigns-onboard/" target="_blank"><img class="img-fluid" src="../images/demo/theme-onboard.png" alt="screenshot" /></a>
                                                <div class="card-block">
                                                    <h4 class="card-title">Onboard</h4>
                                                    <p class="card-text">projet voltaire</p>
                                                    <button type="button" class="btn-trash">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                    </svg>
                                                      </button>
                                                      <button type="button" class="btn-pen">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                            </svg>
                                                    </button>
                                                </div><!--//card-block-->
                                                <a class="mask" href="https://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-template-for-crowdfunding-campaigns-onboard/" target="_blank"><i class="icon fa fa-search-plus"></i></a>
                                            </div><!--//theme-card-->
                                        </div>
                                        
                                        <div class="col-md-4 col-12 mb-3">
                                            <div class="theme-card">
                                                <a href="https://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-for-restaurants-epicure/" target="_blank"><img class="img-fluid" src="../images/demo/theme-epicure.png" alt="screenshot" /></a>
                                                <div class="card-block">
                                                    <h4 class="card-title">Epicure</h4>
                                                    <p class="card-text">Design pour Restaurants</p>
                                                    <button type="button" class="btn-trash">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                    </svg>
                                                      </button>
                                                      <button type="button" class="btn-pen">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                            </svg>
                                                    </button>
                                                </div><!--//card-block-->
                                                <a class="mask" href="https://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-for-restaurants-epicure/" target="_blank"><i class="icon fa fa-search-plus"></i></a>
                                            </div><!--//theme-card-->
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <div class="theme-card">
                                                <a href="https://themes.3rdwavemedia.com/website-templates/responsive-wedding-invitation-template-matrimony/" target="_blank"><img class="img-fluid" src="../images/demo/theme-matrimony.png" alt="screenshot" /></a>
                                                <div class="card-block">
                                                    <h4 class="card-title">Matrimony</h4>
                                                    <p class="card-text">Design de mariage</p>
                                                    <button type="button" class="btn-trash">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                    </svg>
                                                      </button>
                                                      <button type="button" class="btn-pen">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                            </svg>
                                                    </button>
                                                </div><!--//card-block-->
                                                <a class="mask" href="https://themes.3rdwavemedia.com/website-templates/responsive-wedding-invitation-template-matrimony/" target="_blank"><i class="icon fa fa-search-plus"></i></a>
                                            </div><!--//theme-card-->
                                        </div>     --}}
                                    </div><!--//row-->
                                </div><!--//section-block-->
                            </section><!--//doc-section-->
{{--                             
                            <section id="free-themes" class="doc-section">
                                <h2 class="section-title"> Favoris </h2>
                                <div class="section-block">
                                    <div class="row">
	                                    <div class="col-md-4 col-12 mb-3">
                                            <div class="theme-card">
                                                <a href="https://themes.3rdwavemedia.com/bootstrap-templates/resume/free-bootstrap4-resume-cv-template-for-developers-pillar/" target="_blank"><img class="img-fluid" src="../images/demo/theme-pillar.png" alt="screenshot" /></a>
                                                <div class="card-block">
                                                    <h4 class="card-title">Pillar</h4>
                                                    <p class="card-text">Resume/CV </p>
                                                    <button type="button" class="btn-trash">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                    </svg>
                                                      </button>
                                                      <button type="button" class="btn-pen">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                            </svg>
                                                    </button>
                                                </div><!--//card-block-->
                                                <a class="mask" href="https://themes.3rdwavemedia.com/bootstrap-templates/resume/free-bootstrap4-resume-cv-template-for-developers-pillar/" target="_blank"><i class="icon fa fa-search-plus"></i></a>
                                            </div><!--//theme-card-->
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <div class="theme-card">
                                                <a href="https://themes.3rdwavemedia.com/bootstrap-templates/resume/free-bootstrap-theme-for-web-developers/" target="_blank"><img class="img-fluid" src="../images/demo/theme-developer.png" alt="screenshot" /></a>
                                                <div class="card-block">
                                                    <h4 class="card-title">Developer</h4>
                                                    <p class="card-text">Portfolio pour le projet X</p>
                                                    <button type="button" class="btn-trash">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                    </svg>
                                                      </button>
                                                      <button type="button" class="btn-pen">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                            </svg>
                                                    </button>
                                                </div><!--//card-block-->
                                                <a class="mask" href="https://themes.3rdwavemedia.com/bootstrap-templates/resume/free-bootstrap-theme-for-web-developers/" target="_blank"><i class="icon fa fa-search-plus"></i></a>
                                            </div><!--//theme-card-->
                                        </div>
                                        
                                        <div class="col-md-4 col-12 mb-3">
                                            <div class="theme-card">
                                                <a href="https://themes.3rdwavemedia.com/bootstrap-templates/resume/orbit-free-resume-cv-bootstrap-theme-for-developers/" target="_blank"><img class="img-fluid" src="../images/demo/theme-orbit.png" alt="screenshot" /></a>
                                                <div class="card-block">
                                                    <h4 class="card-title">Orbit</h4>
                                                    <p class="card-text">Resume/CV Pour poste X</p>
                                                    <button type="button" class="btn-trash">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                    </svg>
                                                      </button>
                                                      <button type="button" class="btn-pen">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                            </svg>
                                                    </button>
                                                </div><!--//card-block-->
                                                <a class="mask" href="https://themes.3rdwavemedia.com/bootstrap-templates/resume/orbit-free-resume-cv-bootstrap-theme-for-developers/" target="_blank"><i class="icon fa fa-search-plus"></i></a>
                                            </div><!--//theme-card-->
                                        </div>
                                    </div><!--//row-->
                                </div><!--//section-block-->
                            </section><!--//doc-section--> --}}
                                                        
                        </div><!--//content-inner-->
                    </div><!--//doc-content-->
                    <div class="doc-sidebar col-md-3 col-12 order-0 d-none d-md-flex">
                        <div id="doc-nav" class="doc-nav">
                            <nav id="doc-menu" class="nav doc-menu flex-column sticky">
                                <a class="nav-link scrollto" href="#premium-themes"> Vos Projets</a>
                                <a class="nav-link scrollto" href="#free-themes"> Favoris </a> 
                            </nav><!--//doc-menu-->
                        </div>
                    </div><!--//doc-sidebar-->
                </div><!--//doc-body-->              
            </div><!--//container-->
        </div><!--//doc-wrapper-->
        
      
    <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; DropDocs 2021</p></div>
        </footer>
    
    <!-- Main Javascript -->          
    <script type="text/javascript" src="../plugins/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../plugins/prism/prism.js"></script>    
    <script type="text/javascript" src="../plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script>      
    <script type="text/javascript" src="../plugins/stickyfill/dist/stickyfill.min.js"></script>                                                             
    <script type="text/javascript" src="../js/main.js"></script> 
    
<!-- Searching -->
    <script>
    $(document).ready(function () {
        $('#search').keyup(function () {
            var data = $(this).val();
            if (data != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('projets.list') }}",
                    method: "POST",
                    data: {data: data, _token: _token},
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

