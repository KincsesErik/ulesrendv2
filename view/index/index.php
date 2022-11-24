<?php 

$title = $osztalyok[$osztaly];
include 'view/layout/head.php';

echo "<h1>$osztalyok[$osztaly]</h1>";

?>

<br>
    <?php

    if ($result) {
        echo '<table>';
        $sor =0;
        while($row = $result->fetch_assoc()) {
            if($row['sor']!=$sor){
                echo "<tr>";
                $sor = $row['sor'];
            }
            
           // for($i=1; $i<6; $i++) {

                $bg = "";
                if(isset($_GET['szemelyId'])) {
                    if($_GET['szemelyId'] == $row['szemelyId']) {
                        $bg = "background-color: blue;";
                    }
                }
                if(isset($_SESSION['id'])) {
                    if($_SESSION['id'] == $row['szemelyId']) {
                        echo "<td style=\"color:rgb(144, 100, 100);$bg\">".$nev;
                    }
                    else echo "<td style=\"$bg\">".$row['nev'];
                }
                else echo "<td style=\"$bg\">".$row['nev'];
                
                $img = "uploads/".$row['szemelyId'].".jpg";
                if(file_exists($img)) {
                    echo "<br><img src=\"$img\">";
                }
                echo "</td>\n";
            
        }
        echo '</table>';
    }
    else {
        echo "Nincsenek tanulók eben az osztályban";
    } 
    ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>