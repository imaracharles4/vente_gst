<?php
include '../constant/connect.php';
            if (isset($_POST['valider'])) {
               
                $designation=mysqli_real_escape_string($connect,$_POST['designation']);
                
                $prixU=mysqli_real_escape_string($connect,$_POST['prixU']);
                $quantite=mysqli_real_escape_string($connect,$_POST['quantite']);
                $description=mysqli_real_escape_string($connect,$_POST['description']);
                $categorie=$_POST['categorie'];
                $boutique=$_POST['boutique'];
                $image = $_FILES['image']['name'];
                $target = "../images/home/".basename($image);
                $upload = move_uploaded_file($_FILES['image']['tmp_name'], $target);
                if ($upload) {
                
                    $requette="INSERT INTO articles (desiArticle,prixUnitaire,quantiteStock,descriptionArticle,categorie,photoArticle,boutique) VALUES ('$designation', '$prixU','$quantite','$description','$categorie','$image','$boutique')";

                    $resultat=mysqli_query($connect,$requette);

                    if ($resultat) {
                echo "<meta http-equiv='refresh' content='0; URL=../boutique/nouv_produit.php'>";
                echo "<script type='text/javascript'>alert('valider');</script>";
                
                    }
                    }else{
                      $msg = "Failed to upload image";
                      echo $msg;exit;
                    }

                    
            }

?>
 <?php
            if (isset($_POST['modifier'])) {
              
                $designation=mysqli_real_escape_string($connect,$_POST['designation']);
                
                $prixU=mysqli_real_escape_string($connect,$_POST['prixU']);
                $quantite=mysqli_real_escape_string($connect,$_POST['quantite']);
                $description=mysqli_real_escape_string($connect,$_POST['description']);
                $categorie=$_POST['categorie'];
                $boutique=$_POST['boutique'];
                $image = $_FILES['image']['name'];
                $target = "../images/home/".basename($image);
                $upload = move_uploaded_file($_FILES['image']['tmp_name'], $target);
                 
                if ($image =="") {
                    $image = $_POST['photo'];
                    $requette="UPDATE articles SET desiArticle = '$designation',prixUnitaire = '$prixU',quantiteStock = '$quantite',descriptionArticle = '$description',categorie = '$categorie',photoArticle = '$image',boutique = '$boutique' WHERE idArticles = '".$_POST['edit']."'";

                    $resultat=mysqli_query($connect,$requette);
                } else {
                    $requette="UPDATE articles SET desiArticle = '$designation',prixUnitaire = '$prixU',quantiteStock = '$quantite',descriptionArticle = '$description',categorie = '$categorie',photoArticle = '$image',boutique = '$boutique' WHERE idArticles = '".$_POST['edit']."'";

                    $resultat=mysqli_query($connect,$requette);
                }
                
                    

                   
               
        }

?>