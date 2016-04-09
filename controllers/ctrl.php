<?php

//On inclu les models utiles au controller
require_once 'models/model.php';

class Controller_Ctrl
{
	//Méthode gérant l'inscription
	public function page1()
	{
		switch ($_SERVER['REQUEST_METHOD'])
		{
			case 'GET' :
				//Acces à la page demandé
				try{
					require_once 'views/page1.php';
				}catch(Exception $e){
					echo 'Erreur';
				}
				
				break;
			case 'POST' :	
				//Action à faire grace à la page
				//Utilisation des fonction du model ici
		}
	}
}

?>