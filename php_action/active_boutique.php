<?php 
    include('../constant/connect.php');

    $iduser=$_POST['id'];
    $etat=$_POST['val'];
         if ($etat==1){
         $etat=2;
          } else {
             $etat=1;
         }

        $req="UPDATE boutiques SET statut='$etat' WHERE idboutique='$iduser'";

        $resultat=mysqli_query($connect,$req);

        if ($resultat)
        echo 1;
        else
        echo 0;
?>