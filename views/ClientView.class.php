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
			        <div class="content">Frame content</div>
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
}
?>