<?php
class ClientView
{
	public function __construct(){
	}

	public function clientInfo($infoClient, $facturesAndArticle)
	{
		$html="";
		$html.='
		<div id="ensembleAccordion">
            <div id="clientAccordion" class="accordion" data-role="accordion">
			    <div class="frame active">
			        <div class="heading">Informations sur le client</div>
			        <div class="content">
			        ';
			        	$html.= $this->formEditClient($infoClient);
			        $html.='
			        </div>
			    </div>
			    
			    <div class="frame">
			        <div class="heading">Factures liées au client</div>
			        <div class="content">Frame content</div>
			    </div>
			</div>
		</div>
		';
		return $html;
	}

	public function show($accordionClient)
	{
		$html="";
		$html.= $accordionClient;
		echo($html);
	}

	public function formEditClient($infosClient)
	{
		$html="";
		$html.='
		<div class="flex-grid">
			<form action="index.php" method="post">
				<div class="row flex-just-end toolbar">
 				';
 					$html.= $this->toolbarAction("Client");
 					var_dump($_POST);
 					var_dump($_GET);
 				$html.='
 				</div>
		 		<div class="row cell-auto-size">
			        <div class="cell">
						<div class="input-control text">
						    <label>Nom</label>
						    <span class="mif-user prepend-icon"></span>
						    <input type="text" value="'.$client["nom"].'">
						</div>
					</div>
					<div class="cell">
						<div class="input-control text">
						    <label>Prénom</label>
						    <span class="mif-user prepend-icon"></span>
						    <input type="text">
						</div>
					</div>
					<div class="cell">
						<div class="input-control text">
						    <label>Entreprise</label>
						    <span class="mif-organization prepend-icon"></span>
						    <input type="text">
						</div>
					</div>
					<div class="cell">
						<div class="input-control text">
						    <label>Mail</label>
						    <span class="mif-mail prepend-icon"></span>
						    <input type="text">
						</div>
					</div>
				</div>
				<div class="row cell-auto-size">
					<div class="cell">
						<div class="input-control text">
						    <label>Adresse 1</label>
						    <span class="mif-location prepend-icon"></span>
						    <input type="text">
						</div>
					</div>
					<div class="cell">
						<div class="input-control text">
						    <label>Adresse 2</label>
						    <span class="mif-location prepend-icon"></span>
						    <input type="text">
						</div>
					</div>
					<div class="cell">
						<div class="input-control text">
						    <label>Ville</label>
						    <span class="mif-location prepend-icon"></span>
						    <input type="text">
						</div>
					</div>
					<div class="cell">
						<div class="input-control text">
						    <label>Code Postal</label>
						    <span class="mif-location prepend-icon"></span>
						    <input type="text">
						</div>
					</div>
				</div>
				<div class="row cell-auto-size">
					<div class="cell">
						<div class="input-control text">
						    <label>Fixe</label>
						    <span class="mif-phone prepend-icon"></span>
						    <input type="text">
						</div>
					</div>
					<div class="cell">
						<div class="input-control text">
						    <label>Mobile</label>
						    <span class="mif-mobile prepend-icon"></span>
						    <input type="text">
						</div>
					</div>
				</div>

				<div class="row cell-auto-size">
					<div class="input-control textarea full-size">
						<label>Commentaire</label>
					    <textarea></textarea>
					</div>
				</div>
			</form>
		</div>
		';
		return $html;
	}

	/**
	*	Përmet de generer la toolbar avec les boutons 
	*	editer et supprimer pour l'objet en cours
	*	@param nomformulaire : le nom de l'objet qui va etre editer ou supprimer : Peut être égal à Client / Facture ou Article
	*/
	public function toolbarAction($nomFormulaire)
	{
		$html="";
		$html.='
		
		    <div class="toolbar-section">
		        <button type="submit" name="edit'.$nomFormulaire.'" class="toolbar-button">
		        	<span class="icon mif-pencil">
		        	</span>
		        </button>
		        <button type="submit" name="delete'.$nomFormulaire.'" class="toolbar-button">
	        		<span class="icon mif-cross">
		        	</span>
		        </button>
				
			</div>	
		';
		return $html;
	}
}
?>