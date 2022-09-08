<?php 

include 'constant/layout/head.php';
 require_once('constant/layout/header.php');
?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<?php
			
		
				
							
			?> 
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Designation</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					
					<tbody>
						<?php
						$prix =0;
						if (empty($_SESSION['panier'])) {
							
							echo '<h2> votre panier est vide</h2>';
							}
							else {
								
								foreach ($_SESSION['panier'] as $cle => $tab) {
									
											$ids=array_keys($tab);
											
											if (empty($ids)) {
												$result= array();
											}
											else {
												
												$result= $connect->query('SELECT * FROM articles WHERE idArticles IN ('.implode(',',$ids).')  ');
												
										} 
								
									
								foreach ($result as $key => $value){
									// var_dump($resultat);
									// die;	
									$prix += $value['prixUnitaire'] * $_SESSION['panier'][$value['boutique']][$value['idArticles']];
					?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/home/<?php echo $value['photoArticle']; ?>" alt="" style="width:100px ; height: 100px;"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $value['desiArticle']; ?></a></h4>
								<p><?php echo $value['boutique']; ?></p>
							</td>
							<td class="cart_price">
								<p>$<?php echo $value['prixUnitaire']; ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" style="cursor: pointer;" onclick="ajout_panier(<?php echo $value['idArticles']; ?>)" > + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $qte=($_SESSION['panier'][$value['boutique']][$value['idArticles']]); ?>" autocomplete="off" size="2">
									<a class="cart_quantity_down" style="cursor: pointer;" onclick="soustr_panier(<?php echo $value['idArticles']; ?>)" > - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$<?php echo $value['prixUnitaire'] * $qte; ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" onclick="delete_panier(<?php echo $value['idArticles']; ?>)"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						<?php }} ?>
						<?php }  ?>				
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Valider votre commande</h3>
				<!-- <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p> -->
			</div>
			<div class="row">
				<form action="php_action/commande.php" method="post">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Envoyer un message whatsapp</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>WhatsApp :</label>
								<select>
									<option>WhatsApp Web</option>
									<option>GB WhatsApp</option>
									<option>Business WhatsApp</option>
									<option>FM WhatsApp</option>
									<option>WhatsApp</option>
									
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Valider:</label>
								<input type="submit" name="commander" style="background:#fe0f0f">
							</li>
						</ul>
						<!-- <a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a> -->
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Nombre des boutiques <span style="color:#fe0f0f"><?php echo $panier->count_b() ?></span></li>
							<li>Nombre des produits <span style="color:#fe0f0f"><?php echo $panier->count_p() ?></span></li>
							<li>Total quantité <span style="color:#fe0f0f"><?php echo $panier->count_qte() ?></span></li>
							<li>Total montant<span style="color:#fe0f0f" >$<?php echo $prix ?></span></li>
						</ul>
							<!-- <a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a> -->
					</div>
				</div>
				</form>
			</div>
		</div>
	</section><!--/#do_action-->

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
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script src="javascript_action/panier.js"></script>
</body>
</html>