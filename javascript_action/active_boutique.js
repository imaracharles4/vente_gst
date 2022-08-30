function update(val, id) {
    
    $.ajax({
        type:'post',
        url:'../php_action/active_boutique.php',
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