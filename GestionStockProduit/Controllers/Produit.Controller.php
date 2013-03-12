<?php
	/*  Controlers : Produit*/
	//Inclusion de Classe Mère
	require_once('Controller.Controller.php');
	class ProduitController extends Controller{
		
		//Action index
		public function index(){
			$produit = new ProduitModel();
			//met dans viewData une liste des produits
			$this->viewData['listProduit'] = $produit->listProduit();
			$this->View(__FUNCTION__);
		}
		//Action :ajouter
		public function ajouter(){
			$produit = new ProduitModel();
			$this->viewData['produit'] = $produit;
			$famille = new FamilleProduit();
			$this->viewData['listFamille'] = $famille->listFamilleProduit();
			/*Pour éviter que les message d'erreurs ne soient afficher au premier 
			appel de la vue, on vérifier */
			if(!isset($_POST['designation']))
				$this->View(__FUNCTION__);
			else{
			$produit->setDesignation($_POST['designation']);
			$produit->AddModelError("designation", " * Erreur Désignation");
			$produit->setPrixUnitaire($_POST['prix']);
			$produit->AddModelError("prixUnitaire", " * Erreur Prix Unitaire");
			$produit->setTva($_POST['tva']);
			$produit->AddModelError("tva", " * Erreur tva");
			$produit->setQuantite($_POST['quantite']);
			$produit->AddModelError("quantite", " * Erreur Quantité");
			$produit->setIdFamille($_POST['famille']);
			//Validation des données.
			if($produit->IsValid()){
				$produit->addProduit();
				//rederiction vers index.phtml
				$this->RederictAction("Produit");
			}else
				$this->View(__FUNCTION__);
			}
		}
		//Action : Modifier
		public function modifier($id){
			$produit = new ProduitModel();
			$this->viewData['produit'] = $produit->findProduit($id);
			$famille = new FamilleProduit();
			$this->viewData['listFamille'] = $famille->listFamilleProduit();
			if(!isset($_POST['designation']))
				$this->View( __FUNCTION__);
			else{
				$produit->setDesignation($_POST['designation']);
				$produit->AddModelError("designation", " * Erreur Désignation");
				$produit->setPrixUnitaire($_POST['prix']);
				$produit->AddModelError("prixUnitaire", " * Erreur Prix Unitaire");
				$produit->setTva($_POST['tva']);
				$produit->AddModelError("tva", " * Erreur tva");
				$produit->setQuantite($_POST['quantite']);
				$produit->AddModelError("quantite", " * Erreur Quantité");
				$produit->setIdFamille($_POST['famille']);
				if($produit->IsValid()){
					$produit->updateProduit($id);
					//rederiction vers index.phtml
					$this->RederictAction("Produit");
				}else
					$this->View( __FUNCTION__);
			}
		}
		//Action : Supprimer
		public function supprimer($id){
			$produit = new ProduitModel();
			$this->viewData['produit'] = $produit->findProduit($id);
			$famille = new FamilleProduit();
			$this->viewData['listFamille'] = $famille->listFamilleProduit();
			if(isset($_POST['id'])){
				$produit->deleteProduit($id);
				//rederiction vers index.phtml
				$this->RederictAction("Produit");
			}
			$this->View(__FUNCTION__);
		}
		//Action : Stocker
		public function stocker($id){
			$stock = new StockModel();
			$stock->setIdProduit($id);
			$this->viewData['stock'] = $stock;
			$this->viewData['listStock'] = $stock->listStockProduit();
			if(!isset($_POST['date']))
				$this->View( __FUNCTION__);
			else{
				$stock->setDate($_POST['date']);
				$stock->AddModelError("date", " * Date invalide");
				$stock->setQuantite($_POST['quantite']);
				$stock->AddModelError("quantite", " * Quantite invalide");
				if($stock->IsValid()){
					$stock->addStock();
					//rederiction vers index.phtml
					$this->RederictAction("Produit");
				}else
					$this->View( __FUNCTION__);
			}
		}
		//Autre Actions : ....
	}
?>

