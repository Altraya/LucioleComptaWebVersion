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
	private $_entreprise;
	private $_adresse1;
	private $_adresse2;
	private $_ville;
	private $_NPA;
	private $_telephone1;
	private $_telephone2;
	private $_email;
	private $_commentaire;

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

	public function getEntreprise(){
		return $this->_entreprise;
	}

	public function getAdresse1(){
		return $this->_adresse1;
	}

	public function getAdresse2(){
		return $this->_adresse2;
	}

	public function getVille(){
		return $this->_ville;
	}

	public function getNPA(){
		return $this->_NPA;
	}

	public function getTelephone1(){
		return $this->_telephone1;
	}

	public function getTelephone2(){
		return $this->_telephone2;
	}

	public function getEmail(){
		return $this->_email;
	}

	public function getCommentaire(){
		return $this->_commentaire;
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

	public function setEntreprise($entreprise){
		$this->_entreprise = htmlspecialchars($entreprise);
	}

	public function setAdresse1($adresse1){
		$this->_adresse1 = htmlspecialchars($adresse1);
	}

	public function setAdresse2($adresse2){
		$this->_adresse2 = htmlspecialchars($adresse2);
	}

	public function setVille($ville){
		$this->_ville = htmlspecialchars($ville);
	}

	public function setNPA($NPA){
		$this->_NPA = htmlspecialchars($NPA);
	}

	public function setTelephone1($telephone1){
		$this->_telephone1 = htmlspecialchars($telephone1);
	}

	public function setTelephone2($telephone2){
		$this->_telephone2 = htmlspecialchars($telephone2);
	}

	public function setEmail($email){
		$this->_email = htmlspecialchars($email);
	}

	public function setcommentaire($commentaire){
		$this->_commentaire = htmlspecialchars($commentaire);
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