<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 20.11.2016
 * Time: 19:20
 */
class View {
	protected $data;
	protected $path;



	protected static function getDefaultViewPath (){
		$router=App::getRouter();
		if (!$router) {
			return false;
		}
		$controller_dir=$router->getController();
		$template_name=$router->getMethodPrefix().$router->getAction().'.html';
		return VIEW.DS.$controller_dir.DS.$template_name;

	}

	public function __construct($data=array(), $path=null)
	{

		if (!$path){
			$path = self::getDefaultViewPath();

		}
		if (!file_exists($path))
		{
			throw new Exception('File not find in path '.$path);
		}

		$this->data=$data;
		$this->path=$path;
			}

	public function not_find (){
		ob_start();
		include (VIEW.DS.'404.html');
		$content = ob_get_clean();
		return $content;
	}
	public function render () {

		$data = $this->data;
		ob_start();
		include ($this->path);
		$content = ob_get_clean();
		return $content;
	}
}