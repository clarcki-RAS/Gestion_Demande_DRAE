<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Table recu</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	
	
	<!-- Fonts and icons -->
	<script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	   <link rel="stylesheet" type="text/css" href="../../vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="../../vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../../src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../src/plugins/datatables/css/responsive.bootstrap4.min.css">
    

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/atlantis.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="green2">
				
			<a href="index.php" class="logo">
					<h1 style="margin-top :10px;"><i class="fas fa-seedling">DRAE HM</i></h1>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="green2">
				
				<div class="container-fluid">
					<div class="collapse" id="rechercher-nav">
						<form class="navbar-left navbar-form nav-rechercher mr-md-3">
							
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-rechercher hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#rechercher-nav" role="button" aria-expanded="false" aria-controls="rechercher-nav">
								<i class="fa fa-rechercher"></i>
							</a>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="dark2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary">
					<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Ajouter</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="../forms/forms.php">
											<span class="sub-item">Insertion des données</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Tables</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="../tables/datatables1.php">
											<span class="sub-item">ITINERAIRE</span>
										</a>
									</li>
									<li>
										<a href="../tables/datatables.php">
											<span class="sub-item">VOITURE</span>
										</a>
									</li>
									<li>
										<a href="../tables/datatables2.php">
											<span class="sub-item">ENVOYEUR</span>
										</a>
									</li>
									<li>
										<a href="../tables/datatables3.php">
											<span class="sub-item">RECEVOIR</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
						
					
						<li class="nav-item">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-bars"></i>
								<p>Autres</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
							<ul class="nav nav-collapse">
									<li>
										<a  href="../tables/recu.php">
											<span class="sub-item">RECU</span>
											
										</a>
										
									</li>
									<li>
										<a  href="../reponse.php">
											<span class="sub-item">Impression des reponses valide</span>
											
										</a>
										
									</li>
									<li>
										<a href="../recherche/search.php">
										<span class="sub-item">RECHERCHER PAR DATE D'ENVOI</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Les tables</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="../index.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">LES TABLES</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">BASE DE DONNEES</a>
							</li>
						</ul>
					</div>
					<div class="row">
				

						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<!-- Modal -->
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Id du voiture</th>
													<th style="width: 50%">Date d'envoi</th>
													<th>Nom de l'Envoyeur</th>
													
													<th>Ville de départ</th>
													<th>Ville d'arrivée</th>
													<th>Colis</th>
													<th>Frais</th>
													<th>Nom du recepteur</th>
													<th>Contact du recepteur</th>
							
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody 
											<?php
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=cooperative', 'root', '');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
 
// Si tout va bien, on peut continuer
 
// On récupère tout le contenu de la table client
$reponse = $bdd->query('SELECT * FROM jointure ');
 
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
											>
												<tr>
													<td><?php echo $donnees['idvoit']; ?> </td>
													<td style="width: 50%"><?php echo $donnees['date_envoi']; ?> </td>
													<td><?php echo $donnees['nomenvoyeur']; ?> </td>
													
													<td><?php echo $donnees['villedep']; ?> </td>
													<td><?php echo $donnees['villearr']; ?> </td>
													<td><?php echo $donnees['colis']; ?> </td>
													<td><?php echo $donnees['frais']; ?> </td>
													<td><?php echo $donnees['nomrecepteur']; ?> </td>
													<td><?php echo $donnees['contactrecepteur']; ?> </td>
													
													<td>
													<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Imprimer">
																	
															<a class="btn btn-link btn-primary btn-lg"   href="../FPDF/imprime.php?idvoit=<?php echo $donnees['idvoit']?>"><i class="fa fa-print"></i></a>
																	
															</button>
											
															</div>
                                        			</div>
													</td>
												</tr>
												
													
												<?php
											}
											 
											$reponse->closeCursor(); // Termine le traitement de la requête
											 
											?>											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--table voiture-->
			
			
		
		</div>
		<!---table voiture--->
		
		
		
		<!--   fin   -->
	<!--   Core JS Files   -->
	<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/core/popper.min.js"></script>
	<script src="../../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo2.js"></script>
	
</body>
</html>