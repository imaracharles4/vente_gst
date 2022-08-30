<?php 
session_start();
if ($_SESSION['idboutique']) {
    require("../constant/connect.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>Administration</title>
    <link rel="stylesheet" href="../boutique/style.css">
    <link rel="stylesheet" href="../boutique/modal.css">
    <script type="text/javascript" src="../boutique/assets/js/scriptpopup.js"></script>
    <script type="text/javascript" src="../boutique/assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="../boutique/assets/js/jquery.js"></script>

    <link rel="stylesheet" href="../boutique/assets/css/line-awesome.min.css">
</head>
<body>
    <input type="checkbox" name="" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span><span>Gst_sales</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="boutique.php" class="active"><span class="las la-igloo"></span><span>Acceuil</span></a>
                </li>
                <li>
                    <a href="boutique.php"><span class="las la-clipboard-list"></span><span>Boutique</span></a>
                </li>
                <li>
                    <a href="grande_categorie.php"><span class="las la-receipt"></span><span>Grande Categorie</span></a>
                </li>
                <li>
                    <a href="petite_categorie.php"><span class="las la-receipt"></span><span>Petite Categorie</span></a>
                </li>
            </ul>
        </div>        
    </div>

    <div class="main-content">
           <header>
               <h2>
                   <label for="nav-toggle">
                       <span class="las la-bars"></span>
                       
                   </label>
                   Administration
               </h2>
               <!-- <div class="search-wrapper">
                   <span class="las la-search"></span>
                   <input type="search" placeholder="search here">
               </div> -->
               <div class="user-wrapper">
                    <!-- <img src="10.jpg" width="40px" height="40px" alt="" srcset=""> -->
                    <div>
                        <h4><?= $_SESSION['nom']?></h4>
                        <small>cles</small>
                    </div>
               </div>               
           </header>
           <!-- <?php $requete = "SELECT * FROM devis WHERE statut = 0";
           $reponses = mysqli_query($liaison, $requete); 

          $count = mysqli_num_rows($reponses);?> -->
           <main>
              
              
              
           <?php 	
}else {
    header('location: ../account.php');
 } ?>      	

  <style>
                   
                   .modal-dialog.large {
                       width: 80% !important;
                       max-width: unset;
                   }
                   .modal-dialog.mid-large {
                       width: 50% !important;
                       max-width: unset;
                   }
                   @media (max-width:720px){
                       
                       .modal-dialog.large {
                           width: 100% !important;
                           max-width: unset;
                       }
                       .modal-dialog.mid-large {
                           width: 100% !important;
                           max-width: unset;
                       }  
                   
                   }
           
               </style>
                          <div class="modal fade" id="uni_modal" role='dialog' data-bs-backdrop="static" data-bs-keyboard="true">
                   <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
                   <div class="modal-content rounded-0">
                       <div class="modal-header py-2">
                       <h5 class="modal-title"></h5>
                   </div>
                   <div class="modal-body">
                   </div>
                   <div class="modal-footer py-1">
                       <button type="button" class="btn btn-sm rounded-0 btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Enregistrer</button>
                       <button type="button" class="btn btn-sm rounded-0 btn-secondary" data-bs-dismiss="modal">Fermer</button>
                   </div>
                   </div>
                   </div>
               </div>
               <div class="modal fade" id="uni_modal_secondary" role='dialog' data-bs-backdrop="static" data-bs-keyboard="true">
                   <div class="modal-dialog modal-md modal-dialog-centered  rounded-0" role="document">
                   <div class="modal-content rounded-0">
                       <div class="modal-header py-2">
                       <h5 class="modal-title"></h5>
                   </div>
                   <div class="modal-body">
                   </div>
                   <div class="modal-footer py-1">
                       <button type="button" class="btn btn-sm rounded-0 btn-primary" id='submit' onclick="$('#uni_modal_secondary form').submit()">Enregistrer</button>
                       <button type="button" class="btn btn-sm rounded-0 btn-secondary" data-bs-dismiss="modal">Fermer</button>
                   </div>
                   </div>
                   </div>
               </div>
               <div class="modal fade" id="confirm_modal" role='dialog'>
                   <div class="modal-dialog modal-md modal-dialog-centered  rounded-0" role="document">
                   <div class="modal-content rounded-0 rounded-0">
                       <div class="modal-header py-2">
                       <h5 class="modal-title">Confirmation</h5>
                   </div>
                   <div class="modal-body">
                       <div id="delete_content"></div>
                   </div>
                   <div class="modal-footer py-1">
                       <button type="button" class="btn btn-primary btn-sm rounded-0" id='confirm' onclick="">Continuer</button>
                       <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Fermer</button>
                   </div>
                   </div>
                   </div>
               </div>