<?php 

include 'constant/layout/head.php';
 require_once('constant/layout/header.php');
 require 'categorie.php'
  ?>
	
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<?php 
						      if (isset($_GET['vendeur'])) {
								$sqlp="SELECT * from `blog` a inner join `boutiques` b on a.vendeur = b.idBoutique where b.statut != 2 AND vendeur='".$_GET['vendeur']."'  ";
								$resultp = $connect->query($sqlp);
						
								$count = mysqli_num_rows($resultp);
								@$page = $_GET["page"];
								if(empty($page)) $page=1; 
								$nbr_element_par_page=6;
								$nbr_de_page=ceil($count/$nbr_element_par_page);
								$debut = ($page-1)* $nbr_element_par_page;
								
								$sql3="SELECT * from `blog` a inner join `boutiques` b on a.vendeur = b.idBoutique where b.statut != 2 AND vendeur='".$_GET['vendeur']."' ORDER BY idblog DESC limit {$debut} , {$nbr_element_par_page}";
								$result3 = $connect->query($sql3);
								if (mysqli_num_rows($result3)==0) {
									echo "<meta http-equiv='refresh' content='0; URL=blog.php?vendeur={$_GET['vendeur']}'>";
									exit;
								}

								
							  } else {
								$sqlp="SELECT * FROM `blog` a inner join `boutiques` b on a.vendeur = b.idBoutique where b.statut != 2  ";
								$resultp = $connect->query($sqlp);
						
								$count = mysqli_num_rows($resultp);
								@$page = $_GET["page"];
								if(empty($page)) $page=1; 
								$nbr_element_par_page=6;
								$nbr_de_page=ceil($count/$nbr_element_par_page);
								$debut = ($page-1)* $nbr_element_par_page;
								
								$sql3="SELECT * from blog  ORDER BY idblog DESC limit {$debut} , {$nbr_element_par_page}";
								$result3 = $connect->query($sql3);
								
								if (mysqli_num_rows($result3)==0) {
									echo "<meta http-equiv='refresh' content='0; URL=blog.php'>";
									exit;
								}
							  }
							   				
						foreach ($result3 as $row3) {
							$sql="SELECT * from boutiques  where idboutique='".$row3['vendeur']."'";
								$result = $connect->query($sql);
													
								$row = mysqli_fetch_assoc($result);
								$vendeur = $client->get_vendeur($row['idClient']);
						?>
						<div class="single-blog-post">
							<h3><?php echo $row3['titre']  ?></h3>
							<div class="post-meta">
								<ul>
								<li><i class="fa fa-user"></i> <?php echo $vendeur->nom." ".$vendeur->prenom  ?></li>
								<li><i class="fa fa-phone"></i> <?php echo $vendeur->numero  ?></li>
									<li><i class="fa fa-clock-o"></i> <?php echo date(' H:s',strtotime($row3['date'])) ?></li>
									<li><i class="fa fa-calendar"></i> <?php echo date(' d/m/Y',strtotime($row3['date'])) ?></li>
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
								<img src="images/blog/<?php echo $row3['image']  ?>" alt="">
							</a>
							<p><?php echo substr($row3['description'], 0 , 250). '...';  ?></p>
							<a  class="btn btn-primary" href="blog-single.php?id=<?php echo $row3['idblog']  ?>">Lire plus</a>
						</div>
						<?php } ?>
						
						<div class="pagination-area">
							<ul class="pagination">
						<?php
						    
							for ($i=1; $i <= $nbr_de_page; $i++) {
								if ($page!=$i) {
									if (isset($_GET['vendeur']))
									echo "<li><a href='?vendeur={$_GET['vendeur']}&page=$i' class=''>$i</a></li>";
									else
									echo "<li><a href='?page=$i' class=''>$i</a></li>";
								} else {
									if (isset($_GET['vendeur']))
									echo "<li><a href='?vendeur={$_GET['vendeur']}&page=$i' class='active'>$i</a></li>";
									else
									echo "<li><a href='?page=$i' class='active'>$i</a></li>";
								}
								 
								
							}
							
						?> 	
							</ul>
						
						
						
						
					</div>
					</div>
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