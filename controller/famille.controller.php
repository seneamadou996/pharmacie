<?php
require_once '../../model/famille.php';

class familleController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new famille();
    }
    
    public function Index(){
        require_once '../../view/famille/famille.php';
       
    }
    
    public function Crud(){
        $famille = new famille();
        
        if(isset($_REQUEST['id'])){
            $famille = $this->model->Obtenir($_REQUEST['id']);
        }
        require_once '../../view/famille/famille-editer.php';
        
    }
    
    public function Enregistrer(){
        $famille = new famille();
        
        $famille->id = $_REQUEST['id'];
        $famille->code = $_REQUEST['code'];
        $famille->famille = $_REQUEST['famille'];

        $famille->id > 0 
            ? $this->model->Maj($famille)
            : $this->model->Creer($famille);
        
        header('Location: index.php');
    }
    
    public function Supprimer(){
        $this->model->Supprimer($_REQUEST['id']);
        header('Location: index.php');
    }
}