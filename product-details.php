<?php 

include 'constant/layout/head.php';
 require_once('constant/layout/header.php');
 require 'categorie.php'
  ?>
<!-- <div class="col-sm-3">

</div> -->
<?php 	$sql2="SELECT * FROM `articles` a inner join `boutiques` b on a.boutique = b.idboutique where b.statut = 1 and a.idArticles='".$_GET['produit']."' ";
	$result2 = $connect->query($sql2);
	$row2 = mysqli_fetch_assoc($result2);
	if (!$row2) {		
		echo "<meta http-equiv='refresh' content='0; URL=index.php'>";
		exit;
	} else {
		$sql="SELECT * from boutiques  where idboutique='".$row2['idboutique']."'";
		$result = $connect->query($sql);
							
		$row = mysqli_fetch_assoc($result);
		$vendeur = $client->get_vendeur($row['idClient']);
		
	}
	
	

	
						?>				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="images/home/<?php echo $row2['photoArticle']  ?>" alt="" />
								<a href="http://api.whatsapp.com/send?phone=<?php echo $vendeur->numero  ?>" target="_blank" rel="noopener noreferrer">
								<h3>CONTACTER</h3>
								 </a>
							</div>
							
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
						
										
										
										
									</div>

								  <!-- Controls -->
								  
								  
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<!-- <img src="images/product-details/new.jpg" class="newarrival" alt="" /> -->
								<h2><?php echo $row2['desiArticle']  ?></h2>
								<p><?php echo $row2['descriptionArticle']  ?></p>
								
								<span>
									<span>US $<?php echo $row2['prixUnitaire']  ?></span>
									<label>en stock:</label>
									<input type="text" disabled value="<?php echo $row2['quantiteStock']  ?>" />									
									<button type="button" onclick="ajout_panier(<?php echo $row2['idArticles']  ?>)" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>									
								</span>
								<p><b>Vendeur(se):</b> <?php echo $vendeur->nom." ".$vendeur->prenom  ?></p>
								<p><b>Adresse:</b> <?php echo $row['adresse']  ?></p>
								<p><b>T??l??phone:</b> <?php echo $vendeur->numero  ?></p>
								<p><b>Adresse mail:</b> <?php echo $row['mail']  ?></p>
								<p><b>Boutique:</b> <?php echo $row['boutique']  ?></p>
								<?php 	$sql5="SELECT * from like_produit  where idarticle='".$row2['idArticles']."'";
											$result5 = $connect->query($sql5);
											$row5 = mysqli_num_rows($result5);
											$like = "";
											if ($row5 == 0 ) {
												$like = "vous pouvez aimer ce produit";
											} elseif (empty($_SESSION['idclient'])) {
												$sql6="SELECT * from like_produit  where idarticle='".$row2['idArticles']."' ";
											    $result6 = $connect->query($sql6);
											    $row6 = mysqli_num_rows($result6);
												if ($row6 > 0) {
													
													$like = "{$row5} personnes aime ce produit";
												}
											}
											elseif (!empty($_SESSION['idclient'])) {
												$sql6="SELECT * from like_produit  where idarticle='".$row2['idArticles']."' AND idclient='".$_SESSION['idclient']."'";
											    $result6 = $connect->query($sql6);
											    $row6 = mysqli_num_rows($result6);
												if ($row6 > 0) {
													$n = $row5-1;
													if ($n == 0) {
														$like = "vous avez aim?? ce produit";
													} else {
														$like = "vous et {$n} autre aime ce produit";
													}
													
													
												}else {
													$like = "{$row5} personnes aime ce produit";
												}
											}
											?>											
											<p class=""><?php echo $like  ?> </p>
								<button class=" btn-primary"  onclick="like(<?php echo $_GET['produit']  ?>,<?php echo  (!empty($_SESSION['idclient'])) ?  $_SESSION['idclient'] : '' ;  ?>)" ><i class="fa fa-thumbs-up"></i> Like</button>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">								
								<li class="active"><a href="#plusproduit" data-toggle="tab">Plus des produits de la boutique</a></li>
								<li><a href="blog.php?vendeur=<?php echo $row['idboutique'] ?>">Blog</a></li>
								<li ><a href="" data-toggle="tab">Contacter le vendeur</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<!-- <div class="tab-pane fade" id="details" >
							<?php 
						// 	$sql3="SELECT * from images  where idArticles='".$_GET['produit']."'";
			            //       $result3 = $connect->query($sql3);
											
						// foreach ($result3 as $row3) {
						?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
											   <img src="images/home/<?php //echo $row3['photo']  ?>" alt="" style="width: 258px; height: 190px;"/>
												
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<?php //} ?>
							</div> -->
							
							<div class="tab-pane fade active in" id="plusproduit" >
							<?php 
							
						$sql1="SELECT * from `articles` a inner join `boutiques` b on a.boutique = b.idBoutique where b.statut != 2 and a.boutique='".$row2['idboutique']."' ORDER BY a.idArticles DESC ";
			                  $result1 = $connect->query($sql1);
											
						foreach ($result1 as $row1) {
						?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
											<a href="product-details.php?produit=<?php echo $row1['idArticles']  ?>"><img src="images/home/<?php echo $row1['photoArticle']  ?>" alt="" style="width: 208px; height: 183px;"/></a>
												<h2>$<?php echo $row1['prixUnitaire']  ?></h2>
												<p><?php echo $row1['desiArticle']  ?></p>
												<button type="button" onclick="ajout_panier(<?php echo $row1['idArticles']  ?>)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
														
							
							
						</div>
					</div><!--/category-tab-->
					
					
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Online Help</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Order Status</a></li>
								<li><a href="">Change Location</a></li>
								<li><a href="">FAQ???s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">T-Shirt</a></li>
								<li><a href="">Mens</a></li>
								<li><a href="">Womens</a></li>
								<li><a href="">Gift Cards</a></li>
								<li><a href="">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terms of Use</a></li>
								<li><a href="">Privecy Policy</a></li>
								<li><a href="">Refund Policy</a></li>
								<li><a href="">Billing System</a></li>
								<li><a href="">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Company Information</a></li>
								<li><a href="">Careers</a></li>
								<li><a href="">Store Location</a></li>
								<li><a href="">Affillate Program</a></li>
								<li><a href="">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright ?? 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script src="javascript_action/like.js"></script>
	<script src="javascript_action/panier.js"></script>
</body>
</html>