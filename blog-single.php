<?php 

include 'constant/layout/head.php';
 require_once('constant/layout/header.php');
 require 'categorie.php'
  ?>
  <?php 	$sql2="SELECT * from blog  where idblog='".$_GET['id']."'";
	$result2 = $connect->query($sql2);
	$row2 = mysqli_fetch_assoc($result2);

	$sql="SELECT * from boutiques  where idboutique='".$row2['vendeur']."'";
	$result = $connect->query($sql);
						
	$row = mysqli_fetch_assoc($result);
	$vendeur = $client->get_vendeur($row['idClient']);
?>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<div class="single-blog-post">
							<h3><?php echo $row2['titre']  ?></h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> <?php echo $vendeur->nom." ".$vendeur->prenom  ?></li>
									<li><i class="fa fa-phone"></i> <?php echo $vendeur->numero  ?></li>
									<li><i class="fa fa-clock-o"></i> <?php echo date(' H:s',strtotime($row2['date'])) ?></li>
									<li><i class="fa fa-calendar"></i> <?php echo date(' d/m/Y',strtotime($row2['date'])) ?></li>
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="images/blog/<?php echo $row2['image']  ?>" alt="" style="width:866px; height: 369px;">
							</a>
							<p><?php echo $row2['description']  ?></p>
							<div class="pager-area">
								<ul class="pager pull-right">
									<li><a href="#">Pre</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div><!--/blog-post-area-->

					

					<!-- <div class="media commnets">
						
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="">Other Posts</a>
							</div>
						</div>
					</div>Comments -->
					<div class="response-area">
						<h2>COMMENTAIRES</h2>
						<ul class="media-list">
						<?php $sql3="SELECT * from commentaires  where idblog='".$_GET['id']."'";
			                  $result3 = $connect->query($sql3);
											
						foreach ($result3 as $row3) {
						?>
							<li class="media">
								
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i><?php echo $row3['nom']  ?></li>
										<li><i class="fa fa-phone"></i> <?php echo $row3['numero']  ?></li>
										<li><i class="fa fa-clock-o"></i> <?php echo date(' H:s',strtotime($row3['date'])) ?> </li>
										<li><i class="fa fa-calendar"></i> <?php echo date(' d/m/Y',strtotime($row3['date'])) ?> </li>
									</ul>
									<p><?php echo $row3['commentaire']  ?></p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li>
							<?php } ?>
							<!-- <li class="media second-media">
								
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li> -->
						
						</ul>					
					</div><!--/Response-area-->
					<div class="replay-box">
						<div class="row">
						<form action="php_action/commentaire.php" method="POST">
							<div class="col-sm-4">
								<h2>Ajouter un commentaire</h2>
								
									<div class="blank-arrow">
										<label>Votre nom</label>
									</div>
									<span>*</span>
									<input type="text"  name="nom" placeholder="Votre nom...">
									<input type="hidden"  name="idblog" value="<?= $_GET['id'] ?>">
									<div class="blank-arrow">
										<label>votre numéro</label>
									</div>
									<span>*</span>
									<input type="text" name="numero" placeholder="Votre numéro...">
									
								
							</div>
							<div class="col-sm-8">
								<div class="text-area">
									<div class="blank-arrow">
										<label>votre commentaire</label>
									</div>
									<span>*</span>
									<textarea name="message" rows="11"></textarea>
									<button type="submit" name="enregistrer" class="btn btn-primary">Commenter</button>
									
								</div>
							</div>
						</form>
						</div>
					</div><!--/Repaly Box-->
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
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
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
</body>
</html>