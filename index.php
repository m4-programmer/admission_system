<?php 
include 'require_classes.php';
include 'includes/header.php';
// 
if(isset($_POST['apply'])) {
  $pin = $_POST['txtpin'];
  $serial = $_POST['txtserial'];
  if (empty($pin) or empty($serial)) {
    echo "Scratch Fields Cannot be Empty";
  }else{
    $student  = new Student;
    $apply = $student->apply($serial,$pin);
    if ($apply == false ) {
         $msg = "Invalid Scratch Card Details or Card Has Already been Used";
    }else{
          
         $_SESSION['pin'] = $apply[0]['pin'];
         $_SESSION['serial'] = $apply[0]['serial'];
         $student->updateScratchCard();
        header("location: admission.php");
    }
  }
  //
}
?>

 <div class="container" style="background: url(images/blog_4.jpg);height: 400px;" >
 	<center><h2 style="color:white;font-size: 35px;font-family: 'Rubik', sans-serif; cursor: grab;"><stong>Online</stong> Admission System</h2>

 		<p class="lead" style="color:#fff;">This is an online admission system that automates the admission system for universities.</p>

 		<a href="#" class="btn btn-primary" style="background-color: orange;color:red;border: 2px solid #fff"><span>Contact Us</span></a>
 			<a href="#" class="btn btn-primary" style="background-color: orange;color:red;border: 2px solid #fff"><span>Read More</span></a>
 		</center>
 </div>





 <!-- Apply Modal -->
 <!-- Modal -->
<div class="modal fade" id="applymodal" tabindex="-1" role="dialog" aria-labelledby="applymodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="applymodal">Start Admission Process</h4>
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
									<input class="form-control" id="email1" placeholder="PIN number" type="text" name="txtpin" required="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="exampleInputPassword1" placeholder="Serial Number" type="text" name="txtserial" required="">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<button type="submit" name="apply" class="btn btn-light btn-radius btn-brd grd1">Continue &gt;&gt;</button>
								</div>
							</div>
						</form>
      </div>
     
    </div>
  </div>
</div>


<link rel="stylesheet" href="admin/popup_style.css">
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