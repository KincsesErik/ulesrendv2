<?php 

require_once 'db.inc.php';

class Osztaly {

    private $osztalyID;
    private $osztalyNev;

    function __construct($osztalyID ,$db){
        $sql = "SELECT osztalyNev FROM osztalyok WHERE osztalyID = ".$osztalyID;
			if($result = $db->dbSelect($sql)) {
				$osztalySor = $result->fetch_assoc();
				$this->osztalyNev = $osztalySor['osztalyNev'];
                $this->osztalyID = $osztalyID;
            }
        
    }

    public function getNev(){
        return $this->osztalyNev;
    }

    public function getAll($db){
        $osztalyok = array();
    //$sajatMagam = array('osztaly'=> "13 i",'sorom' => 2, 'oszlopom' => 0);

    $sql = "SELECT osztalyID, osztalyNev FROM osztalyok";

    if($result = $db->dbSelect($sql)){
		  while($row = $result->fetch_assoc()){
			$osztalyok[$row['osztalyID']] = $row['osztalyNev'];
		}
	}
    return $osztalyok;
    }

}

?>