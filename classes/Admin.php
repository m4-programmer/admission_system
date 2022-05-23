<?php 
/**
 * 
 */
class Admin extends Db
{
	public $jamb_score;
	public $courses;
	function __construct()
	{	
		parent::__construct();
	}
	//login admin
	public function login($uname,$pword){
		return $this->fetch('admin','','username = ? AND password = ?',array( $uname,$pword),'','','');

	}
	// count students
	public function countStudents(){
		$this->query("SELECT count(*) as total FROM students");
		return $this->execute();
	}
	
	// fetch total used scratchcard in database
	public function fetchTusedScratchcard(){
		$this->query("SELECT *  FROM scratchcard where status = 1");
		return $this->fetchresult();
	}
	//fetch scratch card details
	public function fetchScratchcard(){
		return $this->fetch('scratchcard');
	} 
	// fetch students
	public function loadstudent(){
		return $this->fetch('student');
	}
	public function checkIfScratchCardExist($pin,$serial){
		return $this->fetch('scratchcard','','pin = ? AND serial = ?',array( $pin,$serial),'','','');
	}
	public function createScratchCard($pin,$serial,$status = 0){
		 $this->insert('scratchcard',array('ID','pin','serial','status'), array('',$pin,$serial,$status));
	}
	public function generateAdmission($jamb_score,$courses){
		$this->jamb_score =  $_SESSION['jamb_score']  = $jamb_score;
		$this->courses = $_SESSION['courses'] = $courses;
		$this->query("SELECT * FROM student where jamb_score > $jamb_score and combination like '%$courses%'");
		return $a =  $this->fetchresult();
		
	}
	public function viewGeneratedList(){
		return $this->generateAdmission($this->jamb_score,$this->courses);
	}
	public function change_pword($old,$pword)
	{
		
		$this->query("UPDATE admin SET password = :pword WHERE username = :uname and password = :pwords");
		$this->bind(':uname',$_SESSION['user']);
		$this->bind(':pword',$pword);
		$this->bind(':pwords',$old);
		$this->execute();
		if ($this->checkdata()==true) {
			return true;
		}else{
			return false;
		}
	}
	public function sortCourses($courses){
		if ($courses != '') {
			
		$b = explode(',', $courses);
		rsort($b); // sorts array in descending order
 		$countArrayEntries = count($b);
 		if ($countArrayEntries > 1) {
 			
 		 if ($b[2] != "english" ) {
 		 	$c = $b[2];
 		 for ($i=0; $i < $countArrayEntries; $i++) { 
 		 	
 		 	
 		 	if ($b[$i]== "english") {
 		 		
 		 	$bd= $b[$i];
 		 	$b[2] = $bd;
 		 	$b[$i] = $c;
 		 	
 		 	break;

 		 	}
 		 	
 		 	
 		 }
 		 	$courses = implode(',', $b);
 		 	return $courses;
 		 }else{
 		 	$courses = implode(',', $b);
 		 	return $courses;
 		 }
 		}else{
 			$courses = implode(',', $b);
 		 	return $courses;
 		}

 		}

	}
}
 ?>