<?php
include('db.php');
session_start();
if(isset($_SESSION['id']))
{
    if(isset($_POST['loadlist']))
    {
        if($_POST['all']==1)
        {
     $query = "SELECT * FROM users order by id asc"; 
        }
        if($_POST['all']==0)
        {
     $query = "SELECT * FROM users order by id desc limit 1"; 
        }
     $results=mysqli_query($db,$query);
     $rows = array();
     while ($row = mysqli_fetch_assoc($results)) { 
         array_push($rows,$row);
                                                 }
     
  echo json_encode($rows);
    }
     if(isset($_POST['uid']))
    {
         $uid=(int)$_POST['uid'];
        if(mysqli_query($db,"DELETE FROM `users` WHERE id=$uid"))
        {
             // mail($email,"You are removed","You are removed"); mail to user when remove in list
        }
     }
}
?>