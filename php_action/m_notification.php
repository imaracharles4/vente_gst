<?php
class Notification
{
    private $DB;
    public function __construct($DB){
       
      $this->DB = $DB;
    }
    public function set_notification($id_from,$id_to,$type_operation,$id_operation)
    {
        $statut = 0;
        return $this->DB->query("INSERT INTO notification_client (id_from,id_to,type_operation,id_operation,statut,date) VALUES ($id_from,$id_to,$type_operation,$id_operation,$statut, now()) ");
              
        
    }
    public function set_vendeur($id_client)
    {
        $result= $this->DB->query("UPDATE clients SET vendeur=1 WHERE idClient = {$id_client}  ");
        
    }
    public function get_vendeur($id_client)
    {
        $result= $this->DB->query("SELECT * FROM clients WHERE idClient = {$id_client}  ");
        $response = mysqli_fetch_object($result); 
        
        return $response;
       
        
    }
}
 