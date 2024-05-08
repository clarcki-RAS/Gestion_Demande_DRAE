<?php

include_once "conn.php";
include "forms_pay.php";

if (isset($_POST['btn-valider']))
{
    extract($_POST);
    $id_pay=$_POST["id_pay"];
    $nom_ass = $_POST["nom_ass"];
    $date_naiss=$_POST["date_naiss"];
    $cin=$_POST["cin"];
    $numero=$_POST["num"];
    $region=$_POST["region"] ;
    $district=$_POST["district"];
    $commune=$_POST["commune"];
    $village=$_POST["village"];
    $fokontany=$_POST["fokontany"];
    $sexe=$_POST["sexe"];
    $nom_paysant=$_POST["nom_paysant"];
    

     

    if(isset($id_pay)  && isset($nom_ass)  && isset($cin)&& isset($numero) && isset($region) && isset($district) && isset($commune) && isset($village) && 
    isset($fokontany) && isset($sexe)  && isset($nom_paysant) 
   
    && !empty($id_pay) && !empty($nom_ass) && !empty($date_naiss) && !   empty($cin) && !empty($numero) && !empty($region) && !empty($district) &&
    !empty($commune) && !empty($village) && !empty($fokontany) && !empty($sexe) && !empty($nom_paysant)   )
    {   
        $check_duplicata = "SELECT ID_PAYSANT FROM PAYSANT WHERE id_paysant = '$id_pay' ";
        $stmt = $pdo->prepare($check_duplicata);
        $stmt->execute();
        $res = $stmt->rowCount();
        $compte = $res;
        if($compte > 0)
        {
            ?> 
            <script>
                alert('cette id existe deja veuillez en choisir une autre');
            </script>
            <?php
           // header("location:ajout.php");
        }
        else
        {   
            $check_paysant = "SELECT NOM_EAF FROM PAYSANT WHERE NOM_EAF = '$nom_paysant' ";
            $statut = $pdo->prepare($check_paysant);
            $statut->execute();
            $result = $statut->rowCount();
            $nombre = $result;
            if($nombre >= 1)
            {
                ?> 
                <script>
                    alert('cette individue existe deja dans la base de donnees');
                </script>
                <?php
            // header("location:ajout.php");
            }
            else{
                $check_association = "SELECT NOM_ASSOC FROM PAYSANT WHERE NOM_ASSOC = '$nom_ass' ";
                $statut1 = $pdo->prepare($check_association);
                $statut1->execute();
                $result1 = $statut1->rowCount();
                $nombre1 = $result1;
                if($nombre1 <= 0)
                {
                    ?> 
                    <script>
                        alert('cette Association n\'existe pas encore dans la base de donnees! \n veuillez d\'abord ajouter cette association');
                    </script>
                    <?php
                // header("location:ajout.php");
                }
                else{

                    $query = "INSERT INTO paysant VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
                    $pdostmt=$pdo->prepare($query);
                    $result = $pdostmt->execute(array($id_pay,$nom_ass,$nom_paysant,$date_naiss,$sexe,$cin,$region,$commune,$district,
                    $village,$fokontany,$numero));
                    if($result)
                        {
                            //header("location:index.php");
                            ?> 
                            <script>
                                alert('les données ont bien été ajoutés !');
                            </script>
                            <?php
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
                
            } 
        }
       
    }
    else
    {
        ?><script>
            alert('veuillez remplir tous les champs');

        </script>
        <?php
    }    
}
?>