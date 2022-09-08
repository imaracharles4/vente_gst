<?php
 class panier{

  private $DB;
  public function __construct($DB){
     
      if (!isset($_SESSION['panier'])) {
        $_SESSION['panier']=array();
      }
    $this->DB = $DB;
  }
  public function add($boutique,$product_id){
    if (isset($_SESSION['panier'][$boutique][$product_id])) {
      $_SESSION['panier'][$boutique][$product_id]++;
      
    }else {
      $_SESSION['panier'][$boutique][$product_id]=1;
    }
  }
  public function soustr($boutique,$product_id){
    if (isset($_SESSION['panier'][$boutique][$product_id])) {
     if ( $_SESSION['panier'][$boutique][$product_id]>1){ 
      $_SESSION['panier'][$boutique][$product_id]--;     
    }else {
     $_SESSION['panier'][$boutique][$product_id]=1;
        }
      }
  }
  public function count_qte(){
    
    if (isset($_SESSION['panier'])) {
      $cont = 0;
      foreach ($_SESSION['panier'] as $cle => $tab) {
        foreach ($_SESSION['panier'][$cle] as $key => $value) {
          $cont = $cont + $value;
        }
       
      }	
      return $cont;
      }  
   
  }
  public function count_p(){
    if (isset($_SESSION['panier'])) {
      $count = 0;
      foreach ($_SESSION['panier'] as $cle => $tab) {
        if ($cle) {
          foreach ($_SESSION['panier'][$cle] as $key => $value) {
            if ($key) {
              $count++;
            }
           
          }
        }
      }	
       return $count;
      }  
   
   
  }
  public function count_b(){
    if (isset($_SESSION['panier'])) {
      $count = 0;
      foreach ($_SESSION['panier'] as $cle => $tab) {
        
        if ($_SESSION['panier'][$cle]) {
          $count++; 
        }
        
      }	
      return $count;
      }  
   
   
  }
  
    
  public function delete($boutique,$product_id){
    if (isset($_SESSION['panier'][$boutique][$product_id])) 
       unset($_SESSION['panier'][$boutique][$product_id]);
  }

public function total_($boutique){
 
  $prix=0;
  if (isset($_SESSION['panier'][$boutique])) {
    $ids=array_keys($_SESSION['panier'][$boutique]);
    if (empty($ids)) {
      $result= array();
    }
    else {
      $result= $this->DB->query('SELECT * FROM articles WHERE idArticles IN ('.implode(',',$ids).')  ');
    } 
      foreach ($result as $product) {
        $prix +=  $product['prixUnitaire'] * $_SESSION['panier'][$product['boutique']][$product['idArticles']];
         $_SESSION['panier'][$product['boutique']][$product['idArticles']];
        
      }
      return $prix;
  }
 
}
public function clear(){
  if(isset($_SESSION['panier']))
     unset($_SESSION['panier']);
}
}