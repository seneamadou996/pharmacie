<?php
class pharmacien
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

			$stm = $this->pdo->prepare("SELECT pharmaciens.id,pharmaciens.users_id,pharmaciens.adresse,users.prenom,users.nom,users.telephone,users.email
			FROM pharmaciens INNER JOIN users ON pharmaciens.users_id=users.id");
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
			          ->prepare("SELECT pharmaciens.id,pharmaciens.users_id,pharmaciens.adresse,users.prenom,users.nom,users.telephone,users.email
					  FROM pharmaciens INNER JOIN users ON pharmaciens.users_id=users.id WHERE pharmaciens.id = ?");
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
    	if(!($rol['role']=="admin")){
        	header("location:$_SERVER[HTTP_REFERER]");
    	}else{
			try 
			{
				$stm = $this->pdo
			            	->prepare("DELETE FROM pharmaciens WHERE id = ?");			          

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
			$sql = "UPDATE pharmaciens SET 
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

	public function Creer(pharmacien $data)
	{
		try 
		{
		$sql = "INSERT INTO pharmaciens (adresse,users_id) 
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