<!DOCTYPE html>
<html>
<head>
        <title>!!!!!!!COPIE!!!!!!!Quesrtion 3.1</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="style.css">
       
    </head>
    <body>
    <form action="3Traitement.php" method="POST">
     
        <label for="id">ID--11</label><input type="number" name="id" id="id"><br>
        <label for="prenom">Prenom</label><input type="text" name="prenom" id="prenom"><br>
        <label for="nom">Nom</label><input type="text" name="nom" id="nom"><br>
        <label for="date_emb">DateEmbauche</label><input type="date" name="date_emb" id="date_emb"><br>
        <label for="id_tra">ID_Travail</label><input type="text" name="id_tra" id="id_tra"><br>
        <label for="salaire">Salaire</label><input type="number" name="salaire" id="salaire"><br>
        <label for="id_patron">ID_Patron</label><input type="number" name="id_patron" id="id_patron"><br>
        <label for="id_dept">ID_Dept</label><input type="number" name="id_dept" id="id_dept"><br>
    
        <p>
            <input type="submit" name="research" value="research">
            <input type="submit" name="add" value="Add">
            <input type="submit" name="erase" value="erase">
        </p>
    </form>
   
    </body>


</html>