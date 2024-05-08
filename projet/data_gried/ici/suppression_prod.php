<?php

    include_once "conn.php";
    
    

        $ID_PRODUIT = $_GET['id'];
        $query = "DELETE FROM production WHERE IDENTIFIANT = '$ID_PRODUIT'";
        $pdostmt = $bdd->prepare($query);
        $resultat = $pdostmt->execute();

        $query = "DELETE FROM produire WHERE IDENTIFIANT = '$ID_PRODUIT'";
        $pdostmt = $bdd->prepare($query);
        $resultat = $pdostmt->execute();
        ?> 
    <script>
        alert('Information efface!');
    </script>
    <?php
        header("location:data_produit.php");
?>