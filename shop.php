<?php 

include 'constant/layout/head.php';
 require_once('constant/layout/header.php');
 require 'categorie.php'
  ?>
				
				<div class="col-sm-9 padding-right">
				
					<div class="features_items"><!--features_items-->
					
						<h2 class="title text-center" id="">tout les produits</h2>
						<?php 	$sql2="SELECT * FROM `articles` a inner join `boutiques` b on a.boutique = b.idBoutique where b.statut != 2  ";
						$result2 = $connect->query($sql2);
						
											
						foreach ($result2 as $row2) {
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<a href="product-details.php?produit=<?php echo $row2['idArticles']  ?>"><img src="images/home/<?php echo $row2['photoArticle']  ?>" alt="" style="width:268px ; height:249px;"/></a>
											<h2>$<?php echo $row2['prixUnitaire']  ?></h2>
											<p><?php echo $row2['desiArticle']  ?></p>											
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
														$like = "vous avez aimé ce produit";
													} else {
														$like = "vous et {$n} autre aime ce produit";
													}
													
													
												}else {
													$like = "{$row5} personnes aime ce produit";
												}
											}
											?>											
											<p class=""><?php echo $like  ?> </p>											
										</div>
										
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><button class=" btn-primary" onclick="like(<?php echo $row2['idArticles']  ?>,<?php echo  (!empty($_SESSION['idclient'])) ?  $_SESSION['idclient'] : '' ;  ?>)" ><i class="fa fa-thumbs-up"></i> Like</button></li>
										<li><a href="product-details.php?produit=<?php echo $row2['idArticles']  ?>"><i class="fa fa-plus-square"></i>Voir le détail</a></li>
									</ul>
								</div>
								
							</div>
							
						</div>
						<?php  }  ?>
						<?php    ?>
						
						
						
						
									
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div><!--features_items-->
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
								<li><a href="">FAQ’s</a></li>
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
					<p class="pull-left">Copyright © 2013 E-Shopper. All rights reserved.</p>
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
</body>
</html>