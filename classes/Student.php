<?php 

class Student extends Db{
	private $serial;
	private $pin;
	public function __construct(){
		parent::__construct();
	}
	// verify scratch card details
	public function apply($serial,$pin){
		$this->serial = $serial;
		$this->pin = $pin;
		$this->query("SELECT *  FROM scratchcard where serial = :serial and pin =:pin and status = :num");
		$this->bind(':serial',$serial);
		$this->bind(':pin',$pin);
		$this->bind(':num', 0);
		$data = $this->fetchresult();
		$check  = $this->checkdata();
		if ($check > 0 ) {
			return $data;
		} else {
			return false;
		}
		
	}
	public function updateScratchCard(){
		$this->query('UPDATE scratchcard SET status = :status WHERE serial = :serial and pin =:pin');
		$this->bind(':serial',$this->serial);
		$this->bind(':pin',$this->pin);
		$this->bind(':status', 1);
		$data = $this->execute();
		$check  = $this->checkdata();
		if ($check > 0 ) {
			return $data;
		} else {
			return false;
		}
	}
	//apply for admission
	public function admissionApplication($a,$n,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m){
		$this->insert("student",
			array('id','Application_id ','fname','lname','oname','jamb_regno','jamb_score','dob','combination','department','faculty','sex','phone','email','state','date_created'),
			array("",$a,$n,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,"now()")
		);

	}
	public function load($jamb_regno,$phone,$email){
		$a = $this->fetch('student','','jamb_regno = ? AND phone = ? or email = ?',array( $jamb_regno, $phone,$email),'','','');
		return $a;
		
	}
	
}

 ?>