<?php
class Client
{
    private $DB;
    public function __construct($DB){
       
      $this->DB = $DB;
    }
    public function is_vendeur($id_client)
    {
        $result= $this->DB->query("SELECT * FROM clients WHERE idClient = {$id_client}  ");
        $response = mysqli_fetch_object($result); 
        if ($response->vendeur == 1) {
            return true;
        } else {
            return false;
        }
        
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
 