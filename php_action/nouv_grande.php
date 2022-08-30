<?php
include '../constant/connect.php';
            if (isset($_POST['valider'])) {
               
                $designation=mysqli_real_escape_string($connect,$_POST['designation']);
                
                             
                    $requette="INSERT INTO grande_categorie (id_categorie,designation) VALUES (default,'$designation')";

                    $resultat=mysqli_query($connect,$requette);

                    if ($resultat) {
                echo "<meta http-equiv='refresh' content='0; URL=../admin/nouv_grande.php'>";
                echo "<script type='text/javascript'>alert('valider');</script>";
                
                    }
                    }

                    


?>
 <?php
            if (isset($_POST['modifier'])) {
              
                   
                $designation=mysqli_real_escape_string($connect,$_POST['designation']);
                
                $description=mysqli_real_escape_string($connect,$_POST['description']);
               
                $boutique=$_POST['boutique'];
                $image = $_FILES['image']['name'];
                $target = "../images/home/".basename($image);
                $upload = move_uploaded_file($_FILES['image']['tmp_name'], $target);
                 
                if ($image =="") {
                    $image = $_POST['photo'];
                    $requette="UPDATE blog SET designation = '$designation',description = '$description',image = '$image' WHERE idblog = '".$_POST['edit']."'";

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
                    $requette="UPDATE blog SET designation = '$designation',description = '$description',image = '$image' WHERE idblog = '".$_POST['edit']."'";
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