<?php 
error_reporting(0);
include 'header2.php';

$id= $_GET['id'];        

date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');

$sql = "DELETE FROM score WHERE ID=?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id]);

header("Location: score-record.php"); 
 ?>