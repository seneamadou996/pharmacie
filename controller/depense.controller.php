<?php
require_once '../../model/depense.php';

class depenseController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new depense();
    }
    
    public function Index(){
        require_once '../../view/depense/depense.php';
       
    }
    
    public function Crud(){
        $depense = new depense();
        
        if(isset($_REQUEST['id'])){
            $depense = $this->model->Obtenir($_REQUEST['id']);
        }
        require_once '../../view/depense/depense-editer.php';
        
    }
    
    public function Enregistrer(){
        $depense = new depense();
        
        $depense->id = $_REQUEST['id'];
        $depense->intitule = $_REQUEST['intitule'];
        $depense->montant = $_REQUEST['montant']; 
        $depense->date = $_REQUEST['date'];  
      

        $depense->id > 0 
            ? $this->model->Maj($depense)
            : $this->model->Creer($depense);
        
        header('Location: index.php');
    }
    
    public function Supprimer(){
        $this->model->Supprimer($_REQUEST['id']);
        header('Location: index.php');
    }
}