<?php
	//begin the session
	session_start();

	//Inclusion of config and base(model)
	require_once 'config.php';
	require_once 'models/base.php';

	//Constant variable for web site adress and css adress
	define('ADDRESS', dirname($_SERVER['SCRIPT_NAME']).'/index.php');
	define('ADDRESSCSS', dirname($_SERVER['SCRIPT_NAME']));

	//Database definition
	try{
        $dataBase = new PDO('mysql:host='.BDD_HOST.';dbname='.BDD_NAME,BDD_USER,BDD_PW);
    }catch (PDOException $e){
        echo $e->getMessage();
    }
	ModelBase::setDb($dataBase);

	//Démarrage de la temporisation de sortie
	ob_start();

	$found = false;

	

	//Si la variable $_SERVER['PATH_INFO'] existe
	if (isset($_SERVER['PATH_INFO'])){
		$args = explode('/',$_SERVER['PATH_INFO']);

		//On vérifie si le chemin contient 3 arguments ou plus
		if (count($args)>=3)
		{
			//Récupération du controlleur
			$controller = $args[1];
			//Récupération de la méthode
			$method = $args[2];
			//Récupération des paramètres
			$params = array();
			for ($i = 3; $i<count($args); $i++){
				$params[] = $args[$i];
			}
			$controller_file = 'controllers/'.$controller.'.php';
			//Si le fichier du controlleur existe
			if (file_exists($controller_file)){
				//On l'integre dedans si ce n'est pas deja fait
				
				require_once $controller_file;

				$controller_name = 'Controller_'.ucfirst(strtolower($controller));
				//Si le controlleur existe
				if (class_exists($controller_name)){

					$c = new $controller_name;
					//Si il y a une méthode de son nom (du controlleur) qui existe
					if (method_exists($c,$method)){
						//On appelle la méthode avec les différents paramètres quand il y en a
						call_user_func_array(array($c, $method),$params);
						$found = true;
					}
				}
			}
		}
	}
	//Choix par defaut si l'un des tests precedents à échoué
	if (!$found){
		require_once 'views/home.php';
	}
	$content = ob_get_clean();

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Luciole Compta - Accounting software</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="<?=ADDRESSCSS ?>../css/metro.css">
		<link rel="stylesheet" href="<?=ADDRESSCSS ?>../css/metro-icons.css">
		<link rel="stylesheet" href="<?=ADDRESSCSS ?>../css/style.css">


		<script src="<?=ADDRESSCSS ?>../js/jquery.min.js"></script>
    	<script src="<?=ADDRESSCSS ?> ../js/metro.js"></script>
    	<script src="<?=ADDRESSCSS ?> ../js/datatables.min.js"></script>
	</head>
	<body>
		<?php
			require_once 'views/menu.html';
		?>


		<?=$content ?>

	</body>
</html>