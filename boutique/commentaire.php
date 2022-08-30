<?php include "header.php";


$requete = "SELECT * FROM commentaires where idblog = '".$_GET['blog']."' ";
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
                               <h2>Commentaires du blog</h2>
                               
                           </div>
                           <div class="card-body">
                               <div class="table-responsive">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                    <td>Date</td>
                                                    <td>nom</td>
                                                    <td>Numéro</td>                                                    
                                                    <td>Commentaire</td>
                                                   
                                                   
                                            </tr>
                                        </thead>
                                        <?php foreach ($reponses as $key => $value):?>
                                        <tbody>
                                        
                                        
                                            <tr class="">
                                                <td><?= $value['date'] ?></td>                                         
                                               
                                                <td><?= $value['nom'] ?></td>
                                                <td><?= $value['numero'] ?></td>
                                                <td><?= $value['commentaire']  ?></td>                                                
                                                
                                     
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