<?php
class homeView
{
	public function __construct(){
	}

	public function home($dataClient, $dataArticle, $dataFacture)
	{
		$html="";
		$html.='

		<div class="grid margin20">
		    <div class="row cells2">
		        <div class="cell">
		        	<div class="panel">
					    <div class="heading">
					        <span class="icon mif-profile"></span>
					        <span class="title">Derniers clients</span>
					    </div>
					    <div class="content">
					        <table id="clientTable" class="table striped hovered cell-hovered border bordered">

					        	<thead>
							        <tr>
							            <th class="sortable-column">Nom</th>
							            <th class="sortable-column">Prenom</th>
							            <th class="sortable-column">Entreprise</th>
							            <th class="sortable-column">Nombre de facture</th>
							            <th class="sortable-column">More</th>
							        </tr>
							    </thead>
							    <tbody>
							    ';

							    foreach ($dataClient as $keyClient => $client) 
							    {

								    $html.='
								    	<tr>
								    		<td>'.strtoupper($client["nom"]).'</td>
								    		<td>'.ucfirst($client["prenom"]).'</td>
								    		<td>'.ucfirst($client["entreprise"]).'</td>
								    		<td class="center">'.$client["count(FACTURE.id)"].'</td>
								    		<td class="center"><span class="mif-chevron-right"></span></td>
								    	</tr>
								    ';

								}

							    $html.='
							    </tbody>
					        </table>

					        <script>
					        	$(document).ready(function(){
								    $(\'#clientTable\').DataTable();
								});
					        </script>
					    </div>
					</div>
		        </div>
		        <div class="cell">
		        	<div class="panel">
					    <div class="heading">
					        <span class="icon mif-clipboard"></span>
					        <span class="title">Dernières factures</span>
					    </div>
					    <div class="content">
					        <table id="factureTable" class="table striped hovered cell-hovered border bordered">
					        	<thead>
							        <tr>
							            <th class="sortable-column">Nom Prénom</th>
							            <th class="sortable-column">Date</th>
							            <th class="sortable-column">Statut</th>
							            <th class="sortable-column">Total (CHF)</th>
							            <th class="sortable-column">More</th>

							        </tr>
							    </thead>
							    <tbody>
							    ';
							    foreach ($dataFacture as $keyFacture => $facture) 
							    {
							    	$dateDevis = date("d/m/Y", strtotime($facture["dateDevis"]));

							    	$html.='
							    	<tr>
							    		<td>'.strtoupper($facture["nom"]).' '.ucfirst($facture["prenom"]).'</td>
							    		<td>'.$dateDevis.'</td>
							    	';
							    	if($facture["paye"] == O)
							    	{
							    		if($facture["confirme"] == 0)
							    		{
							    			$html.='<td>Non payé - non confirmé</td>';
							    		}
							    		else
							    		{
							    			$html.='<td>Non payé - confirmé</td>';
							    		}
							    		
							    	}
							    	else //paye == 1
							    	{
							    		if($facture["confirme"] == 0)
							    		{
							    			$html.='<td>Payé - non confirmé</td>';
							    		}
							    		else
							    		{
							    			$html.='<td>Payé - confirmé</td>';
							    		}
							    	}

							    	if($facture["prixTotal"] !== NULL)
							    	{

						
								    	$html.='
								    		
								    		<td class="center">'.$facture["prixTotal"].'.– CHF</td>
								    	';
								    }
								    else
								    {
								    	$html.='<td class="center">–</td>';
								    }

								    $html.='
							    		<td class="center"><span class="mif-chevron-right"></span></td>
							    	</tr>
							    	';
							    }
							    $html.='
							    </tbody>
					        </table>

					        <script>
					        	$(document).ready(function(){
								    $(\'#factureTable\').DataTable();
								});
					        </script>
					    </div>
					</div>
		        </div>
		    </div>
		    <div class="row cells2">
		        <div class="cell">
		        	<div class="panel">
						<div class="heading">
						    <span class="icon mif-bookmarks"></span>
						    <span class="title">Derniers articles</span>
						</div>
						<div class="content">
						    <table id="articleTable" class="table striped hovered cell-hovered border bordered">

					        	<thead>
							        <tr>
							            <th class="sortable-column">Nom</th>
							            <th class="sortable-column">Prix (CHF)</th>
							            <th class="sortable-column">Max en stock</th>
							            <th class="sortable-column">En stock</th>
							            <th class="sortable-column">Catégorie</th>
							            <th class="sortable-column">More</th>

							        </tr>
							    </thead>
							    <tbody>
							   ';
							    foreach ($dataArticle as $keyArticle => $article) 
							    {
							    	$html.='
							    	<tr>
							    		<td>'.ucfirst($article["nom"]).'</td>
							    		<td class="center">'.$article["prix"].'.– CHF</td>
							    		<td class="center">'.$article["maxEnStock"].'</td>
							    		<td class="center">'.$article["actuellementEnStock"].'</td>
							    		<td>'.$article["type"].'</td>
							    		<td class="center"><span class="mif-chevron-right"></span></td>
							    	</tr>
							    	';
							    }
							    $html.='
							    </tbody>
					        </table>

					        <script>
					        	$(document).ready(function(){
								    $(\'#articleTable\').DataTable();
								});
					        </script>
						</div>
					</div>
		        </div>
		    </div>
		</div>


		';
		echo($html);
	}
}
?>