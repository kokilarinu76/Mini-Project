
<?php 
	include('header.php'); 
	include('session_check.php');	
   	

	

?>

<style>
    h3{
        margin-top: 20px; 
    }
    .result{
        background: #373a3c;
        color:#fff;
        padding-left: 30px;
        padding-bottom: 20px;
        
        margin-top: 2em;
        border-radius: 5px 5px;
    }
</style>

<div class="container">
    
    <h3>Construction Logistics Delay Prediction (Naive Bayes Algorithm)</h3>   
    <div class="col-md-offset-4 col-md-4 result">
    <?php if(isset($_POST)){calculateClassProbability($conn, $_POST); }?>
    </div>
</div> 








<?php include('footer.php'); ?>