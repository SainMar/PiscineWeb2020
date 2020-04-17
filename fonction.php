<?php

function connect_ddb($db)
{
    
    try 
    {
            $dbh = new PDO('mysql:host=localhost;port=3307;dbname='.$db, 'root', '');
            return $dbh;
    } 
    catch (PDOException $e) 
    {
            print "Erreur !:    " . $e->getMessage() . "    <br/>";
            die();
    }
    

}





?>