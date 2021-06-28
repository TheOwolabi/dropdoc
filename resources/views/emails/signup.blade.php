<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenue sur Dropdoc</title>
</head>
<body>
    Salutations {{$email_data['firstname']}}, <br>
    Nous sommes heureux de te compter parmis nous ! 
   <p>
       Merci de vérifier ton compte en cliquant sur ce <a href="http://localhost/dropdoc/public/verify?code={{$email_data['verification_code']}}">lien</a> 
    </p> 
</body>
</html>