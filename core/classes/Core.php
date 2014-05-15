<?php
error_reporting(-1);
include_once("core/traits/functions.php");

class Core {
	var $id;

	public function __construct(){
		require("config/config.php");
		$this->configs = $class_config;
		foreach($class_config as $class){
			if(file_exists("application/classes/".$class.".php")){
				require_once("application/classes/".$class.".php");
				$this->$class = new $class();
			} elseif (file_exists("core/classes/".$class.".php")){
				require_once("core/classes/".$class.".php");
				//$this->$class = new $class();
			} else {
				echo $this->_t("Se intent&oacute; cargar una clase inexistente. ".$class);
			}
		}
	}

	public function setUri($uri){
		$x=0;
		$uris = array();
		foreach($uri as $u){
			if($x == 1){
				$uris[]=$u;
			}
			if($u == "index.php"){
				$x = 1;
				$uris[]=$u;
			}
		}
		$this->uri=$uris;
	}

}



