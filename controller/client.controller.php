<?php
require_once '../../model/client.php';

class clientController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new client();
    }
    
    public function Index(){
        require_once '../../view/client/client.php';
       
    }
    
    public function Crud(){
        $client = new client();
        
        if(isset($_REQUEST['id'])){
            $client = $this->model->Obtenir($_REQUEST['id']);
        }
        require_once '../../view/client/client-editer.php';
        
    }
    
    public function Enregistrer(){
        $client = new client();
        
        $client->id = $_REQUEST['id'];
        $client->denomination = $_REQUEST['denomination'];
        $client->adresse = $_REQUEST['adresse'];
        $client->telephone = $_REQUEST['telephone']; 
        $client->types_id = $_REQUEST['types_id'];   
      

        $client->id > 0 
            ? $this->model->Maj($client)
            : $this->model->Creer($client);
        
        header('Location: index.php');
    }
    
    public function Supprimer(){
        $this->model->Supprimer($_REQUEST['id']);
        header('Location: index.php');
    }
}