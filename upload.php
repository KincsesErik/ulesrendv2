<?php

session_start();

$target_dir = "uploads/";
$target_file = $target_dir . $_SESSION['id'].".jpg";

if (move_uploaded_file($_FILES["profilkep"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["profilkep"]["name"])). " has been uploaded.";
  } 
  else {
    echo "Sorry, there was an error uploading your file.";
  }

?>