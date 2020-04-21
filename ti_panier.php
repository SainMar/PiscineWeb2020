<?php
session_start();
include('fonction.php');


//identifier votre BDD
$database = "ecebay";

//compteur pour ecrire requete
$cpt = 0;
$id = 0;
$presence=0;

$dbh=connect_ddb($database);


$enchere =  isset($_POST["enchere"])? $_POST["enchere"]:"";
$meilloffre_att =  isset($_POST["meilloffre_att"])? $_POST["meilloffre_att"]:"";
$meilloffre_r =  isset($_POST["meilloffre_r"])? $_POST["meilloffre_r"]:"";
$achatimme =  isset($_POST["achatimme"])? $_POST["achatimme"]:"";
$id_user_actual =  isset($_POST["id_user_actual"])? $_POST["id_user_actual"]:"";
$historique =  isset($_POST["historique"])? $_POST["historique"]:"";


if($achatimme=="true")
{
    echo "<br>Text info achat immediat : <br>";
    echo "text d'information";
}
if($meilloffre_att=="true")
{
    echo "<br>Text info mo envoye : <br>";
    echo "text d'information";
}
if($meilloffre_r=="true")
{
    echo "<br>Text info rep mo recu: <br>";
    echo "text d'information";
}
if($enchere=="true")
{
    echo "<br>Text info enchere : <br>";
    echo "text d'information";
}
if($historique=="true")
{
    echo "<br>Text info historique : <br>";
    echo "text d'information";
}



?>