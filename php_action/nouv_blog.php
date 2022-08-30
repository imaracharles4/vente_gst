<?php
include '../constant/connect.php';
            if (isset($_POST['valider'])) {
               
                $titre=mysqli_real_escape_string($connect,$_POST['titre']);
                
                $description=mysqli_real_escape_string($connect,$_POST['description']);
               
                $boutique=$_POST['boutique'];
                $image = $_FILES['image']['name'];
                $target = "../images/home/".basename($image);
                $upload = move_uploaded_file($_FILES['image']['tmp_name'], $target);
                if ($upload) {
                
                    $requette="INSERT INTO blog (image,titre,description,vendeur) VALUES ('$image','$titre', '$description','$boutique')";

                    $resultat=mysqli_query($connect,$requette);

                    if ($resultat) {
                echo "<meta http-equiv='refresh' content='0; URL=../boutique/nouv_blog.php'>";
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
              
                   
                $titre=mysqli_real_escape_string($connect,$_POST['titre']);
                
                $description=mysqli_real_escape_string($connect,$_POST['description']);
               
                $boutique=$_POST['boutique'];
                $image = $_FILES['image']['name'];
                $target = "../images/home/".basename($image);
                $upload = move_uploaded_file($_FILES['image']['tmp_name'], $target);
                 
                if ($image =="") {
                    $image = $_POST['photo'];
                    $requette="UPDATE blog SET titre = '$titre',description = '$description',image = '$image' WHERE idblog = '".$_POST['edit']."'";

                    $resultat=mysqli_query($connect,$requette);
                    if($resultat)
                    {
                        echo "<meta http-equiv='refresh' content='0; URL=../boutique/blog.php'>";
                        echo "<script type='text/javascript'>alert('valider');</script>";
                        
                    }else {
                        echo "<meta http-equiv='refresh' content='0; URL=../boutique/blog.php'>";
                        echo "<script type='text/javascript'>alert('echec');</script>";
                        
                    }

                } else {
                    $requette="UPDATE blog SET titre = '$titre',description = '$description',image = '$image' WHERE idblog = '".$_POST['edit']."'";
                    $resultat=mysqli_query($connect,$requette);
                    if($resultat)
                    {
                        echo "<meta http-equiv='refresh' content='0; URL=../boutique/blog.php'>";
                        echo "<script type='text/javascript'>alert('valider');</script>";
                        
                    }else {
                        echo "<meta http-equiv='refresh' content='0; URL=../boutique/blog.php'>";
                        echo "<script type='text/javascript'>alert('echec');</script>";
                        
                    }


                }
                
                    

                   
               
        }

?>