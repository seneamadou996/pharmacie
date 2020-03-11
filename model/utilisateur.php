<?php
class utilisateur
{
	private $pdo;
    
    public $id;
    public $nom;
    public $prenom;
	public $telephone;
	public $email;
	public $roles_id;
	public $password;

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

			$stm = $this->pdo->prepare("SELECT *,roles.role FROM users INNER JOIN roles ON users.roles_id=roles.id");
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
			          ->prepare("SELECT *,roles.role FROM users INNER JOIN roles ON users.roles_id=roles.id WHERE users.id = ?");
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
			            	->prepare("DELETE FROM users WHERE id = ?");			          

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
			$sql = "UPDATE users SET 
                        nom        = ?,
						prenom      		= ?,
						telephone          = ?,
						email          = ?, 
						roles_id          = ?,
						password          = ? 
                        
						
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nom,
				    	$data->prenom,                         
						$data->telephone,
						$data->email,
						$data->roles_id,
						$data->password,
                       
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Creer(utilisateur $data)
	{
		try 
		{
		$sql = "INSERT INTO users (nom,prenom,telephone,email,roles_id,password) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nom,
				    $data->prenom,                         
					$data->telephone,
					$data->email,
					$data->roles_id,
					$data->password
                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}