<?php
require_once '../../model/ligne.php';

class ligneController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new ligne();
    }
    
    public function Index(){
        require_once '../../view/ligne/ligne.php';
       
    }
    
    public function Crud(){
        $ligne = new ligne();
        
        if(isset($_REQUEST['id'])){
            $ligne = $this->model->Obtenir($_REQUEST['id']);
        }
        require_once '../../view/ligne/ligne-editer.php';
        
    }
    
    public function Enregistrer(){
        $ligne = new ligne();
        
        $ligne->id = $_REQUEST['id'];
        $ligne->numero = $_REQUEST['numero'];
        $ligne->pharmaciens_id = $_REQUEST['pharmaciens_id'];    
        
        $ligne->id > 0
            ? $this->model->Maj($ligne)
            : $this->model->Creer($ligne);
        
        header('Location: index.php');
    }
    
    public function Supprimer(){
        $this->model->Supprimer($_REQUEST['id']);
        header('Location: index.php');
    }
}