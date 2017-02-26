<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 07.02.2017
 * Time: 1:05
 */
class Lang  {
	protected static $data;

	public static function get ($key,$def_val=''){
		return isset(self::$data[strtolower($key)]) ? self::$data[strtolower($key)] : $def_val;
	}


	public static function load ($lang_code){
		$db=DataBase::getDB();
		$query = "SELECT * FROM `leng` ";
		$table = $db->select($query);
		$rez =array();
		for ($i=0; $i<count($table); $i++)
		{
			$k=$table[$i]['neme'];
			$v=$table[$i][$lang_code];
			$rez[$k]=$v;
		}

		$lang_file_path=ROOT.DS.'lang'.DS.strtolower($lang_code).'.php';
		if (!empty($rez)){
			self::$data=$rez;
		}
		else {

			throw new Exception('Lang code not find '.$lang_code);
		}
	}
}