<?php


 

require_once('../model/regdb.php');
$username=$_POST['username'];
$name=$_POST['name'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$status=register($username,$name,$password,$phone,$email);
if($status)
{
    echo "Account Created";
    header('location:../view/login.php');
    
}
else{
    echo "Error";
}




?>
