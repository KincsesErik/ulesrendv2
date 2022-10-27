<?php

session_start();



if(isset($_GET['kilepes'])){
    session_unset();
    $eredmeny="Sikeres kilépés";
}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
 
 require 'db.inc.php';
 $db = new DataBase();
 
 
 require 'model/Szemely.php';
 $szemely = new Szemely($db);
 
 require 'model/Osztaly.php';


 print_r($_SESSION);

 $eredmeny ="";
 $eredmenySzovegek = array(
    "Nincs ilyen felhasznalónév",
    "Sikertelen belépés: hibás jelszó!",
    "Sikeres belépés"
 );

 if(isset($_POST['felhnev']) && isset ($_POST['jelszo'])) {
    $login= $szemely->checkLogin($_POST['felhnev'], $_POST['jelszo']);
    $eredmeny =$eredmenySzovegek[$login];

 }

 ?>
 <title>BELÉPÉS</title>
    <style>
table, th, td {
    border: 2px solid rgb(143, 22, 233);
}
body {background-color: rgb(107, 107, 107);}
    </style>
</head>
<body>

<?php

echo $eredmeny;
    if(!isset($_SESSION['id'])){
?>
<form action="belepes.php" method="post">
Felhasználónév:<br>
<input type="text" name="felhnev" placeholder="Írd be a felhasználóneved" required><br>
Jelszó:<br>
<input type="password" name="jelszo" required><br>
<input type="submit">
<?php
}
else{
    ?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Profilkép feltöltése:
    <input type="file" name="profilkep" id="fileToUpload">
    <input type="submit" value="Feltöltés" name="submit">
</form>
    <?php
}
?>
    <hr>
    <a href="index.php"><< VISSZA</a>
</body>
</html>