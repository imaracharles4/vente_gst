function like(article, client) {
    
    $.ajax({
        type:'post',
        url:'php_action/like.php',
        data:{article:article,client:client},
        success: function(data) {
            if((data==2) || (data==1)) {
                location.reload();           
            }else  {
                document.write(data);          
            }
            
        }
        
    });
}
$(document).ready(function(){

});
