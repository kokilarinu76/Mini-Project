
<?php 
	include('header.php'); 
	include('session_check.php');	
   	

	

?>


<div class="container">
    
    <h1>Construction Logistics Delay Prediction (Naive Bayes Algorithm)</h1>   

    <?php if(isset($_POST)){calculateClassProbability($conn, $_POST); }?>

</div> 








<?php include('footer.php'); ?>