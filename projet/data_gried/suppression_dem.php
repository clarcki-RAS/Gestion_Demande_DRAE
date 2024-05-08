<?php
    include_once "conn.php";

        
        $id_paysant = $_GET['id'];
        $query = "DELETE FROM demander WHERE ID_PAYSANT = '$id_paysant'";
        $pdostmt = $bdd->prepare($query);
        $resultat = $pdostmt->execute();
        if($resultat){
            ?> 
            <script>
                alert('Information efface!');
            </script>
            <?php
        }
        ?> 
        
        <?php
            header("location:data_paysant.php");
        
?>