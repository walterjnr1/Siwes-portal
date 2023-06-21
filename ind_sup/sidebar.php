<?php 
include 'header2.php';
?>
<aside class="main-sidebar"> 
    <!-- sidebar -->
    <div class="sidebar"> 
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center"><img src="<?php echo $row_user['photo'];   ?>" class="img-circle" alt="User Image"> </div>
        <div class="info">
          <p><?php echo $row_user['fullname'];   ?>(<?php echo $row_user['groupname'];   ?>)</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a> </div>
      </div>
      
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li class="active"> <a href="index.php"> <i class="icon-home"></i> <span>Dashboard</span>  </a>
          
        </li>

		
<li class="treeview"> <a href="#"> <i class="fa fa-user-plus"></i> <span>Student(s)</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">

            <li><a href="add-score.php"><i class="fa fa-angle-right"></i>Add Score</a></li>
			  <li><a href="student-record.php"><i class="fa fa-angle-right"></i>Manage Student</a></li>
			          </ul>
        </li>
       		 <li class="treeview"> <a href="#"> <i class="fa fa-database"></i> <span>Log Book</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            
          <li><a href="score-record.php"><i class="fa fa-angle-right"></i>Upload Logbook</a></li>
			  <li><a href="logbook-record.php"><i class="fa fa-angle-right"></i>Manage Log Books</a></li>
          </ul>
        </li>
         
        <li class="treeview"> <a href="#"> <i class="fa fa-percent"></i> <span>Score</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            
          <li><a href="add-score.php"><i class="fa fa-angle-right"></i>Add Score</a></li>
			  <li><a href="score-record.php"><i class="fa fa-angle-right"></i>Manage Score</a></li>
          </ul>
        </li>

     
		 <li> <a href="logout.php"> <i class="fa fa-sign-out"></i> <span>Logout</span>  </a>
      </ul>
    </div>
    <!-- /.sidebar --> 
  </aside>