<?php
session_start();
if (isset($_POST['commander']) && !empty($_SESSION['idclient'])) {

include('../constant/connect.php');
include ('../php_action/m_panier.php');
include '../php_action/Push.php';
 
$push = new Push($connect);

$panier= new panier($connect);

 foreach ($_SESSION['panier'] as $key => $value) {
    if ($_SESSION['panier'][$key]) {
        $total = $panier->total_($key);
        $bout = $key;
        $client = $_SESSION['idclient'];
        $req="INSERT INTO commande (date,total,idClient,idBoutique) VALUES (now(),'$total','$client','$bout')";
        $resulta=mysqli_query($connect,$req);
      
        $idcom = $connect->insert_id;
        			
        $push->saveNotification($client, $bout, 3, $idcom);
				
    foreach ($_SESSION['panier'][$key] as $cle => $valeur) {
        if ($cle) {
            $resul= $connect->query('SELECT * FROM articles WHERE idArticles ='.$cle.'  ');
            $resultat = mysqli_fetch_assoc($resul);
             
            $qte=$_SESSION['panier'][$resultat['boutique']][$resultat['idArticles']];
            $idart=$resultat['idArticles'];
            $pu=$resultat['prixUnitaire'];
            
            $rep="INSERT INTO panier (quantite,prix,commandes_idcommande,Articles_idArticles) VALUES ('$qte','$pu','$idcom','$idart')";
            $resultat=mysqli_query($connect,$rep);
                         
        }
    }   
      
    }
    
     
 }
 echo "
        <link href='../css/popup_style.css' rel='stylesheet'>
        <div class='popup popup--icon -success js_success-popup popup--visible'>
        <div class='popup__background'></div>
        <div class='popup__content'>
        <h3 class='popup__content__title'>
            Success 
        </h1>
        <p>vatre commande a été envoyer avec succès</p>
        <p>
        
        <script>setTimeout(\"location.href = '../cart.php';\",1500);</script>
        </p>
        </div>
        </div>
        ";
 $panier->clear();

}elseif (empty($_SESSION['idclient'])) {
    echo "
			<link href='../css/popup_style.css' rel='stylesheet'>
			<div class='popup popup--icon -error js_error-popup popup--visible'>
			<div class='popup__background'></div>
			<div class='popup__content'>
			  <h3 class='popup__content__title'>
				Error 
			  </h1>
			  <p>veillez vous connecter ou créer un compte pour pour envoyer votre commande</p>
			  <p>
				<a href='../login.php'><button class='button button--error' data-for='js_error-popup'>Fermer</button></a>
			  </p>
			</div>
			</div>";
}