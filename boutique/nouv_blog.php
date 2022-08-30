<?php include_once 'header.php';
$modifier = false;

?>
<?php 
if (isset($_GET['edit'])) {
$requette =$connect->query("SELECT * FROM  blog WHERE idblog='".$_GET['edit']."'");
$reponse = mysqli_fetch_assoc($requette);

$modifier = true;
}?>

    <link rel="stylesheet" href="materializeForm.css">
   


<body>
                   


            <div class="container">
                <div class="col m6">
                <form action="../php_action/nouv_blog.php" method="POST" enctype="multipart/form-data">
                <h1 class="title">nouveau post</h1>
			  
        <div class="">
				<label class="input-field" for="deignation" style="color:black">titre</label>
				
				  <input class="input-field" name="titre" value="<?= $reponse['titre'] ?? ' '?>" type="text" id="titre" autocomplete="off" required>
				
			  </div>
              
        
              <div class="">
				<label class="input-field" for="description"  style="color:black">Description</label>
				
				  <input class="input-field" name="description" value="<?= $reponse['description']??''?>" type="text" id="description" autocomplete="off" required>
				
			  </div>
              

              <div class="">
				<label class="input-field" for="image"  style="color:black">Photo</label>
				
				  <input class="input-field" name="image"  type="file" >
				  <input class="input-field" name="photo" value="<?= $reponse['image']??''?>" type="hidden" >
				<input type="hidden" name="boutique" value="<?= $_SESSION['idboutique']?>">
			  </div><br>
              <div class="">
				  <?php if ($modifier == false):?>
				  <input class="input-field" name="valider" type="submit" value="Enregister">
				  <?php else :?>
            <input class="input-field" name="edit" type="hidden" value="<?= $_GET['edit'] ?>">
            <input class="input-field" name="modifier" type="submit" value="Modifier">
         <?php endif?>
				
			  </div>

			</form>

                </div>
            </div>

        </div>
</body>

