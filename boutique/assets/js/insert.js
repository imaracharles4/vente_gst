function insert() {
    
    var code = $("$code").val()
    var desi = $("$designation").val()
    var prix = $("$prixU").val()
    var quantite = $("$quantite").val()
    $.ajax({
        type:'post',
        url:'insert.php',
        data:{code:code,designation:desi,prixU:prix,quantite:quantite},
        success: function(data) {
            if (data==1) {               
                location.reload();
            } else {
                alert("non valide");                
            }
            
        }
        
    });
}