<?php 

if(!isset($_SESSION["idUsuario"]) || !isset($_SESSION["nomeUsuario"])) 
{ 
    header("Location: loginPage.php"); 
    exit; 
} 

?>