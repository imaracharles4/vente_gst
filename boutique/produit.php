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

                   </div>
                  
           </main> 
    </div>
</body>
</html>
<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
   
<script type="text/javascript" src="assets/js/print.js"></script>