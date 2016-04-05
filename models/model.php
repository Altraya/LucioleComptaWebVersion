<?php
	//on inclus une seul fois si ce n'est pas déja fais la classe suivante
	require_once 'base.php';
	
	//Classe User qui défini un utilisateur
	class Model extends ModelBase
	{
		private $_id;
		private $_pseudo;
		private $_psw;
		
		//Méthode statique permettant d'inserer un nouvel utilisateur dans la base de donnée
		public static function insertUser($pseudo,$psw)
		{
			$query = 'INSERT INTO users SET pseudo = :pseudo, psw = :psw';
			$sql = self::$_db->prepare($query);
			$sql->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
			$sql->bindValue(':psw', $psw, PDO::PARAM_STR);
			$sql->execute();
		}
		
		//Autre méthodes ....
		
	
	}

?>