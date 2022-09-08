<?php
require 'header.php';
if (isset($_GET['boutique'])){
	$boutique=$_GET['boutique'];
	?>
<?php include 'sidbar.php';


?>
<?php 
		$req=" SELECT * FROM responsable_boutique WHERE idResponsable_Boutique=".$_GET['boutique']." ";
		$res=mysqli_query($cnordinateur,$req);

   $comm="";
  $av="";
  $num="";
  $quar="";
   
?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="pannier.css">
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">accueil</a> <span class="divider">/</span></li>
		<li class="active"> panier</li>
    </ul>
	<?php  if ($res) {  while ($row=mysqli_fetch_assoc($res)) { ?>
	<h3>BOUTIQUE <span class="btn-warning"><?php
		echo $nomb=$row['boutique'];
	}
}
   ?></span><a href="produit.php?boutique=<?php echo $_GET['boutique']   ?>" class=""><i class=""></i>  </a></h3>	
	<hr class="soft"/>
    <?php
	$result= array();
	foreach ($_SESSION['panier'] as $cle => $tab) {
		if($cle == $_GET['boutique']){
		
				$ids=array_keys($_SESSION['panier'][$cle]);

				if (empty($ids)) {
					$result= array();
				}
				else {
					
					$result= $DB->query('SELECT * FROM articles WHERE idArticles IN ('.implode(',',$ids).')  ');
							
			} 
	}	
	}
  
           
                     
    ?> 
	<table class='table table-bordered'>
              <thead>
                <tr>
					<th>Produit</th>
					<th>Description</th>
					<th>Quantité/modifié</th>
					<th>prix unitaire</th>      
					<th>Total</th>
				</tr>
              </thead>
			  <?php
              if (!$result) {
                 
                echo '<h2> votre panier est vide</h2>';
                  }
				  
                 else {
					
					foreach ($result as $key => $value){
						$total=$total= ($value->prixUnitaire *  $_SESSION['panier'][$value->boutique][$value->idArticles]);
         
		 ?>
                       
					<form action='commander.php?boutique=<?php echo $value->boutique ?>&touser=<?php echo $nomb ?>'method='post'>
					<tr>
                  <td> <img width='100' src='images/<?php echo $value->photoArticle; ?>' alt=''/></td>
                  <td><?php echo $value->desiArticle; ?><br/></td>
				  <td>
						<div class='input-append'>
							<input class='span1' style='max-width:54px' type='number' value='<?php echo $qte=($_SESSION['panier'][$value->boutique][$value->idArticles]); ?>' name='quantite' id='appendedInputButtons' size='16' type='text'>
							<a href='soustr.php?id=<?php echo $value->idArticles ?>&boutique=<?php echo $value->boutique ?>' class="addpanier"><button class='btn ' ><i class='icon-minus'></i></button></a><a href='ajout_panier.php?id=<?php echo $value->idArticles ?>&boutique=<?php echo $value->boutique ?>' class="addpanier"><button class='btn'><i class='icon-plus'></i></button></a>
							<a href='del_panier.php?id=<?php echo $value->idArticles; ?>&boutique=<?php echo $value->boutique ?>' class='btn btn-danger'><i class='icon-remove icon-white'></i> </a>				
							<input type='hidden' value='' name='idart'>					
						</div>
				  </td>
                  <td><?php echo number_format($value->prixUnitaire,2,',',' '); ?>$</td>
                  <td><?php echo $total ?>$</td>
				  <input type='hidden' value='' name='totalpanier'>
                  <?php } ?>
                </tr>			
				 <tr>
                  <td colspan='6' style='text-align:left'><strong>TOTAL </strong>
				  <div class='btn btn-warning' style='display:'> <strong><?php echo $panier->total($_GET['boutique'])  ?>$ </strong></div>
				</td>
				
                  <td</td>
				  <input type='hidden' style='text-align:left' value='<?php echo $panier->total($_GET['boutique'])  ?>' name='total'>
				  </tr>
				 
                 <?php } ?>
			  
  
            </table>
	<a href="produit.php?boutique=<?php echo $_GET['boutique']   ?>" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<?php if ($result) {
	echo "<button class='btn btn-large pull-right btn-warning' type='submit' name='commander'>commander </button>";
	} ?>
	</form>
</div>
</div></div>
</div>
<?php require 'footer.php'?>
<?php } ?>