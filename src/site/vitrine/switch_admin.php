<?php //session_start();
//index.php?quelle_page=admin_accueil&quelle_compte=admin

  $var_teste_1=false;
  if(isset($_GET["quelle_compte"]) )
  {
    if($_GET["quelle_compte"]!="admin" )
    {
      $var_teste_1 = true;
      //echo " <br> le mec n'est pas admin et sera rediriger quand t'auras changer ce code <br> <br>";
      header('Location: index.php');
    }
    
  }  
  else
  {
    header('Location: index.php');
    $var_teste_1 = true;
  }


?>
<!-- 
change le get de search_user_info vers switch_admin 
pask faut pas passer les info codecartetuidant
en claire ok !!!!

 -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>BonPlan&Co</title>
</head>
<body>   
     

    <?php

    include "header.php"; 

      // Remplace ces valeurs par les tiennes
      $serveur = "lakartxela.iutbayonne.univ-pau.fr";
      $nomUtilisateur = "nconguisti_bd";
      $motDePasse = "nconguisti_bd";
      $nomBaseDeDonnees = "nconguisti_bd";

      try {
          // Connexion à la base de données avec PDO
          $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $nomUtilisateur, $motDePasse);

          
          /*  vertion avec paramètre
          $requete = $connexion->prepare("SELECT * FROM ma_table WHERE condition = :valeur");
          $valeur = "valeur_reelle";
          $requete->bindParam(':valeur', $valeur);
          $requete->execute();
          $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
          */

          /* vertion sans paramètre
          $requete = $connexion->query("SELECT * FROM ma_table");
          $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
          */
          
          /* affichage
          foreach ($resultats as $ligne) 
          {print_r($ligne);} 
          */


          if(isset($_GET["requete"]))
          {
            switch ($_GET["quelle_page"]) 
            {
              case 'admin_user_info':
               
                break;      
              
              default:
                //requete teste
                $requete = $connexion->query("SELECT * FROM Utilisateur");
                $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
                foreach ($resultats as $ligne) 
                  {print_r($ligne);} 
                break;
              
            }
          }
          else
          {
            //requete teste
            /* $requete = $connexion->query("SELECT * FROM Utilisateur");
            $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultats as $ligne) 
              {
                print_r($ligne);
              }  */
          }



      } 
      catch (PDOException $e) 
      {
          echo "Erreur : " . $e->getMessage();
      }

      // Ferme la connexion
      

    
      //quelle page ?
      if(isset($_GET["quelle_page"]))
      {
        //echo $_GET["quelle_page"]." ";
        switch ($_GET["quelle_page"]) 
        {
          case 'admin_accueil':
            include "admin_accueil.php";
            break;

          case 'admin_creation_persona_manuel':
            include "admin_creation_persona_manuel.php";
            break;
  
          case 'admin_search_user':
            include "admin_search_user.php";
            break;
  
          case 'admin_user_info':
            include "admin_user_info.php";
            break;
          
          default:
            
            include "admin_accueil.php";
            break;
        }
      }
      else
      {

        include "admin_accueil.php";
      }

    ?>
     
</body>
      <script src="script.js"></script>
</html>

<?php $connexion = null;?>