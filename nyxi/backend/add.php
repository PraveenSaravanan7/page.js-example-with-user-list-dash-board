<?php
include('db.php');
session_start();
if(isset($_SESSION['id']))
   {
       if(isset($_POST['name']))
       {
           $name=$_POST['name'];
           $email=$_POST['email'];
           $phone=$_POST['phone'];
           $address=$_POST['address'];
           $dob=$_POST['date'];
           $query = $db->prepare("INSERT INTO `users`(`name`, `email`, `phone`, `address`, `dob`) VALUES (?,?,?,?,?) ");
           $query->bind_param("sssss",$name,$email,$phone,$address,$dob);
           if($query->execute())
           {
              // mail($email,"You are added","You are added"); mail to user when added in list
           }
           
       }
   }
?>