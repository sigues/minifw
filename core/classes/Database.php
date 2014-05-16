<?php

class Database{
	
	public function __construct(){
		include("config/config.php");
		$this->db = new PDO('mysql:host='.$db_config["mysql_host"].';dbname='.$db_config["mysql_db"], $db_config["mysql_user"], $db_config["mysql_pass"], array(
							    PDO::ATTR_PERSISTENT => true
							));
	}

	public function __destruct(){
		$this->db = NULL;
	}

	public function __call($name,$args){
		echo "autogenerando funci&oacute;n <b>".$name."</b><br><br>";
		$pieces = preg_split('/(?=[A-Z])/',$name);
		$res = "";
		
		if($pieces[0] == "get"){
			if($pieces[1] == "Row"){
				$limit = 1;
			} else if($pieces[1] == "Rows"){
				$limit = 0;
			}

			if($pieces[(sizeof($pieces)-1)] == "Id"){
				$field = $this->_id;
			}elseif($pieces[(sizeof($pieces)-1)] == "Array"){
				$field = array();
				foreach($args[0] as $k=>$arg){
					$field[$k]=$arg;
				}
			}else{
				$field = "";
				foreach($pieces as $k=>$piece){
					if($k > 2){
						if($k==3){
							$field = strtolower($piece);
						} else {
							$field .= $piece;
						}
					}
				}
			}
			$res = $this->_getItems($args[0],$field,$limit);
		}
		return $res;
	}

	protected function _getItems($arg,$field,$limit){
		if(is_array($arg)){
			$query = "select * from ".$this->_table." where ";
			foreach($arg as $k=>$v){
				$query .= " $k = '$v' and";
			}
			$query = substr($query, 0, -3); 
		}else{
			$query = "select * from ".$this->_table." where ".$field." = '".$arg."'";
			if($limit>0){
				$query .= " limit 0,".$limit;
			}
		}

		$statement = $this->db->prepare($query);
		$statement->execute();
		$row = $statement->fetch();
		return $row;
	}

	protected function _getItemById($id){
		$select_values = array(':table' => $this->_table,
									':fid' => $this->_id,
									':id' => $id);

		$query = "select * from ".$this->_table." where ".$this->_id." = ".$id;

		$statement = $this->db->prepare($query);
		$statement->execute();
		$row = $statement->fetch();
		return $row;
	}

	protected function _getItemsById($id){
		$select_values = array(':table' => $this->_table,
									':fid' => $this->_id,
									':id' => $id);

		$query = "select * from ".$this->_table." where ".$this->_id." = ".$id;

		$statement = $this->db->prepare($query);
		$statement->execute();
		$row = $statement->fetchAll();
		return $row;
	}

	protected function _getItemByField($value,$field){
		$select_values = array(':table' => $this->_table,
									':field' => $field,
									':value' => $value);

		$query = "select * from ".$this->_table." where ".$field." = '".$value."'";
//echo $query;
		$statement = $this->db->prepare($query);
		$statement->execute();
		$row = $statement->fetch();
		return $row;
	}

	protected function _getItemsByField($value,$field){
		$select_values = array(':table' => $this->_table,
									':field' => $field,
									':value' => $value);

		$query = "select * from ".$this->_table." where ".$field." = '".$value."'";

		$statement = $this->db->prepare($query);
		$statement->execute();
		$row = $statement->fetchAll();
		return $row;
	}

	public function describeTable(){
		$q = $this->db->prepare("DESCRIBE ".$this->_table);
		$q->execute();
		$table_fields = $q->fetchAll(PDO::FETCH_COLUMN);
		return $table_fields;
		//$this->_d = $table_fields;
	}



}