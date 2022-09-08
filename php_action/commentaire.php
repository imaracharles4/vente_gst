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
      $id_operation = $connect->insert_id;
			$sqlv="SELECT * from blog  where idblog='$idblog'";
		    $resultv = $connect->query($sqlv);
			$ligne=mysqli_fetch_assoc($resultv);
			$id_to=$ligne['vendeur'];
			
			$requette = "INSERT INTO `notification_client` (`id_notification`, `id_form`, `id_to`, `type_operation`, `id_operation`, `statut`, `date_noti`) VALUES (NULL, '$nom', '$id_to', '3', '$id_operation', '', CURRENT_TIMESTAMP)";
			mysqli_query($connect, $requette);
      echo "<script>setTimeout(\"location.href = '../blog-single.php?id=$idblog';\",1500);</script>";
  }  
    else{
        echo "<script>setTimeout(\"location.href = '../blog-single.php?id=$idblog';\",1500);</script>";
      } 
  } ?> 
      

