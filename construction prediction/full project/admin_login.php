<?php include('header.php'); ?>

    <?php

        if(!isset($_SESSION['id']))
        {
            if(isset($_POST['login']))
            {
                if($_POST['uname'] && $_POST['upass']){

                    
                    $uname = $_POST['uname'];
                    $upass = $_POST['upass'];

                    $sql = "SELECT * FROM admin WHERE email = '".$uname."' AND password = '".$upass."' LIMIT 1";
                   
                   $result = mysqli_query($conn, $sql);
                    if($result)
                    {
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {

                                $_SESSION['id'] = $row['id'];

                                $_SESSION['email'] = $row["email"];
                                $_SESSION['admin'] = true;
                                header("Location: index.php");
                            }
                        } 
                    }
                    else
                    {
                        
                                echo '<div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" role="alert">&times;
                                    </button>
                                    Login Failure, Try Again
                                </div>';




                    }




                }
             }
        } 

                 $feedback= $_POST['logistics'];
                 $sql = "SELECT uid,description,logistics_code FROM user_input WHERE logistics_code='".$feedback."';
        else {
            header('Location: admin_login.php');
            exit();
        }

    
    ?>
            <div class="jumbotron text-sm-center">
            <h1 class="display-3">Construction Delay</h1>
            <p>Admin Login</p>
        </div>
        
        <form class="form" action="admin_login.php" method="POST" enctype="multipart/form-data" role="form">
            <h1 class="text-sm-center">  Login  </h1>
            <div class="form-group">
                <label for="Username">Email</label>
                <input type="text" name="uname" class="form-control" id="Username" placeholder="Email">
            </div>
            <div class="form-group">
               <label for="Password">Password</label>
               <input type="password" name="upass" class="form-control" id="Password" placeholder="Password">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Submit</button>

       </form>

<?php include('footer.php'); ?>