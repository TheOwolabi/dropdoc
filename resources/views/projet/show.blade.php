<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/demo/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">   
<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<script defer src="../fontawesome/js/all.js"></script>	
<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
    <link id="theme-style" rel="stylesheet" href="../css/styles.css">
<!--===============================================================================================-->
</head>
<body>
  
	<div class="limiter">
		<div class="container-login10">
			<div class="wrap-login10">
                    <div class="card-block">
                        <h4 class="card-title">Titre : {{$projet->nom}}</h4>
                           
                           @can('update', $projet)
                            <a href="{{route('projet.edit',$projet->id)}}" class="icon edit"> <i class="flaticon-pencil"></i> </a>
                           @endcan

                           @can('delete', $projet)
                            <a href="" class="icon delete" onclick="event.preventDefault(); document.getElementById('delete-{{$projet->id}}').submit();"> <i class="flaticon-delete"></i> </a>
                    
                            <form id="delete-{{$projet->id}}" action="{{route('projet.destroy',$projet)}}" style="display:none;" method="post">
                            @method('DELETE')
                            @csrf
                            </form> 
                            @endcan
                         
                            <p class="card-text">
                            Filiere : <a href="{{route('filiere.show',$projet->filiere)}}"> {{$projet->filiere->nom}} </a> 
                            </p>
                            <p class="card-text">
                            Autheur : <a href=""><i>{{$projet->user->firstname}}</i></a>  
                            </p>
                            <p class="card-text">  
                                </p>
                            <p class="card-text">
                            Durée : <i> {{$projet->duree}} jours </i>
                            </p>
                         
                     
                 

                    <p class="card-text"> Description du projet :<br> 
                    {{$projet->description ?? '-'}}
                    </p>
                       <!-- <tbody>
                            @foreach ($fichiers as $fichier )
                                @if ($fichier->projet_id == $projet->id) 
                                    <tr>
                                        <td>{{$fichier->nom ?? '-'}}</td>
                                        <td> 
                                            <a href="{{"https://dropstore.s3.us-west-1.amazonaws.com/".$fichier->nom.".".$fichier->extension}}">Telecharger</a>
                                            {{-- <a href="{{route('fichier.delete',$fichier)}}">Supprimer</a> --}}
                                            
                                            @can('delete',$fichier)
                                                <form action="{{route('fichier.delete',$fichier)}}" method="post">
                                                    @csrf
                                                    <button class="btn btn-danger"  type="submit">Supprimer</button>
                                                </form>
                                            @endcan  
                                        </td>
                                    </tr>
                                @endif   
                            @endforeach
                        </tbody>-->
                         <button type="button" class="b btn-trash">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                    </svg>
                                                      </button>
                        <button type="button" class="b btn-pen">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                            </svg>
                                                    </button>
                        <button type="button" class="b btn-dow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"></path>
                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"></path>
                                </svg>
                        </button>
                 </div>
             </div>
            
        </div>
    
    </div> 
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
    <script src="../js/main1.js"></script>

</body>
</html>