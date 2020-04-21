<?php
session_start();
include('fonction.php');

//identifier votre BDD
$database = "ecebay";

$dbh=connect_ddb($database);


$id_item_a_supp=isset($_POST["id_item"])? $_POST["id_item"]:"";


$sql="UPDATE `stock` SET `interdit`=1 WHERE id=".$id_item_a_supp;
$result=$dbh->prepare($sql);
$result->execute();







?>