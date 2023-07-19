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

function pc($class, $value)
{
    // echo "<br>prior class probability P(C".($value+1).") <br>";
    //debug($class);

    $total = count($class);
    $sum = 0;
    foreach ($class as $i) {
        # code...
        if ($i == $value) {

            $sum++;

        }
        
    }
    
    return $sum/$total;
}

function tpc($class, $value)
{
    $total = count($class);
    $sum = 0;
    foreach ($class as $i) {
        # code...
        if ($i == $value) {

            $sum++;

        }
        
    }
    
    return $sum;
}

function computeProbability($logistics, $labour, $financial, $weather, $redesign, $pc, $tpc, $attribute)
{
    //debug($attribute);
    $logistics_prob = 0;
    $labour_prob = 0;
    $financial_prob = 0;
    $weather_prob = 0;
    $redesign_prob = 0;

    foreach ($attribute as $key => $value) {
        if($value['logistics'] == $logistics)
        {
            $logistics_prob++;
        }
        if($value['labour'] == $labour){

            $labour_prob++;
        }
        if($value['financial'] == $financial){

            $financial_prob++;
        }
        if($value['weather'] == $weather){

            $weather_prob++;
        }
        if($value['redesign'] == $redesign){

            $redesign_prob++;
        }

    }

    $logistics_prob /= $tpc; 
    $labour_prob /= $tpc;
    $financial_prob /= $tpc;
    $weather_prob /= $tpc;
    $redesign_prob /= $tpc;

    $mul = $logistics_prob * $labour_prob * $financial_prob * $weather_prob * $redesign_prob;
    
    return $mul * $pc;
}

function calculateClassProbability($conn, $data) {
   // debug($data);
   $class = array();
   $attribute = array();
   $pc = array();
   $tpc = array();
   $sql = "SELECT * FROM dataset";
                   
   $result = mysqli_query($conn, $sql);
    if($result)
    {
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
               $temp = array();
               $temp['logistics'] = $row['logistics_code'];
               $temp['labour'] = $row['labours_absent'];
               $temp['financial'] = $row['financial_delay'];
               $temp['weather'] = $row['weather_delay'];
               $temp['redesign'] = $row['redesign_architecture'];
               

               array_push($class, $row['delay']);
               array_push($attribute, $temp);
            }
        } 
    }

    pc($class, 0);
    pc($class, 1);

    $pc[1] = pc($class, 0);
    $pc[2] = pc($class, 1);
    $tpc[1] = tpc($class, 0);
    $tpc[2] = tpc($class, 1);

    $logistics = $data['logistics']; 
    $labour = $data['labour']; 
    $financial = $data['financial']; 
    $weather = $data['weather']; 
    $redesign = $data['redesign'];

    $p1 = computeProbability($logistics, $labour, $financial, $weather, $redesign, $pc[1], $tpc[1], $attribute) - 0.0001;
    $p2 = computeProbability($logistics, $labour, $financial, $weather, $redesign, $pc[2], $tpc[2], $attribute);
    

    if($p1 > $p2)
    {   
       // echo $p1;
        echo "<br>Construction may get Delayed<br>";
    }
    else
    {
       // echo $p2;
        echo "<br>Construction will be done on time<br>";
    }

  //  debug($attribute);

}

$conn = dbConnect("localhost", "root", "root", "construction");



//getYesNo($conn);
//echo getTotalPopulation($conn, "nagapattinam");
// getYesNo($conn, $location, $field, $flag = 1);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

    <title>Construction Logistics Delay Prediction</title>
<!--  -->
<style>
       
form
    {
        width: 500px;
        margin: 30px auto;
    }
    .product, .comment
    {
        margin: 30px 0px;
        padding: 10px;
        border: 1px solid #eee;
        box-shadow: 1px 1px 3px;
        
    }
</style>

</head>

<body>
    <div class="container">
      <nav class="navbar navbar-light bg-faded">
        <a class="navbar-brand" href="index.php">Construction Logistics Delay Prediction</a>
        <ul class="nav navbar-nav">
          
           
            <?php if(isset($_SESSION['id']) && $_SESSION['id']) { ?>
                 
                <li class="nav-item active">
                    <a class="nav-link" href="#"><?php echo $_SESSION['email']; ?></a>
                </li>

                 <li class="nav-item active">
                    <a class="nav-link" href="insert.php">Feedback</a>
                </li>

                 <li class="nav-item active">
                    <a class="nav-link" href="display.php">Display</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="admin_login.php">Admin</a>
                </li>
            

               
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            
            <?php } else {  ?>
            
                <li class="nav-item active">
                <a class="nav-link" href="login.php">Sign In</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="signup.php">Sign Up</a>
                </li>
            
            <?php } ?>
            
            
        </ul>
      
    </nav>