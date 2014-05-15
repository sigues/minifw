<?php

include_once("core/classes/Database.php");


class core_model extends Database{
	var $_table;
	var $_id;

	public function __construct($table,$id){
		parent::__construct($id,$table);
		$this->_table = $table;
		$this->_id = $id;
		$this->d = $this->_readModel();
	}

	protected function _readModel(){
		return $this->describeTable();
	}
}