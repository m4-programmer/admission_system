 <?php 
 	require_once '../includes/admin_header.php'; 
 	require_once '../classes/Db.php';
  	require_once '../classes/Admin.php';
  	require_once '../classes/Student.php';
	 $admin = new Admin;
	 $student = $admin->loadstudent();
	 //to make student data printable;
 ?>

  <?php require_once '../includes/sidebar.php'; ?>
  <script type="text/javascript">
		function deldata(fullname){
if(confirm("ARE YOU SURE YOU WISH TO DELETE " + " " + fullname+ " " + " FROM THE LIST?"))
{
return  true;
}
else {
	return false;
}
	
}

</script>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <p>&nbsp;</p>
          <table width="1161" border="0" align="left">
            <tr>
              <td width="1155"><div class="card">
                <div class="card-header">
                  <h2>Applications' Record</h2>
                  <h3 class="card-title">&nbsp;</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" id="example">
                  <table width="50%"  align="center" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr> <th width="3%">#</th>
                        <th width="13%">Fullname</th>
                        <th width="7%">Jamb Score</th>
                        <th width="7%">Jamb No.</th>
                       
                        <th width="7%">Combination</th>
                        <th width="8%">Department</th>
                        
					    <th width="8%">Phone</th>       
                       
                       
                        
                      </tr>
                    </thead>
                    <tbody>
                							<?php
                							      $no = 1; 
                                          foreach ($student as $row):
                      		$fullname = $row['fname'].' '. $row['oname'].' '.$row['lname'];
										   ?>
                      <tr class="gradeX">
					  <td height="27"><div align="center"><?php echo $no++; ?></div></td>
                        <td><div align="left"><?php echo $fullname; ?></div></td>
                        <td><div align="left"><?php echo $row['jamb_regno']; ?></div></td>
                        <td><div align="left"><?php echo $row['jamb_score']; ?></div></td>
                        <td><div align="left"><?php echo $row['combination']; ?></div></td>
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
          <p>
            <!-- /.card -->
          </p>
        </div>
    
          <!-- /.col -->
    </div>
        <!-- /.row -->
  </div>
 
      <!-- /.container-fluid --><!-- /.content -->
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script>  
 $(document).ready(function(){  
      $('#create_excel').click(function(){  
           var excel_data = $('#example').html();  
           var page = "excel.php?data=" + excel_data;  
           window.location = page;  
      });  
 });  
 </script>  
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": true,
    });
     $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>