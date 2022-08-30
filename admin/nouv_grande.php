<?php include_once 'header.php';
$modifier = false;

?>
<?php 
if (isset($_GET['edit'])) {
$requette =$connect->query("SELECT * FROM  grande_categorie WHERE id_categorie='".$_GET['edit']."'");
$reponse = mysqli_fetch_assoc($requette);

$modifier = true;
}?>

    <link rel="stylesheet" href="../boutique/materializeForm.css">
   


<body>
                   


            <div class="container">
                <div class="col m6">
                <form action="../php_action/nouv_grande.php" method="POST" enctype="multipart/form-data">
                <h1 class="title">nouvelle Grande categorie</h1>


        <div class="">
				<label class="input-field" for="description" style="color:black">Designation</label>
				
				  <input class="input-field" name="designation" value="<?= $reponse['designation'] ?? ' '?>" type="text" id="designation" autocomplete="off" required>
				
			  </div>
            <br>
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

