
<?php
 include_once "conn.php";
 


   
$id_paysant = $_GET['id'];

$query = ("SELECT * FROM repondre WHERE ID_PAYSANT ='$id_paysant' " );
$pdostmt = $bdd->prepare($query);
$pdostmt-> execute();
$res= $pdostmt->fetchAll();

if(isset($_POST['modification']) )
{  
    extract($_POST);
    $id_responsable = $_POST["id_responsable"];
    $ID_PAYSANT = $_POST["id_paysant"];
    $etat = $_POST["etat"];
    $date_formation = $_POST["date_formation"]; 
    $materiel_valide=$_POST["materiel_valide"];     
    $date_recep_materiel = $_POST["date_recep_materiel"];

	
    if(isset($id_responsable) && isset($id_paysant) && isset($etat) && isset($date_formation) && isset($materiel_valide) &&  isset($date_recep_materiel) &&
    !empty($id_responsable) && !empty($id_paysant) && !empty($etat) ) 
	{
		

		$query = "UPDATE repondre SET ID_PAYSANT=?,ID_RESPONSABLE=?,ETAT=?,DATE_FORMATION=?,MATERIEL_VALIDE=?,DATE_RECEP_MATERIEL=? WHERE ID_PAYSANT=$ID_PAYSANT";
        $pdostmt=$bdd->prepare($query);
        $reponse = $pdostmt->execute(array($ID_PAYSANT,$id_responsable,$etat,$date_formation,$materiel_valide,$date_recep_materiel));
		
	
		if($reponse)
		{
			?>
				<script>
				swal("modifié avec succès !", {
					icon : "success",
					buttons: {
						confirm: {
							className : 'btn btn-success'
						}
					},
				});
			</script>
			<?php
            header("location:data_reponse.php");
		}
			
		else
		{
			?>
			<script>
		swal("UNE ERREUR EST SURVENUE", "la modification n'a pas reussie!", {
			icon : "error",
			buttons: {
				confirm: {
					className : 'btn btn-danger'
				}
			},
		});
</script>
		<?php

		}
	}else { ?>
		<script>
			alert ('Attention ! L\'un des champs ou plusieurs sont vides!' );
		</script>
	<?php }
	
   
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
										<a href="../forms/forms_ass.php">
											<span class="sub-item">Ajout Des Associations</span>
										</a>
									</li>
									<li>
										<a href="../forms/forms_pay.php">
											<span class="sub-item">Ajout Des Paysans</span>
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
								<a href="#">PAYSANS</a>
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
											<h1>PAYSANS</h1>
                                            <?php foreach($res as $row):?>
						<form name="insertion1" action="modif_rep.php" method="POST">
                        <div class="form-group">
                                <label for="id_responsable">id_responsable</label>
                                <input type="text" class="form-control" id="id_responsable" placeholder="identifiant du personnel" name="id_responsable"  value="<?=$row['ID_RESPONSABLE']?>" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="id_paysant">id_paysan  </label>
                                <input type="number" class="form-control" id="id_paysant" placeholder="identifiant du paysant" name="id_paysant" value="<?=$row['ID_PAYSANT']?>" readonly="readonly">
                            </div><br><br><br>
                            <div class="form-group">
                                <label for="etat"  name ="etat">reponse de la direction :</label>
                                    <select name="etat" value="<?=$row['ETAT']?>" disabled="disabled"></select> >
                                        <option value="accepte">accepte</option>
                                        <option value="reffus">reffus</option>
                                    </select>
                            </div>
                            
                            <br><br><br>
                            <div class="form-group">
                                <label for="date_formation">Date de debut du formation </label>
                                <input type="datetime-local" class="form-control" id="date_formation" placeholder="identifiant du paysant" name="date_formation" value="<?=$row['DATE_FORMATION']?>" >
                            </div>
                            <div class="form-group">
                                <label for="materiel_valide">materiel valide </label>
                                <input type="text" class="form-control" id="materiel_valide" name="materiel_valide" value="<?=$row['MATERIEL_VALIDE']?>">
                            </div>
                            <div class="form-group">
                                <label for="date_recep_materiel">date_recep_materiel </label>
                                <input type="date" class="form-control" id="date_recep_materiel" placeholder="branche d'activite" name="date_recep_materiel"  value="<?=$row['DATE_RECEP_MATERIEL']?>">
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
</body>
</html>