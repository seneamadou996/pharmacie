<?php
class privilege
{
	private $pdo;
    
    public $id;
    public $role;

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

			$stm = $this->pdo->prepare("SELECT * FROM roles");
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
			          ->prepare("SELECT * FROM roles WHERE id = ?");
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
			            	->prepare("DELETE FROM roles WHERE id = ?");			          

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
			$sql = "UPDATE roles SET 
                        role        = ?
                        
						
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->role,
                       
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Creer(privilege $data)
	{
		try 
		{
		$sql = "INSERT INTO roles (role) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->role
                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}