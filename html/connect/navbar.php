<?php echo '
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<a href="" class="brand-link">
<img src="/presence/asset/icon/logo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
<span class="brand-text font-weight-light">PRESENCE</span>
</a>


<div class="sidebar">
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
  <img src="/Presence/asset/icon/pic.jpg" class="img-circle elevation-2" alt="User Image">
  </div>
  <div class="info">
    <a href="#" class="d-block">Admin</a>
  </div>
</div>

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        '?>
          <?php if ($page=='index'){echo '<li class="nav-item">
                <a href="../presence/index.php" class="nav-link active">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>';}
              else{echo '<li class="nav-item">
                <a href="../presence/index.php" class="nav-link">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>';}
              ?>

              <?php if ($page=='regform'){echo'<li class="nav-item">
                <a href="../registration/registration_form.php" class="nav-link active">
                  <i class="fas fa-edit nav-icon"></i>
                  <p>Student Registration</p>
                </a>
              </li>';}
              else {echo '<li class="nav-item">
                <a href="../registration/registration_form.php" class="nav-link">
                  <i class="fas fa-edit nav-icon"></i>
                  <p>Student Registration</p>
                </a>
              </li>';}?>

              <?php if($page=='teachform'){echo '<li class="nav-item">
                <a href="../teacherform/teacherform.php" class="nav-link active">
                  <i class="fas fa-chalkboard-teacher nav-icon"></i>
                  <p>Teacher Registration</p>
                </a>
              </li>';}
              else {echo '<li class="nav-item">
                <a href="../teacherform/teacherform.php" class="nav-link">
                  <i class="fas fa-chalkboard-teacher nav-icon"></i>
                  <p>Teacher Registration</p>
                </a>
              </li>';}?>

              <?php if($page=='datatable'){echo '<li class="nav-item">
                <a href="../presence/datatable.php" class="nav-link active">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Student Profiles</p>
                </a>
              </li>';}
              else {echo '<li class="nav-item">
                <a href="../presence/datatable.php" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Student Profiles</p>
                </a>
              </li>';}?>

              <?php if($page=='teachtable'){echo '<li class="nav-item">
                <a href="../presence/teachertable.php" class="nav-link active">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p>Teacher Profiles</p>
                </a>
              </li>';}
              else {echo '<li class="nav-item">
                <a href="../presence/teachertable.php" class="nav-link">
                  <i class="fas fa-user-friends nav-icon"> </i>
                  <p>Teacher Profiles</p>
                </a>
              </li>';}?>

              <?php if($page=='archive'){echo '<li class="nav-item">
                <a href="../presence/archive.php" class="nav-link active">
                  <i class="fa fa-archive nav-icon"></i>
                  <p>Archive</p>
                </a>
              </li>';}
              else {echo '<li class="nav-item">
                <a href="../presence/archive.php" class="nav-link">
                  <i class="fa fa-archive nav-icon"></i>
                  <p>Archive</p>
                </a>
              </li>';}?>

              <?php echo('<li class="nav-header">Logs</li>');?>

              <?php if($page=='actlog'){echo '<li class="nav-item">
                <a href="../presence/activitylogs.php" class="nav-link active">
                  <i class="fa fa-file-text nav-icon"></i>
                  <p>Activity Logs</p>
                </a>
              </li>';}
              else{echo '<li class="nav-item">
                <a href="../presence/activitylogs.php" class="nav-link">
                  <i class="fa fa-file-text nav-icon"></i>
                  <p>Activity Logs</p>
                </a>
              </li>';}?>

              <?php if($page=='logsin'){echo '<li class="nav-item">
                <a href="../presence/studentslogsin.php" class="nav-link active">
                  <i class="fa fa-sign-in nav-icon"></i>
                  <p>Log In</p>
                </a>
              </li>';}
              else {echo '<li class="nav-item">
                <a href="../presence/studentslogsin.php" class="nav-link">
                  <i class="fa fa-sign-in nav-icon"></i>
                  <p>Log In</p>
                </a>
              </li>';}?>
              
              <?php if($page=='logsout'){echo '<li class="nav-item">
                <a href="../presence/studentslogsout.php" class="nav-link active">
                  <i class="fa fa-sign-out nav-icon"></i>
                  <p>Log Out</p>
                </a>
              </li>';}
              else {echo '<li class="nav-item">
                <a href="../presence/studentslogsout.php" class="nav-link">
                  <i class="fa fa-sign-out nav-icon"></i>
                  <p>Log Out</p>
                </a>
              </li>';}
              ?>
              <?php echo('<br>');?>
             
              <?php echo('<li class="nav-header">Help</li>');?>
              
              <?php echo ('<li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#modal-xl">
                  <i class="fa fa-question-circle nav-icon"></i>
                  <p>System Help</p>
                </a>
              </li>');
                ?>
              
                
              <?php'
        </ul>
      </nav>
      </div>
      </aside> '?>

      