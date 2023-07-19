<?php 
	include('header.php'); 
	include('session_check.php');	
   


?>

<style>
    h3{
        margin-top: 1em;
    }
    form{
        margin-top: -0.1em;
    }
</style>

<div class="container">
    
    <h3>List of Registered User</h3>   
    <table class="table table-hover">
        <thead>
            <tr>
                <th>id</th><th>Email Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
     $sql = "SELECT * FROM user";
                   
                   $result = mysqli_query($conn, $sql);
                    if($result)
                    {
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<tr><td>'.$row["id"].'</td><td>'.$row["email"].'</td></tr>';
                               
                               
                            }
                        } 
                    }


                    ?>
        </tbody>
    </table>
    


<?php include('footer.php'); ?>