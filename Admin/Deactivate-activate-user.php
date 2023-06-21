<?php
session_start();
error_reporting(0);
include('connect.php');
include('connect2.php');

date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');


if(empty($_SESSION['login_email']))
    {   
    header("Location: index.php"); 
    }
    else{
	
	 // for activate user   	
if(isset($_GET['id']))
{
$id=intval($_GET['id']);

mysqli_query($conn,"update users set status='Active' where ID='$id' ");
header("location: user-record.php");
}

// for Deactivate user
if(isset($_GET['did']))
{
$did=intval($_GET['did']);
mysqli_query($conn,"update users set status='Inactive' where ID='$did'");
header("location: user-record.php");


header("location: user-record.php");
}
}
?>