<?php
class Push {
    
    private $notifTable = 'notification_client';
	private $userTable = 'clients';
	// private $userTable = 'notif_user';
	private $dbConnect = false;
   
    public function __construct($DB){
       
      $this->dbConnect = $DB;
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($this->dbConnect));
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	public function listNotification(){
		$sqlQuery = 'SELECT * FROM '.$this->notifTable;
        return  $this->getData($sqlQuery);
	}	
	public function listNotificationUser($user){
		$sqlQuery = "SELECT * FROM ".$this->notifTable." WHERE id_to='$user' AND statut = 0 AND notif_loop > 0 AND notif_time <= CURRENT_TIMESTAMP()";
		return  $this->getData($sqlQuery);
	}
	
	public function getNotificationMessage($type_operation)
	{
		if ($type_operation == 1) {
			return "a aimé vortre produit";
		} elseif ($type_operation == 2) {
			return "a commenté votre publication";
		}elseif ($type_operation == 3) {
			return "vous a laisser une commande";
		}
		
	}
	public function getNotificationTitle($id_from)
	{
		$sqlQuery = "SELECT * FROM ".$this->userTable." WHERE idClient = '$id_from'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$ligne = mysqli_fetch_object($result); 
		return  $ligne->nom."  ".$ligne->prenom;
		
	}
	public function getNotificationUrl($type_operation,$id_operation)
	{
		if ($type_operation == 1) {
			return 'http://localhost/eshopper/product-details.php?produit='.$id_operation;
		} elseif ($type_operation == 2) {
			return 'http://localhost/eshopper/blog-single.php?id'.$id_operation;
		}elseif ($type_operation == 3) {
			return 'http://localhost/eshopper/boutique/';
		}
		
	}
	// public function listUsers(){
	// 	$sqlQuery = "SELECT * FROM ".$this->userTable." WHERE username != 'admin'";
    //     return  $this->getData($sqlQuery);
	// }	
	// public function loginUsers($username, $password){
	// 	$sqlQuery = "SELECT id as userid, username, password FROM ".$this->userTable." WHERE username='$username' AND password='$password'";
    //     return  $this->getData($sqlQuery);
	// }	
	public function saveNotification($id_from, $id_to, $type_operation, $id_operation){
		$sqlQuery = "INSERT INTO ".$this->notifTable."(id_from, id_to, type_operation, id_operation, statut, publish_date, notif_time, notif_repeat, notif_loop) VALUES('$id_from', '$id_to', '$type_operation', '$id_operation', DEFAULT, CURRENT_TIMESTAMP(), DEFAULT, DEFAULT,DEFAULT)";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			return ('Error in query: '. mysqli_error($this->dbConnect));
		} else {
			return $result;
		}
	}	
	public function updateNotification($id, $nextTime) {		
		$sqlUpdate = "UPDATE ".$this->notifTable." SET notif_time = '$nextTime', publish_date=CURRENT_TIMESTAMP(), notif_loop = notif_loop-1 WHERE id_notification='$id'";
		mysqli_query($this->dbConnect, $sqlUpdate);

		
	}	
}
?>