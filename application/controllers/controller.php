<?php

include("application/controllers/otherController.php");

class controller extends core_controller{
	
	protected $_table = "usuario";
	protected $_id = "idusuario";

	public function index(){
		echo "<pre>";
		var_dump($this);
		echo "</pre>";

		/*echo "<pre>";
		var_dump($this->model->getRowsByPerfil(1));
		echo "</pre>";*/
		$this->otherController = new otherController();
		echo "<pre>";
		var_dump($this->otherController);
		echo "</pre>";
/*		echo "<br><br>";
		echo "<pre>";
		$this->otherController->index();
		echo "</pre>";
//		echo "estamos en el index de controller";
		echo "<pre>";
		var_dump($this->model->getRowsByContrasena("c893bad68927b457dbed39460e6afd62"));
		echo "</pre>";

		echo "<pre>";
		var_dump($this->otherController->model->getRowsByDieta_iddieta("1"));
		echo "</pre>";*/

	}
}