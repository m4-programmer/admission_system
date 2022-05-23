 <?php 
 	require_once '../includes/admin_header.php'; 
 	require_once '../classes/Db.php';
  	require_once '../classes/Admin.php';
  	require_once '../classes/Student.php';
   require_once '../includes/sidebar.php'; 
	  $admin = new Admin;
   if (isset($_POST['add'])) {
     $txtpin = $_POST['txtpin'];
      $txtserial = $_POST['txtserial'];
      if (strlen($txtpin) != 10) {
        $msg = "Oops Card Details not inserted, Pin length must be 10";
      }elseif (strlen($txtserial) != 10) {
        $msg = "Oops Card Details not inserted, serial length must be 10";
      }else{
        //check if card details exists
        $check = $admin->checkIfScratchCardExist($txtpin,$txtserial);
        if (count($check) > 0) {
          $msg = "Sorry Card details already exist, please use another digit";
        }else{
        $admin->createScratchCard($txtpin,$txtserial);
        $msg = "Congratulation Card Details  inserted successfully";
        }
        
      }

   }
  
   $card = $admin->fetchScratchcard();


// to load scratch card details here
 ?>

<div class="content-wrapper p-3">
	
   <?php if (isset($msg)): ?>
         <script type="text/javascript">
           alert("<?php echo($msg) ?>");
         </script>
       <?php endif ?>    
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
 		<div class="card">
      <div><button class="btn btn-primary float-right m-4" href="#"  data-toggle="modal" data-target="#applymodal" style="color: white"> Add Scratch Card</button></div>
 		<div class="table-responsive">
    <table class="table table-striped">
       <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Pin</th>
      <th scope="col">Serial</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php 
          $i=1;
          foreach ($card as $row): ?>
      
    
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $row['pin'] ?> </td>
      <td><?php echo $row['serial'] ?></td>
      <td><?php 
      if(($row['status'])==((1)))
{ ?>
                          <span class="badge badge-primary">Card has been Used</span>
                          <?php } else {?>
                          <span class="badge badge-danger">Card has not been Used</span>
                        <?php } ?>
       </td>

    </tr>
    <?php endforeach ?>
      </table>
      </div>
 			
 		</div>
 		
 		<?php 

 		 
 		
 		 ?>
 	</div>


 </section>
 <!-- Add Scratch card Modal -->
 <!-- Modal -->
<div class="modal fade" id="applymodal" tabindex="-1" role="dialog" aria-labelledby="applymodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="applymodal">Admission Process</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p style="background-color: rgb(238, 164, 18)
        ;
font-family: 'Rubik', sans-serif;
font-size: 18px;
font-weight: 400;
line-height: 32.55px
        ">Enter Scratch Card Details (N5900)</p>
        <form role="form" class="form-horizontal apply" method="POST" action="">
              <div class="form-group">
                <div class="col-sm-12">
                  <input class="form-control" id="email1" placeholder="PIN number" type="text" name="txtpin" required="" maxlength="10" min="10">
                  <small style="color: red">Pin length must be 10 in length</small>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <input class="form-control" id="exampleInputPassword1" placeholder="Serial Number" type="text" name="txtserial" required="">
                  <small style="color: red">Serial length must be 10 in length</small>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-10">
                  <button type="submit" name="add" class="btn btn-light btn-radius btn-brd grd1">Add &gt;&gt;</button>
                </div>
              </div>
            </form>
      </div>
     
    </div>
  </div>
</div>


 <?php require_once '../includes/scripts.php'; ?>
