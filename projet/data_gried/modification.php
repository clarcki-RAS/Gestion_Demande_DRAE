
<?php
 ?><<meta charset="utf-8"><?php
 error_reporting(0);
 include "data_ass.php";

  try
  {
  // On se connecte à MySQL
  $bdd = new PDO('mysql:host=localhost;dbname=drae_agri', 'root', '');
  }
	  catch(Exception $e)
  {
  // En cas d'erreur, on affiche un message et on arrête tout
	  die('Erreur : '.$e->getMessage());
  }

if (isset($_GET['NOM']) ) {
   
    $NOM_ASSOC = $_GET['NOM'];
}

$reponse = $bdd->query("SELECT * FROM association WHERE NOM_ASSOC = '$NOM_ASSOC' " );
$donnees = $reponse->fetch();
// On affiche chaque entrée une à une

if(isset($_POST['modification']) )
{

    if(($_POST['NOM_ASSOC']) != ""  &&  ($_POST['NBR_MEMBRES']) != ""  &&  ($_POST['DATE_DE_FONDATION']) != "" &&  ($_POST['CONTACT']) != "") 
	{
		$NOM_ASSOC = $_POST['NOM_ASSOC'];
		$NBR_MEMBRES = $_POST['NBR_MEMBRES'] ;
		$DATE_DE_FONDATION = $_POST['DATE_DE_FONDATION'] ;
		$CONTACT = $_POST['CONTACT'] ;
	
		$reponse = $bdd->query("UPDATE  ASSOCIATION SET NOM_ASSOC='$NOM_ASSOC',  NBR_MEMBRES = '$NBR_MEMBRES', DATE_DE_FONDATION = '$DATE_DE_FONDATION'
		 CONTACT = '$CONTACT' WHERE NOM_ASSOC = '$NOM_ASSOC'");
		
	
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
	<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">MODIFICATION DES INFORMATIONS</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form name="insertion1" action="ajout_ass.php" method="POST">
					<div class="form-group">
						<label for="nom_assoc">Nom de l'Association</label>
						<input type="text" class="form-control" id="nom_assoc" placeholder="Entrer le nom de l'association" name="nom_assoc" value="<?php echo $donnees['NOM_ASSOC']?>">
					</div>
					<div class="form-group">
						<label for="nbr_membres">Nombres des adherents </label>
						<input type="number" class="form-control" id="nbr_membres" placeholder="nombres des membres" name="nbr_membres"value="<?php echo $donnees['NBR_MEMBRES']?>">
					</div>
					<div class="form-group">
						<label for="date_de_fondation">Date de fondation</label>
						<input type="date" class="form-control" id="date_de_fondation" placeholder="la date de creation" name="date_de_fondation"value="<?php echo $donnees['DATE_DE_FONDATION']?>">
					</div>
					<div class="form-group">
						<label for="contact">contact </label>
						<input type="number" class="form-control" id="contact" placeholder="03XXXXXXXXX" name="contact"value="<?php echo $donnees['CONTACT']?>">
					</div>

				</form>
			</div>
			<div class="modal-footer">
				<div class="card-action">
					<button type="submit" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
					<button type="submit" class="btn btn-primary" name="btn-valider">Enregistrer
					<a class="btn btn-link btn-primary btn-lg"   href="modification.php?NOM=<?php echo $donnees['NOM_ASSOC']?>"> </a>
			</div>
		</div>
	</div>
</div>	
		<!-- End Custom template -->
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