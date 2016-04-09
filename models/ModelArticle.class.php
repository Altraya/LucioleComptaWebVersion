<?php
	require_once 'base.php';
	
	//Classe User qui défini un utilisateur
	class ModelArticle extends ModelBase
	{
		
		public function getAllArticles()
		{
			$articles = array();
			$sql = "SELECT * FROM ARTICLE WHERE 1";

			$req = self::$_db->prepare($sql);
			$req->execute();
			while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
				$articles[] = $donnees;
			}

			if($req->rowCount() >= 0)
				return $articles;
			else
				die("Erreur dans la récupération des articles <br/>");
		}

		public function getInfoArticleHomepage()
		{
			$articles = array();
			$sql = "SELECT ARTICLE.nom, prix, maxEnStock, actuellementEnStock, CATEGORIE.type FROM ARTICLE JOIN CATEGORIE ON ARTICLE.idCategorie = CATEGORIE.id WHERE 1";
			$req = self::$_db->prepare($sql);
			$req->execute();
			while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
				$articles[] = $donnees;
			}

			if($req->rowCount() >= 0)
				return $articles;
			else
				die("Erreur dans la récupération des articles <br/>");
		}
	
	}

?>