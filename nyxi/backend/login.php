<?php
include('db.php');
session_start();
if(isset($_POST['email']))
{
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query = $db->prepare("SELECT * FROM admin WHERE email=? AND password=? limit 1");
      
       
      $query->bind_param("ss",$email,$password);
      $query->execute();
      $results=$query->get_result()->fetch_assoc();
  	if ($results) { 
       $_SESSION['id']=1;
        echo 1;
        
    }
          else {
  		
        echo 0;
  	}
   
}
?>