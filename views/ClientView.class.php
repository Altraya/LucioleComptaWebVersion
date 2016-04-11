<?php
class clientView
{
	public function __construct(){
	}

	public function clientInfo($infoClient, $facturesAndArticle)
	{
		$html="";
		$html.='
	
            <div class="accordion" data-role="accordion">
			    <div class="frame active">
			        <div class="heading">Informations sur le client</div>
			        <div class="content">Frame content</div>
			    </div>
			    
			    <div class="frame">
			        <div class="heading">Factures liées au client</div>
			        <div class="content">Frame content</div>
			    </div>
			</div>
		
		';
		return $html;
	}

	public function show($content)
	{
		$html="";
		/*$html='
			<!DOCTYPE html>
			<html lang="fr">
				<head>
					<title>Luciole Compta - Accounting software</title>
					<meta charset="utf-8"/>
					<link rel="stylesheet" href="<?=ADDRESSCSS ?>/css/metro.css">
					<link rel="stylesheet" href="<?=ADDRESSCSS ?>/css/metro-responsive.css">
					<link rel="stylesheet" href="<?=ADDRESSCSS ?>/css/metro-icons.css">
					<link rel="stylesheet" href="<?=ADDRESSCSS ?>/css/style.css">
					<link rel="stylesheet" href="//cdn.datatables.net/responsive/1.0.3/css/dataTables.responsive.css">


					<script src="<?=ADDRESSCSS ?>/js/jquery.min.js"></script>
			    	<script src="<?=ADDRESSCSS ?>/js/metro.js"></script>
			    	<script src="<?=ADDRESSCSS ?>/js/datatables.min.js"></script>
			    	<script src="//cdn.datatables.net/responsive/1.0.3/js/dataTables.responsive.js"></script>
				</head>
				<body>
					<div class="container">
						<div class="row">
							<div class="cell">
			';*/
			$html.= $content;
			/*$html.='
							</div>
						</div>
					</div>
				</body>
			</html>
		';*/
		echo($html);
	}
}
?>