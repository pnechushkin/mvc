<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 03.11.2016
 * Time: 17:56
 */
require_once (ROOT.DS.'config'.DS.'config.php');
require_once (ROOT.DS.'config'.DS.'connect.php');

function __autoload ($class_name){

	$lib_patch =ROOT.DS.'lib'.DS.strtolower($class_name).'.class.php';
	$controllers_patch =ROOT.DS.'controllers'.DS.str_replace('controller', '', strtolower($class_name)).'.controller.php';
	$models_patch =ROOT.DS.'models'.DS.strtolower($class_name).'.php';
	if (file_exists($lib_patch)) {
		require_once ($lib_patch);
	}
	elseif (file_exists($controllers_patch)){

		require_once ($controllers_patch);
	}
	elseif (file_exists($models_patch)){
		require_once ($models_patch);
	}
	else {
		new Exception('File to include class: '.$class_name);
	}
;

}

function __ ($key,$def_val=''){
	return Lang::get($key,$def_val);
}