<?php
	/* Models : classe FamilleProduit */
	require_once('Model.Model.php');
	class FamilleProduit extends Model{
		private $id;
		private $famille;
		
		//Accesseurs et modificateurs des attributs privé (getters et setters)
		public function getId(){
			return $this->id;
		}
		public function getFamille(){
			return $this->famille;
		}
		public function setFamille($value){
			if(!empty($value))
				$this->famille = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "famille";
			}
		}
		//Ajouter 
		public function addFamilleProduit(){
			$rqt = 'INSERT INTO famillesProduit (famille) VALUES ('.$this->famille.')';
			mysql_query($rqt);
		}
		//Modifier
		public function updateFamilleProduit($idCategorie){
			$rqt = 'UPDATE famillesProduit SET famille = '.$this->famille.' 
			WHERE id = '.$idCategorie;
			mysql_query($rqt);
		}
		//Supprimer
		public function deleteFamilleProduit($idCategorie){
			$rqt = 'DELETE FROM famillesProduit 
			WHERE id = '.$idCategorie;
			mysql_query($rqt);
		}
		//Liste des Produits
		public function listFamilleProduit(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM famillesProduit");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		//Recherche
		public function findFamilleProduit($idCategorie){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM categories 
			WHERE id = ".$idCategorie);
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		//Liste Sous-ensemble
		public function listFamilleProduit_Produit(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM produits 
			WHERE idCategorie = ".$this->id);
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		
	}
?>
