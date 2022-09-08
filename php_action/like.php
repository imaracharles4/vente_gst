
<?php 
	 include('../constant/connect.php');
	 include 'Push.php';
 
	 $push = new Push($connect); 

	    $idarticle = $_POST['article'];
	    $client = $_POST['client'];
        $date = date('Y-m-d');
		$sql6="SELECT * from like_produit  where idarticle='$idarticle' AND idclient='$client'";
		$result6 = $connect->query($sql6);
		$row6 = mysqli_num_rows($result6);
		if ($row6 > 0) {
					echo 2;								
		}else
		{
			$requete = "INSERT INTO like_produit (idarticle, idclient) VALUES ('$idarticle','$client')";
		

		if (mysqli_query($connect, $requete)) {
			$sqlv="SELECT * from articles  where idArticles='$idarticle'";
		    $resultv = $connect->query($sqlv);
			$ligne=mysqli_fetch_assoc($resultv);
			$id_to=$ligne['boutique'];
			$time = date('Y-m-d H:i:s');
			if ($push->saveNotification($client, $id_to, 1, $idarticle)) {
				echo 1;
			}
		}
		elseif($client =='')
		{
			echo "
			<link href='css/popup_style.css' rel='stylesheet'>
			<div class='popup popup--icon -error js_error-popup popup--visible'>
			<div class='popup__background'></div>
			<div class='popup__content'>
			  <h3 class='popup__content__title'>
				Error 
			  </h1>
			  <p>veillez vous connecter ou créer un compte pour faire cette opération</p>
			  <p>
				<a href='login.php'><button class='button button--error' data-for='js_error-popup'>Fermer</button></a>
			  </p>
			</div>
			</div>";
		}
		}
		
?>	