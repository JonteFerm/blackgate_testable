<?php
namespace Jofe\Blackgate;

class CAuthenticator
{
	private $options;
	private $output = null;
	private $db;

	public function __construct(COptions $options)
	{
		$this->options = $options;
		$this->db = $options->getDB();
	}

	public function apply($id = null, $password = null)
	{
		strip_tags($id);
		strip_tags($password);

		$valid = $this->validate($id, $password);
 
		if(!$valid){
			$this->output = "You have to enter the user id and password.";
		}else{
			$matching = $this->compare($id, $password);

			if($matching){
				$this->output = "Access granted";
			}else{
				$this->output = "Access denied. Password or username is invalid.";
			}
		}

		return $this->output;
	}

	private function compare($id, $password)
	{
		$idCol = $this->options->getIdColName();
		$pwCol = $this->options->getPassColName();
		$salt = $this->options->getSalt();

		$sql = "SELECT * FROM user WHERE $idCol = ?;";
		$res = $this->db->executeFetchAll($sql, array($id));

		if($res){
			$dbPassword = $res[0]->$pwCol;

			if(password_verify($password, $dbPassword)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}


	}

	private function validate($id, $password)
	{
		if(empty($id) || empty($password)){
			return false;
		}

		return true;
	}

	private function lockOutUser($id){

	}
}