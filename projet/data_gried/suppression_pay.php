<?php

    include_once "conn.php";
        $idpay = $_GET['id'];
        $query = "DELETE FROM paysant WHERE ID_PAYSANT = '$idpay'";
        $pdostmt = $bdd->prepare($query);
        $resultat = $pdostmt->execute();
        ?> 
    <script>
        alert('Information efface!');
    </script>
    <?php
        header("location:data_paysant.php");
?>