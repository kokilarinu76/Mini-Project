   <?php

if(isset($_SESSION['id']) && $_SESSION['id'])
{
    $uid = $_SESSION['id'];
}
else
{
    unset($_SESSION);
    session_destroy();
    header("Location: login.php");
    exit();
   
    
}
?>