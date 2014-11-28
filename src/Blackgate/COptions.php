<?php
namespace Jofe\Blackgate;

class COptions
{
	private $db; //The PDO object.
	private $tableName; //Name of the table storing the user information.
	private $idColName; //Name of the identification column.
	private $passColName; //Name of the password column.
	private $salt = PASSWORD_DEFAULT; //The salt which the password is hashed with.



	public function setDB($db){
		$this->db = $db;
	}

	public function setTableName($tableName){
		$this->tableName = $tableName;
	}

	public function setIdColName($idColName){
		$this->idColName = $idColName;
	}

	public function setPassColName($passColName){
		$this->passColName = $passColName;
	}

	public function setSalt($salt){
		$this->salt = $salt;
	}

	public function getDB(){
		return $this->db;
	}

	public function getTableName(){
		return $this->tableName;
	}

	public function getIdColName(){
		return $this->idColName;
	}

	public function getPassColName(){
		return $this->passColName;
	}

	public function getSalt(){
		return $this->salt;
	}

}