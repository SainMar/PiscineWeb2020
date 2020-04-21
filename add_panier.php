<?php 
session_start();

  $id_item=isset($_POST["id_item"])? $_POST["id_item"]:"";
    array_push($_SESSION['panier'], $id_item);



?>