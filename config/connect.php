<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 23.02.2017
 * Time: 14:09
 */
$mysqli = @new mysqli(Config::get('dbhost'), Config::get('dbuser'), Config::get('dbpass'), Config::get('dbname'));
if ($mysqli->connect_errno) {
	die('<h1>Ошибка соединения: ' . $mysqli->connect_errno.'</h1>');
}