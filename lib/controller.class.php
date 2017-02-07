<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 15.11.2016
 * Time: 17:33
 */

class Controller {
	protected $data;
	protected $params;
	protected $model;


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
	public function getModel()
	{
		return $this->model;
	}

	/**
	 * @return mixed
	 */
	public function getData()
	{
		return $this->data;
	}
	protected function redirect($url){
		header('Location: '.$url, true, 302);
		exit(0);
	}
	public function __construct($data=array())
	{
		$this->data = $data;
		$this->params=App::getRouter()->getParams();

	}
}