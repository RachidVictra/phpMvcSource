<?php
	/* Models : classe Stocks */
	//Inclusion de Classe Mère
	require_once('Model.Model.php');
	class StockModel extends Model{
		private $id;
		private $date;
		private $quantite;
		private $idProduit;
		
		//Accesseur des attributs privé (getter et setter)
		public function getId(){
			return $this->id;
		}
		
		public function getDate(){
			return $this->date;
		}
		public function setDate($value){
			if(strpos($value, '/'))
				$dt = explode('/', $value);
			elseif(strpos($value, '-'))
				$dt = explode('-', $value);
			if(checkdate((int) $dt[1], (int) $dt[0], (int) $dt[2]))
				$this->date = $dt[2].'/'.$dt[1].'/'.$dt[0];
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "date";
			}
		}
		
		public function getQuantite(){
			return $this->quantite;
		}
		public function setQuantite($value){
			if(is_numeric($value))
				$this->quantite = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "quantite";
			}
		}
		public function getIdProduit(){
			return $this->idProduit;
		}
		public function setIdProduit($value){
			$this->idProduit = $value;
		}
		//Ajouter 
		public function addStock(){
			$rqt = 'INSERT INTO stocks (dateStock, quantite, idProduit) 
			VALUES ("'.$this->date.'", '.$this->quantite.', 
			'.$this->idProduit.')';
			mysql_query($rqt);
		}
		//Modifier
		public function updateStock($idStock){
			$rqt = 'UPDATE stocks SET dateStock = 
			DATE_FORMAT('.$this->date.',"%Y/%m/%d"), quantite = 
			'.$this->quantite.', idProduit = '.$this->idProduit.' 
			WHERE id = '.$idStock;
			mysql_query($rqt);
		}
		//Supprimer
		public function deleteStock($idStock){
			$rqt = 'DELETE FROM stocks WHERE id = '.$idStock;
			mysql_query($rqt);
		}
		//Liste des stocks
		public function listStock(){
			$rqt = "SELECT * FROM stocks";
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		//Recherche
		public function findStock($idStock){
			$rqt = "SELECT * FROM stocks WHERE id = ".$idStock;
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		//Liste de Stock (Sous-ensemble)
		public function listStockProduit(){
			$tab = array();
			$rqt = mysql_query("SELECT id, DATE_FORMAT(dateStock, '%d/%m/%Y') 
			as date, quantite FROM Stocks WHERE idProduit = " . $this->idProduit);
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		
	}
?>