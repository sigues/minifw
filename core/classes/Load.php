<?php


class Load{
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
}