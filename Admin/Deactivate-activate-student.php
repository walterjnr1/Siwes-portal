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
	
	 // for activate student   	
if(isset($_GET['id']))
{
$id=intval($_GET['id']);

//Generate password
function randompassword() {
    $alphabet = "abxcdefghiXZ012ABCDSEFGHY3456789";
    $refID = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 6; $i++) {
        $n = rand(0, $alphaLength);
       $refID[] = $alphabet[$n];
    }
    return implode($refID); //turn the array into a string
}
$password = randompassword();

mysqli_query($conn,"update tblstudent set status='1',password='$password' where ID='$id' ");
header("location: student-record.php");
}

// for Deactivate student
if(isset($_GET['did']))
{
$did=intval($_GET['did']);
mysqli_query($conn,"update tblstudent set status='0' where ID='$did'");
header("location: student-record.php");


header("location: student-record.php");
}
}
?>