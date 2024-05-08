<?php

    include_once "conn.php";
    
    

        $id_pay = $_GET['id'];
        $query = "DELETE FROM repondre WHERE ID_PAYSANT = '$id_pay'";
        $pdostmt = $bdd->prepare($query);
        $resultat = $pdostmt->execute();
        ?> 
    <script>
        alert('Information efface!');
    </script>
    <?php
        header("location:data_reponse.php");
?>