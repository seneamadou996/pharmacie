<?php
require_once '../../model/personnel.php';

class personnelController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new personnel();
    }
    
    public function Index(){
        require_once '../../view/personnel/personnel.php';
       
    }
    
    public function Crud(){
        $personnel = new personnel();
        
        if(isset($_REQUEST['id'])){
            $personnel = $this->model->Obtenir($_REQUEST['id']);
        }
        require_once '../../view/personnel/personnel-editer.php';
        
    }
    
    public function Enregistrer(){
        $personnel = new personnel();
        
        $personnel->id = $_REQUEST['id'];
        $personnel->adresse = $_REQUEST['adresse'];
        $personnel->users_id = $_REQUEST['users_id'];    
      

        $personnel->id > 0 
            ? $this->model->Maj($personnel)
            : $this->model->Creer($personnel);
        
        header('Location: index.php');
    }
    
    public function Supprimer(){
        $this->model->Supprimer($_REQUEST['id']);
        header('Location: index.php');
    }
}