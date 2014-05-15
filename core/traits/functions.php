<?php

/*trait functions{
	protected function _t($text){
		echo $text;
	}

}*/

function _t($text){
	echo $text;
}

function _e($text){
	echo __FILE__.":".__LINE__.die($text);
}