<?php

include_once("core/classes/Database.php");


class core_model extends Database{
	var $_table;
	var $_id;
	var $_columns;
	private $_help;

	public function __construct($table,$id){
		parent::__construct($id,$table);
		$this->_table = $table;
		$this->_id = $id;
		$this->_columns = $this->_readModel();
	}

	protected function _readModel(){
		return $this->describeTable();
	}

	public function getMethods(){
		$methods = array();
		$methods[]="getRowById(int)";
		$methods[]="getRowsById(int||array)";
		foreach($this->_columns as $k=>$column){
			$methods[]="getRowBy".ucfirst($column["Field"])."(".$column["Type"].")";
			$methods[]="getRowsBy".ucfirst($column["Field"])."(".$column["Type"].")";
		}
		return $methods;
	}

	public function help(){
		$this->$_help = true;
	}

}