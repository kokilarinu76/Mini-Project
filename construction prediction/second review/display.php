<?php 
	include('header.php'); 
	include('session_check.php');	
   

    $uid = $_SESSION['id'];
    $sql = "SELECT * FROM user_input WHERE uid = ".$uid;


                   




    ?>


    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                   
                       <th>logistics_code</th>
                       <th>labours_absent</th>
                       <th>financial_delay</th>
                        <th>weather_delay </th>
                       <th>redesign_architecture</th>
                       <th>description </th>

                </tr>
            </thead>
            <tbody>
                <?php 

                    $result = mysqli_query($conn, $sql);
                    if($result)
                    {
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {

                                echo '<tr>
                                    <td>'.$row['logistics_code'].'</td>
                                    <td>'.$row['labours_absent'].'</td>
                                    <td>'.$row['financial_delay'].'</td>
                                    <td>'.$row['weather_delay'].'</td>
                                    <td>'.$row['redesign_architecture'].'</td>
                                    <td>'.$row['description'].'</td>

                                </tr>';
                                
                            }
                        } 
                    }

                    ?>
               
            </tbody>
        </table>
    </div>






<?php include('footer.php'); ?>