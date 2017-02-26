<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 26.11.2016
 * Time: 17:28
 */
class App {
	protected static $router;

	/**
	 * @return mixed
	 */
	public static function getRouter()
	{
		return self::$router;
	}

	public static function run ($uri){

		self::$router=new Router($uri);
		Lang::load(self::$router->getLanguages());
		$controller_class = ucfirst(self::$router->getController()).'Controller';
		$controller_method = strtolower(self::$router->getMethodPrefix().self::$router->getAction());
		$controller_object = new $controller_class();

		if (method_exists($controller_object, $controller_method)){
			$view_path = $controller_object->$controller_method();
			$view_object=new View($controller_object->getData, $view_path);
			$content = $view_object->render();

		}
		else {

			throw new Exception('Method '.$controller_method.' of class '.$controller_class. ' not find');
		}

		$layaut = self::$router->getRoute();
		$layaut_path=VIEW.DS.$layaut.'.html';
		$layaut_view_object=new View(compact('content'),$layaut_path);
		echo $layaut_view_object->render();
	}
}
