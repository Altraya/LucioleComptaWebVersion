<?php
//Class of the data base
class ModelBase
{
	protected static $_db;

	public static function setDb(PDO $db) {
		self::$_db = $db;
	}
}
?>