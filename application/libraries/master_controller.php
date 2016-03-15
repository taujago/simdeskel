<?php
class master_controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		


		// cek registrasi 
		$kode = $this->GetVolumeLabel()."1353590395393593";
		$register = md5($kode);

		 

		if($this->session->userdata('login_admin') == false ) {
			redirect('login/');
		} 
		
		
	}

	function set_content($str) {
		$this->content['content'] = $str;
	}
	
	function set_title($str) {
		$this->content['title'] = $str;
	}
	
	function set_subtitle($str) {
		$this->content['subtitle'] = $str;
	}
	
	function render(){
		$arr = array();		 
		$this->load->view("test",$this->content );
		
	}
//$this->format(array("arr_kolom"=>$arr_kolom,"bold"=>true,"baris"=>$i,"align"=>"center"));
 

 function format_border_bold($arr_kolom,$baris) {
 	
 }


 	function GetVolumeLabel() {
	  // Try to grab the volume name
	  if (preg_match('#Volume Serial Number is (.*)\n#i', shell_exec('dir c:'), $m)) {
	    $volname = ' ('.$m[1].')';
	  } else {
	    $volname = '';
	  }
	//return $volname;
	$serial =  str_replace("(","",str_replace(")","",$volname));
	$serial = md5($serial);
	$serial = substr(preg_replace("/[^0-9]/", '', $serial),0,4);
	return $serial;
	}


}

?>
