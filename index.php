<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<?php

    // phpteszter
    // 7Cx/QtIPg/Zaoftk

require 'db.inc.php';
$db = new DataBase();


require 'model/Szemely.php';
$szemely = new Szemely($db);

require 'model/Osztaly.php';

$osztaly = 1;

if(isset($_REQUEST['osztalyId'])) {
    $osztaly = $_REQUEST['osztalyId'];
}

//melyik osztályban van a keresett személy?
    if(isset($_GET['szemelyId'])){
        if($szemelyOsztalya = $szemely->getOsztaly($_GET['szemelyId'])){
            $osztaly = $szemelyOsztalya;
        }
    }

    $osztalyPeldany = new Osztaly($osztaly, $db);

    $osztalyok = $osztalyPeldany->getAll($db);

    if(!array_key_exists($osztaly, $osztalyok)){
        $osztaly = 1;
    }

?>
<title><?php echo $osztalyok[$osztaly]; ?></title>
<style>
    table, th, td {
        border: 2px solid rgb(234, 10, 142);
    }
    body {background-color: rgb(107, 107, 107);}

</style>
</head>
<body>
    <?php

echo "<h1>$osztalyok[$osztaly]</h1>";

?>
<form method="post" action="lista.php">
    <input type="text" name="keresettNev">
    <input type="submit" value="KERES">
</form>
<?php

foreach($osztalyok as $kulcs => $ertek) {
    if($kulcs !=$osztaly) {
        echo "<h2><a href=\"index.php?osztalyId=$kulcs\">$ertek</a></h2>";
    }
}

?>

<?php

$sajatMagam = array('sorId'=> 22, 'mezoNeve' =>'nev2');

$sql = "SELECT sorId, nev1, nev2, nev3, nev4, nev5 FROM sorok WHERE osztalyId=".$osztaly;

if ($result = $db->dbSelect($sql)){
    echo '<table>';
    while($row = $result->fetch_assoc()){
    echo"<tr>";
    for($i=1; $i<6; $i++) {
        $nev = "-";
        $mezoNev = 'nev'.$i;
        if($row[$mezoNev] != null) {
            $nev = $szemely->getNev($row[$mezoNev],$db);
        }
        $bg = "";
        if(isset($_GET['szemelyId'])){
            if($_GET['szemelyId']==$row[$mezoNev]){
                $bg = "background-color: yellow;";
            }
        }
    if($row['sorId'] == $sajatMagam['sorId'] and $sajatMagam['mezoNeve'] == $mezoNev) {
        echo "<td style=\"color.rgb(101, 1, 252);$bg\">".$nev."</td>\n";
    }
    else echo "<td stlye =\"$bg\">".$nev."</td>\n";
    }
    echo "</tr>";
}
echo "</table>";
}
else {
    echo "Nincsenek tanulók ebben az osztályban";
}
?>
</body>
</html>