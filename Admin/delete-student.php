<?php 
error_reporting(0);
include 'header2.php';

$id= $_GET['rid'];        

date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');

$sql = "DELETE FROM tblstudent WHERE reg_num=?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id]);

header("Location: student-record.php"); 
 ?>