<?php

$title = "FELTOLTES";
include 'view/layout/head.php';

    echo $eredmeny;
    ?>
    <form action="index.php?page=felhasznalo&action=feltoltes" method="post" enctype="multipart/form-data">
        Profilkép feltöltése:
        <input type="file" name="profilkep" id="fileToUpload">
        <input type="submit" value="Feltöltés" name="submit">
    </form>
   <?php
   include 'view/layout/head.php';
   ?>
   </body>
   </html>