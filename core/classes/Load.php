<?php


class Load{
	public function __construct(){
		$requestURI = explode('/', $_SERVER['REQUEST_URI']);
		$this->setUri($requestURI);
	}

	function view($view, $data=null, $buffer = false){
		if($buffer == false){
			include("application/views/".$view.".php");
		} else {
			ob_start();
			include("application/views/".$view.".php");
			$content = ob_end_clean();
			return $content;
		}
	}

	public function setUri($uri){
		$this->_host = $_SERVER["HTTP_HOST"];
		$segments = explode("index.php/", $_SERVER["REQUEST_URI"]);
		$this->_requestUri = $segments[0];
		$this->base_url = "http://".$this->_host.$this->_requestUri;
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