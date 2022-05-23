<?php require_once 'includes/header.php';
require_once 'require_classes.php'; 
if ($_SESSION['pin'] == '' or $_SESSION['serial'] == '') {
    header('location: index.php');
}
if(isset($_POST["btnsubmit"]))
{

//Get application ID
function applicationID(){
$string = (uniqid(rand(), true));
return substr($string, 0,5);
}

$applicationID = "ADM/".date("Y")."/".applicationID();		


$fname = $_POST['fname']; //1
$lname = $_POST['lname'];
$oname = $_POST['oname'];
$jambno = $_POST['txtjambno'];
$jambscore = $_POST['txtjambscore']; //5
$dob = $_POST['dob'];
$combination = $_POST['combination'];// holds courses written by students in jamb
$dept = $_POST['txtdept'];
$faculty = $_POST['txtfaculty'];
$sex = $_POST['cmdsex'];
$phone = $_POST['txtphone'];
$email = $_POST['txtemail'];
$state = $_POST['txtstate'];
// constrains
//verify that jamb no is of correct length, i.e 10

//print_r($a);
if (strlen($phone) != 11) {
  $phone_msg  = "Phone number length is not correct, please verify it and try again";
}elseif(strlen($jambno) !=10 ){
  $jambno_msg = "Jamb number_format is not correct".strlen($phone);
}else{
    $apply = new Student;
     $checkuser = $apply->load($jambno,$phone,$email);

  if (count($checkuser) > 0) {
   $msg = "Jamb no or Phone number or Email already exist";

  }else{
    $admin = new Admin;
    $course_combination = $admin->sortCourses($combination);
    // insert data's to database
   $apply->admissionApplication(
    $applicationID,
    $fname,
    $lname,
    $oname,
    $jambno,
    $jambscore,
    $dob,
    $course_combination,
    $dept,
    $faculty,
    $sex,
    $phone,
    $email,
    $state
  );
    // display success message
    $successmsg = "Congratulations, Your Data was Inserted Successfully";
    // to set delay function with script and redirect user back to index page
    ///header("location:admission.php");
  }
  }
}

?>
<div class="container">

 

  <div class="row">
    <div class="col-lg-12">
      <div class="well contact-form-container">
        <center><h3><u><b>Admission Form</b></u></h3></center>
        <form class="form-horizontal contactform" action="" method="post"  >
          <fieldset>
	
               <div class="form-group row">
              <label class="col-lg-6 " for="pass1">First Name:

                <input type="text"  id="pass1" class="form-control" name="fname" value="<?php if (isset($_POST['fname']))?><?php echo @$_POST['fname']; ?>" required="">
              </label>
               <label class="col-lg-6 " for="pass1">Last Name:
                <input type="text"  id="pass1" class="form-control" name="lname" value="<?php if (isset($_POST['lname']))?><?php echo @$_POST['lname']; ?>" required="">
              </label>
            </div>
          

            <div class="form-group">
              <label class="col-lg-6 " for="pass1">Other Name:
                <input type="text"  id="pass1" class="form-control" name="oname" value="<?php if (isset($_POST['oname']))?><?php echo @$_POST['oname']; ?>" >
              </label>
              <label class="col-lg-6 " for="pass1">Jamb Number:
                <input type="text"  id="pass1" class="form-control" name="txtjambno"  value="<?php if (isset($_POST['txtjambno']))?><?php echo @$_POST['txtjambno']; ?>" required="">
                     <small style="color: red"><?php echo @$jambno_msg; ?></small> 
              </label>
            </div>
          
			<div class="form-group">
              <label class="col-lg-6 " for="pass1">Jamb score:
                <input type="text"  id="pass1" class="form-control" name="txtjambscore"  value="<?php if (isset($_POST['txtjambscore']))?><?php echo @$_POST['txtjambscore']; ?>" required="">
          
              </label>
              
              <label class="col-lg-6 " for="pass1">DOB:
                <input type="date"  id="dob" class="form-control" name="dob"  value="<?php if (isset($_POST['dob']))?><?php echo @$_POST['dob']; ?>" required="">
              </label>
            </div>
      
            <div class="form-group">
              <label class="col-lg-4 " for="pass1">Combination:
                <input type="text"  id="pass1" class="form-control" name="combination"  value="<?php if (isset($_POST['combination']))?><?php echo @$_POST['combination']; ?>" placeholder="E.g Maths,English,Chemistry,Physics,Biology,etc" required="">
              </label>
                 <label class="col-lg-4 " for="pass1">Department:
                <input type="text"  id="pass1" class="form-control" name="txtdept"  value="<?php if (isset($_POST['txtdept'])){?><?php echo @$_POST['txtdept'];}else{echo("Computer Science");} ?>" required="">
              </label>
               <label class="col-lg-4 " for="pass1">Faculty:
                <input type="text"  id="pass1" class="form-control" name="txtfaculty"  value="<?php if (isset($_POST['txtfaculty'])){?><?php echo @$_POST['txtfaculty'];}else{echo("Physical Science");} ?>" required="">
              </label>
            </div>

            
			<div class="form-group">
              <label class="col-lg-6 " for="pass1">Sex:
               <select name="cmdsex" id="gender" class="form-control"   required>
                 <option value="">--Select Gender--</option>
                 <option value="Male">Male</option>
                 <option value="Female">Female</option>
               </select>
                <small style="color: red"><?php echo @$gender_msg; ?></small> 
              </label>
               <label class="col-lg-6 " for="pass1">phone:
                <input type="text"  id="pass1" class="form-control" name="txtphone" value="<?php if (isset($_POST['txtphone']))?><?php echo @$_POST['txtphone']; ?>" required="">
                <small style="color: red"><?php echo @$phone_msg; ?></small> 
              </label>
            </div>
			  <div class="form-group">
             
            </div>
				  <div class="form-group">
              <label class="col-lg-6 " for="uemail">Email:
             <input type="email" name="txtemail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  value="<?php if (isset($_POST['txtemail']))?><?php echo @$_POST['txtemail']; ?>" required>
              </label>
                <label class="col-lg-6 " for="pass1">State:
                <input type="text"  id="pass1" class="form-control" name="txtstate" value="<?php if (isset($_POST['txtstate']))?><?php echo @$_POST['txtstate']; ?>" required="">
              </label>
            </div>
			
		
			
			
			
		
		 

            <div style="height: -10px;clear: both"></div>

            <div class="form-group">
			
			
              <div class="col-lg-10">
                <center><button class="btn btn-primary" type="submit" name="btnsubmit">Submit</button> </center>
              </div>
            </div>
          </fieldset>
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
