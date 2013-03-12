<?php
	/* Models : Model une classe abstraite, classe mère de toutes les modèle */
	abstract class Model{
		//Tableau sera rempli par les nom des attributs no valide.
		protected $ErrorAttribut = array();
		//Tableau contiendra les attributs no valide et les messages d'erreur.
		protected $listError = array();
		
		//Méthodes de Validation des Attributs
		
		/**
			* @desc  Spécifie le message d'erreur pour les éventuels attributs no valide.
			* @param   str $attribut      Nom de l'attribut
			* @param   str $messageError            Message d'erreur
		*/
		public function AddModelError($attribut, $messageError){
			global $ErrorAttribut;
			global $listError;
			for($i=0; $i<count($ErrorAttribut); $i++)
				if($ErrorAttribut[$i] === $attribut)
					$listError[$attribut] = $messageError;
		}
		
		/**
			* @desc  Retourne le message d'erreur de l'attribut no valide.
			* @param   str $attribut      Nom de l'attribut
			* @return   $listError  or ""         Retourne un tableau ou vide      
		*/
		public function ValidationMessage($attribut){
			global $listError;
			if(sizeof($listError)>0);
				return $listError[$attribut];
					
			return "";
		}
		/**
			* @desc  Vérifie s'il y des attributs no valides pour empécher une 
					action sur la base de données.
			* @return   1 or 0          validé ou no validé
		*/
		public function IsValid(){
			global $ErrorAttribut;
			if(count($ErrorAttribut)==0)
				return 1;
			else
				return 0;
		}
	}
?>