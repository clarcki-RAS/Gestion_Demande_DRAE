<?php

    include_once "conn.php";
    
    

        $NOM_ASSOC = $_GET['id'];
        $query = "DELETE FROM association WHERE NOM_ASSOC = '$NOM_ASSOC'";
        $pdostmt = $bdd->prepare($query);
        $resultat = $pdostmt->execute();
        ?> 
    <script>
        alert('Information efface!');
    </script>
    <?php
        header("location:data_ass.php");
?>