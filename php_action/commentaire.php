<?php
 include('../constant/connect.php');
 
if(isset($_POST['enregistrer'])) {    

$idblog = $_POST['idblog'];
$nom = $_POST['nom'];
$numero = $_POST['numero'];
$message = $_POST['message'];


    $mainSql = "INSERT INTO commentaires (idblog,nom, numero, commentaire) VALUES ('$idblog','$nom', '$numero', '$message')";
    $mainResult = $connect->query($mainSql);

    if($mainResult) {     
        echo "<script>setTimeout(\"location.href = '../blog-single.php?id=$idblog';\",1500);</script>";
  }  
    else{
        echo "<script>setTimeout(\"location.href = '../blog-single.php?id=$idblog';\",1500);</script>";
      } 
  } ?> 
      

