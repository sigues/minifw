<?php
include_once("core/controllers/core_controller.php");
include("config/config.php");

$requestURI = explode('/', $_SERVER['REQUEST_URI']);

if(!isset($requestURI[3]) || $requestURI[3] == ""){
	$uriController = $default_controller;
	$uriAction = "index";
}else{
	$uriController = $requestURI[3];
	$uriAction = (isset($requestURI[4])) ? $requestURI[4] : "index" ;
}

if(file_exists("application/controllers/".$uriController.".php")){
	include_once("application/controllers/".$uriController.".php");
	$controller = new $uriController();
	$controller->setUri($requestURI);
	if(method_exists($controller,$uriAction)){
		$controller->$uriAction();
	} elseif(method_exists($controller,'index')){
		$controller->index();
	} else {
		_e('No existe el m&eacute;todo: '.$uriController."::".$uriAction."(). Lo debe crear en application/controllers/".$uriController.".php");
	}
}else{
	_e("no encontr&oacute; el archivo: "."application/controllers/".$uriController.".php");
	//$core = new Core();
}




?>