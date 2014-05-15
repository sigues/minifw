<?php

include_once("core/classes/Core.php");
//include_once("core/classes/Loader.php");
include_once("core/models/core_model.php");

class core_controller extends Core{
	
	public function __construct(){
		parent::__construct();
		if($this->_table != "" && $this->_id != ""){
			$this->model = new core_model($this->_table,$this->_id);
		}
	}

	public function load(){
//		$this->load = new Loader();
	}
}