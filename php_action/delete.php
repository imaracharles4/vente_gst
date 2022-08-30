<?php require("../constant/connect.php") ;

   if (isset($_GET['delete'])) {
            $requette="DELETE FROM articles WHERE idArticles ='".$_GET['delete']."' ";

            if (mysqli_query($connect,$requette)) {
                echo "<meta http-equiv='refresh' content='0; URL=../boutique/produit.php'>";
                echo "<script type='text/javascript'>alert('valider');</script>";
            }else {
                echo "<meta http-equiv='refresh' content='0; URL=../boutique/produit.php'>";
                echo "<script type='text/javascript'>alert('echec ');</script>";
            }
   }

   if (isset($_GET['blog'])) {
    $requette="DELETE FROM blog WHERE idblog ='".$_GET['blog']."' ";

    if (mysqli_query($connect,$requette)) {
        echo "<meta http-equiv='refresh' content='0; URL=../boutique/blog.php'>";
        echo "<script type='text/javascript'>alert('valider');</script>";
    }else {
        echo "<meta http-equiv='refresh' content='0; URL=../boutique/blog.php'>";
        echo "<script type='text/javascript'>alert('echec ');</script>";
    }
}

           

?>