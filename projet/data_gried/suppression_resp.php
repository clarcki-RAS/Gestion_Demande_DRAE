<?php

    include_once "conn.php";
    
    

        $id_resp = $_GET['id'];
        $query = "DELETE FROM responsable WHERE ID_RESPONSABLE = '$id_resp'";
        $pdostmt = $bdd->prepare($query);
        $resultat = $pdostmt->execute();
        ?> 
    <script>
        alert('Information efface!');
    </script>
    <?php
        header("location:data_responsable.php");
?>