<?php
class homeView
{
	public function __construct(){
	}

	public function home($dataClient, $dataArticle, $dataFacture)
	{
		$html="";
		$html.='
	<div 
		data-role="dialog" 
		id="dialogClient" 
		class="padding20 dialog" 
		data-close-button="true" 
		data-overlay="true" 
		data-overlay-color="op-dark" 
		data-overlay-click-close="true"
		>
            <p id="dialogContent">
                This dialog with colored overlay
            </p>
        <span class="dialog-close-button"></span>
	</div>

	<div class="container">
		<div class="flex-grid">
		    <div class="row cell-auto-size">
		        <div class="cell">
		        	<div class="panel">
					    <div class="heading">
					        <span class="icon mif-profile"></span>
					        <span class="title">Derniers clients</span>
					    </div>
					    <div class="content">
					';
				$html.= $this->showLastClient($dataClient);
				$html.='
					    </div>
					</div>
		        </div>  <!-- end cell1 -->
		        <div class="cell">
		        	<div class="panel">
					    <div class="heading">
					        <span class="icon mif-clipboard"></span>
					        <span class="title">Dernières factures</span>
					    </div>
					    <div class="content">
				';
				$html.= $this->showLastFacture($dataFacture);
				$html.='
					    </div>
					</div>
		        </div>  <!-- end cell2 -->
		    </div>
		    <div class="row cell-auto-size">
		        <div class="cell flex-align-center">
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
					        		$(\'#articleTable\').DataTable( {
									    responsive: true
									} );
								});
					        </script>
						</div>
					</div>
		        </div> <!-- end cell3 -->
		    </div>
		</div>
	</div>

		';
		echo($html);
	}

	private function showLastClient($dataClient)
	{
		$html = "";
		$html.='
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
			    	$jsonClient = json_encode($client);
			    	
				    $html.='
				    	<tr>
				    		<td>'.strtoupper($client["nom"]).'</td>
				    		<td>'.ucfirst($client["prenom"]).'</td>
				    		<td>'.ucfirst($client["entreprise"]).'</td>
				    		<td class="center">'.$client["count(FACTURE.id)"].'</td>
				    		<td class="center" onclick="showDialog(\'#dialogClient\')">
				    			<span class="mif-chevron-right">
				    			</span>
				    		</td>
				    	</tr>
				    ';

				}

		    $html.='
		    </tbody>
        </table>

					        

        <script>
        	$(document).ready(function()
        	{
			    $(\'#clientTable\').DataTable(
			    {
			    	responsive: true
				});
			});

			function showDialog(id)
			{
			    var dialog = $(id).data(\'dialog\');
			    
			    $.ajax(
	            {
	            	type: "GET",
	                url: "index.php?ctrl=client&method=show&id=1",
	                dataType: "html",
	                success: function(result)
	                {
	                	var myAccordion = $(result).filter(\'#ensembleAccordion\').html();
	                	
	                	$(\'#dialogContent\').empty();
						$(\'#dialogContent\').append(myAccordion);;
	                	
	                	dialog.open();
	                }
	           	});
			    
			}

		</script>
		';
		return $html;
	}

	public function showLastFacture($dataFacture)
	{
		$html="";
		$html.='
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
			    $(\'#factureTable\').DataTable(
			    	{responsive: true}
			    );
			});
        </script>
		';
		return $html;
	}
}
?>