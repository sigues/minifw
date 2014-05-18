<?php

include("application/controllers/otherController.php");

class controller extends core_controller{
	
	protected $_table = "usuario";
	protected $_id = "idusuario";

	public function index(){
		echo "<pre>";
		var_dump($this);
//		var_dump($this->model->getMethods());
		echo "</pre>";
		echo "<pre>";
//		var_dump($this->model->getRowById(1));
		echo "</pre>";
//		$this->otherController = new otherController();
//		echo "<pre>";
		//var_dump($this->otherController);
//		echo "</pre>";
		echo "<br><br>";
		$this->load->view("bootstrap");

	}
}