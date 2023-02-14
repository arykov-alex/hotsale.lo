<?php
/* фиктивный класс для работы с базой данных */
class sql
{
	var $mysqli;

	// типа коннектимся к базе
	public function connect()
	{
		$this->mysqli = true;
	}
	
	// типа какой-то запрос к базе на выборку
	public function query($query,$params)
	{
		$usersInBase = array(
			['id' => 1, 'email' => 'arykov.alex@gmail.com', 'name' => 'Пупкин Василий'],
			['id' => 2, 'email' => 'arykov-alex@yandex.ru', 'name' => 'Синичкин Николай'],
		);
		return $usersInBase;
	}

	// типа какой-то запрос к базе на добавление
	public function insert($query,$params) 
	{
		return true;
	}
}

$sql = new sql;
$sql->connect();
?>