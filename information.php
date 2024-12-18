<?php

    session_start();
    if(isset($_SESSION['username'])){
        echo "Welcome ".$_SESSION['username'];
        echo "<br>";
        echo "password is ".$_SESSION['password'];
        echo "<br>";
        echo "email is ".$_SESSION['email'];
    } else{
        echo "Please login again to continue";
    }
    
    

?>