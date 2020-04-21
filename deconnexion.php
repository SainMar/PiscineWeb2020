<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
echo $_SESSION["id_user_actual"]."".$_SESSION['pseudo_user_actual'];
// remove all session variables
session_unset();

// destroy the session
session_destroy();


?><meta http-equiv="refresh" content="1;url=index.php"> <?php
?>

<div class="container fluid">

        <h1 style="text-align: center; margin:auto;">Vous êtes déconnectez</h1>

</div>

</body>
</html>