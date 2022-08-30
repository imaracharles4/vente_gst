<?php include "header.php";


$requete = "SELECT * FROM boutiques order by idboutique desc ";
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
                               <h2>Gestion des boutique</h2>
                               
                           </div>
                           <div class="card-body">
                               <div class="table-responsive">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                    <th>numero</th>
                                                    <th>nom</th>
                                                    <th>postnom</th>
                                                    <th>prenom</th>
                                                    <th>telephone</th>
                                                    <th>boutique</th>
                                                    <th>adresse</th>                                                    
                                                    <th>mail</th>                                                  
                                                    <td >Statut</td>
                                                    <!-- <td >Supprimer</td> -->
                                                   
                                            </tr>
                                        </thead>
                                        <?php foreach ($reponses as $key => $value):?>
                                        <tbody>
                                        
                                        
                                            <tr class=<?php echo $value['statut']==1?'success':'danger'?>>
                                                <td><?= $value['idboutique'] ?></td>                                                
                                                <td><?= $value['nom'] ?></td>
                                                <td><?= $value['postnom'] ?></td>
                                                <td><?= $value['prenom'] ?></td>                                                
                                                <td><?= $value['telephone'] ?></td>
                                                <td><?= $value['boutique'] ?></td>
                                                <td><?= $value['adresse'] ?></td>
                                                <td><?= $value['mail'] ?></td>
                                                <td><button class="button" onclick="update(<?= $value['statut'] ?>,<?= $value['idboutique'] ?>)">
                                                    <?php if ($value['statut']==1) {
                                                        echo "<i class='las la-power-off'></i>";
                                                    }else {
                                                        echo "<i class='las la-edit'></i>";
                                                    }?>
                                                    </button> 
                                                 </td>
                                                <!-- <td><a onclick="return confirm('etes-vous sur de vouloir supprimer?')"  href="../php_action/delete.php?delete=<?= $value['idboutique'] ?>"><button class="button"><i class="las la-times"></i> </button></a> </td> -->
                                                
                                                
                                     
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
<script type="text/javascript" src="../boutique/assets/js/jquery-3.3.1.min.js"></script>
   
<script type="text/javascript" src="../javascript_action/active_boutique.js"></script>