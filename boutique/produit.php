<?php include "header.php";


$requete = "SELECT * FROM articles where boutique = '".$_SESSION['idboutique']."' ";
$reponses = mysqli_query($connect, $requete);        
?><style>
    .button{
        background: var(--main-color);
    border-radius: 10px;
    color: #f0f0f0;
    font-size: .8rem;
    padding: .5rem 1rem;
    border: 1px solid var(--main-color);
}

.pagination {
  display: flex;
  margin-bottom: 25px;
  margin-top: 0;
  padding-left: 15px;
}

.pagination  li:first-child  a, .pagination  li:first-child  span {
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
  margin-left: 0;
}

.pagination  li:last-child  a, .pagination  li:last-child  span {
  border-bottom-right-radius: 0;
  border-top-right-radius: 0;
}

.pagination  .active  a, .pagination  .active  span, .pagination  .active  a:hover, .pagination  .active  span:hover, .pagination  .active  a:focus, .pagination  .active  span:focus {
  background-color: #fe0f0f;
  border-color: #fe0f0f;
  color: #FFFFFF;
  cursor: default;
  z-index: 2;
}

.pagination  li  a, .pagination  li  span {
  background-color: #f0f0e9;
  border: 0;
  float: left;
  line-height: 1.42857;
  margin-left: -1px;
  padding: 6px 12px;
  position: relative;
  text-decoration: none;
  margin-right: 5px;
  color:#000;
}

.pagination  li  a:hover{
	background:#fe0f0f;
	color:#fff;
}

.pagination-area {
  margin-bottom:45px;
  margin-top:45px
}

.pagination-area 
.pagination li a {
  background:#F0F0E9;
  border: 0 none;
  border-radius: 0;
  color: #696763;
  margin-right: 5px;
  padding: 4px 12px;
}

.pagination-area 
.pagination li a:hover,
.pagination-area 
.pagination li .active {
  background:#fe0f0f;
  color: #fff
}


</style>
               <div class="recent-grid1">
                   <div class="projects">
                       <div class="card">
                           <div class="card-header">
                               <h2>Gestion des produits</h2>
                                
                               <a href="nouv_produit.php"><button>Nouveau produit<span class="las la-arrow-right"></span></button></a>

                           </div>
                           <div class="card-body">
                               <div class="table-responsive">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                    <td>code</td>
                                                    <td>Designation</td>
                                                    <td>PU</td>
                                                    <td>Quantite</td>
                                                    <td>Description</td>
                                                    <td>Categorie</td>                                                    
                                                    <td>Like</td>                                                    
                                                    <td >Modifier</td>
                                                    <td >Supprimer</td>
                                                   
                                            </tr>
                                        </thead>
                                        <?php foreach ($reponses as $key => $value):?>
                                        <tbody>
                                        
                                        
                                            <tr class="">
                                                <td><?= $value['idArticles'] ?></td>                                                
                                                <td><?= $value['desiArticle'] ?></td>
                                                <td><?= $value['prixUnitaire'] ?></td>
                                                <td><?= $value['quantiteStock'] ?></td>                                                
                                                <td><?= substr($value['descriptionArticle'], 0 , 100). '...'; ?></td>
                                                <td><?php $res =$connect->query("SELECT * FROM petite_categorie WHERE id_petite_categorie = ".$value['categorie']."");
                                                 $ligne=mysqli_fetch_assoc($res);
                                                 echo " ".$ligne['designation'];?></td>
                                                <td><?php $sql6="SELECT * from like_produit  where idarticle='".$value['idArticles']."' ";
											    $result6 = $connect->query($sql6);
                                                $row6 = mysqli_num_rows($result6);
											    echo $row6 ?></td>
                                                <td><a href="nouv_produit.php?edit=<?= $value['idArticles'] ?>"><button class="button"><i class="las la-edit"></i></button> </a> </td>
                                                <td><a onclick="return confirm('etes-vous sur de vouloir supprimer?')"  href="../php_action/delete.php?delete=<?= $value['idArticles'] ?>"><button class="button"><i class="las la-times"></i> </button></a> </td>
                                                
                                                
                                     
                                            </tr>
                                            <?php endforeach?>
                                        </tbody>
                                    </table>
                                    
                               </div>
                               
                           </div>
                           
                       </div>
                       <div class="pagination-area">
							<ul class="pagination">
								<li><a href="" class="active">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href=""><i class="las la-angle-double-right"></i></a></li>
							</ul>
						</div>

                   </div>
                   
                  
           </main> 
    </div>
</body>
</html>
<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
   
<script type="text/javascript" src="assets/js/print.js"></script>