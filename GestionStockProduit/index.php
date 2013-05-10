<?php
	session_start();
?>
<html>
	<head>
		<title></title>
		<link href="Views/Style/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="wrap">
			<div id="header">
				<h1>Géstion des Stocks</h1>
			</div>
			<div id="content">
				<div id="Menu">
					<h3>Menu</h3>
					<ul>
						<li><a href="?controler=Home">Home</a></li>
						<li><a href="?controler=Produit">Stocks</a></li>
						<li><a href="?controler=Fournisseur">Fournisseurs</a></li>
					</ul>
				</div>
				<div id="main">
					<?php
						//Connexion au serveur de base de données
						mysql_connect('localhost', 'root', '');
						mysql_select_db('stockProduits');
						/*Traitement de la Requete*/ 
						$controler = 'Home';
						$action = 'index';
						$id = '';
						if(!empty($_GET['controler'])){
							$controler = $_GET['controler'];
							if(!empty($_GET['action'])){
								$action = $_GET['action'];
								if(!empty($_GET['id']))
									$id = $_GET['id'];
							}
						}
						//On inclut le fichier de conrtoleur spécifier s'il existe
						if(is_file('Controllers/'.$controler.'.Controller.php')){
							include 'Controllers/'.$controler.'.Controller.php';
							$class = $controler."Controller";
							$objet = new $class();
							$objet->$action($id);
						}
						//Fermeture de connexion avec Serveur de DB
						mysql_close();
					?>
				</div>
			</div>
			<div id="footer">
				Programmation en Pratique 2012
			</div>
		</div>
	</body>
</html>