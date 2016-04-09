<?php
/*
*	Client.class.php : User object
*
*	Author : Karakayn
*/
class Client{

	private $_id;				
	private $_nom;				
	private $_prenom;		

	/*Constructeur*/
	public function __construct($donnees){
		$this->hydrate($donnees);
	}

	/***************************
		Accesseur de la classe
	****************************/

	public function getId(){
		return $this->_id;
	}

	public function getNom(){
		return $this->_nom;
	}

	public function getPrenom(){
		return $this->_prenom;
	}

	/************************/

	public function setId($id){
		$this->_id = $id;
	}

	public function setNom($nom){
		$this->_nom = htmlspecialchars($nom);	
	}

	public function setPrenom($prenom){
		$this->_prenom = htmlspecialchars($prenom);	
	}

	/************************/

	public function hydrate($donnees)
	{
		foreach($donnees as $key => $value)
		{
			// On récupère le nom du setter correspondant à l'attribut.
			$method = 'set'.ucfirst($key);

			// Si le setter correspondant existe.
			if(method_exists($this, $method))
			{
				// On appelle le setter.
				$this->$method($value);
			}
		}
	}
}
?>