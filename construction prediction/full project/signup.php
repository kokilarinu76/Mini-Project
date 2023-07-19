<?php include('header.php'); ?>

            <?php

                     if(isset($_POST['signup']))
                        {
                            if($_POST['uname'] && $_POST['upass']){

                                $uname = $_POST['uname'];
                                $upass = $_POST['upass'];
                                $cpass = $_POST['cpass'];
                                
                                if($upass == $cpass)
                                {
                                    
                                    $sql = "INSERT INTO user (email, password) VALUES ('$uname', '$upass')";

                                    if (mysqli_query($conn, $sql)) {
                                       
                                        header('Location: login.php');
                                        exit();
                                    } 
                                    
                                    else {
                                        
                                         echo '<div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" role="alert">&times;
                                                    </button>
                                                    Register Failure, Try Again
                                                </div>';

                                    }

                                   
                                }
                                else
                                {
                                    echo '<div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" role="alert">&times;
                                                </button>
                                                Verify your password, Try Again
                                            </div>';
                                }
                                



                            }
                            else
                            {
                               
                                echo '<div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" role="alert">&times;
                                                </button>
                                               Please enter data, Try Again
                                            </div>';
                      
                            }
                        }
                       

            ?>
        
            <div class="jumbotron text-sm-center">
            <h1 class="display-3">Construction Logistics Delay Prediction</h1>
            <p class="lead">Already have a account, </p>
            <hr class="m-y-2">
            <p>Login to continue.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="login.php" role="button">Login</a>
            </p>
        </div>
        
        <form class="form" action="signup.php" method="POST" enctype="multipart/form-data" role="form">
            <h1 class="text-sm-center">  Register Form </h1>
            <div class="form-group">
                <label for="Username">Email</label>
                <input type="text" name="uname" class="form-control" id="Username" placeholder="Email">
            </div>
            <div class="form-group">
               <label for="Password">Password</label>
               <input type="password" name="upass" class="form-control" id="Password" placeholder="Password">
            </div>
             <div class="form-group">
               <label for="Password">Confirm Password</label>
               <input type="password" name="cpass" class="form-control" id="Password" placeholder="Confirm Password">
            </div>
            <button type="submit" name="signup" class="btn btn-primary">Submit</button>

       </form>

<?php include('footer.php'); ?>