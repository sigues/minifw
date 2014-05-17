<?php


class otherController extends core_controller{

	protected $_table = "dieta_has_grupo";
	protected $_id = "iddieta_has_grupo";

	public function index(){
//		var_dump($this->model->getRowsByDieta_iddieta(1));
		 
	}

	public function getArray(){
		$filter = array("horario_idhorario"=>1,
						"dieta_iddieta"=>1);
		return $this->model->getRowsByArray($filter);
			
	}

	public function getArrayItem(){
		$filter = array("horario_idhorario"=>"1",
						"dieta_iddieta"=>array(">=","1"));
		return $this->model->getRowsByArray($filter);
			
	}
}

?>