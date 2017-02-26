<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 20.11.2016
 * Time: 19:20
 */



class DataBase {

	private static $db = null; // Единственный экземпляр класса, чтобы не создавать множество подключений
	private $mysqli; // Идентификатор соединения
	private $sym_query = "{?}"; // "Символ значения в запросе"
	protected $_dbuser;
	protected $_dbname;
	protected $_dbpassword;
	protected $_dbhost;

	/**
	 * @return mysqli
	 */
	public function getMysqli()
	{
		return $this->mysqli;
	}

	/* Получение экземпляра класса. Если он уже существует, то возвращается, если его не было, то создаётся и возвращается (паттерн Singleton) */

	public static function getDB() {
		if (self::$db == null) self::$db = new DataBase();
		return self::$db;
	}

	/* private-конструктор, подключающийся к базе данных, устанавливающий локаль и кодировку соединения */
	private function __construct() {
		$this->_dbhost=Config::get('dbhost');
		$this->_dbuser=Config::get('dbuser');
		$this->_dbpassword=Config::get('dbpass');
		$this->_dbname=Config::get('dbname');
		$this->mysqli = new mysqli($this->_dbhost, $this->_dbuser, $this->_dbpassword,$this->_dbname);
		$this->mysqli->query("SET lc_time_names = 'ru_RU'");
		$this->mysqli->query("SET NAMES 'utf8'");
	}

	/* Вспомогательный метод, который заменяет "символ значения в запросе" на конкретное значение, которое проходит через "функции безопасности" */
	private function getQuery($query, $params) {
		if ($params) {
			for ($i = 0; $i < count($params); $i++) {
				$pos = strpos($query, $this->sym_query);
				$arg = "'".$this->mysqli->real_escape_string($params[$i])."'";
				$query = substr_replace($query, $arg, $pos, strlen($this->sym_query));
				var_dump($query);
			}
		}
		return $query;
	}

	/* SELECT-метод, возвращающий таблицу результатов */
	public function select($query, $params = false) {
		$result_set = $this->mysqli->query($this->getQuery($query, $params));
		if (!$result_set) return false;
		return $this->resultSetToArray($result_set);
	}

	/* SELECT-метод, возвращающий одну строку с результатом */
	public function selectRow($query, $params = false) {
		$result_set = $this->mysqli->query($this->getQuery($query, $params));
		if ($result_set->num_rows != 1) return false;
		else return $result_set->fetch_assoc();
	}

	/* SELECT-метод, возвращающий значение из конкретной ячейки */
	public function selectCell($query, $params = false) {
		$result_set = $this->mysqli->query($this->getQuery($query, $params));
		if ((!$result_set) || ($result_set->num_rows != 1)) return false;
		else {
			$arr = array_values($result_set->fetch_assoc());
			return $arr[0];
		}
	}

	/* НЕ-SELECT методы (INSERT, UPDATE, DELETE). Если запрос INSERT, то возвращается id последней вставленной записи */
	public function query($query, $params = false) {
		$success = $this->mysqli->query($this->getQuery($query, $params));
		if ($success) {
			if ($this->mysqli->insert_id === 0) return true;
			else return $this->mysqli->insert_id;
		}
		else return false;
	}

	/* Преобразование result_set в двумерный массив */
	private function resultSetToArray($result_set) {
		$array = array();
		while (($row = $result_set->fetch_assoc()) != false) {
			$array[] = $row;
		}
		return $array;
	}

	/* При уничтожении объекта закрывается соединение с базой данных */
	public function __destruct() {
		if ($this->mysqli) $this->mysqli->close();
	}
}

