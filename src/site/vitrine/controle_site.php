<?php
//quelle page ?
session_start();

$chlag = true;

if(isset($_GET["quelle_compte"]))
{
  //echo $_GET["quelle_page"]." ";
  switch ($_GET["quelle_compte"]) 
  {
    case 'user':
      include "switch_user.php";
      break;

    case 'admin':
      //echo "2";
      include "switch_admin.php";
      break;
    
    default:
      # cmettre un message d'erreur :/
      //echo "3";
      include "index.php";
      break;
  }
}
?>
