<?php
include_once "conn.php";
include "forms_dem.php";

if (isset($_POST['btn-valider']))
{
    $id_responsable=$_POST["id_responsable"];
    $id_paysant = $_POST["id_paysant"];
    $date_envoie=$_POST["date_envoie"];
    $date_reponse=$_POST["date_reponse"]; 
    $filiere =$_POST["filiere"];
    $appui=$_POST["appui"];
    $materiel=$_POST["materiel"];      

   

    extract($_POST); 

    if(isset($id_responsable)  && isset($id_paysant)&& isset($date_envoie)  && isset($date_reponse) && isset($filiere) && isset($appui) && isset($materiel)
    && !empty($id_responsable) && !empty($id_paysant) && !empty($date_envoie) && !   empty($date_reponse) && !empty($filiere) && !empty($appui) && !empty($materiel) )
    {   
       
        $check_duplicata = "SELECT ID_PAYSANT FROM PAYSANT WHERE id_paysant = '$id_paysant' ";
        $stmt = $pdo->prepare($check_duplicata);
        $stmt->execute();
        $res = $stmt->rowCount();
        $compte = $res;
        if($compte <= 0)
        {
            ?> 
            <script>
                alert('cette individu n\'est pas encore enregistrer en tant que paysant');
            </script>
            <?php
           // header("location:ajout.php");
        }
        else{
            $check_employe = "SELECT ID_RESPONSABLE FROM responsable WHERE ID_RESPONSABLE = '$id_responsable' ";
            $stmt1 = $pdo->prepare($check_employe);
            $stmt1->execute();
            $res1 = $stmt1->rowCount();
            $compte1 = $res1;
            if($compte1 <= 0)
            {
                ?> 
                <script>
                    alert('Responsable non reconnu ou pas encore enregistrer en tant que Responsable');
                </script>
                <?php
               // header("location:ajout.php");
            }
            else{
                $query = "INSERT INTO demander VALUES(?,?,?,?,?,?,?)";
                $pdostmt=$pdo->prepare($query);
                $result = $pdostmt->execute(array($id_responsable,$id_paysant,$date_envoie,$date_reponse,$filiere,$appui ,$materiel));
                if($result)
                { ?> 
                    <script>
                        alert('les données ont bien été ajoutés !');
                    </script>
                    <?php
                }
                else
                {
                    ?> 
                    <script>
                        alert('une erreur est survenue veuillez reverifier vos informations!');
                    </script>
                    <?php
                }
            }

            
        }
        
       
    }
    else
    {?>
        <script>
        alert('verifiez si tout les champs sont bien remplie');
    </script>

    <?php
    }    
}
?>
