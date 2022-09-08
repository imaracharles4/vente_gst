<?php 
 include('../constant/connect.php');

if (isset($_POST['id'])) {
    $statut = 1;
    $req = "UPDATE notification_client SET statut = 1 WHERE id_notification = ".$_POST['id']." ";
    $result = mysqli_query($connect, $req);
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
    
}
 