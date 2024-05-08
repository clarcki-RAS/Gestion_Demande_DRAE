<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon"/>
	
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
    <title>Document</title>
</head>
<body>
<div class="card-body">
    <div class="row">
        <div class="col-md-6 col-lg-4">
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
						<a href="../recherche/search.php"><h1 class="page-title">Rechercher</h1></a>
					</li>			
				</ul>
			</div>
            <div>
                <form name="search" action="search.php" method="POST">
                    <div class="form-group">
                        <label for="idenvoi">Premier date</label>
                        <input type="datetime-local" class="form-control" id="premier" name="premier">
                    </div>
                    <div class="form-group">
                        <label for="idvoit">Deuxieme date</label>
                        <input type="datetime-local" class="form-control" id="deuxieme"  name="deuxieme">
                    </div>
                    <div class="card-action" style="padding-top:1cm">
                        <input class="btn btn-danger" type="submit" value="rechercher">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>     
<br><br>
    
</body>
</html>

<?php error_reporting(0);
   
    $bdd =new PDO('mysql:host=localhost;dbname=cooperative','root','');

    $premier = $_POST['premier'];
    $deuxieme = $_POST['deuxieme'];

  
    if($premier != '' && $deuxieme != '' )
    {
        ?><table id="add-row" class="display table table-striped table-hover" >
        <thead>
        <tr>
                <th>Colis</th>
                <th>Id d'envoi </th>
                <th>Date d'envoi</th>
            </tr>
            </thead>
            <tbody 
        <?php          
        $donnees = $bdd->query("SELECT * FROM ENVOYER WHERE date_envoi BETWEEN '$premier'AND '$deuxieme'");
        while($value = $donnees->fetch())
            {?>
               >
	
                <tr>		
                    <td><?php echo $value['colis']; ?> </td>
                    <td><?php echo $value['idenvoi']; ?> </td>
                    <td><?php echo $value['date_envoi']; ?> </td>
                </tr>
            <?php  
            }
        
    }

    ?>