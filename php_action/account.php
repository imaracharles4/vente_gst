<link href="../css/popup_style.css" rel="stylesheet">
<?php
 include('../constant/connect.php');
  include 'm_client.php';
 
 $client= new Client($connect); 
 session_start();
if(isset($_POST['valider'])) {    

$login = $_POST['login'];
$password = $_POST['password'];

if(empty($login) || empty($password)) {
  if($login == "") {
    $errors[] = "le login est requis";
  } 

  if($password == "") {
    $errors[] = "le Password est requis";
  }
} else {
  $sql = "SELECT * FROM boutiques WHERE boutique = '$login'";
  $result = $connect->query($sql);

  if($result->num_rows >= 1) {
    $password = $password;
    // exists
    $mainSql = "SELECT * FROM boutiques WHERE boutique = '$login' AND motpass = '$password'";
    $mainResult = $connect->query($mainSql);

    if($mainResult->num_rows == 1) {
      $value = $mainResult->fetch_assoc();
      $user_id = $value['idboutique'];

      // set session
       $_SESSION['idboutique'] = $user_id;
       $_SESSION['boutique'] = $value['boutique'];
       $_SESSION['nom'] = $client->get_vendeur($value['idClient'])->nom." ".$client->get_vendeur($value['idClient'])->prenom;
      ?>

    

       <div class="popup popup--icon -success js_success-popup popup--visible">
<div class="popup__background"></div>
<div class="popup__content">
  <h3 class="popup__content__title">
    Success 
  </h1>
  <p>la connection a réussit</p>
  <p>
   
   <?php echo "<script>setTimeout(\"location.href = '../boutique';\",1500);</script>"; ?>
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
  <p>le login ou le password est incorrect</p>
  <p>
    <a href="../account.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
  </p>
</div>
</div>
     
    <?php } // /else
  } else { ?> 
      <div class="popup popup--icon -error js_error-popup popup--visible">
<div class="popup__background"></div>
<div class="popup__content">
  <h3 class="popup__content__title">
    Error 
  </h1>
  <p>le login n'existe pas</p>
  <p>
    <a href="../account.php"><button class="button button--error" data-for="js_error-popup">Fermer</button></a>
  </p>
</div>
</div>  
       
  <?php } // /else
} // /else not empty login // password

} // /if $_POST

?>
