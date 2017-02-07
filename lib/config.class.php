<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 03.11.2016
 * Time: 17:18
 */
class Config {

	protected static $settings = array();

	public static function get ($key){
		return isset(self::$settings[$key]) ? self::$settings[$key] : null;
	}

	public static function set ($key, $value) {
		self::$settings[$key]=$value;
}

}

