<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 03.11.2016
 * Time: 17:45
 */
class Router {
	protected $uri;
	protected $controller;
	protected $action;
	protected $params;
	protected $route;
	protected $method_prefix;
	protected $language;
	protected $getrequest;

	/**
	 * @return mixed
	 */
	public function getGetrequest()
	{

		return $this->getrequest;
	}

	/**
	 * @return mixed
	 */
	public function getUrl()
	{
		return $this->url;
	}
	/**
	 * @return mixed
	 */
	public function getController()
	{
		return $this->controller;
	}
	/**
	 * @return mixed
	 */
	public function getAction()
	{
		return $this->action;
	}
	/**
	 * @return mixed
	 */
	public function getParams()
	{
		return $this->params;
	}
	/**
	 * @return mixed
	 */
	public function getRoute()
	{
		return $this->route;
	}
	/**
	 * @return mixed
	 */
	public function getMethodPrefix()
	{
		return $this->method_prefix;
	}
	/**
	 * @return mixed
	 */
	public function getLanguages()
	{
		return $this->language;
	}

	public function __construct($uri)
	{
		$this->uri=urldecode(trim($uri,'/'));
		$routes=Config::get('routes');
		$this->route=$routes['default_routes'];
		$this->method_prefix=isset($routes[$this->route]) ? $routes[$this->route] : '';
		$this->language=Config::get('default_languages');
		$this->controller=Config::get('default_controller');
		$this->action=Config::get('default_action');
		$uri_parts=explode('?', $this->uri);
		$path=$uri_parts[0];
		$get_message=$uri_parts[1];
		$path_parts=explode('/',$path);
		if (!empty($get_message)){
			$this->getrequest=$get_message;
		}
		if ( count($path_parts) ){
			// Get route or language at first element
			if ( in_array(strtolower(current($path_parts)), array_keys($routes)) ){
				$this->route = strtolower(current($path_parts));
				$this->controller = $this->route;
				$this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
				array_shift($path_parts);
			}

			if  (in_array(strtolower(current($path_parts)), Config::get('languages'))){
				$this->language = strtolower(current($path_parts));
				array_shift($path_parts);
			}

			// Get action
			if ( current($path_parts) ){
				$this->action = strtolower(current($path_parts));
				array_shift($path_parts);
			}

			// Get params - all the rest
			$this->params = $path_parts;
		}

	}

}

