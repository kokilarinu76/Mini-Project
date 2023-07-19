<?php 

$conn = "";
$locations = "";

@session_start();

function debug($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function dbConnect($domain, $username, $password, $dbname){
    $servername = $domain;
    $username = "root";
    $password = "";
    $dbname = $dbname;
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}



$conn = dbConnect("localhost", "root", "root", "construction");


$sql = "SELECT * FROM contracters";

$la = array(0, 1);
$fd = array(0, 1);
$wd = array('N', 'R', 'W', 'F');
$ra = array(0, 1);
$delay = array(0, 1);


$result = mysqli_query($conn, $sql);
if($result)
{
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {


        	$l = $la[array_rand($la)];
        	$f = $fd[array_rand($fd)];
        	$w = $wd[array_rand($wd)];
        	$r = $ra[array_rand($ra)];
        	$d = $delay[array_rand($delay)];
      
            $log = $row['building_name'];
         
           $sql = "INSERT INTO dataset VALUES ('$log', $l, $f, '$w', $r, $d)";

           if (mysqli_query($conn, $sql)) {
                                       
                                        
                                    } 
        }
    } 
}


?>