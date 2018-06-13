<?php
		session_start();
		include "connectdb.php";
		$inUsername = $_POST["email"]; 
		$inPassword = $_POST["password"]; 
	
 $query="select * from register where email='".$inUsername."' and password='".$inPassword."'";

 $result=mysqli_query($conn,$query); 

 if(!$result)
    die("Query Failed: " .  mysqli_error($conn));
 else{
     if(mysqli_num_rows($result)>0)
     {
        $_SESSION['email']=$inUsername;
        
		header("Location: user.html");
     }
    else
    {
       echo'You entered incorrect username or password ';
     }
 
	}
   ?>