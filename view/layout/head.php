<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title><?php echo $title; ?></title>
   <style>
  table, th, td {
  border: 2px solid rgb(255,0, 144);
  margin-left: auto;
  margin-right: auto;

}
body {background-color: rgb(100, 100, 100);}
   </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Menüpont</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Osztály
        </a>
        <div class="dropdown-menu  bg-dark" aria-labelledby="navbarDropdown">
            <?php
                foreach($osztalyok as $kulcs => $ertek) {
                        if($kulcs != $osztaly) {
                    echo "<h2><a href=\"index.php?osztalyId=$kulcs\">$ertek</a></h2>";
                 }  
                 else{
                    echo "<h2><a href=\"index.php?osztalyId=$kulcs\">$ertek</a></h2>";
                 }
            }
            ?>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=felhasznalo&action=belepes">Belépés <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form method="post" action="index.php" class="form-inline my-2 my-lg-0">
        <input type ="hidden" name="page" value="felhasznalo">
        <input type ="hidden" name="action" value="kereses">
        <input type="text" name="keresettNev" class="form-control mr-sm-2" type="search" placeholder="Kit akarsz keresni?" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">KERESÉS</button>
    </form>
  </div>
</nav>
<?php

if(isset($_SESSION['id'])) {
    echo "Üdv ".$_SESSION['nev']."!";
    echo ' <a href="index.php?page=felhasznalo&action=kilepes">KILÉPÉS</a>';
}
else {
    echo '<a href="index.php?page=felhasznalo&action=belepes"></a>';
}

?>