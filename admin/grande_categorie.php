<?php include "header.php";


$requete = "SELECT * FROM grande_categorie ";
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
                               <h2>Gestion blog</h2>
                                
                               <a href="nouv_grande.php"><button>Nouveau post<span class="las la-arrow-right"></span></button></a>

                           </div>
                           <div class="card-body">
                               <div class="table-responsive">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                    <td>code</td>                                                                                               
                                                    <td >Designation</td>
                                                    <td >Modifier</td>
                                                    <td >Supprimer</td>
                                                   
                                            </tr>
                                        </thead>
                                        <?php foreach ($reponses as $key => $value):?>
                                        <tbody>
                                        
                                        
                                            <tr class="">
                                                <td><?= $value['id_categorie'] ?></td>
                                                <td><?= $value['designation'] ?></td>
                                                <td><a href="nouv_grande.php?edit=<?= $value['id_categorie'] ?>"><button class="button"><i class="las la-edit"></i></button> </a> </td>
                                                <td><a onclick="return confirm('etes-vous sur de vouloir supprimer?')"  href="../php_action/delete.php?blog=<?= $value['id_categorie'] ?>"><button class="button"><i class="las la-times"></i> </button></a> </td>
                                                
                                                
                                     
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