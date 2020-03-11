<?php
class depense
{
	private $pdo;
    
    public $id;
    public $intitule;
	public $montant;
	public $date;

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

			$stm = $this->pdo->prepare("SELECT * FROM depenses ");
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
			          ->prepare("SELECT * FROM depenses WHERE id = ?");
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Supprimer($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM depenses WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Maj($data)
	{
		try 
		{
			$sql = "UPDATE depenses SET 
                        intitule        = ?,
						montant      		= ?,
						date          =?
                        
						
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->intitule,
						$data->montant, 
						$data->date,
                       
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Creer(depense $data)
	{
		try 
		{
		$sql = "INSERT INTO depenses (intitule,montant,date) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->intitule, 
					$data->montant,
					$data->date
                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}