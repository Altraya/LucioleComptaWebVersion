<?php

require_once 'models/ModelClient.class.php';

class Controller_Client
{
	//Méthode gérant l'affichage des informations concernant le client
	public function show()
	{
		switch ($_SERVER['REQUEST_METHOD'])
		{
			case 'GET' :
				try{
					require_once('views/ClientView.class.php');
					
					$clientV = new ClientView();
					$test = $clientV->clientInfo("", "");
					$clientV->show($test);

				}catch(Exception $e){
					echo "Erreur dans la tentative d'affichage des informations des clients";
				}
				
				break;
			case 'POST' :
				//Action à faire grace à la page
				//Utilisation des fonction du model ici
		}
	}

	public function actualClient()
	{

	}
}

?>