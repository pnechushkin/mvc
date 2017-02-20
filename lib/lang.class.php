<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 07.02.2017
 * Time: 1:05
 */
class Lang {
	protected static $data;

	public static function get ($key,$def_val=''){
		return isset(self::$data[strtolower($key)]) ? self::$data[strtolower($key)] : $def_val;
	}


	public static function load ($lang_code){
		$lang_file_path=ROOT.DS.'lang'.DS.strtolower($lang_code).'.php';
		if (file_exists($lang_file_path)){
			echo self::$data;
			self::$data=include ($lang_file_path);
		}
		else {

			throw new Exception('Lang file not find '.$lang_file_path);
		}
	}
}