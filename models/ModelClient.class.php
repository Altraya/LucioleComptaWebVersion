<?php
	require_once 'base.php';
	require_once 'models/Client.class.php';
	
	//Classe User qui défini un utilisateur
	class ModelClient extends ModelBase
	{
		/*
		public function insertUser($pseudo,$psw)
		{
			$query = 'INSERT INTO users SET pseudo = :pseudo, psw = :psw';
			$sql = self::$_db->prepare($query);
			$sql->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
			$sql->bindValue(':psw', $psw, PDO::PARAM_STR);
			$sql->execute();
		}*/
		
		public function getAllClients()
		{
			$clients = array();
			$sql = "SELECT * FROM CLIENT WHERE 1";

			$req = self::$_db->prepare($sql);
			$req->execute();
			while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
				$clients[] = $donnees;
			}

			if($req->rowCount() >= 0)
				return $clients;
			else
				die("Erreur dans la récupération des clients <br/>");
		}

		public function getInfoClient($id)
		{
			$client;
			$sql = "SELECT * FROM CLIENT WHERE id=$id";
			$req = self::$_db->prepare($sql);
			$req->execute();
			while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
				$client = new Client($donnees);
			}
			if($req->rowCount() >= 0)
				return $client;
			else
				die("Erreur dans la récupération du client $id <br/>");
			
		}

		public function getInfoClientHomepage()
		{
			$clients = array();
			$sql = "SELECT CLIENT.id, nom, prenom, entreprise, count(FACTURE.id) FROM CLIENT JOIN FACTURE ON CLIENT.id = FACTURE.idClient WHERE 1 GROUP BY idClient";

			$req = self::$_db->prepare($sql);
			$req->execute();
			while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
				$clients[] = $donnees;
			}

			if($req->rowCount() >= 0)
				return $clients;
			else
				die("Erreur dans la récupération des clients <br/>");
		}
	
	}

?>