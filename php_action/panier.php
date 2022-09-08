<?php

 session_start();

 require_once '../constant/connect.php';
 include 'm_panier.php';
 
 $panier= new panier($connect); 
 
 
//  $json = array('error' => true);
if (isset($_POST['add']) AND isset($_POST['id'])) {

 $result= $connect->query("SELECT * FROM articles WHERE idArticles='".$_POST['id']."' ");

 $resultat = mysqli_fetch_assoc($result);
 if(empty($resultat)){
   
    echo "
			<link href='css/popup_style.css' rel='stylesheet'>
			<div class='popup popup--icon -error js_error-popup popup--visible'>
			<div class='popup__background'></div>
			<div class='popup__content'>
			  <h3 class='popup__content__title'>
				Error 
			  </h1>
			  <p>ce produit n'existe pas</p>
			  <p>
              <a href='index.php'><button class='button button--error' data-for='js_error-popup'>Fermer</button></a>
			  </p>
			</div>
			</div>";
}
 else {
	$panier->add($resultat['boutique'],$resultat['idArticles']);
    
    echo 1;
 }
    
}

if (isset($_POST['soustr']) AND isset($_POST['id'])) {

	$result= $connect->query("SELECT * FROM articles WHERE idArticles='".$_POST['id']."' ");
   
	$resultat = mysqli_fetch_assoc($result);
	if(empty($resultat)){
	  
	   echo "
			   <link href='css/popup_style.css' rel='stylesheet'>
			   <div class='popup popup--icon -error js_error-popup popup--visible'>
			   <div class='popup__background'></div>
			   <div class='popup__content'>
				 <h3 class='popup__content__title'>
				   Error 
				 </h1>
				 <p>ce produit n'existe pas</p>
				 <p>
				 <a href='index.php'><button class='button button--error' data-for='js_error-popup'>Fermer</button></a>
				 </p>
			   </div>
			   </div>";
   }else {
	$panier->soustr($resultat['boutique'],$resultat['idArticles']);
	   
	   echo 1;
   }
	
	   
   }
   if (isset($_POST['delete']) AND isset($_POST['id'])) {

	$result= $connect->query("SELECT * FROM articles WHERE idArticles='".$_POST['id']."' ");
   
	$resultat = mysqli_fetch_assoc($result);
	if(empty($resultat)){
	  
	   echo "
			   <link href='css/popup_style.css' rel='stylesheet'>
			   <div class='popup popup--icon -error js_error-popup popup--visible'>
			   <div class='popup__background'></div>
			   <div class='popup__content'>
				 <h3 class='popup__content__title'>
				   Error 
				 </h1>
				 <p>ce produit n'existe pas</p>
				 <p>
				 <a href='index.php'><button class='button button--error' data-for='js_error-popup'>Fermer</button></a>
				 </p>
			   </div>
			   </div>";
   }else {
	$panier->delete($resultat['boutique'],$resultat['idArticles']);
	   
	   echo 1;
   }
	
	   
   }

