<?php
session_start();
if(isset($_SESSION['id']))
{
    if($_SESSION['id']==1)
    {
        echo 1;
    }
    
}
else
{
    echo 0;
}
?>