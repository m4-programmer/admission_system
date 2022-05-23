<link rel="stylesheet" type="text/css" href="../DataTables/DataTables-1.11.4/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="../DataTables/Buttons-2.2.2/css/buttons.dataTables.min.css"/>
   <link rel="stylesheet" href="dist/css/adminlte.min.css">
   1
  
<script type="text/javascript" src="../DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>



<?php 
  require_once '../includes/admin_header.php'; 
  require_once '../classes/Db.php';
    require_once '../classes/Admin.php';
    require_once '../classes/Student.php';
  
   $admin = new Admin;
   
   
    if (isset($_GET['msg'])) {
      $jamb_score = $_GET['score'];
      $courses = $_GET['courses'];
      $admission_list = $admin->generateAdmission($jamb_score,$courses);

      $count = count($admission_list);
      if ($count == 0) {
        $msg = "<span class='alert alert-primary text-secondary'>None of the Applicant met the criteria set for the Admission</span>"; 
      }else{
        $msg = "<span class='alert alert-primary text-dark'><strong>$count</strong> applicant met the requirement for the Admission List</span>";
      }
    

  }else{
    header("location: admission_list.php");
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
     <table  border="0" align="left">
            <h2><center>Admission List</center></h2>
           

                <!-- /.card-header -->
                <div class="card-body" id="example ">
                  <table width="100%"  align="center" id="admission_table" class="table table-responsive  table-bordered table-striped" id="example1">
                    <thead>
                      <tr> <th width="3%">#</th>
                        <th width="13%">Fullname</th>
                        <th width="7%">Jamb Score</th>
                        <th width="7%">Jamb No.</th>
                       
                        <th width="7%">Gender</th>
                        <th width="8%">Department</th>
                        
                        <th width="8%">Phone</th>       
                       
                       
                        
                      </tr>
                    </thead>
                    <tbody>
                              <?php
                                    $no = 1; 
                                          foreach ($admission_list as $row):
                          $fullname = $row['fname'].' '. $row['oname'].' '.$row['lname'];
                       ?>
                      <tr class="gradeX">
            <td height="27"><div align="center"><?php echo $no++; ?></div></td>
                        <td><div align="left"><?php echo $fullname; ?></div></td>
                        <td><div align="left"><?php echo $row['jamb_regno']; ?></div></td>
                        <td><div align="left"><?php echo $row['jamb_score']; ?></div></td>
                        <td><div align="left"><?php echo $row['Sex']; ?></div></td>
                        <td><div align="left"><?php echo $row['department']; ?></div></td>
            
                        <td><div align="left"><?php echo $row['Phone']; ?></div></td>
                       
  
                        
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div></td>
            </tr>

          </table>

   
    </div>
    
    
   
  </div>


 </section>


 <?php require_once '../includes/scripts.php'; ?>
 <script>  
 $(document).ready(function(){  
      
      $('#admission_table').DataTable({
        "responsive": true,
        "autoWidth": true,
        "searching": false,
        dom: 'Bfrtip',
        buttons:[
          'copy','csv','excel','pdf','print'
        ]
      });  
 });  

 </script> 
 <script type="text/javascript" src="../DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="../DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="../DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="../DataTables/DataTables-1.11.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../DataTables/Buttons-2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../DataTables/Buttons-2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="../DataTables/Buttons-2.2.2/js/buttons.print.min.js"></script>