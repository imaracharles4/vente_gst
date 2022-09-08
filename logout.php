<?php  
session_start(); //to ensure you are using same session
if (!empty($_SESSION['panier'])) {
  echo "
			<link href='css/popup_style.css' rel='stylesheet'>
			<div class='popup popup--icon -error js_error-popup popup--visible'>
			<div class='popup__background'></div>
			<div class='popup__content'>
			  <h3 class='popup__content__title'>
				Error 
			  </h1>
			  <p>votre panier contient encore des élément voulez vous continuer la déconnexion?</p>
			  <p>
				<a href='constant/logout.php'><button class='button button--success' data-for='js_error-popup'>Déconecter</button></a>
				<a href='cart.php'><button class='button button--error' data-for='js_error-popup'>Annuler</button></a>
			  </p>
			</div>
			</div>";
} else {
    session_unset();
  session_destroy(); //destroy the session
 echo " <script>
        window.location='login.php';
       </script>";
}
 
?>

<?php
//to redirect back to "index.php" after logging out
  exit;
?>
