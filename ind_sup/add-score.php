<?php include 'header2.php'; 
error_reporting(0);

if(strlen($_SESSION['login_email'])=="")
  {   
   header("Location: login.php"); 
   }

if(isset($_POST["btnsubmit"]))
{
		
///check if session already exist
$stmt = $dbh->prepare("SELECT * FROM score WHERE reg_num=? and session_siwes=?");
$stmt->execute([$_POST['cmdstudent'],$_POST['txtsession']]); 
$result = $stmt->fetch();

if ($result) {
$error='Student Score Already Submitted ';
} elseif (($_POST['txtattendance']) > 6){
$error='Attendance Score can not exceed 6% ';
} elseif (($_POST['txtpunctuality']) > 5){
  $error='Punctuality Score can not exceed 5% ';
} elseif (($_POST['txtperformance']) > 14){
  $error='Performance Score can not exceed 14% ';
} elseif (($_POST['txtrelationship']) > 5){
  $error='Relationship Score can not exceed 5% ';
}else{

//calculate total score
$total=$_POST['txtattendance'] + $_POST['txtpunctuality'] + $_POST['txtperformance']+ $_POST['txtrelationship'];

 //Add score details
$sql = 'INSERT INTO score(reg_num,session_siwes,attendance_score,punctuality_score,performance_score,relationship_score,logbook_score,physicalpresence_score,interview_score,report_score,defense_score,total_score) VALUES(:reg_num,:session_siwes,:attendance_score,:punctuality_score,:performance_score,:relationship_score,:logbook_score,:physicalpresence_score,:interview_score,:report_score,:defense_score,:total_score)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':reg_num' => $_POST['cmdstudent'],
	':session_siwes' => $_POST['txtsession'],
	':attendance_score' => $_POST['txtattendance'],
	':punctuality_score' => $_POST['txtpunctuality'],
  ':performance_score' => $_POST['txtperformance'],
	':relationship_score' => $_POST['txtrelationship'],
  ':logbook_score' => 'Not yet Uploaded',
	':physicalpresence_score' => 'Not yet Uploaded',
	':interview_score' => 'Not yet Uploaded',
	':report_score' => 'Not yet Uploaded',
	':defense_score' => 'Not yet Uploaded',
	':total_score' => $total
	
]);
if ($statement){


$success='SIWES score Added Successfully ';

}else{
$error='Problem Adding SIWES Score ';
}
}
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/adminkit/demo/main/ltr/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 17:41:22 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Add SIWES Score|<?php echo $row_website['website_name']; ?></title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- v4.0.0 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $row_website['favicon'];   ?>">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">
<link rel="stylesheet" href="dist/css/simple-lineicon/simple-line-icons.css">

<!-- form wizard -->
<link rel="stylesheet" href="dist/plugins/formwizard/jquery-steps.css">
<!-- dropify -->
<link rel="stylesheet" href="dist/plugins/dropify/dropify.min.css">

<script type="text/javascript">

var logbook = document.getElementById("txtlogbook");
var presentation = document.getElementById("txtpresentation");
var remark = document.getElementById("txtsiwesplace");
var total = document.getElementById("txttotal");

function calculation() {

   var logbook = parseFloat(txtlogbook.value);
     if (isNaN(logbook)) logbook = 0;
	 
   var presentation = parseFloat(txtpresentation.value);
  if (isNaN(presentation)) presentation = 0;
   
   var remark = parseFloat(txtsiwesplace.value);
   if (isNaN(remark)) remark = 0;
   

   var result = logbook + presentation + remark;
   document.getElementById("txttotal").value = result;
}
</script>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">

    <?php include 'header.php'; ?>

  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'sidebar.php'; ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>&nbsp;</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>Add SIWES Score</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="row" align="center" >
	   <p align="center">	
	   			<?php if($success){?>
          <div class="alert alert-success" role="alert" align="center">  <?php echo ($success); ?></div>
		  <?php } 
					else if($error){?>
           <div class="alert alert-danger" role="alert">  <?php echo ($error); ?></div>
 <?php } ?>
</p>
        
      </div>
      <div class="row m-t-3">
       
        <div class="col-lg-8">
          <div class="card ">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">Add SIWES Score</h5>
            </div>
            <div class="card-body">
              
             <form  action="" method="POST" enctype="multipart/form-data">
              <div class="row">
                
			<div class="col-md-10">
                  <div class="form-group has-feedback">
                    <label class="control-label">Student Name</label>
			<?php
			$sql = "select * from tblstudent";
             $estate = $dbh->query($sql);                       
             $estate->setFetchMode(PDO::FETCH_ASSOC);
             echo '<select name="cmdstudent"  id="cmdstudent" class="form-control" required>';
		echo '<option value="">Select Student Name</option>';
             while ( $row = $estate->fetch() ) 
             {
                echo '<option value="'.$row['reg_num'].'">'.$row['fullname'].'</option>';
             }
             echo '</select>';
			 ?>                   
			  </div>
                </div>   
				<div class="col-md-10">
                  <div class="form-group has-feedback">
                    <label class="control-label">Session</label>
                    <input class="form-control" name="txtsession" id="txtsession"  value="<?php if (isset($_POST['txtsession']))?><?php echo $_POST['txtsession']; ?>" type="text" required>
				    </div>
                </div>
	
				 <div class="col-md-5">
                  <div class="form-group has-feedback">
                    <label class="control-label">Attendance(6%)</label>
                    <input class="form-control" name="txtattendance" id="txtattendance" value="<?php if (isset($_POST['txtattendance']))?><?php echo $_POST['txtattendance']; ?>" required >
				    </div>
            </div>
            <div class="col-md-5">
                  <div class="form-group has-feedback">
                    <label class="control-label">Punctuality(5%)</label>
                    <input class="form-control" name="txtpunctuality" id="txtpunctuality" value="<?php if (isset($_POST['txtpunctuality']))?><?php echo $_POST['txtpunctuality']; ?>"  required >
				    </div>
            </div>
            <div class="col-md-5">
                  <div class="form-group has-feedback">
                    <label class="control-label">Performance on Job(14%)</label>
                    <input class="form-control" name="txtperformance" id="txtperformance" value="<?php if (isset($_POST['txtperformance']))?><?php echo $_POST['txtperformance']; ?>" required >
				    </div>
            </div>
            <div class="col-md-5">
                  <div class="form-group has-feedback">
                    <label class="control-label">Relationship with industry Supervisor(5%)</label>
                    <input class="form-control" name="txtrelationship" id="txtrelationship" type="num" value="<?php if (isset($_POST['txtrelationship']))?><?php echo $_POST['txtrelationship']; ?>" required >
				    </div>
            </div>
			
                <div class="col-md-10">
                  <button type="submit" name="btnsubmit" class="btn btn-success">Submit</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
     
    </div>
        </div>
      </div>
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-left hidden-xs"><?php include'footer.php';  ?>.</footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/adminkit.js"></script>

<!-- form wizard --> 
<script src="dist/plugins/formwizard/jquery-steps.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<!-- dropify --> 
<script src="dist/plugins/dropify/dropify.min.js"></script> 
<script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>

<script>
    var frmRes = $('#frmRes');
    var frmResValidator = frmRes.validate();
	
    var frmInfo = $('#frmInfo');
    var frmInfoValidator = frmInfo.validate();

    var frmLogin = $('#frmLogin');
    var frmLoginValidator = frmLogin.validate();

    var frmMobile = $('#frmMobile');
    var frmMobileValidator = frmMobile.validate();

    $('#demo1').steps({
      onChange: function (currentIndex, newIndex, stepDirection) {
        console.log('onChange', currentIndex, newIndex, stepDirection);
        // tab1
        if (currentIndex === 0) {
          if (stepDirection === 'forward') {
            var valid = frmRes.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmResValidator.resetForm();
          }
        }
		
		// tab2
        if (currentIndex === 1) {
          if (stepDirection === 'forward') {
            var valid = frmInfo.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmInfoValidator.resetForm();
          }
        }

        // tab3
        if (currentIndex === 2) {
          if (stepDirection === 'forward') {
            var valid = frmLogin.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmLoginValidator.resetForm();
          }
        }

        // tab4
        if (currentIndex === 3) {
          if (stepDirection === 'forward') {
            var valid = frmMobile.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmMobileValidator.resetForm();
          }
        }

        return true;

      },
      onFinish: function () {
        alert('Wizard Completed');
      }
    });
  </script> 
<script>
    $('#demo').steps({
      onFinish: function () {
        alert('Wizard Completed');
      }
    });
  </script>
  	 
</body>

<!-- Mirrored from uxliner.com/adminkit/demo/main/ltr/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 17:41:22 GMT -->
</html>
