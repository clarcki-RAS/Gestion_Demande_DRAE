<?php
include_once "../conn.php";

        $compter_riz = "SELECT 	ID_PAYSANT FROM demander where FILIERE='voamaina'";
        $stmt = $pdo->prepare($compter_riz);
        $stmt->execute();
        $res = $stmt->rowCount();
        $nombre_riz = $res;

        $compter_cafe = "SELECT ID_PAYSANT FROM demander where FILIERE='cafe'";
        $stmt = $pdo->prepare($compter_cafe);
        $stmt->execute();
        $res = $stmt->rowCount();
        $nombre_cafe = $res;

        $compter_arachide = "SELECT ID_PAYSANT FROM demander where FILIERE='arachide'";
        $stmt = $pdo->prepare($compter_arachide);
        $stmt->execute();
        $res = $stmt->rowCount();
        $nombre_arachide = $res;

        $compter_mais = "SELECT ID_PAYSANT FROM demander where FILIERE='mais'";
        $stmt = $pdo->prepare($compter_mais);
        $stmt->execute();
        $res = $stmt->rowCount();
        $nombre_mais = $res;

        $compter_ble = "SELECT 	ID_PAYSANT FROM demander where FILIERE='ble'";
        $stmt = $pdo->prepare($compter_ble);
        $stmt->execute();
        $res = $stmt->rowCount();
        $nombre_ble = $res;

        $compter_pommedt = "SELECT 	ID_PAYSANT FROM demander where FILIERE='pomme de terre'";
        $stmt = $pdo->prepare($compter_pommedt);
        $stmt->execute();
        $res = $stmt->rowCount();
        $nombre_pommedt = $res;

        $compter_carotte = "SELECT 	ID_PAYSANT FROM demander where FILIERE='carotte'";
        $stmt = $pdo->prepare($compter_carotte);
        $stmt->execute();
        $res = $stmt->rowCount();
        $nombre_carotte = $res;

        $compter_onion = "SELECT ID_PAYSANT FROM demander where FILIERE='onion'";
        $stmt = $pdo->prepare($compter_onion);
        $stmt->execute();
        $res = $stmt->rowCount();
        $nombre_onion = $res;

        $compter_haricot = "SELECT ID_PAYSANT FROM demander where FILIERE='haricot'";
        $stmt = $pdo->prepare($compter_haricot);
        $stmt->execute();
        $res = $stmt->rowCount();
        $nombre_haricot = $res;

        $compter_soja = "SELECT 	ID_PAYSANT FROM demander where FILIERE='soja'";
        $stmt = $pdo->prepare($compter_soja);
        $stmt->execute();
        $res = $stmt->rowCount();
        $nombre_soja = $res;
        
        ?>
<!DOCTYPE html>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Gestion Agriculture</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
<script>
	WebFont.load({
		google: {"families":["Open+Sans:300,400,600,700"]},
		custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../../assets/css/fonts.css']},
		active: function() {
			sessionStorage.fonts = true;
		}
	});
</script>

<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/css/atlantis.min.css">
<link href="../assets/styles.css" rel="stylesheet" />
<link href="../assets/prism.css" rel="stylesheet" />
</head>
<body>
<div class="wrapper">
	
		<div class="main-header">
			<div class="logo-header" data-background-color="dark2">
				
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
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark2"></nav>
		</div>
		
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
										<a href="forms/forms_ass.php">
											<span class="sub-item">Ajout Des Associations</span>
										</a>
									</li>
									<li>
										<a href="forms/forms_pay.php">
											<span class="sub-item">Ajout Des Paysans</span>
										</a>
									</li>
									<li>
										<a href="forms/forms_dem.php">
											<span class="sub-item">Ajout Des Demandes</span>
										</a>
									</li>
									<li>
										<a href="forms/forms_prod.php">
											<span class="sub-item">Ajout Des Productions</span>
										</a>
									</li>
									<li>
										<a href="forms/forms_resp.php">
											<span class="sub-item">Ajout Des Responsables</span>
										</a>
									</li>
									<li>
										<a href="forms/forms_rep.php">
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
										<a href="forms/forms.php">
											<span class="sub-item"> Associations</span>
										</a>
									</li>
									<li>
										<a href="forms/forms.php">
											<span class="sub-item"> Paysans</span>
										</a>
									</li>
									<li>
										<a href="forms/forms.php">
											<span class="sub-item"> Demandes</span>
										</a>
									</li>
									<li>
										<a href="forms/forms.php">
											<span class="sub-item"> Productions</span>
										</a>
									</li>
									<li>
										<a href="forms/forms.php">
											<span class="sub-item"> Responsables</span>
										</a>
									</li>
									<li>
										<a href="forms/forms.php">
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
										<a  href="../demo1/tables/demande.php">
											<span class="sub-item">Imprimession des demandes</span>
											
										</a>
										
									</li>
									<li>
										<a  href="../demo1/recette.php">
											<span class="sub-item">RECETTE</span>
											
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
		<div class="content content-documentation">
			<div class="container-fluid">
				<div class="card card-documentation">
					<div class="card-header bg-info-gradient text-white bubble-shadow">
						<h4 style="text-decoration: underline;">Suivie des principales productions </h4>
						<p class="mb-0 op-8">Sur une large gamme de produit agricole , on vas se concentrer essentielement sur les productions
						des	produits de consommation  reguliere et quotidienne de la population.
						</p>
					</div>
					<div class="card-body">
						
						<h4 class="title" id=""><span>
							
							<form action="POST">
								<label for="annees"> <span style="text-decoration: underline;">Annees de productions :</span>
										<input type="number" id="rechercheInput" placeholder="2011">
										<input  type="submit" value="valider" name="btn-valider" >
										
								</label>
							</form>
						</span></h4>
						
						

<h5 id="bar" style="text-decoration: underline;">Representation statistiques :</h5>
<div class="bd-example">
	<div id="chart-container">
		<canvas id="barChart"></canvas>
	</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script src="../../assets/js/core/popper.min.js"></script>
<script src="../../assets/js/core/bootstrap.min.js"></script>
<script src="../../assets/js/plugin/chart.js/chart.min.js"></script>
<script src="../../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="../../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="../../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script type="text/javascript" src="../../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js" charset="utf-8"></script>
<script src="../../assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="../../assets/js/atlantis.min.js"></script>
<script src="../assets/prism.js"></script>
<script src="../assets/prism-normalize-whitespace.min.js"></script>

<script>
var barChart = document.getElementById('barChart').getContext('2d');

var data=<?php echo $nombre_riz ?>;
var data2=<?php echo $nombre_cafe ?>;
var data3=<?php echo $nombre_arachide ?>;
var data4=<?php echo $nombre_mais ?>;
var data5=<?php echo $nombre_ble ?>;
var data6=<?php echo $nombre_pommedt ?>;
var data7=<?php echo $nombre_carotte ?>;
var data8=<?php echo $nombre_onion ?>;
var data9=<?php echo $nombre_haricot ?>;
var data10=<?php echo $nombre_soja ?>;

var myBarChart = new Chart(barChart, {
	type: 'bar',
	data: {
		labels: ["Riz", "Mais", "ble","Arachide", "Haricot", "soja","cafe","Pomme_de_terre", "Onion", "carrotte",],
		datasets : [{
			label: " personnnes dans le filiere",
			backgroundColor: 'rgb(23, 125, 255)',
			borderColor: 'rgb(23, 125, 255)',
			data: [data, data2, data3, data4, data5, data6, data7, data8, data9,data10],
		}],
	},
	options: {
		responsive: true, 
		maintainAspectRatio: false,
		scales: {
			yAxes: [{
				ticks: {
					beginAtZero:true
				}
			}]
		},
	}
});



</script>
</html>
