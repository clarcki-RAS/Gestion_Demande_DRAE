<?php
include_once "conn.php";
include "forms_ass.php";
 
if (isset($_POST['btn-valider']))
{
    $nom_association=$_POST["nom_assoc"];
    $nbr_membres = $_POST["nbr_membres"];
    $date_fondation=$_POST["date_de_fondation"];
    $contact=$_POST["contact"];       

   

    extract($_POST); 

    if(isset($nom_association)  && isset($nbr_membres) && isset($date_fondation)&& isset($contact)
    && !empty($nom_association)&& !empty($nbr_membres)  && !empty($date_fondation)  )
    {
        $check_duplicata = "SELECT nom_assoc FROM association WHERE nom_assoc = '$nom_association' ";
        $stmt = $pdo->prepare($check_duplicata);
        $stmt->execute();
        $res = $stmt->rowCount();
        $compte = $res;
        if($compte > 0)
        {
            $message ="nom association existant veuillez en choisir un autre !";
           // header("location:ajout.php");
        }
        else
        { 
            $query = "INSERT INTO association VALUES(?,?,?,?)";
            $pdostmt=$pdo->prepare($query);
            $result = $pdostmt->execute(array($nom_association,$nbr_membres,$date_fondation,$contact));
            if($result)
            {
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
?>