<?php
session_start();
include('fonction.php');

$id_item_a_supp=isset($_POST["id_item"])? $_POST["id_item"]:"";

$key = array_search($id_item_a_supp, $_SESSION['panier']);

unset($_SESSION['panier'][$key]);
echo'yo ';

?>