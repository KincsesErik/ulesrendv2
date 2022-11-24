<?php

// controller

require 'model/Szemely.php';
$szemely = new Szemely($db);

require 'model/Osztaly.php';

$osztaly = 1;

if(isset($_REQUEST['osztalyId'])) {
    $osztaly = $_REQUEST['osztalyId'];
}

// melyik osztályban van a keresett személy?
if(isset($_GET['szemelyId'])) {
    if($szemelyOsztalya = $szemely->getOsztaly($_GET['szemelyId'])) {
        $osztaly = $szemelyOsztalya;
    }
}

$osztalyPeldany = new Osztaly($osztaly, $db);

$osztalyok = $osztalyPeldany->getAll($db);

if(!array_key_exists($osztaly, $osztalyok)) {
    $osztaly = 1;
}
    
$sql = "SELECT szemelyId, nev, sor, oszlop  FROM szemelyek WHERE osztalyId = ".$osztaly;

$result = $db->dbSelect($sql);

require 'view/index/index.php';
    
?>