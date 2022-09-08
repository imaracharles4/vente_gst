function ajout_panier(id) {
    var add="add"
    
    $.ajax({
        type:'post',
        url:'php_action/panier.php',
        data:{add:add,id:id},
        success: function(data) {
            if(data==1) {
                location.reload();           
            }else  {
                document.write(data);          
            }
            
        }
        
    });
}

function soustr_panier(id) {
    var soustr="soustr"
    
    $.ajax({
        type:'post',
        url:'php_action/panier.php',
        data:{soustr:soustr,id:id},
        success: function(data) {
            if(data==1) {
                location.reload();           
            }else  {
                document.write(data);          
            }
            
        }
        
    });
}
function delete_panier(id) {
    var delet="delete"
    
    $.ajax({
        type:'post',
        url:'php_action/panier.php',
        data:{delete:delet,id:id},
        success: function(data) {
            if(data==1) {
                location.reload();           
            }else  {
                document.write(data);          
            }
            
        }
        
    });
}

