 <?php 
  require_once '../includes/admin_header.php'; 
  require_once '../classes/Db.php';
    require_once '../classes/Admin.php';
    require_once '../classes/Student.php';
  
   $admin = new Admin;
   $totalApplicants = count($admin->loadstudent());
   
    if (isset($_POST['Generate'])) {
    $courses = $admin->sortCourses($_POST['course']);


    $score = $_POST['min_jamb'];
    
      $list = $admin->generateAdmission($score,$courses);

      $count = count($list);
      if ($count == 0) {
        $msg = "<span class='alert alert-primary text-secondary'>None of the Applicant met the criteria set for the Admission</span>"; 
      }else{
        $msg = "<span class='alert alert-primary text-dark'><strong>$count</strong> out of <strong>$totalApplicants</strong> Applicants who met the set criteria's has been drafted in the Admission List </span>";
      }
    

  }

 ?>

  <?php require_once '../includes/sidebar.php';?> 

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
              <li class="breadcrumb-item active">Scratch Card </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
 <section class="content">

  <div class="container-fluid">
    <div class="card p-4">
     <?php echo $msg; 
     
     ?>

   
    </div>
    <a class="btn btn-danger " href="viewadmissionlist.php?msg=admission_list&courses=<?php echo $admin->courses;  ?>&score=<?php echo $admin->jamb_score;  ?>">View Admission List</a>

    
   
  </div>


 </section>
 <script>  
 $(document).ready(function(){  
      $('#create_excel').click(function(){  
           var excel_data = $('#admission_table').html();  
           var page = "excel.php?data=" + excel_data;  
           window.location = page;  
      });  
 });  
 </script>  

 <?php require_once '../includes/scripts.php'; ?>
