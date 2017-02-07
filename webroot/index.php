<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 03.11.2016
 * Time: 16:59
 */
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(dirname(__FILE__)));
define('CSS','webroot'.DS.ROOT.DS.'css'.DS);
define('JS','webroot'.DS.ROOT.DS.'js'.DS);
define('upl','webroot'.DS.ROOT.DS.'uplouds');
define('VIEW',ROOT.DS.'views');
echo ROOT;

require_once (ROOT.DS.'lib'.DS.'init.php');
$url=$_SERVER['REQUEST_URI'];

App::run($url);


