<link href="../css/popup_style.css" rel="stylesheet">
<?php
 include('../constant/connect.php');
 session_start();
if(isset($_POST['enregistrer'])) {    

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$numero = $_POST['numero'];
$password = $_POST['password'];


    $mainSql = "INSERT INTO clients (nom, prenom, numero, pwd) VALUES ('$nom', '$prenom', '$numero', '$password')";
    $mainResult = $connect->query($mainSql);

    if($mainResult) {
     
      $user_id = $connect->insert_id;

      // set session
       $_SESSION['idclient'] = $user_id;
      ?>

    

       <div class="popup popup--icon -success js_success-popup popup--visible">
<div class="popup__background"></div>
<div class="popup__content">
  <h3 class="popup__content__title">
    Success 
  </h1>
  <p>L'enregistrement a réussit</p>
  <p>
   
   <?php echo "<script>setTimeout(\"location.href = '../index.php';\",1500);</script>"; ?>
  </p>
</div>
</div>
   <?php  }  
    else{
      ?>


      <div class="popup popup--icon -error js_error-popup popup--visible">
<div class="popup__background"></div>
<div class="popup__content">
  <h3 class="popup__content__title">
    Error 
  </h1>
  <p>Echec d'enregistrement</p>
  <p>
    <a href="../login.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
  </p>
</div>
</div>
     
    <?php } 
  } ?> 
      

