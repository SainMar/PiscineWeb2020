<?php

  $tab = array();
  $tab["nom"]="";
  $tab["prix"]=0;
  $tab["qualite"]="";
  $tab["default"]="";
  $tab["id_cat"]=1;
  $tab["id_user_actual"]=$_SESSION["id_user_actual"];
  $tab["enchere"]=false;
  $tab["meilloffre"]=false;
  $tab["achatimme"]=false;
  
  $param=array();
  $param["all-items"]=TRUE;
  $param["enchere"]=FALSE;
  $param["meilloffre"]=FALSE;
  $param["achatimme"]=FALSE;
  $param["bar_rech"]="";


        
?>