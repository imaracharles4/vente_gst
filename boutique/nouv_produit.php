<?php include_once 'header.php';
$modifier = false;

?>
<?php 
if (isset($_GET['edit'])) {
$requette =$connect->query("SELECT * FROM  articles WHERE idArticles='".$_GET['edit']."'");
$reponse = mysqli_fetch_assoc($requette);

$modifier = true;
}?>

    <link rel="stylesheet" href="materializeForm.css">
   


<body>
                   


            <div class="container">
                <div class="col m6">
                <form action="../php_action/nouv_produit.php" method="POST" enctype="multipart/form-data">
                <h1 class="title">nouveau produit</h1>
			  
        <div class="">
				<label class="input-field" for="deignation" style="color:black">Designation</label>
				
				  <input class="input-field" name="designation" value="<?= $reponse['desiArticle'] ?? ' '?>" type="text" id="designation" autocomplete="off" required>
				
			  </div>
              
        
              <div class="">
				<label class="input-field" for="prixU"  style="color:black">Prix unitaire</label>
				
				  <input class="input-field" name="prixU" value="<?= $reponse['prixUnitaire']??''?>" type="text" id="prixU" autocomplete="off" required>
				
			  </div>
              <div class="">
				<label class="input-field" for="quantite"  style="color:black">Quantite</label>
				
				  <input class="input-field" name="quantite" value="<?= $reponse['quantiteStock']??''?>" type="number" id="quantite" autocomplete="off" required>
				
			  </div>
              <div class="">
				<label class="input-field"  style="color:black">Categorie</label>
				
        <select type="text" class="form-control"   name="categorie" >
          <option value="">~~SELECT~~</option>
          <?php 
               $sql = "SELECT * FROM petite_categorie ";
               $result = $connect->query($sql);

               while($row = $result->fetch_array()) {
                $select = " ";
                if($reponse['categorie']==$row[0]){$select = "selected";}
               echo "<option value='".$row[0]."' $select>".$row[1]."</option>";
               } // while
          ?>
        </select>
			  </div>
        <div class="">
				<label class="input-field" for="description" style="color:black">Description</label>
				
				  <input class="input-field" name="description" value="<?= $reponse['descriptionArticle'] ?? ' '?>" type="text" id="designation" autocomplete="off" required>
				
			  </div>
              <div class="">
				<label class="input-field" for="image"  style="color:black">Photo</label>
				
				  <input class="input-field" name="image" value="<?= $reponse['photoArticle']??''?>" type="file" >
				  <input class="input-field" name="photo" value="<?= $reponse['photoArticle']??''?>" type="hidden" >
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

