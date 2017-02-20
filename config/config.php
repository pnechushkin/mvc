<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 03.11.2016
 * Time: 17:55
 */
Config::set ('site_name','shvidko.com.ua');
Config::set('routes' , array(
	'default_routes' => 'default',
	'admin' => 'admin_',
	'manager' => 'manager_',
	'user' => 'user_',
));
Config::set ('languages',array('en', 'ru', 'uk'));
Config::set ('default_route','index');
Config::set ('default_languages','ru');
Config::set ('default_controller','pages');
Config::set ('default_action','index');
