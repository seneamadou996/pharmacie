<?php
require_once '../../model/pharmacien.php';

class pharmacienController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new pharmacien();
    }
    
    public function Index(){
        require_once '../../view/pharmacien/pharmacien.php';
       
    }
    
    public function Crud(){
        $pharmacien = new pharmacien();
        
        if(isset($_REQUEST['id'])){
            $pharmacien = $this->model->Obtenir($_REQUEST['id']);
        }
        require_once '../../view/pharmacien/pharmacien-editer.php';
        
    }
    
    public function Enregistrer(){
        $pharmacien = new pharmacien();
        
        $pharmacien->id = $_REQUEST['id'];
        $pharmacien->adresse = $_REQUEST['adresse'];
        $pharmacien->users_id = $_REQUEST['users_id'];    
      

        $pharmacien->id > 0 
            ? $this->model->Maj($pharmacien)
            : $this->model->Creer($pharmacien);
        
        header('Location: index.php');
    }
    public function Supprimer(){
        $this->model->Supprimer($_REQUEST['id']);
        header('Location: index.php');
    }
}