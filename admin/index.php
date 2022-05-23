<?php
require_once '../includes/admin_header.php';
if (!isset($_SESSION['user'])) {
  header("location: login.php?error=Please Fill in Your login Details");
  //echo($_SESSION['user'].' working');
}

      ?>
  <?php 
  require_once '../classes/Db.php';
  require_once '../classes/Admin.php';
  require_once '../classes/Student.php';
   ?>

  <?php require_once '../includes/sidebar.php'; 
  $admin = new Admin;
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h6><strong></strong></h6>

                <p><strong>No. of Applicants: <?php 
                  $ba = $admin->loadstudent();
                   echo count($ba);?> </strong>
                  
                </p>
              </div>
              <div class="icon">
                <i class=""></i>
              </div>
              <a href="#" class="small-box-footer"></a>            </div>
          </div>
          <!-- ./col -->
		
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h6></h6>

                 <p><strong>No. of Used Scratch Cards : <?php 
                  $ba = $admin->fetchTusedScratchcard();
                   echo count($ba);?></strong></p>
              </div>
              <div class="icon">
                <i class=""></i>
              </div>
              <a href="#" class="small-box-footer"></a>        
                  </div>
          </div>
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h6></h6>

                <p><strong>No. of Scratch Cards : <?php 
                  $ba = $admin->fetchScratchcard();
                   echo count($ba);?></strong></p>
              </div>
              <div class="icon">

                <i class=""></i>
              </div>
              <a href="#" class="small-box-footer"></a>        
                  </div>
          </div>
         </div>
         
         </div>
         
    </section>
    <!-- /.content -->
  </div>

  
</div>
<!-- ./wrapper -->
<?php require_once '../includes/scripts.php'; ?>