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
                    
                    </ul>

                    <form class="d-flex">
                    @if (Route::has('login'))
                         @auth
                      <button class="btn btn-outline-dark" type="submit">
                       <a class="colore" href="/profile">  <i class="bi bi-person-circle me-1"> </i>
                            profile
                            </a>  
                        </button>
                        @else
                        <button class="btn btn-outline-dark" type="submit">
                            <a class="colore" href="/login">  <i class="bi bi-person-circle me-1"> Log in </i> 
                            </a>
                       </button>
                        @if (Route::has('register'))
                        <button class="btn btn-outline-dark" type="submit">
                       <a class="colore" href="/register">  <i class="bi bi-person-circle me-1"> Register </i>
                      
                       </a>
                       </button>
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
                    <img src="../images/demo/upload (4).png" alt="..." />
                        <span aria-hidden="true" class="icon_documents_alt icon"></span>
                        <span class="text-highlight">Bienvenue sur</span><span class="text-bold"> DropDocs</span>
                    </h1>
                </div><!--//branding-->
                <div class="tagline">
                    <p>Votre Plateform Dedié au partage de connaissance</p>
                    <p>Concu<i class="fas fa-heart"></i> Pour les élèves d'EFREI PARIS</p>
                </div><!--//tagline-->
                
	             <div class="main-search-box pt-3 pb-4 d-inline-block">
	                 <form class="form-inline search-form justify-content-center" action="" method="get">
	            
			            <input type="text" placeholder="Enter search terms..." name="search" class="form-control search-input">
			            
			            <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
			            
			        </form>
	             </div>
                 
                <div class="social-container">
	                <!-- Replace with your Github Button -->
	                <div class="github-btn mb-2">
						<a class="github-button" href="https://github.com/xriley/PrettyDocs-Theme" data-size="large" aria-label="Star xriley/PrettyDocs-Theme on GitHub">Star</a>
                        <a class="github-button" href="https://github.com/xriley" data-size="large" aria-label="Follow @xriley on GitHub">Follow @xriley</a>
	                </div>
	                <!-- Replace with your Twitter Button -->
                    <div class="twitter-tweet">
                        <a href="https://twitter.com/3rdwave_themes?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @3rdwave_themes</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div><!--//tweet-->
                    <!-- Replace with your Facebook Button -->
                    <div class="fb-like" data-href="https://themes.3rdwavemedia.com/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>         
                 </div><!--//social-container-->
                 
                
            </div><!--//container-->
        </header><!--//header-->
        
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"> MASK DETECTOR</h5>
                                    <!-- Product price-->
                                    Author : Ulysse
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#"> voir plus ...</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Special Item</h5>
                                    <!-- Product reviews-->
                                    
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through"></span>
                                    
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#"> voir plus ... </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                           
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Sale Item</h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through"></span>
                                  
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#"> voir plus ... </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Popular Item</h5>
                                    <!-- Product reviews-->
                                 
                                    <!-- Product price-->
                                   
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#"> voir plus ... </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                          
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Sale Item</h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through"></span>
                               
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#"> voir plus ... </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Fancy Product</h5>
                                    <!-- Product price-->
                             
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#"> voir plus ... </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                         
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Special Item</h5>
                                    <!-- Product reviews-->
                                   
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through"></span>
                                    
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#"> voir plus ... </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Popular Item</h5>
                                    <!-- Product reviews-->
                                   
                                    
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#"> voir plus ... </a></div>
                            </div>
                        </div>
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
        </div>
    </body>
</html>
