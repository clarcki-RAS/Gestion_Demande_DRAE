<?php
include_once "conn.php";
include "forms_resp.php";

if (isset($_POST['btn-valider']))
{
    extract($_POST);
    $id=$_POST["id"];
    $nom = $_POST["nom"];
    $num=$_POST["num"];
    $cin=$_POST["cin"];       


    if(isset($id)  && isset($nom) && isset($num) && isset($cin)
    && !empty($id)&& !empty($nom)  )
    {
        $check_duplicata = "SELECT ID_RESPONSABLE FROM responsable WHERE ID_RESPONSABLE = '$id' ";
        $stmt = $pdo->prepare($check_duplicata);
        $stmt->execute();
        $res = $stmt->rowCount();
        $compte = $res;
        if($compte > 0)
        {
            ?> 
            <script>
                alert('Responsable deja enregistré !');
            </script>
            <?php
        }
        else
        { 
            $query = "INSERT INTO responsable VALUES(?,?,?,?)";
            $pdostmt=$pdo->prepare($query);
            $result = $pdostmt->execute(array($id,$nom,$num,$cin));
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
    else
    {
        ?><script>
            alert('veuillez remplir tous les champs');

        </script>
        <?php
    }    
}
