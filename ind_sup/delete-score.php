<?php 
error_reporting(0);
include 'header2.php';

$id= $_GET['id'];        

date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');

$sql = "DELETE FROM score WHERE ID=? and presentation_score =?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id,'Not yet Uploaded']);
?>
<script type="text/javascript">;
alert("Only School Supervisor can Delete Student Score at this point"); 
window.location.href = "score-record.php";
</script>;
