<?php require_once '../includes/admin_header.php'; 
require_once '../classes/Db.php';
  require_once '../classes/Admin.php';
  require_once '../classes/Student.php';
$admin = new Admin;
  if(isset($_POST["btnpassword"])){
  
  $old = $_POST['txtold_password'];
  $pass_new =  $_POST['txtnew_password'];
  $confirm_new =  $_POST['txtconfirm_password'];
  if ($pass_new == $confirm_new) {
    $cpword = $admin->change_pword($old,$pass_new);
    if ($cpword == true) {
        $successmsg = "Congratulation Password Changed Successfully";
    }else{
      $msg = "Oops, An error occurred, Password could not be Changed";
    }
  
  }else{
    $msg = "Password does not match";
  }

  

}
?>

  <?php require_once '../includes/sidebar.php'; ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">&nbsp;</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Change Password  </li>
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
        
		 <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form id="form" action="" method="post" class="">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Old Password </label>
                    <input type="text" class="form-control" name="txtold_password" id="exampleInputEmail1" size="77"  placeholder="Enter Old Password" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="text" class="form-control" name="txtnew_password" id="exampleInputPassword1" size="77"  placeholder="Enter New Password" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="text" class="form-control" name="txtconfirm_password" id="exampleInputPassword1" size="77"  placeholder="Confirm New Password" required="">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btnpassword" class="btn btn-primary">Change </button>
                </div>
              </form>
            </div>
		
        </div>
        
    </section>
    <!-- /.content -->
  </div>
<link rel="stylesheet" href="popup_style.css">
  <?php if(!empty($msg)) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Error</strong> 
    </h1>
    <p><?php echo $msg; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($msg);  } ?>

<?php if(!empty($successmsg)) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Success</strong> 
    </h1>
    <p><?php echo $successmsg ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($successmsg);  
} ?>
 <script>

      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>



  <?php require_once '../includes/scripts.php'; ?>