<?php
require_once '../../model/privilege.php';

class privilegeController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new privilege();
    }
    
    public function Index(){
        require_once '../../view/privilege/privilege.php';
       
    }
    
    public function Crud(){
        $privilege = new privilege();
        
        if(isset($_REQUEST['id'])){
            $privilege = $this->model->Obtenir($_REQUEST['id']);
        }
        require_once '../../view/privilege/privilege-editer.php';
        
    }
    
    public function Enregistrer(){
        $privilege = new privilege();
        
        $privilege->id = $_REQUEST['id'];
        $privilege->role = $_REQUEST['role'];    
      

        $privilege->id > 0 
            ? $this->model->Maj($privilege)
            : $this->model->Creer($privilege);
        
        header('Location: index.php');
    }
    
    public function Supprimer(){
        $this->model->Supprimer($_REQUEST['id']);
        header('Location: index.php');
    }
}