<?php
include('db.php');
session_start();
if(isset($_SESSION['id']))
{
    if(isset($_POST['email']))
    {
        $email=$_POST['email'];
         if(isset($_POST['uid']))
    {
             $uid=(int)$_POST['uid'];
     $query = $db->prepare("SELECT * FROM users WHERE email=? and id!=? LIMIT 1");
              $query->bind_param("ss",$email,$uid);
         }
        else
        {
            $query = $db->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
             $query->bind_param("s",$email);
        }

        $query->execute();
 $user=$query->get_result()->fetch_assoc();
   
  if ($user) { // if user exists
    echo 0;
    }
else
        {
            echo 1;
        }
}
}
?>