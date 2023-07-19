<?php 
	include('header.php'); 
	include('session_check.php');	
   


?>


<div class="container">
    
    <h1>Construction Logistics Delay Prediction (Naive Bayes Algorithm)</h1>   

    <form action="prediction.php" method="POST" role="form">
        <legend>Input Data</legend>
    
        <div class="form-group">
            <label for="">Logistics Code</label>
            <select id="input" name="logistics" class="form-control" required="required">
                <?php
                $sql = "SELECT DISTINCT logistics_code FROM dataset";
                       
                       $result = mysqli_query($conn, $sql);
                        if($result)
                        {
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {

                                    echo '<option value="'.$row['logistics_code'].'">'.$row['logistics_code'].'</option>';
                                    
                                }
                            } 
                        }

                    ?>
            </select>
            
        </div>
        <div class="form-group">
            <label>Labours Absent</label>
            <div class="radio">
                <label>
                    <input type="radio" name="labour" value="0" checked="checked">
                    No
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="labour" value="1">
                    Yes
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>Financial Delay</label>
            <div class="radio">
                <label>
                    <input type="radio" name="financial" value="0" checked="checked">
                    No
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="financial" value="1">
                    Yes
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="">Weather Report</label>
            <select id="input" name="weather" class="form-control" required="required">
                <?php
                $sql = "SELECT DISTINCT weather_delay FROM dataset";
                       
                       $result = mysqli_query($conn, $sql);
                        if($result)
                        {
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {

                                    echo '<option value="'.$row['weather_delay'].'">'.$row['weather_delay'].'</option>';
                                    
                                }
                            } 
                        }

                    ?>
            </select>
            
        </div>
        <div class="form-group">
            <label>Redesign Architecture</label>
            <div class="radio">
                <label>
                    <input type="radio" name="redesign" value="0" checked="checked">
                    No
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="redesign" value="1">
                    Yes
                </label>
            </div>
        </div>
        
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>    

</div> 








<?php include('footer.php'); ?>