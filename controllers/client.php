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
					require_once('models/ModelClient.class.php');
					$modelC = new ModelClient();
					$id = 3;
					$clientData = $modelC->getInfoClient($id);

					$clientV = new ClientView();
					$htmlAccordion = $clientV->clientInfo($clientData,"");
					$clientV->show($htmlAccordion);

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