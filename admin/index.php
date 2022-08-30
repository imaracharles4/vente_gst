

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>ADMINISTRATION</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
 
</head>

<body>

	<!-- Splashscreen -->
	<div class="splashscreen">
		<div class="preloader">
			<span class="preloader__text">Loading</span>
		</div>
	</div>
	<!-- Splashscreen -->
     <form action="../php_action/login_user.php" method="post">               
	<div class="container col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">       
        <div class="panel panel-primary margitop">
        
           <div class="panel-heading">Se Connecter !</div>
           <div class="panel-body">
                     <div class="form-group">
                     <label for="login">Nom:</label>
                     <input type="text" name="login"placeholder="Login:" autocomplete="off" class="form-control"/>
                     <label for="pwd">Mot de passe:</label>
                     <input type="password" name="password"  placeholder= "Mot de passe: " class="form-control"/>
                </div>
                <a >
                   <button type="submit" name="valider"  class="btn btn-warning"><span class="glyphicon glyphicon-log-in"></span> Se Connecter</button> 
                   </a>
               </form>
           </div>
        </div>
       </div>
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<!-- jQuery local  -->
	<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-2.2.4.min.js"><\/script>')</script>
	<script src="assets/js/functions-min.js"></script>
	
</body>
</html>
