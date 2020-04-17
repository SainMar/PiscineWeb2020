<?php

  ///Parametre creation items
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
  ///Fin $tab




 //Parametre affichage catalogue
  $param=array();
  $param["all-items"]=TRUE;
  $param["enchere"]=FALSE;
  $param["meilloffre"]=FALSE;
  $param["achatimme"]=FALSE;
  $param["bar_rech"]="";
//Fin $param





//Parametres affichage panier
  $para_panier=array();

  $para_panier["achatimme"]=true;  /// les achats immediat on recupere les id des items dans $_SESSION['panier'] pour afficher les items via table stock 
  $para_panier["enchere"]=false;  /// les encheres non finies de cet user (type_transa=1; statut= 0; id_user_actual)
  $para_panier["meilloffre_att"]=false;/// les meilleurs offres non finies de cet user qui sont à la parole du 'v' /*/ il faut recupérer le prix proposé lors de la dernière offre en temps et au cb round nous sommes 
  $para_panier["meilloffre_r"]=false;/// les meilleurs offres non finies de cet user qui sont à la parole du 'a' /*/ il faut recupérer le prix proposé lors de la dernière offre en temps et au cb round nous sommes 

  $para_panier["historique"]=false; /// les transactions finies de cet user ayant un prix, un acheteur(qui est cet user) et date de FIN 
  $para_panier["id_user_actual"]=$_SESSION["id_user_actual"];
///Fin $para_panier





///Parametre manager vente
  $para_mana_vente["enchere"]=true;
  $para_mana_vente["meilloffre"]=false;
  $para_mana_vente["historique"]=false;
  $para_mana_vente["id_user_actual"]=$_SESSION["id_user_actual"];
///FIN $para_mana_vente




        
?>