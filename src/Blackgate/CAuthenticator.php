<?php
namespace Jofe\Blackgate;

class CAuthenticator
{
	private $options;
	private $output = null;
	private $lockOutMessage = null;
	private $db;

	public function __construct(COptions $options)
	{
		$this->options = $options;
		$this->db = $options->getDB();
		$this->initAttemptLog();
	}

	private function initAttemptLog()
	{
		$sql = "CREATE TABLE IF NOT EXISTS attempt_log (
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			userId VARCHAR(20) NOT NULL,
			sessionId VARCHAR(80) NOT NULL
		);";
		$this->db->execute($sql);
	}

	public function apply($id = null, $password = null)
	{
		strip_tags($id);
		strip_tags($password);

		$valid = $this->validate($id, $password);
 
		if(!$valid){
			$this->output = "You have to enter the user id and password.";
			return false;
		}else{
			$matching = $this->compare($id, $password);

			if($matching){
				$this->output = "Access granted.";
			}else{
				$this->output = "Access denied. Password or username is invalid.";
				return false;
			}
		}



		return true;
		
	}

	private function compare($id, $password)
	{
		$idCol = $this->options->getIdColName();
		$pwCol = $this->options->getPassColName();
		$salt = $this->options->getSalt();
		$tableName = $this->options->getTableName();
		$delColName = $this->options->getDelColName();
		$actColName = $this->options->getActColName();

		$sql = "SELECT * FROM $tableName WHERE $idCol = ?;";
		$res = $this->db->executeFetchAll($sql, array($id));

		if($res){
			$dbPassword = $res[0]->$pwCol;

			if(empty($res[0]->$actColName)){
				$this->lockOutMessage = "You are not allowed more attempts during this session!";
				return false;
			}

			if(password_verify($password, $dbPassword)){

				return true;
			}else{
				$sql = "INSERT INTO attempt_log (userId, sessionId) VALUES (?,?);";
				$params = array($id,session_id());
				$this->db->execute($sql, $params);

				$sql = "SELECT * FROM attempt_log WHERE userId = ? AND sessionId = ?;";
				$res = $this->db->executeFetchAll($sql,array($id, session_id()));

				if(count($res) >= 3){
					$this->lockOutUser($id);
				}

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
		$now = date('y-m-d H:i:s');
		$tableName = $this->options->getTableName();
		$delColName = $this->options->getDelColName();
		$actColName = $this->options->getActColName();
		$idCol = $this->options->getIdColName();

		$sql = "UPDATE $tableName SET $actColName = ?, $delColName = ? WHERE $idCol = ?;";
		$params = array(NULL,$now, $id);
		$this->db->execute($sql, $params);
	}

	public function restoreUser($id){
		strip_tags($id);
		$now = date('y-m-d H:i:s');
		$tableName = $this->options->getTableName();
		$delColName = $this->options->getDelColName();
		$actColName = $this->options->getActColName();
		$idCol = $this->options->getIdColName();

		$sql = "SELECT * FROM $tableName WHERE $idCol = ?;";
		$res = $this->db->executeFetchAll($sql, array($id));

		if(isset($res[0])){
			$sql = "UPDATE $tableName SET $delColName = ?, $actColName = ? WHERE $idCol = ?;";
			$params = array(NULL,$now,$id);
			$res = $this->db->execute($sql,$params);

			$sql = "DELETE FROM attempt_log WHERE userId = ?;";
			$res = $this->db->execute($sql, array($id));

			return "User restored.";
		}else{
			return "There is no such user!";
		}

	}

	public function getOutput(){

		if($this->lockOutMessage != null){
			return $this->lockOutMessage;
		}

		return $this->output;
	}
}