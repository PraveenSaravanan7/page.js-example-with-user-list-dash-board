<?php
include('db.php');
session_start();
if(isset($_SESSION['id']))
   {
       if(isset($_POST['uid']))
       {
           $uid=(int)$_POST['uid'];
           $name=$_POST['name'];
           $email=$_POST['email'];
           $phone=$_POST['phone'];
           $address=$_POST['address'];
           $dob=$_POST['date'];
           $query = $db->prepare("UPDATE `users` SET `name`=?,`email`=?,`phone`=?,`address`=?,`dob`=? WHERE `id`=$uid");
           $query->bind_param("sssss",$name,$email,$phone,$address,$dob);
           $query->execute();
       }
    if(isset($_POST['getfid']))
    {
        $id =(int)$_POST['getfid'];
         $query = "SELECT * FROM users where id=$id"; 
        
     $results=mysqli_query($db,$query);
     $rows = array();
     while ($row = mysqli_fetch_assoc($results)) { 
         array_push($rows,$row);
                                                 }
     
  echo json_encode($rows);
    }
   }
?>