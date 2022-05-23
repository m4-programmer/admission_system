 <?php 
 	require_once '../includes/admin_header.php'; 
 	require_once '../classes/Db.php';
  	require_once '../classes/Admin.php';
  	require_once '../classes/Student.php';
   require_once '../includes/sidebar.php'; 
	 $admin = new Admin;

// to add fucntionality of onverting table entry to excel format
	 // to add publish admission list to homepage in pdf format for students to download
	
 ?>

<div class="content-wrapper p-3">
	
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
              <li class="breadcrumb-item active">Give Admission </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
 <section class="content">

 	<div class="container-fluid">
 		<div class="card">
 			<center><h3>Give Admission</h3></center>
 			<hr>
 			<div class="row">
 				<div class="col-md-4"></div>
 				<div class="col-md-4">
 					<form method="post" action="admission_list.php">
 						<div class="form-group">
 							<label>Minimum Jamb Score</label>
 							
				 							<input type="number" name="min_jamb" placeholder="e.g 180" class="form-control" required=""> 								
 						


 						</div>
 						<div class="form-group">
 							<label>Course Combination</label>
 							
				 							<input type="text" name="course" placeholder="e.g maths,english,physics..." class="form-control" required="">
				 							<small>
				 								note: default course combination for department is maths,english and physics with any other choice of the student
				 							</small> 								
 							</div>
 							<center><button class="btn btn-primary m-4" name="Generate">Generate Admission List</button></center>


 						</div>
 					</form>
 				</div>
 				<div class="col-md-4"></div>
 			</div>		
 			
 		</div>
 		
 		<?php 

 		 
 		
 		 ?>
 	</div>


 </section>

 <?php require_once '../includes/scripts.php'; ?>
