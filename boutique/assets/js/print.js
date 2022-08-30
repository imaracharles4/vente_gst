function print(val) {

    if (val != 0) {
        location.href = 'sortie_fourniture.php?print='+ val;
    } else {
        alert('invalide')	
    }
    
}

