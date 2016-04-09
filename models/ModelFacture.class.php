<?php
	require_once 'base.php';
	
	//Classe User qui défini un utilisateur
	class ModelFacture extends ModelBase
	{
		
		public function getAllFactures()
		{
			$factures = array();
			$sql = "SELECT * FROM FACTURE WHERE 1";

			$req = self::$_db->prepare($sql);
			$req->execute();
			while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
				$factures[] = $donnees;
			}

			if($req->rowCount() >= 0)
				return $factures;
			else
				die("Erreur dans la récupération des factures <br/>");
		}
	
		public function getInfoFactureHomepage()
		{
			$factures = array();
			$sql = "SELECT CLIENT.nom, CLIENT.prenom, FACTURE.id, dateDevis, paye, confirme, prixTotal FROM FACTURE JOIN CLIENT ON CLIENT.id = FACTURE.idClient WHERE 1";
			$req = self::$_db->prepare($sql);
			$req->execute();
			while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
				$factures[] = $donnees;
			}

			if($req->rowCount() >= 0)
				return $factures;
			else
				die("Erreur dans la récupération des factures <br/>");
		}

	}

?>