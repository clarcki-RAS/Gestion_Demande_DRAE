<?php
include_once "conn.php";
include "forms_rep.php";

if (isset($_POST['btn-valider']))
{
    extract($_POST);
    $id_responsable = $_POST["id_responsable"];
    $id_paysant = $_POST["id_paysant"];
    $etat = $_POST["etat"];
    $date_formation = $_POST["date_formation"]; 
    $materiel_valide=$_POST["materiel_valide"];     
    $date_recep_materiel = $_POST["date_recep_materiel"];

    if(isset($id_responsable) && isset($id_paysant) && isset($etat) && isset($date_formation) && isset($materiel_valide) &&  isset($date_recep_materiel) &&
     !empty($id_responsable) && !empty($id_paysant) && !empty($etat))
    {  
            $check_demande = "SELECT ID_PAYSANT FROM demander WHERE ID_PAYSANT = '$id_paysant' ";
            $stmt2 = $pdo->prepare($check_demande);
            $stmt2->execute();
            $res2 = $stmt2->rowCount();
            $compte2 = $res2;
            if($compte2 <= 0)
            {
                ?> 
                <script>
                    alert('AUCCUN DEMANDE ATTRIBUE PAR CE PAYSANT');
                </script>
                <?php
             }
            else{
                $query = "INSERT INTO repondre  VALUES (?,?,?,?,?,?)";
                $pdostmt=$pdo->prepare($query);
                $result = $pdostmt->execute(array($id_responsable,$id_paysant,$etat,$date_formation,$materiel_valide,$date_recep_materiel));
                if($result)
                {?> 
                    <script>
                    alert('reponse bien été ajoutés dans la base de données !');
                </script>
                <?php
                } 
                
                else{
                ?> 
                <script>
                    alert("echec de l'enregistrement!");
                </script>
                <?php
            }
            }
           
            
    }
    else
    {
        ?> 
        <script>
            alert("echec de l'enregistrement!");
        </script>
        <?php
    }    
}
?>
