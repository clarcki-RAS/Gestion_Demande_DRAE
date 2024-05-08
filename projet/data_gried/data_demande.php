<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>DRAE HM</title>
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

	<!-- CSS Files -->
	
	<style>
        /* Style pour la pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 10px;
			margin-bottom: 10px;
        }

        .pagination button {
            margin: 0 5px;
            cursor: pointer;
        }
    </style>

	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/atlantis.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../assets/css/demo.css">
</head>
<body>
	<div class="wrapper sidebar_minimize">
		<div class="main-header">
			<!-- Logo Header -->
<div class="logo-header" data-background-color="dark2">
            
    <a href="../index.php" class="logo">
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
<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark2">
            
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
								<i class="fas fa-user-plus"></i>
								<p>Insertion des données</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="../forms/forms_ass.php">
											<span class="sub-item">Ajout Des Associations</span>
										</a>
									</li>
									<li>
										<a href="../forms/forms_pay.php">
											<span class="sub-item">Ajout Des Paysants</span>
										</a>
									</li>
									<li>
										<a href="../forms/forms_dem.php">
											<span class="sub-item">Ajout Des Demandes</span>
										</a>
									</li>
									
									<li>
										<a href="../forms/forms_resp.php">
											<span class="sub-item">Ajout Des Responsables</span>
										</a>
									</li>
									<li>
										<a href="../forms/forms_rep.php">
											<span class="sub-item">Ajout Des reponses</span>
										</a>
									</li>

								</ul>
								
							</div>
							
						</li>
						
						
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-database"></i>
								<p>Données et Traitements</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="data_ass.php">
											<span class="sub-item"> Associations</span>
										</a>
									</li>
									<li>
										<a href="data_paysant.php">
											<span class="sub-item"> Paysans</span>
										</a>
									</li>
									<li>
										<a href="data_demande.php">
											<span class="sub-item"> Demandes</span>
										</a>
									</li>
									
									<li>
										<a href="data_responsable.php">
											<span class="sub-item"> Responsables</span>
										</a>
									</li>
									<li>
										<a href="data_reponse.php">
											<span class="sub-item"> Reponses</span>
										</a>
									</li>

								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-cogs"></i>
								<p> Fonctionnalite usuel </p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">
									<li>
										<a  href="../tables/demande.php">
											<span class="sub-item">Imprimession des demandes</span>
											
										</a>
										
									</li>
									<li>
										<a  href="../tables/reponse.php">
											<span class="sub-item">Impression des reponses valide</span>
											
										</a>
										
									</li>
									
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
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
								<a href="#">BASE DE DONNEES</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">DEMANDES</a>
							</li>
						</ul>
					</div>
	
		<nav class="navbar navbar-dark bg-info justify-content-between">
			<a class="navbar-brand">RECHERCHE DES ELEMENTS </a>
			<form class="navbar-left navbar-form nav-Recherche" action="">
				<div class="input-group">
					<input type="text" placeholder="Recherche ..." class="form-control" id="rechercheInput" >
					
				</div>
			</form>
		</nav>
				
		<!-- debut du tableau -->
<div class="row">
	<div class="col-md-12">
		<div class="card">										
			<div class="card-body">
										<!-- Modal -->				
				<div class="table-responsive">
					<table id="add-row" class="display table table-striped table-hover" >
						<thead>
							<tr>
								<th>ID responsable</th>
								<th>ID paysan</th>
								<th>Dates envoie</th>
								<th>Dates reponse</th>
                                <th>Filiere </th>
                                <th>Appuis </th>
                                <th>Materiels</th>
								<th width="10%" ><i class="fas fa-user-edit" ></i> Modifier </th>
								<th width="10%"> <i class="far fa-trash-alt" ></i> Supprimer </th>

							</tr>
						</thead>
						<tbody >
<?php  error_reporting(0);
try
{
    // On se connecte à MySQL
    include "conn.php";
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
 
// Si tout va bien, on peut continuer
 
// On récupère tout le contenu de la table client
$reponse = $bdd->query('SELECT * FROM demander ');
 
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
											
		<tr>
			<td><?php echo $donnees['ID_RESPONSABLE']; ?> </td>
			<td><?php echo $donnees['ID_PAYSANT']; ?> </td>
			<td><?php echo $donnees['DATE_ENVOIE']; ?> </td>
			<td><?php echo $donnees['DATE_REP']; ?> </td>
            <td><?php echo $donnees['FILIERE']; ?> </td>
            <td><?php echo $donnees['TYPE_APPUI']; ?> </td>
            <td><?php echo $donnees['MATERIEL']; ?> </td>
			<td>
			
                <div class="form-button-action">
                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Modifier">
                                <a class="btn btn-link btn-primary btn-lg"   href="modif_dem.php?id=<?php echo $donnees['ID_PAYSANT'] ?>"> <i class="fa fa-edit"></i></a>
                            </button>
                </div>
			</td>
			<td>
			<div class="form-button-action">
				<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Supprimer">
                            <a class="btn btn-link btn-danger" href="suppression_dem.php?id=<?php echo $donnees['ID_PAYSANT'] ?>"><i class="fa fa-times"></i></a>	
                </button>
			</div>	
			</td>
		</tr>
		
		<?php
}
											 
	$reponse->closeCursor(); // Termine le traitement de la requête
											 
	?>
				</tbody>
			</table>

		<nav class="navbar navbar-dark bg-info justify-content-between"></nav>
				<div class="pagination" id="pagination" >
						 <!-- Les boutons de pagination seront ajoutés dynamiquement ici -->
				</div>
		<nav class="navbar navbar-dark bg-info justify-content-between"></nav>			

					<script>
						const elementsParPage = 5; // Nombre d'éléments par page
						const tableauBody = document.querySelector("#add-row tbody");
						const lignes = Array.from(tableauBody.querySelectorAll("tr"));

						const pagination = document.getElementById("pagination");
						const totalPages = Math.ceil(lignes.length / elementsParPage);

						function afficherPage(page) {
							const debut = (page - 1) * elementsParPage;
							const fin = debut + elementsParPage;
							const afficherLignes = lignes.slice(debut, fin);

							lignes.forEach(ligne => {
								ligne.style.display = "none";
							});

							afficherLignes.forEach(ligne => {
								ligne.style.display = "";
							});

							afficherPagination(page);
						}

						function afficherPagination(pageActive) {
							pagination.innerHTML = "";

							for (let i = 1; i <= totalPages; i++) {
								const button = document.createElement("button");
								button.textContent = i;
								button.addEventListener("click", () => {
									afficherPage(i);
								});
								if (i === pageActive) {
									button.classList.add("active");
								}
								pagination.appendChild(button);
							}
						}

						afficherPage(1);
					</script>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
                    <!-- fin du tableau -->
				</div>
			</div>
		</div>
		
		<script>
        document.getElementById('rechercheInput').addEventListener('input', function() {
            const input = this.value.toLowerCase();
            const tableau = document.getElementById('add-row');
            const tbody = tableau.querySelector('tbody');
            const lignes = tbody.querySelectorAll('tr');
        
            lignes.forEach(ligne => {
                const contenu = ligne.textContent.toLowerCase();
                if (contenu.includes(input)) {
                    ligne.style.display = 'table-row'; // Affiche la ligne correspondante
                } else {
                    ligne.style.display = 'none'; // Cache les lignes qui ne correspondent pas
                }
            });
        });
        
    </script>
	
	</div>
	<!--   Core JS Files   -->
	<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/core/popper.min.js"></script>
	<script src="../../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo2.js"></script>
    
</body>
</html>