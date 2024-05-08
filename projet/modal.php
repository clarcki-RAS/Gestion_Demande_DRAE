<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">A S S O C I A T I O N <span class="mx-3"> D E S </span> P A Y S A N T S</div>
            </div>
            <div class="card-body">
                <div class="container">
                        
                    <form name="insertion1" action="modif.php" method="POST">
						<?php foreach($res as $row):?>
                        <div class="form-group">
                            <label for="nom_assoc">Nom de l'Association</label>
                            <input type="text" class="form-control" id="nom_assoc" placeholder="Entrer le nom de l'association" name="nom_assoc"value="<?=$row['NOM_ASSOC']?>" readonly="readonly" >
                        </div>
                        <div class="form-group">
                            <label for="nbr_membres">Nombres des adherents </label>
                            <input type="number" class="form-control" id="nbr_membres" placeholder="nombres des membres" name="nbr_membres"value="<?=$row['NBR_MEMBRES']?>">
                        </div>
                        <div class="form-group">
                            <label for="date_de_fondation">Date de fondation</label>
                            <input type="date" class="form-control" id="date_de_fondation" placeholder="la date de creation" name="date_de_fondation"value="<?=$row['DATE_DE_FONDATION']?>">
                        </div>
                        <div class="form-group">
                            <label for="contact">contact </label>
                            <input type="number" class="form-control" id="contact" placeholder="03XXXXXXXXX" name="contact"value="<?=$row['CONTACT']?>" required>
                        </div>

                        <div class="row ">
                            <div class="col-3 col-md-3 col-lg-3 mx-auto mt-4 mb-3 d-flex justify-content-around ">
                                <input class="btn btn-outline-danger fw-light" type="submit" value="  A J O U T E R  " name="btn-valider" >
        
                            </div>
                            <?php endforeach;?>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</div>