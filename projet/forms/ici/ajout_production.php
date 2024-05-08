<?php
include_once "conn.php";
include "forms_prod.php";

if (isset($_POST['btn-valider']))
{
    extract($_POST);

    $id_produit = $_POST["id_produit"];
    $id_paysant = $_POST["id_paysant"];
    $quantite = $_POST["quantite"];
    $libelle = $_POST["nom_produit"];      
    $date_prod = $_POST["date_prod"];

    if(isset($id_produit) && isset($id_paysant) && isset($quantite) && isset($libelle) && isset($date_prod) &&
     !empty($id_produit) && !empty($id_paysant) && !empty($quantite) && !empty($libelle)  && !empty($date_prod))
    {
        $check_duplicata = "SELECT identifiant FROM production WHERE identifiant = '$id_produit' ";
        $stmt = $pdo->prepare($check_duplicata);
        $stmt->execute();
        $res = $stmt->rowCount();
        $compte = $res;
        if($compte > 0)
        {
            ?> 
            <script>
                alert('votre identifiant produit existe deja! veuillez la changer!');
            </script>
            <?php
           // header("location:ajout.php");
        }
        else
        {
            $query = "INSERT INTO production  VALUES (?,?,?,?)";
            $pdostmt=$pdo->prepare($query);
            $result = $pdostmt->execute(array($id_produit,$quantite,$libelle,$date_prod));
            if($result)

            $query = "INSERT INTO produire  VALUES (?,?)";
            $pdostmt=$pdo->prepare($query);
            $result = $pdostmt->execute(array($id_paysant,$id_produit));
            if($result)
            {?> 
                <script>
                alert('les données ont bien été ajoutés !');
            </script>
            <?php
            }
            
        }
    }
    else
    {?> 
        <script>
            alert("echec de l'enregistrement!");
        </script>
        <?php
    }    
}
