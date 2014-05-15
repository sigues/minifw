<?php


class otherController extends core_controller{

	protected $_table = "dieta_has_grupo";
	protected $_id = "iddieta_has_grupo";

	public function index(){
		var_dump($this->model->getRowsByDieta_iddieta(1));
	}
}

?>