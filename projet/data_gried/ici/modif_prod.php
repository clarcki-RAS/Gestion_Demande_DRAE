<?php
include_once "conn.php";
error_reporting(0);

$id_prod = $_GET['id'];
$query = "SELECT *FROM production WHERE IDENTIFIANT='$id_prod'";
$pdostmt = $bdd->prepare($query);
$pdostmt-> execute();
$res= $pdostmt->fetchAll();


if (isset($_POST['modification']))
{
    extract($_POST);
	$id_produit = $_POST["id_produit"];
    $quantite = $_POST["quantite"];
    $libelle = $_POST["nom_produit"];      
    $date_prod = $_POST["date_prod"];

    if(isset($id_produit)  && isset($quantite) && isset($libelle) && isset($date_prod) &&
	!empty($id_produit) && !empty($quantite) && !empty($libelle)  && !empty($date_prod))
    {
        $query = "UPDATE production SET IDENTIFIANT=?,QUANTITE=?,NOM_PRODUIT=?,DATE_PROD=? WHERE IDENTIFIANT=$id_produit";
        $pdostmt=$bdd->prepare($query);
        $reponse = $pdostmt->execute(array($id_produit,$quantite,$libelle,$date_prod));
        if($reponse)
        {
		header("location:data_produit.php");
		
			}
        else
        {
			?>
			<script>
            alert('UNE ERREUR EST SURVENUE, la modification n\'a pas reussie!');
        </script>
        <?php
           // header("location:data_produit.php");
        }
    }
    else
    {
		?>
		<script>
			alert ('Attention ! L\'un des champs ou plusieurs sont vides!' );
		</script>
	<?php
    }    
}
?> 
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
										<a href="forms_ass.php">
											<span class="sub-item">Ajout Des Associations</span>
										</a>
									</li>
									<li>
										<a href="forms_pay.php">
											<span class="sub-item">Ajout Des Paysans</span>
										</a>
									</li>
									<li>
										<a href="forms_dem.php">
											<span class="sub-item">Ajout Des Demandes</span>
										</a>
									</li>
									
									<li>
										<a href="forms_resp.php">
											<span class="sub-item">Ajout Des Responsables</span>
										</a>
									</li>
									<li>
										<a href="forms_rep.php">
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
						<h4 class="page-title">MODIFICATION</h4>
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
								<a href="#">MODIFICATION</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">DONNEES</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Les Tables</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-6 col-lg-4">
											<h1>ASSOCIATION DES PAYSANS</h1>
											<form  method="POST" action="modif_prod.php">
											<?php foreach($res as $row):?>
												<div class="form-group">
													<label for="id_produit">Id_produit </label>
													<input type="number" class="form-control" id="id_produit" placeholder="id du produit a enregistrer" name="id_produit"value="<?=$row['IDENTIFIANT']?>" readonly="readonly">
												</div>
												<div class="form-group">
													<label for="quantite">Quantite de production</label>
													<input type="number" class="form-control" id="quantite" placeholder="quantite en kg" name="quantite"value="<?=$row['QUANTITE']?>" >
												</div>
                                                <div class="form-group">
													<label for="nom_produit">Libelle </label>
													<input type="text" class="form-control" id="nom_produit" placeholder="nom du produit  " name="nom_produit"value="<?=$row['NOM_PRODUIT']?>" >
												</div>
												<div class="form-group">
													<label for="date_prod">Date de production </label>
													<input type="date" class="form-control" id="date_prod" placeholder="date de production " name="date_prod"value="<?=$row['DATE_PROD']?>" >
												</div>
                                                <div class="card-action">
													<input class="btn btn-danger" type="submit" value="enregistrer" name="modification" >
												</div>

												<?php endforeach;?>
											</form>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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
	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo2.js"></script>
	<!--alert-->
	<script src="../../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
</body>
</html>