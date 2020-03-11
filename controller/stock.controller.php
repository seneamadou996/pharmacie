<?php
require_once '../../model/stock.php';

class stockController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new stock();
    }
    
    public function Index(){
        require_once '../../view/stock/stock.php';
       
    }
    
    public function Crud(){
        $stock = new stock();
        
        if(isset($_REQUEST['id'])){
            $stock = $this->model->Obtenir($_REQUEST['id']);
        }
        require_once '../../view/stock/stock-editer.php';
        
    }
    
    public function Enregistrer(){
        $stock = new stock();
        
        $stock->id = $_REQUEST['id'];
        $stock->libelle_stock = $_REQUEST['libelle_stock'];
        $stock->quantite_max = $_REQUEST['quantite_max'];    
      

        $stock->id > 0 
            ? $this->model->Maj($stock)
            : $this->model->Creer($stock);
        
        header('Location: index.php');
    }
    
    public function Supprimer(){
        $this->model->Supprimer($_REQUEST['id']);
        header('Location: index.php');
    }
}