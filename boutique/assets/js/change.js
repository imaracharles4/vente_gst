function update(val, id) {
    
    $.ajax({
        type:'post',
        url:'change.php',
        data:{val:val,id:id},
        success: function(data) {
            if (data==1) {               
                location.reload();
            } else {
                alert("non valide");                
            }
            
        }
        
    });
}
$(document).ready(function(){

});
 function modifier(id) {
    $("#modifier").on("click",function(e){
        e.preventDefault();

        var ref_prod = $("$ref_produit").val();
        var com_qte = $("$qte_commande").val();

        $.ajax({
            type:'post',
            url:'rep_modif.php',
            data:{ref_produit:ref_prod,qte_commande:com_qte,detail_num:id},
            success: function(data) {
                if (data==1) {               
                    location.reload();
                } else {
                    alert("non valide");                
                }
                
            }
            
        });
    })
   
}