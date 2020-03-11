<?php
class personnel
{
	private $pdo;
    
    public $id;
	public $adresse;
	public $users_id;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Lister()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT employes.id,employes.adresse,employes.users_id,users.prenom,users.nom,users.telephone,users.email
			FROM employes INNER JOIN users ON employes.users_id=users.id");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtenir($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("SELECT employes.id,employes.adresse,employes.users_id,users.prenom,users.nom,users.telephone,users.email
					  FROM employes INNER JOIN users ON employes.users_id=users.id WHERE employes.id = ?");
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Supprimer($id)
	{
		session_start();
		$rol_id=$_SESSION['user']['roles_id'];
    	$ps=$this->pdo->prepare("SELECT * FROM roles WHERE id=$rol_id");
    	$ps->execute();
    	$rol=$ps->fetch();
    	if(!($rol['role']=="admin" || $rol['role']=="pharmaciens")){
        	header("location:$_SERVER[HTTP_REFERER]");
    	}else{
			try 
			{
				$stm = $this->pdo
			            	->prepare("DELETE FROM employes WHERE id = ?");			          

				$stm->execute(array($id));
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}
	}

	public function Maj($data)
	{
		try 
		{
			$sql = "UPDATE employes SET 
						adresse          = ?, 
						users_id          = ?
                        
						
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->adresse,                        
						$data->users_id,
                       
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Creer(personnel $data)
	{
		try 
		{
		$sql = "INSERT INTO employes (adresse,users_id) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->adresse,
                    $data->users_id 
                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}