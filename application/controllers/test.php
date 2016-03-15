<?php 
class test extends  CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->helper("tanggal");
	}
	
	
	function index(){
		//echo $this->cm->no_faktur();
		//echo flipdate("00000");
		$arr_agama = $this->cm->arr_tabel("agama","id_agama","agama","id_agama");
		echo "<pre>";
		print_r($arr_agama);
		echo "</pre>";
	}
}

?>